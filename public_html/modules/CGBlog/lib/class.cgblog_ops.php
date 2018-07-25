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

final class cgblog_ops
{
    protected function __construct() {}
    private static $_fielddefs;
    private static $_categories;
    private static $_category_tree;

    // internal... not for public use.
    public static function reset()
    {
        self::$_fielddefs = null;
        self::$_categories = null;
        self::$_category_tree = null;
    }

    /**
     * @internal
     */
    public static function update_hierarchy_positions()
    {
        $db = cmsms()->GetDb();

        $query = "SELECT id, item_order, name FROM ".cms_db_prefix()."module_cgblog_categories";
        $dbresult = $db->Execute($query);
        if( !$dbresult ) throw new CmsException('SQL Error: '.$db->sql.' -- '.$db->ErrorMsg());
        while ($dbresult && $row = $dbresult->FetchRow()) {
            $current_hierarchy_position = "";
            $current_long_name = "";
            $content_id = $row['id'];
            $current_parent_id = $row['id'];
            $count = 0;

            while ($current_parent_id > 0) {
                $query = "SELECT id, item_order, name, parent_id FROM ".cms_db_prefix()."module_cgblog_categories
                          WHERE id = ?";
                $row2 = $db->GetRow($query, array($current_parent_id));
                if ($row2) {
                    $current_hierarchy_position = str_pad($row2['item_order'], 5, '0', STR_PAD_LEFT) . "." . $current_hierarchy_position;
                    $current_long_name = $row2['name'] . ' | ' . $current_long_name;
                    $current_parent_id = $row2['parent_id'];
                    $count++;
                }
                else {
                    $current_parent_id = 0;
                }
            }

            if (strlen($current_hierarchy_position) > 0) {
                $current_hierarchy_position = substr($current_hierarchy_position, 0, strlen($current_hierarchy_position) - 1);
            }

            if (strlen($current_long_name) > 0) $current_long_name = substr($current_long_name, 0, strlen($current_long_name) - 3);

            $query = "UPDATE ".cms_db_prefix()."module_cgblog_categories SET hierarchy = ?, long_name = ? WHERE id = ?";
            $db->Execute($query, array($current_hierarchy_position, $current_long_name, $content_id));
        }
    }

    public static function get_fielddefs($byname = TRUE,$public = FALSE)
    {
        if( !is_array(self::$_fielddefs) ) {
            $db = cmsms()->GetDb();
            $query = 'SELECT * FROM '.cms_db_prefix().'module_cgblog_fielddefs ORDER BY item_order';
            self::$_fielddefs = $db->GetArray($query);
        }

        if( !is_array(self::$_fielddefs) ) return;

        $out = array();
        foreach( self::$_fielddefs as $row ) {
            if( $public && !$row['public'] ) continue;
            $row['attrs'] = unserialize($row['attrs']);
            if( $byname ) {
                $out[$row['name']] = $row;
            }
            else {
                $out[$row['id']] = $row;
            }
        }
        return $out;
    }

    /**
     * @ignore
     */
    private static function _add_category_to_tree(&$tree,$newrec,$depth = 0)
    {
        $newrec['depth'] = count(explode('.',$newrec['hierarchy'])) - 1;
        $parent_id = (int)$newrec['parent_id'];
        if( $parent_id < 1 && $depth == 0 ) {
            $tree[$newrec['id']] = $newrec;
            return true;
        }

        foreach( $tree as $id => &$rec ) {
            if( $id == $parent_id ) {
                if( !isset($rec['children']) ) $rec['children'] = array();
                $rec['children'][$newrec['id']] = $newrec;
                return true;
            }
            else if( isset($rec['children']) ) {
                $res = self::_add_category_to_tree($rec['children'],$newrec,$depth+1);
                if( $res ) return true;
            }
        }
        return false;
    }

    private static function _get_all_categories()
    {
        if( is_array(self::$_categories) ) return self::$_categories;

        self::$_categories = array();
        $db = cmsms()->GetDb();
        $query = 'SELECT * FROM '.cms_db_prefix().'module_cgblog_categories ORDER BY hierarchy';
        $allcats = $db->GetArray($query);
        if( is_array($allcats) && count($allcats) ) self::$_categories = $allcats;
        return $allcats;
    }

    public static function get_category_tree()
    {
        if( is_array(self::$_category_tree) ) return self::$_category_tree;

        $allcats = self::_get_all_categories();

        // convert the flat array into a tree structure.
        $out = array();
        foreach( $allcats as $cat ) {
            self::_add_category_to_tree($out,$cat);
        }

        self::$_category_tree = $out;
        return $out;
    }

