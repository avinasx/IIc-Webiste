<?php
$lang['helpuglyurls'] = 'Applicable only to the browsecat action, this parameter will force the category browsing action to not generate pretty urls, therefor parameters used in the call to CGBlog can be passed through to the summary view';
$lang['helpnotcategory'] = 'Applicable to the default summary action, this parameter allows specifying a comma separated list of category names representing categories to NOT return in the results.  This parameter cannot be used with the category or categoryid parameters.';
$lang['info_default_showarchive'] = 'If enabled, only articles that have expired and would not normally show are displayed.  This option is ignored if showall is selected';
$lang['title_default_showarchive'] = 'Show Archived Articles';
$lang['title_default_showall'] = 'Show All Articles';
$lang['info_default_showall'] = 'If selected, all articles, regardless of status, or start and end date, will be displayed';
$lang['title_default_pagelimit'] = 'Default Page limit';
$lang['info_default_pagelimit'] = 'The page limit specifies how many articles will appear on each page.  Must be an integer value between 1 and 50000.';
$lang['info_default_sortorder'] = 'Sort order is not relevant when using random sorting';
$lang['info_default_sortby'] = 'Select the default sorting for summary views.  When using random sorting it is possible that entries will appear on multiple pages.';
$lang['sortorder_desc'] = 'Descending';
$lang['sortorder_asc'] = 'Ascending';
$lang['sortby_starttime'] = 'Article Start Date';
$lang['sortby_endtime'] = 'Article End Date';
$lang['sortby_random'] = 'Random Sorting';
$lang['sortby_extra'] = 'Article Extra Field';
$lang['sortby_summary'] = 'Article Summary';
$lang['sortby_category'] = 'Article category';
$lang['sortby_title'] = 'Article Title';
$lang['sortby_date'] = 'Article Date';
$lang['title_default_sortby'] = 'Default Sorting';
$lang['title_default_sortorder'] = 'Default Sortorder';
$lang['summary_options'] = 'Summary View Options';
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
$lang['fesubmit_redirect'] = 'PageID eller alias som skal viderstille til efter nyhedsartklen er sendt gennem fesubmit handlingen';
$lang['templaterestored'] = 'Template Restored';
$lang['fesubmit_status'] = 'Status for nyhedsartikler sendt via frontend';
$lang['fesubmit_email_users'] = 'Send notification (via email) to these users';
$lang['no'] = 'No';
$lang['yes'] = 'Yes';
$lang['fesubmit_email_template'] = 'Email Template';
$lang['fesubmit_email_html'] = 'Send an HTML Email?';
$lang['fesubmit_email_subject'] = 'Email Subject';
$lang['general_options'] = 'General Blog Options';
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
$lang['category_deleted'] = 'Category Deleted';
$lang['error_dberror'] = 'Some type of database error has occurred.  Contact your administrator';
$lang['category_added'] = 'Category Added';
$lang['category_name_exists'] = 'A category by that name already exists';
$lang['error_insufficient_params'] = 'Insufficient or invalid parameters provided for the action';
$lang['add_category'] = 'Add Category';
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
$lang['expired_searchable'] = 'Udl&oslash;bede artikler kan forekomme i s&oslash;geresultater';
$lang['helpshowall'] = 'Vis alle artikler, uden at tage hensyn til udl&oslash;bsdato';
$lang['error_invaliddates'] = 'En eller flere af datoerne er ugyldigt';
$lang['notify_n_draft_items_sub'] = '%d Nyhedsartikle(r)';
$lang['notify_n_draft_items'] = 'Du har %s som ikke er offentliggjort';
$lang['unlimited'] = 'Ubegr&aelig;nset';
$lang['none'] = 'Ingen';
$lang['anonymous'] = 'Anonym';
$lang['unknown'] = 'Ukendt';
$lang['allow_summary_wysiwyg'] = 'Tillad brug af WYSIWYG redigering af resum&eacute; feltet';
$lang['title_browsecat_template'] = 'Skabelon for gennemsyn af kategorier';
$lang['title_browsecat_sysdefault'] = 'Standardskabelon for gennemsyn af kategorier';
$lang['browsecattemplate'] = 'Gennemse kategori-skabelonerne';
$lang['error_filesize'] = 'En upload&#039;et fil var st&oslash;rre end den maksimalt tilladte st&oslash;rrelse';
$lang['post_date_desc'] = 'Oprettelsesdato faldende';
$lang['post_date_asc'] = 'Oprettelsesdato stigende';
$lang['expiry_date_desc'] = 'Udl&oslash;bsdato faldenden';
$lang['expiry_date_asc'] = 'Udl&oslash;bsdato stigende';
$lang['title_desc'] = 'Titel faldende';
$lang['title_asc'] = 'Titel stigende';
$lang['error_invalidfiletype'] = 'Kan ikke upload&#039;e filer af denne type';
$lang['error_upload'] = 'Fejl ved upload af til';
$lang['error_movefile'] = 'Kunne ikke oprette filen: %s';
$lang['error_mkdir'] = 'Kunne ikke oprette mappen: %s';
$lang['expiry_interval'] = 'Antallet af dage (standardv&aelig;rdi) f&oslash;r en artikel udl&oslash;ber (hvis udl&oslash;bsdato v&aelig;lges)';
$lang['removed'] = 'Fjernet';
$lang['delete_selected'] = 'Slet valgte artikler';
$lang['areyousure_deletemultiple'] = 'Er du sikker p&aring; disse artikler skal slettes?\nDenne handling kan ikke fortrydes';
$lang['error_templatenamexists'] = 'En skabelon med dette navn findes allerede';
$lang['error_noarticlesselected'] = 'Ingen artikler valgt';
$lang['reassign_category'] = 'Skift kategori til';
$lang['select'] = 'V&aelig;lg';
$lang['approve'] = 'S&aelig;t status til &#039;offentliggjort&#039;';
$lang['revert'] = 'S&aelig;t status til &#039;kladde&#039;';
$lang['hide_summary_field'] = 'Skjul resum&eacute;-feltet ved oprettelse eller redigering af artikler';
$lang['textbox'] = 'Tekst input';
$lang['checkbox'] = 'Afkrydsningsboks';
$lang['textarea'] = 'Tekstfelt';
$lang['file'] = 'Fil';
$lang['auto_create_thumbnails'] = 'Opret automatisk billedeksempler for filer af denne type';
$lang['fielddefupdated'] = 'Felt definition opdateret';
$lang['editfielddef'] = 'Redig&eacute;r felt definition';
$lang['up'] = 'Op';
$lang['down'] = 'Ned';
$lang['fielddefdeleted'] = 'Felt definition slettet';
$lang['nameexists'] = 'Et felt med det navn eksisterer allerede';
$lang['notanumber'] = 'Maksimal l&aelig;ngde er ikke et tal';
$lang['fielddef'] = 'Felt definition';
$lang['fielddefadded'] = 'Felt definitionen blev tilf&oslash;jet';
$lang['public'] = 'Offentlig';
$lang['type'] = 'Type';
$lang['info_maxlength'] = 'Den maksimale l&aelig;nge har kune relevans for tekst input felter';
$lang['maxlength'] = 'Maksimal l&aelig;ngde';
$lang['addfielddef'] = 'Tilf&oslash;j felt definition';
$lang['customfields'] = 'Felt definitioner';
$lang['deprecated'] = 'ikke underst&oslash;ttet';
$lang['extra'] = 'Ekstra';
$lang['uploadscategory'] = 'Uploads kategori';
$lang['title_available_templates'] = 'Tilg&aelig;ngelige skabeloner';
$lang['resettodefault'] = 'Gendan fabriks indstillinger';
$lang['prompt_templatename'] = 'Skabelon navn';
$lang['prompt_template'] = 'Skabelon kode';
$lang['template'] = 'Skabelon';
$lang['prompt_name'] = 'Navn';
$lang['prompt_default'] = 'Standard';
$lang['prompt_newtemplate'] = 'Opret en ny  skabelon';
$lang['help_pagelimit'] = 'Maksimalt antal indl&aelig;g der skal vises (pr. side). Hvis dette parameter ikke angives vil alle indl&aelig;g blive vist. Hvis det er angivet, og der er flere indl&aelig;g end der angives, vil der vises tekst og links til at bladre mellem indl&aelig;ggene.';
$lang['prompt_page'] = 'Side';
$lang['firstpage'] = '<<';
$lang['prevpage'] = '<';
$lang['nextpage'] = '>';
$lang['lastpage'] = '>>';
$lang['prompt_of'] = 'af';
$lang['prompt_pagelimit'] = 'Side gr&aelig;nse';
$lang['prompt_sorting'] = 'Sort&eacute;r p&aring;';
$lang['title_filter'] = 'Filtre';
$lang['published'] = 'Udgivet';
$lang['draft'] = 'Kladde';
$lang['expired'] = 'Udl&oslash;bet';
$lang['author'] = 'Forfatter';
$lang['sysdefaults'] = 'Nulstil til standardv&aelig;rdier';
$lang['restoretodefaultsmsg'] = 'Denne handling vil genoprette skabeloner til deres standardform. Er du sikker p&aring; de vil forts&aelig;tte?';
$lang['addarticle'] = 'Tilf&oslash;j artikel';
$lang['articleadded'] = 'Artiklen blev tilf&oslash;jet.';
$lang['articleaddeddraft'] = 'The entry was successfully added.  An administrator will review your entry for content and if approved will publish the article.';
$lang['articleupdated'] = 'Artiklen blev &aelig;ndret.';
$lang['articledeleted'] = 'Artiklen blev slettet';
$lang['addcategory'] = 'Tilf&oslash;j kategori';
$lang['addcgblogitem'] = 'Tilf&oslash;j nyhed';
$lang['allcategories'] = 'Alle katagorier';
$lang['allentries'] = 'Alle indl&aelig;g';
$lang['areyousure'] = 'Er du sikker p&aring; dette skal slettes?';
$lang['articles'] = 'Artikler';
$lang['cancel'] = 'Fortryd';
$lang['category'] = 'Kategori';
$lang['categories'] = 'Kategorier';
$lang['default_category'] = 'Standard kategori';
$lang['content'] = 'Indhold';
$lang['delete'] = 'Slet';
$lang['description'] = 'Tilf&oslash;j, redig&eacute;r og slet nyheder';
$lang['detailtemplate'] = 'Detaljeret skabelon';
$lang['default_templates'] = 'Standard skabeloner';
$lang['detailtemplateupdated'] = 'Den opdaterede skabelon til detaljeret visning blev gemt i databasen.';
$lang['displaytemplate'] = 'Vis skabelon';
$lang['edit'] = 'Redig&eacute;r';
$lang['enddate'] = 'Slut dato';
$lang['endrequiresstart'] = 'Angivelse af en slutdato kr&aelig;ver en startdato';
$lang['entries'] = '%s Indl&aelig;g';
$lang['status'] = 'Status';
$lang['expiry'] = 'Udl&oslash;b';
$lang['filter'] = 'Filter';
$lang['more'] = 'Mere';
$lang['category_label'] = 'Kategori:';
$lang['author_label'] = 'Skrevet af:';
$lang['moretext'] = 'Mere tekst';
$lang['name'] = 'Navn';
$lang['cgblog_return'] = 'Tilbage';
$lang['newcategory'] = 'Ny kategori';
$lang['needpermission'] = 'Du skal have tilladelsen \&#039;%s\&#039; for at kunne udf&oslash;re den funktion.';
$lang['nocategorygiven'] = 'Ingen kategori angivet';
$lang['startdatetoolate'] = 'Startdatoen er for sen (efter slutdato?)';
$lang['nocontentgiven'] = 'Intet indhold angivet';
$lang['noitemsfound'] = '<strong>Ingen</strong> nyheder fundet for kategorien: %s';
$lang['nopostdategiven'] = 'Ingen oprettelsesdato angivet';
$lang['note'] = '<em>Bem&aelig;rk:</em> Datoer skal angives i formatet: &#039;yy-mm-dd tt:mm:ss&#039; format.';
$lang['notitlegiven'] = 'Ingen title angivet';
$lang['nonamegiven'] = 'Intet navn angivet';
$lang['numbertodisplay'] = 'Antal der skal vises (blank viser alle nyheder)';
$lang['print'] = 'Udskriv';
$lang['postdate'] = 'Oprettelsesdato';
$lang['postinstall'] = 'Kontroll&eacute;r at tilladelsen &quot;Modify CGBlog&quot; er sl&aring;et til for brugere der skal kunne administrere Nyheder.';
$lang['selectcategory'] = 'V&aelig;lg kategori';
$lang['showchildcategories'] = 'Vis under kategorier';
$lang['sortascending'] = 'Sort&eacute;r stigende';
$lang['startdate'] = 'Start dato';
$lang['startoffset'] = 'Begynd visning ved det n&#039;te element';
$lang['startrequiresend'] = 'Angivelse af en start dato kr&aelig;ver en slutdato';
$lang['submit'] = 'Send';
$lang['summary'] = 'Resum&eacute;';
$lang['summarytemplate'] = 'Resum&eacute; skabelon';
$lang['summarytemplateupdated'] = 'Skabelonen til resum&eacute; af nyheder blev opdateret.';
$lang['title'] = 'Titel';
$lang['options'] = 'Indstillinger';
$lang['optionsupdated'] = 'Indstillingerne blev gemt.';
$lang['useexpiration'] = 'Benyt udl&oslash;bsdato';
$lang['eventdesc-CGBlogArticleAdded'] = 'Sendes n&aring;r en artikel tilf&oslash;jes.';
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
<p><strong>Note:</strong> Because this event is sent from numerous places, all parameters may not be sent with the event.  Data can be retrieved from the database given the supplied cgblog_id parameter.</p>';
$lang['eventdesc-CGBlogArticleEdited'] = 'Sendes n&aring;r en artikel redigeres.';
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
$lang['eventdesc-CGBlogArticleDeleted'] = 'Sendes n&aring;r en artikel slettes.';
$lang['eventhelp-CGBlogArticleDeleted'] = '<p>Sent when an entry is deleted.</p>
<h4>Parameters</h4>
<ul>
<li>&quot;cgblog_id&quot; - Id of the CGBlog entry</li>
</ul>
';
$lang['eventdesc-CGBlogCategoryAdded'] = 'Sendes n&aring;r en kategori tilf&oslash;jes.';
$lang['eventhelp-CGBlogCategoryAdded'] = '<p>Sent when a category is added.</p>
<h4>Parameters</h4>
<ul>
<li>&quot;category_id&quot; - Id of the CGBlog category</li>
<li>&quot;name&quot; - Name of the CGBlog category</li>
</ul>
';
$lang['eventdesc-CGBlogCategoryEdited'] = 'Sendes n&aring;r en kategori redigeres.';
$lang['eventhelp-CGBlogCategoryEdited'] = '<p>Sent when a category is edited.</p>
<h4>Parameters</h4>
<ul>
<li>&quot;category_id&quot; - Id of the CGBlog category</li>
<li>&quot;name&quot; - Name of the CGBlog category</li>
<li>&quot;origname&quot; - The original name of the CGBlog category</li>
</ul>
';
$lang['eventdesc-CGBlogCategoryDeleted'] = 'Sendes n&aring;r en kategori slettes.';
$lang['eventhelp-CGBlogCategoryDeleted'] = '<p>Sent when a category is deleted.</p>
<h4>Parameters</h4>
<ul>
<li>&quot;category_id&quot; - Id of the deleted category </li>
<li>&quot;name&quot; - Name of the deleted category</li>
</ul>';
$lang['help_articleid'] = 'This parameter is only applicable to the detail view.  It allows specifying which cgblog article to display in detail mode.  If the special value -1 is used, the system will display the newest, published, non expired article.';
$lang['helpnumber'] = 'Maximum number of items to display (per page) -- leaving empty will show all items.  This is a synonym for the pagelimit parameter.';
$lang['helpstart'] = 'Start ved det n&#039;te element - hvis intet er angivet startes ved det f&oslash;rste element.';
$lang['helpcategory'] = 'Used in the summary, and archive views to display only items for the specified categories. <b>Use * after the name to show children.</b>  Multiple categories can be used if separated with a comma. Leaving empty, will show all categories.  This parameter also works for the frontend submit action, however only a single category name is supported.';
$lang['helpsummarytemplate'] = 'Use a separate database template for displaying the entry summary.  This template must exist and be visible in the summary template tab of the CGBlog admin, though it does not need to be the default.  If this parameter is not specified, then the current template marked as default will be used.';
$lang['helpbrowsecattemplate'] = 'Use a database template for displaying the category browser. This template must exist and be visible in the Browse Category Templates tab of the CGBlog admin, though it does not need to be the default.  If this parameter is not specified, then the current template marked as default will be used.';
$lang['helpdetailtemplate'] = 'Use a separate database template for displaying the entry detail. This template must exist and be visible in the detail template tab of the CGBlog admin, though it does not need to be the default.  If this parameter is not specified, then the current template marked as default will be used.  This parameter is not compatible with friendly urls.';
$lang['helpsortby'] = 'Field to sort by.  Options are: &quot;summary&quot;, &quot;cgblog_category&quot;, &quot;cgblog_title&quot;, &quot;cgblog_extra&quot;, &quot;end_time&quot;, &quot;start_time&quot;, &quot;random&quot;.  Defaults to &quot;cgblog_date&quot;. If &quot;random&quot; is specified, the sortasc param is ignored.';
$lang['helpsortasc'] = 'Sort&eacute;r nyheder i stigende r&aelig;kkef&oslash;lge i stedet for faldende.';
$lang['helpdetailpage'] = 'Page to display CGBlog details in.  This can either be a page alias or an id. Used to allow details to be displayed in a different template from the summary.  This parameter will have no effect when a URL is specified for a blog entry.  In that case, the default detail page preference in the CGBlog admin panel will be used.';
$lang['helpshowarchive'] = 'If set to a non zero value, show only expired cgblog entries.';
$lang['helpbrowsecat'] = 'Shows a browseable category list.';
$lang['helpaction'] = '&#039;Override the default action.  Possible values are:
<ul>
<li>&amp;quot;archive&amp;quot; - to displa an archive report of your blog entries.</li>
<li>&amp;quot;detail&amp;quot; - to display a specified entry in detail mode.</li>
<li>&amp;quot;default&amp;quot; - to display the summary view</li>
<li>&amp;quot;browsecat&amp;quot; - to display a browseable category list.</li>
<li>&amp;quot;fesubmit&amp;quot; - to display a form allowing site visitors to submit news articles.</li>
<li>&amp;quot;myarticles&amp;quot; - to display a report of all articles matching the current logged in FrontEndUser.</li>
</ul>';
?>
