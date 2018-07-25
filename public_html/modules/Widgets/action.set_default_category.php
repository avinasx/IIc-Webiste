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

if ( isset($params['category_id']) && $params['category_id'] > 0) {
   $category = WidgetCategory::load_by_id( (int)$params['category_id'] );
   $defaultSet = $category->setAsDefault();

   if ( !$defaultSet ) {
      $this->SetError( $this->Lang('default_category_not_set') );
   } else {
      $this->SetMessage( $this->Lang('default_category_set') );
      $this->RedirectToAdminTab('categories');
   }

}