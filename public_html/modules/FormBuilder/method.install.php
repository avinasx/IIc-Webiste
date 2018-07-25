<?php
#-------------------------------------------------------------------------
# Module: FormBuilder
# Author: Samuel Goldstein, Morten Poulsen
#-------------------------------------------------------------------------
# CMS Made Simple is (c) 2004 - 2011 by Ted Kulp (wishy@cmsmadesimple.org)
# CMS Made Simple is (c) 2011 - 2014 by The CMSMS Dev Team
# This project's homepage is: http://www.cmsmadesimple.org
# The module's homepage is: http://dev.cmsmadesimple.org/projects/formbuilder
#-------------------------------------------------------------------------
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
# Or read it online: http://www.gnu.org/licenses/licenses.html#GPL
#-------------------------------------------------------------------------

if( !defined('CMS_VERSION') ) exit;

if (! $this->CheckAccess()) exit;

$db = $this->GetDb();
$dict = NewDataDictionary($db);
$flds = "
	form_id I KEY,
	name C(255),
	alias C(255)
";
$taboptarray = array('mysql' => 'TYPE=MyISAM');
$sqlarray = $dict->CreateTableSQL(cms_db_prefix().'module_fb_form', $flds, $taboptarray);
$dict->ExecuteSQLArray($sqlarray);

$db->CreateSequence(cms_db_prefix().'module_fb_form_seq');
$db->Execute('CREATE UNIQUE INDEX '.cms_db_prefix().'module_fb_form_idx on '.cms_db_prefix().'module_fb_form (alias)');

$flds = "
	form_attr_id I KEY,
	form_id I,
	name C(35),
	value X
";
$sqlarray = $dict->CreateTableSQL(cms_db_prefix().'module_fb_form_attr', $flds, $taboptarray);
$dict->ExecuteSQLArray($sqlarray);

$db->CreateSequence(cms_db_prefix().'module_fb_form_attr_seq');
$db->Execute('create index '.cms_db_prefix().'module_fb_form_attr_idx on '.cms_db_prefix().'module_fb_form_attr (form_id)');

$flds = "
	field_id I KEY,
	form_id I,
	name C(255),
	type C(50),
	validation_type C(50),
	required I1,
	hide_label I1,
	order_by I
";
$sqlarray = $dict->CreateTableSQL(cms_db_prefix().'module_fb_field', $flds, $taboptarray);
$dict->ExecuteSQLArray($sqlarray);

$db->CreateSequence(cms_db_prefix().'module_fb_field_seq');
$db->Execute('create index '.cms_db_prefix().'module_fb_field_idx on '.cms_db_prefix().'module_fb_field (form_id)');


$flds = "
	option_id I KEY,
	field_id I,
	form_id I,
	name C(255),
	value X
";
$sqlarray = $dict->CreateTableSQL(cms_db_prefix().'module_fb_field_opt', $flds, $taboptarray);
$dict->ExecuteSQLArray($sqlarray);

$db->CreateSequence(cms_db_prefix().'module_fb_field_opt_seq');
$db->Execute('create index '.cms_db_prefix().'module_fb_field_opt_idx on '.cms_db_prefix().'module_fb_field_opt (field_id,form_id)');

$flds = "
	flock_id I KEY,
	flock T
";

$sqlarray = $dict->CreateTableSQL(cms_db_prefix().'module_fb_flock', $flds, $taboptarray);
$dict->ExecuteSQLArray($sqlarray);

$flds = "
	resp_id I KEY,
	form_id I,
	feuser_id I,
	user_approved ".CMS_ADODB_DT.",
	secret_code C(35),
	admin_approved ".CMS_ADODB_DT.",
	submitted ".CMS_ADODB_DT;
$sqlarray = $dict->CreateTableSQL(cms_db_prefix().'module_fb_resp', $flds, $taboptarray);
$dict->ExecuteSQLArray($sqlarray);

