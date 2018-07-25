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
if( !isset($gCms) ) exit();
if( !$this->CheckPermission('Approve CGBlog') ) return;

if( !isset($params['approve']) || !isset($params['articleid']) ) {
  die('missing parameter, this should not happen');
}

$articleid = (int)$params['articleid'];
$search = cms_utils::get_search_module();
$status = '';
$uquery = "UPDATE ".cms_db_prefix()."module_cgblog SET status = ? WHERE cgblog_id = ?";
switch( $params['approve'] ) {
 case 0:
   $status = 'draft';
   break;
 case 1:
   $status = 'published';
   break;
 default:
   die('unknown value for approve parameter, I do not know what to do with this');
   break;
}

// Get the record
$query = 'SELECT * FROM '.cms_db_prefix().'module_cgblog WHERE cgblog_id = ?';;
$article = $db->GetRow($query,array($articleid));

// update search?
if( is_object($search) ) {
  if( $status == 'draft' ) {
    $search->DeleteWords($this->GetName(),$articleid,'cgblog');
  }
  else if( $status == 'published' ) {
    if( !$article ) return;
	
    $useexp = 0;
    $t_end = time() + 3600; // just for the math
    if( $article['end_time'] != "" ) {
      $useexp = 1;
      $t_end = $db->UnixTimeStamp($article['end_time']);
    }

    if( $t_end > time() || $this->GetPreference('expired_searchble',1) == 1 ) {
      $text = $article['cgblog_data'] . ' ' . $article['summary'] . ' ' . $article['cgblog_title'] . ' ' . $article['cgblog_title'];
      $query = 'SELECT fv.value FROM '.cms_db_prefix().'module_cgblog_fieldvals fv
                LEFT JOIN '.cms_db_prefix().'module_cgblog_fielddefs fd
                ON fv.fielddef_id = fd.id WHERE fv.cgblog_id = ? AND fd.public = 1';
      $flds = $db->GetArray($query,array($articleid));
      if( is_array($flds) ) {
	for( $i = 0; $i < count($flds); $i++ ) {
	  $text .= ' '.$flds[$i]['value'];
	}
      }

      $search->AddWords($this->GetName(), $articleid, 'cgblog', $text, 
			($useexp == 1 && $this->GetPreference('expired_searchable',0) == 0) ? $t_end : NULL);
    }
  }
}

      
$db->Execute($uquery,array($status,$articleid));

// Send an event.
@$this->SendEvent('CGBlogArticleEdited',
		  array('cgblog_id'=>$articleid,
			'title'=>$article['cgblog_title'],
			'content'=>$article['cgblog_data'],
			'summary'=>$article['summary'],
			'status'=>$status,
			'start_time'=>$article['start_time'],
			'end_time'=>$article['end_time'],
			'extra'=>$article['cgblog_extra'],
			'url'=>$article['url']));

$params = array('active_tab'=>'articles');
$this->Redirect($id,'defaultadmin',$returnid,$params);
?>
