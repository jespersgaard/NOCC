<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/pl.php,v 1.59 2006/10/09 08:05:23 goddess_skuld Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the Polish language
 * Translation by Ryszard Janiszewski <dex7@akacje.net>
 *            and Tomasz Mateja <tommat@pimpek.one.pl>
 */

$charset = 'UTF-8';

// Configuration for the days and months

// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = 'pl_PL.UTF-8';

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
$default_time_format = '%H:%M';


// Here is the configuration for the HTML

$err_user_empty = 'Proszę wpisać nazwę użytkownika';
$err_passwd_empty = 'Proszę wpisać hasło';


// html message

$alt_delete = 'Skasuj zaznaczone wiadomości';
$alt_delete_one = 'Skasuj wiadomość';
$alt_new_msg = 'Nowa wiadomość';
$alt_reply = 'Odpowiedz autorowi';
$alt_reply_all = 'Odpowiedz wszystkim';
$alt_forward = 'Prześlij dalej';
$alt_next = 'Next'; //to translate
$alt_prev = 'Previous'; //to translate
$title_next_page = 'Next page'; //to translate
$title_prev_page = 'Previous page'; //to translate
$title_next_msg = 'Następna wiadomość';
$title_prev_msg = 'Poprzednia wiadomość';
$html_on = 'Włączone';
$html_theme = 'Wygląd';

// index.php

$html_lang = 'Język';
$html_welcome = 'Witaj w';
$html_login = 'Nazwa konta';
$html_passwd = 'Hasło';
$html_submit = 'OK';
$html_help = 'Pomoc';
$html_server = 'Serwer';
$html_wrong = 'Nazwa konta lub hasło jest niepoprawne';
$html_retry = 'Ponów';
$html_remember = "Zapamiętaj ustawienia";

// prefs.php

$html_msgperpage = 'Wiadomości na stronie';
$html_preferences = 'Ustawienia';
$html_full_name = 'Nazwa wyświetlana';
$html_email_address = 'Adres email';
$html_ccself = 'Wysyłaj kopie wiadomości do siebie';
$html_hide_addresses = 'Nie pokazuj adresów email';
$html_outlook_quoting = 'Cytowanie a\'la Outlook';
$html_reply_to = 'Odpisuj na adres';
$html_use_signature = 'Używaj podpisu';
$html_signature = 'Podpis';
$html_reply_leadin = 'Nagłówek odpowiedzi';
$html_prefs_updated = 'Zapisano nowe ustawienia';
$html_manage_folders_link = 'Zarządzaj Folderami IMAP';
$html_manage_filters_link = 'Reguły wiadomości';
$html_use_graphical_smilies = 'Używaj emotikon';
$html_sent_folder = 'Kopiuj wysłane wiadomości do wyznaczonego folderu';
$html_colored_quotes = 'Colored quotes'; //to translate
$html_display_struct = 'Display structured text'; //to translate

// folders.php
$html_folders_create_failed = 'Nie można uworzyć folderu!';
$html_folders_sub_failed = 'Nie można dołączyć folderu!';
$html_folders_unsub_failed = 'Nie można odłączyć folderu!';
$html_folders_rename_failed = 'Nie można zmienić nazwy folderu!';
$html_folders_updated = 'Zaktualizowano foldery';
$html_folder_subscribe = 'Dołącz';
$html_folder_rename = 'Zmień nazwę';
$html_folder_create = 'Stwórz nowy folder o nazwie';
$html_folder_remove = 'Odłącz folder';
$html_folder_delete = 'Skasuj';
$html_folder_to = 'do';

// filters.php
$html_filter_remove = 'Skasuj';
$html_filter_body = 'Treść Wiadomości';
$html_filter_subject = 'Temat Wiadomości';
$html_filter_to = 'Pole \'Do\'';
$html_filter_cc = 'Pole \'DW\'';
$html_filter_from = 'Pole \'Od\'';
$html_filter_change_tip = 'Żeby zmienić filtr poprostu go nadpisz.';
$html_reapply_filters = 'Ponownie zastosuj wszystkie filtry';
$html_filter_contains = 'zawiera';
$html_filter_name = 'Nazwa Filtru';
$html_filter_action = 'Akcja';
$html_filter_moveto = 'Przenieś do';

