<?php
$lang['friendlyname'] = 'Form Builder';

// field types
$lang['field_type_DispositionEmailFromFEUProperty'] = '*Email users matching an FEU property';
$lang['field_type_']='Field Type Not Set';
$lang['field_type_CatalogerItemsField'] = 'Select one (or more) cataloger items';
$lang['field_type_FieldsetEnd'] = '-Fieldset End';
$lang['field_type_FieldsetStart']='-Fieldset Start';
$lang['field_type_TextField']='Text Input';
$lang['field_type_HTML5NumberField']='HTML5 Number Input';
$lang['field_type_HTML5EmailField']='HTML5 Email Input';
$lang['field_type_HTML5URLField']='HTML5 URL Input';
$lang['field_type_SiteAdminField']='Site Admin';
$lang['field_type_PasswordField']='Password';
$lang['field_type_PasswordAgainField']='Password Again (verify)';
$lang['field_type_TextFieldExpandable']='Text Input (Multiple)';
$lang['field_type_TextAreaField']='Text Area';
$lang['field_type_ButtonField']='Button';
$lang['field_type_CheckboxField']='Check Box';
$lang['field_type_CheckboxGroupField']='Check Box Group';
$lang['field_type_PulldownField']='Pulldown';
$lang['field_type_YearPullDownField']='Year Pulldown';
$lang['field_type_MultiselectField']='Multiselect';
$lang['field_type_StatePickerField']='U.S. State Picker';
$lang['field_type_ProvincePickerField']='Canadian Province Picker';
$lang['field_type_CountryPickerField']='Country Picker';
$lang['field_type_DatePickerField']='Date Picker';
$lang['field_type_TimePickerField']='Time Picker';
$lang['field_type_RadioGroupField']='Radio Button Group';
$lang['field_type_DispositionDirector']='*Email Results Based on Pulldown';
$lang['field_type_DispositionFileDirector'] = '*Save Results to File Based on Pulldown';
$lang['field_type_DispositionMultiselectFileDirector'] = '*Save Results to File(s) Based on Multiple Selections';
$lang['field_type_DispositionPageRedirector']='*Redirect to Page Based on Pulldown';
$lang['field_type_DispositionEmail']='*Email Results to set Address(es)';
$lang['field_type_DispositionEmailConfirmation']='*Validate-via-Email Address';
$lang['field_type_DispositionFromEmailAddressField']='* --deprecated-- Email "From Address" Field, and send copy';
$lang['field_type_DispositionFile']='*Write Results to Flat File';
$lang['field_type_DispositionUniqueFile']='*Write Results to a Unique Flat File for each submission';
$lang['field_type_DispositionDatabase']='*Store Results in Database';
$lang['field_type_DispositionFormBrowser']='*Store Results for FormBrowser Module';
$lang['field_type_DispositionUserTag']='*Call A User Defined Tag With the Form Results';
$lang['field_type_DispositionForm'] = '*Submit to an arbitrary form action';
$lang['field_type_DispositionDeliverToEmailAddressField']='*Email to User-Supplied Email Address';
$lang['field_type_DispositionEmailSiteAdmin']='*Email to CMS Admin User';
$lang['field_type_DispositionEmailBasedFrontendFields']='*Email results based on frontend fields';
$lang['field_type_PageBreakField']='-Page Break';
$lang['field_type_FileUploadField']='File Upload';
$lang['field_type_FromEmailAddressField']='Email "From Address" Field';
$lang['field_type_FromEmailAddressAgainField'] = 'Email "From Address" Again Field';
$lang['field_type_FromEmailNameField']='Email "From Name" Field';
$lang['field_type_FromEmailSubjectField']='Email "Subject" Field';
$lang['field_type_CCEmailAddressField']='Email Carbon Copy (CC) Address Field';
$lang['field_type_StaticTextField']='-Static Text';
$lang['field_type_StaticFileField']='-Static File';
$lang['field_type_SystemLinkField']='-Static Link';
$lang['field_type_LinkField']='Link (User-entered)';
$lang['field_type_HiddenField'] = '-Hidden Field';
$lang['field_type_ComputedField'] = '-Computed Field';
$lang['field_type_UniqueIntegerField']='-Unique Integer (Serial)';
$lang['field_type_UserTagField'] = '-User Defined Tag Call';
$lang['field_type_CompanyDirectoryField'] = 'Company Directory Field';
$lang['field_type_ModuleInterfaceField'] = '-Module Interface Field';
$lang['field_type_CheckboxExtendedField'] = 'Checkbox extended'; // Need to remove

// validation types
$lang['validation_none']='No Validation';
$lang['validation_numeric']='Numeric';
$lang['validation_integer']='Integer';
$lang['validation_email_address']='Email Address';
$lang['validation_usphone']='Phone Number (US)';
$lang['validation_must_check']='Must Be Checked';
$lang['validation_regex_match']='Match Regular Expression';
$lang['validation_regex_nomatch']='Doesn\'t match Regular Expression';
$lang['validation_empty']='Can\'t be empty';

// validation error messages and other alerts
$lang['required'] = 'Required';
$lang['not_required'] = 'Not Required';
$lang['not_available'] = 'Not Available';
$lang['error_emailfromfeuprop'] = 'Error in Field Setup';
$lang['error_nofeu'] = 'The FrontEndUsers module could not be found.  This field will not function.';
$lang['error_nofeudefns'] = 'No suitable FEU property could be found.  This field will not function.';
$lang['required_field_missing'] = 'A value was not supplied for a required field';
$lang['please_enter_a_value']='Please enter a value for "%s"';
$lang['please_enter_a_number']='Please enter a number for "%s"';
$lang['please_enter_valid'] = 'Please enter a valid entry for "%s"';
$lang['please_enter_an_integer']='Please enter an integer value for "%s"';
$lang['please_enter_an_email']='Please enter a valid email address for "%s"';
$lang['email_address_does_not_match']='Email address does not match value in "%s"';
$lang['please_enter_a_phone']='Please enter a valid phone number for "%s"';
$lang['please_login'] = 'Please log in to use this form';
$lang['not_valid_email']='"%s" does not appear to be a valid email address!';
$lang['please_enter_no_longer']='Please enter a value that is no longer than %s characters';
$lang['please_enter_at_least'] = 'Please enter a value that is at least %s characters';
$lang['title_list_delimiter'] = 'Character to use as delimiter in results that return more than one value';
$lang['you_need_permission']='You need the "%s" permission to perform that operation.';
$lang['lackpermission']='Sorry! You don\'t have adequate privileges to access this section.';
$lang['field_order_updated']='Field order updated.';
$lang['form_deleted']='Form deleted.';
$lang['field_deleted']='Field deleted.';
$lang['configuration_updated']='Configuration Updated.';
$lang['you_must_check']='You must check "%s" in order to continue.';
$lang['must_specify_one_destination']='You need to specify at least one destination address!';
$lang['are_you_sure_delete_form']='Are you sure you want to delete the form %s?';
$lang['are_you_sure_delete_field']='Are you sure you want to delete the field %s?';
$lang['notice_select_type']='Advanced options are not available until the field type has been set.';
$lang['field_name_in_use']='The field name "%s" is already in use. Please use unique field names, or disable unique field names in the Form Builder configuration.';
$lang['field_no_name'] = 'Fields must be named, unless you disable this in the Form Builder configuration.';
$lang['no_field_assigned'] = 'No field assigned for %s';

