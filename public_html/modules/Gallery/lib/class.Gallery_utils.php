<?php
#-------------------------------------------------------------------------------
# Module: Gallery
# Author: Jos (josvd@live.nl)
# Forge : http://dev.cmsmadesimple.org/projects/gallery/
#-------------------------------------------------------------------------------
# CMS - CMS Made Simple is (c) 2008 by Ted Kulp (wishy@cmsmadesimple.org)
# This project's homepage is: http://www.cmsmadesimple.org
#-------------------------------------------------------------------------------

class Gallery_utils {

	protected function __construct() {
		
	}

	public static function Getdirfiles($path, $recursive) {
		$mod = cms_utils::get_module('Gallery');

		$path = empty($path) ? '' : trim($path, '/') . '/';
		$updir = is_dir(DEFAULT_GALLERY_PATH . $path) ? '' : '../';
		$allowext = explode(',', $mod->GetPreference('allowed_extensions', ''));
		$maxext = array('jpg', 'jpeg', 'gif', 'png');
		$output = array();
		if ($handle = opendir(str_replace('/', DIRECTORY_SEPARATOR, $updir . DEFAULT_GALLERY_PATH . $path)))
		{
			while (false !== ($file = readdir($handle)))
			{
				$ext = substr($file, strrpos($file, '.') + 1);
				if (substr($file, 0, 1) != "." && substr($file, 0, strlen(IM_PREFIX)) != IM_PREFIX && ((in_array(strtolower($ext), $allowext) && in_array(strtolower($ext), $maxext)) || is_dir($updir . DEFAULT_GALLERY_PATH . $path . $file)))
				{
					$filename = is_dir($updir . DEFAULT_GALLERY_PATH . $path . $file) ? $file . '/' : $file;
					$output[$path . $filename] = array(
						'filename' => $filename,
						'filepath' => $path,
						'filemdate' => date("Y-m-d H:i:s", filemtime($updir . DEFAULT_GALLERY_PATH . $path . $file)),
					);
					if ($recursive && is_dir($updir . DEFAULT_GALLERY_PATH . $path . $file))
					{
						$output = array_merge($output, self::Getdirfiles($path . $file, $recursive));
					}
				}
			}
			closedir($handle);
		}
		return $output;
	}

	public static function Getgalleryfiles($path) {
		$path = empty($path) ? '' : trim($path, '/') . '/';
		$output = array();
		$db = cmsms()->GetDB();
		$query = "SELECT
								g1.*, g2.filepath AS thumbpath, g2.filename AS thumbname
							FROM
								" . cms_db_prefix() . "module_gallery g1
							LEFT JOIN
								" . cms_db_prefix() . "module_gallery g2
							ON
								g1.defaultfile = g2.fileid
							WHERE
								g1.filepath=?";
		$result = $db->Execute($query, array($path));
		if ($result && $result->RecordCount() > 0)
		{
			while ($row = $result->FetchRow())
			{
				$output[$row['filepath'] . $row['filename']] = $row;
			}
		}
		return $output;
	}

	public static function GetGalleries() {
		$output = array();
		$db = cmsms()->GetDB();
		$query = "SELECT
								g1.*, g2.filepath AS thumbpath, g2.filename AS thumbname
							FROM
								" . cms_db_prefix() . "module_gallery g1
							LEFT JOIN
								" . cms_db_prefix() . "module_gallery g2
							ON
								g1.defaultfile = g2.fileid
							WHERE
								g1.fileid = 1 OR g1.filename LIKE '%/'
							ORDER BY
								" . $db->Concat('g1.filepath', 'g1.filename') . " ASC";
		$result = $db->Execute($query);
		if ($result && $result->RecordCount() > 0)
		{
			while ($row = $result->FetchRow())
			{
				$output[$row['fileid']] = $row;
			}
		}
		return $output;
	}

	public static function GalleryDropdown($id = 'cntnt01', $selected = '', $name = 'gallery_dropdown') {
		$mod = cms_utils::get_module('Gallery');
		$db = cmsms()->GetDB();
		$query = "SELECT
								fileid, filepath, filename
							FROM
								" . cms_db_prefix() . "module_gallery
							WHERE
								filename LIKE '%/'
							ORDER BY
								" . $db->Concat('filepath', 'filename') . " ASC";
		$result = $db->Execute($query);
		$glist[''] = '';
		$glist['/'] = '/';
		if ($result)
		{
			while ($row = $result->FetchRow())
			{
				$gpath = ltrim($row['filepath'] . $row['filename'], '/');
				$glist[$gpath] = $gpath;
			}
		}
		return $mod->CreateInputDropdown($id, $name, $glist, -1, $selected);
	}

