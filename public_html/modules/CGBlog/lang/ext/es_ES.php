<?php
$lang['toggle_filter'] = 'Ver Formulario de Filtro';
$lang['help_searchexpired'] = 'Applicablle only to the search module (as specified using the passthru capabilities of the search module) this parameter if enabled, will allow searching expired articles independent of the preference in the modules admin console';
$lang['warning_fielddelete'] = 'Los Campos personalizados s&oacute;lo pueden ser eliminados si no existen valores asociados para ese campo en ninguna entrada del blog.';
$lang['notice'] = 'Nota:';
$lang['error_invalidurl'] = 'The blog article url specified is invalid.  Maybe it contains invalid characters, or duplicates the url of another article';
$lang['detail_page'] = 'P&aacute;gina de Detalle';
$lang['detail_template'] = 'Plantilla de Detalle';
$lang['warning_preview'] = 'Warning: This preview panel behaves much like a browser window allowing you to navigate away from the initially previewed page. However, if you do that, you may experience unexpected behaviour.  Navigating away from the initial page and returning will not give the expected results.<br/><strong>Note:</strong> The preview does not upload files you may have selected for upload.';
$lang['tab_preview'] = 'Previsualizaci&oacute;n';
$lang['article'] = 'Art&iacute;culo';
$lang['helpuglyurls'] = 'Applicable only to the browsecat action, this parameter will force the category browsing action to not generate pretty urls, therefor parameters used in the call to CGBlog can be passed through to the summary view';
$lang['helpnotcategory'] = 'Applicable to the default summary action, this parameter allows specifying a comma separated list of category names representing categories to NOT return in the results.  This parameter cannot be used with the category or categoryid parameters.';
$lang['info_default_showarchive'] = 'If enabled, only articles that have expired and would not normally show are displayed.  This option is ignored if showall is selected';
$lang['title_default_showarchive'] = 'Mostrar Art&iacute;culos Archivados';
$lang['title_default_showall'] = 'Mostrar Todos los Art&iacute;culos';
$lang['info_default_showall'] = 'If selected, all articles, regardless of status, or start and end date, will be displayed';
$lang['title_default_pagelimit'] = 'L&iacute;mite de P&aacute;gina por Defecto';
$lang['info_default_pagelimit'] = 'The page limit specifies how many articles will appear on each page.  Must be an integer value between 1 and 50000.';
$lang['info_default_sortorder'] = 'Sort order is not relevant when using random sorting';
$lang['info_default_sortby'] = 'Select the default sorting for summary views.  When using random sorting it is possible that entries will appear on multiple pages.';
$lang['sortorder_desc'] = 'Descendente';
$lang['sortorder_asc'] = 'Ascendente';
$lang['sortby_starttime'] = 'Fecha de Inicio del Art&iacute;culo';
$lang['sortby_endtime'] = 'Fecha Final del Art&iacute;culo';
$lang['sortby_random'] = 'Ordenamiento Aleatorio';
$lang['sortby_extra'] = 'Campo Extra de Art&iacute;culo';
$lang['sortby_summary'] = 'Res&uacute;men de Art&iacute;culo';
$lang['sortby_category'] = 'Categor&iacute;a del Art&iacute;culo';
$lang['sortby_title'] = 'T&iacute;tulo del Art&iacute;culo';
$lang['sortby_date'] = 'Fecha del Art&iacute;culo';
$lang['title_default_sortby'] = 'Ordenamiento por Defecto';
$lang['title_default_sortorder'] = 'Ordenando por Defecto';
$lang['summary_options'] = 'Opciones de Vista de Res&uacute;men';
$lang['prompt_friendlyname'] = 'Nombre amigable del m&oacute;dulo';
$lang['url_template'] = 'Plantilla URL';
$lang['error_urlused'] = 'La URL espec&iacute;ficada ya est&aacute; en uso';
$lang['error_badurl'] = 'The URL specified is invalid';
$lang['info_fesubmit_wysiwyg'] = 'This option disables use of the wysiwyg in all areas of the frontend submission form, regardless of other settings';
$lang['fesubmit_wysiwyg'] = 'Permitir el uso de editor WYSIWYG';
$lang['return_to_content'] = 'Regresar';
$lang['size'] = 'Tama&ntilde;o';
$lang['allowed_filetypes'] = 'Tipos de Archivo Permitidos';
$lang['enable_wysiwyg'] = 'Activar WYSIWYG';
$lang['preview_size'] = 'Tama&ntilde;o de Vista previa de im&aacute;gen (pixeles)';
$lang['preview'] = 'Generar Imagen Previa';
$lang['thumbnail_size'] = 'Tama&ntilde;o de Miniatura (pixeles)';
$lang['thumbnail'] = 'Generate thumbnail image';
$lang['watermark'] = 'Watermark uploaded image';
$lang['allowed_imagetypes'] = 'Allowed Image Types';
$lang['image'] = 'Image';
$lang['help_adminuser'] = 'Applicable only to the default (summary) view, this module allowss filtering the output to only those admin user names specified.  i.e: <code>admin_user=&quot;bob,fred,george&quot;</code>';
$lang['help_fesubmitpage'] = 'Applicable only to the myarticles action, this parameter allows specifying a different page <em>(by id or alias)</em> for the frontend submit form.';
$lang['help_userparam'] = 'Applicable only to the <em>(default)</em> summary action, this parameter allows filtering the output to only those <em>(non expired)</em> FEU author names specified.  i.e <code>author=&quot;user1@somewhere.com,user2@somewhere.com&quot;</code>.';
$lang['help_inline'] = 'Applicable only to the myarticles action, this parameter specifies that the pagination links should be created in an inline manner.  i.e:  the resulting output from the link will replace the original tag, not the {content} tag on the destination page';
$lang['fesubmit_updatestatus'] = 'Frontend Users are allowed to change article status';
$lang['you_authored'] = 'To date, the number of articles you have authored is';
$lang['my_articles'] = 'Mis Art&iacute;culos';
$lang['id'] = 'Id';
$lang['modified'] = 'Modificado';
$lang['fesubmit_managearticles'] = '&iquest;Permitir a los usuarios FEU manejar sus propios art&iacute;culos de blog?';
$lang['fesubmit_dfltexpiry'] = 'Por defecto los art&iacute;culos enviados desde el frontend usan la fecha de vencimiento';
$lang['fesubmit_usexpiry'] = 'Users submitting articles via the frontend can disable article expiry';
$lang['url'] = 'URL';
$lang['helpshowdraft'] = 'Applicable only to the default summary view, this parameter will result in only draft articles in the summary result set.  This only works if the logged in frontend user is authorized to view draft entries as specified in the CGBlog module admin panel options tab';
$lang['title_default_status'] = 'Estado por Defecto de los art&iacute;culos nuevos';
$lang['fesubmit_draftviewers'] = 'Grupo de FEU que puede ver los borradores de los art&iacute;culos';
$lang['title_default_summarypage'] = 'Pagina para desplegar sumarios (si no se especifica un ID de pagina en el URL)';
$lang['title_default_detailpage'] = 'Pagina para desplegar vista detallada (si no se especifica un ID de pagina en el URL)';
$lang['helparchivetemplate'] = 'Aplicable solo a la acci&oacute;n <em>archive</em>, este par&aacute;metro puede ser usado para especificar una vista alternativa de plantilla de archivo.';
$lang['addedit_archive_template'] = 'Agregar/Editar una Plantilla de Archivo ';
$lang['info_archive_templates'] = 'Plantillas de Archivo disponibles';
$lang['archivetemplate'] = 'Plantillas de Archivo';
$lang['title_sysdefault_archive_template'] = 'Plantilla predeterminada de Archivo';
$lang['helpfelisttemplate'] = 'Applicable only to the <em>myarticles</em> action, this parameter can be used to specify an alternate Article List Report template';
$lang['helpfesubmittemplate'] = 'Aplicable solo a la acci&oacute;n <em>fesubmit</em>, este par&aacute;metro puede ser usado para especificar una plantilla alternativa fesubmit';
$lang['helpsummarypage'] = 'Aplicable solo a las acciones <em>browsecat</em> y <em>archive</em>, este parametro puede contener un id de pagina o alias, usado para mostrar reportes sumarios que son accedidos al hacer clic en un enlace a cierta categoria.';
$lang['help_month'] = 'Aplicable solo a la acci&oacute;n <em>default</em>, este par&aacute;metro contiene un numero entero  correspondiente al mes, del cual se desean mostrar los articulos. Este parametro solo funciona en conjunto con el parametro &#039;year&#039; (a&ntilde;o)';
$lang['category_modified'] = 'Categor&iacute;a editada exitosamente';
$lang['new_category_name'] = 'Nuevo nombre de la Categor&iacute;a';
$lang['old_category_name'] = 'Nombre anterior de la Categor&iacute;a';
$lang['edit_category'] = 'Editar Categor&iacute;a';
$lang['error_nocatname'] = 'No se di&oacute; un nombre a la Categor&iacute;a';
$lang['move_up'] = 'Mover hacia arriba';
$lang['move_down'] = 'Mover hacia abajo';
$lang['postuninstall'] = 'El m&oacute;dulo CGBlog ha sido desinstalado. Ahora se pueden eliminar los archivos asociados con ese m&oacute;dulo.';
$lang['ipaddress'] = 'Direcci&oacute;n IP';
$lang['fesubmit_redirect'] = 'El ID o Alias de la pagina a redireccionar despues de que un articulo de noticias ha sido enviado a trav&eacute;s de la acci&oacute;n FEsubmit.';
$lang['templaterestored'] = 'Plantilla restaurada';
$lang['fesubmit_status'] = 'El estado de art&iacute;culos de noticias enviados v&iacute;a el portal';
$lang['fesubmit_email_users'] = 'Enviar notificaci&oacute;n (via email) a estos usuarios';
$lang['no'] = 'No ';
$lang['yes'] = 'Si';
$lang['fesubmit_email_template'] = 'Plantilla para email';
$lang['fesubmit_email_html'] = '&iquest;Enviar e-mail en formato HTML?';
$lang['fesubmit_email_subject'] = 'Asunto';
$lang['general_options'] = 'Opciones generales del Blog ';
$lang['fesubmit_options'] = 'Opciones de envio para el Blog por medio de Frontend';
$lang['dflt_email_subject'] = 'Un nuevo articulo ha sido publicado';
$lang['postdatetoolate'] = 'La fecha del articulo es demasiado tard&iacute;a';
$lang['title_sysdefault_felist_template'] = 'System Default Frontend Article List Report Template';
$lang['title_sysdefault_fesubmit_template'] = 'Plantilla predeterminada de Envio por medio de FrontEnd';
$lang['addedit_felist_template'] = 'Add/Edit a Frontend Article List Report Template';
$lang['addedit_fesubmit_template'] = 'Agregar/Editar plantilla de Envio por medio de FronEnd';
$lang['info_felist_templates'] = 'Available Frontend Article List Report Templates';
$lang['info_fesubmit_templates'] = 'Plantillas disponibles para Envio por medio de FrontEnd';
$lang['felisttemplate'] = 'Frontend Article List Report Templates';
$lang['fesubmittemplate'] = 'Plantillas de Envio por medio de Frontend';
$lang['help_year'] = 'Si se usa con la acci&oacute;n predeterminada (sumario), este parametro puede contener el a&ntilde;o de los articulos que se desean mostrar.';
$lang['info_urlprefix'] = 'Aplicable solo cuando se estan usando URLs Amistosas (pretty URLs) y estas utilizan las opciones mod_rewrite  o internal pretty urls (en config.php). ';
$lang['url_prefix'] = 'Prefijo para usar en todos los URLS del modulo CGBlog';
$lang['friendlyname'] = 'Modulo Blog de Calguy';
$lang['select_category'] = 'Debe seleccionar por lo menos una categor&iacute;a';
$lang['set_default'] = 'Usar como predeterminado';
$lang['category_deleted'] = 'Categor&iacute;a eliminada';
$lang['error_dberror'] = 'Ocurri&oacute; un error con la base de datos. Contacte a su your administrador.';
$lang['category_added'] = 'Categor&iacute;a agregada';
$lang['category_name_exists'] = 'Ya existe una categoria con ese nombre';
$lang['error_insufficient_params'] = 'Insuficientes parametros dados para la acci&oacute;n';
$lang['add_category'] = 'Agregar categor&iacute;a';
$lang['addedit_summary_template'] = 'Agregar/Editar Plantilla de Sumario';
$lang['addedit_detail_template'] = 'Agregar/Editar Plantilla de Detalle';
$lang['addedit_browsecat_template'] = 'Agregar/Editar Plantilla de Navegaci&oacute;n de Categorias';
$lang['info_summary_templates'] = 'Plantillas de Sumario disponibles';
$lang['info_detail_templates'] = 'Plantillas de Detalle disponibles';
$lang['info_browsecat_templates'] = 'Plantillas de Naveci&oacute;n de Categorias disponibles';
$lang['title_sysdefault_browsecat_template'] = 'Plantilla predeterminada de Navegaci&oacute;n de Categorias';
$lang['title_sysdefault_detail_template'] = 'Plantilla predeterminada de Detalle';
$lang['title_sysdefault_summary_template'] = 'Plantilla predeterminada de Sumario';
$lang['info_sysdefault_template'] = 'Esta plantilla especifica el contenido incluido cuando se crea una nueva plantilla del tipo especificado. Los cambios hechos aqui, no tendran efecto inmediato.';
$lang['expired_searchable'] = 'Articulos expirados pueden aparecer en resultados de b&uacute;squeda';
$lang['helpshowall'] = 'Si se usa un valor distinto de cero, muestra todos los articulos del Blog, sin importar la fecha final';
$lang['error_invaliddates'] = 'Una o mas de las fechas ingresadas son invalidas';
$lang['notify_n_draft_items_sub'] = 'Articulo(s) de noticias s%';
$lang['notify_n_draft_items'] = 'Tienes <a href="moduleinterface.php?module=CGBlog">%d art&iacute;culos de noticias</a> que no han sido publicados';
$lang['unlimited'] = 'Ilimitado';
$lang['none'] = 'Ninguno';
$lang['anonymous'] = 'An&oacute;nimo';
$lang['unknown'] = 'Desconocido';
$lang['allow_summary_wysiwyg'] = 'Permitir uso de Editor WYSIWYG en el campo del sumario';
$lang['title_browsecat_template'] = 'Editor de Plantillas de Categor&iacute;as para Explorar';
$lang['title_browsecat_sysdefault'] = 'Plantilla por Defecto para Explorar Categor&iacute;as';
$lang['browsecattemplate'] = 'Plantillas de Categor&iacute;as para Explorar';
$lang['error_filesize'] = 'Se ha subido un archivo que excede el tama&ntilde;o m&aacute;ximo permitido';
$lang['post_date_desc'] = 'Fecha Entrada Descendente';
$lang['post_date_asc'] = 'Fecha Entrada Ascendente';
$lang['expiry_date_desc'] = 'Fecha Vence Descendente';
$lang['expiry_date_asc'] = 'Fecha Vence Ascendente';
$lang['title_desc'] = 'T&iacute;tulo Descendente';
$lang['title_asc'] = 'T&iacute;tulo Ascendente';
$lang['error_invalidfiletype'] = 'No se puede subir este tipo de archivo';
$lang['error_upload'] = 'Ha ocurrido un problema subiendo un archivo';
$lang['error_movefile'] = 'No se pudo crear el archivo: %s';
$lang['error_mkdir'] = 'No se pudo crear el directorio: %s';
$lang['expiry_interval'] = 'El n&uacute;mero de d&iacute;as (por defecto) antes que un art&iacute;culo haya vencido (si se elige vencer)';
$lang['removed'] = 'Quitado';
$lang['delete_selected'] = 'Eliminar los Art&iacute;culos Elegidos';
$lang['areyousure_deletemultiple'] = '&iquest;Est&aacute; seguro que quiere eliminar a todos estos art&iacute;culos de noticias?\n&iexcl;Esta acci&oacute;n es irrecuperable!';
$lang['error_templatenamexists'] = 'Una plantilla con ese nombre ya existe';
$lang['error_noarticlesselected'] = 'No se Han Elegido Art&iacute;culos';
$lang['reassign_category'] = 'Cambiar Categor&iacute;a A';
$lang['select'] = 'Seleccionar';
$lang['approve'] = 'Poner Estado a &#039;Publicado&#039;';
$lang['revert'] = 'Poner Estado a &#039;Borrador&#039;';
$lang['hide_summary_field'] = 'Esconder el campo resumen cuando se agrega o editan art&iacute;culos';
$lang['textbox'] = 'Ingreso de Texto';
$lang['checkbox'] = 'Caja de Tilde';
$lang['textarea'] = '&Aacute;rea de Texto';
$lang['file'] = 'Archivo';
$lang['auto_create_thumbnails'] = 'Autom&aacute;ticamente crear archivos de miniaturas para archivos con &eacute;stas extensiones';
$lang['fielddefupdated'] = 'Definici&oacute;n de Campo Actualizada';
$lang['editfielddef'] = 'Editar Definici&oacute;n de Campo';
$lang['up'] = 'Arriba';
$lang['down'] = 'Abajo';
$lang['fielddefdeleted'] = 'Definici&oacute;n de Campo Eliminada';
$lang['nameexists'] = 'Un campo con ese nombre ya existe';
$lang['notanumber'] = 'La Longitud M&aacute;xima No es un N&uacute;mero';
$lang['fielddef'] = 'Definici&oacute;n de Campo';
$lang['fielddefadded'] = 'Definici&oacute;n de Campo Agregada con &Eacute;xito';
$lang['public'] = 'P&uacute;blico';
$lang['type'] = 'Tipo';
$lang['info_maxlength'] = 'La longitud m&aacute;xima se aplica s&oacute;lo a campos de ingreso de texto.';
$lang['maxlength'] = 'Longitud M&aacute;xima';
$lang['addfielddef'] = 'Agregar Definici&oacute;n de Campo';
$lang['customfields'] = 'Definici&oacute;n de Campos';
$lang['deprecated'] = 'sin soporte';
$lang['extra'] = 'Extra ';
$lang['uploadscategory'] = 'Categor&iacute;a de Cargas';
$lang['title_available_templates'] = 'Plantillas Disponibles';
$lang['resettodefault'] = 'Reestablecer a Valores Iniciales';
$lang['prompt_templatename'] = 'Nombre de Plantilla';
$lang['prompt_template'] = 'Fuente de la Plantilla';
$lang['template'] = 'Plantilla';
$lang['prompt_name'] = 'Nombre';
$lang['prompt_default'] = 'Por Defecto';
$lang['prompt_newtemplate'] = 'Crear una Nueva Plantilla';
$lang['help_pagelimit'] = 'M&aacute;ximo n&uacute;mero de &iacute;tems a mostrar (por p&aacute;gina).  Si no se provee &eacute;ste par&aacute;metro se mostraran todos los items coincidentes.  Si est&aacute; fijado, y hay m&aacute;s items que los especificados por el par&aacute;metro, texto y enlaces ser&aacute;n provistos para poder desplazarse a trav&eacute;s de los resultados';
$lang['prompt_page'] = 'P&aacute;gina';
$lang['firstpage'] = '<< ';
$lang['prevpage'] = '< ';
$lang['nextpage'] = '> ';
$lang['lastpage'] = '>> ';
$lang['prompt_of'] = 'de';
$lang['prompt_pagelimit'] = 'L&iacute;mite de P&aacute;gina';
$lang['prompt_sorting'] = 'Ordenar por';
$lang['title_filter'] = 'Filtros';
$lang['published'] = 'Publicado';
$lang['draft'] = 'Borrador';
$lang['expired'] = 'Vencido';
$lang['author'] = 'Autor';
$lang['sysdefaults'] = 'Restaurar por defecto';
$lang['restoretodefaultsmsg'] = 'Esta operaci&oacute;n restaurar&aacute; el contenido de la plantilla al original por defecto. &iquest;Estas seguro de continuar?';
$lang['addarticle'] = 'A&ntilde;adir Art&iacute;culo';
$lang['articleadded'] = 'Se a&ntilde;adi&oacute; el art&iacute;culo correctamente.';
$lang['articleaddeddraft'] = 'El art&iacute;culo fue a&ntilde;adido exitosamente. Un administrador revisar&aacute; el contenido de la entrada y de ser aprovado publicar&aacute; el art&iacute;culo.';
$lang['articleupdated'] = 'Se actualiz&oacute; el art&iacute;culo correctamente.';
$lang['articledeleted'] = 'Se borr&oacute; el art&iacute;culo correctamente.';
$lang['addcategory'] = 'A&ntilde;adir Categor&iacute;a';
$lang['addcgblogitem'] = 'A&ntilde;adir Noticia';
$lang['allcategories'] = 'Todas las Categor&iacute;as';
$lang['allentries'] = 'Todas las Entradas';
$lang['areyousure'] = '&iquest;Seguro que quiere borrar?';
$lang['articles'] = 'Art&iacute;culos';
$lang['cancel'] = 'Cancelar';
$lang['category'] = 'Categor&iacute;a';
$lang['categories'] = 'Categor&iacute;as';
$lang['default_category'] = 'Categor&iacute;a por defecto';
$lang['content'] = 'Contenido';
$lang['delete'] = 'Borrar';
$lang['description'] = 'A&ntilde;adir, editar y borrar Noticias';
$lang['detailtemplate'] = 'Plantillas de Detalle';
$lang['default_templates'] = 'Plantillas por Defecto';
$lang['detailtemplateupdated'] = 'Se guard&oacute; correctamente en la base de datos la Plantilla de Detalle actualizada.';
$lang['displaytemplate'] = 'Mostrar Plantilla';
$lang['edit'] = 'Editar';
$lang['enddate'] = 'Fecha de Fin';
$lang['endrequiresstart'] = 'Una fecha de fin requiere tambi&eacute;n una fecha de inicio';
$lang['entries'] = '%s Entradas';
$lang['status'] = 'Estado';
$lang['expiry'] = 'Caducidad';
$lang['filter'] = 'Filtro';
$lang['more'] = 'M&aacute;s';
$lang['category_label'] = 'Categor&iacute;a:';
$lang['author_label'] = 'Enviado por:';
$lang['moretext'] = 'Texto M&aacute;s';
$lang['name'] = 'Nombre';
$lang['cgblog_return'] = 'Volver';
$lang['newcategory'] = 'Nueva Categor&iacute;a';
$lang['needpermission'] = 'Necesitas permisos de &#039;%s&#039; para realizar esta funci&oacute;n.';
$lang['nocategorygiven'] = 'No hay Categor&iacute;a';
$lang['startdatetoolate'] = 'La Fecha de Comienzo es muy tarde (&iquest;posterior a fecha final?)';
$lang['nocontentgiven'] = 'No hay Contenido';
$lang['noitemsfound'] = '<strong>Ning&uacute;n</strong> elemento encontrado en categor&iacute;a: %s';
$lang['nopostdategiven'] = 'No hay Fecha de Envio';
$lang['note'] = '<em>Nota:</em> Las Fechas deben estar en formato &#039;yyyy-mm-dd hh:mm:ss&#039;.';
$lang['notitlegiven'] = 'No hay T&iacute;tulo';
$lang['nonamegiven'] = 'No hay Nombre';
$lang['numbertodisplay'] = 'N&uacute;mero a Mostrar (en blanco, muestra todos)';
$lang['print'] = 'Imprimir';
$lang['postdate'] = 'Fecha de Env&iacute;o';
$lang['postinstall'] = 'Ten por seguro activar permisos para &quot;Modifcar Noticia&quot; en los usuarios que administren noticias.';
$lang['selectcategory'] = 'Seleccionar Categor&iacute;a';
$lang['sortascending'] = 'Orden Ascendente';
$lang['startdate'] = 'Fecha de Inicio';
$lang['startoffset'] = 'Comienza a mostrar desde el elemento';
$lang['startrequiresend'] = 'Una fecha de inicio requiere tambi&eacute;n una de fin';
$lang['submit'] = 'Enviar';
$lang['summary'] = 'Sumario';
$lang['summarytemplate'] = 'Plantilla de Sumario';
$lang['summarytemplateupdated'] = 'Plantilla de Sumario de Noticias actualizada correctamente.';
$lang['title'] = 'T&iacute;tulo';
$lang['options'] = 'Opciones';
$lang['optionsupdated'] = 'Opciones actualizadas correctamente.';
$lang['useexpiration'] = 'Usar Fecha de Caducidad';
$lang['eventdesc-CGBlogArticleAdded'] = 'Se envia cuando a&ntilde;adimos un art&iacute;culo.';
$lang['eventhelp-CGBlogArticleAdded'] = '<p>Se env&iacute;a cuando a&ntilde;adimos un art&iacute;culo.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>\&quot;cgblog_id\&quot; - Id del art&iacute;culo</li>
<li>\&quot;category_id\&quot; - Id de la categor&iacute;a del art&iacute;culo</li>
<li>\&quot;title\&quot; - T&iacute;tulo del art&iacute;culo</li>
<li>\&quot;content\&quot; - Contenido del art&iacute;culo</li>
<li>\&quot;summary\&quot; - Sumario del art&iacute;culo</li>
<li>\&quot;status\&quot; - estado del art&iacute;culo (&quot;borrador&quot; o &quot;publicado&quot;)</li>
<li>\&quot;start_time\&quot; - Fecha de inicio de publicaci&oacute;n del art&iacute;culo</li>
<li>\&quot;end_time\&quot; - Fecha de caducidad del art&iacute;culo</li>
<li>\&quot;useexp\&quot; - Define si la fecha de vencimiento se ignora o no</li>
</ul>
';
$lang['eventdesc-CGBlogArticleEdited'] = 'Se envia cuando editamos un art&iacute;culo.';
$lang['eventhelp-CGBlogArticleEdited'] = '<p>Se env&iacute;a cuando editamos un art&iacute;culo.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>\&quot;cgblog_id\&quot; - Id del art&iacute;culo</li>
<li>\&quot;category_id\&quot; - Id de la categor&iacute;a del art&iacute;culo</li>
<li>\&quot;title\&quot; - T&iacute;tulo del art&iacute;culo</li>
<li>\&quot;content\&quot; - Contenido del art&iacute;culo</li>
<li>\&quot;summary\&quot; - Sumario del art&iacute;culo</li>
<li>\&quot;status\&quot; - estado del art&iacute;culo (&quot;borrador&quot; o &quot;publicado&quot;)</li>
<li>\&quot;start_time\&quot; - Fecha de inicio de publicaci&oacute;n del art&iacute;culo</li>
<li>\&quot;end_time\&quot; - Fecha de caducidad del art&iacute;culo</li>
<li>\&quot;useexp\&quot; - Define si la fecha de vencimiento se ignora o no</li>
</ul>
';
$lang['eventdesc-CGBlogArticleDeleted'] = 'Se env&iacute;a cuando eliminamos un art&iacute;culo.';
$lang['eventhelp-CGBlogArticleDeleted'] = '<p>Se env&iacute;a cuando eliminamos un art&iacute;culo.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>\&quot;cgblog_id\&quot; - Id del art&iacute;culo de noticias</li>
</ul>';
$lang['eventdesc-CGBlogCategoryAdded'] = 'Se env&iacute;a cuando a&ntilde;adimos una categor&iacute;a.';
$lang['eventhelp-CGBlogCategoryAdded'] = '<p>Se env&iacute;a cuando a&ntilde;adimos una categor&iacute;a.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>\&quot;category_id\&quot; - Id de la categor&iacute;a del art&iacute;culo</li>
<li>\&quot;name\&quot; - Nombre de la categor&iacute;a</li>
</ul>';
$lang['eventdesc-CGBlogCategoryEdited'] = 'Se envia cuando editamos una categor&iacute;a.';
$lang['eventhelp-CGBlogCategoryEdited'] = '<p>Se env&iacute;a cuando editamos una categor&iacute;a.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>\&quot;category_id\&quot; - Id de la categor&iacute;a de noticias</li>
<li>\&quot;name\&quot; - Nombre de la categor&iacute;a de noticias</li>
<li>\&quot;origname\&quot; - El nombre original de la categor&iacute;a de noticias</li>
</ul>';
$lang['eventdesc-CGBlogCategoryDeleted'] = 'Se env&iacute;a cuando eliminamos una categor&iacute;a.';
$lang['eventhelp-CGBlogCategoryDeleted'] = '<p>Se env&iacute;a cuando eliminamos una categor&iacute;a.</p>
<h4>Par&aacute;metros</h4>
<ul>
<li>\&quot;category_id\&quot; - Id de la categor&iacute;a eliminada</li>
<li>\&quot;name\&quot; - Nombre de la categor&iacute;a eliminada</li>
</ul>
';
$lang['help_articleid'] = 'Este parametro solo aplica para la vista detallada. Permite especificar cual articulo de CGBlog ser&aacute; desplegado en vistal detallada.  Si se utiliza el valor -1, el sistema mostrar&aacute; los articulos mas recientes, que estan publicados y no han expirado.';
$lang['helpnumber'] = 'N&uacute;mero m&aacute;ximo de elementos a mostrar =- dej&aacute;ndolo blanco muestra todos.';
$lang['helpstart'] = 'Comenzar por el n-esimo item -- dej&aacute;ndolo blanco comenzar&aacute; por el primero.';
$lang['helpcategory'] = 'S&oacute;lo mostrar elementos de esa categor&iacute;a. <b>Usar * despu&eacute;s del nombre para mostrar sub-categor&iacute;as.</b>  Se puede usar m&uacute;ltiples categor&iacute;as, separadas por una coma, dej&aacute;ndolo blanco muestra todas las categor&iacute;as.';
$lang['helpsummarytemplate'] = 'Usar una plantilla distinta en la base de datos para mostrar el resumen del art&iacute;culo.  Esta plantilla debe existir y estar visible en la solapa de la plantilla de resumen de la administraci&oacute;n de Noticias, sin embargo no tiene porqu&eacute; ser la plantilla por defecto.  Si este par&aacute;metro no se especifica, entonces se usar&aacute; a la actual plantilla marcada como por defecto.';
$lang['helpbrowsecattemplate'] = 'Usar una plantilla de la base de datos para mostrar el explorador de categor&iacute;as.  Esta plantilla debe existir y estar visible en la solapa de Plantillas de Exploraci&oacute;n de Categor&iacute;as de la administraci&oacute;n de Noticias, sin embargo no tiene porqu&eacute; ser la plantilla por defecto.  Si este par&aacute;metro no se especifica, entonces se usar&aacute; a la actual plantilla marcada como por defecto.';
$lang['helpdetailtemplate'] = 'Usar una plantilla distinta en la base de datos para mostrar el detalle del art&iacute;culo. Esta plantilla debe existir y estar visible en la solapa de plantilla de detalles de la administraci&oacute;n de Noticias, sin embargo no tiene porqu&eacute; ser la plantilla por defecto.  Si este par&aacute;metro no se especifica, entonces se usar&aacute; a la actual plantilla marcada como por defecto.';
$lang['helpsortby'] = 'Campo por el que ordenar.  Las opciones son: &quot;cgblog_date&quot;, &quot;summary&quot;, &quot;cgblog_data&quot;, &quot;cgblog_category&quot;, &quot;cgblog_title&quot;, &quot;random&quot;.  Por  defecto est&aacute; puesto &quot;cgblog_date&quot;. Si se especifica &quot;random&quot;, el par&aacute;metro sortasc es ignorado.';
$lang['helpsortasc'] = 'Ordenar noticias por fechas en orden ascendente en lugar de descendente.';
$lang['helpdetailpage'] = 'P&aacute;gina para las Noticias.  Puede ser un alias o un id de p&aacute;gina. Se usa para mostrar las noticias con una plantilla distinta a la del sumario.';
$lang['helpshowarchive'] = 'Mostrar solo art&iacute;culos de noticias caducas.';
$lang['helpbrowsecat'] = 'Muestra un listado de categor&iacute;as que se puede examinar.';
$lang['helpaction'] = 'Hace a un lado la acci&oacute;n por defecto.  Los valores posibles son &#039;default&#039; para mostrar la vista resumen, y &#039;fesubmit&#039; para mostrar el formulario en el portal para permitir a los usuarios enviar art&iacute;culos desde all&iacute;.';
$lang['utma'] = '156861353.1213312462.1366159678.1366159678.1366159678.1';
$lang['utmz'] = '156861353.1366159678.1.1.utmccn=(direct)|utmcsr=(direct)|utmcmd=(none)';
$lang['utmb'] = '156861353';
$lang['utmc'] = '156861353';
?>