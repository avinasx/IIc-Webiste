<?php
/* Smarty version 3.1.31, created on 2018-07-20 04:32:54
  from "/data/home/iic/public_html/admin/templates/adminlog.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b51189edcd826_04978366',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '98801f8730459bbdb4166d6d582699d7f667ea50' => 
    array (
      0 => '/data/home/iic/public_html/admin/templates/adminlog.tpl',
      1 => 1517033802,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b51189edcd826_04978366 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_admin_icon')) require_once '/data/home/iic/public_html/admin/plugins/function.admin_icon.php';
if (!is_callable('smarty_function_html_options')) require_once '/data/home/iic/public_html/lib/smarty/plugins/function.html_options.php';
if (!is_callable('smarty_function_cycle')) require_once '/data/home/iic/public_html/lib/smarty/plugins/function.cycle.php';
if (!is_callable('smarty_modifier_date_format')) require_once '/data/home/iic/public_html/lib/smarty/plugins/modifier.date_format.php';
echo '<script'; ?>
 type="text/javascript">
$(document).ready(function(){
  $('#clearlog').click(function(ev){
     ev.preventDefault();
     var _hr = $(this).attr('href');
     cms_confirm('<?php echo strtr($_smarty_tpl->tpl_vars['sysmain_confirmclearlog']->value, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
').done(function(){
         window.location.href = _hr;
     })
  })
  $('#pagesel').change(function(){
     $(this).closest('form').submit();
  })
  $('#toggle_filters').click(function(){
    $('#adminlog_filters').dialog({
      modal: true,
      width: 'auto'
    });
  });
})
<?php echo '</script'; ?>
>

<div class="pagecontainer">
  <div class="pageoverflow">
    <div id="adminlog_filters" style="display: none;" title="<?php echo lang('filter');?>
">
        <form id="adminlog_filter" method="post" action="adminlog.php?<?php echo $_smarty_tpl->tpl_vars['SECURE_PARAM_NAME']->value;?>
=<?php echo $_smarty_tpl->tpl_vars['CMS_USER_KEY']->value;?>
">
          <div class="c_full">
            <label><?php echo $_smarty_tpl->tpl_vars['langfilteraction']->value;?>
</label>
            <input type="text" name="filteraction" value="<?php echo $_smarty_tpl->tpl_vars['filter']->value->action;?>
" class="grid_10"/>
	    <div class="clearb"></div>
          </div>
          <div class="c_full">
            <label><?php echo lang('item_name_contains');?>
</label>
            <input type="text" name="filteritem" value="<?php echo $_smarty_tpl->tpl_vars['filter']->value->item_name;?>
" class="grid_10"/>
	    <div class="clearb"></div>
          </div>
          <div class="c_full">
	    <label><?php echo $_smarty_tpl->tpl_vars['langfilteruser']->value;?>
:</label>
            <input type="text" name="filteruser" value="<?php echo $_smarty_tpl->tpl_vars['filter']->value->user;?>
" class="grid_10"/>
	    <div class="clearb"></div>
          </div>
          <div class="pageoverflow">
            <p class="pageinput">
	      <input type="submit" name="filterapply" value="<?php echo lang('apply');?>
"/>
	      <input type="submit" name="filterreset" value="<?php echo lang('reset');?>
"/>
	    </p>
          </div>
        </form>
    </div>

    <div class="c_full">
      <div class="grid_8" style="padding-top: 8px;">
        <a id="toggle_filters"><?php echo smarty_function_admin_icon(array('icon'=>'view.gif','alt'=>''),$_smarty_tpl);?>
 <?php echo lang('filter');?>
</a>
	<?php if ($_smarty_tpl->tpl_vars['filter_applied']->value) {?><span style="color: green;"><em>(<?php echo lang('applied');?>
)</em></span><?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['downloadlink']->value)) {?>
          <a href="adminlog.php<?php echo $_smarty_tpl->tpl_vars['urlext']->value;?>
&amp;download=1"><?php echo $_smarty_tpl->tpl_vars['downloadlink']->value;?>
</a>&nbsp;
          <a href="adminlog.php<?php echo $_smarty_tpl->tpl_vars['urlext']->value;?>
&amp;download=1"><?php echo $_smarty_tpl->tpl_vars['langdownload']->value;?>
</a>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['clearicon']->value != '') {?>
          &nbsp;
          <a href="adminlog.php<?php echo $_smarty_tpl->tpl_vars['urlext']->value;?>
&amp;clear=true"><?php echo $_smarty_tpl->tpl_vars['clearicon']->value;?>
</a>
          <a id="clearlog" href="adminlog.php<?php echo $_smarty_tpl->tpl_vars['urlext']->value;?>
&amp;clear=true"><?php echo $_smarty_tpl->tpl_vars['langclear']->value;?>
</a>
        <?php }?>
      </div>
      <?php if (!empty($_smarty_tpl->tpl_vars['pagelist']->value)) {?>
        <div class="grid_4" style="text-align: right;">
           <form method="post" action="adminlog.php?<?php echo $_smarty_tpl->tpl_vars['SECURE_PARAM_NAME']->value;?>
=<?php echo $_smarty_tpl->tpl_vars['CMS_USER_KEY']->value;?>
">
  	     <?php echo lang('page');?>
:&nbsp;
	     <select id="pagesel" name="page"><?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['pagelist']->value,'selected'=>$_smarty_tpl->tpl_vars['page']->value),$_smarty_tpl);?>
</select>
	   </form>
	</div>
      <?php }?>
      <div class="clear"></div>
  </div>

  <?php if ($_smarty_tpl->tpl_vars['logempty']->value == false) {?>
    <table class="pagetable">
      <thead>
      <tr>
        <th><?php echo lang('ip_addr');?>
</th>
        <th><?php echo $_smarty_tpl->tpl_vars['languser']->value;?>
</th>
        <th><?php echo $_smarty_tpl->tpl_vars['langitemid']->value;?>
</th>
        <th><?php echo $_smarty_tpl->tpl_vars['langitemname']->value;?>
</th>
        <th><?php echo $_smarty_tpl->tpl_vars['langaction']->value;?>
</th>
        <th><?php echo $_smarty_tpl->tpl_vars['langdate']->value;?>
</th>
      </tr>
      </thead>
      <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['loglines']->value, 'line');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['line']->value) {
?>
          <?php echo smarty_function_cycle(array('values'=>'row1,row2','assign'=>'currow'),$_smarty_tpl);?>

        <tr class="<?php echo $_smarty_tpl->tpl_vars['currow']->value;?>
">
          <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['line']->value['ip_addr'])===null||$tmp==='' ? '' : $tmp);?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['line']->value['username'];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['line']->value['itemid'];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['line']->value['itemname'];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['line']->value['action'];?>
</td>
          <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['line']->value['date'],'%e %h. %Y %H:%M:%S');?>
</td>
        </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>


      </tbody>
    </table>
  <?php } else { ?>
    <h3 style="text-align: center; color: red;"><?php echo $_smarty_tpl->tpl_vars['langlogempty']->value;?>
</h3>
  <?php }?>

  </div>
</div><?php }
}
