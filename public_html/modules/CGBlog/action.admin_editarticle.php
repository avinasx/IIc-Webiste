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
if (!$this->CheckPermission('Modify CGBlog')) return;
if (isset($params['cancel'])) $this->Redirect($id, 'defaultadmin', $returnid);
$this->SetCurrentTab('articles');


$fielddefs = cgblog_ops::get_fielddefs();
$detail_returnid = $this->GetPreference('default_detailpage',-1);
if( $detail_returnid <= 0 ) {
    // now get the default content id.
    $detail_returnid = ContentOperations::get_instance()->GetDefaultContent();
}
if( isset($params['previewpage']) && (int)$params['previewpage'] > 0 ) {
    $detail_returnid = (int)$params['previewpage'];
}

//
// Get parameters
//
$articleid = (int)cge_utils::get_param($params,'articleid');
$content = trim(cge_utils::get_param($params,'content'));
$summary = trim(cge_utils::get_param($params,'summary'));

$status = 'draft';
if( $this->CheckPermission('Approve CGBlog') ) $status = 'published';
$status = trim(cge_utils::get_param($params,'status'));

$sel_categories = array();
if( isset($params['categories']) ) $sel_categories = $params['categories'];
$author_id = cge_utils::get_param($params,'author');

$postdate = time();
if (isset($params['postdate_Month'])) {
	$postdate = mktime($params['postdate_Hour'], $params['postdate_Minute'], 0, $params['postdate_Month'], $params['postdate_Day'], $params['postdate_Year']);
}

$useexp = (int)cge_utils::get_param($params,'useexp');
$extra = trim(cge_utils::get_param($params,'extra'));

$startdate = time();
if (isset($params['startdate_Month'])) {
    $d = (isset($params['startdate_Day']))?$params['startdate_Day']:0;
    $mo = (isset($params['startdate_Month']))?$params['startdate_Month']:0;
    $y = (isset($params['startdate_Year']))?$params['startdate_Year']:0;
    $h = (isset($params['startdate_Hour']))?$params['startdate_Hour']:0;
    $mi = (isset($params['startdate_Minute']))?$params['startdate_Minute']:0;
    $s = (isset($params['startdate_Second']))?$params['startdate_Second']:0;
    $startdate = mktime($h,$mi,$s,$mo,$d,$y);
}

$enddate = strtotime('+6 months', time());
if (isset($params['enddate_Month'])) {
    $d = (isset($params['enddate_Day']))?$params['enddate_Day']:0;
    $mo = (isset($params['enddate_Month']))?$params['enddate_Month']:0;
    $y = (isset($params['enddate_Year']))?$params['enddate_Year']:0;
    $h = (isset($params['enddate_Hour']))?$params['enddate_Hour']:0;
    $mi = (isset($params['enddate_Minute']))?$params['enddate_Minute']:0;
    $s = (isset($params['enddate_Second']))?$params['enddate_Second']:0;
    $enddate = mktime($h,$mi,$s,$mo,$d,$y);
}


$title = trim(cge_utils::get_param($params,'title'));
$url = trim(cge_utils::get_param($params,'url'));

// get all the current field values
$query = 'SELECT * FROM '.cms_db_prefix().'module_cgblog_fieldvals WHERE cgblog_id = ?';
$cur_fieldvals = $db->GetArray($query,array($articleid));
if( is_array($cur_fieldvals) ) $cur_fieldvals = cge_array::to_hash($cur_fieldvals,'fielddef_id');


