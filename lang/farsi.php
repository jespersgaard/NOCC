<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/farsi.php,v 1.7 2004/06/19 12:00:57 goddess_skuld Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the persian language
 * 
 */

$charset = 'UTF-8';

// Configuration for the days and months

// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = 'fa';

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

$err_user_empty = '&#1588;&#1606;&#1575;&#1587;&#1607; &#1705;&#1575;&#1585;&#1576;&#1585; &#1582;&#1575;&#1604;&#1609; &#1575;&#1587;&#1578;';
$err_passwd_empty = '&#1585;&#1605;&#1586; &#1582;&#1575;&#1604;&#1609; &#1575;&#1587;&#1578;';


// html message

$alt_delete = '&#1662;&#1575;&#1705; &#1705;&#1585;&#1583;&#1606; &#1662;&#1610;&#1594;&#1575;&#1605;&#1607;&#1575;&#1609; &#1575;&#1606;&#1578;&#1582;&#1575;&#1576; &#1588;&#1583;&#1607;';
$alt_delete_one = '&#1662;&#1575;&#1705; &#1705;&#1585;&#1583;&#1606; &#1662;&#1610;&#1594;&#1575;&#1605;';
$alt_new_msg = '&#1662;&#1610;&#1594;&#1575;&#1605;&#1607;&#1575;&#1609; &#1580;&#1583;&#1610;&#1583;';
$alt_reply = '&#1580;&#1608;&#1575;&#1576; &#1576;&#1607; &#1606;&#1608;&#1610;&#1587;&#1606;&#1583;&#1607;';
$alt_reply_all = '&#1580;&#1608;&#1575;&#1576; &#1576;&#1607; &#1607;&#1605;&#1607;';
$alt_forward = '&#1601;&#1585;&#1587;&#1578;&#1575;&#1583;&#1606; &#1662;&#1610;&#1594;&#1575;&#1605;';
$alt_next = '&#1662;&#1610;&#1594;&#1575;&#1605; &#1576;&#1593;&#1583;&#1609;';
$alt_prev = '&#1662;&#1610;&#1594;&#1575;&#1605; &#1602;&#1576;&#1604;&#1609;';
$html_on = 'on';  //to translate
$html_theme = 'Theme';  //to translate

// index.php

$html_lang = '&#1586;&#1576;&#1575;&#1606;';
$html_welcome = '&#1582;&#1608;&#1588; &#1570;&#1605;&#1583;&#1610;&#1583; &#1576;&#1607;';
$html_login = '&#1588;&#1606;&#1575;&#1587;&#1607; &#1705;&#1575;&#1585;&#1576;&#1585;';
$html_passwd = '&#1585;&#1605;&#1586;';
$html_submit = '&#1608;&#1585;&#1608;&#1583;';
$html_help = '&#1705;&#1605;&#1705;';
$html_server = '&#1587;&#1585;&#1608;&#1585;';
$html_wrong = '&#1588;&#1606;&#1575;&#1587;&#1607; &#1705;&#1575;&#1585;&#1576;&#1585; &#1610;&#1575; &#1585;&#1605;&#1586; &#1575;&#1588;&#1578;&#1576;&#1575;&#1607; &#1575;&#1587;&#1578;';
$html_retry = '&#1587;&#1593;&#1609; &#1583;&#1608;&#1576;&#1575;&#1585;&#1607;';

// prefs.php