// Other pages
$html_select_one = '--Wybierz Jeden--';
$html_and = 'i';
$html_new_msg_in = 'Nowe wiadomości w';
$html_or = 'lub';
$html_move = 'Przenieś';
$html_copy = 'Skopiuj';
$html_messages_to = 'zaznaczone wiadomości do';
$html_gotopage = 'Przejdź do strony';
$html_gotofolder = 'Przejdź do Folderu';
$html_other_folders = 'Lista Folderów';
$html_page = 'Strona';
$html_of = 'z';
$html_view_header = 'Zobacz nagłówek';
$html_remove_header = 'Schowaj nagłówek';
$html_inbox = 'Skrzynka odbiorcza';
$html_new_msg = 'Nowa wiadomość';
$html_reply = 'Odpowiedz';
$html_reply_short = 'ODP';
$html_reply_all = 'Odpowiedz wszystkim';
$html_forward = 'Prześlij dalej';
$html_forward_short = 'PD';
$html_forward_info = 'Przesłana dalej wiadomość będzie wysłana jako załącznik.';
$html_delete = 'Skasuj';
$html_new = 'Nowe';
$html_mark = 'Zaznacz';
$html_att = 'Załącznik';
$html_atts = 'Załączniki';
$html_att_unknown = '[nieznany]';
$html_attach = 'Dołącz';
$html_attach_forget = 'Zanim wyślesz wiadomość musisz dołaczyć załącznik(i)!';
$html_attach_delete = 'Skasuj zaznaczone';
$html_attach_none = 'Musisz zaznaczyć plik do wysłania!';
$html_sort_by = 'Sortuj według';
$html_sort = 'Sortuj';
$html_from = 'Nadawca';
$html_subject = 'Temat';
$html_date = 'Data';
$html_sent = 'Wyślij';
$html_wrote = 'napisał(a)';
$html_size = 'Rozmiar';
$html_totalsize = 'Rozmiar';
$html_kb = 'kB'; //to translate
$html_bytes = 'bajtów';
$html_filename = 'Nazwa pliku';
$html_to = 'Do';
$html_cc = 'DW';
$html_bcc = 'UDW';
$html_nosubject = 'Bez tematu';
$html_send = 'Wyślij';
$html_cancel = 'Anuluj';
$html_no_mail = 'Brak wiadomości.';
$html_logout = 'Wyloguj się';
$html_msg = 'Wiadomość';
$html_msgs = 'Wiadomości';
$html_configuration = 'Serwer nie został prawidłowo skonfigurowany!';
$html_priority = 'Ważność';
$html_low = 'Niska';
$html_normal = 'Normalna';
$html_high = 'Wysoka';
$html_receipt = 'Zażądaj potwierdzenia otrzymania wiadomości';
$html_select = 'Zaznacz';
$html_select_all = 'Odwróć zaznaczenie';
$html_loading_image = 'Ładowanie obrazka';
$html_send_confirmed = 'Twoja wiadomość została wysłana';
$html_no_sendaction = 'Nie określona akcja. Spróbuj włączyć Javascript.';
$html_error_occurred = 'Wystąpił błąd';
$html_prefs_file_error = 'Nie można otworzyć pliku z ustawieniami do zapisu.';
$html_wrap = 'Zawijaj linie w poczcie wychodzącej do długości (znaków):';
$html_wrap_none = 'Nie zawijaj';
$html_usenet_separator = 'Użyj separatora ("-- \n") Przed sygnaturą';
$html_mark_as = 'Zaznacz jako';
$html_read = 'Przeczytane';
$html_unread = 'Nie przeczytane';
$html_mail_sent = 'Wiadomość została wysłana';
$html_encoding = 'Kodowanie znaków';

// Contacts manager
$html_add = 'Dodaj';
$html_contacts = 'Kontakty';
$html_modify = 'Zmień';
$html_back = 'Cofnij';
$html_contact_add = 'Dodaj nowy kontakt';
$html_contact_mod = 'Zmień kontakt';
$html_contact_first = 'Imię';
$html_contact_last = 'Nazwisko';
$html_contact_nick = 'Nick';
$html_contact_mail = 'Adres e-mail';
$html_contact_list = 'Lista kontaktów użytkownika ';
$html_contact_del = 'z listy kontaktów';

$html_contact_err1 = 'Maksymalna liczba kontaktów to ';
$html_contact_err2 = 'Nie możesz dodać nowego kontaktu';
$html_contact_err3 = 'Nie posiadasz uprawnień do listy kontaktów.';
$html_del_msg = 'Usunąć zaznaczone wiadomości?';
$html_down_mail = 'Pobierz';

$original_msg = '--- Wiadomość oryginalna ---';
$to_empty = 'Pole \'Do\' nie może być puste!';

// Images warning
$html_images_warning = 'Dla twojego bezpieczeństwa, zdalne obrazy nie są wyświetlane.';
$html_images_display = 'Wyświetl obrazy';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'Nie można utworzyć połączenia SMTP';
$html_smtp_error_unexpected = 'Nieoczekiwana odpowiedź SMTP';

// IMAP messages (class_local.php)
$lang_could_not_connect = 'Nie można połaczyć się z serwerem';
$lang_invalid_msg_num = 'Zły numer wiadomości';

$html_file_upload_attack = 'Możliwy atak poprzez upload plików';
$html_invalid_email_address = 'Niewłaściwy adres e-mail';
$html_invalid_msg_per_page = 'Niepoprawna ilość wiadomości na stronę';
$html_invalid_wrap_msg =  'Niepoprawna szerokoć zawijania linii';
$html_seperate_msg_win = 'Wiadomości w osobnym oknie';

// Exceptions
$html_err_file_contacts = 'Brak dostępu do zapisu listy kontaktów.';
$html_session_file_error = 'Unable to open session file for writing.';  //to translate
?>
