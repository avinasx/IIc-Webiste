<?php
#-------------------------------------------------------------------------
# Module: FormBuilder
# Author: Samuel Goldstein, Morten Poulsen
#-------------------------------------------------------------------------
# CMS Made Simple is (c) 2004 - 2011 by Ted Kulp (wishy@cmsmadesimple.org)
# CMS Made Simple is (c) 2011 - 2014 by The CMSMS Dev Team
# This project's homepage is: http://www.cmsmadesimple.org
# The module's homepage is: http://dev.cmsmadesimple.org/projects/formbuilder
#-------------------------------------------------------------------------
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
# Or read it online: http://www.gnu.org/licenses/licenses.html#GPL
#-------------------------------------------------------------------------

if( !defined('CMS_VERSION') ) exit;

if (! $this->CheckAccess()) exit;

$admintheme = cms_utils::get_theme_object();
$smarty = cmsms()->GetSmarty();

// and a list of all the existent forms.
$forms = $this->GetForms();
$num_forms = count($forms);

if( !formbuilder_utils::is_CMS2() )
	{
		$smarty->assign(
			'tabheaders', $this->StartTabHeaders() 
			. $this->SetTabHeader('forms', $this->Lang('forms') ) 
			. $this->SetTabHeader('config', $this->Lang('configuration') )
			. $this->EndTabHeaders()
			. $this->StartTabContent()
			);
                  
		$smarty->assign('start_formtab', $this->StartTab("forms"));
		$smarty->assign('start_configtab', $this->StartTab("config"));
		$smarty->assign('end_tab', $this->EndTab());
		$smarty->assign('end_tabs', $this->EndTabContent());
	}

$smarty->assign('start_configform', $this->CreateFormStart(
	$id,
	'admin_update_config',
	$returnid
	)
	); 

$smarty->assign('frmbld', $this);
$smarty->assign('title_form_name', $this->Lang('title_form_name'));
$smarty->assign('title_form_alias', $this->Lang('title_form_alias'));

$smarty->assign('message', isset($params['fbrp_message']) ? $params['fbrp_message'] : '');
  
$formArray = array();
$currow = "row1";

foreach ($forms as $thisForm)
	{
		$oneset = new stdClass();
		$oneset->rowclass = $currow;
  
		if ($this->CheckPermission('Modify Forms'))
			{
				$conf = $this->GetConfig();
				$oneset->name = $this->CreateLink($id,
					'admin_add_edit_form', '',
					$thisForm['name'], array('form_id'=>$thisForm['form_id']));
				$oneset->xml = $this->CreateLink($id,'exportxml','',"<img src=\"".$conf['root_url']."/modules/".$this->GetName()."/images/xml_rss.gif\" class=\"systemicon\" alt=\"Export Form as XML\" />",array('form_id'=>$thisForm['form_id']));
				$oneset->editlink = $this->CreateLink($id,
					'admin_add_edit_form', '',
				$admintheme->DisplayImage('icons/system/edit.gif',$this->Lang('edit'),'','','systemicon'),
					array('form_id'=>$thisForm['form_id']));
				$oneset->deletelink = $this->CreateLink($id,
					'admin_delete_form', '',
				$admintheme->DisplayImage('icons/system/delete.gif',$this->Lang('delete'),'','','systemicon'),
					array('form_id'=>$thisForm['form_id']),
				$this->Lang('are_you_sure_delete_form',$thisForm['name']));
			}
			else
			{
				$oneset->name=$thisForm['name'];
				$oneset->editlink = '';
				$oneset->deletelink = '';
			}

		$oneset->usage = $thisForm['alias'];
		array_push($formArray,$oneset);
		($currow == "row1"?$currow="row2":$currow="row1");
	}

if ($this->CheckPermission('Modify Forms'))
	{
		$smarty->assign('addlink',$this->CreateLink($id,
			'admin_add_edit_form', '',
		$admintheme->DisplayImage('icons/system/newobject.gif', $this->Lang('title_add_new_form'),'',
			'','systemicon'), array()));
		$smarty->assign('addform',$this->CreateLink($id,
			'admin_add_edit_form', '', $this->Lang('title_add_new_form'),
			array()));
		$smarty->assign('may_config',1);
	}	
	else
	{
		$smarty->assign('no_permission',
		$this->Lang('lackpermission'));
	}

$smarty->assign('title_hide_errors',$this->Lang('title_hide_errors'));    
$smarty->assign('input_hide_errors',$this->CreateInputCheckbox($id, 'fbrp_hide_errors', 1, $this->GetPreference('hide_errors','0')). $this->Lang('title_hide_errors_long'));
  
$smarty->assign('title_require_fieldnames',$this->Lang('title_require_fieldnames'));    
$smarty->assign('input_require_fieldnames',$this->CreateInputCheckbox($id, 'fbrp_require_fieldnames', 1, $this->GetPreference('require_fieldnames','1')). $this->Lang('title_require_fieldnames_long'));    
  
$smarty->assign('title_unique_fieldnames',$this->Lang('title_unique_fieldnames'));
$smarty->assign('input_unique_fieldnames',$this->CreateInputCheckbox($id, 'fbrp_unique_fieldnames', 1, $this->GetPreference('unique_fieldnames','1')). $this->Lang('title_unique_fieldnames_long'));    
  
$smarty->assign('title_enable_antispam',$this->Lang('title_enable_antispam'));
$smarty->assign('input_enable_antispam',$this->CreateInputCheckbox($id, 'fbrp_enable_antispam', 1, $this->GetPreference('enable_antispam','1')). $this->Lang('title_enable_antispam_long'));

$smarty->assign('title_blank_invalid',$this->Lang('title_blank_invalid'));
$smarty->assign('input_blank_invalid',$this->CreateInputCheckbox($id,
	'fbrp_blank_invalid', 1, $this->GetPreference('blank_invalid','0')).
	$this->Lang('title_blank_invalid_long'));
         
$smarty->assign('submit', $this->CreateInputSubmit($id, 'fbrp_submit', $this->Lang('save')));
$smarty->assign('end_configform',$this->CreateFormEnd());
  
$smarty->assign('start_xmlform',$this->CreateFormStart($id, 'importxml', $returnid, 'post','multipart/form-data'));
$smarty->assign('submitxml', $this->CreateInputSubmit($id, 'fbrp_submit', $this->Lang('upload')));
$smarty->assign('end_xmlform',$this->CreateFormEnd());
  
$smarty->assign('input_xml_to_upload',$this->CreateInputFile($id, 'fbrp_xmlfile'));
$smarty->assign('title_xml_to_upload',$this->Lang('title_xml_to_upload'));
$smarty->assign('title_xml_upload_formname',$this->Lang('title_xml_upload_formname'));
$smarty->assign('input_xml_upload_formname',
	$this->CreateInputText($id,'fbrp_import_formname','',25));
$smarty->assign('title_xml_upload_formalias',$this->Lang('title_xml_upload_formalias'));
$smarty->assign('input_xml_upload_formalias',
	$this->CreateInputText($id,'fbrp_import_formalias','',25));
$smarty->assign('info_leaveempty',$this->Lang('help_leaveempty'));
$smarty->assign('legend_xml_import',$this->Lang('title_import_legend'));
  
$smarty->assign('forms', $formArray);

if( formbuilder_utils::is_CMS2() )
	{
		echo $this->ProcessTemplate('AdminMain2.tpl');
	}
	else
	{
		echo $this->ProcessTemplate('AdminMain.tpl');
	}    

#
# EOF
#  
?>