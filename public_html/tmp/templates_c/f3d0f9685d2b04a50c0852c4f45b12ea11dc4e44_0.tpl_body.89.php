<?php
/* Smarty version 3.1.31, created on 2018-07-20 04:48:59
  from "tpl_body:89" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b511c638645a0_97450717',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f3d0f9685d2b04a50c0852c4f45b12ea11dc4e44' => 
    array (
      0 => 'tpl_body:89',
      1 => '1524303510',
      2 => 'tpl_body',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b511c638645a0_97450717 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_cms_function_share_data')) require_once '/data/home/iic/public_html/lib/plugins/function.share_data.php';
if (!is_callable('smarty_function_root_url')) require_once '/data/home/iic/public_html/lib/plugins/function.root_url.php';
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8080992205b511c637ce4d9_95026129', 'user_options');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1990392065b511c637ec9d4_70731254', 'user_content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'cms_template:IIC Base');
}
/* {block 'user_options'} */
class Block_8080992205b511c637ce4d9_95026129 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'user_options' => 
  array (
    0 => 'Block_8080992205b511c637ce4d9_95026129',
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
class Block_1990392065b511c637ec9d4_70731254 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'user_content' => 
  array (
    0 => 'Block_1990392065b511c637ec9d4_70731254',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php if ($_smarty_tpl->tpl_vars['display_breadcrumbs']->value == "+") {?>
        <!-- Breadcrumbs -->
        <section class="breadcrumbs" style = "background-color: #011c38 ">
            <?php if (!empty($_smarty_tpl->tpl_vars['entry']->value->title)) {?>
                <?php echo Navigator::function_plugin(array('action'=>'breadcrumbs','start_page'=>'home','template'=>'IIC Breadcrumbs'),$_smarty_tpl);?>

            <?php } else { ?>
                <?php echo Navigator::function_plugin(array('action'=>'breadcrumbs','start_page'=>'home','template'=>'IIC Breadcrumbs'),$_smarty_tpl);?>

            <?php }?>
        </section>
    <?php }?>
    <style>
     .flexslider {
         padding-top: 20px !important;
         height: 350px;
     }
    </style>
    <div class="flexslider event-slider">
        <ul class="slides">
            <li class="slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0.956773; display: block; color : red; z-index: 1;">
                <img src="http:<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/uploads/images/Defaults/IIC.jpg" draggable="false" style="width: 100%;">
            </li>
        </ul>
    </div>
    <div class="container"  >
        <?php if (!empty($_smarty_tpl->tpl_vars['page_head']->value)) {?>
            <div class="page-header text-center">
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
