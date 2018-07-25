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
namespace CGBlog;

class article
{
    private $_rawdata = array();
    private $_add_data = null;

    protected function __construct() {}

    private function _getdata($key)
    {
        $res = null;
        if( isset($this->_rawdata[$key]) ) $res = $this->_rawdata[$key];
        return $res;
    }

    private function _get_useexp()
    {
        // useexp is defined if startdate and endd date are not null.
        return ( $this->start_time && $this->end_time );
    }

    public function set_field( \cgblog_field $field )
    {
        if( !isset($this->_rawdata['fieldsbyname']) ) $this->_rawdata['fieldsbyname'] = array();
        $name = $field->name;
        $this->_rawdata['fieldsbyname'][$name] = $field;
    }

    public function unset_field($name)
    {
        if( isset($this->_rawdata['fieldsbyname']) ) {
            if( isset($this->_rawdata['fieldsbyname'][$name]) ) unset($this->_rawdata['fieldsbyname'][$name]);
            if( count($this->_rawdata['fieldsbyname']) == 0 ) unset($this->_rawdata['fieldsbyname']);
        }
    }

    public function __get($key)
    {
        switch( $key ) {
        case 'id':
        case 'author':
        case 'title':
        case 'content':
        case 'summary':
        case 'postdate':
        case 'start_time':
        case 'end_time':
        case 'status':
        case 'extra':
        case 'url':
        case 'categories':
        case 'create_date': // readable, not writable
        case 'modified_date': // readable, not writable
            return $this->_getdata($key);

        case 'add_data':
            return $this->_add_data;

        case 'fields':
        case 'fieldsbyname':
            if( isset($this->_rawdata['fieldsbyname']) ) return $this->_rawdata['fieldsbyname'];
            break;

        case 'useexp':
            return $this->_get_useexp();

        case 'aliases':
            if( isset($this->_rawdata['fieldsbyname']) && is_array($this->_rawdata['fieldsbyname']) ) {
                $tmp = array();
                foreach( $this->_rawdata['fieldsbyname']  as $fname => &$obj ) {
                    if( !is_object($obj) ) continue;
                    $tmp[] = $obj->alias;
                }
                return $tmp;
            }
            return;

        default:
            if( isset($this->_rawdata['fieldsbyname']) && is_array($this->_rawdata['fieldsbyname']) ) {
                if( isset($this->_rawdata['fieldsbyname'][$key]) ) return $this->_rawdata['fieldsbyname'][$key]->value;
                foreach( $this->_rawdata['fieldsbyname']  as $fname => $obj ) {
                    if( !is_object($obj) ) continue;
                    if( $key == $obj->alias || $key == $obj->name ) return $obj->value;
                }
            }
            if( is_array($this->_add_data) && isset($this->_add_data[$key]) ) return $this->_add_data[$key];
            // do not throw an exception here.
        } // switch
    }

    public function __isset($key)
    {
        switch( $key ) {
        case 'id':
        case 'author':
        case 'title':
        case 'content':
        case 'summary':
        case 'postdate':
        case 'start_time':
        case 'end_time':
        case 'status':
        case 'extra':
        case 'url':
        case 'fieldsbyname':
        case 'categories':
            return isset($this->_rawdata[$key]);

        case 'fields': // deprecated
            return isset($this->_rawdata['fieldsbyname']);

        case 'create_date':
        case 'modified_date':
            if( $this->id ) return TRUE;
            break;

        case 'fields':
        case 'fieldsbyname':
            return TRUE;

        default:
            throw new \Exception("$key is not a valid member of ".__CLASS__);
        }

        return FALSE;
    }

    public function __set($key,$value)
    {
        switch( $key ) {
        case 'id':
            $this->_rawdata[$key] = (int) $value;
            break;

        case 'author':
        case 'title':
        case 'content':
        case 'summary':
        case 'extra':
        case 'url':
            $this->_rawdata[$key] = $value;
            break;

        case 'categories':
            if( is_array($value) ) {
                if( count($value) ) {
                    if( isset($value[0]['category_id']) && isset($value[0]['name']) ) $this->_rawdata[$key] = $value;
                }
                else {
                    // handle passing in empty array.
                    if( isset($this->_rawdata[$key]) ) unset($this->_rawdata[$key]);
                }
            }
            break;

        case 'status':
            $value = trim(strtolower($value));
            switch( $value ) {
            case 'published':
            case 'review':
            case 'draft':
                $this->_rawdata[$key] = $value;
            }
            break;

        case 'postdate':
        case 'start_time':
        case 'end_time':
            if( is_int($value) ) {
                $db = cmsms()->GetDb();
                $value = $db->DbTimeStamp($value);
            }
            $this->_rawdata[$key] = $value;
            break;

        default:
            if( !is_array( $this->_add_data) ) $this->_add_data = [];
            $this->_add_data[$key] = $value;
        }
    }

    public function is_displayable()
    {
        if( $this->status != 'published' ) return;

        return $this->has_valid_times();
    }

