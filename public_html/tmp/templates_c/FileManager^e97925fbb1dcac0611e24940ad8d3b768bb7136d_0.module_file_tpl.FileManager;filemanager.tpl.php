<?php
/* Smarty version 3.1.31, created on 2018-07-20 07:04:40
  from "module_file_tpl:FileManager;filemanager.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b513c306829e0_27341699',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e97925fbb1dcac0611e24940ad8d3b768bb7136d' => 
    array (
      0 => 'module_file_tpl:FileManager;filemanager.tpl',
      1 => 1517033802,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b513c306829e0_27341699 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'filebtn' => 
  array (
    'compiled_filepath' => '/data/home/iic/public_html/tmp/templates_c/FileManager^e97925fbb1dcac0611e24940ad8d3b768bb7136d_0.module_file_tpl.FileManager;filemanager.tpl.php',
    'uid' => 'e97925fbb1dcac0611e24940ad8d3b768bb7136d',
    'call_name' => 'smarty_template_function_filebtn_11314789465b513c304725f8_70669948',
  ),
));
if (!is_callable('smarty_function_cycle')) require_once '/data/home/iic/public_html/lib/smarty/plugins/function.cycle.php';
if (!is_callable('smarty_modifier_cms_date_format')) require_once '/data/home/iic/public_html/lib/plugins/modifier.cms_date_format.php';
if (!isset($_smarty_tpl->tpl_vars['noform']->value)) {?>
<style type="text/css">
a.filelink:visited {
   color: #000;
}
</style>
<?php echo '<script'; ?>
 type="text/javascript">
var refresh_url = '<?php echo $_smarty_tpl->tpl_vars['refresh_url']->value;?>
'+'&showtemplate=false';
refresh_url = refresh_url.replace(/amp;/g,'');
// <![CDATA[
function enable_button(idlist) {
  $(idlist).removeAttr('disabled').removeClass('ui-state-disabled ui-button-disabled');
}
function disable_button(idlist) {
  $(idlist).attr('disabled','disabled').addClass('ui-state-disabled ui-button-disabled');
}

function enable_action_buttons() {

    var files = $("#filesarea input[type='checkbox'].fileselect").filter(':checked').length,
        dirs = $("#filesarea input[type='checkbox'].dir").filter(':checked').length,
        arch = $("#filesarea input[type='checkbox'].archive").filter(':checked').length,
        text = $("#filesarea input[type='checkbox'].text").filter(':checked').length,
        imgs = $("#filesarea input[type='checkbox'].image").filter(':checked').length;

    disable_button('button.filebtn');
    $('button.filebtn').attr('disabled','disabled');
    if (files == 0 && dirs == 0) {
        // nothing selected, enable anything with select_none
        enable_button('#btn_newdir');
    } else if (files == 1) {
        // 1 selected, enable anything with select_one
        enable_button('#btn_rename');
        enable_button('#btn_move');
        enable_button('#btn_delete');

        if (dirs == 0) enable_button('#btn_copy');
        if (arch == 1) enable_button('#btn_unpack');
        if (imgs == 1) enable_button('#btn_view,#btn_thumb,#btn_resizecrop,#btn_rotate');
        if (text == 1) enable_button('#btn_view');
    } else if (files > 1 && dirs == 0) {
        // multiple files selected
        enable_button('#btn_delete,#btn_copy,#btn_move');
    } else if (files > 1 && dirs > 0) {
        // multiple selected, at least one dir.
        enable_button('#btn_delete,#btn_move');
    }
}

$(document).ready(function () {
    enable_action_buttons();

    $('#refresh').unbind('click');
    $('#refresh').bind('click', function () {
        // ajaxy reload for the files area.
        $('#filesarea').load(refresh_url);
        return false;
    });

    $(document).on('dropzone_chdir', $(this), function (e, data) {
        // if change dir via the dropzone, make sure filemanager refreshes.
        location.reload();
    });
    $(document).on('dropzone_stop', $(this), function (e, data) {
        // if change dir via the dropzone, make sure filemanager refreshes.
        location.reload();
    });

    $(document).on('change', '#filesarea input[type="checkbox"].fileselect', function (e) {
        // find the parent row
        e.stopPropagation();
        var t = $(this).attr('checked');
        if (t) {
            $(this).closest('tr').addClass('selected');
        } else {
            $(this).closest('tr').removeClass('selected');
        }
        enable_action_buttons();
    });

    $(document).on('change', '#tagall', function (event) {
        if ($(this).is(':checked')) {
            $('#filesarea input:checkbox.fileselect').attr('checked', true).trigger('change');
        } else {
            $('#filesarea input:checkbox.fileselect').attr('checked', false).trigger('change');
        }
    });

    $(document).on('click', '#btn_view', function () {
        // find the selected item.
        var tmp = $("#filesarea input[type='checkbox']").filter(':checked').val();
        var url = '<?php echo $_smarty_tpl->tpl_vars['viewfile_url']->value;?>
&showtemplate=false&<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
viewfile=' + tmp;
        url = url.replace(/amp;/g, '');
        $('#popup_contents').load(url);
        $('#popup').dialog({
       	  minWidth: 380,
          maxHeight: 600
        });
        return false;
    });

    $(document).on('click', 'td.clickable', function () {
        var t = $(this).parent().find(':checkbox').attr('checked');
        if (t != 'checked') {
            $(this).parent().find(':checkbox').attr('checked', true).trigger('change');
        } else {
            $(this).parent().find(':checkbox').attr('checked', false).trigger('change');
        }
    });
});
// ]]>
<?php echo '</script'; ?>
>



<div id="popup" style="display: none;">
	<div id="popup_contents" style="min-width: 500px; max-height: 600px;"></div>
</div>

<div>
  <?php echo $_smarty_tpl->tpl_vars['formstart']->value;?>


<div>
	<fieldset>
        <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'filebtn', array('id'=>'btn_newdir','iname'=>((string)$_smarty_tpl->tpl_vars['actionid']->value)."fileactionnewdir",'icon'=>'ui-icon-circle-plus','text'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('newdir'),'title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('title_newdir')), true);?>

        <?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'filebtn', array('id'=>'btn_view','iname'=>((string)$_smarty_tpl->tpl_vars['actionid']->value)."fileactionview",'icon'=>'ui-icon-circle-zoomin','text'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('view'),'title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('title_view')), true);?>

		<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'filebtn', array('id'=>'btn_rename','iname'=>((string)$_smarty_tpl->tpl_vars['actionid']->value)."fileactionrename",'text'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('rename'),'title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('title_rename')), true);?>

		<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'filebtn', array('id'=>'btn_delete','iname'=>((string)$_smarty_tpl->tpl_vars['actionid']->value)."fileactiondelete",'icon'=>'ui-icon-trash','text'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('delete'),'title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('title_delete')), true);?>

		<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'filebtn', array('id'=>'btn_move','iname'=>((string)$_smarty_tpl->tpl_vars['actionid']->value)."fileactionmove",'icon'=>'ui-icon-arrow-4-diag','text'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('move'),'title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('title_move')), true);?>

		<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'filebtn', array('id'=>'btn_copy','iname'=>((string)$_smarty_tpl->tpl_vars['actionid']->value)."fileactioncopy",'icon'=>'ui-icon-copy','text'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('copy'),'title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('title_copy')), true);?>

		<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'filebtn', array('id'=>'btn_unpack','iname'=>((string)$_smarty_tpl->tpl_vars['actionid']->value)."fileactionunpack",'icon'=>'ui-icon-suitcase','text'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('unpack'),'title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('title_unpack')), true);?>

		<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'filebtn', array('id'=>'btn_thumb','iname'=>((string)$_smarty_tpl->tpl_vars['actionid']->value)."fileactionthumb",'icon'=>'ui-icon-star','text'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('thumbnail'),'title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('title_thumbnail')), true);?>

		<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'filebtn', array('id'=>'btn_resizecrop','iname'=>((string)$_smarty_tpl->tpl_vars['actionid']->value)."fileactionresizecrop",'icon'=>'ui-icon-image','text'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('resizecrop'),'title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('title_resizecrop')), true);?>

		<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'filebtn', array('id'=>'btn_rotate','iname'=>((string)$_smarty_tpl->tpl_vars['actionid']->value)."fileactionrotate",'icon'=>'ui-icon-image','text'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('rotate'),'title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('title_rotate')), true);?>

	</fieldset>
</div>
<?php echo $_smarty_tpl->tpl_vars['hiddenpath']->value;?>

<?php }?>

<div id="filesarea">
	<table width="100%" class="pagetable scrollable">
		<thead>
			<tr>
				<th class="pageicon">&nbsp;</th>
				<th><?php echo $_smarty_tpl->tpl_vars['filenametext']->value;?>
</th>
				<th class="pageicon"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('mimetype');?>
</th>
				<th class="pageicon"><?php echo $_smarty_tpl->tpl_vars['fileinfotext']->value;?>
</th>
				<th class="pageicon" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('title_col_fileowner');?>
"><?php echo $_smarty_tpl->tpl_vars['fileownertext']->value;?>
</th>
				<th class="pageicon" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('title_col_fileperms');?>
"><?php echo $_smarty_tpl->tpl_vars['filepermstext']->value;?>
</th>
				<th class="pageicon" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('title_col_filesize');?>
" style="text-align:right;"><?php echo $_smarty_tpl->tpl_vars['filesizetext']->value;?>
</th>
				<th class="pageicon"></th>
				<th class="pageicon" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('title_col_filedate');?>
"><?php echo $_smarty_tpl->tpl_vars['filedatetext']->value;?>
</th>
				<th class="pageicon">
					<input type="checkbox" name="tagall" value="tagall" id="tagall" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('title_tagall');?>
"/>
				</th>
			</tr>
		</thead>
		<tbody>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['files']->value, 'file');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['file']->value) {
?>
			<?php echo smarty_function_cycle(array('values'=>"row1,row2",'assign'=>'rowclass'),$_smarty_tpl);?>

			<?php $_smarty_tpl->_assignInScope('thedate', str_replace(' ','&nbsp;',smarty_modifier_cms_date_format($_smarty_tpl->tpl_vars['file']->value->filedate)));
$_smarty_tpl->_assignInScope('thedate', str_replace('-','&minus;',$_smarty_tpl->tpl_vars['thedate']->value));
?>
			<tr class="<?php echo $_smarty_tpl->tpl_vars['rowclass']->value;?>
">
				<td valign="middle"><?php if (isset($_smarty_tpl->tpl_vars['file']->value->thumbnail) && $_smarty_tpl->tpl_vars['file']->value->thumbnail != '') {
echo $_smarty_tpl->tpl_vars['file']->value->thumbnail;
} else {
echo $_smarty_tpl->tpl_vars['file']->value->iconlink;
}?></td>
				<td class="clickable" valign="middle"><?php echo $_smarty_tpl->tpl_vars['file']->value->txtlink;?>
</td>
				<td class="clickable" valign="middle"><?php echo $_smarty_tpl->tpl_vars['file']->value->mime;?>
</td>
				<td class="clickable" style="padding-right:8px;white-space:pre;" valign="middle"><?php echo $_smarty_tpl->tpl_vars['file']->value->fileinfo;?>
</td>
				<td class="clickable" style="padding-right:8px;white-space:pre;" valign="middle"><?php if (isset($_smarty_tpl->tpl_vars['file']->value->fileowner)) {
echo $_smarty_tpl->tpl_vars['file']->value->fileowner;
} else { ?>&nbsp;<?php }?></td>
				<td class="clickable" style="padding-right:8px;" valign="middle"><?php echo $_smarty_tpl->tpl_vars['file']->value->filepermissions;?>
</td>
				<td class="clickable" style="padding-right:8px;white-space:pre;text-align:right;" valign="middle"><?php echo $_smarty_tpl->tpl_vars['file']->value->filesize;?>
</td>
				<td class="clickable" style="padding-right:8px;" valign="middle"><?php if (isset($_smarty_tpl->tpl_vars['file']->value->filesizeunit)) {
echo $_smarty_tpl->tpl_vars['file']->value->filesizeunit;
} else { ?>&nbsp;<?php }?></td>
				<td class="clickable" style="padding-right:8px;white-space:pre;" valign="middle"><?php echo $_smarty_tpl->tpl_vars['thedate']->value;?>
</td>
				<td>
				<?php if (!isset($_smarty_tpl->tpl_vars['file']->value->noCheckbox)) {?>
					<label for="x_<?php echo $_smarty_tpl->tpl_vars['file']->value->urlname;?>
" style="display: none;"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('toggle');?>
</label>
					<input type="checkbox" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('toggle');?>
" id="x_<?php echo $_smarty_tpl->tpl_vars['file']->value->urlname;?>
" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
selall[]" value="<?php echo $_smarty_tpl->tpl_vars['file']->value->urlname;?>
" class="fileselect <?php echo implode(' ',$_smarty_tpl->tpl_vars['file']->value->type);?>
" <?php if (isset($_smarty_tpl->tpl_vars['file']->value->checked)) {?>checked="checked"<?php }?>/>
				<?php }?>
				</td>
			</tr>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

		</tbody>
		<tfoot>
			<tr>
				<td>&nbsp;</td>
				<td colspan="7"><?php echo $_smarty_tpl->tpl_vars['countstext']->value;?>
</td>
			</tr>
		</tfoot>
	</table>
</div>

<?php if (!isset($_smarty_tpl->tpl_vars['noform']->value)) {?>
	
	<?php echo $_smarty_tpl->tpl_vars['formend']->value;?>

</div>
<?php }
}
/* smarty_template_function_filebtn_11314789465b513c304725f8_70669948 */
if (!function_exists('smarty_template_function_filebtn_11314789465b513c304725f8_70669948')) {
function smarty_template_function_filebtn_11314789465b513c304725f8_70669948($_smarty_tpl,$params) {
$params = array_merge(array('icon'=>'ui-icon-circle-check'), $params);
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
$_smarty_tpl->_assignInScope('addclass', 'ui-button-icon-primary');
if (isset($_smarty_tpl->tpl_vars['text']->value) && $_smarty_tpl->tpl_vars['text']->value != '') {?>
  <?php $_smarty_tpl->_assignInScope('addclass', 'ui-button-text-icon-primary');
?>
  <?php if (!isset($_smarty_tpl->tpl_vars['title']->value) || $_smarty_tpl->tpl_vars['title']->value == '') {
$_smarty_tpl->_assignInScope('title', $_smarty_tpl->tpl_vars['text']->value);
}
}?>
<button type="submit" name="<?php echo $_smarty_tpl->tpl_vars['iname']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" title="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['title']->value)===null||$tmp==='' ? '' : $tmp);?>
" class="filebtn ui-button ui-widget ui-state-default ui-corner-all <?php echo $_smarty_tpl->tpl_vars['addclass']->value;?>
">
  <span class="ui-icon ui-button-icon-primary <?php echo $_smarty_tpl->tpl_vars['icon']->value;?>
"></span>
  <?php if (isset($_smarty_tpl->tpl_vars['text']->value) && $_smarty_tpl->tpl_vars['text']->value != '') {?><span class="ui-button-text"><?php echo $_smarty_tpl->tpl_vars['text']->value;?>
</span><?php }?>
</button>
<?php
}}
/*/ smarty_template_function_filebtn_11314789465b513c304725f8_70669948 */
}
