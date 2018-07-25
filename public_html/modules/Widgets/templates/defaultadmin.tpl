<script type="text/javascript">
   $(document).ready(function() {
      $('a.del_widget').click(function() {
         return confirm('{$mod->Lang('confirm_delete')}' + ' "' + $(this).data('title') + '"?');
      })
   });
</script>

<div class="pageoptions">
   <a href="{cms_action_url action=edit_widget}">{admin_icon icon='newobject.gif'} {$mod->Lang('add_widget')}</a>
   <span id="loader" data-icon="{$loadingIcon}"> </span>
</div>

{if !empty($widgets)}
<table class="pagetable">
   <thead>
      <tr>
         <th>{$mod->Lang('title_title')}</th>
         <th>{$mod->Lang('title_category')}</th>
         <th class="pageicon">{$mod->Lang('title_active')}</th>
         <th class="pageicon">{* edit icon *}</th>
         <th class="pageicon">{* delete icon *}</th>
      </tr>
   </thead>
   <tbody class="sortable-widget-list">
{foreach $widgets as $widget}
{cms_action_url action=edit_widget wid=$widget->id assign='edit_url'}
      <tr class="{if $widget@index is even}row1{else}row2{/if}" data-id="{$widget->id}" data-reorder="{cms_action_url action=reorder_widget wid=$widget->id after=-1 forjs=1}">
         <td><a href="{$edit_url}" title="{$mod->Lang('edit')}">{$widget->title}</a></td>
         <td>{$categories[$widget->category_id]}</td>
         <td><a class="active_widget" href="{cms_action_url action=toggle_active_widget wid=$widget->id}" >{if $widget->active}{admin_icon icon='true.gif'}{else}{admin_icon icon='false.gif'}{/if}</a>
         </td>
         <td><a href="{$edit_url}" title="{$mod->Lang('edit')}">{admin_icon icon='edit.gif'}</a></td>
         <td><a class="del_widget" href="{cms_action_url action=delete_widget wid=$widget->id}" title="{$mod->Lang('delete')}" data-title="{$widget->title}">{admin_icon icon='delete.gif'}</a></td>
      </tr>
{/foreach}
   </tbody>
</table>
{/if}