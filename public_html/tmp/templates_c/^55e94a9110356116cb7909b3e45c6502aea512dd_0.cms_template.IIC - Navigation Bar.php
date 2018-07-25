<?php
/* Smarty version 3.1.31, created on 2018-07-20 04:32:42
  from "cms_template:IIC - Navigation Bar" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b5118923a1ac9_09169597',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '55e94a9110356116cb7909b3e45c6502aea512dd' => 
    array (
      0 => 'cms_template:IIC - Navigation Bar',
      1 => '1524267397',
      2 => 'cms_template',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b5118923a1ac9_09169597 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_root_url')) require_once '/data/home/iic/public_html/lib/plugins/function.root_url.php';
?>




<?php if (!isset($_smarty_tpl->tpl_vars['depth']->value)) {
$_smarty_tpl->_assignInScope('depth', 0);
}
if ($_smarty_tpl->tpl_vars['depth']->value == 0) {?><div id="menuwrapper" class="primary-navigation-wrapper"><header id="top" class="navbar" role="banner"><div class="container"><div class="navbar-header"><button class="navbar-toggle" type="button" style = "background-color: #011c38" data-toggle="collapse" data-target=".bs-navbar-collapse"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><div id="brand" class="navbar-brand nav inline"><a class="logo navbar-left" href="#"><img src="<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/uploads/images/iic_noCLOUD_v2.png" class="img-responsive"></a> <p class="udsc navbar-text">Institute of Informatics and Communication <br>University of Delhi, South Campus</p><!-- <a class="logo" href="#"><img src="/uploads/images/iic_noCLOUD_v2.png" /> Institute of Informatics and Communication<p class="udsc">Institute of Informatics and Communication University of Delhi, South Campus</p></a> --></div></div><nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation"><ul class="unli nav navbar-nav" data-breakpoint="800"><?php } else { ?><ul class="dropdown-menu" role="menu"><?php }
$_smarty_tpl->_assignInScope('depth', $_smarty_tpl->tpl_vars['depth']->value+1);
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['nodes']->value, 'node', true);
$_smarty_tpl->tpl_vars['node']->iteration = 0;
$_smarty_tpl->tpl_vars['node']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['node']->value) {
$_smarty_tpl->tpl_vars['node']->iteration++;
$_smarty_tpl->tpl_vars['node']->index++;
$_smarty_tpl->tpl_vars['node']->first = !$_smarty_tpl->tpl_vars['node']->index;
$_smarty_tpl->tpl_vars['node']->last = $_smarty_tpl->tpl_vars['node']->iteration == $_smarty_tpl->tpl_vars['node']->total;
$__foreach_node_0_saved = $_smarty_tpl->tpl_vars['node'];
$_smarty_tpl->_assignInScope('liclass', array());
$_smarty_tpl->_assignInScope('aclass', array());
if ($_smarty_tpl->tpl_vars['node']->first && $_smarty_tpl->tpl_vars['node']->total > 1) {
$_tmp_array = isset($_smarty_tpl->tpl_vars['liclass']) ? $_smarty_tpl->tpl_vars['liclass']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array[] = 'first_child';
$_smarty_tpl->_assignInScope('liclass', $_tmp_array);
}
if ($_smarty_tpl->tpl_vars['node']->last && $_smarty_tpl->tpl_vars['node']->total > 1) {
$_tmp_array = isset($_smarty_tpl->tpl_vars['liclass']) ? $_smarty_tpl->tpl_vars['liclass']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array[] = 'last_child';
$_smarty_tpl->_assignInScope('liclass', $_tmp_array);
}
if ($_smarty_tpl->tpl_vars['node']->value->current) {
$_tmp_array = isset($_smarty_tpl->tpl_vars['liclass']) ? $_smarty_tpl->tpl_vars['liclass']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array[] = 'menuactive';
$_smarty_tpl->_assignInScope('liclass', $_tmp_array);
$_tmp_array = isset($_smarty_tpl->tpl_vars['aclass']) ? $_smarty_tpl->tpl_vars['aclass']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array[] = 'menuactive';
$_smarty_tpl->_assignInScope('aclass', $_tmp_array);
}
if ($_smarty_tpl->tpl_vars['node']->value->has_children && $_smarty_tpl->tpl_vars['node']->value->alias != 'news') {
$_tmp_array = isset($_smarty_tpl->tpl_vars['liclass']) ? $_smarty_tpl->tpl_vars['liclass']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array[] = 'menu-item-has-children';
$_smarty_tpl->_assignInScope('liclass', $_tmp_array);
$_tmp_array = isset($_smarty_tpl->tpl_vars['aclass']) ? $_smarty_tpl->tpl_vars['aclass']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array[] = 'menuparent';
$_smarty_tpl->_assignInScope('aclass', $_tmp_array);
}
if ($_smarty_tpl->tpl_vars['node']->value->parent) {
$_tmp_array = isset($_smarty_tpl->tpl_vars['liclass']) ? $_smarty_tpl->tpl_vars['liclass']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array[] = 'menuactive';
$_smarty_tpl->_assignInScope('liclass', $_tmp_array);
$_tmp_array = isset($_smarty_tpl->tpl_vars['aclass']) ? $_smarty_tpl->tpl_vars['aclass']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array[] = 'menuactive';
$_smarty_tpl->_assignInScope('aclass', $_tmp_array);
}
if ($_smarty_tpl->tpl_vars['node']->value->type == 'sectionheader') {?><li class='<?php echo implode(' ',$_smarty_tpl->tpl_vars['liclass']->value);?>
 menu-item'><a<?php if (count($_smarty_tpl->tpl_vars['aclass']->value) > 0) {?> class="<?php echo implode(' ',$_smarty_tpl->tpl_vars['aclass']->value);?>
"<?php }?>><?php echo $_smarty_tpl->tpl_vars['node']->value->menutext;?>
</a><?php if (isset($_smarty_tpl->tpl_vars['node']->value->children)) {
$_smarty_tpl->_subTemplateRender(basename($_smarty_tpl->source->filepath), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('nodes'=>$_smarty_tpl->tpl_vars['node']->value->children), 0, true);
}?></li><?php } elseif ($_smarty_tpl->tpl_vars['node']->value->type == 'separator') {?><li class="separator"></li><?php } else { ?><li class="<?php echo implode(' ',$_smarty_tpl->tpl_vars['liclass']->value);?>
 menu-item"><a<?php if (count($_smarty_tpl->tpl_vars['aclass']->value) > 0) {?> class="<?php echo implode(' ',$_smarty_tpl->tpl_vars['aclass']->value);?>
"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['node']->value->url;?>
"<?php if ($_smarty_tpl->tpl_vars['node']->value->target != '') {?> target="<?php echo $_smarty_tpl->tpl_vars['node']->value->target;?>
"<?php }?>><?php echo $_smarty_tpl->tpl_vars['node']->value->menutext;?>
</a><?php if (isset($_smarty_tpl->tpl_vars['node']->value->children)) {
$_smarty_tpl->_subTemplateRender(basename($_smarty_tpl->source->filepath), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('nodes'=>$_smarty_tpl->tpl_vars['node']->value->children), 0, true);
}?></li><?php }
$_smarty_tpl->tpl_vars['node'] = $__foreach_node_0_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_smarty_tpl->_assignInScope('depth', $_smarty_tpl->tpl_vars['depth']->value-1);
?><!-- Counter Checking --></ul><?php if ($_smarty_tpl->tpl_vars['depth']->value == 0) {?><div class="clearb"></div></ul></ul></nav><!-- Navbar Collapse --></div><!-- /.container --></header></div><?php }
}
}
