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

$alt_delete = 'Vymaza» oznaèené správy';
$alt_delete_one = 'Vymaza» správu';
$alt_new_msg = 'Nová správy';
$alt_reply = 'Odpoveda» autorovi';
$alt_reply_all = 'Odpoveda» v¹etkým';
$alt_forward = 'Preposla»';
$alt_next = 'Ïal¹ia správa';
$alt_prev = 'Predo¹lá správa';
$html_on = 'on';
$html_theme = 'Téma';

// index.php

$html_lang = 'Jazyk';
$html_welcome = 'Vitajte v ';
$html_login = 'Prihlasovacie meno';
$html_passwd = 'Heslo';
$html_submit = 'Prihlási»';
$html_help = 'Pomoc';
$html_server = 'Server';
$html_wrong = 'Bolo zadané zlé prihlasovacie meno alebo heslo';
$html_retry = 'Zopakova»';

// prefs.php

$html_preferences = 'Nastavenia';
$html_full_name = 'Celé meno';
$html_email_address = 'E-mailová Adresa';
$html_ccself = 'Automaticky si posla» kópiu';
$html_hide_addresses = 'Skry» adresy';
$html_outlook_quoting = 'Formátovanie v ¹týle Outlook';
$html_reply_to = 'Odpoveda»';
$html_use_signature = 'Pou¾i» podpis';
$html_signature = 'Podpis';
$html_prefs_updated = 'Nastavenia ulo¾ené';

// Other pages

$html_view_header = 'Zobrazi» hlavièku';
$html_remove_header = 'Skry» hlavièku';
$html_inbox = 'Prijaté správy';
$html_new_msg = 'Posla» správu';
$html_reply = 'Odpoveda»';
$html_reply_short = 'Re';
$html_reply_all = 'Odpoveda» v¹etkým';
$html_forward = 'Preposla»';
$html_forward_short = 'Fw';
$html_delete = 'Vymaza»';
$html_new = 'Nový';
$html_mark = 'Vymaza»';
$html_att = 'Attachment';
$html_atts = 'Attachmenty';
$html_att_unknown = '[neznámy]';
$html_attach = 'Pripoji» attachment';
$html_attach_forget = 'Pred odoslaním správy musíte pripoji» vá¹ attachment !';
$html_attach_delete = 'Odstráò oznaèené';
$html_sort_by = 'Zorad podµa';
$html_from = 'Odosielateµ';
$html_subject = 'Nadpis';
$html_date = 'Dátum';
$html_sent = 'Poslané';
$html_wrote = 'napísal';
$html_size = 'Velkos»';
$html_totalsize = 'Celková velkos»';
$html_kb = 'Kb';
$html_bytes = 'bytov';
$html_filename = 'Súbor';
$html_to = 'Adresát';
$html_cc = 'Kópia';
$html_bcc = 'Tajná kópia';
$html_nosubject = '®iaden nadpis';
$html_send = 'Posla»';
$html_cancel = 'Zru¹i»';
$html_no_mail = '®iadne správy.';
$html_logout = 'Odhlásenie';
$html_msg = 'Správa';
$html_msgs = 'Správy';
$html_configuration = 'Tento server nie je správne nakonfigurovaný !';
$html_priority = 'Priorita';
$html_low = 'Nízka';
$html_normal = 'Normálna';
$html_high = 'Vysoká';
$html_select = 'Oznaè';
$html_select_all = 'Oznaè v¹etko';
$html_loading_image = 'Nahrávam obrázok';
$html_send_confirmed = 'Správa bola akceptovaná na odoslanie.';
$html_no_sendaction = 'Nemo¾no vykona». Skúste zapnút podporu Javaskript vo va¹om prehliadaèi.';
$html_error_occurred = 'Nastala chyba';
$html_prefs_file_error = 'Nemo¾no otvori» súbor nastavení pre zápis.';
$html_sig_file_error = 'Nemo¾no otvori» podpisový súbor pre zápis.';

$original_msg = '-- Original Message --';
$to_empty = 'Políèko \'Adresát\' nesmie by» prázdne !';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = "Nemo¾no urobi» spojenie";
$html_smtp_error_unexpected = "Neoèakávaná odpoved:";
$lang_could_not_connect = 'Could not connect to server';  //to translate
?>
