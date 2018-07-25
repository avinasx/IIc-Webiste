<?php
if (!$gCms)
	exit();

if (!$this->CheckPermission('Use Gallery'))
{
	echo $this->ShowErrors(lang('needpermissionto', 'Use Gallery'));
	return;
}

$admintheme = cms_utils::get_theme_object();


// check parameters
if (!isset($params['gid']) || !isset($params['mode']))
{
	$params['module_error'] = lang('missingparams');
	$this->Redirect($id, 'defaultadmin', '', $params);
	return;
}

$params['origaction'] = $params['action'];

$galleryinfo = Gallery_utils::Getgalleryinfobyid($params['gid']);

// check permission to edit
$userid = get_userid();
$editors = explode(';', $galleryinfo['editors']);
if ($this->CheckPermission('Gallery - Edit all galleries') || Gallery_utils::CheckEditor($userid, $params['gid'], $editors))
{
	$permission_to_edit = TRUE;
  $permission_to_delete = $this->CheckPermission('Gallery - Delete subgalleries') ? TRUE : FALSE;
	$disabled = '';
}
else
{
	$permission_to_edit = FALSE;
  $permission_to_delete = FALSE;
	$disabled = ' disabled="disabled"';
}

$defaulttemplate = $this->GetPreference('current_template');
if ($galleryinfo['templateid'] == 0)
{
	// override template settings with default template
	$templateprops = Gallery_utils::GetTemplateprops($defaulttemplate);
	$galleryinfo['thumbwidth'] = $templateprops['thumbwidth'];
	$galleryinfo['sortitems'] = $templateprops['sortitems'];
}

