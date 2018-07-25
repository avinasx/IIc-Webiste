<?php
/* Smarty version 3.1.31, created on 2018-07-23 12:01:06
  from "module_file_tpl:DesignManager;admin_edit_design.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b55762a6373c4_67496858',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd209ce292e2613346b40af4078ea5ac961cfea09' => 
    array (
      0 => 'module_file_tpl:DesignManager;admin_edit_design.tpl',
      1 => 1517033802,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
    'module_file_tpl:DesignManager;admin_edit_design_templates.tpl' => 1,
    'module_file_tpl:DesignManager;admin_edit_design_stylesheets.tpl' => 1,
  ),
),false)) {
function content_5b55762a6373c4_67496858 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_form_start')) require_once '/data/home/iic/public_html/lib/plugins/function.form_start.php';
if (!is_callable('smarty_function_cms_help')) require_once '/data/home/iic/public_html/admin/plugins/function.cms_help.php';
if (!is_callable('smarty_modifier_date_format')) require_once '/data/home/iic/public_html/lib/smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_tab_header')) require_once '/data/home/iic/public_html/admin/plugins/function.tab_header.php';
if (!is_callable('smarty_function_tab_start')) require_once '/data/home/iic/public_html/admin/plugins/function.tab_start.php';
if (!is_callable('smarty_function_tab_end')) require_once '/data/home/iic/public_html/admin/plugins/function.tab_end.php';
if (!is_callable('smarty_function_form_end')) require_once '/data/home/iic/public_html/lib/plugins/function.form_end.php';
echo smarty_function_form_start(array('id'=>"admin_edit_design"),$_smarty_tpl);?>
<input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
design" value="<?php echo $_smarty_tpl->tpl_vars['design']->value->get_id();?>
"/>
<input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
ajax" id="ajax"/>

<fieldset>
  <div style="width: 49%; float: left;">
    <div class="pageoverflow">
      <p class="pagetext"></p>
      <p class="pageinput">
        <input id="submitme" type="submit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
submit" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('submit');?>
"/>
        <input type="submit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
cancel" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('cancel');?>
"/>
        <input id="applyme" type="submit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
apply" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('apply');?>
"/>
      </p>
    </div>

    <div class="pageoverflow">
      <p class="pagetext"><label for="design_name"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_name');?>
</label>:&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_design_name','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_name')),$_smarty_tpl);?>
</p>
      <p class="pageinput">
        <input type="text" id="design_name" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
name" value="<?php echo $_smarty_tpl->tpl_vars['design']->value->get_name();?>
" size="50" maxlength="90"/>
      </p>
    </div>
  </div>
  <div style="width: 49%; float: right;">
    <div class="pageoverflow">
      <p class="pagetext"><label for="created"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_created');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_design_created','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_created')),$_smarty_tpl);?>
</p>
      <p class="pageinput">
      <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['design']->value->get_created(),'%x %X');?>

      </p>
    </div>

    <div class="pageoverflow">
      <p class="pagetext"><label for="modified"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_modified');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_design_modified','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_modified')),$_smarty_tpl);?>
</p>
      <p class="pageinput">
      <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['design']->value->get_modified(),'%x %X');?>

      </p>
    </div>
  </div>
</fieldset>

<?php echo smarty_function_tab_header(array('name'=>'templates','label'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_templates')),$_smarty_tpl);?>

<?php echo smarty_function_tab_header(array('name'=>'stylesheets','label'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_stylesheets')),$_smarty_tpl);?>

<?php echo smarty_function_tab_header(array('name'=>'tab_description','label'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_description')),$_smarty_tpl);?>

<?php echo smarty_function_tab_start(array('name'=>'templates'),$_smarty_tpl);?>

  <?php $_smarty_tpl->_subTemplateRender('module_file_tpl:DesignManager;admin_edit_design_templates.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 8, false);
?>

<?php echo smarty_function_tab_start(array('name'=>'stylesheets'),$_smarty_tpl);?>

  <?php $_smarty_tpl->_subTemplateRender('module_file_tpl:DesignManager;admin_edit_design_stylesheets.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 8, false);
?>

<?php echo smarty_function_tab_start(array('name'=>'tab_description'),$_smarty_tpl);?>

  <div class="pageoverflow">
    <p class="pagetext"><label for="description"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_description');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_design_description','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_description')),$_smarty_tpl);?>
</p>
    <p class="pageinput">
      <textarea id="description" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
description" rows="5"><?php echo $_smarty_tpl->tpl_vars['design']->value->get_description();?>
</textarea>
    </p>
  </div>
<?php echo smarty_function_tab_end(array(),$_smarty_tpl);?>

<?php echo smarty_function_form_end(array(),$_smarty_tpl);?>

<div style="display: none;"><div id="help_design_name" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('help_design_name');?>
"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('help_design_name');?>
</div></div>

<?php echo '<script'; ?>
 type="text/javascript">
var __changed=0;
function set_changed() {
   __changed=1;
   console.debug('design is changed');
}
function save_design() {
   var form = $('#admin_edit_design');
   var action = form.attr('action');

   $('#ajax').val(1);
   return $.ajax({
      url: action,
      data: form.serialize()
   })
}
$(document).on('change',':input',function(){
   set_changed();
});
$(document).ready(function(){
    $('.sortable-list input[type="checkbox"]').hide();
    $('ul.available-items').on('click', 'li', function () {
        $(this).toggleClass('selected ui-state-hover');
    });
    $(document).on('click', '#submitme,#applyme', function(){
        $('select.selall').attr('multiple','multiple');
        $('select.selall option').attr('selected','selected');
    });
});

<?php echo '</script'; ?>
><?php }
}