    /**
     * Given a string try to find a category.
     *
     * Accepts strings of the form a / b / c to
     * attempt to find the category given its parent relationships
     * if a simple string is given, just do a linear search
     * through all categories to find the first match.
     *
     * @param string $input The input category name
     * @return array The category array.
     */
    public static function find_category($input)
    {
        if( !$input ) return;
        $parts = explode('|',$input);
        if( count($parts) == 1 ) {
            // simple linear search
            $name = $parts[0];
            $allcats = self::_get_all_categories();
            if( !is_array($allcats) || count($allcats) == 0 ) return;

            foreach( $allcats as $cat ) {
                if( $cat['name'] == $name ) return $cat;
            }
            // nothing found
        }
        else {

            $_find_node = function($list,$name) {
                foreach( $list as $rec ) {
                    if( $rec['name'] == $name ) return $rec;
                }
            };

            // search top down through the tree.
            $tree = self::get_category_tree();
            // start from the top.
            for( $i = 0; $i < count($parts); $i++ ) {
                $onepart = trim($parts[$i]);
                $last = ($i == count($parts) - 1) ? TRUE : FALSE;

                $node = $_find_node($tree,$onepart);
                if( $node ) {
                    // so far, so good if we have more parts
                    // and we have more parts
                    if( isset($node['children']) && !$last ) {
                        $tree = $node['children'];
                    }
                    else if( $last ) {
                        return $node;
                    }
                }
                else {
                    // one of the nodes in the path could not be found.
                    // total failure.
                    return;
                }
            }
        }
    }

    /**
     * Given an integer category id return the category record.
     *
     * @param int $id Category id
     * return array The category array
     */
    public static function get_category($id)
    {
        if( !is_numeric($id) ) return;
        $id = (int) $id;
        if( $id < 1 ) return;

        $allcats = self::_get_all_categories();
        if( is_array($allcats) && count($allcats) ) {
            foreach( $allcats as $cat ) {
                if( $id > 0 && $id == $cat['id'] ) return $cat;
                if( strlen($id) > 0 && $id == $cat['name'] ) return $cat;
            }
        }
    }

    public static function get_child_categories($id,$deep = FALSE)
    {
        if( !is_numeric($id) ) return;
        $id = (int)$id;
        if( $id < 1 ) return;

        $allcats = self::_get_all_categories();
        if( is_array($allcats) && count($allcats) ) {
            $out = array();
            $hier = null;
            foreach( $allcats as $cat ) {
                if( $id == $cat['id'] ) {
                    $hier = $cat['hierarchy'];
                    continue;
                }
                if( $hier ) {
                    $regexp = "/{$hier}\.[0-9]{5}/";
                    if( $deep ) $regexp = "/{$hier}\.[0-9\.]*/";

                    if( !preg_match($regexp, $cat['hierarchy']) ) continue;
                    $out[] = $cat['id'];
                }
            }
            if( count($out) ) return $out;
        }
    }

    /**
     * Given an array of category names (or paths) return an array of category ids
     *
     * @param string[] An array of category names or paths (paths separated by |)
     * @return int[]
     */
    public static function get_categories_from_names($categories,$children = TRUE)
    {
        if( is_string($categories) ) $categories = explode(',',$categories);
        if( !is_array($categories) ) $categories = array($categories);

        $tmp2 = array();
        foreach( $categories as $catname ) {
            $catname = trim($catname);
            if( is_numeric($catname) && (int) $catname > 0 ) {
                $tmp2[] = $catname;
                continue;
            }

            $cat = self::find_category($catname);
            if( !is_array($cat) ) continue;
            $tmp2[] = $cat['id'];
        }

        if( !count($tmp2) ) return; // get outa here... no matching categories.
        if( $children ) {
            // merge in the list of children
            $tmp3 = array();
            foreach( $tmp2 as $cat_id ) {
                $children = self::get_child_categories($cat_id);
                if( is_array($children) && count($children) ) $tmp3 = array_merge($tmp3,$children);
            }
            $tmp2 = array_merge($tmp2,$tmp3);
            $tmp2 = array_unique($tmp2);
        }
        return $tmp2;
    }

    public static function get_category_list($with_none = FALSE,$exclude = null,$full_records = FALSE)
    {
        $out = array();

        if( $with_none && !is_string($with_none) ) {
            $mod = cms_utils::get_module(MOD_CGBLOG);
            $with_none = $mod->Lang('none');
        }
        if( $with_none ) {
            $out[-1] = $with_none;
        }
        if( !is_array($exclude) ) $exclude = array($exclude);

        $allcats = self::_get_all_categories();
        if( is_array($allcats) && count($allcats) ) {
            // build an array of excluded hierarchy id's
            $exclude_hiers = array();
            foreach( $allcats as $cat ) {
                $id = (int)$cat['id'];
                if( is_array($exclude) && in_array($id,$exclude) ) $exclude_hiers[] = $cat['hierarchy'];
            }

            // build the output
            foreach( $allcats as $cat ) {
                $id = (int)$cat['id'];

                $fnd = false;
                foreach( $exclude_hiers as $excl ) {
                    if( startswith($cat['hierarchy'],$excl) ) {
                        $fnd = true;
                        break;
                    }
                }
                if( $fnd ) continue;

                $cat['depth'] = count(explode('.',$cat['hierarchy']));
                $out[$id] = $cat;
                if( !$full_records ) $out[$id] = str_repeat('&nbsp;&nbsp;',$cat['depth']).$cat['name'];
            }
            return $out;
        }
    }

