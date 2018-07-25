<?php
if (!isset($gCms)) exit;

if (! $this->CheckAccess())
	{
	return $this->DisplayErrorPage($id, $params, $returnid, $this->Lang('accessdenied'));

	}

$admintheme = $gCms->variables["admintheme"];

$whereclause = array();
						
$this->smarty->assign("addnew", $this->CreateLink($id, "editA", $returnid, $admintheme->DisplayImage("icons/system/newobject.gif", "","","","systemicon")." ".$this->Lang("add_doc")));
		
$itemlist = $this->get_docs_list(isset($whereclause)?$whereclause:array(),true, $id, $returnid, false);
			
$this->smarty->assign("itemlist", $itemlist);
echo $this->ProcessTemplate("adminpanel.tpl");
?>
