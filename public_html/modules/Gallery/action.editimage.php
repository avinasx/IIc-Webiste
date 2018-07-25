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
if (!isset($params['fid']) || !isset($params['mode']))
{
	$params['module_error'] = lang('missingparams');
	$this->Redirect($id, 'defaultadmin', '', $params);
	return;
}
$params['template'] = empty($params['template']) ? 0 : $params['template'];

$file = Gallery_utils::Getimagebyid($params['fid']);

if ($params['mode'] == 'edit')
{
	$trueimage = $admintheme->DisplayImage('icons/system/true.gif', $this->Lang('setfalse'), '', '', 'systemicon');
	$falseimage = $admintheme->DisplayImage('icons/system/false.gif', $this->Lang('settrue'), '', '', 'systemicon');
	$falseimage2 = $admintheme->DisplayImage('icons/system/false.gif', $this->Lang('noalbumcover'), '', '', 'systemicon');


	$onerow = new stdClass();

	$onerow->fileid = $file['fileid'];
	$onerow->file = '../' . DEFAULT_GALLERY_PATH . $file['filepath'] . $file['filename'];
	$imgdata = getimagesize($onerow->file);
	$onerow->filewidthheight = '';
	$maxwidth = 480;
	$imgscale = 1;
	if ($imgdata[0] > $maxwidth)
	{
		$imgratio = $imgdata[0] / $imgdata[1];  // width/height
		$height = ceil($maxwidth / $imgratio);
		$onerow->filewidthheight = 'width="' . $maxwidth . '" height="' . $height . '"';
		$imgscale = $imgdata[0] / $maxwidth;
	}
	$params['multiaction'] = 'switchactive';
	$onerow->activelink = $this->CreateLink($id, 'multiaction', $returnid, ($file['active'] ? $trueimage : $falseimage), $params);
	unset($params['multiaction']);

	if ($params['template'] == 0)
	{
		$onerow->thumburl = '../' . DEFAULT_GALLERY_PATH . $file['filepath'] . IM_PREFIX . $file['filename'];
	}
	else
	{
		$onerow->thumburl = '../' . DEFAULT_GALLERYTHUMBS_PATH . $file['fileid'] . '-' . $params['template'] . substr($file['filename'], strrpos($file['filename'], '.'));
		if (!file_exists($onerow->thumburl))
		{
			$templateprops = Gallery_utils::GetTemplateprops($params['template']);
			Gallery_utils::CreateThumbnail($onerow->thumburl, $onerow->file, $templateprops['thumbwidth'], $templateprops['thumbheight'], $templateprops['resizemethod']);
		}
	}
	$onerow->thumburl .= '?cache=' . time();
	$onerow->defaultthumburl = '../' . DEFAULT_GALLERY_PATH . str_replace('%2F', '/', rawurlencode($file['filepath'] . IM_PREFIX . $file['filename'])) . '?nocache=' . time();
	$onerow->thumb = '<img src="' . $onerow->defaultthumburl . '" alt="' . $file['filename'] . '" />';
	$onerow->filename_input = $file['filename'];
	$onerow->title_input = $this->CreateInputText($id, 'filetitle', $file['title'], 30, 100);
	$onerow->comment = $file['comment'];
	$onerow->comment_input = $this->CreateTextArea(0, $id, $file['comment'], 'filecomment', '', '', '', '', '40', '4', '', '', 'style="height:4em;"');
	if ($this->GetPreference('editfiledates'))
	{
		$onerow->filedate_input = $this->CreateInputText($id, 'filedate', substr($file['filedate'], 0, 10), 10, 10);
	}
	else
	{
		$onerow->filedate_input = $file['filedate'];
	}

	Gallery_utils::CreateThumbnail('../' . DEFAULT_GALLERY_PATH . $file['filepath'] . '/' . IM_PREFIX . $file['filename'], '../' . DEFAULT_GALLERY_PATH . $file['filepath'] . '/' . $file['filename'], IM_THUMBWIDTH, IM_THUMBHEIGHT, 'sc');

	$onerow->deletelink = $this->CreateLink($id, 'multiaction', $returnid, $admintheme->DisplayImage('icons/system/delete.gif', $this->Lang('delete'), '', '', 'systemicon'), array('multiaction' => 'delete', 'fid' => $file['fileid'], 'origaction' => 'editgallery'), $this->Lang('areyousure'));

	$onerow->fields = Gallery_utils::Getcustomfields($params['fid'], 0, $id);
	$onerow->file .= '?cache=' . filemtime($onerow->file);


	$smarty->assign('image', $onerow);
	$smarty->assign('id', $id);
	$smarty->assign('file', $this->Lang('item'));
	$smarty->assign('title', $this->Lang('title'));
	$smarty->assign('comment', $this->Lang('comment'));
	$smarty->assign('filedate', $this->Lang('date'));
	$smarty->assign('cover', $this->Lang('albumcover'));
	$smarty->assign('active', $this->Lang('active'));
	$smarty->assign('rotateclockwise', $this->CreateLink($id, 'do_rotateimage', $returnid, '<img src="../modules/Gallery/images/clockwise.png" alt="' . $this->Lang('rotateclockwise') . '" title="' . $this->Lang('rotateclockwise') . '" />', array('fid' => $params['fid'], 'degr' => 270)));
	$smarty->assign('rotateanticlockwise', $this->CreateLink($id, 'do_rotateimage', $returnid, '<img src="../modules/Gallery/images/anticlockwise.png" alt="' . $this->Lang('rotateanticlockwise') . '" title="' . $this->Lang('rotateanticlockwise') . '" />', array('fid' => $params['fid'], 'degr' => 90)));

	$smarty->assign('formstart', $this->CreateFormStart($id, 'do_editimage', $returnid, 'post', '', false, '', $params));

	// edit thumbs
	$smarty->assign('formstart2', $this->CreateFormStart($id, 'do_editthumb', $returnid, 'post', '', false, '', $params));
	$smarty->assign('formend2', $this->CreateFormEnd());
	$smarty->assign('hidden2', $this->CreateInputHidden($id, 'fid', $file['fileid']) .
			$this->CreateInputHidden($id, 'gid', $file['galleryid']) .
			$this->CreateInputHidden($id, 'x1', '') .
			$this->CreateInputHidden($id, 'y1', '') .
			$this->CreateInputHidden($id, 'x2', '') .
			$this->CreateInputHidden($id, 'y2', '') .
			$this->CreateInputHidden($id, 'scale', $imgscale));
	$smarty->assign('editthumb_help', $this->Lang('editthumb_help'));
	$smarty->assign('thumb_current', $this->Lang('thumb_current'));
	$smarty->assign('thumb_preview', $this->Lang('thumb_preview'));

	$redirect_params = $params;
	$redirect_params['active_tab'] = 'thumbs';
	unset($redirect_params['template']);
	$smarty->assign('redirect_url', str_replace('&amp;', '&', $this->CreateLink($id, 'editimage', $returnid, '', $redirect_params, '', true)) . '&' . $id . 'template=');
	$smarty->assign('submit2', $this->CreateInputSubmit($id, 'submitbutton2', $this->Lang('submit')));
	$smarty->assign('apply2', $this->CreateInputSubmit($id, 'applybutton2', $this->Lang('apply')));
	$smarty->assign('cancel2', $this->CreateInputSubmit($id, 'cancel2', $this->Lang('cancel')));


	//template dropdown field for custom thumbnail cropping
	$templatelist = array('- ' . strtolower(lang('default') . ' ' . lang('thumbnail')) . ' -' => 0);
	$query = "SELECT templateid, template FROM " . cms_db_prefix() . "module_gallery_templateprops WHERE thumbwidth IS NOT NULL " . ($this->CheckPermission('Modify Templates') ? "" : "AND visible=1 ") . "ORDER BY template ASC";
	$result = $db->Execute($query);
	while ($result && $row = $result->FetchRow())
	{
		$templatelist[$row['template']] = $row['templateid'];
	}
	if (count($templatelist) == 1)
	{
		$smarty->assign('prompt_template', '');
		$smarty->assign('template', $this->CreateInputHidden($id, 'template', 0));
	}
	else
	{
		$smarty->assign('prompt_template', lang('thumbnail') . ' ' . $this->Lang('template'));
		$smarty->assign('template', $this->CreateInputDropdown($id, 'template', $templatelist, -1, $params['template'], 'id="templateid"'));
	}
	$smarty->assign('acceptbutton', $admintheme->DisplayImage('icons/system/accept.gif', lang('apply'), '', '', 'acceptbutton'));
}

