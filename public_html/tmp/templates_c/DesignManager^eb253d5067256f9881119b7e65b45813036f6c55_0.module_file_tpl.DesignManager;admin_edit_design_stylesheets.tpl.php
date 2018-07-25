<?php
/* Smarty version 3.1.31, created on 2018-07-23 12:01:06
  from "module_file_tpl:DesignManager;admin_edit_design_stylesheets.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b55762a879f32_00199421',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eb253d5067256f9881119b7e65b45813036f6c55' => 
    array (
      0 => 'module_file_tpl:DesignManager;admin_edit_design_stylesheets.tpl',
      1 => 1517033802,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b55762a879f32_00199421 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_cms_function_cms_action_url')) require_once '/data/home/iic/public_html/lib/plugins/function.cms_action_url.php';
?>

<style type="text/css">
#available-stylesheets li.selected {
   background-color: #147fdb;
}
#available-stylesheets li:focus {
   color: #147fdb;
}
#selected-stylesheets li a:focus {
   color: #147fdb;
}
#selected-stylesheets a.ui-icon+a:focus {
   border: 2px solid #147fdb;
}
</style>

<div class="information"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('info_edittemplate_stylesheets_tab');?>
</div>
<?php if (!isset($_smarty_tpl->tpl_vars['all_stylesheets']->value)) {?>
  <div class="warning" style="width: 95%;"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('warning_editdesign_nostylesheets');?>
</div>
<?php } else { ?>
  <?php $_smarty_tpl->_assignInScope('cssl', $_smarty_tpl->tpl_vars['design']->value->get_stylesheets());
?>
  <div class="c_full cf">
    <div class="grid_6 draggable-area">
        <fieldset>
            <legend><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('available_stylesheets');?>
</legend>
            <div id="available-stylesheets">
                <ul class="sortable-stylesheets sortable-list available-items available-stylesheets">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['all_stylesheets']->value, 'css');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['css']->value) {
?>
                    <?php if (!$_smarty_tpl->tpl_vars['cssl']->value || !in_array($_smarty_tpl->tpl_vars['css']->value->get_id(),$_smarty_tpl->tpl_vars['cssl']->value)) {?>
                        <li class="ui-state-default" data-cmsms-item-id="<?php echo $_smarty_tpl->tpl_vars['css']->value->get_id();?>
" tabindex="0">
                            <span><?php echo $_smarty_tpl->tpl_vars['css']->value->get_name();?>
</span>
                            <input class="hidden" type="checkbox" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
assoc_css[]" value="<?php echo $_smarty_tpl->tpl_vars['css']->value->get_id();?>
" tabindex="-1" />
                        </li>
                    <?php }?>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

                </ul>
            </div>
        </fieldset>
    </div>
    <div class="grid_6">
        <fieldset>
            <legend><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('attached_stylesheets');?>
</legend>
            <div id="selected-stylesheets">
                <ul class="sortable-stylesheets sortable-list selected-stylesheets">
                    <?php if (count($_smarty_tpl->tpl_vars['design']->value->get_stylesheets()) == 0) {?><li class="placeholder"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('drop_items');?>
</li><?php }?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['design']->value->get_stylesheets(), 'one');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['one']->value) {
?>
                        <li class="ui-state-default cf sortable-item" data-cmsms-item-id="<?php echo $_smarty_tpl->tpl_vars['one']->value;?>
">
                            <a href="<?php echo smarty_cms_function_cms_action_url(array('action'=>'admin_edit_css','css'=>$_smarty_tpl->tpl_vars['one']->value),$_smarty_tpl);?>
" class="edit_css" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('edit_stylesheet');?>
"><?php echo $_smarty_tpl->tpl_vars['list_stylesheets']->value[$_smarty_tpl->tpl_vars['one']->value];?>
</a>
                            <a href="#" "title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('remove');?>
" class="ui-icon ui-icon-trash sortable-remove" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('remove');?>
"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('remove');?>
</a>
                            <input class="hidden" type="checkbox" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
assoc_css[]" value="<?php echo $_smarty_tpl->tpl_vars['one']->value;?>
" checked="checked" tabindex="-1"/>
                        </li>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

                </ul>
            </div>
        </fieldset>
    </div>
  </div>
  <?php echo '<script'; ?>
>
  $(function() {
    var _edit_url = '<?php echo smarty_cms_function_cms_action_url(array('action'=>'admin_edit_css','css'=>'xxxx','forjs'=>1),$_smarty_tpl);?>
';
    $('ul.sortable-stylesheets').sortable({
        connectWith: '#selected-stylesheets ul',
        delay: 150,
        revert: true,
        placeholder: 'ui-state-highlight',
        items: 'li:not(.placeholder)',
        helper: function (event, ui) {
            if (!ui.hasClass('selected')) {
                ui.addClass('selected')
                  .siblings()
                  .removeClass('selected');
            }

            var elements = ui.parent()
                             .children('.selected')
                             .clone(),
                helper = $('<li/>');

            ui.data('multidrag', elements).siblings('.selected').remove();
            return helper.append(elements);
        },
        stop: function (event, ui) {
            var elements = ui.item.data('multidrag');

            ui.item.after(elements).remove();
        },
        receive: function(event, ui) {
            var elements = ui.item.data('multidrag');

            $('.sortable-stylesheets .placeholder').hide();
            $(elements).removeClass('selected ui-state-hover')
                       .append($('<a href="#"/>').addClass('ui-icon ui-icon-trash sortable-remove').text('Remove'))
                       .find('input[type="checkbox"]').attr('checked', true);
        }

    });

    $(document).on('click', '#available-stylesheets li',function(ev) {
        $(this).focus();
    });

    $(document).on('click', '#selected-stylesheets li',function(ev) {
        $('a:first',this).focus();
    });

    $(document).on('keyup','#available-stylesheets li',function(ev){
        if( ev.keyCode == $.ui.keyCode.ESCAPE ) {
          // escape
          $('#selected-stylesheets li').removeClass('selected');
          ev.preventDefault();
        }
        else if( ev.keyCode == $.ui.keyCode.SPACE || ev.keyCode == 107 ) {
          // spacebar or plus
	  ev.preventDefault();
          $(this).toggleClass('selected ui-state-hover');
          find_sortable_focus(this);
        }
        else if( ev.keyCode == 39 ) {
          // right arrow
          ev.preventDefault();
          $('#available-stylesheets li.selected').each(function(){
            $(this).removeClass('selected ui-state-hover');
            var _css_id = $(this).data('cmsms-item-id');
            var _url = _edit_url.replace('xxx',_css_id);
            var _text = $(this).text().trim();

            var _el = $(this).clone();
            var _a;
            _a = $('<a/>').attr('href',_url).text(_text).addClass('edit_css unsaved').
                      attr('title','<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('edit_stylesheet');?>
');
            $('span',_el).remove();
            $(_el).append(_a);
            $(_el).removeClass('selected ui-state-hover')
	         .attr('tabindex',-1)
                 .addClass('unsaved no-sort')
                 .append($('<a href="#"/>').addClass('ui-icon ui-icon-trash sortable-remove').text('<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('remove');?>
').attr('title','<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('remove');?>
'))
                 .find('input[type="checkbox"]').attr('checked',true);
            $('#selected-stylesheets > ul').append(_el);
            $(this).remove();
            set_changed();

            // set focus somewhere
            find_sortable_focus(this);
          });
        }
    });

    $(document).on('click', '#selected-stylesheets .sortable-remove', function(e) {
        e.preventDefault();
        set_changed();
        $(this).next('input[type="checkbox"]').attr('checked', false);
        $(this).parent('li').appendTo('#available-stylesheets ul');
        $(this).remove();
    });

    $(document).on('click','a.edit_css',function(ev){
       if( __changed ) {
           ev.preventDefault();
          var url = $(this).attr('href');
      	  cms_confirm('<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('confirm_save_design');?>
').done(function(){
             // save and redirect
	     save_design().done(function(){
	        window.location.href = url;
	     });
	  });
       }
    });

  });
  <?php echo '</script'; ?>
>
<?php }
}
}
