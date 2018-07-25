<?php
Gallery_utils::UpdateGalleryDB('', 1);
$galleries = Gallery_utils::GetGalleries();

$permission_to_editall = !$this->GetPreference('use_permissions') || $this->CheckPermission('Gallery - Edit all galleries');
$permission_to_delete = !$this->GetPreference('use_permissions') || $this->CheckPermission('Gallery - Edit all galleries') && $this->CheckPermission('Gallery - Delete subgalleries');

$showgalleries = array();
if (empty($galleries))
{
  $smarty->assign('nogalleriestext', $this->lang("nogalleriestext"));
}
else
{
  foreach ($galleries as $gallery)
  {
    $onerow = new stdClass();

    $onerow->id = $gallery['fileid'];
    $onerow->gidclass = $gallery['galleryid'] > 1 ? ' child-of-node-' . $gallery['galleryid'] : '';
//		$onerow->file = $this->CreateLink($id, 'editgallery', $returnid, $gallery['fileid'] == 1 ? 'Gallery/' : $gallery['filename'], array('gid' => $gallery['fileid'], 'mode' => "edit"));
    $onerow->titlename = $this->CreateLink($id, 'editgallery', $returnid, empty($gallery['title']) ? $gallery['filename'] : $gallery['title'], array('gid' => $gallery['fileid'], 'mode' => "edit"));
    $onerow->dirtag = '{Gallery' . ($gallery['fileid'] == 1 ? '}' : ' dir=\'' . substr($gallery['filepath'] . $gallery['filename'], 0, -1) . '\'}');

    if ($gallery['active'])
    {
      $activeimage = $admintheme->DisplayImage('icons/system/true.gif', $this->Lang('setfalse'), '', '', 'systemicon');
    }
    else
    {
      $activeimage = $admintheme->DisplayImage('icons/system/false.gif', $this->Lang('settrue'), '', '', 'systemicon');
    }
    $onerow->activelink = $this->CreateLink($id, 'multiaction', $returnid, $activeimage, array('multiaction' => 'switchactive', 'gid' => $gallery['galleryid'], 'fid' => $gallery['fileid'], 'origaction' => 'defaultadmin'));

    $onerow->editlink = $this->CreateLink($id, 'editgallery', $returnid, $admintheme->DisplayImage('icons/system/edit.gif', $this->Lang('editgallery'), '', '', 'systemicon'), array('gid' => $gallery['fileid'], 'mode' => "edit"));

    $onerow->deletelink = $permission_to_delete ?
            $this->CreateLink($id, 'multiaction', $returnid, $admintheme->DisplayImage('icons/system/delete.gif', $this->Lang('delete'), '', '', 'systemicon'), array('multiaction' => 'delete', 'gid' => $gallery['galleryid'], 'fid' => $gallery['fileid'], 'origaction' => 'defaultadmin'), $this->Lang('areyousure')) : '';

    $onerow->imgselect = $this->CreateInputCheckbox($id, 'imgselect[' . $gallery['fileid'] . ']', 1);

    if (is_dir('../' . DEFAULT_GALLERY_PATH . $gallery['filepath'] . $gallery['filename']) || $gallery['fileid'] == 1)
    {
      array_push($showgalleries, $onerow);
    }
    else
    {
      // delete directory and all of its contents from the database
      Gallery_utils::DeleteGalleryDB($gallery['filepath'] . $gallery['filename'], $gallery['fileid']);
    }
  }
}

$smarty->assign('items', $showgalleries);
$smarty->assign('itemcount', count($showgalleries));

$smarty->assign('formstart', $this->CreateFormStart($id, 'multiaction', $returnid, 'post', '', false, '', array('origaction' => 'defaultadmin', 'gid' => 1)));
$smarty->assign('formend', $this->CreateFormEnd());

$multiactionlist = array($this->Lang('delete') => 'delete', $this->Lang('active') => 'active', $this->Lang('inactive') => 'inactive');
if (!$permission_to_delete)
  array_shift($multiactionlist);

$smarty->assign('prompt_multiaction', $permission_to_editall ? $this->Lang('withselected') : '');
$smarty->assign('multiaction', $permission_to_editall ?
                $this->CreateInputDropdown($id, 'multiaction', $multiactionlist, -1) . ' ' . $this->CreateInputSubmit($id, 'multiactionsubmit', $this->Lang('apply'), '', '', $this->Lang('areyousuremulti')) : ''
);

$smarty->assign('gallerytitle', $this->Lang('gallerytitle'));
$smarty->assign('dirtag', $this->Lang('dirtag'));
$smarty->assign('active', $this->Lang('active'));

$smarty->assign('addgallery', $permission_to_editall && $this->CheckPermission('Gallery - Add subgalleries') ?
                $this->CreateLink($id, 'editgallery', $returnid, $admintheme->DisplayImage('icons/system/newfolder.gif', $this->Lang('addsubgallery'), '', '', 'systemicon'), array('gid' => -1, 'mode' => 'add')) . ' ' .
                $this->CreateLink($id, 'editgallery', $returnid, $this->Lang('addsubgallery'), array('gid' => -1, 'mode' => 'add')) : ''
);

// Display the populated template
echo $this->ProcessTemplate('admingalleries.tpl');
?>