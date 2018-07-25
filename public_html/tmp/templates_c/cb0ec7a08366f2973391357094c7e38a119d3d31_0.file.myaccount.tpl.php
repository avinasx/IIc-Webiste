<?php
/* Smarty version 3.1.31, created on 2018-07-20 04:32:35
  from "/data/home/iic/public_html/admin/templates/myaccount.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b51188b3e2cc6_55649260',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cb0ec7a08366f2973391357094c7e38a119d3d31' => 
    array (
      0 => '/data/home/iic/public_html/admin/templates/myaccount.tpl',
      1 => 1517033802,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b51188b3e2cc6_55649260 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_cms_help')) require_once '/data/home/iic/public_html/admin/plugins/function.cms_help.php';
if (!is_callable('smarty_function_html_options')) require_once '/data/home/iic/public_html/lib/smarty/plugins/function.html_options.php';
echo '<script'; ?>
 type="text/javascript">
jQuery(document).ready(function(){
  $('.helpicon').click(function(){
    var x = $(this).attr('name');
    $('#'+x).dialog();
  });
});
<?php echo '</script'; ?>
>

<div class="pagecontainer">
<?php echo $_smarty_tpl->tpl_vars['tab_start']->value;?>


<?php if ($_smarty_tpl->tpl_vars['manageaccount']->value) {?>
  <?php echo $_smarty_tpl->tpl_vars['maintab_start']->value;?>

  <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['formurl']->value;?>
">
    <input type="hidden" name="active_tab" value="maintab" />
    <div class="pageoverflow">
		<div class="pageinput">
			<input class="pagebutton" type="submit" name="submit_account" value="<?php echo lang('submit');?>
" />
			<input class="pagebutton" type="submit" name="cancel" value="<?php echo lang('cancel');?>
" />
		</div>
    </div>

    <div class="pageoverflow">
      <p class="pagetext">
        <label for="username">*<?php echo lang('name');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_myaccount_username','title'=>lang('name')),$_smarty_tpl);?>

      </p>
      <p class="pageinput"><input type="text" id="username" name="user" maxlength="25" value="<?php echo $_smarty_tpl->tpl_vars['userobj']->value->username;?>
" class="standard" /></p>
    </div>

    <div class="pageoverflow">
      <p class="pagetext"><label for="password"><?php echo lang('password');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_myaccount_password','title'=>lang('password')),$_smarty_tpl);?>
</p>
      <p class="pageinput">
        <input type="password" id="password" name="password" maxlength="25" value="" />&nbsp;<?php echo lang('info_edituser_password');?>

      </p>
    </div>

    <div class="pageoverflow">
      <p class="pagetext"><label for="passwordagain"><?php echo lang('passwordagain');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_myaccount_passwordagain','title'=>lang('passwordagain')),$_smarty_tpl);?>
</p>
      <p class="pageinput"><input type="password" id="passwordagain" name="passwordagain" maxlength="25" value="" class="standard" />&nbsp;<?php echo lang('info_edituser_passwordagain');?>
</p>
    </div>

    <div class="pageoverflow">
      <p class="pagetext"><label for="firstname"><?php echo lang('firstname');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_myaccount_firstname','title'=>lang('firstname')),$_smarty_tpl);?>
</p>
      <p class="pageinput"><input type="text" id="firstname" name="firstname" maxlength="50" value="<?php echo $_smarty_tpl->tpl_vars['userobj']->value->firstname;?>
" class="standard" /></p>
    </div>

    <div class="pageoverflow">
      <p class="pagetext"><label for="lastname"><?php echo lang('lastname');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_myaccount_lastname','title'=>lang('lastname')),$_smarty_tpl);?>
</p>
      <p class="pageinput"><input type="text" id="lastname" name="lastname" maxlength="50" value="<?php echo $_smarty_tpl->tpl_vars['userobj']->value->lastname;?>
" class="standard" /></p>
    </div>

    <div class="pageoverflow">
      <p class="pagetext"><label for="email"><?php echo lang('email');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_myaccount_email','title'=>lang('email')),$_smarty_tpl);?>
</p>
      <p class="pageinput"><input type="text" id="email" name="email" maxlength="255" value="<?php echo $_smarty_tpl->tpl_vars['userobj']->value->email;?>
" class="standard" /></p>
    </div>
  </form>
  <?php echo $_smarty_tpl->tpl_vars['tab_end']->value;?>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['managesettings']->value) {
echo $_smarty_tpl->tpl_vars['advancedtab_start']->value;?>

<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['formurl']->value;?>
">
  <input type="hidden" name="active_tab" value="advtab" />
    <div class="pageoverflow">
      <div class="invisible">
      <input type="hidden" name="edituserprefs" value="true" />
      <input type="hidden" name="old_default_cms_lang" value="<?php echo $_smarty_tpl->tpl_vars['old_default_cms_lang']->value;?>
" />
      </div>
      <p class="pageinput">
        <input type="submit" name="submit_prefs" value="<?php echo lang('submit');?>
" class="pagebutton" />
        <input type="submit" name="cancel" value="<?php echo lang('cancel');?>
" class="pagebutton" />
      </p>
    </div>
    <fieldset>
      <legend><?php echo lang('lang_settings_legend');?>
:</legend>
      <div class="pageoverflow">
	<p class="pagetext"><label for="language"><?php echo lang('language');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_myaccount_language','title'=>lang('language')),$_smarty_tpl);?>
</p>
	<p class="pageinput">
	  <select id="language" name="default_cms_language">
	    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['language_opts']->value,'selected'=>$_smarty_tpl->tpl_vars['default_cms_language']->value),$_smarty_tpl);?>

	  </select>
	</p>
      </div>

      <div class="pageoverflow">
        <p class="pagetext"><label for="dateformat"><?php echo lang('date_format_string');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_myaccount_dateformat','title'=>lang('date_format_string')),$_smarty_tpl);?>
</p>
	<p class="pageinput">
 	  <input class="pagenb" size="20" maxlength="255" type="text" name="date_format_string" value="<?php echo $_smarty_tpl->tpl_vars['date_format_string']->value;?>
" />
 	  <?php echo lang('date_format_string_help');?>

	</p>
      </div>
    </fieldset>

    <fieldset>
      <legend><?php echo lang('content_editor_legend');?>
:</legend>
      <div class="pageoverflow">
        <p class="pagetext"><label for="wysiwyg"><?php echo lang('wysiwygtouse');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_myaccount_wysiwyg','title'=>lang('wysiwygtouse')),$_smarty_tpl);?>
</p>
        <p class="pageinput">
	  <select id="wysiwyg" name="wysiwyg">
	    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['wysiwyg_opts']->value,'selected'=>$_smarty_tpl->tpl_vars['wysiwyg']->value),$_smarty_tpl);?>

	  </select>
	</p>
      </div>

      <div class="pageoverflow">
	<p class="pagetext"><label for="syntaxh"><?php echo lang('syntaxhighlightertouse');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_myaccount_syntax','title'=>lang('syntaxhighlightertouse')),$_smarty_tpl);?>
</p>
	<p class="pageinput">
	  <select id="syntaxh" name="syntaxhighlighter">
	    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['syntax_opts']->value,'selected'=>$_smarty_tpl->tpl_vars['syntaxhighlighter']->value),$_smarty_tpl);?>

	  </select>
	</p>
      </div>

      <div class="pageoverflow">
        <p class="pagetext"><label for="ce_navdisplay"><?php echo lang('ce_navdisplay');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_myaccount_ce_navdisplay','title'=>lang('ce_navdisplay')),$_smarty_tpl);?>
</p>
        <p class="pageinput">
          <?php $_tmp_array = isset($_smarty_tpl->tpl_vars['opts']) ? $_smarty_tpl->tpl_vars['opts']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array[''] = lang('none');
$_smarty_tpl->_assignInScope('opts', $_tmp_array);
?>
          <?php $_tmp_array = isset($_smarty_tpl->tpl_vars['opts']) ? $_smarty_tpl->tpl_vars['opts']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array['menutext'] = lang('menutext');
$_smarty_tpl->_assignInScope('opts', $_tmp_array);
?>
          <?php $_tmp_array = isset($_smarty_tpl->tpl_vars['opts']) ? $_smarty_tpl->tpl_vars['opts']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array['title'] = lang('title');
$_smarty_tpl->_assignInScope('opts', $_tmp_array);
?>
          <select id="ce_navdisplay" name="ce_navdisplay">
          <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['opts']->value,'selected'=>$_smarty_tpl->tpl_vars['ce_navdisplay']->value),$_smarty_tpl);?>

          </select>
        </p>
      </div>

      <div class="pageoverflow">
        <p class="pagetext"><label for="parent_id"><?php echo lang('defaultparentpage');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_myaccount_dfltparent','title'=>lang('defaultparentpage')),$_smarty_tpl);?>
</p>
	<p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['default_parent']->value;?>
</p>
      </div>

      <div class="pageoverflow">
	<p class="pagetext"><label for="indent"><?php echo lang('adminindent');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_myaccount_indent','title'=>lang('adminindent')),$_smarty_tpl);?>
</p>
	<p class="pageinput">
	  <input class="pagenb" type="checkbox" id="indent" name="indent" <?php if ($_smarty_tpl->tpl_vars['indent']->value == true) {?>checked="checked"<?php }?> />
	  <?php echo lang('indent');?>

	</p>
      </div>
      <!-- content display //-->
    </fieldset>

    <fieldset>
      <legend><?php echo lang('admin_layout_legend');?>
:</legend>
      <div class="pageoverflow">
	<p class="pagetext"><label for="admintheme"><?php echo lang('admintheme');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_myaccount_admintheme','title'=>lang('admintheme')),$_smarty_tpl);?>
</p>
	<p class="pageinput">
	  <select id="admintheme" name="admintheme">
	    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['themes_opts']->value,'selected'=>$_smarty_tpl->tpl_vars['admintheme']->value),$_smarty_tpl);?>

	  </select>
	</p>
      </div>

      <div class="pageoverflow">
        <p class="pagetext"><label for="homepage"><?php echo lang('homepage');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_myaccount_homepage','title'=>lang('homepage')),$_smarty_tpl);?>
</p>
        <p class="pageinput">
	  <?php echo $_smarty_tpl->tpl_vars['homepage']->value;?>

	</p>
      </div>

      <div class="pageoverflow">
	<p class="pagetext"><label for="admincallout"><?php echo lang('admincallout');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_myaccount_admincallout','title'=>lang('admincallout')),$_smarty_tpl);?>
</p>
	<p class="pageinput">
	  <input class="pagenb" id="admincallout" type="checkbox" name="bookmarks" <?php if ($_smarty_tpl->tpl_vars['bookmarks']->value == true) {?>checked="checked"<?php }?> />
	  <?php echo lang('showbookmarks');?>

	</p>
      </div>

      <div class="pageoverflow">
	<p class="pagetext"><label for="hidehelp"><?php echo lang('hide_help_links');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_myaccount_hidehelp','title'=>lang('hide_help_links')),$_smarty_tpl);?>
</p>
	<p class="pageinput">
	  <input class="pagenb" id="hidehelp" type="checkbox" name="hide_help_links" <?php if ($_smarty_tpl->tpl_vars['hide_help_links']->value == true) {?>checked="checked"<?php }?> />
	  <?php echo lang('hide_help_links_help');?>

	</p>
      </div>

   <div class="pageoverflow">
     <div class="invisible">
	<input type="hidden" name="edituserprefs" value="true" />
	<input type="hidden" name="old_default_cms_lang" value="<?php echo $_smarty_tpl->tpl_vars['old_default_cms_lang']->value;?>
" />
     </div>
     <p class="pageinput">
	<input type="submit" name="submit_prefs" value="<?php echo lang('submit');?>
" class="pagebutton" />
	<input type="submit" name="cancel" value="<?php echo lang('cancel');?>
" class="pagebutton" />
     </p>
   </div>
 </form>

<?php echo $_smarty_tpl->tpl_vars['tab_end']->value;?>

<?php }?>

<?php echo $_smarty_tpl->tpl_vars['tabs_end']->value;?>

</div><?php }
}
