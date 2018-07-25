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
if( !$this->CheckPermission('Modify CGBlog') && !$this->CheckPermission('Approve CGBlog') ) exit;

$filter = $dflt_filter = array('title'=>'','author'=>'','categories'=>array(),'pagelimit'=>25,'sortby'=>'cgblog_date DESC:[[3,1]]');
$tmp = cms_userprefs::get('cgblog_admin_filter');
if( $tmp ) $filter = unserialize($tmp);
$tablesorter = '[[3,1]]';

if( isset($params['submit_adjusttimes']) ) {
    if( !isset($params['sel']) || !is_array($params['sel']) || !count($params['sel']) ) {
        echo $this->ShowErrors($this->Lang('err_nothingselected'));
    }
    else {
        $this->redirect('m1_','admin_mass_adjusttimes',$returnid,array('sel'=>serialize($params['sel'])));
    }
}
else if (isset($params['submit_massdelete']) ) {
    if (!$this->CheckPermission('Delete CGBlog')) {
        echo $this->ShowErrors($this->Lang('needpermission', array('Delete CGBlog')));
    }
    else if( isset($params['sel']) && is_array($params['sel']) &&	count($params['sel']) > 0 ) {
        foreach( $params['sel'] as $cgblog_id ) {
            $this->delete_article( $cgblog_id );
        }
        echo $this->ShowMessage($this->Lang('msg_bulk_successful'));
    }
    else {
        echo $this->ShowErrors($this->Lang('err_nothingselected'));
    }
}
else if( isset($params['mass_addcategory']) ) {
    if( !$this->CheckPermission('Modify CGBlog') ) {
        echo $this->ShowErrors($this->Lang('needpermission', array('Modify CGBlog')));
    }
    else if( isset($params['sel']) && is_array($params['sel']) && count($params['sel']) && $params['mass_category'] > 0 ) {
        $cat_id = (int)$params['mass_category'];
        $query = 'INSERT INTO '.cms_db_prefix().'module_cgblog_blog_categories (blog_id,category_id) VALUES (?,?)';
        foreach( $params['sel'] as $cgblog_id ) {
            $dbr = $db->Execute($query,array($cgblog_id,$cat_id));
            // ignore errors here, as the item may already be in that category.
        }
        echo $this->ShowMessage($this->Lang('msg_bulk_successful'));
    }
    else {
        echo $this->ShowMessage($this->Lang('err_nothingselected'));
    }
}

if (isset($params['submitfilter'])) {
    if( isset($params['categories']) ) $filter['categories'] = $params['categories'];
    if( isset($params['filter_title']) ) $filter['title'] = trim($params['filter_title']);
    if( isset($params['filter_author']) ) $filter['author'] = trim($params['filter_author']);;
    if( isset($params['filter_pagelimit']) ) $filter['pagelimit'] = (int) $params['filter_pagelimit'];
    $filter['pagelimit'] = max(1,$filter['pagelimit']);
    if( isset($params['filter_sortby']) ) $filter['sortby'] = trim($params['filter_sortby']);
    cms_userprefs::set('cgblog_admin_filter',serialize($filter));
}
else if( isset($params['resetfilter']) ) {
    $filter = $dflt_filter;
    cms_userprefs::set('cgblog_admin_filter',serialize($filter));
}
list($sortby,$tablesorter) = explode(':',$filter['sortby'],2);

$categorylist = cgblog_ops::get_category_list(FALSE);
$pagenumber = 1;
if( isset( $params['pagenumber'] ) ) $pagenumber = $params['pagenumber'];
$startelement = ($pagenumber-1) * $filter['pagelimit'];

$sortlist = array();
$sortlist[$this->Lang('post_date_desc')]='cgblog_date DESC:[[3,1]]';
$sortlist[$this->Lang('post_date_asc')]='cgblog_date ASC:[[3,0]]';
$sortlist[$this->Lang('expiry_date_desc')]='end_time DESC:[[5,1]]';
$sortlist[$this->Lang('expiry_date_asc')]='end_time ASC:[[5,0]]';
$sortlist[$this->Lang('title_asc')] = 'cgblog_title ASC:[[0,0]]';
$sortlist[$this->Lang('title_desc')] = 'cgblog_title DESC:[[0,1]]';
$smarty->assign('sortings',array_flip($sortlist));

