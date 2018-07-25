<?php
#BEGIN_LICENSE
#-------------------------------------------------------------------------
# Module: CGBlog (c) 2010-2014 by Robert Campbell
#         (calguy1000@cmsmadesimple.org)
#  An addon module for CMS Made Simple to allow creation, management of
#  and display of blog articles.
#
#  This module forked from the original CMSMS News Module (c)
#  Ted Kulp, and Robert Campbell.
#
#-------------------------------------------------------------------------
# CMS - CMS Made Simple is (c) 2005 by Ted Kulp (wishy@cmsmadesimple.org)
# Visit the CMSMS homepage at: http://www.cmsmadesimple.org
#
#-------------------------------------------------------------------------
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# However, as a special exception to the GPL, this software is distributed
# as an addon module to CMS Made Simple.  You may not use this software
# in any Non GPL version of CMS Made simple, or in any version of CMS
# Made simple that does not indicate clearly and obviously in its admin
# section that the site was built with CMS Made simple.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
# Or read it online: http://www.gnu.org/licenses/licenses.html#GPL
#
#-------------------------------------------------------------------------
#END_LICENSE
if (!isset($gCms)) exit;

if( !$this->CheckPermission( 'Modify Site Preferences' ) )
{
  return;
}

$this->SetCurrentTab('options');
if( isset($params['fesubmit_template_reset']) ) {
  $fn = dirname(__FILE__).'/templates/orig_fesubmit_email_template.tpl';
  if( file_exists($fn) ) {
    $template = @file_get_contents($fn);
    $this->SetTemplate('email_template',$template);
  }

  $this->Setmessage($this->Lang('templaterestored'));
  $this->RedirectToTab($id);
}

$this->SetPreference('friendlyname',trim($params['friendlyname']));
$this->SetPreference('urltemplate',trim($params['urltemplate']));
$this->SetPreference('default_status',$params['default_status']);
$this->SetPreference('default_category', cge_utils::get_param($params,'default_category',-1) );
$this->SetPreference('hide_summary_field', (isset($params['hide_summary_field'])?'1':'0'));
$this->SetPreference('allow_summary_wysiwyg', (isset($params['allow_summary_wysiwyg'])?'1':'0'));
$this->SetPreference('expired_searchable', (isset($params['expired_searchable'])?'1':'0'));
$this->SetPreference('expiry_interval', $params['expiry_interval']);
$this->SetPreference('urlprefix',$params['urlprefix']);
$this->SetPreference('fesubmit_email_status',$params['fesubmit_email_status']);
if( isset($params['fesubmit_email_users']) ) {
  $this->SetPreference('fesubmit_email_users',implode(',',$params['fesubmit_email_users']));
}
else {
  $this->SetPreference('fesubmit_email_users','');
}
$this->SetPreference('fesubmit_email_subject',$params['fesubmit_email_subject']);
$this->SetPreference('fesubmit_email_html',$params['fesubmit_email_html']);
$this->SetTemplate('email_template',$params['fesubmit_email_template']);
$this->SetPreference('fesubmit_redirect',$params['fesubmit_redirect']);
$this->SetPreference('default_detailpage',$params['default_detailpage']);
$this->SetPreference('default_summarypage',$params['default_summarypage']);
$this->SetPreference('fesubmit_status',$params['fesubmit_status']);
$this->SetPreference('fesubmit_usexpiry',$params['fesubmit_usexpiry']);
$this->SetPreference('fesubmit_dfltexpiry',$params['fesubmit_dfltexpiry']);
$this->SetPreference('fesubmit_managearticles',$params['fesubmit_managearticles']);
$this->SetPreference('fesubmit_updatestatus',$params['fesubmit_updatestatus']);
$this->SetPreference('fesubmit_wysiwyg',$params['fesubmit_wysiwyg']);
$this->SetPreference('default_sortby',$params['default_sortby']);
$n = (int)$params['default_pagelimit'];
$n = max(1,min(50000,$n));
$this->SetPreference('default_pagelimit',$n);
$this->SetPreference('default_showall',(int)$params['default_showall']);
$this->SetPreference('default_showarchive',(int)$params['default_showarchive']);
$this->SetPreference('default_sortorder',$params['default_sortorder']);
if( \cge_param::exists( $params, 'social_announce') ) $this->SetPreference('social_announce',\cge_param::get_bool($params,'social_announce'));
if( isset($params['fesubmit_draftviewers']) ) $this->SetPreference('fesubmit_draftviewers',$params['fesubmit_draftviewers']);

$this->SetMessage($this->Lang('optionsupdated'));
$this->RedirectToTab($id);
