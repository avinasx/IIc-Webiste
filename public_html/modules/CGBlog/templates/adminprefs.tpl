{$startform}
<fieldset>
<legend>{$mod->Lang('general_options')}:</legend>
        <div class="pageoverflow">
		<p class="pagetext">{$mod->Lang('prompt_friendlyname')}:</p>
		<p class="pageinput">
		  <input type="text" name="{$actionid}friendlyname" value="{$friendlyname}" size="80" maxlength="1024"/>
		</p>
        </div>
	{if isset($input_default_category)}
	<div class="pageoverflow">
		<p class="pagetext">{$title_default_category}:</p>
		<p class="pageinput">{$input_default_category}</p>
	</div>
	{/if}
        <div class="pageoverflow">
		<p class="pagetext">{$mod->Lang('url_template')}:</p>
		<div class="pageinput">
		  <input type="text" name="{$actionid}urltemplate" value="{$urltpl}" size="80" maxlength="1024"/>
	   	  <br/>{$mod->Lang('info_urltemplate')}
		</div>
        </div>
	<div class="pageoverflow">
		<p class="pagetext">{$mod->Lang('url_prefix')}:</p>
		<p class="pageinput">
                  <input type="text" name="{$actionid}urlprefix" size="20" maxlength="20" value="{$urlprefix}"/><br/>{$mod->Lang('info_urlprefix')}
                </p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$title_hide_summary_field}:</p>
		<p class="pageinput">{$input_hide_summary_field}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$title_allow_summary_wysiwyg}:</p>
		<p class="pageinput">{$input_allow_summary_wysiwyg}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$title_expiry_interval}:</p>
		<p class="pageinput">{$input_expiry_interval}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$title_expired_searchable}:</p>
		<p class="pageinput">{$input_expired_searchable}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$mod->Lang('title_default_status')}:</p>
		<p class="pageinput">
		<select name="{$actionid}default_status">
                {html_options options=$statusopts selected=$default_status}
                </select>
		</p>
	</div>
	{if $have_cgsb}
	<div class="pageoverflow">
	     <p class="pagetext">{$mod->Lang('title_social_announce')}</p>
	     <p class="pageinput">
	     	<select name="{$actionid}social_announce">{cge_yesno_options selected=$social_announce}</select>
	     </p>
	</div>
	{/if}
</fieldset>

<fieldset>
<legend>{$mod->Lang('summary_options')}:</legend>
	<div class="pageoverflow">
		<p class="pagetext">{$mod->Lang('title_default_detailpage')}:</p>
		<p class="pageinput">{$default_detailpage}<br/>{$mod->Lang('info_default_detailpage')}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$mod->Lang('title_default_summarypage')}:</p>
		<p class="pageinput">{$default_summarypage}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$mod->Lang('title_default_sortby')}:</p>
		<p class="pageinput">
		 	<select name="{$actionid}default_sortby">
			{html_options options=$sortby_opts selected=$default_sortby}
			</select>
			<br/>
			{$mod->Lang('info_default_sortby')}
		</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$mod->Lang('title_default_sortorder')}:</p>
		<p class="pageinput">
		 	<select name="{$actionid}default_sortorder">
			{html_options options=$sortorder_opts selected=$default_sortorder}
			</select>
			<br/>
			{$mod->Lang('info_default_sortorder')}
		</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$mod->Lang('title_default_pagelimit')}:</p>
		<p class="pageinput">
			<input type="text" name="{$actionid}default_pagelimit" value="{$default_pagelimit}" size="3" maxlength="4"/>
			<br/>
			{$mod->Lang('info_default_pagelimit')}
		</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$mod->Lang('title_default_showall')}:</p>
		<p class="pageinput">
		{cge_yesno_options prefix=$actionid name=default_showall selected=$default_showall}
		<br/>
		{$mod->Lang('info_default_showall')}
		</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$mod->Lang('title_default_showarchive')}:</p>
		<p class="pageinput">
		{cge_yesno_options prefix=$actionid name=default_showarchive selected=$default_showarchive}
		<br/>
		{$mod->Lang('info_default_showarchive')}
		</p>
	</div>
</fieldset>

