<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/ar-win.php,v 1.25 2005/05/01 20:45:56 goddess_skuld Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the arabic language (Windows-1256)
 * Translation by Fisal Assubaieye <fisal77@hotmail.com>
 */

$charset = 'Windows-1256';

// Configuration for the days and months

// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = 'ar_AR';

// Text Alignment
// Can be right-to-left (rtl) which is needed for proper Arabic, Hebrew
// Or left-to-right (ltr) which is default for most languages
$lang_dir = 'rtl';

// What format string should we pass to strftime() for messages sent on
// days other than today?
$default_date_format = '%Y-%m-%d'; 

// If the local is not implemented on the host, how we display the date
$no_locale_date_format = '%Y-%m-%d';

// What format string should we pass to strftime() for messages sent
// today?
$default_time_format = '%I:%M %p';


// Here is the configuration for the HTML

$err_user_empty = 'ÎÇäÉ ÇáÏÎæá ÝÇÑÛå';
$err_passwd_empty = 'ÎÇäÉ ßáãÉ ÇáÓÑ ÝÇÑÛå';


// html message

$alt_delete = 'ÍÐÝ ÇáÑÓÇÆá ÇáãÍÏÏå';
$alt_delete_one = 'ÍÐÝ ÇáÑÓÇáå';
$alt_new_msg = 'ÑÓÇÆá ÌÏíÏå';
$alt_reply = 'ÑÏ Åáì ÇáãõÑÓöá';
$alt_reply_all = 'ÑÏ Úáì Çáßá';
$alt_forward = 'ÅÚÇÏÉ ÊæÌíå';
$alt_next = 'ÇáÑÓÇáå ÇáÊÇáíå';
$alt_prev = 'ÇáÑÓÇáå ÇáÓÇÈÞå';
$html_on = 'ããßä';
$html_theme = 'ÇáäãØ';

// index.php

$html_lang = 'ÇááÛå';
$html_welcome = 'ãÑÍÈÇð Èßã Ýí';
$html_login = 'ÏÎæá';
$html_passwd = 'ßáãÉ ÇáÓÑ';
$html_submit = 'ÅÑÓÇá';
$html_help = 'ãÓÇÚÏå';
$html_server = 'ÇáãáÞã ÇáÎÇÏã';
$html_wrong = 'ÇáÏÎæá Ãæ ßáãÉ ÇáÓÑ ÎÇØÆÜ(Üå)';
$html_retry = 'ÅÚÇÏå';
$html_remember = "Remember settings"; //to translate

// prefs.php

