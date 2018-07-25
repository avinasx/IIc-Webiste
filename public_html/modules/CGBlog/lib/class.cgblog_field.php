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

class cgblog_field
{
    private $_data = array();

    public function __get($key)
    {
        switch( $key ) {
        case 'alias':
            //return strtolower(str_replace(' ','_',$this->name));
            return str_replace('-','_',munge_string_to_url($this->name));

        case 'id':
        case 'name':
        case 'type':
        case 'max_length':
        case 'create_date':
        case 'modified_date':
        case 'item_order':
        case 'public':
        case 'value':
            if( isset($this->_data[$key]) ) return $this->_data[$key];
            break;

        case 'fielddef_id':
            return $this->_data['id'];
        }
    }

    public function __isset($key)
    {
        switch( $key ) {
        case 'alias':
        case 'id':
        case 'name':
        case 'type':
        case 'max_length':
        case 'create_date':
        case 'modified_date':
        case 'item_order':
        case 'public':
        case 'value':
            return TRUE;
        default:
            return FALSE;
        }
    }

    public function __set($key,$value)
    {
        switch( $key ) {
        case 'id':
        case 'name':
        case 'type':
        case 'max_length':
        case 'item_order':
        case 'public':
        case 'value':
        case 'attrs':
            $this->_data[$key] = $value;
            break;

        case 'alias':
            throw new Exception('Attempt to set invalid data into field object: '.$key);
            break;

        case 'create_date':
        case 'modified_date':
            break;

        default:
            throw new Exception('Attempt to set invalid data into field object: '.$key);
        }
    }

    public static function &from_row(array $row)
    {
        $res = null;
        if( !isset($row['id']) ) return $res;

        $res = new self();
        foreach( $row as $key => $value ) {
            switch( $key ) {
            case 'id':
            case 'name':
            case 'type':
            case 'item_order':
            case 'public':
            case 'attrs':
            case 'value':
            case 'create_date':
            case 'modified_date':
                $res->$key = $value;
                break;
            }
        }

        return $res;
    }

    public function to_row()
    {
        $out = [];
        $out['id'] = $this->id;
        $out['name'] = $this->name;
        $out['type'] = $this->type;
        $out['item_order'] = $this->item_order;
        $out['public'] = $this->public;
        $out['attrs'] = $this->attrs;
        $out['value'] = $this->value;
        $out['create_date'] = $this->create_date;
        $out['modified_date'] = $this->modified_date;
        return $out;
    }
} // end of class

#
# EOF
#
