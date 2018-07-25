{* original form template *}
<script type="text/javascript">
function toggle_dates() {
  var elem = document.getElementById('use_expiry');
  if( elem.checked == true ) {
    document.getElementById('datefields').style.display = 'block';
  }
  else {
    document.getElementById('datefields').style.display = 'none';
  }
}
</script>

{if isset($error)}
  <div class="alert alert-danger">{$error}</h3>
{elseif isset($message)}
  <div class="alert alert-info">
    <p>{$message}</p>
    <p style="text-align: right;">{$return_link}</p>
  </div>
{/if}

{if !isset($message)}
{$startform}{$hidden}
	<div class="row">
		<p class="col-md-4 text-right">*{$titletext}:</p>
		<p class="col-md-8">
		  <input type="text" name="{$actionid}cgblog_title" size="30" maxlength="255" class="form-control" value="{$article.cgblog_title}"/>
		</p>
	</div>
	{if isset($category_tree)}
	<div class="row">
	        {function do_category_tree depth=0}
                  {foreach $category_tree as $node}
                    {repeat string='&nbsp;&nbsp; ' times=$depth} <label>
		      <input type="checkbox" name="{$thename}[]" value="{$node.id}" {if in_array($node.id,$sel_categories)}checked="checked"{/if}> {$node.name}
		    </label><br/>
                    {if isset($node.children)}{do_category_tree category_tree=$node.children depth=$depth+1}{/if}
                  {/foreach}
		{/function}
		<p class="col-md-4 text-right">{$categorytext}:</p>
		<p class="col-md-8" style="max-height: 8em; overflow-y: auto;">
		  {$thename=$actionid|cat:'cgblog_category_id'}
		  {do_category_tree}
                </p>
	</div>
	{/if}
{if !isset($hide_summary_field) or $hide_summary_field == 0}
	<div class="row">
		<p class="col-md-4 text-right">{$summarytext}:</p>
		<p class="col-md-8">{$inputsummary}</p>
	</div>
{/if}
{if isset($prompt_status)}
        <div class="row">
		<p class="col-md-4 text-right">{$prompt_status}:</p>
		<p class="col-md-8">{$input_status}
		   <select name="{$actionid}cgblog_status" class="form-control">
		     {html_options options=$status_opts selected=$article.status}
		   </select>
		</p>
        </div>
{/if}
	<div class="row">
		<p class="col-md-4 text-right">*{$contenttext}:</p>
		<p class="col-md-8">{$inputcontent}</p>
	</div>
	<div class="row">
		<p class="col-md-4 text-right">{$extratext}:</p>
		<p class="col-md-8">
                  <input type="text" class="form-contrl" name="{$actionid}cgblog_extra" value="{$article.cgblog_extra}"/>
                </p>
	</div>

        {if $fesubmit_useexpiry}
	<div class="row">
		<p class="col-md-4 text-right">{$CGBlog->Lang('useexpiration')}:</p>
		<p class="col-md-8">
                  <input type="hidden" name="{$actionid}cgblog_usexpiry" value="0"/>
  	          <input type="checkbox" id="use_expiry" name="{$actionid}cgblog_usexpiry" value="1" {if $use_expiry == 1}checked="checked"{/if} onclick="toggle_dates();"/>
                </p>
	</div>
        <div id="datefields" {if $use_expiry == 0}style="display: none;"{/if}>
	<div class="row">
		<p class="col-md-4 text-right">{$startdatetext}:</p>
		<p class="col-md-8">{html_select_date prefix=$startdateprefix time=$startdate start_year='-10' end_year="+15"} {html_select_time prefix=$startdateprefix time=$startdate}</p>
	</div>
	<div class="row">
		<p class="col-md-4 text-right">{$enddatetext}:</p>
		<p class="col-md-8">{html_select_date prefix=$enddateprefix time=$enddate start_year='-10' end_year="+15"} {html_select_time prefix=$enddateprefix time=$enddate}</p>
	</div>
        </div>
        {/if}

	{if isset($customfields)}
	   {foreach from=$customfields item='onefield'}
	      <div class="row">
		<p class="col-md-4 text-right">{$onefield->name}:</p>
		<p class="col-md-8">{$onefield->field}</p>
	      </div>
	   {/foreach}
	{/if}
	<div class="row">
		<p class="col-md-4 text-right">&nbsp;</p>
		<p class="col-md-8">
                  <button name="{$actionid}cgblog_submit">{$CGBlog->Lang('submit')}</button>
                  <button name="{$actionid}cgblog_cancel">{$CGBlog->Lang('cancel')}</button>
                </p>
	</div>
{$endform}
{/if}