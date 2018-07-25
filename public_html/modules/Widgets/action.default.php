<?php
#-------------------------------------------------------------------------
# Module: Widgets
# Author: Chris Taylor
# Copyright: (C) 2016 Chris Taylor, chris@binnovative.co.uk
# Licence: GNU General Public License version 3
#          see /Widgets/doc/LICENCE.txt or <http://www.gnu.org/licenses/>
#-------------------------------------------------------------------------

if ( !defined('CMS_VERSION') ) exit;

$template = null;
if (isset($params['template'])) {
   $template = trim($params['template']);
}
else {
   $tpl = CmsLayoutTemplate::load_dflt_by_type('Widgets::Template');
   if( !is_object($tpl) ) {
      audit('',$this->GetName(),'No default template found');
      return;
   }
$template = $tpl->get_name();
}

$items = array();
$sql = 'SELECT W.*,CATS.category_name FROM '.CMS_DB_PREFIX.'module_widgets AS W
   LEFT OUTER JOIN '.CMS_DB_PREFIX.'module_widgets_category CATS
   ON CATS.category_id = W.category_id ';
if (isset($params['category'])) {
   $sql .= 'WHERE CATS.category_alias = ? AND active = 1
      ORDER BY W.position';
   $dbresult = $db->Execute( $sql, array( $params['category']) );
} else {
   $sql .= 'WHERE active = 1';
   $dbresult = $db->Execute($sql);
}

if( is_object($dbresult) ) {
   $dbresult->MoveFirst();
   while( $dbresult && !$dbresult->EOF ) {
      $row = $dbresult->fields;
      $onerow = new stdClass();

      $onerow->id = $row['id'];
      $onerow->category_id = $row['category_id'];
      $onerow->title = $row['title'];
      $onerow->alias = $row['alias'];
      $onerow->position = $row['position'];
      $onerow->active = $row['active'];
      $onerow->heading = $row['heading'];
      $onerow->content = $row['content'];
      $onerow->link_to = $row['link_to'];
      $onerow->link_text = $row['link_text'];
      $onerow->style_options = $row['style_options'];
      $onerow->category_name = $row['category_name'];

      // fielddefs (depreciated) - compatible with LISE
      $onerow->fielddefs['heading']['value'] = $row['heading'];
      $onerow->fielddefs['content']['value'] = $row['content'];
      $onerow->fielddefs['link_to']['value'] = $row['link_to'];
      $onerow->fielddefs['link_text']['value'] = $row['link_text'];
      $onerow->fielddefs['styles']['value'] = $row['style_options'];

      $items[$onerow->alias] = $onerow;
      $dbresult->MoveNext();
   }
}

// select 'items' in order provided
if (isset($params['items'])) {
   $allItems = $items;
   $selectAliases = explode( ',', str_replace(' ', '', $params['items']) );
   $selectItems = array();
   foreach ($selectAliases as $alias) {
      $selectItems[$alias] = $items[$alias];
   }
   $items = $selectItems;
}


$tpl = $smarty->CreateTemplate($this->GetTemplateResource($template),null,null,$smarty);

$tpl->assign('items',$items);

// Display template
$tpl->display();