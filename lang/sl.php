<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/sl.php,v 1.9 2001/12/19 20:06:04 nicocha Exp $ 
 *
 * Copyright 2000 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2000 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the slovenian language
 * Tanslation by Borut Mrak <borut.mrak@ijs.si>
 */

$charset = 'ISO-8859-2';

// Configuration for the days and months

// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = 'sl_SI';

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

$err_user_empty = 'Uporabniško ime ni bilo vnešeno';
$err_passwd_empty = 'Geslo ni bilo vnešeno';


// html message

$alt_delete = 'Izbriši izbrana sporoèila';
$alt_delete_one = 'Izbriši sporoèilo';
$alt_new_msg = 'Nova sporoèila';
$alt_reply = 'Odgovori';
$alt_reply_all = 'Odgovori vsem';
$alt_forward = 'Naprej';
$alt_next = 'Naslednji';
$alt_prev = 'Prejšnji';
$html_on = 'on';
$html_theme = 'tema';

// index.php

$html_lang = 'Jezik';
$html_welcome = 'Dobrodošli v';
$html_login = 'Uporabniško ime';
$html_passwd = 'Geslo';
$html_submit = 'Prijava';
$html_help = 'Pomoè';
$html_server = 'Strežnik';
$html_wrong = 'Uporabniško ime ali geslo je napaèno';
$html_retry = 'Poskusi ponovno';

// prefs.php

$html_preferences = 'Nastavitve';
$html_full_name = 'Ime';
$html_email_address = 'E-mail naslov';
$html_ccself = 'Kopija sebi';
$html_hide_addresses = 'Skrij naslove';
$html_outlook_quoting = 'citiranje v stilu Outlooka';
$html_reply_to = 'Odgovor na';
$html_use_signature = 'Uporabi podpis';
$html_signature = 'Podpis';
$html_prefs_updated = 'Nastavitve shranjene';

// Other pages

$html_view_header = 'Pokaži glavo';
$html_remove_header = 'Skrij glavo';
$html_inbox = 'Prejeto';
$html_new_msg = 'Piši';
$html_reply = 'Odgovori';
$html_reply_short = 'Re';
$html_reply_all = 'Odgovori vsem';
$html_forward = 'Posreduj';
$html_forward_short = 'Fw';
$html_delete = 'Briši';
$html_new = 'Novo';
$html_mark = 'Izbriši';
$html_att = 'Priponka';
$html_atts = 'Priponke';
$html_att_unknown = '[neznan]';
$html_attach = 'Pripni';
$html_attach_forget = 'Datoteko morate pripeti pred poišiljanjem sporoèila!';
$html_attach_delete = 'Odstrani izbrane';
$html_sort_by = 'Sortiraj po';
$html_from = 'Od';
$html_subject = 'Zadeva';
$html_date = 'Datum';
$html_sent = 'Poslano';
$html_wrote = 'je napisal(-a)';
$html_size = 'Velikost';
$html_totalsize = 'Skupna velikost';
$html_kb = 'Kb';
$html_bytes = 'bajtov';
$html_filename = 'Ime datoteke';
$html_to = 'Za';
$html_cc = 'Kp';
$html_bcc = 'Skp';
$html_nosubject = 'Brez zadeve';
$html_send = 'Pošlji';
$html_cancel = 'Preklièi';
$html_no_mail = 'Ni sporoèil.';
$html_logout = 'Odjava';
$html_msg = 'Sporoèilo';
$html_msgs = 'Sporoèil';
$html_configuration = 'Napaka na strežniku';
$html_priority = 'Prioriteta';
$html_low = 'Nizka';
$html_normal = 'Obièajna';
$html_high = 'Visoka';
$html_select = 'Oznaèi';
$html_select_all = 'Oznaèi vse';
$html_loading_image = 'Nalagam sliko';
$html_send_confirmed = 'Vase sporoèilo je bilo poslano.';
$html_no_sendaction = 'Napaka: Brez ukaza. Poskusite vkljuèiti JavaScript.';
$html_error_occurred = 'Zgodila se je napaka.';
$html_prefs_file_error = 'Ne morem pisati v datoteko z nastavitvami';
$html_sig_file_error = 'Ne morem pisati v datoteko s podpisom';

$original_msg = '-- Izvorno sporoèilo --';
$to_empty = 'Polje \'Za:\' ne sme biti prazno!';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = "Zveze ni mogoèe vzpostaviti";
$html_smtp_error_unexpected = "Neprièakovan odgovor:";
$lang_could_not_connect = 'Could not connect to server';  //to translate
?>
