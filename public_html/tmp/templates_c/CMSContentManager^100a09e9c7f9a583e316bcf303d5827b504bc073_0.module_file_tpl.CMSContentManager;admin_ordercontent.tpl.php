<?php
/* Smarty version 3.1.31, created on 2018-07-20 06:39:29
  from "module_file_tpl:CMSContentManager;admin_ordercontent.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b513649a1bb29_66436028',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '100a09e9c7f9a583e316bcf303d5827b504bc073' => 
    array (
      0 => 'module_file_tpl:CMSContentManager;admin_ordercontent.tpl',
      1 => 1517033802,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b513649a1bb29_66436028 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'display_tree' => 
  array (
    'compiled_filepath' => '/data/home/iic/public_html/tmp/templates_c/CMSContentManager^100a09e9c7f9a583e316bcf303d5827b504bc073_0.module_file_tpl.CMSContentManager;admin_ordercontent.tpl.php',
    'uid' => '100a09e9c7f9a583e316bcf303d5827b504bc073',
    'call_name' => 'smarty_template_function_display_tree_2552625985b5136498e5851_59645315',
  ),
));
if (!is_callable('smarty_modifier_cms_escape')) require_once '/data/home/iic/public_html/lib/plugins/modifier.cms_escape.php';
if (!is_callable('smarty_function_form_start')) require_once '/data/home/iic/public_html/lib/plugins/function.form_start.php';
if (!is_callable('smarty_function_form_end')) require_once '/data/home/iic/public_html/lib/plugins/function.form_end.php';
echo '<script'; ?>
 type="text/javascript">
    function parseTree(ul) {
        var tags = [];
        ul.children('li').each(function() {
            var subtree = $(this).children('ul');
            tags.push($(this).attr('id'));
            if (subtree.size() > 0) {
                tags.push(parseTree(subtree));
            }
        });
        return tags;
    }


    $(document).ready(function() {
        $(document).on('click', '#btn_submit', function(ev) {
	    ev.preventDefault();
	    var form = $(this).closest('form');
            cms_confirm('<?php echo strtr($_smarty_tpl->tpl_vars['mod']->value->Lang('confirm_reorder'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
').done(function(){
                var tree = $.toJSON(parseTree($('#masterlist')));
                var ajax_res = false;
                $('#orderlist').val(tree);
		form.submit();
            });
        });

        $('ul.sortable').nestedSortable({
            disableNesting : 'no-nest',
            forcePlaceholderSize : true,
            handle : 'div',
            items : 'li',
            opacity : .6,
            placeholder : 'placeholder',
            tabSize : 20,
            tolerance : 'pointer',
            listType : 'ul',
            toleranceElement : '> div'
        });
    });
<?php echo '</script'; ?>
>



<h3><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_ordercontent');?>
</h3>
<?php echo smarty_function_form_start(array('action'=>'admin_ordercontent','id'=>"theform"),$_smarty_tpl);?>

<input type="hidden" id="orderlist" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
orderlist" value=""/>
<div class="information">
	<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('info_ordercontent');?>

</div>
<div class="pageoverflow">
	<p class="pagetext"></p>
	<p class="pageinput">
		<input id="btn_submit" type="submit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
submit" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('submit');?>
"/>
		<input type="submit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
cancel" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('cancel');?>
"/>
		<input id="btn_revert" type="submit" name="revert" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('revert');?>
"/>
	</p>
</div>
<div class="pageoverflow">
	<?php $_smarty_tpl->_assignInScope('list', $_smarty_tpl->tpl_vars['tree']->value->getChildren(false,true));
?>
	<ul id="masterlist" class="sortableList sortable">
		<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'display_tree', array('list'=>$_smarty_tpl->tpl_vars['list']->value), true);?>

	</ul>
</div>
<?php echo smarty_function_form_end(array(),$_smarty_tpl);
}
/* smarty_template_function_display_tree_2552625985b5136498e5851_59645315 */
if (!function_exists('smarty_template_function_display_tree_2552625985b5136498e5851_59645315')) {
function smarty_template_function_display_tree_2552625985b5136498e5851_59645315($_smarty_tpl,$params) {
$params = array_merge(array('depth'=>0), $params);
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}?>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'node');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['node']->value) {
?>
		<?php $_smarty_tpl->_assignInScope('obj', $_smarty_tpl->tpl_vars['node']->value->getContent(false,true,false));
?>
		<li id="page_<?php echo $_smarty_tpl->tpl_vars['obj']->value->Id();?>
" <?php if (!$_smarty_tpl->tpl_vars['obj']->value->WantsChildren()) {?>class="no-nest"<?php }?>>
			<div class="label" <?php if (!$_smarty_tpl->tpl_vars['obj']->value->Active()) {?>style="color: red;"<?php }?>>
				<span>&nbsp;</span><?php echo $_smarty_tpl->tpl_vars['obj']->value->Hierarchy();?>
:&nbsp;<?php echo smarty_modifier_cms_escape($_smarty_tpl->tpl_vars['obj']->value->Name());
if (!$_smarty_tpl->tpl_vars['obj']->value->Active()) {?>&nbsp;(<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_inactive');?>
)<?php }?> <em>(<?php echo smarty_modifier_cms_escape($_smarty_tpl->tpl_vars['obj']->value->MenuText());?>
)</em>
			</div>
			<?php if ($_smarty_tpl->tpl_vars['node']->value->has_children()) {?>
			<ul>
				<?php $_smarty_tpl->_assignInScope('list', $_smarty_tpl->tpl_vars['node']->value->getChildren(false,true));
?>
				<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'display_tree', array('list'=>$_smarty_tpl->tpl_vars['list']->value,'depth'=>$_smarty_tpl->tpl_vars['depth']->value+1), true);?>

			</ul>
			<?php }?>
		</li>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

<?php
}}
/*/ smarty_template_function_display_tree_2552625985b5136498e5851_59645315 */
}
