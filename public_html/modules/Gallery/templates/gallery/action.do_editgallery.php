<?php
if (!isset($gCms))
  exit();

if (isset($params['cancel']))
{
  $params = array('active_tab' => 'galleries');
  $this->Redirect($id, 'defaultadmin', '', $params);
}

if (!$this->CheckPermission('Use Gallery'))
{
  echo $this->ShowErrors(lang('needpermissionto', 'Use Gallery'));
  return;
}

if (!isset($params['gid']))
{
  $params = array('gid' => $params['gid'], 'mode' => 'edit', 'module_error' => lang('missingparams'));
  $this->Redirect($id, 'editgallery', '', $params);
  return;
}

if (isset($params['multiactionsubmit']))
{
  $params = array('gid' => $params['gid'], 'multiaction' => $params['multiaction'], 'moveto' => empty($params['moveto']) ? '' : $params['moveto'], 'imgselect' => empty($params['imgselect']) ? '' : implode(',', array_keys($params['imgselect'])), 'origaction' => $params['origaction']);

  $this->Redirect($id, 'multiaction', '', $params);
  return;
}

$userid = get_userid();

if (isset($params['unsortbutton']))
{
  $query = "UPDATE " . cms_db_prefix() . "module_gallery SET fileorder=0 WHERE galleryid = ?";
  $result = $db->Execute($query, array($params['gid']));
  if ($result)
  {
    $params['module_message'] = $this->Lang('galleryupdated');
  }
}
elseif (isset($params['updatethumbsbutton']))
{
  $query = "SELECT fileid, filepath FROM " . cms_db_prefix() . "module_gallery WHERE galleryid=?";
  $result = $db->Execute($query, array($params['gid']));
  if ($result && $result->RecordCount() > 0)
  {
    while ($row = $result->FetchRow())
    {
      Gallery_utils::DeleteFiles(str_replace('/', DIRECTORY_SEPARATOR, '../' . DEFAULT_GALLERYTHUMBS_PATH), $row['fileid'] . '-*', false);
      $filepath = $row['filepath'];
    }
    $filepath .= $filepath != '' ? '/' : '';
    Gallery_utils::DeleteFiles(str_replace('/', DIRECTORY_SEPARATOR, '../' . DEFAULT_GALLERY_PATH . $filepath), IM_PREFIX . '*', false);
  }
  if ($result)
  {
    $params['module_message'] = $this->Lang('thumbsdeleted') . ' ' . $this->Lang('thumbsrecreated');
  }
}
elseif (isset($params['directoryname']))
{
  // cleanup the directoryname, see reference-arrays in lib/replacement.php
  $params['directoryname'] = munge_string_to_url($params['directoryname']);

  // add subgallery
  if (empty($params['directoryname']))
  {
    $params['module_error'] = $this->Lang('error_directorynameinvalid');
    $this->Redirect($id, 'editgallery', '', $params);
    exit();
  }

  $params['gid'] = $params['moveto'];

  $galleryinfo = Gallery_utils::Getgalleryinfobyid($params['gid']);
  $gallerypath = $galleryinfo['filepath'] . $galleryinfo['filename'];
  if (is_dir($gallerypath . $params['directoryname']))
  {
    $params['module_error'] = $this->Lang('error_directoryalreadyexists');
    $this->Redirect($id, 'editgallery', '', $params);
    exit();
  }
  else
  {
    if (!mkdir('../' . DEFAULT_GALLERY_PATH . $gallerypath . $params['directoryname']))
    {
      $params = array('gid' => $params['gid'], 'mode' => 'edit', 'module_error' => $this->Lang('error_cantcreatedir') . ' \'' . $gallerypath . $params['directoryname'] . '\'');
      $this->Redirect($id, 'editgallery', '', $params);
      exit();
    }

    $gallerytitle = isset($params['gallerytitle']) ? $params['gallerytitle'] : '';
    $gallerycomment = isset($params['gallerycomment']) ? $params['gallerycomment'] : '';
    $gallerydate = date('Y-m-d H:i:s');
    if (isset($params['gallerydate']))
    {
      $checkdate = explode('-', $params['gallerydate']);
      $gallerydate = checkdate($checkdate[1], $checkdate[2], $checkdate[0]) ? $params['gallerydate'] : date('Y-m-d H:i:s');
    }
    $templateid = isset($params['templateid']) ? $params['templateid'] : 0;
    $hideparentlink = isset($params['hideparentlink']) ? $params['hideparentlink'] : false;

    $editors = empty($params['editors']) ? $userid : implode(';', $params['editors']);
    if (strpos($editors, $userid) === false)
    {
      $editors .= ';' . $userid;
    }

    $params['gid'] = Gallery_utils::AddFileToDB($params['directoryname'] . '/', $gallerypath, $gallerydate, $params['gid'], $gallerytitle, $gallerycomment, $templateid, $hideparentlink, $editors);
    $result = $params['gid'];
    $searchwords = $gallerytitle . ' ' . $gallerycomment;
    $params['module_message'] = '';

    // save gallery custom fields, exclude non public fields for the search index
    $query = "SELECT fieldid FROM " . cms_db_prefix() . "module_gallery_fielddefs WHERE public IS FALSE";
    $result = $db->Execute($query);

    if ($result && $result->RecordCount() > 0)
    {
      while ($row = $result->FetchRow())
      {
        $nonpublicfields[] = $row['fieldid'];
      }
    }
    if (!empty($params['field']))
    {
      foreach ($params['field'] as $key => $field)
      {
        if (!empty($field) || $field == 0)
        {
          if (isset($nonpublicfields) && !in_array($key, $nonpublicfields))
            $searchwords .= ' ' . $field;
          $query = "INSERT INTO " . cms_db_prefix() . "module_gallery_fieldvals (fieldid, fileid, value) VALUES (?,?,?)";
          $result = $db->Execute($query, array($key, $params['gid'], $field));
        }
      }
    }
  }
}
else
{
  // update gallery
  $gallerytitle = isset($params['gallerytitle']) ? $params['gallerytitle'] : '';
  $gallerycomment = isset($params['gallerycomment']) ? $params['gallerycomment'] : '';
  if (isset($params['gallerydate']))
  {
    $checkdate = explode('-', $params['gallerydate']);
    $gallerydate = checkdate($checkdate[1], $checkdate[2], $checkdate[0]) ? $params['gallerydate'] : '';
  }
  if (!empty($gallerydate))
  {
    $query = "UPDATE " . cms_db_prefix() . "module_gallery SET filedate = ?, title = ?, comment = ? WHERE fileid = ?";
    $result = $db->Execute($query, array($gallerydate, $gallerytitle, $gallerycomment, $params['gid']));
  }
  else
  {
    $query = "UPDATE " . cms_db_prefix() . "module_gallery SET title = ?, comment = ? WHERE fileid = ?";
    $result = $db->Execute($query, array($gallerytitle, $gallerycomment, $params['gid']));
  }

  $searchwords = $gallerytitle . ' ' . $gallerycomment;

  // save gallery custom fields, exclude non public fields for the search index
  $query = "SELECT fieldid FROM " . cms_db_prefix() . "module_gallery_fielddefs WHERE public <> 1";
  $result = $db->Execute($query);
  if ($result && $result->RecordCount() > 0)
  {
    while ($row = $result->FetchRow())
    {
      $nonpublicfields[] = $row['fieldid'];
    }
  }
  //since we lack an INSERT ... ON DUPLICATE KEY UPDATE function, we delete them first
  $query = "DELETE FROM " . cms_db_prefix() . "module_gallery_fieldvals WHERE fileid = ?";
  $result = $db->Execute($query, array($params['gid']));

  if (!empty($params['field']))
  {
    foreach ($params['field'] as $key => $field)
    {
      if (!empty($field) || $field == 0)
      {
        if (isset($nonpublicfields) && !in_array($key, $nonpublicfields))
          $searchwords .= ' ' . $field;
        $query = "INSERT INTO " . cms_db_prefix() . "module_gallery_fieldvals (fieldid, fileid, value) VALUES (?,?,?)";
        $result = $db->Execute($query, array($key, $params['gid'], $field));
      }
    }
  }

  $params['hideparentlink'] = isset($params['hideparentlink']) ? $params['hideparentlink'] : false;
  $params['hideparentlink'] = $params['gid'] == 1 ? true : $params['hideparentlink'];
  $params['templateid'] = $params['templateid'] == '' ? 0 : $params['templateid'];

  if (empty($params['editors']))
  {
    $editors = $userid;
  }
  else
  {
    $editors = implode(';', $params['editors']);
    // prevent an editor to lock himself out
    if (!Gallery_utils::CheckEditor($userid, $params['gid'], $params['editors']))
    {
      $editors .= ';' . $userid;
    }
  }

  $query = "UPDATE " . cms_db_prefix() . "module_gallery_props SET templateid=?,hideparentlink=?,editors=? WHERE fileid=?";
  $result = $db->Execute($query, array($params['templateid'], $params['hideparentlink'], $editors, $params['gid']));


  // Save images and subgalleries
  if (!empty($params['sort']))
  {
    $sort = explode(",", $params['sort']);
  }
  if (isset($params['filetitle']))
  {
    foreach ($params['filetitle'] as $key => $filetitle)
    {
      $filedate = '';
      if (!empty($params['filedate'][$key]))
      {
        $checkdate = explode('-', $params['filedate'][$key]);
        $filedate = (count($checkdate) == 3 && checkdate($checkdate[1], $checkdate[2], $checkdate[0])) ? $params['filedate'][$key] : '';
      }

      if (!empty($params['sort']))
      {
        $sortkey = empty($sort) ? 0 : array_search($key, $sort) + 1;
        if ($filetitle == "#dir")
        {
          $query = "UPDATE " . cms_db_prefix() . "module_gallery SET fileorder=? WHERE fileid = ?";
          $result = $db->Execute($query, array($sortkey, $key));
        }
        else
        {
          if ($params['fileactive'][$key])
          {
            $fileid[] = $key;
            $searchwords .= ' ' . $filetitle . ' ' . $params['filecomment'][$key];
          }
          if (!empty($filedate))
          {
            $query = "UPDATE " . cms_db_prefix() . "module_gallery SET filedate=?, title=?, comment=?, fileorder=? WHERE fileid = ?";
            $result = $db->Execute($query, array($filedate, $filetitle, $params['filecomment'][$key], $sortkey, $key));
          }
          else
          {
            $query = "UPDATE " . cms_db_prefix() . "module_gallery SET title=?, comment=?, fileorder=? WHERE fileid = ?";
            $result = $db->Execute($query, array($filetitle, $params['filecomment'][$key], $sortkey, $key));
          }
        }
      }
      elseif ($filetitle != "#dir")
      {
        if ($params['fileactive'][$key])
        {
          $fileid[] = $key;
          $searchwords .= ' ' . $filetitle . ' ' . $params['filecomment'][$key];
        }
        if (!empty($filedate))
        {
          $query = "UPDATE " . cms_db_prefix() . "module_gallery SET filedate=?, title=?, comment=? WHERE fileid = ?";
          $result = $db->Execute($query, array($filedate, $filetitle, $params['filecomment'][$key], $key));
        }
        else
        {
          $query = "UPDATE " . cms_db_prefix() . "module_gallery SET title=?, comment=? WHERE fileid = ?";
          $result = $db->Execute($query, array($filetitle, $params['filecomment'][$key], $key));
        }
      }
    }
    if (!empty($fileid))
    {
      // include the image custom fields, only the public ones.
      $fids = implode(",", $fileid);
      $query = "SELECT fileid, value FROM " . cms_db_prefix() . "module_gallery_fieldvals WHERE fileid IN(" . $fids . ")";
      if (!empty($nonpublicfields))
      {
        $nonpublicflds = implode(",", $nonpublicfields);
        $query .= " AND fieldid NOT IN(" . $nonpublicflds . ")";
      }
      $result = $db->Execute($query);
      if ($result && $result->RecordCount() > 0)
      {
        while ($row = $result->FetchRow())
        {
          $searchwords .= ' ' . $row['value'];
          $searchimage[$row['fileid']][] = $row['value'];
        }
      }
    }
  }
  $params['module_message'] = $this->Lang('galleryupdated');
}

