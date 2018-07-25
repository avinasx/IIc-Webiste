<style type="text/css">
@media screen and (max-width: 1200px) {
  .grid_7 {
    width: auto !important;
  }
  .grid_5 {
    width: auto !important;
  }
}
textarea {
  width: initial;
  height: initial;
}
</style>

<script type="text/javascript">
var action_id = '{$actionid}';
var article_id = '{$articleid|default:""}';
var ajax_url = '{$ajax_get_url}';
var manually_changed = article_id;
var finished_setup = 0;
var ajax_xhr = 0;
var ajax_timeout;
ajax_url = ajax_url.replace(/amp;/g,'') + '&suppressoutput=1';

function ajax_geturl() {
  var form = $('#cgblog_editarticle form');
  var vtitle = $('#article_title').val();
  var vpostdate = form.form_get_datetime(action_id+'postdate_',1);
  ajax_xhr = $.post(ajax_url, { title: vtitle, postdate: vpostdate, articleid: article_id }, function(retdata){
    $('#article_url').val(retdata);
    ajax_xhr = 0;
  });
}

function on_change() {
  if( manually_changed == 0 && finished_setup == 1) {
    // ajax function to get a unique url given a title.
    if( ajax_timeout != undefined ) clearTimeout(ajax_timeout);
    if( ajax_xhr = 0 ) xhr.abort();
    ajax_timeout = setTimeout(ajax_geturl,500);
  }
}

$(document).ready(function() {
  if( article_id != '' && jQuery().fancybox && $('a.fancybox').length > 0 ) $('a.fancybox').fancybox();

  $('#article_url').keyup(function() {
    var val = $(this).val();
    manually_changed = 0
    if( val != '' ) manually_changed = 1;
  });

  $('form').ajaxStart(function() {
    $('*').css('cursor','progress');
  });

  $('form').ajaxStop(function() {
    $('*').css('cursor','auto');
  });

  $('#sel_postdate').change(function() {
    on_change();
  });

  $('#article_title').keyup(function() {
    on_change();
  });

  finished_setup = 1;
});
</script>

<div id="editarticle_result"></div>
<div id="cgblog_editarticle">
  {$startform}
    <div class="pageoverflow">
      <p class="pageinput">{$hidden}
        <input type="submit" name="{$actionid}submit" value="{$mod->Lang('submit')}"/>
        <input type="submit" name="{$actionid}apply" value="{$mod->Lang('apply')}"/>
        <input type="submit" name="{$actionid}cancel" value="{$mod->Lang('cancel')}"/>
      </p>
    </div>

    {if isset($start_tab_headers)}
      {$start_tab_headers}
        {$tabheader_article}
        {$tabheader_preview}
      {$end_tab_headers}

      {$start_tab_content}
      {$start_tab_article}
    {/if}

<div class="c_full">
  <div class="grid_7">
    {if isset($authortext)}
    <div class="pageoverflow">
      <p class="pagetext">*{$authortext}:</p>
      <p class="pageinput">{$inputauthor}</p>
    </div>
    {/if}

    <div class="pageoverflow">
      <p class="pagetext">*{$titletext}:</p>
      <p class="pageinput">
        <input type="text" id="article_title" name="{$actionid}title" value="{$title|cms_escape}" size="60" maxlength="255"/>
      </p>
    </div>

    {if !isset($hide_summary_field) or $hide_summary_field == '0'}
    <div class="pageoverflow">
      <p class="pagetext">{$mod->Lang('summary')}:</p>
      <p class="pageinput">
        {cge_textarea wysiwyg=$mod->GetPreference('allow_summary_wysiwyg',1) prefix=$actionid name='summary' value=$summary rows=3}
      </p>
    </div>
    {/if}

    <div class="pageoverflow">
      <p class="pagetext">*{$mod->Lang('content')}:</p>
      <p class="pageinput">
        {cge_textarea wysiwyg=1 prefix=$actionid name='content' value=$content}
      </p>
    </div>
  </div>{* .grid_7 *}

  <div class="grid_5">
    <div class="pageoverflow">
      <p class="pagetext">{$mod->Lang('url')}:</p>
      <p class="pageinput">
        <input id="article_url" type="text" name="{$actionid}url" value="{$url}" size="50" maxlength="255"/>
      </p>
    </div>

    {if isset($statustext)}
    <div class="pageoverflow">
      <p class="pagetext">*{$statustext}:</p>
      <p class="pageinput">{$status}</p>
    </div>
    {else}
      {$status}
    {/if}

    {if isset($category_tree)}
    {function do_category_tree depth=0}
      {foreach $category_tree as $node}
        {$checked=''}{if isset($sel_categories) && in_array($node.id,$sel_categories)}{$checked='checked'}{/if}
        {repeat string='&nbsp;&nbsp; ' times=$depth}<label><input type="checkbox" name="{$thename}" value="{$node.id}" {$checked}> {$node.name}</label><br/>
        {if isset($node.children)}{do_category_tree category_tree=$node.children depth=$depth+1}{/if}
      {/foreach}
    {/function}
    <fieldset>
      <legend>{$mod->Lang('categories')}: </legend>
      <div style="min-height: 5em; overflow-y: auto;">
        {$thename=$actionid|cat:'categories[]'}
        {do_category_tree}
      </div>
    </fieldset>
    {/if}

    <div class="pageoverflow" id="sel_postdate">
      <p class="pagetext">{$postdatetext}:</p>
      <p class="pageinput">{html_select_date prefix=$postdateprefix time=$postdate start_year="-10" end_year="+15"} {html_select_time prefix=$postdateprefix time=$postdate display_seconds=false}</p>
    </div>

    <div class="pageoverflow">
      <p class="pagetext">{$useexpirationtext}:</p>
      <p class="pageinput">{$inputexp}</p>
    </div>

    <div class="pageoverflow">
      <p class="pagetext">{$startdatetext}:</p>
      <p class="pageinput">{html_select_date prefix=$startdateprefix time=$startdate start_year="-10" end_year="+15"} {html_select_time prefix=$startdateprefix time=$startdate display_seconds=false}</p>
    </div>

    <div class="pageoverflow">
      <p class="pagetext">{$enddatetext}:</p>
      <p class="pageinput">{html_select_date prefix=$enddateprefix time=$enddate start_year="-10" end_year="+15"} {html_select_time prefix=$enddateprefix time=$enddate display_seconds=false}</p>
    </div>

  </div>{* .grid_5 *}
