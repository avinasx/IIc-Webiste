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

final class cgblog_utils
{
    private function __construct() {}

    private static function coalesce($data,$key,$dflt = '')
    {
        if( isset($data[$key]) ) return $data[$key];
        return $dflt;
    }

    public static function handle_uploaded_file($id,$itemid,$fieldid,$attrs,&$error,$prefix = 'customfield_')
    {
        $config = cms_config::get_instance();

        $dir = cms_join_path($config['uploads_path'],'cgblog');
        $res = cge_dir::mkdirr($dir);
        $mod = cge_utils::get_module(MOD_CGBLOG);
        if( !$res ) {
            $error = $mod->Lang('error_mkdir').': '.$dir;
            return FALSE;
        }

        $dir = cms_join_path($dir,'id'.$itemid);
        $res = cge_dir::mkdirr($dir);
        if( !$res ) {
            $error = $mod->Lang('error_mkdir').': '.$dir;
            return FALSE;
        }

        $uploader = cge_setup::get_uploader('',$dir);
        $uploader->set_accepted_filetypes(self::coalesce($attrs,'file_exts'));

        $name = $id.$prefix.$fieldid;
        $res = $uploader->handle_upload($name);
        $err = $uploader->get_error();
        if( !$res && $err != cg_fileupload::NOFILE ) {
            $error = $mod->GetUploadErrorMessage($err);
            return FALSE;
        }
        return $res;
    }


    public static function handle_uploaded_image($id,$itemid,$fieldid,$attrs,&$error,$prefix = 'customfield_')
    {
        $config = cms_config::get_instance();

        $dir = cms_join_path($config['uploads_path'],'cgblog');
        $res = cge_dir::mkdirr($dir);
        if( !$res ) return FALSE;

        $dir = cms_join_path($dir,'id'.$itemid);
        $res = cge_dir::mkdirr($dir);
        if( !$res ) return FALSE;

        $uploader = cge_setup::get_uploader('',$dir);
        $uploader->set_accepted_imagetypes(self::coalesce($attrs,'image_exts'));

        $name = $id.$prefix.$fieldid;
        $res = $uploader->handle_upload($name);
        $err = $uploader->get_error();
        if( !$res && $err != cg_fileupload::NOFILE ) {
            $mod = cge_utils::get_module('CGBlog');
            $error = $mod->GetUploadErrorMessage($err);
            return FALSE;
        }
        return $res;
    }

    public static function get_detailpage($current_page,$params)
    {
        $mod = cms_utils::get_module('CGBlog');
        $detailpage = $current_page;
        $tmp = $mod->GetPreference('default_detailpage',-1);
        if( $tmp != -1 && $tmp != '') $detailpage = $tmp;
        if (isset($params['detailpage'])) {
            $tmp = $mod->resolve_alias_or_id($params['detailpage']);
            if( !empty($tmp) ) $detailpage = $tmp;
        }
        if( $detailpage <= 0 ) $detailpage = ContentOperations::get_instance()->GetDefaultContent();

        return $detailpage;
    }

    public static function get_new_url($rec)
    {
        static $_routes_loaded = FALSE;
        if( !$_routes_loaded ) {
            cms_route_manager::load_routes();
            $_routes_loaded = TRUE;
        }

        $smarty = cmsms()->GetSmarty();
        $title = munge_string_to_url($rec['cgblog_title']);
        $smarty->assign('orig_title',$title);
        $smarty->assign('title',$title);
        $smarty->assign('postdate',$rec['cgblog_date']);

        $template = '{$postdate|cms_date_format:\'%Y\'}/{$postdate|cms_date_format:\'%m\'}/{$title}';
        $mod = cms_utils::get_module('CGBlog');
        $template = $mod->CGGetPreference('urltemplate',$template);

        $test = 0;
        while( $test < 100 ) {
            // generate a unique URL
            $url = $mod->ProcessTemplateFromData('{strip}'.$template.'{/strip}');
            if( $test > 1 ) $url .= '-'.$test;
            $url = trim($url," /\t\r\n\0\x08");

            $route = cms_route_manager::find_match($url,TRUE);
            if( $route ) {
                $dflts = $route->get_defaults();
                if( $route->is_content() || $route->get_dest() != $mod->GetName() ||
                !isset($dflts['articleid']) || $dflts['articleid'] != $rec['cgblog_id'] ) {
                    // route is used.
                    $test++;
                    continue;
                }
            }
            break;
        }

        return $url;
    }

    public static  function CreateUserMultiselect($id, $selected = '', $name='ownerid', $groups = true, $size=5)
    {
        $gCms = cmsms();
        $result = '';

        $result .= '<select multiple size="'.$size.'" name="'.$id.$name.'[]">';
        if( $groups ) {
            $groupops = $gCms->GetGroupOperations();
            $allgroups = $groupops->LoadGroups();
            foreach( $allgroups as $onegroup ) {
                $result .= '<option value="-'.$onegroup->id.'"';
                if( is_array($selected) && in_array($onegroup->id * -1, $selected) ) {
                    $result .= ' selected="selected"';
                }
                else if( ($onegroup->id * -1) == $selected ) {
                    $result .= ' selected="selected"';
                }
                $result .= '>'.lang('group').': '.$onegroup->name.'</option>';
            }
        }

        $userops = $gCms->GetUserOperations();
        $allusers = $userops->LoadUsers();
        if (count($allusers) > 0) {
            foreach ($allusers as $oneuser) {
                $result .= '<option value="'.$oneuser->id.'"';
                if( is_array($selected) && in_array($oneuser->id, $selected) ) {
                    $result .= ' selected="selected"';
                }
                else if( $oneuser->id == $selected ) {
                    $result .= ' selected="selected"';
                }
                $result .= '>'.$oneuser->username.'</option>';
            }
        }
        $result .= '</select>';

        return $result;
    }

    public static function can_blast()
    {
        $cgsb = \cms_utils::get_module('CGSocialBlaster');
        if( !$cgsb ) return;

        $mod = \cms_utils::get_module(MOD_CGBLOG);
        if( !$mod ) return;

        if( !$mod->GetPreference( 'social_announce') ) return;
        return TRUE;
    }

    public static function plugin_cgsb_call( $params, &$template )
    {
        $cgsb = \cms_utils::get_module('CGSocialBlaster');
        if( !$cgsb ) return;

        $params['module'] = 'CGBlog';
        return $cgsb->plugin_social_blaster( $params, $template );
    }

} // end of class
