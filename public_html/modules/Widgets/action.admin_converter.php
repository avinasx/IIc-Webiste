<?php
#-------------------------------------------------------------------------
# Module: Widgets
# Author: Chris Taylor
# Copyright: (C) 2016 Chris Taylor, chris@binnovative.co.uk
# Licence: GNU General Public License version 3
#          see /Widgets/doc/LICENCE.txt or <http://www.gnu.org/licenses/>
#-------------------------------------------------------------------------

if( !defined('CMS_VERSION') ) exit;
if( !$this->CheckPermission(Widgets::USE_PERM) ) return;

$parms = array('active_tab' => 'converter');

if(isset($params['import_from_LISEWidgets'])) {
   //
   $mod_prefix = cms_db_prefix().'module_';
   $table_list = array('widgets', 'widgets_category');
   $db = cmsms()->GetDb();

   // remove all current Widgets & categories
   foreach($table_list as $one) {
      $sql = 'DELETE FROM '.$mod_prefix.$one;
      $res = $db->Execute($sql);

      if(!$res) throw new Exception( $db->ErrorMsg() );
   }

   // add categories from LISEWidgets
   $sql = 'INSERT INTO '.cms_db_prefix().'module_widgets_category (category_id, category_name, category_alias)
      SELECT category_id, category_name, category_alias FROM '.cms_db_prefix().'module_lisewidgets_category';
   $res = $db->Execute($sql);
   if(!$res) throw new Exception( $db->ErrorMsg() );
   // set default category
   $sql = 'UPDATE '.cms_db_prefix().'module_widgets_category SET default_category = "1" LIMIT 1';
   $res = $db->Execute($sql);
   if(!$res) throw new Exception( $db->ErrorMsg() );

   $sql = 'INSERT INTO '.cms_db_prefix().'module_widgets (title, alias, position, active, category_id)
      SELECT LW.title, LW.alias, LW.position, LW.active, LCAT.category_id
      FROM '.cms_db_prefix().'module_lisewidgets_item AS LW
      LEFT JOIN '.cms_db_prefix().'module_lisewidgets_item_categories AS LCAT
         ON LW.item_id=LCAT.item_id';
   $res = $db->Execute($sql);
   if(!$res) throw new Exception( $db->ErrorMsg() );

   // fieldMap - array of Widget field names => LISE Field Value aliases
   $fieldMap = array('heading'=>'heading', 'content'=>'content', 'link_to'=>'link_to', 'link_text'=>'link_text');
   foreach ($fieldMap as $widgetField => $LISEField) {
      $sql = 'UPDATE cms_module_widgets AS W
         JOIN cms_module_lisewidgets_item AS LW
            ON W.alias=LW.alias
         JOIN cms_module_lisewidgets_fieldval AS LFV
            ON LW.item_id=LFV.item_id
         JOIN cms_module_lisewidgets_fielddef AS LFD
               ON LFV.fielddef_id=LFD.fielddef_id
         SET W.'.$widgetField.'=LFV.value
         WHERE LFD.alias=?';
      $res = $db->Execute($sql, array($LISEField) );
      if(!$res) throw new Exception( $db->ErrorMsg() );
   }

   // combine multiple LISE styles records into one comma separated text field 'style_options'
   $sql = 'SELECT LW.alias,LFV.value FROM cms_module_widgets AS W
      JOIN cms_module_lisewidgets_item AS LW
         ON W.alias=LW.alias
      JOIN cms_module_lisewidgets_fieldval AS LFV
         ON LW.item_id=LFV.item_id
      JOIN cms_module_lisewidgets_fielddef AS LFD
            ON LFV.fielddef_id=LFD.fielddef_id
      WHERE LFD.alias = ?';
   $res = $db->GetAll($sql, array('styles') );
   if ($res) {
      $combinedStyles = array();
      foreach ($res as $style) {
         if ( array_key_exists($style['alias'], $combinedStyles) ) {
            $combinedStyles[$style['alias']] .= ','.$style['value'];
         } else {
            $combinedStyles[$style['alias']] = $style['value'];
         }
      }
      foreach ($combinedStyles as $alias => $style) {
         $sql = 'UPDATE cms_module_widgets AS W SET W.style_options=? WHERE W.alias=?';
         $res = $db->Execute($sql, array($style, $alias) );
         if(!$res) throw new Exception( $db->ErrorMsg() );
      }
   }

   $this->Redirect($id, 'defaultadmin', $returnid, $parms);
}
