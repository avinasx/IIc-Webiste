{* sortablelist_template.tpl

*}
{if !empty($description)}<span class="widget-description">{$description}</span> {/if}
<input type="hidden" id="{$selectarea_prefix}" name="{$selectarea_prefix}" value="{$selected_str}" size="100"/>
<div class="c_full cf widget-cb {$selectarea_prefix}">
    <div class="grid_6 alpha">
        <fieldset>
            <legend>{if $labelLeft!=''}{$labelLeft}{else}{$mod->Lang('content_block_label_selected')}{/if}</legend>
            <div id="selected-widgets">
                <ul class="sortable-widgets sortable-list selected-widgets" data-cmsms-cb-input="{$selectarea_prefix}">
                    <li class="placeholder no-sort {if $selected|@count>0} hidden{/if}">{$mod->Lang('drop_items')}</li>
                    {foreach $selected as $alias => $name}
                        <li class="ui-state-default cf sortable-item" data-cmsms-item-id="{$alias}">
                            {$name}
                            <a href="#" title="{$mod->Lang('remove')}" class="ui-icon ui-icon-trash sortable-remove">{$mod->Lang('remove')}</a>
                        </li>
                    {/foreach}
                </ul>
            </div>
        </fieldset>
    </div>
    <div class="grid_6 omega draggable-area">
        <fieldset>
            <legend>{if $labelRight!=''}{$labelRight}{else}{$mod->Lang('content_block_label_available')}{/if}</legend>
            <div id="available-widgets">
                <ul class="sortable-widgets sortable-list available-items available-widgets">
                {foreach $available as $alias => $name}
                        <li class="ui-state-default" data-cmsms-item-id="{$alias}">
                            {$name}
                            <a href="#" title="{$mod->Lang('remove')}" class="ui-icon ui-icon-trash sortable-remove hidden">{$mod->Lang('remove')}</a>
                        </li>
                {/foreach}
                </ul>
            </div>
        </fieldset>
    </div>
</div>