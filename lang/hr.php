<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/hr.php,v 1.3 2002/04/24 23:32:25 rossigee Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the Hrvatski (Croatian)
 * Translation by Vid Strpic <strpic@bofhlet.net>
 */

$charset = 'ISO-8859-2';

// Configuration for the days and months

// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = 'hr';

// Text Alignment
// Can be right-to-left (rtl) which is needed for proper Arabic, Hebrew
// Or left-to-right (ltr) which is default for most languages
$lang_dir = 'ltr';

// What format string should we pass to strftime() for messages sent on
// days other than today?
$default_date_format = '%d-%m-%Y %H:%M'; 

// If the local is not implemented on the host, how we display the date
$no_locale_date_format = '%d-%m-%Y %H:%M';

// What format string should we pass to strftime() for messages sent
// today?
$default_time_format = 'Danas u %H:%M';


// Here is the configuration for the HTML

$err_user_empty = 'Polje korisnickog imena je prazno';
$err_passwd_empty = 'Polje lozinke je prazno';


// html message

$alt_delete = 'Obrisi odabrane poruke';
$alt_delete_one = 'Obrisi poruku';
$alt_new_msg = 'Nova poruka';
$alt_reply = 'Odgovori posiljaocu';
$alt_reply_all = 'Odgovori svima';
$alt_forward = 'Proslijedi';
$alt_next = 'Sledeca poruka';
$alt_prev = 'Prethodna poruka';
$html_on = 'ukljucen';
$html_theme = 'Tema';

// index.php

$html_lang = 'Jezik';
$html_welcome = 'Dobrodo&#353;li';
$html_login = 'Korisni&#269;ko ime';
$html_passwd = '&#352;ifra';
$html_submit = 'Prijava';
$html_help = 'Pomo&#263;';
$html_server = 'Server';
$html_wrong = 'Korisni&#269;ko ime ili &#353;ifra su neispravni';
$html_retry = 'Poku&#353;aj ponovo';

// prefs.php

$html_preferences = 'Postavke';
$html_full_name = 'Puno ime';
$html_email_address = 'E-mail adresa';
$html_ccself = 'Cc sebi';
$html_hide_addresses = 'Sakrij adrese';
$html_outlook_quoting = 'Navodi u stilu Outlooka';
$html_reply_to = 'Reply to';
$html_use_signature = 'Koristi potpis';
$html_signature = 'Potpis';
$html_prefs_updated = 'Postavke obnovljene';

// Other pages

$html_view_header = 'Vidi zaglavlje';
$html_remove_header = 'Sakrij zaglavlje';
$html_inbox = 'Pristigla po&#353;ta';
$html_new_msg = 'Nova poruka';
$html_reply = 'Odgovori';
$html_reply_short = 'Re';
$html_reply_all = 'Odgovori svima';
$html_forward = 'Proslijedi';
$html_forward_short = 'Fw';
$html_delete = 'Obri&#353;i';
$html_new = 'Nova';
$html_mark = 'Obri&#353;i';
$html_att = 'Prilo&#382;ena datoteka';
$html_atts = 'Prilo&#382;ene datoteke';
$html_att_unknown = '[nepoznat]';
$html_attach = 'Prilo&#382;i';
$html_attach_forget = 'Morate prilo&#382;iti datoteku prije slanja poruke !';
$html_attach_delete = 'Ukloni odabrane datoteke';
$html_sort_by = 'Sort by';
$html_from = 'Od';
$html_subject = 'Naslov';
$html_date = 'Datum';
$html_sent = 'Poslano';
$html_size = 'Veli&#269;ina';
$html_totalsize = 'Ukupna veli&#269;ina';
$html_kb = 'Kb';
$html_bytes = 'bytes';
$html_filename = 'Ime datoteke';
$html_to = 'Za';
$html_cc = 'Kopija';
$html_bcc = 'Nevidljiva kopija';
$html_nosubject = 'Bez naslova';
$html_send = 'Po&#353;alji';
$html_cancel = 'Odustani';
$html_no_mail = 'Nema novih poruka.';
$html_logout = 'Izlaz';
$html_msg = 'poruka';
$html_msgs = 'poruka';
$html_configuration = 'Ovaj server nije dobro podesen !';
$html_priority = 'Prioritet';
$html_low = 'Nizak';
$html_normal = 'Normalan';
$html_high = 'Visok';
$html_select = 'Selektiraj';
$html_select_all = 'Selektiraj sve';
$html_loading_image = 'Ucitavam sliku';
$html_send_confirmed = 'Vasa poruka je isporucena';
$html_no_sendaction = 'Nista nije specificirano - ukljucite JavaScript.';
$html_error_occurred = 'Dogodila se greska';
$html_prefs_file_error = 'Ne mogu zapisati postavke.';
$html_sig_file_error = 'Ne mogu zapisati Vas potpis.';

$original_msg = '-- Originalna poruka --';
$to_empty = 'Polje \'Za\' ne moze biti prazno!';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = "Ne mogu se spojiti!";
$html_smtp_error_unexpected = "Neocekivani odgovor:";
$lang_could_not_connect = 'Could not connect to server';  //to translate
$html_file_upload_attack = 'Possible file upload attack';  //to translate
$html_invalid_email_address = 'Invalid e-mail address';  //to translate
?>
