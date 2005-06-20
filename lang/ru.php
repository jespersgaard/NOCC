<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/ru.php,v 1.35 2005/05/01 20:45:56 goddess_skuld Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the russian (Windows-1251) language
 * Translation by Sergey Frolovithev <serg@spylog.ru>
 * Additional translation Anton Jakimov <t0xa@ls2.lv>
 */

$charset = 'Windows-1251';

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
$html_remember = "Remember settings"; //to translate

// prefs.php

$html_msgperpage = '����� �� ��������';
$html_preferences = '���������';
$html_full_name = '���';
$html_email_address = '����� ����������� �����';
$html_ccself = '����� ����';
$html_hide_addresses = '�������� �����';
$html_outlook_quoting = '����������� � ����� Outlook';
$html_reply_to = '��������';
$html_use_signature = '������������ �������';
$html_signature = '�������';
$html_reply_leadin = 'Reply Leadin';
$html_prefs_updated = '��������� ���������';
$html_manage_folders_link = '���������� ������� IMAP';
$html_manage_filters_link = '���������� ��������� ���������';
$html_use_graphical_smilies = '������������ ����������� ��������';

// folders.php
$html_folders_create_failed = '����� �� ����� ���� �������!';
$html_folders_sub_failed = '���������� ����������� �� �����!';
$html_folders_unsub_failed = '���������� ���������� �� �����!';
$html_folders_rename_failed = '����� �� ����� ���� �������������!';
$html_folders_updated = '����� ���������';
$html_folder_subscribe = '����������� ��';
$html_folder_rename = '�������������';
$html_folder_create = '������� ����� ����� � ������';
$html_folder_remove = '���������� ��';
$html_folder_delete = '�������';

// filters.php
$html_filter_remove = '�������';
$html_filter_body = '���� ������';
$html_filter_subject = '����';
$html_filter_to = '���� ����';
$html_filter_cc = '���� �����';
$html_filter_from = '���� ��';
$html_filter_change_tip = '��� ������, ������ ������������ ������.';
$html_reapply_filters = '������������� ��� �������';
$html_filter_contains = '��������';
$html_filter_name = '�������� �������';
$html_filter_action = '�������� �������';
$html_filter_moveto = '����������� �';

// Other pages
$html_select_one = '--�������� ����--';
$html_and = '�';
$html_new_msg_in = '����� ��������� �';
$html_or = '���';
$html_move = '�����������';
$html_copy = '����������';
$html_messages_to = '��������� ������ �';
$html_gotopage = '������� �� ��������';
$html_gotofolder = '������� � �����';
$html_other_folders = '������ �����';
$html_page = '��������';
$html_of = '��';
$html_to = '��';
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
$html_sort_by = '����������� ��';
$html_from = '��';
$html_subject = '����';
$html_date = '�����';
$html_sent = '���������';
$html_wrote = '�������(�)';
$html_size = '������';
$html_totalsize = '����� ������';
$html_kb = '��';
$html_bytes = '�';
$html_filename = '��� �����';
$html_to = '����';
$html_cc = '�����';
$html_bcc = 'Bcc';  //to translate
$html_nosubject = '��� ����';
$html_send = '���������';
$html_cancel = '��������';
$html_no_mail = '��������� ���';
$html_logout = '�����';
$html_msg = '���������';
$html_msgs = '���������';
$html_configuration = '���� ������ ���������� ����������!';
$html_priority = '���������';
$html_low = '������';
$html_normal = '����������';
$html_high = '�������';
$html_receipt = '��������� ����������� � ���������';
$html_select = '�������';
$html_select_all = '������������� �����';
$html_loading_image = '�������� �����������';
$html_send_confirmed = '���� ����� ������� � �����������';
$html_no_sendaction = '�� ������� ��������. ���������� �������� JavaScript.';
$html_error_occurred = '��������� ������';
$html_prefs_file_error = '���� �������� �� ����� ���� ������ ��� ������.';
$html_wrap = '������ ������ (� ��������):';
$html_wrap_none = 'None'; //to translate
$html_usenet_separator = '����������� � ����� Usenet ("-- \n") ����� ��������';
$html_mark_as = '�������� ���';
$html_read = '�����������';
$html_unread = '�������������';
$html_mail_sent = 'Message successfully sent'; // to translate

// Contacts manager
$html_add = 'Add';
$html_contacts = '��������';
$html_modify = '��������';
$html_back = '�����';
$html_contact_add = '�������� �������';
$html_contact_mod = '�������� �������';
$html_contact_first = '���';
$html_contact_last = '�������';
$html_contact_nick = '���������';
$html_contact_mail = '����� ����������� �����';
$html_contact_list = '������ ��������� ';
$html_contact_del = '�� ����������� �����';

$html_contact_err1 = '������������ ����� ��������� ';
$html_contact_err2 = '�� �� ������ �������� ����� �������';
$html_contact_err3 = '� ��� ��� ���� ������� � ����������� �����';
$html_del_msg = '������� ��������� ������?';
$html_down_mail = '���������';

$original_msg = '-- �������� ������ --';
$to_empty = '���� \'����\' �� ������ ���� ������ !';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = '�� �������� ���������� SMTP ����������';
$html_smtp_error_unexpected = '����������� ����� SMTP:';

// IMAP messages (class_local.php)
$lang_could_not_connect = '���������� ������������ � �������';

$html_file_upload_attack = '��������� ������ � ������� �������� �����';
$html_invalid_email_address = '�������� ����� ����������� �����';
$html_invalid_msg_per_page = '�������� ���������� ����� �� ��������';
$html_invalid_wrap_msg = '�������� ������ ������ ������ (� ��������)';
$html_seperate_msg_win = '��������� � ��������� ����';

// Exceptions
$html_err_file_contacts = '���� ��������� �� ����� ���� ������ ��� ������.';
?>
