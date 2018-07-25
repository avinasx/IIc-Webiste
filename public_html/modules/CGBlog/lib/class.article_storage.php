<?php
namespace CGBlog;

class article_storage
{
    private $_db;

    public function __construct( \CMSMS\Database\Connection $db )
    {
        $this->_db = $db;
    }

    public function __wakeup()
    {
        $this->_db = cmsms()->GetDb();
    }

    public function get_latest( $canviewdraft = false )
    {
        $db = $this->_db;
        $now = $db->DbTimeStamp(time());
        $query = 'SELECT mn.* FROM '.cms_db_prefix().'module_cgblog mn WHERE';
        $qparms = array();
        if( !$canviewdraft ) {
            $query .= ' status = ? AND ';
            $qparms[] = 'published';
        }
        $query .= " (".$db->IfNull('start_time',$db->DBTimeStamp(1))." < $now) AND ";
        $query .= "((".$db->IfNull('end_time',$db->DBTimeStamp(1))." = ".$db->DBTimeStamp(1).") OR (end_time > $now)) ";
        $query .= 'ORDER BY end_time,start_time DESC LIMIT 1';
        $row = $db->GetRow($query,$qparms);
        if( !is_array($row) ) return;
        $article_id = $row['id'];

        // get fields.
        $qparms = array($article_id);
        $query = 'SELECT A.value,B.id,B.name,B.type FROM '.cms_db_prefix().'module_cgblog_fieldvals A, '.cms_db_prefix().'module_cgblog_fielddefs B
              WHERE A.fielddef_id = B.id AND A.cgblog_id = ?';
        $query .= ' ORDER BY B.item_order';

        $tmp = $db->GetArray($query,$qparms);
        if( is_array($tmp) && count($tmp) ) $row['raw_fields'] = $tmp;

        // get categories
        $query = 'SELECT A.category_id,B.name FROM '.cms_db_prefix().'module_cgblog_blog_categories A
              LEFT JOIN '.cms_db_prefix().'module_cgblog_categories B ON A.category_id = B.id WHERE A.blog_id = ?';
        $tmp = $db->GetArray($query, [ $article_id ]);
        if( is_array($tmp) ) $row['raw_categories'] = $tmp;

        return article::from_row( $row );
    }

    public function get_by_id( $article_id )
    {
        $db = $this->_db;
        $query = "SELECT mn.* FROM ".cms_db_prefix()."module_cgblog mn WHERE cgblog_id = ?";
        $row = $db->GetRow($query, [ (int) $article_id ]);
        if( !is_array($row) ) return;

        // get fields.
        $qparms = array($article_id);
        $query = 'SELECT A.value,B.id,B.name,B.type FROM '.cms_db_prefix().'module_cgblog_fieldvals A, '.cms_db_prefix().'module_cgblog_fielddefs B
              WHERE A.fielddef_id = B.id AND A.cgblog_id = ?';
        $query .= ' ORDER BY B.item_order';

        $tmp = $db->GetArray($query,$qparms);
        if( is_array($tmp) && count($tmp) ) $row['raw_fields'] = $tmp;

        // get categories
        $query = 'SELECT A.category_id,B.name FROM '.cms_db_prefix().'module_cgblog_blog_categories A
              LEFT JOIN '.cms_db_prefix().'module_cgblog_categories B ON A.category_id = B.id WHERE A.blog_id = ?';
        $tmp = $db->GetArray($query, [ $article_id ]);
        if( is_array($tmp) ) $row['raw_categories'] = $tmp;

        return article::from_row( $row );
    }

    public function load_list( array $article_ids )
    {
        $extract_fields = function( $article_id, array $raw_fields ) {
            $out = null;
            foreach( $raw_fields as $frow ) {
                if( $frow['cgblog_id'] < $article_id ) continue;
                if( $frow['cgblog_id'] > $article_id ) break;;
                $out[] = $frow;
            }
            return $out;
        };

        $extract_categories = function( $article_id, array $raw_categories ) {
            $out = null;
            foreach( $raw_categories as $frow ) {
                if( $frow['blog_id'] < $article_id ) continue;
                if( $frow['blog_id'] > $article_id ) break;;
                $out[] = $frow;
            }
            return $out;
        };

        if( !count($article_ids) ) {
            debug_to_log('no article ids', __METHOD__ );
        }

        $db = $this->_db;
        $idstr = implode(',',$article_ids);
        $sql = 'SELECT * FROM '.CMS_DB_PREFIX."module_cgblog WHERE cgblog_id IN ($idstr)";
        $raw_articles = $db->GetArray( $sql );

        // get fields
        $sql = 'SELECT * FROM '.CMS_DB_PREFIX."module_cgblog_fieldvals WHERE cgblog_id IN ($idstr) ORDER BY cgblog_id, fielddef_id";
        $raw_fields = $db->GetArray( $sql );

        // get categories
        $sql = 'SELECT * FROM '.CMS_DB_PREFIX."module_cgblog_blog_categories WHERE blog_id IN ($idstr) ORDER BY blog_id";
        $raw_categories = $db->GetArray( $sql );

        $out = null;
        foreach( $raw_articles as $row ) {
            if( $raw_fields ) $row['raw_fields'] = $extract_fields( $row['cgblog_id'], $raw_fields );
            if( $raw_categories ) $row['raw_categories'] = $extract_categories( $row['cgblog_id'], $raw_categories );
            $out[] = article::from_row( $row );
        }
        return $out;
    }

