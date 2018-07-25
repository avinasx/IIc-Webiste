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

final class cgblog_smarty_plugins
{
  private function __construct() {}

  public static function relative_article($params,$smarty)
  {
      // given the article id, and (optionally) a post date
      // this function will find the next (or previous) viewable article by post date
      $retval = null;
      $article_id = (int)cge_utils::get_param($params,'article');
      $postdate   = trim(cge_utils::get_param($params,'postdate'));
      $dir = strtolower(trim(cge_utils::get_param($params,'dir','next')));

      if( $article_id > 0 ) {
          switch( $dir ) {
          case '>':
          case 'n':
          case 'next':
          default:
              $dir = 'next';
              break;
          case '<':
          case 'p':
          case 'prev':
              $dir = 'prev';
              break;
          }

          // gotta load the article.
          // hopefully we don't actually have to query for it again.
          $db = cmsms()->GetDb();
          $storage = new \CGBlog\article_storage( $db );
          $article = $storage->get_by_id($article_id);
          if( is_object($article) ) {
              // build a query
              $query = 'SELECT A.cgblog_id FROM '.cms_db_prefix().'module_cgblog A
                  WHERE A.status = ? AND A.cgblog_id != ? AND
                  COALESCE(A.start_time,\'1900-01-01\') < NOW() AND
                  COALESCE(A.end_time,\'2999-12-31\') > NOW()';
              $parms = array('published',$article_id);
              switch( $dir ) {
              case 'next':
                  $query .= ' AND A.cgblog_date > ? ORDER BY A.cgblog_date ASC';
                  $parms[] = $article->postdate;
                  break;
              case 'prev':
                  $query .= ' AND A.cgblog_date < ? ORDER BY A.cgblog_date DESC';
                  $parms[] = $article->postdate;
                  break;
              }

              $retval = $db->GetOne($query,$parms);
          }
      }

      if( isset($params['assign']) ) {
          $smarty->assign(trim($params['assign']),$retval);
          return;
      }
      return $retval;
  }
} // end of class

#
# EOF
#
