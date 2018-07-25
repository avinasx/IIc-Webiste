<?php
$lang['error_saving'] = 'Problema nel salvataggio delle informazioni dell\'articolo';
$lang['saved'] = 'Articolo salvato';
$lang['error_adjust_5years'] = 'Spiacente, gli articoli non possono essere regolati per date superiori ai cinque anni';
$lang['error_invalidvalue'] = 'Uno o più valori del form non sono validi per questa operazione.';
$lang['adjust_enddate'] = 'Sistema anche la Data di Fine';
$lang['years'] = 'Anni';
$lang['months'] = 'Mesi';
$lang['hours'] = 'Ore';
$lang['minutes'] = 'Minuti';
$lang['days'] = 'Giorni';
$lang['back'] = 'Indietro';
$lang['ahead'] = 'Avanti';
$lang['adjustment'] = 'Regolazione';
$lang['info_mass_adjust_articles'] = 'Questo form permette di regolare le date di un articolo avanti o indietro di un intervallo specificato. È consentito un massimo di 5 anni, o 60 di una qualsiasi altra unità.';
$lang['title_mass_adjust_articles'] = 'Regolazione di assa dei tempi dell\'articolo';
$lang['adjust_times'] = 'Regolazione dei Tempi';
$lang['help_nochildren'] = 'Applicabile solo all\'azione sommario predefinita, questo parametro indica che, usando i parametri "category", "notcategory", e "category_id", quelle categorie discendenti non dovrebbero anche corrispondere ai criteri. Ad esempio  {CGBlog category=fruit} includerebbe normalmente qualsiasi articolo all\'interno delle sottocategorie di fruit. Con l\'impostazione del parametro nochildren=1, le sottocategorie non sarebbero incluse';
$lang['reorder_complete'] = 'Riordinamenti categorie';
$lang['info_reorder_categories'] = 'È possibile riorganizzare la lista delle categorie trascinando le categorie nel nuovo ordine. Usare cautela poiché la riorganizzazione delle categorie potrebbe causare problemi con la visualizzazione delle categorie stesse nella parte pubblica del sito';
$lang['reorder_categories'] = 'Riordinamento Categorie';
$lang['error_notfound'] = 'Voce non trovata';
$lang['error_deleteparent'] = 'Una categoria genitrice non può essere eliminata';
$lang['category_parent'] = 'Genitore';
$lang['category_description'] = 'Descrizione';
$lang['search'] = 'Cerca';
$lang['search_text'] = 'Testo da Cercare';
$lang['info_search'] = 'Esegue una ricerca di sottostringa sul titolo  dell\'articolo, e sul contenuto degli articoli di tua proprietà. Inserire almeno tre caratteri';
$lang['err_nothingselected'] = 'Nessuna selezione';
$lang['msg_bulk_successful'] = 'Operazione di massa eseguita con successo';
$lang['with_selected'] = 'Con Selezionato:';
$lang['fesubmit_email_status'] = 'Spedisci una email quando lo stato dell\'articolo è';
$lang['any'] = 'Qualsiasi';
$lang['legend_fesubmit_notification'] = 'Notifiche';
$lang['title_needs_approval'] = 'Questo articolo è in attesa di revisione';
$lang['review'] = 'Revisione';
$lang['info_urltemplate'] = 'Questo modello controlla il modo in cui il sistema ajax personalizzato di costruzione dell\'URL costruirà automaticamente l\'URL.
<br/><strong>Nota:</strong> Gli URL personalizzati non includono il returnid nell\'URL, quindi la pagina di dettaglio predefinita nelle preferenze viene usata per determinare la pagina (e di conseguenza il modello di pagina) in cui visualizzare l\'articolo del blog. Se non è valida la pagina di dettaglio nelle preferenze, verrà utilizzata la pagina di contenuto predefinita del sistema.
<br/>Questo è un modello smarty semplificato. Le variabili disponibili sono:
<ul>
  <li>{$orig_title} - titolo originale dell\'articolo del blog</li>
  <li>{$title} - Titolo modificato (munged) dell\'articolo del blog (URL safe)</li>
  <li>{$postdate} - La data dell\'articolo specificata nel form aggiungi/modifica.</li>
