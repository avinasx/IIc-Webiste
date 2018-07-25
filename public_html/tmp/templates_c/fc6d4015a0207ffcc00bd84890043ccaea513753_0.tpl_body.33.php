<?php
/* Smarty version 3.1.31, created on 2018-07-20 04:32:40
  from "tpl_body:33" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b511890c5d5b5_27692375',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fc6d4015a0207ffcc00bd84890043ccaea513753' => 
    array (
      0 => 'tpl_body:33',
      1 => '1521584577',
      2 => 'tpl_body',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b511890c5d5b5_27692375 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_cms_function_share_data')) require_once '/data/home/iic/public_html/lib/plugins/function.share_data.php';
if (!is_callable('smarty_function_cms_module')) require_once '/data/home/iic/public_html/lib/plugins/function.cms_module.php';
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3421127095b511890af68f1_86144958', 'user_options');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14941778685b511890ba38a8_04021931', 'user_content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'cms_template:IIC Base');
}
/* {block 'user_options'} */
class Block_3421127095b511890af68f1_86144958 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'user_options' => 
  array (
    0 => 'Block_3421127095b511890af68f1_86144958',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <!-- Index Dark Blue Section -->
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'display_dark_section','label'=>"Display Index Dark Blue Header Section",'oneline'=>"true",'size'=>"1",'assign'=>'display_dark_section','tab'=>'Dark Blue Section','wysiwyg'=>'false'),$_smarty_tpl); ?>

    <!-- Slider -->
    <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', "galleryfolder", null);
CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>"galleryfolder",'oneline'=>"true",'label'=>"Gallery Module foldername for Index Slideshow",'tab'=>'Dark Blue Section','wysiwyg'=>'false'),$_smarty_tpl);
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'dark_blue_section_header','label'=>'Section Head','tab'=>'Dark Blue Section','assign'=>'dark_blue_section_header','oneline'=>"true",'wysiwyg'=>'false'),$_smarty_tpl); ?>
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'dark_blue_section_details','label'=>'Section Details','tab'=>'Dark Blue Section','assign'=>'dark_blue_section_details','oneline'=>"false",'wysiwyg'=>'true'),$_smarty_tpl); ?>
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'dark_blue_section_link','label'=>'Section Read More Link','tab'=>'Dark Blue Section','assign'=>'dark_blue_section_link','oneline'=>"true",'wysiwyg'=>'false'),$_smarty_tpl); ?>

    <!-- Index Three Coloumn Overview -->
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'display_three_col_section','label'=>"Three Coloumn Index Overview",'oneline'=>"true",'size'=>"1",'assign'=>'display_three_col_section','tab'=>'Three Coloumn Index Overview','wysiwyg'=>'false'),$_smarty_tpl); ?>

    <!-- News Widget -->
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'display_news_widget','label'=>"Display News Widget",'oneline'=>"true",'size'=>"1",'assign'=>'display_news_widget','tab'=>'Three Coloumn Index Overview','wysiwyg'=>'false'),$_smarty_tpl); ?>
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'news_read_more_link','label'=>'News Widget Read More Link','tab'=>'Three Coloumn Index Overview','assign'=>'news_read_more_link','oneline'=>"true",'wysiwyg'=>'false'),$_smarty_tpl); ?>


    <!-- Events Widget -->
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'display_events_widget','label'=>"Display Events Widget",'oneline'=>"true",'size'=>"1",'assign'=>'display_events_widget','tab'=>'Three Coloumn Index Overview','wysiwyg'=>'false'),$_smarty_tpl); ?>

    <!-- About IIC Widget -->
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'display_iic_widget','label'=>"Display IIC Widget",'oneline'=>"true",'size'=>"1",'assign'=>'display_iic_widget','tab'=>'Three Coloumn Index Overview','wysiwyg'=>'false'),$_smarty_tpl); ?>
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'iic_widget_header','label'=>'IIC Widget Section Head','tab'=>'Three Coloumn Index Overview','assign'=>'iic_widget_header','oneline'=>"true",'wysiwyg'=>'false'),$_smarty_tpl); ?>
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'iic_widget_details','label'=>'IIC Widget Section Details','tab'=>'Three Coloumn Index Overview','assign'=>'iic_widget_details','oneline'=>"false",'wysiwyg'=>'true'),$_smarty_tpl); ?>

    <?php echo smarty_cms_function_share_data(array('scope'=>'global','vars'=>'display_dark_section,galleryfolder,dark_blue_section_header,dark_blue_section_details,dark_blue_section_link,display_three_col_section,display_news_widget,display_events_widget,news_read_more_link,display_iic_widget,iic_widget_header,iic_widget_details'),$_smarty_tpl);?>

