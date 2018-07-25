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
if( !isset($gCms) ) exit;

// initialization
if( !$this->GetPreference('fesubmit_managearticles',1) ) return; // pref not set, do nothing.
$feu = cge_utils::get_module('FrontEndUsers');
if( !$feu ) return;  // need feu for this action.

$uid = $feu->LoggedInId();
if( $uid <= 0 ) return; // not logged in, do nothing.
$username = $feu->LoggedInName();
if( !$username || $username == 'unknown' ) return; // invalid username, do nothing.
$template = cge_utils::get_param($params,'felisttemplate',$this->GetPreference('current_felist_template'));
$pagelimit = 500;
$records = array();
$startelement = 0;
$pagenumber = 1;
$numpages = -1;
$inline = false;
$fesubmitpage=  $returnid;

debug_buffer('begin cgblog myarticles view');
if( isset($params['fesubmitpage']) ) {
    $tmp = trim($params['fesubmitpage']);
    $res = $this->resolve_alias_or_id($tmp);
    if( $res ) $fesubmitpage = $res;
}
if( isset($params['inline']) ) $inline = (int)$params['inline'];
if( isset($params['pagelimit']) ) {
    $pagelimit = (int)$params['pagelimit'];
    $pagelimit = min($pagelimit,10000);
    $pagelimit = max(1,$pagelimit);
}
if( isset($params['pagenumber']) ) {
    $pagenumber = (int)$params['pagenumber'];
}
if( isset($params['cgblog_filter']) ) {
    unset($params['cgblog_filter']);
    $pagenumber = 1;
}
$startelement = ($pagenumber-1) * $pagelimit;
$searchtext = trim(cge_utils::get_param($params,'cgblog_searchtext'));

// get the list of this users articles.
$cquery1 = 'SELECT count(cgblog_id) FROM '.cms_db_prefix().'module_cgblog WHERE author = ?';
$cquery2 = $cquery1;
$query = 'SELECT * FROM '.cms_db_prefix().'module_cgblog WHERE author = ?';
$parms = array($username);
$parms2 = $parms;
if( strlen($searchtext) >= 3 ) {
    $cquery2 .= ' AND (cgblog_title LIKE ? OR cgblog_data LIKE ?)';
    $query .= ' AND (cgblog_title LIKE ? OR cgblog_data LIKE ?)';
    $searchtext = '%'.$searchtext.'%';
    $parms2[] = $searchtext;
    $parms2[] = $searchtext;
}
$query .= ' ORDER BY modified_date DESC';

$count = $db->GetOne($cquery1,$parms);
$subcount = $db->GetOne($cquery2,$parms2);
if( $count > 0 ) {
    $numpages = (int)($subcount / $pagelimit);
    if( ($subcount % $pagelimit) != 0 ) $numpages++;
    $dbr = $db->SelectLimit($query,$pagelimit,$startelement,$parms2);
    while( $dbr && $row = $dbr->FetchRow() ) {
        $obj = cge_array::to_object($row);

        // convert some dates to unix format for easier logic
        $obj->cgblog_date_ut = $db->UnixTimeStamp($obj->cgblog_date);
        $obj->start_time_ut = $db->UnixTimeStamp($obj->start_time);
        $obj->end_time_ut = $db->UnixTimeStamp($obj->end_time);
        $obj->modified_date_ut = $db->UnixTimeStamp($obj->modified_date);
        $obj->create_date_ut = $db->UnixTimeStamp($obj->create_date);

        // some handy urls.
        $parms = array('articleid'=>$row['cgblog_id']);
        $parms['cgblog_src'] = 'myarticles';
        $parms['cgblog_origpath'] = $returnid;
        if( isset($params['fesubmittemplate']) ) $parms['fesubmittemplate'] = $params['fesubmittemplate'];

        $obj->edit_url = $this->CreateURL($id,'fesubmit',$fesubmitpage,$parms);
        $obj->delete_url = $this->CreateURL($id,'fedelete',$returnid,array('articleid'=>$row['cgblog_id']));

        $records[] = $obj;
    }
}

// no caching for this guy.
$tpl = $this->CreateSmartyTemplate($template,'felist');
$tpl->assign('count',$count);
$parms = $params;
unset($parms['cgblog_searchtext']);
$tpl->assign('formstart',$this->CGCreateFormStart($id,'myarticles',$returnid,$parms,$inline));
$tpl->assign('formend',$this->CreateFormEnd());
$tpl->clear_assign('articles');
if( count($records) ) {
    $tpl->assign('articles',$records);
    $tpl->assign('numpages',$numpages);
    $tpl->assign('pagelimit',$pagelimit);
    $tpl->assign('curpage',$pagenumber);
    $parms = $params;
    if( $pagenumber < $numpages ) {
        $parms['pagenumber'] = $pagenumber + 1;
        $tpl->assign('nextpage_url',$this->CreateURL($id,'myarticles',$returnid,$parms,$inline));
        $parms['pagenumber'] = $numpages;
        $tpl->assign('lastpage_url',$this->CreateURL($id,'myarticles',$returnid,$parms,$inline));
    }
    if( $pagenumber > 1 ) {
        $parms['pagenumber'] = 1;
        $tpl->assign('firstpage_url',$this->CreateURL($id,'myarticles',$returnid,$parms,$inline));
        $parms['pagenumber'] = $pagenumber - 1;
        $tpl->assign('prevpage_url',$this->CreateURL($id,'myarticles',$returnid,$parms,$inline));
    }
}
$tpl->assign('add_url',$this->CreateURL($id,'fesubmit',$fesubmitpage,array('cgblog_src'=>'myarticles','cgblog_origpage'=>$returnid)));
$tpl->display();
debug_buffer('end cgblog myarticles view');

?>