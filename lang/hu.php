<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/hu.php,v 1.31 2005/07/02 14:04:00 goddess_skuld Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the Hungarian language
 * Translation by Hajdu Zoltán <wirhock@wirhock.com>
 */

$charset = 'UTF-8';

// Configuration for the days and months

// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = 'hu_HU';

// Text Alignment
// Can be right-to-left (rtl) which is needed for proper Arabic, Hebrew
// Or left-to-right (ltr) which is default for most languages
$lang_dir = 'ltr';

// What format string should we pass to strftime() for messages sent on
// days other than today?
$default_date_format = '%Y-%m-%d'; 

// If the local is not implemented on the host, how we display the date
$no_locale_date_format = '%Y.%m.%d';

// What format string should we pass to strftime() for messages sent
// today?
$default_time_format = '%H:%M';


// Here is the configuration for the HTML

$err_user_empty = 'Az azonosítót meg kell adni';
$err_passwd_empty = 'A jelszót meg kell adni';


// html message

$alt_delete = 'Kijelölt üzenetek törlése';
$alt_delete_one = 'Üzenet törlése';
$alt_new_msg = 'Új üzenetek';
$alt_reply = 'Válaszol';
$alt_reply_all = 'Mindre válaszol';
$alt_forward = 'Továbbküld';
$alt_next = 'Következõ üzenet';
$alt_prev = 'Elõzõ üzenet';
$html_on = 'on';  //to translate
$html_theme = 'Téma';

// index.php

$html_lang = 'Nyelv';
$html_welcome = 'Üdvözli a';
$html_login = 'Azonosító';
$html_passwd = 'Jelszó';
$html_submit = 'Bejelentkezés';
$html_help = 'Segítség';
$html_server = 'Szerver';
$html_wrong = 'Az azonosító vagy jelszó nem megfelelõ';
$html_retry = 'Újra';
$html_remember = "Remember settings"; //to translate

// prefs.php
$html_msgperpage = 'Messages per page';  //to translate
$html_preferences = 'Preferences';  //to translate
$html_full_name = 'Full name';  //to translate
$html_email_address = 'E-mail Address';  //to translate
$html_ccself = 'Cc self';  //to translate
$html_hide_addresses = 'Hide addresses';  //to translate
$html_outlook_quoting = 'Outlook-style quoting';  //to translate
$html_reply_to = 'Reply to';  //to translate
$html_use_signature = 'Use signature';  //to translate
$html_signature = 'Signature';  //to translate
$html_reply_leadin = 'Reply Leadin';  //to translate
$html_prefs_updated = 'Preferences updated';  //to translate
$html_manage_folders_link = 'Manage IMAP Folders';  //to translate
$html_manage_filters_link = 'Manage Email Filters';  //to translate
$html_use_graphical_smilies = 'Use graphical smilies'; //to translate
$html_sent_folder = 'Copy sent mails into a dedicated folder'; //to translate

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
$html_view_header = 'Fejlécet mutat';
$html_remove_header = 'Fejlécet takar';
$html_inbox = 'Érkezett';
$html_new_msg = 'ír';
$html_reply = 'Válaszol';
$html_reply_short = 'Re';  //to translate
$html_reply_all = 'Mindre válaszol';
$html_forward = 'Továbbküld';
$html_forward_short = 'Fw';  //to translate
$html_forward_info = 'The forwarded message will be send as an attachment to this one.'; //to translate
$html_delete = 'Töröl';
$html_new = 'Új';
$html_mark = 'Töröl';
$html_att = 'Csatolt fájl';
$html_atts = 'Csatolt fájlok';
$html_att_unknown = '[ismeretlen]';
$html_attach = 'Csatol';
$html_attach_forget = 'Csatolni kell a fájlt üzenetküldés elõtt !';
$html_attach_delete = 'Csatolt fájl elvétele';
$html_attach_none = 'You must select a file to attach!';  //to translate
$html_sort_by = 'Sort by';  //to translate
$html_from = 'Feladó';
$html_subject = 'Cím';
$html_date = 'Dátum';
$html_sent = 'Elküldve';
$html_wrote = 'wrote';  //to translate
$html_size = 'Méret';
$html_totalsize = 'Teljes méret';
$html_kb = 'Kb';  //to translate
$html_bytes = 'bytes';  //to translate
$html_filename = 'Fájlnév';
$html_to = 'Címzett';
$html_cc = 'Másolat';
$html_bcc = 'Vakmásolat';
$html_nosubject = 'Nincs cím';
$html_send = 'Mehet';
$html_cancel = 'Mégsem';
$html_no_mail = 'Nincs üzenet.';
$html_logout = 'Kilép';
$html_msg = 'Üzenet';
$html_msgs = 'Üzenetek';
$html_configuration = 'This server is not well set up !';  //to translate
$html_priority = 'Priority';  //to translate
$html_low = 'Low';  //to translate
$html_normal = 'Normal';  //to translate
$html_high = 'High';  //to translate
$html_receipt = 'Request a return receipt';  //to translate
$html_select = 'Select';  //to translate
$html_select_all = 'Invert Selection';  //to translate
$html_loading_image = 'Loading image';  //to translate
$html_send_confirmed = 'Your mail was accepted for delivery';  //to translate
$html_no_sendaction = 'No action specified. Try enabling JavaScript.';  //to translate
$html_error_occurred = 'An error occurred';  //to translate
$html_prefs_file_error = 'Unable to open preferences file for writing.';  //to translate
$html_wrap = 'Wrap outgoing messages to :';  //to translate
$html_wrap_none = 'None'; //to translate
$html_usenet_separator = 'Usenet separator ("-- \n") Before signature';  //to translate
$html_mark_as = 'Mark as'; //to translate
$html_read = 'read'; //to translate
$html_unread = 'unread'; //to translate
$html_mail_sent = 'Message successfully sent'; // to translate
$html_encoding = 'Character encoding'; // to translate

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

$original_msg = '-- Eredeti üzenet --';
$to_empty = 'A \'Címzett\' mezõt ki kell tölteni !';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'Unable to open SMTP connection';  //to translate
$html_smtp_error_unexpected = 'Unexpected SMTP response:';  //to translate

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