$html_msgperpage = '&#1578;&#1593;&#1583;&#1575;&#1583; &#1662;&#1610;&#1594;&#1575;&#1605;&#1607;&#1575; &#1583;&#1585; &#1589;&#1601;&#1581;&#1607;';
$html_preferences = '&#1578;&#1606;&#1592;&#1610;&#1605;&#1575;&#1578;';
$html_full_name = '&#1575;&#1587;&#1605; &#1705;&#1575;&#1605;&#1604;';
$html_email_address = '&#1570;&#1583;&#1585;&#1587; &#1606;&#1575;&#1605;&#1607; &#1575;&#1604;&#1705;&#1578;&#1585;&#1608;&#1606;&#1610;&#1705;&#1609;';
$html_ccself = '&#1606;&#1587;&#1582;&#1607; Cc &#1576;&#1585;&#1575;&#1609; &#1582;&#1608;&#1583;';
$html_hide_addresses = '&#1570;&#1583;&#1585;&#1587;&#1607;&#1575; &#1576;&#1607; &#1589;&#1608;&#1585;&#1578; &#1662;&#1606;&#1607;&#1575;&#1606;&#1609;';
$html_outlook_quoting = '&#1606;&#1602;&#1604; &#1602;&#1608;&#1604; &#1588;&#1576;&#1610;&#1607; Outlook';
$html_reply_to = '&#1662;&#1575;&#1587;&#1582; &#1576;&#1607;';
$html_use_signature = '&#1575;&#1587;&#1578;&#1601;&#1575;&#1583;&#1607; &#1575;&#1586; &#1575;&#1605;&#1590;&#1575;';
$html_signature = '&#1575;&#1605;&#1590;&#1575;';
$html_reply_leadin = 'Reply Leadin';  //to translate
$html_prefs_updated = '&#1578;&#1606;&#1591;&#1610;&#1605;&#1575;&#1578; &#1576;&#1585;&#1608;&#1586; &#1588;&#1583;';
$html_manage_folders_link = 'Manage IMAP Folders';  //to translate
$html_manage_filters_link = 'Manage Email Filters';  //to translate
$html_use_graphical_smilies = 'Use graphical smilies'; //to translate

