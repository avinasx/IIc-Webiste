<?php
$lang['reorder_complete'] = 'Réordonner les catégories';
$lang['info_reorder_categories'] = 'Vous pouvez réordonner les catégories grâce à un système de glisser / déposer. Soyez prudent car la réorganisation des catégories peut occasionner des problèmes sur l\'affichage des catégories prévu sur le site.';
$lang['reorder_categories'] = 'Réordonner les catégories';
$lang['error_notfound'] = 'Element non trouvé';
$lang['error_deleteparent'] = 'Une catégorie parente ne peut pas être supprimée';
$lang['category_parent'] = 'Parent';
$lang['category_description'] = 'Description';
$lang['search'] = 'Rercherche';
$lang['search_text'] = 'Texte à rechercher';
$lang['err_nothingselected'] = 'Rien n\'est sélectionné';
$lang['msg_bulk_successful'] = 'Traitement par lot réalisé';
$lang['with_selected'] = 'Pour les articles sélectionnés :';
$lang['fesubmit_email_status'] = 'Envoyer un e-mail quand le statut d\'un article est';
$lang['legend_fesubmit_notification'] = 'Notifications';
$lang['title_needs_approval'] = 'Cet article attend une relecture';
$lang['review'] = 'Relecture';
$lang['info_filter_title'] = 'Extrait du titre';
$lang['info_filter_author'] = 'Extrait du nom de l\'auteur';
$lang['reset'] = 'Réinitialiser';
$lang['error_getarticle'] = 'Un problème est survenu lors de la récupération de l\'article';
$lang['toggle_filter'] = 'Voir le filtre';
$lang['warning_fielddelete'] = 'Les champs additionnels ne peuvent être supprimés seulement s\'ils ne sont pas utilisés dans l\'un des articles';
$lang['error_invalidurl'] = 'L\'URL pour l\'article est invalide. Elle contient probablement des caractères invalides, ou cette URL est déjà utilisée.';
$lang['detail_page'] = 'Page de détail';
$lang['detail_template'] = 'Gabarit de détail';
$lang['warning_preview'] = 'Warning: This preview panel behaves much like a browser window allowing you to navigate away from the initially previewed page. However, if you do that, you may experience unexpected behaviour.  Navigating away from the initial page and returning will not give the expected results.<br/><strong>Note:</strong> The preview does not upload files you may have selected for upload.';
$lang['tab_preview'] = 'Prévisualisation';
$lang['article'] = 'Article';
$lang['helpuglyurls'] = 'Applicable only to the browsecat action, this parameter will force the category browsing action to not generate pretty urls, therefor parameters used in the call to CGBlog can be passed through to the summary view';
$lang['helpnotcategory'] = 'Applicable to the default summary action, this parameter allows specifying a comma separated list of category names representing categories to NOT return in the results.  This parameter cannot be used with the category or categoryid parameters.';
$lang['info_default_showarchive'] = 'If enabled, only articles that have expired and would not normally show are displayed.  This option is ignored if showall is selected';
$lang['title_default_showarchive'] = 'Afficher les articles archivés';
$lang['title_default_showall'] = 'Afficher tous les articles';
$lang['info_default_showall'] = 'Si sélectionné, Tous les articles, peu importe leur statuts, ou leur date de début et fin, seront affichés.';
$lang['title_default_pagelimit'] = 'Limite par page par défaut';
$lang['info_default_pagelimit'] = 'La limite par page définie combien d\'articles apparaitront sur chaque pages. Ce doit être une valeur entière comprise entre 1 et 50000';
$lang['info_default_sortorder'] = 'Le sens du tri n\'est pas pris en compte lorsque vous utilisez un tri aléatoire';
$lang['info_default_sortby'] = 'Select the default sorting for summary views.  When using random sorting it is possible that entries will appear on multiple pages.';
$lang['sortorder_desc'] = 'Décroissant';
$lang['sortorder_asc'] = 'Croissant';
$lang['sortby_starttime'] = 'Date de début d\'un article';
$lang['sortby_endtime'] = 'Date de fin d\'un article';
$lang['sortby_random'] = 'Tri aléatoire';
$lang['sortby_extra'] = 'Champs additionnel d\'un article';
$lang['sortby_summary'] = 'Résumé de l\'article';
$lang['sortby_category'] = 'Catégorie d\'article';
$lang['sortby_title'] = 'Titre de l\'article';
$lang['sortby_date'] = 'Date de l\'article';
$lang['title_default_sortby'] = 'Tri par défaut';
$lang['title_default_sortorder'] = 'Sens du tri par défaut';
$lang['summary_options'] = 'Summary View Options';
$lang['prompt_friendlyname'] = 'Nom personnalisé du module';
$lang['url_template'] = 'Gabarit d\'URL';
$lang['error_urlused'] = 'L\'URL spécifiée est déjà utilisée';
$lang['error_badurl'] = 'L\'URL spécifiée est invalide';
$lang['info_fesubmit_wysiwyg'] = 'Cette option désactive l\'utilisation de l\'éditeur WYSIWYG sur le site public, en dépit des autres paramètres.';
$lang['fesubmit_wysiwyg'] = 'Autoriser l\'utilisation de l\'éditeur WYSIWYG';
$lang['return_to_content'] = 'Retour';
$lang['size'] = 'Taille';
$lang['allowed_filetypes'] = 'Types de fichiers autorisés';
$lang['enable_wysiwyg'] = 'Autoriser le WYSIWYG';
$lang['preview_size'] = 'Taille de l\'image de prévisualisation (pixels)';
$lang['preview'] = 'Générer une image de prévisualisation';
$lang['watermark'] = 'Tatouer l\'image téléchargée vers le blog';
$lang['allowed_imagetypes'] = 'Types d\'images autorisés';
$lang['image'] = 'Image';
$lang['help_adminuser'] = 'Applicable uniquement à l\'action=<em>default</em> (vue sommaire "summary"), cette option permet le filtrage des résultats aux administrateurs spécifiés. Exemple : <code>admin_user="bob,fred,george"</code>';
$lang['help_fesubmitpage'] = 'Applicable uniquement à l\'action=<em>myarticles</em>, ce paramètre permet de spécifier une page précise <em>(désignée par ID ou alias) où placer le formulaire de soumission sur le site public.</li>';
$lang['help_userparam'] = 'Applicable uniquement à l\'action=<em>default</em> (summary - sommaire), ce paramètre permet de limiter les résultats aux auteurs FEU (<em>Non expirés</em>) spécifiés. Par exemple : <code>author="user1@domaine.com,user2@domaine.com"</code>.';
$lang['help_inline'] = 'Applicable uniquement à l\'action=<em>myarticles</em>, ce paramètre spécifie que les liens de pagination doit être crées en mode <em>inline</em>. Cela signifie que le contenu généré par le module va remplacer le tag original du module, et non le tag {content} sur la page de destination.';
$lang['fesubmit_updatestatus'] = 'Les utilisateurs du site public peuvent changer le statut d\'un article';
$lang['you_authored'] = 'Jusqu\'à présent, le nombre d\'articles dont vous êtes l\'auteur est de';
$lang['my_articles'] = 'Mes articles';
$lang['id'] = 'ID';
$lang['modified'] = 'Modifié';
$lang['fesubmit_managearticles'] = 'Autoriser les utilisateurs du site public à gérer leurs propres articles de blog ?';
$lang['fesubmit_dfltexpiry'] = 'Par défaut, les articles soumis par le site public utilisent la date d\'expiration';
$lang['fesubmit_usexpiry'] = 'Autoriser les utilisateurs du site soumettant un article à désactiver la date d\'expiration';
$lang['url'] = 'URL';
$lang['helpshowdraft'] = 'Applicable uniquement à l\'affichage par défaut des sommaires, ce paramètre considère uniquement les articles encore à l\'état de brouillon pour constituer la liste des sommaires. Ceci fonctionne uniquement si l\'utilisateur connecté est autorisé à voir les entrées encore à l\'état de brouillon, comme spécifié dans l\'onglet des options du panneau d\'administration du module CGBlog';
$lang['title_default_status'] = 'Statut par défaut pour les nouveaux articles';
$lang['fesubmit_draftviewers'] = 'Le groupe FEU autorisé à lire les brouillons d\'articles';
$lang['title_default_summarypage'] = 'Page par défaut du sommaire (si aucun pageId n\'est spécifié dans l\'URL)';
$lang['title_default_detailpage'] = 'Page par défaut des détails (si aucun pageId n\'est spécifié dans l\'URL)';
$lang['helparchivetemplate'] = 'Applicable uniquement à l\'action <em>archive</em>, ce paramètre peut être utilisé pour spécifier un gabarit particulier pour l\'affichage d\'archive.';
$lang['addedit_archive_template'] = 'Ajouter/Editer un gabarit d\'affichage d\'archives';
$lang['info_archive_templates'] = 'Gabarits disponibles pour l\'affichage d\'archives';
$lang['archivetemplate'] = 'Gabarits d\'affichage d\'archives';
$lang['title_sysdefault_archive_template'] = 'Gabarit par défaut du système pour l\'affichage d\'archives';
$lang['helpfelisttemplate'] = 'Applicable uniquement à l\'action=<em>myarticles</em>, ce paramètre permet l\'utilisation d\'un autre gabarit pour le rapport de liste d\'articles';
$lang['helpfesubmittemplate'] = 'Applicable uniquement à l\'action <em>fesubmit</em>, ce paramètre peut être utilisé pour spécifier un gabarit particulier pour le formulaire de soumission.';
$lang['helpsummarypage'] = 'Applicable uniquement aux actions <em>browsecat et archive</em>, ce paramètre peut contenir un pageId ou un alias à utiliser pour l\'affichage d\'une liste de sommaires, qui résulte d\'un clique sur un lien d\'une catégorie';
$lang['help_month'] = 'Applicable uniquement à l\'action <em>default</em>, ce paramètre peut contenir un entier (numéro de mois) pour lequel un listage complet sera effectué et affiché. Ce paramètre fonctionne uniquement en conjonction avec le paramètre "year".';
$lang['category_modified'] = 'Catégorie modifiée avec succès';
$lang['category_name'] = 'Nom de catégorie';
$lang['edit_category'] = 'Editer la catégorie';
$lang['error_nocatname'] = 'Aucun nom de catégorie n\'a été fourni';
$lang['move_up'] = 'Monter';
$lang['move_down'] = 'Descendre';
$lang['postuninstall'] = 'Le module CGBlog a été désinstallé.  Vous pouvez maintenant effacer les fichiers associés à ce module en toute sécurité.';
$lang['ipaddress'] = 'Adresse IP';
$lang['fesubmit_redirect'] = 'PageID ou alias où se fera la redirection après qu\'un article ait été soumis via l\'action fesubmit&nbsp;';
$lang['templaterestored'] = 'Gabarit restauré';
$lang['fesubmit_status'] = 'Le statut des articles soumis via les pages du site (frontend)&nbsp;';
$lang['fesubmit_email_users'] = 'Envoyer une notification (via email) à ces utilisateurs';
$lang['no'] = 'Non';
$lang['yes'] = 'Oui';
$lang['fesubmit_email_template'] = 'Gabarit de l\'email';
$lang['fesubmit_email_html'] = 'Envoyer un email au format HTML ?';
$lang['fesubmit_email_subject'] = 'Sujet du courriel';
$lang['general_options'] = 'Options générales du blog';
$lang['fesubmit_options'] = 'Options de soumission';
$lang['dflt_email_subject'] = 'Une nouvelle entrée a été postée dans le blog';
$lang['postdatetoolate'] = 'La date du post est trop tardive';
$lang['title_sysdefault_felist_template'] = 'Gabarit par défaut pour le rapport de liste d\'articles';
$lang['title_sysdefault_fesubmit_template'] = 'Gabarit par défaut du système pour le formulaire de soumission';
$lang['addedit_felist_template'] = 'Ajouter/Editeur un gabarit de rapport de liste d\'articles';
$lang['addedit_fesubmit_template'] = 'Ajouter/Editer un gabarit de formulaire de soumission';
$lang['info_felist_templates'] = 'Gabarit de rapport de liste d\'articles disponibles';
$lang['info_fesubmit_templates'] = 'Gabarits de soumission disponibles pour les utilisateurs';
$lang['felisttemplate'] = 'Gabarits de rapport de liste d\'articles';
$lang['fesubmittemplate'] = 'Gabarits de soumission pour les utilisateurs';
$lang['help_year'] = 'Utilisé avec l\'action par défaut (summary), ce paramètre peut contenir une année pour laquelle un listage complet sera effectué et affiché';
$lang['info_urlprefix'] = 'Ceci s\'applique uniquement si les \'pretty urls\' sont activés, soit via \'mod_rewrite\' ou \'internal pretty urls\'.';
$lang['url_prefix'] = 'Préfixe à utiliser pour tous les URL du module de blog';
$lang['friendlyname'] = 'Blog (CG)';
$lang['select_category'] = 'Vous devez sélectionner au moins une catégorie';
$lang['set_default'] = 'Définir par défaut';
$lang['category_deleted'] = 'Catégorie effacée';
$lang['error_dberror'] = 'Il y a eu une erreur dans la base de données. Contactez votre administrateur.';
$lang['category_added'] = 'Catégorie ajoutée';
$lang['category_name_exists'] = 'Une catégorie portant ce nom existe déjà';
$lang['error_insufficient_params'] = 'Les paramètres fournis pour l\'action sont insuffisants ou invalides';
$lang['add_category'] = 'Ajouter une catégorie';
$lang['addedit_summary_template'] = 'Aouter/Editer un gabarit d\'affichage de sommaire';
$lang['addedit_detail_template'] = 'Ajouter/Editer un gabarit d\'affichage détaillé';
$lang['addedit_browsecat_template'] = 'Ajouter/Editer un gabarit d\'affichage de navigation de catégories';
$lang['info_summary_templates'] = 'Gabarits disponibles pour les sommaires';
$lang['info_detail_templates'] = 'Gabarits disponibles pour les détails';
$lang['info_browsecat_templates'] = 'Gabarits disponibles pour la navigation de catégories';
$lang['title_sysdefault_browsecat_template'] = 'Gabarit par défaut du système pour la navigation de catégories';
$lang['title_sysdefault_detail_template'] = 'Gabarit par défaut du système pour l\'affichage des détails';
$lang['title_sysdefault_summary_template'] = 'Gabarit par défaut du système pour l\'affichage du sommaire';
$lang['info_sysdefault_template'] = 'Ce gabarit spécifie le contenu qui est inclus lorsque l\'on crée un nouveau gabarit du type spécifié. Modifier ce gabarit n\'a aucun effet immédiat sur les affichages';
$lang['expired_searchable'] = 'Les articles expirés peuvent apparaître dans les résultats de recherche&nbsp;';
$lang['helpshowall'] = 'Voir tous les articles, quelle que soit la date de fin';
$lang['error_invaliddates'] = 'Une ou plusieurs dates entrées sont invalides';
$lang['notify_n_draft_items_sub'] = '%d article(s)';
$lang['notify_n_draft_items'] = 'Vous avez %s non publié(s)';
$lang['unlimited'] = 'Sans limite';
$lang['none'] = 'Aucun';
$lang['anonymous'] = 'Anonyme';
$lang['unknown'] = 'Inconnu';
$lang['allow_summary_wysiwyg'] = 'Autoriser l\'utilisation de l\'éditeur WYSIWYG dans le champ sommaire&nbsp;';
$lang['title_browsecat_template'] = 'Gabarit de catégories';
$lang['title_browsecat_sysdefault'] = 'Gabarit de catégories par défaut';
$lang['browsecattemplate'] = 'Gabarit de catégories';
$lang['error_filesize'] = 'Un fichier uploadé excède la taille maximum autorisée';
$lang['post_date_desc'] = 'Date d\'article posté décroissante';
$lang['post_date_asc'] = 'Date d\'article posté croissante';
$lang['expiry_date_desc'] = 'Date d\'expiration décroissante';
$lang['expiry_date_asc'] = 'Date d\'expiration croissante';
$lang['title_desc'] = 'Titre décroissant';
$lang['title_asc'] = 'Titre croissant';
$lang['error_invalidfiletype'] = 'Impossible de télécharger ce type de fichier';
$lang['error_upload'] = 'Il y a eu un problème lors du téléchargement d\'un fichier';
$lang['error_movefile'] = 'Impossible de créer ce fichier : %s';
$lang['error_mkdir'] = 'Impossible de créer ce répertoire : %s';
$lang['expiry_interval'] = 'Le nombre de jours (par défaut) avant qu\'un article expire (si "Utiliser la date d\'expiration" est sélectionnée)&nbsp;';
$lang['removed'] = 'Supprimé';
$lang['delete_selected'] = 'Supprimer les articles sélectionnés';
$lang['areyousure_deletemultiple'] = 'Êtes-vous sûr de vouloir supprimer tous ces articles&nbsp;?\nCette action est définitive&nbsp;!';
$lang['error_templatenamexists'] = 'Un gabarit de ce nom existe déjà';
$lang['error_noarticlesselected'] = 'Aucun article sélectionné';
$lang['reassign_category'] = 'Changer la catégorie par&nbsp;';
$lang['select'] = 'Sélectionner';
$lang['approve'] = 'Définir le statut à \'Publié\'';
$lang['revert'] = 'Définir le statut à \'Brouillon\'';
$lang['hide_summary_field'] = 'Cacher le champ sommaire lors de l\'ajout ou de la modification d\'articles&nbsp;';
$lang['textbox'] = 'Champ de texte';
$lang['checkbox'] = 'Case à cocher';
$lang['textarea'] = 'Zone de texte';
$lang['file'] = 'Fichier';
$lang['fielddefupdated'] = 'La définition du champ a été mise à jour avec succès.';
$lang['editfielddef'] = 'Éditer la définition du champ';
$lang['up'] = 'Haut';
$lang['down'] = 'Bas';
$lang['fielddefdeleted'] = 'La définition du champ a été supprimée avec succès.';
$lang['nameexists'] = 'Un champ de ce nom existe déjà';
$lang['notanumber'] = 'La longueur maximale n\'est PAS un nombre';
$lang['fielddef'] = 'Définition du champ';
$lang['fielddefadded'] = 'La définition du champ a été ajoutée avec succès.';
$lang['public'] = 'Publique&nbsp;';
$lang['type'] = 'Type&nbsp;';
$lang['info_maxlength'] = 'Longueur maximale uniquement pour champ de texte.';
$lang['maxlength'] = 'Longueur maximale&nbsp;';
$lang['addfielddef'] = 'Ajouter une définition de champ';
$lang['customfields'] = 'Définition des champs';
$lang['deprecated'] = 'Non supporté';
$lang['extra'] = 'Extra';
$lang['uploadscategory'] = 'Catégorie téléchargements';
$lang['title_available_templates'] = 'Gabarits disponibles';
$lang['resettodefault'] = 'Restaurer les paramètres par défaut';
$lang['prompt_templatename'] = 'Nom du gabarit&nbsp;';
$lang['prompt_template'] = 'Source du gabarit&nbsp;';
$lang['template'] = 'Gabarit&nbsp;';
$lang['prompt_name'] = 'Nom';
$lang['prompt_default'] = 'Défaut';
$lang['prompt_newtemplate'] = 'Créer un nouveau gabarit';
$lang['help_pagelimit'] = 'Nombre maximal d\'articles affichés (par page). Si ce paramètre n\'est pas défini, tous les articles sont affichés. Si ce paramètre est défini, et que le nombre d\'articles est supérieur, les textes et les liens seront affichés pour permettre le défilement des résultats.';
$lang['prompt_page'] = 'Page';
$lang['firstpage'] = '<<';
$lang['prevpage'] = '<';
$lang['nextpage'] = '>';
$lang['lastpage'] = '>>';
$lang['prompt_of'] = 'sur';
$lang['prompt_pagelimit'] = 'Nb d\'articles par page&nbsp;';
$lang['prompt_sorting'] = 'Trié par&nbsp;';
$lang['title_filter'] = 'Filtres';
$lang['published'] = 'Publié';
$lang['draft'] = 'Ébauche';
$lang['expired'] = 'Expiré';
$lang['author'] = 'Auteur&nbsp;';
$lang['sysdefaults'] = 'Restaurer les paramètres par défaut';
$lang['restoretodefaultsmsg'] = 'Cette opération restaurera les gabarits par défaut. Êtes-vous sûr de vouloir continuer&nbsp;?';
$lang['addarticle'] = 'Ajouter un article';
$lang['articleadded'] = 'L\'article a été ajouté avec succès.';
$lang['articleaddeddraft'] = 'Votre article a été ajouté. Un administrateur va valider son contenu avant affichage sur le site.';
$lang['articleupdated'] = 'L\'article a été mis à jour avec succès.';
$lang['articledeleted'] = 'L\'article a été supprimé avec succès.';
$lang['addcategory'] = 'Ajouter une catégorie';
$lang['addcgblogitem'] = 'Ajouter un article';
$lang['allcategories'] = 'Toutes les catégories';
$lang['allentries'] = 'Toutes les entrées';
$lang['areyousure'] = 'Êtes-vous sûr(e) de vouloir supprimer&nbsp;?';
$lang['articles'] = 'Articles';
$lang['cancel'] = 'Annuler';
$lang['category'] = 'Catégorie&nbsp;';
$lang['categories'] = 'Catégories';
$lang['default_category'] = 'Catégorie par défaut&nbsp;';
$lang['content'] = 'Contenu&nbsp;';
$lang['delete'] = 'Effacer';
$lang['description'] = 'Ajout, édition et suppression des articles';
$lang['detailtemplate'] = 'Gabarit du détail article';
$lang['default_templates'] = 'Gabarits par défaut';
$lang['detailtemplateupdated'] = 'Le gabarit de l\'affichage du détail de l\'article a été sauvegardé dans la base de données.';
$lang['displaytemplate'] = 'Afficher le gabarit';
$lang['edit'] = 'Éditer';
$lang['enddate'] = 'Date de fin&nbsp;';
$lang['endrequiresstart'] = 'Entrer une date de fin nécessite qu\'une date de début soit également entrée';
$lang['entries'] = '%s entrées';
$lang['status'] = 'Statut';
$lang['expiry'] = 'Expiration';
$lang['filter'] = 'Filtre';
$lang['more'] = 'Plus';
$lang['category_label'] = 'Catégorie&nbsp;:';
$lang['author_label'] = 'Posté par&nbsp;:';
$lang['moretext'] = 'Texte supplémentaire';
$lang['name'] = 'Nom&nbsp;';
$lang['cgblog_return'] = 'Retour';
$lang['newcategory'] = 'Nouvelle catégorie';
$lang['needpermission'] = 'Vous devez avoir la permission \'%s\' pour exécuter cette action.';
$lang['nocategorygiven'] = 'Aucune catégorie spécifiée';
$lang['startdatetoolate'] = 'la date de début est passée (après la Date de fin ?)';
$lang['nocontentgiven'] = 'Aucun contenu spécifié';
$lang['noitemsfound'] = '<strong>Aucun</strong> objet trouvé pour cette catégorie: %s';
$lang['nopostdategiven'] = 'Aucune date de post spécifiée';
$lang['note'] = '<em>Note :</em> Les dates doivent être entrées dans ce format \'yyyy-mm-dd hh:mm:ss\'.';
$lang['notitlegiven'] = 'Aucun titre spécifié';
$lang['nonamegiven'] = 'Aucun nom spécifié';
$lang['numbertodisplay'] = 'Nombre à afficher (toutes les entrées si laissé vide)&nbsp;';
$lang['print'] = 'Imprimer';
$lang['postdate'] = 'Date à laquelle l\'article a été posté&nbsp;';
$lang['postinstall'] = 'Assurez-vous que les utilisateurs qui administreront les articles aient la permission "Modify CGBlog".';
$lang['selectcategory'] = 'Sélection de catégorie';
$lang['sortascending'] = 'Tri ascendant&nbsp;';
$lang['startdate'] = 'Date de début&nbsp;';
$lang['startoffset'] = 'Commence l\'affichage au énième article&nbsp;';
$lang['startrequiresend'] = 'Entrer une date de début nécessite qu\'une date de fin soit également entrée';
$lang['submit'] = 'Envoyer';
$lang['summary'] = 'Sommaire&nbsp;';
$lang['summarytemplate'] = 'Gabarit du sommaire article';
$lang['summarytemplateupdated'] = 'Le gabarit d\'affichage du sommaire d\'article a été mis à jour avec succès';
$lang['title'] = 'Titre';
$lang['options'] = 'Options';
$lang['optionsupdated'] = 'Les options ont été mises à jour avec succès';
$lang['useexpiration'] = 'Utiliser la date d\'expiration&nbsp;';
$lang['eventdesc-CGBlogArticleAdded'] = 'Envoyé quand un article est ajouté';
$lang['eventhelp-CGBlogArticleAdded'] = '<p>Envoyé quand un article est ajouté</p>
<h4>Paramètres</h4>
<ul>
<li>"cgblog_id" - Id de l\'article</li>
<li>"categories" - Id de la catégorie de cet article</li>
<li>"title" - Titre de l\'article</li>
<li>"content" - Contenu de l\'article</li>
<li>"summary" - Sommaire de l\'article</li>
<li>"status" - Statut de l\'article ("draft" or "published")</li>
<li>"start_time" - Date de début de publication de l\'article</li>
<li>"end_time" - Date de fin de publication de l\'article</li>
<li>"useexp" - Si la date d\'expiration doit être ignorée ou pas</li>
</ul>
<p><strong>Note :</strong> Puisque cet évènement est envoyé depuis plusieurs endroits du module, tous les paramètres peuvent ne pas être envoyés avec l\'évènement. Des informations peuvent être récupérées de la base de données à l\'aide du paramètre "cgblog_id"</p>';
$lang['eventdesc-CGBlogArticleEdited'] = 'Envoyé quand un article est édité';
$lang['eventhelp-CGBlogArticleEdited'] = '<p>Envoyé quand un article est édité</p>
<h4>Paramètres</h4>
<ul>
<li>"cgblog_id" - Id de l\'article</li>
<li>"category_id" - Id de la catégorie de cet article</li>
<li>"title" - Titre de l\'article</li>
<li>"content" - Contenu de l\'article</li>
<li>"summary" - Sommaire de l\'article</li>
<li>"status" - Statut de l\'article ("draft" or "published")</li>
<li>"start_time" - Date de début de publication de l\'article</li>
<li>"end_time" - Date de fin de publication de l\'article</li>
<li>"useexp" - Si la date d\'expiration doit être ignorée ou pas</li>
</ul>';
$lang['eventdesc-CGBlogArticleDeleted'] = 'Envoyé quand un article est supprimé';
$lang['eventhelp-CGBlogArticleDeleted'] = '<p>Envoyé quand un article est supprimé</p>
<h4>Paramètres</h4>
<ul>
<li>"cgblog_id" - Id de l\'article</li>
</ul>';
$lang['eventdesc-CGBlogCategoryAdded'] = 'Envoyé quand une catégorie est ajoutée';
$lang['eventhelp-CGBlogCategoryAdded'] = '<p>Envoyé quand une catégorie est ajoutée</p>
<h4>Paramètres</h4>
<ul>
<li>"category_id" - Id de la catégorie</li>
<li>"name" - Nom de la catégorie</li>
</ul>';
$lang['eventdesc-CGBlogCategoryEdited'] = 'Envoyé quand une catégorie est éditée';
$lang['eventhelp-CGBlogCategoryEdited'] = '<p>Envoyé quand une catégorie est éditée</p>
<h4>Paramètres</h4>
<ul>
<li>"category_id" - Id de la catégorie</li>
<li>"name" - Nom de la catégorie</li>
<li>"origname" - Nom original de la catégorie</li>
</ul>';
$lang['eventdesc-CGBlogCategoryDeleted'] = 'Envoyé quand une catégorie est supprimée';
$lang['eventhelp-CGBlogCategoryDeleted'] = '<p>Envoyé quand une catégorie est supprimée</p>
<h4>Paramètres</h4>
<ul>
<li>"category_id" - Id de la catégorie</li>
<li>"name" - Nom de la catégorie supprimée</li>
</ul>';
$lang['help_articleid'] = 'Ce paramètre est applicable uniquement à la vue de détail. Il permet de spécifier quel article sera affiché en mode détaillé. Si la valeur utilisée est -1, le système affichera l\'article le plus récent, publié, mais non expiré.';
$lang['helpnumber'] = 'Le nombre maximal d\'articles à afficher (par page) -- laisser ce paramètre vide affichera tous les articles. C\'est identique au paramètre "pagelimit".';
$lang['helpstart'] = 'Commence au énième article -- laisser ce paramètre vide commencera l\'affichage au premier article';
$lang['helpcategory'] = 'Utilisé pour les affichages de sommaire ou d\'archive pour afficher uniquement les articles de cette catégorie. Utiliser * après le nom pour afficher les sous-catégories. Plusieurs catégories peuvent être affichées en les séparant par une virgule. Laisser ce paramètre vide affichera toutes les catégories. Ce paramètre fonctionne également pour l\'action de soumission, cependant seulement un seul nom de catégorie est alors supporté.';
$lang['helpsummarytemplate'] = 'Utilise la base de donnée pour afficher le formulaire de soumission du sommaire des articles. Ce gabarit doit exister et, est visible dans l\'onglet \'Gabarit du sommaire article\' de Contenu/Articles, et n\'est pas nécessaire par défaut. Si ce paramètre n\'est pas spécifié le gabarit par défaut est utilisé.';
$lang['helpbrowsecattemplate'] = 'Utilise la base de donnée pour afficher les gabarits de catégories. Ce gabarit doit exister et, est visible dans l\'onglet \'Gabarit de catégories\' de Contenu/Articles, et n\'est pas nécessaire par défaut. Si ce paramètre n\'est pas spécifié le gabarit par défaut est utilisé.';
$lang['helpdetailtemplate'] = 'Utilise la base de donnée pour afficher le formulaire de soumission du détail des articles.  Ce gabarit doit exister et, est visible dans l\'onglet \'Gabarit du détail article\' de Contenu/Articles, et n\'est pas nécessaire par défaut. Si ce paramètre n\'est pas spécifié le gabarit par défaut est utilisé.';
$lang['helpsortby'] = 'Champ sur lequel trier les articles.  Les options sont : "summary", "cgblog_category", "cgblog_title", "cgblog_extra", "end_time", "start_time", "random", "cgblog_date", "cgblog_data".  Par défaut: "cgblog_date".  Si "random" est spécifié, le critère de tri est ignoré.';
$lang['helpsortasc'] = 'Trie les articles dans un ordre de date ascendant plutôt que descendant. Par défaut: descendant.';
$lang['helpdetailpage'] = 'Page dans laquelle afficher le détail des articles. Vous pouvez entrer soit un alias, soit un ID de page. Utile pour permettre d\'afficher le détail de l\'article dans un gabarit de page différent de celui du sommaire.';
$lang['helpshowarchive'] = 'Afficher seulement les articles expirés (si valeur non nulle)';
$lang['helpbrowsecat'] = 'Afficher une liste navigable de catégories';
$lang['helpaction'] = 'Outrepasse l\'action par défaut. Les valeurs possibles sont :
<li>"archive" - pour afficher un rapport d\'archive des entrées de votre blog</li>
<li>"detail" - pour afficher l\'article en mode détaillé</li>
<li>"default" - pour afficher le sommaire de l\'article</li>
<li>"fesubmit" - pour afficher le gabarit du formulaire de soumission de nouveaux articles pour les utilisateurs</li>
<li>"browsecat" - pour afficher une liste de catégories</li>
<li>"myarticles" - pour afficher un rapport des articles soumis par l\'utilisateur actuellement identifié (FEU).</li>
</ul>';
?>