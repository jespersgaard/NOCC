<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/pl.php,v 1.39 2004/07/07 21:18:22 ajetam Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the Polish language
 * Translation by Ryszard Janiszewski <dex7@akacje.net> 
 */

$charset = 'ISO-8859-2';

// Configuration for the days and months

// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = 'pl';

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

$err_user_empty = 'Proszê wpisaæ nazwê u¿ytkownika';
$err_passwd_empty = 'Proszê wpisaæ has³o';


// html message

$alt_delete = 'Skasuj zaznaczone wiadomo¶ci';
$alt_delete_one = 'Skasuj wiadomo¶æ';
$alt_new_msg = 'Nowa wiadomo¶æ';
$alt_reply = 'Odpowiedz autorowi';
$alt_reply_all = 'Odpowiedz wszystkim';
$alt_forward = 'Prze¶lij dalej';
$alt_next = 'Nastêpna wiadomo¶æ';
$alt_prev = 'Poprzednia wiadomo¶æ';
$html_on = 'W³±czone';
$html_theme = 'Wygl±d';

// index.php

$html_lang = 'Jêzyk';
$html_welcome = 'Witaj w';
$html_login = 'Nazwa konta';
$html_passwd = 'Has³o';
$html_submit = 'OK';
$html_help = 'Pomoc';
$html_server = 'Serwer';
$html_wrong = 'Nazwa konta lub has³o jest niepoprawne';
$html_retry = 'Ponów';

// prefs.php

$html_msgperpage = 'Wiadomo¶ci na stronie';
$html_preferences = 'Ustawienia';
$html_full_name = 'Nazwa wy¶wietlana';
$html_email_address = 'Adres email';
$html_ccself = 'Wysy³aj kopie wiadomo¶ci do siebie';
$html_hide_addresses = 'Nie pokazuj adresów email';
$html_outlook_quoting = 'Cytowanie a\'la Outlook';
$html_reply_to = 'Odpisuj na adres';
$html_use_signature = 'U¿ywaj podpisu';
$html_signature = 'Podpis';
$html_reply_leadin = 'Nag³ówek odpowiedzi';
$html_prefs_updated = 'Zapisano nowe ustawienia';
$html_manage_folders_link = 'Zarz±dzaj Folderami IMAP';
$html_manage_filters_link = 'Regu³y wiadomo¶ci';
$html_use_graphical_smilies = 'U¿ywaj emotikon';

// folders.php
$html_folders_create_failed = 'Nie mo¿na uworzyæ folderu!';
$html_folders_sub_failed = 'Nie mo¿na do³±czyæ folderu!';
$html_folders_unsub_failed = 'Nie mo¿na od³±czyæ folderu!';
$html_folders_rename_failed = 'Nie mo¿na zmieniæ nazwy folderu!';
$html_folders_updated = 'Zaktualizowano foldery';
$html_folder_subscribe = 'Do³±cz';
$html_folder_rename = 'Zmieñ nazwê';
$html_folder_create = 'Stwórz nowy folder o nazwie';
$html_folder_remove = 'Od³±cz folder';
$html_folder_delete = 'Skasuj';

// filters.php
$html_filter_remove = 'Skasuj';
$html_filter_body = 'Tre¶æ Wiadomo¶ci';
$html_filter_subject = 'Temat Wiadomo¶ci';
$html_filter_to = 'Pole \'Do\'';
$html_filter_cc = 'Pole \'DW\'';
$html_filter_from = 'Pole \'Od\'';
$html_filter_change_tip = '¯eby zmieniæ filtr poprostu go nadpisz.';
$html_reapply_filters = 'Ponownie zastosuj wszystkie filtry';
$html_filter_contains = 'zawiera';
$html_filter_name = 'Nazwa Filtru';
$html_filter_action = 'Akcja';
$html_filter_moveto = 'Przenie¶ do';

