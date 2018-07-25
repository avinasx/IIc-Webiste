<?php
/* Smarty version 3.1.31, created on 2018-07-20 04:52:47
  from "cms_template:IIC Accordion Widget" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b511d477ec248_50711820',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dcb5915b3376363cd1caee72f3d7f3ae205e5d4a' => 
    array (
      0 => 'cms_template:IIC Accordion Widget',
      1 => '1510997279',
      2 => 'cms_template',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b511d477ec248_50711820 (Smarty_Internal_Template $_smarty_tpl) {
?>

<section class="accordion">
    <div class="panel-group" id="faqAccordion">
        <div class="panel panel-default ">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['items']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                <?php if ($_smarty_tpl->tpl_vars['item']->value->fielddefs['heading']['value'] != '') {?>
                    <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#<?php echo $_smarty_tpl->tpl_vars['item']->value->alias;?>
">
                        <h4 class="panel-title">
                            <a data-vc-accordion="" data-vc-container=".vc_tta-container">
                                <span class="vc_tta-title-text"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value->fielddefs['heading']['value'], ENT_QUOTES, 'UTF-8', true);?>
</span>
                            </a>
                        </h4>
                    </div>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['item']->value->fielddefs['content']['value']) {?>
                    <div id="<?php echo $_smarty_tpl->tpl_vars['item']->value->alias;?>
" class="panel-collapse collapse" style="height: 0px;">
                        <div class="panel-body">
                            <?php $_template = new Smarty_Internal_Template('eval:'.$_smarty_tpl->tpl_vars['item']->value->fielddefs['content']['value'], $_smarty_tpl->smarty, $_smarty_tpl);echo $_template->fetch(); ?>
                        </div>
                    </div>
                <?php }?>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

        </div>
    </div>
</section><?php }
}
