<?php
/* Smarty version 3.1.31, created on 2018-07-20 05:02:43
  from "tpl_body:85" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b511f9bd5e640_83662226',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '69907f16cc24ac417bf46f6cbc95167dc6ace65b' => 
    array (
      0 => 'tpl_body:85',
      1 => '1502375075',
      2 => 'tpl_body',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b511f9bd5e640_83662226 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_cms_function_share_data')) require_once '/data/home/iic/public_html/lib/plugins/function.share_data.php';
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19412321205b511f9bcdfbd0_01276608', 'user_options');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_145047645b511f9bd10919_99280239', 'user_content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'cms_template:IIC Base');
}
/* {block 'user_options'} */
class Block_19412321205b511f9bcdfbd0_01276608 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'user_options' => 
  array (
    0 => 'Block_19412321205b511f9bcdfbd0_01276608',
  ),
);
public $append = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'content_1_head','label'=>"Column 1 Heading",'oneline'=>"true",'assign'=>'content_1_head','tab'=>'1 - Template Data','wysiwyg'=>'false'),$_smarty_tpl); ?>
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'content_1','label'=>'Coloumn 1 Details','tab'=>'1 - Template Data','assign'=>'content_1','oneline'=>"false",'wysiwyg'=>'true'),$_smarty_tpl); ?>

    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'content_2_head','label'=>"Column 2 Heading",'oneline'=>"true",'assign'=>'content_2_head','tab'=>'1 - Template Data','wysiwyg'=>'false'),$_smarty_tpl); ?>
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'content_2','label'=>'Coloumn 2 Details','tab'=>'1 - Template Data','assign'=>'content_2','oneline'=>"false",'wysiwyg'=>'true'),$_smarty_tpl); ?>

    <?php echo smarty_cms_function_share_data(array('scope'=>'global','vars'=>'content_1,content_2,content_1_head,content_2_head'),$_smarty_tpl);?>


    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'display_breadcrumbs','label'=>"Display Breadcrumbs",'oneline'=>"true",'size'=>"1",'assign'=>"display_breadcrumbs",'wysiwyg'=>'false'),$_smarty_tpl); ?>

    <?php echo smarty_cms_function_share_data(array('scope'=>'global','vars'=>'display_breadcrumbs'),$_smarty_tpl);?>


<?php
}
}
/* {/block 'user_options'} */
/* {block 'user_content'} */
class Block_145047645b511f9bd10919_99280239 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'user_content' => 
  array (
    0 => 'Block_145047645b511f9bd10919_99280239',
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
        <section class="vc_rows wpb_rows vc_rows-fluid vc_custom_1439374049302">
            <div class="container">
                <div class="row">

                    <div class="wpb_column col-md-8">
                        <?php if (!empty($_smarty_tpl->tpl_vars['content_1']->value) || !empty($_smarty_tpl->tpl_vars['content_1_head']->value)) {?>
                            <div class="wpb_wrapper">
                                <h2 class="after"><?php echo $_smarty_tpl->tpl_vars['content_1_head']->value;?>
</h2>
                                <div class="wpb_text_column wpb_content_element ">
                                    <div class="wpb_wrapper">
                                        <?php echo $_smarty_tpl->tpl_vars['content_1']->value;?>

                                    </div>
                                </div>
                            </div>
                        <?php }?>
                    </div>


                    <div class="wpb_column col-md-4">
                        <?php if (!empty($_smarty_tpl->tpl_vars['content_2']->value) || !empty($_smarty_tpl->tpl_vars['content_2_head']->value)) {?>
                            <div class="wpb_wrapper">
                                <h2 class="after"><?php echo $_smarty_tpl->tpl_vars['content_2_head']->value;?>
</h2>
                                <div class="wpb_text_column wpb_content_element ">
                                    <div class="wpb_wrapper">
                                        <?php echo $_smarty_tpl->tpl_vars['content_2']->value;?>

                                    </div>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php
}
}
/* {/block 'user_content'} */
}
