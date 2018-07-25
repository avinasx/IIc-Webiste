{* Main Template*}
{strip}
{process_pagedata}
{/strip}<!doctype html>
<html lang="{cms_get_language}">

    <head>
        <title>{title} - {sitename}</title>
        {metadata}
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
        {cms_stylesheet}
{literal}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript' src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script type='text/javascript' src='./uploads/js/main.js'></script>

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css" />

<!-- Bootstrap
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css" />  -->
{/literal}
    </head>
    <body class="home page page-id-300 page-template page-template-page-templates page-template-template-canvas page-template-page-templatestemplate-canvas-php wpb-js-composer js-comp-ver-4.12.1 vc_responsive">
        <div class="images-preloader" style="display: none;">
            <div class="preloader4"></div>
        </div>
        <div id="wrapper">
            <div class="navigation-wrapper">
                <div class="secondary-navigation-wrapper">
                    <div class="container">
<ul id="menu-top-menu" class="secondary-navigation list-unstyled pull-left" data-breakpoint="800">
                            <li id="menu-item-4" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-4"><a title="Prospective Students" href="#">University of Delhi Main</a></li>
                        </ul>                        
<!-- <div class="search"><form class="input-group" action=""><input class="form-control" name="s" type="text" placeholder="Search"> <button id="search-submit" class="btn" type="submit"></button></form><\!-- /.input-group -\-></div> -->
                        <ul id="menu-top-menu" class="secondary-navigation list-unstyled pull-right" data-breakpoint="800">
                            <li id="menu-item-4" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-4"><a title="Prospective Students" href="#">Prospective Students</a></li>
                            <li id="menu-item-5" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5"><a title="Current Students" href="#">Current Students</a></li>
                            <li id="menu-item-6" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6"><a title="Faculty &amp; Staff" href="#">Faculty &amp; Staff</a></li>
                            <li id="menu-item-7" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-7"><a title="Alumni" href="#">Alumni</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.secondary-navigation -->
                <!-- Primary Navigation Wrapper -->
                {Navigator}
                <!-- Primary Navigation Ends Here -->
                <!-- Background Image -->
                <div class="background">
                    {* <!-- <img src="http://demo.vegatheme.com/universo/wp-content/themes/universo/images/background-city.png" alt=""> --> *}
                </div>
            </div>
            <!-- Content for the Particular Page. Please put the content in the section div -->
                {news}
            <!-- End Content -->
        </div><!-- #wrapper -->
        <div class="vnbx-mask vnbx vnbx-close-button-enabled vnbx-group" style="display: none; width: 1351px; height: 3050px;"><div class="vnbx-frame" style="left: 683px; top: 323px;"><div class="vnbx-container" style="width: 200px; height: 150px;"><div class="vnbx-content vnbx-empty" style="margin-left: -100px; margin-top: -75px;"></div></div><div class="vnbx-label vnbx-title"></div><div class="vnbx-label vnbx-pager"></div><div class="vnbx-button vnbx-prev" ontouchstart="void(0)"></div><div class="vnbx-button vnbx-next" ontouchstart="void(0)"></div><div class="vnbx-button vnbx-close" ontouchstart="void(0)"></div></div></div>
    </body>
{include file='cms_template:footer'}


