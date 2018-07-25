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

final class CGBlog extends CGExtensions
{
    protected $articleStorage;

    public function GetName() { return 'CGBlog'; }
    public function IsPluginModule() { return true; }
    public function HasAdmin() { return true; }
    public function LazyLoadAdmin() { return TRUE; }
    public function GetVersion() { return '1.15.7'; }
    public function MinimumCMSVersion() { return '2.2.2'; }
    public function GetAdminDescription() { return $this->Lang('description'); }
    public function GetAdminSection() { return 'content'; }
    public function AllowAutoInstall() { return FALSE; }
    public function AllowAutoUpgrade() { return FALSE; }
    public function InstallPostMessage() { return $this->Lang('postinstall'); }
    public function GetAuthor() { return 'Robert Campbell'; }
    public function GetAuthorEmail() { return 'calguy1000@cmsmadesimple.org'; }
    public function GetChangeLog() { return file_get_contents(__DIR__.'/changelog.inc'); }
    public function GetEventDescription( $eventname ) { return $this->lang('eventdesc-' . $eventname); }
    public function GetEventHelp( $eventname ) { return $this->lang('eventhelp-' . $eventname); }

    public function GetDependencies() {
        return array('CGExtensions'=>'1.53.6','CGSimpleSmarty'=>'1.9','JQueryTools'=>'1.3.8');
    }

    public function UninstallPreMessage() { return $this->Lang('really_uninstall'); }

    public function __construct()
    {
        parent::__construct();

        $gCms = \CmsApp::get_instance();
        $smarty = $gCms->GetSmarty();
        if( !$smarty ) return;

        $this->RegisterModulePlugin();
        $this->articleStorage = new \CGBlog\article_storage( $gCms->GetDb() );

        {
            // making this stuff into static routes would allow lazy loading the CGBlog module
            // and save exactly one query
            $db = cmsms()->GetDb();
            $qparms = array('');
            $query = 'SELECT cgblog_id,url FROM '.cms_db_prefix().'module_cgblog WHERE url != ?';
            if( !isset($CMS_ADMIN_PAGE) ) {
                // for non admin requests we only need to register routes to published articles.
                $query .= ' AND status = ?';
                $qparms[] = 'published';
            }
            $query .= ' AND COALESCE(start_time,@CG_ZEROTIME) < NOW()';
            $query .= ' AND COALESCE(end_time,@CG_FUTURETIME) > NOW()';
            $query .= ' ORDER BY cgblog_date DESC';

            $tmp = $db->GetArray($query,$qparms);
            if( is_array($tmp) ) {
                $detailpage = $this->GetPreference('default_detailpage',-1);
                if( $detailpage == -1 ) {
                    $contentops = cmsms()->GetContentOperations();
                    $detailpage = $contentops->GetDefaultContent();
                }
                foreach( $tmp as $one ) {
                    $parms = array('action'=>'detail','returnid'=>$detailpage,'articleid'=>$one['cgblog_id']);
                    $route = new CmsRoute($one['url'],$this->GetName(),$parms,TRUE);
                    cms_route_manager::register($route);
                }
            }
        }
    }

    public function GetFriendlyName()
    {
        $tmp = $this->GetPreference('friendlyname');
        if( !$tmp ) $tmp = $this->Lang('friendlyname');
        return $tmp;
    }

