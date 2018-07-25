<?php
#-------------------------------------------------------------------------
# Module: Widgets
# Author: Chris Taylor
# Copyright: (C) 2016 Chris Taylor, chris@binnovative.co.uk
# Licence: GNU General Public License version 3
#          see /Widgets/doc/LICENCE.txt or <http://www.gnu.org/licenses/>
#-------------------------------------------------------------------------
# CMS - CMS Made Simple is (c) 2011 by Ted Kulp (wishy@cmsmadesimple.org)
# Project's homepage is: http://www.cmsmadesimple.org
# Module's homepage is: http://dev.cmsmadesimple.org/projects/Widgets
#-------------------------------------------------------------------------
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 3 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program.  If not, see <http://www.gnu.org/licenses/>.
#-------------------------------------------------------------------------

class Widgets extends CMSModule {

   const MANAGE_PERM = 'manage_widgets';
   const USE_PERM = 'use_widgets';

   protected $_isContentBlockJsLoaded;

   public function GetVersion() { return '1.1'; }
   public function GetFriendlyName() { return $this->GetPreference('customModuleName'); }
   public function GetAdminDescription() { return $this->Lang('admindescription'); }
   public function IsPluginModule() { return TRUE; }
   public function HasAdmin() { return TRUE; }
   public function GetAdminSection() { return $this->GetPreference('adminSection', 'content'); }
   public function VisibleToAdminUser() { return ( $this->CheckPermission(self::USE_PERM) || $this->CheckPermission(self::MANAGE_PERM) ); }
   public function GetHelp() { return $this->Lang('help'); }
   public function GetAuthor() { return 'Chris Taylor'; }
   public function GetAuthorEmail() { return 'chris@binnovative.co.uk'; }
   public function GetChangeLog() { return file_get_contents(dirname(__FILE__).'/doc/changelog.inc'); }


   function __construct() {
      $this->_isContentBlockJsLoaded = false;
      parent::__construct();
   }

   public function UninstallPreMessage() {
      return $this->Lang('ask_uninstall');
   }

   public function InitializeFrontend() {
      $this->SetParameterType('wid', CLEAN_INT);
      $this->SetParameterType('template',CLEAN_STRING);
      $this->SetParameterType('category',CLEAN_STRING);
      $this->SetParameterType('items',CLEAN_STRING);
      $this->RegisterModulePlugin();
   }

   public function InitializeAdmin() {
      $this->CreateParameter( 'wid', null, $this->Lang('param_wid') );
      $this->CreateParameter( 'template', null, $this->lang('param_template') );
      $this->CreateParameter( 'category', null, $this->lang('param_category') );
      $this->CreateParameter( 'items', null, $this->lang('param_items') );
   }

   public static function page_type_lang_callback($str) {
      $mod = cms_utils::get_module('Widgets');
      if( is_object($mod) ) return $mod->Lang('type_'.$str);
   }

   public function GetHeaderHTML() {
      $tmp = '
         <link rel="stylesheet" type="text/css" href="../modules/Widgets/lib/css/widgets_admin.css">
         <script language="javascript" src="../modules/Widgets/lib/js/widgets_admin.js"></script>';
      return $tmp;
   }

   public static function reset_page_type_defaults(CmsLayoutTemplateType $type) {
      if( $type->get_originator() != 'Widgets' ) throw new CmsLogicException('Cannot reset contents for this template type');

      $fn = null;
      if ( $type->get_name()=='Template' ) {
         $fn = 'orig_template.tpl';
      }
      $fn = cms_join_path(__DIR__,'templates',$fn);
      if( file_exists($fn) ) return @file_get_contents($fn);
   }



   /**
   * @link http://www.cmsmadesimple.org/apidoc/CMS/CMSModule.html#HasCapability
   * @ignore
   */
   function HasCapability($capability, $params = array()) {
      switch ($capability) {
         case 'contentblocks':
             return TRUE;
         default:
             return FALSE;
      }
   }


   // content block
   /**
   * @link http://www.cmsmadesimple.org/APIDOC2_0/classes/CMSModule.html#method_GetContentBlockFieldInput
   */
   public function GetContentBlockFieldInput($blockName, $value, $params, $adding=false,
      ContentBase $content_obj) {

      $widgetCB = new widget_tools($blockName, $value, $params, $adding);
      $cb = $widgetCB->get_content_block_input();

      // load js once only
      if (!$this->_isContentBlockJsLoaded) {
         $cb .= $widgetCB->get_content_block_js();
         $this->_isContentBlockJsLoaded = true;
      }

      return $cb;
   }


}