	public static function Getgalleryinfo($path) {
		$path = trim($path, '/');
		if (strpos($path, '/') === FALSE)
		{
			$filename = empty($path) ? '' : $path . '/';
			$filepath = '';
		}
		else
		{
			$filename = substr($path, strrpos($path, '/') + 1) . '/';
			$filepath = substr($path, 0, strrpos($path, '/') + 1);
		}
		$db = cmsms()->GetDB();
		$query = "SELECT g.*, gp.hideparentlink, gp.editors, gt.*
				FROM " . cms_db_prefix() . "module_gallery g
				LEFT JOIN " . cms_db_prefix() . "module_gallery_props gp
				ON g.fileid=gp.fileid
				LEFT JOIN " . cms_db_prefix() . "module_gallery_templateprops gt
				ON gp.templateid=gt.templateid
				WHERE g.filename=? AND g.filepath=?";
		$result = $db->Execute($query, array($filename, $filepath));

		if ($result && $result->RecordCount() > 0)
		{
			$output = $result->FetchRow();
		}
		return isset($output) ? $output : FALSE;
	}

	public static function Getgalleryinfobyid($gid) {
		$db = cmsms()->GetDB();
		$query = "SELECT g.*, gp.hideparentlink, gp.editors, gt.*
				FROM " . cms_db_prefix() . "module_gallery g
				LEFT JOIN " . cms_db_prefix() . "module_gallery_props gp
				ON g.fileid=gp.fileid
				LEFT JOIN " . cms_db_prefix() . "module_gallery_templateprops gt
				ON gp.templateid=gt.templateid
				WHERE g.fileid=?";
		$result = $db->Execute($query, array($gid));
		if ($result && $result->RecordCount() > 0)
		{
			$output = $result->FetchRow();
		}
		return isset($output) ? $output : FALSE;
	}

	public static function Getimagebyid($fid) {
		$db = cmsms()->GetDB();
		$query = "SELECT * FROM " . cms_db_prefix() . "module_gallery WHERE fileid=?";
		$result = $db->Execute($query, array($fid));
		if ($result && $result->RecordCount() > 0)
		{
			$output = $result->FetchRow();
		}
		return isset($output) ? $output : FALSE;
	}

	public static function AddFileToDB($filename, $filepath, $filemdate, $gid, $title = '', $comment = '', $templateid = 0, $hideparentlink = false, $editors = '') {
		$mod = cms_utils::get_module('Gallery');
		$active = substr($filename, -1) == '/' ? $mod->GetPreference('newgalleries_active') : true;
		$db = cmsms()->GetDB();
		if ($db->dataProvider == 'postgres')
		{
			$insertid = $db->GenID(cms_db_prefix() . "module_gallery_fileid_seq");
			$query = "INSERT INTO " . cms_db_prefix() . "module_gallery (fileid, filename, filepath, filedate, fileorder, active, defaultfile, galleryid, title, comment) VALUES (?,?,?,?,0,?,0,?,?,?)";
			$result = $db->Execute($query, array($insertid, $filename, $filepath, $filemdate, $active, $gid, $title, $comment));
		}
		else
		{
			$query = "INSERT INTO " . cms_db_prefix() . "module_gallery (filename, filepath, filedate, fileorder, active, defaultfile, galleryid, title, comment) VALUES (?,?,?,0,?,0,?,?,?)";
			$result = $db->Execute($query, array($filename, $filepath, $filemdate, $active, $gid, $title, $comment));
			$insertid = $db->Insert_ID();
		}

		if ($result)
		{
			if (substr($filename, -1) == '/')
			{
				$query = "INSERT INTO " . cms_db_prefix() . "module_gallery_props (fileid,templateid,hideparentlink,editors) VALUES (?,?,?,?)";
				$result = $db->Execute($query, array($insertid, $templateid, $hideparentlink, $editors));
			}
		}
		else
		{
			$insertid = FALSE;
		}
		return $insertid;
	}

