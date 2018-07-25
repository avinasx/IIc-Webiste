<?php
/* Smarty version 3.1.31, created on 2018-07-23 11:28:35
  from "module_file_tpl:News;editarticle.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b556e8bbcca60_88781715',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '45074dbff892af300d36f79789acf106c29db5df' => 
    array (
      0 => 'module_file_tpl:News;editarticle.tpl',
      1 => 1517033802,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b556e8bbcca60_88781715 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_cms_help')) require_once '/data/home/iic/public_html/admin/plugins/function.cms_help.php';
if (!is_callable('smarty_function_html_options')) require_once '/data/home/iic/public_html/lib/smarty/plugins/function.html_options.php';
if (!is_callable('smarty_function_html_select_date')) require_once '/data/home/iic/public_html/lib/smarty/plugins/function.html_select_date.php';
if (!is_callable('smarty_function_html_select_time')) require_once '/data/home/iic/public_html/lib/smarty/plugins/function.html_select_time.php';
if (!is_callable('smarty_cms_function_cms_yesno')) require_once '/data/home/iic/public_html/lib/plugins/function.cms_yesno.php';
if (!is_callable('smarty_function_cms_textarea')) require_once '/data/home/iic/public_html/lib/plugins/function.cms_textarea.php';
if (!is_callable('smarty_function_thumbnail_url')) require_once '/data/home/iic/public_html/lib/plugins/function.thumbnail_url.php';
if (!is_callable('smarty_function_cms_filepicker')) require_once '/data/home/iic/public_html/admin/plugins/function.cms_filepicker.php';
echo '<script'; ?>
 type="text/javascript">
    $(document).ready(function () {
        $('[name$=apply],[name$=submit]').hide();

        $('#edit_news').dirtyForm({
            onDirty : function () {
                $('[name$=apply],[name$=submit]').show('slow');
            }
        });
        $(document).on('cmsms_textchange', function (event) {
            // editor text change, set the form dirty.
            $('#edit_news').dirtyForm('option', 'dirty', true);
        });
        $(document).on('click', '[name$=submit],[name$=apply],[name$=cancel]', function () {
            $('#edit_news').dirtyForm('option', 'disabled', true);
        });
        $('#fld11').click(function () {
            $('#expiryinfo').toggle('slow');
        });
        $('[name$=cancel]').click(function () {
            $(this).closest('form').attr('novalidate', 'novalidate');
        });
    });
<?php echo '</script'; ?>
>
<h3><?php if (isset($_smarty_tpl->tpl_vars['articleid']->value)) {
echo $_smarty_tpl->tpl_vars['mod']->value->Lang('editarticle');
} else {
echo $_smarty_tpl->tpl_vars['mod']->value->Lang('addarticle');
}?></h3>
<div id="editarticle_result"></div><div id="edit_news"><?php echo $_smarty_tpl->tpl_vars['startform']->value;?>
<div class="pageoptions"><p class="pageinput"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['hidden']->value)===null||$tmp==='' ? '' : $tmp);?>
<input type="submit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
submit" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('submit');?>
"/><input type="submit" id="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
cancel" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
cancel" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('cancel');?>
"/><?php if (isset($_smarty_tpl->tpl_vars['articleid']->value)) {?><input type="submit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
apply" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('apply');?>
"/><?php }?></p></div><?php if (isset($_smarty_tpl->tpl_vars['start_tab_headers']->value)) {
echo $_smarty_tpl->tpl_vars['start_tab_headers']->value;
echo $_smarty_tpl->tpl_vars['tabheader_article']->value;
echo $_smarty_tpl->tpl_vars['tabheader_preview']->value;
echo $_smarty_tpl->tpl_vars['end_tab_headers']->value;
echo $_smarty_tpl->tpl_vars['start_tab_content']->value;
echo $_smarty_tpl->tpl_vars['start_tab_article']->value;
}?><div id="edit_article"><?php if ($_smarty_tpl->tpl_vars['inputauthor']->value) {?><div class="pageoverflow"><p class="pagetext">*<?php echo $_smarty_tpl->tpl_vars['authortext']->value;?>
:</p><p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['inputauthor']->value;?>
</p></div><?php }?><div class="pageoverflow"><p class="pagetext"><label for="fld1">*<?php echo $_smarty_tpl->tpl_vars['titletext']->value;?>
:</label> <?php echo smarty_function_cms_help(array('key'=>'help_article_title','title'=>$_smarty_tpl->tpl_vars['titletext']->value),$_smarty_tpl);?>
</p><p class="pageinput"><input type="text" id="fld1" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
title" value="<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
" size="80" maxlength="255" required/></p></div><div class="pageoverflow"><p class="pagetext"><label for="fld2">*<?php echo $_smarty_tpl->tpl_vars['categorytext']->value;?>
:</label> <?php echo smarty_function_cms_help(array('key'=>'help_article_category','title'=>$_smarty_tpl->tpl_vars['categorytext']->value),$_smarty_tpl);?>
</p><p class="pageinput"><select name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
category" id="fld2"><?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['categorylist']->value,'selected'=>$_smarty_tpl->tpl_vars['category']->value),$_smarty_tpl);?>
</select></p></div><?php if (!isset($_smarty_tpl->tpl_vars['hide_summary_field']->value) || $_smarty_tpl->tpl_vars['hide_summary_field']->value == '0') {?><div class="pageoverflow"><p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['summarytext']->value;?>
: <?php echo smarty_function_cms_help(array('key'=>'help_article_summary','title'=>$_smarty_tpl->tpl_vars['summarytext']->value),$_smarty_tpl);?>
</p><p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['inputsummary']->value;?>
</p></div><?php }?><div class="pageoverflow"><p class="pagetext">*<?php echo $_smarty_tpl->tpl_vars['contenttext']->value;?>
: <?php echo smarty_function_cms_help(array('key'=>'help_article_content','title'=>$_smarty_tpl->tpl_vars['contenttext']->value),$_smarty_tpl);?>
</p><p class="pageinput"><?php echo $_smarty_tpl->tpl_vars['inputcontent']->value;?>
</p></div><?php if (isset($_smarty_tpl->tpl_vars['statustext']->value)) {?><div class="pageoverflow"><p class="pagetext"><label for="fld9">*<?php echo $_smarty_tpl->tpl_vars['statustext']->value;?>
:</label> <?php echo smarty_function_cms_help(array('key'=>'help_article_status','title'=>$_smarty_tpl->tpl_vars['statustext']->value),$_smarty_tpl);?>
</p><p class="pageinput"><select id="fld9" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
status"><?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['statuses']->value,'selected'=>$_smarty_tpl->tpl_vars['status']->value),$_smarty_tpl);?>
</select></p></div><?php } else { ?><input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
status" value="<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
"/><?php }?><div class="pageoverflow"><p class="pagetext"><label for="fld7"><?php echo $_smarty_tpl->tpl_vars['urltext']->value;?>
:</label> <?php echo smarty_function_cms_help(array('key'=>'help_article_url','title'=>$_smarty_tpl->tpl_vars['urltext']->value),$_smarty_tpl);?>
</p><p class="pageinput"><input type="text" id="fld7" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
news_url" value="<?php echo $_smarty_tpl->tpl_vars['news_url']->value;?>
" size="50" maxlength="255"/></p></div><div class="pageoverflow"><p class="pagetext"><label for="fld5"><?php echo $_smarty_tpl->tpl_vars['extratext']->value;?>
:</label> <?php echo smarty_function_cms_help(array('key'=>'help_article_extra','title'=>$_smarty_tpl->tpl_vars['extratext']->value),$_smarty_tpl);?>
</p><p class="pageinput"><input type="text" id="fld5" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
extra" value="<?php echo $_smarty_tpl->tpl_vars['extra']->value;?>
" size="50" maxlength="255"/></p></div><div class="pageoverflow"><p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['postdatetext']->value;?>
: <?php echo smarty_function_cms_help(array('key'=>'help_article_postdate','title'=>$_smarty_tpl->tpl_vars['postdatetext']->value),$_smarty_tpl);?>
</p><p class="pageinput"><?php echo smarty_function_html_select_date(array('prefix'=>$_smarty_tpl->tpl_vars['postdateprefix']->value,'time'=>$_smarty_tpl->tpl_vars['postdate']->value,'start_year'=>'1980','end_year'=>'+15'),$_smarty_tpl);?>
 <?php echo smarty_function_html_select_time(array('prefix'=>$_smarty_tpl->tpl_vars['postdateprefix']->value,'time'=>$_smarty_tpl->tpl_vars['postdate']->value),$_smarty_tpl);?>
</p></div><div class="pageoverflow"><p class="pagetext"><label for="searchable"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('searchable');?>
:</label> <?php echo smarty_function_cms_help(array('key'=>'help_article_searchable','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('searchable')),$_smarty_tpl);?>
</p><p class="pageinput"><select name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
searchable" id="searchable"><?php echo smarty_cms_function_cms_yesno(array('selected'=>$_smarty_tpl->tpl_vars['searchable']->value),$_smarty_tpl);?>
</select><br/><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('info_searchable');?>
</p></div><div class="pageoverflow"><p class="pagetext"><label for="fld11"><?php echo $_smarty_tpl->tpl_vars['useexpirationtext']->value;?>
:</label> <?php echo smarty_function_cms_help(array('key'=>'help_article_useexpiry','title'=>$_smarty_tpl->tpl_vars['useexpirationtext']->value),$_smarty_tpl);?>
</p><p class="pageinput"><input id="fld11" type="checkbox" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
useexp" <?php if ($_smarty_tpl->tpl_vars['useexp']->value == 1) {?>checked="checked"<?php }?> class="pagecheckbox" /></p></div><div id="expiryinfo" <?php if ($_smarty_tpl->tpl_vars['useexp']->value != 1) {?>style="display: none;"<?php }?>><div class="pageoverflow"><p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['startdatetext']->value;?>
: <?php echo smarty_function_cms_help(array('key'=>'help_article_startdate','title'=>$_smarty_tpl->tpl_vars['startdatetext']->value),$_smarty_tpl);?>
</p><p class="pageinput"><?php echo smarty_function_html_select_date(array('prefix'=>$_smarty_tpl->tpl_vars['startdateprefix']->value,'time'=>$_smarty_tpl->tpl_vars['startdate']->value,'start_year'=>"-10",'end_year'=>"+15"),$_smarty_tpl);?>
 <?php echo smarty_function_html_select_time(array('prefix'=>$_smarty_tpl->tpl_vars['startdateprefix']->value,'time'=>$_smarty_tpl->tpl_vars['startdate']->value),$_smarty_tpl);?>
</p></div><div class="pageoverflow"><p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['enddatetext']->value;?>
: <?php echo smarty_function_cms_help(array('key'=>'help_article_enddate','title'=>$_smarty_tpl->tpl_vars['enddatetext']->value),$_smarty_tpl);?>
</p><p class="pageinput"><?php echo smarty_function_html_select_date(array('prefix'=>$_smarty_tpl->tpl_vars['enddateprefix']->value,'time'=>$_smarty_tpl->tpl_vars['enddate']->value,'start_year'=>"-10",'end_year'=>"+15"),$_smarty_tpl);?>
 <?php echo smarty_function_html_select_time(array('prefix'=>$_smarty_tpl->tpl_vars['enddateprefix']->value,'time'=>$_smarty_tpl->tpl_vars['enddate']->value),$_smarty_tpl);?>
</p></div></div><?php if (isset($_smarty_tpl->tpl_vars['custom_fields']->value)) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['custom_fields']->value, 'field');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['field']->value) {
?><div class="pageoverflow"><p class="pagetext"><label for="<?php echo $_smarty_tpl->tpl_vars['field']->value->idattr;?>
"><?php echo $_smarty_tpl->tpl_vars['field']->value->prompt;?>
:</label></p><p class="pageinput"><?php if ($_smarty_tpl->tpl_vars['field']->value->type == 'textbox') {?><input type="text" id="<?php echo $_smarty_tpl->tpl_vars['field']->value->idattr;?>
" name="<?php echo $_smarty_tpl->tpl_vars['field']->value->nameattr;?>
" value="<?php echo $_smarty_tpl->tpl_vars['field']->value->value;?>
" size="<?php echo $_smarty_tpl->tpl_vars['field']->value->size;?>
" maxlength="<?php echo $_smarty_tpl->tpl_vars['field']->value->max_len;?>
" /><?php } elseif ($_smarty_tpl->tpl_vars['field']->value->type == 'checkbox') {?><input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['field']->value->nameattr;?>
" value="0" /><input type="checkbox" id="<?php echo $_smarty_tpl->tpl_vars['field']->value->idattr;?>
" name="<?php echo $_smarty_tpl->tpl_vars['field']->value->nameattr;?>
" value="1"<?php if ($_smarty_tpl->tpl_vars['field']->value->value == 1) {?> checked="checked"<?php }?> /><?php } elseif ($_smarty_tpl->tpl_vars['field']->value->type == 'textarea') {
echo smarty_function_cms_textarea(array('id'=>$_smarty_tpl->tpl_vars['field']->value->idattr,'name'=>$_smarty_tpl->tpl_vars['field']->value->nameattr,'enablewysiwyg'=>1,'value'=>$_smarty_tpl->tpl_vars['field']->value->value,'maxlength'=>$_smarty_tpl->tpl_vars['field']->value->max_len),$_smarty_tpl);
} elseif ($_smarty_tpl->tpl_vars['field']->value->type == 'file') {
if (!empty($_smarty_tpl->tpl_vars['field']->value->value)) {
echo $_smarty_tpl->tpl_vars['field']->value->value;?>
<br /><?php }?> <input type="file" id="<?php echo $_smarty_tpl->tpl_vars['field']->value->idattr;?>
" name="<?php echo $_smarty_tpl->tpl_vars['field']->value->nameattr;?>
" /><?php if (!empty($_smarty_tpl->tpl_vars['field']->value->value)) {?> <?php echo $_smarty_tpl->tpl_vars['delete_field_val']->value;?>
 <input type="checkbox" name="<?php echo $_smarty_tpl->tpl_vars['field']->value->delete;?>
" value="delete" /><?php }
} elseif ($_smarty_tpl->tpl_vars['field']->value->type == 'dropdown') {?><select id="<?php echo $_smarty_tpl->tpl_vars['field']->value->idattr;?>
" name="<?php echo $_smarty_tpl->tpl_vars['field']->value->nameattr;?>
"><option value="-1"><?php echo $_smarty_tpl->tpl_vars['select_option']->value;?>
</option><?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['field']->value->options,'selected'=>$_smarty_tpl->tpl_vars['field']->value->value),$_smarty_tpl);?>
</select><?php } elseif ($_smarty_tpl->tpl_vars['field']->value->type == 'linkedfile') {
if ($_smarty_tpl->tpl_vars['field']->value->value) {
echo smarty_function_thumbnail_url(array('file'=>$_smarty_tpl->tpl_vars['field']->value->value,'assign'=>'tmp'),$_smarty_tpl);
if ($_smarty_tpl->tpl_vars['tmp']->value) {?><img src="<?php echo $_smarty_tpl->tpl_vars['tmp']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['field']->value->value;?>
"/><?php }
}
echo smarty_function_cms_filepicker(array('name'=>((string)$_smarty_tpl->tpl_vars['field']->value->nameattr),'value'=>$_smarty_tpl->tpl_vars['field']->value->value),$_smarty_tpl);
}?></p></div><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?></div><?php if (isset($_smarty_tpl->tpl_vars['end_tab_article']->value)) {
echo $_smarty_tpl->tpl_vars['end_tab_article']->value;
}?>

    <?php if (isset($_smarty_tpl->tpl_vars['start_tab_preview']->value)) {?>
    <?php echo $_smarty_tpl->tpl_vars['start_tab_preview']->value;?>

<?php echo '<script'; ?>
 type="text/javascript">
    $(document).ready(function(){
        $(document).on('click', '[name=m1_apply]', function(e){

            e.preventDefault();

            if (typeof tinyMCE !== 'undefined') {
                tinyMCE.triggerSave();
            }

            var data = $('form').find('input:not([type=submit]), select, textarea').serializeArray(),
                url = $('form').attr('action');

            data.push({ 'name': 'm1_ajax', 'value': 1 });
            data.push({ 'name': 'm1_apply', 'value': 1 });
            data.push({ 'name': 'showtemplate', 'value': 'false' });

            $.post(url,data,function(resultdata,text){

                var resp = $(resultdata).find('Response').text(),
                    details = $(resultdata).find('Details').text(),
                    htmlShow = '';

                if (resp === 'Success' && details !== '' ) {
                    $('[name$=cancel]').button('option','label','<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('close');?>
');
                    $('[name$=cancel]').val('<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('close');?>
');
                    htmlShow = '<div class="pagemcontainer"><p class="pagemessage">'+details+'<\/p><\/div>';
                } else {
                    htmlShow = '<div class="pageerrorcontainer"><ul class="pageerror">';
                    htmlShow += details;
                    htmlShow += '<\/ul><\/div>';
                }

                $('#editarticle_result').html(htmlShow);
            },'xml');

        });

    function news_dopreview() {

        if (typeof tinyMCE != 'undefined') {
            tinyMCE.triggerSave();
        }

        var data = $('form').find('input:not([type=submit]), select, textarea').serializeArray(),
            url = $('form').attr('action');

        data.push({ 'name': 'm1_ajax', 'value': 1 });
        data.push({ 'name': 'm1_preview', 'value': 1 });
        data.push({ 'name': 'showtemplate', 'value': 'false' });
        data.push({ 'name': 'm1_previewpage', 'value': $("input[name='preview_returnid']").val() });
        data.push({ 'name': 'm1_detailtemplate', 'value': $('#preview_template').val() });

        $.post(url,data,function(resultdata,text){

            var resp = $(resultdata).find('Response').text(),
                details = $(resultdata).find('Details').text(),
                htmlShow = '';

            if (resp === 'Success' && details !== '' ) {

                // preview worked... now the details should contain the url
                details = details.replace(/amp;/g,'');
                $('#previewframe').attr('src',details);
            } else {
                if (details === '' ) {
                    details = 'An unknown error occurred';
                }

                // preview save did not work.
                htmlShow = '<div class="pageerrorcontainer"><ul class="pageerror">';
                htmlShow += details;
                htmlShow += '<\/ul><\/div>';

                $('#editarticle_result').html(htmlShow);
            }
        },'xml');
    }

    $('#preview').click(function(e){
        news_dopreview();
        e.preventDefault();
    });

    $(document).on('change', "input[name='preview_returnid'],#preview_template", function(e){
        news_dopreview();
        e.preventDefault();
    });
});
<?php echo '</script'; ?>
>

<div class="pagewarning"><?php echo $_smarty_tpl->tpl_vars['warning_preview']->value;?>
</div><fieldset><label for="preview_template"><?php echo $_smarty_tpl->tpl_vars['prompt_detail_template']->value;?>
:</label>&nbsp;<select id="preview_template" name="preview_template"><?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['detail_templates']->value,'selected'=>$_smarty_tpl->tpl_vars['cur_detail_template']->value),$_smarty_tpl);?>
</select>&nbsp;<label><?php echo $_smarty_tpl->tpl_vars['prompt_detail_page']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['preview_returnid']->value;?>
</label>&nbsp;</fieldset><br/><iframe id="previewframe" style="height: 800px; width: 100%; border: 1px solid black; overflow: auto;"></iframe><?php echo $_smarty_tpl->tpl_vars['end_tab_preview']->value;
echo $_smarty_tpl->tpl_vars['end_tab_content']->value;
}?><div class="pageoverflow"><p class="pageinput"><input type="submit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
submit" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('submit');?>
"/>&nbsp;<input type="submit" id="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
cancel" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
cancel" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('cancel');?>
"/><?php if (isset($_smarty_tpl->tpl_vars['articleid']->value)) {?>&nbsp;<input type="submit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
apply" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('apply');?>
"/><?php }?></p></div><?php echo $_smarty_tpl->tpl_vars['endform']->value;?>
</div>
<?php }
}
