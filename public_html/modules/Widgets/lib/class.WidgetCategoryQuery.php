<?php
#-------------------------------------------------------------------------
# Module: Widgets
# Author: Chris Taylor
# Copyright: (C) 2016 Chris Taylor, chris@binnovative.co.uk
# Licence: GNU General Public License version 3
#          see /Widgets/doc/LICENCE.txt or <http://www.gnu.org/licenses/>
#-------------------------------------------------------------------------

class WidgetCategoryQuery extends CmsDbQueryBase {

   public function __construct($args = '') {
      parent::__construct($args);
   }

   public function execute() {
      if( !is_null($this->_rs) ) return;
      $sql = 'SELECT SQL_CALC_FOUND_ROWS C.* FROM '.CMS_DB_PREFIX.'module_widgets_category C';
      $sql .= ' ORDER BY category_id';
      $db = \cms_utils::get_db();
      $this->_rs = $db->execute($sql);
      if ( $db->ErrorMsg() ) throw new \CmsSQLErrorException( $db->sql.' -- '.$db->ErrorMsg() );
      $this->_totalmatchingrows = $db->GetOne('SELECT FOUND_ROWS()');
   }

   public function &GetObject() {
      $obj = new WidgetCategory;
      $obj->fill_from_array($this->fields);
      return $obj;
   }
}

?>