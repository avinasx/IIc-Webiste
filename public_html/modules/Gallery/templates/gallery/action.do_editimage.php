<?php
if (!isset($gCms))
  exit();

if (!$this->CheckPermission('Use Gallery'))
{
  echo $this->ShowErrors(lang('needpermissionto', 'Use Gallery'));
  return;
}

if (!isset($params['fid']))
{
  if (isset($params['gid']))
  {
    $params = array('gid' => $params['gid'], 'mode' => 'edit', 'module_error' => lang('missingparams'));
    $this->Redirect($id, 'editgallery', '', $params);
  }
  else
  {
    $params = array('active_tab' => 'galleries', 'module_error' => lang('missingparams'));
    $this->Redirect($id, 'defaultadmin', '', $params);
  }
  return;
}

if (isset($params['cancel']))
{
  $params = array('gid' => $params['gid'], 'mode' => 'edit');
  $this->Redirect($id, 'editgallery', '', $params);
}

// update image details
$filetitle = isset($params['filetitle']) ? $params['filetitle'] : '';
$filecomment = isset($params['filecomment']) ? $params['filecomment'] : '';
$searchwords = $filetitle . ' ' . $filecomment;
if (isset($params['filedate']))
{
  $checkdate = explode('-', $params['filedate']);
  $filedate = checkdate($checkdate[1], $checkdate[2], $checkdate[0]) ? $params['filedate'] : '';
}
if (!empty($filedate))
{
  $query = "UPDATE " . cms_db_prefix() . "module_gallery SET filedate = ?, title = ?, comment = ? WHERE fileid = ?";
  $result = $db->Execute($query, array($filedate, $filetitle, $filecomment, $params['fid']));
}
else
{
  $query = "UPDATE " . cms_db_prefix() . "module_gallery SET title = ?, comment = ? WHERE fileid = ?";
  $result = $db->Execute($query, array($filetitle, $filecomment, $params['fid']));
}

// save custom fields
$query = "DELETE FROM " . cms_db_prefix() . "module_gallery_fieldvals WHERE fileid = ?";
$result = $db->Execute($query, array($params['fid']));

if (!empty($params['field']))
{
  foreach ($params['field'] as $key => $field)
  {
    if (!empty($field))
    {
      $query = "INSERT INTO " . cms_db_prefix() . "module_gallery_fieldvals (fieldid, fileid, value) VALUES (?,?,?)";
      $result = $db->Execute($query, array($key, $params['fid'], $field));
      if ($params['publicfield'][$key])
        $searchwords .= $field . ' ';
      debug_to_log($field);
    }
  }
}

$search = cms_utils::get_search_module();
if ($search)
{
  if ($this->GetPreference('searchimages', false))
  {
    if ($params['active'])
    {
      $search->AddWords($this->GetName(), $params['fid'], 'gallery_image', $searchwords);
    }
    else
    {
      $search->DeleteWords($this->GetName(), $params['fid'], 'gallery_image');
    }
  }
  else
  {
    // update search index for the complete gallery.
    $searchwords = '';
    $query = "SELECT g1.fileid, g1.title, g1.comment 
              FROM " . cms_db_prefix() . "module_gallery g1
              JOIN " . cms_db_prefix() . "module_gallery g2 ON g1.galleryid=g2.fileid
              WHERE (g1.fileid=? OR (g1.galleryid=? AND g1.filename NOT LIKE '%/' AND g2.active=1)) AND g1.active=1";
    $result = $db->Execute($query, array($params['gid'], $params['gid']));
    if ($result)
    {
      if ($result->RecordCount() > 0)
      {
        while ($row = $result->FetchRow())
        {
          $searchwords .= $row['title'] . ' ' . $row['comment'] . ' ';
          $fileid[] = $row['fileid'];
        }

        // add custom fields to search index
        $fids = implode(",", $fileid);
        $query = "SELECT fv.value FROM " . cms_db_prefix() . "module_gallery_fieldvals fv
                  JOIN " . cms_db_prefix() . "module_gallery_fielddefs fd ON fv.fieldid=fd.fieldid AND fd.public=1
                  WHERE fv.fileid IN(" . $fids . ")";
        $result = $db->Execute($query);
        if ($result && $result->RecordCount() > 0)
        {
          while ($row = $result->FetchRow())
          {
            $searchwords .= $row['value'] . ' ';
          }
        }

        $search->AddWords($this->GetName(), $params['gid'], 'gallery', $searchwords);
      }
      else
      {
        $search->DeleteWords($this->GetName(), $params['gid'], 'gallery');
      }
    }
  }
}


if (isset($params['applybutton']))
{
  $params = array('fid' => $params['fid'], 'mode' => "edit", 'module_message' => $this->Lang('imagedetailsupdated'));
  $this->Redirect($id, 'editimage', '', $params);
}
else
{
  $params = array('gid' => $params['gid'], 'mode' => "edit", 'module_message' => $this->Lang('imagedetailsupdated'));
  $this->Redirect($id, 'editgallery', '', $params);
}
?>