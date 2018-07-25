<?php
/* Smarty version 3.1.31, created on 2018-07-23 11:55:36
  from "module_file_tpl:DesignManager;admin_defaultadmin_categories.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b5574e0bfd9e9_31751955',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a7d0738c4f9103991be1c44c847eeb90524ad6a7' => 
    array (
      0 => 'module_file_tpl:DesignManager;admin_defaultadmin_categories.tpl',
      1 => 1517033802,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b5574e0bfd9e9_31751955 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_cms_function_cms_action_url')) require_once '/data/home/iic/public_html/lib/plugins/function.cms_action_url.php';
if (!is_callable('smarty_function_admin_icon')) require_once '/data/home/iic/public_html/admin/plugins/function.admin_icon.php';
if (!is_callable('smarty_function_cycle')) require_once '/data/home/iic/public_html/lib/smarty/plugins/function.cycle.php';
if (isset($_smarty_tpl->tpl_vars['list_categories']->value)) {
echo '<script'; ?>
 type="text/javascript">
$(document).ready(function () {
    $('#categorylist tbody').cmsms_sortable_table({
        actionurl: '<?php echo smarty_cms_function_cms_action_url(array('action'=>'ajax_order_cats','forjs'=>1),$_smarty_tpl);?>
&showtemplate=false',
        callback: function(data) {

            var $response = $('<aside/>').addClass('message');

            if (data.status === 'success') {

                $response.addClass('pagemcontainer')
                    .append($('<span>').text('Close').addClass('close-warning'))
                    .append($('<p/>').text(data.message));
            } else if (data.status === 'error') {

                $response.addClass('pageerrorcontainer')
                    .append($('<span>').text('Close').addClass('close-warning'))
                    .append($('<p/>').text(data.message));
            }

            $('body').append($response).slideDown(1000, function() {
                window.setTimeout(function() {
                    $response.slideUp();
                    $response.remove();
                }, 10000);
            });
    	}
    });
    $('#categorylist a.del_cat').click(function(ev){
       var self = $(this);
       ev.preventDefault();
       cms_confirm('<?php echo strtr($_smarty_tpl->tpl_vars['mod']->value->Lang('confirm_delete_category'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
').done(function(){
          window.location = self.attr('href');
       });
    });
});
<?php echo '</script'; ?>
>

<?php if (count($_smarty_tpl->tpl_vars['list_categories']->value) > 1) {?>
  <div class="pagewarning" style="display: block;"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('warning_category_dragdrop');?>
</div>
<?php }?>

<?php }?>

<div class="information"><?php echo $_smarty_tpl->tpl_vars['mod']->value->lang('info_about_categories');?>
</div>
<div class="pageoptions">
	<?php echo smarty_cms_function_cms_action_url(array('action'=>'admin_edit_category','assign'=>'url'),$_smarty_tpl);?>

	<a id="addcategory" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('create_category');?>
"><?php echo smarty_function_admin_icon(array('icon'=>'newobject.gif'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('create_category');?>
</a>
</div>

<?php if (isset($_smarty_tpl->tpl_vars['list_categories']->value)) {?>
<table id="categorylist" class="pagetable">
	<thead>
		<tr>
			<th width="5%" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('title_cat_id');?>
"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_id');?>
</th>
			<th title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('title_cat_name');?>
"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_name');?>
</th>
			<th class="pageicon"></th>
			<th class="pageicon"></th>
		</tr>
	</thead>
	<tbody>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_categories']->value, 'category');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
?>
		<?php echo smarty_function_cycle(array('values'=>"row1,row2",'assign'=>'rowclass'),$_smarty_tpl);?>

		<?php echo smarty_cms_function_cms_action_url(array('action'=>'admin_edit_category','cat'=>$_smarty_tpl->tpl_vars['category']->value->get_id(),'assign'=>'edit_url'),$_smarty_tpl);?>

		<tr class="<?php echo $_smarty_tpl->tpl_vars['rowclass']->value;?>
 sortable-table" id="cat_<?php echo $_smarty_tpl->tpl_vars['category']->value->get_id();?>
">
			<td><a href="<?php echo $_smarty_tpl->tpl_vars['edit_url']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_edit');?>
"><?php echo $_smarty_tpl->tpl_vars['category']->value->get_id();?>
</a></td>
			<td><a href="<?php echo $_smarty_tpl->tpl_vars['edit_url']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_edit');?>
"><?php echo $_smarty_tpl->tpl_vars['category']->value->get_name();?>
</a></td>
			<td><a href="<?php echo $_smarty_tpl->tpl_vars['edit_url']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_edit');?>
"><?php echo smarty_function_admin_icon(array('icon'=>'edit.gif'),$_smarty_tpl);?>
</a></td>
			<td><?php echo smarty_cms_function_cms_action_url(array('action'=>'admin_delete_category','cat'=>$_smarty_tpl->tpl_vars['category']->value->get_id(),'assign'=>'delete_url'),$_smarty_tpl);?>
<a href="<?php echo $_smarty_tpl->tpl_vars['delete_url']->value;?>
" class="del_cat" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_delete');?>
"><?php echo smarty_function_admin_icon(array('icon'=>'delete.gif'),$_smarty_tpl);?>
</a></td>
		</tr>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

	</tbody>
</table>
<?php }
}
}