<?php
}
}
/* {/block 'user_options'} */
/* {block 'user_content'} */
class Block_14941778685b511890ba38a8_04021931 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'user_content' => 
  array (
    0 => 'Block_14941778685b511890ba38a8_04021931',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php if ($_smarty_tpl->tpl_vars['display_dark_section']->value == "+") {?>
        <section class="vc_rows wpb_rows vc_rows-fluid vc_custom_1439533085489">
            <div class="container">
                <div class="row">
                    <div class="wpb_column col-md-6">
                        <div class="wpb_wrapper">
                            <!-- Slider -->
                            <?php if (!empty($_smarty_tpl->tpl_vars['galleryfolder']->value)) {?>
                                <div class="image-carousel owl-carousel owl-theme" style="opacity: 1; display: block;">
                                        <?php echo Gallery::function_plugin(array('template'=>"IIC-Index",'dir'=>$_smarty_tpl->tpl_vars['galleryfolder']->value),$_smarty_tpl);?>

                                </div>
                            <?php } else { ?>
                                <h4 class="error_message">Please enter Gallery folder name or hide Header Slider!</h4>
                            <?php }?>
                            <div class="owl-controls clickable"><div class="owl-pagination"><div class="owl-page active"><span class=""></span></div><div class="owl-page"><span class=""></span></div><div class="owl-page"><span class=""></span></div></div><div class="owl-buttons"><div class="owl-prev"></div><div class="owl-next"></div></div></div>
                        </div>
                    </div>

                    <div class="join-form wpb_column col-md-6">
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
                                            <a class="btn-link-form btn-link-submit pull-right" href="#">Learn More</a>
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


    <?php if ($_smarty_tpl->tpl_vars['display_three_col_section']->value == "+") {?>
        <section class="vc_rows wpb_rows vc_rows-fluid vc_custom_1439374049302">
            <div class="container">
                <div class="row">
                    <?php if ($_smarty_tpl->tpl_vars['display_news_widget']->value == "+") {?>
                        <div class="wpb_column col-md-4">
                            <div class="wpb_wrapper">
                                <h2 class="after">News</h2>
                                <div class="section-content news-small"><?php echo News::function_plugin(array('summarytemplate'=>"Blog Index - News Widget - Home Page",'number'=>"3",'detailpage'=>"news-detail",'sortby'=>"news_date",'pagelimit'=>"4"),$_smarty_tpl);?>
</div>
                                <div class="wpb_text_column wpb_content_element ">
                                    <div class="wpb_wrapper">

                                        <?php if (!empty($_smarty_tpl->tpl_vars['news_read_more_link']->value)) {?>
                                            <p>
                                                <a class="read-more" href="<?php echo $_smarty_tpl->tpl_vars['news_read_more_link']->value;?>
">All News</a>
                                            </p>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['display_events_widget']->value == "+") {?>
                        <div class="wpb_column col-md-4">
                            <div class="wpb_wrapper">
                                <h2 class="after">Events</h2>
                                <div class="events small">
                                    <div class="events small"><?php echo smarty_function_cms_module(array('module'=>"EventsListing",'template'=>"home_widget",'sortdesc'=>true,'eventslimit'=>3),$_smarty_tpl);?>
</div>
                                </div>
                            </div>
                        </div>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['display_iic_widget']->value == "+") {?>
                        <div class="wpb_column col-md-4">
                            <div class="wpb_wrapper">
                                <?php if (!empty($_smarty_tpl->tpl_vars['iic_widget_header']->value)) {?>
                                    <h2 class="after"><?php echo $_smarty_tpl->tpl_vars['iic_widget_header']->value;?>
</h2>
                                <?php }?>
                                <div class="wpb_text_column wpb_content_element ">
                                    <?php if (!empty($_smarty_tpl->tpl_vars['iic_widget_details']->value)) {?>
                                        <div class="wpb_wrapper">
<!--<?php echo $_smarty_tpl->tpl_vars['iic_widget_details']->value;?>
-->
 <a class="twitter-timeline"  href="https://twitter.com/iicudscofficial" data-widget-id="283120255675535360" data-chrome="noheader nofooter">Tweets by @iicudscofficial</a>
            <?php echo '<script'; ?>
>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");<?php echo '</script'; ?>
>
                                        </div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                </div>
            </div>
        </section>
    <?php }
}
}
/* {/block 'user_content'} */
}
