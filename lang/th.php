<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/th.php,v 1.12 2004/06/28 15:28:04 goddess_skuld Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the Thai language
 * 
 */

$charset = 'windows-874';

// Configuration for the days and months

// What language to use (Here, thai TH --> th_TH)
// see '/usr/share/locale/' for more information
$lang_locale = 'th_TH';

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

$err_user_empty = '���ͼ����������͡';
$err_passwd_empty = '���ʼ�ҹ������͡';


// html message

$alt_delete = 'ź�����·�����͡';
$alt_delete_one = 'ź';
$alt_new_msg = '����������';
$alt_reply = '�ͺ��Ѻ';
$alt_reply_all = '�ͺ��Ѻ�ء��';
$alt_forward = '�觵��';
$alt_next = '�����µ���';
$alt_prev = '�����¡�͹';
$html_on = '�Դ';
$html_theme = '�ٻẺ';

// index.php

$html_lang = '����';
$html_welcome = '�Թ�յ�͹�Ѻ���';
$html_login = '���ͼ����';
$html_passwd = '���ʼ�ҹ';
$html_submit = '�׹�ѹ';
$html_help = '���������';
$html_server = '�к�';
$html_wrong = '���ͼ�����������ʼ�ҹ���١��ͧ';
$html_retry = '�ͧ����';

// prefs.php

$html_msgperpage = 'Messages per page';  //to translate
$html_preferences = '��駤��';
$html_full_name = '�������';
$html_email_address = '������';
$html_ccself = '����';
$html_hide_addresses = '��͹�������';
$html_outlook_quoting = '�ٻẺ Outlook';
$html_reply_to = '�ͺ��Ѻ�֧';
$html_use_signature = '������繵�';
$html_signature = '����繵�';
$html_reply_leadin = 'Reply Leadin';  //to translate
$html_prefs_updated = '��õ�駤�����Ѻ��ا����';
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
$html_view_header = '�ʴ���������´';
$html_remove_header = '��͹��������´';
$html_inbox = '���ͧ������';
$html_new_msg = '��¹������';
$html_reply = '�ͺ��Ѻ';
$html_reply_short = 'Re';  //to translate
$html_reply_all = '�ͺ��Ѻ�ء��';
$html_forward = '�觵��';
$html_forward_short = 'Fw';  //to translate
$html_forward_info = 'The forwarded message will be send as an attachment to this one.'; //to translate
$html_delete = 'ź';
$html_new = '����';
$html_mark = 'ź';
$html_att = 'Ṻ���';
$html_atts = 'Ṻ�������';
$html_att_unknown = '[������ѡ]';
$html_attach = 'Ṻ';
$html_attach_forget = '�س��ͧṺ����͹�����觨����� !';
$html_attach_delete = 'ź���Ṻ������͡';
$html_sort_by = '�Ѵ���§��';
$html_from = '�ҡ';
$html_subject = '�������ͧ';
$html_date = '�ѹ';
$html_sent = '��';
$html_wrote = '��¹�����';
$html_size = '��Ҵ';
$html_totalsize = '��Ҵ������';
$html_kb = 'Kb';  //to translate
$html_bytes = 'bytes';  //to translate
$html_filename = '�������';
$html_to = '�֧';
$html_cc = '����';
$html_bcc = '���ҫ�͹';
$html_nosubject = '������������ͧ';
$html_send = '��';
$html_cancel = '¡��ԡ';
$html_no_mail = '����բ�ͤ���';
$html_logout = '�͡';
$html_msg = '��ͤ���';
$html_msgs = '���¢�ͤ���';
$html_configuration = '�к�����ѧ��駤���������ó�';
$html_priority = '�����Ӥѭ';
$html_low = '���';
$html_normal = '����';
$html_high = '�٧';
$html_receipt = 'Request a return receipt';  //to translate
$html_select = '���͡';
$html_select_all = 'Invert Selection';  //to translate
$html_loading_image = '���ѧ��Ŵ�Ҿ';
$html_send_confirmed = '�����·�ҹ��١�������';
$html_no_sendaction = '����ա�á�з��� ����ͧ�Դ����� JavaScript';
$html_error_occurred = '�Դ��ͼԴ��Ҵ���';
$html_prefs_file_error = '�������ö��駤����';
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

$original_msg = '-- ��ͤ����鹩�Ѻ --';
$to_empty = 'The \'�֧\' ���������ҧ��� !';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = '�������ö�Դ�����';
$html_smtp_error_unexpected = '����ա�õͺʹͧ:';

// IMAP messages (class_local.php)
$lang_could_not_connect = 'Could not connect to server';  //to translate

$html_file_upload_attack = 'Possible file upload attack';  //to translate
$html_invalid_email_address = 'Invalid e-mail address';  //to translate
$html_invalid_msg_per_page = 'Invalid number of messages per page';  //to translate
$html_invalid_wrap_msg = 'Invalid message wrap width';  //to translate
$html_seperate_msg_win = 'Messages in separate window';  //to translate

// Exceptions
$html_err_file_contacts = 'Unable to open contacts file for writing.'; //to translate
?>