	public static function UpdateGalleryDB($path, $gid) {
		$path = empty($path) ? '' : trim($path, '/') . '/';
		$file_gallery = self::Getdirfiles($path, false);
		$db_gallery = self::Getgalleryfiles($path);

		if ($file_gallery)
		{
			// add to DB:
			$gallery_add = empty($db_gallery) ? $file_gallery : array_diff_key($file_gallery, $db_gallery);
			foreach ($gallery_add as $key => $item)
			{
				$fileid = self::AddFileToDB($item['filename'], $item['filepath'], $item['filemdate'], $gid);
			}
		}
		if ($db_gallery)
		{
			// delete from DB:
			$gallery_del = empty($file_gallery) ? $db_gallery : array_diff_key($db_gallery, $file_gallery);
			foreach ($gallery_del as $key => $item)
			{
				// make sure that the root gallery and other directories are not deleted here
				if ($item['fileid'] != 1 && substr($item['filename'], -1) != "/")
				{
					$delete_ids[] = $item['fileid'];
					// delete thumbs created for this image
					self::DeleteFiles(str_replace('/', DIRECTORY_SEPARATOR, '../' . DEFAULT_GALLERYTHUMBS_PATH), $item['fileid'] . '-*', false);
				}
			}
			if (isset($delete_ids))
			{
				$query = implode("','", $delete_ids);
				$query = "DELETE FROM " . cms_db_prefix() . "module_gallery WHERE fileid IN('" . $query . "')";
				$db = cmsms()->GetDB();
				$result = $db->Execute($query);
			}
		}
		return TRUE;
	}

	public static function DeleteGalleryDB($path, $gid) {
		$mod = cms_utils::get_module('Gallery');
		$path = trim($path, "/");
		$db = cmsms()->GetDB();
		$query = "SELECT fileid, filename, filepath FROM " . cms_db_prefix() . "module_gallery WHERE
			fileid <> 1 AND
			(fileid = ? OR filepath = ? OR filepath like ?)";
		$result = $db->Execute($query, array($gid, $path, $path . '/%'));
		if ($result && $result->RecordCount() > 0)
		{
			$search = cms_utils::get_search_module();
			while ($row = $result->FetchRow())
			{
				$row['filepath'] = empty($row['filepath']) ? '' : $row['filepath'] . '/';
				// delete thumbs created for this image
				self::DeleteFiles(str_replace('/', DIRECTORY_SEPARATOR, '../' . DEFAULT_GALLERYTHUMBS_PATH), $row['fileid'] . '-*', false);
				// delete original files and IM-thumbs
				self::DeleteFiles(str_replace('/', DIRECTORY_SEPARATOR, '../' . DEFAULT_GALLERY_PATH . (empty($row['filepath']) ? '' : $row['filepath'] . '/') . $row['filename']));
				self::DeleteFiles(str_replace('/', DIRECTORY_SEPARATOR, '../' . DEFAULT_GALLERY_PATH . $row['filepath']), IM_PREFIX . $row['filename'], false);
				//Update search index
				if ($search != FALSE && substr($row['filename'], -1) == '/')
				{
					$search->DeleteWords($mod->GetName(), $row['fileid'], 'gallery');
				}
			}
		}
		$query = "DELETE FROM " . cms_db_prefix() . "module_gallery WHERE
			fileid <> 1 AND
			(fileid = ? OR filepath = ? OR filepath like ?)";
		$result = $db->Execute($query, array($gid, $path, $path . '/%'));
	}

	public static function DeleteFiles($dir, $pattern = '*', $deletedir = true) {
		$deletefiles = glob($dir . $pattern, GLOB_MARK);
		foreach ($deletefiles as $file)
		{
			if (substr($file, -1) == DIRECTORY_SEPARATOR)
				self::DeleteFiles($file);
			else
				@unlink($file);
		}
		if ($deletedir && is_dir($dir))
			rmdir($dir);
	}

	public static function GetTemplateprops($template) {
		$db = cmsms()->GetDB();
		$query = "SELECT *
				FROM " . cms_db_prefix() . "module_gallery_templateprops
				WHERE template=? OR templateid=?";
		$result = $db->Execute($query, array($template, $template));

		if ($result && $result->RecordCount() > 0)
		{
			$output = $result->FetchRow();
		}
		return isset($output) ? $output : FALSE;
	}