$totaloffileorder = 0;
$numberofimages = 0;
if ($params['mode'] == 'add')
{
	$smarty->assign('formstart', $this->CreateFormStart($id, 'do_editgallery', $returnid, 'post', '', false, '', $params));

	$smarty->assign('prompt_directoryname', $this->Lang('directoryname'));
	$smarty->assign('directoryname', $this->CreateInputText($id, 'directoryname', "", 40, 100));
	$smarty->assign('gallerytitle', $this->CreateInputText($id, 'gallerytitle', "", 40, 100));
	$smarty->assign('gallerycomment', $this->CreateTextArea($this->GetPreference('use_comment_wysiwyg', 1), $id, "", 'gallerycomment', '', '', '', '', '80', '3', '', '', 'style="height:6em;"'));
	if ($this->GetPreference('editdirdates'))
	{
		$smarty->assign('gallerydate', $this->CreateInputText($id, 'gallerydate', Date('Y-m-d'), 10, 10));
	}
	else
	{
		$smarty->assign('gallerydate', "");
	}
	$smarty->assign('hideparentlink', $this->CreateInputCheckbox($id, 'hideparentlink', true));
	$smarty->assign('itemcount', null);

	$smarty->assign('addgallery', '');
	$smarty->assign('addimages', '');
}
else
{
	$gallerypath = $galleryinfo['filepath'] . $galleryinfo['filename'];
	Gallery_utils::UpdateGalleryDB($gallerypath, $params['gid']);
	$gallery = Gallery_utils::Getgalleryfiles($gallerypath);
	$folderpath = $this->GetPreference('be_folderpath');

	$showgallery = array();
	$trueimage = $admintheme->DisplayImage('icons/system/true.gif', $this->Lang('setfalse'), '', '', 'systemicon');
	$falseimage = $admintheme->DisplayImage('icons/system/false.gif', $this->Lang('settrue'), '', '', 'systemicon');
	$falseimage2 = $admintheme->DisplayImage('icons/system/false.gif', $this->Lang('noalbumcover'), '', '', 'systemicon');

	// PLupload settings
	$filesize = str_replace('M', 'MB', ini_get('post_max_size'));
	$smarty->assign('file_size_limit', $filesize);
	$smarty->assign('file_types', $this->GetPreference('allowed_extensions', ''));
	$smarty->assign('msg_complete', '&' . $id . 'module_message=' . rawurlencode($this->Lang('galleryupdated')));


	foreach ($gallery as $file)
	{
		$onerow = new stdClass();

		$params['fid'] = $file['fileid'];

		$onerow->fileid = $file['fileid'];
		$onerow->fileorder = $file['fileorder'];
		$totaloffileorder += $file['fileorder'];
		$onerow->file = $file['filename'];

		$params['multiaction'] = 'switchactive';
		$onerow->active = $this->CreateInputHidden($id, 'fileactive[' . $file['fileid'] . ']', $file['active']);
		$onerow->activelink = $this->CreateLink($id, 'multiaction', $returnid, ($file['active'] ? $trueimage : $falseimage), $params);
		unset($params['multiaction']);

		if (substr($file['filename'], -1) == "/")
		{
			// record is a directory
			$onerow->thumburl = '../' . $folderpath;
			$onerow->thumb = '<img src="' . $onerow->thumburl . '" alt="' . $file['filename'] . '" />';
			$onerow->filename = $file['filename'];
			$onerow->filename_input = '';
			$onerow->title = $file['title'];
			$onerow->titlename = empty($file['title']) ? $file['filename'] : $file['title'];
			$onerow->title_input = $this->CreateLink($id, 'editgallery', $returnid, $onerow->titlename, array('gid' => $file['fileid'], 'mode' => 'edit')) . $this->CreateInputHidden($id, 'filetitle[' . $file['fileid'] . ']', '#dir');
			$onerow->comment = $file['comment'];
			$onerow->comment_input = "";
			$onerow->filedate = $file['filedate'];
			$onerow->filedate_input = $this->GetPreference('editdirdates') ? substr($file['filedate'], 0, 10) : "";
			if ($file['defaultfile'] == 0)
			{
				$onerow->defaultlink = $falseimage2;
			}
			elseif ($file['defaultfile'] == $galleryinfo['defaultfile'])
			{
				$params['fid'] = 0;
				$onerow->defaultlink = $this->CreateLink($id, 'switchdefault', $returnid, $trueimage, $params);
			}
			else
			{
				$params['fid'] = $file['defaultfile'];
				$onerow->defaultlink = $this->CreateLink($id, 'switchdefault', $returnid, $falseimage, $params);
			}
			$onerow->isdir = 1;
			$onerow->editlink = $this->CreateLink($id, 'editgallery', $returnid, $admintheme->DisplayImage('icons/system/edit.gif', $this->Lang('edit'), '', '', 'systemicon'), array('gid' => $file['fileid'], 'mode' => 'edit'));
			$onerow->editurl = $this->CreateLink($id, 'editgallery', $returnid, '', array('gid' => $file['fileid'], 'mode' => 'edit'), '', true);
			$onerow->edittext = $this->Lang('edit');
			$onerow->deletelink = $permission_to_delete ?
					$this->CreateLink($id, 'multiaction', $returnid, $admintheme->DisplayImage('icons/system/delete.gif', $this->Lang('delete'), '', '', 'systemicon'), array('multiaction' => 'delete', 'gid' => $file['galleryid'], 'fid' => $file['fileid'], 'origaction' => 'editgallery'), $this->Lang('areyousure')) : '';
		}
		else
		{
			$numberofimages++;
			$onerow->thumburl = '../' . DEFAULT_GALLERY_PATH . str_replace('%2F', '/', rawurlencode($file['filepath'] . IM_PREFIX . $file['filename']));
			$onerow->thumb = '<img src="' . $onerow->thumburl . '" alt="' . $file['filename'] . '" />';
			$onerow->filename = $file['filename'];
			$onerow->filename_input = $file['filename'] . $this->CreateInputHidden($id, 'filename[' . $file['fileid'] . ']', $file['filename']);
			$onerow->title = $file['title'];
			$onerow->title_input = $this->CreateInputText($id, 'filetitle[' . $file['fileid'] . ']', $file['title'], 30, 100, $disabled);
			$onerow->titlename = empty($file['title']) ? $file['filename'] : $file['title'];
			$onerow->comment = $file['comment'];
			$onerow->comment_input = $this->CreateTextArea(0, $id, $file['comment'], 'filecomment[' . $file['fileid'] . ']', '', '', '', '', '40', '4', '', '', 'style="width:250px; height:4em;"' . $disabled);
			$onerow->filedate = $file['filedate'];
			if ($this->GetPreference('editfiledates'))
			{
				$onerow->filedate_input = $this->CreateInputText($id, 'filedate[' . $file['fileid'] . ']', substr($file['filedate'], 0, 10), 10, 10, $disabled);
			}
			else
			{
				$onerow->filedate_input = $file['filedate'];
			}
			if ($file['fileid'] == $galleryinfo['defaultfile'])
			{
				$params['fid'] = 0;
				$onerow->defaultlink = $permission_to_edit ? $this->CreateLink($id, 'switchdefault', $returnid, $trueimage, $params) : $trueimage;
			}
			else
			{
				$onerow->defaultlink = $permission_to_edit ? $this->CreateLink($id, 'switchdefault', $returnid, $falseimage, $params) : $falseimage;
			}
			$onerow->isdir = 0;
			if (!file_exists('../' . DEFAULT_GALLERY_PATH . $file['filepath'] . IM_PREFIX . $file['filename']))
			{
				Gallery_utils::CreateThumbnail('../' . DEFAULT_GALLERY_PATH . $file['filepath'] . IM_PREFIX . $file['filename'], '../' . DEFAULT_GALLERY_PATH . $file['filepath'] . $file['filename'], IM_THUMBWIDTH, IM_THUMBHEIGHT, 'sc');
			}
			$onerow->editlink = $permission_to_edit ?
					$this->CreateLink($id, 'editimage', $returnid, $admintheme->DisplayImage('icons/system/edit.gif', $this->Lang('editimage'), '', '', 'systemicon'), array('fid' => $file['fileid'], 'mode' => 'edit')) : '';
			$onerow->editurl = $permission_to_edit ?
					$this->CreateLink($id, 'editimage', $returnid, '', array('fid' => $file['fileid'], 'mode' => 'edit'), '', true) : '';
			$onerow->edittext = $this->Lang('editimage');
			$onerow->deletelink = $permission_to_edit ?
					$this->CreateLink($id, 'multiaction', $returnid, $admintheme->DisplayImage('icons/system/delete.gif', $this->Lang('delete'), '', '', 'systemicon'), array('multiaction' => 'delete', 'gid' => $file['galleryid'], 'fid' => $file['fileid'], 'origaction' => 'editgallery'), $this->Lang('areyousure')) : '';
			$onerow->activelink = $permission_to_edit ? $onerow->activelink : ($file['active'] ? $trueimage : $falseimage);
		}

		$onerow->imgselect = $this->CreateInputCheckbox($id, 'imgselect[' . $file['fileid'] . ']', 1);

		if ($file['fileid'] != 1)
		{
			array_push($showgallery, $onerow);
		}
	}

	$sortarray = explode('/', 'n+fileorder/' . $galleryinfo['sortitems']);
	$showgallery = Gallery_utils::ArraySort($showgallery, $sortarray, false);

	$smarty->assign('items', $showgallery);
	$smarty->assign('itemcount', count($showgallery));
	$smarty->assign('item', $this->Lang('item'));
	$smarty->assign('title', $this->Lang('title'));
	$smarty->assign('comment', $this->Lang('comment'));
	$smarty->assign('filedate', $this->Lang('date'));
	$smarty->assign('cover', $this->Lang('albumcover'));
	$smarty->assign('active', $this->Lang('active'));

	$smarty->assign('nofilestext', $this->lang("nofilestext"));
	$smarty->assign('formstart', $this->CreateFormStart($id, 'do_editgallery', $returnid, 'post', '', false, '', $params));

	$smarty->assign('gallerytitle', $this->CreateInputText($id, 'gallerytitle', $galleryinfo['title'], 40, 100, $disabled));
	$smarty->assign('gallerycomment', $this->CreateTextArea($this->GetPreference('use_comment_wysiwyg', 1), $id, $galleryinfo['comment'], 'gallerycomment', '', '', '', '', '80', '3', '', '', 'style="height:6em;"' . $disabled));
	if ($this->GetPreference('editdirdates'))
	{
		$smarty->assign('gallerydate', $this->CreateInputText($id, 'gallerydate', substr($galleryinfo['filedate'], 0, 10), 10, 10, $disabled));
	}
	else
	{
		$smarty->assign('gallerydate', "");
	}
	$smarty->assign('hideparentlink', $this->CreateInputCheckbox($id, 'hideparentlink', true, $galleryinfo['hideparentlink'], $params['gid'] == 1 ? 'disabled="disabled"' : $disabled));

	$smarty->assign('addgallery', !$this->GetPreference('use_permissions') || $this->CheckPermission('Gallery - Add subgalleries') ?
					$this->CreateLink($id, 'editgallery', $returnid, $admintheme->DisplayImage('icons/system/newfolder.gif', $this->Lang('addsubgallery'), '', '', 'systemicon'), array('gid' => $params['gid'], 'mode' => 'add')) . ' ' .
					$this->CreateLink($id, 'editgallery', $returnid, $this->Lang('addsubgallery'), array('gid' => $params['gid'], 'mode' => 'add')) : ''
	);
	$smarty->assign('uploadimages', $permission_to_edit ?
		'<a id="pickfiles" href="javascript:;">' . $admintheme->DisplayImage('icons/system/newobject.gif', $this->Lang('uploadimages'), '', '', 'systemicon') . ' ' . $this->Lang('uploadimages') . '</a>' : ''); // (' . $filesize . ' max)' : '');
	$smarty->assign('upload_url', str_replace('&amp;', '&', $this->CreateLink($id, 'do-upload', '', '', array('disable_theme' => 'true', 'showtemplate' => 'false'), '', true)));
	$smarty->assign('upload_dir', $params['gid'] == 1 ? '' : trim($galleryinfo['filepath'] . '/' . $galleryinfo['filename'], '/'));
	$smarty->assign('maximagewidth', $this->GetPreference('maximagewidth'));
	$smarty->assign('maximageheight', $this->GetPreference('maximageheight'));
	$smarty->assign('imagejpgquality', $this->GetPreference('imagejpgquality', 80));
	
}

