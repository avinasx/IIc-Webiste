{if isset($message)}{$message}{/if}

{$backtoform_nav}<br />
{$start_form}{$fb_hidden}{if isset($op)}{$op}{/if}
{tab_header name='maintab' label=$frmbld->lang('tab_main')}
{tab_header name='advancedtab' label=$frmbld->lang('tab_advanced')}
{tab_start name='maintab'}
	{foreach from=$mainList item=entry}
		<div class="pageoverflow">
			<p class="pagetext">{$entry->title}:</p>
			<div class="pageinput">{$entry->input}</div>
			{if $entry->help != ''}<div class="inputhelp">{$entry->help}</div>{/if}
		</div>
	{/foreach}
{tab_start name='advancedtab'}
	{foreach from=$advList item=entry}
		<div class="pageoverflow">
			<p class="pagetext">{$entry->title}:</p>
			<div class="pageinput">{$entry->input}</div>
			{if $entry->help != ''}<div class="inputhelp">{$entry->help}</div>{/if}
		</div>
	{/foreach}
{tab_end}
{if $add != '' or $del != ''}
	<div class="pageoverflow">
		<p class="pagetext">&nbsp;</p>
		<p class="pageinput">{$add}{$del}</p>
	</div>
{/if}
	<div class="pageoverflow">
		<p class="pagetext">&nbsp;</p>
		<p class="pageinput">{if isset($submit)}{$submit}{/if}{$cancel}</p>
	</div>
{$end_form}
