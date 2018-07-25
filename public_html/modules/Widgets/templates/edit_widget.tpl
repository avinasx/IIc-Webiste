<script type="text/javascript">
   $(document).ready(function() {
      $('input[name={$actionid}wysiwyg]').change(function() {
         $('button[name={$actionid}apply]').click();
      });
   });
</script>

<h3>{if $isNewWidget}{$mod->Lang('add_widget')}{else}{$mod->Lang('edit_widget')}{/if}</h3>

{form_start wid=$widget->id}
<div class="pageoverflow">
   <p class="pageinput">
      <input type="submit" name="{$actionid}submit" value="{$mod->Lang('submit')}"/>
      <input type="submit" name="{$actionid}cancel" value="{$mod->Lang('cancel')}"/>
      <input type="submit" name="{$actionid}apply" value="{$mod->Lang('apply')}"/>
   </p>
</div>
<div class="pageoverflow">
   <p class="pagetext">{$mod->Lang('title_active')}:</p>
   <p class="pageinput">{$input_active}</p>
</div>
<div class="pageoverflow">
   <p class="pagetext">{$mod->Lang('title_title')}:</p>
   <p class="pageinput">
      {$mod->Lang('help_title')}<br>
      <input type="text" name="{$actionid}title" value="{$widget->title}" size="50"/>
   </p>
</div>
<div class="pageoverflow">
   <p class="pagetext">{$mod->Lang('title_category')}:</p>
   <p class="pageinput">{$input_category_id}</p>
</div>
<div class="pageoverflow">
   <p class="pagetext">{$mod->Lang('title_heading')}:</p>
   <p class="pageinput">
      <!-- {$mod->Lang('help_heading')}<br> -->
	In case of accordians, this would be the accordian title:
      <input type="text" name="{$actionid}heading" value="{$widget->heading}" size="60"/>
   </p>
</div>
<div class="pageoverflow">
   <p class="pagetext">{$mod->Lang('title_content')}:</p>
   <p class="pageinput">
      {$mod->Lang('help_content')}<br>
	<b>Please ensure default formats and styles are applied correctly!</b><br/><br/>
      {$input_content}
   </p>
</div>
<div class="pageoverflow">
   <p class="pagetext">{$mod->Lang('title_wysiwyg')}:</p>
   <p class="pageinput">{$input_wysiwyg}</p>
</div>
<div class="pageoverflow">
   <p class="pagetext">{$mod->Lang('title_link_to')}:</p>
   <p class="pageinput">
      {$mod->Lang('help_link_to')}<br>
      Please keep this to <b>NONE</b> for <b>thumbnails</b> to work: 
      {$input_link_to}
   </p>
</div>
<div class="pageoverflow">
   <p class="pagetext">{$mod->Lang('title_link_text')}:</p>
   <p class="pageinput">
      <b>Optional: </b>{$mod->Lang('help_link_text')}<br>
      <b>In case of thumbnails, this would be image link. Please put absolute links for better rendering and SEO</b><br>
      <input type="text" name="{$actionid}link_text" value="{$widget->link_text}"/>
   </p>
</div>
<br>
<!--
<div class="pageoverflow">
   <p class="pagetext">{$mod->Lang('title_style_options')}:</p>
   <p class="pageinput">
      {$mod->Lang('help_style_options')}<br>
      {$input_styleOptions}
   </p>
</div> 
-->
<div class="pageoverflow">
   <p class="pagetext">{$mod->Lang('title_alias')}:</p>
   <p class="pageinput">
      <input type="text" name="{$actionid}alias" value="{$widget->alias}"" size="50"/>
   </p>
</div>
<p>&nbsp;</p>
<div class="pageoverflow">
   <p class="pageinput">
      <input type="submit" name="{$actionid}submit" value="{$mod->Lang('submit')}"/>
      <input type="submit" name="{$actionid}cancel" value="{$mod->Lang('cancel')}"/>
      <input type="submit" name="{$actionid}apply" value="{$mod->Lang('apply')}"/>
   </p>
</div>
{form_end}
