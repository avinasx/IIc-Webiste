<?php
/* Smarty version 3.1.31, created on 2018-07-20 04:52:47
  from "tpl_body:73" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b511d4726bee5_34111049',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ee3a7a6363293c3af9d2889019620b1833a03da3' => 
    array (
      0 => 'tpl_body:73',
      1 => '1510997345',
      2 => 'tpl_body',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b511d4726bee5_34111049 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_cms_function_share_data')) require_once '/data/home/iic/public_html/lib/plugins/function.share_data.php';
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1348648245b511d4714c7b8_85431876', 'user_options');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10443592925b511d471c9fd0_15661158', 'user_content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'cms_template:IIC Base');
}
/* {block 'user_options'} */
class Block_1348648245b511d4714c7b8_85431876 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'user_options' => 
  array (
    0 => 'Block_1348648245b511d4714c7b8_85431876',
  ),
);
public $append = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <!--  Dark Blue Section -->
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'display_dark_section','label'=>"Display Dark Blue Header Section",'oneline'=>"true",'size'=>"1",'assign'=>'display_dark_section','tab'=>'Dark Blue Section','wysiwyg'=>'false'),$_smarty_tpl); ?>
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'dark_blue_section_header','label'=>'Section Head','tab'=>'Dark Blue Section','assign'=>'dark_blue_section_header','oneline'=>"true",'wysiwyg'=>'false'),$_smarty_tpl); ?>
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'dark_blue_section_details','label'=>'Section Details','tab'=>'Dark Blue Section','assign'=>'dark_blue_section_details','oneline'=>"false",'wysiwyg'=>'true'),$_smarty_tpl); ?>
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'dark_blue_section_link','label'=>'Section Read More Link','tab'=>'Dark Blue Section','assign'=>'dark_blue_section_link','oneline'=>"true",'wysiwyg'=>'false'),$_smarty_tpl); ?>
    
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'display_alumni_thumbnail_section','label'=>"Display Thumbnail Alumni Section",'oneline'=>"true",'size'=>"1",'assign'=>'display_alumni_thumbnail_section','tab'=>'Alumni Section','wysiwyg'=>'false'),$_smarty_tpl); ?>
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'display_alumni_thumbnail_header','label'=>'Thumbnail Section Head','tab'=>'Alumni Section','assign'=>'display_alumni_thumbnail_header','oneline'=>"true",'wysiwyg'=>'false'),$_smarty_tpl); ?>
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'display_alumni_thumbnail_category','label'=>'Thumbnail Widget Category<br><b>Leaving Blank would give an error page</b>','tab'=>'Alumni Section','assign'=>'display_alumni_thumbnail_category','oneline'=>"true",'wysiwyg'=>'false'),$_smarty_tpl); ?>
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'display_alumni_thumbnail_template','label'=>'Thumbnail Widget Template<br><b>Default: IIC Thumbnail Widget</b><br />','tab'=>'Alumni Section','assign'=>'display_alumni_thumbnail_template','oneline'=>"true",'wysiwyg'=>'false'),$_smarty_tpl); ?>

    
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'display_alumni_accordion_section','label'=>"Display Accordion Alumni Section",'oneline'=>"true",'size'=>"1",'assign'=>'display_alumni_accordion_section','tab'=>'Alumni Section','wysiwyg'=>'false'),$_smarty_tpl); ?>
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'display_alumni_accordion_header','label'=>'Accordion Section Head','tab'=>'Alumni Section','assign'=>'display_alumni_accordion_header','oneline'=>"true",'wysiwyg'=>'false'),$_smarty_tpl); ?>
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'display_alumni_accordion_category','label'=>'Accordion Widget Category<br><b>Leaving Blank would give an error page</b>','tab'=>'Alumni Section','assign'=>'display_alumni_accordion_category','oneline'=>"true",'wysiwyg'=>'false'),$_smarty_tpl); ?>
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'display_alumni_accordion_template','label'=>'Accordion Widget Template<br><b>Default: IIC Accordion Widget</b><br />','tab'=>'Alumni Section','assign'=>'display_alumni_accordion_template','oneline'=>"true",'wysiwyg'=>'false'),$_smarty_tpl); ?>

    <?php echo smarty_cms_function_share_data(array('scope'=>'global','vars'=>'display_dark_section,dark_blue_section_header,dark_blue_section_details,dark_blue_section_link,display_alumni_thumbnail_section,display_alumni_thumbnail_header,display_alumni_accordion_section,display_alumni_accordion_header,display_alumni_accordion_template,display_alumni_accordion_category,display_alumni_thumbnail_template,display_alumni_thumbnail_category'),$_smarty_tpl);?>