// abbreviations, verbs, and other general terms
$lang['anonymous'] = 'Anonymous';
$lang['abbreviation_length']='Len: %s';
$lang['boxes']='%s boxes';
$lang['options']='%s options';
$lang['text_length']='%s chars.';
$lang['order']='Order';
$lang['unspecified']='[unspecified]';
$lang['added']='added';
$lang['updated']='updated';
$lang['sort_options'] = 'Sort options on output';
$lang['select_one']='Select One';
$lang['select_type']='Select Type';
$lang['to']='To';
$lang['yes']='Yes';
$lang['no']='No';
$lang['recipients']='recipients';
$lang['fields']='fields';
$lang['file_count'] = '%s possible files';
$lang['destination_count'] = '%s destinations';
$lang['save']='Save';
$lang['add']='Add';
$lang['update']='Update';
$lang['save_and_continue']='Save and Continue Editing';
$lang['information']='Information';
$lang['automatic']='Automatic';
$lang['forms']='Forms';
$lang['form']='Form %s';
$lang['configuration']='Configuration';
$lang['field_requirement_updated'] = 'Field required state updated.';
$lang['maximum_size']='Max. Size';
$lang['permitted_extensions']='Extensions';
$lang['permitted_filetypes']='Allowed file types';
$lang['file_too_large']='Uploaded file is too large! Maximum size is:';
$lang['illegal_file_type']='This type of file may not be uploaded. Please check that the extension is correct.';
$lang['upload'] = 'Upload';
$lang['form_imported'] = 'Form Imported.';
$lang['form_import_failed'] = 'Form import failed! There was a problem with the format of the XML file.';
$lang['rows'] = '%s rows';
$lang['cols'] = '%s cols';
$lang['12_hour'] = '12 Hour Clock';
$lang['24_hour'] = '24 Hour Clock';
$lang['hour'] = 'Hour';
$lang['min'] = 'Minute';
$lang['merid'] = 'Meridian';
$lang['date_range'] = 'Range: %s - %s';
$lang['thanks'] = 'Thanks! Your submissions have been received.';
$lang['edit'] = 'Edit';
$lang['delete'] = 'Delete';
$lang['day'] = 'Day';
$lang['mon'] = 'Month';
$lang['year'] = 'Year';
$lang['none'] = '(none)';
$lang['css'] = 'CSS';
//$lang['year_start'] = 'Start year';

$lang['uninstalled'] = 'Module uninstalled.';
$lang['installed'] = 'Module version %s installed.';
$lang['upgraded'] = 'Module upgraded to version %s.';

$lang['button_previous'] = 'Back...';
$lang['button_submit'] = 'Submit Form';
$lang['button_continue'] = 'Continue...';

$lang['value_checked'] = 'Checked';
$lang['value_unchecked'] = 'Unchecked';

$lang['tab_main']='Main';
$lang['tab_symbol']='Form Display Settings';
$lang['tab_submit']='Form Submission';
$lang['tab_captcha']='Captcha Settings';
$lang['tab_advanced']='Advanced Settings';
$lang['tab_templatelayout'] = 'Form Template';
$lang['tab_submissiontemplate'] = 'Submission Template';
$lang['tab_udt'] = 'UDT Integration';

$lang['title_feu_property'] = 'FrontEndUsers Property';
$lang['info_feu_property'] = 'Only certain property types can be used for matching (dropdowns, multi-select fields, etc).';
$lang['canuse_smarty'] = '<em>Smarty variables are valid in this field.</em>';
$lang['add_options'] = 'Add More Options';
$lang['delete_options'] = 'Delete Marked Options';
$lang['add_checkboxes'] = 'Add More Checkboxes';
$lang['delete_checkboxes'] = 'Delete Marked Checkboxes';
$lang['add_address'] = 'Add Another Address';
$lang['delete_address'] = 'Delete Marked Addresses';
$lang['add_destination'] = 'Add Another Destination';
$lang['delete_destination'] = 'Delete Marked Destinations';
$lang['suspected_spam'] = 'Too many emails generated from your IP address. Anti-Spam code has prevented delivery.';
$lang['suspected_spam_log'] = 'Suspected spam from IP %s stopped.';
$lang['reorder'] = 'Reorder Fields';
$lang['cancel'] = 'Cancel';
$lang['value_set'] = 'Value set: %s';

