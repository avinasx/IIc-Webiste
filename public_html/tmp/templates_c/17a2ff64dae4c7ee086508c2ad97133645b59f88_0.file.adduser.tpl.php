<?php
/* Smarty version 3.1.31, created on 2018-07-23 11:27:34
  from "/data/home/iic/public_html/admin/templates/adduser.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b556e4ed5ed14_10515119',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '17a2ff64dae4c7ee086508c2ad97133645b59f88' => 
    array (
      0 => '/data/home/iic/public_html/admin/templates/adduser.tpl',
      1 => 1517033802,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b556e4ed5ed14_10515119 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_form_start')) require_once '/data/home/iic/public_html/lib/plugins/function.form_start.php';
if (!is_callable('smarty_function_tab_header')) require_once '/data/home/iic/public_html/admin/plugins/function.tab_header.php';
if (!is_callable('smarty_function_tab_start')) require_once '/data/home/iic/public_html/admin/plugins/function.tab_start.php';
if (!is_callable('smarty_function_cms_help')) require_once '/data/home/iic/public_html/admin/plugins/function.cms_help.php';
if (!is_callable('smarty_function_html_options')) require_once '/data/home/iic/public_html/lib/smarty/plugins/function.html_options.php';
if (!is_callable('smarty_function_tab_end')) require_once '/data/home/iic/public_html/admin/plugins/function.tab_end.php';
if (!is_callable('smarty_function_form_end')) require_once '/data/home/iic/public_html/lib/plugins/function.form_end.php';
?>
<div class="pagecontainer">
    <h3 class="invisible"><?php echo lang('adduser');?>
</h3>

    <?php echo smarty_function_form_start(array('url'=>'adduser.php'),$_smarty_tpl);?>

    <?php echo smarty_function_tab_header(array('name'=>'user','label'=>lang('profile')),$_smarty_tpl);?>

    <?php if (isset($_smarty_tpl->tpl_vars['groups']->value)) {?>
        <?php echo smarty_function_tab_header(array('name'=>'groups','label'=>lang('groups')),$_smarty_tpl);?>

    <?php }?>
    <?php echo smarty_function_tab_header(array('name'=>'settings','label'=>lang('settings')),$_smarty_tpl);?>


    <?php echo smarty_function_tab_start(array('name'=>'user'),$_smarty_tpl);?>

    <!-- user -->
    <div class="pageoverflow">
        <p class="pagetext">
            <label for="username">*<?php echo lang('name');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('realm'=>'admin','key'=>'info_adduser_username','title'=>lang('name')),$_smarty_tpl);?>

        </p>
        <p class="pageinput">
            <input id="username" type="text" name="user" maxlength="255" value="<?php echo $_smarty_tpl->tpl_vars['user']->value;?>
" class="standard"/>
        </p>
    </div>
    <div class="pageoverflow">
        <p class="pagetext">
            <label for="password">*<?php echo lang('password');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('realm'=>'admin','key'=>'info_edituser_password','title'=>lang('password')),$_smarty_tpl);?>

        </p>
        <p class="pageinput">
            <input type="password" id="password" name="password" maxlength="100" value="<?php echo $_smarty_tpl->tpl_vars['password']->value;?>
" class="standard"/>
        </p>
    </div>
    <div class="pageoverflow">
        <p class="pagetext">
            <label for="passwordagain">*<?php echo lang('passwordagain');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('realm'=>'admin','key'=>'info_edituser_passwordagain','title'=>lang('passwordagain')),$_smarty_tpl);?>

        </p>
        <p class="pageinput">
            <input type="password" id="passwordagain" name="passwordagain" maxlength="100" value="<?php echo $_smarty_tpl->tpl_vars['passwordagain']->value;?>
" class="standard"/>
        </p>
    </div>
    <div class="pageoverflow">
        <p class="pagetext">
            <label for="firstname"><?php echo lang('firstname');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_myaccount_firstname','title'=>lang('firstname')),$_smarty_tpl);?>

        </p>
        <p class="pageinput">
            <input type="text" id="firstname" name="firstname" maxlength="50" value="<?php echo $_smarty_tpl->tpl_vars['firstname']->value;?>
" class="standard"/>
        </p>
    </div>
    <div class="pageoverflow">
        <p class="pagetext">
            <label for="lastname"><?php echo lang('lastname');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_myaccount_lastname','title'=>lang('lastname')),$_smarty_tpl);?>

        </p>
        <p class="pageinput">
            <input type="text" id="lastname" name="lastname" maxlength="50" value="<?php echo $_smarty_tpl->tpl_vars['lastname']->value;?>
" class="standard"/>
        </p>
    </div>
    <div class="pageoverflow">
        <p class="pagetext">
            <label for="email"><?php echo lang('email');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'help_myaccount_email','title'=>lang('email')),$_smarty_tpl);?>

        </p>
        <p class="pageinput">
            <input type="text" id="email" name="email" maxlength="255" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
" class="standard"/>
        </p>
    </div>
    <div class="pageoverflow">
        <p class="pagetext">
            <?php echo lang('active');?>
:&nbsp;<?php echo smarty_function_cms_help(array('realm'=>'admin','key'=>'info_user_active','title'=>lang('active')),$_smarty_tpl);?>

        </p>
        <p class="pageinput">
            <input type="checkbox" class="pagecheckbox" name="active" value="1"<?php if ($_smarty_tpl->tpl_vars['active']->value == 1) {?> checked="checked"<?php }?>/>
        </p>
    </div>

    <?php if (isset($_smarty_tpl->tpl_vars['groups']->value)) {?>
    <!-- groups -->
    <?php echo smarty_function_tab_start(array('name'=>'groups'),$_smarty_tpl);?>

    <div class="pageverflow">
        <p class="pagetext">
            <?php echo lang('groups');?>
:&nbsp;<?php echo smarty_function_cms_help(array('realm'=>'admin','key'=>'info_membergroups','title'=>lang('groups')),$_smarty_tpl);?>

        </p>
        <div class="pageinput">
            <div class="group_memberships clear">
                <table class="pagetable">
                    <thead>
                        <tr>
                            <th class="pageicon"></th>
                            <th><?php echo lang('name');?>
</th>
                            <th><?php echo lang('description');?>
</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['groups']->value, 'onegroup');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['onegroup']->value) {
?>
                        <tr>
                            <td>
                            <input type="checkbox" name="sel_groups[]" id="g<?php echo $_smarty_tpl->tpl_vars['onegroup']->value->id;?>
" value="<?php echo $_smarty_tpl->tpl_vars['onegroup']->value->id;?>
" <?php if (in_array($_smarty_tpl->tpl_vars['onegroup']->value->id,$_smarty_tpl->tpl_vars['sel_groups']->value)) {?>checked="checked"<?php }?>/> </td>
                            <td><label for="g<?php echo $_smarty_tpl->tpl_vars['onegroup']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['onegroup']->value->name;?>
</label></td>
                            <td><?php echo $_smarty_tpl->tpl_vars['onegroup']->value->description;?>
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
        </div>
    </div>
    <?php }?>

    <!-- settings -->
    <?php echo smarty_function_tab_start(array('name'=>'settings'),$_smarty_tpl);?>

    <div class="pageoverflow">
        <p class="pagetext">
            <?php echo lang('copyusersettings');?>
:&nbsp;<?php echo smarty_function_cms_help(array('realm'=>'admin','key'=>'info_copyusersettings','title'=>lang('copyusersettings')),$_smarty_tpl);?>

        </p>
        <p class="pageinput">
            <select name="copyusersettings">
                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['users']->value),$_smarty_tpl);?>

            </select>
        </p>
    </div>
    <?php echo smarty_function_tab_end(array(),$_smarty_tpl);?>


    <div class="pageoverflow">
        <input type="submit" id="submit" name="submit" value="<?php echo lang('submit');?>
"/>
        <input type="submit" name="cancel" value="<?php echo lang('cancel');?>
"/>
    </div>
    <?php echo smarty_function_form_end(array(),$_smarty_tpl);?>

</div><?php }
}
