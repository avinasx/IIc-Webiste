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

if( version_compare(phpversion(),'5.4.3') < 0 ) {
    return "Minimum PHP version of 5.4.3 required";
}

$db = $this->GetDb();
$dict = NewDataDictionary($db);
$taboptarray = array('mysql' => 'TYPE=MyISAM');

$flds = "
	cgblog_id I KEY AUTO NOTNULL,
	cgblog_title C(255),
	cgblog_data X2,
	cgblog_date " . CMS_ADODB_DT . ",
	summary X,
	start_time " . CMS_ADODB_DT . ",
	end_time " . CMS_ADODB_DT . ",
	status C(25),
	create_date " . CMS_ADODB_DT . ",
	modified_date " . CMS_ADODB_DT . ",
    author C(255),
    cgblog_extra C(255),
    url C(255),
    add_data X2
";
$sqlarray = $dict->CreateTableSQL(cms_db_prefix()."module_cgblog", $flds, $taboptarray);
$dict->ExecuteSQLArray($sqlarray);
$db->CreateSequence(cms_db_prefix()."module_cgblog_seq");

$sqlarray = $dict->CreateIndexSQL('cgblog_idurl',cms_db_prefix().'module_cgblog','cgblog_id,url,status,start_time,end_time,cgblog_date');
$dict->ExecuteSQLArray($sqlarray);

$flds = "
	id I KEY AUTO NOTNULL,
	name C(255),
    parent_id  I,
    item_order I,
    hierarchy  C(255),
    long_name  X,
    description X
";
$taboptarray = array('mysql' => 'TYPE=MyISAM');
$sqlarray = $dict->CreateTableSQL(cms_db_prefix()."module_cgblog_categories", $flds, $taboptarray);
$dict->ExecuteSQLArray($sqlarray);

$sqlarray = $dict->CreateIndexSQL('cgblog_cats',cms_db_prefix().'module_cgblog_categories','id,name,sortorder');
$dict->ExecuteSQLArray($sqlarray);

$flds = "
    blog_id I KEY NOTNULL,
    category_id I KEY NOTNULL
";
$sqlarray = $dict->CreateTableSQL(cms_db_prefix()."module_cgblog_blog_categories", $flds, $taboptarray);
$dict->ExecuteSQLArray($sqlarray);


$flds = "
	id I KEY AUTO,
	name C(255),
	type C(50),
	create_date " . CMS_ADODB_DT . ",
	modified_date " . CMS_ADODB_DT . ",
    item_order I,
    public I,
    attrs X
";

$taboptarray = array('mysql' => 'TYPE=MyISAM');
$sqlarray = $dict->CreateTableSQL(cms_db_prefix()."module_cgblog_fielddefs", $flds, $taboptarray);
$dict->ExecuteSQLArray($sqlarray);

$flds = "
	cgblog_id I KEY NOTNULL,
	fielddef_id I KEY NOTNULL,
	value X,
	create_date " . CMS_ADODB_DT . ",
	modified_date " . CMS_ADODB_DT . "
";

$taboptarray = array('mysql' => 'TYPE=MyISAM');
$sqlarray = $dict->CreateTableSQL(cms_db_prefix()."module_cgblog_fieldvals", $flds, $taboptarray);
$dict->ExecuteSQLArray($sqlarray);

#Set Permission
$this->CreatePermission('Modify CGBlog', 'Modify CGBlog');
$this->CreatePermission('Approve CGBlog', 'Approve CGBlog For Frontend Display');
$this->CreatePermission('Delete CGBlog', 'Delete CGBlog Articles');
$this->CreatePermission('Manage CGBlog Categories','Manage CGBlog Categories');

# Setup summary template
$fn = dirname(__FILE__).DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'orig_summary_template.tpl';
if( file_exists( $fn ) ) {
    $template = @file_get_contents($fn);
    $this->SetPreference('default_summary_template_contents',$template);
    $this->SetTemplate('summarySample',$template);
    $this->SetPreference('current_summary_template','Sample');
 }
//$this->SetTemplate('displaysummary', $this->GetSummaryHtmlTemplate());

# Setup detail template
$fn = dirname(__FILE__).DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'orig_detail_template.tpl';
if( file_exists( $fn ) )
  {
    $template = @file_get_contents($fn);
    $this->SetPreference('default_detail_template_contents',$template);
    $this->SetTemplate('detailSample',$template);
    $this->SetPreference('current_detail_template','Sample');
  }
//$this->SetTemplate('displaydetail', $this->GetDetailHtmlTemplate());

# Setup fesubmit template
$fn = dirname(__FILE__).DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'orig_fesubmit_template.tpl';
if( file_exists( $fn ) )
  {
    $template = @file_get_contents($fn);
    $this->SetPreference('default_fesubmit_template_contents',$template);
    $this->SetTemplate('fesubmitSample',$template);
    $this->SetPreference('current_fesubmit_template','Sample');
  }

# Setup felist template
$fn = dirname(__FILE__).DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'orig_felist_template.tpl';
if( file_exists( $fn ) )
  {
    $template = @file_get_contents($fn);
    $this->SetPreference('default_felist_template_contents',$template);
    $this->SetTemplate('felistSample',$template);
    $this->SetPreference('current_felist_template','Sample');
  }

# Setup archive template
$fn = dirname(__FILE__).DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'orig_archive_template.tpl';
if( file_exists( $fn ) )
  {
    $template = @file_get_contents($fn);
    $this->SetPreference('default_archive_template_contents',$template);
    $this->SetTemplate('archiveSample',$template);
    $this->SetPreference('current_archive_template','Sample');
  }

# Setup browsecat template
$fn = dirname(__FILE__).DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'orig_browsecat.tpl';
if( file_exists( $fn ) )
  {
    $template = @file_get_contents($fn);
    $this->SetPreference('default_browsecat_template_contents',$template);
    $this->SetTemplate('browsecatSample',$template);
    $this->SetPreference('current_browsecat_template','Sample');
  }

# FEsubmit email template
$fn = dirname(__FILE__).'/templates/orig_fesubmit_email_template.tpl';
if( file_exists($fn) )
  {
    $template = @file_get_contents($fn);
    $this->SetTemplate('email_template',$template);
  }


# Setup General category
$query = 'INSERT INTO '.cms_db_prefix().'module_cgblog_categories (name,sort_order) VALUES(?,?)';
$db->Execute($query, array('General',1));
$cid = $db->Insert_ID();

# Other preferences
$this->SetPreference('allowed_upload_types','gif,png,jpeg,jpg');
$this->SetPreference('default_category',$cid);
$this->SetPreference('fesubmit_email_subject',$this->Lang('dflt_email_subject'));
$this->SetPreference('fesubmit_email_html',0);
$this->SetPreference('fesubmit_email_users','');
$this->SetPreference('fesubmit_status','draft');
$this->SetPreference('fesubmit_redirect',-1);

#Setup events
$this->CreateEvent('CGBlogArticleAdded');
$this->CreateEvent('CGBlogArticleEdited');
$this->CreateEvent('CGBlogArticleDeleted');
