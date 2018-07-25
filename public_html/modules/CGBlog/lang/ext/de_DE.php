<?php
$lang['reorder_categories'] = 'Kategorien neu sortieren';
$lang['category_description'] = 'Beschreibung';
$lang['search'] = 'Suche';
$lang['err_nothingselected'] = 'Nichts ausgewählt';
$lang['msg_bulk_successful'] = 'Massenaktion erfolgreich';
$lang['with_selected'] = 'ausgewählt';
$lang['legend_fesubmit_notification'] = 'Benachrichtigungen';
$lang['reset'] = 'Zurücksetzen';
$lang['notice'] = 'Hinweis';
$lang['detail_page'] = 'Detailseite';
$lang['detail_template'] = 'Detailvorlage';
$lang['tab_preview'] = 'Vorschau';
$lang['article'] = 'Artikel';
$lang['helpuglyurls'] = 'Applicable only to the browsecat action, this parameter will force the category browsing action to not generate pretty urls, therefor parameters used in the call to CGBlog can be passed through to the summary view';
$lang['helpnotcategory'] = 'Applicable to the default summary action, this parameter allows specifying a comma separated list of category names representing categories to NOT return in the results.  This parameter cannot be used with the category or categoryid parameters.';
$lang['info_default_showarchive'] = 'If enabled, only articles that have expired and would not normally show are displayed.  This option is ignored if showall is selected';
$lang['title_default_showarchive'] = 'Zeige archivierte Artikel';
$lang['title_default_showall'] = 'Zeige alle Artikel';
$lang['info_default_showall'] = 'If selected, all articles, regardless of status, or start and end date, will be displayed';
$lang['title_default_pagelimit'] = 'Voreingestellte Begrenzung der Seitenzahl';
$lang['info_default_pagelimit'] = 'The page limit specifies how many articles will appear on each page.  Must be an integer value between 1 and 50000.';
$lang['info_default_sortorder'] = 'Sort order is not relevant when using random sorting';
$lang['info_default_sortby'] = 'Select the default sorting for summary views.  When using random sorting it is possible that entries will appear on multiple pages.';
$lang['sortorder_desc'] = 'Absteigend';
$lang['sortorder_asc'] = 'Aufsteigend';
$lang['sortby_starttime'] = 'Artikel-Startdatum';
$lang['sortby_endtime'] = 'Artikel-Enddatum';
$lang['sortby_random'] = 'Zufällige Sortierung';
$lang['sortby_extra'] = 'Artikel-Extrafeld';
$lang['sortby_summary'] = 'Artikelzusammenfassung';
$lang['sortby_category'] = 'Artikelkategorie';
$lang['sortby_title'] = 'Artikeltitel';
$lang['sortby_date'] = 'Artikeldatum';
$lang['title_default_sortby'] = 'Voreingestellte Sortierung';
$lang['title_default_sortorder'] = 'Voreingestellte Sortierreihenfolge';
$lang['summary_options'] = 'Optionen für Zusammenfassungsansicht';
$lang['prompt_friendlyname'] = 'Anzeigename für dieses Modul';
$lang['url_template'] = 'URL-Vorlage';
$lang['error_urlused'] = 'Die angegebene URL wird bereits verwendet';
$lang['error_badurl'] = 'Die angegebene URL ist ungültig';
$lang['info_fesubmit_wysiwyg'] = 'This option disables use of the wysiwyg in all areas of the frontend submission form, regardless of other settings';
$lang['fesubmit_wysiwyg'] = 'Verwendung des WYSIWYG-Editors erlauben';
$lang['return_to_content'] = 'Zurück';
$lang['size'] = 'Größe';
$lang['allowed_filetypes'] = 'Erlaubte Dateitypen';
$lang['enable_wysiwyg'] = 'WYSIWYG Aktivieren';
$lang['preview_size'] = 'Größe des Vorschaubilds (in Pixel)';
$lang['preview'] = 'Vorschaubild generieren';
$lang['watermark'] = 'Wasserzeichen auf hochgeladene Bilder setzen';
$lang['allowed_imagetypes'] = 'Erlaubte Bildtypen';
$lang['image'] = 'Bild';
$lang['help_adminuser'] = 'Applicable only to the default (summary) view, this module allowss filtering the output to only those admin user names specified.  i.e: <code>admin_user="bob,fred,george"</code>';
$lang['help_fesubmitpage'] = 'Applicable only to the myarticles action, this parameter allows specifying a different page <em>(by id or alias)</em> for the frontend submit form.</li>';
$lang['help_userparam'] = 'Applicable only to the <em>(default)</em> summary action, this parameter allows filtering the output to only those <em>(non expired)</em> FEU author names specified.  i.e <code>author="user1@somewhere.com,user2@somewhere.com"</code>.';
$lang['help_inline'] = 'Applicable only to the myarticles action, this parameter specifies that the pagination links should be created in an inline manner.  i.e:  the resulting output from the link will replace the original tag, not the {content} tag on the destination page';
$lang['fesubmit_updatestatus'] = 'Frontend Benutzer dürfen Artikelstatus ändern';
$lang['you_authored'] = 'Die Anzahl der Artikel, die Sie bis heute veröffentlicht haben, ist';
$lang['my_articles'] = 'Meine Artikel';
$lang['id'] = 'ID';
$lang['modified'] = 'Geändert';
$lang['fesubmit_managearticles'] = 'Frontend-Benutzern die Verwaltung der eigenen Blogartikel erlauben?';
$lang['fesubmit_dfltexpiry'] = 'Für Frontend eingereichte Artikel, Verfallsdatum als Standard setzen';
$lang['fesubmit_usexpiry'] = 'Benutzer, die Artikel über Frontend schreiben, dürfen Artikel Verfallsdatum deaktivieren';
$lang['url'] = 'URL';
$lang['helpshowdraft'] = 'Kann nur in der voreingestellten Zusammenfassungsansicht verwendet werden, mit diesem Parameter werden nur Artikel im Status "Entwurf" angezeigt. Dies funktioniert nur dann, wenn der angemeldete FrontendUsers-Benutzer über die Registerkarte "Optionen" des CGBlog-Moduls autorisiert wurde, die Entwürfe zu sehen.';
$lang['title_default_status'] = 'Voreingestellter Status für neue Artikel';
$lang['fesubmit_draftviewers'] = 'FEU-Gruppe, die Artikel mit dem Status Entwurf sehen darf';
$lang['title_default_summarypage'] = 'Voreingestellte Zusammenfassungseite (falls keine Seiten-ID in der URL vorgegeben wurde)';
$lang['title_default_detailpage'] = 'Voreingestellte Detailseite (falls keine Seiten-ID in der URL vorgegeben wurde)';
$lang['helparchivetemplate'] = 'Funktioniert nur, wenn der Parameter action <em>archive</em> ist. Mit diesem Parameter kann ein alternatives Archiv-Anzeige-Template festgelegt werden.';
$lang['addedit_archive_template'] = 'Eine Archivvorlage hinzufügen/bearbeiten';
$lang['info_archive_templates'] = 'Verfügbare Archivvorlagen';
$lang['archivetemplate'] = 'Archivvorlagen';
$lang['title_sysdefault_archive_template'] = 'Voreingestellte Archivvorlagen';
$lang['helpfelisttemplate'] = 'Applicable only to the <em>myarticles</em> action, this parameter can be used to specify an alternate Article List Report template';
$lang['helpfesubmittemplate'] = 'Funktioniert nur, wenn der Parameter action <em>fesubmit</em> ist. Mit diesem Parameter kann eine alternative Formularvorlage festgelegt werden.';
$lang['helpsummarypage'] = 'Funktioniert nur, wenn der Parameter action <em>browsecat</em> und <em>archive</em> ist. Dieser Parameter kann eine Seiten-ID oder einen Seiten-Alias für die Anzeige der Zusammenfassung enthalten, die nach dem Klick auf einen Kategorien-Link angezeigt wird';
$lang['help_month'] = 'Funktioniert nur, wenn der Parameter action <em>default</em> ist. Dieser Parameter kann einen Monat (integer) enthalten, für den alle Einträge angezeigt werden sollen. Dieser Parameter funktioniert nur in Verbindung mit dem Parameter "year".';
$lang['category_modified'] = 'Die Kategorie wurde erfolgreich bearbeitet.';
$lang['category_name'] = 'Kategoriename';
$lang['edit_category'] = 'Kategorie bearbeiten';
$lang['error_nocatname'] = 'Es wurde kein Name für die Kategorie angegeben';
$lang['move_up'] = 'Nach oben verschieben';
$lang['move_down'] = 'Nach unten verschieben';
$lang['postuninstall'] = 'Das CGBlog-Modul wurde deinstalliert. Sie sollten nun aus Sicherheitsgründen auch die mit diesem Modul verbundenen Dateien löschen.';
$lang['ipaddress'] = 'IP-Adresse';
$lang['fesubmit_redirect'] = 'Die Seiten-ID oder der Seiten-Alias der Seite, auf die der Einsender eines Blog-Eintrags über die fesubmit-Aktion weitergeleitet werden soll';
$lang['templaterestored'] = 'Vorlage wiederhergestellt';
$lang['fesubmit_status'] = 'Der Status für Blog-Einträge, die über die Webseite (Frontend) erstellt wurden';
$lang['fesubmit_email_users'] = 'Eine Benachrichtigung via E-Mail an diese Benutzer senden';
$lang['no'] = 'Nein';
$lang['yes'] = 'Ja';
$lang['fesubmit_email_template'] = 'E-Mail-Vorlage';
$lang['fesubmit_email_html'] = 'Als HTML-E-Mail versenden?';
$lang['fesubmit_email_subject'] = 'Betreff der E-Mail';
$lang['general_options'] = 'Allgemeine Blog-Einstellungen';
$lang['fesubmit_options'] = 'Frontend-Blog-Optionen';
$lang['dflt_email_subject'] = 'Es wurde ein neuer Blog-Eintrag erstellt.';
$lang['postdatetoolate'] = 'Das eingegebene Datum ist zu lang';
$lang['title_sysdefault_felist_template'] = 'Voreingestellte Frontend-Artikellisten-Berichtsvorlage';
$lang['title_sysdefault_fesubmit_template'] = 'Voreingestellte Frontend-Formularvorlage';
$lang['addedit_felist_template'] = 'Eine Frontend-Artikellisten-Berichtvorlage hinzufügen/bearbeiten';
$lang['addedit_fesubmit_template'] = 'Eine Frontend-Formularvorlage hinzufügen/bearbeiten';
$lang['info_felist_templates'] = 'Verfügbare Frontend-Artikellisten-Berichtsvorlagen';
$lang['info_fesubmit_templates'] = 'Verfügbare Frontend-Formularvorlagen';
$lang['felisttemplate'] = 'Frontend-Artikellisten-Berichtsvorlagen';
$lang['fesubmittemplate'] = 'Frontend-Formularvorlagen';
$lang['help_year'] = 'In Verbindung mit der voreingestellten Aktion (Zusammenfassungs-Ansicht) kann dieser Parameter ein Jahr enthalten, für welches alle Blog-Einträge angezeigt werden sollen.';
$lang['info_urlprefix'] = 'Dies funktioniert nur dann, wenn die PrettyURLs via mod_rewrite oder interne PrettyURLs aktiviert werden. Außerdem kann dieser Wert nicht verwendet werden, wenn für den Blog-Eintrag eine bestimmte URL festgelegt wurde.';
$lang['url_prefix'] = 'Präfix, mit dem alle URLs des CGBlog-Moduls gekennzeichnet werden sollen';
$lang['friendlyname'] = 'Calguys Blog-Modul';
$lang['select_category'] = 'Sie müssen mindestens eine Kategorie angeben';
$lang['set_default'] = 'Als Voreinstellung festlegen';
$lang['category_deleted'] = 'Kategorie gelöscht';
$lang['error_dberror'] = 'Es ist ein Fehler mit der Datenbank aufgetreten. Bitte kontaktieren Sie Ihren Administrator.';
$lang['category_added'] = 'Kategorie hinzugefügt';
$lang['category_name_exists'] = 'Eine Kategorie mit diesem Namen existiert bereits';
$lang['error_insufficient_params'] = 'Für diese Aktion wurden nicht ausreichende oder ungültige Parameter angegeben';
$lang['add_category'] = 'Kategorie hinzufügen';
$lang['addedit_summary_template'] = 'Zusammenfassungsvorlage hinzufügen/bearbeiten';
$lang['addedit_detail_template'] = 'Detailvorlage hinzufügen/bearbeiten';
$lang['addedit_browsecat_template'] = 'Kategorienvorlage hinzufügen/bearbeiten';
$lang['info_summary_templates'] = 'Verfügbare Zusammenfassungsvorlagen';
$lang['info_detail_templates'] = 'Verfügbare Detailvorlagen';
$lang['info_browsecat_templates'] = 'Verfügbare Kategorienvorlagen';
$lang['title_sysdefault_browsecat_template'] = 'Voreingestellte Kategorienvorlage';
$lang['title_sysdefault_detail_template'] = 'Voreingestellte Detailvorlage';
$lang['title_sysdefault_summary_template'] = 'Voreingestellte Zusammenfassungsvorlage';
$lang['info_sysdefault_template'] = 'Diese Vorlage legt den Inhalt fest, der automatisch eingefügt wird, wenn eine neue Vorlage eines bestimmten Typs erstellt wird. Alle hier vorgenommenen Änderungen haben KEINEN direkten Einfluss auf die Ausgaben auf Ihrer Webseite.';
$lang['expired_searchable'] = 'Blog-Einträge, deren Verfallsdatum überschritten ist, dürfen in den Suchergebnissen erscheinen';
$lang['helpshowall'] = 'Alle Blog-Einträge anzeigen (unabhängig von deren Verfallsdatum)';
$lang['error_invaliddates'] = 'Ein oder mehrere der eingegebenen Daten sind ungültig';
$lang['notify_n_draft_items_sub'] = '%d CGBlog-Einträge';
$lang['notify_n_draft_items'] = '%d CGBlog-Einträge wurde(n) noch nicht veröffentlicht.';
$lang['unlimited'] = 'Unbegrenzt';
$lang['none'] = 'Keine';
$lang['anonymous'] = 'Anonym';
$lang['unknown'] = 'Unbekannt';
$lang['allow_summary_wysiwyg'] = 'Den WYSIWYG-Editor für das Zusammenfassungsfeld verwenden';
$lang['title_browsecat_template'] = 'Vorlageneditor für die Kategorienanzeige';
$lang['title_browsecat_sysdefault'] = 'Voreingestellte Vorlage für die Kategorienanzeige';
$lang['browsecattemplate'] = 'Vorlage für die Kategorienanzeige';
$lang['error_filesize'] = 'Die hochgeladene Datei überschreitet die maximal erlaubte Größe';
$lang['post_date_desc'] = 'Nach Erstellungsdatum absteigend';
$lang['post_date_asc'] = 'Nach Erstellungsdatum aufsteigend';
$lang['expiry_date_desc'] = 'Nach Verfallsdatum absteigend';
$lang['expiry_date_asc'] = 'Nach Verfallsdatum aufsteigend';
$lang['title_desc'] = 'Nach Titel absteigend';
$lang['title_asc'] = 'Nach Titel aufsteigend';
$lang['error_invalidfiletype'] = 'Dieser Dateityp darf nicht hochgeladen werden';
$lang['error_upload'] = 'Beim Hochladen der Datei ist ein Problem aufgetreten';
$lang['error_movefile'] = 'Konnte die Datei %s nicht erstellen';
$lang['error_mkdir'] = 'Konnte das Verzeichnis %s nicht erstellen';
$lang['expiry_interval'] = 'Voreingestellte Anzahl der Tage, nach denen ein Eintrag verfällt (falls ein Verfallsdatum verwendet wird)';
$lang['removed'] = 'Entfernt';
$lang['delete_selected'] = 'Ausgewählte Einträge löschen';
$lang['areyousure_deletemultiple'] = 'Wollen Sie wirklich alle ausgewählten Blog-Einträge löschen?\nDies kann NICHT rückgängig gemacht werden!';
$lang['error_templatenamexists'] = 'Es existiert bereits eine Vorlage mit diesem Namen!';
$lang['error_noarticlesselected'] = 'Es wurden keine Blog-Eintrag ausgewählt';
$lang['reassign_category'] = 'Kategorie ändern auf';
$lang['select'] = 'Auswählen';
$lang['approve'] = 'Status auf „veröffentlicht“ setzen';
$lang['revert'] = 'Status auf „Entwurf“ setzen';
$lang['hide_summary_field'] = 'Das Zusammenfassungsfeld verbergen, wenn ein Eintrag hinzugefügt oder bearbeitet wird';
$lang['textbox'] = 'Einzeiliges Textfeld';
$lang['checkbox'] = 'Kontrollkästchen';
$lang['textarea'] = 'Mehrzeiliger Textbereich';
$lang['file'] = 'Datei';
$lang['fielddefupdated'] = 'Felddefinition aktualisiert';
$lang['editfielddef'] = 'Felddefinition bearbeiten';
$lang['up'] = 'Nach oben';
$lang['down'] = 'Nach unten';
$lang['fielddefdeleted'] = 'Felddefinition gelöscht';
$lang['nameexists'] = 'Ein Feld mit diesem Namen existiert bereits';
$lang['notanumber'] = 'Die maximale Länge ist keine Zahl';
$lang['fielddef'] = 'Felddefinition';
$lang['fielddefadded'] = 'Die Felddefinition wurde erfolgreich hinzugefügt';
$lang['public'] = 'Öffentlich';
$lang['type'] = 'Typ';
$lang['info_maxlength'] = 'Die maximale Länge hat nur Auswirkungen auf einzeilige Textfelder.';
$lang['maxlength'] = 'Maximale Länge';
$lang['addfielddef'] = 'Felddefinition hinzufügen';
$lang['customfields'] = 'Felddefinitionen';
$lang['deprecated'] = 'Nicht unterstützt';
$lang['extra'] = 'Extrafeld';
$lang['uploadscategory'] = 'Kategorie im Uploads-Modul';
$lang['title_available_templates'] = 'Verfügbare Vorlagen';
$lang['resettodefault'] = 'Auf die programmseitigen Voreinstellungen zurücksetzen';
$lang['prompt_templatename'] = 'Vorlagenname';
$lang['prompt_template'] = 'Vorlagenquelle';
$lang['template'] = 'Vorlage';
$lang['prompt_name'] = 'Name';
$lang['prompt_default'] = 'Standard';
$lang['prompt_newtemplate'] = 'Eine neue Vorlage erstellen';
$lang['help_pagelimit'] = 'Maximale Anzahl der anzuzeigenden Einträge (pro Seite). Ohne diesen Parameter werden alle Einträge angezeigt. Wenn dieser Parameter gesetzt wurde und mehr Einträge vorhanden sind, als pro Seite angezeigt werden sollen, werden Links eingeblendet, um vorwärts oder rückwärts zu den nächsten Seiten blättern zu können.';
$lang['prompt_page'] = 'Seite';
$lang['firstpage'] = '«';
$lang['prevpage'] = '‹';
$lang['nextpage'] = '›';
$lang['lastpage'] = '»';
$lang['prompt_of'] = 'von';
$lang['prompt_pagelimit'] = 'Einträge  pro Seite';
$lang['prompt_sorting'] = 'Sortieren nach';
$lang['title_filter'] = 'Anzeige filtern';
$lang['published'] = 'Veröffentlicht';
$lang['draft'] = 'Entwurf';
$lang['expired'] = 'Abgelaufen';
$lang['author'] = 'Autor';
$lang['sysdefaults'] = 'Auf die programmseitigen Voreinstellungen zurücksetzen';
$lang['restoretodefaultsmsg'] = 'Diese Funktion setzt die Vorlagen auf die programmseitigen Voreinstellung zurück. Wollen Sie das wirklich?';
$lang['addarticle'] = 'Blog-Eintrag hinzufügen';
$lang['articleadded'] = 'Der Eintrag wurde hinzugefügt.';
$lang['articleaddeddraft'] = 'The entry was successfully added.  An administrator will review your entry for content and if approved will publish the article.';
$lang['articleupdated'] = 'Der Eintrag wurde aktualisiert.';
$lang['articledeleted'] = 'Der Eintrag wurde gelöscht.';
$lang['addcategory'] = 'Kategorie hinzufügen';
$lang['addcgblogitem'] = 'Blog-Eintrag hinzufügen';
$lang['allcategories'] = 'Alle Kategorien';
$lang['allentries'] = 'Alle Einträge';
$lang['areyousure'] = 'Wollen Sie dies wirklich löschen?';
$lang['articles'] = 'Einträge';
$lang['cancel'] = 'Abbrechen';
$lang['category'] = 'Kategorie';
$lang['categories'] = 'Kategorien';
$lang['default_category'] = 'Standardkategorie';
$lang['content'] = 'Inhalt';
$lang['delete'] = 'Löschen';
$lang['description'] = 'Hinzufügen, Bearbeiten und Löschen von Blog-Einträgen';
$lang['detailtemplate'] = 'Detailvorlagen';
$lang['default_templates'] = 'Voreingestellte Vorlagen';
$lang['detailtemplateupdated'] = 'Die aktualisierte Detailvorlage wurde in der Datenbank gespeichert.';
$lang['displaytemplate'] = 'Vorlage anzeigen';
$lang['edit'] = 'Bearbeiten';
$lang['enddate'] = 'Verfallsdatum';
$lang['endrequiresstart'] = 'Wenn Sie ein Verfallsdatum angeben, müssen Sie auch ein Startdatum festgelegen.';
$lang['entries'] = '%s Einträge';
$lang['status'] = 'Status';
$lang['expiry'] = 'Ablauf';
$lang['filter'] = 'Blog-Einträge filtern';
$lang['more'] = 'mehr';
$lang['category_label'] = 'Kategorie:';
$lang['author_label'] = 'Erstellt von:';
$lang['moretext'] = 'Text für den „mehr“-Link';
$lang['name'] = 'Name';
$lang['cgblog_return'] = 'Zurück';
$lang['newcategory'] = 'Neue Kategorie';
$lang['needpermission'] = 'Sie benötigen die Berechtigung „%s“, um diese Funktion nutzen zu können.';
$lang['nocategorygiven'] = 'Keine Kategorie vorhanden';
$lang['startdatetoolate'] = 'FEHLER: Das Startdatum muss VOR dem Verfallsdatum liegen';
$lang['nocontentgiven'] = 'Kein Inhalt vorhanden';
$lang['noitemsfound'] = '<strong>Keine</strong> Einträge gefunden in der Kategorie: %s';
$lang['nopostdategiven'] = 'FEHLER: Es wurde kein Erstellungsdatum eingegeben';
$lang['note'] = '<em>Hinweis:</em> Datum/Zeit muss im Format „JJJJ-MM-TT hh:mm:ss“ angegeben werden.';
$lang['notitlegiven'] = 'FEHLER: Es wurde kein Titel eingegeben';
$lang['nonamegiven'] = 'FEHLER: Es wurde kein Name eingegeben';
$lang['numbertodisplay'] = 'Anzuzeigende Anzahl (ohne Eintrag werden alle Datensätze angezeigt)';
$lang['print'] = 'Drucken';
$lang['postdate'] = 'Erstellt am';
$lang['postinstall'] = 'Stellen Sie sicher, dass die Benutzer, die die CGBlog verwalten, die Berechtigung „Modify CGBlog“ haben.';
$lang['selectcategory'] = 'Kategorie auswählen';
$lang['sortascending'] = 'Aufsteigend sortieren';
$lang['startdate'] = 'Anfangsdatum';
$lang['startoffset'] = 'Beginnt mit der Anzeige ab dem <span style="font-style: italic;">n</span>-ten Eintrag';
$lang['startrequiresend'] = 'Die Eingabe eines Startdatums erfordert auch die Eingabe eines Verfallsdatums.';
$lang['submit'] = 'Speichern';
$lang['summary'] = 'Zusammenfassung';
$lang['summarytemplate'] = 'Zusammenfassungsvorlage';
$lang['summarytemplateupdated'] = 'Die CGBlog-Zusammenfassungsvorlage wurde aktualisiert.';
$lang['title'] = 'Titel';
$lang['options'] = 'Optionen';
$lang['optionsupdated'] = 'Die Einstellungen wurden gespeichert.';
$lang['useexpiration'] = 'Verfallsdatum verwenden';
$lang['eventdesc-CGBlogArticleAdded'] = 'Ausführen, wenn ein Eintrag hinzugefügt wurde.';
$lang['eventhelp-CGBlogArticleAdded'] = '<p>Ausführen, wenn ein Eintrag hinzugefügt wurde.</p>
<h4>Parameter</h4>
<table>
<tr>
<th scope="row">cgblog_id</th>
<td>ID des CGBlog-Eintrags</td>
</tr>
<tr>
<th scope="row">category_id</th>
<td>ID der Kategorie für diesen Eintrag</td>
</tr>
<tr>
<th scope="row">title</th>
<td>Titel des Eintrags</td>
</tr>
<tr>
<th scope="row">content</th>
<td>Inhalt des Eintrags</td>
</tr>
<tr>
<th scope="row">summary</th>
<td>Zusammenfassung des Eintrags</td>
</tr>
<tr>
<th scope="row">status</th>
<td>Status des Eintrags („Entwurf/draft“ oder „Veröffentlicht/publish“)</td>
</tr>
<tr>
<th scope="row">start_time</th>
<td>Datum, ab dem der Eintrag angezeigt werden soll</td>
</tr>
<tr>
<th scope="row">end_time</th>
<td>Datum, ab dem der Eintrag nicht mehr angezeigt werden soll</td>
</tr>
<tr>
<th scope="row">useexp</th>
<td>das Verfallsdatum soll ignoriert werden oder auch nicht</td>
</tr>
</table>
<p><strong>Hinweis:</strong> Da dieses Ereignis von verschiedenen Stellen ausgelöst wird, werden nicht alle Parameter an das Ereignis übergeben.  Die Daten können über den Parameter cgblog_id aus der Datenbank abgefragt werden.</p';
$lang['eventdesc-CGBlogArticleEdited'] = 'Ausführen, wenn ein Eintrag bearbeitet wurde.';
$lang['eventhelp-CGBlogArticleEdited'] = '<p>Ausführen, wenn ein Eintrag bearbeitet wurde.</p>
<h4>Parameter</h4>
<table>
<tr>
<th scope="row">cgblog_id</th>
<td>ID des CGBlog-Artikels</td>
</tr>
<tr>
<th scope="row">category_id</th>
<td>ID der Kategorie für diesen Eintrag</td>
</tr>
<tr>
<th scope="row">title</th>
<td>Titel des Eintrags</td>
</tr>
<tr>
<th scope="row">content</th>
<td>Inhalt des Eintrags</td>
</tr>
<tr>
<th scope="row">summary</th>
<td>Zusammenfassung des Eintrags</td>
</tr>
<tr>
<th scope="row">status</th>
<td>Status des Eintrags („Entwurf/draft“ oder „Veröffentlicht/publish“)</td>
</tr>
<tr>
<th scope="row">start_time</th>
<td>Datum, ab dem der Eintrag angezeigt werden soll</td>
</tr>
<tr>
<th scope="row">end_time</th>
<td>Datum, ab dem der Eintrag nicht mehr angezeigt werden soll</td>
</tr>
<tr>
<th scope="row">useexp</th>
<td>das Verfallsdatum soll ignoriert werden oder auch nicht</td>
</tr>
</table>';
$lang['eventdesc-CGBlogArticleDeleted'] = 'Ausführen, wenn ein Eintrag gelöscht wurde.';
$lang['eventhelp-CGBlogArticleDeleted'] = '<p>Ausführen, wenn ein Eintrag gelöscht wird.</p>
<h4>Parameter</h4>
<table>
<tr>
<th scope="row">cgblog_id</th>
<td>ID des CGBlog-Artikels</td>
</tr>
</table>';
$lang['eventdesc-CGBlogCategoryAdded'] = 'Ausführen, wenn eine Kategorie hinzugefügt wurde.';
$lang['eventhelp-CGBlogCategoryAdded'] = '<p>Ausführen, wenn eine Kategorie hinzugefügt wurde.</p>
<h4>Parameter</h4>
<table>
<tr>
<th scope="row">category_id</th>
<td>ID der CGBlog-Kategorie</td>
</tr>
<tr>
<th scope="row">name</th>
<td>Name der CGBlog-Kategorie</td>
</tr>
</table>';
$lang['eventdesc-CGBlogCategoryEdited'] = 'Ausführen, wenn eine Kategorie bearbeitet wurde.';
$lang['eventhelp-CGBlogCategoryEdited'] = '<p>Ausführen, wenn eine Kategorie bearbeitet wurde.</p>
<h4>Parameter</h4>
<table>
<tr>
<th scope="row">category_id</th>
<td>ID der CGBlog-Kategorie</td>
</tr>
<tr>
<th scope="row">name</th>
<td>Name der CGBlog-Kategorie</td>
</tr>
<tr>
<th scope="row">origname</th>
<td>ursprünglicher Name der Nachrichtenkategorie</td>
</tr>
</table>';
$lang['eventdesc-CGBlogCategoryDeleted'] = 'Ausführen, wenn eine Kategorie gelöscht wurde.';
$lang['eventhelp-CGBlogCategoryDeleted'] = '<p>Ausführen, wenn eine Kategorie gelöscht wurde.</p>
<h4>Parameter</h4>
<table>
<tr>
<th scope="row">category_id</th>
<td>ID der gelöschten Kategorie</td>
</tr>
<tr>
<th scope="row">name</th>
<td>Name der gelöschten Kategorie</td>
</tr>
</table>';
$lang['help_articleid'] = 'Dieser Parameter funktioniert nur in der Detailansicht. Mit ihm kann vorgegeben werden, welcher Blog-Eintrag im Detail-Modus angezeigt werden soll. Wird an dieser Stelle der Wert -1 verwendet, wird der neueste veröffentliche, nicht abgelaufene Blog-Eintrag angezeigt.';
$lang['helpnumber'] = 'Anzahl der maximal anzuzeigenden Einträge (pro Seite) – ohne Parameter werden alle Einträge angezeigt.';
$lang['helpstart'] = 'Beginnt die Anzeige mit dem n-ten Eintrag – wird das Feld leer gelassen, wird mit dem ersten Eintrag begonnen.';
$lang['helpcategory'] = 'Mit diesem Parameter können Sie festlegen, aus welcher Kategorie die Einträge angezeigt werden. <strong>Um auch die Unterkategorien anzuzeigen, geben Sie nach dem Kategorienamen ein * ein.</strong> Über eine durch Kommata getrennte Liste können auch mehrere Kategorien angezeigt werden. Ohne diesen Parameter werden alle Kategorien angezeigt. Dieser Parameter funktioniert auch mit der Aktion „fesubmit“, obwohl dort nur eine Kategorie unterstützt wird.';
$lang['helpsummarytemplate'] = 'Verwendet ein separates Template für die Anzeige der Blog-Zusammenfassungen. Dieses Template muss vorhanden sein und in der Administration des CGBlog-Moduls in der Registerkarte „Zusammenfassungs-Template“ angezeigt werden. Ohne Parameter wird das als Standard gekennzeichnete Template verwendet.';
$lang['helpbrowsecattemplate'] = 'Verwendet ein Template für die Anzeige der Kategorien. Dieses Template muss vorhanden sein und  in der Administration des CGBlog-Moduls in der Registerkarte „Kategorien-Template“ angezeigt werden. Sie muss jedoch nicht als Standard gekennzeichnet sein. Ohne Parameter wird das als Standard gekennzeichnete Template für die Anzeige verwendet.';
$lang['helpdetailtemplate'] = 'Verwendet eine separates Template für die Detail-Anzeige des Eintrags. Dieses Template muss vorhanden sein und in der Administration des CGBlog-Moduls in der Registerkarte „Detail-Template“ angezeigt werden. Ohne Parameter wird das als Standard gekennzeichnete Template verwendet.';
$lang['helpsortby'] = 'Felder, nach denen die Einträge sortiert werden. Mögliche Optionen sind: „cgblog_date“, „summary“, „cgblog_data“, „cgblog_category“, „cgblog_title“, „cgblog_extra“, „end_time“, „start_time“, „random“. Standard ist „cgblog_date“. Ist die gewählte Option „random“, wird der Parameter „sortasc“ ignoriert.';
$lang['helpsortasc'] = 'Sortiert Einträge in aufsteigender Folge anstatt in absteigender (nach Datum).';
$lang['helpdetailpage'] = 'Seite, auf der die Blog-Details angezeigt werden. Das kann entweder ein Seiten-Alias oder eine Seiten-ID sein. Damit können die Blog-Details in einem anderen Template als die Blog-Zusammenfassung angezeigt werden.';
$lang['helpshowarchive'] = 'Mit diesem Parameter werden nur die CGBlog-Einträge angezeigt, deren Verfallsdatum überschritten ist.';
$lang['helpbrowsecat'] = 'Mit diesem Parameter wird eine Liste der Kategorien angezeigt (browsecat=\'1\'). Kann NICHT zusammen mit dem Parameter „category“ verwendet werden.';
$lang['helpaction'] = 'Überschreibt die vorgegebene Aktion. Mögliche Werte sind:
<ul>
<li>"archive" - ein Archiv von Blogeinträgen anzeigen</li>
<li>"detail" - einen bestimmten Blogeintrag im Detail-Modus anzeigen</li>
<li>"default" - die Zusammenfassungansicht anzeigen</li>
<li>"browsecat" - eine Kategorienliste anzeigen.</li>
<li>"fesubmit" - auf der Webseite ein Formular zum Übermitteln neuer Blog-Einträge anzeigen.</li>
</ul>';
?>