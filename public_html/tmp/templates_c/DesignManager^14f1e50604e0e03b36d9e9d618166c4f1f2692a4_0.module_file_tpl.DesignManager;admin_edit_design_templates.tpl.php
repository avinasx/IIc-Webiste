<?php
/* Smarty version 3.1.31, created on 2018-07-23 12:01:06
  from "module_file_tpl:DesignManager;admin_edit_design_templates.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b55762a764f17_77912309',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '14f1e50604e0e03b36d9e9d618166c4f1f2692a4' => 
    array (
      0 => 'module_file_tpl:DesignManager;admin_edit_design_templates.tpl',
      1 => 1517033802,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b55762a764f17_77912309 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_cms_function_cms_action_url')) require_once '/data/home/iic/public_html/lib/plugins/function.cms_action_url.php';
?>
<style type="text/css">
#available-templates li.selected {
   background-color: #147fdb;
}
#template_sel li:focus {
   color: #147fdb;
}
#template_sel li a:focus {
   color: #147fdb;
}
#template_sel a.ui-icon+a:focus {
   border: 2px solid #147fdb;
}
</style>

<div class="information"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('info_edittemplate_templates_tab');?>
</div>
<?php if (!isset($_smarty_tpl->tpl_vars['all_templates']->value)) {?>
<div class="pagewarning"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('warning_edittemplate_notemplates');?>
</div>
<?php } else { ?>

<?php $_smarty_tpl->_assignInScope('tmpl', $_smarty_tpl->tpl_vars['design']->value->get_templates());
?>
<div class="c_full cf" id="template_sel">
    <div class="grid_6 draggable-area">
        <fieldset>
            <legend><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('available_templates');?>
</legend>
            <div id="available-templates">
                <ul class="sortable-templates sortable-list available-items available-templates">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['all_templates']->value, 'tpl');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tpl']->value) {
?>
                    <?php if (!$_smarty_tpl->tpl_vars['tmpl']->value || !in_array($_smarty_tpl->tpl_vars['tpl']->value->get_id(),$_smarty_tpl->tpl_vars['tmpl']->value)) {?>
                        <li class="ui-state-default" data-cmsms-item-id="<?php echo $_smarty_tpl->tpl_vars['tpl']->value->get_id();?>
" tabindex="0">
                            <span><?php echo $_smarty_tpl->tpl_vars['tpl']->value->get_name();?>
</span>
                            <input class="hidden" type="checkbox" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
assoc_tpl[]" value="<?php echo $_smarty_tpl->tpl_vars['tpl']->value->get_id();?>
"/>
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
            <legend><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('attached_templates');?>
</legend>
            <div id="selected-templates">
                <ul class="sortable-templates sortable-list selected-templates">
                    <?php if (count($_smarty_tpl->tpl_vars['design']->value->get_templates()) == 0) {?><li class="placeholder no-sort"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('drop_items');?>
</li><?php }?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['all_templates']->value, 'tpl');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tpl']->value) {
?>
                        <?php if ($_smarty_tpl->tpl_vars['tmpl']->value && in_array($_smarty_tpl->tpl_vars['tpl']->value->get_id(),$_smarty_tpl->tpl_vars['tmpl']->value)) {?>
                            <li class="ui-state-default cf sortable-item no-sort" data-cmsms-item-id="<?php echo $_smarty_tpl->tpl_vars['tpl']->value->get_id();?>
" tabindex="-1">
			        <?php if ($_smarty_tpl->tpl_vars['manage_templates']->value) {?>
                                <a href="<?php echo smarty_cms_function_cms_action_url(array('action'=>'admin_edit_template','tpl'=>$_smarty_tpl->tpl_vars['tpl']->value->get_id()),$_smarty_tpl);?>
" class="edit_tpl" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('edit_template');?>
"><?php echo $_smarty_tpl->tpl_vars['tpl']->value->get_name();?>
</a>
				<?php } else { ?>
				<span><?php echo $_smarty_tpl->tpl_vars['tpl']->value->get_name();?>
</span>
				<?php }?>
                                <a href="#" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('remove');?>
" class="ui-icon ui-icon-trash sortable-remove"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('remove');?>
</a>
                                <input class="hidden" type="checkbox" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
assoc_tpl[]" value="<?php echo $_smarty_tpl->tpl_vars['tpl']->value->get_id();?>
" checked="checked"/>
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
</div>
<?php echo '<script'; ?>
>
function find_sortable_focus(in_e) {
   var _list = $(':tabbable');
   var _idx = _list.index(in_e);
   var _out_e = _list.eq(_idx+1).length ? _list.eq(_idx+1) : _list.eq(0);
   _out_e.focus();
}

$(function() {
    var _manage_templates = '<?php echo $_smarty_tpl->tpl_vars['manage_templates']->value;?>
';
    var _edit_url = '<?php echo smarty_cms_function_cms_action_url(array('action'=>'admin_edit_template','tpl'=>'xxxx','forjs'=>1),$_smarty_tpl);?>
';
    $('ul.sortable-templates').sortable({
        connectWith: '#selected-templates ul',
        delay: 150,
        revert: true,
        placeholder: 'ui-state-highlight',
        items: 'li:not(.no-sort)',
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

            $('.sortable-templates .placeholder').hide();

            $(elements).each(function(){
		var _tpl_id = $(this).data('cmsms-item-id');
		var _url = _edit_url.replace('xxxx',_tpl_id);
		var _text = $(this).text().trim();
		var _e;
		if( _manage_templates ) {
		    _e = $('<a/>').attr('href',_url).text(_text).addClass('edit_tpl unsaved').attr('title','<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('edit_template');?>
');
		} else {
		    _e = $('<span/>').text(_text);
		}
		$('span',this).remove();
		$(this).append(_e);
		$(this).removeClass('selected ui-state-hover')
	               .attr('tabindex',-1)
                       .addClass('unsaved no-sort')
                       .append($('<a href="#"/>').addClass('ui-icon ui-icon-trash sortable-remove').text('Remove'))
                       .find('input[type="checkbox"]').attr('checked', true);
	    });
	    set_changed();
        }
    });

    $(document).on('click', '#available-templates li',function(ev) {
        $(this).focus();
    });

    $(document).on('click', '#selected-templates li',function(ev) {
        $('a:first',this).focus();
    });

    $(document).on('keyup', '#available-templates li',function(ev) {
        if( ev.keyCode == $.ui.keyCode.ESCAPE ) {
	    // escape
	    $('#available-templates li').removeClass('selected');
	    ev.preventDefault();
	}
        if( ev.keyCode == $.ui.keyCode.SPACE || ev.keyCode == 107 ) {
	   // spacebar or plus
	   console.debug('selected');
	   ev.preventDefault();
	   $(this).toggleClass('selected ui-state-hover');
	   find_sortable_focus(this);
	}
	else if( ev.keyCode == 39 ) {
	   // right arrow.
	   $('#available-templates li.selected').each(function(){
	      $(this).removeClass('selected');
	      var _tpl_id = $(this).data('cmsms-item-id');
	      var _url = _edit_url.replace('xxxx',_tpl_id);
	      var _text = $(this).text().trim();

	      var _el = $(this).clone();
	      var _a;
	      if( _manage_templates ) {
	      	  _a = $('<a/>').attr('href',_url).text(_text).addClass('edit_tpl unsaved').attr('title','<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('edit_template');?>
');
   	      } else {
	          _a = $('<span/>').text(_text);
	      }
	      $('span',_el).remove();
	      $(_el).append(_a);
	      $(_el).removeClass('selected ui-state-hover')
	               .attr('tabindex',-1)
                       .addClass('unsaved no-sort')
                       .append($('<a href="#"/>').addClass('ui-icon ui-icon-trash sortable-remove').text('<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('remove');?>
').attr('title','<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('remove');?>
'))
                       .find('input[type="checkbox"]').attr('checked', true);
	      $('#selected-templates > ul').append(_el);
	      $(this).remove();
	      set_changed();

	      // set focus somewhere
	      find_sortable_focus(this);
	   });
	   console.debug('got arrow');
	}
    });

    $(document).on('click', '#selected-templates .sortable-remove', function(e) {
        // click on remove icon
        e.preventDefault();
	set_changed();
        $(this).next('input[type="checkbox"]').attr('checked', false);
        $(this).parent('li').removeClass('no-sort').appendTo('#available-templates ul');
        $(this).remove();
    });

    $(document).on('click','a.edit_tpl',function(ev){
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
       // normal default link behavior.
    });
});
<?php echo '</script'; ?>
>
<?php }
}
}
