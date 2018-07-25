<script type="text/javascript">
function parseTree(ul) {
	var tags = [];
	ul.children("li").each(function(){
		var subtree =	$(this).children("ul");
		if(subtree.size() > 0)
			tags.push([$(this).attr("id"), parseTree(subtree)]);
		else
			tags.push($(this).attr("id"));
	});
	return tags;
}

$(document).ready(function() {
  $('ul.sortable').nestedSortable({
     disableNesting: 'no-nest',
     forcePlaceholderSize: true,
     handle: 'div',
     items: 'li',
     opacity: 6,
     placeholder: 'placeholder',
     tabSize: 35,
     tolerance: 'pointer',
     listType: 'ul',
     toleranceElement: '> div'
  });

  $('#submit_btn').live('click',function(){
     var tree = $.toJSON(parseTree($('ul.sortable')));
     $('#orderdata').val(tree);
  });

});
</script>


{function draw_category depth=0}
  <ul class="sortableList {if $depth == 0}sortable{/if}">
  {foreach $items as $item}
    {if $item.parent_id < 1}{$depth=0}{/if}
    <li id="cat_{$item.id}">
      <div class="label"><span&nbsp;</span>{$item.name}</div>
      {if isset($item.children)}{draw_category depth=$depth+1 items=$item.children}{/if}
    </li>
  {/foreach}
  </ul>
{/function}

<h3>{$mod->Lang('reorder_categories')}</h3>
<div class="information">{$mod->Lang('info_reorder_categories')}</div>

{$formstart}
<input type="hidden" id="orderdata" name="{$actionid}orderdata" value=""/>

<div class="pageoverflow">
  <div class="pageinput reorder-pages">{draw_category items=$tree}</div>
</div>

<div class="pageoverflow">
  <p class="pagetext"></p>
  <p class="pageinput">
    <input id="submit_btn" type="submit" name="{$actionid}submit" value="{$mod->Lang('submit')}"/>
    <input type="submit" name="{$actionid}cancel" value="{$mod->Lang('cancel')}"/>
  </p>
</div>
{$formend}