$flds = "
	resp_attr_id I KEY,
	resp_id I,
	name C(35),
	value X
";
$sqlarray = $dict->CreateTableSQL(cms_db_prefix().'module_fb_resp_attr', $flds, $taboptarray);
$dict->ExecuteSQLArray($sqlarray);

$db->CreateSequence(cms_db_prefix().'module_fb_resp_attr_seq');


$db->CreateSequence(cms_db_prefix().'module_fb_resp_seq');

$flds = "
	resp_val_id I KEY,
	resp_id I,
	field_id I,
	value X
";
$sqlarray = $dict->CreateTableSQL(cms_db_prefix().'module_fb_resp_val', $flds, $taboptarray);
$dict->ExecuteSQLArray($sqlarray);

$db->CreateSequence(cms_db_prefix().'module_fb_resp_val_seq');

$flds = "
	sent_id I KEY,
	src_ip C(16),
	sent_time ".CMS_ADODB_DT;
$sqlarray = $dict->CreateTableSQL(cms_db_prefix().'module_fb_ip_log', $flds, $taboptarray);
$dict->ExecuteSQLArray($sqlarray);

$db->CreateSequence(cms_db_prefix().'module_fb_ip_log_seq');

$flds = "
		fbr_id I KEY,
		form_id I,
		index_key_1 C(80),
		index_key_2 C(80),
		index_key_3 C(80),
		index_key_4 C(80),
		index_key_5 C(80),
		feuid I,
		response XL,
		user_approved ".CMS_ADODB_DT.",
		secret_code C(35),
		admin_approved ".CMS_ADODB_DT.",
		submitted ".CMS_ADODB_DT;
		
$sqlarray = $dict->CreateTableSQL(cms_db_prefix().'module_fb_formbrowser', $flds, $taboptarray);
$dict->ExecuteSQLArray($sqlarray);

$db->CreateSequence(cms_db_prefix().'module_fb_formbrowser_seq');
$db->CreateSequence(cms_db_prefix().'module_fb_uniquefield_seq');

$this->CreatePermission('Modify Forms', 'Modify Forms');

$this->CreateEvent( 'OnFormBuilderFormSubmit' );
$this->CreateEvent( 'OnFormBuilderFormDisplay' );
$this->CreateEvent( 'OnFormBuilderFormSubmitError' );

$txt = file_get_contents( cms_join_path(dirname(__FILE__), 'includes', 'default.css') );

if ( !formbuilder_utils::is_CMS2() )
{
  # < 2.0
  $stylesheetops = cmsms()->GetStylesheetOperations();
  
  if( !$stylesheetops->CheckExistingStylesheetName('FormBuilder Default Style') )
  {
    $stylesheet = new Stylesheet();
    $stylesheet->name = 'FormBuilder Default Style';
    $stylesheet->value = $txt;   
    $stylesheet->media_type = 'screen';
    $stylesheetops->InsertStylesheet($stylesheet);
  }
}
else
{
  # > 2.0
  $stylesheet = new \CmsLayoutStylesheet;
    
  // dirty test to check if a stylesheet with the same name already exists 
  try
  {
    $test = $stylesheet->load('FormBuilder Default Style'); 
  } 
  catch(Exception $e)
  {
    # it doesn't exist so create one
    $stylesheet->set_name('FormBuilder Default Style'); 
    $stylesheet->set_description('A sample stylesheet for the FormBuilder Default Style');
    $stylesheet->set_content($txt);
    $stylesheet->save();
  };

}

$path = cms_join_path(dirname(__FILE__), 'includes');
$dir = opendir($path);

while( $filespec = readdir($dir) )
{
  $params = array();
  $aeform = '';
  
  if (preg_match('/.xml$/', $filespec) > 0)
  {
    $params['fbrp_xml_file'] = cms_join_path($path,$filespec);
    $aeform = new fbForm($this, $params, true);
		$res = $aeform->ImportXML($params);
  }
}

#
# EOF
#
?>