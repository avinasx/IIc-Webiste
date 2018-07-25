<?php
if (!isset($gCms)) exit;

if (! $this->CheckAccess())
	{

	return $this->DisplayErrorPage($id, $params, $returnid,$this->Lang('accessdenied'));
	}

$admintheme = $gCms->variables["admintheme"];

if(isset($params["cancel"])){
	$this->Redirect($id, "defaultadmin", $returnid, $newparams);
}

$db =& $this->GetDb();

// CHECK IF THE FORM IS BEING SUBMITTED :
// (we must detect all kinds of submit buttons, including files, since information must be saved before we go to file submission)
if (isset($params["submit"]) || 
	isset($params["apply"]) 
	)
{
	
	
	debug_buffer("Edit Form has been submitted".__LINE__);

	// RETRIEVING THE FORM VALUES (and escaping it, if needed)
	if(!isset($item)) $item = new stdClass();
    $url = null;
    if (substr($params["server_url"], -1) != "/") {
        $url = $params["server_url"] . "/";
    } else {
        $url = $params["server_url"];
    }

	$item->width = $params["width"];
	$item->height = $params["height"];
    $item->handler = $params["handler"];
	$item->server_url = $url;
    $item->file_name = $params["file_name"];
	$item->name = $params["name"];


	
	
	// FIELDS TO UPDATE
	$query = (isset($item->id)?"UPDATE ":"INSERT INTO ").cms_db_prefix()."module_groupdocs_viewer_dotnet_docs SET
			server_url=?,
			file_name=?,
			handler=?,
			width=?,
			height=?,
			name=?";
			
	// VALUES
	$values = array(
            addslashes($item->server_url),
            addslashes($item->file_name),
            addslashes($item->handler),
            addslashes($item->width),
			addslashes($item->height),
			addslashes($item->name),
			);

		if(isset($item->id)){
			$query .= " WHERE id=?;";
			array_push($values,$item->id);
		} else {
			// NEW ITEM
			
			// get a new id from the sequence table
			$item->id = $db->GenID(cms_db_prefix()."module_groupdocs_viewer_dotnet_docs_seq");
		
			$query .= ", id=".$item->id;

		}
		$db->Execute($query, $values);	

		$redirect = true;
		//if(mysql_affected_rows()){	// mysql-only
		if($db->Affected_Rows()){
			
		}elseif(mysql_error()){
			// do not redirect :
			$redirect = false;
			echo $this->ShowErrors(mysql_error());
		}

		// REDIRECTING...
			if($redirect == false){
			}elseif(isset($params["apply"])){
				echo $this->ShowMessage($this->Lang("message_modified"));
			}else{
				$params = array("module_message" => $this->Lang("message_modified"));
				$this->Redirect($id, "defaultadmin", $returnid, $params);	
			}	
	
	// END OF FORM SUBMISSION
}



/* ## PREPARING SMARTY ELEMENTS
CreateInputText : (id,name,value,size,maxlength)
CreateTextArea : (wysiwyg,id,text,name)
CreateInputSelectList : (id,name,items,selecteditems,size)
CreateInputDropdown : (id,name,items,sindex,svalue)
*/

$this->smarty->assign("server_url_label", $this->Lang("groupdocs_server_url"));
$this->smarty->assign("server_url_input", $this->CreateInputText($id,"server_url",isset($item)?$item->server_url:"",75,2000));

$this->smarty->assign("file_name_label", $this->Lang("groupdocs_file_name"));
$this->smarty->assign("file_name_input", $this->CreateInputText($id,"file_name",isset($item)?$item->file_name:"",75,2000));

$this->smarty->assign("handler_label", $this->Lang("groupdocs_handler"));
$this->smarty->assign("handler_input", $this->CreateInputCheckbox($id,"handler",'on','off'));

$this->smarty->assign("width_label", $this->Lang("groupdocs_width"));
$this->smarty->assign("width_input", $this->CreateInputText($id,"width",isset($item)?$item->width:"",30,10));

$this->smarty->assign("height_label", $this->Lang("groupdocs_height"));
$this->smarty->assign("height_input", $this->CreateInputText($id,"height",isset($item)?$item->height:"",30,10));

$this->smarty->assign("name_label", $this->Lang("groupdocs_name"));
$this->smarty->assign("name_input", $this->CreateInputText($id,"name",isset($item)?$item->guid:"",75,2000));


$this->smarty->assign("submit", $this->CreateInputSubmit($id, "submit", lang("submit")));
$this->smarty->assign("apply", (isset($item) && isset($item->id))?$this->CreateInputSubmit($id, "apply", lang("apply")):"");
$this->smarty->assign("cancel", $this->CreateInputSubmit($id, "cancel", lang("cancel")));


// DISPLAYING
if(isset($item) && isset($item->id)){

		echo $this->CreateFormStart($id, "editA", $returnid);

		echo $this->ProcessTemplate("editA.tpl");
		echo $this->CreateInputHidden($id, "Aid", $item->id);
		if(isset($item) && isset($item->parent)) echo $this->CreateInputHidden($id, "oldparent", $item->parent);
		echo $this->CreateInputHidden($id, "Aitem_order", $item->item_order);
		echo $this->CreateFormEnd();

}else{

	echo $this->CreateFormStart($id, "editA", $returnid);
	echo $this->ProcessTemplate("editA.tpl");
	echo $this->CreateFormEnd();
}
?>
