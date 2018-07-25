<?php
if (!isset($gCms)) exit;

	/*---------------------------------------------------------
	   Install()
	   When your module is installed, you may need to do some
	   setup. Typical things that happen here are the creation
	   and prepopulation of database tables, database sequences,
	   permissions, preferences, etc.
	   	   
	   For information on the creation of database tables,
	   check out the ADODB Data Dictionary page at
	   http://phplens.com/lens/adodb/docs-datadict.htm
	   
	   This function can return a string in case of any error,
	   and CMS will not consider the module installed.
	   Successful installs should return FALSE or nothing at all.
	  ---------------------------------------------------------*/


		// permissions
		$this->CreatePermission('Modify GrouDocsViewerJava','Modify GrouDocsViewerJava');

		
		// Typical Database Initialization
$db =& $this->GetDb();

$dict = NewDataDictionary($db);
		
// mysql-specific, but ignored by other database
$taboptarray = array("mysql" => "TYPE=MyISAM");
		

// Creates the player table
$flds = "
	server_url C(64),
	width C(10),
	height C(10),
	id I KEY,
	name C(64)
	";

$sqlarray = $dict->CreateTableSQL(cms_db_prefix()."module_groupdocs_viewer_java_docs", $flds, $taboptarray);
$dict->ExecuteSQLArray($sqlarray);
$db->CreateSequence(cms_db_prefix()."module_groupdocs_viewer_java_docs_seq");
		
		
?>
