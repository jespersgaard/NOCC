<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/ruwin.php,v 1.21 2001/03/01 22:35 nicocha Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the Russian (iso-8859-5) language
 * Translation by Anton Jakimov <t0xa@ls2.lv>
 */

$charset = "iso-8859-5";

// Configuration for the days and months

// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = "ru_RU";

// What format string should we pass to strftime() for messages sent on
// days other than today?
$default_date_format = "%d.%m.%y";

// If the local is not implemented on the host, how we display the date
$no_locale_date_format = "%d.%m.%Y";

// What format string should we pass to strftime() for messages sent
// today?
$default_time_format = "%H:%M";


// Here is the configuration for the HTML

$err_user_empty = "Доступ ограничен.Вы заполнили не все поля";
$err_passwd_empty = "Доступ ограничен.Вы заполнили не все поля";


// html message

$alt_delete = "Удалить выбранные сообщения";
$alt_delete_one = "Удалить сообщение";
$alt_new_msg = "Новые сообщения";
$alt_reply = "Ответить автору";
$alt_reply_all = "Ответить всем";
$alt_forward = "Переслать";
$alt_next = "След.";
$alt_prev = "Пред.";


// index.php

$html_lang = "Язык";
$html_welcome = "Добро пожаловать ";
$html_login = "Имя пользователя";
$html_passwd = "Пароль";
$html_submit = "Вход";
$html_help = "Помощь";
$html_server = "Сервер";
$html_wrong = "Логин или пароль неверен";
$html_retry = "Еще раз";
$html_on = "on";
$html_theme = "Theme";

// Other pages

$html_view_header = "Посмотреть заголовок";
$html_remove_header = "Спрятать заголовок";
$html_inbox = "Входящие";
$html_new_msg = "Написать";
$html_reply = "Ответить";
$html_reply_short = "Re";
$html_reply_all = "Ответить всем";
$html_forward = "Переслать";
$html_forward_short = "Fw";
$html_delete = "Удалить";
$html_new = "Новое";
$html_mark = "Удалить";
$html_att = "Приложение";
$html_atts = "Приложения";
$html_att_unknown = "[неизвестное]";
$html_attach = "Приложение";
$html_attach_forget = "Вы должны добавить приложение перед тем как отсылать письмо !";
$html_attach_delete = "Удалить отмеченные";
$html_from = "От";
$html_subject = "Тема";
$html_date = "Дата";
$html_sent = "Отправить";
$html_size = "Размер";
$html_totalsize = "Общий размер";
$html_kb = "Kb";
$html_bytes = "bytes";
$html_filename = "Filename";
$html_to = "Кому";
$html_cc = "Cc";
$html_bcc = "Bcc";
$html_nosubject = "No subject";
$html_send = "Отправить";
$html_cancel = "Отмена";
$html_no_mail = "Нет сообщений.";
$html_logout = "Выход";
$html_msg = "Сообщение";
$html_msgs = "Сообщения";

$original_msg = "-- Original Message --";
$to_empty = "Поле \"Кому\" не должно быть пустым !";
?>