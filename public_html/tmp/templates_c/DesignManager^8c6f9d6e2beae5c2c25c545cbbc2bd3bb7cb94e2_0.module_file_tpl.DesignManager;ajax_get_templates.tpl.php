<?php
/* Smarty version 3.1.31, created on 2018-07-23 11:55:38
  from "module_file_tpl:DesignManager;ajax_get_templates.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b5574e2344c84_64335627',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8c6f9d6e2beae5c2c25c545cbbc2bd3bb7cb94e2' => 
    array (
      0 => 'module_file_tpl:DesignManager;ajax_get_templates.tpl',
      1 => 1517033802,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
    'module_file_tpl:DesignManager;admin_defaultadmin_tpltooltip.tpl' => 1,
    'module_file_tpl:DesignManager;admin_defaultadmin_tpltype_tooltip.tpl' => 1,
  ),
),false)) {
function content_5b5574e2344c84_64335627 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_form_start')) require_once '/data/home/iic/public_html/lib/plugins/function.form_start.php';
if (!is_callable('smarty_function_admin_icon')) require_once '/data/home/iic/public_html/admin/plugins/function.admin_icon.php';
if (!is_callable('smarty_cms_function_cms_action_url')) require_once '/data/home/iic/public_html/lib/plugins/function.cms_action_url.php';
if (!is_callable('smarty_function_cms_pageoptions')) require_once '/data/home/iic/public_html/lib/plugins/function.cms_pageoptions.php';
if (!is_callable('smarty_function_cycle')) require_once '/data/home/iic/public_html/lib/smarty/plugins/function.cycle.php';
if (!is_callable('smarty_function_cms_help')) require_once '/data/home/iic/public_html/admin/plugins/function.cms_help.php';
if (!is_callable('smarty_function_page_warning')) require_once '/data/home/iic/public_html/admin/plugins/function.page_warning.php';
if (!is_callable('smarty_function_form_end')) require_once '/data/home/iic/public_html/lib/plugins/function.form_end.php';
echo '<script'; ?>
>
$('#tpl_selall').cmsms_checkall();
<?php echo '</script'; ?>
>

<?php echo smarty_function_form_start(array('action'=>'defaultadmin'),$_smarty_tpl);?>
<div class="row"><div class="pageoptions options-menu half"><?php if ($_smarty_tpl->tpl_vars['has_add_right']->value) {?><a id="addtemplate" accesskey="a" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('create_template');?>
"><?php echo smarty_function_admin_icon(array('icon'=>'newobject.gif','alt'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('create_template')),$_smarty_tpl);?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('create_template');?>
</a>&nbsp;&nbsp;<?php }?><a id="edittplfilter" accesskey="f" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_editfilter');?>
"><?php echo smarty_function_admin_icon(array('icon'=>'view.gif','alt'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_editfilter')),$_smarty_tpl);?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('filter');?>
</a>&nbsp;&nbsp;<?php if ($_smarty_tpl->tpl_vars['have_locks']->value) {?><a id="clearlocks" accesskey="l" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('title_clearlocks');?>
" href="<?php echo smarty_cms_function_cms_action_url(array('action'=>'admin_clearlocks','type'=>'template'),$_smarty_tpl);?>
"><?php echo smarty_function_admin_icon(array('icon'=>'run.gif','alt'=>''),$_smarty_tpl);?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_clearlocks');?>
</a>&nbsp;&nbsp;<?php }
if (!empty($_smarty_tpl->tpl_vars['tpl_filter']->value[0])) {?><span style="color: green;" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('title_filterapplied');?>
"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('filterapplied');?>
</span><?php }?></div><?php if (isset($_smarty_tpl->tpl_vars['tpl_nav']->value) && $_smarty_tpl->tpl_vars['tpl_nav']->value['numpages'] > 1) {?><div class="pageoptions" style="text-align: right;"><label for="tpl_page"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_page');?>
:</label>&nbsp;<select id="tpl_page" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
tpl_page"><?php echo smarty_function_cms_pageoptions(array('numpages'=>$_smarty_tpl->tpl_vars['tpl_nav']->value['numpages'],'curpage'=>$_smarty_tpl->tpl_vars['tpl_nav']->value['curpage']),$_smarty_tpl);?>
</select>&nbsp;<input type="submit" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('go');?>
"/></div><?php }?></div><?php if (isset($_smarty_tpl->tpl_vars['templates']->value)) {?><table class="pagetable"><thead><tr><th title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('title_tpl_id');?>
"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_id');?>
</th><th class="pageicon"></th><th title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('title_tpl_name');?>
"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_name');?>
</th><th title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('title_tpl_type');?>
"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_type');?>
</th><th title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('title_tpl_filename');?>
"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_filename');?>
</th><th title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('title_tpl_design');?>
"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_design');?>
</th><th title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('title_tpl_dflt');?>
" class="pageicon"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_dflt');?>
</th><th class="pageicon"></th><?php if ($_smarty_tpl->tpl_vars['has_add_right']->value) {?><th class="pageicon"></th><?php }?><th class="pageicon"></th><th class="pageicon"><input type="checkbox" value="1" id="tpl_selall" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_select_all');?>
"/></th></tr></thead><tbody><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['templates']->value, 'template');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['template']->value) {
echo smarty_function_cycle(array('values'=>"row1,row2",'assign'=>'rowclass'),$_smarty_tpl);
ob_start();
$_smarty_tpl->_subTemplateRender('module_file_tpl:DesignManager;admin_defaultadmin_tpltooltip.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
$_smarty_tpl->assign('tpl_tooltip', ob_get_clean());
?>
<tr class="<?php echo $_smarty_tpl->tpl_vars['rowclass']->value;?>
"><?php echo smarty_cms_function_cms_action_url(array('action'=>'admin_edit_template','tpl'=>$_smarty_tpl->tpl_vars['template']->value->get_id(),'assign'=>'edit_tpl'),$_smarty_tpl);
if ($_smarty_tpl->tpl_vars['has_add_right']->value) {
echo smarty_cms_function_cms_action_url(array('action'=>'admin_copy_template','tpl'=>$_smarty_tpl->tpl_vars['template']->value->get_id(),'assign'=>'copy_tpl'),$_smarty_tpl);
}
echo smarty_cms_function_cms_action_url(array('action'=>'admin_delete_template','tpl'=>$_smarty_tpl->tpl_vars['template']->value->get_id(),'assign'=>'delete_tpl'),$_smarty_tpl);
if (!$_smarty_tpl->tpl_vars['template']->value->locked()) {?><td><a href="<?php echo $_smarty_tpl->tpl_vars['edit_tpl']->value;?>
" data-tpl-id="<?php echo $_smarty_tpl->tpl_vars['template']->value->get_id();?>
" class="edit_tpl tooltip" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('edit_template');?>
" data-cms-description='<?php echo $_smarty_tpl->tpl_vars['tpl_tooltip']->value;?>
'><?php echo $_smarty_tpl->tpl_vars['template']->value->get_id();?>
</a></td><td></td><td><a href="<?php echo $_smarty_tpl->tpl_vars['edit_tpl']->value;?>
" data-tpl-id="<?php echo $_smarty_tpl->tpl_vars['template']->value->get_type_id();?>
" class="edit_tpl tooltip" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('edit_template');?>
" data-cms-description='<?php echo $_smarty_tpl->tpl_vars['tpl_tooltip']->value;?>
'><?php echo $_smarty_tpl->tpl_vars['template']->value->get_name();?>
</a></td><?php } else { ?><td><?php echo $_smarty_tpl->tpl_vars['template']->value->get_id();?>
</td><td><?php echo smarty_function_admin_icon(array('icon'=>'warning.gif','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('title_locked')),$_smarty_tpl);?>
</td><td><span class="tooltip" data-cms-description='<?php echo $_smarty_tpl->tpl_vars['tpl_tooltip']->value;?>
'><?php echo $_smarty_tpl->tpl_vars['template']->value->get_name();?>
</span></td><?php }?><td><?php $_smarty_tpl->_assignInScope('type_id', $_smarty_tpl->tpl_vars['template']->value->get_type_id());
ob_start();
$_smarty_tpl->_subTemplateRender('module_file_tpl:DesignManager;admin_defaultadmin_tpltype_tooltip.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
$_smarty_tpl->assign('tpltype_tooltip', ob_get_clean());
?>
<span class="tooltip" data-cms-description='<?php echo $_smarty_tpl->tpl_vars['tpltype_tooltip']->value;?>
'><?php echo $_smarty_tpl->tpl_vars['list_types']->value[$_smarty_tpl->tpl_vars['type_id']->value];?>
</span></td><td><?php if ($_smarty_tpl->tpl_vars['template']->value->has_content_file()) {
echo basename($_smarty_tpl->tpl_vars['template']->value->get_content_filename());
}?></td><td><?php $_smarty_tpl->_assignInScope('t1', $_smarty_tpl->tpl_vars['template']->value->get_designs());
if (count($_smarty_tpl->tpl_vars['t1']->value) == 1) {
$_smarty_tpl->_assignInScope('t1', $_smarty_tpl->tpl_vars['t1']->value[0]);
$_smarty_tpl->_assignInScope('hn', $_smarty_tpl->tpl_vars['design_names']->value[$_smarty_tpl->tpl_vars['t1']->value]);
if ($_smarty_tpl->tpl_vars['manage_designs']->value) {
echo smarty_cms_function_cms_action_url(array('action'=>'admin_edit_design','design'=>$_smarty_tpl->tpl_vars['t1']->value,'assign'=>'edit_design_url'),$_smarty_tpl);?>
<a href="<?php echo $_smarty_tpl->tpl_vars['edit_design_url']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('edit_design');?>
"><?php echo $_smarty_tpl->tpl_vars['hn']->value;?>
</a><?php } else {
echo $_smarty_tpl->tpl_vars['hn']->value;
}
} elseif (count($_smarty_tpl->tpl_vars['t1']->value) == 0) {?><span title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('help_template_no_designs');?>
"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_none');?>
</span><?php } else { ?><span title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('help_template_multiple_designs');?>
"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_multiple');?>
 (<?php echo count($_smarty_tpl->tpl_vars['t1']->value);?>
)</span><?php }?></td><td><?php $_smarty_tpl->_assignInScope('the_type', $_smarty_tpl->tpl_vars['list_all_types']->value[$_smarty_tpl->tpl_vars['type_id']->value]);
if ($_smarty_tpl->tpl_vars['the_type']->value->get_dflt_flag()) {
if ($_smarty_tpl->tpl_vars['template']->value->get_type_dflt()) {
echo smarty_function_admin_icon(array('icon'=>'true.gif','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_dflt_tpl')),$_smarty_tpl);
} else {
echo smarty_function_admin_icon(array('icon'=>'false.gif','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_notdflt_tpl')),$_smarty_tpl);
}
} else { ?><span title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_title_na');?>
"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_na');?>
</span><?php }?></td><?php if (!$_smarty_tpl->tpl_vars['lock_timeout']->value || !$_smarty_tpl->tpl_vars['template']->value->locked()) {?><td><a href="<?php echo $_smarty_tpl->tpl_vars['edit_tpl']->value;?>
" data-tpl-id="<?php echo $_smarty_tpl->tpl_vars['template']->value->get_id();?>
" class="edit_tpl" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('edit_template');?>
"><?php echo smarty_function_admin_icon(array('icon'=>'edit.gif','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_edit')),$_smarty_tpl);?>
</a></td><?php if ($_smarty_tpl->tpl_vars['has_add_right']->value) {?><td><a href="<?php echo $_smarty_tpl->tpl_vars['copy_tpl']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('copy_template');?>
"><?php echo smarty_function_admin_icon(array('icon'=>'copy.gif','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_copy_template')),$_smarty_tpl);?>
</a></td><?php }
} else { ?><td><?php $_smarty_tpl->_assignInScope('lock', $_smarty_tpl->tpl_vars['template']->value->get_lock());
if ($_smarty_tpl->tpl_vars['lock']->value['expires'] < time()) {?><a href="<?php echo $_smarty_tpl->tpl_vars['edit_tpl']->value;?>
" data-tpl-id="<?php echo $_smarty_tpl->tpl_vars['template']->value->get_id();?>
" accesskey="e" class="steal_tpl_lock"><?php echo smarty_function_admin_icon(array('icon'=>'permissions.gif','class'=>'edit_tpl steal_tpl_lock','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_steal_lock')),$_smarty_tpl);?>
</a><?php }?></td><?php if ($_smarty_tpl->tpl_vars['has_add_right']->value) {?><td></td><?php }
}?><td><?php if (!$_smarty_tpl->tpl_vars['template']->value->get_type_dflt() && !$_smarty_tpl->tpl_vars['template']->value->locked()) {
if ($_smarty_tpl->tpl_vars['template']->value->get_owner_id() == get_userid() || $_smarty_tpl->tpl_vars['manage_templates']->value) {?><a href="<?php echo $_smarty_tpl->tpl_vars['delete_tpl']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('delete_template');?>
"><?php echo smarty_function_admin_icon(array('icon'=>'delete.gif','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('delete_template')),$_smarty_tpl);?>
</a><?php }
}?></td><td><?php if (!$_smarty_tpl->tpl_vars['template']->value->locked() && ($_smarty_tpl->tpl_vars['template']->value->get_owner_id() == get_userid() || $_smarty_tpl->tpl_vars['manage_templates']->value)) {?><input type="checkbox" class="tpl_select" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
tpl_select[]" value="<?php echo $_smarty_tpl->tpl_vars['template']->value->get_id();?>
" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('title_tpl_bulk');?>
"/><?php }?></td></tr><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

    </tbody>
  </table>

  <div class="row">
    <div class="half options-menu"></div>
    <div class="half options-menu">
      <p class="pageinput" style="text-align: right;">
        <label for="tpl_bulk_action"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_with_selected');?>
:</label>&nbsp;
        <select name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
bulk_action" id="tpl_bulk_action" class="tpl_bulk_action" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('title_tpl_bulkaction');?>
">
          <option value="delete"><?php echo $_smarty_tpl->tpl_vars['mod']->value->lang('prompt_delete');?>
</option>
          <option value="export"><?php echo $_smarty_tpl->tpl_vars['mod']->value->lang('export');?>
</option>
          <option value="import"><?php echo $_smarty_tpl->tpl_vars['mod']->value->lang('import');?>
</option>
        </select>
        <input id="tpl_bulk_submit" class="tpl_bulk_action" type="submit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
submit_bulk" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('submit');?>
"/>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_bulk_templates','title'=>$_smarty_tpl->tpl_vars['mod']->value->lang('prompt_delete')),$_smarty_tpl);?>

      </p>
    </div>
    <div class="clearb"></div>
  </div>

<?php } else { ?>
  <?php echo smarty_function_page_warning(array('msg'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('warning_no_templates_available')),$_smarty_tpl);?>

<?php }?>

<?php echo smarty_function_form_end(array(),$_smarty_tpl);
}
}
