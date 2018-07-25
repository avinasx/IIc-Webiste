<?php
#-------------------------------------------------------------------------
# Module: Widgets
# Author: Chris Taylor
# Copyright: (C) 2016 Chris Taylor, chris@binnovative.co.uk
# Licence: GNU General Public License version 3
#          see /Widgets/doc/LICENCE.txt or <http://www.gnu.org/licenses/>
#-------------------------------------------------------------------------

$lang['friendlyname'] = 'Widgets';
$lang['admindescription'] = 'A module for managing and displaying Widgets - blocks of content that can be added to many pages';
$lang['ask_uninstall'] = 'Are you sure you want to uninstall the Widgets module? All widget
data will be permanently deleted.';

$lang['add_widget'] = 'Create New Widget';
$lang['edit_widget'] = 'Edit Widget';

$lang['widget_saved'] = 'This widget is now saved';
$lang['widget_notsaved'] = 'This widget did not save';
$lang['submit'] = 'Submit';
$lang['cancel'] = 'Cancel';
$lang['apply'] = 'Apply';
$lang['name'] = 'Name';
$lang['date'] = 'Date';
$lang['published'] = 'Published';
$lang['description'] = 'Description';

$lang['edit'] = 'Edit this';

$lang['delete'] = 'Delete this';
$lang['confirm_delete'] = 'Are you sure that you want to delete this Widget';
$lang['widget_deleted'] = 'This widget is now deleted';

$lang['sorry_nowidgets'] = 'Sorry, we could not find any widgets that match the specified criteria';

$lang['widget_detail'] = 'widget Detail';
$lang['error_notfound'] = 'The widget specified could not be displayed';
$lang['param_wid'] = 'Specify an id (integer) of a widget to display';
$lang['param_template'] = 'Specify the name of the Widget template to use.';
$lang['param_category'] = 'Specify an alias of the category displayed items must be a member of.';
$lang['param_items'] = 'Specify an alias or comma separated list of Widget aliases to be displayed.';

$lang['preview'] = 'Preview';

$lang['need_permission'] = 'You need permission to use this module';

$lang['tab_widgets'] = 'Widgets';
$lang['tab_categories'] = 'Categories';
$lang['tab_options'] = 'Options';

$lang['title_customModuleName'] = 'Custom Module Name';
$lang['title_adminSection'] = 'Module Admin Section';
$lang['title_widgetStyleOptions'] = 'Widget Style Options';
$lang['help_widgetStyleOptions'] = 'CSS classes that can be selected for each Widget.
   Each option is separated by a line breaks. Descriptions can be separated from CSS class with a = character. For example: Hide on Phones=hidden-xs';

$lang['settings_saved'] = 'Your changes have been successfully saved.';


$lang['title_title'] = 'Title';
$lang['title_alias'] = 'Alias';
$lang['title_category'] = 'Category';
$lang['title_active'] = 'Active';
$lang['title_heading'] = 'Heading';
$lang['title_content'] = 'Content';
$lang['title_link_to'] = 'Link To';
$lang['title_link_text'] = 'Link Text';
$lang['title_style_options'] = 'Widget Style Options';
$lang['title_wysiwyg'] = 'Use WYSIWYG';
$lang['title_default'] = 'Default';

$lang['help_title'] = 'only visible in CMS';
$lang['help_heading'] = 'optional';
$lang['help_content'] = 'Including Text & Images, use H2 or H3 for headings';
$lang['help_link_to'] = 'select page to link to - optional';
$lang['help_link_text'] = 'Text for link button (default: Read more)';
$lang['help_style_options'] = 'Ctrl+click to select multiple options below to change how the widget is displayed';
$lang['help'] = <<<'EOD'
<h3>What does this do?</h3>
<p>'Widgets' provides content blocks that can be easily shown across multiple pages. The 'Widget' can be created/edited once, and added to multiple pages. Includes a drag-n-drop selection of available Widgets within content pages.</p><br>
<p>Each Widget includes an optional heading and a simple option for linking to other content pages. Examples of use: Widgets that can be optionally placed in the sidebar of bottom of content pages, commonly used as e.g. Latest News, Sidebar Enquiry Form, Social Media Sharing Links, Customer Reviews, ...</p>
<br>

<h3>Getting Started</h3>
<p>1. Add the following tag at the top of a page template, (this creates the drag-n-drop fields in the Content Manager page):</p>
<pre>{content_module module='Widgets' block='test1' assign=test1}{$test1=$test1 scope=global}</pre>
<p>2. Within the html body (e.g. in a sidebar column), add the following. (This generates the output of the selected Widgets using the Widget template, either default or specified):</p>
<pre>{Widgets items=$test1}</pre>
<p>3. Add a few test Widgets with dummy content, and view a page using that template in Content Manager, and on the front end.</p><br>
<p>4. Set Group Permissions for this module if you intend Editors or other groups to edit Widgets.</p>
<br>

