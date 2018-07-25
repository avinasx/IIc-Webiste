be<h3>What does this do?</h3>
<p>CGBlog is a module for displaying blog events in your CMS Made Simple based website, similar to a blog style, except with more features!.  This module is a fork, and serious trimmed down version of the News module that is shipped with CMS Made Simple, with the emphasis being on creating a simple to use, yet powerful blog.</p>
<h3>Features</h3>
<ul>
  <li>Supports custom fields, allowing you to associate different data (including images), and files with blog entries</li>
  <li>Completely customizable via smarty templates.</li>
  <li>Supports nested categories.</li>
  <li>Supports pretty urls, including the ability to specify unique urls for blog articles.</li>
  <li>Supports expiry dates and start dates for blog entries.</li>
  <li>Supports published, and draft status so that you can work on a blog entry over time.</li>
  <li>Supports a single blog entry can belong to multiple categories.</li>
  <li>Supports a category browsing mechanism.</li>
  <li>Supports advanced filtering in many views.</li>
  <li>Supports multi-user blogs
    <ul>
      <li>Allows authorized frontend users to submit blog articles.</li>
      <li>Allows frontend users to manage their own blog articles.</li>
      <li>Allows filtering by author in summary view.</li>
    </ul>
  <li>Acts as a &quot;Sender&quot; module for CGSocialBlaster.</li>
  <li>More...</li>
  </li>
</ul>
<h3>How do I Use it?</h3>
<p>Using this module is as simple as creating some categories in the CGBlog admin panel, and then adding some blog entries.  To display the blog entries on your site you simply place the <code>{CGBlog}</code> tag into the content area of a page, or into a page template.  The default behaviour is to display a summary report of valid, published blog entries.  You can use the optional parameters (as described below) to alter the behaviour of the module.</p>
<h3>Pretty URLS</h3>
<p>Pretty URLS are ideal for websites where search engine optimization is a real concern.  It provides a shorter, friendlier URL that search engines will treat better, and that are easier to share.  However they come at a cost.  Particularly, many of the parameters specified in the call to CGBlog, that should be passed down to another view via a link cannot be passed on a pretty url.</p>
<p>For example, when pretty urls are not enabled it is possible to call the browsecat action like this: {CGBlog action=browsecat summarytemplate=somesummary detailtemplate=somedetail detailpage=mydetailpage pagelimit=25 sortby=cgblog_extra sortorder=asc}.  Now when the browsecat action generates its display, including links to summary views for each category, it should pass the summarytemplate,detailtemplate,detailpage,paglimit,sortby, and sortorder parameters along on the URL For the resulting summary view to use.   However, it is not possible to pass these parameters on a pretty URL, and to keep them &quot;pretty&quot;</p>
<p>To that end, it is possible to provide default values for most of these parameters via the CGBlog admin console.  This however, limits the flexibility of the module in some ways.  Another possibility is to use the {cge_module_hint} tag to provide behavioral hints to the module on destination pages.</p>
<h4>Article URL's</h4>
<p>This module allows the entry author or editor to specify a unique URL for each article.  Because there is no page-id on the URL the default detail page preference is used to determine the CMSMS conent page that will be displayed when rendering the entry.</p>
<h3>Thanks</h3>
<ul>
  <li>Thanks to Ted for the initial creation of this module... and for CMS Made Simple, obviously.</li>
  <li>Thanks to Mark for doing the grunt work of forking this module from News</li>
</ul>

<h3>Smarty Plugins</h3>
<ul>
  <li><code>{cgblog_relative_article article article=int [dir=string] [assign=string]}</code>
    <p>A simple plugin to retrieve the next, or previous published,unexpired article by post date.</p>
    <p>This plugin is intended to run in the detail view of the CGBlog module to retrieve the article id of the next or previous blog article from the supplied article id.  <strong>Note:</strong> This plugin does not provide filtering by category, author, custom fields, or anything else.  It is potentially an expensive operation and should not be used in a summary view.</p>
   <p>CGBlog provides the ability to generate a summary view based on multiple criteria and to display it different ways.  Each entry in a summary view normally provides a link to a detail view.  Multiple summary views with different criteria may generate the same detail view.  When displaying the detail view there is no way to know where the user came from <em>(which summary view)</em> the user came from or whether the user came to the detail view directly via a shared URL.  Therefore there is no way to automatically provide futher filtering capabilities to this plugin (i.e: author, category, etc).</p><br/>
    <p><strong>Parameters:</strong></p>
    <ul>
      <li><strong>*article=int</strong> - <em>(required)</em> - The current article id.</li>
      <li>dir=string - <em>(optional, default: "next")</em> - The direction to traverse.  Possible values are "prev" and "next".</li>
      <li>assign=string - <em>(optional)</em> - Assign the output to the named smarty variable.</li>
    </ul>

    <p><strong>Returns:</strong></p>
    <p>This plugin returns the integer id of the matching blog article on success.  On failure, null will be returned.</p>
  </li>
</ul>

<h3>Support</h3>
<p>The module author is in no way obligated to provide support for this code in any fashion.  However, there are a number of resources available to help you with it:</p>
<ul>
<li>A bug tracking and feature request system has been created for this module <a href="http://dev.cmsmadesimple.org/projects/cgblog">here</a>.  Please be verbose and descriptive when submitting bug reports and feature requests, and for bug reports ensure that you have provided sufficient information to reliably reproduce the issue.</li>
<li>Additional discussion of this module may also be found in the <a href="http://forum.cmsmadesimple.org">CMS Made Simple Forums</a>.  When describing an issue please make an effort to provide all relavant information, a thorough description of your issue, and steps to reproduce it or your discussion may be ignored.</li>
<li>The author, calguy1000, can often be found in the <a href="irc://irc.freenode.net/#cms">CMS IRC Channel</a>.</li>
<li>Lastly, you may have some success emailing the author directly.  However, please use this as a last resort, and ensure that you have followed all applicable instructions on the forge, in the forums, etc.</li>
</ul>


<h3>Copyright and License</h3>
<p>Copyright &copy; 2008-2012, Robert Campbell <a href="mailto:calguy1000@cmsmadesimple.org">&lt;calguy1000@cmsmadesimple.org&gt;</a>. All Rights Are Reserved.</p>
<p>This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.</p>
<p>However, as a special exception to the GPL, this software is distributed
as an addon module to CMS Made Simple.  You may not use this software
in any Non GPL version of CMS Made simple, or in any version of CMS
Made simple that does not indicate clearly and obviously in its admin
section that the site was built with CMS Made simple.</p>
<p>This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
Or read it <a href="http://www.gnu.org/licenses/licenses.html#GPL">online</a></p>