if (abs($params['gid']) == 1)
{
	$smarty->assign('pagetitle', $this->CreateLink($id, 'defaultadmin', $returnid, $this->Lang('list')));
}
else
{
	$gallerypatharr = explode('/', $galleryinfo['filepath']);
	$path = '';
	$breadcrumbs = $this->CreateLink($id, 'defaultadmin', $returnid, $this->Lang('list'));
	$breadcrumbs .= ' / ' . $this->CreateLink($id, 'editgallery', $returnid, 'Gallery', array('gid' => 1, 'mode' => "edit"));
	foreach ($gallerypatharr as $item)
	{
		if (!empty($item))
		{
			$path .= '/' . $item;
			$galinfo = Gallery_utils::Getgalleryinfo($path);
			$breadcrumbs .= ' / ' . $this->CreateLink($id, 'editgallery', $returnid, $item, array('gid' => $galinfo['fileid'], 'mode' => "edit"));
		}
	}
	$breadcrumbs .= ' / ' . trim($galleryinfo['filename'], '/');
	$smarty->assign('pagetitle', $breadcrumbs);
}


$smarty->assign('prompt_gallerytitle', $this->Lang('gallerytitle'));
$smarty->assign('prompt_comment', $this->Lang('comment'));
$smarty->assign('prompt_date', $this->Lang('date'));
$smarty->assign('customfields', Gallery_utils::Getcustomfields($params['gid'], 1, $id, FALSE, $permission_to_edit));

