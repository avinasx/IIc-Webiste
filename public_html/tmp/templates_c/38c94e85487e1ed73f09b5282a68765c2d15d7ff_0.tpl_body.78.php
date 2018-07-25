<?php
/* Smarty version 3.1.31, created on 2018-07-20 04:42:21
  from "tpl_body:78" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b511ad5019e99_43465576',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '38c94e85487e1ed73f09b5282a68765c2d15d7ff' => 
    array (
      0 => 'tpl_body:78',
      1 => '1510997683',
      2 => 'tpl_body',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b511ad5019e99_43465576 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_cms_function_share_data')) require_once '/data/home/iic/public_html/lib/plugins/function.share_data.php';
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18410995465b511ad4ef1fb1_17642797', 'user_options');
?>


<section class="vc_rows wpb_rows vc_rows-fluid">
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5267514045b511ad4f3d9b5_56820797', 'user_content');
?>

</section><?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'cms_template:IIC Generic One Column');
}
/* {block 'user_options'} */
class Block_18410995465b511ad4ef1fb1_17642797 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'user_options' => 
  array (
    0 => 'Block_18410995465b511ad4ef1fb1_17642797',
  ),
);
public $append = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <!-- Google Map -->
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'display_gmap','label'=>'Display Google Map','tab'=>'Google Map','assign'=>'display_gmap','oneline'=>"true",'size'=>"1",'wysiwyg'=>'false'),$_smarty_tpl); ?>
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'gmap','label'=>'Google Map code ex.<!-- <iframe></iframe> -->','tab'=>'Google Map','assign'=>'gmap','oneline'=>"true",'wysiwyg'=>'false'),$_smarty_tpl); ?>
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'address','label'=>'address','tab'=>'Google Map','assign'=>'address','oneline'=>"false",'wysiwyg'=>'true'),$_smarty_tpl); ?>
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'link_to_contact_form','label'=>'Link to the contact us google form','tab'=>'Google Map','assign'=>'link_to_contact_form','oneline'=>"false",'wysiwyg'=>'true'),$_smarty_tpl); ?>
    <?php echo smarty_cms_function_share_data(array('scope'=>'global','vars'=>'display_gmap,gmap,link_to_contact_form,address'),$_smarty_tpl);?>

<?php
}
}
/* {/block 'user_options'} */
/* {block 'user_content'} */
class Block_5267514045b511ad4f3d9b5_56820797 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'user_content' => 
  array (
    0 => 'Block_5267514045b511ad4f3d9b5_56820797',
  ),
);
public $append = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <!-- Map --> 
    <?php if ($_smarty_tpl->tpl_vars['display_gmap']->value == "+") {?>
        <section class="vc_rows wpb_rows vc_rows-fluid">
            <div class="container">
                <div class="row">
                    <div class="wpb_column col-md-6">
                        <div class="wpb_wrapper">
                            <h1 style="margin-bottom: 30px;">Contact Us</h1>
                            <div class="wpb_text_column wpb_content_element  vc_custom_1438857268023">
                                <div class="wpb_wrapper">
                                    <?php echo $_smarty_tpl->tpl_vars['address']->value;?>

                                    <hr />
                                </div>
                            </div>
                            <h3 class="after" style="margin-bottom: 40px;">Send Us a Message</h3>
                            <?php if (!empty($_smarty_tpl->tpl_vars['link_to_contact_form']->value)) {?>
                                <?php echo $_smarty_tpl->tpl_vars['link_to_contact_form']->value;?>

                            <?php }?>
                        </div>
                    </div>
                    <div class="wpb_column col-md-6">
                        <div class="wpb_wrapper">
                            <div id="map-canvas" class="contacts-map" style="height: 820px; position: relative; overflow: hidden;">
                                <?php if (!empty($_smarty_tpl->tpl_vars['gmap']->value)) {?>
                                    <?php echo $_smarty_tpl->tpl_vars['gmap']->value;?>

                                <?php } else { ?>
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3503.523547938584!2d77.16115651454031!3d28.58406659302477!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d1d11d46ccc85%3A0x2e94d9687f938329!2sInstitute+of+Informatics+and+Communication%2C+UDSC!5e0!3m2!1sen!2s!4v1504337003833" width="555" height="820" frameborder="0" style="border:0" allowfullscreen></iframe>
                                <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php }
}
}
/* {/block 'user_content'} */
}
