<ul>
<li><strong>Version 2.3.2</strong> - 19 July 2017
	<ul>
	<li>Update Plupload to version 2.3.1</li>
	<li>Bug #11497: fixed - Upload files with action do-upload</li>
	</ul>
</li>
<li><strong>Version 2.3.1</strong> - 22 March 2017
	<ul>
	<li>Revert update Plupload to version 2.1.8 because of unwanted upscaling</li>
	<li>Bug #11150: fixed - Duplicating template issue</li>
	</ul>
</li>
<li><strong>Version 2.3</strong> - 12 February 2017
	<ul>
	<li>Update Plupload to version 2.2.1</li>
	<li>Permission for backend users/usergroups to delete (sub)galleries, sponsored by Rolf</li>
	</ul>
</li>
<li><strong>Version 2.2</strong> - 1 December 2016
	<ul>
	<li>Search individual images in stead of subgalleries, sponsored by id-a.co.uk</li>
	</ul>
</li>
<li><strong>Version 2.1.6</strong> - 23 June 2016
	<ul>
	<li>Bug #11037: fixed - Icon error for TinyMCE</li>
	<li>Bug #11047: fixed - No more french translation files</li>
	</ul>
</li>
<li><strong>Version 2.1.5</strong> - 17 May 2016
	<ul>
	<li>Bug #11033: fixed - Error : Undefined Variable : Using action="showrandom"</li>
	</ul>
</li>
<li><strong>Version 2.1.4</strong> - 25 April 2016
	<ul>
	<li>Add column jsposition in case a previous upgrade has went wrong</li>
	<li>Bug #10960: fixed - No file upload with some providers</li>
	</ul>
</li>
<li><strong>Version 2.1.3</strong> - 25 March 2016
	<ul>
	<li>Bug #10866: fixed - PHP Notice:  Undefined index: jsposition in action.default.php on line 389</li>
	</ul>
</li>
<li><strong>Version 2.1.2</strong> - 21 March 2016
	<ul>
	<li>Fix for upgrading directly from version 2.0.2</li>
	<li>Fix for gallerytemplates without stylesheet</li>
	</ul>
</li>
<li><strong>Version 2.1.1</strong> - 15 March 2016
	<ul>
	<li>New icons</li>
	<li>Bug #10842: fixed - lightbox.min.map is not included in the templates/lightbox folder</li>
	<li>Bug #10877: fixed - Sorting not working in Gallery 2.1 on CMSMS 2.1.2 (by undoing the fix for bug #10673)</li>
	<li>Bug #10908: fixed - TinyMCE plugins shows empty Gallery title</li>
	<li>Fix for PHP Notice:  Undefined index: jsposition in action.edittemplate.php on line 122</li>
	</ul>
</li>
<li><strong>Version 2.1</strong> - 12 January 2016
	<ul>
	<li>TinyMCE plugin Gallery Picker for CMSms 2.x</li>
	<li>Option to insert javascript in the head or at the end of the body element</li>
	<li>Update Plupload to version 2.1.8</li>
	<li>Update prettyPhoto to version 3.1.6</li>
	<li>Update Lightbox to version 2.8.2</li>
	<li>Bug #8426: fixed - PrettyPhoto and browser Back button</li>
	<li>Bug #8704: fixed - doesn't work with Simplex template</li>
	<li>Bug #9368: fixed - javascript template should rather be inserted at the bottom of the page</li>
	<li>Bug #10637: fixed - all display templates broken except lightbox and maybe slimbox in simplex theme</li>
	<li>Bug #10673: fixed - Sort doesn't work properly</li>
	</ul>
</li>
<li><strong>Version 2.0.3</strong> - 14 October 2015
	<ul>
	<li>Bug #10682: fixed - Parameter 2 to SmartyBC::assign_by_ref() expected to be a reference</li>
	</ul>
</li>
<li><strong>Version 2.0.2</strong> - 12 April 2015
	<ul>
	<li>Merged the two buttons 'select images' and 'upload images' into one button 'upload images'</li>
	<li>Bug #8330: fixed - pretty url problem in action gallerytree</li>
	<li>Bug #8834: fixed - W3C Validation error with template name containing spaces</li>
	<li>Bug #10372: fixed - XML code when creating a new template</li>
	</ul>
