<?php
/* Smarty version 3.1.31, created on 2018-07-20 04:52:17
  from "tpl_body:84" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b511d291545d1_21442819',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bb155382e6bf239a1196b0eb8f7a9d4a524f915c' => 
    array (
      0 => 'tpl_body:84',
      1 => '1510997098',
      2 => 'tpl_body',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b511d291545d1_21442819 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_root_url')) require_once '/data/home/iic/public_html/lib/plugins/function.root_url.php';
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16042222075b511d29149d37_76757903', 'user_content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'cms_template:IIC Base');
}
/* {block 'user_content'} */
class Block_16042222075b511d29149d37_76757903 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'user_content' => 
  array (
    0 => 'Block_16042222075b511d29149d37_76757903',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<section class="page404">
	<div class="container">
    	<div class="sixteen columns">
			<div class="text-center">
				<h1>404</h1>
				<div class="content_404">
				The page you are looking for no longer exists.
Perhaps you can return back to the sites homepage see you can find what you are looking for.				</div>
				<div class="blog-link dark"><a class="btn btn-primary" href="http:<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
"><i class="fa fa-arrow-circle-left"></i> Back To Home</a></div>
			</div>
       </div> 	
    </div><!-- end container -->
</section>
<?php
}
}
/* {/block 'user_content'} */
}
