<?php
/* Smarty version 3.1.31, created on 2018-07-20 04:33:42
  from "cms_template:IIC Breadcrumbs" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b5118ceb918e2_06060114',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '29a1680eb54faa8678b477993fb4ac041183fc48' => 
    array (
      0 => 'cms_template:IIC Breadcrumbs',
      1 => '1524303380',
      2 => 'cms_template',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b5118ceb918e2_06060114 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="container" style = "background-color: #011c38"><div class="breadcrumbs" ><ol class="breadcrumb"><?php if (isset($_smarty_tpl->tpl_vars['starttext']->value)) {
}
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['nodelist']->value, 'node', true);
$_smarty_tpl->tpl_vars['node']->iteration = 0;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['node']->value) {
$_smarty_tpl->tpl_vars['node']->iteration++;
$_smarty_tpl->tpl_vars['node']->last = $_smarty_tpl->tpl_vars['node']->iteration == $_smarty_tpl->tpl_vars['node']->total;
$__foreach_node_6_saved = $_smarty_tpl->tpl_vars['node'];
$_smarty_tpl->_assignInScope('liclass', '');
if ($_smarty_tpl->tpl_vars['node']->value->current) {
$_smarty_tpl->_assignInScope('liclass', ($_smarty_tpl->tpl_vars['liclass']->value).(' active'));
}?><li class="<?php echo $_smarty_tpl->tpl_vars['liclass']->value;?>
"><?php if ($_smarty_tpl->tpl_vars['node']->last) {
if ($_smarty_tpl->tpl_vars['node']->value->alias == 'news') {
if (!empty($_smarty_tpl->tpl_vars['entry']->value->title)) {?><a href="<?php echo $_smarty_tpl->tpl_vars['node']->value->url;?>
" title="<?php echo $_smarty_tpl->tpl_vars['node']->value->menutext;?>
"><?php echo $_smarty_tpl->tpl_vars['node']->value->menutext;?>
</a></li><li class="active"><?php echo $_smarty_tpl->tpl_vars['entry']->value->title;?>
</li><?php } else {
echo $_smarty_tpl->tpl_vars['node']->value->menutext;
}
} else {
echo $_smarty_tpl->tpl_vars['node']->value->menutext;
}
} elseif ($_smarty_tpl->tpl_vars['node']->value->type == 'sectionheader') {?><a href="<?php echo $_smarty_tpl->tpl_vars['node']->value->url;?>
" title="<?php echo $_smarty_tpl->tpl_vars['node']->value->menutext;?>
"><?php echo $_smarty_tpl->tpl_vars['node']->value->menutext;?>
</a><?php } else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['node']->value->url;?>
" title="<?php echo $_smarty_tpl->tpl_vars['node']->value->menutext;?>
"><?php echo $_smarty_tpl->tpl_vars['node']->value->menutext;?>
</a><?php }
if (!$_smarty_tpl->tpl_vars['node']->last) {
}
$_smarty_tpl->tpl_vars['node'] = $__foreach_node_6_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
</ol></div></div><?php }
}
