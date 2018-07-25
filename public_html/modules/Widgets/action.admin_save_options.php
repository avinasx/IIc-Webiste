<?php
#-------------------------------------------------------------------------
# Module: Widgets
# Author: Chris Taylor
# Copyright: (C) 2016 Chris Taylor, chris@binnovative.co.uk
# Licence: GNU General Public License version 3
#          see /Widgets/doc/LICENCE.txt or <http://www.gnu.org/licenses/>
#-------------------------------------------------------------------------

if( !defined('CMS_VERSION') ) exit;
if( !$this->CheckPermission(Widgets::MANAGE_PERM) ) {
   $this->Redirect($id, 'defaultadmin', $returnid);
}

// Save Parameters Options Tab
if (isset($params['input_customModuleName']))
   $this->SetPreference('customModuleName', $params['input_customModuleName']);

if (isset($params['input_adminSection']))
   $this->SetPreference('adminSection', $params['input_adminSection']);

if (isset($params['input_styleOptions']))
   $this->SetPreference('styleOptions', $params['input_styleOptions']);

// Touch menu cache files
if (version_compare(CMS_VERSION, '1.99-alpha0', '<')) {
   foreach (glob(cms_join_path(TMP_CACHE_LOCATION, "themeinfo*.cache")) as $filename) { @unlink($filename); } // 1.11
} else {
   foreach (glob(cms_join_path(TMP_CACHE_LOCATION, "cache*.cms")) as $filename) { @unlink($filename); } // 2.0
}

// Show saved parameters in debug mode
debug_display($params);

// Put mention into the admin log
audit('', 'Widgets - Options tab', 'Saved');

$this->Redirect($id, 'defaultadmin', $returnid, array('module_message' => $this->Lang('settings_saved'), 'active_tab' => 'options'));

