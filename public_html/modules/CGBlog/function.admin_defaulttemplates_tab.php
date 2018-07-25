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

echo $this->GetDefaultTemplateForm($this,$id,$returnid,'default_summary_template_contents',
				   'defaultadmin','default_templates',
				   $this->Lang('title_sysdefault_summary_template'),
				   'orig_summary_template.tpl',
				   $this->Lang('info_sysdefault_template'));

echo '<div style="margin-bottom: 0.5em; height: 0.5em; border-top: 1px solid #000; width: 80%;"></div>'."\n";

echo $this->GetDefaultTemplateForm($this,$id,$returnid,'default_detail_template_contents',
				   'defaultadmin','default_templates',
				   $this->Lang('title_sysdefault_detail_template'),
				   'orig_detail_template.tpl',
				   $this->Lang('info_sysdefault_template'));

echo '<div style="margin-bottom: 0.5em; height: 0.5em; border-top: 1px solid #000; width: 80%;"></div>'."\n";

echo $this->GetDefaultTemplateForm($this,$id,$returnid,'default_browsecat_template_contents',
				   'defaultadmin','default_templates',
				   $this->Lang('title_sysdefault_browsecat_template'),
				   'orig_browsecat.tpl',
				   $this->Lang('info_sysdefault_template'));

echo '<div style="margin-bottom: 0.5em; height: 0.5em; border-top: 1px solid #000; width: 80%;"></div>'."\n";

echo $this->GetDefaultTemplateForm($this,$id,$returnid,'default_archive_template_contents',
				   'defaultadmin','default_templates',
				   $this->Lang('title_sysdefault_archive_template'),
				   'orig_archive_template.tpl',
				   $this->Lang('info_sysdefault_template'));

echo '<div style="margin-bottom: 0.5em; height: 0.5em; border-top: 1px solid #000; width: 80%;"></div>'."\n";

echo $this->GetDefaultTemplateForm($this,$id,$returnid,'default_felist_template_contents',
				   'defaultadmin','default_templates',
				   $this->Lang('title_sysdefault_felist_template'),
				   'orig_felist_template.tpl',
				   $this->Lang('info_sysdefault_template'));

echo '<div style="margin-bottom: 0.5em; height: 0.5em; border-top: 1px solid #000; width: 80%;"></div>'."\n";

echo $this->GetDefaultTemplateForm($this,$id,$returnid,'default_fesubmit_template_contents',
				   'defaultadmin','default_templates',
				   $this->Lang('title_sysdefault_fesubmit_template'),
				   'orig_fesubmit_template.tpl',
				   $this->Lang('info_sysdefault_template'));

?>