<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/kr.php,v 1.7 2002/06/30 16:27:14 rossigee Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the Korean language
 * Translation by Roh,Kyoung-Min <rohbin@dreamwiz.com>
 */

$charset = 'euc-kr';

// Configuration for the days and months


// see '/usr/share/locale/' for more information
$lang_locale = 'ko';

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

$err_user_empty = '���̵� �Է����ֽʽÿ�';
$err_passwd_empty = '��й�ȣ�� �Է����ֽʽÿ�';


// html message

$alt_delete = '����ۼ���';
$alt_delete_one = '���������';
$alt_new_msg = '��������';
$alt_reply = '����';
$alt_reply_all = '��ü����';
$alt_forward = '����';
$alt_next = '���� ��';
$alt_prev = '���� ��';
$html_on = '����';
$html_theme = '�׸�';

// index.php

$html_lang = '���';
$html_welcome = '�������! ';
$html_login = '���Ӿ��̵�';
$html_passwd = '��й�ȣ';
$html_submit = '�α���';
$html_help = '����';
$html_server = '����';
$html_wrong = '���̵� ���ų� ��й�ȣ�� ��ġ���� �ʽ��ϴ�';
$html_retry = '�ٽ��Է�';

// prefs.php

$html_preferences = 'Preferences';
$html_full_name = 'Full name';
$html_email_address = 'E-mail Address';
$html_ccself = 'Cc self';
$html_hide_addresses = 'Hide addresses';
$html_outlook_quoting = 'Outlook-style quoting';
$html_reply_to = 'Reply to';
$html_use_signature = 'Use signature';
$html_signature = 'Signature';
$html_prefs_updated = 'Preferences updated';

// Other pages

$html_view_header = 'View header';
$html_remove_header = 'Hide header';
$html_inbox = '����������';
$html_new_msg = '����';
$html_reply = '����';
$html_reply_short = 'Re';
$html_reply_all = '��ü����';
$html_forward = '����';
$html_forward_short = 'Fw';
$html_delete = '����';
$html_new = '����������';
$html_mark = '����';
$html_att = '÷��';
$html_atts = '÷��';
$html_att_unknown = '[unknown]';
$html_attach = '÷���ϱ�';
$html_attach_forget = '������ ÷���ϼž� ������ ������ �ֽ��ϴ�.';
$html_attach_delete = '����';
$html_sort_by = 'Sort by';
$html_from = '������';
$html_subject = '����';
$html_date = '��¥';
$html_sent = 'Send';
$html_size = 'ũ��';
$html_totalsize = 'Total Size';
$html_kb = 'Kb';
$html_bytes = 'bytes';
$html_filename = '���ϸ�';
$html_to = '�޴»��';
$html_cc = '����';
$html_bcc = '�������';
$html_nosubject = '�������';
$html_send = '������';
$html_cancel = '���';
$html_no_mail = '�������� ����ֽ��ϴ�';
$html_logout = '�α׾ƿ�';
$html_msg = ' ���� ������ �ֽ��ϴ�';
$html_msgs = ' ���� ������ �ֽ��ϴ�';
$html_configuration = 'This server is not well set up !';
$html_priority = 'Priority';
$html_low = 'Low';
$html_normal = 'Normal';
$html_high = 'High';
$html_select = 'Select';
$html_select_all = 'Select All';
$html_loading_image = 'Loading image';
$html_send_confirmed = 'Your mail was accepted for delivery';
$html_no_sendaction = 'No action specified. Try enabling JavaScript.';
$html_error_occurred = 'An error occurred';
$html_prefs_file_error = 'Unable to open preferences file for writing.';
$html_sig_file_error = 'Unable to open signature file for writing.';

$original_msg = '-- ���� ���� --';
$to_empty = '�̸���(email) �ּҸ� �Է��ϼž� �մϴ�.';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = "Unable to open connection";
$html_smtp_error_unexpected = "Unexpected response:";
$lang_could_not_connect = 'Could not connect to server';  //to translate
$html_file_upload_attack = 'Possible file upload attack';  //to translate
$html_invalid_email_address = 'Invalid e-mail address';  //to translate
$html_seperate_msg_win = 'Messages in seperate window';  //to translate
?>
