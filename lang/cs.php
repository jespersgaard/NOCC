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

$err_user_empty = 'Nen� vypln�no p�ihla�ovac� jm�no ';
$err_passwd_empty = 'Nen� vypln�no heslo';

// html message

$alt_delete = 'Vymazat vybran� zpr�vy';
$alt_delete_one = 'Vymazat zpr�vu';
$alt_new_msg = 'Nov� zpr�vy';
$alt_reply = 'Odpov�d�t autorovi';
$alt_reply_all = 'Odpov�d�t v�em';
$alt_forward = 'P�edat d�l';
$alt_next = 'Dal�� zpr�va';
$alt_prev = 'P�edchoz� zpr�va';
$html_on = 'na';
$html_theme = 'T�ma';


// index.php

$html_lang = 'Jazyk';
$html_welcome = 'V�tejte v';
$html_login = 'Jm�no';
$html_passwd = 'Heslo';
$html_submit = 'Potvrdit';
$html_help = 'Pomoc';
$html_server = 'Server';
$html_wrong = 'Prihla�ovac� jm�no a heslo nesouhlas�';
$html_retry = 'Zkusit znovu';


// prefs.php

$html_preferences = 'Nastaven�';
$html_full_name = 'Cel� jm�no';
$html_email_address = 'E-mailov� adresa';
$html_ccself = 'Automaticky kopii sob�';
$html_hide_addresses = 'Skryj adresy';
$html_outlook_quoting = 'Form�tov�n� ve stylu Outlook';
$html_reply_to = 'Odpov�d�t';
$html_use_signature = 'Pou�ij podpis';
$html_signature = 'Podpis';
$html_reply_leadin = 'Hlavi�ka odpov�di';
$html_prefs_updated = 'Nastaven� aktualizov�no ';

// Other pages

$html_view_header = 'Zobrazit hlavi�ku';
$html_remove_header = 'Skr�t hlavi�ku';
$html_inbox = 'Doru�en� po�ta';
$html_new_msg = 'Nov� zpr�va';
$html_reply = 'Odpov�d�t';
$html_reply_short = 'Re';
$html_reply_all = 'Odpov�d�t v�em';
$html_forward = 'P�edat d�l';
$html_forward_short = 'Fw';
$html_delete = 'Vymazat';
$html_new = 'Nov�';
$html_mark = 'Vymazat';
$html_att = 'P��loha';
$html_atts = 'P��lohy';
$html_att_unknown = '[nezn�m�]';
$html_attach = 'P�ilo�it';
$html_attach_forget = 'Soubor mus� b�t p�ilo�en p�ed odesl�n�m zpr�vy';
$html_attach_delete = 'Vymazat vybran�';
$html_sort_by = 'Se�adit dle';
$html_from = 'Od';
$html_subject = 'P�edm�t';
$html_date = 'Datum';
$html_sent = 'Odeslat';
$html_wrote = 'odesl�no';
$html_size = 'Velikost';
$html_totalsize = 'Celkov� velikost';
$html_kb = 'Kb';
$html_bytes = 'bajt�';
$html_filename = 'N�zev souboru';
$html_to = 'Komu';
$html_cc = 'Kopie';
$html_bcc = 'Skryt�';
$html_nosubject = 'Bez n�zvu';
$html_send = 'Odeslat';
$html_cancel = 'Zru�it';
$html_no_mail = '��dn� zpr�va';
$html_logout = 'Odhl�en�';
$html_msg = 'Zpr�va';
$html_msgs = 'Zpr�v';
$html_configuration = 'Chybn� konfigurace serveru!!!';
$html_priority = 'D�le�itost';
$html_low = 'Mal�';
$html_normal = 'St�edn�';
$html_high = 'Vysok�';
$html_receipt = 'Potvrzen� o doru�en�';
$html_select = 'Vybrat';
$html_select_all = 'Vybrat v�e';
$html_loading_image = 'Nahr�v�m obr�zek';
$html_send_confirmed = 'V� dopis byl p�ijat k doru�en�';
$html_no_sendaction = 'Nedefinovan� akce. Zkuste povolit JavaScript.';
$html_error_occurred = 'Do�lo k chyb�';
$html_prefs_file_error = 'Chyba p�i ukl�d�n� souboru s nastaven�m.';


$original_msg = '-- P�vodn� zpr�va --';
$to_empty = 'Mus�te vyplnit kolonku Komu:';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = "Chyba p�i vytv��en� SMTP spojen�";
$html_smtp_error_unexpected = "Neo�ek�van� odezva SMTP:";

// IMAP messages (class_local.php)
$lang_could_not_connect = 'Chyba p�i p�ipojov�n� k serveru';
$html_file_upload_attack = 'Possible file upload attack';  //to translate
$html_invalid_email_address = 'Invalid e-mail address';  //to translate
$html_seperate_msg_win = 'Messages in separate window';  //to translate
?>
