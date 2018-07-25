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

if ( isset($params['wid']) && $params['wid'] > 0) {
   $widget = WidgetItem::load_by_id( (int)$params['wid'] );
   $widget->delete();

   $query = new WidgetQuery;
   $updated = $query->updatePositions();

   $this->SetMessage( $this->Lang('widget_deleted') );
   $this->RedirectToAdminTab();
}