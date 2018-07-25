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

if (!isset($params['fbrp_f']) || !isset($params['fbrp_r']) || !isset($params['fbrp_c']))
	{
		echo $this->Lang('validation_param_error');
		return false;
	}

$params['response_id']=$params['fbrp_r'];
$params['form_id']=$params['fbrp_f'];
$params['fbrp_user_form_validate']=true;
$aeform = new fbForm($this, $params, true);

if (!$aeform->CheckResponse($params['fbrp_f'], $params['fbrp_r'], $params['fbrp_c']))
	{
		echo $this->Lang('validation_response_error');
		return false;
	}


/* Stikki removed: Old stuff, should be removed from Form.class.php aswell
else
{
	//[#2792] DeleteResponse is never called on validation;
	//$aeform->DeleteResponse($params['fbrp_r']);
}
*/

$fields = $aeform->GetFields();
$confirmationField = -1;

for($i=0;$i<count($fields);$i++)
	{
		if ($fields[$i]->GetFieldType() == 'DispositionEmailConfirmation')
			{
			$confirmationField = $i;
			break;
			}
	}
	
if ($confirmationField != -1)
	{
	$fields[$confirmationField]->ApproveToGo($params['fbrp_r']);
	$results = $aeform->Dispose($returnid);
	if ($results[0] == true)
		{
			$ret = $fields[$confirmationField]->GetOption('redirect_page','-1');
			if ($ret != -1)
				{
				$this->RedirectContent($ret);
				}
		}
		else
		{
			echo "Error!: ";
			foreach ($results[1] as $thisRes)
				{
				echo $thisRes . '<br />';
				}
		}
	}
	else
	{
		echo $this->Lang('validation_no_field_error');
	}

#
# EOF
#
?>