<?php
/* Smarty version 3.1.31, created on 2018-07-20 04:32:42
  from "module_db_tpl:Gallery;IIC-Index" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b51189247f478_01692055',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2d341511e1d617f9231334b0040fd7484d5cebba' => 
    array (
      0 => 'module_db_tpl:Gallery;IIC-Index',
      1 => 1504358460,
      2 => 'module_db_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b51189247f478_01692055 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_root_url')) require_once '/data/home/iic/public_html/lib/plugins/function.root_url.php';
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['images']->value, 'image');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
?>
    <img src="<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/<?php echo $_smarty_tpl->tpl_vars['image']->value->file;?>
" alt="" class="img-responsive">
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