	public static function Getcustomfields($fileid, $dirfield, $id, $onlypublic = FALSE, $enabled = TRUE) {
		$mod = cms_utils::get_module('Gallery');
		$db = cmsms()->GetDB();
		$disabled = $enabled ? '' : ' disabled="disabled"';
		$output = array();
		$query = "SELECT fd.*, fv.value
				FROM " . cms_db_prefix() . "module_gallery_fielddefs fd
				LEFT JOIN " . cms_db_prefix() . "module_gallery_fieldvals fv
				ON fd.fieldid = fv.fieldid AND fv.fileid = ?
				WHERE fd.dirfield = ?";
		if ($onlypublic)
			$query .= " AND fd.public = 1";
		$query .= " ORDER BY fd.sortorder ASC";
		$result = $db->Execute($query, array($fileid, $dirfield));
		if ($result && $result->RecordCount() > 0)
		{
			while ($row = $result->FetchRow())
			{
				$alias = strtolower(str_replace(' ', '_', $row['name']));
				$output[$alias] = $row;
				if (!empty($id))
				{
					$fieldname = 'field[' . $row['fieldid'] . ']';
          $output[$alias]['publicfieldhtml'] = $mod->CreateInputHidden($id, 'public' . $fieldname, $row['public']);
					switch ($row['type'])
					{
						case 'textinput':
							$size = min(50, $row['properties']);
							$output[$alias]['fieldhtml'] = $mod->CreateInputText($id, $fieldname, $row['value'], $size, $row['properties'], $disabled);
							break;

						case 'dropdown':
							$items = explode(',', $row['properties']);
							$items = array_combine($items, $items);
							$output[$alias]['fieldhtml'] = $mod->CreateInputDropdown($id, $fieldname, $items, -1, $row['value'], $disabled);
							break;

						case 'checkbox':
							$output[$alias]['fieldhtml'] = $mod->CreateInputCheckbox($id, $fieldname, '1', $row['value'], $disabled);
							break;

						case 'radiobuttons':
							$items = explode(',', $row['properties']);
							$items = array_combine($items, $items);
							$output[$alias]['fieldhtml'] = $mod->CreateInputRadioGroup($id, $fieldname, $items, $row['value'], $disabled);
							break;

						case 'textarea':
							$output[$alias]['fieldhtml'] = $mod->CreateTextArea(FALSE, $id, $row['value'], $fieldname, '', '', '', '', 80, 3, '', '', 'style="height:6em;"' . $disabled);
							break;

						case 'wysiwyg':
							$output[$alias]['fieldhtml'] = $mod->CreateTextArea(TRUE, $id, $row['value'], $fieldname, '', '', '', '', '', '', '', '', $disabled);
							break;
					}
				}
			}
		}

		return $output;
	}

	public static function ArraySort($array, $arguments = array(), $keys = true) {
		// source:  http://nl2.php.net/manual/en/function.uasort.php#42723
		// comparing function code
		$code = "\$result=0; ";

		// foreach sorting argument (array key)
		foreach ($arguments as $argument)
		{
			if (!empty($argument))
			{
				// order field
				$field = substr($argument, 2, strlen($argument));

				// sort type ("s" -> string, "n" -> numeric)
				$type = $argument[0];

				// sort order ("+" -> "ASC", "-" -> "DESC")
				$order = $argument[1];

				// add "if" statement, which checks if this argument should be used
				$code .= "if (!Is_Numeric(\$result) || \$result == 0) ";

				// if "numeric" sort type
				if (strtolower($type) == "n")
				{
					$code .= $order == "-" ? "\$result = (\$a->{$field} > \$b->{$field} ? -1 : (\$a->{$field} < \$b->{$field} ? 1 : 0));" : "\$result = (\$a->{$field} > \$b->{$field} ? 1 : (\$a->{$field} < \$b->{$field} ? -1 : 0)); ";
				}
				else
				{
					// if "string" sort type
					$code .= $order == "-" ? "\$result = strcoll(\$a->{$field}, \$b->{$field}) * -1;" : "\$result = strcoll(\$a->{$field}, \$b->{$field}); ";
				}
			}
		}
		// return result
		$code .= "return \$result;";

		// create comparing function
		$compare = create_function('$a, $b', $code);

		// sort array and preserve keys
		uasort($array, $compare);

		// return array
		return $array;
	}