$smarty->assign('formstart',$this->CreateFormStart($id,'defaultadmin'));
$smarty->assign('formend',$this->CreateFormEnd());
$smarty->assign('filter',$filter);
$smarty->assign('filter_applied',($filter != $dflt_filter));
$smarty->assign('tablesorter',$tablesorter);
if( count($categorylist) ) $smarty->assign('categorylist',$categorylist);
$smarty->assign('pagelimits',array(5=>5,25=>25,50=>50,100=>100,500=>500,1000=>1000));

//
//Load the matching articles
//
$entryarray = array();
$dbresult = '';
$query1 = "SELECT n.* FROM ".cms_db_prefix()."module_cgblog n";
$query2 = "SELECT count(n.cgblog_id) AS count FROM ".cms_db_prefix()."module_cgblog n";
$parms = array();
$joins = array();
if( $filter['title'] ) {
    $query1 .= ' WHERE n.cgblog_title LIKE ?';
    $query2 .= ' WHERE n.cgblog_title LIKE ?';
    $parms[] = '%'.$filter['title'].'%';
}
if( $filter['author'] ) {
    $query1 .= ' WHERE n.author LIKE ?';
    $query2 .= ' WHERE n.author LIKE ?';
    $parms[] = '%'.$filter['author'].'%';
}
if (is_array($filter['categories']) && count($filter['categories'])) {
    $query1 .= ' LEFT OUTER JOIN '.cms_db_prefix().'module_cgblog_blog_categories bc ON n.cgblog_id = bc.blog_id';
    $query2 .= ' LEFT OUTER JOIN '.cms_db_prefix().'module_cgblog_blog_categories bc ON n.cgblog_id = bc.blog_id';
    $query1 .= " WHERE bc.category_id IN (".implode(',',$filter['categories']).')';
    $query2 .= " WHERE bc.category_id IN (".implode(',',$filter['categories']).')';
}
$query1 .= ' ORDER by '.$sortby;

// if is done to help adodb.
$numrows = -1;
$dbresult = $db->SelectLimit( $query1, $filter['pagelimit'], $startelement, $parms);
$row = $db->GetRow($query2,$parms);
$numrows = $row['count'];

$pagecount = (int)($numrows/$filter['pagelimit']);
if( ($numrows % $filter['pagelimit']) != 0 ) $pagecount++;
// some pagination variables to smarty.
if( $pagenumber == 1 ) {
    $smarty->assign('prevpage','<');
    $smarty->assign('firstpage','<<');
}
else {
    $smarty->assign('prevpage', $this->CreateLink($id,'defaultadmin', $returnid,'<',
    array('pagenumber'=>$pagenumber-1,'active_tab'=>'articles')));
    $smarty->assign('firstpage',$this->CreateLink($id,'defaultadmin',$returnid,'<<',
    array('pagenumber'=>1,'active_tab'=>'articles')));
}
if( $pagenumber >= $pagecount ) {
    $smarty->assign('nextpage','>');
    $smarty->assign('lastpage','>>');
}
else {
    $smarty->assign('nextpage', $this->CreateLink($id,'defaultadmin', $returnid,'>',
    array('pagenumber'=>$pagenumber+1, 'active_tab'=>'articles')));
    $smarty->assign('lastpage', $this->CreateLink($id,'defaultadmin', $returnid,'>>',
    array('pagenumber'=>$pagecount,'active_tab'=>'articles')));
}
$smarty->assign('pagenumber',$pagenumber);
$smarty->assign('pagecount',$pagecount);
$smarty->assign('oftext',$this->Lang('prompt_of'));
$rowclass = 'row1';

