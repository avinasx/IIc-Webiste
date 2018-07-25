<?php
/* 
   FormBuilder. Copyright (c) 2005-2006 Samuel Goldstein <sjg@cmsmodules.com>
   More info at http://dev.cmsmadesimple.org/projects/formbuilder
   
   A Module for CMS Made Simple, Copyright (c) 2006 by Ted Kulp (wishy@cmsmadesimple.org)
  This project's homepage is: http://www.cmsmadesimple.org
*/

class fbFromEmailAddressField extends fbFieldBase {

	function __construct($form_ptr, &$params)
	{
		parent::__construct($form_ptr, $params);
		$mod = formbuilder_utils::GetFB();
		$this->Type = 'FromEmailAddressField';
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
			$val = $this->Value[0];
			$html5 = ' placeholder="'.$this->GetOption('default').'"';
			if ($this->IsRequired())
			{
					$html5 .= ' required';
			}
		}
		else
		{
			$val = $this->Value[0] ? $this->Value[0] : $this->GetOption('default');
			if($this->GetOption('clear_default','0') == 1)
			{
				$js .= ' onfocus="if(this.value==this.defaultValue) this.value=\'\';" onblur="if(this.value==\'\') this.value=this.defaultValue;"';
			}
		}
		$retstr = $mod->fbCreateInputText($id, 'fbrp__'.$this->Id.'[]',
				htmlspecialchars($val, ENT_QUOTES),
				25, 128, $js.$html5.$this->GetCSSIdTag(),'email');
		if ($this->GetOption('send_user_copy','n') == 'c')
		{
			$retstr .= $mod->CreateInputCheckbox($id, 'fbrp__'.$this->Id.'[]', 1,
				(isset($this->Value[1])? $this->Value[1] :0 ),$this->GetCSSIdTag('_2'));
			$retstr .= '<label for="'.$this->GetCSSId('_2').'" class="label">'.$this->GetOption('send_user_label',
				$mod->Lang('title_send_me_a_copy')).'</label>';
		}
		return $retstr;
	}


	function PrePopulateAdminForm($formDescriptor)
	{
		$mod = formbuilder_utils::GetFB();
		$main = array();
		$adv = array(
			array($mod->Lang('title_field_default_value'),$mod->CreateInputText($formDescriptor, 'fbrp_opt_default',$this->GetOption('default'),25,1024)),
			array($mod->Lang('title_clear_default'),$mod->CreateInputHidden($formDescriptor,'fbrp_opt_clear_default','0').$mod->CreateInputCheckbox($formDescriptor, 'fbrp_opt_clear_default','1',$this->GetOption('clear_default','0')).'<br />'.$mod->Lang('title_clear_default_help'))	
		);
		$opts = array($mod->Lang('option_never')=>'n',$mod->Lang('option_user_choice')=>'c',$mod->Lang('option_always')=>'a');
		array_push($main,array($mod->Lang('title_send_usercopy'),
			$mod->CreateInputDropdown($formDescriptor, 'fbrp_opt_send_user_copy', $opts, -1, $this->GetOption('send_user_copy','n'))));
		array_push($main,array($mod->Lang('title_file_attachment_copy'),
		  	$mod->CreateInputHidden($formDescriptor,'fbrp_opt_file_attachment_copy','0').$mod->CreateInputCheckbox($formDescriptor, 				'fbrp_opt_file_attachment_copy', '1',$this->GetOption('file_attachment_copy','1'))));
		array_push($main,array($mod->Lang('title_send_usercopy_label'),
			$mod->CreateInputText($formDescriptor, 'fbrp_opt_send_user_label', $this->GetOption('send_user_label',
				$mod->Lang('title_send_me_a_copy')),25,125)));
		$hopts = array($mod->Lang('option_from')=>'f',$mod->Lang('option_reply')=>'r',$mod->Lang('option_both')=>'b');
		array_push($main,array($mod->Lang('title_headers_to_modify'),
			$mod->CreateInputDropdown($formDescriptor, 'fbrp_opt_headers_to_modify', $hopts, -1, $this->GetOption('headers_to_modify','f'))));

		return array('main'=>$main,'adv'=>$adv);
	}

	
	function ModifyOtherFields()
	{
		$mod = formbuilder_utils::GetFB();
		$others = $this->form_ptr->GetFields();
		$htm = $this->GetOption('headers_to_modify','f');
		$sendcopy = false;

		if ($this->Value[0] !== false)
		{
			if ( $this->GetOption('send_user_copy','n') == 'a' ||
				($this->GetOption('send_user_copy','n') == 'c' && isset($this->Value[1]) && $this->Value[1] == 1))
			{
				$sendcopy = true;
			}
			for($i=0;$i<count($others);$i++)
			{
				$replVal = '';
				if ($others[$i]->IsDisposition()
					&& is_subclass_of($others[$i],'fbDispositionEmailBase'))
				{
					if ($htm == 'f' || $htm == 'b')
					{
						$others[$i]->SetOption('email_from_address',$this->Value[0]);
					}
					if ($htm == 'r' || $htm == 'b')
					{
						$others[$i]->SetOption('email_reply_to_address',$this->Value[0]);
					}
				
					if ( strtolower(get_class($others[$i])) != 'fbdispositionemailconfirmation' && $sendcopy  )
					{
						$others[$i]->SetOption('sendcopy', $this->Value[0]);
						$others[$i]->SetOption('sendcopy_attach_files', $this->GetOption('file_attachment_copy','1'));
						$sendcopy = false;
					}
				}
			}
		}
	}

	function StatusInfo()
	{
		return '';
	}

	function GetValue()
	{
		return $this->Value[0];
	}

	function Validate()
	{
		$this->validated = true;
		$this->validationErrorText = '';
		$mod = formbuilder_utils::GetFB();
		switch ($this->ValidationType)
		{
		   case 'email':
              if ( $this->Value[0] !== false && !email_validator::is_email($this->Value[0]) )
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
