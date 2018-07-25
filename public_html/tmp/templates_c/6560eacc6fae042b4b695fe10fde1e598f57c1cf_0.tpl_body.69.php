<?php
/* Smarty version 3.1.31, created on 2018-07-20 04:51:38
  from "tpl_body:69" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b511d0281e4f3_49164516',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6560eacc6fae042b4b695fe10fde1e598f57c1cf' => 
    array (
      0 => 'tpl_body:69',
      1 => '1524270829',
      2 => 'tpl_body',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b511d0281e4f3_49164516 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_cms_function_cms_stylesheet')) require_once '/data/home/iic/public_html/lib/plugins/function.cms_stylesheet.php';
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6108455895b511d027ff228_90647987', 'user_css');
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7567891755b511d02810078_42605920', 'user_content');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3758000685b511d02818953_18640895', 'user_javascript');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'cms_template:IIC Base');
}
/* {block 'user_css'} */
class Block_6108455895b511d027ff228_90647987 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'user_css' => 
  array (
    0 => 'Block_6108455895b511d027ff228_90647987',
  ),
);
public $append = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo smarty_cms_function_cms_stylesheet(array('name'=>"Timeline"),$_smarty_tpl);?>

    <!-- Bootstrap -->
<?php
}
}
/* {/block 'user_css'} */
/* {block 'user_content'} */
class Block_7567891755b511d02810078_42605920 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'user_content' => 
  array (
    0 => 'Block_7567891755b511d02810078_42605920',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="container"style = "background-color: #011c38" >
        <div class="page-header text-center"style = "background-color: white" >
            <h2 id="timeline" class="section-heading">Course Structure - M.Sc Informatics</h2>
        </div>

        <?php echo Widgets::function_plugin(array('category'=>"timeline",'template'=>"IIC Timeline Widget"),$_smarty_tpl);?>


        <div class="page-header text-center" >
            <h2 id="timeline" class="section-heading" ></h2>
        </div>
    </div>
<?php
}
}
/* {/block 'user_content'} */
/* {block 'user_javascript'} */
class Block_3758000685b511d02818953_18640895 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'user_javascript' => 
  array (
    0 => 'Block_3758000685b511d02818953_18640895',
  ),
);
public $append = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
 type="text/javascript">
     $(document).ready(function(){
         var my_posts = $("[rel=tooltip]");

         var size = $(window).width();
         for(i=0;i<my_posts.length;i++){
             the_post = $(my_posts[i]);

             if(the_post.hasClass('invert') && size >=767 ){
                 the_post.tooltip({ placement: 'left'});
                 the_post.css("cursor","pointer");
             }else{
                 the_post.tooltip({ placement: 'rigth'});
                 the_post.css("cursor","pointer");
             }
         }
     });
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'user_javascript'} */
}