    public function InitializeFrontend()
    {
        $this->RestrictUnknownParams();

        $contentops = cmsms()->GetContentOperations();
        $summarypage = $this->GetPreference('default_summarypage',-1);
        if( $summarypage == -1 ) $summarypage = $contentops->GetDefaultPageID();
        $detailpage = $this->GetPreference('default_detailpage',-1);
        if( $detailpage == -1 ) $detailpage = $contentops->GetDefaultPageID();

        $str = '[cC][Gg][Bb]log';
        $str = $this->CGGetPreference('urlprefix',$str);
        $this->RegisterRoute('/'.$str.'\/archive\/(?P<year>[0-9]+)\/(?P<month>[0-9]+)\/(?P<returnid>[0-9]+)$/', array('action'=>'default'));
        $this->RegisterRoute('/'.$str.'\/archive\/(?P<year>[0-9]+)\/(?P<month>[0-9]+)$/', array('action'=>'default','returnid'=>$summarypage));
        $this->RegisterRoute('/'.$str.'\/(?P<articleid>[0-9]+)\/(?P<returnid>[0-9]+)\/(?P<junk>.*?)$/',
                             array('action'=>'detail'));
        $this->RegisterRoute('/'.$str.'\/(?P<articleid>[0-9]+)\/(?P<returnid>[0-9]+)$/', array('action'=>'detail'));
        $this->RegisterRoute('/'.$str.'\/(?P<articleid>[0-9]+)\/(?P<junk>.*?)$/', array('action'=>'detail','returnid'=>$detailpage));
        $this->RegisterRoute('/'.$str.'\/(?P<articleid>[0-9]+)$/', array('action'=>'detail','returnid'=>$detailpage));
        $this->RegisterRoute('/'.$str.'\/category\/(?P<category_id>[0-9]+)\/(?P<returnid>[0-9]+)\/(?P<junk>.*?)$/',
                             array('action'=>'default'));
        $this->RegisterRoute('/'.$str.'\/category\/(?P<category_id>[0-9]+)\/(?P<junk>.*?)$/', array('action'=>'default','returnid'=>$summarypage));

        $this->SetParameterType('year',CLEAN_INT);
        $this->SetParameterType('month',CLEAN_INT);
        $this->SetParameterType('showdraft',CLEAN_INT);
        $this->SetParameterType('searchexpired',CLEAN_INT);
        $this->SetParameterType('pagelimit',CLEAN_INT);
        $this->SetParameterType('browsecat',CLEAN_INT);
        $this->SetParameterType('showall',CLEAN_INT);
        $this->SetParameterType('showarchive',CLEAN_INT);
        $this->SetParameterType('sortasc',CLEAN_STRING); // should be int, or boolean
        $this->SetParameterType('sortby',CLEAN_STRING);
        $this->SetParameterType('detailpage',CLEAN_STRING);
        $this->SetParameterType('detailtemplate',CLEAN_STRING);
        $this->SetParameterType('browsecattemplate',CLEAN_STRING);
        $this->SetParameterType('fesubmittemplate',CLEAN_STRING);
        $this->SetParameterType('felisttemplate',CLEAN_STRING);
        $this->SetParameterType('archivetemplate',CLEAN_STRING);
        $this->SetParameterType('summarypage',CLEAN_STRING);
        $this->SetParameterType('summarytemplate',CLEAN_STRING);
        $this->SetParameterType('category',CLEAN_STRING);
        $this->SetParameterType('notcategory',CLEAN_STRING);
        $this->SetParameterType('category_id',CLEAN_STRING);
        $this->SetParameterType('number',CLEAN_INT);
        $this->SetParameterType('start',CLEAN_INT);
        $this->SetParameterType('pagenumber',CLEAN_INT);
        $this->SetParameterType('articleid',CLEAN_INT);
        $this->SetParameterType('origid',CLEAN_INT);
        $this->SetParameterType('returid',CLEAN_INT);
        $this->SetParameterType('showtemplate',CLEAN_STRING);
        $this->SetParameterType('assign',CLEAN_STRING);
        $this->SetParameterType('inline',CLEAN_STRING);
        $this->SetParameterType('uglyurls',CLEAN_INT);
        $this->SetParameterType('preview',CLEAN_INT);
        $this->SetParameterType('fesubmitpage',CLEAN_STRING);
        $this->SetParameterType('author',CLEAN_STRING);
        $this->SetParameterType('admin_user',CLEAN_STRING);
        $this->SetParameterType(CLEAN_REGEXP.'/cgblog_.*/',CLEAN_STRING);
        $this->SetParameterType('junk',CLEAN_STRING);
        $this->SetParameterType('title',CLEAN_STRING);
        $this->SetParameterType('nochildren',CLEAN_INT);

        $smarty = cmsms()->GetSmarty();
        $smarty->register_function('cgblog_relative_article','cgblog_smarty_plugins::relative_article');
    }