// template dropdown field
$templatelist = array('- ' . $this->Lang('usedefault') . ' -' => 0);
$query = "SELECT templateid, template FROM " . cms_db_prefix() . "module_gallery_templateprops " . ($this->CheckPermission('Modify Templates') ? "" : "WHERE visible=1 ") . "ORDER BY template ASC";
$result = $db->Execute($query);
while ($result && $row = $result->FetchRow())
{
	$templatelist[$row['template']] = $row['templateid'];
}
if (count($templatelist) == 1 || (count($templatelist) == 2 && array_key_exists($defaulttemplate, $templatelist)) || isset($galleryinfo['templateid']) && !in_array($galleryinfo['templateid'], $templatelist))
{
	$smarty->assign('prompt_template', '');
	$smarty->assign('template', $this->CreateInputHidden($id, 'templateid', $galleryinfo['templateid']));
}
else
{
	$smarty->assign('prompt_template', $this->Lang('template'));
	$smarty->assign('template', $this->CreateInputDropdown($id, 'templateid', $templatelist, -1, isset($galleryinfo['templateid']) ? $galleryinfo['templateid'] : 0, $disabled));
}

// editors multiselect field
if ($this->GetPreference('use_permissions'))
{
	$editorslist = Gallery_utils::GetEditors();
	$selectededitors = $editors;
	$smarty->assign('prompt_editors', $this->Lang('editors'));
	$smarty->assign('editors', $this->CreateInputSelectList($id, 'editors[]', $editorslist, $selectededitors, 4, $disabled));
}
else
{
	$selectededitors = implode(';', $editors);
	$smarty->assign('prompt_editors', '');
	$smarty->assign('editors', $this->CreateInputHidden($id, 'editors', $selectededitors));
}


