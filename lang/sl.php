<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/sl.php,v 1.28 2004/09/23 19:14:34 goddess_skuld Exp $ 
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
$html_on = 'on';  //to translate
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

$html_msgperpage = 'Messages per page';
$html_preferences = 'Nastavitve';
$html_full_name = 'Ime';
$html_email_address = 'E-mail naslov';
$html_ccself = 'Kopija sebi';
$html_hide_addresses = 'Skrij naslove';
$html_outlook_quoting = 'citiranje v stilu Outlooka';
$html_reply_to = 'Odgovor na';
$html_use_signature = 'Uporabi podpis';
$html_signature = 'Podpis';
$html_reply_leadin = 'Reply Leadin';  //to translate
$html_prefs_updated = 'Nastavitve shranjene';
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
$html_view_header = 'Pokaži glavo';
$html_remove_header = 'Skrij glavo';
$html_inbox = 'Prejeto';
$html_new_msg = 'Piši';
$html_reply = 'Odgovori';
$html_reply_short = 'Re';
$html_reply_all = 'Odgovori vsem';
$html_forward = 'Posreduj';
$html_forward_short = 'Fw';
$html_forward_info = 'The forwarded message will be send as an attachment to this one.'; //to translate
$html_delete = 'Briši';
$html_new = 'Novo';
$html_mark = 'Izbriši';
$html_att = 'Priponka';
$html_atts = 'Priponke';
$html_att_unknown = '[neznan]';
$html_attach = 'Pripni';
$html_attach_forget = 'Datoteko morate pripeti pred poišiljanjem sporoèila!';
$html_attach_delete = 'Odstrani izbrane';
$html_attach_none = 'You must select a file to attach!';  //to translate
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
$html_receipt = 'Request a return receipt';  //to translate
$html_select = 'Oznaèi';
$html_select_all = 'Invert Selection';  //to translate
$html_loading_image = 'Nalagam sliko';
$html_send_confirmed = 'Vase sporoèilo je bilo poslano.';
$html_no_sendaction = 'Napaka: Brez ukaza. Poskusite vkljuèiti JavaScript.';
$html_error_occurred = 'Zgodila se je napaka.';
$html_prefs_file_error = 'Ne morem pisati v datoteko z nastavitvami';
$html_wrap = 'Wrap outgoing messages to :';  //to translate
$html_usenet_separator = 'Usenet separator ("-- \n") Before signature';  //to translate
$html_mark_as = 'Mark as'; //to translate
$html_read = 'read'; //to translate
$html_unread = 'unread'; //to translate

// Contacts manager
$html_add = 'Add';  //to translate
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

$html_contact_err1 = 'Maximal number of contact is ';  //to translate
$html_contact_err2 = 'You can\'t add a new contact';  //to translate
$html_contact_err3 = 'You don\'t have access rights to contact list'; //to translate
$html_del_msg = 'Delete selected messages ?';  //to translate
$html_down_mail = 'Download';  //to translate

$original_msg = '-- Izvorno sporoèilo --';
$to_empty = 'Polje \'Za:\' ne sme biti prazno!';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'Zveze ni mogoèe vzpostaviti';
$html_smtp_error_unexpected = 'Neprièakovan odgovor:';

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
?>
