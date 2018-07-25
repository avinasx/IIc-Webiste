<h3>{if $isNewCategory}{$mod->Lang('add_category')}{else}{$mod->Lang('edit_category')}{/if}</h3>
{form_start category_id=$category->category_id}
<div class="pageoverflow">
   <p class="pagetext">{$mod->Lang('title_category')}:</p>
   <p class="pageinput">
      <input type="text" name="{$actionid}category_name" value="{$category->category_name}" size="50"/>
   </p>
</div>
<div class="pageoverflow">
   <p class="pagetext">{$mod->Lang('title_alias')}:</p>
   <p class="pageinput">
      <input type="text" name="{$actionid}category_alias" value="{$category->category_alias}" size="50"/>
   </p>
</div>
<p>&nbsp;</p>
<div class="pageoverflow">
   <p class="pageinput">
      <input type="submit" name="{$actionid}submit" value="{$mod->Lang('submit')}"/>
      <input type="submit" name="{$actionid}cancel" value="{$mod->Lang('cancel')}"/>
   </p>
</div>
{form_end}