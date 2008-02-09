<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/hr.php,v 1.40 2006/10/20 12:20:00 goddess_skuld Exp $ 
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

$charset = 'UTF-8';

// Configuration for the days and months

// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = 'hr_HR.UTF-8';

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
$alt_next = 'Next'; //to translate
$alt_prev = 'Previous'; //to translate
$title_next_page = 'Next page'; //to translate
$title_prev_page = 'Previous page'; //to translate
$title_next_msg = 'Sledeca poruka';
$title_prev_msg = 'Prethodna poruka';
$html_on = 'ukljucen';
$html_theme = 'Tema';

// index.php

$html_lang = 'Jezik';
$html_welcome = 'Dobrodošli';
$html_login = 'Korisničko ime';
$html_passwd = 'Šifra';
$html_submit = 'Prijava';
$html_help = 'Pomoć';
$html_server = 'Server'; //to translate
$html_wrong = 'Korisničko ime ili šifra su neispravni';
$html_retry = 'Pokušaj ponovo';
$html_remember = "Remember settings"; //to translate

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
$html_sent_folder = 'Copy sent mails into a dedicated folder'; //to translate
$html_trash_folder = 'Move deleted mails into a dedicated folder'; // to translate
$html_colored_quotes = 'Colored quotes'; //to translate
$html_display_struct = 'Display structured text'; //to translate
$html_send_html_mail = 'Send mail in HTML format'; //to translate

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
$html_folder_to = 'to'; //to translate

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
$html_view_header = 'Vidi zaglavlje';
$html_remove_header = 'Sakrij zaglavlje';
$html_inbox = 'Pristigla pošta';
$html_new_msg = 'Nova poruka';
$html_reply = 'Odgovori';
$html_reply_short = 'Re'; //to translate
$html_reply_all = 'Odgovori svima';
$html_forward = 'Proslijedi';
$html_forward_short = 'Fw'; //to translate
$html_forward_info = 'The forwarded message will be send as an attachment to this one.'; //to translate
$html_delete = 'Obriši';
$html_new = 'Nova';
$html_mark = 'Obriši';
$html_att = 'Priložena datoteka';
$html_atts = 'Priložene datoteke';
$html_att_unknown = '[nepoznat]';
$html_attach = 'Priloži';
$html_attach_forget = 'Morate priložiti datoteku prije slanja poruke !';
$html_attach_delete = 'Ukloni odabrane datoteke';
$html_attach_none = 'You must select a file to attach!';  //to translate
$html_sort_by = 'Sort by'; //to translate
$html_sort = 'Sort'; //to translate
$html_from = 'Od';
$html_subject = 'Naslov';
$html_date = 'Datum';
$html_sent = 'Poslano';
$html_wrote = 'wrote'; //to translate
$html_size = 'Veličina';
$html_totalsize = 'Ukupna veličina';
$html_kb = 'kB'; //to translate
$html_bytes = 'bytes'; //to translate
$html_filename = 'Ime datoteke';
$html_to = 'Za';
$html_cc = 'Kopija';
$html_bcc = 'Nevidljiva kopija';
$html_nosubject = 'Bez naslova';
$html_send = 'Pošalji';
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
$html_select_all = 'Invert Selection';  //to translate
$html_loading_image = 'Ucitavam sliku';
$html_send_confirmed = 'Vasa poruka je isporucena';
$html_no_sendaction = 'Nista nije specificirano - ukljucite JavaScript.';
$html_error_occurred = 'Dogodila se greska';
$html_prefs_file_error = 'Ne mogu zapisati postavke.';
$html_wrap = 'Wrap outgoing messages to :';  //to translate
$html_wrap_none = 'None'; //to translate
$html_usenet_separator = 'Usenet separator ("-- \n") Before signature';  //to translate
$html_mark_as = 'Mark as'; //to translate
$html_read = 'read'; //to translate
$html_unread = 'unread'; //to translate
$html_encoding = 'Character encoding'; // to translate

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
$html_contact_err3 = 'You don\'t have access rights to contact list'; //to translate
$html_del_msg = 'Delete selected messages ?';  //to translate
$html_down_mail = 'Download';  //to translate

$original_msg = '-- Originalna poruka --';
$to_empty = 'Polje \'Za\' ne moze biti prazno!';

// Images warning
$html_images_warning = 'For your security, remote pictures are not displayed.'; // to translate
$html_images_display = 'Display pictures'; // to translate

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'Ne mogu se spojiti!';
$html_smtp_error_unexpected = 'Neocekivani odgovor:';

// IMAP messages (class_local.php)
$lang_could_not_connect = 'Could not connect to server';  //to translate
$lang_invalid_msg_num = 'Bad Message Number';  //to translate

$html_file_upload_attack = 'Possible file upload attack';  //to translate
$html_invalid_email_address = 'Invalid e-mail address';  //to translate
$html_invalid_msg_per_page = 'Invalid number of messages per page';  //to translate
$html_invalid_wrap_msg = 'Invalid message wrap width';  //to translate
$html_seperate_msg_win = 'Messages in separate window';  //to translate

// Exceptions
$html_err_file_contacts = 'Unable to open contacts file for writing.'; //to translate
$html_session_file_error = 'Unable to open session file for writing.';  //to translate
$html_login_not_allowed = 'This login is not allowed for connexion.'; //to translate
?>
