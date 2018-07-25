<?php
/* Smarty version 3.1.31, created on 2018-07-23 11:34:35
  from "module_file_tpl:ModuleManager;local_missingdeps.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b556ff3100143_95809220',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3c8e84e7a530b3435b775014c355fd74a59bcc61' => 
    array (
      0 => 'module_file_tpl:ModuleManager;local_missingdeps.tpl',
      1 => 1517033802,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b556ff3100143_95809220 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_admin_icon')) require_once '/data/home/iic/public_html/admin/plugins/function.admin_icon.php';
?>
<div class="pageoptions" style="text-align: right; float: right; margin-right: 3%;">
  <a href="<?php echo $_smarty_tpl->tpl_vars['back_url']->value;?>
"><?php echo smarty_function_admin_icon(array('icon'=>'back.gif'),$_smarty_tpl);?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('back');?>
</a>
</div>

<p class="pageheader"><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('title_missingdeps2');?>
:</p>
<table class="pagetable">
  <tr>
    <td><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('nametext');?>
:</td>
    <td><?php echo $_smarty_tpl->tpl_vars['info']->value['name'];?>
</td>
  </tr>
  <tr>
    <td><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('vertext');?>
:</td>
    <td><?php echo $_smarty_tpl->tpl_vars['info']->value['version'];?>
</td>
  </tr>
</table>

<table class="pagetable">
  <thead>
    <tr>
      <th><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('nametext');?>
</th>
      <th><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('minversion');?>
</th>
    </tr>
  </thead>
  <tbody>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['info']->value['missing_deps'], 'version', false, 'name');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['name']->value => $_smarty_tpl->tpl_vars['version']->value) {
?>
    <tr>
      <td><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['version']->value;?>
</td>
    </tr>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

  </tbody>
</table>
<?php }
}
