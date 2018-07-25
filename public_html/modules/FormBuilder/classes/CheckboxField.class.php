<?php
/* 
   FormBuilder. Copyright (c) 2005-2006 Samuel Goldstein <sjg@cmsmodules.com>
   More info at http://dev.cmsmadesimple.org/projects/formbuilder
   
   A Module for CMS Made Simple, Copyright (c) 2006 by Ted Kulp (wishy@cmsmadesimple.org)
  This project's homepage is: http://www.cmsmadesimple.org
*/

class fbCheckboxField extends fbFieldBase {

	function __construct($form_ptr, &$params)
	{
        parent::__construct($form_ptr, $params);
        $mod = formbuilder_utils::GetFB();
		$this->Type =  'CheckboxField';
		$this->DisplayInForm = true;
		$this->NonRequirableField = false;
		$this->ValidationTypes = array(
            $mod->Lang('validation_none')=>'none',
            $mod->Lang('validation_must_check')=>'checked'
            );
      $this->sortable = false;
	}

	function GetFieldInput($id, &$params, $returnid)
	{
		$mod = formbuilder_utils::GetFB();
		$label = '';
		$html5 = '';

		if ($this->GetOption('html5','0') == '1'&& $this->IsRequired())
		{
			$html5 = ' required';
		}
		if (strlen($this->GetOption('label','')) > 0)
			{
			$label = '&nbsp;<label for="'.$this->GetCSSId().'">'.$this->GetOption('label').'</label>';
			}
		if ( ($this->Value === false && $this->GetOption('is_checked','0')=='1') || $this->Value == $this->GetOption('checked_value','0') )
			{
			$this->Value = 't';
			}
		$js = $this->GetOption('javascript','');
		return $mod->CreateInputCheckbox($id, 'fbrp__'.$this->Id, 't',$this->Value,$js.$html5.$this->GetCSSIdTag()).$label;
	}

	function GetHumanReadableValue($as_string=true)
	{
		$mod = formbuilder_utils::GetFB();
		if ($this->Value === false)
			{
			$ret = $this->GetOption('unchecked_value',$mod->Lang('value_unchecked'));
			}
		else
			{
			$ret = $this->GetOption('checked_value',$mod->Lang('value_checked'));
			}
		if ($as_string)
			{
			return $ret;
			}
		else
			{
			return array($ret);
			}
	}


	function StatusInfo()
	{
		$mod = formbuilder_utils::GetFB();
		$ret =  ($this->GetOption('is_checked','0')=='1'?$mod->Lang('checked_by_default'):$mod->Lang('unchecked_by_default'));
		if (strlen($this->ValidationType)>0)
		  {
		  	$ret .= ", ".array_search($this->ValidationType,$this->ValidationTypes);
		  }
		return $ret;
	}

	function PrePopulateAdminForm($formDescriptor)
	{
		$mod = formbuilder_utils::GetFB();
		$main = array(
			array($mod->Lang('title_checkbox_label'),
            		$mod->CreateInputText($formDescriptor, 'fbrp_opt_label',
            		$this->GetOption('label',''),25,255)),
            array($mod->Lang('title_checked_value'),
            		$mod->CreateInputText($formDescriptor, 'fbrp_opt_checked_value',
            		$this->GetOption('checked_value',$mod->Lang('value_checked')),25,255)),
            array($mod->Lang('title_unchecked_value'),
            		$mod->CreateInputText($formDescriptor, 'fbrp_opt_unchecked_value',
            		$this->GetOption('unchecked_value',$mod->Lang('value_unchecked')),25,255)),
			array($mod->Lang('title_default_set'),
				$mod->CreateInputHidden($formDescriptor,'fbrp_opt_is_checked','0').$mod->CreateInputCheckbox($formDescriptor, 'fbrp_opt_is_checked', '1', $this->GetOption('is_checked','0')))
				);
		$adv = array(
		);
		return array('main'=>$main,'adv'=>$adv);
	}

	function Validate()
	{
		$mod = formbuilder_utils::GetFB();
		$this->validated = true;
		$this->validationErrorText = '';

		switch ($this->ValidationType)
		  {
		  	   case 'none':
		  	       break;
		  	   case 'checked':
		  	       if ($this->Value === false)
		  	           {
		  	           $this->validated = false;
		  	           $this->validationErrorText = $mod->Lang('you_must_check',$this->GetOption('label',''));
		  	           }
		  	       break;
		  }
		return array($this->validated, $this->validationErrorText);
	}

}

?>
