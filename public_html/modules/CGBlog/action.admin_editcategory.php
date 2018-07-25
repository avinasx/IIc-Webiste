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
if( !isset($gCms) ) return;
if (!$this->CheckPermission('Manage CGBlog Categories')) return;

$this->SetCurrentTab('categories');
$sub = trim(cge_utils::get_param($params,'sub','add'));
$cid = (int)cge_utils::get_param($params,'cid');

$_build_editcategory_form = function($category_row = null) use ($params,$smarty)
{
    $mod = cms_utils::get_module(MOD_CGBLOG);
    global $id,$returnid;
    $smarty->assign('formstart',$mod->CGCreateFormStart($id,'admin_editcategory',$returnid,$params));
    $smarty->assign('formend',$mod->CreateFormEnd());
    $selected_id = cge_utils::get_param($category_row,'id',null);
    $category_list = cgblog_ops::get_category_list(TRUE);
    if( !is_array($category_list) ) $category_list = array('-1'=>$mod->Lang('none'));
    if( is_array($category_row) && isset($category_row['id']) ) $smarty->assign('category',$category_row);
    $smarty->assign('category_list',$category_list);
    echo $mod->ProcessTemplate('admin_editcategory.tpl');
};

try {
    switch( $sub ) {
    case 'add':
        if( isset($params['cancel']) ) {
            $this->RedirectToTab($id);
        }
        else if( isset($params['submit']) ) {
            try {
                $name = cge_utils::get_param($params,'name');
                $desc = cge_utils::get_param($params,'description');
                $parent_id = cge_utils::get_param($params,'parent_id',-1);

                cgblog_ops::add_category($name,$parent_id,$desc);
                $this->SetMessage($this->Lang('category_added'));
                $this->RedirectToTab($id);
            }
            catch( Exception $e ) {
                echo $this->ShowErrors($e->GetMessage());
            }
        }
        $_build_editcategory_form();
        break;

    case 'del':
        if( $cid < 1 ) throw new CmsException($mod->Lang('error_insufficient_params'));

        // check that this caegory is not a parent
        $query = 'SELECT id FROM '.cms_db_prefix().'module_cgblog_categories WHERE parent_id = ?';
        $tmp = $db->GetOne($query,array($cid));
        if( $tmp ) throw new CmsException($this->Lang('error_deleteparent'));

        // get category data.
        $query = 'SELECT * FROM '.cms_db_prefix().'module_cgblog_categories WHERE ID = ?';
        $rec = $db->GetRow($query,array($cid));
        if( !is_array($rec) ) throw new CmsException($this->Lang('error_notfound'));

        // delete the thing
        $query = 'DELETE FROM '.cms_db_prefix().'module_cgblog_blog_categories WHERE category_id = ?';
        $db->Execute($query,array($cid));
        $query = 'DELETE FROM '.cms_db_prefix().'module_cgblog_categories WHERE id = ?';
        $db->Execute($query,array($cid));

        // update sort orders.
        $query = 'UPDATE '.cms_db_prefix().'module_cgblog_categories SET item_order=item_order - 1 WHERE item_order > ? AND parent_id = ?';
        $db->Execute($query,array($rec['item_order'],$rec['parent_id']));

        // update hierarchy positions
        cgblog_ops::update_hierarchy_positions();

        $this->SetMessage($this->Lang('category_deleted'));
        $this->RedirectToTab($id);
        break;

    case 'edit':
        // need category id
        $query = 'SELECT * FROM '.cms_db_prefix().'module_cgblog_categories WHERE id = ?';
        $category = $db->GetRow($query,array($cid));

        if( isset($params['cancel']) ) {
            $this->RedirectToTab($id);
        }
        else if( isset($params['submit']) ) {
            $new_category = $category;
            $new_category['name'] = trim(cge_utils::get_param($params,'name'));
            $new_category['description'] = trim(cge_utils::get_param($params,'description'));
            $new_category['parent_id'] = (int)cge_utils::get_param($params,'parent_id');
            if( $new_category['parent_id'] != $category['parent_id'] ) $new_category['item_order'] = -1;
            cgblog_ops::save_category($new_category);
            $this->SetMessage($this->Lang('category_modified'));
            $this->RedirectToTab($id);
        }
        $_build_editcategory_form($category);
        break;

    case 'dflt':
        // need category id
        $this->SetPreference('default_category',$cid);
        $this->RedirectToTab($id);
        break;
    } // switch
}
catch( Exception $e ) {
    $this->SetError($e->GetMessage());
    $this->RedirectToTab($id);
}


?>
