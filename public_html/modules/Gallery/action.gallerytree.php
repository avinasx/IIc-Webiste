<?php
#-------------------------------------------------------------------------------
# Module: Gallery
# Author: Jos (josvd@live.nl)
# Forge : http://dev.cmsmadesimple.org/projects/gallery/
#-------------------------------------------------------------------------------
# CMS - CMS Made Simple is (c) 2008 by Ted Kulp (wishy@cmsmadesimple.org)
# This project's homepage is: http://www.cmsmadesimple.org
#-------------------------------------------------------------------------------

if (!function_exists('cmsms')) exit;

$params['dir'] = isset($params['dir']) ? rawurldecode(cms_html_entity_decode(trim(trim($params['dir'], "*"), "/"))) : '';
$show = (isset($params['show']) && in_array($params['show'], array('active', 'inactive', 'all'))) ? $params['show'] : 'active';
$start = (isset($params['start']) && is_numeric($params['start'])) ? $params['start'] : 1;
$number = (isset($params['number']) && is_numeric($params['number'])) ? $params['number'] : 10000;
$loadcustomfields = !empty($params['loadcustomfields']);
$urlprefix = $this->GetPreference('urlprefix', 'gallery');
$folderpath = $this->GetPreference('fe_folderpath');

$targetpage = '';
$id = 'cntnt01';
if (isset($params['targetpage']))
{
	$manager = $gCms->GetHierarchyManager();
	$node = $manager->sureGetNodeByAlias($params['targetpage']);
	if (isset($node))
	{
		$targetpage = $node->getID();
	}
	else
	{
		$node = $manager->sureGetNodeById($params['targetpage']);
		if (isset($node))
		{
			$targetpage = $params['targetpage'];
		}
	}
}

Switch ($show)
{
	Case 'active':
		$showactive = " AND g1.active=1";
		break;
	Case 'inactive':
		$showactive = " AND g1.active=0";
		break;
	Default:
		$showactive = "";
		break;
}

$templateprops = Gallery_utils::GetTemplateprops('gallerytree');
if (!$templateprops)
{
	$template = $this->GetPreference('current_template');
	$templateprops = Gallery_utils::GetTemplateprops($template);
}
if (isset($params['template']))
{
	// override template settings with param template
	$templateprops = Gallery_utils::GetTemplateprops($params['template']);
}
$template = $templateprops['template'];
$jsposition = $templateprops['jsposition'];
$defaultsortitems = $templateprops['sortitems'];



