<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/el.php,v 1.7 2002/04/24 23:32:25 rossigee Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the Greek language
 * Translation by Spyros Ioakim <sioakim@ace-hellas.gr>
 */

$charset = 'ISO-8859-7';

// Configuration for the days and months

// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = 'el_GR';

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

$err_user_empty = '�� ����� ����� ����������� ����� �����';
$err_passwd_empty = '�� ����� ������� ����� �����';


// html message

$alt_delete = '�������� ����������� ���������';
$alt_delete_one = '�������� ���������';
$alt_new_msg = '��� ��������';
$alt_reply = '�������� ���� ���������';
$alt_reply_all = '�������� �� �����';
$alt_forward = '��������';
$alt_next = '������� ������';
$alt_prev = '����������� ������';
$html_on = 'on';
$html_theme = '����';

// index.php

$html_lang = '������';
$html_welcome = '����� ������ ���';
$html_login = '����� �����������';
$html_passwd = '�������';
$html_submit = 'Login';
$html_help = '�������';
$html_server = '�����������';
$html_wrong = '�� ����� ����������� � � ������� ����� �����';
$html_retry = '���������';

// prefs.php

$html_preferences = '�����������';
$html_full_name = '�������������';
$html_email_address = 'E-mail ���������';
$html_ccself = '��������� ���� ����� ���';
$html_hide_addresses = '�������� �����������';
$html_outlook_quoting = '���� Outlook ����������';
$html_reply_to = '�������� ��';
$html_use_signature = '������������� ���������';
$html_signature = '��������';
$html_prefs_updated = '�� ����������� ��� �����������';

// Other pages

$html_view_header = '������� ������������';
$html_remove_header = '�������� ������������';
$html_inbox = 'Inbox';
$html_new_msg = '�������';
$html_reply = '��������';
$html_reply_short = 'Re';
$html_reply_all = '�������� �� �����';
$html_forward = '��������';
$html_forward_short = 'Fw';
$html_delete = '��������';
$html_new = '���';
$html_mark = '��������';
$html_att = '���������';
$html_atts = '���������';
$html_att_unknown = '[�������]';
$html_attach = '���������';
$html_attach_forget = '������ �� ��������� �� ������ ���� �������� �� ������ !';
$html_attach_delete = '�������� ������������� ����������';
$html_sort_by = 'Sort by';
$html_from = '���';
$html_subject = '����';
$html_date = '��/���';
$html_sent = '��������';
$html_wrote = 'wrote';
$html_size = '�������';
$html_totalsize = '�������� �������';
$html_kb = 'Kb';
$html_bytes = 'bytes';
$html_filename = '����� �������';
$html_to = '����';
$html_cc = '��������� ����';
$html_bcc = '����� ��������� ����';
$html_nosubject = '����� ����';
$html_send = '��������';
$html_cancel = '�����';
$html_no_mail = '��� �������� ��������.';
$html_logout = '������';
$html_msg = '������';
$html_msgs = '��������';
$html_configuration = '����� � ����������� ��� ���� ������� ����� !';
$html_priority = '��������������';
$html_low = '������';
$html_normal = '��������';
$html_high = '�����';
$html_select = '��������';
$html_select_all = '������� ����';
$html_loading_image = '������� ��� ������';
$html_send_confirmed = '�� ������ ��� �� ���������.';
$html_no_sendaction = '��� ���������� ������. ��������� �� �������������� ���JavaScript.';
$html_error_occurred = '��� ������ ������';
$html_prefs_file_error = '��� ����� �� ����� ��� ������ �����������.';
$html_sig_file_error = '��� ����� �� ����� ��� ������ ���������.';

$original_msg = '-- ��������� ������ --';
$to_empty = '�� ����� \'����\' ��� ������ �� ����� ����� !';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = "��� ����� �� ������ �������";
$html_smtp_error_unexpected = "������� ��������:";
$lang_could_not_connect = 'Could not connect to server';  //to translate
$html_file_upload_attack = 'Possible file upload attack';  //to translate
$html_invalid_email_address = 'Invalid e-mail address';  //to translate
?>