$error = FALSE;
if( isset($params['submit']) || isset($params['apply']) ) {
    $ajax = \cge_param::get_string($params,'ajax');
    try {
        if( empty($title) ) {
            throw new Exception($this->Lang('notitlegiven'));
        }
        else if( empty($content) ) {
            throw new Exception($this->Lang('nocontentgiven'));
        }
        else if( $useexp == 1 ) {
            if( $startdate >= $enddate ) throw new Exception($this->Lang('error_invaliddates'));
        }

        // double check that the URL is valid (or empty)}
        if( !$error && $url != '' ) {
            if( startswith($url,'/') || endswith($url,'/') ) throw new Exception($this->Lang('error_badurl'));
        }
        else {
            $tr = munge_string_to_url($url,false,true);
            if( strtolower($tr) != strtolower($url) ) throw new Exception($this->Lang('error_badurl'));
        }

        cms_route_manager::load_routes();
        $url = trim($url," /\t\r\n\0\x08");
        $route = cms_route_manager::find_match($url);
        if( $route ) {
            $dflts = $route->get_defaults();
            if( $route->is_content() || $route->get_dest() != $this->GetName() ||
                !isset($dflts['articleid']) ||
                $dflts['articleid'] != $articleid ) {
                // we're adding an article, not editing... any matching route is bad
                throw new Exception($this->Lang('error_urlused'));
            }
        }

        $startstr = trim($db->DBTimeStamp($postdate), "'");
        $endstr = NULL;
        if( $useexp ) {
            $startstr = trim($db->DBTimeStamp($startdate), "'");
            $endstr = trim($db->DBTimeStamp($enddate), "'");
        }

        //
        // database work
        //
        $query = 'UPDATE '.cms_db_prefix().'module_cgblog SET cgblog_title=?, cgblog_data=?, summary=?, status=?, cgblog_date=?, start_time=?,
                  end_time=?, modified_date=?, cgblog_extra=?, url=? WHERE cgblog_id = ?';
        if ($useexp == 1) {
            $dbr = $db->Execute($query, array($title, $content, $summary, $status, trim($db->DBTimeStamp($postdate), "'"),
                                              trim($db->DBTimeStamp($startdate), "'"), trim($db->DBTimeStamp($enddate), "'"),
                                              trim($db->DBTimeStamp(time()), "'"), $extra, $url, $articleid));

            if( !$dbr ) throw new Exception($db->ErrorMsg().' -- '.$db->sql);
        }
        else {
            $dbr = $db->Execute($query, array($title, $content, $summary, $status,
                                              trim($db->DBTimeStamp($postdate), "'"),
                                              $startstr, $endstr, trim($db->DBTimeStamp(time()), "'"),
                                              $extra, $url, $articleid) );
            if( !$dbr ) throw new Exception($db->ErrorMsg().' -- '.$db->sql);
        }

        //
        // Update Categories
        //
        $query = 'DELETE FROM '.cms_db_prefix().'module_cgblog_blog_categories WHERE blog_id = ?';
        $db->Execute($query,array($articleid));

        $query = 'INSERT INTO '.cms_db_prefix().'module_cgblog_blog_categories (blog_id,category_id) VALUES (?,?)';
        if( is_array($sel_categories) ) {
            foreach( $sel_categories as $catid ) {
                $dbr = $db->Execute($query,array($articleid,$catid));
                if( !$dbr ) throw new Exception($db->ErrorMsg().' -- '.$db->sql);
            }
        }

        //
        // handle file deletions
        //
        if( isset($params['delete_customfield']) && is_array($params['delete_customfield']) &&
            is_array($cur_fieldvals) ) {
            $dir = cms_join_path($config['uploads_path'],'cgblog','id'.$articleid);

            foreach( $params['delete_customfield'] as $k => $v ) {
                if( $v != 'delete' ) continue;
                if( !isset($cur_fieldvals[$k]) ) continue;

                $files = glob(cms_join_path($dir,'*'.$cur_fieldvals[$k]['value']));
                if( is_array($files) ) {
                    foreach( $files as $one ) {
                        @unlink($one);
                    }
                }

                unset($params['customfield'][$k]);
            }
        }

        //
        // handle file uploads
        //
        $tmp_error = '';
        foreach( $fielddefs as $defn ) {
            switch( $defn['type'] ) {
            case 'file':
                $destname = cgblog_utils::handle_uploaded_file($id,$articleid,$defn['id'],$defn['attrs'],$tmp_error);
                if( $tmp_error && !$destname ) {
                    throw new Exception($tmp_error);
                }
                else if( $destname ) {
                    if( !isset($params['customfield']) ) $params['customfield'] = array();
                    $params['customfield'][$defn['id']] = $destname;
                }
                break;

            case 'image':
                $destname = cgblog_utils::handle_uploaded_image($id,$articleid,$defn['id'],$defn['attrs'],$tmp_error);
                if( $tmp_error && !$destname ) {
                    throw new Exception($tmp_error);
                    break;
                }
                else if( $destname ) {
                    if( !isset($params['customfield']) ) $params['customfield'] = array();
                    $params['customfield'][$defn['id']] = $destname;
                }
                break;
            }
        }

        //
        // Update custom fields
        //

        // delete all the field values for this entry.
        $query = 'DELETE FROM '.cms_db_prefix().'module_cgblog_fieldvals WHERE cgblog_id = ?';
        $dbr = $db->Execute($query,array($articleid));

        // now do the insertions.
        if( isset($params['customfield']) && is_array($params['customfield']) ) {
            $query = 'INSERT INTO '.cms_db_prefix().'module_cgblog_fieldvals (cgblog_id,fielddef_id,value) VALUES (?,?,?)';
            foreach( $params['customfield'] as $fldid => $value ) {
                $value = trim($value);
                if( $value == '' ) continue;

                $db->Execute($query,array($articleid,$fldid,$value));
            }
        }

        //
        // Update search index
        //
        $module = cms_utils::get_search_module();
        if( $module ) {
            if( $status == 'draft' ) {
                $module->DeleteWords($this->GetName(),$articleid,'cgblog');
            }
            else {
                $fielddefs_by_id = cgblog_ops::get_fielddefs(FALSE,TRUE);
                if( !$useexp || ($enddate > time()) || $this->GetPreference('expired_searchable',1) == 1 ) $text = '';
                if( isset($params['customfield']) ) {
                    foreach( $params['customfield'] as $fldid => $value ) {
                        if( !isset($fielddefs_by_id[$fldid]) ) continue;
                        if( strlen($value) > 1 ) $text .= $value.' ';
                    }
                }
                $text .= $content.' '.$summary.' '.$title.' '.$title;
                $module->AddWords($this->GetName(), $articleid, 'cgblog', $text,
                                  ($useexp == 1 && $this->GetPreference('expired_searchable',0) == 0) ? $enddate : NULL);
            }
        }

        @$this->SendEvent('CGBlogArticleEdited', array('cgblog_id' => $articleid, 'categories' => $sel_categories, 'title' => $title, 'content' => $content, 'summary' => $summary, 'status' => $status, 'start_time' => $startdate, 'end_time' => $enddate, 'extra' => $extra, 'useexp' => $useexp, 'url' => $url));

        if( isset($params['submit']) ) {
            $this->SetMessage($this->Lang('articleupdated'));
            $this->RedirectToTab();
        }
    }
    catch( Exception $e ) {
        $error = $e->GetMessage();
    }

    if( $ajax ) {
        $out = array('response'=>'Success');
        if( $error ) {
            $out['response']='Error';
            $out['details'] = $error;
        }
        \cge_utils::send_ajax_and_exit($out);
    }
} // submit or apply

