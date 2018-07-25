<?php
$lang['author'] = 'Penulis';
$lang['sysdefaults'] = 'Dikembalikan ke bentuk asal';
$lang['restoretodefaultsmsg'] = 'Operasi ini akan mengembalikan isi template ke default sistem. Anda yakin untuk meneruskan proses ini ?';
$lang['addarticle'] = 'Tambah Artikel';
$lang['articleadded'] = 'Artikel telah berhasil ditambahkan.';
$lang['addcategory'] = 'Tambah kategori';
$lang['categoryadded'] = 'Kategori telah berhasil ditambahkan.';
$lang['categoryupdated'] = 'Kategori telah berhasil diperbaharui.';
$lang['addcgblogitem'] = 'Tambah berita';
$lang['allcategories'] = 'Seluruh kategori';
$lang['allentries'] = 'Seluruh masukan';
$lang['areyousure'] = 'Anda yakin untuk menghapus?';
$lang['articles'] = 'Artikel-artikel';
$lang['cancel'] = 'Ditunda';
$lang['category'] = 'Kategori';
$lang['categories'] = 'Kategori-kategori';
$lang['content'] = 'Content';
$lang['dateformat'] = '%s not in a valid yyyy-mm-dd hh:mm:ss format';
$lang['delete'] = 'Delete';
$lang['description'] = 'Add, edit and remove CGBlog entries';
$lang['detailtemplate'] = 'Detail Template';
$lang['detailtemplateupdated'] = 'The updated Detail Template was successfully saved to the database.';
$lang['displaytemplate'] = 'Display Template';
$lang['edit'] = 'Edit';
$lang['enddate'] = 'End Date';
$lang['endrequiresstart'] = 'Entering an end date requires a start date also';
$lang['entries'] = '%s Entries';
$lang['status'] = 'Status';
$lang['expiry'] = 'Expriry';
$lang['filter'] = 'Filter';
$lang['more'] = 'More';
$lang['moretext'] = 'More Text';
$lang['name'] = 'Name';
$lang['cgblog'] = 'CGBlog';
$lang['cgblog_return'] = 'Return';
$lang['newcategory'] = 'New Category';
$lang['needpermission'] = 'You need the &#039;%s&#039; permission to perform that function.';
$lang['nocategorygiven'] = 'No Category Given';
$lang['nocontentgiven'] = 'No Content Given';
$lang['noitemsfound'] = '<strong>No</strong> items found for category: %s';
$lang['nopostdategiven'] = 'No Post Date Given';
$lang['note'] = '<em>Note:</em> Dates must be in a &#039;yyyy-mm-dd hh:mm:ss&#039; format.';
$lang['notitlegiven'] = 'No Title Given';
$lang['numbertodisplay'] = 'Number to Display (empty shows all records)';
$lang['print'] = 'Print';
$lang['postdate'] = 'Post Date';
$lang['postinstall'] = 'Make sure to set the &quot;Modify CGBlog&quot; permission on users who will be administering CGBlog items.';
$lang['rssfeedtitle'] = 'CMS Made Simple RSS Feed';
$lang['rsstemplate'] = 'RSS Template';
$lang['selectcategory'] = 'Select Category';
$lang['showchildcategories'] = 'Show Child Categories';
$lang['sortascending'] = 'Sort Ascending';
$lang['startdate'] = 'Start Date';
$lang['startoffset'] = 'Start displaying at the nth item';
$lang['startrequiresend'] = 'Entering a start date requires an end date also';
$lang['submit'] = 'Submit';
$lang['summary'] = 'Summary';
$lang['summarytemplate'] = 'Summary Template';
$lang['summarytemplateupdated'] = 'The CGBlog Summary Template was successfully updated.';
$lang['title'] = 'Title';
$lang['options'] = 'Options';
$lang['optionsupdated'] = 'The options were successfully updated.';
$lang['useexpiration'] = 'Use Expiration Date';
$lang['showautodiscovery'] = 'Show Feed Auto-Discovery Link';
$lang['autodiscoverylink'] = 'Feed Auto-Discovery URL (blank for default)';
$lang['eventdesc-CGBlogArticleAdded'] = 'Sent when an article is added.';
$lang['eventhelp-CGBlogArticleAdded'] = '<p>Sent when an article is added.</p>
<h4>Parameters</h4>
<ul>
<li>\&quot;cgblog_id\&quot; - Id of the cgblog article</li>
<li>\&quot;category_id\&quot; - Id of the category for this article</li>
<li>\&quot;title\&quot; - Title of the article</li>
<li>\&quot;content\&quot; - Content of the article</li>
<li>\&quot;summary\&quot; - Summary of the article</li>
<li>\&quot;status\&quot; - Status of the article (&quot;draft&quot; or &quot;publish&quot;)</li>
<li>\&quot;start_time\&quot; - Date the article should start being displayed</li>
<li>\&quot;end_time\&quot; - Date the article should stop being displayed</li>
</ul>
';
$lang['eventdesc-CGBlogArticleEdited'] = 'Sent when an article is edited.';
$lang['eventhelp-CGBlogArticleEdited'] = '<p>Sent when an article is edited.</p>
<h4>Parameters</h4>
<ul>
<li>\&quot;cgblog_id\&quot; - Id of the cgblog article</li>
<li>\&quot;category_id\&quot; - Id of the category for this article</li>
<li>\&quot;title\&quot; - Title of the article</li>
<li>\&quot;content\&quot; - Content of the article</li>
<li>\&quot;summary\&quot; - Summary of the article</li>
<li>\&quot;status\&quot; - Status of the article (&quot;draft&quot; or &quot;publish&quot;)</li>
<li>\&quot;start_time\&quot; - Date the article should start being displayed</li>
<li>\&quot;end_time\&quot; - Date the article should stop being displayed</li>
</ul>
';
$lang['eventdesc-CGBlogArticleDeleted'] = 'Sent when an article is deleted.';
$lang['eventhelp-CGBlogArticleDeleted'] = '<p>Sent when an article is deleted.</p>
<h4>Parameters</h4>
<ul>
<li>\&quot;cgblog_id\&quot; - Id of the cgblog article</li>
</ul>
';
$lang['eventdesc-CGBlogCategoryAdded'] = 'Sent when a category is added.';
$lang['eventhelp-CGBlogCategoryAdded'] = '<p>Sent when a category is added.</p>
<h4>Parameters</h4>
<ul>
<li>\&quot;category_id\&quot; - Id of the cgblog categpry</li>
<li>\&quot;name\&quot; - Name of the cgblog category</li>
</ul>
';
$lang['eventdesc-CGBlogCategoryEdited'] = 'Sent when a category is edited.';
$lang['eventhelp-CGBlogCategoryEdited'] = '<p>Sent when a category is edited.</p>
<h4>Parameters</h4>
<ul>
<li>\&quot;category_id\&quot; - Id of the cgblog categpry</li>
<li>\&quot;name\&quot; - Name of the cgblog category</li>
</ul>
';
$lang['eventdesc-CGBlogCategoryDeleted'] = 'Sent when a category is deleted.';
$lang['eventhelp-CGBlogCategoryDeleted'] = '<p>Sent when a category is deleted.</p>
<h4>Parameters</h4>
<ul>
<li>\&quot;category_id\&quot; - Id of the cgblog categpry</li>
</ul>
';
$lang['helpnumber'] = 'Maximum number of items to display =- leaving empty will show all items.';
$lang['helpstart'] = 'Start at the nth item -- leaving empty will start at the first item.';
$lang['helpmakerssbutton'] = 'Make a button to link to an RSS feed of the CGBlog items.';
$lang['helpcategory'] = 'Only display items for that category. <b>Use * after the name to show children.</b>  Multiple categories can be used if separated with a comma. Leaving empty, will show all categories.';
$lang['helpmoretext'] = 'Text to display at the end of a cgblog item if it goes over the summary length.  Defaults to &quot;more...&quot;';
$lang['helpsummarytemplate'] = 'Use a separate template for displaying the article summary.  It have to live in modules/CGBlog/templates.';
$lang['helpdetailtemplate'] = 'Use a separate template for displaying the article detail.  It have to live in modules/CGBlog/templates.';
$lang['helpsortby'] = 'Field to sort by.  Options are: &quot;cgblog_date&quot;, &quot;summary&quot;, &quot;cgblog_data&quot;, &quot;cgblog_category&quot;, &quot;cgblog_title&quot;.  Defaults to &quot;cgblog_date&quot;.';
$lang['helpsortasc'] = 'Sort cgblog items in ascending date order rather than descending.';
$lang['helpdetailpage'] = 'Page to display CGBlog details in.  This can either be a page alias or an id. Used to allow details to be displayed in a different template from the summary.';
$lang['helpdateformat'] = 'Format to display the article&#039;s post date with.  This is based on the <a href=&quot;http://php.net/strftime&quot; target=&quot;_blank&quot;>strftime</a> function and can be used in your template with $entry->formatpostdate.  It defaults to %x, which is the default date format for the server&#039;s locale.';
?>
