<?php
/* Smarty version 3.1.31, created on 2018-07-20 04:32:42
  from "87e1486c2094336d764621281b983af51fbae858" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b5118926ebd40_37559359',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b5118926ebd40_37559359 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/data/home/iic/public_html/lib/smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_cms_selflink')) require_once '/data/home/iic/public_html/lib/plugins/function.cms_selflink.php';
if (!is_callable('smarty_modifier_replace')) require_once '/data/home/iic/public_html/lib/smarty/plugins/modifier.replace.php';
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['events']->value, 'event');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['event']->value) {
?>
    <article class="event">
        <figure class="date" style="background:#012951;">
	    <?php if (smarty_modifier_date_format($_smarty_tpl->tpl_vars['event']->value->start,"%Y-%m-%d")) {?>
            <div class="month"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['event']->value->start,"%b");?>
</div>
            <div class="day"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['event']->value->start,"%e");?>
</div>
        </figure>
        <aside>
            <header><?php if ($_smarty_tpl->tpl_vars['event']->value->linkid > 1) {?><a href="<?php echo smarty_function_cms_selflink(array('href'=>$_smarty_tpl->tpl_vars['event']->value->linkid),$_smarty_tpl);?>
" class="eventlink" title="<?php echo smarty_modifier_replace(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['event']->value->title),'"','');?>
"><?php echo $_smarty_tpl->tpl_vars['event']->value->title;?>
</a></header><?php } else { ?><header><?php echo $_smarty_tpl->tpl_vars['event']->value->title;?>
</header><?php }?>
     <div class="additional-info">
            <?php if (smarty_modifier_date_format($_smarty_tpl->tpl_vars['event']->value->start,"%H:%M") == smarty_modifier_date_format($_smarty_tpl->tpl_vars['event']->value->end,"%H:%M")) {?>
            <b>Time: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['event']->value->start,"%H:%M");?>
 </b>
            <?php } else { ?>
            <b>Time: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['event']->value->start,"%H:%M");?>
 - <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['event']->value->end,"%H:%M");?>
</b>
            <?php }?>            
            <?php if ($_smarty_tpl->tpl_vars['event']->value->content) {
echo $_smarty_tpl->tpl_vars['event']->value->content;
}?>
     </div>
        <?php }?>
    </article>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