    public function InitializeAdmin()
    {
        $this->CreateParameter('year','',$this->Lang('help_year'));
        $this->CreateParameter('month','',$this->Lang('help_month'));
        $this->CreateParameter('pagelimit', 100000, $this->Lang('help_pagelimit'));
        $this->CreateParameter('showdraft',0,$this->Lang('helpshowdraft'));
        $this->CreateParameter('searchexpired',0,$this->Lang('help_searchexpired'));
        $this->CreateParameter('showall', 0, $this->Lang('helpshowall'));
        $this->CreateParameter('showarchive', 0, $this->Lang('helpshowarchive'));
        $this->CreateParameter('sortasc', 'true', $this->Lang('helpsortasc'));
        $this->CreateParameter('sortby', 'cgblog_date', $this->Lang('helpsortby'));
        $this->CreateParameter('detailpage', 'pagealias', $this->Lang('helpdetailpage'));
        $this->CreateParameter('detailtemplate', '', $this->Lang('helpdetailtemplate'));
        $this->CreateParameter('summarypage', '', $this->Lang('helpsummarypage'));
        $this->CreateParameter('summarytemplate', '', $this->Lang('helpsummarytemplate'));
        $this->CreateParameter('browsecattemplate', '', $this->Lang('helpbrowsecattemplate'));
        $this->CreateParameter('felisttemplate', '', $this->Lang('helpfelisttemplate'));
        $this->CreateParameter('fesubmittemplate', '', $this->Lang('helpfesubmittemplate'));
        $this->CreateParameter('archivetemplate', '', $this->Lang('helparchivetemplate'));
        $this->CreateParameter('category', '', $this->Lang('helpcategory'));
        $this->CreateParameter('notcategory', '', $this->Lang('helpnotcategory'));
        $this->CreateParameter('number', 100000, $this->Lang('helpnumber'));
        $this->CreateParameter('start', 0, $this->Lang('helpstart'));
        $this->CreateParameter('action','default',$this->Lang('helpaction'));
        $this->CreateParameter('articleid','',$this->Lang('help_articleid'));
        $this->CreateParameter('uglyurls',0,$this->Lang('helpuglyurls'));
        $this->CreateParameter('inline','false',$this->Lang('help_inline'));
        $this->CreateParameter('fesubmitpage','',$this->Lang('help_fesubmitpage'));
        $this->CreateParameter('author','',$this->Lang('help_userparam'));
        $this->CreateParameter('admin_user','',$this->Lang('help_adminuser'));
        $this->CreateParameter('title','',$this->Lang('help_title'));
        $this->CreateParameter('nochildren',0,$this->Lang('help_nochildren'));
    }

    public function VisibleToAdminUser()
    {
        return $this->CheckPermission('Modify CGBlog') || $this->CheckPermission('Modify Site Preferences') ||
            $this->CheckPermission('Modify Templates') || $this->CheckPermission('Approve CGBlog') ||
            $this->CheckPermission('Manage CGBlog Categories');
    }

