<style>
tr.pastevent td {
   color: red !important;
}
</style>
<h3>{$mod->Lang('title_mass_adjust_articles')}</h3>

<div class="information">{$mod->Lang('info_mass_adjust_articles')}</div>
{$formstart}
<fieldset>
  <legend>{$mod->Lang('articles')}</legend>
  <table class="pagetable">
  <thead>
    <tr>
      <th>{$mod->Lang('id')}</th>
      <th>{$mod->Lang('title')}</th>
      <th>{$mod->Lang('summary')}</th>
      <th>{$mod->Lang('status')}</th>
      <th>{$mod->Lang('postdate')}</th>
      <th>{$mod->Lang('startdate')}</th>
      <th>{$mod->Lang('enddate')}</th>
    </tr>
  </thead>
  <tbody>
    {foreach $articles as $article}
      {$past=0}
      {if empty($article.end_time)}
        {if strtotime($article.start_time) < $smarty.now}{$past=1}{/if}
      {else}
        {if strtotime($article.end_time) < $smarty.now}{$past=1}{/if}
      {/if}
      <tr {if $past==1}class="pastevent"{/if}>
        <td>{$article.cgblog_id}</td>
        <td>{$article.cgblog_title}</td>
        <td>{$article.summary|strip_tags|summarize}</td>
        <td>{$mod->Lang($article.status)}</td>
        <td>{$article.cgblog_date|cms_date_format}</td>
        <td>{$article.start_time|cms_date_format}</td>
        <td>{$article.end_time|cms_date_format}</td>
      </tr>
    {/foreach}
  </tbody>
  </table>
</fieldset>
<div class="pageoverflow">
  <p class="pagetext">{$mod->Lang('adjustment')}</p>
  <p class="pageinput">
     {$dirs[-1]=$mod->Lang('back')}
     {$dirs[1]=$mod->Lang('ahead')}
     <select name="{$actionid}dir">
       {html_options options=$dirs selected=$dir}
     </select>

     {for $i=1 to 60}
     {$n[$i]=$i}
     {/for}
     <select name="{$actionid}count">
       {html_options options=$n selected=$count}
     </select>

     {$t['m']=$mod->Lang('minutes')}
     {$t['h']=$mod->Lang('hours')}
     {$t['d']=$mod->Lang('days')}
     {$t['mo']=$mod->Lang('months')}
     {$t['y']=$mod->Lang('years')}
     <select name="{$actionid}type">
       {html_options options=$t selected=$type}
     </select>
  </p>
</div>
<div class="pageoverflow">
  <p class="pagetext">{$mod->Lang('adjust_enddate')}:</p>
  <p class="pageinput">
    {cge_yesno_options prefix=$actionid name=do_enddate selected=$do_enddate}
  </p>
</div>
<div class="pageoverflow">
  <p class="pageinput">
    <input type="submit" name="{$actionid}submit" value="{$mod->Lang('submit')}"/>
    <input type="submit" name="{$actionid}cancel" value="{$mod->Lang('cancel')}"/>
  </p>
</div>
{$formend}