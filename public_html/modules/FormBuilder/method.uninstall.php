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
$sqlarray = $dict->DropTableSQL(cms_db_prefix().'module_fb_form');
$dict->ExecuteSQLArray($sqlarray);

$db->DropSequence(cms_db_prefix().'module_fb_form_seq');

$sqlarray = $dict->DropTableSQL(cms_db_prefix().'module_fb_form_attr');
$dict->ExecuteSQLArray($sqlarray);

$db->DropSequence(cms_db_prefix().'module_fb_form_attr_seq');

$sqlarray = $dict->DropTableSQL(cms_db_prefix().'module_fb_field');
$dict->ExecuteSQLArray($sqlarray);

$db->DropSequence(cms_db_prefix().'module_fb_field_seq');

$sqlarray = $dict->DropTableSQL(cms_db_prefix().'module_fb_field_opt');
$dict->ExecuteSQLArray($sqlarray);

$db->DropSequence(cms_db_prefix().'module_fb_field_opt_seq');

$sqlarray = $dict->DropTableSQL(cms_db_prefix().'module_fb_flock');
$dict->ExecuteSQLArray($sqlarray);

$sqlarray = $dict->DropTableSQL(cms_db_prefix().'module_fb_resp_val');
$dict->ExecuteSQLArray($sqlarray);
$sqlarray = $dict->DropTableSQL(cms_db_prefix().'module_fb_resp');
$dict->ExecuteSQLArray($sqlarray);
$sqlarray = $dict->DropTableSQL(cms_db_prefix().'module_fb_resp_attr');
$dict->ExecuteSQLArray($sqlarray);

$sqlarray = $dict->DropTableSQL(cms_db_prefix().'module_fb_ip_log');
$dict->ExecuteSQLArray($sqlarray);

$sqlarray = $dict->DropTableSQL(cms_db_prefix().'module_fb_formbrowser');
$dict->ExecuteSQLArray($sqlarray);


$db->DropSequence(cms_db_prefix().'module_fb_resp_seq');
$db->DropSequence(cms_db_prefix().'module_fb_resp_val_seq');
$db->DropSequence(cms_db_prefix().'module_fb_resp_attr_seq');
$db->DropSequence(cms_db_prefix().'module_fb_ip_log_seq');
$db->DropSequence(cms_db_prefix().'module_fb_formbrowser_seq');
$db->DropSequence(cms_db_prefix().'module_fb_uniquefield_seq');

$this->RemovePermission('Modify Forms');

$this->RemoveEvent( 'OnFormBuilderFormSubmit' );
$this->RemoveEvent( 'OnFormBuilderFormDisplay' );
$this->RemoveEvent( 'OnFormBuilderFormSubmitError' );

$this->RemovePreference('hide_errors');
$this->RemovePreference('show_version');
$this->RemovePreference('relaxed_email_regex');
$this->RemovePreference('enable_fastadd');
$this->RemovePreference('enable_antispam');
$this->RemovePreference('require_fieldnames');
$this->RemovePreference('unique_fieldnames');
$this->RemovePreference('show_fieldids');
$this->RemovePreference('show_fieldaliases');
$this->RemovePreference('mle_version');

if ( !formbuilder_utils::is_CMS2() )
{
  # < 2.0
  $stylesheetops = cmsms()->GetStylesheetOperations();
  
  if( !$stylesheetops->CheckExistingStylesheetName('FormBuilder Default Style') )
  {
    $stylesheetops = cmsms()->GetStylesheetOperations();
    $stylesheetops->DeleteStylesheetByName('FormBuilder Default Style');
  }

}
else
{
  # > 2.0
  $css = new \CmsLayoutStylesheet;
  
  // dirty test to check if the stylesheet exists
  try
  {
    $stylesheet = $css->load('FormBuilder Default Style');
    $stylesheet->delete();
  } 
  catch(Exception $e)
  { 
    # do nothing: it doesn't exist anyway... 
  };
}


#
# EOF
#
?>