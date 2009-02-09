<?php
/**
 * Configuration file for the Russian language
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * This file is part of NOCC. NOCC is free software under the terms of the
 * GNU General Public License. You should have received a copy of the license
 * along with NOCC.  If not, see <http://www.gnu.org/licenses/>.
 *
 * Translators:
 * - Sergey Frolovithev <serg@spylog.ru>
 * - Anton Jakimov <t0xa@ls2.lv>
 *
 * @package    NOCC
 * @subpackage Translations
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @version    SVN: $Id$
 */

$charset = 'UTF-8';

// Configuration for the days and months

// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = 'ru_RU.UTF-8';

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
$alt_next = 'Next'; //to translate
$alt_prev = 'Previous'; //to translate
$title_next_page = 'Next page'; //to translate
$title_prev_page = 'Previous page'; //to translate
$title_next_msg = 'Следующее';
$title_prev_msg = 'Предыдущее';
$html_on = 'Вкл.';
$html_theme = 'Дизайн';

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
$html_remember = "Remember settings"; //to translate

// prefs.php
$html_msgperpage = 'Писем на странице';
$html_preferences = 'Настройки';
$html_full_name = 'Имя';
$html_email_address = 'Адрес электронной почты';
$html_ccself = 'Копию себе';
$html_hide_addresses = 'Спрятать адрес';
$html_outlook_quoting = 'Цитирование в стиле Outlook';
$html_reply_to = 'Ответить';
$html_use_signature = 'Использовать подпись';
$html_signature = 'Подпись';
$html_reply_leadin = 'Reply Leadin'; //to translate
$html_prefs_updated = 'Настройки сохранены';
$html_manage_folders_link = 'Управление папками IMAP';
$html_manage_filters_link = 'Управление почтовыми фильтрами';
$html_use_graphical_smilies = 'Использовать графические смайлики';
$html_sent_folder = 'Copy sent mails into a dedicated folder'; //to translate
$html_trash_folder = 'Move deleted mails into a dedicated folder'; // to translate
$html_colored_quotes = 'Colored quotes'; //to translate
$html_display_struct = 'Display structured text'; //to translate
$html_send_html_mail = 'Send mail in HTML format'; //to translate

// folders.php
$html_folders = 'Folders';  //to translate
$html_folders_create_failed = 'Папка не может быть создана!';
$html_folders_sub_failed = 'Невозможно подписаться на папку!';
$html_folders_unsub_failed = 'Невозможно отписаться от папки!';
$html_folders_rename_failed = 'Папка не может быть переименована!';
$html_folders_updated = 'Папки сохранены';
$html_folder_subscribe = 'Подписаться на';
$html_folder_rename = 'Переименовать';
$html_folder_create = 'Создать новую папку с именем';
$html_folder_remove = 'Отписаться от';
$html_folder_delete = 'Удалить';
$html_folder_to = 'до';

// filters.php
$html_filter_remove = 'Удалить';
$html_filter_body = 'Тело письма';
$html_filter_subject = 'Тема';
$html_filter_to = 'Поле Кому';
$html_filter_cc = 'Поле Копия';
$html_filter_from = 'Поле От';
$html_filter_change_tip = 'Для замены, просто перезапешите фильтр.';
$html_reapply_filters = 'Переприменить все фильтры';
$html_filter_contains = 'содержит';
$html_filter_name = 'Название фильтра';
$html_filter_action = 'Действие фильтра';
$html_filter_moveto = 'Переместить в';

