<?php
#-------------------------------------------------------------------------
# Module: Widgets
# Author: Chris Taylor
# Copyright: (C) 2016 Chris Taylor, chris@binnovative.co.uk
# Licence: GNU General Public License version 3
#          see /Widgets/doc/LICENCE.txt or <http://www.gnu.org/licenses/>
#-------------------------------------------------------------------------

class WidgetItem {

   private $_data = array( 'id'=>null, 'category_id'=>null, 'title'=>null, 'alias'=>null, 'position'=>null, 'active'=>null, 'heading'=>null, 'content'=>null, 'link_to'=>null, 'link_text'=>null, 'style_options'=>null, 'wysiwyg'=>null );

   public function __get($key) {
      switch( $key ) {
         case 'id':
         case 'category_id':
         case 'title':
         case 'alias':
         case 'position':
         case 'active':
         case 'heading':
         case 'content':
         case 'link_to':
         case 'link_text':
         case 'style_options':
         case 'wysiwyg':
         return $this->_data[$key];
      }
   }

   public function __set($key,$val) {
      switch( $key ) {
         case 'title':
            $this->_data[$key] = trim($val);
            break;
         case 'category_id':
            $this->_data[$key] = (int) $val;
            break;
         case 'alias':
            $this->_data[$key] = trim($val);
            break;
         case 'position':
            $this->_data[$key] = (int) $val;
            break;
         case 'active':
            $this->_data[$key] = (bool) $val;
            break;
         case 'heading':
            $this->_data[$key] = trim($val);
            break;
         case 'content':
            $this->_data[$key] = trim($val);
            break;
         case 'link_to':
            $this->_data[$key] = (int) $val;
            break;
         case 'link_text':
            $this->_data[$key] = trim($val);
            break;
         case 'style_options':
            $this->_data[$key] = trim($val);
            break;
         case 'wysiwyg':
            $this->_data[$key] = (bool) $val;
            break;
      }
   }

   public function save() {
      // test if valid before calling save()
      //if ( !$this->is_valid() ) return FALSE;
      if ( $this->id > 0 ) {
         $saved = $this->update();
      } else {
         $saved = $this->insert();
      }
      return $saved;
   }


   protected function insert() {
      $db = \cms_utils::get_db();
      $sql = 'INSERT INTO '.CMS_DB_PREFIX.'module_widgets (category_id, title, alias, position, active, heading, content, link_to, link_text, style_options, wysiwyg) VALUES (?,?,?,?,?,?,?,?,?,?,?)';
      $dbr = $db->Execute($sql, array($this->category_id, $this->title, $this->alias, $this->position, $this->active, $this->heading, $this->content, $this->link_to, $this->link_text, $this->style_options, $this->wysiwyg));
      if( !$dbr ) return FALSE;
      $this->_data['id'] = $db->Insert_ID();
      return TRUE;
   }

   protected function update() {
      $db = \cms_utils::get_db();
      $sql = 'UPDATE '.CMS_DB_PREFIX.'module_widgets SET category_id = ?, title = ?, alias = ?, position = ?, active = ?, heading = ?, content = ?, link_to = ?, link_text = ?, style_options = ?, wysiwyg = ? WHERE id = ?';
      $dbr = $db->Execute($sql, array($this->category_id, $this->title, $this->alias, $this->position, $this->active, $this->heading, $this->content, $this->link_to, $this->link_text, $this->style_options, $this->wysiwyg, $this->id));
      if( !$dbr ) return FALSE;
      return TRUE;
   }

   public function delete() {
      if( !$this->id ) return FALSE;
      $db = \cms_utils::get_db();
      $sql = 'DELETE FROM '.CMS_DB_PREFIX.'module_widgets WHERE id = ?';
      $dbr = $db->Execute($sql,array($this->id));
      if( !$dbr ) return FALSE;
      $this->_data['id'] = null;
      return TRUE;
   }

   public function toggle_active() {
      if( !$this->id ) return FALSE;
      $db = \cms_utils::get_db();
      $sql = 'UPDATE '.CMS_DB_PREFIX.'module_widgets SET active = ? WHERE id = ?';
      $dbr = $db->Execute($sql,array(!(bool)$this->active, $this->id));
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

   public static function &load_by_id($id) {
      $id = (int) $id;
      $db = \cms_utils::get_db();
      $sql = 'SELECT * FROM '.CMS_DB_PREFIX.'module_widgets WHERE id = ?';
      $row = $db->GetRow($sql,array($id));
      if( is_array($row) ) {
         $obj = new self();
         $obj->fill_from_array($row);
         return $obj;
      }
   }


   public static final function generate_alias($title) {
      // also used for category alias
      if (!is_string($title)) return;

      $alias = $title;
      // left trim up to the first letter
      $alias = preg_replace('/^[^a-zA-Z\x7f-\xff]*/', '', $alias);
      // replace any invalid characters with an underscore
      $alias = preg_replace('/[^a-zA-Z0-9_\-\x7f-\xff]/', '_', $alias);
      // replace multiple underscores with single underscore
      $alias = preg_replace('/_+/', '_', $alias);
      // convert to lowercase
      $alias = strtolower($alias);
      // remove underscore from start and end
      $alias = trim($alias, '_');
      return $alias;
   }


   public static final function is_valid_alias($alias) {
      // also used for category alias
      if (!is_string($alias))
         return false;
      // http://www.php.net/manual/en/language.variables.basics.php
      if (preg_match('/^[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\-\x7f-\xff]*$/', $alias)) {
         return true;
      } else {
         return false;
      }
   }


}

?>