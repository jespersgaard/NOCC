<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/zh-gb.php,v 1.4 2001/11/18 21:08:06 wolruf Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the Chinese Simplified language
 * Translation by Liu Hong <loyaliu@21cn.com>
 */

$charset = 'gb2312';

// Configuration for the days and months

// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = 'zh_CN.GB2312';

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

$err_user_empty = '�û���Ϊ��';
$err_passwd_empty = '����Ϊ��';


// html message

$alt_delete = 'ɾ��ѡ����ʼ�';
$alt_delete_one = 'ɾ���ʼ�';
$alt_new_msg = '�½��ʼ�';
$alt_reply = '�ظ�����';
$alt_reply_all = '�ظ�����';
$alt_forward = 'ת��';
$alt_next = '��һ���ʼ�';
$alt_prev = '��һ���ʼ�';
$html_on = '��';
$html_theme = '����';

// index.php

$html_lang = '����';
$html_welcome = '��ӭ';
$html_login = '��¼';
$html_passwd = '����';
$html_submit = '�û���';
$html_help = '����';
$html_server = '������';
$html_wrong = '�û����������벻��ȷ';
$html_retry = '����';

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

$html_view_header = '����ʼ�ͷ';
$html_remove_header = '�����ʼ�ͷ';
$html_inbox = '�ռ���';
$html_new_msg = 'д�ʼ�';
$html_reply = '�ظ�';
$html_reply_short = 'Re��';
$html_reply_all = '�ظ�����';
$html_forward = 'ת��';
$html_forward_short = 'Fw';
$html_delete = 'ɾ��';
$html_new = '��';
$html_mark = '�ñ�';
$html_att = '����';
$html_atts = '����';
$html_att_unknown = '[unknown]';
$html_attach = '����';
$html_attach_forget = '�ڷ����ʼ�֮ǰ�������ѡһ���ļ�!';
$html_attach_delete = 'ɾ��ѡ��';
$html_sort_by = 'Sort by';
$html_from = '������';
$html_subject = '����';
$html_date = '����';
$html_sent = '����';
$html_wrote = 'wrote';
$html_size = '��С';
$html_totalsize = '�ܴ�С';
$html_kb = 'Kb';
$html_bytes = '�ֽ�';
$html_filename = '�ļ���';
$html_to = 'To';
$html_cc = 'Cc';
$html_bcc = 'Bcc';
$html_nosubject = 'û������';
$html_send = '����';
$html_cancel = 'ȡ��';
$html_no_mail = 'û���ʼ�.';
$html_logout = '�˳�';
$html_msg = '�ʼ�';
$html_msgs = '�ʼ�';
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

$original_msg = '-- Original Message --';
$to_empty = ' \'To\' ����Ϊ�� !';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = "Unable to open connection";
$html_smtp_error_unexpected = "Unexpected response:";
$lang_could_not_connect = 'Could not connect to server';  //to translate
?>
