{if $message != ''}<div class="pagemcontainer"><p class="pagemessage">{$message}</p></div>{/if}

{tab_header name='forms' label=$frmbld->lang('forms')}
{tab_header name='config' label=$frmbld->lang('configuration')}

{tab_start name='forms'}
<table class="pagetable">
<thead>
<tr>
  <th>{$title_form_name}</th>
  <th>{$title_form_alias}</th>
  <th>&nbsp;</th>
  <th>&nbsp;</th>
  <th>&nbsp;</th>
</tr>
</thead>

{foreach from=$forms item=entry}
  <tr class="{$entry->rowclass}" onmouseover="this.className='{$entry->rowclass}hover';" onmouseout="this.className='{$entry->rowclass}';">
    <td>{$entry->name}</td>
    <td>&#123;FormBuilder form='{$entry->usage}'&#125;</td>
    <td>{$entry->xml}</td>
    <td>{$entry->editlink}</td>
    <td>{$entry->deletelink}</td>
  </tr>
{/foreach}

<tr>
  <td colspan="5">
{if $addlink != ''}{$addlink}{$addform}{/if}
  </td>
</tr>
</table>

<fieldset>
<legend>{$legend_xml_import}</legend>
{$start_xmlform}
<div class="pageoverflow">
  <p class="pagetext">{$title_xml_to_upload}:</p>
  <p class="pageinput">{$input_xml_to_upload}</p>
</div>
<div class="pageoverflow">
  <p class="pagetext">{$title_xml_upload_formname}:</p>
  <p class="pageinput">{$input_xml_upload_formname}&nbsp;<em>{$info_leaveempty}</em></p>
</div>
<div class="pageoverflow">
  <p class="pagetext">{$title_xml_upload_formalias}:</p>
  <p class="pageinput">{$input_xml_upload_formalias}&nbsp;<em>{$info_leaveempty}</em></p>
</div>
<div class="pageoverflow">
  <p class="pagetext">&nbsp;</p>
  <p class="pageinput">{$submitxml}</p>
</div>
{$end_xmlform}
</fieldset>
{tab_start name='config'}

{if $may_config == 1}
{$start_configform}
<div class="pageoverflow">
	<p class="pagetext">{$title_hide_errors}:</p>
	<p class="pageinput">{$input_hide_errors}</p>
</div>
<div class="pageoverflow">
	<p class="pagetext">{$title_require_fieldnames}:</p>
	<p class="pageinput">{$input_require_fieldnames}</p>
</div>
<div class="pageoverflow">
	<p class="pagetext">{$title_unique_fieldnames}:</p>
	<p class="pageinput">{$input_unique_fieldnames}</p>
</div>
<div class="pageoverflow">
	<p class="pagetext">{$title_blank_invalid}:</p>
	<p class="pageinput">{$input_blank_invalid}</p>
</div>
<div class="pageoverflow">
	<p class="pagetext">&nbsp;</p>
	<p class="pageinput">{$submit}</p>
</div>
{$end_configform}

{else}
  <p>{$no_permission}</p>
{/if}
{tab_end}