// Field Attribute Titles
$lang['title_cataloger_attribute_fields'] = 'Cataloger Attribute Fields';
$lang['help_cataloger_attribute_fields'] = <<<EOT
Below is a list of the attributes available from the Cataloger module.<br />You can optionally specify valid ranges, values, or numerous values to be used in filtering the list of items that is displayed to the user.<br />
<br/>
<strong>Ranges:</strong><br />
Ranges can be specified by signifying a minimum and maximum value using this syntax: &quot;range: minvalue to maxvalue&quot;<br />
<br/>
<strong>Multiple Values:</strong><br />
To specify multiple values for an attribute use the syntax &quot;multi: value1|value2|value3&quot;<br />
<br/>
<strong>Values from hidden fields</strong><br />
To specify a value from a hidden field use the syntax {\$fld_id}<br />
<br/>
EOT;
$lang['title_textfield_label'] = 'Textfield label'; // Remove?
$lang['title_show_textfield'] = 'Show textfield?'; // Remove?
$lang['help_name_regex'] = 'A regular expression to allow filtering cataloger items by name';
$lang['help_field_height'] = 'The height of the multi-select field';
$lang['title_name_regex'] = 'Cataloger Item Name Regular Expression';
$lang['title_field_height'] = 'Field Height';
$lang['title_file_path'] = 'Destination Directory for output files';
$lang['title_udt_name'] = 'User Defined Tag';
$lang['title_uploads_destpage'] = 'Page to return to with uploads link';
$lang['title_uploadmodule_summary'] = 'Submitted with Formbuilder';
$lang['title_uploads_category'] = 'Uploads category';
$lang['title_sendto_uploads'] = 'Send this file to the uploads module';
$lang['title_allow_overwrite'] = 'Allow upload to overwrite previously files?';
$lang['title_allow_overwrite_long'] = 'Should uploaded file overwrite previously uploaded file if it has the same name?';
$lang['overwrite']='Allows Overwriting';
$lang['nooverwrite']='No Overwrite';
$lang['file_already_exists']='File %s already exists, and cannot be overwritten.';
$lang['file_doesnt_exists']='File %s doesn\'t exists.';
$lang['title_file_rename']='Filename template';
$lang['original_file_extension']='Original file extension (includes the ".")';
$lang['title_suppress_filename']='Suppress filename in emails and forms the end user will see';
$lang['title_suppress_attachment']='Deny file to be attached with emails';
$lang['title_file_attachment']='Attach files with emails';
$lang['title_file_attachment_copy']='Attach files with email to user';
$lang['title_suppress_attachment']='Deny file to be attached with emails';
$lang['file_rename_help']='To rename a file upon uploading, create the template here. Leave blank to preserve original filename';
$lang['title_legend'] = 'Legend';
$lang['title_maximum_length']='Maximum Length';
$lang['title_checkbox_label']='Checkbox label';
$lang['title_radio_label']='Radio Button label';
$lang['title_checked_value']='Value when checked';
$lang['title_unchecked_value']='Value when not checked.';
$lang['title_checkbox_details']='Checkbox Group Details';
$lang['title_delete'] = 'Delete?';
$lang['title_select_one_message']='"Select One" Text';
$lang['title_selection_value'] = 'Selection Value';
$lang['title_selection_displayname'] = 'Selection Display Name';
$lang['title_selection_subject']='Selection Subject';
$lang['title_select_default_country']='Default Selection';
$lang['title_select_default_state']='Default Selection';
$lang['title_select_default_province']='Default Selection';
$lang['title_option_name']="Option Name";
$lang['title_option_value']="Value Submitted";
$lang['title_pulldown_details']='Pulldown Options';
$lang['title_multiselect_details']='Multiselect Options';
$lang['title_destination_address']='Destination Email Address';
$lang['title_destination_filename'] = 'Destination File Name';
$lang['title_email_from_name']='"From name" for email';
$lang['title_relaxed_email_regex']='Use relaxed email validation';
$lang['title_relaxed_regex_long']='Use relaxed email address validation (e.g., allow "x@y" instead of requiring "x@y.tld")';
$lang['title_email_from_address']='"From address" for email';
$lang['title_email_encoding']='Email character set encoding';
$lang['title_director_details']='Pulldown-based E-mailer Details';
$lang['title_file_name']='File Name';
$lang['title_file_location']='File Location';
$lang['title_email_subject']='Email Subject Line';
$lang['title_form_name']='Form Name';
$lang['title_form_status']='Form Status';
$lang['title_ready_for_deployment']='Ready for Deployment';
$lang['title_not_ready1']='Not Ready';
$lang['title_redirect_page']='Page to redirect to after form submission';
$lang['title_not_ready2']='Please add a field to the form so that the user\'s input gets handled. You can';
$lang['title_not_ready_link']='use this shortcut';
$lang['title_form_alias']='Form Alias';
$lang['title_field_alias_short']='Alias';
$lang['title_form_fields']='Form Fields';
$lang['title_field_id']='Field Id';
$lang['title_show_fieldaliases']='Show Field Aliases';
$lang['title_show_fieldaliases_long']='Clicking this will display field aliases when adding or editing a form';
$lang['title_field_name']='Field Name';
$lang['title_field_alias']='Field Alias and DOM id (CSS id) attribute';
$lang['title_radiogroup_details']='Radio Button Group Details';
$lang['title_field_type']='Field Type';
$lang['title_not_ready3']='to create a form handling field.';
$lang['title_form_alias']='Form Alias';
$lang['title_add_new_form']='Add New Form';
$lang['title_show_version']='Show Form Builder Version?';
$lang['title_show_version_long']='This will embed your installed version number of Form Builder module in a comment, to aid in debugging';
$lang['title_add_new_field']='Add New Field';
$lang['title_form_submit_button']='Form Submit Button Text';
$lang['title_button_text']='Button text';
$lang['title_submit_button_safety']='Add JavaScript to final Submit Button that will help prevent multiple submissions?';
$lang['title_submit_button_safety_help']='Add safety script';
$lang['title_form_next_button']='Form "Next" Button Text (used for multipage forms)';
$lang['title_form_prev_button'] = 'Form "Previous" Button Text (used for multipage forms)';
$lang['title_field_validation']='Field Validation';
$lang['title_field_to_validate'] = 'Field to Validate';
$lang['title_field_css_id']='CSS id for this field';
$lang['title_form_css_class']='CSS Class for this form';
$lang['title_field_css_class']='CSS Class for this field';
$lang['title_form_predisplay_udt'] = 'User defined tag to call before form is displayed the first time (only called once)';
$lang['title_form_predisplay_each_udt'] = 'User defined tag to call before form is displayed (called on every page of multipage forms)';
$lang['title_form_validate_udt'] = 'User defined tag to call during form validation';
$lang['title_form_required_symbol']='Symbol to mark required Fields';
$lang['title_field_required']='Required';
$lang['title_field_required_long']='Require a response for this Field';
$lang['title_hide_label']='Hide Label';
$lang['title_hide_label_long']='Hide this field\'s name on Form';
$lang['title_textarea_length']='Maximum length of field content (0 or blank means no limit)';
$lang['title_text']='Static text to display';
$lang['title_field_regex']='Validation Regex';
$lang['title_lines_to_show'] = 'Number of Lines to display';
$lang['title_read_only'] = 'Read Only';
$lang['no_default']='No Default';
$lang['redirect_after_approval']='Page to redirect after approval';
$lang['title_regex_help']='This regular expression will only be used if "validation type" is set to a regex-related option. Include a full Perl-style regex, including the start/stop slashes and flags (e.g., "/image\.(\d+)/i")';
$lang['title_field_required_abbrev']='Req\'d';
$lang['title_hide_errors']='Hide Errors';
$lang['title_form_displaytype'] = 'Form Display Type';
$lang['title_hide_errors_long']='Prevent debug / error messages from being seen by users.';
$lang['title_email_template']='Email Template';
$lang['title_maximum_size']='Maximum upload file size (kilobytes)';
$lang['title_maximum_size_long'] = 'This limitation is in addition to any limits set by the PHP or web server configuration';
$lang['title_file_destination'] = 'Directory to save files into';
$lang['title_permitted_extensions']='Permitted Extensions';
$lang['title_permitted_extensions_long']='Enter a comma-separated list, excluding the dot (e.g., "jpg,gif,jpeg"). Spaces will be ignored. Leaving this blank means there will be no restrictions.';
$lang['title_show_limitations']='Display restrictions?';
$lang['title_show_limitations_long']='Display any size and extension restrictions with the upload field?';
$lang['title_form_template']='Template to use to Display Form';
$lang['title_page_x_of_y'] = 'Page %s of %s';
$lang['title_no_advanced_options']='Field has no advanced options.';
$lang['title_form_unspecified']='Text to return for unspecified field values';
$lang['title_enable_fastadd_long']='Enable fast field adding pulldown for forms?';
$lang['title_enable_fastadd']='Enable fast field add pulldown?';
$lang['title_fastadd']='Fast field adder';
$lang['title_enable_antispam_long']='Clicking this will only allow 10 emails to be triggered from a given IP address (per hour).';
$lang['title_enable_antispam']='Enable primitive anti-spam features?';
$lang['title_show_fieldids'] = 'Show Field IDs';
$lang['title_show_fieldids_long'] = 'Clicking this will allow displaying field ids when adding or editing a form';
$lang['title_xml_to_upload']='Upload form from XML file';
$lang['title_xml_upload_formname'] = 'Use this form name';
$lang['title_import_legend'] = 'XML Form Import';
$lang['title_xml_upload_formalias'] = 'Use this form alias';
$lang['title_html_email']='Generate HTML email?';
$lang['title_link_autopopulate']='Automatically populate?';
$lang['title_link_autopopulate_help']='Automatically populate with the URL of the page containing the form? (this overrides site page link option below)';
$lang['title_default_link']='Default link URL';
$lang['title_default_link_title']='Default link text';
$lang['title_link_to_sitepage']='Link to site page';
$lang['title_captcha_not_installed'] = 'You can use <a href="http://www.wikipedia.org/wiki/Captcha" target="_blank">"Captcha"</a> to protect form submissions if you install the Captcha module. For more information, <a href="http://dev.cmsmadesimple.org/projects/captcha/" target="_blank">check the Captcha project</a>.';
$lang['title_use_captcha'] = 'Use Captcha to protect form submissions?';
$lang['title_use_captcha_help'] = 'Check here to protect your form with a <a href="http://www.wikipedia.org/wiki/Captcha" target="_blank">"Captcha"</a>.';
$lang['title_user_captcha'] = 'Please confirm that you are not a script by entering the letters from the image.';
$lang['title_user_captcha_error'] = 'Failed text for Captcha';
$lang['wrong_captcha']='Captcha was not correct.';
$lang['title_title_user_captcha'] = 'Help text for Captcha';
$lang['title_dont_submit_unchecked'] = 'Don\'t submit values for unchecked boxes';
$lang['title_dont_submit_unchecked_help'] = 'Check this if you only want checked boxes to return values.';
$lang['link_label']='Link Label';
$lang['link_destination']='Link Destination URL';
$lang['title_default_set']='Checked by Default?';
$lang['title_24_hour']='Use 24-hour clock?';
$lang['title_before_noon'] = 'AM';
$lang['title_after_noon'] = 'PM';
$lang['title_smarty_eval'] = 'Process Smarty tags within field?';
$lang['title_textarea_rows'] = 'Rows (note: this may be overridden by CSS)';
$lang['title_textarea_cols'] = 'Columns (note: this may be overridden by CSS)';
$lang['title_form_main']= 'Main Form Details';
$lang['title_default_blank']='Default to blank';
$lang['title_default_blank_help']='Default to blank (uncheck to default to today\'s date)';
$lang['title_show_username']='Display User\'s login name?';
$lang['title_show_userfirstname']='Display User\'s first name?';
$lang['title_show_userlastname']='Display User\'s last name?';
$lang['title_restrict_to_group']='Restrict user list to users in specified group';
$lang['title_encrypt_database_data'] = 'Encrypt data stored in database';
$lang['title_crypt_cert'] = 'Certificate for encrypting data';
$lang['title_encryption_keyfile'] = 'Pass phrase or path to file containing pass phrase. (If using OpenSSL, this is the pass phrase for the private key)';
$lang['title_encrypt_sortfields'] = 'Hash sort fields?';
$lang['title_private_key'] = 'Private Key to use for encrypting data';
$lang['title_encrypt_sortfields_help'] = 'This hashes the sort fields, but leaves the first few letters unencrypted. Cryptographically, this creates a vulnerability, but for most users it is an acceptable trade off between security and the ability to sort records. Sorting becomes approximate, but will remain pretty good. If you do not use this option, sort fields are stored in plain text.';
$lang['title_encryption_functions'] = 'Storage Encryption Unavailable';
$lang['title_install_crypto'] = 'Please install the OpenSSL module or mcrypt support if you would like to enable database encryption.';
$lang['title_install_curl'] = 'Please make sure you have CURL support active in your PHP install. See http://www.php.net/manual/en/book.curl.php';
$lang['title_mle_version'] = 'Run in MLE Mode';
$lang['title_mle_version_long'] = 'Changes/support for CMSMS Multi-Language Edition fork. Do not check this if you are not running the MLE version.';
$lang['title_ensure_cert_key_match'] = 'Ensure that you select the private key that is appropriate for the certificate you are using for encryption!';
$lang['choose_crypt'] = 'Encryption Library';
$lang['title_encrypt_database_long'] = 'Check this to encrypt the stored data. This makes it more difficult (but not impossible) for hackers to view the information.';
$lang['choose_crypt_long'] = 'The options below only apply if you are using the OpenSSL Encryption library';
$lang['title_crypt_lib']='Encryption Library';
$lang['openssl'] = 'OpenSSL Library';
$lang['mcrypt'] = 'PHP mcrypt Library';
$lang['title_feu_binding'] = 'Frontend User binding';
$lang['title_install_feu'] = 'Please install the Frontend User module to connect a form and its data to a specific user';
$lang['title_feu_bind_help'] = 'Check this to lock front-end access to this form\'s data to the logged-in front-end user.';
$lang['title_encryption'] = 'Encryption';
$lang['title_export_form_to_udt'] = 'Export form reference to UDT as $params[\'FORM\']? (do not do this if you are going to print_r($params) )';
$lang['title_url_help'] = 'Entire URL, including protocol and path (e.g., http://myhost.com/form_handler.cgi)';
$lang['title_url'] = 'Form submission URL';
$lang['title_method'] = 'Form method';
$lang['title_maps_to'] = 'Map field "%s" to form submission variable';
$lang['title_additional'] = 'Additional submission';
$lang['title_additional_help'] = 'Anything to be appended to the submission payload, in URL-encoded form (.e.g, "user=steve+jobs&employee_number=1)';
$lang['title_include_in_submission'] = 'Include field in Submission';
$lang['title_date_order']='Date component field order (for input)';
$lang['title_data_stored_in_fbr'] = 'Data will be stored in an XML format in the [PREFIX]_module_fb_formbrowser database table.';
$lang['error_has_no_fb_field'] = 'Error! Either the form has no Form Browser Disposition, or it failed to instantiate (due to memory issues?)';
$lang['help_date_order']='Use "m" for Month, "d" for Day, and "y" for Year. Separate the items by hyphens.';
$lang['restricted_to_group'] = 'Only in group %s';
$lang['title_show_to_user'] = 'Display to user';
$lang['title_use_random_generator'] = 'Use random number generator instead of static';
$lang['title_numbers_to_generate'] = 'How many numbers to generate in process';
$lang['help_leaveempty'] = 'This field may be left empty';
$lang['help_variables_for_template']='Variables For Template';
$lang['help_variables_for_computation']='Variables Available';
$lang['help_php_variable_name'] = 'PHP variable';
$lang['help_submission_date']='Date of Submission';
$lang['help_server_name']='Your server';
$lang['help_sub_source_ip']='IP address of person using form';
$lang['help_sub_url']='URL of page containing form';
$lang['help_fb_version']='FormBuilder version';
$lang['help_tab']='Tab Character';
$lang['help_ignored_if_upload']='(This field ignored if you use the Uploads module to manage files)';
$lang['help_other_fields']='Alternate field names can be used interchangeably (especially useful if Smarty is choking on characters outside of ASCII 32-126).<br />Other fields will be available as you add them to the form.';
$lang['help_array_fields']='Yet another way of accessing field values is via $fieldname_obj, $alias_obj, or $fld_#_obj, where each field is an object containing:<br /><table>
<tr><td class="odd">name</td><td class="odd">Field Name</td></tr>
<tr><td>type</td><td>Field Type</td></tr>
<tr><td class="odd">id</td><td class="odd">Internal Field ID</td></tr>
<tr><td>value</td><td>Human-readable Value</td></tr>
<tr><td class="odd">valueArray</td><td class="odd">Array of field value(s)</td></tr></table><em>e.g.</em>, you could use "{$fld_1_obj->name} = {$fld_1_obj->value}';
$lang['help_date_format']='See <a href="http://www.php.net/manual/en/function.date.php" target=_NEW>the PHP Manual</a> for formatting help.';
$lang['help_variable_name']='Variable';
$lang['help_form_field']='Field Represented';
$lang['help_rtf_file_template']='Specify a file located in the FormBuilder/templates/ folder. This field is ignored if you use TXT as your file type.';
$lang['help_rtf_template_type']='Basic: Use the textarea below to layout the field names/values in a single block.<br />
Advanced: Specify Smarty variables in the RTF Template File as you would below, but arrange them however you like and add formatting.<br />
&nbsp;You can still use the %%HEADER%% and %%FOOTER%% sections in the RTF file.';
$lang['help_unique_file_template']='For TXT, this will be immediately after the Header Template.<br />
For RTF, this will replace the %%FIELDS%% string in the template file if RTF Template Type is set to "Basic".<br />
This field will be ignored if using "RTF" as File Type and "Advanced" as RTF Template Type.';
$lang['help_file_header_template']='For TXT, this will be placed at the top of the file. For RTF, this will replace the %%HEADER%% string in the template file.';
$lang['help_file_footer_template']='For TXT, this will be placed at the bottom of the file. For RTF, this will replace the %%FOOTER%% string in the template file.';
$lang['link_back_to_form']='&#171; Back to Form';
$lang['title_create_sample_template']='Create Sample Template';
$lang['title_create_sample_html_template']='Create Sample HTML Template';
$lang['title_create_sample_header_template']='Create Sample Header Template';
$lang['title_create_sample_footer_template']='Create Sample Footer Template';
$lang['title_create_sample_header']='Create Sample Header';
$lang['help_tab_symbol']='a tab character';
$lang['title_file_template']='Template for one line of output file';
$lang['title_file_header']='Template for the header of output file';
$lang['title_file_footer']='Template for the footer of output file';
$lang['title_rtf_file_template']='Template RTF file to use';
$lang['title_unique_file_template']='Template for output';
$lang['title_file_type']='Choose a file type to use';
$lang['title_rtf_template_type']='Choose an RTF template type';
$lang['title_confirmation_url']='URL to click for form confirmation';
$lang['title_value'] = 'Value (see Advanced Tab if you use Smarty tags)';
$lang['title_date_format']='Date Format for display (standard <a href="http://www.php.net/manual/en/function.date.php">PHP Date Formats</a>)';
$lang['title_use_wysiwyg']='Use WYSIWYG editor for text Area (Admin side only)?';
$lang['title_submit_actions'] = 'Form Submission Behavior';
$lang['title_submit_labels'] = 'Submission Button Labels';
$lang['title_sortable_field'] = 'Sortable Field #%s';
$lang['title_submit_help'] = 'This page lets you customize Form Submission. It doesn\'t determine what the Form Builder does with the submitted data. You can set that up by adding "Disposition" fields to your form.';
$lang['title_start_year'] = 'Year range start';
$lang['title_end_year'] = 'Year range end';
$lang['title_default_year'] = 'Default Year';
$lang['title_default_year_help'] = '(Set to -1 for default year to be the current year)';
$lang['title_submit_action'] = 'After form is submitted';
$lang['title_submit_response'] = 'Response to display';
$lang['title_submit_date']='Date Submitted';
$lang['title_approval_date']='Date Approved (by admin)';
$lang['title_user_approved']='Date Approved (by submitter)';
$lang['display_text'] = 'Display "Submission Template"';
$lang['redirect_to_page'] = 'Redirect to site page';
$lang['title_submit_response_help'] = 'This template is for display to the user after the form is submitted. This template does not effect emails generated or other form dispositions -- you set those templates (where appropriate) in the "advanced" tab for those disposition fields.';
$lang['title_destination_page'] = 'Destination Page';
$lang['title_require_fieldnames'] = 'Require Field names';
$lang['title_require_fieldnames_long'] = 'Require fields to have a name?';
$lang['title_unique_fieldnames'] = 'Require Unique Field names';
$lang['title_unique_fieldnames_long'] = 'Require fields to have unique names?';
$lang['title_reorder_form'] = 'Reorder Fields';
$lang['title_load_template'] = 'Load template';
$lang['title_add_button_text'] = 'Add Button text';
$lang['title_del_button_text'] = 'Delete Button text';
$lang['title_field_helptext'] = 'Help-text to display with this field';
$lang['title_string_or_number_eval'] = 'Interpret variables as being numbers or strings';
$lang['title_order']='Interpretation Order';
$lang['title_order_help']='If more than one Computed Field exists, they will be computed from lowest order number to highest order number';
$lang['title_string_unspaced'] = 'String (no spaces between fields)?';
$lang['title_compute_value'] = 'Value to compute';
$lang['title_compute'] = 'Computed/PHP';
$lang['title_string'] = 'String';
$lang['title_numeric'] = 'Numeric';
$lang['title_inline_form'] = 'Display form inline?';
$lang['title_inline_form_help'] = 'Inline means any form follow-up replaces the {FormBuilder} tag, non-inline replaces the {content} tag.';
$lang['title_field_default_value'] = 'Default value for field';
$lang['title_clear_default'] = 'Clear default on click?';
$lang['title_clear_default_help'] = 'Check this to clear the default value when the user clicks this field. Since this uses a JavaScript string compare, it will fail if you put single quotes in your default text. Other un-javascript-friendly characters may also cause it to fail.';
$lang['title_remove_file_from_server'] = 'Delete uploaded file from server after processing (email dispositions)';
$lang['title_field_javascript'] = 'JavaScript for field';
$lang['title_field_javascript_long'] = 'Make this the complete JavaScript call, including the event you want to trap, e.g., onclick="yourfn()"';
$lang['title_submit_javascript'] = 'Form Submission JavaScript';
$lang['title_submit_javascript_long'] = 'Make this the complete JavaScript call, including the event you want to trap, e.g., onclick="yourfn()".<br />This will probably not work well if you use the "safety script" option above.';
$lang['email_from_addr_help']='Do not just pick a random address here -- many ISPs will<br />not deliver the mail if you are using a different domain name than your actual<br />host name (i.e., use something like name@%s)';
$lang['title_switch_advanced']='Need more field types? ';
$lang['title_switch_basic']='Too many confusing field types? ';
$lang['title_switch_advanced_link']='Switch to Advanced Mode';
$lang['title_switch_basic_link']='Switch to Simple Mode';
$lang['title_file_root']='Directory to save file in';
$lang['title_file_root_help'] = 'This needs to be a directory that your web server has permissions to write in.<br />
Chmod it 777 if you have problems/doubts.<br />
Also, check to see that you do not have PHP directory restrictions.<br />
If left blank, this will default to your default uploads directory ($config[\'uploads_path\']).';
$lang['title_newline_replacement']='Newline/Carriage Return replacement character';
$lang['title_newline_replacement_help']='Leave blank to allow newlines and carriage returns in output';
$lang['title_send_usercopy'] = 'Send User a Copy of Submission?';
$lang['title_send_usercopy_label'] = 'Label for Checkbox (if user choice)';
$lang['title_send_me_a_copy'] = 'Send me a copy of form';
$lang['title_allow_subject_override'] = 'Allow subject to be overridden?';
$lang['title_allow_subject_override_long'] = 'Allow \'Email "Subject" Fields\' to override the subject specified in the pulldown.';
$lang['title_display_length'] = 'Display length';
$lang['title_minimum_length'] = 'Minimum response length';
$lang['title_hide'] = 'Hide input';
$lang['title_hide_help'] = 'Show symbols rather plain text when user enters password?';
$lang['password_does_not_match'] = 'Password does not match %s';
$lang['back_top'] = 'Back to FormBuilder Main Page';
$lang['title_headers_to_modify'] = 'Which email headers should this input populate?';
$lang['title_blank_invalid'] = 'Do not accept blank space as valid response';
$lang['title_blank_invalid_long'] = 'If a field is required, checking this will require that people put in some alphanumeric characters, not just spaces';
$lang['title_must_save_order'] = 'You must click one of the "save" buttons to make your new field order permanent.';
$lang['title_html5'] = 'Use HTML5 instead of JavaScript';
$lang['title_email_cc_address'] = 'Address(es) to email as Carbon copy (CC). Use commas to delimit multiple addresses.';
$lang['title_use_bcc']='Use Blind carbon copy (BCC instead of CC)';
$lang['title_send_using']='Mail Addressing';
$lang['title_field_to_modify']='Email field to add CC address';
$lang['title_modifies']='Add CC to "%s"';
$lang['bcc_field']='"BCC" recipients';
$lang['cc_field']='"CC" recipients';
$lang['to_field']='Normal ("To" recipients)';
$lang['bcc']='BCC';
$lang['cc']='CC';

$lang['error_CompanyDirectory_module_not_available'] = 'Company Directory module is not available!';
$lang['option_never'] = 'Never';
$lang['option_user_choice'] = 'Give user a choice (checkbox)';
$lang['option_always'] = 'Always';
$lang['option_from'] = '"From" email address';
$lang['option_reply'] = '"Reply-To" email address';
$lang['option_both'] = 'Both "From" and "Reply-To" email addresses';
$lang['option_dropdown']='Dropdown';
$lang['option_selectlist_single']='Select List (single)';
$lang['option_selectlist_multiple']='Select List (multiple)';
$lang['option_radiogroup']='Radio Group';
$lang['title_company_field_note']='Note: Output will be in the form of<br/>"company name"=>"value"';
$lang['title_pick_categories']='Pick a category (multiple)';
$lang['title_pick_fielddef']='Pull a field Definition\'s value (single) <em>optional</em>';
$lang['title_choose_user_input']='Choose User input';
$lang['title_see_also_udt']='(Also take a look at the Form Submission tab if you want to set a UDT for form validation)';
$lang['title_year_end_message']='End year';
$lang['title_field_logic']='Smarty data or logic that is meant to be sent with this field';
$lang['title_field_logic_long']='Can be Smarty data, JavaScript, or some other data you want to sent along with this field.<br />Goes through the Smarty compiler, so remember use {literal}{/literal} tags with &lt;script&gt;&lt;/script&gt;';
$lang['title_field_includelabels']='Include labels';
$lang['title_field_includelabels_help']='Enabling this includes labels to output. example - label: value,label2: value2';
$lang['title_field_siblings']='Link this field to it\'s sibling';
$lang['title_field_siblings_help']='Dropdown lists all siblings of this field and allows you to link this field to one of it\'s sibling. Makes possible controlling this field with selected sibling controls.';
$lang['title_field_hidebuttons']='Hide control buttons';
$lang['title_field_hidebuttons_help']='Hides frontend control buttons of this field.';
$lang['title_note']='Note';
$lang['title_changing_triggers_reindex']='Changing any of the above fields will trigger a re-index of *all* saved records, so it could take a while.';
$lang['illegal_file']='Attempted upload of illegal file type (%s) from %s';
$lang['title_searchable']='Make records accessible to Search Module';
$lang['title_searchable_help']='Checking this will make all submitted data accessible to the Search Module. DO NOT use this if you encrypt your data -- the information gets exposed to search whether or not it is encrypted!';
$lang['uploaded_outside_webroot']='%s (outside web root)';
$lang['title_fbr_edit']='Editable in FormBrowser Admin?';
$lang['title_active_only']='Only include active users?';

$lang['error_usertag_disposition'] = 'User defined tag returned an error';
$lang['error_usertag'] = 'User defined tag %s returned an error.';
$lang['error_cataloger_module_not_available']='<strong>Cataloger module does not seem to be installed/active.</strong>';
$lang['warning'] = 'WARNING!';
$lang['select_source_template'] = 'Select a source template:';
$lang['default_template'] = 'Default Template';
$lang['table_left_template'] = 'Table Template, Titles on left';
$lang['table_top_template'] = 'Table Template, Title on top';
$lang['form_template_name'] = 'Copy template from: %s';
$lang['template_are_you_sure']='Are you sure you want to overwrite your template with the selected template? (Even if you say OK, you will still need to save the change)';
$lang['title_bad_function'] = 'Error when computing "%s".';
$lang['no_referrer_info']='No HTTP_REFERER info available (probably due to use of User Email Validation)';
$lang['validation_param_error']='Validation Parameter Error. Please make sure you copy the URL from your email correctly!';
$lang['validation_response_error']='Validation Response Error. Please make sure you copy the URL from your email correctly!';
$lang['validation_no_field_error']='Validation Response Error. No email validation field in this form!';
$lang['upgrade03to04'] = 'Form Template was updated automatically as part of the version 0.3 to version 0.4 upgrade. You may need to make some fixes. If you\'re using the default form, simply replace this template with "default" using the pulldown above.';
$lang['admindesc']='Add, edit and manage interactive Forms';
$lang['must_specify_one_admin']='Must specify an Admin';


$lang['operators_help'] = 'If you use String evaluation, the only operation available is concatenation (+). If you use Number evaluation you have basic, very simple math (, +, -, *, /, ). If you use Computed/PHP evaluation, you can
use any function you want, but you need to quote things (substitution occurs before evaluation), e.g., substr(\'$fld_22\',0,2).\'$fld_23\'.'; 
$lang['help_module_interface']='Using Module Interface';
$lang['help_module_interface_long']='<b>This field is used as a gateway to other modules!</b>
Use it by creating your form elements in the templates of the other module(s) you wish to incorporate, and using the <strong>{$FBid}</strong> to tie it back to FormBuilder. For example, to include form options based on the Products module, create the following template in Products:<br />
<pre>
{foreach from=$items item=entry}
	{assign var=MData value=\'\'}
	{assign var=Cd value=\'\'}
		{foreach from=$FBvalue item=MData}
			{assign var=MData value=\'::\'|explode:$MData}
			{if $MData[1]==$entry->id}
				{assign var=Cd value=\' checked="checked"\'}
			{/if}
		{/foreach}
	&lt;div class="ProductDirectoryItem">
		&lt;input type="checkbox" value="{$entry->price}::{$entry->id}" name="{$FBid}[]" {$Cd} />{$entry->product_name} ({$entry->weight}{$weight_units}) &pound;{$entry->price}    
	&lt;/div>
{/foreach}
</pre>
<br/>
where in the input below you put something like <strong>{Products category="cat" summarytemplate="Your_FB_template"}</strong>';
$lang['title_add_tag'] = 'Add your tag';

$lang['date_january']='January';
$lang['date_february']='February';
$lang['date_march']='March';
$lang['date_april']='April';
$lang['date_may']='May';
$lang['date_june']='June';
$lang['date_july']='July';
$lang['date_august']='August';
$lang['date_september']='September';
$lang['date_october']='October';
$lang['date_november']='November';
$lang['date_december']='December';

$lang['AD']='Andorra';
$lang['AE']='United Arab Emirates';
$lang['AF']='Afghanistan';
$lang['AG']='Antigua and Barbuda';
$lang['AI']='Anguilla';
$lang['AL']='Albania';
$lang['AM']='Armenia';
$lang['AN']='Netherlands Antilles';
$lang['AO']='Angola';
$lang['AQ']='Antarctica';
$lang['AR']='Argentina';
$lang['AS']='American Samoa';
$lang['AT']='Austria';
$lang['AU']='Australia';
$lang['AW']='Aruba';
$lang['AX']='Aland Islands';
$lang['AZ']='Azerbaijan';
$lang['BA']='Bosnia and Herzegovina';
$lang['BB']='Barbados';
$lang['BD']='Bangladesh';
$lang['BE']='Belgium';
$lang['BF']='Burkina Faso';
$lang['BG']='Bulgaria';
$lang['BH']='Bahrain';
$lang['BI']='Burundi';
$lang['BJ']='Benin';
$lang['BM']='Bermuda';
$lang['BN']='Brunei Darussalam';
$lang['BO']='Bolivia';
$lang['BR']='Brazil';
$lang['BS']='Bahamas';
$lang['BT']='Bhutan';
$lang['BV']='Bouvet Island';
$lang['BW']='Botswana';
$lang['BY']='Belarus';
$lang['BZ']='Belize';
$lang['CA']='Canada';
$lang['CC']='Cocos (Keeling) Islands';
$lang['CD']='Congo,  Democratic Republic';
$lang['CF']='Central African Republic';
$lang['CG']='Congo';
$lang['CH']='Switzerland';
$lang['CI']='Ivoire (Ivory Coast)';
$lang['CK']='Cook Islands';
$lang['CL']='Chile';
$lang['CM']='Cameroon';
$lang['CN']='China';
$lang['CO']='Colombia';
$lang['CR']='Costa Rica';
$lang['CU']='Cuba';
$lang['CV']='Cape Verde';
$lang['CX']='Christmas Island';
$lang['CY']='Cyprus';
$lang['CZ']='Czech Republic';
$lang['DE']='Germany';
$lang['DJ']='Djibouti';
$lang['DK']='Denmark';
$lang['DM']='Dominica';
$lang['DO']='Dominican Republic';
$lang['DZ']='Algeria';
$lang['EC']='Ecuador';
$lang['EE']='Estonia';
$lang['EG']='Egypt';
$lang['EH']='Western Sahara';
$lang['ER']='Eritrea';
$lang['ES']='Spain';
$lang['ET']='Ethiopia';
$lang['FI']='Finland';
$lang['FJ']='Fiji';
$lang['FK']='Falkland Islands (Malvinas)';
$lang['FM']='Micronesia';
$lang['FO']='Faroe Islands';
$lang['FR']='France';
$lang['FX']='France,  Metropolitan';
$lang['GA']='Gabon';
$lang['GB']='Great Britain (UK)';
$lang['GD']='Grenada';
$lang['GE']='Georgia';
$lang['GF']='French Guiana';
$lang['GF']='Guernsey';
$lang['GH']='Ghana';
$lang['GI']='Gibraltar';
$lang['GL']='Greenland';
$lang['GM']='Gambia';
$lang['GN']='Guinea';
$lang['GP']='Guadeloupe';
$lang['GQ']='Equatorial Guinea';
$lang['GR']='Greece';
$lang['GS']='S. Georgia and S. Sandwich Isls.';
$lang['GT']='Guatemala';
$lang['GU']='Guam';
$lang['GW']='Guinea-Bissau';
$lang['GY']='Guyana';
$lang['HK']='Hong Kong';
$lang['HM']='Heard and McDonald Islands';
$lang['HN']='Honduras';
$lang['HR']='Croatia (Hrvatska)';
$lang['HT']='Haiti';
$lang['HU']='Hungary';
$lang['ID']='Indonesia';
$lang['IE']='Ireland';
$lang['IL']='Israel';
$lang['IM']='Isle of Man';
$lang['IN']='India';
$lang['IO']='British Indian Ocean Territory';
$lang['IQ']='Iraq';
$lang['IR']='Iran';
$lang['IS']='Iceland';
$lang['IT']='Italy';
$lang['JE']='Jersey';
$lang['JM']='Jamaica';
$lang['JO']='Jordan';
$lang['JP']='Japan';
$lang['KE']='Kenya';
$lang['KG']='Kyrgyzstan';
$lang['KH']='Cambodia';
$lang['KI']='Kiribati';
$lang['KM']='Comoros';
$lang['KN']='Saint Kitts and Nevis';
$lang['KP']='Korea (North)';
$lang['KR']='Korea (South)';
$lang['KW']='Kuwait';
$lang['KY']='Cayman Islands';
$lang['KZ']='Kazakhstan';
$lang['LA']='Laos';
$lang['LB']='Lebanon';
$lang['LC']='Saint Lucia';
$lang['LI']='Liechtenstein';
$lang['LK']='Sri Lanka';
$lang['LR']='Liberia';
$lang['LS']='Lesotho';
$lang['LT']='Lithuania';
$lang['LU']='Luxembourg';
$lang['LV']='Latvia';
$lang['LY']='Libya';
$lang['MA']='Morocco';
$lang['MC']='Monaco';
$lang['MD']='Moldova';
$lang['MG']='Madagascar';
$lang['MH']='Marshall Islands';
$lang['MK']='F.Y.R.O.M. (Macedonia)';
$lang['ML']='Mali';
$lang['MM']='Myanmar';
$lang['MN']='Mongolia';
$lang['MO']='Macau';
$lang['MP']='Northern Mariana Islands';
$lang['MQ']='Martinique';
$lang['MR']='Mauritania';
$lang['MS']='Montserrat';
$lang['MT']='Malta';
$lang['MU']='Mauritius';
$lang['MV']='Maldives';
$lang['MW']='Malawi';
$lang['MX']='Mexico';
$lang['MY']='Malaysia';
$lang['MZ']='Mozambique';
$lang['NA']='Namibia';
$lang['NC']='New Caledonia';
$lang['NE']='Niger';
$lang['NF']='Norfolk Island';
$lang['NG']='Nigeria';
$lang['NI']='Nicaragua';
$lang['NL']='Netherlands';
$lang['NO']='Norway';
$lang['NP']='Nepal';
$lang['NR']='Nauru';
$lang['NT']='Neutral Zone';
$lang['NU']='Niue';
$lang['NZ']='New Zealand (Aotearoa)';
$lang['OM']='Oman';
$lang['PA']='Panama';
$lang['PE']='Peru';
$lang['PF']='French Polynesia';
$lang['PG']='Papua New Guinea';
$lang['PH']='Philippines';
$lang['PK']='Pakistan';
$lang['PL']='Poland';
$lang['PM']='St. Pierre and Miquelon ';
$lang['PN']='Pitcairn';
$lang['PR']='Puerto Rico';
$lang['PS']='Palestinian Territory';
$lang['PT']='Portugal';
$lang['PW']='Palau';
$lang['PY']='Paraguay';
$lang['QA']='Qatar';
$lang['RE']='Reunion';
$lang['RO']='Romania';
$lang['RS']='Serbia';
$lang['RU']='Russian Federation';
$lang['RW']='Rwanda';
$lang['SA']='Saudi Arabia';
$lang['SB']='Solomon Islands';
$lang['SC']='Seychelles';
$lang['SD']='Sudan';
$lang['SE']='Sweden';
$lang['SG']='Singapore';
$lang['SH']='St. Helena';
$lang['SI']='Slovenia';
$lang['SJ']='Svalbard &amp; Jan Mayen Islands';
$lang['SK']='Slovak Republic';
$lang['SL']='Sierra Leone';
$lang['SM']='San Marino';
$lang['SN']='Senegal';
$lang['SO']='Somalia';
$lang['SR']='Suriname';
$lang['ST']='Sao Tome and Principe';
$lang['SV']='El Salvador';
$lang['SY']='Syria';
$lang['SZ']='Swaziland';
$lang['TC']='Turks and Caicos Islands';
$lang['TD']='Chad';
$lang['TF']='French Southern Territories';
$lang['TG']='Togo';
$lang['TH']='Thailand';
$lang['TJ']='Tajikistan';
$lang['TK']='Tokelau';
$lang['TM']='Turkmenistan';
$lang['TN']='Tunisia';
$lang['TO']='Tonga';
$lang['TP']='East Timor';
$lang['TR']='Turkey';
$lang['TT']='Trinidad and Tobago';
$lang['TV']='Tuvalu';
$lang['TW']='Taiwan';
$lang['TZ']='Tanzania';
$lang['UA']='Ukraine';
$lang['UG']='Uganda';
$lang['UK']='United Kingdom';
$lang['UM']='US Minor Outlying Islands';
$lang['US']='United States';
$lang['UY']='Uruguay';
$lang['UZ']='Uzbekistan';
$lang['VA']='Vatican City State (Holy See)';
$lang['VC']='Saint Vincent &amp; the Grenadines';
$lang['VE']='Venezuela';
$lang['VG']='Virgin Islands (British)';
$lang['VI']='Virgin Islands (U.S.)';
$lang['VN']='Viet Nam';
$lang['VU']='Vanuatu';
$lang['WF']='Wallis and Futuna Islands';
$lang['WS']='Samoa';
$lang['YE']='Yemen';
$lang['YT']='Mayotte';
$lang['YU']='Yugoslavia';
$lang['ZA']='South Africa';
$lang['ZM']='Zambia';
$lang['ZW']='Zimbabwe';

$lang['submission_error'] = 'Sorry! There was an error handling your form submission.';
$lang['submit_error']='FormBuilder submit error: %s';
$lang['uploads_error'] = 'Error committing file to the uploads module: %s';
$lang['nouploads_error'] = 'Could not find the uploads module';
$lang['upload_attach_error'] = 'Upload/Attachment error on file %s (tmp_name: %s, of type %s)';
$lang['submission_error_file_lock'] = 'Error. Unable to obtain lock for file.';
$lang['unchecked_by_default']='Default: unchecked';
$lang['checked_by_default']='Default: checked';

$lang['email_default_template'] = "FormBuilder Submission";
$lang['email_template_not_set'] = '<br />Email Template not yet set!';      
$lang['missing_cms_mailer'] = 'FormBuilder: Cannot find required module CMSMailer!';  		
$lang['user_approved_submission']='User approved submission %s from %s';

$lang['event_info_OnFormBuilderFormSubmit']='Sent when a FormBuilder form is submitted';
$lang['event_info_OnFormBuilderFormSubmitError']='Sent if there is an error when a FormBuilder form is submitted';
$lang['event_info_OnFormBuilderFormDisplay']='Sent when a FormBuilder form is displayed';

$lang['event_help_OnFormBuilderFormSubmit']='<h4>Parameters</h4>
<ul>
<li><em>form_name</em> - The form name (string)</li>
<li><em>form_id</em> - The internal form id (int)</li>
<li><em>value_&lt;name&gt;</em> - Supply a default value to a field with the specified name.</li>
</ul> ';
$lang['event_help_OnFormBuilderFormSubmitError']='<h4>Parameters</h4>
<ul>
<li><em>form_name</em> - The form name (string)</li>
<li><em>form_id</em> - The internal form id (int)</li>
<li><em>error</em> - A list of all known errors (string)</li>
</ul> ';
$lang['event_help_OnFormBuilderFormDisplay']='<h4>Parameters</h4>
<ul>
<li><em>form_name</em> - The form name (string)</li>
<li><em>form_id</em> - The internal form id (int)</li>
</ul> ';

$lang['formbuilder_params_response_id'] = 'Response ID. Used by FormBrowser';
$lang['formbuilder_params_passed_from_tag'] = 'Default field values; see module help';
$lang['formbuilder_params_field_id'] = 'Field ID for internal operations';
$lang['formbuilder_params_form_name'] = 'Form Name';
$lang['formbuilder_params_form_id'] = 'Form ID for internal operations';
$lang['formbuilder_params_general'] = 'General parameters for internal operations';

$lang['template_variable_help'] = "
<h3>Form Template Variables</h3>
<p>You can edit it to make your form layout look any way you'd like.
   To make the form work, you'll need to always include the &#123;\$fb_hidden} and &#123;\$submit}
   tags.</p>

<p>You can access your form fields either using the \$fields array or by directly accessing fields by their names (e.g., &#123;\$myfield->input} )</p>


<p>Each field has the following attributes:</p>
<table>
<tr><th>Variable</th><th>Value</th></tr>
<tr><td>\$entry->display</td><td>1 if the field should be displayed, 0 otherwise</td></tr>
<tr><td>\$entry->required</td><td>1 if the field is required, 0 otherwise</td></tr>
<tr><td>\$entry->required_symbol</td><td>the symbol for required fields</td></tr>
<tr><td>\$entry->css_class</td><td>the CSS class specified for this field</td></tr>
<tr><td>\$entry->valid</td><td>1 if this field has passed validation, 0 otherwise</td></tr>
<tr><td>\$entry->error</td><td>Text of the validation problem, in the event that this field did not validate</td></tr>
<tr><td>\$entry->hide_name</td><td>1 if the field name should be hidden, 0 otherwise</td></tr>
<tr><td>\$entry->has_label</td><td>1 if the field type has a label</td></tr>
<tr><td>\$entry->needs_div</td><td>1 if the field needs to be wrapped in a DIV (or table row, if that's the way you swing)</td></tr>
<tr><td>\$entry->name</td><td>the field's name</td></tr>
<tr><td>\$entry->helptext</td><td>the field's help text</td></tr>
<tr><td>\$entry->input</td><td>the field's input control (e.g., the input field itself)</td></tr>
<tr><td>\$entry->op</td><td>a control button associated with the field if applicable (e.g., the delete button for expandable text input)</td></tr>
<tr><td>\$entry->input_id</td><td>the ID of the field's input (useful for label for=\"foo\")</td></tr>
<tr><td>\$entry->alias</td><td>the alias specified for this field</td></tr>
<tr><td>\$entry->id</td><td>the internal / opaque id FormBuilder uses for this field</td></tr>
<tr><td>\$entry->type</td><td>the field's data type</td></tr>                             
<tr><td>\$entry->multiple_parts</td><td>1 if the field->input is actually a collection of controls</td></tr>
<tr><td>\$entry->label_parts</td><td>1 if the collection of controls has separate labels for each control</td></tr>
</table>

<p>In the case of a multipage form, you will also have access to the value of previous fields. They
are in the \$previous array, or accessible by their names (e.g., &#123;\$myfield->value} ).
You can use this in Static Text fields as well, which is a nice way to personalize forms!</p>

<p>In certain cases, field->input is actually an array of objects rather than an input. This happens, for example, in CheckBoxGroups or RadioButtonGroups. For them, you can iterate through field->input->name and field->input->inputs.</p>
    
<p>Additional smarty variables that you can use include:</p>
<table>
<tr><th>Variable</th><th>Value</th></tr>
<tr><td>\$total_pages</td><td>number of pages for multi-page forms</td></tr>
<tr><td>\$this_page</td><td>number fo the current page for multi-page forms</td></tr>
<tr><td>\$title_page_x_of_y</td><td>displays \"page x of y\" for multi-page forms</td></tr>
<tr><td>\$css_class</td><td>CSS Class for the form</td></tr>
<tr><td>\$form_name</td><td>Form name</td></tr>
<tr><td>\$form_id</td><td>Form database ID</td></tr>
<tr><td>\$in_formbrowser</td><td>1 if form is being viewed from FormBrowser</td></tr>
<tr><td>\$in_admin</td><td>1 if form is being viewed via FormBrowser admin</td></tr>
<tr><td>\$fbr_id</td><td>Response ID if form is being viewed from FormBrowser</td></tr>
<tr><td>\$prev</td><td>\"Back\" button for multipart forms</td></tr>
<tr><td>\$submit</td><td>\"Continue\" or \"Submit\" button for multipart forms, adjusts automatically</td></tr>
</table>
";

// post-install message
$lang['post_install']="FormBuilder installed. Please consult the module's Help page for documentation.";

$lang['title_month_input'] = "Month Format for Form Input";
$lang['opt_month_input_text'] = "Text";
$lang['opt_month_input_number'] = "Number";
$lang['opt_month_input_both'] = "Both";
$lang['title_default_time'] = "Default Time";
$lang['title_default_time_help'] = '(Set to -1 for default time to be the current time)';
$lang['title_minute_interval'] = "Minute Interval";


?>
