<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/en.php,v 1.63 2003/12/22 22:54:28 ajetam Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the english language
 * 
 */

$charset = 'ISO-8859-1';

// Configuration for the days and months

// What language to use (Here, english US --> en_US)
// see '/usr/share/locale/' for more information
$lang_locale = 'en_US';

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

$err_user_empty = 'The login field is empty';
$err_passwd_empty = 'The password field is empty';


// html message

$alt_delete = 'Delete selected messages';
$alt_delete_one = 'Delete the message';
$alt_new_msg = 'New messages';
$alt_reply = 'Reply to the author';
$alt_reply_all = 'Reply all';
$alt_forward = 'Forward';
$alt_next = 'Next message';
$alt_prev = 'Previous message';
$html_on = 'on';
$html_theme = 'Theme';

// index.php

$html_lang = 'Language';
$html_welcome = 'Welcome to';
$html_login = 'Login';
$html_passwd = 'Password';
$html_submit = 'Submit';
$html_help = 'Help';
$html_server = 'Server';
$html_wrong = 'The login or the password are incorrect';
$html_retry = 'Retry';

// prefs.php

$html_msgperpage = 'Messages per page';
$html_preferences = 'Preferences';
$html_full_name = 'Full name';
$html_email_address = 'E-mail Address';
$html_ccself = 'Cc self';
$html_hide_addresses = 'Hide addresses';
$html_outlook_quoting = 'Outlook-style quoting';
$html_reply_to = 'Reply to';
$html_use_signature = 'Use signature';
$html_signature = 'Signature';
$html_reply_leadin = 'Reply Leadin';
$html_prefs_updated = 'Preferences updated';
$html_manage_folders_link = 'Manage IMAP Folders';
$html_manage_filters_link = 'Manage Email Filters';

// folders.php
$html_folders_create_failed = 'Folder could not be created!';
$html_folders_sub_failed = 'Could not subscribed to folder!';
$html_folders_unsub_failed = 'Could not unsubscribed from folder!';
$html_folders_rename_failed = 'Folder could not be renamed!';
$html_folders_updated = 'Folders updated';
$html_folder_subscribe = 'Subscribe to';
$html_folder_rename = 'Rename';
$html_folder_create = 'Create new folder called';
$html_folder_remove = 'Unsubscribe from';

// filters.php
$html_filter_remove = 'Delete';
$html_filter_body = 'Message Body';
$html_filter_subject = 'Message Subject';
$html_filter_to = 'To Field';
$html_filter_cc = 'Cc Field';
$html_filter_from = 'From Field';
$html_filter_change_tip = 'To change a filter simply overwrite it.';
$html_reapply_filters = 'Reapply all filters';
$html_filter_contains = 'contains';
$html_filter_name = 'Filter Name';
$html_filter_action = 'Filter Action';
$html_filter_moveto = 'Move to';

// Other pages
$html_select_one = '--Select One--';
$html_and = 'And';
$html_new_msg_in = 'New messages in';
$html_or = 'or';
$html_move = 'Move';
$html_copy = 'Copy';
$html_messages_to = 'selected messages to';
$html_gotopage = 'Go to Page';
$html_gotofolder = 'Go to Folder';
$html_other_folders = 'Folder List';
$html_page = 'Page';
$html_of = 'of';
$html_to = 'to';
$html_view_header = 'View header';
$html_remove_header = 'Hide header';
$html_inbox = 'Inbox';
$html_new_msg = 'Write';
$html_reply = 'Reply';
$html_reply_short = 'Re';
$html_reply_all = 'Reply all';
$html_forward = 'Forward';
$html_forward_short = 'Fw';
$html_delete = 'Delete';
$html_new = 'New';
$html_mark = 'Delete';
$html_att = 'Attachment';
$html_atts = 'Attachments';
$html_att_unknown = '[unknown]';
$html_attach = 'Attach';
$html_attach_forget = 'You must attach your file before sending your message !';
$html_attach_delete = 'Remove Selected';
$html_sort_by = 'Sort by';
$html_from = 'From';
$html_subject = 'Subject';
$html_date = 'Date';
$html_sent = 'Send';
$html_wrote = 'wrote';
$html_size = 'Size';
$html_totalsize = 'Total Size';
$html_kb = 'Kb';
$html_bytes = 'bytes';
$html_filename = 'Filename';
$html_to = 'To';
$html_cc = 'Cc';
$html_bcc = 'Bcc';
$html_nosubject = 'No subject';
$html_send = 'Send';
$html_cancel = 'Cancel';
$html_no_mail = 'No message.';
$html_logout = 'Logout';
$html_msg = 'Message';
$html_msgs = 'Messages';
$html_configuration = 'This server is not well set up !';
$html_priority = 'Priority';
$html_low = 'Low';
$html_normal = 'Normal';
$html_high = 'High';
$html_receipt = 'Request a return receipt';
$html_select = 'Select';
$html_select_all = 'Select All';
$html_loading_image = 'Loading image';
$html_send_confirmed = 'Your mail was accepted for delivery';
$html_no_sendaction = 'No action specified. Try enabling JavaScript.';
$html_error_occurred = 'An error occurred';
$html_prefs_file_error = 'Unable to open preferences file for writing.';
$html_wrap = 'Wrap outgoing messages to :';
$html_usenet_separator = 'Usenet separator ("-- \n") Before signature';
// Contacts manager
$html_add = 'Add';
$html_contacts = 'Contacts';
$html_modify = 'Modify';
$html_back = 'Back';
$html_contact_add = 'Add new contact';
$html_contact_mod = 'Modify a contact';
$html_contact_first = 'First name';
$html_contact_last = 'Last Name';
$html_contact_nick = 'Nick';
$html_contact_mail = 'Mail';
$html_contact_list = 'Contact list of ';
$html_contact_del = 'of de contact list';

$html_contact_err1 = 'Maximal number of contact is ';
$html_contact_err2 = 'You can\'t add a new contact';
$html_del_msg = 'Delete selected messages ?';
$html_down_mail = 'Download';

$original_msg = '-- Original Message --';
$to_empty = 'The \'To\' field must not be empty !';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'Unable to open SMTP connection';
$html_smtp_error_unexpected = 'Unexpected SMTP response:';

// IMAP messages (class_local.php)
$lang_could_not_connect = 'Could not connect to server';

$html_file_upload_attack = 'Possible file upload attack';
$html_invalid_email_address = 'Invalid e-mail address';
$html_seperate_msg_win = 'Messages in separate window';
?>
