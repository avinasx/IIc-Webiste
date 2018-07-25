<?php
/* Smarty version 3.1.31, created on 2018-07-23 12:00:41
  from "module_file_tpl:DesignManager;admin_edit_category.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b557611c42815_97517455',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9b014378b06af18c79a929a2a955bd157c108c58' => 
    array (
      0 => 'module_file_tpl:DesignManager;admin_edit_category.tpl',
      1 => 1517033802,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b557611c42815_97517455 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_form_start')) require_once '/data/home/iic/public_html/lib/plugins/function.form_start.php';
if (!is_callable('smarty_function_cms_help')) require_once '/data/home/iic/public_html/admin/plugins/function.cms_help.php';
if (!is_callable('smarty_function_form_end')) require_once '/data/home/iic/public_html/lib/plugins/function.form_end.php';
if ($_smarty_tpl->tpl_vars['category']->value->get_id() == '') {?>
<h3><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('create_category');?>
</h3>
<?php } else { ?>
<h3><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('edit_category');?>
: <?php echo $_smarty_tpl->tpl_vars['category']->value->get_name();?>
 (<?php echo $_smarty_tpl->tpl_vars['category']->value->get_id();?>
)</h3>
<?php }?>

<?php echo smarty_function_form_start(array(),$_smarty_tpl);?>

<?php if ($_smarty_tpl->tpl_vars['category']->value->get_id() != '') {?>
  <input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
cat" value="<?php echo $_smarty_tpl->tpl_vars['category']->value->get_id();?>
"/>
<?php }?>
<div class="pageoverflow">
  <p class="pagetext"></p>
  <p class="pageinput">
    <input type="submit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
submit" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('submit');?>
"/>
    <input type="submit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
cancel" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('cancel');?>
"/>
  </p>
</div>
<div class="pageoverflow">
  <p class="pagetext"><label for="cat_name">*<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_name');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key'=>'help_category_name','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_name')),$_smarty_tpl);?>
</p>
  <p class="pageinput">
    <input type="text" id="cat_name" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
name" value="<?php echo $_smarty_tpl->tpl_vars['category']->value->get_name();?>
" size="50" maxlength="50" placeholder="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('create_category');?>
"/>
  </p>
</div>
<div class="pageoverflow">
  <p class="pagetext"><label for="cat_description"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_description');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key'=>'help_category_desc','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_description')),$_smarty_tpl);?>
</p>
  <p class="pageinput">
    <textarea id="cat_description" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
description" rows="5" cols="80"><?php echo $_smarty_tpl->tpl_vars['category']->value->get_description();?>
</textarea>
  </p>
</div>
<?php echo smarty_function_form_end(array(),$_smarty_tpl);?>

</div><?php }
}
