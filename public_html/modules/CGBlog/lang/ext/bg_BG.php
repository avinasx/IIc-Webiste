<?php
$lang['author'] = 'Автор';
$lang['sysdefaults'] = 'Връща фабричните настройки';
$lang['restoretodefaultsmsg'] = 'Тази операция връща шаблоните към техните фабрични настройки. Сигурни ли сте че искате да продължите?';
$lang['addarticle'] = 'Прибавя статия';
$lang['articleadded'] = 'Статията беше добавена.';
$lang['addcategory'] = 'Прибавя категория';
$lang['categoryadded'] = 'Категорията беше успешно добавена.';
$lang['categoryupdated'] = 'Категорията беше успешно обновена.';
$lang['addcgblogitem'] = 'Прибавя новина';
$lang['allcategories'] = 'Всички категории';
$lang['allentries'] = 'Всички статии';
$lang['areyousure'] = 'Сигурни ли сте че искате да изтриете?';
$lang['articles'] = 'Статии';
$lang['cancel'] = 'Отказ';
$lang['category'] = 'Категория';
$lang['categories'] = 'Категории';
$lang['content'] = 'Съдържание';
$lang['dateformat'] = '%s не във валидния yyyy-mm-dd hh:mm:ss формат';
$lang['delete'] = 'Изтрива';
$lang['description'] = 'Прибавя, редактира и премахва новини';
$lang['detailtemplate'] = 'Шаблон за детайли';
$lang['detailtemplateupdated'] = 'Обновеният Шаблон за детайли беше успешно записан в базата данни.';
$lang['displaytemplate'] = 'Шаблон за бърз преглед';
$lang['edit'] = 'Редактира';
$lang['enddate'] = 'Крайна дата';
$lang['endrequiresstart'] = 'Въвеждането на крайна дата изисква и начална такава';
$lang['entries'] = '%s новини';
$lang['status'] = 'Статус';
$lang['expiry'] = 'Изтича';
$lang['filter'] = 'Филтер';
$lang['more'] = 'Повече';
$lang['moretext'] = 'Прочете повече';
$lang['name'] = 'Име';
$lang['cgblog'] = 'Новини';
$lang['cgblog_return'] = 'Връща';
$lang['newcategory'] = 'Нова категория';
$lang['needpermission'] = 'Необходими са ви \'%s\' права за изпълнение на тази функция.';
$lang['nocategorygiven'] = 'Няма зададена категория';
$lang['nocontentgiven'] = 'Няма зададено съдържание';
$lang['noitemsfound'] = '<strong>Няма</strong> намерени записи за категорията: %s';
$lang['nopostdategiven'] = 'Няма зададена дата';
$lang['note'] = '<em>Бележки:</em> Датите трябва да са в \'yyyy-mm-dd hh:mm:ss\' формат.';
$lang['notitlegiven'] = 'Няма зададено заглавие';
$lang['numbertodisplay'] = 'Брой статии за показване (ако е оставено празно показва всички)';
$lang['print'] = 'Печат';
$lang['postdate'] = 'Дата на публикуване';
$lang['postinstall'] = 'Уверете се че правото "Промяна на Новини" е избрано за потребителите които ще администрират новините.';
$lang['rssfeedtitle'] = 'CMS Made Simple RSS Feed';
$lang['rsstemplate'] = 'RSS шаблон';
$lang['selectcategory'] = 'Избира категория';
$lang['showchildcategories'] = 'Показва подкатегории';
$lang['sortascending'] = 'Сортира абв';
$lang['startdate'] = 'Начална дата';
$lang['startoffset'] = 'Започва да показва на n-тата статия';
$lang['startrequiresend'] = 'Въвеждането на начална дата изисква и крайна такава';
$lang['submit'] = 'Въвежда';
$lang['summary'] = 'Резюме';
$lang['summarytemplate'] = 'Шаблон за резюме';
$lang['summarytemplateupdated'] = 'The CGBlog Summary Template was successfully updated.';
$lang['title'] = 'Заглавие';
$lang['options'] = 'Опции';
$lang['optionsupdated'] = 'Опциите бяха успешно обновени.';
$lang['useexpiration'] = 'Използва крайна дата';
$lang['showautodiscovery'] = 'Показва автоматичен линк за rss емисия';
$lang['autodiscoverylink'] = 'Автоматичен линк за rss емисия (празно по подразбиране)';
$lang['eventdesc-CGBlogArticleAdded'] = 'Sent when an article is added.';
$lang['eventhelp-CGBlogArticleAdded'] = '<p>Sent when an article is added.</p>
<h4>Parameters</h4>
<ul>
<li>\"cgblog_id\" - Id of the cgblog article</li>
<li>\"category_id\" - Id of the category for this article</li>
<li>\"title\" - Title of the article</li>
<li>\"content\" - Content of the article</li>
<li>\"summary\" - Summary of the article</li>
<li>\"status\" - Status of the article ("draft" or "publish")</li>
<li>\"start_time\" - Date the article should start being displayed</li>
<li>\"end_time\" - Date the article should stop being displayed</li>
</ul>
';
$lang['eventdesc-CGBlogArticleEdited'] = 'Sent when an article is edited.';
$lang['eventhelp-CGBlogArticleEdited'] = '<p>Sent when an article is edited.</p>
<h4>Parameters</h4>
<ul>
<li>\"cgblog_id\" - Id of the cgblog article</li>
<li>\"category_id\" - Id of the category for this article</li>
<li>\"title\" - Title of the article</li>
<li>\"content\" - Content of the article</li>
<li>\"summary\" - Summary of the article</li>
<li>\"status\" - Status of the article ("draft" or "publish")</li>
<li>\"start_time\" - Date the article should start being displayed</li>
<li>\"end_time\" - Date the article should stop being displayed</li>
</ul>
';
$lang['eventdesc-CGBlogArticleDeleted'] = 'Sent when an article is deleted.';
$lang['eventhelp-CGBlogArticleDeleted'] = '<p>Sent when an article is deleted.</p>
<h4>Parameters</h4>
<ul>
<li>\"cgblog_id\" - Id of the cgblog article</li>
</ul>
';
$lang['eventdesc-CGBlogCategoryAdded'] = 'Sent when a category is added.';
$lang['eventhelp-CGBlogCategoryAdded'] = '<p>Sent when a category is added.</p>
<h4>Parameters</h4>
<ul>
<li>\"category_id\" - Id of the cgblog categpry</li>
<li>\"name\" - Name of the cgblog category</li>
</ul>
';
$lang['eventdesc-CGBlogCategoryEdited'] = 'Sent when a category is edited.';
$lang['eventhelp-CGBlogCategoryEdited'] = '<p>Sent when a category is edited.</p>
<h4>Parameters</h4>
<ul>
<li>\"category_id\" - Id of the cgblog categpry</li>
<li>\"name\" - Name of the cgblog category</li>
</ul>
';
$lang['eventdesc-CGBlogCategoryDeleted'] = 'Sent when a category is deleted.';
$lang['eventhelp-CGBlogCategoryDeleted'] = '<p>Sent when a category is deleted.</p>
<h4>Parameters</h4>
<ul>
<li>\"category_id\" - Id of the cgblog categpry</li>
</ul>
';
$lang['helpnumber'] = 'Максимален брой статии за покзване =- оставяйки празно показва всички.';
$lang['helpstart'] = 'Показване от nтата статия -- оставяйки празно ще започне от първата статия.';
$lang['helpmakerssbutton'] = 'Бутон за връзка към RSS емисия за тази новина.';
$lang['helpcategory'] = 'Показва само новините в тази категория. Използва * след името за да покаже подкатегориите. Множествени категории могат да се използват разделени чрез запейтаки. Оставяйки празно, показва всички категории.';
$lang['helpmoretext'] = 'Текст за визуализиране накрая на всяка новина ако текстта на резюмето й е по-дълъг. По подразбиране "прочети повече..."';
$lang['helpsummarytemplate'] = 'Използва отделен шаблон за визуализиране на резюмето на новината. Може да се намери в /modules/CGBlog/templates.';
$lang['helpdetailtemplate'] = 'Използва отделен шаблон за визуализиране на детайлното показване на новината. Може да се намери в /modules/CGBlog/templates.';
$lang['helpsortby'] = 'Поле по което да се сортира. Възможности: "cgblog_date", "summary", "cgblog_data", "cgblog_category", "cgblog_title". По подразбиране е "cgblog_date". ';
$lang['helpsortasc'] = 'Сортира в ред абв а не в яюь.';
$lang['helpdetailpage'] = 'Страница където да показва детайлите за новина. Тази страница може да бъде или псевдоним или id. Използва се за да може цялата новина да се покаже в различен шаблон от този за резюмето.';
$lang['helpdateformat'] = 'Формата на дата на публикация.  Базиран на <a href="http://php.net/strftime" target="_blank">strftime</a> функцията и може да се използва в шаблона като $entry->formatpostdate.  По подразбиране е %x, което е дата на сървъра, където е разположена страницата.';
?>
