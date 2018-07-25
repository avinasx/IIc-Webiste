<ul>
  <li>Version 0.8.1.6:<br>
    <div class="warning">
      <p><strong>NOTE:</strong> unless there are critical issues, this will be the last release of <strong>Form Builder</strong> to support <strong>CMS Made Simple versions of branch 1.x</strong>.</p>
    </div>  
    <ul>
      <li>Fixed a bug in frontend actions: $this->CheckAccess() cannot be used on them and is not needed;</li>   
    </ul>
  </li>  
  <li>Version 0.8.1.5: 
    <ul>
      <li>Fixed - a number of vulnerabilities reported by Peter Arts (sec@daylight-it.com);</li>
      <li>Fixed - a vulnerability reported by Tyler Joseph Boespflug (Tyman00);</li>
      <li>Fixed - bug #11237: Error in CheckboxExtendedField class;</li>
      <li>Fixed - bug #11103: Antispam enabled;</li>
      <li>Fixed - bug #11191: Hidden fields generate strict error;</li>   
    </ul>
  </li>
  <li>Version 0.8.1.4:
    <ul>
	  <li>Fixed #10739 - Email based on FEU property does not preserve value after form error;</li>
    <li>Fixed #10973 - Deprecated, Warning and Error messages on PHP 7;</li>
	  <li>
      Fixed #10917 - template for 'From Address' not visible in backend;<br>
      <div class="information">
        <p><strong>'From Address'</strong> is a <strong>regular field</strong> since 0.8.1.3, not a <strong>disposition</strong>. As such it uses the first disposition it finds.</p>
        <p>The previous <strong>'From Address'</strong> was a <strong>disposition</strong> and was <strong>deprecated</strong> (will be replaced by a different disposition in a near future).</p>
        <p>However while being deprecated it was also modified by mistake. Although still being deprecated, it's previous functionality was restored.</p>
        <p>You can still use the <strong>deprecated disposition</strong> if you need to customize the template of the <strong>'From Address'</strong>.</p>
      </div>
    </li>
    <li>a few minor fixes and stability modifications;</li>
	</ul>
  </li>
  <li>Version 0.8.1.3:
    <ul>
	  <li>Fixed #10387 - Textarea fields are being output with two ID attributes;</li>
	  <li>Fixed #10429 - "Mail from" is unset when using smtp to send a copy of the form back to person submitting form;</li>
      <li>Fixed #10470 - Forms with "Email to User-Supplied Email Address" fail to send;</li>
	  <li>Fixed #10482 - PHP Notice in DispositionFile.class;</li>
	  <li>Fixed #10688 - Form Builder (0.8.1.2) Errors in Backend and Front End;</li>
      <li>Fixed the constructor DispositionFromEmailAddress stub file;</li>
	  <li>Add option on the Email base and the From address to choose if you want files attached to the emails;</li>
	  <li>Make it compatible with PHP 5.4. Add a stub file for Upgrade compatiblity (copy of FromEmailField.class.php);</li>
	</ul>
  </li>
  <li>Version 0.8.1.2:
    <ul>
	<li>Fixed the 4 occurrences of the deprecated smarty assign_by_ref method;</li>
	<li>Fixed the use of a deprecated Smarty method that was breacking the module on CMSMS 2.0.1;</li>
    </ul>
  </li>
  <li>Version 0.8.1.1:
    <ul>
      <li>Fixed #10352 - $entry->id not in the array;</li>
	  <li>Fixed multiple field error;</li>
	  <li>Fixed some notices;</li>
	</ul>
  </li>
  <li>Version 0.8.1:
    <ul>
      <li>Fixed #6357 - Duplicate Form Aliases Allowed;</li>
	  <li>Fixed #6536 - "Javascript for field" not included in input for "Validate-via-Email Address";</li>
	  <li>Fixed #6640 - TextFieldExpandable: incorrect output when only one value;</li>
      <li>Fixed #7063 - UDT validation doesn't work properly with standard validation;</li>
	  <li>Fixed #7886 - Call to a member function Type() on a non-object at CatalogerItemsField.class.php:90;</li>
	  <li>Fixed #8691 - UDT validation doesn't work properly with standard validation;</li>
	  <li>Fixed #9637 - Fatal error on Form with Email results field - Object of class fbDispositionFromEmailAddressField could not be converted to string;</li>
	  <li>Fixed #9976 - Checkbox does not get auto ticked when using value_fldNUMBER" and "value_FIELDNAME";</li>
	  <li>Fixed #10229 - fixes validation of emails; fixes the appearance of html entities if the form doesn't validate;</li>
	  <li>Fixed #10260 - Textarea clear default on click && {strip} not working;</li>	    
	  <li>Feature Request #10117 - Add directive REQUIRED in nHTML5;</li>
	  <li>Feature Request #10268 - HTML5 placeholder for "*Email "From Address" Field, and send copy";</li>
	  <li>Fixed Show textfield in CheckboxExtendedField class;</li>
	  <li>Fixes to DispositionEmail related with uploaded files and attachments. Now we can properly separate the path, the url and the filename. Probably fixes a bunch of old issues;</li>
	  <li>Fixes multiple pages uploads;</li>
	  <li>Improvements to DatePicker and TimePicker;</li>
	  <li>The "Use relaxed email validation" preference is removed, emails just have to pass validation;</li>
	  <li>Some preferences are moved to the private config; might be definitely removed/hardcoded in a future version;</li>
	  <li>Updates for HTML5;</li>
    </ul>
  </li>
  <li>Version 0.8:<br />
	<p>Because the 0.7.4 release was unstable, a new group of developers went back to the working code of 0.7.3 and started working from there. First priority: a stable Formbuilder release!</p>
    <ul>
	    <li>Fixed #7408 - Debug informations shown during upgrade;</li>
	    <li>Fixed #7450 - countries WAY out of date - causing a few problems with Serbian customers;</li>
	    <li>Fixed #8510 - Warning: Illegal string offset 'sent';</li>
	    <li>Fixed #8893 - Text input (multiple) delete button;</li>
	    <li>Fixed #9296 - Field keeps being required even if unset;</li>
	    <li>Fixed #9360 - Formbuilder doesn't upload files on multi page forms;</li>
	    <li>Fixed #9738 - Helptext Form Template Variables;</li>
		<li>Fixed #9511 - Missing language string: validation_length;</li>
	    <li>Fixed #9513 - Undefined variable/index notices in apache log;</li>
	    <li>Fixed #9959 - When email field isn't required validation makes it required;</li>
		<li>Fixed #10255 - File upload does not work when form is incomplete or has errors: removed the <strong>delete</strong> checkbox and the text with the file name when form submission fails;
		<p>(<strong>Note: not a bug <i>per se</i>, but an inconsistency: the browsers don't support a default value for file upload fields for security reasons.</strong>)</p></li>
	    <li>Code cleanup;</li>
	    <li>Fixes for CMSMS Core 2.0 release;</li>
	    <li>Field table width is now 100%;</li>
	    <li>Help text re-written and English only now;</li>
    </ul>
  </li>
  <li>Version 0.7.4:
    <ul>
      <li>This release was not stable and therefore withdrawn from the Forge;</li>
    </ul>
  </li>
  <li>Version 0.7.3:
    <ul>
      <li>Compatibility release for 1.11;</li>
      <li>Adding cancel buttons to form and field instances;</li>
      <li>Removing ugly go back link;</li>
      <li>Ensuring usability in PHP strict mode;</li>
      <li>Some template fixes;</li>
      <li>NOTE: This is not feature or bug release, this is compatibility release as we ain't working with anything else than maintaining certain compatibility with this module. Stay tuned for FormBuilder2 within this year;</li>
    </ul>
  </li>
  <li>Version 0.7.2:
    <ul>
      <li>Many bug fixes;</li>
      <li>Last version of 0.x series;</li>
      <li>Fixing compability with 1.10.x series;</li>
      <li>Fixing problems with Form Browser;</li>
    </ul>
  </li>
  <li>Version 0.7.1 - (calguy1000):
    <ul>
      <li>Fixes the search for fields to not show backup files etc;</li>
      <li>Fixes a CMS Version comparison;</li>
      <li>Adds a disposition to allow selecting users to email based on an FEU property.   Also assigns smarty variables with info about matching usess;</li>
    </ul>
  </li>
	<li>Version 0.7:
		<ul>
			<li>Fixed a bug which caused the Date Submitted sorting in Form Browser to be inconsistent across pages at first;</li>
			<li>Fixed a bug which caused a Checkbox Field to be unable to be required. Checkbox Fields can now be made required;</li>
			<li>Fixed Bug #5610: File Upload Field advanced options now save correctly;</li>
			<li>Fixed Bug #5702: When using the "Frontend User binding" advanced option on the FormBrowser Disposition, checkboxes can now be saved in the "unchecked" state. Thanks Mike Hughesdon!</li>
			<li>Fixed Bug #5422: Multiple forms using the "Frontend User binding" advanced option on the FormBrowser Disposition now correctly load previously submitted data. Thanks Mike Hughesdon!</li>
			<li>Added: New Disposition - DispositionUniqueFile. Write form results to a unique file for each form submission;</li>
			<li>Added: TinyMCE integrated;</li>
			<li>Added: New Disposition - DispositionEmailBasedFrontendFields. Send form results via email with frontend-user-specified Subject, "From Name", "From Address", and Destination Address;</li>
			<li>Added: Random number generator to UniqueIntegerField;</li>
			<li>Fixed Bug #5555/#5453: Dominica (DM) is now properly selectable in the Country Picker Field;</li>
			<li>Fixed Bug #4307: Files uploaded on earlier pages of a multi-page form are now attached to Email Dispositions on later pages;</li>
			<li>Fixed Bug #3605: Dates are now translated in Email Dispositions.</li>
			<li>Fixed Bug #5358: DispositionFromEmailAddressField now creates a correct label for its input field;</li>
			<li>Fixed Bug #1822: Hidden Fields can now be edited in an Admin Form Browser;</li>
			<li>Added Feature Request #5277: Allow DispositionFormBrowser to be hidden;</li>
			<li>Several other cleanups and minor fixes;</li>
		</ul>
	</li>
	<li>Version 0.6.4.
		<ul>
			<li>Bugs fixes for Field Sorting. Thanks to everyone who reported and Stikki for fixing it!</li>
			<li>Improvements FileUpload field: overwrite flag, file renaming, and hiding filename in output;</li>
			<li>Additional patches from Ryan Foster for DatePicker;</li>
		</ul>
	</li>
  <li>Version 0.6.3:
	  <ul>
		  <li>Security patch for Upload field type;</li>
		  <li>Numerous bugs fixes. Thanks to everyone who reported;</li>
		  <li>Numerous fixes and improvements for use with FormBrowser v0.3.x;</li>
		  <li>Improvements to the ComputedField type to allow much more computation;</li>
		  <li>Vilkis' fixes for localizing CountryPicker;</li>
		  <li>Ryan Foster's patch for re-ordering date inputs on DatePicker;</li>
	  </ul>
  </li>
  <li>Version 0.6.2:
	  <ul>
		  <li>A lot of small and big bugs fixes. Thanks to everyone who reported;</li>
		  <li>Introducing dynamic field management;</li>
		  <li>New "YearPullDown" field type added;</li>
		  <li>Compatible with CMSMS 1.7.1 and further;</li>
		  <li>Added jQuery. Prototype removed completely;</li>
		  <li>Added some styling;</li>
	  </ul>
  </li>
  <li>Version 0.6.1:
	  <ul>
		  <li>Numerous Bug fixes. If your bug isn't fixed, post it in the tracker!</li>
		  <li>New Validation UDT code provided by Jeff Bosch;</li>
		  <li>Ability to reject blank/only spaces for required fields;</li>
		  <li>New "CompanyDirectory"" Field type provided by Jeremy Bass</li>
		  <li>Improvements to default value code provided by Jeremy Bass;</li>
		  <li>New "Module Interface" field type provided by Jeremy Bass;</li>
		  <li>New "User Defined Tag Call" field type;</li>
		  <li>Fix to support syntax highlighters for templates and Javascript on admin side;</li>
		  <li></li>
	  </ul>
  </li>
  <li>Version 0.6 - 30 Dec 09: Bug fixes. Finally releasing this thing!</li>
  <li>Version 0.6b2:
     <ul>
        <li>Numerous bug fixes. Thanks for all who reported on bugs!</li>
        <li>Added Form Disposition to do an HTTP GET or POST to any arbitrary URL for form handling;</li>
        <li>Added capability (and example of) advanced multipage contact form where a previous response gets displayed on a subsequent page as per uptoeleven's FR;</li>
        <li>Fix for template $fld_X remapping on XML import;</li>
        <li>Extended to provide DOM/CSS id attributes to fields;</li>
        <li>Cleaned up bad use of references for PHP 5.x;</li>
     </ul>
  </li>
  <li>Version 0.6b1:
	  <ul>
		  <li>Updated database code to be CMSMS 1.7-compatible;</li>
		  <li>Added Button field type.</li>
		  <li>Implemented FormBrowser v0.3 Disposition;</li>
		  <li>Numerous code fixes;</li>
	  </ul>
  </li>
  <li>Version 0.5.12 - 3 Sept 09: Numerous user-submitted fixes. Thanks to Calguy and Simon Schaufi;</li>
  <li>Version 0.5.11 - 19 Jan 09 (calguy1000):
    <ul>
      <li>Adds the capability to call a UDT before the form is displayed;</li>
      <li>Move changelog to an external file;</li>
    </ul>
  </li>
  <li>Version 0.5.10: 12 Jan 09. Bug fixes to restore functionality of FormBrowser;</li>
  <li>Version 0.5.9: Jan 09 (calguy1000) - Minor change to the DispositionFile class;</li>
  <li>Version 0.5.8: Jan 09 (calguy1000) - Minor change to the DispositionMultiselectFileDirector class;</li>
  <li>Version 0.5.7: Jan 09 (calguy1000) - Minor change to the DispositionMultiselectFileDirector class;</li>
  <li>Version 0.5.6: 23 Dec 08. Bug fixes;</li>
  <li>Version 0.5.5: 1 Oct 08. Bug fixes. Added new DispositionFromEmailAddressField to replace deficiencies with Email Address 'From' Field type;</li>
  <li>Version 0.5.4: 29 Aug 08. Scrapping plans for 0.6. Bug fixes. Ted's new \"Email \"From Address\" Again Field\". Added database indices;</li>
  <li>Version 0.5.3: 26 May 08. Bugfixes to previous set of bugfixes. Now ready for major upgrades for 0.6;</li>
  <li>Version 0.5.2: 25 May 08. Bugfixes. Release in preparation for substantial reworking for 0.6;</li>
  <li>Version 0.5.1: 30 April 08. Bugfixes, rewrote some of the File Upload code to prevent white screen of annoyance;</li>
  <li>Version 0.5: 19 April 08. Bugfixes, support for FormBrowser fixes and features, disposition type for upcoming FormBrowser version;</li>
  <li>Version 0.4.4: 26 Sept 07. Bugfixes for radio button groups, fix for validation of DispositionDeliverToEmailAddressField;</li>
  <li>Version 0.4.3: 18 Sept 07. Bugfixes for pulldowns using numbers, option to inline form, fixes for table-layouts provided by Ap Muthu, fix for requirability of Dispositions;</li>
  <li>Version 0.4.2: 14 Sept 07. Bugfixes for XML export, RadioButton Group submission, and HTML labels;</li>
  <li>Version 0.4.1: Bugfixes for File Disposition Types;</li>
  <li>Version 0.4:
	  <ul>
		  <li>Upped minimum CMS version to 1.1;</li>
		  <li>Numerous Bug fixes; too many to enumerate here;</li>
		  <li>Massive rejiggering of code to work with CMS MS 1.1 parameter sanitizing regime;</li>
		  <li>Added field types: \"TextField (Multiple)\" and \"Computed Field\";</li>
		  <li>Added dispositions: \"Save Results to File Based on Pulldown\" and \"Save Results to File(s) Based on Multiple Selections\"(Calguy);</li>
		  <li>Added neat-o AJAX-y template-copying for Form Templates, gave versions of old table-based templates to soothe the raging masses;</li>
		  <li>Added ability to pass default values to form elements from module tag using value_FIELDNAME=\"value\" syntax (Calguy);</li>
		  <li>Added option to display field ids in admin (Calguy);</li>
	  </ul>
  </li>
  <li>Version 0.3:
     <ul>
        <li>Added Captcha module support;</li>
        <li>Reworked labeling of form elements to be XHTML compliant;</li>
        <li>Added Paul Noone's new, improved contact form templates;</li>
        <li>Implementation of Email Subject Field;</li>
        <li>Added admin-specifiable values to hidden field type, which may contain parsable smarty tags;</li>
        <li>Text Area Field now allows specification of rows and cols in the admin, instead of CSS;</li>
        <li>Added Drag'n'Drop reordering of form fields;</li>
        <li>Added non-blank field name and unique field name global configuration options and validation;</li>
        <li>Implemented templated display of form results upon submission in addition to page redirecting;</li>
     </ul>
  </li>
  <li>Version 0.2.4 - 09 May 2007
     <p>Big release:</p>
     <ul>
       <li>Added \"Email Form to User-Supplied Address\" disposition;</li>
       <li>Added \"TimePicker\" field type. Split \"Link\" field into a \"User-supplied Link\" field and a \"Static Link\" field;</li>
       <li>Added HTML email option and auto-templates for all email dispositions;</li>
       <li>Added primitive anti-spam features;</li>
       <li>Added XML-based import and export of forms;</li>
     </ul>
  </li>
  <li>Version 0.2.3
     <p>Add the ability to call a selectable user defined tag upon disposition of the form.</p>
  </li>
  <li>Version 0.2.2
     <p>Many thanks to Utter Design for sponsoring some changes and bugfixes, which include:</p>
     <ul>
        <li>Added file upload capabilities to the email disposition</li>
        <li>Add PageSetStart and PageSetEnd field types:
          <p>These field types allow you to create fieldsets in your form, and organise
          your fields logically for the user.  You can even nest fieldsets, and
          associate a style with them appropriately.  The default template was changed
          to prevent it from wrapping a div around these types of fields.</p>
        </li>
        <li>Fixed a problem with DATETIME fields on install:
          <p>This solves a problem when on install the response table would sometimes not get created when using adodb lite.</p>
        </li>
     </ul>
  </li>
  <li>Version 0.2 - 14 November 2006. Calguy &amp; tsw's bug fixes for field re-ordering and custom templates. Additional bug fixes for field labels;</li>
  <li>Version 0.1 - 8 July 2006. Initial Release;</li>
</ul>
