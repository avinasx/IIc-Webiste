<?php
if (!isset($gCms))
  exit;

if (!$this->CheckPermission('Modify Site Preferences'))
{
  echo $this->ShowErrors(lang('needpermissionto', 'Modify Site Preferences'));
  return;
}

if (!empty($params['urlprefix']))
  $this->SetPreference('urlprefix', munge_string_to_url($params['urlprefix']));
$this->SetPreference('allowed_extensions', $params['allowed_extensions']);
if (ctype_digit($params['maximagewidth']))
  $this->SetPreference("maximagewidth", $params['maximagewidth']);
if (ctype_digit($params['maximageheight']))
  $this->SetPreference("maximageheight", $params['maximageheight']);
if ($params['maximagewidth'] == 0 || $params['maximagewidth'] == '' || $params['maximageheight'] == 0 || $params['maximageheight'] == '')
{
  $this->SetPreference("maximagewidth", '');
  $this->SetPreference("maximageheight", '');
}
if (ctype_digit($params['imagejpgquality']) && $params['imagejpgquality'] <= 100)
  $this->SetPreference('imagejpgquality', $params['imagejpgquality']);
if (ctype_digit($params['thumbjpgquality']) && $params['thumbjpgquality'] <= 100)
  $this->SetPreference('thumbjpgquality', $params['thumbjpgquality']);
$this->SetPreference('use_permissions', isset($params['use_permissions']) ? $params['use_permissions'] : false);
$this->SetPreference('newgalleries_active', isset($params['newgalleries_active']) ? $params['newgalleries_active'] : false);
$this->SetPreference('use_comment_wysiwyg', isset($params['use_comment_wysiwyg']) ? $params['use_comment_wysiwyg'] : false);
$this->SetPreference('editdirdates', isset($params['editdirdates']) ? $params['editdirdates'] : false);
$this->SetPreference('editfiledates', isset($params['editfiledates']) ? $params['editfiledates'] : false);
$this->SetPreference('fe_folderpath', empty($params['fe_folderpath']) ? 'modules/Gallery/images/folder.png' : $params['fe_folderpath']);
$this->SetPreference('be_folderpath', empty($params['be_folderpath']) ? 'modules/Gallery/images/foldersmall.png' : $params['be_folderpath']);

$oldsearchimages = (bool)$this->GetPreference('searchimages', false);
$newsearchimages = isset($params['searchimages']);
$this->SetPreference('searchimages', $newsearchimages);
if ($oldsearchimages !== $newsearchimages)
{
  $search = cms_utils::get_search_module();
  $search->DeleteWords($this->GetName());
  $this->SearchReindex($search);
}


if (isset($params['updatethumbs']) && $params['updatethumbs'] == 1)
{
  Gallery_utils::DeleteFiles(str_replace('/', DIRECTORY_SEPARATOR, '../' . DEFAULT_GALLERYTHUMBS_PATH), '*', false);
  $galleries = Gallery_utils::GetGalleries();
  foreach ($galleries as $gallery)
  {
    $dir = str_replace('/', DIRECTORY_SEPARATOR, '../' . DEFAULT_GALLERY_PATH . $gallery['filepath'] . (empty($gallery['filepath']) ? '' : '/') . ($gallery['filename'] == "Gallery/" ? '' : $gallery['filename']));
    Gallery_utils::DeleteFiles($dir, IM_PREFIX . '*', false);
  }
}

$params = array('tab_message' => 'optionsupdated', 'active_tab' => 'options');
$this->Redirect($id, 'defaultadmin', '', $params);
?>
