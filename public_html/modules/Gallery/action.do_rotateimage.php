<?php
if (!isset($gCms))
	exit();

if (!$this->CheckPermission('Use Gallery'))
{
	echo $this->ShowErrors(lang('needpermissionto', 'Use Gallery'));
	return;
}

if (!isset($params['fid']) || !isset($params['degr']))
{
	$params = array('active_tab' => 'galleries', 'module_error' => lang('missingparams'));
	$this->Redirect($id, 'defaultadmin', '', $params);
	return;
}

// get image info
$imageprops = Gallery_utils::Getimagebyid($params['fid']);

$image = '../' . DEFAULT_GALLERY_PATH . $imageprops['filepath'] . $imageprops['filename'];


Gallery_utils::RotateImage($image, $params['degr']);


$params = array('fid' => $params['fid'], 'mode' => 'edit', 'active_tab' => 'thumbs', 'module_message' => $this->Lang('imageupdated'));
$this->Redirect($id, 'editimage', '', $params);
?>