$admintheme = cms_utils::get_theme_object();
while ($dbresult && $row = $dbresult->FetchRow()) {
    if( isset($row['add_data']) ) $row['add_data'] = unserialize($row['add_data']);
    $onerow = new stdClass();

    $onerow->id = $row['cgblog_id'];
    $onerow->url = $row['url'];
    $onerow->author = $row['author'];
    $onerow->title = $row['cgblog_title'];
    $onerow->data = $row['cgblog_data'];
    $onerow->blasted = ( isset( $row['add_data']['blasted'] ) ) ? $row['add_data']['blasted'] : false;
    $onerow->expired = 0;
    $onerow->postdate = $row['cgblog_date'];
    $onerow->startdate = $row['start_time'];
    $onerow->enddate = $row['end_time'];
    $onerow->u_postdate = $db->UnixTimeStamp($row['cgblog_date']);
    $onerow->u_startdate = $db->UnixTimeStamp($row['start_time']);
    $onerow->u_enddate = $db->UnixTimeStamp($row['end_time']);
    $onerow->o_status = $row['status'];
    if( $onerow->u_enddate > 0 && $onerow->u_enddate < time() ) $onerow->expired = 1;
    $onerow->status = $this->Lang($row['status']);
    if( $this->CheckPermission('Approve CGBlog') ) {
        if( $row['status'] == 'published' ) {
            $onerow->approve_link = $this->CreateLink($id,'approvearticle',
            $returnid,
            $admintheme->DisplayImage('icons/system/true.gif',$this->Lang('revert'),'','','systemicon'),array('approve'=>0,'articleid'=>$row['cgblog_id']));
        }
        else if( $row['status'] == 'draft' ) {
            $onerow->approve_link = $this->CreateLink($id,'approvearticle',
            $returnid,
            $admintheme->DisplayImage('icons/system/false.gif',$this->Lang('approve'),'','','systemicon'),array('approve'=>1,'articleid'=>$row['cgblog_id']));
        }
    }
    $onerow->rowclass = $rowclass;

    $onerow->select = $this->CreateInputCheckbox($id,'sel[]',$row['cgblog_id']);
    if( $this->CheckPermission('Modify CGBlog') ) {
        $onerow->editlink = $this->CreateLink($id, 'admin_editarticle', $returnid, $admintheme->DisplayImage('icons/system/edit.gif', $this->Lang('edit'),'','','systemicon'),
        array('articleid'=>$row['cgblog_id']));
        $onerow->edit_url = $this->create_url($id,'admin_editarticle',$returnid,
        array('articleid'=>$row['cgblog_id']));
    }
    if( $this->CheckPermission('Delete CGBlog') ) {
        $onerow->deletelink = $this->CreateLink($id, 'deletearticle', $returnid, $admintheme->DisplayImage('icons/system/delete.gif', $this->Lang('delete'),'','','systemicon'),
        array('articleid'=>$row['cgblog_id']), $this->Lang('areyousure'));
    }

    $entryarray[] = $onerow;

    ($rowclass=="row1"?$rowclass="row2":$rowclass="row1");
}

$smarty->assign('items', $entryarray);
$smarty->assign('itemcount', count($entryarray));
$smarty->assign('add_url',$this->create_url($id,'admin_addarticle',$returnid));
$smarty->assign('addlink', $this->CreateLink($id, 'admin_addarticle', $returnid,
   $admintheme->DisplayImage('icons/system/newobject.gif', $this->Lang('addarticle'),'','','systemicon'), array(), '', false, false, '') .' '.
   $this->CreateLink($id, 'admin_addarticle', $returnid, $this->Lang('addarticle'), array(), '', false, false, 'class="pageoptions"'));

$smarty->assign('form2start',$this->CreateFormStart($id,'defaultadmin',$returnid));
$smarty->assign('form2end',$this->CreateFormEnd());
$smarty->assign('submit_reassign',$this->CreateInputSubmit($id,'submit_reassign',$this->Lang('submit')));
$smarty->assign('modify_cgblog',$this->CheckPermission('Modify CGBlog'));
if( $this->CheckPermission('Delete CGBlog') ) {
    $smarty->assign('submit_massdelete',
    $this->CreateInputSubmit($id,'submit_massdelete',$this->Lang('delete'),'','',$this->Lang('areyousure_deletemultiple')));
}

$smarty->assign('selecttext',$this->Lang('select'));
$smarty->assign('statustext',$this->Lang('status'));
$smarty->assign('startdatetext',$this->Lang('startdate'));
$smarty->assign('enddatetext',$this->Lang('enddate'));
$smarty->assign('titletext', $this->Lang('title'));
$smarty->assign('postdatetext', $this->Lang('postdate'));
$smarty->assign('authortext',$this->Lang('author'));
$blaster = cms_utils::get_module('CGSocialBlaster');
$smarty->assign('have_blaster',0);
$smarty->register_function( 'cgsb_call', [ 'cgblog_utils', 'plugin_cgsb_call'] );
if( is_object($blaster) ) {
    $smarty->assign('have_blaster',1);
    $smarty->assign('blaster_tag','{cgsocblaster module=CGBlog key=$entry->id}');
}

$themedir = $config['root_url'].'/'.$config['admin_dir'].'/themes/'.$admintheme->themeName.'/images/icons/system';
$smarty->assign('iconurl',$themedir);

#Display template
echo $this->ProcessTemplate('articlelist.tpl');

// EOF
?>
