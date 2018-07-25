<?php
#-------------------------------------------------------------------------
# Module: Widgets
# Author: Chris Taylor
# Copyright: (C) 2016 Chris Taylor, chris@binnovative.co.uk
# Licence: GNU General Public License version 3
#          see /Widgets/doc/LICENCE.txt or <http://www.gnu.org/licenses/>
#-------------------------------------------------------------------------

if( !defined('CMS_VERSION') ) exit;

$db = $this->GetDb();
$taboptarray = array('mysql' => 'ENGINE=MyISAM');
$dict = NewDataDictionary($db);

switch($oldversion) {

   case "1.0":
      // add wysiwyg field
      $sqlarray = $dict->AddColumnSQL(CMS_DB_PREFIX.'module_widgets', "wysiwyg I1");
      $dict->ExecuteSQLArray($sqlarray);
      break;

}

?>