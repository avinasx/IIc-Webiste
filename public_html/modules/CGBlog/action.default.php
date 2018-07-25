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

//stack_trace(); die();
$showdraft = 0;
$showall = (int) $this->GetPreference('default_showall',0);
$showarchive = (int) $this->GetPreference('default_showarchive',0);
$sortorder = $this->GetPreference('default_sortorder','desc');
$sortby = $this->GetPreference('default_sortby','cgblog_date');
$pagelimit = (int) $this->GetPreference('default_pagelimit',100000);
$childcats = !cms_to_bool(cge_utils::get_param($params,'nochildren',0));

{
    // if the user is logged in, and a member of the proper group... and the showdraft param is supplied
    // allow showing draft articles.
    $feu = cge_utils::get_module('FrontEndUsers');
    $gid = $this->GetPreference('fesubmit_draftviewers',-1);
    if( $feu && $gid > 0 ) {
        if( $feu->MemberOfGroup($feu->LoggedInId(),$gid) ) $showdraft = \cge_param::get_bool($params,'showdraft');
    }
}

// Display template
debug_buffer('Start CGBlog summary view');
$cache_id = '|cgb'.md5(serialize($params).$showdraft);
$template = \cge_param::get_string($params,'summarytemplate',$this->GetPreference('current_summary_template'));
$tpl = $this->CreateSmartyTemplate($template,'summary',$cache_id);
if( !$tpl->isCached() ) {
    if( isset($params['showall']) && $params['showall'] ) $showall = 1;

    $detailpage = cgblog_utils::get_detailpage($returnid,$params);
    $entryarray = array();
    $parms = array();
    $joins = array();
    $where = array();
    $fielddefs = cgblog_ops::get_fielddefs(FALSE,TRUE);

    $query1 = "SELECT DISTINCT mn.* FROM ". cms_db_prefix() . "module_cgblog mn";
    $query2 = "SELECT count(DISTINCT mn.cgblog_id) as count FROM " . cms_db_prefix() . "module_cgblog mn";
    if( !$showall ) {
        if( $showdraft ) {
            $where[] = "status != ?";
            $parms[] = 'published';
        }
        else {
            $where[] = "status = ?";
            $parms[] = 'published';
        }
    }

    if( isset($params['sortby']) ) $sortby = trim($params['sortby']);
    if( isset($params['sortasc']) ) {
        $sortorder = 'desc';
        $tmp = cge_utils::to_bool($params['sortasc']);
        if( $tmp ) $sortorder = 'asc';
    }

    if( isset($params['year']) ) {
        $smonth = 1;
        $emonth = 12;
        $sday = 1;
        $eday = 31;

        if( isset($params['month']) ) {
            $smonth = (int)$params['month'];
            $emonth = (int)$params['month'];
            $eday = date('t',mktime(0,0,0,$smonth,$sday,$params['year']));
        }
        $t1 = mktime(0,0,0,$smonth,$sday,$params['year']);
        $t1_d = $db->DbTimeStamp($t1);
        $t2 = mktime(23,59,0,$emonth,$eday,$params['year']);
        $t2_d = $db->DbTimeStamp($t2);
        $where[] = "(mn.start_time BETWEEN $t1_d and $t2_d)";
    }
    else if( !$showall ) {
        $where[] = "( COALESCE(start_time,@CG_ZEROTIME) < NOW() )";
    }

    if (isset($params['author']) && $params['author'] != '' ) {
        // filter by username.
        $feu = cge_utils::get_module('FrontEndUsers');
        if( !$feu ) return false; // no feu modules, therefore no results.

        $user = cms_html_entity_decode(trim($params['author']));
        $users = explode(',',$user);
        for( $i = 0; $i < count($users); $i++ ) {
            $users[$i] = "'".trim($users[$i])."'";
        }
        $tmp = implode(',',$users);
        // make sure we're exluding expired users.
        $query = 'SELECT username FROM '.cms_db_prefix().'module_feusers_users WHERE username IN ('.$tmp.') AND expires > NOW()';
        $tmp = $db->GetCol($query);
        if( !is_array($tmp) ) return; // get outa here... no matching users.

        for( $i = 0; $i < count($tmp); $i++ ) {
            $tmp[$i] = "'".trim($tmp[$i])."'";
        }
        $where[] = "mn.author IN (".implode(',',$tmp).')';
    }

    if( isset($params['admin_user']) && $params['admin_user'] != '' ) {
        $user = cms_html_entity_decode(trim($params['admin_user']));
        $users = explode(',',$user);
        for( $i = 0; $i < count($users); $i++ ) {
            $users[$i] = "'".trim($users[$i])."'";
        }
        $tmp = implode(',',$users);

        // make sure we're exluding expired users.
        $query = 'SELECT username FROM '.cms_db_prefix().'users WHERE ((username IN ('.$tmp.')) OR  (email IN ('.$tmp.'))) AND active = 1';
        $tmp = $db->GetCol($query);
        if( !is_array($tmp) ) return; // get outa here... no matching users.

        for( $i = 0; $i < count($tmp); $i++ ) {
            $val = $tmp[$i];
            $tmp[$i] = "'".trim($val)."'";
        }
        $where[] = "mn.author IN (".implode(',',$tmp).')';
    }

    $title = trim(cge_utils::get_param($params,'title'));
    if( $title ) {
        $where[] = 'mn.cgblog_title LIKE ?';
        $parms[] = '%'.$title.'%';
    }

    if (isset($params["category"]) && $params["category"] != '') {
        // only show results from these (comma separated) category names.
        $category = cms_html_entity_decode(trim($params['category']));
        $categories = explode(',', $category);

        $list = cgblog_ops::get_categories_from_names($categories,$childcats);
        if( !count($list) ) return;

        $joins[] = "LEFT OUTER JOIN ".cms_db_prefix().'module_cgblog_blog_categories bc ON mn.cgblog_id = bc.blog_id';
        $where[] = "bc.category_id IN (".implode(',',$list).')';
    }
    else if( isset($params['notcategory']) && $params['notcategory'] != '' ) {
        // do not show any results from these (comma separated) category names.
        $ncategory = cms_html_entity_decode(trim($params['notcategory']));
        $ncategories = explode(',', $ncategory);

        $list = cgblog_ops::get_categories_from_names($ncategories,$childcats);
        if( count($list) ) {
            $joins[] = "LEFT OUTER JOIN ".cms_db_prefix().'module_cgblog_blog_categories bc ON mn.cgblog_id = bc.blog_id';
            $where[] = "bc.category_id NOT IN (".implode(',',$list).')';
        }
    }
    else if( isset($params['category_id']) ) {
        // a single category passed in.
        $tmp = (int)$params['category_id'];
        $cat = cgblog_ops::get_category($tmp);
        if( !is_array($cat) ) return;

        $joins[] = "LEFT OUTER JOIN ".cms_db_prefix().'module_cgblog_blog_categories bc ON mn.cgblog_id = bc.blog_id';
        $where[] = "bc.category_id = (?)";
        $parms[] = $cat['id'];
    }

    if( isset($params['showarchive']) && $params['showarchive'] ) $showarchive = 1;

    if( !$showall ) {
        if ($showarchive) {
            // get articles that are expired
            $where[] = "(end_time < NOW())";
        }
        else {
            // get articles with either no expiry, or an end time greater than now
            $where[] = '( (COALESCE(end_time,@CG_ZEROTIME) = @CG_ZEROTIME) OR (end_time > NOW()) )';
        }
    }


    //
    // final query assemby
    //
    if( count($joins) ) {
        $query1 .= " ".implode(" ",$joins);
        $query2 .= " ".implode(" ",$joins);
    }
    if( count($where) ) {
        $query1 .= " WHERE ".implode(" AND ",$where);
        $query2 .= " WHERE ".implode(" AND ",$where);
    }
    $query1 .= " ";
    $sortrandom = false;
    $append_date = FALSE;

    // sortby.
    switch( $sortby ) {
    case 'cgblog_category':
        $query1 .= "ORDER BY long_name ";
        $append_date = TRUE;
        break;

    case 'random':
        $query1 .= ' ORDER BY RAND() ';
        break;

    case 'cgblog_date':
        $query1 .= "ORDER BY mn." . str_replace("'", '', str_replace(';', '', $db->qstr($sortby)));
        break;

    case 'cgblog_title':
    case 'summary':
    case 'start_time':
    case 'end_time':
    case 'cgblog_extra':
        $query1 .= "ORDER BY mn." . str_replace("'", '', str_replace(';', '', $db->qstr($sortby)));
        $append_date = TRUE;
        break;

    default:
        $query1 .= 'ORDER BY mn.cgblog_date DESC ';
        break;
    }
    $query1 .= ' '.$sortorder;
    if( $append_date ) $query1 .= ', mn.cgblog_date DESC';

    if( isset( $params['pagelimit'] ) ) {
        $pagelimit = (int) $params['pagelimit'];
    }
    else if( isset( $params['number'] ) ) {
        $pagelimit = (int) $params['number'];
    }

    // Get the number of rows (so we can determine the numer of pages)
    $pagecount = -1;
    $startelement = 0;
    $pagenumber = 1;
    {
        // get the total number of items that match the query
        // and determine a number of pages
        $row2 = $db->GetRow($query2,$parms);
        $count = intval($row2['count']);
        if( isset( $params['start'] ) ) $count -= (int)$params['start'];
        $pagecount = (int)($count / $pagelimit);
        if( ($count % $pagelimit) != 0 ) $pagecount++;
    }
    if( isset( $params['pagenumber'] ) && $params['pagenumber'] != '' ) {
        // if given a page number, determine a start element
        $pagenumber = (int)$params['pagenumber'];
        $startelement = ($pagenumber-1) * $pagelimit;
    }
    if( isset( $params['start'] ) ) $startelement = $startelement + (int)$params['start'];

    // Assign some pagination variables to smarty
    if( $pagenumber == 1 ) {
        $tpl->assign('prevpage',$this->Lang('prevpage'));
        $tpl->assign('firstpage',$this->Lang('firstpage'));
    }
    else {
        $params['pagenumber']=$pagenumber-1;
        $tpl->assign('prevpage',$this->CreateFrontendLink($id,$returnid,'default',$this->Lang('prevpage'),$params));
        $tpl->assign('prevurl',$this->CreateFrontendLink($id,$returnid,'default','',$params, '', true));
        $params['pagenumber']=1;
        $tpl->assign('firstpage',$this->CreateFrontendLink($id,$returnid,'default',$this->Lang('firstpage'),$params));
        $tpl->assign('firsturl',$this->CreateFrontendLink($id,$returnid,'default','',$params, '', true));
    }

    if( $pagenumber >= $pagecount ) {
        $tpl->assign('nextpage',$this->Lang('nextpage'));
        $tpl->assign('lastpage',$this->Lang('lastpage'));
    }
    else {
        $params['pagenumber']=$pagenumber+1;
        $tpl->assign('nextpage',$this->CreateFrontendLink($id,$returnid,'default',$this->Lang('nextpage'),$params));
        $tpl->assign('nexturl',$this->CreateFrontendLink($id,$returnid,'default','',$params, '', true));
        $params['pagenumber']=$pagecount;
        $tpl->assign('lastpage',$this->CreateFrontendLink($id,$returnid,'default',$this->Lang('lastpage'),$params));
        $tpl->assign('lasturl',$this->CreateFrontendLink($id,$returnid,'default','',$params, '', true));
    }
    $tpl->assign('pagenumber',$pagenumber);
    $tpl->assign('pagecount',$pagecount);
    $tpl->assign('oftext',$this->Lang('prompt_of'));
    $tpl->assign('pagetext',$this->Lang('prompt_page'));

    $dbresult = '';
    $dbresult = $db->SelectLimit( $query1,$pagelimit,$startelement,$parms);

    // get the idlist
    $article_ids = array();
    while( $dbresult && !$dbresult->EOF() ) {
        $article_ids[] = $dbresult->fields['cgblog_id'];
        $dbresult->MoveNext();
    }
    $dbresult->MoveFirst();

    $fieldvals = array();
    $catvals = array();
    if( count($article_ids) ) {
        // get the fieldvals for the idlist
        $query = 'SELECT cgblog_id,fielddef_id,value FROM '.cms_db_prefix().'module_cgblog_fieldvals
              WHERE cgblog_id IN ('.implode(',',$article_ids).')
              ORDER BY cgblog_id, fielddef_id';
        $tmp = $db->GetArray($query);
        if( is_array($tmp) && count($tmp) ) {
            foreach( $tmp as $row ) {
                if( !isset($fieldvals[$row['cgblog_id']]) ) $fieldvals[$row['cgblog_id']] = array();
                $fieldvals[$row['cgblog_id']][] = $row;
            }
        }

        // get the categories for the idlist
        $query = 'SELECT blog_id,category_id FROM '.cms_db_prefix().'module_cgblog_blog_categories
              WHERE blog_id IN ('.implode(',',$article_ids).') ORDER BY blog_id, category_id';
        $tmp = $db->GetArray($query);
        if( is_array($tmp) && count($tmp) ) {
            foreach( $tmp as $row ) {
                if( !isset($catvals[$row['blog_id']]) ) $catvals[$row['blog_id']] = array();
                $catvals[$row['blog_id']][] = $row;
            }
        }
    }

    while( !$dbresult->EOF() ) {
        $row = $dbresult->fields;
        $onerow = new stdClass();

        $onerow->author = $row['author'];
        $onerow->id = $row['cgblog_id'];
        $onerow->title = $row['cgblog_title'];
        $onerow->content = $row['cgblog_data'];
        $onerow->summary = (trim($row['summary'])!='<br/>'?$row['summary']:'');
        $onerow->postdate = $row['cgblog_date'];
        $onerow->url = $row['url'];
        if( FALSE == empty($row['cgblog_extra']) ) $onerow->extra = $row['cgblog_extra'];
        $onerow->postdate = $row['cgblog_date'];
        $onerow->startdate = $row['start_time'];
        $onerow->enddate = $row['end_time'];
        $onerow->create_date = $row['create_date'];
        $onerow->modified_date = $row['modified_date'];
        $onerow->file_location = $config['uploads_url']."/cgblog/id{$row['cgblog_id']}";

        //
        // Handle categories
        //
        $onerow->categories = array();
        if( isset($catvals[$row['cgblog_id']]) ) {
            $cats = array();
            $catlist = array();
            foreach( $catvals[$row['cgblog_id']] as $catrec ) {
                $_cat = cgblog_ops::get_category($catrec['category_id']);
                if( !is_array($_cat) ) continue;
                $tmp = array();
                $tmp['id'] = $catrec['category_id'];
                $tmp['name'] = $_cat['name'];
                $cats[] = $tmp;
                $catlist[] = $tmp['id'];
            }
            $onerow->categories = $cats;
            $onerow->categorylist = $catlist;
        }

        //
        // Handle the custom fields
        //
        $onerow->fields = array();
        $onerow->fieldsbyname = array();
        $fields = array();
        if( isset($fieldvals[$row['cgblog_id']]) ) {
            foreach( $fieldvals[$row['cgblog_id']] as $rec ) {
                if( !isset($fielddefs[$rec['fielddef_id']]) ) continue;

                $fd = $fielddefs[$rec['fielddef_id']];
                $obj = new StdClass;
                $obj->name = $fd['name'];
                $obj->type = $fd['type'];
                $obj->value = $rec['value'];
                $fields[$obj->name] = $obj;
            }
        }
        $onerow->fieldsbyname = $fields;
        $onerow->fields = $fields;

        $sendtodetail = array('articleid'=>$row['cgblog_id']);
        $prettyurl = $onerow->url;
        if( $prettyurl == '' ) {
            $aliased_title = munge_string_to_url($row['cgblog_title']);
            if( $this->GetPreference('default_detailpage',-1) != -1 && !isset($params['detailpage']) ) {
                $prettyurl = $this->GetPreference('urlprefix','cgblog').'/'.$row['cgblog_id']."/$aliased_title";
            }
            else {
                $prettyurl = $this->GetPreference('urlprefix','cgblog').'/'.$row['cgblog_id'].'/'.$detailpage."/$aliased_title";
            }
        }

        $onerow->detail_url = $this->CreateLink($id, 'detail', $detailpage, '', $sendtodetail,'', true, false, '', true, $prettyurl);
        $entryarray[]= $onerow;

        // to the next row.
        $dbresult->MoveNext();
    } // while

    // give everything to smarty.
    $tpl->assign('itemcount', count($entryarray));
    $tpl->assign('items', $entryarray);
    $tpl->assign('category_label', $this->Lang('category_label'));
    $tpl->assign('author_label', $this->Lang('author_label'));

    $statusdropdown = array();
    $statusdropdown[$this->Lang('draft')] = 'draft';
    $statusdropdown[$this->Lang('published')] = 'published';
    $statusdropdown = array_flip($statusdropdown);
    $tpl->assign('statusopts',$statusdropdown);

    foreach( $params as $key => $value ) {
        if( $key == 'mact' || $key == 'action' ) continue;
        $tpl->assign('param_'.$key,$value);
    }
}
$tpl->display();
debug_buffer('End CGBlog summary view');

#
# EOF
#
?>