    function SearchResultWithParams($returnid, $articleid, $attr = '', $params = '')
    {
        $gCms = cmsms();
        $result = array();

        if ($attr == 'cgblog') {
            $db = $this->GetDb();
            $q = "SELECT cgblog_id,cgblog_title,url FROM ".cms_db_prefix()."module_cgblog WHERE cgblog_id = ? AND status = ? ";
            $q .= ' AND ( (COALESCE(start_time,@CG_ZEROTIME) = @CG_ZEROTIME) OR (start_time < NOW()) )';
            if( (isset($params['searchexpired']) && (int)$params['searchexpired'] == 1) || $this->GetPreference('expired_searchable',1) == 1 ) {
                // nothing here.
            }
            else {
                // make sure we don't return expired articles.
                // if we don't want em to.
                $now = $db->DbTimeStamp(time());
                $q .= ' AND ( (COALESCE(end_time,@CG_ZEROTIME) = @CG_ZEROTIME) OR (end_time > NOW()) )';
            }
            $row = $db->GetRow( $q, [ (int)$articleid, 'published' ] );

            if ($row) {
                //0 position is the prefix displayed in the list results.
                $result[0] = $this->GetFriendlyName();

                //1 position is the title
                $result[1] = $row['cgblog_title'];

                //2 position is the URL to the title.
                $detailpage = cgblog_utils::get_detailpage($returnid,$params);
                $prettyurl = $row['url'];
                if( $prettyurl == '' ) {
                    $aliased_title = munge_string_to_url($row['cgblog_title']);
                    if( $this->GetPreference('default_detailpage',-1) != -1 && !isset($params['detailpage']) ) {
                        $prettyurl = $this->GetPreference('urlprefix','cgblog').'/'.$row['cgblog_id']."/$aliased_title";
                    }
                    else {
                        $prettyurl = $this->GetPreference('urlprefix','cgblog').'/'.$row['cgblog_id'].'/'.$detailpage."/$aliased_title";
                    }
                }

                $result[2] = $this->CreateLink('cntnt01', 'detail', $detailpage, '', array('articleid' => $articleid) ,'', true, false, '', true, $prettyurl);
            }
        }
        return $result;
    }

    function SearchReindex(&$module)
    {
        $db = $this->GetDb();
        $query = 'SELECT * FROM '.cms_db_prefix()."module_cgblog WHERE status = 'published'";
        if( $this->GetPreference('expired_searchable',1) == 0 ) {
            // make sure we don't return expired articles.
            // if we don't want em to.
            $now = $db->DbTimeStamp(time());
            $query .= ' AND ( (COALESCE(end_time,@CG_ZEROTIME) = @CG_ZEROTIME) OR (end_time > NOW()) )';
        }
        $query .= ' ORDER BY cgblog_date';
        $result = &$db->Execute($query);
        while ($result && !$result->EOF) {
            $text = $result->fields['cgblog_data'] . ' ' . $result->fields['summary'] . ' ' . $result->fields['cgblog_title'] . ' ' . $result->fields['cgblog_title'];

            $fq = 'SELECT fd.id,fd.name,fd.type,fv.cgblog_id,fv.value FROM '.cms_db_prefix().'module_cgblog_fielddefs AS fd
             LEFT JOIN '.cms_db_prefix().'module_cgblog_fieldvals AS fv
             ON fd.id = fv.fielddef_id
             WHERE fd.public = 1 AND fv.cgblog_id = ?';
            $fields = $db->GetArray($fq,array($result->fields['cgblog_id']));
            if( $fields ) {
                foreach ( $fields as $one ) {
                    if( strlen($one['value']) <= 1 ) continue;
                    $text .= ' '.$one['value'];
                }
            }

            $module->AddWords($this->GetName(),
                              $result->fields['cgblog_id'], 'cgblog',
                              $text,
                              ($result->fields['end_time'] != NULL && $this->GetPreference('expired_searchable',1) == 0) ?  $db->UnixTimeStamp($result->fields['end_time']) : NULL);
            $result->MoveNext();
        }
        if( $result ) $result->Close();
    }

    public function get_field_types()
    {
        $items = array('textbox'=>$this->Lang('textbox'),
                       'checkbox'=>$this->Lang('checkbox'),
                       'textarea'=>$this->Lang('textarea'),
                       'file'=>$this->Lang('file_upload'),
                       'image'=>$this->Lang('image_upload'),
                       'file_select'=>$this->Lang('file'),
                       'image_select'=>$this->Lang('image'));
        return $items;
    }

