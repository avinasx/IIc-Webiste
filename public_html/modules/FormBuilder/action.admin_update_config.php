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

$fb_config = fb_config::GetInstance();

$this->SetPreference('hide_errors',isset($params['fbrp_hide_errors'])?$params['fbrp_hide_errors']:0);
//$this->SetPreference('show_version',isset($params['fbrp_show_version'])?$params['fbrp_show_version']:0);

$this->SetPreference(
											'show_version',
											isset($fb_config['show_version']) ?
											$fb_config['show_version'] : FALSE
										);

$this->SetPreference('relaxed_email_regex',isset($params['fbrp_relaxed_email_regex'])?$params['fbrp_relaxed_email_regex']:0);

$this->SetPreference('require_fieldnames',isset($params['fbrp_require_fieldnames'])?$params['fbrp_require_fieldnames']:0);

$this->SetPreference('unique_fieldnames',isset($params['fbrp_unique_fieldnames'])?$params['fbrp_unique_fieldnames']:0);

//$this->SetPreference('enable_fastadd',isset($params['fbrp_enable_fastadd'])?$params['fbrp_enable_fastadd']:0);

$this->SetPreference(
											'enable_fastadd',
											isset($fb_config['enable_fastadd']) ?
											$fb_config['enable_fastadd'] : TRUE
										);

$this->SetPreference('enable_antispam',isset($params['fbrp_enable_antispam'])?$params['fbrp_enable_antispam']:0);
//$this->SetPreference('show_fieldids',isset($params['fbrp_show_fieldids'])?$params['fbrp_show_fieldids']:0);

$this->SetPreference(
											'show_fieldids',
											isset($fb_config['show_fieldids']) ?
											$fb_config['show_fieldids'] : TRUE
										);

//$this->SetPreference('show_fieldaliases',isset($params['fbrp_show_fieldaliases'])?$params['fbrp_show_fieldaliases']:0);

$this->SetPreference(
											'show_fieldaliases',
											isset($fb_config['show_fieldaliases']) ?
											$fb_config['show_fieldaliases'] : TRUE
										);

$this->SetPreference('blank_invalid',isset($params['fbrp_blank_invalid'])?$params['fbrp_blank_invalid']:0);

$params['fbrp_message'] = $this->Lang('configuration_updated');
$this->DoAction('defaultadmin', $id, $params);

#
# EOF
#
?>