if( $error ) echo $this->ShowErrors($error);

if( !$error && isset($params['preview']) ) {
    // save data for preview.
    unset($params['apply']); unset($params['preview']); unset($params['submit']); unset($params['cancel']); unset($params['ajsx']);

    $tmpfname = tempnam(TMP_CACHE_LOCATION,$this->GetName().'_preview');
    file_put_contents($tmpfname,serialize($params));

    $_SESSION['cgblog_preview'] = array('fname'=>basename($tmpfname),'checksum'=>md5_file($tmpfname));
    $tparms = array('preview'=>md5(serialize($_SESSION['cgblog_preview'])));
    if( isset($params['detailtemplate']) ) $tparms['detailtemplate'] = trim($params['detailtemplate']);
    $url = $this->create_url('_preview_','detail',$detail_returnid,$tparms,TRUE);

    $out = array('response'=>'Success','details'=>$url);
    if( $error ) {
         $out['response']='Error';
         $out['details'] = $error;
    }
    \cge_utils::send_ajax_and_exit($out);
}
else {
    //
    // Load data from database
    //
    $query = 'SELECT * FROM '.cms_db_prefix().'module_cgblog WHERE cgblog_id = ?';
    $row = $db->GetRow($query, array($articleid));

    if ($row) {
        $title = $row['cgblog_title'];
        $url = $row['url'];
        $content = $row['cgblog_data'];
        $extra = $row['cgblog_extra'];
        $summary = $row['summary'];
        $status = $row['status'];
        $postdate = $db->UnixTimeStamp($row['cgblog_date']);
        $startdate = $db->UnixTimeStamp($row['start_time']);
        $author = $row['author'];
        if (isset($row['end_time'])) {
            $useexp = 1;
            $enddate = $db->UnixTimeStamp($row['end_time']);
        }
        else {
            $useexp = 0;
        }

        $query = 'SELECT category_id FROM '.cms_db_prefix().'module_cgblog_blog_categories WHERE blog_id = ?';
        $tmp = $db->GetArray($query,array($articleid));
        if( $tmp ) $sel_categories = cge_array::extract_field($tmp,'category_id');
    }
}

