<?php
/* 
   FormBuilder. Copyright (c) 2005-2006 Samuel Goldstein <sjg@cmsmodules.com>
   More info at http://dev.cmsmadesimple.org/projects/formbuilder
   
   A Module for CMS Made Simple, Copyrigth (c)2006 by Ted Kulp (wishy@cmsmadesimple.org)
   This project's homepage is: http://www.cmsmadesimple.org
*/

class fbTextAreaField extends fbFieldBase {

	function __construct($form_ptr, &$params)
	{
		parent::__construct($form_ptr, $params);
		$mod = formbuilder_utils::GetFB();
		$this->Type = 'TextAreaField';
		$this->DisplayInForm = true;
		$this->ValidationTypes = array();
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
		return $mod->CreateTextArea(($this->GetOption('wysiwyg','0') == '1'?true:false),$id,$val, 'fbrp__'.$this->Id,
            		'',$this->GetCSSId(),'','',$this->GetOption('cols','80'),$this->GetOption('rows','15'),'', '', $js.$html5);


   }
	function Validate(){
		$this->validated = true;
		$this->validationErrorText = '';
		$mod = formbuilder_utils::GetFB();
		$length = $this->GetOption('length','');
		if(is_numeric($length) && $length > 0){
			if((strlen($this->Value)-1) > $length){
				$this->validated = false;
				$this->validationErrorText = $mod->Lang('please_enter_no_longer', $length);
			}
			$this->Value = substr($this->Value, 0, $length+1);
		}
		return array($this->validated, $this->validationErrorText);
	}

	function StatusInfo()
	{
		$mod = formbuilder_utils::GetFB();
		$ret = '';

		if (strlen($this->ValidationType)>0) {
		
			$ret = array_search($this->ValidationType,$this->ValidationTypes);
		}
		
		if ($this->GetOption('wysiwyg','0') == '1') {
		
			$ret .= ' wysiwyg';
		} else {
		
			$ret .= ' non-wysiwyg';
		}
		
		$ret .=  ', '.$mod->Lang('rows',$this->GetOption('rows','15'));
		$ret .=  ', '.$mod->Lang('cols',$this->GetOption('cols','80'));
		
		return $ret;
	}


	function PrePopulateAdminForm($formDescriptor)
	{
	   $mod = formbuilder_utils::GetFB();
	   $main = array(
         	array($mod->Lang('title_use_wysiwyg'),$mod->CreateInputHidden($formDescriptor, 'fbrp_opt_wysiwyg','0').
						$mod->CreateInputCheckbox($formDescriptor, 'fbrp_opt_wysiwyg','1',$this->GetOption('wysiwyg','0'))),
			array($mod->Lang('title_textarea_rows'),$mod->CreateInputText($formDescriptor, 'fbrp_opt_rows',$this->GetOption('rows','15'),5,5)),
			array($mod->Lang('title_textarea_cols'),$mod->CreateInputText($formDescriptor, 'fbrp_opt_cols',$this->GetOption('cols','80'),5,5)),
			array($mod->Lang('title_textarea_length'),$mod->CreateInputText($formDescriptor, 'fbrp_opt_length',$this->GetOption('length',''), 5, 5))
            );
	   $adv = array(
			array($mod->Lang('title_field_default_value'),$mod->CreateTextArea(false,$formDescriptor, $this->GetOption('default'),'fbrp_opt_default')),
			array($mod->Lang('title_clear_default'),$mod->CreateInputHidden($formDescriptor,'fbrp_opt_clear_default','0').
						$mod->CreateInputCheckbox($formDescriptor, 'fbrp_opt_clear_default','1',$this->GetOption('clear_default','0')).'<br />'.$mod->Lang('title_clear_default_help'))
		);

        return array('main'=>$main,'adv'=>$adv);
	}

	function PostPopulateAdminForm(&$mainArray, &$advArray)
	{
		$mod = formbuilder_utils::GetFB();
		
		// hide "javascript"
		$this->RemoveAdminField($advArray, $mod->Lang('title_field_javascript'));
	}


}

?>
