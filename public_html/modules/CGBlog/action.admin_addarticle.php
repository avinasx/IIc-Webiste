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

//
// Initialize
//
$this->SetCurrentTab('articles');
if (isset($params['cancel'])) $this->Redirect($id, 'defaultadmin', $returnid);

$fielddefs = cgblog_ops::get_fielddefs(TRUE);
$detail_returnid = $this->GetPreference('default_detailpage',-1);
if( $detail_returnid <= 0 ) {
    // now get the default content id.
    $detail_returnid = ContentOperations::get_instance()->GetDefaultContent();
}
if( isset($params['previewpage']) && (int)$params['previewpage'] > 0 ) $detail_returnid = (int)$params['previewpage'];

$categorylist = cgblog_ops::get_category_list();

//
// Get Parameters
//
$content = '';
if (isset($params['content'])) $content = $params['content'];

$summary = '';
if (isset($params['summary'])) $summary = $params['summary'];

$status = $this->GetPreference('default_status','draft');
if (isset($params['status'])) $status = $params['status'];

$sel_categories = null;
if( ($tmp = $this->GetPreference('default_category')) ) $sel_categories = array($tmp);
if (isset($params['categories'])) $sel_categories = $params['categories'];

$postdate = time();
if (isset($params['postdate_Month'])) {
    $postdate = mktime($params['postdate_Hour'], $params['postdate_Minute'], 0,
                       $params['postdate_Month'], $params['postdate_Day'], $params['postdate_Year']);
}

$useexp = 0;
if (isset($params['useexp'])) $useexp = 1;

$userid = get_userid();
$userops = $gCms->GetUserOperations();
$userobj = $userops->LoadUserById($userid);
$username = $userobj->username;

$startdate = time();
if (isset($params['startdate_Month'])) {
    $startdate = mktime($params['startdate_Hour'], $params['startdate_Minute'], 0,
                        $params['startdate_Month'], $params['startdate_Day'], $params['startdate_Year']);
}
$ndays = (int)$this->GetPreference('expiry_interval',180);
if( $ndays == 0 ) $ndays = 180;
$enddate = strtotime(sprintf("+%d days",$ndays), time());
if (isset($params['enddate_Month'])) {
    $enddate = mktime($params['enddate_Hour'], $params['enddate_Minute'], 59,
                      $params['enddate_Month'], $params['enddate_Day'], $params['enddate_Year']);
}

$extra = '';
if (isset($params['extra'])) $extra = trim($params['extra']);

$title = '';
if (isset($params['title'])) $title = $params['title'];

$url = '';
if (isset($params['url'])) $url = $params['url'];

