<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/ru.php,v 1.16 2002/11/29 07:04:58 rossigee Exp $ 
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
$html_on = '���.';
$html_theme = '������';

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

$html_view_header = '����������� ��������� ������';
$html_remove_header = '������ ��������� ������';
$html_inbox = '��������';
$html_new_msg = '��������';
$html_reply = '��������';
$html_reply_short = 'Re';
$html_reply_all = '�������� ����';
$html_forward = '���������';
$html_forward_short = 'Fw';
$html_delete = '�������';
$html_new = '�����';
$html_mark = '�������';
$html_att = '������������� ����';
$html_atts = '������������� �����';
$html_att_unknown = '[����������]';
$html_attach = '���������� ����';
$html_attach_forget = '�� ������ ���������� ���� �� �������� ���������!';
$html_attach_delete = '������� ���������';
$html_sort_by = 'Sort by';
$html_from = '��';
$html_subject = '����';
$html_date = '�����';
$html_sent = '���������';
$html_size = '������';
$html_totalsize = '����� ������';
$html_kb = 'Kb';
$html_bytes = 'bytes';
$html_filename = '��� �����';
$html_to = '����';
$html_cc = '�����';
$html_bcc = 'Bcc';
$html_nosubject = 'no subject';
$html_send = '���������';
$html_cancel = '��������';
$html_no_mail = '��������� ���';
$html_logout = '�����';
$html_msg = '���������';
$html_msgs = '���������';
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
$html_wrap = 'Wrap outgoing messages to :'; // to translate
$html_usenet_separator = 'Usenet separator ("-- \n") Before signature'; // to translate
// Contacts manager
$html_add = 'Add';
$html_contacts = 'Contacts';
$html_modify = 'Modify';
$html_back = 'Back';
$html_contact_add = 'Add new contact';
$html_contact_mod = 'Modify a contact';
$html_contact_first = 'First name';
$html_contact_last = 'Last Name';
$html_contact_nick = 'Nick';
$html_contact_mail = 'Mail';
$html_contact_list = 'Contact list of ';
$html_contact_del = 'of de contact list';

$html_contact_err1 = 'Maximal number of contact is ';
$html_contact_err2 = 'You can\'t add a new contact';
$html_del_msg = 'Delete selected messages ?'; // to translate
$html_down_mail = 'Download'; // to translate

$original_msg = '-- Original Message --';
$to_empty = '���� \'����\' �� ������ ���� ������ !';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = "Unable to open connection";
$html_smtp_error_unexpected = "Unexpected response:";
$lang_could_not_connect = 'Could not connect to server';  //to translate
$html_file_upload_attack = 'Possible file upload attack';  //to translate
$html_invalid_email_address = 'Invalid e-mail address';  //to translate
$html_seperate_msg_win = 'Messages in separate window';  //to translate
?>
