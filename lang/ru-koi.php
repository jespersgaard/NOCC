<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/ru-koi.php,v 1.13 2003/02/11 11:34:03 rossigee Exp $
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

$err_user_empty = 'Не введен логин';
$err_passwd_empty = 'Не введен пароль';


// html message

$alt_delete = 'Удалить выбранные сообщения';
$alt_delete_one = 'Удалить сообщение';
$alt_new_msg = 'Новые сообщения';
$alt_reply = 'Ответить автору';
$alt_reply_all = 'Ответить всем';
$alt_forward = 'Переслать';
$alt_next = 'Следующее';
$alt_prev = 'Предыдущее';


// index.php

$html_lang = 'Язык';
$html_welcome = 'Добро пожаловать в';
$html_login = 'Имя';
$html_passwd = 'Пароль';
$html_submit = 'Войти';
$html_help = 'Помощь';
$html_server = 'Сервер';
$html_wrong = 'Логин или пароль не верны';
$html_retry = 'Вернуться';
$html_on = 'Вкл.';
$html_theme = 'Дизайн';

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
$html_prefs_file_error = 'Unable to open preferences file for writing.';
$html_sig_file_error = 'Unable to open signature file for writing.';

// Other pages

$html_view_header = 'Просмотреть заголовок письма';
$html_remove_header = 'Убрать заголовок письма';
$html_inbox = 'Входящие';
$html_new_msg = 'Написать';
$html_reply = 'Ответить';
$html_reply_short = 'Re';
$html_reply_all = 'Ответить всем';
$html_forward = 'Переслать';
$html_forward_short = 'Fw';
$html_delete = 'Удалить';
$html_new = 'Новое';
$html_mark = 'Удалить';
$html_att = 'Прикрепленный файл';
$html_atts = 'Прикрепленные файлы';
$html_att_unknown = '[неизвестно]';
$html_attach = 'Прикрепить файл';
$html_attach_forget = 'Вы должны прикрепить файл до отправки сообщения!';
$html_attach_delete = 'Удалить выбранные';
$html_sort_by = 'Sort by';
$html_from = 'От';
$html_subject = 'Тема';
$html_date = 'Время';
$html_sent = 'Отправить';
$html_size = 'Размер';
$html_totalsize = 'Общий размер';
$html_kb = 'Кбайт';
$html_bytes = 'байт';
$html_filename = 'Имя файла';
$html_to = 'Кому';
$html_cc = 'Копия';
$html_bcc = 'Bcc';
$html_nosubject = 'no subject';
$html_send = 'Отправить';
$html_cancel = 'Отменить';
$html_no_mail = 'Сообщений нет';
$html_logout = 'Выйти';
$html_msg = 'Сообщение';
$html_msgs = 'Сообщений';
$html_configuration = 'Сей сервер плохо настроен!';
$html_priority = 'Приоритет';
$html_low = 'низкий';
$html_normal = 'обычный';
$html_high = 'высокий';
$html_select = 'Выбрать';
$html_select_all = 'Выбрать все';
$html_loading_image = 'Загрузка картинки';
$html_send_confirmed = 'Сообщение принято к доставке';
$html_no_sendaction = 'Не задано действие. Попробуйте включить Javascript.';
$html_error_occurred = 'Произошла ошибка.';
$html_receipt = 'Запросить подтверждение получения';
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
$to_empty = 'Поле \'Кому\' не должно быть пустым !';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'Невозможно открыть соединение';
$html_smtp_error_unexpected = 'Странный ответ сервера:';
$lang_could_not_connect = 'Не могу подключится к серверу';  //to translate
$html_file_upload_attack = 'Подозрение на атаку через file upload';  //to translate
$html_invalid_email_address = 'Неправильный e-mail адрес';  //to translate
$html_seperate_msg_win = 'Сообщения в отдельном окне';  //to translate
$html_msgperpage = 'Сообщений на страницу';
$html_reply_leadin = 'Заголовок ответа';
$html_manage_folders_link = 'Настройка папок IMAP';
$html_manage_filters_link = 'Настройка фильтров';
$html_folders_create_failed = 'Невозможно создать папку!';
$html_folders_sub_failed = 'Нельзя подписаться на папку!';
$html_folders_unsub_failed = 'Нельзя отписаться от папки!';
$html_folders_rename_failed = 'Папка не может быть переименована!';
$html_folders_updated = 'Папки обновлены';
$html_folder_subscribe = 'Подписаться на';
$html_folder_rename = 'Переименовать';
$html_folder_create = 'Создать новую папку';
$html_folder_remove = 'Отписаться от';
$html_filter_remove = 'Удалить';
$html_filter_body = 'Тело сообщения';
$html_filter_subject = 'Тема';
$html_filter_to = 'Кому';
$html_filter_cc = 'Копия';
$html_filter_from = 'Автор';
$html_filter_change_tip = 'Для изменения фильтра попросту перепишите его.';
$html_reapply_filters = 'Отфильтровать';
$html_select_one = '--Выберите--';
$html_and = 'И';
$html_new_msg_in = 'Новые сообщения в';
$html_or = 'или';
$html_move = 'Переместить';
$html_copy = 'Скопировать';
$html_messages_to = 'выбранные сообщения в';
$html_gotofolder = 'Перейти к папке';
$html_other_folders = 'Список папок';
$html_wrote = '(на)писал';

$html_gotopage = 'Перейти';
$html_page = 'Страница';
$html_of = 'из';

?>
