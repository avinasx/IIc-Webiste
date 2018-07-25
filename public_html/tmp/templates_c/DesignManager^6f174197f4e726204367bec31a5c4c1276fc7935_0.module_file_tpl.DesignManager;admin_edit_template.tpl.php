<?php
/* Smarty version 3.1.31, created on 2018-07-23 11:55:18
  from "module_file_tpl:DesignManager;admin_edit_template.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b5574ce813ae4_18718363',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6f174197f4e726204367bec31a5c4c1276fc7935' => 
    array (
      0 => 'module_file_tpl:DesignManager;admin_edit_template.tpl',
      1 => 1517033802,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b5574ce813ae4_18718363 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_form_start')) require_once '/data/home/iic/public_html/lib/plugins/function.form_start.php';
if (!is_callable('smarty_function_cms_help')) require_once '/data/home/iic/public_html/admin/plugins/function.cms_help.php';
if (!is_callable('smarty_modifier_cms_date_format')) require_once '/data/home/iic/public_html/lib/plugins/modifier.cms_date_format.php';
if (!is_callable('smarty_function_tab_header')) require_once '/data/home/iic/public_html/admin/plugins/function.tab_header.php';
if (!is_callable('smarty_function_tab_start')) require_once '/data/home/iic/public_html/admin/plugins/function.tab_start.php';
if (!is_callable('smarty_function_cms_textarea')) require_once '/data/home/iic/public_html/lib/plugins/function.cms_textarea.php';
if (!is_callable('smarty_function_html_options')) require_once '/data/home/iic/public_html/lib/smarty/plugins/function.html_options.php';
if (!is_callable('smarty_cms_function_cms_yesno')) require_once '/data/home/iic/public_html/lib/plugins/function.cms_yesno.php';
if (!is_callable('smarty_function_tab_end')) require_once '/data/home/iic/public_html/admin/plugins/function.tab_end.php';
if (!is_callable('smarty_function_form_end')) require_once '/data/home/iic/public_html/lib/plugins/function.form_end.php';
echo '<script'; ?>
 type="text/javascript">
$(document).ready(function(){
    var do_locking = <?php if (!empty($_smarty_tpl->tpl_vars['tpl_id']->value) && $_smarty_tpl->tpl_vars['tpl_id']->value > 0 && isset($_smarty_tpl->tpl_vars['lock_timeout']->value) && $_smarty_tpl->tpl_vars['lock_timeout']->value > 0) {?>1<?php } else { ?>0<?php }?>;
    $('#form_edittemplate').dirtyForm({
        beforeUnload: function(is_dirty) {
	    if( do_locking ) $('#form_edittemplate').lockManager('unlock');
        },
	unloadCancel: function() {
            if( do_locking ) $('#form_edittemplate').lockManager('relock');
	}
    });

    // initialize lock manager
    if( do_locking ) {
      $('#form_edittemplate').lockManager({
        type: 'template',
        oid: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['tpl_id']->value)===null||$tmp==='' ? 0 : $tmp);?>
,
        uid: <?php echo get_userid(FALSE);?>
,
        lock_timeout: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['lock_timeout']->value)===null||$tmp==='' ? 0 : $tmp);?>
,
        lock_refresh: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['lock_refresh']->value)===null||$tmp==='' ? 0 : $tmp);?>
,
        error_handler: function(err) {
            cms_alert('got error '+err.type+' // '+err.msg);
        },
        lostlock_handler: function(err) {
            // we lost the lock on this content... make sure we can't save anything.
            // and display a nice message.
            $('[name$=cancel]').fadeOut().attr('value','<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('cancel');?>
').fadeIn();
            $('#form_edittemplate').dirtyForm('option','dirty',false);
            $('#submitbtn, #applybtn').attr('disabled','disabled');
            $('#submitbtn, #applybtn').button({ 'disabled' : true });
            $('.lock-warning').removeClass('hidden-item');
            cms_alert('<?php echo strtr($_smarty_tpl->tpl_vars['mod']->value->Lang('msg_lostlock'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
');
        }
      });
    } // do_locking

    $(document).on('cmsms_textchange',function(event){
        // editor textchange, set the form dirty.
        $('#form_edittemplate').dirtyForm('option','dirty',true);
    });

    $('#form_edittemplate').on('click','[name$=apply],[name$=submit]',function(){
        $('#form_edittemplate').dirtyForm('option','dirty',false);
    });

    $(document).on('click', '#submitbtn, #cancelbtn, #importbtn, #exportbtn', function(ev){
       if( ! do_locking ) return;
       // unlock the item, and submit the form
       var self = this;
       ev.preventDefault();
       var form = $(this).closest('form');
       $('#form_edittemplate').lockManager('unlock').done(function(){
           var el = $('<input type="hidden"/>');
           el.attr('name',$(self).attr('name')).val($(self).val()).appendTo(form);
           form.submit();
       });
    });

    $(document).on('click', '#applybtn', function(e){
        e.preventDefault();
        var url = $('#form_edittemplate').attr('action')+'?showtemplate=false&m1_apply=1',
        data = $('#form_edittemplate').serializeArray();

        $.post(url, data, function(data,textStatus,jqXHR) {

            var $response = $('<aside/>').addClass('message');
            if (data.status === 'success') {

                $response.addClass('pagemcontainer')
                    .append($('<span>').text('Close').addClass('close-warning'))
                    .append($('<p/>').text(data.message));
            } else if (data.status === 'error') {

                $response.addClass('pageerrorcontainer')
                    .append($('<span>').text('Close').addClass('close-warning'))
                    .append($('<p/>').text(data.message));
            }

            $('body').append($response.hide());
            $response.slideDown(1000, function() {
                window.setTimeout(function() {
                    $response.slideUp();
                    $response.remove();
                }, 10000);
            });

            $('#cancelbtn').button('option','label','<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('cancel');?>
');
            $('#tpl_modified_cont').hide();
            $('#content').focus();
        });
    });

    $(document).on('click','#a_helptext',function(e){
        e.preventDefault();
	$('#helptext_dlg').dialog({ 'width': 'auto' });
    });
});
<?php echo '</script'; ?>
>

<?php $_smarty_tpl->_assignInScope('helptext', $_smarty_tpl->tpl_vars['type_obj']->value->get_template_helptext($_smarty_tpl->tpl_vars['type_obj']->value->get_name()));
if (!empty($_smarty_tpl->tpl_vars['helptext']->value)) {?>
  <div id="helptext_dlg" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_template_help');?>
" style="display: none;">
  <?php echo $_smarty_tpl->tpl_vars['helptext']->value;?>

  </div>
<?php }
$_smarty_tpl->_assignInScope('get_lock', $_smarty_tpl->tpl_vars['template']->value->get_lock());
?>

<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', 'disable', null);?>
    <?php ob_start();
echo get_userid(false);
$_prefixVariable1=ob_get_clean();
if (isset($_smarty_tpl->tpl_vars['get_lock']->value) && ($_prefixVariable1 != $_smarty_tpl->tpl_vars['get_lock']->value['uid'])) {?>disabled="disabled"<?php }
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>

<?php if (isset($_smarty_tpl->tpl_vars['get_lock']->value)) {?>
	<div class="warning lock-warning">
		<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('lock_warning');?>

	</div>
<?php }?>

<?php echo smarty_function_form_start(array('id'=>"form_edittemplate",'extraparms'=>$_smarty_tpl->tpl_vars['extraparms']->value),$_smarty_tpl);?>

<fieldset class="cf">
    <div class="grid_6">
        <div class="pageoverflow">
            <p class="pageinput">
                <input type="submit" id="submitbtn" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
submit" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('submit');?>
"<?php echo preg_replace('!\s+!u', ' ',$_smarty_tpl->tpl_vars['disable']->value);?>
 />
                <input type="submit" id="cancelbtn" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
cancel" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('cancel');?>
" >
                <?php if ($_smarty_tpl->tpl_vars['template']->value->get_id()) {?>
                <input type="submit" id="applybtn" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
apply" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('apply');?>
"<?php echo preg_replace('!\s+!u', ' ',$_smarty_tpl->tpl_vars['disable']->value);?>
 />
                <?php }?>
            </p>
        </div>

        <div class="pageoverflow">
            <p class="pagetext"><label for="tpl_name">*<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_name');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_template_name','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_name')),$_smarty_tpl);?>
</p>
            <p class="pageinput">
                <input id="tpl_name" type="text" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
name" size="50" maxlength="90" value="<?php echo $_smarty_tpl->tpl_vars['template']->value->get_name();?>
" <?php if (!$_smarty_tpl->tpl_vars['has_manage_right']->value) {?>readonly="readonly"<?php }?> placeholder="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('new_template');?>
"/>
            </p>
        </div>

	<?php $_smarty_tpl->_assignInScope('usage_str', $_smarty_tpl->tpl_vars['template']->value->get_usage_string());
?>
	<?php if (!empty($_smarty_tpl->tpl_vars['usage_str']->value)) {?>
        <div class="pageoverflow">
            <p class="pagetext"><label><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_usage');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_tpl_usage','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_usage')),$_smarty_tpl);?>
</p>
            <p class="pageinput">
                <?php echo $_smarty_tpl->tpl_vars['usage_str']->value;?>

            </p>
        </div>
	<?php }?>

    </div>
    <div class="grid_6">
    <?php if ($_smarty_tpl->tpl_vars['template']->value->get_id()) {?>
        <div class="pageoverflow">
            <p class="pagetext"><label for="tpl_created"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_created');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_tpl_created','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_created')),$_smarty_tpl);?>
</p>
            <p class="pageinput">
                <?php echo smarty_modifier_cms_date_format($_smarty_tpl->tpl_vars['template']->value->get_created());?>

            </p>
        </div>
        <div class="pageoverflow" id="tpl_modified_cont">
            <p class="pagetext"><label for="tpl_modified"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_modified');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_tpl_modified','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_modified')),$_smarty_tpl);?>
</p>
            <p class="pageinput">
                <?php echo smarty_modifier_cms_date_format($_smarty_tpl->tpl_vars['template']->value->get_modified());?>

            </p>
        </div>
    <?php }?>
    </div>
</fieldset>


<?php echo smarty_function_tab_header(array('name'=>'template','label'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_template')),$_smarty_tpl);?>

<?php echo smarty_function_tab_header(array('name'=>'description','label'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_description')),$_smarty_tpl);?>

<?php if ($_smarty_tpl->tpl_vars['has_themes_right']->value) {?>
    <?php echo smarty_function_tab_header(array('name'=>'designs','label'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_designs')),$_smarty_tpl);?>

<?php }
if ($_smarty_tpl->tpl_vars['has_manage_right']->value) {?>
    <?php echo smarty_function_tab_header(array('name'=>'advanced','label'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_advanced')),$_smarty_tpl);?>

<?php }
if ($_smarty_tpl->tpl_vars['template']->value->get_owner_id() == get_userid() || $_smarty_tpl->tpl_vars['has_manage_right']->value) {?>
    <?php echo smarty_function_tab_header(array('name'=>'permissions','label'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_permissions')),$_smarty_tpl);?>

<?php }?>

<?php echo smarty_function_tab_start(array('name'=>'template'),$_smarty_tpl);?>

<div class="pageoverflow">
    <p class="pagetext">
      <label for="contents"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_template_content');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_template_contents','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_template_content')),$_smarty_tpl);?>

      <?php if (!empty($_smarty_tpl->tpl_vars['helptext']->value)) {?>
        <a id="a_helptext" href="#" style="float: right;"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_template_help');?>
</a>
      <?php }?>
    </p>
    <?php if ($_smarty_tpl->tpl_vars['template']->value->has_content_file()) {?>
      <div class="information"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('info_template_content_file',$_smarty_tpl->tpl_vars['template']->value->get_content_filename());?>
</div>
    <?php } else { ?>
    <p class="pageinput">
        <?php echo smarty_function_cms_textarea(array('id'=>'content','prefix'=>$_smarty_tpl->tpl_vars['actionid']->value,'name'=>'contents','value'=>$_smarty_tpl->tpl_vars['template']->value->get_content(),'type'=>'smarty','rows'=>20),$_smarty_tpl);?>

    </p>
    <?php }?>
</div>

<?php echo smarty_function_tab_start(array('name'=>'description'),$_smarty_tpl);?>

<div class="pageoverflow">
    <p class="pagetext"><label for="description"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_description');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_template_description','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_description')),$_smarty_tpl);?>
</p>
    <p class="pageinput">
        <textarea id="description" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
description" <?php if (!$_smarty_tpl->tpl_vars['has_manage_right']->value) {?>readonly="readonly"<?php }?>><?php echo $_smarty_tpl->tpl_vars['template']->value->get_description();?>
</textarea>
    </p>
</div>

<?php if ($_smarty_tpl->tpl_vars['has_themes_right']->value) {?>
    <?php echo smarty_function_tab_start(array('name'=>'designs'),$_smarty_tpl);?>

    <div class="pageoverflow">
        <p class="pagetext"><label for="designlist"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_designs');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_template_designlist','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_designs')),$_smarty_tpl);?>
</p>
        <p class="pageinput">
            <select id="designlist" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
design_list[]" multiple="multiple" size="5">
                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['design_list']->value,'selected'=>$_smarty_tpl->tpl_vars['template']->value->get_designs()),$_smarty_tpl);?>

            </select>
        </p>
    </div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['has_manage_right']->value) {?>
    <?php echo smarty_function_tab_start(array('name'=>'advanced'),$_smarty_tpl);?>

        <div class="pageoverflow">
            <p class="pagetext"><label for="tpl_listable"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_listable');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_template_listable','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_listable')),$_smarty_tpl);?>
</p>
            <p class="pageinput">
                <select id="tpl_listable" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
listable"<?php if ($_smarty_tpl->tpl_vars['type_is_readonly']->value) {?> readonly="readonly"<?php }?>>
		    <?php echo smarty_cms_function_cms_yesno(array('selected'=>$_smarty_tpl->tpl_vars['template']->value->get_listable()),$_smarty_tpl);?>

                </select>
            </p>
        </div>
        <?php if (isset($_smarty_tpl->tpl_vars['type_list']->value)) {?>
            <div class="pageoverflow">
                <p class="pagetext"><label for="tpl_type"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_type');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_template_type','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_type')),$_smarty_tpl);?>
</p>
                <p class="pageinput">
                    <select id="tpl_type" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
type"<?php if ($_smarty_tpl->tpl_vars['type_is_readonly']->value) {?> readonly="readonly"<?php }?>>
                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['type_list']->value,'selected'=>$_smarty_tpl->tpl_vars['template']->value->get_type_id()),$_smarty_tpl);?>

                    </select>
                </p>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['type_obj']->value->get_dflt_flag()) {?>
            <div class="pageoverflow">
                <p class="pagetext"><label for="tpl_dflt"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_default');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_template_dflt','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_default')),$_smarty_tpl);?>
</p>
                <p class="pageinput">
		    <select id="tpl_dflt" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
default" <?php if ($_smarty_tpl->tpl_vars['template']->value->get_type_dflt()) {?>disabled<?php }?>>
		      <?php echo smarty_cms_function_cms_yesno(array('selected'=>$_smarty_tpl->tpl_vars['template']->value->get_type_dflt()),$_smarty_tpl);?>

		    </select>
                </p>
            </div>
            <?php }?>
        <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['category_list']->value)) {?>
        <div class="pageoverflow">
            <p class="pagetext"><label for="tpl_category"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_category');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_template_category','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_category')),$_smarty_tpl);?>
</p>
            <p class="pageinput">
                <select id="tpl_category" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
category_id">
                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['category_list']->value,'selected'=>$_smarty_tpl->tpl_vars['template']->value->get_category_id()),$_smarty_tpl);?>

                </select>
            </p>
        </div>
        <?php }?>
	<?php if ($_smarty_tpl->tpl_vars['template']->value->get_id() > 0) {?>
        <div class="pageoverflow">
			<p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_filetemplate');?>
:</p>
			<p class="pageinput">
			<?php if ($_smarty_tpl->tpl_vars['template']->value->has_content_file()) {?>
				<input type="submit" id="importbtn" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
import" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('import');?>
"/>
			<?php } elseif ($_smarty_tpl->tpl_vars['template']->value->get_id() > 0) {?>
				<input type="submit" id="exportbtn" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
export" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('export');?>
"/>
			<?php }?>
		   </p>
        </div>
	<?php }
}?>

<?php if ($_smarty_tpl->tpl_vars['template']->value->get_owner_id() == get_userid() || $_smarty_tpl->tpl_vars['has_manage_right']->value) {?>
    <?php echo smarty_function_tab_start(array('name'=>'permissions'),$_smarty_tpl);?>

    <?php if (isset($_smarty_tpl->tpl_vars['user_list']->value)) {?>
    <div class="pageoverflow">
        <p class="pagetext"><label for="tpl_owner"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_owner');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_template_owner','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_owner')),$_smarty_tpl);?>
</p>
        <p class="pageinput">
            <select id="tpl_owner" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
owner_id">
                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['user_list']->value,'selected'=>$_smarty_tpl->tpl_vars['template']->value->get_owner_id()),$_smarty_tpl);?>

            </select>
        </p>
    </div>
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['addt_editor_list']->value)) {?>
    <div class="pageoverflow">
        <p class="pagetext"><label for="tpl_addeditor"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('additional_editors');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_template_addteditors','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('additional_editors')),$_smarty_tpl);?>
</p>
        <p class="pageinput">
            <select id="tpl_addeditor" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
addt_editors[]" multiple="multiple" size="5">
                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['addt_editor_list']->value,'selected'=>$_smarty_tpl->tpl_vars['template']->value->get_additional_editors()),$_smarty_tpl);?>

            </select>
        </p>
    </div>
    <?php }
}
echo smarty_function_tab_end(array(),$_smarty_tpl);?>


<?php echo smarty_function_form_end(array(),$_smarty_tpl);
}
}
