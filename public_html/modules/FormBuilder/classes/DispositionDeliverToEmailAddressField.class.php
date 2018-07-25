<?php
/* 
   FormBuilder. Copyright (c) 2005-2006 Samuel Goldstein <sjg@cmsmodules.com>
   More info at http://dev.cmsmadesimple.org/projects/formbuilder
   
   A Module for CMS Made Simple, Copyright (c) 2006 by Ted Kulp (wishy@cmsmadesimple.org)
  This project's homepage is: http://www.cmsmadesimple.org
*/
require_once(dirname(__FILE__).'/DispositionEmailBase.class.php');

class fbDispositionDeliverToEmailAddressField extends fbDispositionEmailBase {

	function __construct($form_ptr, &$params)
	{
      parent::__construct($form_ptr, $params);
      $mod = formbuilder_utils::GetFB();
		$this->Type = 'DispositionDeliverToEmailAddressField';
      $this->IsDisposition = true;
		$this->DisplayInForm = true;
		$this->ValidationTypes = array(
            $mod->Lang('validation_email_address')=>'email',
            );
      $this->ValidationType = 'email';
	   $this->modifiesOtherFields = false;
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

	function DisposeForm($returnid)
	{
      if ($this->HasValue() != false)
         {
		   return $this->SendForm($this->Value,$this->GetOption('email_subject'));
		   }
		else
		   {
         return array(true,'');
         }
	}


	function StatusInfo()
	{
		return $this->TemplateStatus();
	}

	function PrePopulateAdminForm($formDescriptor)
	{
		$mod = formbuilder_utils::GetFB();
		list($main,$adv) = $this->PrePopulateAdminFormBase($formDescriptor);
		array_push($adv, array($mod->Lang('title_field_default_value'),$mod->CreateInputText($formDescriptor, 'fbrp_opt_default',$this->GetOption('default'),25,1024)));
		array_push($adv, array($mod->Lang('title_clear_default'),$mod->CreateInputHidden($formDescriptor,'fbrp_opt_clear_default','0').$mod->CreateInputCheckbox($formDescriptor, 'fbrp_opt_clear_default','1',$this->GetOption('clear_default','0')).'<br />'.$mod->Lang('title_clear_default_help')));
		return array('main'=>$main,'adv'=>$adv);
	}

	function Validate()
	{

  		$this->validated = true;
  		$this->validationErrorText = '';
		$result = true;
		$message = '';
		$mod = formbuilder_utils::GetFB();
    
    		if ( $this->Value !== false && !email_validator::is_email($this->Value) )
		{
			$this->validated = false;
			$this->validationErrorText = $mod->Lang('please_enter_an_email',$this->Name);
		}

		return array($this->validated, $this->validationErrorText);
	}
}

?>