$error = FALSE;
if( isset($params['submit']) ) {
    $articleid = null;
    try {
        /*
        if( !isset($params['categories']) && count($categorylist) ) {
            throw new Exception($this->Lang('select_category'));
        }
        */
        if( empty($title) ) {
            throw new Exception($this->Lang('notitlegiven'));
        }
        else if( empty($content) ) {
            throw new Exception($this->Lang('nocontentgiven'));
        }
        else if( $useexp == 1 ) {
            if( $startdate >= $enddate ) throw new Exception($this->Lang('error_invaliddates'));
        }

        if( $url != '' ) {
            // check for starting or ending slashes
            if( startswith($url,'/') || endswith($url,'/') ) throw new Exception($this->Lang('error_invalidurl'));

            if( empty($error) ) {
                // check for invalid chars.
                $translated = munge_string_to_url($url,false,true);
                if( strtolower($translated) != strtolower($url) ) throw new Exception($this->Lang('error_invalidurl'));
            }

            // make sure this url isn't taken.
            $url = trim($url," /\t\r\n\0\x08");
            cms_route_manager::load_routes();
            $route = cms_route_manager::find_match($url);
            if( $route ) {
                // we're adding an article, not editing... any matching route is bad.
                throw new Exception($this->Lang('error_invalidurl'));
            }
        }

        //
        // database work
        //
        $articleid = $db->GenID(cms_db_prefix().'module_cgblog_seq');
        if( $articleid < 1 ) die('problem');
        $query = 'INSERT INTO '.cms_db_prefix().'module_cgblog (cgblog_id, cgblog_title, cgblog_data, summary, status,
                  cgblog_date, start_time, end_time, create_date, modified_date,author,cgblog_extra,url)
                  VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)';
        if ($useexp == 1) {
            $dbr = $db->Execute($query, array($articleid, $title, $content, $summary, $status, trim($db->DBTimeStamp($postdate), "'"), trim($db->DBTimeStamp($startdate), "'"), trim($db->DBTimeStamp($enddate), "'"), trim($db->DBTimeStamp(time()), "'"), trim($db->DBTimeStamp(time()), "'"), $username, $extra,$url));
        }
        else {
            $dbr = $db->Execute($query, array($articleid, $title, $content, $summary, $status, trim($db->DBTimeStamp($postdate), "'"), trim($db->DBTimeStamp($postdate), "'"), NULL, trim($db->DBTimeStamp(time()), "'"), trim($db->DBTimeStamp(time()), "'"), $username, $extra,$url));
        }
        if( !$dbr ) throw new Exception($db->ErrorMsg().' -- '.$db->sql);

        //
        // handle file uploads.
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
                }
                else if( $destname ) {
                    if( !isset($params['customfield']) ) $params['customfield'] = array();
                    $params['customfield'][$defn['id']] = $destname;
                }
                break;
            }
        }

        //
        // Handle the categories
        //
        if( is_array($sel_categories) && count($sel_categories) ) {
            $query = 'INSERT INTO '.cms_db_prefix().'module_cgblog_blog_categories (blog_id,category_id) VALUES (?,?)';
            foreach( $sel_categories as $one ) {
                $dbr = $db->Execute($query,array($articleid,$one));
                if( !$dbr ) throw new Exception($db->ErrorMsg().' -- '.$db->sql);
            }
        }

        //
        // Handle submitting the 'custom' fields
        //
        if( isset($params['customfield']) ) {
            $now = trim($db->DBTimeStamp(time()), "'");
            foreach( $params['customfield'] as $fldid => $value ) {
                if( $value == '' ) continue;

                $query = "INSERT INTO ".cms_db_prefix()."module_cgblog_fieldvals (cgblog_id,fielddef_id,value,create_date,modified_date) VALUES (?,?,?,?,?)";
                $dbr = $db->Execute($query, array($articleid, $fldid, $value, $now, $now));
                if( !$dbr ) throw new Exception($db->ErrorMsg().' -- '.$db->sql);
            }
        } // if

        if( $status == 'published' ) {
            //Update search index
            $module = cms_utils::get_search_module();
            if( $module ) {
                $fielddefs_by_id = cgblog_ops::get_fielddefs(FALSE,TRUE);
                $text = '';
                if( isset($params['customfield']) ) {
                    foreach( $params['customfield'] as $fldid => $value ) {
                        if( !isset($fielddefs_by_id[$fldid]) ) continue;
                        if( strlen($value) ) continue;
                        $text .= $value.' ';
                    }
                }

                $text .= $content.' '.$summary.' '.$title.' '.$title;
                $module->AddWords($this->GetName(), $articleid, 'cgblog', $text,
                                  ($useexp == 1 && $this->GetPreference('expired_searchable',0) == 0) ? $enddate : NULL);
            }
        }

        //
        // send event
        //
        @$this->SendEvent('CGBlogArticleAdded', array('cgblog_id' => $articleid, 'categories' => $sel_categories, 'title' => $title,
                                                      'content' => $content, 'summary' => $summary, 'status' => $status, 'start_time' => $startdate,
                                                      'end_time' => $enddate, 'useexp' => $useexp, 'extra' => $extra));

        $this->SetMessage($this->Lang('articleadded'));
        $this->RedirectToTab($id);
    }
    catch( Exception $e ) {
        $error = $e->GetMessage();
        if( $articleid ) $this->delete_article($articleid);
    }
} // submit.
else if( isset($params['preview']) ) {
    // save data for preview.
    unset($params['apply']); unset($params['preview']); unset($params['submit']); unset($params['cancel']); unset($params['ajsx']);

    $tmpfname = tempnam(TMP_CACHE_LOCATION,$this->GetName().'_preview');
    file_put_contents($tmpfname,serialize($params));

    $_SESSION['cgblog_preview'] = array('fname'=>basename($tmpfname),'checksum'=>md5_file($tmpfname));
    $tparms = array('preview'=>md5(serialize($_SESSION['cgblog_preview'])));
    if( isset($params['detailtemplate']) ) {
        $tparms['detailtemplate'] = trim($params['detailtemplate']);
    }
    $url = $this->create_url('_preview_','detail',$detail_returnid,$tparms,TRUE);

    $response = '<?xml version="1.0"?>';
    $response .= '<EditArticle>';
    if( isset($error) && $error != '' ) {
        $response .= '<Response>Error</Response>';
        $response .= '<Details><![CDATA['.$error.']]></Details>';
    }
    else {
        $response .= '<Response>Success</Response>';
        $response .= '<Details><![CDATA['.$url.']]></Details>';
    }
    $response .= '</EditArticle>';

    $handlers = ob_list_handlers();
    for ($cnt = 0; $cnt < sizeof($handlers); $cnt++) { ob_end_clean(); }
    header('Content-Type: text/xml');
    echo $response;
    exit;
}