	public static function CleanFile($filename) {
		// Ensure that the file is somewhere underneath the images/gallery path
		$config = cmsms()->GetConfig();
		$galleryrootpath = realpath(str_replace('/', DIRECTORY_SEPARATOR, $config['root_path'] . '/' . DEFAULT_GALLERY_PATH));
		$filepath = realpath(str_replace('/', DIRECTORY_SEPARATOR, $config['root_path'] . '/' . DEFAULT_GALLERY_PATH . $filename));
		if ($filepath === FALSE || strpos($filepath, $galleryrootpath) !== 0)
		{
			return FALSE;
		}
		return $filepath;
	}

	public static function CreateThumbnail($thumbname, $image, $thumbwidth, $thumbheight, $method, $x1 = 0, $y1 = 0, $x2 = 0, $y2 = 0) {
		$mod = cms_utils::get_module('Gallery');
		$zoom = .30; // zoom percentage
		$imgdata = @getimagesize($image);
		if ($imgdata === FALSE)
			return FALSE;
		$imgratio = $imgdata[0] / $imgdata[1];  // width/height
		$thumbratio = $thumbwidth / $thumbheight;
		switch ($method)
		{
			case "sc": // scale
			case "zs": // zoom & scale
				$src_x = 0;
				$src_y = 0;
				$src_w = $imgdata[0];
				$src_h = $imgdata[1];
				if ($imgratio > $thumbratio)
				{
					$newwidth = $thumbwidth;
					$newheight = ceil($thumbwidth / $imgratio);
				}
				else
				{
					$newheight = $thumbheight;
					$newwidth = ceil($thumbheight * $imgratio);
				}
				break;

			case "cr": // crop
			case "zc": // zoom & crop
				$newwidth = $thumbwidth;
				$newheight = $thumbheight;
				if ($imgratio > $thumbratio)
				{
					$src_x = ceil(($imgdata[0] - $imgdata[1] * $thumbratio) / 2);
					$src_y = 0;
					$src_w = $imgdata[0] - $src_x * 2;
					$src_h = $imgdata[1];
				}
				else
				{
					$src_x = 0;
					$src_y = ceil(($imgdata[1] - $imgdata[0] / $thumbratio) / 3);
					$src_w = $imgdata[0];
					$src_h = $imgdata[1] - $src_y * 3;
				}
				break;
		}
		if (!empty($x2))
		{
			$src_x = $x1;
			$src_y = $y1;
			$src_w = $x2 - $x1;
			$src_h = $y2 - $y1;
		}
		elseif ($method == "zs" || $method == "zc")
		{
			$src_x = $src_x + ceil($zoom / 2 * $src_w);
			$src_y = $src_y + ceil($zoom / 3 * $src_h);
			$src_w = ceil($src_w * (1 - $zoom));
			$src_h = ceil($src_h * (1 - $zoom));
		}
		if (file_exists($thumbname))
		{
			$thumbdata = getimagesize($thumbname);
		}
		if (!isset($thumbdata) || $thumbdata[0] != $newwidth || $thumbdata[1] != $newheight)
		{
			$newimage = imagecreatetruecolor($newwidth, $newheight);
			switch ($imgdata[2])
			{
				case IMAGETYPE_GIF:
					$source = imagecreatefromgif($image);
					$trnprt_indx = imagecolortransparent($source);
					if ($trnprt_indx >= 0)
					{
						@$trnprt_color = imagecolorsforindex($source, $trnprt_indx);
						$trnprt_indx = imagecolorallocate($newimage, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);
						imagefill($newimage, 0, 0, $trnprt_indx);
						imagecolortransparent($newimage, $trnprt_indx);
						@imagetruecolortopalette($newimage, true, imagecolorstotal($image));
					}
					break;
				case IMAGETYPE_JPEG:
					$source = imagecreatefromjpeg($image);
					break;
				case IMAGETYPE_PNG:
					$source = imagecreatefrompng($image);
					imagealphablending($newimage, false);
					$trnprt_color = imagecolorallocatealpha($newimage, 0, 0, 0, 127);
					imagefill($newimage, 0, 0, $trnprt_color);
					imagesavealpha($newimage, true);
					break;
				default:
					return FALSE;
			}

			imagecopyresampled($newimage, $source, 0, 0, $src_x, $src_y, $newwidth, $newheight, $src_w, $src_h);
			switch ($imgdata[2])
			{
				case IMAGETYPE_GIF:
					imagegif($newimage, $thumbname);
					break;
				case IMAGETYPE_JPEG:
					imagejpeg($newimage, $thumbname, $mod->GetPreference('thumbjpgquality', 80));
					break;
				case IMAGETYPE_PNG:
					imagepng($newimage, $thumbname);
					break;
				default:
					return FALSE;
			}
			imagedestroy($newimage);
		}
		return $thumbname;
	}

