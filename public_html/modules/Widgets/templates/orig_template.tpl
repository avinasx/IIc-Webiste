{* orig_template.tpl v0.9 - 21Oct16 *}
{foreach $items as $item}
      <div class="widget-outer col-xs-12">
         <div class="{*section *}widget {$item->alias} {$styles=","|explode:$item->fielddefs.styles.value}{foreach $styles as $style} {$style}{/foreach} col-xs-12 equal-height">
{if $item->fielddefs.heading.value!=''}
            <h2 class="heading col-xs-12">{$item->fielddefs.heading.value|escape}</h2>
{/if}
{if $item->fielddefs.content.value}
            <div class="content col-xs-12">
               {eval var=$item->fielddefs.content.value}
            </div>
{/if}
{if $item->fielddefs.link_to.value>'0'}
            <div class="link col-xs-12">
               <a class="btn btn-default btn-sm" href="{cms_selflink href=$item->fielddefs.link_to.value}">{if $item->link_text!=''}{$item->link_text|escape}{else}Read more{/if}</a>
            </div>
{/if}
         </div>
      </div>
{/foreach}