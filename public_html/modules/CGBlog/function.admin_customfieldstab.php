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

$entryarray = array();

$max = $db->GetOne("SELECT max(item_order) as max_item_order FROM ".cms_db_prefix()."module_cgblog_fielddefs");

$usedfields = array();
$tmp = $db->GetArray('SELECT DISTINCT fielddef_id FROM '.cms_db_prefix().'module_cgblog_fieldvals');
if( is_array($tmp) ) {
    foreach( $tmp as $row ) {
        $usedfields[] = $row['fielddef_id'];
    }
}

$query = "SELECT * FROM ".cms_db_prefix()."module_cgblog_fielddefs ORDER BY item_order";
$dbresult = $db->Execute($query);

$rowclass = 'row1';

$admintheme = cms_utils::get_theme_object();
while ($dbresult && $row = $dbresult->FetchRow()) {
    $onerow = new stdClass();

    $onerow->id = $row['id'];
    $onerow->name = $this->CreateLink($id, 'admin_editfielddef', $returnid, $row['name'], array('fdid'=>$row['id']));
    $onerow->type = $this->Lang($row['type']);
    $onerow->item_order = $row['item_order'];

    if ($onerow->item_order > 1) {
        $onerow->uplink = $this->CreateLink($id, 'admin_movefielddef', $returnid, $admintheme->DisplayImage('icons/system/arrow-u.gif', $this->Lang('up'),'','','systemicon'), array('fdid'=>$row['id'], 'dir'=>'up'));
    }
    else {
        $onerow->uplink = '';
    }
    if ($max > $onerow->item_order) {
        $onerow->downlink = $this->CreateLink($id, 'admin_movefielddef', $returnid, $admintheme->DisplayImage('icons/system/arrow-d.gif', $this->Lang('down'),'','','systemicon'), array('fdid'=>$row['id'], 'dir'=>'down'));
    }
    else {
        $onerow->downlink = '';
    }

    $onerow->editlink = $this->CreateLink($id, 'admin_editfielddef', $returnid, $admintheme->DisplayImage('icons/system/edit.gif', $this->Lang('edit'),'','','systemicon'), array('fdid'=>$row['id']));

    if( !in_array($row['id'],$usedfields) ) {
        $onerow->deletelink = $this->CreateLink($id, 'admin_deletefielddef', $returnid, $admintheme->DisplayImage('icons/system/delete.gif', $this->Lang('delete'),'','','systemicon'), array('fdid'=>$row['id']), $this->Lang('areyousure'));
    }

    $entryarray[] = $onerow;

    ($rowclass=="row1"?$rowclass="row2":$rowclass="row1");
  }

$smarty->assign_by_ref('items', $entryarray);
$smarty->assign('itemcount', count($entryarray));

$smarty->assign('addlink', $this->CreateLink($id, 'admin_addfielddef', $returnid, $admintheme->DisplayImage('icons/system/newfolder.gif', $this->Lang('addfielddef'),'','','systemicon'), array(), '', false, false, '') .' '. $this->CreateLink($id, 'admin_addfielddef', $returnid, $this->Lang('addfielddef'), array(), '', false, false, 'class="pageoptions"'));

$smarty->assign('fielddeftext', $this->Lang('fielddef'));
$smarty->assign('typetext', $this->Lang('type'));

#Display template
echo $this->ProcessTemplate('customfieldstab.tpl');

// EOF
?>