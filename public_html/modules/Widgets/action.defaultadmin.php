<?php
#-------------------------------------------------------------------------
# Module: Widgets
# Author: Chris Taylor
# Copyright: (C) 2016 Chris Taylor, chris@binnovative.co.uk
# Licence: GNU General Public License version 3
#          see /Widgets/doc/LICENCE.txt or <http://www.gnu.org/licenses/>
#-------------------------------------------------------------------------

if( !defined('CMS_VERSION') ) exit;
if( !$this->CheckPermission(Widgets::MANAGE_PERM) && !$this->CheckPermission(Widgets::USE_PERM) ) {
   $this->ShowErrors( $this->Lang('need_permission') );
   return;
}

$loadingIcon = '../modules/Widgets/lib/images/loading.gif';

// set 'active_tab' if param set
if ( isset($params['active_tab']) ) $this->SetCurrentTab( $params['active_tab'] );

// optional upgrade if LISEWidgets installed
$upgradePossible = false;
$widgetsUDTsExist = false;
if ( cms_utils::module_available('LISEWidgets') ) {
   $upgradePossible = true;
}
$tagOps = $gCms->GetUserTagOperations();
if ($tagOps->UserTagExists('widgetsPageBottom') || $tagOps->UserTagExists('widgetsSidebar') ) {
   $widgetsUDTsExist = true;
}


// Create Admin tabs
echo $this->StartTabHeaders();
   //$active_tab = empty($params['active_tab']) ? '' : $params['active_tab'];

   echo $this->SetTabHeader("widgets",$this->Lang("tab_widgets"));

   echo $this->SetTabHeader("categories",$this->Lang("tab_categories"));

   if ( $this->CheckPermission(Widgets::MANAGE_PERM) ) {
      if ( $upgradePossible ) {
         echo $this->SetTabHeader("converter",$this->Lang("converter"));
      }
      echo $this->SetTabHeader("options",$this->Lang("tab_options"));
   }
echo $this->EndTabHeaders();


// create Tab content
echo $this->StartTabContent();

   echo $this->StartTab("widgets");
      $query = new WidgetQuery;
      $widgets = $query->GetMatches();
      $category = new WidgetCategory();
      $categories = $category->getCategories();
      $tpl = $smarty->CreateTemplate( $this->GetTemplateResource('defaultadmin.tpl'), null, null, $smarty );
      $tpl->assign('widgets',$widgets);
      $tpl->assign('categories',$categories);
      $tpl->assign('loadingIcon',$loadingIcon);
      $tpl->display();
   echo $this->EndTab();


   echo $this->StartTab("categories");
      $query = new WidgetCategoryQuery;
      $category = $query->GetMatches();
      $tpl = $smarty->CreateTemplate( $this->GetTemplateResource('admin_category.tpl'), null, null, $smarty );
      $tpl->assign('category',$category);
      $tpl->display();
   echo $this->EndTab();

   if ( $this->CheckPermission(Widgets::MANAGE_PERM) ) {
      if ($upgradePossible || $widgetsUDTsExist) {
         echo $this->StartTab("converter");
         $tpl = $smarty->CreateTemplate( $this->GetTemplateResource('admin_converter.tpl'), null, null, $smarty );
         $tpl->assign('button_import_from_LISEWidgets', $this->CreateInputSubmit($id, 'import_from_LISEWidgets', 'Import from LISEWidgets', '', '', 'Are you sure you want to delete all existing Widgets and import all from LISEWidgets?'));
         $tpl->assign('widgetsUDTsExist', $widgetsUDTsExist);
         $tpl->assign('startform', $this->CreateFormStart( $id, 'admin_converter', $returnid ));
         $tpl->assign('endform', $this->CreateFormEnd());
         $tpl->display();
         echo $this->EndTab();
      }

      echo $this->StartTab("options");
         $tpl = $smarty->CreateTemplate( $this->GetTemplateResource('admin_options.tpl'), null, null, $smarty );
         $tpl->assign('title_customModuleName', $this->Lang('title_customModuleName'));
         $tpl->assign('input_customModuleName', $this->CreateInputText($id, 'input_customModuleName',$this->GetPreference('customModuleName',''),50,255));

         $tpl->assign('title_adminSection', $this->Lang('title_adminSection'));
         $tpl->assign('input_adminSection', $this->CreateInputDropdown($id, 'input_adminSection',
               array(lang('main') => 'main',
                        lang('content') => 'content',
                        lang('layout') => 'layout',
                        lang('usersgroups') => 'usersgroups',
                        lang('extensions') => 'extensions',
                        lang('admin') => 'admin',
                        lang('myprefs') => 'myprefs'),
               -1,
               $this->GetPreference('adminSection', 'content')
         ));

         $tpl->assign( 'title_widgetStyleOptions', $this->Lang('title_widgetStyleOptions') );
         $tpl->assign( 'help_widgetStyleOptions', $this->Lang('help_widgetStyleOptions') );
         $tpl->assign( 'styleOptions', $this->GetPreference('styleOptions', $this->Lang('default_style_options')) );

         $tpl->assign('startform', $this->CreateFormStart( $id, 'admin_save_options', $returnid ));
         $tpl->assign('endform', $this->CreateFormEnd());
         $tpl->display();
      echo $this->EndTab();
   }


echo $this->EndTabContent();