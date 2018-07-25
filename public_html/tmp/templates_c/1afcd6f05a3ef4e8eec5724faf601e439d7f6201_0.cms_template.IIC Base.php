<?php
/* Smarty version 3.1.31, created on 2018-07-20 04:32:40
  from "cms_template:IIC Base" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b511890d27bf4_65641934',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1afcd6f05a3ef4e8eec5724faf601e439d7f6201' => 
    array (
      0 => 'cms_template:IIC Base',
      1 => '1524268005',
      2 => 'cms_template',
    ),
  ),
  'includes' => 
  array (
    'cms_template:IIC Footer' => 1,
    'cms_template:IIC JavaScripts' => 1,
  ),
),false)) {
function content_5b511890d27bf4_65641934 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_cms_function_share_data')) require_once '/data/home/iic/public_html/lib/plugins/function.share_data.php';
if (!is_callable('smarty_function_metadata')) require_once '/data/home/iic/public_html/lib/plugins/function.metadata.php';
if (!is_callable('smarty_function_title')) require_once '/data/home/iic/public_html/lib/plugins/function.title.php';
if (!is_callable('smarty_function_sitename')) require_once '/data/home/iic/public_html/lib/plugins/function.sitename.php';
if (!is_callable('smarty_cms_function_cms_stylesheet')) require_once '/data/home/iic/public_html/lib/plugins/function.cms_stylesheet.php';
if (!is_callable('smarty_function_root_url')) require_once '/data/home/iic/public_html/lib/plugins/function.root_url.php';
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>


<?php echo CMS_Content_Block::smarty_fetch_pagedata(array(),$_smarty_tpl);?>
<!-- Main --><?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('assign'=>'capturedcontent'),$_smarty_tpl); ?><!-- Top Navigation Bar --><?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'display_top_navigation','label'=>"Display Black Navbar",'oneline'=>"true",'size'=>"1",'assign'=>'display_top_navigation','tab'=>'0 - Top Navigation - Dark','wysiwyg'=>'false','default'=>'+'),$_smarty_tpl);
CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'link1_head','label'=>'Delhi University Label | <b>Default: University of Delhi Home</b>','default'=>'University of Delhi Home','tab'=>'0 - Top Navigation - Dark','assign'=>'link1_head','oneline'=>"true",'wysiwyg'=>'false'),$_smarty_tpl);
CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'link1','label'=>'Delhi University Link | <b>Default: https://www.du.ac.in</b>','default'=>'https://www.du.ac.in','tab'=>'0 - Top Navigation - Dark','assign'=>'link1','oneline'=>"true",'wysiwyg'=>'false'),$_smarty_tpl);
CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'link2_head','label'=>'Gitlab Label | <b>Default: Open Source</b>','tab'=>'0 - Top Navigation - Dark','assign'=>'link2_head','oneline'=>"true",'wysiwyg'=>'false','default'=>'Open Source'),$_smarty_tpl);
CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'link2','label'=>'Gitlab Link | <b>Default: https://git.iic.ac.in/</b>','tab'=>'0 - Top Navigation - Dark','assign'=>'link2','oneline'=>"true",'wysiwyg'=>'false','default'=>'https://git.iic.ac.in/'),$_smarty_tpl);
CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'link3_head','label'=>'Link to Above Label | <b>Default: Current Students</b>','tab'=>'0 - Top Navigation - Dark','assign'=>'link3_head','oneline'=>"true",'wysiwyg'=>'false','default'=>'Current Students'),$_smarty_tpl);
CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'link3','label'=>'Link to Students page | <b>Default: {root_url}/index.php?page=students</b>','tab'=>'0 - Top Navigation - Dark','assign'=>'link3','oneline'=>"true",'wysiwyg'=>'false','default'=>'{root_url}/index.php?page=students'),$_smarty_tpl);
CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'link4_head','label'=>'Link Heading | <b>Default: Faculty & Staff</b>','tab'=>'0 - Top Navigation - Dark','assign'=>'link4_head','oneline'=>"true",'wysiwyg'=>'false','default'=>'Faculty & Staff'),$_smarty_tpl);
CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'link4','label'=>'Faculty & Staff Link | <b>Default: {root_url}/index.php?page=faculty</b>','tab'=>'0 - Top Navigation - Dark','assign'=>'link4','oneline'=>"true",'wysiwyg'=>'false','default'=>'{root_url}/index.php?page=faculty'),$_smarty_tpl);
CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'link5_head','label'=>'Alumni Link Label | <b>Default: Alumni</b>','tab'=>'0 - Top Navigation - Dark','assign'=>'link5_head','oneline'=>"true",'wysiwyg'=>'false','default'=>'Alumni'),$_smarty_tpl);
CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'link5','label'=>'Alumni Link | <b>Default: {root_url}/index.php?page=alumni</b>','tab'=>'0 - Top Navigation - Dark','assign'=>'link5','oneline'=>"true",'wysiwyg'=>'false','default'=>'{root_url}/index.php?page=alumni'),$_smarty_tpl); ?><!-- Content for Derieved Template --><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11959797435b511890ca3829_29178239', 'user_options');
echo smarty_cms_function_share_data(array('scope'=>'global','vars'=>'capturedcontent,display_top_navigation,link1,link2,link3,link4,link5,link1_head,link2_head,link3_head,link4_head,link5_head'),$_smarty_tpl);?>



<!DOCTYPE html>
<html lang="en">
    <head>

<!-- Global site tag (gtag.js) - Google Analytics -->
<?php echo '<script'; ?>
 async src="https://www.googletagmanager.com/gtag/js?id=UA-107994454-1"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-107994454-1');
<?php echo '</script'; ?>
>

        <?php echo smarty_function_metadata(array(),$_smarty_tpl);?>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />


        <title><?php echo smarty_function_title(array(),$_smarty_tpl);?>
 - <?php echo smarty_function_sitename(array(),$_smarty_tpl);?>
</title>

        <!-- CSS for Derieved Template -->
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5780709215b511890cb7d43_74397723', 'user_css');
?>


        <!-- For owl-carousel -->
        <?php echo '<script'; ?>
 type='text/javascript'>
         $(document).ready(function(){
             $(".owl-carousel").owlCarousel();
         });
        <?php echo '</script'; ?>
>
        <!-- Font -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:500" rel="stylesheet">
    </head>
    <body class="home page page-id-300 page-template page-template-page-templates page-template-template-canvas page-template-page-templatestemplate-canvas-php wpb-js-composer js-comp-ver-4.12.1 vc_responsive">
        <div class="images-preloader" style="display: none;">
            <div class="preloader4"></div>
        </div>
        <div id="wrapper">

            <div class="navigation-wrapper">

                <!-- 0 - Top Navigation - Dark - secondary-navigation -->
                <?php if ($_smarty_tpl->tpl_vars['display_top_navigation']->value == "+") {?>
                    <div class="secondary-navigation-wrapper" >
                        <div class="container" >
                            <ul id="menu-top-menu" class="secondary-navigation list-unstyled pull-left" data-breakpoint="800">
                                <?php if (!empty($_smarty_tpl->tpl_vars['link1']->value) && !empty($_smarty_tpl->tpl_vars['link1_head']->value)) {?>
                                    <li id="menu-item-4" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-4"><a title="<?php echo $_smarty_tpl->tpl_vars['link1_head']->value;?>
" href="<?php echo $_smarty_tpl->tpl_vars['link1']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['link1_head']->value;?>
</a></li>
                                <?php } else { ?>
                                    <li id="menu-item-4" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-4"><a title="DU Main" href="http://www.du.ac.in/">University of Delhi Home</a></li>
                                <?php }?>
                            </ul>

                            <!-- <div class="search"><form class="input-group" action="#"><input class="form-control" name="s" type="text" placeholder="Search"> <button id="search-submit" class="btn" type="submit"></button></form><\!-- /.input-group -\-></div> -->

                            <ul id="menu-top-menu" class="secondary-navigation list-unstyled pull-right" data-breakpoint="800">

                                <?php if (!empty($_smarty_tpl->tpl_vars['link2']->value) && !empty($_smarty_tpl->tpl_vars['link2_head']->value)) {?>
                                    <li id="menu-item-5" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5"><a title="<?php echo $_smarty_tpl->tpl_vars['link2_head']->value;?>
" href="<?php echo $_smarty_tpl->tpl_vars['link2']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['link2_head']->value;?>
</a></li>
                                <?php } else { ?>
                                    <li id="menu-item-4" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-4"><a title="Gitlab" href="https://git.iic.ac.in/">Open Source</a></li>
                                <?php }?>

                                <?php if (!empty($_smarty_tpl->tpl_vars['link3']->value) && !empty($_smarty_tpl->tpl_vars['link3_head']->value)) {?>
                                    <li id="menu-item-4" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-4"><a title="<?php echo $_smarty_tpl->tpl_vars['link3_head']->value;?>
" href="<?php echo $_smarty_tpl->tpl_vars['link3']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['link3_head']->value;?>
</a></li>
                                <?php } else { ?>
                                    <li id="menu-item-4" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-4"><a title="Prospective Students" href="http:<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/index.php?page=students">Students</a></li>
                                <?php }?>

                                <?php if (!empty($_smarty_tpl->tpl_vars['link4']->value) && !empty($_smarty_tpl->tpl_vars['link4_head']->value)) {?>
                                    <li id="menu-item-6" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6"><a title="<?php echo $_smarty_tpl->tpl_vars['link4_head']->value;?>
" href="<?php echo $_smarty_tpl->tpl_vars['link4']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['link4_head']->value;?>
</a></li>
                                <?php } else { ?>
                                    <li id="menu-item-6" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6"><a title="Faculty & Staff" href="http:<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/index.php?page=faculty">Faculty & Staff</a></li>
                                <?php }?>

                                <?php if (!empty($_smarty_tpl->tpl_vars['link5']->value) && !empty($_smarty_tpl->tpl_vars['link5_head']->value)) {?>
                                    <li id="menu-item-7" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-7"><a title="<?php echo $_smarty_tpl->tpl_vars['link5_head']->value;?>
" href="<?php echo $_smarty_tpl->tpl_vars['link5']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['link5_head']->value;?>
</a></li>
                                <?php } else { ?>
                                    <li id="menu-item-7" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-7"><a title="Alumni" href="http:<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/index.php?page=alumni">Alumni</a></li>
                                <?php }?>
                            </ul>
                        </div>
                    </div>
                <?php }?>

                <!-- Primary Navigation Wrapper -->
                <?php echo Navigator::function_plugin(array(),$_smarty_tpl);?>

                <!-- Primary Navigation Ends Here -->
                <!-- Background Image -->
                <div class="background">
                    <!-- <img src="#" alt=""> -->
                </div>
            </div>

            <!-- Content for Derieved Template -->
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6723145205b511890d077b8_32975468', 'user_content');
?>


        </div>

        <!-- #wrapper -->
        <div class="vnbx-mask vnbx vnbx-close-button-enabled vnbx-group" style="display: none; width: 1351px; height: 3050px;"><div class="vnbx-frame" style="left: 683px; top: 323px;"><div class="vnbx-container" style="width: 200px; height: 150px;"><div class="vnbx-content vnbx-empty" style="margin-left: -100px; margin-top: -75px;"></div></div><div class="vnbx-label vnbx-title"></div><div class="vnbx-label vnbx-pager"></div><div class="vnbx-button vnbx-prev" ontouchstart="void(0)"></div><div class="vnbx-button vnbx-next" ontouchstart="void(0)"></div><div class="vnbx-button vnbx-close" ontouchstart="void(0)"></div></div></div>

        <?php $_smarty_tpl->_subTemplateRender('cms_template:IIC Footer', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



        <!-- JavaScripts -->

        <!-- Javascript for Derieved Template -->
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5452407045b511890d12fc4_76988214', 'user_javascript');
?>


    </body>
</html><?php }
/* {block 'user_options'} */
class Block_11959797435b511890ca3829_29178239 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'user_options' => 
  array (
    0 => 'Block_11959797435b511890ca3829_29178239',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'user_options'} */