$statusdropdown = array();
$statusdropdown[$this->Lang('draft')] = 'draft';
$statusdropdown[$this->Lang('review')] = 'review';
$statusdropdown[$this->Lang('published')] = 'published';

$categorylist = cgblog_ops::get_category_list();
if( count($categorylist) ) {
    $smarty->assign('categorylist',$categorylist);
    $smarty->assign('sel_categories',$sel_categories);
}
$category_tree = cgblog_ops::get_category_tree();
if( count($category_tree) ) $smarty->assign('category_tree',$category_tree);

$smarty->assign('startform', $this->CreateFormStart($id, 'admin_editarticle', $returnid,'post','multipart/form-data'));
$smarty->assign('endform', $this->CreateFormEnd());
$smarty->assign('hide_summary_field',$this->GetPreference('hide_summary_field','0'));
$smarty->assign('authortext', $this->Lang('author'));
$smarty->assign('titletext', $this->Lang('title'));
$smarty->assign('extratext',$this->Lang('extra'));
$smarty->assign('inputextra',$this->CreateInputText($id,'extra',$extra,30,255));
$smarty->assign('extravalue',$extra);

$smarty->assign('url',$url);
$smarty->assign('title',$title);
$smarty->assign('inputexp', $this->CreateInputCheckbox($id, 'useexp', '1', $useexp, 'class="pagecheckbox"'));
$smarty->assign_by_ref('postdate', $postdate);
$smarty->assign('postdateprefix', $id.'postdate_');
$smarty->assign_by_ref('startdate', $startdate);
$smarty->assign('startdateprefix', $id.'startdate_');
$smarty->assign_by_ref('enddate', $enddate);
$smarty->assign('enddateprefix', $id.'enddate_');
if( $this->CheckPermission('Approve CGBlog') ) {
    $smarty->assign('statustext', lang('status'));
    $smarty->assign('status', $this->CreateInputDropdown($id, 'status', $statusdropdown, -1, $status));
}
else {
    $smarty->assign('status',$this->CreateInputHidden($id,'status',$status));
}
$smarty->assign('inputauthor',$author);
$smarty->assign('articleid',$articleid);
$smarty->assign('hidden', $this->CreateInputHidden($id, 'articleid', $articleid).$this->CreateInputHidden($id, 'author', $author));
$smarty->assign('submit', $this->CreateInputSubmit($id, 'submit', lang('submit')));
$smarty->assign('apply', $this->CreateInputSubmit($id, 'apply', lang('apply')));
$smarty->assign('cancel', $this->CreateInputSubmit($id, 'cancel', lang('cancel')));

$smarty->assign('titletext', $this->Lang('title'));
$smarty->assign('extratext',$this->Lang('extra'));
$smarty->assign('categorytext', $this->Lang('category'));
$smarty->assign('summarytext', $this->Lang('summary'));
$smarty->assign('contenttext', $this->Lang('content'));
$smarty->assign('postdatetext', $this->Lang('postdate'));
$smarty->assign('useexpirationtext', $this->Lang('useexpiration'));
$smarty->assign('startdatetext', $this->Lang('startdate'));
$smarty->assign('enddatetext', $this->Lang('enddate'));

//
// Display custom fields
//

// Get the field values
$fieldvals = array();
$query = 'SELECT * FROM '.cms_db_prefix().'module_cgblog_fieldvals WHERE cgblog_id = ?';
$tmp = $db->GetArray($query,array($articleid));
if( is_array($tmp) ) {
    foreach( $tmp as $one ) {
        $fieldvals[$one['fielddef_id']] = $one;
    }
}

