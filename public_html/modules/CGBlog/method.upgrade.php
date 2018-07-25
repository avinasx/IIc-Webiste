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

if( version_compare(phpversion(),'5.4.3') < 0 ) {
    return "Minimum PHP version of 5.4.3 required";
}

$gCms = cmsms();
$current_version = $oldversion;
$db = $this->GetDb();

switch($current_version)
  {
  case '1.0':
  case '1.0.1':
    // Setup fesubmit template
    $fn = dirname(__FILE__).DIRECTORY_SEPARATOR.
      'templates'.DIRECTORY_SEPARATOR.'orig_fesubmit_template.tpl';
    if( file_exists( $fn ) )
      {
	$template = @file_get_contents($fn);
	$this->SetPreference('default_fesubmit_template_contents',$template);
	$this->SetTemplate('fesubmitSample',$template);
	$this->SetPreference('current_fesubmit_template','Sample');
      }

    $fn = dirname(__FILE__).'/templates/orig_fesubmit_email_template.tpl';
    if( file_exists($fn) )
      {
	$template = @file_get_contents($fn);
	$this->SetTemplate('email_template',$template);
      }

    $this->SetPreference('fesubmit_email_subject',$this->Lang('dflt_email_subject'));
    $this->SetPreference('fesubmit_email_html',0);
    $this->SetPreference('fesubmit_email_users','');
    $this->SetPreference('fesubmit_status','draft');
    $this->SetPreference('fesubmit_redirect',-1);

  case '1.1':
    {
      // 1.  alter table to add the author field
      $dict = NewDataDictionary($db);
      $sqlarray = $dict->AddColumnSQL(cms_db_prefix()."module_cgblog", 'author C(255)');
      $dict->ExecuteSQLArray($sqlarray);

      // 2.  convert all author_id's into authors
      $userops =& $gCms->GetUserOperations();
      $tmp = $userops->LoadUsers();
      $users = array();
      for( $i = 0; $i < count($tmp); $i++ )
	{
	  $obj =& $tmp[$i];
	  $users[$obj->id] =& $obj;
	}
      $feu = $this->GetModuleInstance('FrontEndUsers');

      $query = 'SELECT DISTINCT author_id FROM '.cms_db_prefix().'module_cgblog';
      $data = $db->GetArray($query);
      for( $i = 0; $i < count($data); $i++ )
	{
	  $username = 'unknown';
	  $uid = $data[$i]['author_id'];
	  if( $uid > 0 )
	    {
	      $username = $users[$uid]->username;
	    }
	  else if( $uid < 0 && is_object($feu) )
	    {
	      $uid = $uid * -1;
	      $username = $feu->GetUserName($uid);
	      if( empty($username) ) $username = 'unknown';
	    }
	  $data[$i]['author_name'] = $username;
	}

      $query = 'UPDATE '.cms_db_prefix().'module_cgblog
                   SET author = ? WHERE author_id = ?';
      for( $i = 0; $i < count($data); $i++ )
	{
	  $db->Execute($query,array($data[$i]['author_name'],$data[$i]['author_id']));
	}

      // 3.  drop the author_id field.
      $sqlarray = $dict->DropColumnSQL(cms_db_prefix()."module_cgblog", 'author_id');
      $dict->ExecuteSQLArray($sqlarray);

      // Setup archive template
      $fn = dirname(__FILE__).DIRECTORY_SEPARATOR.
	'templates'.DIRECTORY_SEPARATOR.'orig_archive_template.tpl';
      if( file_exists( $fn ) )
	{
	  $template = @file_get_contents($fn);
	  $this->SetPreference('default_archive_template_contents',$template);
	  $this->SetTemplate('archiveSample',$template);
	  $this->SetPreference('current_archive_template','Sample');
	}

    }

  case '1.4':
    {
      $dict = NewDataDictionary($db);
      $sqlarray = $dict->AddColumnSQL(cms_db_prefix()."module_cgblog", 'url C(255)');
      $dict->ExecuteSQLArray($sqlarray);
    }

  case '1.4.1':
    {
      $query = 'UPDATE '.cms_db_prefix().'module_cgblog SET start_time = cgblog_date
                WHERE end_time IS NULL';
      $db->Execute($query);
    }

  case '1.6':
    {
      $fn = dirname(__FILE__).DIRECTORY_SEPARATOR.
	'templates'.DIRECTORY_SEPARATOR.'orig_felist_template.tpl';
      if( file_exists( $fn ) )
	{
	  $template = @file_get_contents($fn);
	  $this->SetPreference('default_felist_template_contents',$template);
	  $this->SetTemplate('felistSample',$template);
	  $this->SetPreference('current_felist_template','Sample');
	}
    }

  case '1.6.1':
  case '1.6.2':
    {
      $dict = NewDataDictionary($db);
      $sqlarray = $dict->AddColumnSQL(cms_db_prefix()."module_cgblog_fielddefs", 'attrs X');
      $dict->ExecuteSQLArray($sqlarray);

      $query = 'SELECT id,max_length FROM '.cms_db_prefix().'module_cgblog_fielddefs';
      $tmp = $db->GetArray($query);
      $uquery = 'UPDATE '.cms_db_prefix().'module_cgblog_fielddefs SET attrs = ? WHERE id = ?';
      if( is_array($tmp) )
	{
	  $attr = array();
	  foreach( $tmp as $one )
	    {
	      $attr['max_length'] = $one['max_length'];
	      $db->Execute($uquery,array(serialize($attr),$one['id']));
	    }
	}

      $sqlarray = $dict->DropColumnSQL(cms_db_prefix()."module_cgblog_fielddefs", 'max_length');
      $dict->ExecuteSQLArray($sqlarray);
    }

  case '1.6.3':
  case '1.6.4':
  case '1.6.5':
  case '1.6.6':
  case '1.6.7':
    {
      // this may fail if it already exists, that's okay.
      $dict = NewDataDictionary($db);
      $sqlarray = $dict->AddColumnSQL(cms_db_prefix()."module_cgblog", 'url C(255)');
      $dict->ExecuteSQLArray($sqlarray);
    }
  }

