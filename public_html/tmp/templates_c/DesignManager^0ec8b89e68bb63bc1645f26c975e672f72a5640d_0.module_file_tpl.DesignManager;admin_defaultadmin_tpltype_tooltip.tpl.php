<?php
/* Smarty version 3.1.31, created on 2018-07-23 11:55:38
  from "module_file_tpl:DesignManager;admin_defaultadmin_tpltype_tooltip.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b5574e2489ed9_71625005',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0ec8b89e68bb63bc1645f26c975e672f72a5640d' => 
    array (
      0 => 'module_file_tpl:DesignManager;admin_defaultadmin_tpltype_tooltip.tpl',
      1 => 1517033802,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b5574e2489ed9_71625005 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_summarize')) require_once '/data/home/iic/public_html/lib/plugins/modifier.summarize.php';
$_smarty_tpl->_assignInScope('tpltype', $_smarty_tpl->tpl_vars['list_all_types']->value[$_smarty_tpl->tpl_vars['type_id']->value]);
?><strong><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_id');?>
:</strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['type_id']->value;?>
<br/><strong><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_name');?>
:</strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['tpltype']->value->get_name();?>
<br/><?php $_smarty_tpl->_assignInScope('org', $_smarty_tpl->tpl_vars['tpltype']->value->get_originator());
if ($_smarty_tpl->tpl_vars['org']->value == $_smarty_tpl->tpl_vars['coretypename']->value) {
$_smarty_tpl->_assignInScope('org', 'Core');
}?><strong><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_originator');?>
:</strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['org']->value;?>
<br/><?php $_smarty_tpl->_assignInScope('tmp', $_smarty_tpl->tpl_vars['tpltype']->value->get_description());
if ($_smarty_tpl->tpl_vars['tmp']->value != '') {?><strong><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_description');?>
:</strong>&nbsp;<?php echo smarty_modifier_summarize($_smarty_tpl->tpl_vars['tpltype']->value->get_description());
}
}
}
