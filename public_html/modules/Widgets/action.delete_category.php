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

if ( isset($params['category_id']) && $params['category_id'] > 1) {
   $category = WidgetCategory::load_by_id( (int)$params['category_id'] );
   $isDeleted = $category->delete();

   if ( !$isDeleted ) {
      $this->SetError( $this->Lang('category_not_deleted') );
      $this->RedirectToAdminTab('categories');
   } else {
      $this->SetMessage( $this->Lang('category_deleted') );
      $this->RedirectToAdminTab('categories');
   }

}