// Other pages
$html_select_one = '--выберите одно--';
$html_and = 'и';
$html_new_msg_in = 'Новые сообщения в';
$html_or = 'или';
$html_move = 'Переместить';
$html_copy = 'Копировать';
$html_messages_to = 'выбранные письма в';
$html_gotopage = 'Перейти на страницу';
$html_gotofolder = 'Перейти в папку';
$html_other_folders = 'Список папок';
$html_page = 'Страница';
$html_of = 'из';
$html_view_header = 'Просмотреть заголовок письма';
$html_remove_header = 'Убрать заголовок письма';
$html_inbox = 'Входящие';
$html_new_msg = 'Написать';
$html_reply = 'Ответить';
$html_reply_short = 'Re';  //to translate
$html_reply_all = 'Ответить всем';
$html_forward = 'Переслать';
$html_forward_short = 'Fw';  //to translate
$html_delete = 'Удалить';
$html_new = 'Новое';
$html_mark = 'Удалить';
$html_att = 'Прикрепленный файл';
$html_atts = 'Прикрепленные файлы';
$html_att_unknown = '[неизвестно]';
$html_attach = 'Прикрепить файл';
$html_attach_forget = 'Вы должны прикрепить файл до отправки сообщения!';
$html_attach_delete = 'Удалить выбранные';
$html_sort_by = 'Сортировать по';
$html_sort = 'Сортировать';
$html_from = 'От';
$html_subject = 'Тема';
$html_date = 'Время';
$html_sent = 'Отправить';
$html_wrote = 'Написал(а)';
$html_size = 'Размер';
$html_totalsize = 'Общий размер';
$html_kb = 'КБ';
$html_mb = 'MB'; //to translate
$html_gb = 'GB'; //to translate
$html_bytes = 'Б';
$html_filename = 'Имя файла';
$html_to = 'Кому';
$html_cc = 'Копия';
$html_bcc = 'Bcc';  //to translate
$html_nosubject = 'Нет темы';
$html_send = 'Отправить';
$html_cancel = 'Отменить';
$html_no_mail = 'Сообщений нет';
$html_logout = 'Выйти';
$html_msg = 'Сообщение';
$html_msgs = 'Сообщений';
$html_configuration = 'Этот сервер некоррекно установлен!';
$html_priority = 'Приоритет';
$html_lowest = 'Lowest';  //to translate
$html_low = 'Низкий';
$html_normal = 'Нормальный';
$html_high = 'Высокий';
$html_highest = 'Highest';  //to translate
$html_receipt = 'Запросить уведомление о прочтении';
$html_select = 'Выбрать';
$html_select_all = 'Инвертировать выбор';
$html_loading_image = 'Загрузка изображения';
$html_send_confirmed = 'Ваша почта принята к отправлению';
$html_no_sendaction = 'Не указано действие. Попробуйте включить JavaScript.';
$html_error_occurred = 'Произошла ошибка';
$html_prefs_file_error = 'Файл настроек не может быть открыт для записи.';
$html_wrap = 'Ширина строки (в символах):';
$html_wrap_none = 'None'; //to translate
$html_usenet_separator = 'Разделитель в стиле Usenet ("-- \n") перед подписью';
$html_mark_as = 'Пометить как';
$html_read = 'прочитанное';
$html_unread = 'непрочитанное';
$html_encoding = 'Character encoding'; // to translate

// Contacts manager
$html_add = 'Add'; //to translate
$html_contacts = 'Контакты';
$html_modify = 'Изменить';
$html_back = 'Назад';
$html_contact_add = 'Добавить контакт';
$html_contact_mod = 'Изменить контакт';
$html_contact_first = 'Имя';
$html_contact_last = 'Фамилия';
$html_contact_nick = 'Псевдоним';
$html_contact_mail = 'Адрес электронной почты';
$html_contact_list = 'Список контактов ';
$html_contact_del = 'из контактного листа';

$html_contact_err1 = 'Максимальное число контактов ';
$html_contact_err2 = 'Вы не можете добавить новый контакт';
$html_contact_err3 = 'У вас нет прав доступа к контактному листу';
$html_del_msg = 'Стереть выбранные письма?';
$html_down_mail = 'Загрузить';

$original_msg = '-- Исходное письмо --';
$to_empty = 'Поле \'Кому\' не должно быть пустым !';

// Images warning
$html_images_warning = 'For your security, remote pictures are not displayed.'; // to translate
$html_images_display = 'Display pictures'; // to translate

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'Не возможно установить SMTP соединение';
$html_smtp_error_unexpected = 'Неожиданный ответ SMTP:';

// IMAP messages (class_local.php)
$lang_could_not_connect = 'Невозможно подключиться к серверу';

$html_file_upload_attack = 'Возможная аттака с помощью загрузки файла';
$html_invalid_email_address = 'Неверный адрес электронной почты';
$html_invalid_msg_per_page = 'Неверное количество писем на странице';
$html_invalid_wrap_msg = 'Неверная ширина строки строки (в символах)';
$html_seperate_msg_win = 'Сообщение в отдельном окне';

// Exceptions
$html_err_file_contacts = 'Файл контактов не может быть открыт для записи.';
$html_session_file_error = 'Unable to open session file for writing.';  //to translate
$html_login_not_allowed = 'This login is not allowed for connexion.'; //to translate

// Send delay
$lang_err_send_delay = 'You must wait between two mails'; // to translate
$lang_seconds = 'seconds'; // to translate
?>