    /**
     * @deprecated
     */
    function GetTypesDropdown( $id, $name, $selected = '' )
    {
        $items = array_flip($this->get_field_types());
        return $this->CreateInputDropdown($id, $name, $items, -1, $selected);
    }

    function handle_upload($itemid, $fieldname, &$error)
    {
        $config = cmsms()->GetConfig();

        $p = cms_join_path($config['uploads_path'],'cgblog');
        if (!is_dir($p)) {
            $res = @mkdir($p);
            if( $res === FALSE ) {
                $error = $this->Lang('error_mkdir',$p);
                return FALSE;
            }
        }

        $p = cms_join_path($config['uploads_path'],'cgblog','id'.$itemid);
        if (!is_dir($p)) {
            if( @mkdir($p) === FALSE ) {
                $error = $this->Lang('error_mkdir',$p);
                return FALSE;
            }
        }

        if( $_FILES[$fieldname]['size'] > $config['max_upload_size'] ) {
            $error = $this->Lang('error_filesize');
            return FALSE;
        }

        $filename = basename($_FILES[$fieldname]['name']);
        $dest = cms_join_path($config['uploads_path'],'cgblog','id'.$itemid,$filename);

        // Get the files extension
        $ext = substr(strrchr($filename, '.'), 1);

        // compare it against the 'allowed extentions'
        $exts = explode(',',$this->GetPreference('allowed_upload_types',''));
        if( !in_array( $ext, $exts ) ) {
            $error = $this->Lang('error_invalidfiletype');
            return FALSE;
        }

        if( @cms_move_uploaded_file($_FILES[$fieldname]['tmp_name'], $dest) === FALSE ) {
            $error = $this->Lang('error_movefile',$dest);
            return FALSE;
        }

        return $filename;
    }

    function delete_article($articleid)
    {
        $gCms = cmsms();
        $db = $this->GetDb();

        //Now remove the article
        $query = "DELETE FROM ".cms_db_prefix()."module_cgblog WHERE cgblog_id = ?";
        $db->Execute($query, array($articleid));

        // Delete it from the categories
        $query = 'DELETE FROM '.cms_db_prefix().'module_cgblog_blog_categories WHERE blog_id = ?';
        $db->Execute($query, array($articleid));

        // Delete it from the custom fields
        $query = 'DELETE FROM '.cms_db_prefix().'module_cgblog_fieldvals WHERE cgblog_id = ?';
        $db->Execute($query, array($articleid));

        // Delete any files.
        $config = $gCms->GetConfig();
        $dir = cms_join_path($config['uploads_path'],'cgblog','id'.$articleid);
        cge_dir::recursive_remove_directory($dir);

        //Update search index
        $module = cms_utils::get_search_module();
        if ($module != FALSE) $module->DeleteWords($this->GetName(), $articleid, 'cgblog');

        @$this->SendEvent('CGBlogArticleDeleted', array('cgblog_id' => $articleid));
    }

    function GetNotificationOutput($priority = 2)
    {
        // if this user has permission to change CGBlog articles from
        // Draft to published, and there are draft cgblog articles
        // then display a nice message.
        // this is a priority 2 item.
        if( $priority >= 2 ) {
            $output = array();
            if( $this->CheckPermission('Approve CGBlog') ) {
                $gCms = cmsms();
                $db = $gCms->GetDb();
                $query = 'SELECT count(cgblog_id) FROM '.cms_db_prefix().'module_cgblog n
                  WHERE status != \'published\' AND ( (COALESCE(end_time,@CG_ZEROTIME) = @CG_ZEROTIME) OR (end_time > NOW()) )';
                $count = $db->GetOne($query);
                if( $count ) {
                    $obj = new StdClass;
                    $obj->priority = 2;
                    $link = $this->CreateLink('m1_','defaultadmin','',$this->Lang('notify_n_draft_items_sub',$count));
                    $obj->html = $this->Lang('notify_n_draft_items',$link);
                    $output[] = $obj;
                }
            }
        }
        return $output;
    }

