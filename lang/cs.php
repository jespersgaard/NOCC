<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/cs.php,v 1.7 2002/06/30 21:43:46 rossigee Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the Czech language
 * Translation by Vaclav Habr <habr@fonet.cz>
 */

$charset = 'ISO-8859-2';

// Configuration for the days and months

// What language to use (Here, english US --> en_US)
// see '/usr/share/locale/' for more information
$lang_locale = 'cs_CZ';

// Text Alignment
// Can be right-to-left (rtl) which is needed for proper Arabic, Hebrew
// Or left-to-right (ltr) which is default for most languages
$lang_dir = 'ltr';

// What format string should we pass to strftime() for messages sent on
// days other than today?
$default_date_format = '%d-%m-%Y'; 

// If the local is not implemented on the host, how we display the date
$no_locale_date_format = '%d-%m-%Y';

// What format string should we pass to strftime() for messages sent
// today?
$default_time_format = '%I:%M %p';


// Here is the configuration for the HTML

$err_user_empty = 'Není vyplnìno pøihla¹ovací jméno ';
$err_passwd_empty = 'Není vyplnìno heslo';

// html message

$alt_delete = 'Vymazat vybrané zprávy';
$alt_delete_one = 'Vymazat zprávu';
$alt_new_msg = 'Nové zprávy';
$alt_reply = 'Odpovìdìt autorovi';
$alt_reply_all = 'Odpovìdìt v¹em';
$alt_forward = 'Pøedat dál';
$alt_next = 'Dal¹í zpráva';
$alt_prev = 'Pøedchozí zpráva';
$html_on = 'na';
$html_theme = 'Téma';


// index.php

$html_lang = 'Jazyk';
$html_welcome = 'Vítejte v';
$html_login = 'Jméno';
$html_passwd = 'Heslo';
$html_submit = 'Potvrdit';
$html_help = 'Pomoc';
$html_server = 'Server';
$html_wrong = 'Prihla¹ovací jméno a heslo nesouhlasí';
$html_retry = 'Zkusit znovu';


// prefs.php

$html_preferences = 'Nastavení';
$html_full_name = 'Celé jméno';
$html_email_address = 'E-mailová adresa';
$html_ccself = 'Automaticky kopii sobì';
$html_hide_addresses = 'Skryj adresy';
$html_outlook_quoting = 'Formátování ve stylu Outlook';
$html_reply_to = 'Odpovìdìt';
$html_use_signature = 'Pou¾ij podpis';
$html_signature = 'Podpis';
$html_reply_leadin = 'Hlavièka odpovìdi';
$html_prefs_updated = 'Nastavení aktualizováno ';

// Other pages

$html_view_header = 'Zobrazit hlavièku';
$html_remove_header = 'Skrýt hlavièku';
$html_inbox = 'Doruèená po¹ta';
$html_new_msg = 'Nová zpráva';
$html_reply = 'Odpovìdìt';
$html_reply_short = 'Re';
$html_reply_all = 'Odpovìdìt v¹em';
$html_forward = 'Pøedat dál';
$html_forward_short = 'Fw';
$html_delete = 'Vymazat';
$html_new = 'Nová';
$html_mark = 'Vymazat';
$html_att = 'Pøíloha';
$html_atts = 'Pøílohy';
$html_att_unknown = '[neznámá]';
$html_attach = 'Pøilo¾it';
$html_attach_forget = 'Soubor musí být pøilo¾en pøed odesláním zprávy';
$html_attach_delete = 'Vymazat vybrané';
$html_sort_by = 'Seøadit dle';
$html_from = 'Od';
$html_subject = 'Pøedmìt';
$html_date = 'Datum';
$html_sent = 'Odeslat';
$html_wrote = 'odesláno';
$html_size = 'Velikost';
$html_totalsize = 'Celková velikost';
$html_kb = 'Kb';
$html_bytes = 'bajtù';
$html_filename = 'Název souboru';
$html_to = 'Komu';
$html_cc = 'Kopie';
$html_bcc = 'Skrytá';
$html_nosubject = 'Bez názvu';
$html_send = 'Odeslat';
$html_cancel = 'Zru¹it';
$html_no_mail = '®ádná zpráva';
$html_logout = 'Odhlá¹ení';
$html_msg = 'Zpráva';
$html_msgs = 'Zpráv';
$html_configuration = 'Chybná konfigurace serveru!!!';
$html_priority = 'Dùle¾itost';
$html_low = 'Malá';
$html_normal = 'Støední';
$html_high = 'Vysoká';
$html_receipt = 'Potvrzení o doruèení';
$html_select = 'Vybrat';
$html_select_all = 'Vybrat v¹e';
$html_loading_image = 'Nahrávám obrázek';
$html_send_confirmed = 'Vá¹ dopis byl pøijat k doruèení';
$html_no_sendaction = 'Nedefinovaná akce. Zkuste povolit JavaScript.';
$html_error_occurred = 'Do¹lo k chybì';
$html_prefs_file_error = 'Chyba pøi ukládání souboru s nastavením.';


$original_msg = '-- Pùvodní zpráva --';
$to_empty = 'Musíte vyplnit kolonku Komu:';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = "Chyba pøi vytváøení SMTP spojení";
$html_smtp_error_unexpected = "Neoèekávaná odezva SMTP:";

// IMAP messages (class_local.php)
$lang_could_not_connect = 'Chyba pøi pøipojování k serveru';
$html_file_upload_attack = 'Possible file upload attack';  //to translate
$html_invalid_email_address = 'Invalid e-mail address';  //to translate
$html_seperate_msg_win = 'Messages in separate window';  //to translate
?>
