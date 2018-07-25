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

if (!$this->CheckPermission('Modify Templates'))
{
	echo $this->ShowErrors(lang('needpermissionto', 'Modify Templates'));
	return;
}

if (!(isset($params['template'])))
{
	$params['module_error'] = lang('missingparams');
	$this->Redirect($id, 'defaultadmin', '', $params);
}

$template = cms_html_entity_decode($params['template']);
$this->DeleteTemplate($template);

// delete css-file
$alias = str_replace('__', '_', str_replace('-', '_', munge_string_to_url($template)));
if (file_exists('../modules/Gallery/templates/css/' . $alias . '.css'))
{
	unlink('../modules/Gallery/templates/css/' . $alias . '.css');
}

// delete template folder and content
function deleteDirectory($dir) {
	$deletefiles = glob($dir . '*', GLOB_MARK);
	foreach ($deletefiles as $file)
	{
		if (substr($file, -1) == DIRECTORY_SEPARATOR)
			deleteDirectory($file);
		else
			unlink($file);
	}
	if (is_dir($dir))
		rmdir($dir);
}

deleteDirectory(str_replace('/', DIRECTORY_SEPARATOR, '../modules/Gallery/templates/' . strtolower($template) . '/'));

// delete templateproperties
$query = "DELETE FROM " . cms_db_prefix() . "module_gallery_templateprops WHERE template=?";
$result = $db->Execute($query, array($template));

// set assigned galleries to default-template
$query = "UPDATE " . cms_db_prefix() . "module_gallery_props SET templateid=? WHERE template=?";
$result = $db->Execute($query, array(0, $template));

$params = array('tab_message' => 'templatedeleted', 'active_tab' => 'templates');
$this->Redirect($id, 'defaultadmin', '', $params);
?>