<h3>Content Block parameters</h3>
<p>the following options can be included in the 'Widgets' content_module tag. Minimum required is:</p>
<pre>{content_module module='Widgets' block='test1'}</pre>
<ul>
   <li>(required) module='Widgets' - tells CMSMS to pass these details to the Widgets module*</li>
   <li>(required) block - the name of the content block, that stores the selected Widgets*</li>
   <li>(optional) label - a label for the content block for use when editing the page*</li>
   <li>(optional) category - specify the category of Widgets available for selection (default is all Widgets)</li>
   <li>(optional) description - an additional text description for instructions to editors</li>
   <li>(optional) label_left - alternative label for the left set of 'Selected Widgets'</li>
   <li>(optional) label_right - alternative label for the right set of 'Available Widgets'</li>
   <li>(optional) tab - the desired tab to display this field on the Content Manager page*</li>
   <li>(optional) assign (string) - assigns the result to a smarty variable with that name*</li>
</ul>
<p><small>(* = as per default content_module tag )</small></p>
<br>

<h3>Widgets Output</h3>
<p>the following options can be included in the 'Widgets' tag, to output the selected Widgets. Minimum required is:</p>
<pre>{Widgets}</pre>
<p>See <strong>Parameters</strong> below for possible parameters.</p>
<br>

<h3>Permissions</h3>
<p>Permissions exist to:</p>
<ul>
   <li>Widgets - Use - can create, edit, delete Widgets &amp; Categories</li>
   <li>Widgets - Manage - as above, plus can set Options</li>
</ul><br>

<h3>Support</h3>
<p>As per the GPL licence, this software is provided as is. Please read the text of the license for the full disclaimer.
The module author is not obligated to provide support for this code. However you might get support through the following:</p>
<ul>
   <li>For support, first <strong>search</strong> the <a href="//forum.cmsmadesimple.org">CMS Made Simple Forum</a>, for issues with the module similar to those you are finding.</li>
   <li>Then, if necessary, open a <strong>new forum topic</strong> to request help, with a thorough description of your issue, and steps to reproduce it.</li>
   <li>If you find a bug you can <a href="//dev.cmsmadesimple.org/bug/list/1383">submit a Bug Report</a>.</li>
   <li>For any good ideas you can <a href="//dev.cmsmadesimple.org/feature_request/list/1383">submit a Feature Request</a>.</li>
   <li>If you found the Module useful - shout out to me on Twitter <a href="//twitter.com/KiwiChrisBT">@KiwiChrisBT</a></li>
</ul><br>

<h3>Copyright &amp; Licence</h3>
<p>Copyright © 2016, Chris Taylor <chris at binnovative dot co dot uk>. All Rights Are Reserved.</p><br>
<p>This module has been released under the GNU Public License v3. However, as a special exception to the GPL, this software is distributed as an addon module to CMS Made Simple. You may only use this software when there is a clear and obvious indication in the admin section that the site was built with CMS Made Simple!</p><br>
<p>Inspired by: Global Content Blocks, LISE, ECB and CGExtensions.</p><br>
EOD;

$lang['error_title_empty'] = 'A title is required';
$lang['error_alias_invalid'] = 'Alias is invalid or already in use';
$lang['error_category_name'] = 'A unique name is required';

$lang['default_style_options'] = 'Entire Widget Clickable=clickable
Hide Border=hide-border
Hide on Tablets=hidden-sm
Hide on Phones=hidden-xs';

$lang['category_saved'] = 'This category is now saved';
$lang['category_notsaved'] = 'This category did not save';
$lang['category_deleted'] = 'The category was deleted';
$lang['category_not_deleted'] = 'The category was not deleted';

$lang['add_category'] = 'Add Category';
$lang['edit_category'] = 'Edit Category';

$lang['is_default'] = 'Default category';
$lang['set_default'] = 'Set as default category';

$lang['default_category_set'] = 'New default category set';
$lang['default_category_not_set'] = 'Default category not changed';

$lang['type_Widgets'] = 'Widgets';
$lang['type_Summary'] = 'Summary';
$lang['type_Template'] = 'Template';

$lang['content_block_label_left'] = 'Selected';
$lang['content_block_label_right'] = 'Available';
$lang['content_block_label_selected'] = 'Selected Widgets';
$lang['content_block_label_available'] = 'Available Widgets';

$lang['converter'] = 'Converter';
$lang['upgrade_warning'] = 'An earlier version of LISEWidgets has been detected. Below are the options to automate the upgrade to the \'Widgets\' module. Use with care!';
$lang['drop_items'] = 'No Widgets selected - drop selected widgets here';
$lang['remove'] = 'Remove';
// $lang[''] = '';
// $lang[''] = '';
// $lang[''] = '';
// $lang[''] = '';


?>