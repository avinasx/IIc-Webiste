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

if (! isset($params['form_id']) && isset($params['form']))
	{
		// get the form by name, not ID
		$params['form_id'] = $this->GetFormIDFromAlias($params['form']);
	}

$inline = false;

if( (isset($params['inline'])) && preg_match('/t(rue)*|y(yes)*|1/i',$params['inline']))
	{
		$inline = true;
	}

$fbrp_callcount = 0;
$aeform = new fbForm($this,$params,true,true);

$fld = $aeform->GetFormBrowserField();

if ($fld !== false && $fld->GetOption('feu_bind','0')=='1')
	{
		$feu = $this->GetModuleInstance('FrontEndUsers');
		if ($feu == false)
			{
			debug_display("FAILED to instantiate FEU!");
			return;
			}
			
		if ($feu->LoggedInId() === false)
			{
				echo $this->Lang('please_login');
				return;
			}
	}

if( !($inline || ($aeform->GetAttr('inline','0')== '1'))) $id = 'cntnt01';

$this->smarty->assign('fb_form_has_validation_errors',0);
$this->smarty->assign('fb_show_submission_errors',0);
$this->smarty->assign('fb_form_header', $aeform->RenderFormHeader());
$this->smarty->assign('fb_form_footer',$aeform->RenderFormFooter());

$finished = false;
$fieldExpandOp = false;

if( isset($params['fbrp_callcount']) )
	{
		$fbrp_callcount = (int)$params['fbrp_callcount'];
	}

foreach($params as $pKey=>$pVal)
	{
		if (substr($pKey,0,9) == 'fbrp_FeX_' || substr($pKey,0,9) == 'fbrp_FeD_')
			{
				// expanding or shrinking a field
				$fieldExpandOp = true;
			}
	}

if ( !$fieldExpandOp && (($aeform->GetPageCount() > 1 && $aeform->GetPageNumber() > 0) || (isset($params['fbrp_done'])&& $params['fbrp_done']==1)))
	{
		// Validate form
		$res = $aeform->Validate();
    
		// We have validate errors
		if ($res[0] === false)
		{
			$this->smarty->assign('fb_form_validation_errors',$res[1]);
			$this->smarty->assign('fb_form_has_validation_errors',1);

			$aeform->PageBack();

			// No validate errors, proceed
		} else if (isset($params['fbrp_done']) && $params['fbrp_done']==1) {
      
			// Check captcha, if installed
			$ok = true;
			$captcha = $this->getModuleInstance('Captcha');
			
			if ($aeform->GetAttr('use_captcha','0')== '1' && $captcha != null)
			{
        #this should work with Captcha 0.4.6 and higher (JM)
        $cptcneedsinput = method_exists($captcha, 'NeedsInputField') ? $captcha->NeedsInputField() : true;        
        $tovalidate = $cptcneedsinput ? $params['fbrp_captcha_phrase'] : '';
                
				if( !$captcha->CheckCaptcha($tovalidate) )
				{
					$this->smarty->assign('captcha_error',$aeform->GetAttr('captcha_wrong',$this->Lang('wrong_captcha')));

					$aeform->PageBack();
					$ok = false;
				}
        
			}
		
			// All ok, dispose form and manage fileuploads
			if ($ok)
			{
				$finished = true;
				$aeform->manageFileUploads();
				$results = $aeform->Dispose($returnid);
			}
		}
	}

if (! $finished)
	{
		$parms = array();
		$parms['form_name'] = $aeform->GetName();
		$parms['form_id'] = $aeform->GetId();
		$this->SendEvent('OnFormBuilderFormDisplay',$parms);

		if (isset($params['fb_from_fb']))
			{
				$this->smarty->assign('fb_form_start',
				$this->CreateFormStart($id, 'user_edit_resp', $returnid, 'post',
				'multipart/form-data', 
				($aeform->GetAttr('inline','0')== '1'), '',
				array('fbrp_callcount'=>$fbrp_callcount+1)).
				$this->CreateInputHidden($id,'response_id',isset($params['response_id'])?$params['response_id']:'-1'));
			}
			else
			{
				$this->smarty->assign('fb_form_start',
				$this->CreateFormStart($id, 'default', $returnid, 'post', 
				'multipart/form-data', 
				($aeform->GetAttr('inline','0')== '1'), '',
				array('fbrp_callcount'=>$fbrp_callcount+1)));
			}

		$this->smarty->assign('fb_form_end',$this->CreateFormEnd());
		$this->smarty->assign('fb_form_done',0);
	}
	else
	{
		$this->smarty->assign('fb_form_done',1);
		if ($results[0] == true)
			{
				$parms = array();
				$parms['form_name'] = $aeform->GetName();
				$parms['form_id'] = $aeform->GetId();
				$this->SendEvent('OnFormBuilderFormSubmit',$parms);

				$act = $aeform->GetAttr('submit_action','text');
				if ($act == 'text')
					{
						$message = $aeform->GetAttr('submit_response','');

						$aeform->setFinishedFormSmarty(true);
						echo $this->ProcessTemplateFromData( $message );
						return;
					}
					else if ($act == 'redir')
					{
						$ret = $aeform->GetAttr('redirect_page','-1');
						if ($ret != -1)
							{
								$this->RedirectContent($ret);
								return;
							}
					}
			}
			else
			{
				$parms = array();
				$params['fbrp_error']='';
				$this->smarty->assign('fb_submission_error',
				$this->Lang('submission_error'));

				$show = $this->GetPreference('hide_errors','1');
				$this->smarty->assign('fb_submission_error_list',$results[1]);
				$this->smarty->assign('fb_show_submission_errors',$show);

				$parms['form_name'] = $aeform->GetName();
				$parms['form_id'] = $aeform->GetId();
				$this->SendEvent('OnFormBuilderFormSubmitError',$parms);
			}
	}

$udtonce = $aeform->GetAttr('predisplay_udt','');
$udtevery = $aeform->GetAttr('predisplay_each_udt','');

if (!$finished && ((!empty($udtonce) && $udtonce != '-1') || (!empty($udtevery) && $udtevery != '-1')))
	{
		$usertagops = cmsms()->GetUserTagOperations();
		$parms = $params;
		$parms['FORM'] =& $aeform;

		if( isset($fbrp_callcount) && $fbrp_callcount == 0 && !empty($udtonce) && "-1" != $udtonce )
			{
				$tmp = $usertagops->CallUserTag($udtonce,$parms);
			}
			
		if(!empty($udtevery) && "-1" != $udtevery)
			{
				$tmp = $usertagops->CallUserTag($udtevery,$parms);
			}

	}

echo $aeform->RenderForm($id, $params, $returnid);

#
# EOF
#
?>