</li>
<li><strong>Version 2.0.1</strong> - 25 July 2014
	<ul>
	<li>Include AD-Gallery version 1.2.7</li>
	<li>Include Cycle Lite version 1.7</li>
	<li>Include Lightbox version 2.7.1</li>
	<li>Include Slimbox version 2.05</li>
	<li>Bug #9804: fixed - Upgrade prettyPhoto to version 3.1.5</li>
	<li>minor fix for some textareas</li>
	<li>fix for undefined variable: themeObject in field definition tab</li>
	</ul>
</li>
<li><strong>Version 2.0</strong> - 4 July 2014
	<ul>
	<li>Changes to make module CMSms 2.0 compatible</li>
	<li>Minimum required CMSms version set to 1.11</li>
	<li>Pass custom fields with 'gallerytree' action (FR #7727)</li>
	<li>Show gallery title in gallery list (FR #8299)</li>
	<li>Possibility to disable automatic resizing on original (FR #8867)</li>
	<li>Get the parent gallery ID (FR #9065)</li>
	<li>Remove SWFUpload and replace with Plupload (FR #9842)</li>
	<li>302 error on upload of .gif image (FR #10052)</li>
	<li>Fix for notices in editgallery action</li>
	<li>Bug #8756: fixed - Permission settings</li>
	<li>Bug #8844: fixed - Error #2032 and time out in script in frontend</li>
	<li>Bug #9167: fixed - Error when using 'showrandom' action</li>
	<li>Bug #9188: fixed - Can't browse subgallery when folder name contains dot character</li>
	<li>Bug #9430: fixed - Images not showing when dot is in path</li>
	<li>Bug #9839: fixed - PHP Strict Standards: Only variables should be assigned by reference</li>
	<li>Bug #9852: fixed - swfupload not working</li>
	<li>Bug #9898: fixed - Smarty $fields variable is not set when calling Gallery for a single image, with the img= parameter</li>
	<li>Bug #9973: fixed - Error js after each img while uploading</li>
	</ul>
</li>
<li><strong>Version 1.6.1</strong> - 28 March 2013
	<ul>
	<li>Fix for vulneribility issue</li>
	<li>Bug #8220: fixed - delete action from Galleries-list</li>
	<li>Bug #8716: fixed - Deleting images and gallery non working</li>
	<li>Bug #8803: fixed - Missing cms_html_entity_decod in method.install.php</li>
	<li>Bug #8661/#8999: fixed - Error message "Notice: Array to string conversion"</li>
	</ul>
</li>
<li><strong>Version 1.6</strong> - 15 July 2012
	<ul>
	<li>Permissions for backend users/usergroups to edit (sub)galleries, sponsored by Mantlet</li>
	<li>Changed the default set of preinstalled Gallerytemplates</li>
	<li>Update Lightbox Gallerytemplate to version 2.51, image comments are now included by default</li>
	<li>The template parameter can now also be used in combination with the img and id parameter (single image calls)</li>
	<li>Added name attribute for GalleryDropdown() (FR #8041)</li>
	<li>Bugfix on the upgrade script</li>
	<li>Bug #8107: fixed - deleted option for custom field type "file"</li>
	</ul>
</li>
<li><strong>Version 1.5.3</strong> - 21 March 2012
	<ul>
	<li>Minor change to the showrandom, showlatest, showlatestdir actions</li>
	<li>Minor bugfix on the install script</li>
	<li>Bugfix on the upgrade script</li>
	</ul>
</li>
<li><strong>Version 1.5.2</strong> - 16 February 2012
	<ul>
	<li>Minor bugfix for pretty-urls and gallerytree action</li>
	</ul>
</li>
<li><strong>Version 1.5.1</strong> - 14 February 2012
	<ul>
	<li>Minor bugfix for pretty-urls</li>
	</ul>
</li>
<li><strong>Version 1.5</strong> - 12 February 2012
	<ul>
	<li>Minimum required CMSms version set to 1.10</li>
	<li>Added function to manually edit thumbnails per image (FR #5693, #6187) Thanks Cybrian for sponsoring</li>
	<li>Added function to manually rotate images clockwise or anticlockwise</li>
	<li>Supports "Lazy Loading" (though no effect due to registering to ContentPostRender event)</li>
	<li>Added parameter id</li>
	<li>Added smarty variables $gallerydate (FR #6231) and $gallerydir (FR #6522)</li>
	<li>Added option to have new galleries not active (FR #5705)</li>
	<li>Nothing gets added to the html head when there is no css or js (FR #6271)</li>
	<li>Added GalleryDropdown method, to be used in other modules</li>
	<li>Added options to set jpg resize quality</li>
	<li>Added jQuery UI datepicker for datefields</li>
	<li>Moved SWFUpload and jQuery scripts to lib directory</li>
	<li>Bug #6150: fixed - CSS files generated by gallery will not be found, if base tag is not supported by browser (or missing)</li>
	<li>Bug #6385: fixed - Call to undefined function in Modul Gallery (PostgreSQL compatible)</li>
	<li>Bug #6681: fixed - PNG resizing problem, SWFUpload code modification by CRAZY-Ivan (also FR #6154)</li>
	<li>Bug #7363: fixed - Action gallerytree gives blank page, cmsms 1.10 incompatibility issue</li>
	<li>Bug #7466: fixed - "With Selected" option doesn't show in admin when there is only one image in a Gallery</li>
	</ul>
</li>
<li><strong>Version 1.4.4</strong> - 6 February 2011
	<ul>
	<li>Ignore dot directories (FR #5901)</li>
	<li>Added smarty variable $image->active</li>
	<li>Bug #5991: fixed - MySQL error during installation (if MySQL version is higher then 5.0)</li>
	</ul>
</li>
<li><strong>Version 1.4.3</strong> - 4 December 2010
	<ul>
	<li>Added smarty variable $image->galleryid</li>
	<li>Minor bugfix for the CreateThumbnail function</li>
	</ul>
</li>
<li><strong>Version 1.4.2</strong> - 2 December 2010
	<ul>
	<li>Ability to use custom fields with action=showrandom/showlatest/showlatestdir</li>
	<li>Added smarty variable $image->gallery_url (FR #5501)</li>
	<li>Search results respect the chosen url-prefix</li>
	<li>Preserve transparency for gif thumbnails</li>
	<li>Bugfix for the show='inactive' parameter</li>
	<li>Bug #5395: fixed - Update Fancybox Gallerytemplate to version 1.3.4</li>
	<li>Bug #5581: fixed - Custom fields were not saved when creating a new subgallery</li>
	<li>Bug #5658: fixed - Don't allow Maximum Image Width/Height options to be empty</li>
	</ul>
</li>
<li><strong>Version 1.4.1</strong> - 30 August 2010
	<ul>
	<li>Bug #5309: fixed - the drag&amp;drop sort function does not work in cmsms 1.8.2</li>
	<li>prevent error when saving a gallery with only subgalleries in it</li>
	</ul>
</li>
<li><strong>Version 1.4</strong> - 18 August 2010
	<ul>
	<li>New action gallerytree</li>
	<li>Define custom fields for galleries or images</li>
	<li>Added smarty variables $numimages and $numdirs</li>
	<li>Editable url-prefix for mod_rewrite/pretty_urls</li>
	<li>Automatic refresh of the page after image upload</li>
	<li>New 'Add subgallery' button in first tab galleries list (FR #5087)</li>
	<li>Edit date of images and subgalleries (FR #5142)</li>
	<li>Gallery folder setting (FR #5232)</li>
	<li>Minor bugfix in moveto function</li>
	<li>Bug #5159: fixed - drop chmod of thumbnails</li>
	<li>Bug #4690: fixed - Install fails with no feedback if Modules folder not writeable</li>
	<li>Bug #4873: fixed - unalowed characters should be replaced in directoryname</li>
	<li>Bug #4735: fixed - error with filenames</li>
	</ul>
</li>
<li><strong>Version 1.3.2</strong> - 4 July 2010
	<ul>
	<li>Bug #5127: fixed - Gallery doesn't work with CMSms 1.8</li>
	</ul>
</li>
<li><strong>Version 1.3.1</strong> - 3 July 2010
	<ul>
	<li>Fix for image upload on some Windows servers</li>
	<li>Update Fancybox Gallerytemplate to version 1.3.1</li>
	<li>Update Slimbox Gallerytemplate to version 2.04</li>
	<li>Fixed export Gallerytemplates including files</li>
	<li>Applied the fix for Bugreport #4808 also to actions showrandom, showlatest and showlatestdir</li>
	<li>Bug #5034: fixed - $image->titlename does not work</li>
	<li>Bug #4634: fixed - php errors on empty imagefiles</li>
	<li>Bug #5086: fixed - Gallery's jQuery conflicts with other javascript libraries in admin back-end</li>
	</ul>
</li>
<li><strong>Version 1.3</strong> - 2 May 2010
	<ul>
	<li>multiple image upload and client side image resize with SWFUpload</li>
	<li>deletefunction for galeries and bulk or separate images</li>
	<li>Fixed a bug related to assigning the albumcover of a subgallery as albumcover</li>
	<li>Added TinyMCE Gallery Picker code (by Stikki)</li>
	<li>Added smarty variable $currentpage (FR #4729)</li>
	<li>Added filename and titlename to image-object smarty variable. Changed $image->title to only show the title and not the filename anymore</li>
	<li>Bug #4712: fixed - Overwrite existing module templates even if unchecked</li>
	<li>Bug #4772: fixed - Collapse/expand doesn't work in IE</li>
	<li>Bug #4808: fixed - Multiple templates on one page removes previous stylesheets/javascripts</li>
	</ul>
</li>
<li><strong>Version 1.2.1</strong> - 3 March 2010
	<ul>
	<li>Fixed a bug that prevented installing the example moduletemplates during initial module install</li>
	<li>Update jQuery to version 1.4.2</li>
	<li>Update Fancybox system to version 1.3.0</li>
	</ul>
</li>
<li><strong>Version 1.2</strong> - 22 February 2010
	<ul>
	<li>Export/import function for Gallery templates</li>
	<li>Mark templates as hidden in the template dropdown for users without 'Modify Templates' permission</li>
	<li>Added backlink to list and breadcrumbs in Gallery editor (FR #4427)</li>
	<li>Added possibility to assign the subfolder's albumcover as albumcover for the parent (FR #4224)</li>
	<li>Added parameter 'targetpage' (FR #4298)</li>
	<li>Better handling for automatic deleting thumbs and added buttons to manualy delete thumbs (FR #4440)</li>
	<li>Bug #4439: fixed - Smarty Error when a non-exixting dir is called</li>
	</ul>
</li>
<li><strong>Version 1.1.2</strong> - 5 December 2009
	<ul>
	<li>Update Fancybox system to version 1.2.6</li>
	<li>Bug #4422: fixed - Error when sortingoption is empty</li>
	<li>Bug #4305: fixed - Built in check for templates/css directory</li>
	</ul>
</li>
<li><strong>Version 1.1.1</strong> - 12 November 2009
	<ul>
	<li>Bug #4294: fixed - Thumbfolder not created when upgrading</li>
	</ul>
</li>
<li><strong>Version 1.1</strong> - 8 November 2009
	<ul>
	<li>Added sorting and drag&amp;drop feature (FR #3907 #4210)</li>
	<li>Moved thumbnailsettings to templatestab</li>
	<li>Make galleries searchable (FR #3956)</li>
	<li>Create backend thumbs if they don't exist in IM (FR #4101)</li>
	<li>Added fileid to image-object (FR #4259)</li>
	<li>Bug #4027: fixed</li>
	</ul>
</li>
<li><strong>Version 1.0.3</strong> - 8 September 2009
	<ul>
	<li>Improved synchronizing the database to files</li>
	<li>and other minor improvements</li>
	<li>Bug #4001: fixed</li>
	</ul>
</li>
<li><strong>Version 1.0.2</strong> - 5 September 2009
	<ul>
	<li>Added templates Fancybox and Lytebox_slideshow (FR #3944 &amp; #3967)</li>
	<li>Bug #3983: fixed - spaces in directory names</li>
	</ul>
</li>
<li><strong>Version 1.0.1</strong> - 23 August 2009
	<ul>
	<li>Apply thumbnail-settings on 'Album-covers' (FR #3924)</li>
	<li>Added missing /div to thickbox-template</li>
	<li>fixed an issue with generating thumbnails when no thumbs available in ImageManager</li>
	<li>improved the naming of thumbs</li>
	<li>Prevent display the content of galleries that are set as inactive</li>
	<li>Bug #3927: fixed</li>
	<li>Bug #3931: fixed</li>
	</ul>
</li>
<li><strong>Version 1.0</strong> - 17 August 2009
	<ul>
	<li>Pagination parameters added</li>
	<li>Standard templates changed accordingly</li>
	<li>Extended the module-help</li>
	<li>Added functions to show random or latest images</li>
	<li>Support of pretty-urls</li>
	<li>Various improvements</li>
	</ul>
</li>
<li><strong>Version 0.6</strong> - 9 August 2009
	<ul>
	<li>Initial Beta Release</li>
	</ul>
</li>
</ul>
