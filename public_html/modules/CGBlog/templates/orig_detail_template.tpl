{* set a canonical variable that can be used in the head section if process_whole_template is false in the config.php *}
{if isset($entry->canonical)}{assign var='canonical' scope=global value=$entry->canonical}{/if}

{if $entry->postdate}
	<div id="CGBlogPostDetailDate">
		{$entry->postdate|cms_date_format}
	</div>
{/if}
<h3 id="CGBlogPostDetailTitle">{$entry->title|escape}</h3>

<hr id="CGBlogPostDetailHorizRule" />

{if $entry->summary}
	<div id="CGBlogPostDetailSummary">
		<strong>
		        {* NOTE: FOR SECURITY REASONS content will not be passed through smarty before being displayed. *}
			{$entry->summary}
		</strong>
	</div>
{/if}


{if $entry->categories}
<div class="CGBlogSummaryCategory">
{strip}{$category_label}
 {foreach from=$entry->categories item='category'}
   {$category.name}&nbsp;
 {/foreach}
{/strip}
</div>
{/if}

{if $entry->author}
	<div id="CGBlogPostDetailAuthor">
		{$author_label} {$entry->author}
	</div>
{/if}

<div id="CGBlogPostDetailContent">
        {* NOTE: FOR SECURITY REASONS content will not be passed through smarty before being displayed. *}
	{$entry->content}
</div>

{if $entry->extra}
	<div id="CGBlogPostDetailExtra">
		{$extra_label} {$entry->extra}
	</div>
{/if}

{* addressing extra fields.
   Extra fields are in the array $entry->fields.  which is a 'hash' that is indexed by the fields name.
   i.e: $entry->fields.myfield will return the field 'object'
   If the field name has spaces or other characters you may need to use special smarty quoting to address the individual field.
   i.e: {assign var='tmp' value='field name with spaces'}{$entry->fields.$tmp->value}
   Fields have their own aliases and can be addressed like:
     {$entry->alias->value}
   To see all of the available field aliases.. you can do a: <pre>{$entry->aliases|@print_r}</pre>
   Note: The syntax for addressing fields in the detail template is slightly different from addressing fields in the summary view
*}
{if isset($entry->fields)}
  {foreach $entry->fields as $field}
     {* the field is an object.. available members are:
        alias id, name, type, max_length, create_date, modified_date, item_order, public, and value.
        i.e: {$field->name} will output the name: {$field->alias} will output the alias.
     *}
     <div class="CGBlogDetailField">
        {if $field->type == 'image'}
          <img src="{$entry->file_location}/{$field->value}"/>
        {elseif $field->type == 'file'}
	  <p>{$field->name}:&nbsp;<a href="{$entry->file_location}/{$field->value}"/></p>
        {elseif $field->type == 'file_select'}
	  <p>{$field->name}:&nbsp;<a href="{uploads_url}/{$field->value}">{$field->value}</a></p>
        {elseif $field->type == 'image_select'}
	  <p>{$field->name}:&nbsp;<img src="{uploads_url}/{$field->value}" alt="{$field->value}"/></p>
        {else}
          <p>{$field->name}:&nbsp;{$field->value}</p>
        {/if}
     </div>
  {/foreach}
{/if}

{* find the id of the prev viewable blog article (by post date) *}
{$article_id=$entry->id}
{cgblog_relative_article article=$article_id dir='prev' assign='prev_id'}
{if $prev_id}
<div class="prevblogarticle">
  <a href="{module_action_link module=CGBlog action=detail articleid=$prev_id urlonly=1}">Previous Article</a>
</div>
{/if}

{* find the id of the next viewable blog article (by post date) *}
{cgblog_relative_article article=$article_id dir='next' assign='next_id'}
{if $next_id}
<div class="nextblogarticle">
  <a href="{module_action_link module=CGBlog action=detail articleid=$next_id urlonly=1}">Next Article</a>
</div>
{/if}