//$smarty->assign('pagetitle', $this->Lang('editimage'));
$smarty->assign('hidden', $this->CreateInputHidden($id, 'fid', $file['fileid']) . $this->CreateInputHidden($id, 'gid', $file['galleryid']) . $this->CreateInputHidden($id, 'active', $file['active']));
$smarty->assign('submit', $this->CreateInputSubmit($id, 'submitbutton', $this->Lang('submit')));
$smarty->assign('apply', $params['mode'] == 'add' ? '' : $this->CreateInputSubmit($id, 'apply', $this->Lang('apply')));
$smarty->assign('cancel', $this->CreateInputSubmit($id, 'cancel', $this->Lang('cancel')));
$smarty->assign('formend', $this->CreateFormEnd());


//define tabs
$active_tab = empty($params['active_tab']) ? '' : $params['active_tab'];

$tabheaders = $this->StartTabHeaders();
$tabheaders .= $this->SetTabHeader('image', $this->Lang('editimage'), ($active_tab == 'image') ? true : false);
$tabheaders .= $this->SetTabHeader('thumbs', $this->Lang('editthumbs'), ($active_tab == 'thumbs') ? true : false);
$tabheaders .= $this->EndTabHeaders();
$tabheaders .= $this->StartTabContent();

$smarty->assign('TabHeaders', $tabheaders);
$smarty->assign('StartTab_image', $this->StartTab('image', $params));
$smarty->assign('StartTab_thumbs', $this->StartTab('thumbs', $params));
$smarty->assign('EndTab', $this->EndTab());
$smarty->assign('EndTabContent', $this->EndTabContent());


echo $this->ProcessTemplate('editimage.tpl');
?>