$multiactionlist = array($this->Lang('delete') => 'delete',
	$this->Lang('rotateclockwise') => 'rotateclockwise',
	$this->Lang('rotateanticlockwise') => 'rotateanticlockwise',
	$this->Lang('active') => 'active',
	$this->Lang('inactive') => 'inactive',
	$this->Lang('moveto') => 'move');
$galleries = Gallery_utils::GetGalleries();
foreach ($galleries as $gallery)
{
	$gallerieslist[$gallery['filepath'] . $gallery['filename']] = $gallery['fileid'];
}
$smarty->assign('prompt_multiaction', $this->Lang('withselected'));
$smarty->assign('multiaction', $this->CreateInputDropdown($id, 'multiaction', $multiactionlist, -1, '', 'id="multiaction"' . $disabled));
$smarty->assign('moveto', $this->CreateInputDropdown($id, 'moveto', $gallerieslist, -1, $params['gid'], 'id="moveto"' . $disabled));
$smarty->assign('multiactionsubmit', $this->CreateInputSubmit($id, 'multiactionsubmit', $this->Lang('apply'), $disabled, '', $this->Lang('areyousuremulti')));

$smarty->assign('prompt_parent', $this->Lang('parentgallery'));
$smarty->assign('prompt_hideparentlink', $this->Lang('hideparentlink'));

$smarty->assign('hidden', $this->CreateInputHidden($id, 'sort', '') . $this->CreateInputHidden($id, 'active', isset($galleryinfo['active']) ? $galleryinfo['active'] : 1));

$smarty->assign('submit', $permission_to_edit ? $this->CreateInputSubmit($id, 'submitbutton', $this->Lang('submit')) : '');
$smarty->assign('cancel', $this->CreateInputSubmit($id, 'cancel', $this->Lang('cancel')));
$smarty->assign('unsort', $permission_to_edit && $totaloffileorder > 0 ? $this->CreateInputSubmit($id, 'unsortbutton', $this->Lang('sortbysettings'), '', '', $this->Lang('sureunsort')) : '');
$smarty->assign('updatethumbs', $permission_to_edit && $numberofimages > 0 ? $this->CreateInputSubmit($id, 'updatethumbsbutton', $this->Lang('updatethumbs'), $disabled, '', $this->Lang('sureupdatethumbs') . "\\n" . $this->Lang('thumbsrecreated')) : '');
$smarty->assign('formend', $this->CreateFormEnd());


echo $this->ProcessTemplate('editgallery.tpl');
?>