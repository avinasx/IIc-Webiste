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

<script type="text/javascript">
var actionid = '{$actionid}';
$(function(){
  $('.field_opts').hide();
  var sel = $('#fieldtype').val();
  $('.'+sel+'_opts').show();
  $('#fieldtype').change(function(){
    var sel = $(this).val();
    $('.field_opts').hide();
    $('.'+sel+'_opts').show();
  });
});
</script>

<h3>{$title}</h3>
{$startform}
	<div class="pageoverflow">
		<p class="pagetext">*{$nametext}:</p>
		<p class="pageinput">{$inputname}</p>
	</div>
	{if $showinputtype eq true}
		<div class="pageoverflow">
			<p class="pagetext">*{$typetext}:</p>
			<p class="pageinput">
                          <select name="{$actionid}type" id="fieldtype">
                          {html_options options=$fieldtypes selected=$type}
                          </select>
                        </p>
		</div>
	{else}
                <div class="pageoverflow">
                <input type="hidden" id="fieldtype" name="{$actionid}type" value="{$type}"/>
	  	   <p class="pagetext">{$typetext}: {$fieldtypes.$type}</p>
                </div>
	{/if}
	<div class="pageoverflow field_opts textbox_opts">
		<p class="pagetext">*{$mod->Lang('size')}:</p>
		<p class="pageinput">
                   <input type="text" name="{$actionid}size" value="{$attrs.size}" size="5"/>
                </p>
	</div>
	<div class="pageoverflow field_opts textbox_opts">
		<p class="pagetext">*{$maxlengthtext}:</p>
		<p class="pageinput">
                   <input type="text" name="{$actionid}max_length" value="{$attrs.max_length}" size="5"/>
                </p>
	</div>

	<div class="pageoverflow field_opts file_opts">
		<p class="pagetext">*{$mod->Lang('allowed_filetypes')}:</p>
		<p class="pageinput">
                   <input type="text" name="{$actionid}file_exts" value="{$attrs.file_exts}" size="40" maxlength="255"/>
                </p>
	</div>

        <div class="pageoverflow field_opts image_opts">
		<p class="pagetext">{$mod->Lang('allowed_imagetypes')}</p>
		<p class="pageinput">
                   <input type="text" name="{$actionid}image_exts" value="{$attrs.image_exts}" size="40" maxlength="255"/>
                </p>
        </div>
        <div class="pageoverflow field_opts textarea_opts">
		<p class="pagetext">{$mod->Lang('enable_wysiwyg')}</p>
		<p class="pageinput">
                   <select name="{$actionid}textarea_wysiwyg">
                   {cge_yesno_options selected=$attrs.textarea_wysiwyg}
                   </select>
                </p>
        </div>

	<div class="pageoverflow">
		<p class="pagetext">*{$userviewtext}:</p>
		<p class="pageinput">{$input_userview}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">&nbsp;</p>
		<p class="pageinput">{$hidden}{$submit}{$cancel}</p>
	</div>
{$endform}
