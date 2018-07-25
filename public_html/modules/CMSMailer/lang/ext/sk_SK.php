<?php
$lang['warning_cron_updated'] = 'Tento test sa robí nepravidelne. Môže trvať určitý čas, kým zmizne';
$lang['none'] = 'Žiadne';
$lang['ssl'] = 'SSL (Secure Sockets Layer)';
$lang['tls'] = 'TLS (Transport Layer Security)';
$lang['secure'] = 'Šifrovací mechanizmus';
$lang['info_secure'] = 'Použiteľné iba pri nastavení metódy SMTP mailer, táto funkcia umožňuje špecifikovanie rôznych šifrovacích mechanizmov pre spojenie';
$lang['info_cmsmailer'] = 'Tento modul, využívajú ostatné moduly na odosielanie e-mailov. Musí byť nakonfigurovaný správne a presne podľa požiadaviek hostiteľa. Pri úprave týchto nastavení prosím použite informácie poskytované hostiteľom. Ak stále nemôžete korektne odosielať správy, požiadajte hostiteľskú spoločnosť o pomoc.';
$lang['charset'] = 'Znaková sada';
$lang['sendtestmailconfirm'] = 'Táto funkcia odošle testovaciu správu na zadanú adresu. Ak odosielanie prebehne v poriadku, vrátite sa na túto istú stránku.  Chcete pokračovať?';
$lang['settingsconfirm'] = 'Zapísať aktuálne hodnoty do nastavení systému CMSMailer?';
$lang['testsubject'] = 'CMSMailer - Testovacia správa';
$lang['testbody'] = 'Testovacia správa je určená len na overenie funkčnosti nastavení modulu CMSMailer.
Ak vám správa dorazila v poriadku, všetky použité nastavenia sú správne.';
$lang['error_notestaddress'] = 'Chyba: Nebola zadaná testovacia adresa';
$lang['prompt_testaddress'] = 'Testovacia e-mailová adresa';
$lang['sendtest'] = 'Odoslať testovaciu správu';
$lang['password'] = 'Heslo';
$lang['username'] = 'Meno používateľa';
$lang['smtpauth'] = 'Overenie na serveri SMTP';
$lang['mailer'] = 'Metóda pre mailer';
$lang['host'] = 'Host. názov SMTP<br/><i>(alebo IP adresa)</i>';
$lang['port'] = 'Port SMTP servera';
$lang['from'] = 'Z adresy';
$lang['fromuser'] = 'Od používateľa menom';
$lang['sendmail'] = 'Umiestnenie sendmain';
$lang['timeout'] = 'Časový limit SMTP';
$lang['submit'] = 'Odoslať';
$lang['cancel'] = 'Zrušiť';
$lang['info_mailer'] = 'Metóda odoslania e-mailu (sendmail, smtp, mail). Najspoľahlivejšia je metóda smtp.';
$lang['info_host'] = 'Host. názov SMTP (platí iba pri použití metódy smtp)';
$lang['info_port'] = 'Číslo portu SMTP (obvykle 25) (platí iba pri použití metódy smtp)';
$lang['info_from'] = 'Adresa používaná ako adresa odosielateľa vo všetkých správach.<br/><strong>Poznámka</strong>: táto e-mailová adresa musí byť nastavená podľa požiadaviek hostiteľa, inak sa môžu vyskytnúť problémy s odosielaním e-mailov.<br/>Pokiaľ si nie ste istí správnosťou nastavenia, kontaktujte hostiteľskú organizáciu.';
$lang['info_fromuser'] = 'Priateľské meno používané pre odosielanie všetkých e-mailov';
$lang['info_sendmail'] = 'Úplná cesta k spusteľným súborom funkcie sendmail inštalácii (platí iba pri použití metódy sendmail)';
$lang['info_timeout'] = 'Počet sekúnd pri SMTP konverzácií pred ohlásením chyby (platí iba pri použití metódy smtp)';
$lang['info_smtpauth'] = 'Vyžaduje váš SMTP hostiteľ autentifikáciu? (platí iba pri použití metódy smtp)';
$lang['info_username'] = 'Meno používateľa pre autentifikáciu na SMTP (platí iba pri použití metódy smtp, ak je vybraná autentifikácia)';
$lang['info_password'] = 'Heslo pre autentifikáciu na SMTP (platí iba pri použití metódy smtp, ak je vybraná autentifikácia pre smtp)';
$lang['friendlyname'] = 'CMS Mailer';
$lang['postinstall'] = 'Modul CMSMailer bol úspešne nainštalovaný';
$lang['postuninstall'] = 'Modul CMSMailer bol odinštalovaný... Škoda, že od nás odchádzate...';
$lang['uninstalled'] = 'Modul bol odinštalovaný.';
$lang['installed'] = 'Modul verzie %s bol nainštalovaný.';
$lang['accessdenied'] = 'Prístup bol zamietnutý. Prosím skontrolujte oprávnenia.';
$lang['error'] = 'Chyba!';
$lang['upgraded'] = 'Modul aktualizovaný na verziu %s.';
$lang['settings_title'] = 'Nastavenia';
$lang['test_title'] = 'Otestovanie';
$lang['title_mod_prefs'] = 'Nastavenia modulu';
$lang['title_mod_admin'] = 'Administračný panel modulu';
$lang['title_admin_panel'] = 'Modul CMSMailer';
$lang['moddescription'] = 'Toto je jednoduchá nadstavba pre PHPMailer, je to ekvivalent API (funkcia pre funkciu) a jednoduché rozhranie pre základné predvolené úkony.';
$lang['changelog'] = '<ul>
<li>Verzia 1.73.1. Október, 2005. Prvé vydanie.</li>
<li>Verzia 1.73.2. Október, 2005. Menšia oprava v administračnom paneli. Rozbaľovacie menu neprezentovalo aktuálnu hodnotu z nastavení databázy</li>
<li>Verzia 1.73.3. Október, 2005. Menšia oprava pri odosielaní HTML e-mailov</li>
<li>Verzia 1.73.4. November, 2005. Polia formulára v nastaveniach sú väčšie, opravený problém z odosielajúcim používateľom a vyvolaným resetom v časti constructor</li>
<li>Verzia 1.73.5. November, 2005. Pridané polia formulára a možnosť autentifikácie na SMTP.</li>
<li>Verzia 1.73.6. December, 2005. Predvolená metóda odosielania je SMTP, zlepšená dokumentácia. Ujasnenie problémov s prílohami a adresami pri resetovaní.</li>
<li>Verzia 1.73.7. Január, 2006. Zväčšená dĺžka väčšiny polí</li>
<li>Verzia 1.73.8. Január, 2006. Zmena panelu s nastaveniami tak, aby poskytoval viac opisov.</li>
<li>Verzia 1.73.9. Január, 2006. Pridaná možnosť testovania funkčnosti e-mailov a potvrdenia pre každé tlačidlo (s výnimkou zrušenia).</li>
<li>Verzia 1.73.10. August, 2006. Úprava pre "lazy loading", kvoli zníženiu pamäťovej náročnosti pokiaľ sa CMSMailer nepoužíva.</li>
<li>Verzia 1.73.13. Január, 2008. Pridané väčšie množstvo kontrol oprávnení.</li>
<li>Verzia 2.0.1 - Január, 2011 - Odstránené tlačidlo Zrušiť.</li>
<li>Verzia 2.0.2 - September, 2011 - Predvolená znaková sada bola nastavená na utf-8.</li>
<li>Verzia 5.2.1 - Jún, 2012 - Aktualizácia súborov knižníc.</li>
</ul>';
$lang['help'] = '<h3>Ako to funguje?</h3>
<p>Tento modul neposkytuje funkcie pre koncového používateľa. Je určený na integrovanie do iných modulov a na poskytovanie možností odosielania e-mailov. Poskytuje iba to, nič viac a nič menej.</p>
<h3>Ako sa používa?</h3>
<p>Tento modul poskytuje jednoduchú nadstavbu nad všetkými metódami a premennými funkcie phpmailer.  Je určený na použitie inými vývojármi, dole je uvedený príklad a krátka referencia o API.  Prosím prečítajte si vloženú dokumentáciu pre PHPMailer, ak chcete získať viac informácií.</p>
<h3>Príklad</h3>
<pre>
  $cmsmailer = $this->GetModuleInstance(\'CMSMailer\');
  $cmsmailer->AddAddress(\'calguy1000@hotmail.com\',\'calguy\');
  $cmsmailer->SetBody(\'<h4>Toto je testovacia správa</h4>\');
  $cmsmailer->IsHTML(true);
  $cmsmailer->SetSubject(\'Testovacia správa\');
  $cmsmailer->Send();
</pre>
<h3>API</h3>
<ul>
<li><p><b>void reset()</b></p>
<p>Reset objektu naspäť na hodnoty určené v administračnom paneli</p>
</li>
<li><p><b>string GetAltBody()</b></p>
<p>Návrat na zástupné telo tohto e-mailu</p>
</li>
<li><p><b>void SetAltBody( $string )</b></p>
<p>Nastaviť zástupné telo e-mailu</p>
</li>
<li><p><b>string GetBody()</b></p>
<p>Návrat na primárne telo e-mailu</p>
</li>
<li><p><b>void SetBody( $string )</b></p>
<p>Nastaviť primárne telo e-mailu</p>
</li>
<li><p><b>string GetCharSet()</b></p>
<p>Predvolená hodnota: iso-8859-1</p>
<p>Návrat na znakovú sadu modulu mailer</p>
</li>
<li><p><b>void SetCharSet( $string )</b></p>
<p>Nastaviť znakovú sadu modulu mailer</p>
</li>
<li><p><b>string GetConfirmReadingTo()</b></p>
<p>Vráti adresu potvrdujúcu príznak prečítania e-mailu</p>
</li>
<li><p><b>void SetConfirmReadingTo( $address )</b></p>
<p>Nastaví alebo zruší adresu pre potvrdenie prečítania</p>
</li>
<li><p><b>string GetContentType()</b></p>
<p>Predvolené: text/plain</p>
<p>Vráti typ obsahu</p>
</li>
<li><p><b>void SetContentType()</b></p>
<p>Nastaviť typ obsahu</p>
</li>
<li><p><b>string GetEncoding()</b></p>
<p>Vráti kódovanie</p>
</li>
<li><p><b>void SetEncoding( $encoding )</b></p>
<p>Nastaviť kódovanie</p>
<p>Možnosti sú tieto: 8bit, 7bit, binary, base64, quoted-printable</p>
</li>
<li><p><b>string GetErrorInfo()</b></p>
<p>Vráti akúkoľvek informáciu o chybe</p>
</li>
<li><p><b>string GetFrom()</b></p>
<p>Vráti aktuálnu adresu pôvodcu</p>
</li>
<li><p><b>void SetFrom( $address )</b></p>
<p>Nastaviť adresu pôvodcu</p>
</li>
<li><p><b>string GetFromName()</b></p>
<p>Vráti aktuálne meno pôvodcu</p>
</li>
<li><p><b>SetFromName( $name )</b></p>
<p>Nastaviť meno pôvodcu</p>
</li>
<li><p><b>string GetHelo()</b></p>
<p>Vráti reťazec HELO</p>
</li>
<li><p><b>SetHelo( $string )</b></p>
<p>Nastaviť reťazec HELO</p>
<p>Predvolená hodnota: $hostname</p>
</li>
<li><p><b>string GetHost()</b></p>
<p>Vráti hostiteľov SMTP, s oddelením bodkočiarkou</p>
</li>
<li><p><b>void SetHost( $string )</b></p>
<p>Nastaviť hostiteľov</p>
</li>
<li><p><b>string GetHostName()</b></p>
<p>Vráti meno hostiteľa použité pre SMTP Helo</p>
</li>
<li><p><b>void SetHostName( $hostname )</b></p>
<p>Nastaviť meno hostiteľa použité pre SMTP Helo</p>
</li>
<li><p><b>string GetMailer()</b></p>
<p>Vráti mailer</p>
</li>
<li><p><b>void SetMailer( $mailer )</b></p>
<p>Nastaviť mailer, buď metódu sendmail,mail, alebo smtp</p>
</li>
<li><p><b>string GetPassword()</b></p>
<p>Vráti heslo pre autentifikáciu smtp</p>
</li>
<li><p><b>void SetPassword( $string )</b></p>
<p>Nastaviť heslo pre autentifikáciu smtp</p>
</li>
<li><p><b>int GetPort()</b></p>
<p>Vráti číslo portu pre spojenia cez smtp</p>
</li>
<li><p><b>void SetPort( $int )</b></p>
<p>Nastaviť port pre spojenia smtp</p>
</li>
<li><p><b>int GetPriority()</b></p>
<p>Vráti prioritu správy</p>
</li>
<li><p><b>void SetPriority( int )</b></p>
<p>Nastaviť prioritu správy</p>
<p>Možno hodnoty: 1 = vysoká, 3 = normálna, 5 = nízka</p>
</li>
<li><p><b>string GetSender()</b></p>
<p>Vráti reťazec pre odosielateľa e-mailu (return path)</p>
</li>
<li><p><b>void SetSender( $address )</b></p>
<p>Nastaviť reťazec odosielateľa</p>
</li>
<li><p><b>string GetSendmail()</b></p>
<p>Vráti cestu pre sendmail</p>
</li>
<li><p><b>void SetSendmail( $path )</b></p>
<p>Nastaviť cestu pre sendmail</p>
</li>
<li><p><b>bool GetSMTPAuth()</b></p>
<p>Vrátiť aktuálnu hodnotu príznaku pre autentifikáciu na smtp</p>
</li>
<li><p><b>SetSMTPAuth( $bool )</b></p>
<p>Nastaviť príznak autentifikácie na smtp</p>
</li>
<li><p><b>bool GetSMTPDebug()</b></p>
<p>Vráti hodnotu príznaku pre ladenie SMTP</p>
</li>
<li><p><b>void SetSMTPDebug( $bool )</b></p>
<p>Nastaviť príznak pre ladenie SMTP</p>
</li>
<li><p><b>bool GetSMTPKeepAlive()</b></p>
<p>Vráti hodnotu príznaku SMTP keep alive</p>
</li>
<li><p><b>SetSMTPKeepAlive( $bool )</b></p>
<p>Nastaviť príznak SMTP keep alive</p>
</li>
<li><p><b>string GetSubject()</b></p>
<p>Vráti reťazec pre aktuálny predmet</p>
</li>
<li><p><b>void SetSubject( $string )</b></p>
<p>Nastaviť reťazec pre predmet</p>
</li>
<li><p><b>int GetTimeout()</b></p>
<p>Vráti hodnotu časového limitu</p>
</li>
<li><p><b>void SetTimeout( $seconds )</b></p>
<p>Nastaviť hodnotu časového limitu</p>
</li>
<li><p><b>string GetUsername()</b></p>
<p>Vráti meno používateľa pre autentifikáciu na smtp</p>
</li>
<li><p><b>void SetUsername( $string )</b></p>
<p>Nastaviť meno používateľa pre autentifikáciu na smtp</p>
</li>
<li><p><b>int GetWordWrap()</b></p>
<p>Vráti hodnotu zalamovania slov</p>
</li>
<li><p><b>void SetWordWrap( $int )</b></p>
<p>Vráti hodnotu zalamovania slov</p>
</li>
<li><p><b>AddAddress( $address, $name = \'\' )</b></p>
<p>Pridať cieľovú adresu</p>
</li>
<li><p><b>AddAttachment( $path, $name = \'\', $encoding = \'base64\', $type = \'application/octent-stream\' )</b></p>
<p>Pridať súborovú prílohu</p>
</li>
<li><p><b>AddBCC( $address, $name = \'\' )</b></p>
<p>Pridať cieľovú adresu skrytej kópie</p>
</li>
<li><p><b>AddCC( $address, $name = \'\' )</b></p>
<p>Pridať cieľovú adresu kópie</p>
</li>
<li><p><b>AddCustomHeader( $txt )</b></p>
<p>Pridať používateľom určenú hlavičku do e-mailu</p>
</li>
<li><p><b>AddEmbeddedImage( $path, $cid, $name = \'\', $encoding = \'base64\', $type = \'application/octent-stream\' )</b></p>
<p>Pridať vložený obrázok</p>
</li>
<li><p><b>AddReplyTo( $address, $name = \'\' )</b></p>
<p>Pridať odpoveď na určitú adresu</p>
</li>
<li><p><b>AddStringAttachment( $string, $filename, $encoding = \'base64\', $type = \'application/octent-stream\' )</b></p>
<p>Pridať súborovú prílohu</p>
</li>
<li><p><b>ClearAddresses()</b></p>
<p>Vyčistiť všetky adresy</p>
</li>
<li><p><b>ClearAllRecipients()</b></p>
<p>Vyčistiť všetkých príjemcov</p>
</li>
<li><p><b>ClearAttachments()</b></p>
<p>Vyčistiť všetky prílohy</p>
</li>
<li><p><b>ClearBCCs()</b></p>
<p>Vyčistiť všetky adresy skrytej kópie</p>
</li>
<li><p><b>ClearCCs()</b></p>
<p>Vyčistiť všetky adresy kópie</p>
</li>
<li><p><b>ClearCustomHeaders()</b></p>
<p>Vyčistiť všetky používateľom určené hlavičky</p>
</li>
<li><p><b>ClearReplyto()</b></p>
<p>Vyčistiť adresu pre odpovedanie na určitú adresu</p>
</li>
<li><p><b>IsError()</b></p>
<p>Kontrola chyby podmienky</p>
</li>
<li><p><b>bool IsHTML( $bool )</b></p>
<p>Nastaviť príznak HTML</p>
<p><i>Poznámka:</i> možná metóda doručovania a odosielania</p>
</li>
<li><p><b>bool IsMail()</b></p>
<p>Skontrolovať použitie metódy mail</p>
</li>
<li><p><b>bool IsQmail()</b></p>
<p>Skontrolovať použitie metódy qmail</p>
</li>
<li><p><b>IsSendmail()</b></p>
<p>Skontrolovať použitie metódy sendmail</p>
</li>
<li><p><b>IsSMTP()</b></p>
<p>Skontrolovať použitie metódy smtp</p>
</li>
<li><p><b>Send()</b></p>
<p>Skontrolovať aktuálne pripravený e-mail</p>
</li>
<li><p><b>SetLanguage( $lang_type, $lang_path = \'\' )</b></p>
<p>Nastaviť aktuálny jazyk a <em>(doplnkovo)</em> cestu k jazyku</p>
</li>
<li><p><b>SmtpClose()</b></p>
<p>Ukončiť spojenie SMTP</p>
</li>
</ul>
<h3>Podpora</h3>
<p>Tento modul nezahŕňa komerčnú podporu. Je však dostupných mnoho zdrojov, ktoré vám môžu pomôcť pri prípadných problémoch:</p>
<ul>
<li>Pre poslednú verziu tohto modulu, najčastejšie kladené otázky, pre odoslanie informácie o nájdenej chybe alebo pre zakúpenie komerčnej podpory prosím navštívte domovskú stránku autora - calguy - na adrese <a href=\'http://techcom.dyndns.org\'>techcom.dyndns.org</a>.</li>
<li>Ďalšiu diskusiu o tomto module môžete nájsť aj na <a href=\'http://forum.cmsmadesimple.org\'>diskusných fórach systému CMS Made Simple</a>.</li>
<li>Autora, calguy1000, je možné častokrát nájsť na <a href=\'irc://irc.freenode.net/#cms\'>IRC kanáli systému CMS</a>.</li>
<li>A ako poslednú možnosť môžete skúsiť napísať priamo autorovi e-mail.</li>  
</ul>
<p>Ako v licencii GPL, tento softvér je poskytovaný tak ako je. Prosím prečítajte si text licencie, kde získate aj informácie o všetkých výnimkách.</p>

<h3>Autorské práva a licencia</h3>
<p>Copyright © 2005, Robert Campbell <a href=\'mailto:calguy1000@hotmail.com\'><calguy1000@hotmail.com></a>. Všetky práva sú vyhradené.</p>
<p>Tento modul bol vydaný pod licenciou <a href=\'http://www.gnu.org/licenses/licenses.html#GPL\'>GNU Public License</a>. Pred použitím modulu musíte túto licenciu odsúhlasiť.</p>';
?>