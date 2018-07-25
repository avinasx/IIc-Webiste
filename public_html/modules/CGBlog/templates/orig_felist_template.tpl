{* orig frontend list template *}
<script type="text/javascript">
$(document).ready(function(){
  $('#cgblog_myarticles > form').attr('class','form-inline').attr('role','form');
  $('a.delete_article').click(function(){
    return confirm('{$mod->Lang('areyousure')}');
  });
});
</script>
<div id="cgblog_myarticles">

  <h3>{$mod->Lang('my_articles')}</h3>
  <h4>{$mod->Lang('you_authored')}: {$count}</h4>

  {* this form can be deleted without effecting the behavior of the frontend list *}
  {if $count > 0}
    {$formstart}
    <fieldset>
      {* search will be done using a simple LIKE expression.  strings must be 3 characters or longer. *}
      <legend>{$mod->Lang('search')}</legend>
      <div class="form-group">
        <label>{$mod->Lang('search_text')}: <input type="text" class="form-control" name="{$actionid}cgblog_searchtext" value="{$actionparams.cgblog_searchtext|default:''}"/></label>
      </div>
      <button type="submit" class="btn btn-active" name="{$actionid}cgblog_filter">{$mod->Lang('filter')}</button>
      <p class="help-block">{$mod->Lang('info_search')}</p>
    </fieldset>
    {$formend}
  {/if}

  {if isset($add_url)}
  <div class="nav"> <a class="button btn-dflt active" href="{$add_url}">{$mod->Lang('addarticle')}</a> </div>
  {/if}

  {if isset($prevpage_url) || isset($nextpage_url)}
  <div class="pagination row">
    {if isset($firstpage_url)} <a href="{$firstpage_url}">{$mod->Lang('firstpage')}</a>&nbsp; {/if}
    {if isset($prevpage_url)} <a href="{$prevpage_url}">{$mod->Lang('prevpage')}</a>&nbsp; {/if}
    <span> {$mod->Lang('prompt_page')} {$curpage} {$mod->Lang('prompt_of')} {$numpages} </span>
    {if isset($nextpage_url)} &nbsp;<a href="{$nextpage_url}">{$mod->Lang('nextpage')}</a> {/if}
    {if isset($lastpage_url)} &nbsp;<a href="{$lastpage_url}">{$mod->Lang('lastpage')}</a> {/if}
  </div>
  {/if}

  {if isset($articles)}
  <table class="table">
    <thead>
      <tr>
        <th>{$mod->Lang('id')}</th>
        <th>{$mod->Lang('title')}</th>
        <th>{$mod->Lang('startdate')}</th>
        <th>{$mod->Lang('enddate')}</th>
        <th>{$mod->Lang('modified')}</th>
        <th>{$mod->Lang('status')}</th>
        <th class="icon"></th>
        <th class="icon"></th>
      </tr>
    </thead>
    <tbody>
    {foreach from=$articles item='one'}
      <tr>
        <td>{$one->cgblog_id}</td>
        <td><a href="{$one->edit_url}">{$one->cgblog_title}</a></td>
        <td>
           {if $one->start_time_ut > $smarty.now}<span style="color: yellow;">{else}<span>{/if}
           {$one->start_time|cms_date_format}
           </span>
        </td>
        <td>
          {if $one->end_time_ut < $smarty.now}<span style="color: red;">{else}<span>{/if}
          {$one->end_time|cms_date_format}
          </span>
        </td>
        <td>{$one->modified_date|cms_date_format}</td>
        <td>
          {if $one->status != 'published'}<span style="color: red;">{else}<span>{/if}
          {$mod->Lang($one->status)}
          </span>
        </td>
        <td><a href="{$one->edit_url}">{$mod->Lang('edit')}</a></td>
        <td><a class="delete_article" href="{$one->delete_url}">{$mod->Lang('delete')}</a></td>
      </tr>
    {/foreach}
    </tbody>
  </table>
  {/if}

</div>{* #cgblog_myarticles *}