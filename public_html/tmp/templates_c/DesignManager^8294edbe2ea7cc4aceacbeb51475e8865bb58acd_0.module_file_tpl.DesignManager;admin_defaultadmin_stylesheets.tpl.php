<?php
/* Smarty version 3.1.31, created on 2018-07-23 11:55:36
  from "module_file_tpl:DesignManager;admin_defaultadmin_stylesheets.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b5574e093d869_11506288',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8294edbe2ea7cc4aceacbeb51475e8865bb58acd' => 
    array (
      0 => 'module_file_tpl:DesignManager;admin_defaultadmin_stylesheets.tpl',
      1 => 1517033802,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b5574e093d869_11506288 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_form_start')) require_once '/data/home/iic/public_html/lib/plugins/function.form_start.php';
if (!is_callable('smarty_function_html_options')) require_once '/data/home/iic/public_html/lib/smarty/plugins/function.html_options.php';
if (!is_callable('smarty_function_form_end')) require_once '/data/home/iic/public_html/lib/plugins/function.form_end.php';
echo '<script'; ?>
 type="text/javascript">
$(document).ready(function(){
    cms_busy();
    $('#stylesheet_area').autoRefresh({
      url: '<?php echo $_smarty_tpl->tpl_vars['ajax_stylesheets_url']->value;?>
',
      data: {
        filter: '<?php echo $_smarty_tpl->tpl_vars['jsoncssfilter']->value;?>
'
      }
    });

    $('#css_bulk_action,#css_bulk_submit').attr('disabled','disabled');
    $('#css_bulk_submit').button({ 'disabled' : true });
    $('#css_selall,.css_select').on('click',function(){
      // if there is one or more .css_select checked, we enabled the bulk actions
      var l = $('.css_select:checked').length;
      if( l == 0 ) {
        $('#css_bulk_action').attr('disabled','disabled');
        $('#css_bulk_submit').attr('disabled','disabled');
        $('#css_bulk_submit').button({ 'disabled' : true });
      } else {
        $('#css_bulk_action').removeAttr('disabled');
        $('#css_bulk_submit').removeAttr('disabled');
        $('#css_bulk_submit').button({ 'disabled' : false });
      }
    });

    $('a.steal_css_lock').on('click',function(e) {
      // we're gonna confirm stealing this lock.
      return confirm('<?php echo strtr($_smarty_tpl->tpl_vars['mod']->value->Lang('confirm_steal_lock'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
');
    });

    $('#stylesheet_area').on('click','#editcssfilter',function(){
      $('#filtercssdlg').dialog({
        width: 'auto',
        buttons: {
          '<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('submit');?>
': function () {
            $(this).dialog('close');
            $('#filtercssdlg_form').submit();
          },
          '<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('reset');?>
': function () {
            $(this).dialog('close');
	    $('#submit_filter_css').val('-1');
            $('#filtercssdlg_form').submit();
          },
          '<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('cancel');?>
': function () {
            $(this).dialog('close');
          },
        }
      });
    });
});
<?php echo '</script'; ?>
>

<div id="filtercssdlg" style="display: none;" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('css_filter');?>
">
  <?php echo smarty_function_form_start(array('id'=>'filtercssdlg_form'),$_smarty_tpl);?>

    <input type="hidden" id="submit_filter_css" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
submit_filter_css" value="1"/>
    <div class="c_full">
      <label for="filter_css_design" class="grid_3 text-right"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_design');?>
:</label>
      <select id="filter_css_design" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
filter_css_design" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('title_filter_design');?>
" class="grid_9">
          <option value=""><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('any');?>
</option>
	  <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['design_names']->value,'selected'=>$_smarty_tpl->tpl_vars['css_filter']->value['design']),$_smarty_tpl);?>

      </select>
    </div>
    <div class="c_full">
      <label for="filter_css_sortby" class="grid_3 text-right"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_sortby');?>
:</label>
      <select id="filter_css_sortby" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
filter_css_sortby" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('title_sortby');?>
" class="grid_9">
          <option value="name"<?php if ($_smarty_tpl->tpl_vars['css_filter']->value['sortby'] == 'name') {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('name');?>
</option>
          <option value="created"<?php if ($_smarty_tpl->tpl_vars['css_filter']->value['sortby'] == 'created') {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('created');?>
</option>
          <option value="modified"<?php if ($_smarty_tpl->tpl_vars['css_filter']->value['sortby'] == 'modified') {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('modified');?>
</option>
      </select>
    </div>
    <div class="c_full">
      <label for="filter_css_sortorder" class="grid_3"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_sortorder');?>
:</label>
      <select id="filter_css_sortorder" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
filter_css_sortorder" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('title_sortorder');?>
" class="grid_9">
        <option value="asc"<?php if ($_smarty_tpl->tpl_vars['css_filter']->value['sortorder'] == 'asc') {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('asc');?>
</option>
        <option value="desc"<?php if ($_smarty_tpl->tpl_vars['css_filter']->value['sortorder'] == 'desc') {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('desc');?>
</option>
      </select>
    </div>
    <div class="c_full">
      <label for="filter_limit_css" class="grid_3"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_limit');?>
:</label>
      <select id="filter_limit_css" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
filter_limit_css" class="grid_9">
          <option value="10"<?php if ((isset($_smarty_tpl->tpl_vars['css_filter']->value['limit']) && ($_smarty_tpl->tpl_vars['css_filter']->value['limit'] == 10))) {?> selected="selected"<?php }?>>10</option>
	  <option value="25"<?php if ((isset($_smarty_tpl->tpl_vars['css_filter']->value['limit']) && ($_smarty_tpl->tpl_vars['css_filter']->value['limit'] == 25))) {?> selected="selected"<?php }?>>25</option>
	  <option value="50"<?php if ((isset($_smarty_tpl->tpl_vars['css_filter']->value['limit']) && ($_smarty_tpl->tpl_vars['css_filter']->value['limit'] == 50))) {?> selected="selected"<?php }?>>50</option>
	  <option value="100"<?php if ((isset($_smarty_tpl->tpl_vars['css_filter']->value['limit']) && ($_smarty_tpl->tpl_vars['css_filter']->value['limit'] == 100))) {?> selected="selected"<?php }?>>100</option>
      </select>
    </div>
  <?php echo smarty_function_form_end(array(),$_smarty_tpl);?>

</div>

<div id="stylesheet_area"></div><?php }
}
