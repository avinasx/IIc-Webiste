<?php
if (!isset($gCms))
	exit();

if (!$this->CheckPermission('Use Gallery'))
{
	echo $this->ShowErrors(lang('needpermissionto', 'Use Gallery'));
	return;
}

if (!isset($params['fid']) || !isset($params['gid']) || !isset($params['template']))
{
	$params = array('active_tab' => 'galleries', 'module_error' => lang('missingparams'));
	$this->Redirect($id, 'defaultadmin', '', $params);
	return;
}

if (isset($params['cancel2']))
{
	$params = array('gid' => $params['gid'], 'mode' => 'edit');
	$this->Redirect($id, 'editgallery', '', $params);
}

if (!empty($params['x2']) && !empty($params['y2']))
{
	// get image info
	$image = Gallery_utils::Getimagebyid($params['fid']);

	// get templateproperties for thumbsizes
	if ($params['template'] == 0)
	{
		$tplthumb = array(
			'templateid' => 0,
			'thumbname' => '../' . DEFAULT_GALLERY_PATH . $image['filepath'] . IM_PREFIX . $image['filename'],
			'thumbwidth' => IM_THUMBWIDTH,
			'thumbheight' => IM_THUMBHEIGHT,
			'resizemethod' => 'sc'
		);
	}
	else
	{
		$db = $this->GetDB();
		$query = "SELECT *
				FROM " . cms_db_prefix() . "module_gallery_templateprops
				WHERE templateid=?";
		$result = $db->Execute($query, array($params['template']));
		if ($result && $result->RecordCount() > 0)
		{
			$templateprops = $result->GetArray();
			$tplthumb = $templateprops[0];
			$tplthumb['thumbname'] = '../' . DEFAULT_GALLERYTHUMBS_PATH . $params['fid'] . '-' . $params['template'] . substr($image['filename'], strrpos($image['filename'], '.'));
		}
		else
		{
			$params = array('fid' => $params['fid'], 'mode' => 'edit', 'active_tab' => 'thumbs', 'module_error' => lang('sqlerror', 'do_editthump.php'));
			$this->Redirect($id, 'editimage', '', $params);
		}
	}

	// update thumbnail
	@unlink($tplthumb['thumbname']);
	$thumbcr = Gallery_utils::CreateThumbnail($tplthumb['thumbname'], '../' . DEFAULT_GALLERY_PATH . $image['filepath'] . $image['filename'], $tplthumb['thumbwidth'], $tplthumb['thumbheight'], $tplthumb['resizemethod'], $params['x1'] * $params['scale'], $params['y1'] * $params['scale'], $params['x2'] * $params['scale'], $params['y2'] * $params['scale']);
}

if (isset($params['applybutton2']))
{
	$params = array('fid' => $params['fid'], 'mode' => 'edit', 'template' => $params['template'], 'active_tab' => 'thumbs', 'module_message' => $this->Lang('thumbupdated'));
	$this->Redirect($id, 'editimage', '', $params);
}
else
{
	$params = array('gid' => $params['gid'], 'mode' => 'edit', 'module_message' => $this->Lang('thumbupdated'));
	$this->Redirect($id, 'editgallery', '', $params);
}
?>