<!-- JavaScripts -->
{literal}
<script type="text/javascript"></script><style type="text/css"></style><link rel='stylesheet' id='kebo-twitter-plugin-css'  href='http://demo.vegatheme.com/universo/wp-content/plugins/kebo-twitter-feed/css/plugin.css?ver=1.5.9' type='text/css' media='all' />
<link rel='stylesheet' id='wff-mystyle-css'  href='http://demo.vegatheme.com/universo/wp-content/plugins/facebook-feed/css/style.css?ver=4.6.6' type='text/css' media='all' />
<script type='text/javascript' src='http://demo.vegatheme.com/universo/wp-content/plugins/contact-form-7/includes/js/jquery.form.min.js?ver=3.51.0-2014.06.20'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var _wpcf7 = {"loaderUrl":"http:\/\/demo.vegatheme.com\/universo\/wp-content\/plugins\/contact-form-7\/images\/ajax-loader.gif","recaptcha":{"messages":{"empty":"Please verify that you are not a robot."}},"sending":"Sending ..."};
/* ]]> */
</script>
<script type='text/javascript' src='http://demo.vegatheme.com/universo/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=4.5'></script>
<script type='text/javascript' src='//demo.vegatheme.com/universo/wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min.js?ver=2.70'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var woocommerce_params = {"ajax_url":"\/universo\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/universo\/?wc-ajax=%%endpoint%%"};
/* ]]> */
</script>
<script type='text/javascript' src='//demo.vegatheme.com/universo/wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min.js?ver=2.6.4'></script>
<script type='text/javascript' src='//demo.vegatheme.com/universo/wp-content/plugins/woocommerce/assets/js/jquery-cookie/jquery.cookie.min.js?ver=1.4.1'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var wc_cart_fragments_params = {"ajax_url":"\/universo\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/universo\/?wc-ajax=%%endpoint%%","fragment_name":"wc_fragments"};
/* ]]> */
</script>
<script type='text/javascript' src='//demo.vegatheme.com/universo/wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.min.js?ver=2.6.4'></script>
<script type='text/javascript' src='http://demo.vegatheme.com/universo/wp-includes/js/comment-reply.min.js?ver=4.6.6'></script>

<script type='text/javascript' src='http://demo.vegatheme.com/universo/wp-content/themes/universo/bootstrap/js/bootstrap.min.js?ver=4.6.6'></script>
<script type='text/javascript' src='http://demo.vegatheme.com/universo/wp-content/themes/universo/js/jquery.fitvids.js?ver=4.6.6'></script>
<script type='text/javascript' src='http://demo.vegatheme.com/universo/wp-content/themes/universo/js/jquery-migrate-1.2.1.min.js?ver=4.6.6'></script>
<script type='text/javascript' src='http://demo.vegatheme.com/universo/wp-content/themes/universo/js/selectize.min.js?ver=4.6.6'></script>
<script type='text/javascript' src='http://demo.vegatheme.com/universo/wp-content/themes/universo/js/jquery.placeholder.js?ver=4.6.6'></script>
<script type='text/javascript' src='http://demo.vegatheme.com/universo/wp-content/themes/universo/js/jQuery.equalHeights.js?ver=4.6.6'></script>
<script type='text/javascript' src='http://demo.vegatheme.com/universo/wp-content/themes/universo/js/icheck.min.js?ver=4.6.6'></script>
<script type='text/javascript' src='http://demo.vegatheme.com/universo/wp-content/plugins/js_composer/assets/lib/bower/flexslider/jquery.flexslider-min.js?ver=4.12.1'></script>
<script type='text/javascript' src='http://demo.vegatheme.com/universo/wp-content/themes/universo/js/jquery.tablesorter.min.js?ver=4.6.6'></script>
    <script type="text/javascript">
        
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
        
    </script>



<!-- Other scripts - shift to header -->
<script type='text/javascript'>
/* <![CDATA[ */
var tribe_events_linked_posts = {"post_types":{"tribe_venue":"venue","tribe_organizer":"organizer"}};
/* ]]> */
</script>
<script type='text/javascript' src='http://demo.vegatheme.com/universo/wp-includes/js/jquery/jquery.js?ver=1.12.4'></script>
<script type='text/javascript' src='http://demo.vegatheme.com/universo/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.4.1'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var wc_add_to_cart_params = {"ajax_url":"\/universo\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/universo\/?wc-ajax=%%endpoint%%","i18n_view_cart":"View Cart","cart_url":"http:\/\/demo.vegatheme.com\/universo\/cart\/","is_cart":"","cart_redirect_after_add":"no"};
/* ]]> */
</script>
<script type='text/javascript' src='//demo.vegatheme.com/universo/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min.js?ver=2.6.4'></script>
<script type='text/javascript' src='http://demo.vegatheme.com/universo/wp-content/plugins/js_composer/assets/js/vendors/woocommerce-add-to-cart.js?ver=4.12.1'></script>
<script type='text/javascript' src='http://demo.vegatheme.com/universo/wp content/themes/universo/js/jquery.validate.min.js?ver=4.6.6'></script>
{/literal}
</html>