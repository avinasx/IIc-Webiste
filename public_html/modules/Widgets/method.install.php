<?php
#-------------------------------------------------------------------------
# Module: Widgets
# Author: Chris Taylor
# Copyright: (C) 2016 Chris Taylor, chris@binnovative.co.uk
# Licence: GNU General Public License version 3
#          see /Widgets/doc/LICENCE.txt or <http://www.gnu.org/licenses/>
#-------------------------------------------------------------------------

if( !defined('CMS_VERSION') ) exit;

$uid = null;
if( cmsms()->test_state(CmsApp::STATE_INSTALL) ) {
   $uid = 1; // hardcode to first user
} else {
   $uid = get_userid();
}

// setup Module permissions
$this->CreatePermission(Widgets::MANAGE_PERM,'Widgets - Manage');
$this->CreatePermission(Widgets::USE_PERM,'Widgets - Use');

$this->SetPreference('customModuleName', 'Widgets');
$this->SetPreference('adminSection', 'content');
$this->SetPreference('styleOptions', $this->Lang('default_style_options'));

// Create Tables
$db = $this->GetDb();
$dict = NewDataDictionary($db);
$taboptarray = array('mysql' => 'TYPE=MyISAM');

// create widgets table
$fields = "
   id I KEY AUTO,
   category_id I KEY,
   title C(255) NOTNULL,
   alias C(255) KEY,
   position I,
   active I1,
   heading C(255),
   content X,
   link_to I,
   link_text C(255),
   style_options X,
   wysiwyg I1
   ";
$sqlarray = $dict->CreateTableSQL(CMS_DB_PREFIX.'module_widgets', $fields, $taboptarray);
$dict->ExecuteSQLArray($sqlarray);

// create category table
$fields = '
   category_id I KEY AUTO,
   category_name C(255),
   category_alias C(255) NOTNULL,
   default_category I1
   ';
$sqlarray = $dict->CreateTableSQL(CMS_DB_PREFIX.'module_widgets_category', $fields, $taboptarray);
$dict->ExecuteSQLArray($sqlarray);

// create default category
$sql = 'INSERT INTO '.CMS_DB_PREFIX.'module_widgets_category (category_name, default_category) VALUES (?,?)';
$dbr = $db->Execute($sql, array('General', TRUE));



// Setup Summary template
try {
  $template_type = new CmsLayoutTemplateType();
  $template_type->set_originator($this->GetName());
  $template_type->set_name('Template');
  $template_type->set_dflt_flag(TRUE);
  $template_type->set_lang_callback('Widgets::page_type_lang_callback');
  $template_type->set_content_callback('Widgets::reset_page_type_defaults');
  $template_type->reset_content_to_factory();
  $template_type->save();
}
catch( CmsException $e ) {
  // log it
  debug_to_log(__FILE__.':'.__LINE__.' '.$e->GetMessage());
  audit('',$this->GetName(),'Installation Error: '.$e->GetMessage());
}

try {
  $fn = dirname(__FILE__).DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'orig_template.tpl';
  if( file_exists( $fn ) ) {
    $template = @file_get_contents($fn);
    $tpl = new CmsLayoutTemplate();
    $tpl->set_name('Widgets Sample');
    $tpl->set_owner($uid);
    $tpl->set_content($template);
    $tpl->set_type($template_type);
    $tpl->set_type_dflt(TRUE);
    $tpl->save();
  }
}
catch( CmsException $e ) {
  // log it
  debug_to_log(__FILE__.':'.__LINE__.' '.$e->GetMessage());
  audit('',$this->GetName(),'Installation Error: '.$e->GetMessage());
}