if( $error ) echo $this->ShowErrors($error);

//
// build the form
//
$statusdropdown = array();
$statusdropdown[$this->Lang('draft')] = 'draft';
$statusdropdown[$this->Lang('review')] = 'review';
$statusdropdown[$this->Lang('published')] = 'published';

if( count($categorylist) ) {
    $smarty->assign('categorylist',$categorylist);
    $smarty->assign('sel_categories',$sel_categories);
}
$category_tree = cgblog_ops::get_category_tree();
if( count($category_tree) ) {
    $smarty->assign('category_tree',$category_tree);
}

#Display template
$smarty->assign('hide_summary_field',$this->GetPreference('hide_summary_field','0'));
$smarty->assign('hidden', '');
$smarty->assign('startform', $this->CreateFormStart($id, 'admin_addarticle', $returnid,'post','multipart/form-data'));
$smarty->assign('endform', $this->CreateFormEnd());
$smarty->assign('url',$url);
$smarty->assign('titletext', $this->Lang('title'));
$smarty->assign('title',$title);

$smarty->assign('extratext',$this->Lang('extra'));
$smarty->assign('inputextra',$this->CreateInputText($id,'extra',$extra,30,255));
$smarty->assign('extravalue',$extra);

$smarty->assign_by_ref('postdate', $postdate);
$smarty->assign('postdateprefix', $id.'postdate_');
$smarty->assign('inputexp', $this->CreateInputCheckbox($id, 'useexp', '1', $useexp, 'class="pagecheckbox"'));
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
$smarty->assign('submit', $this->CreateInputSubmit($id, 'submit', lang('submit')));
$smarty->assign('cancel', $this->CreateInputSubmit($id, 'cancel', lang('cancel')));

$smarty->assign('titletext', $this->Lang('title'));
$smarty->assign('categorytext', $this->Lang('category'));
$smarty->assign('summarytext', $this->Lang('summary'));
$smarty->assign('contenttext', $this->Lang('content'));
$smarty->assign('postdatetext', $this->Lang('postdate'));
$smarty->assign('useexpirationtext', $this->Lang('useexpiration'));
$smarty->assign('startdatetext', $this->Lang('startdate'));
$smarty->assign('enddatetext', $this->Lang('enddate'));

// Display custom fields
$custom_flds = array();
foreach( $fielddefs as $row ) {
    $obj = new StdClass();
    $name = "customfield[".$row['id']."]";
    $obj->prompt = $row['name'];
    $attrs = $row['attrs'];
    switch( $row['type'] ) {
    case 'textbox':
        $size = min(50,$attrs['max_length']);
        $obj->field = $this->CreateInputText($id,$name,'',$attrs['size'],$attrs['max_length']);
        break;
    case 'checkbox':
        $obj->field = $this->CreateInputHidden($id,$name,'0').$this->CreateInputCheckbox($id,$name,'1','0');
        break;
    case 'textarea':
        $obj->field = $this->CreateTextArea($attrs['textarea_wysiwyg'],$id,'',$name);
        break;
    case 'image_select':
        $filepicker = \cms_utils::get_filepicker_module();
        $profile = $filepicker->get_default_profile();
        $profile = $profile->overrideWith( ['type'=>'image'] );
        $obj->field = $filepicker->get_html( $id.$name, '', $profile, false );
        break;
    case 'file_select':
        $filepicker = \cms_utils::get_filepicker_module();
        $profile = $filepicker->get_default_profile();
        $obj->field = $filepicker->get_html( $id.$name, '', $profile, false );
        break;
    case 'file':
        $name = "customfield_".$row['id'];
        $obj->field = $this->CreateFileUploadInput($id,$name,'',50);
        break;
    case 'image':
        $name = "customfield_".$row['id'];
        $obj->field = $this->CreateFileUploadInput($id,$name,'',50);
        break;
    case 'image':
        break;
    }

    $custom_flds[] = $obj;
}
if( count($custom_flds) > 0 )  $smarty->assign('custom_fields',$custom_flds);

$url = $this->CreateURL($id,'ajax_geturl',$returnid);
$smarty->assign('ajax_get_url',$url);
$smarty->assign('content',$content);
$smarty->assign('summary',$summary);

// tab stuff.
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
