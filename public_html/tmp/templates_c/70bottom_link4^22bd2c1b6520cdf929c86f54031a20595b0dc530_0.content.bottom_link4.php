<?php
/* Smarty version 3.1.31, created on 2018-07-20 04:52:47
  from "content:bottom_link4" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b511d478c22a9_60266993',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '22bd2c1b6520cdf929c86f54031a20595b0dc530' => 
    array (
      0 => 'content:bottom_link4',
      1 => 1531089445,
      2 => 'content',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b511d478c22a9_60266993 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_cms_selflink')) require_once '/data/home/iic/public_html/lib/plugins/function.cms_selflink.php';
echo smarty_function_cms_selflink(array('href'=>"contact"),$_smarty_tpl);
}
}
