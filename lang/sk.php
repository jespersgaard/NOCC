<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/sk.php,v 1.8 2001/12/10 13:40:33 rossigee Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the Slovak language
 * Translation by Peter Sochna <sochna@telecom.sk>
 */

$charset = 'ISO-8859-2';

// Configuration for the days and months

// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = 'sk_SK';

// Text Alignment
// Can be right-to-left (rtl) which is needed for proper Arabic, Hebrew
// Or left-to-right (ltr) which is default for most languages
$lang_dir = 'ltr';

// What format string should we pass to strftime() for messages sent on
// days other than today?
$default_date_format = '%d.%m.%Y';

// If the local is not implemented on the host, how we display the date
$no_locale_date_format = '%d.%m.%Y';

// What format string should we pass to strftime() for messages sent
// today?
$default_time_format = '%I:%M %p';


// Here is the configuration for the HTML

$err_user_empty = 'Nezadali ste prihlasovacie meno';
$err_passwd_empty = 'Nezadali ste heslo';


// html message

$alt_delete = 'Vymaza� ozna�en� spr�vy';
$alt_delete_one = 'Vymaza�� spr�vu';
$alt_new_msg = 'Nov� spr�vy';
$alt_reply = 'Odpoveda� autorovi';
$alt_reply_all = 'Odpoveda� v�etk�m';
$alt_forward = 'Preposla�';
$alt_next = '�al�ia spr�va';
$alt_prev = 'Predo�l� spr�va';
$html_on = 'on';
$html_theme = 'T�ma';

// index.php

$html_lang = 'Jazyk';
$html_welcome = 'Vitajte v ';
$html_login = 'Prihlasovacie meno';
$html_passwd = 'Heslo';
$html_submit = 'Prihl�si�';
$html_help = 'Pomoc';
$html_server = 'Server';
$html_wrong = 'Bolo zadan� zl� prihlasovacie meno alebo heslo';
$html_retry = 'Zopakova�';

// prefs.php

$html_preferences = 'Nastavenia';
$html_full_name = 'Cel� meno';
$html_email_address = 'E-mailov� Adresa';
$html_ccself = 'Automaticky si posla� k�piu';
$html_hide_addresses = 'Skry� adresy';
$html_outlook_quoting = 'Form�tovanie v �t�le Outlook';
$html_reply_to = 'Odpoveda�';
$html_use_signature = 'Pou�i� podpis';
$html_signature = 'Podpis';
$html_prefs_updated = 'Nastavenia ulo�en�';

// Other pages

$html_view_header = 'Zobrazi� hlavi�ku';
$html_remove_header = 'Skry� hlavi�ku';
$html_inbox = 'Prijat� spr�vy';
$html_new_msg = 'Posla� spr�vu';
$html_reply = 'Odpoveda�';
$html_reply_short = 'Re';
$html_reply_all = 'Odpoveda� v�etk�m';
$html_forward = 'Preposla�';
$html_forward_short = 'Fw';
$html_delete = 'Vymaza�';
$html_new = 'Nov�';
$html_mark = 'Vymaza�';
$html_att = 'Attachment';
$html_atts = 'Attachmenty';
$html_att_unknown = '[nezn�my]';
$html_attach = 'Pripoji� attachment';
$html_attach_forget = 'Pred odoslan�m spr�vy mus�te pripoji� v� attachment !';
$html_attach_delete = 'Odstr�� ozna�en�';
$html_sort_by = 'Zorad pod�a';
$html_from = 'Odosielate�';
$html_subject = 'Nadpis';
$html_date = 'D�tum';
$html_sent = 'Poslan�';
$html_wrote = 'nap�sal';
$html_size = 'Velkos�';
$html_totalsize = 'Celkov� velkos�';
$html_kb = 'Kb';
$html_bytes = 'bytov';
$html_filename = 'S�bor';
$html_to = 'Adres�t';
$html_cc = 'K�pia';
$html_bcc = 'Tajn� k�pia';
$html_nosubject = '�iaden nadpis';
$html_send = 'Posla�';
$html_cancel = 'Zru�i�';
$html_no_mail = '�iadne spr�vy.';
$html_logout = 'Odhl�senie';
$html_msg = 'Spr�va';
$html_msgs = 'Spr�vy';
$html_configuration = 'Tento server nie je spr�vne nakonfigurovan� !';
$html_priority = 'Priorita';
$html_low = 'N�zka';
$html_normal = 'Norm�lna';
$html_high = 'Vysok�';
$html_select = 'Ozna�';
$html_select_all = 'Ozna� v�etko';
$html_loading_image = 'Nahr�vam obr�zok';
$html_send_confirmed = 'Spr�va bola akceptovan� na odoslanie.';
$html_no_sendaction = 'Nemo�no vykona�. Sk�ste zapn�t podporu Javaskript vo va�om prehliada�i.';
$html_error_occurred = 'Nastala chyba';
$html_prefs_file_error = 'Nemo�no otvori� s�bor nastaven� pre z�pis.';
$html_sig_file_error = 'Nemo�no otvori� podpisov� s�bor pre z�pis.';

$original_msg = '-- Original Message --';
$to_empty = 'Pol��ko \'Adres�t\' nesmie by� pr�zdne !';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = "Nemo�no urobi� spojenie";
$html_smtp_error_unexpected = "Neo�ak�van� odpoved:";
$lang_could_not_connect = 'Could not connect to server';  //to translate
?>
