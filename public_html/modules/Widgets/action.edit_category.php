<?php
#-------------------------------------------------------------------------
# Module: Widgets
# Author: Chris Taylor
# Copyright: (C) 2016 Chris Taylor, chris@binnovative.co.uk
# Licence: GNU General Public License version 3
#          see /Widgets/doc/LICENCE.txt or <http://www.gnu.org/licenses/>
#-------------------------------------------------------------------------

if ( !defined('CMS_VERSION') ) exit;
if ( !$this->CheckPermission(Widgets::USE_PERM) ) return;

$category = new WidgetCategory();
$isNewCategory = true;

if ( isset($params['category_id']) && $params['category_id'] > 0 ) {
   $category = WidgetCategory::load_by_id( (int)$params['category_id'] );
   $isNewCategory = false;
}
if ( isset($params['cancel']) ) {
   $this->RedirectToAdminTab('categories');

} else if ( isset($params['submit']) ) {
   $errors = array();
   $category->category_name = trim($params['category_name']);
   $category->category_alias = trim($params['category_alias']);

   // check name
   if ( $category->category_name=='' ) {
      $errors[] = $this->Lang('error_category_name');
   }
   // Check for name duplicate
   if ( isset($params['category_id']) && $params['category_id'] > 0 )  {
      $sql = 'SELECT category_id FROM '.CMS_DB_PREFIX.'module_widgets_category WHERE category_name = "'.$category->category_name.'" AND category_id != "'.$params['category_id'].'"';
      $exists = $db->GetOne( $sql );
   } else {
      $sql = 'SELECT category_id FROM '.CMS_DB_PREFIX.'module_widgets_category WHERE category_name = "'.$category->category_name.'"';
      $exists = $db->GetOne( $sql );
   }
   if ($exists) {
      $errors[] = $this->Lang('error_category_name');
   }

   // check alias
   if ( $category->category_alias=='' ) {
      $category->category_alias = WidgetItem::generate_alias($category->category_name);
   }
   if ( !WidgetItem::is_valid_alias($category->category_alias) ) {
      $errors[] = $this->Lang('error_alias_invalid').": '$category->category_alias'";
   }
   // Check for alias duplicate
   if ( isset($params['category_id']) && $params['category_id'] > 0 )  {
      $sql = 'SELECT category_id FROM '.CMS_DB_PREFIX.'module_widgets_category WHERE category_alias = "'.$category->category_alias.'" AND category_id != "'.$params['category_id'].'"';
      $exists = $db->GetOne( $sql );
   } else {
      $sql = 'SELECT category_id FROM '.CMS_DB_PREFIX.'module_widgets_category WHERE category_alias = "'.$category->category_alias.'"';
      $exists = $db->GetOne( $sql );
   }
   if ($exists) {
      $errors[] = $this->Lang('error_alias_invalid');
   }


   // either display errors or save Category
   $formattedErrors = '';
   if ( !empty($errors) ) {
      foreach ($errors as $error) {
         $formattedErrors .= '<li>'.$error.'</li>';
      }
      $this->ShowErrors('<ul>'.$formattedErrors.'</ul>');

   } else {
      $isSaved = $category->save();
      if ( !$isSaved ) {
         $this->SetError( $this->Lang('category_notsaved') );

      } else {
         $this->SetMessage( $this->Lang('category_saved') );
         $this->RedirectToAdminTab('categories');
      }
   }
}


// smarty processing to display admin page
$tpl = $smarty->CreateTemplate($this->GetTemplateResource('edit_category.tpl'), null, null, $smarty);
$tpl->assign('category',$category);
$tpl->assign('isNewCategory',$isNewCategory);

$tpl->display();

?>