// Other pages
$html_select_one = '--Wybierz Jeden--';
$html_and = 'i';
$html_new_msg_in = 'Nowe wiadomo¶ci w';
$html_or = 'lub';
$html_move = 'Przenie¶';
$html_copy = 'Skopiuj';
$html_messages_to = 'zaznaczone wiadomo¶ci do';
$html_gotopage = 'Przejd¼ do strony';
$html_gotofolder = 'Przejd¼ do Folderu';
$html_other_folders = 'Lista Folderów';
$html_page = 'Strona';
$html_of = 'z';
$html_to = 'do';
$html_view_header = 'Zobacz nag³ówek';
$html_remove_header = 'Schowaj nag³ówek';
$html_inbox = 'Skrzynka odbiorcza';
$html_new_msg = 'Nowa wiadomo¶æ';
$html_reply = 'Odpowiedz';
$html_reply_short = 'ODP';
$html_reply_all = 'Odpowiedz wszystkim';
$html_forward = 'Prze¶lij dalej';
$html_forward_short = 'PD';
$html_forward_info = 'The forwarded message will be send as an attachment to this one.'; //to translate
$html_delete = 'Skasuj';
$html_new = 'Nowe';
$html_mark = 'Zaznacz';
$html_att = 'Za³±cznik';
$html_atts = 'Za³±czniki';
$html_att_unknown = '[nieznany]';
$html_attach = 'Do³±cz';
$html_attach_forget = 'Zanim wy¶lesz wiadomo¶æ musisz do³aczyæ za³±cznik(i)!';
$html_attach_delete = 'Skasuj zaznaczone';
$html_sort_by = 'Sortuj wed³ug';
$html_from = 'Nadawca';
$html_subject = 'Temat';
$html_date = 'Data';
$html_sent = 'Wy¶lij';
$html_wrote = 'napisa³(a)';
$html_size = 'Rozmiar';
$html_totalsize = 'Rozmiar';
$html_kb = 'Kb';
$html_bytes = 'bajtów';
$html_filename = 'Nazwa pliku';
$html_to = 'Do';
$html_cc = 'DW';
$html_bcc = 'UDW';
$html_nosubject = 'Bez tematu';
$html_send = 'Wy¶lij';
$html_cancel = 'Anuluj';
$html_no_mail = 'Brak wiadomo¶ci.';
$html_logout = 'Wyloguj siê';
$html_msg = 'Wiadomo¶æ';
$html_msgs = 'Wiadomo¶ci';
$html_configuration = 'Serwer nie zosta³ prawid³owo skonfigurowany!';
$html_priority = 'Wa¿no¶æ';
$html_low = 'Niska';
$html_normal = 'Normalna';
$html_high = 'Wysoka';
$html_receipt = 'Za¿±daj potwierdzenia otrzymania wiadomo¶ci';
$html_select = 'Zaznacz';
$html_select_all = 'Odwróæ zaznaczenie';
$html_loading_image = '£adowanie obrazka';
$html_send_confirmed = 'Twoja wiadomo¶æ zosta³a wys³ana';
$html_no_sendaction = 'Nie okre¶lona akcja. Spróbuj w³±czyæ Javascript.';
$html_error_occurred = 'Wyst±pi³ b³±d';
$html_prefs_file_error = 'Nie mo¿na otworzyæ pliku z ustawieniami do zapisu.';
$html_wrap = 'Zawijaj linie w poczcie wychodz±cej do d³ugo¶ci (znaków):';
$html_usenet_separator = 'U¿yj separatora ("-- \n") Przed sygnatur±';
$html_mark_as = 'Zaznacz jako';
$html_read = 'Przeczytane';
$html_unread = 'Nie przeczytane';

// Contacts manager
$html_add = 'Dodaj';
$html_contacts = 'Kontakty';
$html_modify = 'Zmieñ';
$html_back = 'Cofnij';
$html_contact_add = 'Dodaj nowy kontakt';
$html_contact_mod = 'Zmieñ kontakt';
$html_contact_first = 'Imiê';
$html_contact_last = 'Nazwisko';
$html_contact_nick = 'Nick';
$html_contact_mail = 'Adres e-mail';
$html_contact_list = 'Lista kontaktów u¿ytkownika ';
$html_contact_del = 'z listy kontaktów';

$html_contact_err1 = 'Maksymalna liczba kontaktów to ';
$html_contact_err2 = 'Nie mo¿esz dodaæ nowego kontaktu';
$html_contact_err3 = 'Nie posiadasz uprawnieñ do listy kontaktów.';
$html_del_msg = 'Usun±æ zaznaczone wiadomo¶ci?';
$html_down_mail = 'Pobierz';

$original_msg = '--- Wiadomo¶æ oryginalna ---';
$to_empty = 'Pole \'Do\' nie mo¿e byæ puste!';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'Nie mo¿na utworzyæ po³±czenia SMTP';
$html_smtp_error_unexpected = 'Nieoczekiwana odpowied¼ SMTP';

// IMAP messages (class_local.php)
$lang_could_not_connect = 'Nie mo¿na po³aczyæ siê z serwerem';

$html_file_upload_attack = 'Mo¿liwy atak poprzez upload plików';
$html_invalid_email_address = 'Niew³a¶ciwy adres e-mail';
$html_invalid_msg_per_page = 'Niepoprawna ilo¶æ wiadomo¶ci na stronê';
$html_invalid_wrap_msg =  'Niepoprawna szerokoæ zawijania linii';
$html_seperate_msg_win = 'Wiadomo¶ci w osobnym oknie';

// Exceptions
$html_err_file_contacts = 'Brak dostêpu do zapisu listy kontaktów.';
?>
