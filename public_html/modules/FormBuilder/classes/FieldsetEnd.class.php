<?php
/* 
   FormBuilder. Copyright (c) 2005-2006 Samuel Goldstein <sjg@cmsmodules.com>
   More info at http://dev.cmsmadesimple.org/projects/formbuilder
   
   A Module for CMS Made Simple, Copyright (c) 2006 by Ted Kulp (wishy@cmsmadesimple.org)
  This project's homepage is: http://www.cmsmadesimple.org
*/

class fbFieldsetEnd extends fbFieldBase {

  function __construct($form_ptr, &$params)
  {
    parent::__construct($form_ptr, $params);
    $mod = formbuilder_utils::GetFB();
    $this->Type = 'FieldsetEnd';
    $this->DisplayInForm = true;
    $this->DisplayInSubmission = false;
    $this->NonRequirableField = true;
    $this->ValidationTypes = array();    
    $this->HasLabel = 0;
    $this->NeedsDiv = 0;
    $this->sortable = false;
  }

  function GetFieldInput($id, &$params, $returnid)
  {
    return '</fieldset>';
  }

  function StatusInfo()
  {
    return '';
  }

  function GetHumanReadableValue($as_string=true)
  {
    // there's nothing human readable about a fieldset.
    $ret = '[End Fieldset: '.$this->Value.']';
	if ($as_string)
		{
		return $ret;
		}
	else
		{
		return array($ret);
		}
  }
	
  function PrePopulateAdminForm($formDescriptor)
  {
    $mod = formbuilder_utils::GetFB();
    $main = array();
    $adv = array();
    return array('main'=>$main,'adv'=>$adv);
  }

	function PostPopulateAdminForm(&$mainArray, &$advArray)
	{
		$mod = formbuilder_utils::GetFB();
      $this->RemoveAdminField($advArray, $mod->Lang('title_field_javascript'));
    $this->CheckForAdvancedTab($advArray);
	}


}

?>
