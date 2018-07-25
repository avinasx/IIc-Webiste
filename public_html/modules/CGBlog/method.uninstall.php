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
if (!isset($gCms)) exit;

$db = $this->GetDb();

$this->DeleteTemplate('displaysummary');
$this->DeleteTemplate('displaydetail');

$dict = NewDataDictionary( $db );

$sqlarray = $dict->DropTableSQL( cms_db_prefix()."module_cgblog" );
$dict->ExecuteSQLArray($sqlarray);

$sqlarray = $dict->DropTableSQL( cms_db_prefix()."module_cgblog_categories" );
$dict->ExecuteSQLArray($sqlarray);

$sqlarray = $dict->DropTableSQL( cms_db_prefix()."module_cgblog_blog_categories" );
$dict->ExecuteSQLArray($sqlarray);

$sqlarray = $dict->DropTableSQL( cms_db_prefix()."module_cgblog_fielddefs" );
$dict->ExecuteSQLArray($sqlarray);

$sqlarray = $dict->DropTableSQL( cms_db_prefix()."module_cgblog_fieldvals" );
$dict->ExecuteSQLArray($sqlarray);

$db->DropSequence( cms_db_prefix()."module_cgblog_seq" );
$db->DropSequence( cms_db_prefix()."module_cgblog_categories_seq" );

$this->RemovePermission('Modify CGBlog');
$this->RemovePermission('Approve CGBlog');
$this->RemovePermission('Delete CGBlog');

// Remove all preferences for this module
$this->RemovePreference();

// And all Templates
$this->DeleteTemplate();

#Setup events
$this->RemoveEvent('CGBlogArticleAdded');
$this->RemoveEvent('CGBlogArticleEdited');
$this->RemoveEvent('CGBlogArticleDeleted');
$this->RemoveEvent('CGBlogCategoryAdded');
$this->RemoveEvent('CGBlogCategoryEdited');
$this->RemoveEvent('CGBlogCategoryDeleted');

?>
