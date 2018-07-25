<?php
/* Smarty version 3.1.31, created on 2018-07-20 04:50:02
  from "tpl_body:83" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b511ca28c4645_01112005',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '531e1c8de413e1986c36c89a13d965154d43bac8' => 
    array (
      0 => 'tpl_body:83',
      1 => '1524287059',
      2 => 'tpl_body',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b511ca28c4645_01112005 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_cms_function_share_data')) require_once '/data/home/iic/public_html/lib/plugins/function.share_data.php';
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15973237825b511ca2826a28_08174967', 'user_options');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4882995475b511ca286b638_98184422', 'user_content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'cms_template:IIC Base');
}
/* {block 'user_options'} */
class Block_15973237825b511ca2826a28_08174967 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'user_options' => 
  array (
    0 => 'Block_15973237825b511ca2826a28_08174967',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'page_head','label'=>"Page Heading",'oneline'=>"true",'assign'=>'content_1_head','wysiwyg'=>'false'),$_smarty_tpl); ?>
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'display_breadcrumbs','label'=>"Display Breadcrumbs",'oneline'=>"true",'size'=>"1",'assign'=>"display_breadcrumbs",'wysiwyg'=>'false'),$_smarty_tpl); ?>
    <?php echo smarty_cms_function_share_data(array('scope'=>'global','vars'=>'page_head,display_breadcrumbs'),$_smarty_tpl);?>

<?php
}
}
/* {/block 'user_options'} */
/* {block 'user_content'} */
class Block_4882995475b511ca286b638_98184422 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'user_content' => 
  array (
    0 => 'Block_4882995475b511ca286b638_98184422',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php if ($_smarty_tpl->tpl_vars['display_breadcrumbs']->value == "+") {?>
        <!-- Breadcrumbs -->
        <section class="breadcrumbs">
            <?php if (!empty($_smarty_tpl->tpl_vars['entry']->value->title)) {?>
                <?php echo Navigator::function_plugin(array('action'=>'breadcrumbs','start_page'=>'home','template'=>'IIC Breadcrumbs'),$_smarty_tpl);?>

            <?php } else { ?>
                <?php echo Navigator::function_plugin(array('action'=>'breadcrumbs','start_page'=>'home','template'=>'IIC Breadcrumbs'),$_smarty_tpl);?>

            <?php }?>
        </section>
    <?php }?>
    <div class="container">
        <?php if (!empty($_smarty_tpl->tpl_vars['page_head']->value)) {?>
            <div class="page-header text-center" >
                <h2 id="timeline" class="section-heading"><?php echo $_smarty_tpl->tpl_vars['page_head']->value;?>
</h2>
            </div>
        <?php }?>
        <section class="vc_rows wpb_rows vc_rows-fluid vc_custom_1439374049302">
            <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array(),$_smarty_tpl); ?>
        </section>
    </div>
<?php
}
}
/* {/block 'user_content'} */
}
