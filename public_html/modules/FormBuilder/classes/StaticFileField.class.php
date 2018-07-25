<?php
/*
 * FormBuilder. Copyright (c) 2005-2006 Samuel Goldstein <sjg@cmsmodules.com>
 * More info at http://dev.cmsmadesimple.org/projects/formbuilder
 *
 * A Module for CMS Made Simple, Copyright (c) 2006 by Ted Kulp (wishy@cmsmadesimple.org)
 * This project's homepage is: http://www.cmsmadesimple.org
 */

class fbStaticFileField extends fbFieldBase {

    public function __construct(&$form_ptr, &$params)
    {
        parent::__construct($form_ptr, $params);
        $mod = formbuilder_utils::GetFB();
        $this->Type = 'StaticFileField';
        $this->HasLabel = 0;
        $this->NeedsDiv = 0;
        $this->DisplayInForm = true;
        //    $this->DisplayType = $mod->Lang('field_type_file_upload');
        $this->ValidationTypes = array(
        $mod->Lang('validation_none')=>'none');
        $this->sortable = false;
    }

    function GetFieldInput($id, &$params, $returnid)
    {
        $mod = &formbuilder_utils::GetFB();

        if ($this->Value !== false)
        {
            $v = $this->Value;
        }
        else
        {
            $v = $this->GetOption('value','');
        }

        if ($this->GetOption('smarty_eval','0') == '1')
        {
            $v =  $mod->ProcessTemplateFromData($v);
        }

        if ($params['in_admin'] == 1)
        {
            $type = "text";
        }
        else
        {
            $type = "hidden";
        }

        return '<input type="'.$type.'" name="'.$id.'fbrp__'.$this->Id.'" value="'.$v.'"'.$this->GetCSSIdTag().' />';
    }
/*  Don't know if I need a special Load function   *** ajprog Aug 3, 2015
    public function Load($id, &$params, $loadDeep=false)
    {
        $mod = formbuilder_utils::GetFB();
        parent::Load($id,$params,$loadDeep);

        if( isset( $_FILES ) && isset( $_FILES[$mod->module_id.'fbrp__'.$this->Id] ) && $_FILES[$mod->module_id.'fbrp__'.$this->Id]['size'] > 0 )
        {
            // Okay, a file was uploaded
            $this->SetValue($_FILES[$mod->module_id.'fbrp__'.$this->Id]['name']);
        }
    }
*/
    function GetHumanReadableValue($as_string=true)
    {
        if ($this->GetOption('suppress_filename', '0') != '0')
        {
            return '';
        }

        $mod = formbuilder_utils::GetFB();

        if ($as_string && is_array($this->Value) && isset($this->Value[1]))
        {
            return $this->Value[0];
        }
        else
        {
            return $this->Value;
        }
    }

    public function StatusInfo()
    {
        $mod = formbuilder_utils::GetFB();
        if ($this->GetOption('file_destination','') != '')
        {
            $ret .= $this->GetOption('file_destination','');
        }
        if ($this->GetOption('value','') != '')
        {
            $ret = cms_join_path($ret,$this->GetOption('value',''));
        }

        return $ret;
    }


    public function PrePopulateAdminForm($formDescriptor)
    {
        $mod = formbuilder_utils::GetFB();
        $ms = $this->GetOption('max_size');
        $exts = $this->GetOption('permitted_extensions');
        $show = $this->GetOption('show_details','0');

        $main = array(
            array($mod->Lang('title_value'),
                $mod->CreateInputText($formDescriptor, 'fbrp_opt_value',$this->GetOption('value',''),25,1024))
        );


        $adv = array();

        array_push($adv, array($mod->Lang('title_suppress_filename'),
        $mod->CreateInputHidden($formDescriptor,'fbrp_opt_suppress_filename','0').
        $mod->CreateInputCheckbox($formDescriptor,
        'fbrp_opt_suppress_filename', '1', 
        $this->GetOption('suppress_filename','0'))));
        array_push($adv, array($mod->Lang('title_smarty_eval'),
            $mod->CreateInputHidden($formDescriptor, 'fbrp_opt_smarty_eval','0').
            $mod->CreateInputCheckbox($formDescriptor, 'fbrp_opt_smarty_eval',
                '1',$this->GetOption('smarty_eval','0'))));
        array_push($adv, array($mod->Lang('title_suppress_attachment'),
                $mod->CreateInputHidden($formDescriptor,'fbrp_opt_suppress_attachment',0).
                $mod->CreateInputCheckbox($formDescriptor, 'fbrp_opt_suppress_attachment', 
                    1, $this->GetOption('suppress_attachment',1))));

        return array('main'=>$main,'adv'=>$adv);
    }

	function AdminValidate()
    {
		$mod = formbuilder_utils::GetFB();
		$src = urldecode($this->GetOption('value',''));
		$srcfile = null;
		$config = cmsms()->GetConfig();
		$base = $config['root_path'];

		if ( startswith($src,$config['root_url']) )
		{
			$src = str_replace($config['root_url'],$base,$src);
		}
		elseif ( startswith($src,$config['ssl_url']) )
		{
			$src = str_replace($config['ssl_url'],$base,$src);
		}
		if (strpos($file = realpath($src), $base) === 0 && is_file($file)) 
		{
			$this->SetOption('value', substr($src,count($config['root_path'])));
			$this->SetOption('file_destination', $config['root_path']);
			return array(true,'');
		}
		elseif (strpos($file = realpath(cms_join_path($config['root_path'],$src)), $base) === 0 && is_file($file))
		{
			$this->SetOption('value', $src);
			$this->SetOption('file_destination', $config['root_path']);
			return array(true,'');
		}
		elseif (strpos($file = realpath(cms_join_path($config['uploads_path'],$src)), $base) === 0 && is_file($file))
		{
			$this->SetOption('value', $src);
			$this->SetOption('file_destination', $config['uploads_path']);
			return array(true,'');
		}
		else
		{
			return array(false,$mod->Lang('file_doesnt_exists', array($this->GetOption('value','')))); 
		}
	}
}
?>