if (Gallery_utils::CleanFile($params['dir']) !== FALSE)
{
	// we need to split up to get the parent dir
	$pos = strrpos($params['dir'], '/');
	if ($pos === FALSE)
	{
		$path = '';
		$file = empty($params['dir']) ? '' : $params['dir'] . '/';
	}
	else
	{
		$path = substr($params['dir'], 0, $pos);
		$file = substr($params['dir'], $pos) . '/';
	}

	$db = $this->GetDB();

	$query = "SELECT
				g1.*, g2.filepath AS thumbpath, g2.filename AS thumbname, gtp.sortitems
			FROM
				" . cms_db_prefix() . "module_gallery g1
			JOIN
				" . cms_db_prefix() . "module_gallery_props gp
			ON
				g1.fileid = gp.fileid
			LEFT JOIN
				" . cms_db_prefix() . "module_gallery_templateprops gtp
			ON
				gp.templateid = gtp.templateid
			LEFT JOIN
				" . cms_db_prefix() . "module_gallery g2
			ON
				g1.defaultfile = g2.fileid
			WHERE
				g1.filename LIKE '%/' AND ((g1.filename = ? AND g1.filepath = ?) OR (g1.filepath = ? OR g1.filepath LIKE ?))" . $showactive . "
			ORDER BY
				" . $db->Concat('g1.filepath', 'g1.filename') . " ASC";
	$result = $db->Execute($query, array($file, $path, $params['dir'], $path . $file . '%'));

	$galleries = array();

	if ($result && $result->RecordCount() > 0)
	{
		while ($row = $result->FetchRow())
		{
			// create a new object for every record that we retrieve
			$rec = new stdClass();
			$rec->fileid = $row['fileid'];
			$file = trim($row['filepath'] . $row['filename'], '/');
			$rec->file = DEFAULT_GALLERY_PATH . $file;
			$rec->filedate = $row['filedate'];
			$rec->filename = $row['filename'];
			$rec->title = $row['title'];
			$rec->titlename = empty($row['title']) ? $row['filename'] : $row['title'];
			$rec->comment = $row['comment'];
			$rec->gid = $row['galleryid'];
			$rec->isdir = true;
			$rec->sortitems = $row['sortitems'] == NULL ? $defaultsortitems : $row['sortitems'];
			$rec->fileorder = $row['fileorder'];
			$rec->depth = substr_count($file, '/') - substr_count($params['dir'], '/') + 1;

			if (empty($row['thumbname']) || !file_exists(DEFAULT_GALLERY_PATH . $row['thumbpath'] . $row['thumbname']))
			{
				$rec->thumb = $folderpath;
			}
			elseif ($templateprops['thumbwidth'] > 0)
			{
				$rec->thumb = DEFAULT_GALLERYTHUMBS_PATH . $row['defaultfile'] . '-' . $templateprops['templateid'] . substr($row['thumbname'], strrpos($row['thumbname'], '.'));
				$originalimage = DEFAULT_GALLERY_PATH . $row['thumbpath'] . $row['thumbname'];
			}
			else
			{
				$rec->thumb = DEFAULT_GALLERY_PATH . $row['thumbpath'] . IM_PREFIX . $row['thumbname'];
				$originalimage = DEFAULT_GALLERY_PATH . $row['thumbpath'] . $row['thumbname'];
			}
			$paramslink['dir'] = str_replace('%2F', '/', rawurlencode($file));
			$prettyurl = $urlprefix . '/' . $paramslink['dir'] . '/' .
					(isset($params['start']) ? $params['start'] . '-' . $params['number'] . '-' : '') .
					(isset($params['show']) ? $params['show'] . '-' : '') .
					($targetpage != '' ? $targetpage : $returnid);
			$rec->file = $this->CreateFrontendLink($id, ($targetpage != '' ? $targetpage : $returnid), 'default', '', $paramslink, '', true, true, '', false, $prettyurl);
			$rec->fields = $loadcustomfields ? Gallery_utils::Getcustomfields($rec->fileid, $rec->isdir, '', 1) : array();
			
			// add object to galleries-array
			$galleries['gid' . $row['galleryid']][] = $rec;
		}
	}

	$parentgallery = array_shift($galleries);

	function GetGallerytree($subgallery, $sortitems, &$output, &$galleries) {
		$sortarray = explode('/', 'n+fileorder/' . $sortitems);
		$subgalleries = Gallery_utils::ArraySort($subgallery, $sortarray, false);
		foreach ($subgalleries as $key => $subgallery)
		{
			$output[] = $subgallery;
			if (array_key_exists('gid' . $subgallery->fileid, $galleries))
			{
				GetGallerytree($galleries['gid' . $subgallery->fileid], $subgallery->sortitems, $output, $galleries);
			}
		}
	}

	GetGallerytree($parentgallery, $parentgallery[0]->sortitems, $output, $galleries);
}
else
{
	$params['module_message'] = $this->Lang('message_wrongdir', htmlspecialchars($params['dir']));
}


// Expose the list to smarty.
$smarty->assign('images', $output);

// and a count of records
$smarty->assign('imagecount', '');
$smarty->assign('itemcount', '');
$smarty->assign('numimages', '');
$smarty->assign('numdirs', '');
$smarty->assign('pages', 1);

// navigationlinks not nescesary, but define smarty variables for templates that use them
$smarty->assign('hideparentlink', true);
$smarty->assign('prevpage', '');
$smarty->assign('prevpage_url', '');
$smarty->assign('prevpage_txt', '');
$smarty->assign('nextpage', '');
$smarty->assign('nextpage_url', '');
$smarty->assign('nextpage_txt', '');
$smarty->assign('pagelinks', '');


if (isset($params['module_message']))
{
	$smarty->assign('module_message', $params['module_message']);
}
else
{
	$smarty->assign('module_message', '');
}


// Display template
echo $this->ProcessTemplateFromDatabase($template);


// pass data to head section.
// get template-specific JavaScript and echo
$templatecode = $this->GetTemplate($template);
$templatecodearr = explode(TEMPLATE_SEPARATOR, $templatecode);

if (empty($this->GalleryCSS)) $this->GalleryCSS = '';
if (empty($this->GalleryJS)) $this->GalleryJS = '';
$templatetitle = '<!-- Gallery/' . $template . ' -->';

if (stripos($this->GalleryCSS, $templatetitle) === FALSE )
{
	$template_head = '';
	$template_js = trim(substr($templatecodearr[2], 0, -2));
	// check if a css file exists and echo
	$alias = str_replace('__', '_', str_replace('-', '_', munge_string_to_url($template)));

	if (file_exists("modules/Gallery/templates/css/" . $alias . ".css"))
	{
		$template_head .= '
	<link rel="stylesheet" href="' . $config['root_url'] . '/modules/Gallery/templates/css/' . $alias . '.css" type="text/css" media="screen" />';
	}
	if (!$jsposition && !empty($template_js)) 
	{
		$template_head .= '
	' . $template_js;
	}
	if (!empty($template_head)) $this->GalleryCSS .= $templatetitle . $template_head . '
	';
	
	if ($jsposition && !empty($template_js))
	{
		$this->GalleryJS .= $templatetitle . '
	' . $template_js . '
	';
	}
}

?>