<?php
}
}
/* {/block 'user_options'} */
/* {block 'user_content'} */
class Block_10443592925b511d471c9fd0_15661158 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'user_content' => 
  array (
    0 => 'Block_10443592925b511d471c9fd0_15661158',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php if ($_smarty_tpl->tpl_vars['display_dark_section']->value == "+") {?>
        <section class="vc_rows wpb_rows vc_rows-fluid vc_custom_1439533085489">
            <div class="container">
                <div class="row">
                    <div class="join-form wpb_column col-md-12">
                        <div class="wpb_wrapper">
                            <div class="vc_empty_space" style="height: 30px;">&nbsp;</div>
                            <div id="wpcf7-f325-p300-o1" class="wpcf7" dir="ltr" lang="en-US" role="form">
                                <form class="wpcf7-form">
                                    <div style="display: none;"><input name="_wpcf7" type="hidden" value="325"> <input name="_wpcf7_version" type="hidden" value="4.5"> <input name="_wpcf7_locale" type="hidden" value="en_US"> <input name="_wpcf7_unit_tag" type="hidden" value="wpcf7-f325-p300-o1"> <input name="_wpnonce" type="hidden" value="59a23a2adc"></div>
                                    <div id="slider-form" class="white">
                                        <?php if (!empty($_smarty_tpl->tpl_vars['dark_blue_section_header']->value)) {?>
                                            <h1><?php echo $_smarty_tpl->tpl_vars['dark_blue_section_header']->value;?>
</h1>
                                        <?php }?>
                                        <?php if (!empty($_smarty_tpl->tpl_vars['dark_blue_section_details']->value)) {?>
                                            <p class="white"><?php echo $_smarty_tpl->tpl_vars['dark_blue_section_details']->value;?>
</p>
                                        <?php }?>
                                        <?php if (!empty($_smarty_tpl->tpl_vars['dark_blue_section_link']->value)) {?>
                                            <a class="btn-link-form btn-link-submit pull-right" href="<?php echo $_smarty_tpl->tpl_vars['dark_blue_section_link']->value;?>
">Learn More</a>
                                        <?php } else { ?>
                                            <a class="pull-right" href="#" style="padding-bottom: 30px;"></a>
                                        <?php }?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php }?>
    <section>
        <div class="container">
            <br /><br />
            <?php if ($_smarty_tpl->tpl_vars['display_alumni_thumbnail_section']->value == "+") {?>
                <div class="container-fluid">
                    <div class="row">
                        <?php if (!empty($_smarty_tpl->tpl_vars['display_alumni_thumbnail_header']->value)) {?>
                            <h3 id="contacts" class="section-heading text-left"><?php echo $_smarty_tpl->tpl_vars['display_alumni_thumbnail_header']->value;?>
</h3>
                            <hr align="left" width="31%" />
                    <?php }?>
                    <?php if (!empty($_smarty_tpl->tpl_vars['display_alumni_thumbnail_template']->value) && !empty($_smarty_tpl->tpl_vars['display_alumni_thumbnail_category']->value)) {?>
                            <?php echo Widgets::function_plugin(array('category'=>((string)$_smarty_tpl->tpl_vars['display_alumni_thumbnail_category']->value),'template'=>((string)$_smarty_tpl->tpl_vars['display_alumni_thumbnail_template']->value)),$_smarty_tpl);?>

                    <?php } elseif (empty($_smarty_tpl->tpl_vars['display_alumni_thumbnail_template']->value) && !empty($_smarty_tpl->tpl_vars['display_alumni_thumbnail_category']->value)) {?>
                            <?php echo Widgets::function_plugin(array('category'=>((string)$_smarty_tpl->tpl_vars['display_alumni_thumbnail_category']->value),'template'=>"IIC Thumbnail Widget"),$_smarty_tpl);?>

                    <?php } else { ?>
                            <?php echo Widgets::function_plugin(array('category'=>"thumbnail",'template'=>"IIC Thumbnail Widget"),$_smarty_tpl);?>

                    <?php }?>
                    </div>
<br /><br />
                </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['display_alumni_accordion_section']->value == "+") {?>
                <div class="container-fluid">
                    <div class="row"><!-- End of overall placement coordinators --> <!-- <div class="col-md-12 col-sm-12"> -->
                        <?php if (!empty($_smarty_tpl->tpl_vars['display_alumni_accordion_header']->value)) {?>
                            <h3 class="section-heading text-left"><?php echo $_smarty_tpl->tpl_vars['display_alumni_accordion_header']->value;?>
</h3>
                            <hr align="left" width="28%" />
                        <?php }?>
                        <?php if (!empty($_smarty_tpl->tpl_vars['display_alumni_accordion_template']->value) && !empty($_smarty_tpl->tpl_vars['display_alumni_accordion_category']->value)) {?>
                            <?php echo Widgets::function_plugin(array('category'=>((string)$_smarty_tpl->tpl_vars['display_alumni_accordion_category']->value),'template'=>((string)$_smarty_tpl->tpl_vars['display_alumni_accordion_template']->value)),$_smarty_tpl);?>

                        <?php } elseif (empty($_smarty_tpl->tpl_vars['display_alumni_accordion_template']->value) && !empty($_smarty_tpl->tpl_vars['display_alumni_accordion_category']->value)) {?>
                            <?php echo Widgets::function_plugin(array('category'=>((string)$_smarty_tpl->tpl_vars['display_alumni_accordion_category']->value),'template'=>"IIC Accordion Widget"),$_smarty_tpl);?>

                        <?php } else { ?>
                            <?php echo Widgets::function_plugin(array('category'=>"accordion",'template'=>"IIC Accordion Widget"),$_smarty_tpl);?>

                        <?php }?>
                    </div>
                </div>
            <?php }?>
        </div>
    </section>
<?php
}
}
/* {/block 'user_content'} */
}
