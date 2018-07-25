{if !empty($uploadimages)}

<script type="text/javascript" src="../modules/Gallery/lib/plupload/plupload.full.min.js"></script>

{/if}

<div class="pageoverflow">
<h3>{$pagetitle}</h3>
</div>
{$formstart}<div class="hidden" id="sort">{$hidden}</div>
{if !empty($directoryname)}
<div class="pageoverflow">
  <p class="pagetext">{$prompt_directoryname}:</p>
  <p class="pageinput">{$directoryname}</p>
</div>

<div class="pageoverflow">
  <p class="pagetext">{$prompt_parent}:</p>
  <p class="pageinput">{$moveto}</p>
</div>
{/if}
<div class="pageoverflow">
  <p class="pagetext">{$prompt_gallerytitle}:</p>
  <p class="pageinput">{$gallerytitle}</p>
</div>

<div class="pageoverflow">
  <p class="pagetext">{$prompt_comment}:</p>
  <p class="pageinput">{$gallerycomment}</p>
</div>

{if !empty($gallerydate)}
<div class="pageoverflow">
  <p class="pagetext">{$prompt_date}:</p>
  <p class="pageinput datepicker">{$gallerydate}</p>
</div>
{/if}

{if !empty($customfields)}
{foreach from=$customfields item=field }
<div class="pageoverflow">
  <p class="pagetext">{$field.name}:</p>
  <p class="pageinput">{$field.fieldhtml}</p>
</div>
{/foreach}
{/if}

{if !empty($prompt_template)}
<div class="pageoverflow">
  <p class="pagetext">{$prompt_template}:</p>
  <p class="pageinput">{$template}</p>
</div>
{else}
{$template}
{/if}

{if !empty($prompt_editors)}
<div class="pageoverflow">
  <p class="pagetext">{$prompt_editors}:</p>
  <p class="pageinput">{$editors}</p>
</div>
{else}
{$editors}
{/if}

<div class="pageoverflow">
  <p class="pagetext">{$prompt_hideparentlink}:</p>
  <p class="pageinput">{$hideparentlink}</p>
</div>

<div class="pageoverflow">
  <p class="pagetext">&nbsp;</p>
  <p class="pageinput">{$submit}{$cancel}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$unsort}{$updatethumbs}</p>
	<p>&nbsp;</p>
</div>

{if !empty($uploadimages)}
<div class="pageoverflow" id="gallerycontainer">
  {$addgallery} &nbsp; {*$selectimages*} &nbsp; {$uploadimages}
</div>

<div class="pageoverflow" id="filelist">
	Your browser doesn't have Flash or HTML5 support.
</div>
{/if}

{if $itemcount > 0}
	<table id="gtable" cellspacing="0" class="pagetable">
		<thead>
		<tr>
			<th class="pageicon">#</th>
			<th>{$item}</th>
			<th>{$title}</th>
			<th>{$comment}</th>
			<th>{$filedate}</th>
			<th class="pageicon">{$cover}</th>
			<th class="pageicon">{$active}</th>
			<th class="pageicon">&nbsp;</th>
			<th class="pageicon">&nbsp;</th>
			<th class="pageicon"><input id="selectall" type="checkbox" /></th>
		</tr>
		</thead>
		<tbody>
	{foreach from=$items item=entry}
		{cycle values="row1,row2" assign=rowclass}
		<tr id="{$entry->fileid}" class="{$rowclass}">
			<td>{$entry->fileid}</td>
			<td>{if !empty($entry->editurl)}<a href="{$entry->editurl}" alt="{$entry->edittext}" title="{$entry->edittext}">{/if}<span style="display: block; width:96px; height:72px; background: url({$entry->thumburl}) no-repeat center; overflow:hidden;">&nbsp;</span>{if !empty($entry->editurl)}</a>{/if}</td>
			<td>{$entry->filename_input}<br />{$entry->title_input}</td>
			<td>{if !$entry->isdir}{$entry->comment_input}{/if}</td>
			<td class="datepicker">{$entry->filedate_input}</td>
			<td class="pagepos" style="text-align:center">{$entry->defaultlink}</td>
			<td class="pagepos" style="text-align:center">{$entry->activelink}{$entry->active}</td>
			<td class="pagepos" style="text-align:center">{$entry->editlink}</td>
			<td class="pagepos" style="text-align:center">{$entry->deletelink}</td>
			<td class="checkbox">{$entry->imgselect}</td>
		</tr>
	{/foreach}
		</tbody>
	</table>

<div class="pageoptions">
	<div style="margin-top: 0; float: right; text-align: right">
		{$prompt_multiaction}: {$multiaction} {$multiactionsubmit}<br /><div style="margin-top:6px;">{$moveto}</div>
	</div>

	<div class="pageoverflow">
		<p class="pageinput">{$submit}{$cancel}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$unsort}{$updatethumbs}</p>
	</div>
</div>
{elseif $itemcount === 0}
	<h4>{$nofilestext}</h4>
{/if}

{$formend}

<script type="text/javascript">
{if !empty($uploadimages)}
	var uploader = new plupload.Uploader({
		runtimes : 'html5,flash,html4',
		browse_button : 'pickfiles', // you can pass in id...
		container: document.getElementById('gallerycontainer'), // ... or DOM Element itself
		url : '{$upload_url}',
		flash_swf_url : 'lib/plupload/Moxie.swf',
		multipart : true,
		multipart_params: {
			uploaddir : '{$upload_dir}'
		},

		filters: {
			max_file_size : '{$file_size_limit}',
			mime_types: [{
				title : 'Image files', 
				extensions : '{$file_types}'
			}]
		},

{if !empty($maximagewidth) && !empty($maximageheight)}
		resize: {
			width: {$maximagewidth},
			height: {$maximageheight},
			quality: {$imagejpgquality}
		},
{/if}

		init: {
			PostInit: function() {
				document.getElementById('filelist').innerHTML = '';
			},

			FilesAdded: function(up, files) {
				plupload.each(files, function(file) {
					document.getElementById('filelist').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
				});
				setTimeout(uploader.start(), 500);
			},

			UploadProgress: function(up, file) {
				document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
			},
			
			UploadComplete: function() {
				// refresh page after 2 seconds
				var url = location.href + '{$msg_complete}';
				setTimeout('window.location.href = \'' + url + '\'', 2000);
			},

			Error: function(up, err) {
				document.getElementById('filelist').innerHTML += '<div id="' + err.file.id + '">' + err.file.name + ' (Error #' + err.code + ": " + err.message + ')</div>';
			}
		}
	});

	uploader.init();

{/if}
	$(function() {
		$( ".datepicker input" ).datepicker({
			dateFormat: 'yy-mm-dd',
			showOtherMonths: true,
			selectOtherMonths: true
		});
	});
</script>
