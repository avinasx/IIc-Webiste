{* archive template *}
{if isset($archivelist)}
  <ul>
  {foreach from=$archivelist item=one}
    <li><a href="{$one.summary_url}">{$one.datestamp|date_format:"%B"} {$one.datestamp|date_format:"%Y"} - ({$one.count})</a></li>
  {/foreach}
  </ul>
{/if}
