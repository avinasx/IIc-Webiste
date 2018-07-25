<?php
namespace CGBlog;

class display_article
{
    private $_article;
    private $_meta = array();
    private $_inparams = array();
    private $_inid = 'm1_';

    public function __construct( article $article )
    {
        if( $article->id < 1 ) throw new \RuntimeException('Cannot create a display article for an article that is not yet saved');
        $this->_article = $article;
    }

    private function &mod()
    {
        return \cms_utils::get_module(MOD_CGBLOG);
    }

    private function _get_returnid()
    {
        if( !isset($this->_meta['returnid']) ) {
            $mod = $this->mod();
            $tmp = $mod->GetPreference('default_detailpage',-1);
            if( $tmp < 1 ) {
                $tmp = \cms_utils::get_current_pageid();
                if( $tmp < 1 ) $tmp = \ContentOperations::get_instance()->GetDefaultContent();
            }
            $this->_meta['returnid'] = $tmp;
        }
        return $this->_meta['returnid'];
    }

    private function _get_canonical()
    {
        if( !isset($this->_meta['canonical']) ) {
            $tmp = $this->url;
            if( $tmp == '' ) {
                $aliased_title = munge_string_to_url($this->title);
                $str = $this->mod()->GetPreference('urlprefix','cgblog');
                if( $this->mod()->GetPreference('default_detailpage',-1) > 0 ) {
                    $tmp = "$str/".$this->id."/{$aliased_title}";
                }
                else {
                    $tmp = "$str/".$this->id.'/'.$this->returnid."/{$aliased_title}";
                }
            }
            $canonical = $this->mod()->create_url($this->_inid,'detail',$this->returnid,$this->params,false,false,$tmp);
            $this->_meta['canonical'] = $canonical;
        }
        return $this->_meta['canonical'];
    }

    private function _get_params()
    {
        $params = $this->_inparams;
        $params['articleid'] = $this->id;
        return $params;
    }

    public function set_linkdata($id,$params,$returnid = '')
    {
        if( $id ) $this->_inid = $id;
        if( is_array($params) ) $this->_inparams = $params;
        if( $returnid != '' ) $this->_meta['returnid'] = $returnid;
    }

    public function __get( $key )
    {
        switch( $key ) {
        case 'file_location': // metadata
            $config = \cms_config::get_instance();
            return $config['uploads_url'].'/cgblog/id'.$this->id;

        case 'canonical': // metadata
            return $this->_get_canonical();

        case 'returnid': // metadata
            return $this->_get_returnid();

        case 'params': // metadata
            return $this->_get_params();

        default:
            try {
                return $this->_article->__get($key);
            }
            catch( \LogicException $e ) {
                throw new \LogicException("$key is not a gettable member of ".__CLASS__);
            }
            break;
        }
    }

    public function __isset( $key ) {
        switch( $key ) {
        case 'file_location':
        case 'canonical':
        case 'returnid':
        case 'params':
            return TRUE;
        default:
            return $this->_article->__isset( $key );
        }
    }
} // class