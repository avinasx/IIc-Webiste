{*
#CMS - CMS Made Simple
#(c)2004-6 by Ted Kulp (ted@cmsmadesimple.org)
#This project's homepage is: http://cmsmadesimple.org
#
#This program is free software; you can redistribute it and/or modify
#it under the terms of the GNU General Public License as published by
#the Free Software Foundation; either version 2 of the License, or
#(at your option) any later version.
#
#This program is distributed in the hope that it will be useful,
#but WITHOUT ANY WARRANTY; without even the implied warranty of
#MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#GNU General Public License for more details.
#You should have received a copy of the GNU General Public License
#along with this program; if not, write to the Free Software
#Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
#
#$Id$
*}

{if $itemcount > 0}
<div class="warning">
  <h3>{$mod->Lang('notice')}:</h3>
  <p>{$mod->Lang('warning_fielddelete')}</p>
</div>
{/if}

<div class="pageoptions"><p class="pageoptions">{$addlink}</p></div>

{if $itemcount > 0}
<table cellspacing="0" class="pagetable">
	<thead>
		<tr>
			<th>{$fielddeftext}</th>
			<th>{$typetext}</th>
			<th class="pageicon">&nbsp;</th>
			<th class="pageicon">&nbsp;</th>
			<th class="pageicon">&nbsp;</th>
			<th class="pageicon">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
{foreach from=$items item=entry}
	{cycle values="row1,row2" assign='rowclass'}
		<tr class="{$rowclass}" onmouseover="this.className='{$rowclass}hover';" onmouseout="this.className='{$rowclass}';">
			<td>{$entry->name}</td>
			<td>{$entry->type}</td>
			<td>{if isset($entry->uplink)}{$entry->uplink}{/if}</td>
	                <td>{if isset($entry->downlink)}{$entry->downlink}{/if}</td>
			<td>{if isset($entry->editlink)}{$entry->editlink}{/if}</td>
			<td>{if isset($entry->deletelink)}{$entry->deletelink}{/if}</td>
		</tr>
{/foreach}
	</tbody>
</table>
{/if}
