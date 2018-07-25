<?php
/* Smarty version 3.1.31, created on 2018-07-20 04:52:47
  from "content:bottom_link3" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b511d478bb5d8_39555687',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '76be8505ab71f6b3c163db9c0e17e04ffe1c0ae0' => 
    array (
      0 => 'content:bottom_link3',
      1 => 1531089445,
      2 => 'content',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b511d478bb5d8_39555687 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_cms_selflink')) require_once '/data/home/iic/public_html/lib/plugins/function.cms_selflink.php';
echo smarty_function_cms_selflink(array('href'=>"news"),$_smarty_tpl);
}
}
