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
if (!isset($gCms)) exit;

debug_buffer('start cgblog archive view');
$thetemplate = \cge_param::get_string($params,'archivetemplate',$this->GetPreference('current_archive_template'));
$cache_id = 'cgbd'.md5(serialize($params));
$tpl = $this->CreateSmartyTemplate($thetemplate,'archive',$cache_id);
if( !$tpl->isCached() ) {
    //
    // Initialization
    //
    $tmp = $this->GetPreference('default_summarypage',-1);
    $summarypage = $returnid;
    if( $tmp != -1 ) $summarypage = $tmp;
    $category = null;

    if( isset($params['summarypage']) ) {
        $tmp = $this->resolve_alias_or_id($params['summarypage']);
        if( $tmp ) $summarypage = $tmp;
        unset($params['summarypage']);
    }

    //
    // Get the data
    //
    $query = 'SELECT DISTINCT MONTH(A.start_time) AS month, YEAR(A.start_time) AS year, count(A.cgblog_id) AS count
              FROM '.cms_db_prefix().'module_cgblog A ';
    $joins = array();
    $where = array();
    $qparms = array();
    $where[] = 'A.status = ?';
    $qparms[] = 'published';
    $childcats = !cms_to_bool(cge_utils::get_param($params,'nochildren',0));
    $usepretty = true;

    if( isset($params['category']) ) {
        $category = cms_html_entity_decode(trim($params['category']));
        $categories = explode(',',$category);
        $list = cgblog_ops::get_categories_from_names($categories,$childcats);
        $usepretty = false;
        if( count($list) ) {
            $joins[] = cms_db_prefix().'module_cgblog_blog_categories B on A.cgblog_id = B.blog_id';
            $where[] = 'B.category_id IN ('.implode(',',$list).')';
        }
        else {
            // no matching categories, so make sure query will fail.
            $where[] = 'A.cgblog_id < 1';
        }
    }

    if( isset($params['year']) ) {
        $where[] = 'YEAR(A.start_time) = ?';
        $qparms[] = (int)$params['year'];
    }

    if( count($joins) ) {
        foreach( $joins as $one ) {
            $query .= ' LEFT JOIN '.$one;
        }
    }
    if( count($where) ) $query .= ' WHERE '.implode(' AND ',$where);
    $query .= ' GROUP BY YEAR(A.start_time), MONTH(A.start_time)';
    $query .= ' ORDER BY A.start_time DESC';
    $dbr = $db->Execute($query,$qparms);
    if( !$dbr ) {
        echo 'FATAL QUERY:'.$db->sql.'<br/>'.$db->ErrorMsg().'<br/>';
        die();
    }

    $data = array();
    $fmt = '%s/archive/%4d/%02d';
    while( $dbr && ($row = $dbr->FetchRow()) ) {
        $parms = $params;
        $parms['year'] = $row['year'];
        $parms['month'] = $row['month'];
        $prettyurl = null;

        if( $usepretty ) {
            $prettyurl = sprintf($fmt,$this->GetPreference('urlprefix','cgblog'),$row['year'],$row['month']);
            if( $this->GetPreference('default_summarypage','-1') != -1 ) $prettyurl .= "/$summarypage";
        }
        $row['summary_url'] = $this->CreateURL($id,'default',$summarypage,$parms,false,$prettyurl);

        $row['datestamp'] = mktime(0,0,0,$row['month'],1,$row['year']);
        $data[] = $row;
    }
    $dbr->Close();
    if( count($data) ) $tpl->assign('archivelist',$data);
}
$tpl->display();
debug_buffer('end cgblog archive view');

?>