<?php
/* Smarty version 3.1.31, created on 2018-07-20 04:32:42
  from "cms_template:IIC Footer" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b511892978208_84214891',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8b6e1639b5bd81b5125dd84aad61d5a66ab21bb7' => 
    array (
      0 => 'cms_template:IIC Footer',
      1 => '1510997804',
      2 => 'cms_template',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b511892978208_84214891 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_cms_function_share_data')) require_once '/data/home/iic/public_html/lib/plugins/function.share_data.php';
if (!is_callable('smarty_function_root_url')) require_once '/data/home/iic/public_html/lib/plugins/function.root_url.php';
if (!is_callable('smarty_function_cms_selflink')) require_once '/data/home/iic/public_html/lib/plugins/function.cms_selflink.php';
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7785604455b51189271ff16_03530097', 'user_options');
?>


<footer id="page-footer">
    <section id="footer-top">
        <div class="container">
        <div class="footer-inner">
        <div class="footer-social">
        <figure>Follow us:</figure>
        <div class="icons">
        <?php if ($_smarty_tpl->tpl_vars['twitter']->value) {?><a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['twitter']->value;?>
" class="social-icon sb-icon-twitter"><i class="fa fa-twitter fa-lg"></i></a><?php } else { ?><a target="_blank" href="https://twitter.com/iicudscofficial" class="social-icon sb-icon-twitter"><i class="fa fa-twitter fa-lg"></i></a><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['facebook']->value) {?><a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['facebook']->value;?>
" class="social-icon sb-icon-dribbble"><i class="fa fa-facebook fa-lg"></i></a><?php } else { ?><a target="_blank" href="https://www.facebook.com/iicudscofficial/" class="social-icon sb-icon-dribbble"><i class="fa fa-facebook fa-lg"></i></a><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['linkedin']->value) {?><a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['linkedin']->value;?>
" class="social-icon sb-icon-linkedin"><i class="fa fa-linkedin fa-lg"></i></a><?php } else { ?><a target="_blank" href="https://in.linkedin.com/in/placement-cell-iic-udsc-845538125" class="social-icon sb-icon-linkedin"><i class="fa fa-linkedin fa-lg"></i></a><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['youtube']->value) {?><a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['youtube']->value;?>
" class="social-icon sb-icon-youtube"><i class="fa fa-youtube-play fa-lg"></i></a><?php } else { ?><a target="_blank" href="https://www.youtube.com/user/IICUDSCOFFICIAL" class="social-icon sb-icon-youtube"><i class="fa fa-youtube-play fa-lg"></i></a><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['google']->value) {?><a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['google']->value;?>
" class="social-icon sb-icon-google"><i class="fa fa-google-plus fa-lg"></i></a><?php } else { ?><a target="_blank" href="https://plus.google.com/u/0/110911557571570998437" class="social-icon sb-icon-google"><i class="fa fa-google-plus fa-lg"></i></a><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['feed']->value) {?><a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['feed']->value;?>
" class="social-icon sb-icon-rss"><i class="fa fa-rss fa-lg"></i></a><?php } else { ?><a target="_blank" href="<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/index.php?page=#" class="social-icon sb-icon-rss"><i class="fa fa-rss fa-lg"></i></a><?php }?>
                    </div><!-- /.icons -->
        </div><!-- /.social -->
            </div><!-- /.footer-inner -->
        </div><!-- /.container -->
    </section><!-- /#footer-top -->

<section id="footer-content">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">

                <div id="text-4" class="widget widget_text">
                <?php if (!empty($_smarty_tpl->tpl_vars['footer1_section_header']->value)) {?>
    <h4><?php echo $_smarty_tpl->tpl_vars['footer1_section_header']->value;?>
</h4>
                    <?php } else { ?>
    <h4>About IIC</h4>
                    <?php }?>
                    <div class="textwidget"><aside>
    <?php if ($_smarty_tpl->tpl_vars['footer1_section_details']->value) {?>
    <?php echo $_smarty_tpl->tpl_vars['footer1_section_details']->value;?>

                        <?php } else { ?>
    <p>Establsihed in 1997, Institute of Informatics & Communication (IIC) at University of Delhi serves as a center for inter-disciplinary studies for humanities, social sciences, pure and applied sciences. IIC offers degrees in Masters of Science (Informatics) and PhD (Research).
                            </p>
                        <?php }?>
                        <div>
    <!-- <a href="#" class="read-more">All News</a> -->
                        </div>
                    </aside></div>
                </div>

            </div><!-- end col-lg-3 -->
<div class="col-md-3 col-sm-6">
    <div id="text-2" class="widget widget_text"><h4>Contact Us</h4>
    <div class="textwidget"><aside>
    <address>
    <?php if ($_smarty_tpl->tpl_vars['footer2_address1']->value) {?>
    <strong><?php echo $_smarty_tpl->tpl_vars['footer2_address1']->value;?>
</strong>
                            <?php } else { ?>
    <strong>IIC, University of Delhi</strong>
                            <?php }?>
                            <br>
                            <?php if ($_smarty_tpl->tpl_vars['footer2_address2']->value) {?>
    <span><?php echo $_smarty_tpl->tpl_vars['footer2_address2']->value;?>
</span><?php } else { ?><span>South Campus, Benito Juarez Road</span>
    <br><br>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['footer2_address3']->value) {?>
    <span><?php echo $_smarty_tpl->tpl_vars['footer2_address3']->value;?>
</span><?php } else { ?><span>New Delhi-110021</span>
    <br>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['footer2_tel']->value) {?>
    <abbr title="Telephone">Telephone:</abbr> <?php echo $_smarty_tpl->tpl_vars['footer2_tel']->value;
} else { ?><abbr title="Telephone">Telephone:</abbr> +91 (011)-2411 0237
    <br>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['footer2_mail']->value) {?>
    <abbr title="Email">Email:</abbr> <a href="mailto:<?php echo $_smarty_tpl->tpl_vars['footer2_mail']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['footer2_mail']->value;?>
</a><?php } else { ?><abbr title="Email">Email:</abbr> <a href="mailto:iicoffice@iic.ac.in">iicoffice@iic.ac.in</a>
                            <?php }?>
                        </address>
                    </aside>
                    </div>
                </div>
            </div><!-- end col-lg-3 -->
<div class="col-md-3 col-sm-6">

    <div id="text-3" class="widget widget_text"><h4>Important Links</h4>
    <div class="textwidget">
    <aside>
    <ul class="list-links">
    <?php if ($_smarty_tpl->tpl_vars['imp_link1']->value) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['imp_link1']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['imp_link1']->value;?>
</a></li><?php }?>
    <li><?php if ($_smarty_tpl->tpl_vars['imp_link2']->value) {?><a href="<?php echo $_smarty_tpl->tpl_vars['imp_link2']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['imp_link2']->value;?>
</a><?php } else { ?><a href="<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/index.php?page=alumni">Alumni</a><?php }?></li>
    <?php if ($_smarty_tpl->tpl_vars['imp_link3']->value) {?><a href="<?php echo $_smarty_tpl->tpl_vars['imp_link3']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['imp_link3']->value;?>
</a><?php } else {
}?>
    <li><?php if ($_smarty_tpl->tpl_vars['imp_link4']->value) {?><a href="<?php echo $_smarty_tpl->tpl_vars['imp_link4']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['imp_link4']->value;?>
</a><?php } else { ?><a href="<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/index.php?page=faculty">Professors</a><?php }?></li>
    <li><?php if ($_smarty_tpl->tpl_vars['imp_link5']->value) {?><a href="<?php echo $_smarty_tpl->tpl_vars['imp_link5']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['imp_link5']->value;?>
</a><?php } else { ?><a href="https://library.iic.ac.in">Library</a><?php }?></li>
                            </ul>
                        </aside>
                    </div>
                </div>
            </div><!-- end col-lg-3 -->
<div class="col-md-3 col-sm-6">
    <div id="text-5" class="widget widget_text">
    <h4>University of Delhi</h4>
    <div class="textwidget pull-right">
    <aside><div class="row">
    <div class="col-xs-6">
    <?php if ($_smarty_tpl->tpl_vars['footer4_section_details']->value) {?>
    <?php echo $_smarty_tpl->tpl_vars['footer4_section_details']->value;?>
<br>
                                <?php } else { ?>
    IIC is a constituent institute of the University of Delhi (established 1922) and is among its 28 centres for postgraduate studies.<br>
                                <?php }?>
                            </div>
                            <div class="col-xs-6">
    <img src="./uploads/DUlogo_3.png" class="footer-logo" style="
                                          width: 130px !important;
                                          margin: 0 auto;
                                          ">
                            </div>
                        </div>
                        </aside>
                    </div>
                </div>
            </div>
<!-- end col-lg-3 -->

        </div><!-- /.row -->
    </div><!-- /.container -->
    <div class="background">
        <!-- <img src="#" alt=""> -->
    </div>
</section><!-- /#footer-content -->

<section id="footer-bottom">
    <div class="container">
    <div class="footer-inner">
    <div class="copyright">© Copyright 2017 - IIC, UDSC | Created & Maintained by <b>IIC WebTeam</b></div><!-- /.copyright -->
    <ul data-breakpoint="800" id="menu-footer-menu" class="secondary-navigation list-unstyled pull-right">

    <?php if ($_smarty_tpl->tpl_vars['bottom_link1']->value) {?>
    <li id="menu-item-12" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-12"><a title="Home" href="<?php echo $_smarty_tpl->tpl_vars['bottom_link1']->value;?>
">Home</a></li>
                <?php } else { ?>
    <li id="menu-item-12" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-12"><a title="Home" href="<?php echo smarty_function_cms_selflink(array('href'=>"home"),$_smarty_tpl);?>
">Home</a></li>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['bottom_link2']->value) {?>
    <li id="menu-item-14" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-14"><a title="About" href="<?php echo $_smarty_tpl->tpl_vars['bottom_link2']->value;?>
">About</a></li>
                <?php } else { ?>
    <li id="menu-item-14" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-14"><a title="About" href="<?php echo smarty_function_cms_selflink(array('href'=>"about"),$_smarty_tpl);?>
">About</a></li>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['bottom_link3']->value) {?>
    <li id="menu-item-15" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-15"><a title="Blog" href="<?php echo $_smarty_tpl->tpl_vars['bottom_link3']->value;?>
">News</a></li>
                <?php } else { ?>
    <li id="menu-item-15" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-15"><a title="Blog" href="<?php echo smarty_function_cms_selflink(array('href'=>"news"),$_smarty_tpl);?>
">News</a></li>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['bottom_link4']->value) {?>
    <li id="menu-item-13" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-13"><a title="Contact" href="<?php echo $_smarty_tpl->tpl_vars['bottom_link4']->value;?>
">Contact</a></li>
                <?php } else { ?>
    <li id="menu-item-13" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-13"><a title="Contact" href="<?php echo smarty_function_cms_selflink(array('href'=>"contact"),$_smarty_tpl);?>
">Contact</a></li>
                <?php }?>
            </ul>                    </div><!-- /.footer-inner -->
    </div><!-- /.container -->
</section><!-- #footer-bottom -->
</footer><?php }
/* {block 'user_options'} */
class Block_7785604455b51189271ff16_03530097 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'user_options' => 
  array (
    0 => 'Block_7785604455b51189271ff16_03530097',
  ),
);
public $append = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <!-- Social network -->

    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'twitter','label'=>'Twitter link here','tab'=>'98 - Footer-Social Network','assign'=>'twitter','oneline'=>"true",'wysiwyg'=>'false','default'=>'https://twitter.com/iicudscofficial'),$_smarty_tpl); ?>
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'facebook','label'=>'Facebook link here','tab'=>'98 - Footer-Social Network','assign'=>'facebook','oneline'=>"true",'wysiwyg'=>'false','default'=>''),$_smarty_tpl); ?>
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'linkedin','label'=>'Linkedin link here','tab'=>'98 - Footer-Social Network','assign'=>'linkedin','oneline'=>"true",'wysiwyg'=>'false'),$_smarty_tpl); ?>
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'youtube','label'=>'Youtube link here','tab'=>'98 - Footer-Social Network','assign'=>'youtube','oneline'=>"true",'wysiwyg'=>'false'),$_smarty_tpl); ?>
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'google','label'=>'Google+ link here','tab'=>'98 - Footer-Social Network','assign'=>'google','oneline'=>"true",'wysiwyg'=>'false'),$_smarty_tpl); ?>
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'feed','label'=>'Live RSS feed link here','tab'=>'98 - Footer-Social Network','assign'=>'feed','oneline'=>"true",'wysiwyg'=>'false'),$_smarty_tpl); ?>

    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'footer1_section_header','label'=>'Part A - Mid Footer Section Head','tab'=>'99 - Footer Mid','assign'=>'footer1_section_header','oneline'=>"true",'wysiwyg'=>'false'),$_smarty_tpl); ?>
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'footer1_section_details','label'=>'Part A - Mid Footer Section Details','tab'=>'99 - Footer Mid','assign'=>'footer1_section_details','oneline'=>"false",'wysiwyg'=>'true'),$_smarty_tpl); ?>

    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'footer2_address1','label'=>'Part B - Address Line 1','tab'=>'99 - Footer Mid','assign'=>'footer2_address1','oneline'=>"true",'wysiwyg'=>'false'),$_smarty_tpl); ?>
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'footer2_address2','label'=>'Part B - Address Line 2','tab'=>'99 - Footer Mid','assign'=>'footer2_address2','oneline'=>"true",'wysiwyg'=>'false'),$_smarty_tpl); ?>
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'footer2_address3','label'=>'Part B - Address Line 3','tab'=>'99 - Footer Mid','assign'=>'footer2_address3','oneline'=>"true",'wysiwyg'=>'false'),$_smarty_tpl); ?>
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'footer2_tel','label'=>'Part B - Please Enter Telephone Number','tab'=>'99 - Footer Mid','assign'=>'footer2_tel','oneline'=>"true",'wysiwyg'=>'false'),$_smarty_tpl); ?>
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'footer2_mail','label'=>'Part B - Enter Mail ID (iicoffice@iic.ac.in)','tab'=>'99 - Footer Mid','assign'=>'footer2_mail','oneline'=>"true",'wysiwyg'=>'false'),$_smarty_tpl); ?>


    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'imp_link1','Label'=>'Part C - Imp link 1 here','tab'=>'99 - Footer Mid','assign'=>'imp_link1','oneline'=>"true",'wysiwyg'=>'false'),$_smarty_tpl); ?>
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'imp_link2','Label'=>'Part C - Imp link 2 here','tab'=>'99 - Footer Mid','assign'=>'imp_link2','oneline'=>"true",'wysiwyg'=>'false'),$_smarty_tpl); ?>
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'imp_link3','Label'=>'Part C - Imp link 3 here','tab'=>'99 - Footer Mid','assign'=>'imp_link3','oneline'=>"true",'wysiwyg'=>'false'),$_smarty_tpl); ?>
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'imp_link4','Label'=>'Part C - Imp link 4 here','tab'=>'99 - Footer Mid','assign'=>'imp_link4','oneline'=>"true",'wysiwyg'=>'false'),$_smarty_tpl); ?>
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'imp_link5','Label'=>'Part C - Imp link 5 here','tab'=>'99 - Footer Mid','assign'=>'imp_link5','oneline'=>"true",'wysiwyg'=>'false'),$_smarty_tpl); ?>
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'imp_link6','Label'=>'Part C - Imp link 6 here','tab'=>'99 - Footer Mid','assign'=>'imp_link6','oneline'=>"true",'wysiwyg'=>'false'),$_smarty_tpl); ?>


    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'footer4_section_header','label'=>'Part D - Section Head','tab'=>'99 - Footer Mid','assign'=>'footer4_section_header','oneline'=>"true",'wysiwyg'=>'false'),$_smarty_tpl); ?>
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'footer4_section_detail','label'=>'Part D - Section Details(Not more than 150 chars)','tab'=>'99 - Footer Mid','assign'=>'footer4_section_detail','oneline'=>"true",'wysiwyg'=>'false'),$_smarty_tpl); ?>


    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'bottom_link1','Label'=>'Bottom link 1 - Link to Home here','tab'=>'100 - Footer Bottom','assign'=>'bottom_link1','oneline'=>"true",'wysiwyg'=>'false','default'=>'{cms_selflink page="home"}'),$_smarty_tpl); ?>
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'bottom_link2','Label'=>'Bottom link 2 - Link to About here','tab'=>'100 - Footer Bottom','assign'=>'bottom_link2','oneline'=>"true",'wysiwyg'=>'false','default'=>'{cms_selflink page="about"}'),$_smarty_tpl); ?>
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'bottom_link3','Label'=>'Bottom link 3 here - Link to News here','tab'=>'100 - Footer Bottom','assign'=>'bottom_link3','oneline'=>"true",'wysiwyg'=>'false','default'=>'{cms_selflink page="news"}'),$_smarty_tpl); ?>
    <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'bottom_link4','Label'=>'Bottom link 4 here - Link to Contact here','tab'=>'100 - Footer Bottom','assign'=>'bottom_link4','oneline'=>"true",'wysiwyg'=>'false','default'=>'{cms_selflink page="contact"}'),$_smarty_tpl); ?>

    <?php echo smarty_cms_function_share_data(array('scope'=>'global','vars'=>'facebook,twitter,google,youtube,linkedin,feed,footer1_section_header,footer1_section_details,footer2_address1,footer2_address2,footer2_address3,footer2_tel,footer2_mail,imp_link1,imp_link2,imp_link3,imp_link4,imp_link5,imp_link6,footer4_section_header,footer4_section_detail,bottom_link2,bottom_link1,bottom_link3,bottom_link4'),$_smarty_tpl);?>

<?php
}
}
/* {/block 'user_options'} */
}