if ($result)
{
  //Update search index, only if the gallery is active.
  $search = cms_utils::get_search_module();
  if ($search && isset($params['submitbutton']))
  {
    if ($this->GetPreference('searchimages', false))
    {
      if (!empty($fileid))
      {
        // search each image
        foreach ($fileid as $fid)
        {
          if ($params['active'])
          {
            if ($params['filetitle'][$fid] != "#dir" && $params['fileactive'][$fid])
            {
              $searchimagewords = empty($searchimage[$fid]) ? '' : implode(' ', $searchimage[$fid]);
              $search->AddWords($this->GetName(), $fid, 'gallery_image', $params['filename'][$fid] . ' ' . $params['filetitle'][$fid] . ' ' . $params['filecomment'][$fid] . ' ' . $searchimagewords);
            }
          }
          else
          {
            $search->DeleteWords($this->GetName(), $fid, 'gallery_image');
          }
        }
      }
    }
    else
    {
      // just search for complete subgalleries
      if ($params['active'])
      {
        $search->AddWords($this->GetName(), $params['gid'], 'gallery', $searchwords);
      }
      else
      {
        $search->DeleteWords($this->GetName(), $params['gid'], 'gallery');
      }
    }
  }



  $params = array('gid' => $params['gid'], 'mode' => 'edit', 'module_message' => $params['module_message']);
  $this->Redirect($id, 'editgallery', '', $params);
}
else
{
  $params = array('gid' => $params['gid'], 'mode' => 'edit', 'module_error' => $this->Lang('error_updategalleryfailed'));
  $this->Redirect($id, 'editgallery', '', $params);
}
?>