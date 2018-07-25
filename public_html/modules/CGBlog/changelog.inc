<ul>
	<li>Version 1.15.3
		<li>Fix 404 exception issue in detail view (namespace issue).</li>
	        <li>Now ensure that only articles that CAN be displayed are displayed in detail view.</li>	
	</li>
	<li>Version 1.15.1
	<ul>
		<li>Fix errors caused in article list by not having CGSocialBlaster available.</li>
	</ul>

	<li>Version 1.15
	<ul>
		<li>Now requires CMSMS 2.2 or greater.</li>
		<li>Add two new field types to take advantage of the filepicker in CMSMS 2.2.</li>
		<li>Fixes the preview functionality.</li>
		<li>Adds the ability to auto-blast (in the background) new blog articles to CGSocialBlaster if CGSocialBlaster is installed and configured with at least one sender module.</li>
	</ul>
	</li>

<li>Version 1.14.1
  <ul>
    <li>Numerous minor bug fixes.</li>
  </ul>
</li>

<li>Version 1.14.1
   <ul>
	<li>Fixes issue in search indexing.</li>
	<li>Fixes some minor notices.</li>
   </ul>
</li>

<li>Version 1.14
    <ul>
        <li>Fixes to preview.</li>
        <li>Visual filter indicator.</li>
    </ul>
</li>

<li>Version 1.13
	<ul>
	<li>Added the adjust dates bulk action.</li>
	<li>Fixes some ajax issues in admin editarticle.</li>
        <li>Fixes minor issue with the CGSocialBlaster module.</li>
	<li>Force date format to be in %d/%m/%Y in the article list for sorting purposes. (1.13.4)</li>
	<li>Force date format to be in %Y/%m/%d in the article list for sorting purposes. (1.13.5)</li>
        <li>Fixes to showall functionality. (1.13.6)</li>
        <li>Minor fix to articlelist template.</li>
	</ul>
</li>

<li>Version 1.12.11
	<ul>
	<li>Minor improvements to default summary and detail templates.</li>
	<li>Remove {eval} from templates.</li>
	<li>Minor bug fixes.</li>
	</ul>
	</li>
<li>Version 1.12.10
	<ul>
	<li>Fix variable scope issues (use new smarty template object)
	  <p>Now need to use scope=global for the canonical URL, please adjust your templates.</p>
	</li>
	<li>Support smarty caching in all frontend report actions.</li>
	</ul>
	</li>

<li>Version 1.12.9
	<ul>
	<li>Minor bug fixes.</li>
	</ul>
	</li>

<li>Version 1.12.8
	<ul>
	<li><strong>Now Requires PHP 5.4.3 minimum.</strong></li>
	<li>Minor bug fixes.</li>
	<li>bump bependencies.</li>
	</ul>
	</li>

<li>Version 1.12.x
	<ul>
	<li>Adds nested categories.</li>
	<li>Rewrite fesubmit template to allow more customization and use some boostrap classes.
	   <br/>** Template updates may be necessary **
	</li>
	<li>Change secondary sort order to be post date descending</li>
	<li>Adds wysiwyg to edit category description <em>(1.12.5)</em></li>
	<li>Adds filtering, and entity decoding to frontend text and text area fields <em>(1.12.6)</em></li>
	<li>Adds LinkDefinitionGenerator class <em>(1.12.7)</em></li>
	</ul>
	</li>

<li>Version 1.11.x
	<ul>
	<li>Search now indexes custom fields</li>
	<li>Adds {cgblog_relative_article} plugin.</li>
	<li>Code cleanup and bug fixes.</li>
	<li>Convert to longtext for blog article.</li>
	<li>Adds title parameter for frontend filtering.</li>
	<li>Adds filtering by title and author in the admin.</li>
	<li>Adds author support to browsecat.</li>
	<li>Adds new &quot;review&quot; status.</li>
	<li>Adds fesubmit option to only notify administrators on certain statuses.</li>x
	<li>Adds simple search functionality to the myarticles action.</li>
	<li>Adds a new permission strictly for managing categories.</li>
	<li>Now need "Modify Site Preferences" permission to modify field definitions, as is consistent with other modules.</li>
	</ul>
	</li>

