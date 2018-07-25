<?php
#BEGIN_LICENSE
#-------------------------------------------------------------------------
# Module: CGBlog (c) 2010-2014 by Robert Campbell
#         (calguy1000@cmsmadesimple.org)
#  An addon module for CMS Made Simple to allow creation, management of
#  and display of blog articles.
#
#  This module forked from the original CMSMS News Module (c)
#  Ted Kulp, and Robert Campbell.
#
#-------------------------------------------------------------------------
# CMS - CMS Made Simple is (c) 2005 by Ted Kulp (wishy@cmsmadesimple.org)
# Visit the CMSMS homepage at: http://www.cmsmadesimple.org
#
#-------------------------------------------------------------------------
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# However, as a special exception to the GPL, this software is distributed
# as an addon module to CMS Made Simple.  You may not use this software
# in any Non GPL version of CMS Made simple, or in any version of CMS
# Made simple that does not indicate clearly and obviously in its admin
# section that the site was built with CMS Made simple.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
# Or read it online: http://www.gnu.org/licenses/licenses.html#GPL
#
#-------------------------------------------------------------------------
#END_LICENSE
$gCms = cmsms();
if( !$this->CheckPermission('Modify CGBlog') ) return;
$this->SetCurrentTab('articles');

try {
    if( !isset($params['sel']) ) throw new \RuntimeException($this->Lang('error_insufficient_params'));
    $sel = \cge_utils::get_param($params,'sel');

    // make sure $sel is an array
    if( !is_array($sel) || !count($sel) ) $sel = unserialize($sel);
    if( !is_array($sel) || !count($sel) ) throw new \RuntimeException($this->Lang('error_insufficient_params'));

    // clean the sel array.
    $tmp = array();
    foreach( $sel as $one ) {
        $one = (int) $one;
        if( $one > 0 ) $tmp = \cge_array::insert_unique($tmp,$one);
    }
    if( !count($tmp) ) throw new \RuntimeException($this->Lang('error_insufficient_params'));
    $sel = $tmp;

    // get these articles (independent of status) in date order
    $db = \cge_utils::get_db();
    $sql = 'SELECT * FROM '.cms_db_prefix().'module_cgblog WHERE cgblog_id IN ('.implode(',',$sel).') ORDER BY start_time DESC';
    $rows = $db->GetArray($sql);
    if( !count($rows) || count($rows) != count($sel) ) throw new \LogicException('Internal Error:  Could not find the blog articles specified... should never happen');

    // default vals for forms.
    $dir = 1;
    $count = 1;
    $type = 'd';
    $do_enddate = 1;

    if( isset($params['cancel']) ) {
        $this->RedirectToTab();
    }
    else if( isset($params['submit']) ) {
        try {
            $dir = \cge_param::get_int($params,'dir');
            $count = \cge_param::get_int($params,'count');
            $type = strtolower(\cge_param::get_string($params,'type'));
            $do_enddate = \cge_param::get_bool($params,'do_enddate');

            // now validate dir
            if( !in_array($dir,array(-1,1)) ) throw new \RuntimeException($this->Lang('error_invalidvalue'));

            // now validate count
            if( $count < 1 || $count > 60 ) throw new \RuntimeException($this->Lang('error_invalidvalue'));

            // now validate type
            if( !in_array($type,array('m','h','d','mo','w','y')) )  throw new \RuntimeException($this->Lang('error_invalidvalue'));

            // now validate combined and calculate an offset.
            $fmt = ($dir < 0 ) ? '-' : '+';
            switch( $type ) {
            case 'm':
                $fmt .= sprintf('%d minutes',$count);
                break;
            case 'h':
                $fmt .= sprintf('%d hours',$count);
                break;
            case 'd':
                $fmt .= sprintf('%d days',$count);
                break;
            case 'w':
                $fmt .= sprintf('%d weeks',$count);
                break;
            case 'mo':
                $fmt .= sprintf('%d months',$count);
                break;
            case 'y':
                if( $count > 5 ) throw new \RuntimeException($this->lang('error_adjust_5years'));
                $fmt .= sprintf('%d years',$count);
                break;
            }

            $db->BeginTrans();
            $sql = 'UPDATE '.cms_db_prefix().'module_cgblog SET cgblog_date = ?, start_time = ?, end_time = ?, modified_date = NOW() WHERE cgblog_id = ?';
            foreach( $rows as $row ) {
                $row['cgblog_date'] = trim($db->DbTimeStamp(strtotime($fmt,strtotime($row['cgblog_date']))),"'");
                $row['start_time'] = trim($db->DbTimeStamp(strtotime($fmt,strtotime($row['start_time']))),"'");
                $t_enddate = 0;
                if( $row['end_time'] && strtotime($row['start_time']) > strtotime($row['end_time']) ) $t_enddate = 1;
                if( $row['end_time'] && ($t_enddate || $do_enddate) ) {
                    $row['end_time'] = trim($db->DbTimeStamp(strtotime($fmt,strtotime($row['end_time']))),"'");
                }
                $db->Execute($sql,array($row['cgblog_date'],$row['start_time'],$row['end_time'],$row['cgblog_id']));
            }
            $db->CommitTrans();

            $this->RedirectToTab();
        }
        catch( \Exception $e ) {
            $db->RollbackTrans();
            echo $this->ShowErrors($e->GetMessage());
        }
    }

    $tpl = $this->CreateSmartyTemplate('admin_mass_adjustitems.tpl');
    $tpl->assign('formstart',$this->CGCreateFormStart($id,'admin_mass_adjusttimes',$returnid,array('sel'=>serialize($sel))));
    $tpl->assign('formend',$this->CreateFormEnd());
    $tpl->assign('dir',$dir);
    $tpl->assign('count',$count);
    $tpl->assign('type',$type);
    $tpl->assign('do_enddate',$do_enddate);
    $tpl->assign('articles',$rows);
    $tpl->display();
}
catch( \Exception $e ) {
    $this->SetError($e->GetMessage());
    $this->RedirectToTab();
}


#
# EOF
#
?>