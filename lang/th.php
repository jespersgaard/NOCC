<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/th.php,v 1.45 2001/11/18 17:53:32 wolruf Exp $ 
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

$html_preferences = '��駤��';
$html_full_name = '�������';
$html_email_address = '������';
$html_ccself = '����';
$html_hide_addresses = '��͹�������';
$html_outlook_quoting = '�ٻẺ Outlook';
$html_reply_to = '�ͺ��Ѻ�֧';
$html_use_signature = '������繵�';
$html_signature = '����繵�';
$html_prefs_updated = '��õ�駤�����Ѻ��ا����';

// Other pages

$html_view_header = '�ʴ���������´';
$html_remove_header = '��͹��������´';
$html_inbox = '���ͧ������';
$html_new_msg = '��¹������';
$html_reply = '�ͺ��Ѻ';
$html_reply_short = 'Re';
$html_reply_all = '�ͺ��Ѻ�ء��';
$html_forward = '�觵��';
$html_forward_short = 'Fw';
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
$html_kb = 'Kb';
$html_bytes = 'bytes';
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
$html_select = '���͡';
$html_select_all = '���͡������';
$html_loading_image = '���ѧ��Ŵ�Ҿ';
$html_send_confirmed = '�����·�ҹ��١�������';
$html_no_sendaction = '����ա�á�з��� ����ͧ�Դ����� JavaScript';
$html_error_occurred = '�Դ��ͼԴ��Ҵ���';
$html_prefs_file_error = '�������ö��駤����';
$html_sig_file_error = '�������ö������繵���';

$original_msg = '-- ��ͤ����鹩�Ѻ --';
$to_empty = 'The \'�֧\' ���������ҧ��� !';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = "�������ö�Դ�����";
$html_smtp_error_unexpected = "����ա�õͺʹͧ:";
?>