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

$err_user_empty = '���� ������ �����';
$err_passwd_empty = '���� ���� ���� �����';


// html message

$alt_delete = '��� ������� �������';
$alt_delete_one = '��� �������';
$alt_new_msg = '����� �����';
$alt_reply = '�� ��� ��������';
$alt_reply_all = '�� ��� ����';
$alt_forward = '����� �����';
$alt_next = '������� �������';
$alt_prev = '������� �������';
$html_on = '����';
$html_theme = '�����';

// index.php

$html_lang = '�����';
$html_welcome = '������ ��� ��';
$html_login = '����';
$html_passwd = '���� ����';
$html_submit = '�����';
$html_help = '������';
$html_server = '������ ������';
$html_wrong = '������ �� ���� ���� �����(��)';
$html_retry = '�����';
$html_remember = "Remember settings"; //to translate

// prefs.php

$html_msgperpage = 'Messages per page';  //to translate
$html_preferences = '���������';
$html_full_name = '����� ������';
$html_email_address = '������ ����������';
$html_ccself = '���� �����';
$html_hide_addresses = '����� ��������';
$html_outlook_quoting = '������ ��� Outlook';
$html_reply_to = '�� ���';
$html_use_signature = '������� �������';
$html_signature = '�������';
$html_reply_leadin = 'Reply Leadin';  //to translate
$html_prefs_updated = '��� �� ����� ���������';
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
$html_view_header = '������ ��������';
$html_remove_header = '����� ��������';
$html_inbox = '����� ������';
$html_new_msg = '�����';
$html_reply = '��';
$html_reply_short = '��:';
$html_reply_all = '�� ��� ����';
$html_forward = '����� �����';
$html_forward_short = '����� �����:';
$html_forward_info = 'The forwarded message will be send as an attachment to this one.'; //to translate
$html_delete = '���';
$html_new = '����';
$html_mark = '���';
$html_att = '����';
$html_atts = '������';
$html_att_unknown = '[��� �����]';
$html_attach = '�����';
$html_attach_forget = '��� ���� ����� ���� ������ �� ������ ��� ������� !';
$html_attach_delete = '��� ������';
$html_attach_none = 'You must select a file to attach!';  //to translate
$html_sort_by = '����� ��';
$html_from = '��';
$html_subject = '�������';
$html_date = '�������';
$html_sent = '�����';
$html_wrote = '������ ��';
$html_size = '�����';
$html_totalsize = '����� �����';
$html_kb = '��������';
$html_bytes = '����';
$html_filename = '��� �����';
$html_to = '���';
$html_cc = '���� ���';
$html_bcc = '���� ����� ���';
$html_nosubject = '���� �����';
$html_send = '�����';
$html_cancel = '�����';
$html_no_mail = '������ �����.';
$html_logout = '����';
$html_msg = '�����';
$html_msgs = '������';
$html_configuration = '��� ������ ������ ��� ������ ����� !';
$html_priority = '��������';
$html_low = '�����';
$html_normal = '����';
$html_high = '����';
$html_receipt = 'Request a return receipt';  //to translate
$html_select = '������';
$html_select_all = 'Invert Selection';  //to translate
$html_loading_image = '����� ������';
$html_send_confirmed = '��� �� ����� �����';
$html_no_sendaction = '������ ����� ������� �����. ���� ����� ��� ���� ������ JavaScript.';
$html_error_occurred = '��� ��� ��';
$html_prefs_file_error = '�������� ��� ��� ��������� ������� ����.';
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

$original_msg = '-- ������� ������� --';
$to_empty = '������ \'���\' ��� �� ���� ��� ����� !';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = '�������� ��� �����';
$html_smtp_error_unexpected = '�� ��� �����:';

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