    public function has_valid_times()
    {
        $now = time();
        if( $this->start_time ) {
            $db = cmsms()->GetDb();
            $ts = $db->UnixTimeStamp( $this->start_time );
            if( $ts > $now ) return;
        }
        if( $this->end_time ) {
            $db = cmsms()->GetDb();
            $ts = $db->UnixTimeStamp( $this->end_time );
            if( $ts < $now ) return;
        }
        return TRUE;
    }

    public function fill_from_formparams($params,$handle_uploads = FALSE,$handle_deletes = FALSE)
    {
        $usexp = 0;
        foreach( $params as $key => $value ) {
            switch( $key ) {
            case 'articleid':
                $this->id = $value;
                break;

            case 'author':
            case 'title':
            case 'content':
            case 'summary':
            case 'start_time':
            case 'end_time':
            case 'extra':
            case 'url':
                $this->_rawdata[$key] = $value;
                break;

            case 'postdate_Month':
                $this->_rawdata['postdate'] = mktime($params['postdate_Hour'], $params['postdate_Minute'], 0,
                                                     $params['postdate_Month'], $params['postdate_Day'], $params['postdate_Year']);
                break;

            case 'startdate_Month':
                $this->_rawdata['start_time'] = mktime($params['startdate_Hour'], $params['startdate_Minute'], 0,
                                                       $params['startdate_Month'], $params['startdate_Day'], $params['startdate_Year']);
                break;

            case 'enddate_Month':
                $this->_rawdata['end_time'] = mktime($params['enddate_Hour'], $params['enddate_Minute'], 0,
                                                     $params['enddate_Month'], $params['enddate_Day'], $params['enddate_Year']);
                break;

            case 'useexp':
                // does nothing right now.
                $useexp = $value;
                break;

            case 'status':
                $value = strtolower($value);
                if( $value != 'published' && $value != 'review' ) $value = 'draft';
                $this->_rawdata['status'] = $value;
                break;
            }
        }

        $fielddefs = \cgblog_ops::get_fielddefs(FALSE);
        if( isset($params['customfield']) && is_array($params['customfield']) ) {
            foreach( $params['customfield'] as $fldid => $value ) {
                $value = trim($value);
                if( $value == '' ) continue;
                if( !isset($fielddefs[$fldid]) ) continue;

                // todo: do data validation
                $field = \cgblog_field::from_row($fielddefs[$fldid]);
                $field->value = $value;
                $this->set_field($field);
            }
        }
    }

    public static function &blank()
    {
        $ob = new self();
        return $ob;
    }

    public static function from_row( array $row )
    {
        $article = new self;
        foreach( $row as $key => $value ) {
            switch( $key ) {
            case 'cgblog_id':
                $article->_rawdata['id'] = $value;
                break;

            case 'cgblog_title':
                $article->_rawdata['title'] = $value;
                break;

            case 'cgblog_data':
                $article->_rawdata['content'] = $value;
                break;

            case 'cgblog_date':
                $article->_rawdata['postdate'] = $value;
                break;

            case 'status':
            case 'summary':
            case 'start_time':
            case 'end_time':
            case 'author':
            case 'url':
            case 'create_date':
            case 'modified_date':
                $article->_rawdata[$key] = $value;
                break;

            case 'cgblog_extra':
                $article->_rawdata['extra'] = $value;
                break;

            case 'add_data':
                $article->_add_data = unserialize( $value );
                break;

            case 'raw_fields':
                if( is_array($value) && count($value) ) {
                    foreach( $value as $frow ) {
                        $field = \cgblog_field::from_row( $frow );
                        if( is_object($field) ) $article->set_field( $field );
                    }
                }
                break;

            case 'raw_categories':
                if( is_array($value) && count($value) ) $article->_rawdata['categories'] = $value;
                break;
            }
        }
        return $article;
    }

    public function to_data()
    {
        $arr = [];
        $arr['cgblog_id'] = $this->id;
        $arr['cgblog_title'] = $this->title;
        $arr['cgblog_data'] = $this->content;
        $arr['cgblog_date'] = $this->postdate;
        $arr['status'] = $this->status;
        $arr['summary'] = $this->summary;
        $arr['start_time'] = $this->start_time;
        $arr['end_time'] = $this->end_time;
        $arr['author'] = $this->author;
        $arr['url'] = $this->url;
        $arr['create_date'] = $this->create_date;
        $arr['modified_date'] = $this->modified_date;
        $arr['cgblog_extra'] = $this->extra;
        $arr['add_data'] = ( is_array( $this->_add_data) ) ? serialize( $this->_add_data ) : null;
        $arr['raw_fields'] = null;
        if( count($this->fields) ) {
            foreach( $this->fields as $field_obj ) {
                $arr['raw_fields'][] = $field_obj->to_row();
            }
        }
        $arr['raw_categories'] = $this->_rawdata['categories'];
        return $arr;
    }

} // end of class

#
# EOF
#
