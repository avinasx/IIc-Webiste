<?php
/* Smarty version 3.1.31, created on 2018-07-23 11:39:44
  from "module_file_tpl:EventsListing;listevents.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b557128139377_80167522',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd9b4ac3eec91cb6b84b74a21d99eda563d3ace65' => 
    array (
      0 => 'module_file_tpl:EventsListing;listevents.tpl',
      1 => 1517033802,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b557128139377_80167522 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_cycle')) require_once '/data/home/iic/public_html/lib/smarty/plugins/function.cycle.php';
?>
<div class="pageoverflow">
	<table cellspacing="0" class="pagetable">
		<thead>
			<tr>
				<th class="pageicon"><?php echo $_smarty_tpl->tpl_vars['id']->value;?>
</th>
				<th class="pageicon"><?php echo $_smarty_tpl->tpl_vars['active']->value;?>
</th>
				<th><?php echo $_smarty_tpl->tpl_vars['header_name']->value;?>
</th>
				<th><?php echo $_smarty_tpl->tpl_vars['header_start']->value;?>
</th>
				<th><?php echo $_smarty_tpl->tpl_vars['header_end']->value;?>
</th>
				<th class="pageicon">&nbsp;</th>
				<th class="pageicon">&nbsp;</th>
			</tr>
		</thead>
		<tbody>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['items']->value, 'entry');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['entry']->value) {
?>
            <?php echo smarty_function_cycle(array('values'=>"row1,row2",'assign'=>'rowclass'),$_smarty_tpl);?>

			<tr class="<?php echo $_smarty_tpl->tpl_vars['entry']->value->rowclass;?>
" onmouseover="this.className='<?php echo $_smarty_tpl->tpl_vars['entry']->value->rowclass;?>
hover';" onmouseout="this.className='<?php echo $_smarty_tpl->tpl_vars['entry']->value->rowclass;?>
';">
				<td><?php echo $_smarty_tpl->tpl_vars['entry']->value->id;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['entry']->value->active;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['entry']->value->title;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['entry']->value->start;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['entry']->value->end;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['entry']->value->editlink;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['entry']->value->deletelink;?>
</td>
			</tr>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

		</tbody>
	</table>
</div>
<div class="pageoverflow">
    <p class="pageoptions"><?php echo $_smarty_tpl->tpl_vars['addlink']->value;?>
</p>
</div>
<?php }
}