/* {block 'user_css'} */
class Block_5780709215b511890cb7d43_74397723 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'user_css' => 
  array (
    0 => 'Block_5780709215b511890cb7d43_74397723',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <?php echo smarty_cms_function_cms_stylesheet(array(),$_smarty_tpl);?>


            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,800" rel="stylesheet" type="text/css">

            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
                <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"><?php echo '</script'; ?>
>
                <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
            <![endif]-->

            <!-- Font Awesome -->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css" />

            <!-- For owl-carousel -->
            <link rel='stylesheet' id='owl-car-css'  href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css' type='text/css' media='all' />
            <link rel='stylesheet' id='owl-car-css'  href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.theme.default.min.css' type='text/css' media='all' />
        <?php
}
}
/* {/block 'user_css'} */
/* {block 'user_content'} */
class Block_6723145205b511890d077b8_32975468 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'user_content' => 
  array (
    0 => 'Block_6723145205b511890d077b8_32975468',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array(),$_smarty_tpl); ?>
            <?php
}
}
/* {/block 'user_content'} */
/* {block 'user_javascript'} */
class Block_5452407045b511890d12fc4_76988214 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'user_javascript' => 
  array (
    0 => 'Block_5452407045b511890d12fc4_76988214',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <?php $_smarty_tpl->_subTemplateRender('cms_template:IIC JavaScripts', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        <?php
}
}
/* {/block 'user_javascript'} */
}
