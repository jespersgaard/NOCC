<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/en.php,v 1.32 2001/10/17 22:51:44 rossigee Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the Polish language
 * Translation by Ryszard Janiszewski <dex7@akacje.net> 
 */

$charset = 'ISO-8859-2';

// Configuration for the days and months

// What language to use (Here, english US --> en_US)
// see '/usr/share/locale/' for more information
$lang_locale = 'pl';

// Text Alignment
// Can be right-to-left (rtl) which is needed for proper Arabic, Hebrew
// Or left-to-right (ltr) which is default for most languages
$lang_dir = 'ltr';

// What format string should we pass to strftime() for messages sent on
// days other than today?
$default_date_format = '%Y-%m-%d'; 

// If the local is not implemented on the host, how we display the date
$no_locale_date_format = '%Y-%m-%d';

// What format string should we pass to strftime() for messages sent
// today?
$default_time_format = '%H:%M';


// Here is the configuration for the HTML

$err_user_empty = 'Proszê wpisaæ nazwê u¿ytkownika';
$err_passwd_empty = 'Proszê wpisaæ has³o';


// html message

$alt_delete = 'Skasuj zaznaczone wiadomo¶ci';
$alt_delete_one = 'Skasuj wiadomo¶æ';
$alt_new_msg = 'Nowa wiadomo¶æ';
$alt_reply = 'Odpowiedz autorowi';
$alt_reply_all = 'Odpowiedz wszystkim';
$alt_forward = 'Prze¶lij dalej';
$alt_next = 'Nastêpna wiadomo¶æ';
$alt_prev = 'Poprzednia wiadomo¶æ';
$html_on = 'W³±czone';
$html_theme = 'Wygl±d';

// index.php

$html_lang = 'Jêzyk';
$html_welcome = 'Witaj w';
$html_login = 'Nazwa konta';
$html_passwd = 'Has³o';
$html_help = 'Pomoc';
$html_server = 'Serwer';
$html_wrong = 'Nazwa konta lub has³o jest niepoprawne';
$html_retry = 'Ponów';

// prefs.php

$html_preferences = 'Ustawienia';
$html_full_name = 'Nazwa wy¶wietlana';
$html_email_address = 'Adres email';
$html_reply_to = 'Odpisuj na adres';
$html_use_signature = 'U¿ywaj podpisu';
$html_signature = 'Podpis';
$html_submit = 'OK';
$html_prefs_updated = 'Nowe ustawienia zapisane';

// Other pages

$html_view_header = 'Zobacz nag³ówek';
$html_remove_header = 'Schowaj nag³ówek';
$html_inbox = 'Skrzynka odbiorcza';
$html_new_msg = 'Nowa wiadomo¶æ';
$html_reply = 'Odpowiedz';
$html_reply_short = 'ODP';
$html_reply_all = 'Odpowiedz wszystkim';
$html_forward = 'Prze¶lij dalej';
$html_forward_short = 'PD';
$html_delete = 'Skasuj';
$html_new = 'Nowa<br>wiadomo¶æ';
$html_mark = 'Zaznacz';
$html_att = 'Za³±cznik';
$html_atts = 'Za³±czniki';
$html_att_unknown = '[nieznany]';
$html_attach = 'Do³±cz';
$html_attach_forget = 'Zanim wy¶lesz wiadomo¶æ musisz do³aczyæ za³±cznik(i)!';
$html_attach_delete = 'Skasuj zaznaczone';
$html_sort_by = 'Sortuj wed³ug';
$html_from = 'Nadawca';
$html_subject = 'Temat';
$html_date = 'Data';
$html_sent = 'Wy¶lij';
$html_size = 'Rozmiar';
$html_totalsize = 'Rozmiar';
$html_kb = 'Kb';
$html_bytes = 'bajtów';
$html_filename = 'Nazwa pliku';
$html_to = 'Do';
$html_cc = 'DW';
$html_bcc = 'UDW';
$html_nosubject = 'Bez tematu';
$html_send = 'Wy¶lij';
$html_cancel = 'Anuluj';
$html_no_mail = 'Brak wiadomo¶ci.';
$html_logout = 'Wyloguj siê';
$html_msg = 'Wiadomo¶æ';
$html_msgs = 'Wiadomo¶ci';
$html_configuration = 'Serwer nie zosta³ prawid³owo skonfigurowany!';
$html_priority = 'Wa¿no¶æ';
$html_low = 'Niska';
$html_normal = 'Normalna';
$html_high = 'Wysoka';
$html_select_all = 'Zaznacz wszystko';

$original_msg = '--- Wiadomo¶æ oryginalna ---';
$to_empty = 'Pole \'Do\' nie mo¿e byæ puste!';
?>