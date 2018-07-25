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
if (!$this->CheckPermission('Modify Site Preferences')) return;

if (isset($params['cancel'])) {
  $params = array('active_tab' => 'customfields');
  $this->Redirect($id, 'defaultadmin', $returnid, $params);
}

$this->SetCurrentTab('customfields');
$userid = get_userid();
$attrs = array();
$attrs['size'] = 40;
$attrs['max_length'] = 255;
$attrs['file_exts'] = 'pdf,txt';
$attrs['image_exts'] = 'png,gif,bmp,jpg,jpeg';
$attrs['textarea_wysiwyg'] = 0;
$type = 'textbox';
$name = '';
$public = 1;

if (isset($params['submit'])) {
  $name = trim($params['name']);
  $type = trim($params['type']);
  $public = (int)cge_utils::get_param($params,'public',0);
  $attrs['size'] = (int)$params['size'];
  $attrs['size'] = max(1,$attrs['size']);
  $attrs['size'] = min(100,$attrs['size']);
  $attrs['max_length'] = (int)$params['max_length'];
  $attrs['max_length'] = max(1,$attrs['max_length']);
  $attrs['max_length'] = min(999,$attrs['max_length']);
  $attrs['size'] = min($attrs['size'],$attrs['max_length']);
  $attrs['file_exts'] = trim($params['file_exts']);
  $attrs['image_exts'] = trim($params['image_exts']);
  $attrs['textarea_wysiwyg'] = (int)$params['textarea_wysiwyg'];

  if ($name != '') {
    if (is_numeric($attrs['max_length'])) {
      $query = 'SELECT id FROM '.cms_db_prefix().'module_cgblog_fielddefs
                WHERE name = ? LIMIT 1';
      $exists = $db->GetOne($query,array($name));
      if( $exists ) {
	echo $this->ShowErrors($this->Lang('nameexists'));
      }
      else {
	$max = $db->GetOne('SELECT max(item_order) + 1 FROM ' . cms_db_prefix() . 'module_cgblog_fielddefs');
	if( $max == null ) $max = 1;
	$query = 'INSERT INTO '.cms_db_prefix().'module_cgblog_fielddefs (name, type, item_order, create_date, modified_date, public, attrs)
                  VALUES (?,?,?,NOW(),NOW(),?,?)';
	$parms = array($name, $type, $max, $public, serialize($attrs));
	$dbr = $db->Execute($query, $parms );
	if( !$dbr ) die($db->sql.'<br/>'.$db->ErrorMsg());

	$this->SetMessage($this->Lang('fielddefadded'));
	$this->RedirectToTab($id);
      }
    }
    else {
      echo $this->ShowErrors($this->Lang('notanumber'));
    }
  }
  else {
    echo $this->ShowErrors($this->Lang('nonamegiven'));
  }
}

#Display template
$smarty->assign('showinputtype',true);
$smarty->assign('attrs',$attrs);
$smarty->assign('fieldtypes',$this->get_field_types());
$smarty->assign('type',$type);
$smarty->assign('max_length',$attrs['max_length']);
$smarty->assign('startform', $this->CreateFormStart($id, 'admin_addfielddef', $returnid));
$smarty->assign('endform', $this->CreateFormEnd());
$smarty->assign('title',$this->Lang('addfielddef'));
$smarty->assign('nametext', $this->Lang('name'));
$smarty->assign('typetext', $this->Lang('type'));
$smarty->assign('maxlengthtext', $this->Lang('maxlength'));
$smarty->assign('inputname', $this->CreateInputText($id, 'name', $name, 30, 255));
$smarty->assign('showinputtype', true);
$smarty->assign('info_maxlength', $this->Lang('info_maxlength'));
$smarty->assign('userviewtext',$this->Lang('public'));
$smarty->assign('input_userview', $this->CreateInputcheckbox($id, 'public', 1, $public));

$smarty->assign('hidden', '');
$smarty->assign('submit', $this->CreateInputSubmit($id, 'submit', lang('submit')));
$smarty->assign('cancel', $this->CreateInputSubmit($id, 'cancel', lang('cancel')));

echo $this->ProcessTemplate('editfielddef.tpl');

// EOF
?>