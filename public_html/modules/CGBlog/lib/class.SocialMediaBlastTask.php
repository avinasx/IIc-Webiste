<?php
namespace CGBlog;

class SocialMediaBlastTask implements \CmsRegularTask
{
    const PREF_LASTRUN = 'blast_lastrun';
    protected $storage;

    public function __construct()
    {
        $this->storage = new article_storage( cmsms()->GetDb() );
    }

    public function get_name()
    {
        return get_class();
    }

    public function get_description()
    {
        return get_class();
    }

    private function get_blast_articles( $since )
    {
        $since = max($since, time() - 24 * 3600);

        // get articles that are published, modified since $since, and have not been blasted.
        $sql = 'SELECT cgblog_id FROM '.CMS_DB_PREFIX.'module_cgblog WHERE status = ? AND modified_date > ?';
        $db = cmsms()->GetDb();
        $since_dbts = trim($db->DbTimeStamp( $since ), "'");
        $col = $db->GetCol( $sql, [ 'published', $since_dbts ] );
        if( !$col ) return;

        $list = $this->storage->load_list( $col );
        if( !$list ) return;

        $out = null;
        foreach( $list as $obj ) {
            if( !$obj->blasted ) $out[] = $obj;
        }
        return $out;
    }

    public function test( $time = '' )
    {
        if( !$time ) $time = time();
        if( !\cgblog_utils::can_blast() ) return FALSE;
        $mod = \cms_utils::get_module('CGBlog'); // don't use define.
        $lastrun = (int) $mod->GetPreference(self::PREF_LASTRUN);
        //if( $time - $lastrun < 3600 ) return FALSE; // run at most once per hour.

        // get articles that are published, and modified since last run or 24 hours, whichever is greater.
        $articles = $this->get_blast_articles( $lastrun );
        if( !count($articles) ) return FALSe;
        return TRUE;
    }

    protected function to_blast( display_article $article )
    {
        $obj = new \sb_content;
        $obj->title = $article->title;
        $obj->summary = $article->summary;
        $obj->canonical = $article->canonical;
        // todo: find an image to use
        return $obj;
    }

    public function execute($time = '')
    {
        if( !$time ) $time = time();
        $mod = \cms_utils::get_module('CGBlog'); // don't use define.
        $lastrun = (int) $mod->GetPreference(self::PREF_LASTRUN);
        $articles = $this->get_blast_articles( $lastrun );
        if( !count($articles) ) return FALSE;

        $cgsb = \cms_utils::get_module('CGSocialBlaster');
        foreach( $articles as $article ) {
            $disp_article = new display_article( $article );
            $blast = $this->to_blast( $disp_article );
            \sb_utils::send_blast( $blast );
            $article->blasted = true;
            $this->storage->save( $article );
        }
        return TRUE;
    }

    public function on_success($time = '')
    {
        if( !$time ) $time = time();
        $mod = \cms_utils::get_module('CGBlog'); // don't use define.
        $mod->SetPreference(self::PREF_LASTRUN,$time);
    }

    public function on_failure($time = '')
    {
        if( !$time ) $time = time();
    }
} // class