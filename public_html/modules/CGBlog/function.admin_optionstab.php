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

$smarty->assign('mod',$this);
// CreateFormStart sets up a proper form tag that will cause the submit to
// return control to this module for processing.
$smarty->assign('startform', $this->CreateFormStart ($id, 'updateoptions', $returnid));
$smarty->assign('endform', $this->CreateFormEnd ());

$tmp = cgblog_ops::get_category_list(TRUE);
if( is_array($tmp) ) {
    $categorylist = array_flip($tmp);
    $smarty->assign('title_default_category', $this->Lang('default_category'));
    $smarty->assign('input_default_category',
                    $this->CreateInputDropdown($id, 'default_category', $categorylist, -1, $this->GetPreference('default_category', '')));
}

$smarty->assign('submit', $this->CreateInputSubmit ($id, 'optionssubmitbutton', $this->Lang('submit')));

$smarty->assign('title_hide_summary_field',$this->Lang('hide_summary_field'));
$smarty->assign('input_hide_summary_field',
		$this->CreateInputCheckbox($id,'hide_summary_field','1', $this->GetPreference('hide_summary_field','0')));

$smarty->assign('title_allow_summary_wysiwyg',$this->Lang('allow_summary_wysiwyg'));
$smarty->assign('input_allow_summary_wysiwyg',
		$this->CreateInputCheckbox($id,'allow_summary_wysiwyg','1', $this->GetPreference('allow_summary_wysiwyg',1)));

$smarty->assign('title_expiry_interval',$this->Lang('expiry_interval'));
$smarty->assign('input_expiry_interval',
		$this->CreateInputText($id,'expiry_interval', $this->GetPreference('expiry_interval',180),4,4));

$smarty->assign('title_expired_searchable',$this->Lang('expired_searchable'));
$smarty->assign('input_expired_searchable',
		$this->CreateInputCheckbox($id,'expired_searchable','1', $this->GetPreference('expired_searchable',1)));

$smarty->assign('urlprefix',$this->GetPreference('urlprefix','cgblog'));

$opts = explode(',',$this->GetPreference('fesubmit_email_users'));
$smarty->assign('fesubmit_email_users_input',
		cgblog_utils::CreateUserMultiSelect($id, $opts,'fesubmit_email_users'));
$smarty->assign('fesubmit_email_subject',$this->GetPreference('fesubmit_email_subject'));
$smarty->assign('fesubmit_email_html',$this->GetPreference('fesubmit_email_html'));
$opts = array(0=>$this->Lang('no'),1=>$this->Lang('yes'));
$smarty->assign('yesnoopts',$opts);
$smarty->assign('fesubmit_email_template_area',
		$this->CreateTextArea(false,$id,$this->GetTemplate('email_template'),'fesubmit_email_template'));
$opts = array('draft'=>$this->Lang('draft'),
	      'review'=>$this->Lang('review'),
	      'published'=>$this->Lang('published'));
$smarty->assign('statusopts',$opts);
$smarty->assign('fesubmit_status',$this->GetPreference('fesubmit_status'));

$contentops = $gCms->GetContentOperations();
$smarty->assign('fesubmit_redirect',
		$contentops->CreateHierarchyDropdown('',$this->GetPreference('fesubmit_redirect'),$id.'fesubmit_redirect',1));

$smarty->assign('default_detailpage',
		$contentops->CreateHierarchyDropdown('',$this->GetPreference('default_detailpage'),$id.'default_detailpage',1));

$smarty->assign('default_summarypage',
		$contentops->CreateHierarchyDropdown('',$this->GetPreference('default_summarypage'),$id.'default_summarypage',1));

$feu = cge_utils::get_module('FrontEndUsers');
if( $feu ) {
  $groups = $feu->GetGroupList();
  $groups = array_flip($groups);
  $groups = cge_array::hash_prepend($groups,-1,$this->Lang('none'));
  $smarty->assign('feu_groups',$groups);
  $smarty->assign('fesubmit_draftviewers',$this->GetPreference('fesubmit_draftviewers',-1));
}

$statusdropdown = array();
$statusdropdown[$this->Lang('draft')] = 'draft';
$statusdropdown[$this->Lang('review')] = 'review';
$statusdropdown[$this->Lang('published')] = 'published';
$statusdropdown = array_flip($statusdropdown);
$smarty->assign('statusopts',$statusdropdown);

$template = '{$postdate|cms_date_format:\'%Y\'}/{$postdate|cms_date_format:\'%m\'}/{$title}';
$template = $this->GetPreference('urltemplate',$template);
$smarty->assign('urltpl',$template);

$smarty->assign('friendlyname',$this->GetPreference('friendlyname',$this->Lang('friendlyname')));
$smarty->assign('default_status',$this->GetPreference('default_status','draft'));
$smarty->assign('fesubmit_usexpiry',$this->GetPreference('fesubmit_usexpiry',0));
$smarty->assign('fesubmit_dfltexpiry',$this->GetPreference('fesubmit_dfltexpiry',1));
$smarty->assign('fesubmit_managearticles',$this->GetPreference('fesubmit_managearticles',1));
$smarty->assign('fesubmit_updatestatus',$this->GetPreference('fesubmit_updatestatus',0));
$smarty->assign('fesubmit_wysiwyg',$this->GetPreference('fesubmit_wysiwyg',1));
$email_statuses = array_merge(array('any'=>$this->Lang('any')),$statusdropdown);
$smarty->assign('email_statuses',$email_statuses);
$smarty->assign('fesubmit_email_status',$this->GetPreference('fesubmit_email_status','any'));

$sortby = array();
$sortby['cgblog_date'] = $this->Lang('sortby_date');
$sortby['cgblog_title'] = $this->Lang('sortby_title');
$sortby['cgblog_category'] = $this->Lang('sortby_category');
$sortby['summary'] = $this->Lang('sortby_summary');
$sortby['start_time'] = $this->Lang('sortby_starttime');
$sortby['end_time'] = $this->Lang('sortby_endtime');
$sortby['cgblog_extra'] = $this->Lang('sortby_extra');
$sortby['random'] = $this->Lang('sortby_random');
$smarty->assign('sortby_opts',$sortby);

$sortorders = array('asc'=>$this->Lang('sortorder_asc'),'desc'=>$this->Lang('sortorder_desc'));
$smarty->assign('sortorder_opts',$sortorders);

$smarty->assign('default_sortby',$this->GetPreference('default_sortby','cgblog_date'));
$smarty->assign('default_sortorder',$this->GetPreference('default_sortorder','desc'));

$smarty->assign('default_pagelimit',$this->GetPreference('default_pagelimit',25));
$smarty->assign('default_showall',$this->GetPreference('default_showall',0));
$smarty->assign('default_showarchive',$this->GetPreference('default_showarchive',0));
$cgsb = \cms_utils::get_module('CGSocialBlaster');
$smarty->assign('have_cgsb', is_object($cgsb) );
$smarty->assign('social_announce', $this->GetPreference('social_announce'));

// Display the populated template
echo $this->ProcessTemplate ('adminprefs.tpl');

?>