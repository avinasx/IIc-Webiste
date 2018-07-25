<?php
if (!isset($gCms))
  exit;

// Check permissions
if (!$this->CheckPermission('Use Gallery'))
{
  echo $this->ShowErrors(lang('needpermissionto', 'Use Gallery'));
  return;
}

if (empty($params['gid']) || (empty($params['fid']) && empty($params['imgselect'])))
{
  $params['module_error'] = lang('missingparams');
  $this->Redirect($id, 'defaultadmin', '', $params);
}

$gid = $params['gid'];
$nopermission = 0;

// check permission to edit
if ($this->CheckPermission('Gallery - Edit all galleries'))
{
  $permission_to_edit = 'all';
  $permission_to_delete = $this->CheckPermission('Gallery - Delete subgalleries') ? 'all' : 'no';
}
else
{
  $userid = get_userid();
  $galleryinfo = Gallery_utils::Getgalleryinfobyid($gid);
  $editors = explode(';', $galleryinfo['editors']);
  if (Gallery_utils::CheckEditor($userid, $gid, $editors))
  {
    $permission_to_edit = 'this';
    $permission_to_delete = $this->CheckPermission('Gallery - Delete subgalleries') ? 'this' : 'no';
  }
  else
  {
    $permission_to_edit = 'no';
    $permission_to_delete = 'no';
  }
}


if (empty($params['fid']))
{
  $fid_array = is_array($params['imgselect']) ? array_keys($params['imgselect']) : explode(',', $params['imgselect']);
}
else
{
  $fid_array = array($params['fid']);
}

$fids = '';
if ($params['multiaction'] == 'active' || $params['multiaction'] == 'inactive' || $params['multiaction'] == 'switchactive')
{
  foreach ($fid_array as $fid)
  {
    $fileinfo = Gallery_utils::Getgalleryinfobyid($fid);
    $editors = explode(';', $fileinfo['editors']);
    if (strpos($fileinfo['filename'], "/") === FALSE && ($permission_to_edit == 'all' || $permission_to_edit == 'this'))
    {
      $fids .= $fid . ',';
    }
    elseif (strpos($fileinfo['filename'], "/") > 0 && Gallery_utils::CheckEditor($userid, $fid, $editors))
    {
      $fids .= $fid . ',';
    }
    else
    {
      $nopermission++;
    }
  }
}
$fids = trim($fids, ',');


switch ($params['multiaction'])
{
  case 'delete': {
      if ($permission_to_edit == 'all')
      {
        foreach ($fid_array as $fid)
        {
          $fileinfo = Gallery_utils::Getgalleryinfobyid($fid);
          if (strpos($fileinfo['filename'], "/") === FALSE)
          {
            // delete only one file
            Gallery_utils::DeleteGalleryDB('do_not_delete_directory', $fid);
          }
          else
          {
            // delete subdirectory and files
            if ($permission_to_delete == 'all' || $permission_to_delete == 'this')
            {
              Gallery_utils::DeleteGalleryDB($fileinfo['filepath'] . $fileinfo['filename'], $fid);
            }
            else
            {
              $nopermission++;
            }
          }
        }
        $gid = empty($params['gid']) ? $fileinfo['galleryid'] : $params['gid'];
      }
      else
      {
        $nopermission += count($fid_array);
      }
      break;
    }

  case 'rotateclockwise':
  case 'rotateanticlockwise': {
      if ($permission_to_edit == 'all' || $permission_to_edit == 'this')
      {
        foreach ($fid_array as $fid)
        {
          $fileinfo = Gallery_utils::Getgalleryinfobyid($fid);
          $image = '../' . DEFAULT_GALLERY_PATH . $fileinfo['filepath'] . $fileinfo['filename'];
          $degrees = $params['multiaction'] == 'rotateclockwise' ? 270 : 90;
          Gallery_utils::RotateImage($image, $degrees);
        }
      }
      else
      {
        $nopermission++;
      }
      break;
    }

  case 'active': {
      $query = "UPDATE " . cms_db_prefix() . "module_gallery SET active = 1 WHERE fileid IN (" . $fids . ")";
      $db->Execute($query);
      break;
    }

  case 'inactive': {
      $query = "UPDATE " . cms_db_prefix() . "module_gallery SET active = 0 WHERE fileid IN (" . $fids . ")";
      $db->Execute($query);
      break;
    }

  case 'switchactive': {
      $query = "UPDATE " . cms_db_prefix() . "module_gallery SET active = active^1 WHERE fileid IN (" . $fids . ")";
      $db->Execute($query);
      break;
    }

  case 'move': {
      $galleryinfo = Gallery_utils::Getgalleryinfobyid($params['moveto']);
      $newdir = $galleryinfo['filepath'] . $galleryinfo['filename'];
      $editors = explode(';', $galleryinfo['editors']);
      if (Gallery_utils::CheckEditor($userid, $params['moveto'], $editors))
      {
        // permission to edit destination dir
        foreach ($fid_array as $fid)
        {
          if ($fid != 1)
          {
            $fileinfo = Gallery_utils::Getgalleryinfobyid($fid);
            $newpath = '../' . DEFAULT_GALLERY_PATH . $newdir . $fileinfo['filename'];
            $oldpath = '../' . DEFAULT_GALLERY_PATH . $fileinfo['filepath'] . $fileinfo['filename'];
            if (strpos($fileinfo['filename'], "/") === FALSE)
            {
              // move only one file, let's don't forget the thumb
              if ($permission_to_edit == 'all' || $permission_to_edit == 'this')
              {
                if (@rename($oldpath, $newpath))
                {
                  $newpath = '../' . DEFAULT_GALLERY_PATH . $newdir . IM_PREFIX . $fileinfo['filename'];
                  $oldpath = '../' . DEFAULT_GALLERY_PATH . $fileinfo['filepath'] . IM_PREFIX . $fileinfo['filename'];
                  @rename($oldpath, $newpath);
                  $query = "UPDATE " . cms_db_prefix() . "module_gallery SET filepath = ?, galleryid = ? WHERE fileid = ?";
                  $db->Execute($query, array($newdir, $params['moveto'], $fid));
                }
              }
              else
              {
                $nopermission++;
              }
            }
            else
            {
              // move directory
              $editors = explode(';', $fileinfo['editors']);
              if (Gallery_utils::CheckEditor($userid, $fid, $editors))
              {
                if (@rename($oldpath, $newpath))
                {
                  $query = "UPDATE " . cms_db_prefix() . "module_gallery SET filepath = ?, galleryid = ? WHERE fileid = ?";
                  $db->Execute($query, array($newdir, $params['moveto'], $fid));

                  //move content
                  $oldpath = $fileinfo['filepath'] . $fileinfo['filename'];
                  $newpath = $newdir . $fileinfo['filename'];
                  $query = "UPDATE " . cms_db_prefix() . "module_gallery SET filepath = REPLACE(filepath,?,?) WHERE filepath = ? OR filepath LIKE ?";
                  $db->Execute($query, array($oldpath, $newpath, $oldpath, $oldpath . '%'));
                }
              }
              else
              {
                $nopermission++;
              }
            }
          }
        }
      }
      else
      {
        $nopermission += count($fid_array);
      }
      break;
    }
}

$origaction = $params['origaction'];
switch ($origaction)
{
  case 'editgallery': {
      $params = array('gid' => $gid, 'mode' => 'edit', 'fids' => $fids);
      break;
    }
  case 'defaultadmin': {
      $params = array();
      break;
    }
}

$this->Redirect($id, $origaction, $returnid, $params);
?>