<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/zh-tw.php,v 1.21 2004/06/22 10:36:01 goddess_skuld Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the chinese (Taiwan) big5 language
 * Translation by Cary Leung <cary@cary.net>
 */

$charset = 'Big5';

// Configuration for the days and months

// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = 'zh_TW.BIG5';

// Text Alignment
// Can be right-to-left (rtl) which is needed for proper Arabic, Hebrew
// Or left-to-right (ltr) which is default for most languages
$lang_dir = 'ltr';

// What format string should we pass to strftime() for messages sent on
// days other than today?
$default_date_format = '%Y-%m-%d';

// If the local is not implemented on the host, how we display the date
$no_locale_date_format = '%Y-%m-%d';

// What format string should we pass to strftime() for messages sent
// today?
$default_time_format = '%I:%M %p';


// Here is the configuration for the HTML

$err_user_empty = 'µn¤J¦W¦r¤§¦ì¸mªÅ¥Õ';
$err_passwd_empty = '±K½X¤§¦ì¸mªÅ¥Õ';


// html message

$alt_delete = ' ç°£¤w¿ï¾Ü¤§«H¥ó';
$alt_delete_one = ' ç°£¦¹«H¥ó';
$alt_new_msg = '·s«H¥ó';
$alt_reply = '¦^ÂÐ«H¥ó';
$alt_reply_all = '¦^ÂÐ©Ò¦³¤H';
$alt_forward = 'Âà±H';
$alt_next = '¤U¤@«Ê';
$alt_prev = '¤W¤@«Ê';
$html_on = '&#22312;';
$html_theme = '&#32972;&#26223;&#20027;&#38988;';

// index.php

$html_lang = '»y¨¥';
$html_welcome = 'Åwªï¨ì';
$html_login = 'µn¤J';
$html_passwd = '±K½X';
$html_submit = '´£¥æ';
$html_help = 'À°§U';
$html_server = '¦øªA¾¹';
$html_wrong = 'µn¤J¦W¦r©Î±K½X¤£¥¿½T';
$html_retry = '¦A¹Á¸Õ';

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
$html_view_header = 'Åã¥Ü¼ÐÃD';
$html_remove_header = '¤£Åã¥Ü¼ÐÃD';
$html_inbox = '«H½c';
$html_new_msg = '¼g«H¥ó';
$html_reply = '¦^ÂÐ';
$html_reply_short = '¦^ÂÐ';
$html_reply_all = '¦^ÂÐ©Ò¦³¤H';
$html_forward = 'Âà±H';
$html_forward_short = 'Âà±H';
$html_delete = ' ç°£';
$html_new = '·s';
$html_mark = ' ç°£';
$html_att = 'ªþ¥ó';
$html_atts = 'ªþ¥ó';
$html_att_unknown = '[¤£©ú]';
$html_attach = 'ªþ¥ó';
$html_attach_forget = '§A§Ñ°O¥[¤Jªþ¥ó !';
$html_attach_delete = ' ç°£¤w¿ï¾Üªº';
$html_sort_by = 'Sort by';  //to translate
$html_from = '¥Ñ';
$html_subject = 'ÃD¥Ø';
$html_date = '¤é´Á';
$html_sent = '¶Ç°e';
$html_wrote = 'wrote';  //to translate
$html_size = 'Åé¿n';
$html_totalsize = 'Á`Åé¿n';
$html_kb = 'Kb';  //to translate
$html_bytes = 'bytes';  //to translate
$html_filename = 'ÀÉ¦W';
$html_to = '¦¬¥ó¤H';
$html_cc = '½Æ»s¦Ü';
$html_bcc = 'Bcc';  //to translate
$html_nosubject = 'µLÃD¥Ø';
$html_send = '¶Ç°e';
$html_cancel = '¨ú®ø';
$html_no_mail = 'µL¤º®e.';
$html_logout = 'µn¥X';
$html_msg = '«H¥ó';
$html_msgs = '«H¥ó';
$html_configuration = 'This server is not well set up !';  //to translate
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

$original_msg = '-- ­ì©l¤º®e --';
$to_empty = '¦¹ \'¦¬¥ó¤H\' ¤§¦ì¸m¤£¯à¨S¦³ !';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'Unable to open SMTP connection';  //to translate
$html_smtp_error_unexpected = 'Unexpected SMTP response:';  //to translate

// IMAP messages (class_local.php)
$lang_could_not_connect = 'Could not connect to server';  //to translate

$html_file_upload_attack = 'Possible file upload attack';  //to translate
$html_invalid_email_address = 'Invalid e-mail address';  //to translate
$html_seperate_msg_win = 'Messages in separate window';  //to translate

// Exceptions
$html_err_file_contacts = 'Unable to open contacts file for writing.'; //to transloate
?>
