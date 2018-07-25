<?php
#-------------------------------------------------------------------------
# Module: Widgets
# Author: Chris Taylor
# Copyright: (C) 2016 Chris Taylor, chris@binnovative.co.uk
# Licence: GNU General Public License version 3
#          see /Widgets/doc/LICENCE.txt or <http://www.gnu.org/licenses/>
#-------------------------------------------------------------------------

if( !defined('CMS_VERSION') ) exit;

$db = $this->GetDb();

// remove the database tables
$dict = NewDataDictionary( $db );
$sqlarray = $dict->DropTableSQL( CMS_DB_PREFIX.'module_widgets');
$dict->ExecuteSQLArray($sqlarray);
$sqlarray = $dict->DropTableSQL( CMS_DB_PREFIX.'module_widgets_category');
$dict->ExecuteSQLArray($sqlarray);

// remove the permissions
$this->RemovePermission(Widgets::MANAGE_PERM);
$this->RemovePermission(Widgets::USE_PERM);

// remove all preferences
$this->RemovePreference();

// remove templates and template types
try {
   $types = CmsLayoutTemplateType::load_all_by_originator($this->GetName());
   if( is_array($types) && count($types) ) {
      foreach( $types as $type ) {
         $templates = $type->get_template_list();
         if( is_array($templates) && count($templates) ) {
            foreach( $templates as $template ) {
               $template->delete();
            }
         }
         $type->delete();
      }
   }
}
catch( Exception $e ) {
  // log it
  audit('',$this->GetName(),'Uninstall Error: '.$e->GetMessage());
}
