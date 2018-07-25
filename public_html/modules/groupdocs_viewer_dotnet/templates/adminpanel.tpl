<p>{$addnew}</p>
{if count($itemlist) > 0}
<div style="clear: right;">
<table cellspacing="0" class="pagetable">
<thead><tr>
	<th>ID</th>
	<th>Name</th>
	<th>Shortcode</th>
</tr></thead>
<tbody>

{cycle values="row2,row1" assign=rowclass reset=true}
	{foreach from=$itemlist item=oneitem}
{cycle values="row2,row1" assign=rowclass}
	<tr class="{$rowclass}"  onmouseover="this.className='{$rowclass}hover';" onmouseout="this.className='{$rowclass}';">
		<td>{$oneitem->id}</td>
		<td>{$oneitem->name}</td>
		<td>{$oneitem->insertTag}</td>
	</tr>
	{/foreach}



</tbody>
</table>
</div>

{/if}