<fieldset>
<legend>{$mod->Lang('fesubmit_options')}:</legend>
	<div class="pageoverflow">
		<p class="pagetext">{$mod->Lang('fesubmit_managearticles')}:</p>
		<p class="pageinput">
                  <select name="{$actionid}fesubmit_managearticles">
                    {html_options options=$yesnoopts selected=$fesubmit_managearticles}
                  </select>
		</p>
	</div>

	<div class="pageoverflow">
		<p class="pagetext">{$mod->Lang('fesubmit_wysiwyg')}:</p>
		<p class="pageinput">
                  <select name="{$actionid}fesubmit_wysiwyg">
                    {html_options options=$yesnoopts selected=$fesubmit_wysiwyg}
                  </select>
                  <br/>
                  {$mod->Lang('info_fesubmit_wysiwyg')}
		</p>
	</div>

	<div class="pageoverflow">
		<p class="pagetext">{$mod->Lang('fesubmit_status')}:</p>
		<p class="pageinput">
                  <select name="{$actionid}fesubmit_status">
                    {html_options options=$statusopts selected=$fesubmit_status}
                  </select>
                </p>
	</div>

	<div class="pageoverflow">
		<p class="pagetext">{$mod->Lang('fesubmit_updatestatus')}:</p>
		<p class="pageinput">
                  <select name="{$actionid}fesubmit_updatestatus">
                    {html_options options=$yesnoopts selected=$fesubmit_updatestatus}
                  </select>
                </p>
	</div>

        <div class="pageoverflow">
                <p class="pagetext">{$mod->Lang('fesubmit_usexpiry')}:</p>
                <p class="pageinput">
                  <select name="{$actionid}fesubmit_usexpiry">
                    {html_options options=$yesnoopts selected=$fesubmit_usexpiry}
                  </select>
                </p>
        </div>

        <div class="pageoverflow">
                <p class="pagetext">{$mod->Lang('fesubmit_dfltexpiry')}:</p>
                <p class="pageinput">
                  <select name="{$actionid}fesubmit_dfltexpiry">
                    {html_options options=$yesnoopts selected=$fesubmit_dfltexpiry}
                  </select>
                </p>
        </div>
{if isset($feu_groups)}
	<div class="pageoverflow">
		<p class="pagetext">{$mod->Lang('fesubmit_draftviewers')}:</p>
		<p class="pageinput">
                  <select name="{$actionid}fesubmit_draftviewers">
                    {html_options options=$feu_groups selected=$fesubmit_draftviewers}
                  </select>
                </p>
	</div>
{/if}

	<div class="pageoverflow">
		<p class="pagetext">{$mod->Lang('fesubmit_redirect')}:</p>
		<p class="pageinput">
                  {$fesubmit_redirect}
                </p>
	</div>

   <fieldset>
        <legend>{$mod->Lang('legend_fesubmit_notification')}:</legend>
        <div class="pageoverflow">
		<p class="pagetext">{$mod->Lang('fesubmit_email_status')}:</p>
		<p class="pageinput">
			{html_radios name="{$actionid}fesubmit_email_status" options=$email_statuses selected=$fesubmit_email_status separator='&nbsp;&nbsp;'}
		</p>
        </div>

	<div class="pageoverflow">
		<p class="pagetext">{$mod->Lang('fesubmit_email_users')}:</p>
		<p class="pageinput">
                  {$fesubmit_email_users_input}
                </p>
	</div>

	<div class="pageoverflow">
		<p class="pagetext">{$mod->Lang('fesubmit_email_subject')}:</p>
		<p class="pageinput">
                  <input type="text" size="80" name="{$actionid}fesubmit_email_subject" value="{$fesubmit_email_subject}"/>
                </p>
	</div>

	<div class="pageoverflow">
		<p class="pagetext">{$mod->Lang('fesubmit_email_html')}:</p>
		<p class="pageinput">
                  <select name="{$actionid}fesubmit_email_html">
                    {html_options options=$yesnoopts selected=$fesubmit_email_html}
                  </select>
                </p>
	</div>

	<div class="pageoverflow">
		<p class="pagetext">{$mod->Lang('fesubmit_email_template')}:</p>
		<p class="pageinput">
                  {$fesubmit_email_template_area}<br/>
                  <input type="submit" name="{$actionid}fesubmit_template_reset" value="{$mod->Lang('resettodefault')}"/>
                </p>
	</div>
   </fieldset>

</fieldset>

	<div class="pageoverflow">
		<p class="pagetext">&nbsp;</p>
		<p class="pageinput">{$submit}</p>
	</div>
{$endform}