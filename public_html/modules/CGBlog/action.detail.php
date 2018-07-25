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
if (!isset($gCms)) exit;

//
// initialization
//
$query = '';
$row = '';
$article = null;
$canviewdraft = 0;
$preview = FALSE;
$articleid = (isset($params['articleid']))?(int)$params['articleid']:-1;

//
// setup
//

{
    $feu = \cms_utils::get_module('FrontEndUsers');
    $gid = $this->GetPreference('fesubmit_draftviewers',-1);
    if( $gid > 0 ) {
        if( $feu->MemberOfGroup($feu->LoggedInId(),$gid) ) $canviewdraft = 1;
    }
}

if( $id == '_preview_' && isset($_SESSION['cgblog_preview']) && isset($params['preview']) ) {
    // see if our data matches.
    if( md5(serialize($_SESSION['cgblog_preview'])) == $params['preview'] ) {
        $fname = TMP_CACHE_LOCATION.'/'.$_SESSION['cgblog_preview']['fname'];
        if( file_exists($fname) && (md5_file($fname) == $_SESSION['cgblog_preview']['checksum']) ) {
            $data = unserialize(file_get_contents($fname));
            if( is_array($data) ) {
                // get passed data into a standard format.
                $article = article::blank();
                $article->fill_from_formparams($data);
                $article = new \CGBlog\display_article( $article );
                $article->set_linkdata($id,$params);
                $compile_id = 'cgblog_preview_'.time();
                $preview = TRUE;
            }
        }
    }
}

debug_buffer('begin cgblog detail view');
$template = \cge_param::get_string($params,'detailtemplate',$this->GetPreference('current_detail_template'));
$cache_id = 'cgbd'.md5(serialize($params));
$compile_id = 'cgbd'.$articleid;
$tpl = $this->CreateSmartyTemplate($template,'detail',$cache_id,$compile_id);
if( $preview || !$tpl->isCached() ) {
    // not cached... have to do the work.
    if( !$article ) {
        if( $articleid == -1 ) {
            $article = $this->articleStorage->get_latest( $canviewdraft );
        }
        else {
            $article = $this->articleStorage->get_by_id( $articleid );
        }
        if( $article && !$article->is_displayable() && !$canviewdraft ) $article = null;
        if( $article ) $article = new display_article( $article );
    }
    if( !$article ) throw new \CmsError404Exception('Blog article '.$articleid.' not found, or otherwise unavailable');
    $article->set_linkdata($id,$params);

    $tpl->assign('entry', $article);
    $tpl->assign('category_label', $this->Lang('category_label'));
    $tpl->assign('author_label', $this->Lang('author_label'));
    $tpl->assign('extra_label',$this->Lang('extra'));
}

// Display template
$tpl->display();
debug_buffer('end cgblog detail view');
#
# EOF
#
?>