</div>{* .c_full *}

<div class="c_full">
  <div class="grid_12">
    <div class="pageoverflow">
      <p class="pagetext">{$extratext}:</p>
      <p class="pageinput">{$inputextra}</p>
    </div>

    {if isset($custom_fields)}
    {foreach from=$custom_fields item='field'}
      <div class="pageoverflow">
        <p class="pagetext">{$field->prompt}:</p>
        <p class="pageinput">{$field->field}</p>
      </div>
    {/foreach}
    {/if}
  </div>
</div>{* .c_full *}

<div class="clear"></div>

{if isset($end_tab_article)}{$end_tab_article}{/if}

{if isset($start_tab_preview)}
{$start_tab_preview}
<script type="text/javascript">
jQuery(document).ready(function(){
  $('[name=m1_apply]').live('click',function(ev){
    ev.preventDefault();
    if( typeof tinyMCE != 'undefined') tinyMCE.triggerSave();
    var data = jQuery('form').find('input:not([type=submit]), select, textarea').serializeArray();
    data.push({ 'name': 'm1_ajax', 'value': 1 });
    data.push({ 'name': 'm1_apply', 'value': 1 });
    var url = jQuery('form').attr('action');
    $.ajax({
      url: url,
      data: data,
      dataType: 'json'
    }).done(function(data){
      var htmlShow = '';
      if( typeof data == 'undefined' || typeof data.response == 'undefined' || data.response != 'Success' ) {
         // error
	 var msg = '{$mod->Lang('error_saving')}';
	 if( typeof data.details != 'undefined' ) msg = data.details;
	 htmlShow = '<div class="pageerrorcontainer"><ul class="pageerror">';
	 htmlShow += msg;;
	 htmlShow += '<\/ul><\/div>';
      }
      else {
	 htmlShow = '<div class="pagemcontainer"><p class="pagemessage">{$mod->Lang('saved')}<\/p><\/div>';
      }
      $('#editarticle_result').html(htmlShow).show(0).fadeOut(5000);
    });
  });

  function cgblog_dopreview()
  {
    if( typeof tinyMCE != 'undefined') tinyMCE.triggerSave();
    var data = jQuery('form').find('input:not([type=submit]), select, textarea').serializeArray();
    data.push({ 'name': 'm1_ajax', 'value': 1 });
    data.push({ 'name': 'm1_preview', 'value': 1 });
    data.push({ 'name': 'showtemplate', 'value': 'false' });
    data.push({ 'name': 'm1_previewpage', 'value': jQuery('#preview_returnid').val() });
    data.push({ 'name': 'm1_detailtemplate', 'value': jQuery('#preview_template').val() });
    var url = jQuery('form').attr('action');
    $.ajax({
       method: 'POST',
       url: url,
       data: data,
       dataType: 'json'
    }).done(function(data){
       if( typeof data == 'undefined' || typeof data.response == 'undefined' || data.response != 'Success' || typeof data.details == 'undefined' ) {
          // error
 	  var msg = '{$mod->Lang('error_saving')}';
	  if( typeof data.details != 'undefined' ) msg = data.details;
	  htmlShow = '<div class="pageerrorcontainer"><ul class="pageerror">';
	  htmlShow += msg;;
	  htmlShow += '<\/ul><\/div>';
          $('#editarticle_result').html(htmlShow).fadeOut(5000);
       }
       else {
          $('#previewframe').attr('src',data.details.replace(/amp;/g,''));
       }
    });
  }

  jQuery('#preview').click(function(){
    cgblog_dopreview();
    return false;
  });

  jQuery('#preview_returnid,#preview_template').change(function(){
    cgblog_dopreview();
    return false;
  });
});
</script>

{* display a warning *}
<div class="pagewarning">{$warning_preview}</div>
<fieldset>
  <label for="preview_template">{$prompt_detail_template}:</label>&nbsp;
  <select id="preview_template" name="preview_template">
  {html_options options=$detail_templates selected=$cur_detail_template}
  </select>&nbsp;

  <label for="preview_returnid">{$prompt_detail_page}:</label>&nbsp;
  {$preview_returnid}
</fieldset>
<br/>
<iframe id="previewframe" style="height: 800px; width: 100%; border: 1px solid black; overflow: auto;"></iframe>
{$end_tab_preview}
{$end_tab_content}
{/if}

{$endform}
</div>{* #cgblog_editarticle *}

<div id="busy" style="display: none;"></div>
