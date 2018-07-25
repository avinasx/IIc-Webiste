<?php
/* Smarty version 3.1.31, created on 2018-07-20 04:33:42
  from "tpl_body:67" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b5118ce740392_30009680',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '03a1f6bf2f1b55ff35d0d4213c6daf480fa3a602' => 
    array (
      0 => 'tpl_body:67',
      1 => '1524263234',
      2 => 'tpl_body',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b5118ce740392_30009680 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1970283285b5118ce738da3_18067375', 'user_options');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2789897645b5118ce73c594_19505973', 'user_content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'cms_template:IIC Base');
}
/* {block 'user_options'} */
class Block_1970283285b5118ce738da3_18067375 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'user_options' => 
  array (
    0 => 'Block_1970283285b5118ce738da3_18067375',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'user_options'} */
/* {block 'user_content'} */
class Block_2789897645b5118ce73c594_19505973 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'user_content' => 
  array (
    0 => 'Block_2789897645b5118ce73c594_19505973',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
   
<?php CMS_Content_Block::smarty_internal_fetch_contentblock(array(),$_smarty_tpl);
}
}
/* {/block 'user_content'} */
}
