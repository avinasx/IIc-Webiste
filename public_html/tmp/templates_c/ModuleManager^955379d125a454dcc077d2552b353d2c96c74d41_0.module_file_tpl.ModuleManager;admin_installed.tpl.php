<?php
/* Smarty version 3.1.31, created on 2018-07-23 11:32:54
  from "module_file_tpl:ModuleManager;admin_installed.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b556f8e676729_33513357',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '955379d125a454dcc077d2552b353d2c96c74d41' => 
    array (
      0 => 'module_file_tpl:ModuleManager;admin_installed.tpl',
      1 => 1517033802,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b556f8e676729_33513357 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_form_start')) require_once '/data/home/iic/public_html/lib/plugins/function.form_start.php';
if (!is_callable('smarty_function_cms_help')) require_once '/data/home/iic/public_html/admin/plugins/function.cms_help.php';
if (!is_callable('smarty_function_form_end')) require_once '/data/home/iic/public_html/lib/plugins/function.form_end.php';
if (!is_callable('smarty_function_admin_icon')) require_once '/data/home/iic/public_html/admin/plugins/function.admin_icon.php';
if (!is_callable('smarty_function_cycle')) require_once '/data/home/iic/public_html/lib/smarty/plugins/function.cycle.php';
if (!is_callable('smarty_cms_function_cms_action_url')) require_once '/data/home/iic/public_html/lib/plugins/function.cms_action_url.php';
echo '<script'; ?>
 type="text/javascript">
$(document).ready(function(){
  $('a.mod_upgrade').click( function(ev){
      ev.preventDefault();
      var href = $(this).attr('href');
      cms_confirm('<?php echo strtr($_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('confirm_upgrade'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
').done(function(){
          window.location.href = href;
      })
  });
  $('a.mod_remove').click( function(ev){
      ev.preventDefault();
      var href = $(this).attr('href');
      cms_confirm('<?php echo strtr($_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('confirm_remove'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
').done(function(){
          window.location.href = href;
      })
  });
  $('a.mod_chmod').click( function(ev){
      ev.preventDefault();
      var href = $(this).attr('href');
      cms_confirm('<?php echo strtr($_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('confirm_chmod'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
').done(function(){
          window.location.href = href;
      })
  });

  $('#importbtn').click(function(){
    $('#importdlg').dialog({
      modal: true,
      buttons: {
        <?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('submit');?>
: function() {
          var file = $('#xml_upload').val();
          if( file.length == 0 ) {
            cms_alert('<?php echo strtr($_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('error_nofileuploaded'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
');
          }
	  else {
            var ext  = file.split('.').pop().toLowerCase();
            if($.inArray(ext, ['xml','cmsmod']) == -1) {
              cms_alert('<?php echo strtr($_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('error_invaliduploadtype'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
');
            }
	    else {
              $(this).dialog('close');
              $('#local_import').submit();
	    }
	  }
        },
        <?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('cancel');?>
: function() {
          $(this).dialog('close');
        }
      }
    });
  });
});
<?php echo '</script'; ?>
>

<div id="importdlg" title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('importxml');?>
" style="display: none;">
  <?php echo smarty_function_form_start(array('id'=>'local_import','action'=>'local_import'),$_smarty_tpl);?>

  <div class="pageoverflow">
    <p class="pagetext"><label for="xml_upload"><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('uploadfile');?>
:</label>
       <?php echo smarty_function_cms_help(array('title'=>$_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('title_mm_importxml'),'key'=>'help_mm_importxml'),$_smarty_tpl);?>

    </p>
    <p class="pageinput">
      <input id="xml_upload" type="file" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
upload" accept="text/xml"/>
    </p>
  </div>
  <?php echo smarty_function_form_end(array(),$_smarty_tpl);?>

</div>

<?php if (isset($_smarty_tpl->tpl_vars['module_info']->value)) {?>
<div class="pageoptions">
  <a id="importbtn"><?php echo smarty_function_admin_icon(array('icon'=>'import.gif'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('importxml');?>
</a>
</div>

<table class="pagetable">
  <thead>
    <tr>
      <th></th>
      <th><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('nametext');?>
</th>
      <th><span title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('title_moduleversion');?>
"><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('vertext');?>
</span></th>
      <th><span title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('title_modulestatus');?>
"><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('status');?>
</span></th>
      <th><span title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('title_moduleaction');?>
"><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('action');?>
</span></th>
      <th class="pageicon"><span title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('title_moduleactive');?>
"><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('active');?>
</span></th>
      <th class="pageicon"><span title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('title_modulehelp');?>
"><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('helptxt');?>
</span></th>
      <th class="pageicon"><span title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('title_moduleabout');?>
"><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('abouttxt');?>
</span></th>
      <?php if ($_smarty_tpl->tpl_vars['allow_export']->value) {?><th class="pageicon"><span title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('title_moduleexport');?>
"><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('export');?>
</span></th><?php }?>
    </tr>
  </thead>
  <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['module_info']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
    <?php echo smarty_function_cycle(array('values'=>"row1,row2",'assign'=>'rowclass'),$_smarty_tpl);?>

    <tr class="<?php echo $_smarty_tpl->tpl_vars['rowclass']->value;?>
" id="_<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
">
      <td><?php if ($_smarty_tpl->tpl_vars['item']->value['system_module']) {
echo $_smarty_tpl->tpl_vars['system_img']->value;
}?>
           <?php if ($_smarty_tpl->tpl_vars['item']->value['e_status'] == 'newer_available') {
echo $_smarty_tpl->tpl_vars['star_img']->value;
}?>
	   <?php if ($_smarty_tpl->tpl_vars['item']->value['missing_deps']) {
echo $_smarty_tpl->tpl_vars['missingdep_img']->value;
}?>
           <?php if ($_smarty_tpl->tpl_vars['item']->value['deprecated']) {
echo $_smarty_tpl->tpl_vars['deprecated_img']->value;
}?>
      </td>
      <td>
          <?php if (!$_smarty_tpl->tpl_vars['item']->value['installed'] || $_smarty_tpl->tpl_vars['item']->value['e_status'] == 'need_upgrade') {?>
            <span title="<?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>
" class="important"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</span>
          <?php } elseif ($_smarty_tpl->tpl_vars['item']->value['deprecated']) {?>
            <span title="<?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>
" style="color: red;"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</span>
          <?php } else { ?>
            <span title="<?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['system_module']) {?> style="color: green;"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</span>
          <?php }?>
      </td>
      <td><?php if ($_smarty_tpl->tpl_vars['item']->value['e_status'] == 'newer_available') {?>
            <strong title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('status_newer_available');?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['installed_version'];?>
</strong>
          <?php } else { ?>
            <?php echo $_smarty_tpl->tpl_vars['item']->value['installed_version'];?>

          <?php }?>
      </td>
      <td>
          <?php $_smarty_tpl->_assignInScope('ops', array());
?>
          <?php if (!$_smarty_tpl->tpl_vars['item']->value['installed']) {?>
            <?php if ($_smarty_tpl->tpl_vars['item']->value['can_install']) {?>
              <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', 'op', null);?><strong title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('title_notinstalled');?>
"><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('notinstalled');?>
</strong><?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
$_tmp_array = isset($_smarty_tpl->tpl_vars['ops']) ? $_smarty_tpl->tpl_vars['ops']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array[] = $_smarty_tpl->tpl_vars['op']->value;
$_smarty_tpl->_assignInScope('ops', $_tmp_array);
?>
	    <?php } elseif ($_smarty_tpl->tpl_vars['item']->value['missing_deps']) {?>
              <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', 'op', null);?><a class="modop mod_missingdeps important" style="color: red;" title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('title_missingdeps');?>
" href="<?php echo smarty_cms_function_cms_action_url(array('action'=>'local_missingdeps','mod'=>$_smarty_tpl->tpl_vars['item']->value['name']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('missingdeps');?>
</a><?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
$_tmp_array = isset($_smarty_tpl->tpl_vars['ops']) ? $_smarty_tpl->tpl_vars['ops']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array[] = $_smarty_tpl->tpl_vars['op']->value;
$_smarty_tpl->_assignInScope('ops', $_tmp_array);
?>
            <?php }?>
          <?php } else { ?>
            <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', 'op', null);
$_smarty_tpl->_assignInScope('tmp', ('status_').($_smarty_tpl->tpl_vars['item']->value['status']));
?><span title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang($_smarty_tpl->tpl_vars['tmp']->value);?>
"><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang($_smarty_tpl->tpl_vars['item']->value['status']);?>
</span><?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
$_tmp_array = isset($_smarty_tpl->tpl_vars['ops']) ? $_smarty_tpl->tpl_vars['ops']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array[] = $_smarty_tpl->tpl_vars['op']->value;
$_smarty_tpl->_assignInScope('ops', $_tmp_array);
?>
	    <?php if ($_smarty_tpl->tpl_vars['item']->value['missing_deps']) {?>
              <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', 'op', null);?><a class="modop mod_missingdeps important" style="color: red;" title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('title_missingdeps');?>
" href="<?php echo smarty_cms_function_cms_action_url(array('action'=>'local_missingdeps','mod'=>$_smarty_tpl->tpl_vars['item']->value['name']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('missingdeps');?>
</a><?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
$_tmp_array = isset($_smarty_tpl->tpl_vars['ops']) ? $_smarty_tpl->tpl_vars['ops']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array[] = $_smarty_tpl->tpl_vars['op']->value;
$_smarty_tpl->_assignInScope('ops', $_tmp_array);
?>
	    <?php }?>
  	    <?php if (!$_smarty_tpl->tpl_vars['item']->value['can_uninstall']) {?>
              <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', 'op', null);?><span title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('title_cantuninstall');?>
"><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('cantuninstall');?>
</span><?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
$_tmp_array = isset($_smarty_tpl->tpl_vars['ops']) ? $_smarty_tpl->tpl_vars['ops']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array[] = $_smarty_tpl->tpl_vars['op']->value;
$_smarty_tpl->_assignInScope('ops', $_tmp_array);
?>
	    <?php }?>
          <?php }?>
          <?php if (isset($_smarty_tpl->tpl_vars['item']->value['e_status'])) {?>
            <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', 'op', null);
$_smarty_tpl->_assignInScope('tmp', ('status_').($_smarty_tpl->tpl_vars['item']->value['e_status']));
?><span <?php if ($_smarty_tpl->tpl_vars['item']->value['e_status'] == 'db_newer') {?>class="important"<?php }?> title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang($_smarty_tpl->tpl_vars['tmp']->value);?>
" style="color: orange;"><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang($_smarty_tpl->tpl_vars['item']->value['e_status']);?>
</span><?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
$_tmp_array = isset($_smarty_tpl->tpl_vars['ops']) ? $_smarty_tpl->tpl_vars['ops']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array[] = $_smarty_tpl->tpl_vars['op']->value;
$_smarty_tpl->_assignInScope('ops', $_tmp_array);
?>
          <?php }?>
	  <?php if (!$_smarty_tpl->tpl_vars['item']->value['ver_compatible']) {?>
            <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', 'op', null);?><span class="important" title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('title_notcompatible');?>
"><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('notcompatible');?>
</span><?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
$_tmp_array = isset($_smarty_tpl->tpl_vars['ops']) ? $_smarty_tpl->tpl_vars['ops']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array[] = $_smarty_tpl->tpl_vars['op']->value;
$_smarty_tpl->_assignInScope('ops', $_tmp_array);
?>
          <?php }?>
          <?php if (!$_smarty_tpl->tpl_vars['item']->value['writable']) {?>
            <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', 'op', null);?><span title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('title_cantremove');?>
"><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('cantremove');?>
</span><?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
$_tmp_array = isset($_smarty_tpl->tpl_vars['ops']) ? $_smarty_tpl->tpl_vars['ops']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array[] = $_smarty_tpl->tpl_vars['op']->value;
$_smarty_tpl->_assignInScope('ops', $_tmp_array);
?>
          <?php }?>
          <?php if (isset($_smarty_tpl->tpl_vars['item']->value['dependants'])) {?>
	    <?php $_smarty_tpl->_assignInScope('tmp', array());
?>
	    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['dependants'], 'one');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['one']->value) {
?>
	      <?php ob_start();
echo smarty_cms_function_cms_action_url(array(),$_smarty_tpl);
$_prefixVariable1=ob_get_clean();
$_tmp_array = isset($_smarty_tpl->tpl_vars['tmp']) ? $_smarty_tpl->tpl_vars['tmp']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array[] = "<a href=\"".$_prefixVariable1."#_".((string)$_smarty_tpl->tpl_vars['one']->value)."\">".((string)$_smarty_tpl->tpl_vars['one']->value)."</a>";
$_smarty_tpl->_assignInScope('tmp', $_tmp_array);
?>
	    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

            <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', 'op', null);?><span title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('title_depends_upon');?>
"><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('depends_upon');?>
</span>: <?php echo implode(', ',$_smarty_tpl->tpl_vars['tmp']->value);
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
$_tmp_array = isset($_smarty_tpl->tpl_vars['ops']) ? $_smarty_tpl->tpl_vars['ops']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array[] = $_smarty_tpl->tpl_vars['op']->value;
$_smarty_tpl->_assignInScope('ops', $_tmp_array);
?>
          <?php }?>
          <?php echo implode('<br/>',$_smarty_tpl->tpl_vars['ops']->value);?>

      </td>
      <td>
        
        <?php $_smarty_tpl->_assignInScope('ops', array());
?>
        <?php if (!$_smarty_tpl->tpl_vars['item']->value['installed']) {?>
          <?php if ($_smarty_tpl->tpl_vars['item']->value['can_install']) {?>
            <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', 'op', null);?><a class="modop mod_install" href="<?php echo smarty_cms_function_cms_action_url(array('action'=>'local_install','mod'=>$_smarty_tpl->tpl_vars['item']->value['name']),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('title_install');?>
"><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('install');?>
</a><?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
$_tmp_array = isset($_smarty_tpl->tpl_vars['ops']) ? $_smarty_tpl->tpl_vars['ops']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array[] = $_smarty_tpl->tpl_vars['op']->value;
$_smarty_tpl->_assignInScope('ops', $_tmp_array);
?>
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['item']->value['writable']) {?>
            <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', 'op', null);?><a class="modop mod_remove" href="<?php echo smarty_cms_function_cms_action_url(array('action'=>'local_remove','mod'=>$_smarty_tpl->tpl_vars['item']->value['name']),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('title_remove');?>
"><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('remove');?>
</a><?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
$_tmp_array = isset($_smarty_tpl->tpl_vars['ops']) ? $_smarty_tpl->tpl_vars['ops']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array[] = $_smarty_tpl->tpl_vars['op']->value;
$_smarty_tpl->_assignInScope('ops', $_tmp_array);
?>
          <?php } else { ?>
            <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', 'op', null);?><a class="modop mod_chmod" href="<?php echo smarty_cms_function_cms_action_url(array('action'=>'local_chmod','mod'=>$_smarty_tpl->tpl_vars['item']->value['name']),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('title_chmod');?>
"><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('changeperms');?>
</a><?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
$_tmp_array = isset($_smarty_tpl->tpl_vars['ops']) ? $_smarty_tpl->tpl_vars['ops']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array[] = $_smarty_tpl->tpl_vars['op']->value;
$_smarty_tpl->_assignInScope('ops', $_tmp_array);
?>
          <?php }?>
        <?php } else { ?>
          <?php if ($_smarty_tpl->tpl_vars['item']->value['e_status'] == 'need_upgrade') {?>
              <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', 'op', null);?><a class="modop mod_upgrade" href="<?php echo smarty_cms_function_cms_action_url(array('action'=>'local_upgrade','mod'=>$_smarty_tpl->tpl_vars['item']->value['name']),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('title_upgrade');?>
"><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('upgrade');?>
</a><?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
	      <?php $_tmp_array = isset($_smarty_tpl->tpl_vars['ops']) ? $_smarty_tpl->tpl_vars['ops']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array[] = $_smarty_tpl->tpl_vars['op']->value;
$_smarty_tpl->_assignInScope('ops', $_tmp_array);
?>
          <?php }?>
	  <?php if ($_smarty_tpl->tpl_vars['item']->value['can_uninstall']) {?>
            <?php if ($_smarty_tpl->tpl_vars['item']->value['name'] != 'ModuleManager' || $_smarty_tpl->tpl_vars['allow_modman_uninstall']->value) {?>
              <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', 'op', null);?><a class="modop mod_uninstall" href="<?php echo smarty_cms_function_cms_action_url(array('action'=>'local_uninstall','mod'=>$_smarty_tpl->tpl_vars['item']->value['name']),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('title_uninstall');?>
"><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('uninstall');?>
</a><?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
$_tmp_array = isset($_smarty_tpl->tpl_vars['ops']) ? $_smarty_tpl->tpl_vars['ops']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array[] = $_smarty_tpl->tpl_vars['op']->value;
$_smarty_tpl->_assignInScope('ops', $_tmp_array);
?>
	    <?php }?>
	  <?php }?>
        <?php }?>
        <?php echo implode('<br/>',$_smarty_tpl->tpl_vars['ops']->value);?>

      </td>
      <td>
	
        <?php if ($_smarty_tpl->tpl_vars['item']->value['can_uninstall']) {?>
          <?php if ($_smarty_tpl->tpl_vars['item']->value['active']) {?>
            <a class="modop mod_inactive" href="<?php echo smarty_cms_function_cms_action_url(array('action'=>'local_active','mod'=>$_smarty_tpl->tpl_vars['item']->value['name'],'state'=>0),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('toggle_inactive');?>
"><?php echo smarty_function_admin_icon(array('icon'=>'true.gif'),$_smarty_tpl);?>
</a>
          <?php } else { ?>
            <a class="modop mod_active" href="<?php echo smarty_cms_function_cms_action_url(array('action'=>'local_active','mod'=>$_smarty_tpl->tpl_vars['item']->value['name'],'state'=>1),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('toggle_active');?>
"><?php echo smarty_function_admin_icon(array('icon'=>'false.gif'),$_smarty_tpl);?>
</a>
          <?php }?>
        <?php }?>
      </td>
      <td>
        <a class="modop mod_help" href="<?php echo smarty_cms_function_cms_action_url(array('action'=>'local_help','mod'=>$_smarty_tpl->tpl_vars['item']->value['name']),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('title_modulehelp');?>
"><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('helptxt');?>
</a>
      </td>
      <td>
        <a class="modop mod_about" href="<?php echo smarty_cms_function_cms_action_url(array('action'=>'local_about','mod'=>$_smarty_tpl->tpl_vars['item']->value['name']),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('title_moduleabout');?>
"><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('abouttxt');?>
</a>
      </td>
      <?php if ($_smarty_tpl->tpl_vars['allow_export']->value) {?><td>
        <?php if ($_smarty_tpl->tpl_vars['item']->value['active'] && $_smarty_tpl->tpl_vars['item']->value['root_writable'] && $_smarty_tpl->tpl_vars['item']->value['e_status'] != 'need_upgrade' && !$_smarty_tpl->tpl_vars['item']->value['missing_deps']) {?>
          <a class="modop mod_export" href="<?php echo smarty_cms_function_cms_action_url(array('action'=>'local_export','mod'=>$_smarty_tpl->tpl_vars['item']->value['name']),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('title_moduleexport');?>
"><?php echo smarty_function_admin_icon(array('icon'=>'xml_rss.gif'),$_smarty_tpl);?>
</a>
        <?php }?>
      </td><?php }?>
    </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

  </tbody>
</table>
<?php } else { ?>
  <div class="warning"><?php echo $_smarty_tpl->tpl_vars['ModuleManager']->value->Lang('error_nomodules');?>
</div>
<?php }
}
}
