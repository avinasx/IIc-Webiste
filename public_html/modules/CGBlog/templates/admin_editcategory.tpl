<script type="text/javascript">
$(document).ready(function(){
  $('#cancel').click(function(){
    var form = $(this).closest('form');
    $(':input',form).removeAttr('required');
  })
})
</script>

{if isset($category)}
  <h3>{$mod->Lang('edit_category')} {$category.name} <em>({$category.id})</em></h3>
{else}
  <h3>{$mod->Lang('add_category')}
{/if}

{$formstart}
<div class="pageoverflow">
  <p class="pagetext">*{$mod->Lang('category_name')}:</p>
  <p class="pageinput"><input type="text" name="{$actionid}name" value="{$category.name|default:''}" size="80" maxlength="255" required/></p>
</div>

<div class="pageoverflow">
  <p class="pagetext">{$mod->Lang('category_parent')}:</p>
  <p class="pageinput">
    <select name="{$actionid}parent_id">
      {html_options options=$category_list selected=$category.parent_id|default:-1}
    </select>
  </p>
</div>

<div class="pageoverflow">
  <p class="pagetext">{$mod->Lang('category_description')}:</p>
  <p class="pageinput">
    {cge_textarea wysiwyg=1 prefix=$actionid name=description rows=3 content=$category.description|default:''}
  </p>
</div>

<div class="pageoverflow">
  <p class="pagetext">&nbsp;</p>
  <p class="pageinput">
    <input type="submit" name="{$actionid}submit" value="{$mod->Lang('submit')}"/>
    <input type="submit" name="{$actionid}cancel" value="{$mod->Lang('cancel')}"/>
  </p>
</div>
{$formend}