$custom_flds = array();
foreach( $fielddefs as $row ) {
    $value = '';
    if( isset($fieldvals[$row['id']]) )	$value = $fieldvals[$row['id']]['value'];
    $attrs = $row['attrs'];
    $obj = new StdClass();
    $name = "customfield[".$row['id']."]";
    $obj->name = $name;
    $obj->prompt = $row['name'];
    $obj->value = $value;
    switch( $row['type'] ) {
    case 'textbox':
        $size = (isset($attrs['size']) && $attrs['size'] > 0)?$attrs['size']:50;
        $max_length = (isset($attrs['max_length']) && $attrs['max_length'] > 0)?$attrs['max_length']:255;
        $obj->field = $this->CreateInputText($id,$name,$value,$size,$max_length);
        break;
    case 'checkbox':
        $obj->field = $this->CreateInputHidden($id,$name,'0').$this->CreateInputCheckbox($id,$name,'1',$value);
        break;
    case 'textarea':
        $wysiwyg = (isset($attrs['textarea_wysiwyg']))?$attrs['textarea_wysiwyg']:0;
        $obj->field = $this->CreateTextArea($wysiwyg,$id,$value,$name);
        break;
    case 'image_select':
        $filepicker = \cms_utils::get_filepicker_module();
        $profile = $filepicker->get_default_profile();
        $profile = $profile->overrideWith( ['type'=>'image'] );
        $obj->field = $filepicker->get_html( $id.$name, $value, $profile, false );
        break;
    case 'file_select':
        $filepicker = \cms_utils::get_filepicker_module();
        $profile = $filepicker->get_default_profile();
        $obj->field = $filepicker->get_html( $id.$name, $value, $profile, false );
        break;
    case 'file':
    case 'image':
        $name = "customfield_".$row['id'];
        $del = '';
        $path = $config['uploads_path']."/cgblog/id{$articleid}";
        if( is_dir($path) ) $obj->fileurl_base = $config['uploads_url']."/cgblog/id{$articleid}";
        if( $value != '' ) {
            $deln = 'delete_customfield['.$row['id'].']';
            $del = '&nbsp;'.$this->Lang('delete').$this->CreateInputCheckbox($id,$deln,'delete');
        }
        $obj->field = $this->CreateInputHidden($id,$obj->name,$value);
        $obj->field .= $value.'&nbsp;'.$del.'<br/>'.$this->CreateFileUploadInput($id,$name,'',40);
        break;
    }

    $custom_flds[] = $obj;
}
if( count($custom_flds) > 0 ) $smarty->assign('custom_fields',$custom_flds);

$url = $this->CreateURL($id,'ajax_geturl',$returnid);
$smarty->assign('ajax_get_url',$url);

// tab stuff.
$smarty->assign('content',$content);
$smarty->assign('summary',$summary);
$smarty->assign('start_tab_headers',$this->StartTabHeaders());
$smarty->assign('tabheader_article',$this->SetTabHeader('article',$this->Lang('article')));
$smarty->assign('tabheader_preview',$this->SetTabHeader('preview',$this->Lang('tab_preview')));
$smarty->assign('end_tab_headers',$this->EndTabHeaders());

$smarty->assign('start_tab_content',$this->StartTabContent());
$smarty->assign('start_tab_article',$this->StartTab('article',$params));
$smarty->assign('end_tab_article',$this->EndTab());
$smarty->assign('start_tab_preview',$this->StartTab('preview',$params));
$smarty->assign('end_tab_preview',$this->EndTab());
$smarty->assign('end_tab_content',$this->EndTabContent());

$smarty->assign('warning_preview',$this->Lang('warning_preview'));
$contentops = cmsms()->GetContentOperations();
$smarty->assign('preview_returnid',	$contentops->CreateHierarchyDropdown('',$detail_returnid,'preview_returnid'));
{
  $tmp = $this->ListTemplates();
  $tmp2 = array();
  for( $i = 0; $i < count($tmp); $i++ ) {
      if( startswith($tmp[$i],'detail') ) {
          $x = substr($tmp[$i],6);
          $tmp2[$x] = $x;
      }
  }
  $smarty->assign('prompt_detail_template',$this->Lang('detail_template'));
  $smarty->assign('prompt_detail_page',$this->Lang('detail_page'));
  $smarty->assign('detail_templates',$tmp2);
  $smarty->assign('cur_detail_template',$this->GetPreference('current_detail_template'));
}

echo $this->ProcessTemplate('editarticle.tpl');
?>