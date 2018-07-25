<script type="text/javascript">
   $(document).ready(function() {
      $('a.del_category').click(function() {
         return confirm('{$mod->Lang('confirm_delete', $mod->Lang('title_category') )}');
      })
   });
</script>

<div class="pageoptions">
   <a href="{cms_action_url action=edit_category}">{admin_icon icon='newobject.gif'} {$mod->Lang('add_category')}</a>
</div>
{if !empty($category)}
<table class="pagetable">
   <thead>
      <tr>
         <th>{$mod->Lang('title_category')}</th>
         <th>{$mod->Lang('title_alias')}</th>
         <th class="pageicon">{$mod->Lang('title_default')}</th>
         <th class="pageicon">&nbsp;</th>
         <th class="pageicon">&nbsp;</th>
      </tr>
   </thead>
   <tbody>
{foreach $category as $cat}
{cms_action_url action=edit_category category_id=$cat->category_id assign='edit_url'}
      <tr>
         <td><a href="{$edit_url}" title="{$mod->Lang('edit')}">{$cat->category_name}</a></td>
         <td>{$cat->category_alias}</td>
{if $cat->default_category}
         <td><span title="{$mod->Lang('is_default')}">{admin_icon icon='true.gif'}</span></td>
         <td><a href="{$edit_url}" title="{$mod->Lang('edit')}">{admin_icon icon='edit.gif'}</a></td>
         <td><span>&nbsp;</a></td>
{else}
         <td><a class="init-ajax-toggle approve-category" href="{cms_action_url action=set_default_category category_id=$cat->category_id}" title="{$mod->Lang('set_default')}">{admin_icon icon='false.gif'}</a></td>
         <td><a href="{$edit_url}" title="{$mod->Lang('edit')}">{admin_icon icon='edit.gif'}</a></td>
         <td><a class="del_category" href="{cms_action_url action=delete_category category_id=$cat->category_id}" title="{$mod->Lang('delete')}">{admin_icon icon='delete.gif'}</a></td>
{/if}
      </tr>
{/foreach}
   </tbody>
</table>
{/if}