    function SuppressAdminOutput(&$request)
    {
        $action = '';
        if( isset($params['action']) ) {
            $action = trim($params['action']);
        }
        else if( isset($params['mact']) ) {
            $tmp = explode(',',$params['mact']);
            $action = $tmp[2];
        }

        if( startswith($action,'ajax') ) return true;

        return false;
    }

    public function IsValidRoute($page,$src_module = '')
    {
        $gCms = cmsms();
        $db = $gCms->GetDb();

        $query = 'SELECT cgblog_id FROM '.cms_db_prefix().'module_cgblog WHERE url = ?';
        $res = $db->GetOne($query,array($page));
        if( $res ) {
            $tmp = array();
            $tmp['action'] = 'detail';
            $tmp['articleid'] = $res;

            $returnid = $this->GetPreference('default_detailpage');
            if( $returnid == '' || $returnid == -1 ) {
                $contentops = $gCms->GetContentOperations();
                $returnid = $contentops->GetDefaultContent();
            }
            $tmp['returnid'] = $returnid;
            return $tmp;
        }
        return FALSE;
    }

    public function HasCapability($capability, $params = array())
    {
        if( $capability == 'cg_socialblast_feeder' ) return TRUE;
        if( $capability == 'tasks' ) return TRUE;
        return FALSE;
    }

    public function GetHeaderHTML()
    {
        $out = parent::GetHeaderHTML();
        $obj = cms_utils::get_module('JQueryTools','1.2');
        if( is_object($obj) ) {
            $tmpl = <<<EOT
{JQueryTools action='require' lib='tablesorter,jquerytools,cgform'}
{JQueryTools action='placemarker'}
EOT;
            $out .= $this->ProcessTemplateFromData($tmpl);
        }
        return $out;
    }

    public function &get_blaster_content($articleid)
    {
        $article = $this->articleStorage->get_by_id( $articleid );
        if( !is_object($article) ) throw new CmsInvalidDataException($this->Lang('error_getarticle'));
        if( $article->status != 'published' ) throw new CmsInvalidDataException($this->Lang('error_getarticle'));

        $article = new \CGBlog\display_article( $article );
        // note, this prepares a summary of the article for use in sending to social media.
        // later we may want to do things like process stuff through a template
        $res = new sb_content;
        $res->linktitle = $article->title;
        $res->title = $article->title;
        $res->summary = ($article->summary != '')?$article->summary:$article->content;
        $res->canonical = $article->canonical;
        // here we could extract links from the summary, or content... (based on a policy?)

        // get image fields, and add pictures.
        $fields = $article->fields;
        if( is_array($fields) && count($fields) ) {
            foreach( $fields as $name => $obj ) {
                if( $obj->type != 'image' ) continue;
                if( $obj->value == '' ) continue;
                $url = $article->file_location.'/'.$obj->value;
                $res->add_picture($url,$obj->value);
            }
        }

        return $res;
    }

    public function get_pretty_url($id,$action,$returnid='',$params=array(),$inline=false)
    {
        switch( $action ) {
        case 'detail':
        case 'details':
            $articleid = (int)cge_utils::get_param($params,'articleid');
            if( $articleid < 1 ) return;
            $article = $this->articleStorage->get_by_id($articleid,FALSE,FALSE,FALSE);
            if( !is_object($article) ) return;
            if( $article->url ) return $article->url;
            $title = munge_string_to_url($row['cgblog_title']);
            $str = $this->GetPreference('urlprefix','cgblog');
            if( $str ) $str .= '/';
            return $str."{$article->id}/{$article->title}";
            break;

        default:
            return;
        }
    }

    public function get_tasks()
    {
        if( \cgblog_utils::can_blast() ) {
            $obj = new \CGBlog\SocialMediaBlastTask( $this );
            return $obj;
        }
    }
} // end of class.
