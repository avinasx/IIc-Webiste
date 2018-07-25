<div class="pageoptions">
  <a href="{$add_category_url}">{cgimage image='icons/system/newobject.gif' alt=$mod->Lang('add_category')} {$mod->Lang('add_category')}</a>
  <a href="{module_action_link action='admin_order_categories' urlonly=1}">{cgimage image='icons/system/reorder.gif' alt=$mod->Lang('reorder_categories')} {$mod->Lang('reorder_categories')}</a>
</div>

{function cgblog_category_row}
  {module_action_link module='CGBlog' action='admin_editcategory' sub='edit' cid=$row.id urlonly=1 assign='edit_url'}
  <td>{repeat times=$row.depth string='&nbsp;&nbsp;'}<a href="{$edit_url} title="{$mod->Lang('edit')}">{$row.name}</a></td>
  <td>
     {if $row.id == $default_category}
       {cgimage image='icons/system/true.gif' alt=$mod->Lang('default_category')}
     {else}
        {module_action_link module='CGBlog' action='admin_editcategory' sub='dflt' cid=$row.id imageonly=1 image='icons/system/false.gif' text=$mod->Lang('set_default')}
     {/if}
  </td>
  <td><a href="{$edit_url}">{cgimage image='icons/system/edit.gif' alt=$mod->Lang('edit')}</a></td>
  <td>{if $row.id != $default_category and !isset($row.children) }{module_action_link module='CGBlog' action='admin_editcategory' sub='del' cid=$row.id imageonly=1 image='icons/system/delete.gif' text=$mod->Lang('delete')}{/if}</td>
{/function}

{if isset($categorylist)}
<table class="pagetable" cellspacing="0">
  <thead>
    <tr>
      <th>{$mod->Lang('name')}</th>
      <th class="pageicon">{$mod->Lang('prompt_default')}</th>
      <th class="pageicon">&nbsp;</th>
      <th class="pageicon">&nbsp;</th>
    </tr>
  </thead>
  <tbody>
{foreach from=$categorylist item='one' name='cats'}
  {cycle values="row1,row2" assign="rowclass"}
  <tr class="{$rowclass}" onmouseover="this.className='{$rowclass}hover';" onmouseout="this.className='{$rowclass}';">
    {cgblog_category_row row=$one}
  </tr>
{/foreach}
  </tbody>
</table>
{/if}
