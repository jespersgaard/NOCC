<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/he.php,v 1.6 2002/04/24 23:32:25 rossigee Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the hebrew language
 * By Tzafrir Cohen <tzafrir@technion.ac.il>
 */

// While it could be claimed that using UTF-8 is the Right Thing , it is still
// not common enough. ISO-8859-8 can be read basically anywhere. This is not 
// the case with UTF-8 .
$charset = 'ISO-8859-8-i';

// Configuration for the days and months

// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = 'he';

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

$err_user_empty = '��� �� ������ ���';
$err_passwd_empty = '��� ������ ���';


// html message

$alt_delete = '����� ������� ��������';
$alt_delete_one = '����� ������';
$alt_new_msg = '����� ����';
$alt_reply = '�����';
$alt_reply_all = '����� ���';
$alt_forward = '�����';
$alt_next = '������ ����';
$alt_prev = '������� �����';
$html_on = '����';
$html_theme = 'Theme';

// index.php

$html_lang = '���';
$html_welcome = '������ �����';
$html_login = '�� ������';
$html_passwd = '�����';
$html_submit = '�������';
$html_help = '����';
$html_server = '���';
$html_wrong = '�� ������ �� ������ ������';
$html_retry = '����� ����';

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

$html_view_header = '���� ������';
$html_remove_header = '����� ������';
$html_inbox = '���� �����';
$html_new_msg = '�����';
$html_reply = '�����';
# please leave 'Re' and 'Fwd' as they are, otherwise they mess the subject line
# [tzafrir]
$html_reply_short = 'Re';
$html_reply_all = '����� ���';
$html_forward = '�����';
$html_forward_short = 'Fw';
$html_delete = '�����';
$html_new = '���';
$html_mark = '�����';
$html_att = '����� ����';
$html_atts = '�������';
$html_att_unknown = '[�� ����]';
$html_attach = '�����';
$html_attach_forget = '������ ���� ���� ���� ����� ������!';
$html_attach_delete = '����� ��������';
$html_sort_by = 'Sort by';
$html_from = '���';
$html_subject = '����';
$html_date = '�����';
$html_sent = 'Send';
$html_size = '����';
$html_totalsize = '��\' ����';
$html_kb = '�\'�';
$html_bytes = '����';
$html_filename = '�� �����';
$html_to = '��';
$html_cc = '����';
$html_bcc = 'Bcc';
$html_nosubject = '[��� ����]';
$html_send = '�����';
$html_cancel = '�����';
$html_no_mail = 'No message.';
$html_logout = '�����';
$html_msg = '�����';
$html_msgs = '������';
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

# I think some people will rather leave this one untranslated as well...
#$original_msg = '-- Original Message --';
$original_msg = '-- ����� ������ --';
$to_empty = '���� �-\'��\' ���� ����� ���!';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = "Unable to open connection";
$html_smtp_error_unexpected = "Unexpected response:";
$lang_could_not_connect = 'Could not connect to server';  //to translate
$html_file_upload_attack = 'Possible file upload attack';  //to translate
$html_invalid_email_address = 'Invalid e-mail address';  //to translate
?>