if( version_compare($oldversion,'1.9.14') < 0 ) {
  $dict = NewDataDictionary($db);

  $sqlarray = $dict->CreateIndexSQL('cgblog_idurl',cms_db_prefix().'module_cgblog','cgblog_id,url,status,start_time,end_time,cgblog_date');
  $dict->ExecuteSQLArray($sqlarray);

  $sqlarray = $dict->CreateIndexSQL('cgblog_cats',cms_db_prefix().'module_cgblog_categories','id,name,sortorder');
  $dict->ExecuteSQLArray($sqlarray);
}

if( version_compare($oldversion,'1.11.3') < 0 ) {
  $sql = 'ALTER TABLE '.cms_db_prefix().'module_cgblog MODIFY cgblog_data longtext';
  $db->Execute($sql);
}

if( version_compare($oldversion,'1.11.8') < 0 ) {
    $this->CreatePermission('Manage CGBlog Categories','Manage CGBlog Categories');
}

if( version_compare($oldversion,'1.12') < 0 ) {
    $dict = NewDataDictionary($db);
    $sqlarray = $dict->AddColumnSQL(cms_db_prefix().'module_cgblog_categories', 'parent_id I, item_order I, hierarchy C(255), long_name X, description X');
    $dict->ExecuteSQLArray($sqlarray);
    $db->Execute('UPDATE '.cms_db_prefix().'module_cgblog_categories SET item_order = sort_order');
    $sqlarray = $dict->DropColumnSQL(cms_db_prefix().'module_cgblog_categories','sort_order');
    $dict->ExecuteSQLArray($sqlarray);
    cgblog_ops::update_hierarchy_positions();
}

if( version_compare($oldversion,'1.15') < 0 ) {
      $dict = NewDataDictionary($db);
      $sqlarray = $dict->AddColumnSQL(cms_db_prefix()."module_cgblog", 'add_data X2');
      $dict->ExecuteSQLArray($sqlarray);
}
