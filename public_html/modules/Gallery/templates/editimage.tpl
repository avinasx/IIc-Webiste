{*<div class="pageoverflow">
<h3>{$pagetitle}</h3>
</div>*}

<div class="pageoverflow">
	<div style="float:left; border:2px solid #ccc; margin:0 50px; padding:1px;">{$image->thumb}</div>
  <p class="pagetext">{$file}: #{$image->fileid}</p>
  <p class="pageinput">{$image->filename_input}</p>
  <p class="pageinput"><br /><br /></p>
  <p class="pageinput">{$rotateanticlockwise} &nbsp; {$rotateclockwise}</p>
</div>


{$TabHeaders}
{$StartTab_image}

{$formstart}{$hidden}

<div class="pageoverflow">
  <p class="pagetext">{$title}:</p>
  <p class="pageinput">{$image->title_input}</p>
</div>

<div class="pageoverflow">
  <p class="pagetext">{$comment}:</p>
  <p class="pageinput">{$image->comment_input}</p>
</div>

<div class="pageoverflow">
  <p class="pagetext">{$filedate}:</p>
  <p class="pageinput">{$image->filedate_input}</p>
</div>

{foreach from=$image->fields item=field }
<div class="pageoverflow">
  <p class="pagetext">{$field.name}:</p>
  <p class="pageinput">{$field.fieldhtml}{$field.publicfieldhtml}</p>
</div>
{/foreach}

<div class="pageoverflow">
  <p class="pagetext">&nbsp;</p>
  <p class="pageinput">{$submit}{$apply}{$cancel}</p>
	<p>&nbsp;</p>
</div>

{$formend}

{$EndTab}
{$StartTab_thumbs}

{$formstart2}{$hidden2}

<div style="float:left; min-width:200px;">
	{$prompt_template}<br />
	{$template}
	<br /><br />
	{$thumb_current}<br />
	<img src="{$image->thumburl}" id="currentthumb" alt="current thumbnail" style="border:2px solid #ccc; padding:1px;" />
	<br /><br />
	{$thumb_preview}<br />
	<div style="padding-right:40px; margin-right:20px; background: transparent url(../modules/Gallery/images/back.gif) no-repeat right center;">
		<div id="thumbpreviewcontainer" style="overflow:hidden; border:2px solid #ccc; padding:1px;">
			<img src="{$image->file}" id="thumbpreview" alt="thumbnail preview" />
		</div>
	</div>
	<br /><br />
	{*$acceptbutton*}
</div>

<div style="float:left;">
	{$editthumb_help}<br />
  <img src="{$image->file}" id="cropbox" {$image->filewidthheight} alt="" style="border:2px solid #ccc; padding:1px;" />
</div>

<div class="pageoverflow">
  <p class="pagetext">&nbsp;</p>
  <p class="pageinput">{$submit2}{$apply2}{$cancel2}</p>
	<p>&nbsp;</p>
</div>

{$formend}

<script type="text/javascript">{literal}
	$(function() {
		$('#templateid').change( function() {
			location.href = "{/literal}{$redirect_url}{literal}"+$(this).val();
		});
		ias = $('#cropbox').imgAreaSelect({
			instance: true,
			onSelectChange: preview,
			onSelectEnd: function (img, selection) {{/literal}
				$('input[name="{$id}x1"]').val(selection.x1);
				$('input[name="{$id}y1"]').val(selection.y1);
				$('input[name="{$id}x2"]').val(selection.x2);
				$('input[name="{$id}y2"]').val(selection.y2);{literal}
			}
		});
		changethumb();
	});
{/literal}</script>

{$EndTab}
{$EndTabContent}