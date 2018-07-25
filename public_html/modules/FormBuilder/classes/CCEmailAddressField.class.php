<?php
/* 
   FormBuilder. Copyright (c) 2005-2006 Samuel Goldstein <sjg@cmsmodules.com>
   More info at http://dev.cmsmadesimple.org/projects/formbuilder
   
   A Module for CMS Made Simple, Copyright (c) 2006 by Ted Kulp (wishy@cmsmadesimple.org)
  This project's homepage is: http://www.cmsmadesimple.org
*/

class fbCCEmailAddressField extends fbFieldBase {

	function __construct($form_ptr, &$params)
	{
        parent::__construct($form_ptr, $params);
        $mod = formbuilder_utils::GetFB();
		$this->Type = 'CCEmailAddressField';
		$this->DisplayInForm = true;
		$this->ValidationTypes = array(
            $mod->Lang('validation_email_address')=>'email',
            );
        $this->ValidationType = 'email';
	   $this->modifiesOtherFields = true;
	}

	function GetFieldInput($id, &$params, $returnid)
	{
		$mod = formbuilder_utils::GetFB();
		$js = $this->GetOption('javascript','');
		$val = '';
		$html5 = '';

		if ($this->GetOption('html5','0') == '1')
		{
                        $val = $this->Value;
                        $html5 = ' placeholder="'.$this->GetOption('default').'"';
		        if ($this->IsRequired()) {
		                $html5 .= ' required';
		        }
                }
                else
                {
                        $val = $this->Value ? $this->Value : $this->GetOption('default');
                        if($this->GetOption('clear_default','0') == 1)
                        {
                                $js .= ' onfocus="if(this.value==this.defaultValue) this.value=\'\';" onblur="if(this.value==\'\') this.value=this.defaultValue;"';
                        }
                }
		return $mod->fbCreateInputText($id, 'fbrp__'.$this->Id,
			htmlspecialchars($val, ENT_QUOTES),
            		25, 128, $js.$html5.$this->GetCSSIdTag(),'email');
	}


	function PrePopulateAdminForm($formDescriptor)
	{
		$mod = formbuilder_utils::GetFB();

		$adv = array();
		array_push($adv, array($mod->Lang('title_field_default_value'),$mod->CreateInputText($formDescriptor, 'fbrp_opt_default',$this->GetOption('default'),25,1024)));
		array_push($adv, array($mod->Lang('title_clear_default'),$mod->CreateInputHidden($formDescriptor,'fbrp_opt_clear_default','0').$mod->CreateInputCheckbox($formDescriptor, 'fbrp_opt_clear_default','1',$this->GetOption('clear_default','0')).'<br />'.$mod->Lang('title_clear_default_help')));
		$fieldlist = array();
		$others = $this->form_ptr->GetFields();
		for($i=0;$i<count($others);$i++)
		{
			if ($others[$i]->IsDisposition()
         			&& is_subclass_of($others[$i],'fbDispositionEmailBase'))
			{
				$txt = $others[$i]->GetName().': '.$others[$i]->GetDisplayType();
				$alias = $others[$i]->GetAlias();
				if (!empty($alias))
				{
					$txt .= ' ('.$alias.')';
				}
				$fieldlist[$txt] = $others[$i]->GetId();
			}
		}
	
		$main = array( array($mod->Lang('title_field_to_modify'),
			$mod->CreateInputDropdown($formDescriptor, 'fbrp_opt_field_to_modify', $fieldlist, -1, $this->GetOption('field_to_modify'))) );

	  return array('main'=>$main,'adv'=>$adv);
	}

	
	function ModifyOtherFields()
	{
		$mod = formbuilder_utils::GetFB();
		$others = $this->form_ptr->GetFields();

		if ($this->Value !== false)
			{
			for($i=0;$i<count($others);$i++)
				{
				if ($others[$i]->IsDisposition()
               		&& is_subclass_of($others[$i],'fbDispositionEmailBase')
					&& $others[$i]->GetId() == $this->GetOption('field_to_modify'))
					{
						$cc = $others[$i]->GetOption('email_cc_address','');
						if (!empty($cc))
							{
							$cc .= ',';
							}
						$cc .= $this->Value;
					    $others[$i]->SetOption('email_cc_address',$this->Value);
					}
				}
			}
	}

	function StatusInfo()
	{
		$mod = formbuilder_utils::GetFB();
		$others = $this->form_ptr->GetFields();
	  	for($i=0;$i<count($others);$i++)
			{
			if ($others[$i]->GetId() == $this->GetOption('field_to_modify'))
				{
				return $mod->Lang('title_modifies',$others[$i]->GetName());
				}
			}
	  	return $mod->Lang('unspecified');
	}

	function Validate()
	{
		$this->validated = true;
		$this->validationErrorText = '';
		$mod = formbuilder_utils::GetFB();
		switch ($this->ValidationType)
		{
		   case 'email':
              if (
                  	$this->Value !== false
//                  	&& ! preg_match(
//                  										($mod->GetPreference('relaxed_email_regex', '0') == 0 ? $mod->email_regex : $mod->email_regex_relaxed), 
//                  										$this->Value
//                  									)
										&& !email_validator::is_email($this->Value)
                 )
              {
                $this->validated = false;
                $this->validationErrorText = $mod->Lang('please_enter_an_email',$this->Name);
              }
		  	   break;
		}
		
		return array($this->validated, $this->validationErrorText);
	}
}

?>
