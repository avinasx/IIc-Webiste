<?php
/* Smarty version 3.1.31, created on 2018-07-23 11:28:32
  from "module_file_tpl:News;articlelist.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b556e882a7dc4_83926902',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '60befe20a75d407574fe658fe037d1dc98318fd0' => 
    array (
      0 => 'module_file_tpl:News;articlelist.tpl',
      1 => 1517033802,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b556e882a7dc4_83926902 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_cms_help')) require_once '/data/home/iic/public_html/admin/plugins/function.cms_help.php';
if (!is_callable('smarty_function_html_options')) require_once '/data/home/iic/public_html/lib/smarty/plugins/function.html_options.php';
if (!is_callable('smarty_cms_function_cms_action_url')) require_once '/data/home/iic/public_html/lib/plugins/function.cms_action_url.php';
if (!is_callable('smarty_function_admin_icon')) require_once '/data/home/iic/public_html/admin/plugins/function.admin_icon.php';
if (!is_callable('smarty_function_form_start')) require_once '/data/home/iic/public_html/lib/plugins/function.form_start.php';
if (!is_callable('smarty_function_cms_pageoptions')) require_once '/data/home/iic/public_html/lib/plugins/function.cms_pageoptions.php';
if (!is_callable('smarty_function_form_end')) require_once '/data/home/iic/public_html/lib/plugins/function.form_end.php';
if (!is_callable('smarty_modifier_cms_escape')) require_once '/data/home/iic/public_html/lib/plugins/modifier.cms_escape.php';
if (!is_callable('smarty_modifier_cms_date_format')) require_once '/data/home/iic/public_html/lib/plugins/modifier.cms_date_format.php';
echo '<script'; ?>
 type="text/javascript">
//<![CDATA[
$(document).ready(function(){
	$('#selall').cmsms_checkall();
	$('#bulkactions').hide();
	$('#bulk_category').hide();
	$('#toggle_filter').click(function(){
	   $('#filter').dialog({
	     width: 'auto',
	     modal:  true
	   });
	});
        $('a.delete_article').click(function(ev){
	        var self = $(this);
	        ev.preventDefault();
        	cms_confirm('<?php echo strtr($_smarty_tpl->tpl_vars['mod']->value->Lang('areyousure'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
').done(function(){
		    window.location = self.attr('href');
		    return true;
		});
        });
	$('#articlelist').on('cms_checkall_toggle','[type=checkbox]',function(){
		var l = $('#articlelist :checked').length;

		if( l == 0 ) {
			$('#bulkactions').hide(50);
		} else {
			$('#bulkactions').show(50);
		}
	});

	$('#bulk_action').on('change',function(){
		var v = $(this).val();

		if( v == 'setcategory' ) {
			$('#bulk_category').show(50);
		} else {
			$('#bulk_category').hide(50);
		}
	});

	$('#bulkactions').on('click','#submit_bulkaction',function(ev){
		var form = $(this).closest('form');
	        ev.preventDefault();
		cms_confirm('<?php echo strtr($_smarty_tpl->tpl_vars['mod']->value->Lang('areyousure_multiple'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
').done(function(){
		    form.submit();
		});
	});
});
//]]>
<?php echo '</script'; ?>
>

<?php if (isset($_smarty_tpl->tpl_vars['formstart']->value)) {?>
<div id="filter" title="<?php echo $_smarty_tpl->tpl_vars['filtertext']->value;?>
" style="display: none;">
  <?php echo $_smarty_tpl->tpl_vars['formstart']->value;?>

  <div class="pageoverflow">
    <p class="pagetext"><label for="filter_category"><?php echo $_smarty_tpl->tpl_vars['prompt_category']->value;?>
:</label> <?php echo smarty_function_cms_help(array('key'=>'help_articles_filtercategory','title'=>$_smarty_tpl->tpl_vars['prompt_category']->value),$_smarty_tpl);?>
</p>
    <p class="pageinput">
      <select id="filter_category" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
category">
      <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['categorylist']->value,'selected'=>$_smarty_tpl->tpl_vars['curcategory']->value),$_smarty_tpl);?>

      </select>
      <label for="filter_allcategories"><?php echo $_smarty_tpl->tpl_vars['prompt_showchildcategories']->value;?>
:</label>
      <input id="filter_allcategories" type="checkbox" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
allcategories" value="yes" <?php if ($_smarty_tpl->tpl_vars['allcategories']->value == "yes") {?>checked="checked"<?php }?>>
      <?php echo smarty_function_cms_help(array('key'=>'help_articles_filterchildcats','title'=>$_smarty_tpl->tpl_vars['prompt_showchildcategories']->value),$_smarty_tpl);?>

    </p>
  </div>
  <div class="pageoverflow">
    <p class="pagetext"><label for="filter_sortby"><?php echo $_smarty_tpl->tpl_vars['prompt_sorting']->value;?>
:</label> <?php echo smarty_function_cms_help(array('key'=>'help_articles_sortby','title'=>$_smarty_tpl->tpl_vars['prompt_sorting']->value),$_smarty_tpl);?>
</p>
    <p class="pageinput">
      <select id="filter_sorting" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
sortby">
      <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['sortlist']->value,'selected'=>$_smarty_tpl->tpl_vars['sortby']->value),$_smarty_tpl);?>

      </select>
    </p>
  </div>
  <div class="pageoverflow">
    <p class="pagetext"><label for="filter_pagelimit"><?php echo $_smarty_tpl->tpl_vars['prompt_pagelimit']->value;?>
:</label> <?php echo smarty_function_cms_help(array('key'=>'help_articles_pagelimit','title'=>$_smarty_tpl->tpl_vars['prompt_pagelimit']->value),$_smarty_tpl);?>
</p>
    <p class="pageinput">
      <select id="filter_pagelimit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
pagelimit">
      <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['pagelimits']->value,'selected'=>$_smarty_tpl->tpl_vars['sortby']->value),$_smarty_tpl);?>

      </select>
    </p>
  </div>
  <div class="pageoverflow">
    <p class="pageinput">
      <input type="submit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
submitfilter" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('submit');?>
"/>
      <input type="submit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
resetfilter" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('reset');?>
"/>
    </p>
  </div>
  <?php echo $_smarty_tpl->tpl_vars['formend']->value;?>

</div>
<?php }?>

<div class="row c_full">
  <div class="pageoptions grid_6" style="margin-top: 8px;">
    <?php if ($_smarty_tpl->tpl_vars['can_add']->value) {?>
      <a href="<?php echo smarty_cms_function_cms_action_url(array('action'=>'addarticle'),$_smarty_tpl);?>
"><?php echo smarty_function_admin_icon(array('icon'=>'newobject.gif','alt'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('addarticle')),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('addarticle');?>
</a>&nbsp;
    <?php }?>
    <a id="toggle_filter" <?php if ($_smarty_tpl->tpl_vars['curcategory']->value != '') {?> style="font-weight: bold; color: green;"<?php }?>><?php echo smarty_function_admin_icon(array('icon'=>'view.gif','alt'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('viewfilter')),$_smarty_tpl);?>
 <?php if ($_smarty_tpl->tpl_vars['curcategory']->value != '') {?>*<?php }?>
    <?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('viewfilter');?>
</a>
  </div>
  <?php if ($_smarty_tpl->tpl_vars['itemcount']->value > 0 && $_smarty_tpl->tpl_vars['pagecount']->value > 1) {?>
    <div class="pageoptions grid_6" style="text-align: right;">
      <?php echo smarty_function_form_start(array(),$_smarty_tpl);?>

      <?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_page');?>
&nbsp;
      <select name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
pagenumber">
        <?php echo smarty_function_cms_pageoptions(array('numpages'=>$_smarty_tpl->tpl_vars['pagecount']->value,'curpage'=>$_smarty_tpl->tpl_vars['pagenumber']->value),$_smarty_tpl);?>

      </select>&nbsp;
      <input type="submit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
paginate" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_go');?>
"/>
      <?php echo smarty_function_form_end(array(),$_smarty_tpl);?>

    </div>
  <?php }?>
</div>

<?php if ($_smarty_tpl->tpl_vars['itemcount']->value > 0) {
echo $_smarty_tpl->tpl_vars['form2start']->value;?>

<table class="pagetable" id="articlelist">
	<thead>
		<tr>
			<th>#</th>
			<th><?php echo $_smarty_tpl->tpl_vars['titletext']->value;?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['postdatetext']->value;?>
</th>
            <th><?php echo $_smarty_tpl->tpl_vars['startdatetext']->value;?>
</th>
            <th><?php echo $_smarty_tpl->tpl_vars['enddatetext']->value;?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['categorytext']->value;?>
</th>
			<th class="pageicon"><?php echo $_smarty_tpl->tpl_vars['statustext']->value;?>
</th>
			<th class="pageicon">&nbsp;</th>
			<th class="pageicon">&nbsp;</th>
			<th class="pageicon"><input type="checkbox" id="selall" value="1" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('selectall');?>
"/></th>
		</tr>
	</thead>
	<tbody>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['items']->value, 'entry');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['entry']->value) {
?>
		<tr class="<?php echo $_smarty_tpl->tpl_vars['entry']->value->rowclass;?>
">
			<td><?php echo $_smarty_tpl->tpl_vars['entry']->value->id;?>
</td>
			<td>
                        <?php if (isset($_smarty_tpl->tpl_vars['entry']->value->edit_url)) {?>
                          <a href="<?php echo $_smarty_tpl->tpl_vars['entry']->value->edit_url;?>
" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('editarticle');?>
"><?php echo smarty_modifier_cms_escape($_smarty_tpl->tpl_vars['entry']->value->news_title);?>
</a>
                        <?php } else { ?>
                          <?php echo smarty_modifier_cms_escape($_smarty_tpl->tpl_vars['entry']->value->news_title);?>

                        <?php }?>
                        </td>
			<td><?php echo smarty_modifier_cms_date_format($_smarty_tpl->tpl_vars['entry']->value->u_postdate);?>
</td>
                        <td><?php if (!empty($_smarty_tpl->tpl_vars['entry']->value->u_enddate)) {
echo smarty_modifier_cms_date_format($_smarty_tpl->tpl_vars['entry']->value->u_startdate);
}?></td>
                        <td><?php if ($_smarty_tpl->tpl_vars['entry']->value->expired == 1) {?>
                              <div class="important">
                              <?php echo smarty_modifier_cms_date_format($_smarty_tpl->tpl_vars['entry']->value->u_enddate);?>

	                      </div>
                            <?php } else { ?>
                              <?php echo smarty_modifier_cms_date_format($_smarty_tpl->tpl_vars['entry']->value->u_enddate);?>

                            <?php }?>
                        </td>
			<td><?php echo $_smarty_tpl->tpl_vars['entry']->value->category;?>
</td>
			<td><?php if (isset($_smarty_tpl->tpl_vars['entry']->value->approve_link)) {
echo $_smarty_tpl->tpl_vars['entry']->value->approve_link;
}?></td>
			<td>
                          <?php if (isset($_smarty_tpl->tpl_vars['entry']->value->edit_url)) {?>
                          <a href="<?php echo $_smarty_tpl->tpl_vars['entry']->value->edit_url;?>
" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('editarticle');?>
"><?php echo smarty_function_admin_icon(array('icon'=>'edit.gif'),$_smarty_tpl);?>
</a>
                          <?php }?>
                        </td>
			<td>
                          <?php if (isset($_smarty_tpl->tpl_vars['entry']->value->delete_url)) {?>
                          <a class="delete_article" href="<?php echo $_smarty_tpl->tpl_vars['entry']->value->delete_url;?>
" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('delete_article');?>
"><?php echo smarty_function_admin_icon(array('icon'=>'delete.gif'),$_smarty_tpl);?>
</a>
                          <?php }?>
                        </td>
			<td><input type="checkbox" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
sel[]" value="<?php echo $_smarty_tpl->tpl_vars['entry']->value->id;?>
" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('toggle_bulk');?>
"/></td>
		</tr>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

	</tbody>
</table>
<?php } else { ?>
	<p class="warning"><?php if ($_smarty_tpl->tpl_vars['curcategory']->value == '') {
echo $_smarty_tpl->tpl_vars['mod']->value->Lang('noarticles');
} else {
echo $_smarty_tpl->tpl_vars['mod']->value->Lang('noarticlesinfilter');
}?></p>
<?php }?>

<div style="width: 99%;">
<?php if (isset($_smarty_tpl->tpl_vars['addlink']->value)) {?>
  <div class="pageoptions" style="float: left;">
    <p class="pageoptions"><?php echo $_smarty_tpl->tpl_vars['addlink']->value;?>
</p>
  </div>
<?php }
if ($_smarty_tpl->tpl_vars['itemcount']->value > 0) {?>
  <div class="pageoptions" style="float: right; text-align: right;" id="bulkactions">
    <label for="bulk_action"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('with_selected');?>
:</label>
    <select id="bulk_action" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
bulk_action">
    <?php if (isset($_smarty_tpl->tpl_vars['submit_massdelete']->value)) {?>
    <option value="delete"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('bulk_delete');?>
</option>
    <?php }?>
    <option value="setdraft"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('bulk_setdraft');?>
</option>
    <option value="setpublished"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('bulk_setpublished');?>
</option>
    <option value="setcategory"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('bulk_setcategory');?>
</option>
    </select>
    <div id="bulk_category" style="display: inline-block;">
      <?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('category');?>
: <?php echo $_smarty_tpl->tpl_vars['categoryinput']->value;?>

    </div>
    <input type="submit" id="submit_bulkaction" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
submit_bulkaction" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('submit');?>
"/>
  </div>
<?php }?>
<div class="clearb"></div>
</div>
<?php echo $_smarty_tpl->tpl_vars['form2end']->value;?>

<?php }
}
