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
if( !$this->CheckPermission('Manage CGBlog Categories') ) return;
$this->SetCurrentTab('categories');

function ordercats_create_flatlist($tree,$parent_id = -1)
{
    $data = array();
    $order = 1;
    foreach( $tree as &$node ) {
        if( is_array($node) && count($node) == 2) {
            $cid = (int)substr($node[0],strlen('cat_'));
            $data[] = array('id'=>$cid,'parent_id'=>$parent_id,'order'=>$order);
            if( isset($node[1]) && is_array($node[1]) ) {
                $data = array_merge($data,ordercats_create_flatlist($node[1],$cid));
            }
        }
        else {
            $cid = (int)substr($node,strlen('cat_'));
            $data[] = array('id'=>$cid,'parent_id'=>$parent_id,'order'=>$order);
        }
        $order++;
    }
    return $data;
}

$tree = cgblog_ops::get_category_tree();

if( isset($params['cancel']) ) {
    $this->RedirectToTab($id);
}
else if( isset($params['submit']) ) {

    $data = json_decode($params['orderdata']);
    $data = ordercats_create_flatlist($data);

    // update the database
    $query = 'UPDATE '.cms_db_prefix().'module_cgblog_categories SET parent_id = ?, item_order = ?, hierarchy = ? WHERE id = ?';
    foreach( $data as $rec ) {
        $db->Execute($query,array($rec['parent_id'],$rec['order'],null,$rec['id']));
    }
    cgblog_ops::update_hierarchy_positions();

    $this->SetMessage($this->Lang('reorder_complete'));
    $this->RedirectToTab($id);
    return;
}

$smarty->assign('formstart',$this->CGCreateFormStart($id,'admin_order_categories'));
$smarty->assign('formend',$this->CreateFormEnd());
$smarty->assign('tree',$tree);
$smarty->assign('depth',0);

echo $this->ProcessTemplate('admin_order_categories.tpl')
#
# EOF
#
?>