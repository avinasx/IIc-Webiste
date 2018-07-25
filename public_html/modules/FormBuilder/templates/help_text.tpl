<div id="page_tabs">
    <div id="general">General</div>
	<div id="forms">Forms</div>
	<div id="fields">Fields</div>
	<div id="template_variable">Templates and Variables</div>
	<div id="advanced">Advanced</div>
	<div id="styling">Styling</div>
	<div id="configuration">Configuration</div>
	<div id="about">About</div>
</div>

<div class="clearb"></div>

<div id="page_content">
	<div id="general_c">
		<h3>What Does This Do?</h3>
		<p>The Form Builder Module allows you to create forms (in fact, it's a replacement of the original Feedback Form module), with
		the added power of database storage. With its companion module Form Browser, you can use it to create simple database applications.</p>
		<p>The forms created using the Form Builder may be inserted
		into templates and/or content pages. Forms may contain many kinds of inputs, and may have
		validation applied to these inputs. The results of these forms may be handled in a variety of ways.</p>

		<h3>How Do I Use it?</h3>
		<P>Install it, and poke around the menus. Play with it. Try creating forms, and adding them to your content.
		If you get stuck, chat with me on the #cms IRC channel, post to the forum, send me email, or, if you're
		really desperate, try reading the instructions on the rest of this page.</P>

		<h3>How Do I Create a Form</h3>
		<p>In the CMS Admin Menu, you should get a new menu item called FormBuilder. Click on this. On the page
		that gets shown, there are options (at the bottom of the list of Forms) to Add a New Form or Modify
		Configuration.</p>

		<h3>Adding a Form to a Page</h3>
		<p>In the main FormBuilder admin page, you can see an example of the tag used to display each form. It looks
		something like {ldelim}FormBuilder form='sample_form'}</p>
		<p>By copying this tag into the content of a page, or into a template, will cause that form to be displayed.
		In theory, you can have multiple forms on a page if you really want to. Be careful when pasting the tag
		into a page's content if you use a WYSIWYG editor such as TinyMCE, FCKEdit, or HTMLArea. These editors may stealthily
		change the quote marks (") into HTML entities (&amp;quot;), and the forms will not show up. Try using
		single quotes (') or editing the HTML directly.</p>
	</div>
	
	<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
	
	<div id="forms_c">
		<h3>Working with Forms</h3>
		<p>By clicking on a Form's name, you enter the Form Edit page. There are several tabs, which are described below:</p>
		<h4>Main</h4>
		<p>This is the main place you'll work on your form. Here, you give it a name, an alias (which is used to identify it for placing it in a page or template), and, optionally, a CSS class with which to wrap the whole thing.</p>
		<p>Below this, if you have it enabled, is the "fast field adder" pulldown, that lets you quickly add a field to the end of your form by selecting the field type.</p>
		<p>Below this is the list of fields that make up your form. More detail on this is described below.</p>
		
		<h4>Form Submission</h4>
		<p>When the form is submitted, you can either redirect the user to another page of your site, or you can present the user some message (which can contain any of the user's form entries, or just static text). In this tab, you select which of these approaches you wish to use, and, if you chose redirection, it allows you to pick the page to redirect users to after a successful form submission.</p>
		<p>Also on this page, you can specify the labels of various submission buttons ("Previous", "next", "submit"). You can also opt to have some Javascript added to the last page of a form that will prevent multiple submissions (useful on slow servers).</p>
		
		<h4>Form Display Options</h4>
		<p>This tab allows for other form customizations, like the symbol to show for required fields.</p>
		
		<h4>Captcha Settings</h4>
		<p>If you have installed the Captcha module, this tab lets you configure the Captcha settings for your form.</p>
		
		<h4>Form Template</h4>
		<p>This is where you do your customization work of your form's Smarty Template. See the section called Form Template Variables below.</p>
		<p>The form should default to a Custom template that documents the Smarty tags available to you.</p>
		<p>Unless you're a Smarty expert, you probably don't want to mess around with this. If you are a Smarty expert, this is where you can unleash your magic.</p>
		
		<h4>Submission Template</h4>
		<p>If, in the Form Submission tab, you selected 'Display "Submission Template", this is where you can create that template. There is a display of which smarty variables are available to you, and a button to generate a sample template.</p>
		<p>If you're a Smarty expert, you can do all manner of creative and powerful things here. If you're not a Smarty expert, you might just want to use the default.</p>
	</div>
	
	<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
	
	<div id="fields_c">
		<h3>Adding Fields to your Form</h3>
		<p>The types of fields that are currently supported fit into four groups: standard input fields, display control fields, email-specific fields, and form result handling fields (also called Form Dispositions in places):</p>
		<ul>
		<li>Standard Input Fields - these are inputs that allow entry of typical form elements; text inputs, radio buttons, etc.</li>
		<li>Display Control Fields - these input control how the user will see the display of the form; page breaks, static text, etc.</li>
		<li>Email-specific Fields - some forms generate email, and email-specific fields can alter attributes of the emails sent.</li>
		<li>Form Dispositions - These determine what happens when the user
		submits the form; for each result handling field, some method of transmitting, saving, or emailing the
		form contents takes place. A form may have multiple form dispositions.</li>
		</ul>
		<p>Form fields are assigned names. These names identify the field, not only on the screen as labels for the user,
		but in the data when it's submitted so you know what the user is responding to. Phrasing the name like a question
		is a handy way of making it clear to the user what is expected. Similarly, many fields have both Names and Values.
		The Names are what gets shown to the user; the Value is what gets saved or transmitted when the user submits
		the form. The Values are never seen by the user, nor are they visible in the HTML, so it's safe to use for
		email addresses and such.</p>
		<p>Some fields can have multiple values, or multiple name/value pairs. When you first create such a field,
		there may not be sufficient inputs for you to specify all the values you want. To get more space for inputting
		these values, use the buttons at the bottom of the page for adding options.</p>
		<p>Fields can be assigned validation rules, which vary according to the type of the field. These rules help
		ensure that the user enters valid data. They may also be
		separately marked "Required", which will force the user to enter a response.</p>
		<p>Fields also may be assigned a CSS class. This simply wraps the input in a div with that class, so as to allow
		customized layouts. To use this effectively, you may need to "view source" on the generated form, and then
		write your CSS.</p>

		<h4>Standard Inputs</h4>
		<ul><li>Text Input. This is a standard text field. You can limit the length, and apply various validation
		functions to the field.</li>
		<li>Text Area. This is a big, free-form text input field.</li>
		<li>Checkbox. This is a standard check box.</li>
		<li>Button. This doens't do anything, but you can hook it into some Javascript.</li>
		<li>Checkbox Group. This is a collection of checkboxes. The only difference between this input and a
		collection of Checkbox inputs is that they are presented as a group, with one name, and can have a validation function requiring that you check one or more of the boxes in the group.</li>
		<li>Radio Group. This is a collection of radio buttons. Only one of the group may be selected by the user.</li>
		<li>Pulldown. This is a standard pulldown menu. It's really conceptually the same thing as a radio button
		group, but is better when there are a large number of options.</li>
		<li>Multiselect. This is a multi-select field. It's really conceptually the same thing as a checkbox button
		group, but is better when there are a large number of options, as you can limit the number displayed on the screen at any one time.</li>
		<li>Password. This is an asterisked-out text field, useful for passwords.</li>
		<li>Password Again (verify). This is a field that must match a Password field for submission
		to succeed.</li>
		<li>State. This is a pulldown listing the States of the U.S.</li>
		<li>Canadian Province. This is a pulldown listing the Canadian Provinces (Contributed by Noel McGran. Thanks!)</li>
		<li>Countries. This is a pulldown listing the Countries of the world (as of July 2005).</li>
		<li>Date Picker. This is a triple pulldown allowing the user to select a date.</li>
		<li>Time Picker. This is a set of pulldowns allowing the user to select a time (using 12 or 24 hour clock).</li>
		<li>File Upload. This is a file upload field.</li>
		<li>Link (User Entered). This creates a double input field for getting a link URL and link title.</li>
		<li>Text Field (Multiple). This field creates one or more text inputs with add and delete buttons, effectively giving the end user a way of creating variable-length lists.</li>
		</ul>

		<h4>Email-specific Inputs</h4>
		<ul><li>Email "From Address" Field. This allows users to provide their email address. The email generated when the form gets handled will use this address in the "From" field.</li>
		<li>Email "From Name" Field. This allows users to provide their name. The email generated when the form gets handled will use this name in the "From" field.</li>
		<li>Email Subject Field. This allows users to provide a subject for their email. The email generated when the form gets handled will use this in the "Subject" field. This may cause trouble with certain dispositions that want to control the Email Subject, so use it with caution.</li>
		</ul>

		<h4>Display Control Fields</h4>
		<ul>
		<li>Page Break. This allows you to split your feedback form into multiple pages. Each page is
		independently validated. This is good for applications like online surveys.</li>
		<li>Fieldset Start. Combined with Fieldset End, this allows you to group various fields within your form. Use this to start a given grouping.</li>
		<li>Fieldset End. Combined with Fieldset Start, this allows you to group various fields within your form. Use this to end a given grouping.</li>
		<li>Hidden Field. This allows you to embed a hidden field in your form.</li>
		<li>Static Text. This allows you to put text or a label in the middle of your form. This is useful for giving additional help text, especially if you're not using a Custom Template to render your form.</li>
		<li>Static Link. This allows you to put a link to a given page into your form. Optionally, you can have it autopopulate with the page where the form is embedded (useful if you're sending results via email).</li>
		<li>Computed Field. This allows you to embed a computed field in your form. It is not visible to the user until after the form is submitted. It allows you to do simple arithmetic or string concatenation.</li>
		<li>Unique Integer (Serial). This is an integer that increases every time someone hits your form. Your results may not be sequential, but they will increase monotonically.</li>
		<li>User Tag. This calls the specified User Defined Tag, and displays anything it returns. The UDT gets called any time the field would be visible.</li>
		</ul>

		<h4>Form Handling Inputs (Dispositions)</h4>
		<ul><li>*Call a User Defined Tag With the Form Results. This submits all the form results to the User-Defined Tag you specify. The UDT can handle the results however it wants. Values are passed as \$params['field_name'], and as \$params['field_alias'] (if defined).</li>
		<li>*Email Results Based on Pulldown. This is useful for web sites where comments get routed based on their subject matter, e.g., bugs get sent to one person, marketing questions to another person, sales requests to someone else, etc. The pulldown is populated with the subjects, and each gets directed to a specific email address. You set up these mappings in the when you create or edit a field of this type. If you use one of these "Director" pulldowns, the user must make a selection in order to submit the
		form. This input is part of the form the user sees, although the email addresses are not made visible nor
		are they embedded in the HTML.</li>
		<li>*Email "From Address" Field, and send copy. This works like the Email "From Address" Field described above, but it provides options for sending a copy of the results to the user.</li>
		<li>*Email Results to set Address(es). This simply sends the form results to one or more email addresses that you enter when you create or edit this type of field. This field and its name are not visible in the
		form that the user sees. The email addresses are not made visible nor
		are they embedded in the HTML.</li>
		<li>*Email results based on frontend fields. This field is an email disposition that allows form fields' user input to specify the Email Subject, "From Name", "From Address", and Destination Email Address.</li>
		<li>*Email to User-Supplied Address. This puts an input field in the form for the user to populate with an email address. The form results get sent to that address. Beware of Spam abuse! Active the primitive anti-spam features in the FormBuilder configuration screen.</li>
		<li>*Redirect to Page Based on Pulldown. This allows you to redirect the form to a different site page depending on its value. If you have multiple dispositions, make sure this is used last.</li>
		<li>*Validate via Email. This is a strange and powerful field. It provides the user a mandatory input for their email address. Once they submit their form, the standard form dispositions are not performed -- rather, it send the user an email with a special coded link. If they click on the link, the other form is considered "approved," and the other dispositions are all performed.</li>
		<li>*Write Results to Flat File. This takes the form results and writes them into a text file. You may
		select the name of the file, and set its format. These files are written to the "output" directory under the
		module's installation directory, assuming the web server has permission to write there.</li>
		<li>*Write Results to a Unique Flat File for each submission. This takes the form results and writes them to a unique text file for each form submission.
		You can specify a filename pattern using values from form fields, set its format, and set the directory where the files will be stored.</li>
		<li>*Save Results to File Based on Pulldown. Like the Flat File disposition, except the value of a pull-down determines which file results get written to.</li>
		<li>*Save Results to File(s) Based on Multiple Selections. Like the Flat File disposition, except the value(s) of checkboxes  determines which file(s) results get written to.</li>
		<li>*Email to CMS Admin User. Provides a pull-down of CMS Admin users, and directs the results as an email to the selected admin.</li>
		<li>*Store Results for FormBrowser Module v.0.3. Stores the form results in an XML structure as a single database record. This is the only interface to Form Browser.</li>
		<li>*Store Results for ListItExtended. Stores the form results into ListItExtended object and saves it into database.</li>
		<li>*Submit to an arbitrary form action. Craft an HTTP GET or POST, and transmit it using cURL to the specified URL. This lets you use FormBuilder as a front-end to any CGI or Form Handling script out there.</li>
		</ul>
	</div>
	
	<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
	
	<div id="template_variable_c">
		{$mod->Lang('template_variable_help')}
	</div>
	
	<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
	
	<div id="advanced_c">
		<h3>Passing Default Values to Forms</h3>
		<p>Calguy added a nice feature, which is that you can pass default field values to your form via the module tag. This allows you to have
		the same form in multiple places, but with different default values. It may not work for more exotic field types, but for fields that have
		a single value, you can specify like:</p>
		<p>{ldelim}FormBuilder form='my_form' value_<i>FIELDNAME</i>='default_value'}</p>
		<p>This will set the field with <i>FIELDNAME</i> to 'default_value'.</p>
		<p>This can be problematic, as sometimes field names are unwieldy or contain characters that don't work well with Smarty. So there is an
		alternative like this:</p>
		<p>{ldelim}FormBuilder form='my_form' value_fld<i>NUMBER</i>='default_value'}</p>
		<p>That uses field <i>NUMBER</i>, where <i>NUMBER</i> is the internal FormBuilder field id. You might wonder how you know what that id is. Simply go into the FormBuilder configuration tab,
		and check "Show Field IDs"</p>

		<h3>Email and Flat File Templates</h3>
		<p>Many disposition types allow you to create a template for the email that is generated, or for the way the results are written to a file. If you opt not to create a template, the FormBuilder will use its own best guess, which may or may not work out to your liking. You can always click on the "Create Sample Template" and then customize the results.</p>
		<p>To the right, you'll find a legend which lists all of the variables that are available to you to use in your template. As of version 0.3, variables have two names, one based on the field name, the other based on the field ID. If you use field names that have characters outside of the ASCII 32-126 range, it will be safer to use the ID-based variables. As of version 0.5, variables also have aliases, which you can use.</p>
		<p><strong>Note that once you've changed a template, it will no longer automatically add new fields.</strong> For this reason, it's usually best to create your templates as the last step of creating your form.</p>
		<p>As of version 0.2.4, you can opt to send any of these emails as HTML email. There should be a checkbox at the top of the template page for this. There is also a "Create Sample HTML Template" button over in the legend area. For HTML email, the email body will also provide the default text-only values.</p>

		<h3>Use with FormBrowser v3</h3>
		<p>There are some special features when using FormBuilder with FormBrowser. The new approach stores the form results in XML, so that far fewer
		queries are needed to retrieve records. This means you can use FormBrowser with hundreds or even thousands of records. It also means you
		will have to choose up front which fields you will want to be able to sort by. You can choose up to five. Changing these after there are submitted records will result in improper sorting! A re-index function will be added to a future version.</p>
		<p>In advanced options, you can tie a form to Frontend Users. That means each user gets one record for the form; they can create it
		a single time, subsequent times they will be editing their record. The record will not be visible to any other users (excluding admins).
		This form should be added to your page using the syntax {ldelim}FormBuilder action='feuserform' form='form_name'}.</p>
		<p>For greater data safety, you can encrypt the stored forms in the database. You can use the built-in mycrypt library or the OpenSSL module.
		In either case, for the passphrase, you can either enter text in the field or a file name. If you specify a file name, the contents of that
		file will be used as the passphrase for encrypting.</p>
		<p>If you encrypt, be aware that the fields you use for sorting are <strong>not</strong> encrypted. You can choose to hash them; the cheat here
		is that the first four letters are left intact to allow for sorting. The sorting may not be perfect, and this weakens the security since it
		exposes some cleartext, but it is better than nothing.</p>
		<p><strong>DISCLAIMER</strong>. The encryption offered here should be considered just one more hurdle for a hacker, not as a guarantee that
		your information will be secure. A smart hacker who has found some exploit to view database records may well be smart enough to get at
		the module source code, and find their way to the passphrase. This will not protect you against an enemy who has full access to your
		server, some familiarity with PHP, and the time to poke around. <em><strong>Do not</strong> use this to protect high-value information such as financial data,
		sensitive political information, human rights data, or anything else that might be of value to a repressive government or organized crime
		cartel.</em></p>
		
		<h3>Using with User Defined Tags (UDTs)</h3>
		<p>Several options for customizing behavior via UDTs is provided (thanks to kind code contributions, see credits).</p>

		<ul>
		<li>Call User Defined Tag With the Form Results. This field type submits the human-readable form results to the User-Defined
		Tag you specify. The UDT can handle the results however it wants. Values are passed as $params['field_name'], and
		as $params['field_alias'] (if defined). As per a suggestion, it also populates all of the Smarty values that would be visible to the Submission Template too!</li>
		<li>User Tag Field. This calls the specified UDT, and displays anything it returns. The UDT gets called any time the field would be visible.</li>
		<li>Validation UDT. Set this for a form, and the UDT will receive all of the form's human-readable results. The UDT should do whatever
		validation it wants, and return an array with the first value being true or false (indication whether the form validates), and the second
		value being error messages (if any).</li>
		<li>User defined tag to call before form is displayed the first time (only called once). This
		is set in the Form Admin in the UDT Integration tab. The UDT gets called on the first display
		of the form.</li>
		<li>User defined tag to call before form is displayed (called on every page of multipage
		forms). This is set in the Form Admin in the UDT Integration tab. The UDT gets called
		every time any page of the form is displayed (including when validation fails).</li>
		</ul>
	</div>
	
	<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
	
	<div id="styling_c">
		<h3>Styling and CSS</h3>
		<p>After a bit of nagging on the part of people who actually respect standards, FormBuilder no longer encourages tricks like embedding CSS in 
		static text fields. Instead, it creates a stylesheet called "FormBuilder Default" that you are encouraged to attach to the page template
		that you use for pages that contain your form.</p>  
		<p>This default CSS was graciously provided by Paul Noone.</p>
	</div>
	
	<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
	
	<div id="configuration_c">
		<h3>Configuration</h3>
		<p>There are some global configuration options for FormBuilder:</p>
		<ul>
		<li>Enable fast field add pulldown. This enables the pulldown on the Form Edit page which saves a step in the creation of new fields.</li>
		<li>Hide Errors. This is no longer set by default. Checking it will hide the more detailed errors that would be displayed if there are problems when you submit your form.</li>
		<li>Require Field Names. Typically, you will want form fields to be named so you can tell which is which. However, in some cases, you might want to have nameless fields. Uncheck this if you want to allow nameless fields.</li>
		<li>Unique Field Names. Typically, you will want form fields to have unique names so you can tell which is which. Uncheck this if you want to allow fields to share names.</li>
		<li>Use relaxed email validation. This uses a less restrictive regular expression for validating email; e.g., x@y will be allowed, where typically x@y.tld is required.</li>
		<li>Show Form Builder Version. Displays the version of FormBuilder you're using in a comment when the form is generated. Typically only useful when debugging.</li>
		<li>Enable primitive anti-spam features. When turned on, this allows any given IP address to only generate 10 emails per hour.</li>
		<li>Show Field IDs. When turned on, FormBuilder will display field ids when adding or editing a form.</li>
		</ul>
		
		<h3>Miscellaneous Notes</h3>
		<ul>
      <li>Any fields that sends email to a specified email address will also accept a comma-separated list of email addresses.</li>
		  <li>The File Upload field type won't repopulate on form failure to validate. This is not a bug: it's a security limitation and it's enforced by the browsers. As such, currently and in the foreseeable HTML5 future (as it was in the past with the exception of Opera browsers), only the user can populate a file input field. It's not possible to (re)populate the file input field either with javascript or by setting a default value as it's not supported by the browsers.</li>
		</ul>
		<h3>Known Issues</h3>
		<ul>
		<li>FormBuilder does not yet support pretty URLs, although that shouldn't matter since the user side is pretty simple.</li>
		<li>FileUpload Fields may not work correctly with multipage forms.</li>
		</ul>

		<h3>Troubleshooting</h3>
		<ol>
		<li>FormBuilder/FormBrowser <strong>requires</strong> PHP 5.2.4 or later to function correctly.</li>
		<li>First step is to check you're running CMS 1.11 or later.</li>
		<li>Second step is to read and understand the caveat about WYSIWYG editors up in the
		section <em>Adding a Form to a Page</em>.</li>
		<li> If you're missing fields in an email that gets generated, check the disposition field's template, and make sure you're specifying the missing fields. Seems obvious, but it's an easy mistake to make.</li>
		<li>Uncheck the "Hide Errors" checkbox in the global options, and see what message gets displayed when you submit your form.</li>
		<li>Just mess around and try clicking on links and icons and stuff. See what happens.</li>
		<li>Make sure you can successfully send email via the test in the CMSMailer Module. It's simply amazing how many problems boil down to a misconfigured CMSMailer.</li>
		<li>Last resort is to email me or catch me on IRC and we can go from there.</li>
		</ol> 
		<p>This is no longer a particularly early version, but it is probably still buggy. While I've done all I can
		to make sure no egregious bugs have crept in, I have to admit that during early testing, this program
		revealed seven cockroaches, two earwigs, a small family of aphids, and a walking-stick insect. It also
		ate the neighbor's nasty little yap dog, for which I was inappropriately grateful.</p>
		<p>The final release will include bug fixes, documentation, and unconditional love.</p>	
	</div>
	
	<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
	
	<div id="about_c">
		<h3>Copyright and License</h3>
		<p>Copyright &copy; 2006, Samuel Goldstein. All Rights Are Reserved.</p>
		<p>Copyright &copy; 2012, Tapio Löytty. All Rights Are Reserved.</p>
		<p>Copyright &copy; 2014, Morten Poulsen [morten at poulsen dot org]. All Rights Are Reserved.</p>
		<br />
		<p>This module has been released under the <a href="http://www.gnu.org/licenses/licenses.html#GPL">GNU Public License</a>. You must agree to this license before using the module.</p>
		<br />
		<p>Many people have contributed code, bug reports, cash, and ideas to FormBuilder. Among them:</p>
		<ul>
			<li>Fernando Morgado - code</li>
			<li>Rolf Tjassens - code</li>
			<li>Ryan Foster - code</li>
			<li>Jonathan Schmid - code, helptext</li>
			<li><a href="http://www.bpti.eu" target="_blank">Baltic institute of advanced technology</a> - code, funding</li>
			<li>Jeremy Bass - code and suggestions</li>
			<li>Alberto Benati - code</li>
			<li>Tyler Boespflug - funding and ideas</li>
			<li>Jeff Bosch - UDT Validation</li>
			<li>Robert Campbell - numerous code contributions</li>
			<li>Piotras Cimmperman - code</li>
			<li>Nuno Costa - suggestions</li>
			<li>Marc Geldon - code</li>
			<li>Kevin Grandon - code</li>
			<li>Ronny Krijt - code</li>
			<li>Paul Noone - CSS and ideas</li>
			<li>Prue Rowland - bug fixes</li>
			<li>Simon Schaufelberger - code</li>
			<li>Adam Shaw-Vardi - funding and ideas</li>
      <li>Jean-Claude Etiemble (jce76350): testing and suggestions;</li>
		</ul>
		<p>I apologize for any omissions - notify me, and I'll correct the omission!</p>
	</div>

	<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->