<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/ru-koi.php,v 1.19 2004/06/19 12:00:58 goddess_skuld Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the russian (KOI8-R) language
 * Translation by Sergey Frolovithev <serg@spylog.ru>
 * Additional translation Anton Jakimov <t0xa@ls2.lv>
 */

$charset = 'KOI8-R';

// Configuration for the days and months

// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = 'ru_RU';

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
$default_time_format = '%H:%M';


// Here is the configuration for the HTML

$err_user_empty = '�� ������ �����';
$err_passwd_empty = '�� ������ ������';


// html message

$alt_delete = '������� ��������� ���������';
$alt_delete_one = '������� ���������';
$alt_new_msg = '����� ���������';
$alt_reply = '�������� ������';
$alt_reply_all = '�������� ����';
$alt_forward = '���������';
$alt_next = '���������';
$alt_prev = '����������';
$html_on = '���.';
$html_theme = '������';

// index.php

$html_lang = '����';
$html_welcome = '����� ���������� �';
$html_login = '���';
$html_passwd = '������';
$html_submit = '�����';
$html_help = '������';
$html_server = '������';
$html_wrong = '����� ��� ������ �� �����';
$html_retry = '���������';

// prefs.php

$html_msgperpage = '��������� �� ��������';
$html_preferences = 'Preferences';  //to translate
$html_full_name = 'Full name';  //to translate
$html_email_address = 'E-mail Address';  //to translate
$html_ccself = 'Cc self';  //to translate
$html_hide_addresses = 'Hide addresses';  //to translate
$html_outlook_quoting = 'Outlook-style quoting';  //to translate
$html_reply_to = 'Reply to';  //to translate
$html_use_signature = 'Use signature';  //to translate
$html_signature = 'Signature';  //to translate
$html_reply_leadin = '��������� ������';
$html_prefs_updated = 'Preferences updated';  //to translate
$html_manage_folders_link = '��������� ����� IMAP';
$html_manage_filters_link = '��������� ��������';
$html_use_graphical_smilies = 'Use graphical smilies'; //to translate

// folders.php
$html_folders_create_failed = '���������� ������� �����!';
$html_folders_sub_failed = '������ ����������� �� �����!';
$html_folders_unsub_failed = '������ ���������� �� �����!';
$html_folders_rename_failed = '����� �� ����� ���� �������������!';
$html_folders_updated = '����� ���������';
$html_folder_subscribe = '����������� ��';
$html_folder_rename = '�������������';
$html_folder_create = '������� ����� �����';
$html_folder_remove = '���������� ��';
$html_folder_delete = 'Delete';  //to translate

// filters.php
$html_filter_remove = '�������';
$html_filter_body = '���� ���������';
$html_filter_subject = '����';
$html_filter_to = '����';
$html_filter_cc = '�����';
$html_filter_from = '�����';
$html_filter_change_tip = '��� ��������� ������� �������� ���������� ���.';
$html_reapply_filters = '�������������';
$html_filter_contains = 'contains';  //to translate
$html_filter_name = 'Filter Name';  //to translate
$html_filter_action = 'Filter Action';  //to translate
$html_filter_moveto = 'Move to';  //to translate

// Other pages
$html_select_one = '--��������--';
$html_and = '�';
$html_new_msg_in = '����� ��������� �';
$html_or = '���';
$html_move = '�����������';
$html_copy = '�����������';
$html_messages_to = '��������� ��������� �';
$html_gotopage = '�������';
$html_gotofolder = '������� � �����';
$html_other_folders = '������ �����';
$html_page = '��������';
$html_of = '��';
$html_to = 'to';  //to translate
$html_view_header = '����������� ��������� ������';
$html_remove_header = '������ ��������� ������';
$html_inbox = '��������';
$html_new_msg = '��������';
$html_reply = '��������';
$html_reply_short = 'Re';  //to translate
$html_reply_all = '�������� ����';
$html_forward = '���������';
$html_forward_short = 'Fw';  //to translate
$html_delete = '�������';
$html_new = '�����';
$html_mark = '�������';
$html_att = '������������� ����';
$html_atts = '������������� �����';
$html_att_unknown = '[����������]';
$html_attach = '���������� ����';
$html_attach_forget = '�� ������ ���������� ���� �� �������� ���������!';
$html_attach_delete = '������� ���������';
$html_sort_by = 'Sort by';  //to translate
$html_from = '��';
$html_subject = '����';
$html_date = '�����';
$html_sent = '���������';
$html_wrote = '(��)�����';
$html_size = '������';
$html_totalsize = '����� ������';
$html_kb = '�����';
$html_bytes = '����';
$html_filename = '��� �����';
$html_to = '����';
$html_cc = '�����';
$html_bcc = 'Bcc';  //to translate
$html_nosubject = 'no subject';  //to translate
$html_send = '���������';
$html_cancel = '��������';
$html_no_mail = '��������� ���';
$html_logout = '�����';
$html_msg = '���������';
$html_msgs = '���������';
$html_configuration = '��� ������ ����� ��������!';
$html_priority = '���������';
$html_low = '������';
$html_normal = '�������';
$html_high = '�������';
$html_receipt = '��������� ������������� ���������';
$html_select = '�������';
$html_select_all = '������� ���';
$html_loading_image = '�������� ��������';
$html_send_confirmed = '��������� ������� � ��������';
$html_no_sendaction = '�� ������ ��������. ���������� �������� Javascript.';
$html_error_occurred = '��������� ������.';
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
$html_del_msg = 'Delete selected messages ?';  //to translate
$html_down_mail = 'Download';  //to translate

$original_msg = '-- Original Message --';  //to translate
$to_empty = '���� \'����\' �� ������ ���� ������ !';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = '���������� ������� ����������';
$html_smtp_error_unexpected = '�������� ����� �������:';

// IMAP messages (class_local.php)
$lang_could_not_connect = '�� ���� ����������� � �������';

$html_file_upload_attack = '���������� �� ����� ����� file upload';
$html_invalid_email_address = '������������ e-mail �����';
$html_seperate_msg_win = '��������� � ��������� ����';
?>
