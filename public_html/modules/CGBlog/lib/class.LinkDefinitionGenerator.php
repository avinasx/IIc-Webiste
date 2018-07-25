<?php

namespace CGBlog;
use \CGExtensions\LinkDefinition AS BASE;

class LinkDefinitionGenerator implements BASE\LinkDefinitionGenerator
{
    private $_dataref;

    public function set_dataref(BASE\DataRef $dataref)
    {
        $this->_dataref = $dataref;
    }

    public function get_linkdefinition()
    {
        $dr = $this->_dataref;
        $mod = \cms_utils::get_module(MOD_CGBLOG);
        if( $dr->key1 != $mod->GetName() ) throw new \RuntimeException(__CLASS__.' Does not know how to handle the provided DataRef');

        $pageid = \cms_utils::get_current_pageid();
        if( $pageid < 1 ) $pageid = \ContentOperations::get_instance()->GetDefaultContent();
        $tmp = $mod->GetPreference('default_detailpage');
        if( $tmp > 0 ) $pageid = $tmp;

        $article = \cgblog_article::get_by_id($dr->key2);
        if( !is_object($article) ) throw new \RuntimeException('Could not load blog article with id '.$dr->key2);

        $linkdefn = new BASE\LinkDefinition();
        $linkdefn->href = $article->canonical;
        $linkdefn->text = $article->title;
        $linkdefn->id = $dr->key2;

        if( !cmsms()->is_frontend_request() ) {
            if( $mod->CheckPermission('Modify CGBlog') ) {
                $linkdefn->title = $mod->Lang('edit');
                $linkdefn->href = $mod->create_url('m1_','admin_editarticle','',array('articleid'=>$dr->key2));
            }
        }

        // for frontend actions we could link to the fesubmit stuff IF the user is the owner
        // AND we have a pageid...

        return $linkdefn;
    }
}

?>
