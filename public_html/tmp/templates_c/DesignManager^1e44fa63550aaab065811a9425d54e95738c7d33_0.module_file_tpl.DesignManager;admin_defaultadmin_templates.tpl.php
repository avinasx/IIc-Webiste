<?php
/* Smarty version 3.1.31, created on 2018-07-23 11:55:36
  from "module_file_tpl:DesignManager;admin_defaultadmin_templates.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b5574e0868759_17596390',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1e44fa63550aaab065811a9425d54e95738c7d33' => 
    array (
      0 => 'module_file_tpl:DesignManager;admin_defaultadmin_templates.tpl',
      1 => 1517033802,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b5574e0868759_17596390 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_form_start')) require_once '/data/home/iic/public_html/lib/plugins/function.form_start.php';
if (!is_callable('smarty_function_html_options')) require_once '/data/home/iic/public_html/lib/smarty/plugins/function.html_options.php';
if (!is_callable('smarty_function_form_end')) require_once '/data/home/iic/public_html/lib/plugins/function.form_end.php';
echo '<script'; ?>
 type="text/javascript">
$(document).ready(function(){
    // load the templates area.
    cms_busy();
    $('#template_area').autoRefresh({
      url: '<?php echo $_smarty_tpl->tpl_vars['ajax_templates_url']->value;?>
',
      data: {
         filter: '<?php echo $_smarty_tpl->tpl_vars['jsonfilter']->value;?>
'
      }
    });

    $('#tpl_bulk_action,#tpl_bulk_submit').attr('disabled','disabled');
    $('#tpl_bulk_submit').button({ 'disabled' : true });
    $('#tpl_selall,.tpl_select').on('click',function(){
      var l = $('.tpl_select:checked').length;
      if( l == 0 ) {
        $('#tpl_bulk_action').attr('disabled','disabled');
        $('#tpl_bulk_submit').attr('disabled','disabled');
        $('#tpl_bulk_submit').button({ 'disabled' : true });
      } else {
        $('#tpl_bulk_action').removeAttr('disabled');
        $('#tpl_bulk_submit').removeAttr('disabled');
        $('#tpl_bulk_submit').button({ 'disabled' : false });
      }
    });

    $(document).on('click','a.steal_tpl_lock',function(e) {
      // we're gonna confirm stealing this lock.
      return confirm('<?php echo strtr($_smarty_tpl->tpl_vars['mod']->value->Lang('confirm_steal_lock'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
');
    });

    $(document).on('click','a.sedit_tpl',function(e) {
      if( $(this).hasClass('steal_tpl_lock') ) return true;

      // do a double check to see if this page is locked or not.
      var tpl_id = $(this).attr('data-tpl-id');
      var url = '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
/ajax_lock.php?showtemplate=false';
      var opts = { opt: 'check', type: 'template', oid: tpl_id };
      opts[cms_data.secure_param_name] = cms_data.user_key;
      $.ajax({
        url: url,
        data: opts,
      }).done(function(data){
        if( data.status == 'success' ) {
          if( data.locked ) {
            // gotta display a message.
	    ev.preventDefault();
	    cms_alert('<?php echo strtr($_smarty_tpl->tpl_vars['mod']->value->Lang('error_contentlocked'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
');
          }
        }
      });
    });

    $(document).on('click','#tpl_bulk_submit',function() {
        var n = $('input:checkbox:checked.tpl_select').length
            if( n == 0 ) {
                cms_alert('<?php echo strtr($_smarty_tpl->tpl_vars['mod']->value->Lang('error_nothingselected'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
');
                return false;
            }
        });

    $('#template_area').on('click', '#edittplfilter', function () {
      $('#filterdialog').dialog({
        width: 'auto',
        buttons: {
          '<?php echo strtr($_smarty_tpl->tpl_vars['mod']->value->Lang('submit'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
': function () {
            $(this).dialog('close');
            $('#filterdialog_form').submit();
          },
          '<?php echo strtr($_smarty_tpl->tpl_vars['mod']->value->Lang('reset'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
': function () {
            $(this).dialog('close');
	    $('#submit_filter_tpl').val('-1');
            $('#filterdialog_form').submit();
          },
          '<?php echo strtr($_smarty_tpl->tpl_vars['mod']->value->Lang('cancel'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
': function () {
            $(this).dialog('close');
          },
        }
      });
    });
    $(document).on('click','#addtemplate', function () {
      $('#addtemplatedialog').dialog({
        width: 'auto',
        buttons: {
          '<?php echo strtr($_smarty_tpl->tpl_vars['mod']->value->Lang('submit'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
': function () {
            $(this).dialog('close');
            $('#addtemplate_form').submit();
          },
          '<?php echo strtr($_smarty_tpl->tpl_vars['mod']->value->Lang('cancel'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
': function () {
            $(this).dialog('close');
          },
        }
      });
    });
});
<?php echo '</script'; ?>
>

<div id="filterdialog" style="display: none;" title="<?php echo strtr($_smarty_tpl->tpl_vars['mod']->value->Lang('tpl_filter'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
">
  <?php echo smarty_function_form_start(array('action'=>'defaultadmin','id'=>'filterdialog_form','__activetab'=>'templates'),$_smarty_tpl);?>

    <input type="hidden" id="submit_filter_tpl" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
submit_filter_tpl" value="1"/>
    <div class="c_full">
      <label for="filter_tpl" class="grid_3 text-right"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_options');?>
:</label>
      <select id="filter_tpl" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
filter_tpl" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('title_filter');?>
" class="grid_9">
  	  <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['filter_tpl_options']->value,'selected'=>$_smarty_tpl->tpl_vars['tpl_filter']->value['tpl']),$_smarty_tpl);?>

      </select>
    </div>
    <div class="c_full">
      <label for="filter_sortby" class="grid_3 text-right"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_sortby');?>
:</label>
      <select id="filter_sortby" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
filter_sortby" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('title_sortby');?>
" class="grid_9">
          <option value="name"<?php if ($_smarty_tpl->tpl_vars['tpl_filter']->value['sortby'] == 'name') {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('name');?>
</option>
          <option value="type"<?php if ($_smarty_tpl->tpl_vars['tpl_filter']->value['sortby'] == 'type') {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('type');?>
</option>
          <option value="created"<?php if ($_smarty_tpl->tpl_vars['tpl_filter']->value['sortby'] == 'created') {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('created');?>
</option>
          <option value="modified"<?php if ($_smarty_tpl->tpl_vars['tpl_filter']->value['sortby'] == 'modified') {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('modified');?>
</option>
      </select>
    </div>
    <div class="c_full">
      <label for="filter_sortorder" class="grid_3 text-right"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_sortorder');?>
:</label>
      <select id="filter_sortorder" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
filter_sortorder" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('title_sortorder');?>
" class="grid_9">
          <option value="asc"<?php if ($_smarty_tpl->tpl_vars['tpl_filter']->value['sortorder'] == 'asc') {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('asc');?>
</option>
          <option value="desc"<?php if ($_smarty_tpl->tpl_vars['tpl_filter']->value['sortorder'] == 'desc') {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('desc');?>
</option>
      </select>
    </div>
    <div class="c_full">
      <label for="filter_limit" class="grid_3 text-right"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_limit');?>
:</label>
      <select id="filter_limit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
filter_limit_tpl" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('title_filterlimit');?>
" class="grid_9">
	  <option value="10"<?php if ($_smarty_tpl->tpl_vars['tpl_filter']->value['limit'] == 10) {?> selected="selected"<?php }?>>10</option>
	  <option value="25"<?php if ($_smarty_tpl->tpl_vars['tpl_filter']->value['limit'] == 25) {?> selected="selected"<?php }?>>25</option>
	  <option value="50"<?php if ($_smarty_tpl->tpl_vars['tpl_filter']->value['limit'] == 50) {?> selected="selected"<?php }?>>50</option>
	  <option value="100"<?php if ($_smarty_tpl->tpl_vars['tpl_filter']->value['limit'] == 100) {?> selected="selected"<?php }?>>100</option>
      </select>
    </div>
  <?php echo smarty_function_form_end(array(),$_smarty_tpl);?>

</div>

<?php if ($_smarty_tpl->tpl_vars['has_add_right']->value) {?>
  <div id="addtemplatedialog" style="display: none;" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('create_template');?>
">
    <?php echo smarty_function_form_start(array('id'=>"addtemplate_form"),$_smarty_tpl);?>

      <div class="pageoverflow">
        <input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
submit_create" value="1"/>
        <p class="pagetext"><label for="tpl_import_type"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('tpl_type');?>
:</label></p>
          <select name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
import_type" id="tpl_import_type" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('title_tpl_import_type');?>
">
	    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['list_types']->value),$_smarty_tpl);?>

          </select>
       <p class="pageinput"></p>
      </div>
    <?php echo smarty_function_form_end(array(),$_smarty_tpl);?>

  </div>
<?php }?>

<div id="template_area"></div><?php }
}