<li>Version 1.10.x
	<ul>
	<li>Now works as a &quot;Sender&quot; module for CGSocialBlaster.  You can send CGBlog article information to multiple social networks with just a few clicks.</li>
	</ul>
	</li>

<li>Version 1.9.x
	<ul>
	<li>Remove image processing functionality.  Use CGSmartImage.</li>
	<li>Add preview functionality in add/edit article in the admin.</li>
	<li>Several minor fixes.</li>
	<li>Updates field aliasing to be consistent between detail and summary views:
	<ul>
	  <li>Aliases now use munge string to url, but uses _ instead of -</li>
	  <li>The {$entry->field_alias} stuff is removed. This will break some sites, but is better for optimization purposes.</li>
	</ul>
	</li>
	<li>Adds year parameter to the archive view.</li>
	<li>Moves help from lang file.</li>
	<li>Modified to work with new JQueryTools</li>
	<li>Improvements for CMSMS 1.11.x</li>
	<li>Implements SearchResultsWithParams method.</li>
	<li>Numerous fixes.</li>
	</ul>
	</li>

<li>Version 1.8.3 - March 2012
	<ul>
	<li>Bug fixes.</li>
	</ul>
	</li>

<li>Version 1.8 - October 2011
  <ul>
    <li>Adds the notcategory parameter.</li>
    <li>Adds the uglyurls parameter for the browsecat action.</li>
    <li>Adds preferences on the options tab for more parameters.</li>
    <li>Export the category name to smarty if the categtoryid parameter is used to to generate the summary view (like browsecat does).</li>
  </ul>
</li>
<li>Version 1.7.6 - October 2011
  <ul>
    <li>Fixes some reference issues.</li>
    <li>Fixes a minor issue with the browsecat view also counting expired articles.</li>
  </ul>
</li>
<li>Version 1.7.5 - June 2011
  <ul>
    <li>Made some changes that will make 1.10 compatibility easier.</li>
    <li>Fixes a few minor bugs.</li>
  </ul>
</li>
<li>Version 1.7.2 - February 2011
  <ul>
    <li>Fixes pretty URLS in search results.</li>
  </ul>
</li>
<li>Version 1.7.1 - November 2010
  <ul>
    <li>Fixes bugs related to file and image upload fields.</li>
  </ul>
</li>
<li>Version 1.7 - November 2010
  <ul>
    <li>Adds a preference to change the module label.</li>
    <li>Convert the URL cretion to support CMSMS 1.9 routes stuff</li>
    <li>Adds a new preference to control url format. (its a smarty template, so you can use CGBs)</li>
    <li>Fixes issues with url creation from admin actions (like a sitemap)</li>
    <li>Fixes an issue with the upgrade routine... the url field should be added now unconditionally.</li>
    <li>Many minor bug fixes.</li>
  </ul>
</li>
</li>
<li>Many versions between 1.3.2 and 1.7 - many changes.</li>
<li>Version 1.3.2 - February 2010
<p>Minor bug fixes.</p>
</li>
<li>Version 1.3.1 - May 2009
<p>Minor bugfix to browsecat mode when pretty urls are off.</p>
</li>
<li>Version 1.3 - May 2009
<p>Add archive view... fixes to edit category, and category display in summary view.</p>
<li>Version 1.0.1 - April 2009
  <p>Remove debug statements and stuff that is specific to cms 1.6</p>
</li>
<li>
<p>Version: 1.0</p>
<p>This module is a hacked and extended version of <em>Ted Kulp\'s</em> CGBlog module.  I simply added another field to the database, and some more code to make that field worl.... I also re-cleaned the code a bit, so it was a little easier to read, other than that, it\'s Ted\'s code.</p>
</li>
</ul>
