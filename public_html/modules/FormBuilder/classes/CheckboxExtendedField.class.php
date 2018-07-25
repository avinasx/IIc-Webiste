<?php
/* 
	FormBuilder. Copyright (c) 2005-2006 Samuel Goldstein <sjg@cmsmodules.com>
	More info at http://dev.cmsmadesimple.org/projects/formbuilder

	A Module for CMS Made Simple, Copyright (c) 2006 by Ted Kulp (wishy@cmsmadesimple.org)
	This project's homepage is: http://www.cmsmadesimple.org

	This Field written by Tapio "Stikki" Löytty <tapsa@blackmilk.fi>
*/

class fbCheckboxExtendedField extends fbFieldBase {

	function __construct($form_ptr, &$params)
	{
        parent::__construct($form_ptr, $params);
        $mod = formbuilder_utils::GetFB();
		$this->Type =  'CheckboxExtendedField';
		$this->DisplayInForm = true;
		$this->NonRequirableField = true;
		$this->ValidationTypes = array(
            $mod->Lang('validation_none')=>'none',
            $mod->Lang('validation_must_check')=>'checked',
            $mod->Lang('validation_empty')=>'empty'
            );
		$this->sortable = false;
		$this->hasMultipleFormComponents = true;	  	  
	}

	function GetFieldInput($id, &$params, $returnid)
	{
		$mod = formbuilder_utils::GetFB();
		$js = $this->GetOption('javascript','');
		$check_value = $this->_check_value();
		$output = array();
		$box_label = '';		
		$text_label = '';		
		$html5_0 = '';
		$html5_1 = '';

                if ($this->GetOption('html5','0') == '1')
                {
			if ($this->ValidationType == 'checked')
			{
                        	$html5_0 = ' required';
			}

			$val = $this->Value['text'];
			$html5_1 = ' placeholder="'.$this->GetOption('default').'"';
			if ($this->ValidationType == 'empty')
                	{
                        	$html5_1 .= ' required';
			}
                }
                else
                {
                        $val = $this->Value['text'] ? $this->Value['text'] : $this->GetOption('default');
                        if($this->GetOption('clear_default','0') == 1)
                        {
                                $js .= ' onfocus="if(this.value==this.defaultValue) this.value=\'\';" onblur="if(this.value==\'\') this.value=this.defaultValue;"';
                        }
                }

		if (!$this->Value['box'] && $this->GetOption('is_checked','0')=='1') {
		
			$this->Value['box'] = 't';
		}
		
		if (strlen($this->GetOption('box_label','')) > 0) {
			$box_label = '<label for="'.$this->GetCSSId('_0').'">'.$this->GetOption('box_label').'</label>';
		}	
		
		if (strlen($this->GetOption('text_label','')) > 0) {
			$text_label = '<label for="'.$this->GetCSSId('_1').'">'.$this->GetOption('text_label').'</label>';
		}	
		
		$obj = new stdClass();
		$obj->name = $box_label;
		$obj->input = $mod->CreateInputCheckbox($id, 'fbrp__'.$this->Id.'[box]', 't',$this->Value['box'],$js.$html5_0.$this->GetCSSIdTag('_0'));
		
		$output[] = $obj;

		if($this->GetOption('show_textfield')) {
		
			$obj = new stdClass();
			$obj->name = $text_label;
			$obj->input = $mod->fbCreateInputText($id, 'fbrp__'.$this->Id.'[text]',($check_value['text']?$this->Value['text']:''),25,25,$js.$html5_1.$this->GetCSSIdTag('_1'));		
				
			$output[] = $obj;
		
		}
			
		return $output;
	}

	function GetHumanReadableValue($as_string=true)
	{
		$mod = formbuilder_utils::GetFB();
		$form = $this->form_ptr;
		$val = $this->Value;
		$ret = '';

		if (!$val['box']) {
			
			$ret .= $this->GetOption('unchecked_value',$mod->Lang('value_unchecked'));
		} else {
		
			$ret .= $this->GetOption('checked_value',$mod->Lang('value_checked'));
		}		

		if ($val['text'] && !empty($val['text'])) {
		
			$ret .= $form->GetAttr('list_delimiter',',').$val['text'];
		
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
            		$mod->CreateInputText($formDescriptor, 'fbrp_opt_box_label',
            		$this->GetOption('box_label',''),25,255)),
			array($mod->Lang('title_textfield_label'),
            		$mod->CreateInputText($formDescriptor, 'fbrp_opt_text_label',
            		$this->GetOption('text_label',''),25,255)),					
            array($mod->Lang('title_checked_value'),
            		$mod->CreateInputText($formDescriptor, 'fbrp_opt_checked_value',
            		$this->GetOption('checked_value',$mod->Lang('yes')),25,255)),
            array($mod->Lang('title_unchecked_value'),
            		$mod->CreateInputText($formDescriptor, 'fbrp_opt_unchecked_value',
            		$this->GetOption('unchecked_value',$mod->Lang('no')),25,255)),
			array($mod->Lang('title_default_set'),
				$mod->CreateInputHidden($formDescriptor,'fbrp_opt_is_checked','0').$mod->CreateInputCheckbox($formDescriptor, 'fbrp_opt_is_checked', '1', $this->GetOption('is_checked','0'))),
			array($mod->Lang('title_show_textfield'),
				$mod->CreateInputHidden($formDescriptor,'fbrp_opt_show_textfield','0').$mod->CreateInputCheckbox($formDescriptor, 'fbrp_opt_show_textfield', '1', $this->GetOption('show_textfield','0')))		
		);
				
                $adv = array(
                        array($mod->Lang('title_field_default_value'),$mod->CreateInputText($formDescriptor, 'fbrp_opt_default',$this->GetOption('default'),25,1024)),
                        array($mod->Lang('title_clear_default'),$mod->CreateInputHidden($formDescriptor,'fbrp_opt_clear_default','0').
                                $mod->CreateInputCheckbox($formDescriptor, 'fbrp_opt_clear_default','1',$this->GetOption('clear_default','0')).'<br />'.
                                $mod->Lang('title_clear_default_help'))
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
		  	       if ($this->Value['box'] == false)
		  	           {
		  	           $this->validated = false;
		  	           $this->validationErrorText = $mod->Lang('you_must_check',$this->GetOption('box_label',''));
		  	           }
		  	       break;
		  	   case 'empty':
		  	       if (empty($this->Value['text']))
		  	           {
		  	           $this->validated = false;
		  	           $this->validationErrorText = $mod->Lang('please_enter_a_value',$this->GetOption('text_label',''));
		  	           }
		  	       break;

				   
		  }
		return array($this->validated, $this->validationErrorText);
	}

	
	private function _check_value() {
		
		$val = $this->Value;
		$valid = array('box'=>false, 'text'=>false);
	
		if($val === false) {
		
			return false;
		}
	
		if(isset($val['box'])) {
		
			$valid['box'] = true;
		}
		
		if(isset($val['text']) && !empty($val['text'])) {
		
			$valid['text'] = true;
		} 
		
		return valid;
	
	}
	
} // end of class

?>
