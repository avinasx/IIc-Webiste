<?php
/* Smarty version 3.1.31, created on 2018-07-20 04:51:38
  from "cms_template:IIC Timeline Widget" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b511d02b4bd87_50870451',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '852b515d622f50d01004f60340ce7bbe558df97b' => 
    array (
      0 => 'cms_template:IIC Timeline Widget',
      1 => '1524270858',
      2 => 'cms_template',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b511d02b4bd87_50870451 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_cycle')) require_once '/data/home/iic/public_html/lib/smarty/plugins/function.cycle.php';
?>

<ul class="timeline" style = "background-color: white">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['items']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
        <?php echo smarty_function_cycle(array('values'=>'timeline-odd,timeline-inverted','assign'=>'rowclass'),$_smarty_tpl);?>

        <li class="<?php echo $_smarty_tpl->tpl_vars['rowclass']->value;?>
">
            <?php if ($_smarty_tpl->tpl_vars['item']->value->fielddefs['heading']['value'] != '') {?>
                <div class="timeline-badge primary"><a><i class="fa fa-dot-circle-o fa-lg" rel="tooltip" title="" id="" data-original-title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value->fielddefs['heading']['value'], ENT_QUOTES, 'UTF-8', true);?>
" style="cursor: pointer; padding-top: 22px;"></i></a></div>
            <?php } else { ?>
                <div class="timeline-badge primary"><a><i class="fa fa-dot-circle-o fa-lg" rel="tooltip" title="" id="" data-original-title="Timeline Event" style="cursor: pointer; padding-top: 22px;"></i></a></div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['item']->value->fielddefs['content']['value']) {?>
                <div class="timeline-panel">

                    <div class="timeline-heading">
                        <?php if ($_smarty_tpl->tpl_vars['item']->value->fielddefs['heading']['value'] != '') {?>
                            <h2 class="heading col-xs-12"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value->fielddefs['heading']['value'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
                        <?php } else { ?>
                            <img title="IIC" src="http://www.du.ac.in/du/uploads/images/showtime/UDSC/IIC.jpg" alt="Institute_of_Informatics_and_Communication" class="img-responsive">
                        <?php }?>
                    </div>
                    <div class="timeline-body">
                        <?php $_template = new Smarty_Internal_Template('eval:'.$_smarty_tpl->tpl_vars['item']->value->fielddefs['content']['value'], $_smarty_tpl->smarty, $_smarty_tpl);echo $_template->fetch(); ?>
                    </div>

                    <?php if ($_smarty_tpl->tpl_vars['item']->value->link_text != '') {?>
                        <div class="timeline-footer">
                            <a class="pull-right" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value->link_text, ENT_QUOTES, 'UTF-8', true);?>
">Read More</a>
                        </div>
                    <?php }?>

                </div>
            <?php }?>
        </li>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

    <li class="clearfix" style="float: none;"></li>
</ul><?php }
}