	public static function RotateImage($image, $degrees) {
		$mod = cms_utils::get_module('Gallery');
		$imgdata = @getimagesize($image);
		$source = imagecreatefromjpeg($image);
		switch ($imgdata[2])
		{
			case IMAGETYPE_GIF:
				$source = imagecreatefromgif($image);
				break;
			case IMAGETYPE_JPEG:
				$source = imagecreatefromjpeg($image);
				break;
			case IMAGETYPE_PNG:
				$source = imagecreatefrompng($image);
				break;
			default:
				return FALSE;
		}

		// Rotate
		$newimage = imagerotate($source, $degrees, 0);

		// Output
		switch ($imgdata[2])
		{
			case IMAGETYPE_GIF:
				$trnprt_indx = imagecolortransparent($source);
				if ($trnprt_indx >= 0)
				{
					@$trnprt_color = imagecolorsforindex($source, $trnprt_indx);
					$trnprt_indx = imagecolorallocate($newimage, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);
					imagefill($newimage, 0, 0, $trnprt_indx);
					imagecolortransparent($newimage, $trnprt_indx);
					@imagetruecolortopalette($newimage, true, imagecolorstotal($image));
				}
				imagegif($newimage, $image);
				break;
			case IMAGETYPE_JPEG:
				imagejpeg($newimage, $image, $mod->GetPreference('imagejpgquality', 80));
				break;
			case IMAGETYPE_PNG:
				imagealphablending($newimage, false);
				$trnprt_color = imagecolorallocatealpha($newimage, 0, 0, 0, 127);
				imagefill($newimage, 0, 0, $trnprt_color);
				imagesavealpha($newimage, true);
				imagepng($newimage, $image);
				break;
		}
		imagedestroy($newimage);

		$pos = strrpos($image, '/');
		$thumbname = $pos === FALSE ? IM_PREFIX . $image : substr_replace($image, IM_PREFIX, $pos + 1, 0);

		// create default thumbnail
		$thumbcr = self::CreateThumbnail($thumbname, $image, IM_THUMBWIDTH, IM_THUMBHEIGHT, 'sc');
	}

	public static function GetEditors() {
		$editors = array();

		$gCms = cmsms();
		$groupops = $gCms->GetGroupOperations();
		$allgroups = $groupops->LoadGroups();
		foreach ($allgroups as $onegroup)
		{
			if ($onegroup->id == 1)
				continue;
			$editors[lang('group') . ': ' . $onegroup->name] = $onegroup->id * -1;
		}

		$userops = $gCms->GetUserOperations();
		$allusers = $userops->LoadUsers();
		foreach ($allusers as $oneuser)
		{
			$editors[$oneuser->username] = $oneuser->id;
		}

		return $editors;
	}

	public static function CheckEditor($userid, $gid, $editors = array()) {
		$mod = cms_utils::get_module('Gallery');

		if (!$mod->GetPreference('use_permissions'))
			return true;
		if (!empty($editors) && in_array($userid, $editors))
			return true;
		if ($mod->CheckPermission('Gallery - Edit all galleries'))
			return true;

		$gCms = cmsms();
		$userops = $gCms->GetUserOperations();
		$adminuser = $userops->UserInGroup($userid, 1);
		if ($adminuser)
			return true;

		foreach ($editors as $editor)
		{
			if ($editor < 0)
			{
				$user = $userops->UserInGroup($userid, $editor * -1);
				if ($user)
					return true;
			}
		}

		return false;
	}

}

?>