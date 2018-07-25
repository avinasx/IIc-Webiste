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

$widget = new WidgetItem();
$isNewWidget = true;
if ( isset($params['wid']) && $params['wid'] > 0 ) {
   $widget = WidgetItem::load_by_id((int)$params['wid']);
   $isNewWidget = false;
}
if ( isset($params['cancel']) ) {
   $this->RedirectToAdminTab();

} else if ( isset($params['submit']) || isset($params['apply']) ) {
   $errors = array();
   if ( !isset($params['active']) ) $params['active'] = false;
   if ( !isset($params['wysiwyg']) ) $params['wysiwyg'] = false;
   $widget->title = trim($params['title']);
   $widget->category_id = (int) $params['category_id'];
   $widget->alias = trim($params['alias']);
   $widget->active = (bool) $params['active'];
   $widget->heading = trim($params['heading']);
   $widget->content = trim($params['content']);
   $widget->link_to = (int) $params['link_to'];
   $widget->link_text = trim($params['link_text']);
   $widget->wysiwyg = (bool) $params['wysiwyg'];
   if (!empty($params['style_options']))
      $widget->style_options = trim( implode(',', $params['style_options']) );

   // check title
   if ( $widget->title=='' ) {
      $errors[] = $this->Lang('error_title_empty');
   }

   // check alias
   if ( $widget->alias=='' ) {
      $widget->alias = WidgetItem::generate_alias($widget->title);
   }
   if ( !WidgetItem::is_valid_alias($widget->alias) ) {
      $errors[] = $this->Lang('error_alias_invalid').": '$widget->alias'";
   }
   // Check for alias duplicate
   if ( isset($params['wid']) && $params['wid'] > 0 )  {
      $sql = 'SELECT id FROM '.CMS_DB_PREFIX.'module_widgets WHERE alias = "'.$widget->alias.'" AND id != "'.$params['wid'].'"';
      $exists = $db->GetOne( $sql );
   } else {
      $sql = 'SELECT id FROM '.CMS_DB_PREFIX.'module_widgets WHERE alias = "'.$widget->alias.'"';
      $exists = $db->GetOne( $sql );
   }
   if ($exists) {
      $errors[] = $this->Lang('error_alias_invalid');
   }

   // set position to last position for new Widgets
   if ($isNewWidget) {
      $sql = "SELECT MAX(position) AS maxposition FROM ".CMS_DB_PREFIX."module_widgets";
      $maxposition = $db->GetOne($sql);
      if ($maxposition) $widget->position = $maxposition + 1;
   }

   // either display errors or save Widget
   $formattedErrors = '';
   if ( !empty($errors) ) {
      foreach ($errors as $error) {
         $formattedErrors .= '<li>'.$error.'</li>';
      }
      $this->ShowErrors('<ul>'.$formattedErrors.'</ul>');

   } else {
      $isSaved = $widget->save();
      if ( !$isSaved ) {
         $this->SetError( $this->Lang('widget_notsaved') );

      } else { // saved
         $isNewWidget = false;
         if ($isNewWidget) {
            $query = new WidgetQuery;
            $updated = $query->updatePositions();
         }
         if ( isset($params['submit']) ) {
            $this->SetMessage( $this->Lang('widget_saved') );
            $this->RedirectToAdminTab();
         } else { // apply
            $this->ShowMessage( $this->Lang('widget_saved') );
         }
      }
   }
}


// create styleOptions & selectedOptions array
$selectedOptions = explode(',', $widget->style_options);
$styleOptions = array();
$list = explode( "\n", $this->GetPreference('styleOptions') );
foreach($list as $option) {
   $option = explode("=", $option, 2);
   if(count($option) > 1) {
      $styleOptions[trim($option[0])] = trim($option[1]);
   } else {
      $styleOptions[trim($option[0])] = trim($option[0]);
   }
}


// create Link_to dropdowns
$contentops = cmsms()->GetContentOperations();
$linkTo = $contentops->CreateHierarchyDropdown('', $widget->link_to, $id.'link_to', true);

// get categories & defaults
$category = new WidgetCategory();
$categories = $category->getCategories();
$active = is_null($widget->active) ? 1 : $widget->active;
$wysiwyg = is_null($widget->wysiwyg) ? 1 : $widget->wysiwyg;

// smarty processing to display admin page
$tpl = $smarty->CreateTemplate($this->GetTemplateResource('edit_widget.tpl'), null, null, $smarty);
$tpl->assign('widget',$widget);
$tpl->assign('input_active', $this->CreateInputcheckbox($id, 'active', 1, $active));
$tpl->assign('isNewWidget',$isNewWidget);
$tpl->assign('input_content', $this->CreateTextArea(($wysiwyg), $id, $widget->content, 'content'));
$tpl->assign('input_styleOptions', $this->CreateInputSelectList( $id, 'style_options', $styleOptions, $selectedOptions, count($styleOptions), '', true));
$tpl->assign('input_category_id', $this->CreateInputDropdown( $id, 'category_id', array_flip($categories), '', $widget->category_id ));
$tpl->assign('input_link_to',$linkTo);
$tpl->assign('categories',$categories);
$tpl->assign('input_wysiwyg', $this->CreateInputcheckbox($id, 'wysiwyg', 1, $wysiwyg));

$tpl->display();
