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

if ( empty($params['wid']) || !isset($params['after']) || $params['after']<0 ) return;


$widget = new WidgetItem();
if ($params['after']==0) {
   $afterPosition = 0;
} else {
   $widget = WidgetItem::load_by_id((int)$params['after']);
   $afterPosition = $widget->__get('position');
}
$widget = WidgetItem::load_by_id((int)$params['wid']);
$fromPosition = $widget->__get('position');

$db = \cms_utils::get_db();
if ($fromPosition>$afterPosition) {
   $sql = "UPDATE ".CMS_DB_PREFIX."module_widgets
      SET position=position+1
      WHERE position > '$afterPosition' AND position < '$fromPosition'";
   $res = $db->Execute($sql);

   $sql = "UPDATE ".CMS_DB_PREFIX."module_widgets
      SET position=$afterPosition+1
      WHERE id=".(int)$params['wid'];
   $res = $db->Execute($sql);

} else {
   $sql = "UPDATE ".CMS_DB_PREFIX."module_widgets
      SET position=position-1
      WHERE position > '$fromPosition' AND position <= '$afterPosition'";
   $res = $db->Execute($sql);

   $sql = "UPDATE ".CMS_DB_PREFIX."module_widgets
      SET position=$afterPosition
      WHERE id=".(int)$params['wid'];
   $res = $db->Execute($sql);
}