</ul>';
$lang['info_filter_title'] = 'Inserire una sottostringa del titolo';
$lang['info_filter_author'] = 'Inserire una sottostringa dell\'autore';
$lang['reset'] = 'Reset';
$lang['really_uninstall'] = 'Sicuro di voler disinstallare questo modulo? Tutte le informazioni associate a questo modulo verranno eliminate permanentemente dal database.';
$lang['error_getarticle'] = 'Si è verificato un problema durante il ricupero dell\'articolo';
$lang['toggle_filter'] = 'Visualizza Form Filtro';
$lang['help_title'] = 'Applicabile solo all\'azione "default" (summary), questo parametro permette il filtraggio in base ad una sottostringa del titolo.';
$lang['help_searchexpired'] = 'Applicabile solo al modulo di ricerca (come specificato utilizzando le funzionalità passthru del modulo di ricerca) questo parametro, se attivato, permetterà la ricerca di articoli spirati indipendentemente dalle preferenze impostate nel pannello di amministrazione del modulo';
$lang['warning_fielddelete'] = 'I campi personalizzati possono essere eliminati solo quando il campo, collegato a qualsiasi post del blog, non contiene nessun valore.';
$lang['notice'] = 'Nota';
$lang['error_invalidurl'] = 'L\'url dell\'articolo del blog specificato non è valido. Forse contiene caratteri non validi, o è un duplicato dell\'url di un altro articolo';
$lang['detail_page'] = 'Pagina di Dettaglio';
$lang['detail_template'] = 'Modello di Dettaglio';
$lang['warning_preview'] = 'Attenzione: Questo pannello di anteprima si comporta come una finestra del browser permettendo di navigare fuori dalla pagina iniziale scelta per l\'anteprima. Tuttavia, in questo caso, potrebbe verificarsi un comportamento non previsto. Tornando indietro dopo aver lasciato la pagina iniziale non darà il risultato che ci si aspetta.<br/><strong>Nota:</strong> L\'anteprima non carica i file che potresti aver selezionato per il caricamento.';
$lang['tab_preview'] = 'Anteprima';
$lang['article'] = 'Articolo';
$lang['helpuglyurls'] = 'Applicabile solo all\'azione browsecat, questo parametro forzerà l\'azione di navigazione nella categoria a non generare pretty urls, quindi i parametri usati nel richiamare CGBlog possono essere passati alla visualizzazione del sommario';
$lang['helpnotcategory'] = 'Applicabile solo all\'azione predefinita del sommario, questo parametro consente di specificare una lista di nomi di categoria, separati da virgole, che NON devono essere comprese nei risultati. Questo parametro non può essere utilizzato insieme ai parametri category o categoryid.';
$lang['info_default_showarchive'] = 'Se abilitato, sono visualizzati solo gli articoli scaduti o che normalmente non verrebbero mostrati.  Questa opzione viene ignorata se è stato selezionato showall';
$lang['title_default_showarchive'] = 'Mostra Articoli Archiviati';
$lang['title_default_showall'] = 'Mostra Tutti  gli Articoli';
$lang['info_default_showall'] = 'Se selezionato, verranno visualizzati tutti gli articoli, a prescindere dal loro stato, o data di inizio e di fine';
$lang['title_default_pagelimit'] = 'Limite di Pagina Predefinito';
$lang['info_default_pagelimit'] = 'Il limite di pagina specifica quanti articoli saranno mostrati in ogni pagina.  Deve trattarsi di un valore intero compreso tra 1 e 50000.';
$lang['info_default_sortorder'] = 'Il tipo di ordinamento non è rilevante quando si usa l\'ordinamento casuale';
$lang['info_default_sortby'] = 'Selezionare l\'ordinamento predefinito per le visualizzazioni del sommario. Usando l\'ordinamento casuale le varie voci potrebbero comparire su più pagine.';
$lang['sortorder_desc'] = 'Discendente';
$lang['sortorder_asc'] = 'Ascendente';
$lang['sortby_starttime'] = 'Data Inizio Articolo';
$lang['sortby_endtime'] = 'Data Fine Articolo';
$lang['sortby_random'] = 'Ordinamento Casuale';
$lang['sortby_extra'] = 'Campo Extra Articolo';
$lang['sortby_summary'] = 'Summario Articolo';
$lang['sortby_category'] = 'Categoria Articolo';
$lang['sortby_title'] = 'Titolo Articolo';
$lang['sortby_date'] = 'Data Articolo';
$lang['title_default_sortby'] = 'Ordinamento Predefinito';
$lang['title_default_sortorder'] = 'Ordinamento Predefinito';
$lang['summary_options'] = 'Opzioni Visualizzazione Sommario';
$lang['prompt_friendlyname'] = 'Nome Descrittivo per questo Modulo';
$lang['url_template'] = 'URL Modello';
$lang['error_urlused'] = 'L\'URL specificato è già in uso';
$lang['error_badurl'] = 'L\'URL specificato non è valido';
$lang['info_fesubmit_wysiwyg'] = 'Questa opzione disabilita l\'uso di editor wysiwyg in tutte le aree del form nel frontend, a prescindere da altre impostazioni';
$lang['fesubmit_wysiwyg'] = 'Permetti l\'utilizzo dell\'editor wysiwyg';
$lang['return_to_content'] = 'Torna';
$lang['size'] = 'Grandezza';
$lang['allowed_filetypes'] = 'Tipi di File Consentiti';
$lang['enable_wysiwyg'] = 'Abilita Wysiwyg';
$lang['preview_size'] = 'Grandezza Immagine di Anteprima (pixels)';
$lang['preview'] = 'Genera immagine di anteprima';
$lang['watermark'] = 'Filigrana immagine caricata';
$lang['allowed_imagetypes'] = 'Tipi di Immagine Consentiti';
$lang['image'] = 'Immagine';
$lang['help_adminuser'] = 'Applicabile solo alla visualizzazione predefinita (sommario), questo modulo consente il filtraggio dell\'output solo ai nomi degli utenti amministratori specificati. Ad esempio: <code>admin_user="bob,fred,george"</code>';
$lang['help_fesubmitpage'] = 'Applicabile solo all\'azione myarticles, questo parametro permette di specificare una pagina differente <em>(per id o alias)</em> per il form nel frontend.';
$lang['help_userparam'] = 'Applicabile solo all\'azione summary <em>(predefinito)</em>, questo parametro consente il filtraggio dell\'output soltanto ai nomi degli autori di FEU <em>(non scaduti)</em> specificati. Ad esempio:
<code>author="user1@somewhere.com,user2@somewhere.com"</code>.';
$lang['help_inline'] = 'Applicabile solo all\'azione myarticles, questo parametro stabilisce che i link della paginazione dovrebbero essere generati nel modo inline. Ovvero:  l\'output generato dal link sostituirà il tag originale, non il tag {content}, nella pagina di destinazione';
$lang['fesubmit_updatestatus'] = 'Agli Utenti di Frontend è permesso cambiare lo stato degli articoli';
$lang['you_authored'] = 'Ad oggi, il numero di articoli che hai scritto è';
$lang['my_articles'] = 'I Miei Articoli';
$lang['id'] = 'Id';
$lang['modified'] = 'Modificato';
$lang['fesubmit_managearticles'] = 'Agli Utenti di Frontend è permessa la gestione dei propri articoli del blog?';
$lang['fesubmit_dfltexpiry'] = 'Per impostazione predefinita, gli articoli pubblicati dal frontend usano la data di scadenza';
$lang['fesubmit_usexpiry'] = 'Gli utenti che pubblicano articoli dal frontend possono disabilitare la scadenza dell\'articolo';
$lang['url'] = 'URL';
$lang['helpshowdraft'] = 'Applicabile solo alla visualizzazione predefinita del sommario, questo parametro farà comparire nei risultati del sommario solo gli articoli in bozza. Funzionerà soltanto se l\'attuale utente di frontend autenticato è autorizzato a visionare le bozze in base all\'impostazione presente nelle opzioni del pannello di amministrazione del modulo CGBlog';
$lang['title_default_status'] = 'Stato Predefinito per i nuovi articoli';
$lang['fesubmit_draftviewers'] = 'Gruppo FEU che può visualizzare gli articoli in bozza';
$lang['title_default_summarypage'] = 'Pagina di sommario predefinita (se nell\'URL non è specificato nessun id di pagina)';
$lang['title_default_detailpage'] = 'Pagina di dettaglio predefinita (se nell\'URL non è specificato nessun id di pagina)';
$lang['helparchivetemplate'] = 'Applicabile solo all\'azione <em>archive</em>, questo parametro può essere usato per specificare un modello di visualizzazione alternativo.';
$lang['addedit_archive_template'] = 'Aggiungi/Modifica un Modello di Visualizzazione dell\'Archivio';
$lang['info_archive_templates'] = 'Modelli di Visualizzazione dell\'Archivio Disponibili';
$lang['archivetemplate'] = 'Modelli di Visualizzazione dell\'Archivio';
$lang['title_sysdefault_archive_template'] = 'Modello dell\'Archivio Predefinito';
$lang['helpfelisttemplate'] = 'Applicabile solo all\'azione <em>myarticles</em>, questo parametro può essere usato per specificare un modello alternativo per l\'Elenco Riassuntivo degli Articoli';
$lang['helpfesubmittemplate'] = 'Applicabile solo all\'azione <em>fesubmit</em>, questo parametro può essere usato per specificare un modello alternativo per il modulo fesubmit';
$lang['helpsummarypage'] = 'Applicabile solo alle azioni <em>browsecat e archive</em>, questo parametro può contenere un id o un alias di pagina da usare per la visualizzazione di relazioni di sintesi generate cliccando il link di una categoria';
$lang['help_month'] = 'Applicabile solo all\'azione <em>default</em>, questo parametro può contenere un mese (intero), in base al quale devono essere visualizzati tutti gli elenchi. Questo parametro funzionerà soltanto insieme al parametro "year".';
$lang['category_modified'] = 'Categoria modificata con successo';
$lang['edit_category'] = 'Modifica Categoria';
$lang['error_nocatname'] = 'Nome della categoria non specificato';
$lang['move_up'] = 'Sposta su';
$lang['move_down'] = 'Sposta giù';
$lang['postuninstall'] = 'Il modulo CGBlog è stato disinstallato. Ora è possibile eliminare i file associati a questo modulo';
$lang['ipaddress'] = 'Indirizzo IP';
$lang['fesubmit_redirect'] = 'ID o alias della pagina da redirigere dopo che un articolo cgblog è stato inviato via azione fesubmit';
$lang['templaterestored'] = 'Modello Ripristinato';
$lang['fesubmit_status'] = 'Lo stato dell\'articolo inviato via frontend';
$lang['fesubmit_email_users'] = 'Manda notifica (via email) a questi utenti';
$lang['no'] = 'No';
$lang['yes'] = 'Si';
$lang['fesubmit_email_template'] = 'Modello Email';
$lang['fesubmit_email_html'] = 'Spedire Email in formato HTML ?';
$lang['fesubmit_email_subject'] = 'Oggetto Email';
$lang['general_options'] = 'Opzioni Generali del Blog';
$lang['fesubmit_options'] = 'Opzioni del Blog per il Submit nel Frontend';
$lang['dflt_email_subject'] = 'È stato pubblicato un nuovo articolo del blog';
$lang['postdatetoolate'] = 'La data inserita per il messaggio è troppo avanzata';
$lang['title_sysdefault_felist_template'] = 'Modello Predefinito per l\'Elenco Riassuntivo degli Articoli nel Frontend';
$lang['title_sysdefault_fesubmit_template'] = 'Modello Predefinito per il Form nel Frontend';
$lang['addedit_felist_template'] = 'Aggiungi/Modifica un Modello per Elenco Riassuntivo degli Articoli nel Frontend';
$lang['addedit_fesubmit_template'] = 'Aggiungi/Modifica un Modello per il Form nel Frontend';
$lang['info_felist_templates'] = 'Modelli Disponibili per l\'Elenco Riassuntivo degli Articoli nel Frontend';
$lang['info_fesubmit_templates'] = 'Modelli Disponibili per il Form nel Frontend';
$lang['felisttemplate'] = 'Modelli per l\'Elenco Riassuntivo degli Articoli nel Frontend';
$lang['fesubmittemplate'] = 'Modelli per il Form nel Frontend';
$lang['help_year'] = 'Utilizzato con l\'azione predefinita (summary), e l\'azione archive, questo parametro può contenere un anno in vbase al quale visualizzare tutti gli elenchi';
$lang['info_urlprefix'] = 'Valido solo se sono abilitati i pretty urls, con mod_rewrite o internal. Inoltre, questo valore non è usato quando è stato specificato un URL per un articolo del blog.';
$lang['url_prefix'] = 'Prefisso da usare in tutti gli URL del modulo blog';
$lang['friendlyname'] = 'Modulo Blog di Calguys';
$lang['select_category'] = 'Devi selezionare almeno una categoria';
$lang['set_default'] = 'Imposta come Predefinito';
$lang['category_deleted'] = 'Categoria Eliminata';
$lang['error_dberror'] = 'Si è verificato un qualche tipo di errore del database. Contatta il tuo amministratore';
$lang['category_added'] = 'Categoria Aggiunta';
$lang['category_name_exists'] = 'Esiste già una Categoria con lo stesso nome';
$lang['error_insufficient_params'] = 'Parametri forniti per l\'azione insufficienti o non validi';
$lang['add_category'] = 'Aggiungi Categoria';
$lang['addedit_summary_template'] = 'Aggiungi/Modifica un Modello per il Sommario';
$lang['addedit_detail_template'] = 'Aggiungi/Modifica un Modello per il Dettaglio';
$lang['addedit_browsecat_template'] = 'Aggiungi/Modifica un Modello per la Categoria';
$lang['info_summary_templates'] = 'Modelli Disponibili per il Sommario';
$lang['info_detail_templates'] = 'Modelli Disponibili per il Dettaglio';
$lang['info_browsecat_templates'] = 'Modelli Disponibili per la Categoria';
$lang['title_sysdefault_browsecat_template'] = 'Modello Predefinito per la Categoria';
$lang['title_sysdefault_detail_template'] = 'Modello Predefinito per il Dettaglio';
$lang['title_sysdefault_summary_template'] = 'Modello Predefinito per il Sommario';
$lang['info_sysdefault_template'] = 'Questo modello determina il contenuto quando si crea un nuovo modello del tipo specificato. Le modifiche effettuate in questo campo non hanno un effetto immediato sull\'output';
$lang['expired_searchable'] = 'Articoli spirati possono apparire nei risultati della ricerca';
$lang['helpshowall'] = 'Mostra tutti gli articoli, senza considerare la data di termine visualizzazione';
$lang['error_invaliddates'] = 'Una o più date inserite non sono valide';
$lang['notify_n_draft_items_sub'] = '%d articolo(i) CGBlog';
$lang['notify_n_draft_items'] = 'Voi avete %s articolo(i) CGBlog che non sono ancora pubblicati';
$lang['unlimited'] = 'Non limitato';
$lang['none'] = 'Nessuno';
$lang['anonymous'] = 'Anonimo';
$lang['unknown'] = 'Sconosciuto';
$lang['allow_summary_wysiwyg'] = 'Permette di usare un editor WYSIWYG sul campo Sommario';
$lang['title_browsecat_template'] = 'Editor per Modello Categoria';
$lang['title_browsecat_sysdefault'] = 'Modello Categoria predefinito';
$lang['browsecattemplate'] = 'Modelli Categoria';
$lang['error_filesize'] = 'Un file inviato eccede la massima dimensione permessa';
$lang['post_date_desc'] = 'Data della pubblicazione discendente';
$lang['post_date_asc'] = 'Data della pubblicazione ascendente';
$lang['expiry_date_desc'] = 'Data di scadenza discendente';
$lang['expiry_date_asc'] = 'Data di scadenza ascendente';
$lang['title_desc'] = 'Titolo discendente';
$lang['title_asc'] = 'Titolo ascendente';
$lang['error_invalidfiletype'] = 'Non posso inviare questo tipo di file';
$lang['error_upload'] = 'Problemi occorsi all\'invio del file';
$lang['error_movefile'] = 'Non posso creare il file: %s';
$lang['error_mkdir'] = 'Non posso creare la cartella: %s';
$lang['expiry_interval'] = 'Il numero di giorni (predefinito) prima che un articolo scada (se la la scadenza è selezionata)';
$lang['removed'] = 'Rimosso';
$lang['delete_selected'] = 'Elimina gli articoli selezionati';
$lang['areyousure_deletemultiple'] = 'Siete sicuri di voler cancellare tutti questi articoli?\nQuesta azione non è reversibile!';
$lang['error_templatenamexists'] = 'Un Modello di quel nome esiste già';
$lang['error_noarticlesselected'] = 'Nessun articolo è stato selezionato';
$lang['reassign_category'] = 'Cambia la categoria a';
$lang['select'] = 'Seleziona';
$lang['approve'] = 'Setta lo stato a \'Pubblicato\'';
$lang['revert'] = 'Setta lo stato a \'Bozza\'';
$lang['hide_summary_field'] = 'Nasconde il campo sommario quando aggiungi o modifichi articoli';
$lang['textbox'] = 'Textinput';
$lang['checkbox'] = 'Check';
$lang['textarea'] = 'Textarea';
$lang['file'] = 'File';
$lang['fielddefupdated'] = 'Definizione del campo aggiornata';
$lang['editfielddef'] = 'Modifica definizione del campo';
$lang['up'] = 'Su';
$lang['down'] = 'Giù';
$lang['fielddefdeleted'] = 'Definizione del campo cancellata';
$lang['nameexists'] = 'Un campo con questo nome già esiste';
$lang['notanumber'] = 'La lunghezza massima non è un numero';
$lang['fielddef'] = 'Definizione del campo';
$lang['fielddefadded'] = 'Definizione del campo aggiunta con successo';
$lang['public'] = 'Pubblico';
$lang['type'] = 'Tipo';
$lang['info_maxlength'] = 'La lunghezza massima si applica solo a campi di testo.';
$lang['maxlength'] = 'Lunghezza massima';
$lang['addfielddef'] = 'Aggiungere definizione del campo';
$lang['customfields'] = 'Definizioni dei campi';
$lang['deprecated'] = 'deprecato';
$lang['extra'] = 'Extra';
$lang['uploadscategory'] = 'Categoria di Upload';
$lang['title_available_templates'] = 'Modelli utilizzabili';
$lang['resettodefault'] = 'Reset ai valori predefiniti';
$lang['prompt_templatename'] = 'Nome del Modello';
$lang['prompt_template'] = 'Sorgente del Modello';
$lang['template'] = 'Modello';
$lang['prompt_name'] = 'Nome';
$lang['prompt_default'] = 'Predefinito';
$lang['prompt_newtemplate'] = 'Crea un nuovo Modello';
$lang['help_pagelimit'] = 'Massimo numero di cgblog da visualizzare (per pagina). Se questo parametro non è dato allora verranno visualizzati tutte le cgblog. Se viene dato e ci sono più cgblog di quelle specificate da questo parametro, saranno inseriti testo e link per permettere lo scrolling del risultato';
$lang['prompt_page'] = 'Pagina';
$lang['firstpage'] = '<<';
$lang['prevpage'] = '<';
$lang['nextpage'] = '>';
$lang['lastpage'] = '>>';
$lang['prompt_of'] = 'di';
$lang['prompt_pagelimit'] = 'Limite pagina';
$lang['prompt_sorting'] = 'Ordine per';
$lang['title_filter'] = 'Filtri';
$lang['published'] = 'Pubblicato';
$lang['draft'] = 'Bozza';
$lang['expired'] = 'Spirato';
$lang['author'] = 'Autore';
$lang['sysdefaults'] = 'Riporta nella configurazione predefinita';
$lang['restoretodefaultsmsg'] = 'Questa operazione riporterà il contenuto del Modello a quello predefinito. Sei sicuro di voler procedere?';
$lang['addarticle'] = 'Aggiunge articolo';
$lang['articleadded'] = 'L\'articolo è stato aggiunto con successo.';
$lang['articleaddeddraft'] = 'L\'articolo è stato aggiunto con successo. Un amministratore controllerà il contenuto dell\'articolo e, se approvato, l\'articolo verrà pubblicato.';
$lang['articleupdated'] = 'L\'articolo è stato aggiornato con successo.';
$lang['articledeleted'] = 'L\'articolo è stato cancellato con successo.';
$lang['addcategory'] = 'Aggiunge categoria';
$lang['addcgblogitem'] = 'Aggiunge cgblog';
$lang['allcategories'] = 'Tutte le categorie';
$lang['allentries'] = 'Tutte le cgblog';
$lang['areyousure'] = 'Sei sicuro di volerlo cancellare?';
$lang['articles'] = 'Articoli';
$lang['cancel'] = 'Annulla';
$lang['category'] = 'Categoria';
$lang['categories'] = 'Categorie';
$lang['default_category'] = 'Categoria predefinita';
$lang['content'] = 'Contenuto';
$lang['delete'] = 'Cancella';
$lang['description'] = 'Aggiunge, modifica e rimuove CGBlog';
$lang['detailtemplate'] = 'Modello dettaglio';
$lang['default_templates'] = 'Modelli predefiniti';
$lang['detailtemplateupdated'] = 'Il Modello dettaglio è stato salvato al database con successo.';
$lang['displaytemplate'] = 'Visualizza Modello';
$lang['edit'] = 'Modifica';
$lang['enddate'] = 'Data Fine';
$lang['endrequiresstart'] = 'Inserire una data di fine richiede anche una data di inizio';
$lang['entries'] = '%s Articoli';
$lang['status'] = 'Stato';
$lang['expiry'] = 'Scade';
$lang['filter'] = 'Filtra';
$lang['more'] = 'Continua...';
$lang['category_label'] = 'Categoria:';
$lang['author_label'] = 'Postato da:';
$lang['moretext'] = 'Altro testo';
$lang['name'] = 'Nome';
$lang['cgblog_return'] = 'Ritorna';
$lang['newcategory'] = 'Nuova categoria';
$lang['needpermission'] = 'Hai bisogno del permesso \'%s\' per usufruire di questa funzione.';
$lang['nocategorygiven'] = 'Categoria non specificata';
$lang['startdatetoolate'] = 'La data di partenza è troppo in ritardo (dopo la fine data?)';
$lang['nocontentgiven'] = 'Contenuto non inserito';
$lang['noitemsfound'] = '<strong>Nessuna</strong> cgblog trovata per la categoria: %s';
$lang['nopostdategiven'] = 'Nessuna data di pubblicazione inserita';
$lang['note'] = '<em>Nota:</em> La data deve essere nel formato: \'yyyy-mm-dd hh:mm:ss\'.';
$lang['notitlegiven'] = 'Titolo non inserito';
$lang['nonamegiven'] = 'Nessun nome inserito';
$lang['numbertodisplay'] = 'Numero di visualizzazioni (vuoto mostra tutte gli articoli)';
$lang['print'] = 'Stampa';
$lang['postdate'] = 'Data di pubblicazione';
$lang['postinstall'] = 'Assicurati di impostare il permesso "Modifica CGBlog" agli utenti che dovranno amministrare le CGBlog.';
$lang['selectcategory'] = 'Seleziona la categoria';
$lang['sortascending'] = 'Ordine crescente';
$lang['startdate'] = 'Data inizio';
$lang['startoffset'] = 'Inizia la visualizzazione dal n-imo articolo';
$lang['startrequiresend'] = 'Inserire una data di inizio richiede anche una data di fine';
$lang['submit'] = 'Inserisci';
$lang['summary'] = 'Sommario';
$lang['summarytemplate'] = 'Modello Sommario';
$lang['summarytemplateupdated'] = 'Il Modello Sommario è stato aggiornato con successo.';
$lang['title'] = 'Titolo';
$lang['options'] = 'Opzioni';
$lang['optionsupdated'] = 'Le opzioni sono state aggiornate con successo.';
$lang['useexpiration'] = 'Usa la data di scadenza';
$lang['eventdesc-CGBlogArticleAdded'] = 'Mandato quando un articolo è aggiunto.';
$lang['eventhelp-CGBlogArticleAdded'] = '<p>Mandato quando un articolo è aggiunto.</p>
<h4>Parametri</h4>
<ul>
<li>"cgblog_id" - Id dell\'articolo</li>
<li>"category_id" - Id della categoria dell\'articolo</li>
<li>"title" - Titolo dell\'articolo</li>
<li>"content" - Contenuto dell\'articolo</li>
<li>"summary" - Sommario</li>
<li>"status" - Stato dell\'articolo ("bozza" or "pubblicato")</li>
<li>"start_time" - Data in cui l\'articolo inizia ad essere visibile</li>
<li>"end_time" - Data in cui l\'articolo smette di essere visibile</li>
<li>"useexp" - Se la data di scadenza della visibilità deve essere ignorata o meno</li>
</ul>';
$lang['eventdesc-CGBlogArticleEdited'] = 'Mandato quando un articolo è aggiornato.';
$lang['eventhelp-CGBlogArticleEdited'] = '<p>Mandato quando un articolo è aggiornato.</p>
<h4>Parametri</h4>
<ul>
<li>"cgblog_id" - Id dell\'articolo</li>
<li>"category_id" - Id della categoria dell\'articolo</li>
<li>"title" - Titolo dell\'articolo</li>
<li>"content" - Contenuto dell\'articolo</li>
<li>"summary" - Sommario</li>
<li>"status" - Stato dell\'articolo ("bozza" or "pubblicato")</li>
<li>"start_time" - Data in cui l\'articolo inizia ad essere visibile</li>
<li>"end_time" - Data in cui l\'articolo smette di essere visibile</li>
<li>"useexp" - Se la data di scadenza della visibilità deve essere ignorata o meno</li>
</ul>';
$lang['eventdesc-CGBlogArticleDeleted'] = 'Mandato quando un articolo è cancellato.';
$lang['eventhelp-CGBlogArticleDeleted'] = '<p>Mandato quando un articolo è cancellato.</p>
<h4>Parametri</h4>
<ul>
<li>"cgblog_id" - Id dell\'articolo</li>
</ul>';
$lang['eventdesc-CGBlogCategoryAdded'] = 'Mandato quando una categoria è aggiunta.';
$lang['eventhelp-CGBlogCategoryAdded'] = '<p>Mandato quando una categoria è aggiunta.</p>
<h4>Parametri</h4>
<ul>
<li>"category_id" - Id della categoria</li>
<li>"name" - Nome della categoria</li>
</ul>';
$lang['eventdesc-CGBlogCategoryEdited'] = 'Mandato quando una categoria è aggiornata.';
$lang['eventhelp-CGBlogCategoryEdited'] = '<p>Mandato quando una categoria è aggiornata.</p>
<h4>Parametri</h4>
<ul>
<li>"category_id" - Id della categoria</li>
<li>"name" - Nome della categoria</li>
<li>"origname" - Il nome originale della categoria</li>
</ul>';
$lang['eventdesc-CGBlogCategoryDeleted'] = 'Mandato quando una categoria è cancellata.';
$lang['eventhelp-CGBlogCategoryDeleted'] = '<p>Mandato quando una categoria è cancellata.</p>
<h4>Parameters</h4>
<ul>
<li>"category_id" - Id della categoria</li>
<li>"name" - Nome della categoria cancellata</li>
</ul>';
$lang['help_articleid'] = 'Questo parametro è applicabile solo nella visualizzazione di dettaglio. Permette, se specificata, quale articolo visualizzare nel modo dettaglio. Se viene usato il valore speciale -1, il sistema visualizzarà gli articoli i più recenti, pubblicati e non spirati.';
$lang['helpnumber'] = 'Numero massimo di articoli da visualizzare =- Lasciando vuoto mostrerà tutti gli articoli.';
$lang['helpstart'] = 'Inizia dal n-imo articolo -- lasciando vuoto inizierà dal primo.';
$lang['helpcategory'] = 'Visualizza solo le cgblog di quella categoria. <b>Usa * dopo il nome per visualizzare i suoi discendenti.</b> Categorie multiple possono essere usate se separate con virgola. Lasciando vuoto, mostrerà tutte le categorie.';
$lang['helpsummarytemplate'] = 'Usa un Modello separato per visualizzare il sommario dell\'articolo. Questo Modello deve esistere ed essere visibile nel Modello Sommario della amministrazione anche se non è quello predefinito. Se il parametro non è specificato, allora sarà usato il Modello corrente marcato come predefinito.';
$lang['helpbrowsecattemplate'] = 'Usa un Modello da database per visualizzare le categorie. Questo Modello deve esistere ed essere visibile nei Modelli Categoria della amministrazione anche se non è quello predefinito. Se il parametro non è specificato, allora sarà usato il Modello corrente marcato come predefinito.';
$lang['helpdetailtemplate'] = 'Usa un Modello separato per visualizzare il dettaglio dell\'articolo. Questo Modello deve esistere ed essere visibile nel Modello Dettaglio della amministrazione anche se non è quello predefinito. Se il parametro non è specificato, allora sarà usato il Modello corrente marcato come predefinito.';
$lang['helpsortby'] = 'Campo da ordinare per. Le opzioni sono: "cgblog_date", "summary", "cgblog_data", "cgblog_category", "cgblog_title", "cgblog_extra", "end_time", "start_time", "random". Predefinito è "cgblog_date". Se è specificato "random" il parametro sortasc è ignorato.';
$lang['helpsortasc'] = 'Ordina le cgblog in modo ascendente per data piuttosto che discendente.';
$lang['helpdetailpage'] = 'Pagina di visualizzazione del dettaglio della CGBlog. Questa può essere una pagina alias o un id. Viene usata per visualizzare il dettaglio in un differente template dal sommario.';
$lang['helpshowarchive'] = 'Mostra solo gli articoli spirati.';
$lang['helpbrowsecat'] = 'Mostra una lista di categorie.';
$lang['helpaction'] = 'Sovrascrive l\'azione predefinita. Possibili valori sono \'default\' per la visualizzazione del sommario e \'fesubmit\' per la visualizzazione del form nel frontend per permettere agli utenti di pubblicare da lì gli articoli.';
?>