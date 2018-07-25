<?php
#BEGIN_LICENSE
#-------------------------------------------------------------------------
# Module: CGBlog (c) 2010-2018 by Robert Campbell
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
if( !$this->VisibleToAdminUser() ) exit;

#
#The tab headers
#
echo $this->StartTabHeaders();
if ($this->CheckPermission('Modify CGBlog') || $this->CheckPermission('Approve CGBlog') ) {
  echo $this->SetTabHeader('articles',$this->Lang('articles'));
}
if( $this->CheckPermission('Manage CGBlog Categories') ) {
    echo $this->SetTabHeader('categories',$this->Lang('categories'));
}
if( $this->CheckPermission('Modify Site Preferences') ) {
  echo $this->SetTabHeader('customfields',$this->Lang('customfields'));
}

if ($this->CheckPermission('Modify Templates')) {
    echo $this->SetTabHeader('summary_template',$this->Lang('summarytemplate'));
    echo $this->SetTabHeader('detail_template',$this->Lang('detailtemplate'));
    echo $this->SetTabHeader('browsecat_template',$this->Lang('browsecattemplate'));
    echo $this->SetTabHeader('archive_template',$this->Lang('archivetemplate'));
    echo $this->SetTabHeader('felist_template',$this->Lang('felisttemplate'));
    echo $this->SetTabHeader('fesubmit_template',$this->Lang('fesubmittemplate'));
    echo $this->SetTabHeader('default_templates',$this->Lang('default_templates'));
}

if ($this->CheckPermission('Modify Site Preferences')) {
    echo $this->SetTabHeader('options',$this->Lang('options'));
}
echo $this->EndTabHeaders();

#
#The content of the tabs
#
echo $this->StartTabContent();
if ($this->CheckPermission('Modify CGBlog') || $this->CheckPermission('Approve CGBlog') ) {
    echo $this->StartTab('articles', $params);
    include(__DIR__.'/function.admin_articlestab.php');
    echo $this->EndTab();
}
if( $this->CheckPermission('Manage CGBlog Categories') ) {
    echo $this->StartTab('categories', $params);
    include(__DIR__.'/function.admin_categoriestab.php');
    echo $this->EndTab();
}

if( $this->CheckPermission('Modify Site Preferences') ) {
  echo $this->StartTab('customfields', $params);
  include(__DIR__.'/function.admin_customfieldstab.php');
  echo $this->EndTab();
}
if( $this->CheckPermission( 'Modify Templates' ) ) {
  echo $this->StartTab('summary_template', $params);
  include(__DIR__.'/function.admin_summarytemplates_tab.php');
  echo $this->EndTab();

  echo $this->StartTab('detail_template', $params);
  include(__DIR__.'/function.admin_detailtemplates_tab.php');
  echo $this->EndTab();

  echo $this->StartTab('browsecat_template', $params);
  include(__DIR__.'/function.admin_browsecattemplates_tab.php');
  echo $this->EndTab();

  echo $this->StartTab('archive_template', $params);
  include(__DIR__.'/function.admin_archivetemplates_tab.php');
  echo $this->EndTab();

  echo $this->StartTab('felist_template', $params);
  include(__DIR__.'/function.admin_felisttemplates_tab.php');
  echo $this->EndTab();

  echo $this->StartTab('fesubmit_template', $params);
  include(__DIR__.'/function.admin_fesubmittemplates_tab.php');
  echo $this->EndTab();

  echo $this->StartTab('default_templates');
  include(__DIR__.'/function.admin_defaulttemplates_tab.php');
  echo $this->EndTab();
}

if ($this->CheckPermission('Modify Site Preferences')) {
    echo $this->StartTab('options', $params);
    include(__DIR__.'/function.admin_optionstab.php');
    echo $this->EndTab();
}

echo $this->EndTabContent();
