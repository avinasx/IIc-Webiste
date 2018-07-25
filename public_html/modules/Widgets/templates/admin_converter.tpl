{* admin_converter.tpl

   Note: don't bother to use $lang as only for own use

*}
{$startform}

   <div class="pageoverflow">
      <p class="pagetext">1. Import from LISEWidgets:</p>
      <div class="pagewarning ">Warning: This will remove ALL exiting Widgets data!</div>
      <p class="pageinput">{$button_import_from_LISEWidgets}</p><br>
   </div>
   <div class="pageoverflow">
      <p class="pagetext">2. Update all Page Templates</p>
      <p class="pageinput">Edit the content block tags at the top of all page templates:<br>
<pre>replace: {literal}{content_module module='ECB2' field='sortablelist' ... udt='widgetsSidebar' ...
with:    {content_module module='Widgets' category='sidebarWidget' ... or ... category='pageBottomWidget' ... {/literal}</pre></p>
      <br>
      Replace the tags in the body of the template:<br>
<pre>replace: {literal}{widgetsSidebar options=$rightSidebarOptions}
with:    {Widgets items=$rightSidebarOptions} {/literal}</pre>
      <br>
<pre>replace: {literal}{widgetsPageBottom options=$pageBottomOptions}
with:    {Widgets items=$pageBottomOptions} {/literal}</pre></p><br>
   </div>
{if $widgetsUDTsExist}
   <div class="pageoverflow">
      <p class="pagetext">3. Remove Widgets UDTs: </p>
      <div class="pagewarning grid_12">UDTs: 'widgetsSidebar' or 'widgetsPageBottom' still exist - delete them now.</div>
      <p class="pageinput">...</p><br>
   </div>
{/if}
   <div class="pageoverflow">
      <p class="pagetext">4. ALL DONE :)</p>
   </div>

{$endform}