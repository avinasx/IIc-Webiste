<?php
/* Smarty version 3.1.31, created on 2018-07-20 07:04:40
  from "module_file_tpl:FileManager;fmpath.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b513c303d94c6_80712280',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '552eca87397d80bc81e64fe5bb3e3d314ec99acf' => 
    array (
      0 => 'module_file_tpl:FileManager;fmpath.tpl',
      1 => 1517033802,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b513c303d94c6_80712280 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h3><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('currentpath');?>

   <span class="pathselector">
   <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['path_parts']->value, 'part', true);
$_smarty_tpl->tpl_vars['part']->iteration = 0;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['part']->value) {
$_smarty_tpl->tpl_vars['part']->iteration++;
$_smarty_tpl->tpl_vars['part']->last = $_smarty_tpl->tpl_vars['part']->iteration == $_smarty_tpl->tpl_vars['part']->total;
$__foreach_part_0_saved = $_smarty_tpl->tpl_vars['part'];
?>
     <?php if (!empty($_smarty_tpl->tpl_vars['part']->value->url)) {?>
       <a href="<?php echo $_smarty_tpl->tpl_vars['part']->value->url;?>
"><?php echo $_smarty_tpl->tpl_vars['part']->value->name;?>
</a>
     <?php } else { ?>
       <?php echo $_smarty_tpl->tpl_vars['part']->value->name;?>

     <?php }?>
     <?php if (!$_smarty_tpl->tpl_vars['part']->last) {?><span class="ds">/</span><?php }?>
   <?php
$_smarty_tpl->tpl_vars['part'] = $__foreach_part_0_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

   </span>
</h3><?php }
}
