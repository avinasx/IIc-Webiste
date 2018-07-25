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
if( !isset($_REQUEST['title']) ) return;

$postdate = time();
if( isset($_REQUEST['postdate']) ) $postdate = strtotime($_POST['postdate']);

$article_id = '';
if( isset($_REQUEST['articleid']) ) $article_id = (int)$_REQUEST['articleid'];

$template = '{$postdate|cms_date_format:\'%Y\'}/{$postdate|cms_date_format:\'%m\'}/{$title}';
$template = $this->GetPreference('urltemplate',$template);
$smarty->assign('orig_title',trim($_REQUEST['title']));
$smarty->assign('title',munge_string_to_url(trim($_REQUEST['title'])));
$smarty->assign('postdate',$postdate);

$test = 0;
$url = '';
cms_route_manager::load_routes();
$url_base = $this->ProcessTemplateFromData('{strip}'.$template.'{/strip}');
$url_base = trim($url_base," /\t\r\n\0\x08");
$url = $url_base;

while( $test < 100 ) {
    // generate a unique random url.
    if( $test > 1 ) $url = $url_base . "-$test";

    $route = cms_route_manager::find_match($url);
    if( $route ) {
        $dflts = $route->get_defaults();
        if( $route->is_content() || $route->get_dest() != $this->GetName() || !isset($dflts['articleid']) || $dflts['articleid'] != $article_id ) {
            // route is used.
            $test++;
            continue;
        }
    }

    break;
}
echo $url;
