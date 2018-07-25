<?php
#-------------------------------------------------------------------------
# Module: Widgets
# Author: Chris Taylor
# Copyright: (C) 2016 Chris Taylor, chris@binnovative.co.uk
# Licence: GNU General Public License version 3
#          see /Widgets/doc/LICENCE.txt or <http://www.gnu.org/licenses/>
#-------------------------------------------------------------------------

class WidgetCategory {

   private $_data = array( 'category_id'=>null, 'category_name'=>null, 'category_alias'=>null, 'default_category'=>null );

   public function __get($key) {
      switch( $key ) {
         case 'category_id':
         case 'category_name':
         case 'category_alias':
         case 'default_category':
         return $this->_data[$key];
      }
   }

   public function __set($key,$val) {
      switch( $key ) {
         case 'category_name':
            $this->_data[$key] = trim($val);
            break;
         case 'category_alias':
            $this->_data[$key] = trim($val);
            break;
         case 'default_category':
            $this->_data[$key] = (bool) $val;
            break;
      }
   }

   public function save() {
      // test if valid before calling save()
      if ( $this->category_id > 0 ) {
         $saved = $this->update();
      } else {
         $saved = $this->insert();
      }
      return $saved;
   }


   protected function insert() {
      $db = \cms_utils::get_db();
      $sql = 'INSERT INTO '.CMS_DB_PREFIX.'module_widgets_category (category_name, category_alias) VALUES (?,?)';
      $dbr = $db->Execute( $sql, array($this->category_name, $this->category_alias) );
      if( !$dbr ) return FALSE;
      $this->_data['category_id'] = $db->Insert_ID();
      return TRUE;
   }

   protected function update() {
      $db = \cms_utils::get_db();
      $sql = 'UPDATE '.CMS_DB_PREFIX.'module_widgets_category SET category_name = ?, category_alias=? WHERE category_id = ?';
      $dbr = $db->Execute($sql, array($this->category_name, $this->category_alias, $this->category_id));
      if( !$dbr ) return FALSE;
      return TRUE;
   }

   public function delete() {
      if( !$this->category_id || $this->default_category==TRUE) return FALSE;
      $db = \cms_utils::get_db();
      $sql = 'DELETE FROM '.CMS_DB_PREFIX.'module_widgets_category WHERE category_id = ?';
      $dbr = $db->Execute($sql, array($this->category_id));
      if( !$dbr ) return FALSE;
      $this->_data['category_id'] = null;
      return TRUE;
   }

   public function setAsDefault() {
      if( !$this->category_id ) return FALSE;
      $db = \cms_utils::get_db();
      $sql = 'UPDATE '.CMS_DB_PREFIX.'module_widgets_category SET default_category = FALSE';
      $dbr = $db->Execute($sql);
      if( !$dbr ) return FALSE;
      $sql = 'UPDATE '.CMS_DB_PREFIX.'module_widgets_category SET default_category = TRUE WHERE category_id = ?';
      $dbr = $db->Execute($sql, array($this->category_id));
      if( !$dbr ) return FALSE;
      return TRUE;
   }

   /** internal */
   public function fill_from_array($row) {
      foreach( $row as $key => $val ) {
         if( array_key_exists($key,$this->_data) ) {
            $this->_data[$key] = $val;
         }
      }
   }

   public static function &load_by_id($category_id) {
      $category_id = (int) $category_id;
      $db = \cms_utils::get_db();
      $sql = 'SELECT * FROM '.CMS_DB_PREFIX.'module_widgets_category WHERE category_id = ?';
      $row = $db->GetRow($sql,array($category_id));
      if( is_array($row) ) {
         $obj = new self();
         $obj->fill_from_array($row);
         return $obj;
      }
   }

   public function getCategories() {
      // return full Categories array, with default category first
      $db = \cms_utils::get_db();
      $sql = 'SELECT category_id,category_name, category_alias FROM '.CMS_DB_PREFIX.'module_widgets_category '.
         'ORDER BY default_category DESC,category_id';
      $res = $db->GetAll($sql);
      $categories = array();
      foreach($res as $cat) {
         $categories[$cat['category_id']] = $cat['category_name'];
      }
      return $categories;
   }


}

?>