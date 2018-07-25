<?php
$lang['prompt_friendlyname'] = 'Friendly Name for this Module';
$lang['url_template'] = 'URL Template';
$lang['error_urlused'] = 'The URL specified is already in use';
$lang['error_badurl'] = 'The URL specified is invalid';
$lang['info_fesubmit_wysiwyg'] = 'This option disables use of the wysiwyg in all areas of the frontend submission form, regardless of other settings';
$lang['fesubmit_wysiwyg'] = 'Allow usage of the wysiwyg editor';
$lang['return_to_content'] = 'Return';
$lang['size'] = 'Size';
$lang['allowed_filetypes'] = 'Allowed File Types';
$lang['enable_wysiwyg'] = 'Enable Wysiwyg';
$lang['preview_size'] = 'Preview Image Size (pixels)';
$lang['preview'] = 'Generate preview image';
$lang['thumbnail_size'] = 'Thumbnail Size (pixels)';
$lang['thumbnail'] = 'Generate thumbnail image';
$lang['watermark'] = 'Watermark uploaded image';
$lang['allowed_imagetypes'] = 'Allowed Image Types';
$lang['image'] = 'Image';
$lang['help_adminuser'] = 'Applicable only to the default (summary) view, this module allowss filtering the output to only those admin user names specified.  i.e: <code>admin_user=&quot;bob,fred,george&quot;</code>';
$lang['help_fesubmitpage'] = 'Applicable only to the myarticles action, this parameter allows specifying a different page <em>(by id or alias)</em> for the frontend submit form.';
$lang['help_userparam'] = 'Applicable only to the <em>(default)</em> summary action, this parameter allows filtering the output to only those <em>(non expired)</em> FEU author names specified.  i.e <code>author=&quot;user1@somewhere.com,user2@somewhere.com&quot;</code>.';
$lang['help_inline'] = 'Applicable only to the myarticles action, this parameter specifies that the pagination links should be created in an inline manner.  i.e:  the resulting output from the link will replace the original tag, not the {content} tag on the destination page';
$lang['fesubmit_updatestatus'] = 'Frontend Users are allowed to change article status';
$lang['you_authored'] = 'To date, the number of articles you have authored is';
$lang['my_articles'] = 'My Articles';
$lang['id'] = 'Id';
$lang['modified'] = 'Modified';
$lang['fesubmit_managearticles'] = 'Allow Frontend Users to manage their own blog articles?';
$lang['fesubmit_dfltexpiry'] = 'By default frontend submitted articles use the expiry date';
$lang['fesubmit_usexpiry'] = 'Users submitting articles via the frontend can disable article expiry';
$lang['url'] = 'URL';
$lang['helpshowdraft'] = 'Applicable only to the default summary view, this parameter will result in only draft articles in the summary result set.  This only works if the logged in frontend user is authorized to view draft entries as specified in the CGBlog module admin panel options tab';
$lang['title_default_status'] = 'Default Status for new articles';
$lang['fesubmit_draftviewers'] = 'FEU Group that can view draft articles';
$lang['title_default_summarypage'] = 'Default summary page (if no page id is specified on the URL)';
$lang['title_default_detailpage'] = 'Default detail page (if no page id is specified on the URL)';
$lang['helparchivetemplate'] = 'Applicable only to the <em>archive</em> action, this parameter can be used to specify an alternate archive view template.';
$lang['addedit_archive_template'] = 'Add/Edit an Archive View Template';
$lang['info_archive_templates'] = 'Available Archive View Templates';
$lang['archivetemplate'] = 'Archive View Templates';
$lang['title_sysdefault_archive_template'] = 'System Default Archive View Template';
$lang['helpfelisttemplate'] = 'Applicable only to the <em>myarticles</em> action, this parameter can be used to specify an alternate Article List Report template';
$lang['helpfesubmittemplate'] = 'Applicable only to the <em>fesubmit</em> action, this parameter can be used to specify an alternate fesubmit form template';
$lang['helpsummarypage'] = 'Applicable only to the <em>browsecat and archive</em> actions, this parameter can contain a page id or alias to use for the display of summary reports that result from clicking on a category link';
$lang['help_month'] = 'Applicable only to the <em>default</em> action, this parameter can contain an (integer) month, for which all listings should be displayed.  This parameter will only work in conjunction with the &quot;year&quot; parameter.';
$lang['category_modified'] = 'Category successfully edited';
$lang['new_category_name'] = 'New Category Name';
$lang['old_category_name'] = 'Old Category Name';
$lang['edit_category'] = 'Edit Category';
$lang['error_nocatname'] = 'No category name supplied';
$lang['move_up'] = 'Move this up';
$lang['move_down'] = 'Move this down';
$lang['postuninstall'] = 'The CGBlog module has been uninstalled.  It is now safe to delete the files associated with this module';
$lang['ipaddress'] = 'IP Address';
$lang['fesubmit_redirect'] = 'Page to redirect to after a blog entry is submitted';
$lang['templaterestored'] = 'Template Restored';
$lang['fesubmit_status'] = 'The Status of newly submitted blog entries';
$lang['fesubmit_email_users'] = 'Send notification (via email) to these users';
$lang['no'] = 'خیر';
$lang['yes'] = 'بله';
$lang['fesubmit_email_template'] = 'Email Template';
$lang['fesubmit_email_html'] = 'Send an HTML Email?';
$lang['fesubmit_email_subject'] = 'Email Subject';
$lang['general_options'] = 'تنظیمات عمومی بلاگ';
$lang['fesubmit_options'] = 'Frontend Blog Submit Options';
$lang['dflt_email_subject'] = 'A new blog entry been posted';
$lang['postdatetoolate'] = 'The post date entered is too late';
$lang['title_sysdefault_felist_template'] = 'System Default Frontend Article List Report Template';
$lang['title_sysdefault_fesubmit_template'] = 'System Default Frontend Submit Form Template';
$lang['addedit_felist_template'] = 'Add/Edit a Frontend Article List Report Template';
$lang['addedit_fesubmit_template'] = 'Add/Edit a Frontend Submit Form Template';
$lang['info_felist_templates'] = 'Available Frontend Article List Report Templates';
$lang['info_fesubmit_templates'] = 'Available Frontend Submit Form Templates';
$lang['felisttemplate'] = 'Frontend Article List Report Templates';
$lang['fesubmittemplate'] = 'Frontend Article Submission Form Templates';
$lang['help_year'] = 'Used with the default (summary) action, this parameter can contain a year for which all listings should be displayed';
$lang['info_urlprefix'] = 'This only applies when pretty urls are enabled either via mod_rewrite or internal pretty urls.  Additionally, this value is not used when a URL is specified for a blog article.';
$lang['url_prefix'] = 'Prefix to use on all URLS from the blog module';
$lang['friendlyname'] = 'Calguys Blog Module';
$lang['select_category'] = 'You must select at least one category';
$lang['set_default'] = 'Set as Default';
$lang['category_deleted'] = 'مجموعه حذف شد';
$lang['error_dberror'] = 'Some type of database error has occurred.  Contact your administrator';
$lang['category_added'] = 'مجموعه اضافه شد';
$lang['category_name_exists'] = 'A category by that name already exists';
$lang['error_insufficient_params'] = 'Insufficient or invalid parameters provided for the action';
$lang['add_category'] = 'اضافه کردن مجموعه';
$lang['addedit_summary_template'] = 'Add/Edit a Summary View Template';
$lang['addedit_detail_template'] = 'Add/Edit a Detail View Template';
$lang['addedit_browsecat_template'] = 'Add/Edit a Browse Category View Template';
$lang['info_summary_templates'] = 'Available Summary Templates';
$lang['info_detail_templates'] = 'Available Detail View Templates';
$lang['info_browsecat_templates'] = 'Available Browse Category View Templates';
$lang['title_sysdefault_browsecat_template'] = 'System Default Browse Category Template';
$lang['title_sysdefault_detail_template'] = 'System Default Detail View Template';
$lang['title_sysdefault_summary_template'] = 'System Default Summary View Template';
$lang['info_sysdefault_template'] = 'This template specifies the content included when you create a new template of the specified type.  Making changes here will have no immediate effect on the output';
$lang['expired_searchable'] = 'Expired blog entries can appear in search results';
$lang['helpshowall'] = 'If set to a non zero value, show all blog entries, irrespective of end date';
$lang['error_invaliddates'] = 'One or more of the dates entered were invalid';
$lang['notify_n_draft_items_sub'] = '%d Blog Entries(s)';
$lang['notify_n_draft_items'] = 'You have %s that is/are not published';
$lang['unlimited'] = 'نامحدود';
$lang['none'] = 'None';
$lang['anonymous'] = 'Anonymous';
$lang['unknown'] = 'Unknown';
$lang['allow_summary_wysiwyg'] = 'Allow using a WYSIWYG editor on the summary field';
$lang['title_browsecat_template'] = 'Browse Category Template Editor';
$lang['title_browsecat_sysdefault'] = 'Default Browse category Template';
$lang['browsecattemplate'] = 'Browse Category Templates';
$lang['error_filesize'] = 'An uploaded file exceeded the maximum allowed size';
$lang['post_date_desc'] = 'Post Date Descending';
$lang['post_date_asc'] = 'Post Date Ascending';
$lang['expiry_date_desc'] = 'Expiry Date Descending';
$lang['expiry_date_asc'] = 'Expiry Date Ascending';
$lang['title_desc'] = 'Title Descending';
$lang['title_asc'] = 'Title Ascending';
$lang['error_invalidfiletype'] = 'Cannot upload this type of file';
$lang['error_upload'] = 'Problem occurred uploading a file';
$lang['error_movefile'] = 'Could not create file: %s';
$lang['error_mkdir'] = 'Could not create directory: %s';
$lang['expiry_interval'] = 'The number of days (by default) before an entry expires (if expiry is selected)';
$lang['removed'] = 'Removed';
$lang['delete_selected'] = 'Delete Selected Entries';
$lang['areyousure_deletemultiple'] = 'Are you sure you want to delete all of these blog entries?\nThis action cannot be undone!';
$lang['error_templatenamexists'] = 'A template by that name already exists';
$lang['error_noarticlesselected'] = 'No Blog Entries Were Selected';
$lang['reassign_category'] = 'Change Category To';
$lang['select'] = 'Select';
$lang['approve'] = 'Set Status to &#039;Published&#039;';
$lang['revert'] = 'Set Status to &#039;Draft&#039;';
$lang['hide_summary_field'] = 'Hide the summary field when adding or editing entries';
$lang['textbox'] = 'Text Input';
$lang['checkbox'] = 'Checkbox';
$lang['textarea'] = 'Text Area';
$lang['file'] = 'File';
$lang['auto_create_thumbnails'] = 'Automatically create thumbnail files for files with these extensions';
$lang['fielddefupdated'] = 'Field Definition Updated';
$lang['editfielddef'] = 'Edit Field Definition';
$lang['up'] = 'بالا';
$lang['down'] = 'پایین';
$lang['fielddefdeleted'] = 'Field Definition Deleted';
$lang['nameexists'] = 'A field by that name already exists';
$lang['notanumber'] = 'Maximum Length is Not a Number';
$lang['fielddef'] = 'Field Definition';
$lang['fielddefadded'] = 'Field Definition Successfully Added';
$lang['public'] = 'Public';
$lang['type'] = 'Type';
$lang['info_maxlength'] = 'The maximum length only applies to text input fields.';
$lang['maxlength'] = 'Maximum Length';
$lang['addfielddef'] = 'Add Field Definition';
$lang['customfields'] = 'Field Definitions';
$lang['deprecated'] = 'unsupported';
$lang['extra'] = 'Extra';
$lang['uploadscategory'] = 'Uploads Category';
$lang['title_available_templates'] = 'Available Templates';
$lang['resettodefault'] = 'Reset to Factory Defaults';
$lang['prompt_templatename'] = 'نام قالب';
$lang['prompt_template'] = 'Template Source';
$lang['template'] = 'قالب';
$lang['prompt_name'] = 'نام';
$lang['prompt_default'] = 'پیشفرض';
$lang['prompt_newtemplate'] = 'ساخت یک قالب جدید';
$lang['help_pagelimit'] = 'Maximum number of items to display (per page).  If this parameter is not supplied all matching items will be displayed.  If it is, and there are more items available than specified in the parameter, text and links will be supplied to allow scrolling through the results';
$lang['prompt_page'] = 'صفحه';
$lang['firstpage'] = '<<';
$lang['prevpage'] = '<';
$lang['nextpage'] = '>';
$lang['lastpage'] = '>>';
$lang['prompt_of'] = 'of';
$lang['prompt_pagelimit'] = 'Page Limit';
$lang['prompt_sorting'] = 'Sort By';
$lang['title_filter'] = 'Filters';
$lang['published'] = 'Published';
$lang['draft'] = 'Draft';
$lang['expired'] = 'Expired';
$lang['author'] = 'نویسنده';
$lang['sysdefaults'] = 'Restore to defaults';
$lang['restoretodefaultsmsg'] = 'This operation will restore the template contents to their system defaults.  Are you sure you want to proceed?';
$lang['addarticle'] = 'Add Blog Entry';
$lang['articleadded'] = 'The entry was successfully added.';
$lang['articleaddeddraft'] = 'The entry was successfully added.  An administrator will review your entry for content and if approved will publish the article.';
$lang['articleupdated'] = 'The entry was successfully updated.';
$lang['articledeleted'] = 'The entry was successfully deleted.';
$lang['addcategory'] = 'Add Category';
$lang['addcgblogitem'] = 'Add Blog Entry';
$lang['allcategories'] = 'All Categories';
$lang['allentries'] = 'All Entries';
$lang['areyousure'] = 'Are you sure you want to delete?';
$lang['articles'] = 'Entries';
$lang['cancel'] = 'Cancel';
$lang['category'] = 'Category';
$lang['categories'] = 'Categories';
$lang['default_category'] = 'Default Category';
$lang['content'] = 'Content';
$lang['delete'] = 'Delete';
$lang['description'] = 'Add, edit and remove CGBlog entries';
$lang['detailtemplate'] = 'Detail Templates';
$lang['default_templates'] = 'Default Templates';
$lang['detailtemplateupdated'] = 'The updated Detail Template was successfully saved to the database.';
$lang['displaytemplate'] = 'Display Template';
$lang['edit'] = 'Edit';
$lang['enddate'] = 'End Date';
$lang['endrequiresstart'] = 'Entering an end date requires a start date also';
$lang['entries'] = '%s Entries';
$lang['status'] = 'Status';
$lang['expiry'] = 'Expiry';
$lang['filter'] = 'Filter';
$lang['more'] = 'More';
$lang['category_label'] = 'Category:';
$lang['author_label'] = 'Posted by:';
$lang['moretext'] = 'More Text';
$lang['name'] = 'Name';
$lang['cgblog_return'] = 'Return';
$lang['newcategory'] = 'New Category';
$lang['needpermission'] = 'You need the &#039;%s&#039; permission to perform that function.';
$lang['nocategorygiven'] = 'No Category Given';
$lang['startdatetoolate'] = 'The Start Date is too late (after end date?)';
$lang['nocontentgiven'] = 'No Content Given';
$lang['noitemsfound'] = '<strong>No</strong> items found for category: %s';
$lang['nopostdategiven'] = 'No Post Date Given';
$lang['note'] = '<em>Note:</em> Dates must be in a &#039;yyyy-mm-dd hh:mm:ss&#039; format.';
$lang['notitlegiven'] = 'No Title Given';
$lang['nonamegiven'] = 'No Name Given';
$lang['numbertodisplay'] = 'Number to Display (empty shows all records)';
$lang['print'] = 'Print';
$lang['postdate'] = 'Post Date';
$lang['postinstall'] = 'Make sure to set the &quot;Modify CGBlog&quot; permission on users who will be administering CGBlog items.';
$lang['selectcategory'] = 'Select Category';
$lang['showchildcategories'] = 'Show Child Categories';
$lang['sortascending'] = 'Sort Ascending';
$lang['startdate'] = 'Start Date';
$lang['startoffset'] = 'Start displaying at the nth item';
$lang['startrequiresend'] = 'Entering a start date requires an end date also';
$lang['submit'] = 'Submit';
$lang['summary'] = 'Summary';
$lang['summarytemplate'] = 'Summary Templates';
$lang['summarytemplateupdated'] = 'The CGBlog Summary Template was successfully updated.';
$lang['title'] = 'Title';
$lang['options'] = 'Options';
$lang['optionsupdated'] = 'The options were successfully updated.';
$lang['useexpiration'] = 'Use Expiration Date';
$lang['eventdesc-CGBlogArticleAdded'] = 'Sent when a blog entry is added.';
$lang['eventhelp-CGBlogArticleAdded'] = '<p>Sent when a blog entry is added.</p>
<h4>Parameters</h4>
<ul>
<li>&quot;cgblog_id&quot; - Id of the CGBlog entry</li>
<li>&quot;categories&quot; - An array of the selected categories</li>
<li>&quot;title&quot; - Title of the entry</li>
<li>&quot;content&quot; - Content of the entry</li>
<li>&quot;summary&quot; - Summary of the entry</li>
<li>&quot;status&quot; - Status of the entry (&quot;draft&quot; or &quot;publish&quot;)</li>
<li>&quot;start_time&quot; - Date the entry should start being displayed</li>
<li>&quot;end_time&quot; - Date the entry should stop being displayed</li>
<li>&quot;useexp&quot; - Whether the expiration date should be ignored or not</li>
</ul>
<p><strong>Note:</strong> Because this event is sent from numerous places, all parameters may not be sent with the event.  Data can be retrieved from the database given the supplied cgblog_id parameter.</p>
';
$lang['eventdesc-CGBlogArticleEdited'] = 'Sent when an entry is edited.';
$lang['eventhelp-CGBlogArticleEdited'] = '<p>Sent when an entry is edited.</p>
<h4>Parameters</h4>
<ul>
<li>&quot;cgblog_id&quot; - Id of the CGBlog article</li>
<li>&quot;categoris&quot; - Array of the selected categorie ids</li>
<li>&quot;title&quot; - Title of the entry</li>
<li>&quot;content&quot; - Content of the entry</li>
<li>&quot;summary&quot; - Summary of the entry</li>
<li>&quot;status&quot; - Status of the entry (&quot;draft&quot; or &quot;publish&quot;)</li>
<li>&quot;start_time&quot; - Date the entry should start being displayed</li>
<li>&quot;end_time&quot; - Date the entry should stop being displayed</li>
<li>&quot;useexp&quot; - Whether the expiration date should be ignored or not</li>
</ul>
';
$lang['eventdesc-CGBlogArticleDeleted'] = 'Sent when an entry is deleted.';
$lang['eventhelp-CGBlogArticleDeleted'] = '<p>Sent when an entry is deleted.</p>
<h4>Parameters</h4>
<ul>
<li>&quot;cgblog_id&quot; - Id of the CGBlog entry</li>
</ul>
';
$lang['eventdesc-CGBlogCategoryAdded'] = 'Sent when a category is added.';
$lang['eventhelp-CGBlogCategoryAdded'] = '<p>Sent when a category is added.</p>
<h4>Parameters</h4>
<ul>
<li>&quot;category_id&quot; - Id of the CGBlog category</li>
<li>&quot;name&quot; - Name of the CGBlog category</li>
</ul>
';
$lang['eventdesc-CGBlogCategoryEdited'] = 'Sent when a category is edited.';
$lang['eventhelp-CGBlogCategoryEdited'] = '<p>Sent when a category is edited.</p>
<h4>Parameters</h4>
<ul>
<li>&quot;category_id&quot; - Id of the CGBlog category</li>
<li>&quot;name&quot; - Name of the CGBlog category</li>
<li>&quot;origname&quot; - The original name of the CGBlog category</li>
</ul>
';
$lang['eventdesc-CGBlogCategoryDeleted'] = 'Sent when a category is deleted.';
$lang['eventhelp-CGBlogCategoryDeleted'] = '<p>Sent when a category is deleted.</p>
<h4>Parameters</h4>
<ul>
<li>&quot;category_id&quot; - Id of the deleted category </li>
<li>&quot;name&quot; - Name of the deleted category</li>
</ul>
';
$lang['help_articleid'] = 'This parameter is only applicable to the detail view.  It allows specifying which CGBlog entry to display in detail mode.  If the special value -1 is used, the system will display the newest, published, non expired entry.';
$lang['helpnumber'] = 'Maximum number of items to display (per page) -- leaving empty will show all items.  This is a synonym for the pagelimit parameter.';
$lang['helpstart'] = 'Start at the nth item -- leaving empty will start at the first item.';
$lang['helpcategory'] = 'Used in the summary, and archive views to display only items for the specified categories. <b>Use * after the name to show children.</b>  Multiple categories can be used if separated with a comma. Leaving empty, will show all categories.  This parameter also works for the frontend submit action, however only a single category name is supported.';
$lang['helpsummarytemplate'] = 'Use a separate database template for displaying the entry summary.  This template must exist and be visible in the summary template tab of the CGBlog admin, though it does not need to be the default.  If this parameter is not specified, then the current template marked as default will be used.';
$lang['helpbrowsecattemplate'] = 'Use a database template for displaying the category browser. This template must exist and be visible in the Browse Category Templates tab of the CGBlog admin, though it does not need to be the default.  If this parameter is not specified, then the current template marked as default will be used.';
$lang['helpdetailtemplate'] = 'Use a separate database template for displaying the entry detail. This template must exist and be visible in the detail template tab of the CGBlog admin, though it does not need to be the default.  If this parameter is not specified, then the current template marked as default will be used.  This parameter is not compatible with friendly urls.';
$lang['helpsortby'] = 'Field to sort by.  Options are: &quot;summary&quot;, &quot;cgblog_category&quot;, &quot;cgblog_title&quot;, &quot;cgblog_extra&quot;, &quot;end_time&quot;, &quot;start_time&quot;, &quot;random&quot;.  Defaults to &quot;cgblog_date&quot;. If &quot;random&quot; is specified, the sortasc param is ignored.';
$lang['helpsortasc'] = 'Sort cgblog items in ascending date order rather than descending.';
$lang['helpdetailpage'] = 'Page to display CGBlog details in.  This can either be a page alias or an id. Used to allow details to be displayed in a different template from the summary.  This parameter will have no effect when a URL is specified for a blog entry.  In that case, the default detail page preference in the CGBlog admin panel will be used.';
$lang['helpshowarchive'] = 'If set to a non zero value, show only expired cgblog entries.';
$lang['helpbrowsecat'] = 'Shows a browseable category list.';
$lang['helpaction'] = '&#039;Override the default action.  Possible values are:
<ul>
<li>&quot;archive&quot; - to displa an archive report of your blog entries.</li>
<li>&quot;detail&quot; - to display a specified entry in detail mode.</li>
<li>&quot;default&quot; - to display the summary view</li>
<li>&quot;browsecat&quot; - to display a browseable category list.</li>
<li>&quot;fesubmit&quot; - to display a form allowing site visitors to submit news articles.</li>
<li>&quot;myarticles&quot; - to display a report of all articles matching the current logged in FrontEndUser.</li>
</ul>';
?>
