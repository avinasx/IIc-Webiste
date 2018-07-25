<?php
/* Smarty version 3.1.31, created on 2018-07-20 06:56:33
  from "cms_template:83" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b513a49cc5d34_16101985',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '17676c3d4f12a89014b15ff2eba8779325cea2ac' => 
    array (
      0 => 'cms_template:83',
      1 => '1524287059',
      2 => 'cms_template',
    ),
    '1afcd6f05a3ef4e8eec5724faf601e439d7f6201' => 
    array (
      0 => 'cms_template:IIC Base',
      1 => '1524268005',
      2 => 'cms_template',
    ),
    '8b6e1639b5bd81b5125dd84aad61d5a66ab21bb7' => 
    array (
      0 => 'cms_template:IIC Footer',
      1 => '1510997804',
      2 => 'cms_template',
    ),
    '6810313be9ec00621fa23be2b9496d711a93495c' => 
    array (
      0 => 'cms_template:IIC JavaScripts',
      1 => '1516015041',
      2 => 'cms_template',
    ),
  ),
  'includes' => 
  array (
    'cms_template:IIC Base' => 1,
    'cms_template:IIC Footer' => 1,
    'cms_template:IIC JavaScripts' => 1,
  ),
),false)) {
function content_5b513a49cc5d34_16101985 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_metadata')) require_once '/data/home/iic/public_html/lib/plugins/function.metadata.php';
if (!is_callable('smarty_function_title')) require_once '/data/home/iic/public_html/lib/plugins/function.title.php';
if (!is_callable('smarty_function_sitename')) require_once '/data/home/iic/public_html/lib/plugins/function.sitename.php';
if (!is_callable('smarty_function_root_url')) require_once '/data/home/iic/public_html/lib/plugins/function.root_url.php';
if (!is_callable('smarty_function_cms_selflink')) require_once '/data/home/iic/public_html/lib/plugins/function.cms_selflink.php';
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5026276395b513a49c9c342_45989984', 'user_options');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4596863485b513a49cac8f6_11647613', 'user_content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'cms_template:IIC Base', '1afcd6f05a3ef4e8eec5724faf601e439d7f6201', 'content_5b513a498a8190_20913531');
}
/* {block 'user_options'} */
class Block_5026276395b513a49c9c342_45989984 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'user_options' => 
  array (
    0 => 'Block_5026276395b513a49c9c342_45989984',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    
    
    
<?php
}
}
/* {/block 'user_options'} */
/* {block 'user_content'} */
class Block_4596863485b513a49cac8f6_11647613 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'user_content' => 
  array (
    0 => 'Block_4596863485b513a49cac8f6_11647613',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php if ($_smarty_tpl->tpl_vars['display_breadcrumbs']->value == "+") {?>
        <!-- Breadcrumbs -->
        <section class="breadcrumbs">
            <?php if (!empty($_smarty_tpl->tpl_vars['entry']->value->title)) {?>
                
            <?php } else { ?>
                
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
            
        </section>
    </div>
<?php
}
}
/* {/block 'user_content'} */
/* Start inline template "cms_template:IIC Base" =============================*/
function content_5b513a49a09d12_02483113 ($_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15038955625b513a49a0c5c8_32535162', 'user_options');
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
</footer><?php
}
/* {block 'user_options'} */
class Block_15038955625b513a49a0c5c8_32535162 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'user_options' => 
  array (
    0 => 'Block_15038955625b513a49a0c5c8_32535162',
  ),
);
public $append = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <!-- Social network -->

    
    
    
    
    
    

    
    

    
    
    
    
    


    
    
    
    
    
    


    
    


    
    
    
    

    
<?php
}
}
/* {/block 'user_options'} */
/* End inline template "cms_template:IIC Base" =============================*/
/* Start inline template "cms_template:IIC Base" =============================*/
function content_5b513a49c38d04_27708828 ($_smarty_tpl) {
?>


        <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"><?php echo '</script'; ?>
>

        <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type='text/javascript' src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'><?php echo '</script'; ?>
>

        <!-- <link rel='stylesheet' id='wff-mystyle-css'  href='https://demo.vegatheme.com/universo/wp-content/plugins/facebook-feed/css/style.css?ver=4.6.6' type='text/css' media='all' />
        <?php echo '<script'; ?>
 type='text/javascript' src='https://demo.vegatheme.com/universo/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.4.1'><?php echo '</script'; ?>
> -->


<?php echo '<script'; ?>
 type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js'><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 type="text/javascript">
         //<![CDATA[
         jQuery(document).ready(function() {

             jQuery( '.ktweet .kfooter a:not(.ktogglemedia)' ).click(function(e) {

                 // Prevent Click from Reloading page
                 e.preventDefault();

                 var khref = jQuery(this).attr('href');
                 window.open( khref, 'twitter', 'width=600, height=400, top=0, left=0');

             });

         });
         //]]>

        <?php echo '</script'; ?>
>
        <!-- Other scripts - shift to header -->
        <?php echo '<script'; ?>
 type='text/javascript'>
         /* <![CDATA[ */
         var tribe_events_linked_posts = {"post_types":{"tribe_venue":"venue","tribe_organizer":"organizer"}};
         /* ]]> */
        <?php echo '</script'; ?>
>

        <?php echo '<script'; ?>
 type='text/javascript'>
         /* <![CDATA[ */
        <?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/uploads/js/jquery-migrate.min.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/uploads/js/custom.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/uploads/js/icheck.min.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/uploads/js/jQuery.equalHeights.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/uploads/js/jquery.fitvids.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/uploads/js/jquery.placeholder.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/uploads/js/jquery.tablesorter.min.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/uploads/js/jquery.vanillabox-0.1.5.min.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/uploads/js/owl.carousel.min.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/uploads/js/retina-1.1.0.min.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/uploads/js/selectize.min.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/uploads/js/jquery.vanillabox-0.1.5.min.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/uploads/js/jquery-migrate-1.2.1.min.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/uploads/js/console.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/uploads/js/jquery.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/uploads/js/jquery-migrate.min.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/uploads/js/add-to-cart.min.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/uploads/js/woocommerce-add-to-cart.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/uploads/js/scripts.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/uploads/js/jquery.blockUI.min.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/uploads/js/woocommerce.min.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/uploads/js/jquery.cookie.min.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/uploads/js/cart-fragments.min.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/uploads/js/comment-reply.min.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/uploads/js/bootstrap.min.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/uploads/js/jquery.fitvids.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/uploads/js/jquery-migrate-1.2.1.min.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/uploads/js/selectize.min.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/uploads/js/jquery.placeholder.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/uploads/js/jQuery.equalHeights.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/uploads/js/icheck.min.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/uploads/js/jquery.flexslider-min.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/uploads/js/jquery.tablesorter.min.js'><?php echo '</script'; ?>
><?php
}
/* End inline template "cms_template:IIC Base" =============================*/
/* Start inline template "cms_template:83" =============================*/
function content_5b513a498a8190_20913531 ($_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>


<!-- Main --><!-- Top Navigation Bar --><!-- Content for Derieved Template --><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1185794785b513a49916a57_90300584', 'user_options');
?>



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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1987636195b513a499582a8_23796254', 'user_css');
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
                
                <!-- Primary Navigation Ends Here -->
                <!-- Background Image -->
                <div class="background">
                    <!-- <img src="#" alt=""> -->
                </div>
            </div>

            <!-- Content for Derieved Template -->
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15946356075b513a49a02508_89322034', 'user_content');
?>


        </div>

        <!-- #wrapper -->
        <div class="vnbx-mask vnbx vnbx-close-button-enabled vnbx-group" style="display: none; width: 1351px; height: 3050px;"><div class="vnbx-frame" style="left: 683px; top: 323px;"><div class="vnbx-container" style="width: 200px; height: 150px;"><div class="vnbx-content vnbx-empty" style="margin-left: -100px; margin-top: -75px;"></div></div><div class="vnbx-label vnbx-title"></div><div class="vnbx-label vnbx-pager"></div><div class="vnbx-button vnbx-prev" ontouchstart="void(0)"></div><div class="vnbx-button vnbx-next" ontouchstart="void(0)"></div><div class="vnbx-button vnbx-close" ontouchstart="void(0)"></div></div></div>

        <?php
$_smarty_tpl->_subTemplateRender('cms_template:IIC Footer', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false, '8b6e1639b5bd81b5125dd84aad61d5a66ab21bb7', 'content_5b513a49a09d12_02483113');
?>



        <!-- JavaScripts -->

        <!-- Javascript for Derieved Template -->
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4977591645b513a49c0a6b4_02548026', 'user_javascript');
?>


    </body>
</html><?php
}
/* {block 'user_options'} */
class Block_1185794785b513a49916a57_90300584 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'user_options' => 
  array (
    0 => 'Block_1185794785b513a49916a57_90300584',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'user_options'} */
/* {block 'user_css'} */
class Block_1987636195b513a499582a8_23796254 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'user_css' => 
  array (
    0 => 'Block_1987636195b513a499582a8_23796254',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            

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
class Block_15946356075b513a49a02508_89322034 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'user_content' => 
  array (
    0 => 'Block_15946356075b513a49a02508_89322034',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                
            <?php
}
}
/* {/block 'user_content'} */
/* {block 'user_javascript'} */
class Block_4977591645b513a49c0a6b4_02548026 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'user_javascript' => 
  array (
    0 => 'Block_4977591645b513a49c0a6b4_02548026',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <?php
$_smarty_tpl->_subTemplateRender('cms_template:IIC JavaScripts', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false, '6810313be9ec00621fa23be2b9496d711a93495c', 'content_5b513a49c38d04_27708828');
?>

        <?php
}
}
/* {/block 'user_javascript'} */
/* End inline template "cms_template:83" =============================*/
}
