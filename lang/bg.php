<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/bg.php,v 1.15 2004/06/15 10:37:09 goddess_skuld Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the Bulgarian language
 * Translation by Evgeni Gechev <etg@setcom.bg>
 */

$charset = 'windows-1251';

// Configuration for the days and months

// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = 'bg_BG';

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
$default_time_format = '%H:%M';


// Here is the configuration for the HTML

$err_user_empty = 'Не е въведено име';
$err_passwd_empty = 'Не е въведена парола';


// html message

$alt_delete = 'Изтрий маркираните писма';
$alt_delete_one = 'Изтрий писмото';
$alt_new_msg = 'Нови писма';
$alt_reply = 'Отговори на автора';
$alt_reply_all = 'Отговори на всички';
$alt_forward = 'Препрати';
$alt_next = 'Следващо писмо';
$alt_prev = 'Предишно писмо';
$html_on = 'on';  //to translate
$html_theme = 'Дизайн';

// index.php

$html_lang = 'Език';
$html_welcome = 'Добре дошли!<br/>';
$html_login = 'Име';
$html_passwd = 'Парола';
$html_submit = 'Потвърждение';
$html_help = 'Помощ';
$html_server = 'Сървър';
$html_wrong = 'Името или паролата са грешни';
$html_retry = 'Опитай отново';

// prefs.php

$html_msgperpage = 'Messages per page';  //to translate
$html_preferences = 'Настройки';
$html_full_name = 'Име, Презиме, Фамилия';
$html_email_address = 'E-mail адрес';
$html_ccself = 'Копие към мен';
$html_hide_addresses = 'Скрий адресите';
$html_outlook_quoting = 'Outlook формат';
$html_reply_to = 'Отговори на';
$html_use_signature = 'Ползвай сигнатура';
$html_signature = 'Сигнатура';
$html_reply_leadin = 'Reply Leadin';  //to translate
$html_prefs_updated = 'Настройките са обновени';
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
$html_view_header = 'Покажи служ. информация';
$html_remove_header = 'Скрий служ. информация';
$html_inbox = 'Получени писма';
$html_new_msg = 'Изпрати писмо';
$html_reply = 'Отговори';
$html_reply_short = 'Отг.';
$html_reply_all = 'Отговори на всички';
$html_forward = 'Препрати';
$html_forward_short = 'Препр.';
$html_delete = 'Изтрий';
$html_new = 'Ново';
$html_mark = 'Маркирай';
$html_att = 'Прикачен файл';
$html_atts = 'Прикачени файлове';
$html_att_unknown = '[unknown]';  //to translate
$html_attach = 'Прикачи';
$html_attach_forget = 'Прикачи файла преди да изпратиш съобщението!';
$html_attach_delete = 'Изтрий прикачения файл';
$html_sort_by = 'Сортирай по';
$html_from = 'От';
$html_subject = 'Тема';
$html_date = 'Дата';
$html_sent = 'Изпратено';
$html_wrote = 'написа';
$html_size = 'Големина';
$html_totalsize = 'Общо';
$html_kb = 'КБ';
$html_bytes = 'байта';
$html_filename = 'име на файл';
$html_to = 'За';
$html_cc = 'Копие';
$html_bcc = 'Невидимо копие';
$html_nosubject = 'Без тема';
$html_send = 'Изпрати';
$html_cancel = 'Отказ';
$html_no_mail = 'Няма писма';
$html_logout = 'Изход';
$html_msg = 'Писмо';
$html_msgs = 'Писма';
$html_configuration = 'Сървърът не е конфигуриран!';
$html_priority = 'Приоритет';
$html_low = 'Нисък';
$html_normal = 'Нормален';
$html_high = 'Висок';
$html_receipt = 'Request a return receipt';  //to translate
$html_select = 'Маркирай';
$html_select_all = 'Маркирай всички';
$html_loading_image = 'Зареждане на картинка';
$html_send_confirmed = 'Писмото е прието';
$html_no_sendaction = 'Не е посочено действие. Опитай да разрешиш Javascript в браузера.';
$html_error_occurred = 'An error occurred';  //to translate
$html_prefs_file_error = 'Unable to open preferences file for writing.';  //to translate
$html_wrap = 'Wrap outgoing messages to :';  //to translate
$html_usenet_separator = 'Usenet separator ("-- \n") Before signature';  //to translate
$html_mark_read = 'Mark as read'; //to translate
$html_mark_unread = 'Mark as unread'; //to translate

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

$original_msg = '-- Оригинално писмо --';
$to_empty = 'Полето \'За\' не трябва да е празно !';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'Грешка! Не може да бъда осъществена връзка със сървъра ';
$html_smtp_error_unexpected = 'Грешка! Непознат отговор от сървъра:';

// IMAP messages (class_local.php)
$lang_could_not_connect = 'Could not connect to server';  //to translate

$html_file_upload_attack = 'Possible file upload attack';  //to translate
$html_invalid_email_address = 'Invalid e-mail address';  //to translate
$html_seperate_msg_win = 'Messages in separate window';  //to translate
?>
