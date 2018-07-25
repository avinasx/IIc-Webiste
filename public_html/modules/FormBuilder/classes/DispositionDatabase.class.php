<?php
/* 
   FormBuilder. Copyright (c) 2005-2006 Samuel Goldstein <sjg@cmsmodules.com>
   More info at http://dev.cmsmadesimple.org/projects/formbuilder
   
   A Module for CMS Made Simple, Copyright (c) 2006 by Ted Kulp (wishy@cmsmadesimple.org)
  This project's homepage is: http://www.cmsmadesimple.org
*/

class fbDispositionDatabase extends fbFieldBase {

	var $approvedBy;

	function __construct($form_ptr, &$params)
	{
      parent::__construct($form_ptr, $params);
      $mod = formbuilder_utils::GetFB();
		$this->Type = 'DispositionDatabase';
		$this->IsDisposition = true;
		$this->NonRequirableField = true;
		$this->DisplayInForm = true;
		$this->DisplayInSubmission = false;
		$this->HideLabel = 1;
		$this->NeedsDiv = 0;
		$this->approvedBy = '';
		$this->sortable = false;
	}

	function GetFieldInput($id, &$params, $returnid)
	{
		$mod = formbuilder_utils::GetFB();
		if ($this->Value === false)
			{
			return '';
			}
		return $mod->CreateInputHidden($id, 'fbrp__'.$this->Id,	
			$this->EncodeReqId($this->Value));
	}

	function SetApprovalName($name)
	{
		$this->approvedBy = $name;
	}

	function StatusInfo()
	{
		 return '';
	}
	
	function DecodeReqId($theVal)
	{
		$tmp = base64_decode($theVal);
		$tmp2 = str_replace(session_id(),'',$tmp);
		if (substr($tmp2,0,1) == '_')
			{
			return substr($tmp2,1);
			}
		else
			{
			return -1;
			}
	}
	
	function EncodeReqId($req_id)
	{
		return base64_encode(session_id().'_'.$req_id);
	}
	
	
	function SetValue($val)
	{

		$decval = base64_decode($val);
   
		if ($val === false)
			{
			// no value set, so we'll leave value as false
			}
		elseif (strpos($decval,'_') === false)
			{
			// unencrypted value, coming in from previous response
			$this->Value = $val;
			}
		else
			{
			// encrypted value coming in from a form, so we'll update.
			$this->Value = $this->DecodeReqId($val);
			}
	}
	
	function getSortFieldVal($sortFieldNumber)
	{
      return -1;
   }
	
	function PrePopulateAdminForm($formDescriptor)
	{
		$mod = formbuilder_utils::GetFB();
      $main = array();
      $adv = array();
      array_push($main, array($mod->Lang('title_data_stored_in_fbr'),
         $mod->CreateInputHidden($formDescriptor, 'fbrp_opt_feu_bnd','0').
         $mod->CreateInputHidden($formDescriptor, 'fbrp_opt_crypt','0').
         $mod->CreateInputHidden($formDescriptor, 'fbrp_opt_hash_sort','0').
         $mod->CreateInputHidden($formDescriptor, 'fbrp_opt_sortfield1','').
         $mod->CreateInputHidden($formDescriptor, 'fbrp_opt_sortfield2','').
         $mod->CreateInputHidden($formDescriptor, 'fbrp_opt_sortfield3','').
         $mod->CreateInputHidden($formDescriptor, 'fbrp_opt_sortfield4','').
         $mod->CreateInputHidden($formDescriptor, 'fbrp_opt_sortfield5','')));
		return array('main'=>$main,'adv'=>$adv);
	}

	function PostPopulateAdminForm(&$mainArray, &$advArray)
	{
		$mod = formbuilder_utils::GetFB();
		$this->HiddenDispositionFields($mainArray, $advArray);
	}

    // Write To the Database
	function DisposeForm($returnid)
	{
		$form = $this->form_ptr;
		list($res,$msg) = $form->StoreResponse(($this->Value?$this->Value:-1),$this->approvedBy,$this);
		return array($res, $msg);
	}

}

?>