    /**
     * @deprecated
     */
    public static function get_categories($by_name = FALSE,$as_list = FALSE)
    {
        stack_trace(); die('remove this method');
        if( !self::$_categories ) {
            $db = cmsms()->GetDb();
            $query = 'SELECT * FROM '.cms_db_prefix().'module_cgblog_categories ORDER BY sort_order';
            self::$_categories = $db->GetArray($query);
        }

        if( is_array(self::$_categories) && count(self::$_categories) ) {
            if( $by_name ) {
                if( !$as_list )	return cge_array::to_hash(self::$_categories,'name');

                $out = array();
                foreach( self::$_categories as $row ) {
                    $out[$row['name']] = $row['id'];
                }
                return $out;
            }
            else {
                if( !$as_list ) return cge_array::to_hash(self::$_categories,'id');

                $out = array();
                foreach( self::$_categories as $row ) {
                    $out[$row['id']] = $row['name'];
                }
                return $out;
            }
        }
    }

    public static function add_category($name,$parent_id = null,$description = null)
    {
        $name = trim($name);
        $parent_id = (int)$parent_id;
        $description = trim($description);

        $mod = cms_utils::get_module(MOD_CGBLOG);
        if( !$name ) throw new CmsException($mod->Lang('error_nocatname'));

        $db = cmsms()->GetDb();
        $query = 'SELECT id FROM '.cms_db_prefix().'module_cgblog_categories WHERE name = ? AND parent_id = ? LIMIT 1';
        $tmp = $db->GetOne($query,array($name,$parent_id));
        if( $tmp ) throw new CmsException($mod->Lang('category_name_exists'));

        $query = 'SELECT COALESCE(MAX(item_order),0)+1 FROM '.cms_db_prefix().'module_cgblog_categories WHERE parent_id = ?';
        $sort_order = (int) $db->GetOne($query,array($parent_id));

        $query = 'INSERT INTO '.cms_db_prefix().'module_cgblog_categories (name,parent_id,item_order,description) VALUES (?,?,?,?)';
        $db->Execute($query,array($name,$parent_id,$sort_order,$description));
        $new_id = $db->Insert_ID();

        if( $new_id < 1 ) throw new CmsException($mod->Lang('error_dberror'));
        self::update_hierarchy_positions();
        return $new_id;
    }

    public static function save_category($row)
    {
        if( !isset($row['id']) || (int)$row['id'] < 1 ) return self::add_category($row['name'],$row['parent_id'],$row['description']);

        $mod = cms_utils::get_module(MOD_CGBLOG);
        if( !$row['name'] ) throw new CmsException($mod->Lang('error_nocatname'));

        $db = cmsms()->GetDb();
        $query = 'SELECT id FROM '.cms_db_prefix().'module_cgblog_categories WHERE name = ? AND id != ? AND COALESCE(parent_id,-1) = ? LIMIT 1';
        $tmp = $db->GetOne($query,array($row['name'],$row['id'],$row['parent_id']));
        if( $tmp ) throw new CmsException($mod->Lang('category_name_exists'));

        if( $row['parent_id'] == 0 ) $row['parent_id'] = -1;

        $query = 'SELECT * FROM '.cms_db_prefix().'module_cgblog_categories WHERE id = ?';
        $old_row = $db->GetRow($query,array($row['id']));

        if( $old_row['parent_id'] != $row['parent_id'] ) {
            // update the old parent stuff
            $query = 'UPDATE '.cms_db_prefix().'module_cgblog_categories SET item_order = item_order - 1 WHERE item_order > ? AND parent_id = ?';
            $db->Execute($query,array((int)$old_row['item_order'], (int)$old_row['parent_id']));

            // get a new item order
            $query = 'SELECT COALESCE(MAX(item_order),0)+1 FROM '.cms_db_prefix().'module_cgblog_categories WHERE parent_id = ?';
            $sort_order = (int) $db->GetOne($query,array((int)$row['parent_id']));
            $row['item_order'] = $sort_order;
        }

        $query = 'UPDATE '.cms_db_prefix().'module_cgblog_categories SET name = ?, description = ?, parent_id = ?, item_order = ?
                  WHERE id = ?';
        $dbr = $db->Execute($query,array($row['name'],$row['description'],(int)$row['parent_id'],(int)$row['item_order'],(int)$row['id']));
        if( !$dbr ) die($db->sql.' -- '.$db->ErrorMsg());
        if( !$dbr ) throw new CmsException($mod->Lang('error_dberror'));

        self::update_hierarchy_positions();
    }
} // end of class
#
# EOF
#
?>