<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/hr.php,v 1.13 2004/06/20 09:39:32 goddess_skuld Exp $ 
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

$html_msgperpage = 'Messages per page';
$html_preferences = 'Postavke';
$html_full_name = 'Puno ime';
$html_email_address = 'E-mail adresa';
$html_ccself = 'Cc sebi';
$html_hide_addresses = 'Sakrij adrese';
$html_outlook_quoting = 'Navodi u stilu Outlooka';
$html_reply_to = 'Reply to';  //to translate
$html_use_signature = 'Koristi potpis';
$html_signature = 'Potpis';
$html_reply_leadin = 'Reply Leadin';  //to translate
$html_prefs_updated = 'Postavke obnovljene';
$html_manage_folders_link = 'Manage IMAP Folders';  //to translate
$html_manage_filters_link = 'Manage Email Filters';  //to translate
$html_use_graphical_smilies = 'Use graphical smilies'; //to translate

// folders.php
$html_folders_create_failed = 'Folder could not be created!';  //to translate
$html_folders_sub_failed = 'Could not subscribed to folder!';  //to translate
$html_folders_unsub_failed = 'Could not unsubscribed from folder!';  //to translate
$html_folders_rename_failed = 'Folder could not be renamed!';  //to translate
$html_folders_updated = 'Folders updated';  //to translate
$html_folder_subscribe = 'Subscribe to';  //to translate
$html_folder_rename = 'Rename';  //to translate
$html_folder_create = 'Create new folder called';  //to translate
$html_folder_remove = 'Unsubscribe from';  //to translate
$html_folder_delete = 'Delete';  //to translate

// filters.php
$html_filter_remove = 'Delete';  //to translate
$html_filter_body = 'Message Body';  //to translate
$html_filter_subject = 'Message Subject';  //to translate
$html_filter_to = 'To Field';  //to translate
$html_filter_cc = 'Cc Field';  //to translate
$html_filter_from = 'From Field';  //to translate
$html_filter_change_tip = 'To change a filter simply overwrite it.';  //to translate
$html_reapply_filters = 'Reapply all filters';  //to translate
$html_filter_contains = 'contains';  //to translate
$html_filter_name = 'Filter Name';  //to translate
$html_filter_action = 'Filter Action';  //to translate
$html_filter_moveto = 'Move to';  //to translate

// Other pages
$html_select_one = '--Select One--';  //to translate
$html_and = 'And';  //to translate
$html_new_msg_in = 'New messages in';  //to translate
$html_or = 'or';  //to translate
$html_move = 'Move';  //to translate
$html_copy = 'Copy';  //to translate
$html_messages_to = 'selected messages to';  //to translate
$html_gotopage = 'Go to Page';  //to translate
$html_gotofolder = 'Go to Folder';  //to translate
$html_other_folders = 'Folder List';  //to translate
$html_page = 'Page';  //to translate
$html_of = 'of';  //to translate
$html_to = 'to';  //to translate
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
$html_wrote = 'wrote';
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
$html_receipt = 'Request a return receipt';
$html_select = 'Selektiraj';
$html_select_all = 'Selektiraj sve';
$html_loading_image = 'Ucitavam sliku';
$html_send_confirmed = 'Vasa poruka je isporucena';
$html_no_sendaction = 'Nista nije specificirano - ukljucite JavaScript.';
$html_error_occurred = 'Dogodila se greska';
$html_prefs_file_error = 'Ne mogu zapisati postavke.';
$html_wrap = 'Wrap outgoing messages to :';  //to translate
$html_usenet_separator = 'Usenet separator ("-- \n") Before signature';  //to translate
$html_mark_as = 'Mark as'; //to translate
$html_read = 'read'; //to translate
$html_unread = 'unread'; //to translate

// Contacts manager
$html_add = 'Add';
$html_contacts = 'Contacts';  //to translate
$html_modify = 'Modify';  //to translate
$html_back = 'Back';  //to translate
$html_contact_add = 'Add new contact';  //to translate
$html_contact_mod = 'Modify a contact';  //to translate
$html_contact_first = 'First name';  //to translate
$html_contact_last = 'Last Name';  //to translate
$html_contact_nick = 'Nick';  //to translate
$html_contact_mail = 'Mail';  //to translate
$html_contact_list = 'Contact list of ';  //to translate
$html_contact_del = 'from the contact list';  //to translate

$html_contact_err1 = 'Maximal number of contact is ';
$html_contact_err2 = 'You can\'t add a new contact';
$html_del_msg = 'Delete selected messages ?';  //to translate
$html_down_mail = 'Download';  //to translate

$original_msg = '-- Originalna poruka --';
$to_empty = 'Polje \'Za\' ne moze biti prazno!';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'Ne mogu se spojiti!';
$html_smtp_error_unexpected = 'Neocekivani odgovor:';

// IMAP messages (class_local.php)
$lang_could_not_connect = 'Could not connect to server';  //to translate

$html_file_upload_attack = 'Possible file upload attack';  //to translate
$html_invalid_email_address = 'Invalid e-mail address';  //to translate
$html_seperate_msg_win = 'Messages in separate window';  //to translate

// Exceptions
$html_err_file_contacts = 'Unable to open contacts file for writing.'; //to translate
?>
