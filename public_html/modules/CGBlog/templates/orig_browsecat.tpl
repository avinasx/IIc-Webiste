{* original browsecat template *}
{function cgblog_browsecat}
<ul>
  {foreach $categories as $cid => $rec}
    <li>
      {if $rec.count > 0}
      <a href="{$rec.url}" title="{$rec.name}">{$rec.name}</a>&nbsp;<em>({$rec.count})</em>
      {else}
        <span>{$rec.name}</span>&nbsp;<em>({$rec.count})</em>
      {/if}
      {if isset($rec.children)}
        {cgblog_browsecat categories=$rec.children}
      {/if}
    </li>
  {/foreach}
</ul>
{/function}

{cgblog_browsecat}
