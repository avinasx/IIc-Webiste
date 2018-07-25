<?php
/* Smarty version 3.1.31, created on 2018-07-23 11:55:36
  from "module_file_tpl:DesignManager;admin_defaultadmin_types.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b5574e0b13116_78048480',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '072b736c56d84a33fe7dd9ba074dfb380407b78e' => 
    array (
      0 => 'module_file_tpl:DesignManager;admin_defaultadmin_types.tpl',
      1 => 1517033802,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b5574e0b13116_78048480 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_cycle')) require_once '/data/home/iic/public_html/lib/smarty/plugins/function.cycle.php';
if (!is_callable('smarty_cms_function_cms_action_url')) require_once '/data/home/iic/public_html/lib/plugins/function.cms_action_url.php';
if (!is_callable('smarty_function_admin_icon')) require_once '/data/home/iic/public_html/admin/plugins/function.admin_icon.php';
if (isset($_smarty_tpl->tpl_vars['list_all_types']->value)) {?>
<table class="pagetable">
  <thead>
    <tr>
      <th width="5%"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_id');?>
</th>
      <th><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_name');?>
</th>
      <?php if ($_smarty_tpl->tpl_vars['has_add_right']->value) {?>
      <th class="pageicon"></th>
      <?php }?>
      <th class="pageicon"></th>
    </tr>
  </thead>
  <tbody>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_all_types']->value, 'type');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['type']->value) {
?>
   <?php echo smarty_function_cycle(array('values'=>"row1,row2",'assign'=>'rowclass'),$_smarty_tpl);?>

   <?php $_smarty_tpl->_assignInScope('reset_url', '');
?>
   <?php if ($_smarty_tpl->tpl_vars['type']->value->get_dflt_flag()) {?>
     <?php echo smarty_cms_function_cms_action_url(array('action'=>'admin_reset_type','type'=>$_smarty_tpl->tpl_vars['type']->value->get_id(),'assign'=>'reset_url'),$_smarty_tpl);?>

   <?php }?>
   <?php echo smarty_cms_function_cms_action_url(array('action'=>'admin_edit_type','type'=>$_smarty_tpl->tpl_vars['type']->value->get_id(),'assign'=>'edit_url'),$_smarty_tpl);?>

   <tr class="<?php echo $_smarty_tpl->tpl_vars['rowclass']->value;?>
" onmouseover="this.className='<?php echo $_smarty_tpl->tpl_vars['rowclass']->value;?>
hover';" onmouseout="this.className='<?php echo $_smarty_tpl->tpl_vars['rowclass']->value;?>
';">
      <td><?php echo $_smarty_tpl->tpl_vars['type']->value->get_id();?>
</td>
      <td>
        <a href="<?php echo $_smarty_tpl->tpl_vars['edit_url']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_edit');?>
"><?php echo $_smarty_tpl->tpl_vars['type']->value->get_langified_display_value();?>
</a>
      </td>
      <?php if ($_smarty_tpl->tpl_vars['has_add_right']->value) {?>
      <td><?php echo smarty_cms_function_cms_action_url(array('action'=>'admin_edit_template','import_type'=>$_smarty_tpl->tpl_vars['type']->value->get_id(),'assign'=>'create_url'),$_smarty_tpl);?>

        <a href="<?php echo $_smarty_tpl->tpl_vars['create_url']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_import');?>
"><?php echo smarty_function_admin_icon(array('icon'=>'import.gif'),$_smarty_tpl);?>
</a>
      </td>
      <?php }?>
      <td><a href="<?php echo $_smarty_tpl->tpl_vars['edit_url']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_edit');?>
"><?php echo smarty_function_admin_icon(array('icon'=>'edit.gif'),$_smarty_tpl);?>
</a></td>
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
}