    protected function _save_fields( article $article )
    {
        $db = $this->_db;
        $fielddefs = \cgblog_ops::get_fielddefs();
        if( !count($fielddefs) ) return;

        // delete field data
        $sql = 'DELETE FROM '.cms_db_prefix().'module_cgblog_fieldvals WHERE cgblog_id = ?';
        $db->Execute( $sql, [ $article->id ] );

        $sql = "INSERT INTO ".cms_db_prefix()."module_cgblog_fieldvals (cgblog_id,fielddef_id,value,create_date,modified_date) VALUES (?,?,?,NOW(),NOW())";
        $fields = $article->fields;
        if( count($fields) ) {
            foreach( $fields as $field ) {
            	if( !isset($fielddefs[$field->name]) ) continue;
            	$fielddef_id = $fielddefs[$field->name]['id'];
                $db->Execute( $sql, [ $article->id, $fielddef_id, $field->value ]);
            }
        }
    }

    protected function _save_categories( article $article )
    {
        $db = $this->_db;
        $sql = 'DELETE FROM '.CMS_DB_PREFIX.'module_cgblog_blog_categories WHERE blog_id = ?';
        $db->Execute( $sql, [ $article->id ] );

        if( count( $article->categories ) ) {
            $sql = 'INSERT INTO '.cms_db_prefix().'module_cgblog_blog_categories (blog_id,category_id) VALUES (?,?)';
            foreach( $article->categories as $row ) {
                $db->Execute( $sql, [ $article->id, $row['category_id'] ] );
            }
        }
    }

    protected function _insert( article $article )
    {
        $db = $this->_db;
        $articleid = (int) $db->GenID(cms_db_prefix().'module_cgblog_seq');
        $sql = 'INSERT INTO '.cms_db_prefix().'module_cgblog (cgblog_id, cgblog_title, cgblog_data, summary, status,
                cgblog_date, start_time, end_time, author, cgblog_extra, url, add_data, create_date, modified_date)
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,NOW(),NOW())';
        $post_date = trim($db->DbTimeStamp($article->postdate), "'");
        $start_time = trim($db->DbTimeStamp($article->start_time), "'");
        $end_time = trim($db->DbTimeStamp($article->end_time), "'");
        if( !$article->usexp ) {
            $start_time = $post_date;
            $end_time = null;
        }

        $row = $article->to_data();
        $db->Execute( $sql, [ $articleid, $article->title, $article->content, $article->summary, $article->status,
                              $post_date, $start_time, $end_time, $article->author, $article->extra, $article->url, $row['add_data']
                          ] );

        $article->id = $articleid; // modifies the object
        // do not adjust article object create date and modified date... always get from database.
        // so this object is out of sync right now.
        $this->_save_fields( $article );
        $this->_save_categories( $article );
        return $article;
    }

    protected function _update( article $article )
    {
        $db = $this->_db;
        $sql = 'UPDATE '.CMS_DB_PREFIX.'module_cgblog
                SET cgblog_title = ?, cgblog_data = ?, summary = ?, status = ?,
                    cgblog_date = ?, start_time = ?, end_time = ?,
                    author = ?, cgblog_extra = ?, url = ?, add_data = ?, modified_date = NOW() WHERE cgblog_id = ?';
        $post_date = trim($db->DbTimeStamp($article->postdate), "'");
        $start_time = trim($db->DbTimeStamp($article->start_time), "'");
        $end_time = trim($db->DbTimeStamp($article->end_time), "'");
        if( !$article->usexp ) {
            $start_time = $post_date;
            $end_time = null;
        }

        $row = $article->to_data();
        $db->Execute( $sql, [ $article->title, $article->content, $article->summary, $article->status,
                              $post_date, $start_time, $end_time,
                              $article->author, $article->extra, $article->url, $row['add_data'],
                              $article->id ] );
        // do not adjust article object create date and modified date... always get from database.
        // so this object is out of sync right now.
        return $article;
    }

    public function save( article $article )
    {
        if( $article->id < 1 ) {
            return $this->_insert( $artcile );
        } else {
            return $this->_update( $article );
        }
    }
} // class
