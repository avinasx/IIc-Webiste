{$startform}
   <div class="pageoverflow">
      <p class="pagetext">{$title_customModuleName}:</p>
      <p class="pageinput">{$input_customModuleName}</p>
   </div>
   <div class="pageoverflow">
      <p class="pagetext">{$title_adminSection}:</p>
      <p class="pageinput">{$input_adminSection}</p>
   </div>
   <div class="pageoverflow">
      <p class="pagetext">{$title_widgetStyleOptions}:</p>
      <p class="pageinput">
         {$help_widgetStyleOptions|nl2br}
         {cms_textarea prefix=$actionid name=input_styleOptions value=$styleOptions}
      </p>
   </div>
   <div class="pageoverflow">
      <p class="pagetext">&nbsp;</p>
      <p class="pageinput">
         <input type="submit" name="{$actionid}submit" value="{$mod->Lang('submit')}"/>
      </p>
   </div>
{$endform}