$html_msgperpage = 'Messages per page';  //to translate
$html_preferences = 'ÇáÊÝÖíáÇÊ';
$html_full_name = 'ÇáÅÓã ßÇãáÇð';
$html_email_address = 'ÇáÈÑíÏ ÇáÅáßÊÑæäí';
$html_ccself = 'äÓÎå ÐÇÊíå';
$html_hide_addresses = 'ÅÎÝÇÁ ÇáÚäÇæíä';
$html_outlook_quoting = 'ÅÞÊÈÇÓ äãØ Outlook';
$html_reply_to = 'ÑÏ Åáì';
$html_use_signature = 'ÅÓÊÎÏÇã ÇáÊæÞíÚ';
$html_signature = 'ÇáÊæÞíÚ';
$html_reply_leadin = 'Reply Leadin';  //to translate
$html_prefs_updated = 'áÞÏ Êã ÊÌÏíÏ ÇáÊÝÖíáÇÊ';
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
$html_view_header = 'ãÔÇåÏÉ ÇáÊÑæíÓå';
$html_remove_header = 'ÅÎÝÇÁ ÇáÊÑæíÓå';
$html_inbox = 'ÕäÏæÞ ÇáæÇÑÏ';
$html_new_msg = 'ßÊÇÈå';
$html_reply = 'ÑÏ';
$html_reply_short = 'ÑÏ:';
$html_reply_all = 'ÑÏ Úáì Çáßá';
$html_forward = 'ÅÚÇÏÉ ÊæÌíå';
$html_forward_short = 'ÅÚÇÏÉ ÊæÌíå:';
$html_forward_info = 'The forwarded message will be send as an attachment to this one.'; //to translate
$html_delete = 'ÍÐÝ';
$html_new = 'ÌÏíÏ';
$html_mark = 'ÍÐÝ';
$html_att = 'ãÑÝÞ';
$html_atts = 'ãÑÝÞÇÊ';
$html_att_unknown = '[ÛíÑ ãÚÑæÝ]';
$html_attach = 'ÅÑÝÇÞ';
$html_attach_forget = 'íÌÈ Úáíß ÅÏÑÇÌ ãáÝß ÇáãÑÝÞ ãÚ ÑÓÇáÊß ÞÈá ÅÑÓÇáåÇ !';
$html_attach_delete = 'ÍÐÝ ÇáãÍÏÏ';
$html_attach_none = 'You must select a file to attach!';  //to translate
$html_sort_by = 'ÊÑÊíÈ ÈÜ';
$html_from = 'ãä';
$html_subject = 'ÇáãæÖæÚ';
$html_date = 'ÇáÊÇÑíÎ';
$html_sent = 'ÅÑÓÇá';
$html_wrote = 'ßõÊöÈó ãä';
$html_size = 'ÇáÍÌã';
$html_totalsize = 'ÇáÍÌã Çáßáí';
$html_kb = 'ßíáæÈÇíÊ';
$html_bytes = 'ÈÇíÊ';
$html_filename = 'ÅÓã ÇáãáÝ';
$html_to = 'Åáì';
$html_cc = 'äÓÎå Åáì';
$html_bcc = 'äÓÎå ãÎÝíå Åáì';
$html_nosubject = 'ÈÏæä ÚäæÇä';
$html_send = 'ÅÑÓÇá';
$html_cancel = 'ÅáÛÇÁ';
$html_no_mail = 'áÇíæÌÏ ÑÓÇáå.';
$html_logout = 'ÎÑæÌ';
$html_msg = 'ÑÓÇáå';
$html_msgs = 'ÑÓÇáÇÊ';
$html_configuration = 'åÐÇ ÇáãáÞã ÇáÎÇÏã ÛíÑ ãÊæÇÝÞ ÌíÏÇð !';
$html_priority = 'ÇáÃæáæíå';
$html_low = 'ãäÎÝÖ';
$html_normal = 'ÚÇÏí';
$html_high = 'ÚÇáí';
$html_receipt = 'Request a return receipt';  //to translate
$html_select = 'ÅÎÊíÇÑ';
$html_select_all = 'Invert Selection';  //to translate
$html_loading_image = 'ÊÍãíá ÇáÕæÑå';
$html_send_confirmed = 'áÞÏ Êã ÊÓáíã ÈÑíÏß';
$html_no_sendaction = 'áÇíæÌÏ ÃÍÏÇË ÊÝÚíáÇÊ ãÍÏÏå. ÍÇæá Êãßíä ÏÚã ÌÇÝÇ ÓßÑíÈÊ JavaScript.';
$html_error_occurred = 'ÍÕá ÎØÃ ãÇ';
$html_prefs_file_error = 'áÇíÓÊØíÚ ÝÊÍ ãáÝ ÇáÊÝÖíáÇÊ ááßÊÇÈå Úáíå.';
$html_wrap = 'Wrap outgoing messages to :';  //to translate
$html_wrap_none = 'None'; //to translate
$html_usenet_separator = 'Usenet separator ("-- \n") Before signature';  //to translate
$html_mark_as = 'Mark as'; //to translate
$html_read = 'read'; //to translate
$html_unread = 'unread'; //to translate
$html_mail_sent = 'Message successfully sent'; // to translate

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

$original_msg = '-- ÇáÑÓÇáå ÇáÃÕáíå --';
$to_empty = 'ÇáÎÇäå \'Åáì\' íÌÈ Ãä Êßæä ÛíÑ ÝÇÑÛå !';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'áÇíÓÊØíÚ ÝÊÍ ÅÊÕÇá';
$html_smtp_error_unexpected = 'ÑÏ ÛíÑ ãÊæÞÚ:';

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
