<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/tr.php,v 1.15 2004/06/22 10:36:01 goddess_skuld Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the turkish language
 * Missing translation author
 */

$charset = 'ISO-8859-9';

// Configuration for the days and months

// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = 'tr_TR';

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

$err_user_empty = 'The login field is empty';
$err_passwd_empty = 'Parola k�sm�n� bo� ge�emezsiniz';


// html message

$alt_delete = 'Se�ili mesajlar� sil';
$alt_delete_one = 'Se�ili mesaj� sil';
$alt_new_msg = 'Yeni mesaj';
$alt_reply = 'Yazana cevapla';
$alt_reply_all = 'T�m�ne cevapla';
$alt_forward = '�let';
$alt_next = 'Sonraki mesaj';
$alt_prev = '�nceki Mesaj';
$html_on = 'on';  //to translate
$html_theme = 'Bi�im';

// index.php

$html_lang = 'Dil';
$html_welcome = 'Welcome to';  //to translate
$html_login = 'Kullan�c� Ad�';
$html_passwd = 'Parola';
$html_submit = 'Giri�';
$html_help = 'Yard�m';
$html_server = 'Sunucu';
$html_wrong = 'Kullan�c� ad� ya da parola hatal�';
$html_retry = 'Tekrar Deneyin';

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
$html_view_header = 'Ba�l�klar� G�ster';
$html_remove_header = 'Ba�l�klar� Gizle';
$html_inbox = 'Gelen Kutusu';
$html_new_msg = 'Yeni Mesaj';
$html_reply = 'Cevapla';
$html_reply_short = 'Ynt';
$html_reply_all = 'T�m�ne cevapla';
$html_forward = '�let';
$html_forward_short = '�lt';
$html_delete = 'Sil';
$html_new = 'Yeni';
$html_mark = 'Sil';
$html_att = 'Ek';
$html_atts = 'Ekler';
$html_att_unknown = '[bilinmiyor]';
$html_attach = 'Ek';
$html_attach_forget = 'Mesaj� g�ndermeden �nce dosyay� eklemelisiniz !';
$html_attach_delete = '��aretleneni Sil';
$html_sort_by = 'Sort by';  //to translate
$html_from = 'G�nderen';
$html_subject = 'Konu';
$html_date = 'Tarih';
$html_sent = 'G�nder';
$html_wrote = 'wrote';
$html_size = 'Boyut';
$html_totalsize = 'Toplam Boyut';
$html_kb = 'Kb';
$html_bytes = 'byte';
$html_filename = 'Dosya Ad�';
$html_to = 'Al�c�';
$html_cc = 'Cc';  //to translate
$html_bcc = 'Bcc';  //to translate
$html_nosubject = 'Konusuz';
$html_send = 'G�nder';
$html_cancel = '�ptal';
$html_no_mail = 'Mesaj Yok.';
$html_logout = '��k��';
$html_msg = 'Mesaj';
$html_msgs = 'Mesajlar';
$html_configuration = 'Bu sunucusu hen�z konfigure edilmemi� !';
$html_priority = 'Priority';  //to translate
$html_low = 'Low';  //to translate
$html_normal = 'Normal';  //to translate
$html_high = 'High';  //to translate
$html_receipt = 'Request a return receipt';  //to translate
$html_select = 'Select';  //to translate
$html_select_all = 'Select All';  //to translate
$html_loading_image = 'Loading image';  //to translate
$html_send_confirmed = 'Your mail was accepted for delivery';  //to translate
$html_no_sendaction = 'No action specified. Try enabling JavaScript.';  //to translate
$html_error_occurred = 'An error occurred';  //to translate
$html_prefs_file_error = 'Unable to open preferences file for writing.';  //to translate
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

$original_msg = '-- Orijinal Mesaj --';
$to_empty = ' \'Al�c�\' alan� bo� ge�ilemez !';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'Unable to open SMTP connection';  //to translate
$html_smtp_error_unexpected = 'Unexpected SMTP response:';  //to translate

// IMAP messages (class_local.php)
$lang_could_not_connect = 'Could not connect to server';  //to translate

$html_file_upload_attack = 'Possible file upload attack';  //to translate
$html_invalid_email_address = 'Invalid e-mail address';  //to translate
$html_seperate_msg_win = 'Messages in separate window';  //to translate

// Exceptions
$html_err_file_contacts = 'Unable to open contacts file for writing.'; //to translate
?>
