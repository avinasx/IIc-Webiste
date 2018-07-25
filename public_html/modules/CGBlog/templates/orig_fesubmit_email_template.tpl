{* frontend submit email template *}
A new news article has been posted to your website.  The details are as follows:
{$mod->Lang('title')}:     {$article.cgblog_title}
{$mod->Lang('summary')}:   {$article.summary|strip_tags}
{$mod->Lang('author')}:    {$article.author}

{$mod->Lang('status')}:    {$article.status}
{$mod->Lang('ipaddress')}: {$ipaddress}
{$mod->Lang('postdate')}:  {$article.cgblog_date|date_format}

{if $use_expiry}
{$mod->Lang('startdate')}: {$article.start_time|date_format}
{$mod->Lang('enddate')}:   {$article.end_time|date_format}
{/if}