// folders.php
$html_folders_create_failed = '&#1588;&#1575;&#1582;&#1607; &#1606;&#1605;&#1609;&#1578;&#1608;&#1575;&#1606;&#1583; &#1575;&#1610;&#1580;&#1575;&#1583; &#1588;&#1608;&#1583;';
$html_folders_sub_failed = 'Could not subscribed to folder!';  //to translate
$html_folders_unsub_failed = 'Could not unsubscribed from folder!';  //to translate
$html_folders_rename_failed = '&#1588;&#1575;&#1582;&#1607; &#1606;&#1605;&#1609;&#1578;&#1608;&#1575;&#1606;&#1583; &#1578;&#1594;&#1610;&#1610;&#1585; &#1606;&#1575;&#1605; &#1610;&#1575;&#1576;&#1583;';
$html_folders_updated = '&#1588;&#1575;&#1582;&#1607; &#1607;&#1575; &#1576;&#1585;&#1608;&#1586; &#1588;&#1583;&#1606;&#1583;';
$html_folder_subscribe = 'Subscribe to';  //to translate
$html_folder_rename = '&#1578;&#1594;&#1610;&#1610;&#1585; &#1606;&#1575;&#1605;';
$html_folder_create = '&#1587;&#1575;&#1582;&#1578;&#1606; &#1588;&#1575;&#1582;&#1607; &#1580;&#1583;&#1610;&#1583; &#1589;&#1583;&#1575; &#1588;&#1583;';
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
$html_new_msg_in = '&#1662;&#1610;&#1594;&#1575;&#1605;&#1607;&#1575;&#1609; &#1580;&#1583;&#1610;&#1583; &#1583;&#1585;';
$html_or = '&#1610;&#1575;';
$html_move = '&#1578;&#1594;&#1610;&#1610;&#1585; &#1605;&#1705;&#1575;&#1606;';
$html_copy = '&#1705;&#1662;&#1609;';
$html_messages_to = '&#1662;&#1610;&#1594;&#1575;&#1605;&#1607;&#1575;&#1609; &#1575;&#1606;&#1578;&#1582;&#1575;&#1576; &#1588;&#1583;&#1607; &#1576;&#1607;';
$html_gotopage = '&#1576;&#1585;&#1608; &#1576;&#1607; &#1589;&#1601;&#1581;&#1607;';
$html_gotofolder = '&#1576;&#1585;&#1608; &#1576;&#1607; &#1588;&#1575;&#1582;&#1607;';
$html_other_folders = '&#1604;&#1610;&#1587;&#1578; &#1588;&#1575;&#1582;&#1607; &#1607;&#1575;';
$html_page = '&#1589;&#1601;&#1581;&#1607;';
$html_of = '';
$html_to = '&#1576;&#1607;';
$html_view_header = '&#1587;&#1585;&#1570;&#1610;&#1606;&#1583; &#1585;&#1575; &#1606;&#1588;&#1575;&#1606; &#1576;&#1583;&#1607;';
$html_remove_header = '&#1587;&#1585;&#1570;&#1610;&#1606;&#1583; &#1585;&#1575; &#1662;&#1606;&#1607;&#1575;&#1606; &#1705;&#1606;';
$html_inbox = 'Inbox';  //to translate
$html_new_msg = '&#1606;&#1608;&#1588;&#1578;&#1606; &#1606;&#1575;&#1605;&#1607;';
$html_reply = '&#1662;&#1575;&#1587;&#1582; &#1583;&#1575;&#1583;&#1606;';
$html_reply_short = 'Re';  //to translate
$html_reply_all = '&#1662;&#1575;&#1587;&#1582; &#1583;&#1575;&#1583;&#1606; &#1576;&#1607; &#1607;&#1605;&#1607;';
$html_forward = '&#1601;&#1585;&#1587;&#1578;&#1575;&#1583;&#1606;';
$html_forward_short = 'Fw';  //to translate
$html_delete = '&#1662;&#1575;&#1705; &#1705;&#1585;&#1583;&#1606;';
$html_new = '&#1580;&#1583;&#1610;&#1583;';
$html_mark = '&#1662;&#1575;&#1705; &#1705;&#1585;&#1583;&#1606;';
$html_att = '&#1590;&#1605;&#1610;&#1605;&#1607;';
$html_atts = '&#1590;&#1605;&#1610;&#1605;&#1607; &#1607;&#1575;';
$html_att_unknown = '[&#1606;&#1575;&#1588;&#1606;&#1575;&#1582;&#1578;&#1607;]';
$html_attach = '&#1590;&#1605;&#1610;&#1605;&#1607; &#1705;&#1606;';
$html_attach_forget = '&#1588;&#1605;&#1575; &#1576;&#1575;&#1610;&#1583; &#1601;&#1575;&#1610;&#1604; &#1582;&#1608;&#1583; &#1585;&#1575; &#1602;&#1576;&#1604; &#1575;&#1586; &#1601;&#1585;&#1587;&#1578;&#1575;&#1583;&#1606; &#1590;&#1605;&#1610;&#1605;&#1607; &#1705;&#1606;&#1610;&#1583;';
$html_attach_delete = '&#1590;&#1605;&#1610;&#1605;&#1607; &#1607;&#1575;&#1609; &#1575;&#1606;&#1578;&#1582;&#1575;&#1576; &#1588;&#1583;&#1607; &#1585;&#1575; &#1662;&#1575;&#1705; &#1705;&#1606;';
$html_sort_by = '&#1578;&#1585;&#1578;&#1610;&#1576; &#1576;&#1606;&#1583;&#1609; &#1576;&#1575;';
$html_from = '&#1575;&#1586;';
$html_subject = '&#1593;&#1606;&#1608;&#1575;&#1606;';
$html_date = '&#1578;&#1575;&#1585;&#1610;&#1582;';
$html_sent = '&#1601;&#1585;&#1587;&#1578;&#1575;&#1583;&#1607; &#1588;&#1583;';
$html_wrote = 'wrote';  //to translate
$html_size = '&#1587;&#1575;&#1610;&#1586;';
$html_totalsize = '&#1587;&#1575;&#1610;&#1586; &#1705;&#1604;';
$html_kb = '&#1705;&#1610;&#1604;&#1608; &#1576;&#1575;&#1610;&#1578;';
$html_bytes = '&#1576;&#1575;&#1610;&#1578;';
$html_filename = '&#1606;&#1575;&#1605; &#1601;&#1575;&#1610;&#1604;';
$html_to = '&#1576;&#1607;';
$html_cc = '&#1705;&#1662;&#1609;';
$html_bcc = '&#1705;&#1662;&#1609; &#1605;&#1581;&#1585;&#1605;&#1575;&#1606;&#1607;';
$html_nosubject = '&#1576;&#1583;&#1608;&#1606; &#1593;&#1606;&#1608;&#1575;&#1606;';
$html_send = '&#1576;&#1601;&#1585;&#1587;&#1578;';
$html_cancel = '&#1705;&#1606;&#1587;&#1604;';
$html_no_mail = '&#1662;&#1610;&#1594;&#1575;&#1605;&#1609; &#1608;&#1580;&#1608;&#1583; &#1606;&#1583;&#1575;&#1585;&#1583;';
$html_logout = '&#1582;&#1585;&#1608;&#1580;';
$html_msg = '&#1662;&#1610;&#1594;&#1575;&#1605;';
$html_msgs = '&#1662;&#1610;&#1594;&#1575;&#1605;&#1607;&#1575;';
$html_configuration = '&#1575;&#1610;&#1606; &#1587;&#1585;&#1608;&#1585; &#1583;&#1585;&#1587;&#1578; &#1578;&#1606;&#1592;&#1610;&#1605; &#1606;&#1588;&#1583;&#1607; &#1575;&#1587;&#1578;';
$html_priority = '&#1575;&#1585;&#1580;&#1581;&#1610;&#1578;';
$html_low = '&#1705;&#1605;';
$html_normal = '&#1605;&#1593;&#1605;&#1608;&#1604;&#1609;';
$html_high = '&#1586;&#1610;&#1575;&#1583;';
$html_receipt = 'Request a return receipt';  //to translate
$html_select = '&#1575;&#1606;&#1578;&#1582;&#1575;&#1576;';
$html_select_all = '&#1575;&#1606;&#1578;&#1582;&#1575;&#1576; &#1607;&#1605;&#1607;';
$html_loading_image = '&#1582;&#1608;&#1575;&#1606;&#1583;&#1606; &#1578;&#1589;&#1608;&#1610;&#1585;';
$html_send_confirmed = '&#1606;&#1575;&#1605;&#1607; &#1588;&#1605;&#1575; &#1576;&#1585;&#1575;&#1609; &#1601;&#1585;&#1587;&#1578;&#1575;&#1583;&#1606; &#1662;&#1584;&#1610;&#1585;&#1601;&#1578;&#1607; &#1588;&#1583;';
$html_no_sendaction = '&#1607;&#1610;&#1670; &#1593;&#1605;&#1604;&#1609; &#1575;&#1606;&#1580;&#1575;&#1605; &#1606;&#1588;&#1583;. JavaScrip &#1585;&#1575; &#1601;&#1593;&#1575;&#1604; &#1606;&#1605;&#1575;&#1574;&#1610;&#1583;';
$html_error_occurred = '&#1610;&#1705; &#1582;&#1591;&#1575; &#1575;&#1578;&#1601;&#1575;&#1602; &#1575;&#1601;&#1578;&#1575;&#1583;';
$html_prefs_file_error = '&#1606;&#1605;&#1609;&#1578;&#1608;&#1575;&#1606;&#1605; &#1601;&#1575;&#1610;&#1604; &#1578;&#1606;&#1592;&#1610;&#1605;&#1575;&#1578; &#1601;&#1585;&#1583;&#1609; &#1585;&#1575; &#1576;&#1585;&#1575;&#1609; &#1606;&#1608;&#1588;&#1578;&#1606; &#1576;&#1575;&#1586; &#1705;&#1606;&#1605;';
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
$html_del_msg = 'Delete selected messages ?';  //to translate
$html_down_mail = 'Download';  //to translate

$original_msg = '-- Original Message --';  //to translate
$to_empty = 'The \'To\' field must not be empty !';  //to translate

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = '&#1606;&#1605;&#1609;&#1578;&#1608;&#1575;&#1606;&#1605; &#1575;&#1578;&#1589;&#1575;&#1604; SMTP &#1585;&#1575; &#1576;&#1575;&#1586; &#1705;&#1606;&#1605;';
$html_smtp_error_unexpected = '&#1580;&#1608;&#1575;&#1576; &#1594;&#1610;&#1585; &#1602;&#1575;&#1576;&#1604; &#1575;&#1606;&#1578;&#1592;&#1575;&#1585; SMTP:';

// IMAP messages (class_local.php)
$lang_could_not_connect = '&#1606;&#1605;&#1609;&#1578;&#1608;&#1575;&#1606;&#1605; &#1576;&#1607; &#1587;&#1585;&#1608;&#1585; &#1605;&#1578;&#1589;&#1604; &#1588;&#1608;&#1605;';
$html_file_upload_attack = 'Possible file upload attack';  //to translate
$html_invalid_email_address = 'Invalid e-mail address';  //to translate
$html_seperate_msg_win = 'Messages in separate window';  //to translate
?>
