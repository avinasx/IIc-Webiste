<?php
/* Smarty version 3.1.31, created on 2018-07-20 07:04:40
  from "module_file_tpl:FileManager;uploadview.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b513c30435ef0_67028535',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f12a60a341e501b238b12967d7d770753147e1c6' => 
    array (
      0 => 'module_file_tpl:FileManager;uploadview.tpl',
      1 => 1517033802,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b513c30435ef0_67028535 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript">
$(function() {
   var _jqXHR = [];  // jqXHR array
   var _files = [];  // filenames

    // prevent browser default drag/drop handling
    $(document).bind('drop dragover', function(e) {
        // prevent default drag/drop stuff.
        e.preventDefault();
    });

    $(document).on('click', '#cancel', function(e){
        e.preventDefault();
        aborting = true;
        var ul = $('#fileupload').data('fileupload');
        if( typeof ul != 'undef' )
        {
          var data = {};
          data.errorThrown = 'abort';
	  ul._trigger('fail', e, data);
        }
    });

    // create our file upload area.
    $('#fileupload').fileupload({

        add: function(e, data) {
            _files.push(data.files[0].name);
            _jqXHR.push(data.submit());
        },

    	dataType: 'json',
    	dropZone: $('#dropzone'),
    	maxChunkSize: <?php echo $_smarty_tpl->tpl_vars['max_chunksize']->value;?>
,

    	start: function(e,data){
		$('#cancel').show();
    		$('#progressarea').show();
    	},

    	done: function(e,data){
		_files = [];
		_jqXHR = [];
        },

        fail: function(e, data) {
            $.each(_jqXHR, function(index,obj){
                if( typeof obj == 'object' )
 		{
		  obj.abort();
		  if( index < _files.length && typeof data.url != 'undefined' ) {
  		    // now delete the file.
                    var turl = '<?php echo $_smarty_tpl->tpl_vars['action_url']->value;?>
';
		    turl = turl.replace(/amp;/g,'') + '&' + $.param({ file: _files[index] });
		    $.ajax({
	               url: turl,
                       type: 'DELETE'
                    });
                  }
                }
            });
	    _jqXHR = [];
            _files = [];
        },

        progressall: function(e, data) {
        	// overall progress callback
        	var perc = (data.loaded / data.total * 100).toFixed(2);
            var total = null;
            total = (data.loaded / data.total * 100).toFixed(0);
            var str = perc + ' %';
        	//console.log(total);
        	barValue(total);
        		function barValue(total) {
                    	$("#progressarea").progressbar({
                    		value: parseInt(total)
                    	});
                    	$(".ui-progressbar-value").html(str);
        		}
        },

        stop: function(e, data) {
            $('#filesarea').load(refresh_url);
            $('#cancel').fadeOut();
            $('#progressarea').fadeOut();
        }
    });
});
<?php echo '</script'; ?>
>

<style type="text/css">
.upload-wrapper {
	margin: 10px 0
}
.hcentered {
	text-align: center
	}
.vcentered {
	display: table-cell;
	vertical-align: middle
   }
#dropzone {
	margin: 15px 0;
	border-radius: 4px;
	border: 2px dashed #ccc
	}
#dropzone:hover{
	cursor: move
}
#progressarea {
	margin: 15px;
	height: 2em;
	line-height: 2em;
	text-align: center;
	border: 1px solid #aaa;
	border-radius: 4px;
	display: none
	}
</style>

<?php echo $_smarty_tpl->tpl_vars['formstart']->value;?>

<input type="hidden" name="disable_buffer" value="1"/>
<fieldset>
<?php if (isset($_smarty_tpl->tpl_vars['is_ie']->value)) {?>
<div class="pageerrorcontainer message">
  <p class="pageerror"><?php echo $_smarty_tpl->tpl_vars['ie_upload_message']->value;?>
</p>
</div>
<?php }?>
<div class="upload-wrapper">
<div style="width: 60%; float: left;">
  
  <input id="fileupload" type="file" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
files[]" size="50" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('title_filefield');?>
" multiple/>
  <div id="pageoverflow">
    <p class="pagetext"></p>
    <p class="pageinput">
      <input id="cancel" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('cancel');?>
" style="display: none;"/>
    </p>
  </div>
</div>
<div id="leftcol" style="height: 4em; width: 40%; float: left; display: table;">
  <?php if (!isset($_smarty_tpl->tpl_vars['is_ie']->value)) {?>
  <div id="dropzone" class="vcentered hcentered" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('title_dropzone');?>
"><p id="dropzonetext"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_dropfiles');?>
</p></div>
  <?php }?>
</div>
<div class="clearb"></div>
<div id="progressarea"></div>
</div>
</fieldset>
<?php echo $_smarty_tpl->tpl_vars['formend']->value;?>

<?php }
}
