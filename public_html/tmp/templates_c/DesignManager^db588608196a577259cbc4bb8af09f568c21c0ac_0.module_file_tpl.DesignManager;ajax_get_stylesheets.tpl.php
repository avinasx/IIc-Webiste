<?php
/* Smarty version 3.1.31, created on 2018-07-23 11:55:37
  from "module_file_tpl:DesignManager;ajax_get_stylesheets.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b5574e1a09846_81255758',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'db588608196a577259cbc4bb8af09f568c21c0ac' => 
    array (
      0 => 'module_file_tpl:DesignManager;ajax_get_stylesheets.tpl',
      1 => 1517033802,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
    'module_file_tpl:DesignManager;admin_defaultadmin_csstooltip.tpl' => 1,
  ),
),false)) {
function content_5b5574e1a09846_81255758 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_cms_function_cms_action_url')) require_once '/data/home/iic/public_html/lib/plugins/function.cms_action_url.php';
if (!is_callable('smarty_function_admin_icon')) require_once '/data/home/iic/public_html/admin/plugins/function.admin_icon.php';
if (!is_callable('smarty_function_form_start')) require_once '/data/home/iic/public_html/lib/plugins/function.form_start.php';
if (!is_callable('smarty_function_cms_pageoptions')) require_once '/data/home/iic/public_html/lib/plugins/function.cms_pageoptions.php';
if (!is_callable('smarty_function_form_end')) require_once '/data/home/iic/public_html/lib/plugins/function.form_end.php';
if (!is_callable('smarty_function_cycle')) require_once '/data/home/iic/public_html/lib/smarty/plugins/function.cycle.php';
if (!is_callable('smarty_modifier_date_format')) require_once '/data/home/iic/public_html/lib/smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_cms_help')) require_once '/data/home/iic/public_html/admin/plugins/function.cms_help.php';
echo '<script'; ?>
>
$('#css_selall').cmsms_checkall();
<?php echo '</script'; ?>
>

<div class="row">
  <div class="pageoptions options-menu half">
      <a id="addcss" accesskey="a" href="<?php echo smarty_cms_function_cms_action_url(array('action'=>'admin_edit_css'),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('create_stylesheet');?>
"><?php echo smarty_function_admin_icon(array('icon'=>'newobject.gif'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('create_stylesheet');?>
</a>&nbsp;&nbsp;
      <a id="editcssfilter" accesskey="f" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_editfilter');?>
"><?php echo smarty_function_admin_icon(array('icon'=>'view.gif','alt'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_editfilter')),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('filter');?>
</a>&nbsp;&nbsp;
      <?php if ($_smarty_tpl->tpl_vars['have_css_locks']->value) {?>
         <a id="cssclearlocks" accesskey="l" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('title_clearlocks');?>
" href="<?php echo smarty_cms_function_cms_action_url(array('action'=>'admin_clearlocks','type'=>'stylesheet'),$_smarty_tpl);?>
"><?php echo smarty_function_admin_icon(array('icon'=>'run.gif','alt'=>''),$_smarty_tpl);?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_clearlocks');?>
</a>&nbsp;&nbsp;
      <?php }?>
      <?php if ($_smarty_tpl->tpl_vars['css_filter']->value != '' && $_smarty_tpl->tpl_vars['css_filter']->value['design'] != '') {?>
      <span style="color: green;" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('title_filterapplied');?>
"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('filterapplied');?>
</span>
      <?php }?>
    </ul>
  </div>

  <?php if (isset($_smarty_tpl->tpl_vars['css_nav']->value) && $_smarty_tpl->tpl_vars['css_nav']->value['numpages'] > 1) {?>
    <div class="pageoptions" style="text-align: right;">
      <?php echo smarty_function_form_start(array('action'=>'defaultadmin'),$_smarty_tpl);?>

        <label for="css_page"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_page');?>
:</label>&nbsp;
        <select id="css_page" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
css_page">
        <?php echo smarty_function_cms_pageoptions(array('numpages'=>$_smarty_tpl->tpl_vars['css_nav']->value['numpages'],'curpage'=>$_smarty_tpl->tpl_vars['css_nav']->value['curpage']),$_smarty_tpl);?>

        </select>
        &nbsp;<input type="submit" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('go');?>
"/>
      <?php echo smarty_function_form_end(array(),$_smarty_tpl);?>

    </div>
  <?php }?>
</div>

<?php if (isset($_smarty_tpl->tpl_vars['stylesheets']->value)) {?>
  <?php echo smarty_function_form_start(array('action'=>'admin_bulk_css'),$_smarty_tpl);?>
<table class="pagetable"><thead><tr><th title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('title_css_id');?>
"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_id');?>
</th><th class="pageicon"></th><th title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('title_css_name');?>
"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_name');?>
</th><th title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('title_css_designs');?>
"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_design');?>
</th><th title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('title_css_filename');?>
"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_filename');?>
</th><th title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('title_css_modified');?>
"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_modified');?>
</th><th class="pageicon"></th><th class="pageicon"></th><th class="pageicon"></th><th class="pageicon"><label for="css_selall" style="display: none;"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('title_css_selectall');?>
</label><input type="checkbox" value="1" id="css_selall" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('title_css_selectall');?>
"/></th></tr></thead><tbody><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['stylesheets']->value, 'css');
$_smarty_tpl->tpl_vars['css']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['css']->value) {
$_smarty_tpl->tpl_vars['css']->index++;
$__foreach_css_0_saved = $_smarty_tpl->tpl_vars['css'];
echo smarty_function_cycle(array('values'=>"row1,row2",'assign'=>'rowclass'),$_smarty_tpl);
ob_start();
$_smarty_tpl->_subTemplateRender('module_file_tpl:DesignManager;admin_defaultadmin_csstooltip.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
$_smarty_tpl->assign('css_tooltip', ob_get_clean());
echo smarty_cms_function_cms_action_url(array('action'=>'admin_edit_css','css'=>$_smarty_tpl->tpl_vars['css']->value->get_id(),'assign'=>'edit_css'),$_smarty_tpl);
echo smarty_cms_function_cms_action_url(array('action'=>'admin_copy_css','css'=>$_smarty_tpl->tpl_vars['css']->value->get_id(),'assign'=>'copy_css'),$_smarty_tpl);
echo smarty_cms_function_cms_action_url(array('action'=>'admin_delete_css','css'=>$_smarty_tpl->tpl_vars['css']->value->get_id(),'assign'=>'delete_css'),$_smarty_tpl);?>
<tr class="<?php echo $_smarty_tpl->tpl_vars['rowclass']->value;?>
"><?php if (!$_smarty_tpl->tpl_vars['css']->value->locked()) {?><td><a href="<?php echo $_smarty_tpl->tpl_vars['edit_css']->value;?>
" data-css-id="<?php echo $_smarty_tpl->tpl_vars['css']->value->get_id();?>
" class="edit_css tooltip" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('edit_stylesheet');?>
" data-cms-description='<?php echo $_smarty_tpl->tpl_vars['css_tooltip']->value;?>
'><?php echo $_smarty_tpl->tpl_vars['css']->value->get_id();?>
</a></td><td></td><td><a href="<?php echo $_smarty_tpl->tpl_vars['edit_css']->value;?>
" data-css-id="<?php echo $_smarty_tpl->tpl_vars['css']->value->get_id();?>
" class="edit_css tooltip" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('edit_stylesheet');?>
" data-cms-description='<?php echo $_smarty_tpl->tpl_vars['css_tooltip']->value;?>
'><?php echo $_smarty_tpl->tpl_vars['css']->value->get_name();?>
</a></td><?php } else { ?><td><?php echo $_smarty_tpl->tpl_vars['css']->value->get_id();?>
</td><td><?php echo smarty_function_admin_icon(array('icon'=>'warning.gif','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('title_locked')),$_smarty_tpl);?>
</td><td><span class="tooltip" data-cms-description='<?php echo $_smarty_tpl->tpl_vars['css_tooltip']->value;?>
'><?php echo $_smarty_tpl->tpl_vars['css']->value->get_name();?>
</span></td><?php }?><td><?php $_smarty_tpl->_assignInScope('t1', $_smarty_tpl->tpl_vars['css']->value->get_designs());
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
} elseif (count($_smarty_tpl->tpl_vars['t1']->value) == 0) {?><span title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('help_stylesheet_no_designs');?>
"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_none');?>
</span><?php } else {
$_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', 'tooltip_designs', null);?><u><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_attached_designs');?>
</u>:<br /><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['t1']->value, 'dsn_id');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['dsn_id']->value) {
echo $_smarty_tpl->tpl_vars['design_names']->value[$_smarty_tpl->tpl_vars['dsn_id']->value];?>
<br /><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
	    <a class="tooltip text-red" data-cms-description='<?php echo htmlentities($_smarty_tpl->tpl_vars['tooltip_designs']->value);?>
' title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('help_stylesheet_multiple_designs');?>
"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_multiple');?>
 (<?php echo count($_smarty_tpl->tpl_vars['t1']->value);?>
)
	  <?php }?>
	</td>

	<td>
	   <?php if ($_smarty_tpl->tpl_vars['css']->value->has_content_file()) {?>
	     <?php echo basename($_smarty_tpl->tpl_vars['css']->value->get_content_filename());?>

	   <?php }?>
	</td>

	<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['css']->value->get_modified(),'%x %X');?>
</td>

	<?php if (!$_smarty_tpl->tpl_vars['css']->value->locked()) {?>
          <td><a href="<?php echo $_smarty_tpl->tpl_vars['edit_css']->value;?>
" data-css-id="<?php echo $_smarty_tpl->tpl_vars['css']->value->get_id();?>
" class="edit_css" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('edit_stylesheet');?>
"><?php echo smarty_function_admin_icon(array('icon'=>'edit.gif','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('edit_stylesheet')),$_smarty_tpl);?>
</a></td>
	  <td><a href="<?php echo $_smarty_tpl->tpl_vars['copy_css']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('copy_stylesheet');?>
"><?php echo smarty_function_admin_icon(array('icon'=>'copy.gif','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('copy_stylesheet')),$_smarty_tpl);?>
</a></td>
  	  <td><a href="<?php echo $_smarty_tpl->tpl_vars['delete_css']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('delete_stylesheet');?>
"><?php echo smarty_function_admin_icon(array('icon'=>'delete.gif','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('delete_stylesheet')),$_smarty_tpl);?>
</a></td>
  	  <td>
	    <label for="css_select<?php echo $_smarty_tpl->tpl_vars['css']->index;?>
" style="display: none;"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_select');?>
:</label>
	    <input id="<?php echo $_smarty_tpl->tpl_vars['css']->index;?>
" type="checkbox" class="css_select" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
css_select[]" value="<?php echo $_smarty_tpl->tpl_vars['css']->value->get_id();?>
"/>
	  </td>
        <?php } else { ?>
          <td>
            <?php $_smarty_tpl->_assignInScope('lock', $_smarty_tpl->tpl_vars['css']->value->get_lock());
?>
            <?php if ($_smarty_tpl->tpl_vars['lock']->value['expires'] < time()) {?>
	      <a href="<?php echo $_smarty_tpl->tpl_vars['edit_css']->value;?>
" data-css-id="<?php echo $_smarty_tpl->tpl_vars['css']->value->get_id();?>
" accesskey="e" class="steal_css_lock"><?php echo smarty_function_admin_icon(array('icon'=>'permissions.gif','class'=>'edit_css steal_css_lock','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_steal_lock')),$_smarty_tpl);?>
</a>
            <?php }?>
          </td>
          <td></td>
          <td></td>
          <td></td>
        <?php }?>
        </tr>
      <?php
$_smarty_tpl->tpl_vars['css'] = $__foreach_css_0_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

    </tbody>
  </table>
  

  <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', 'stylesheet_dropdown_options', null);?>
    <div class="pageoptions" id="bulkoptions" style="text-align: right;">
      <label for="css_bulk_action"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_with_selected');?>
:</label>&nbsp;
      <select name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
css_bulk_action" id="css_bulk_action" class="cssx_bulk_action">
        <option value="delete" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('title_delete');?>
"><?php echo $_smarty_tpl->tpl_vars['mod']->value->lang('prompt_delete');?>
</option>
        <option value="export"><?php echo $_smarty_tpl->tpl_vars['mod']->value->lang('export');?>
</option>
        <option value="import"><?php echo $_smarty_tpl->tpl_vars['mod']->value->lang('import');?>
</option>
      </select>
      <input id="css_bulk_submit" class="css_bulk_action" type="submit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
submit_bulk_css" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('submit');?>
"/>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_css_bulk','title'=>$_smarty_tpl->tpl_vars['mod']->value->lang('prompt_delete')),$_smarty_tpl);?>

    </div>
  <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>

  <div class="clearb"></div>
  <div class="row">
    <div class="half"></div>
    <?php if (isset($_smarty_tpl->tpl_vars['stylesheet_dropdown_options']->value)) {
echo $_smarty_tpl->tpl_vars['stylesheet_dropdown_options']->value;
}?>
  </div>
  <?php echo smarty_function_form_end(array(),$_smarty_tpl);?>

<?php } else { ?>
  <div class="warning"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('warning_no_stylesheets');?>
</div>
<?php }
}
}
