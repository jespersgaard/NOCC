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

$err_user_empty = 'Prosz� wpisa� nazw� u�ytkownika';
$err_passwd_empty = 'Prosz� wpisa� has�o';


// html message

$alt_delete = 'Skasuj zaznaczone wiadomo�ci';
$alt_delete_one = 'Skasuj wiadomo��';
$alt_new_msg = 'Nowa wiadomo��';
$alt_reply = 'Odpowiedz autorowi';
$alt_reply_all = 'Odpowiedz wszystkim';
$alt_forward = 'Prze�lij dalej';
$alt_next = 'Nast�pna wiadomo��';
$alt_prev = 'Poprzednia wiadomo��';
$html_on = 'W��czone';
$html_theme = 'Wygl�d';

// index.php

$html_lang = 'J�zyk';
$html_welcome = 'Witaj w';
$html_login = 'Nazwa konta';
$html_passwd = 'Has�o';
$html_submit = 'OK';
$html_help = 'Pomoc';
$html_server = 'Serwer';
$html_wrong = 'Nazwa konta lub has�o jest niepoprawne';
$html_retry = 'Pon�w';

// prefs.php

$html_msgperpage = 'Wiadomo�ci na stronie';
$html_preferences = 'Ustawienia';
$html_full_name = 'Nazwa wy�wietlana';
$html_email_address = 'Adres email';
$html_ccself = 'Wysy�aj kopie wiadomo�ci do siebie';
$html_hide_addresses = 'Nie pokazuj adres�w email';
$html_outlook_quoting = 'Cytowanie a\'la Outlook';
$html_reply_to = 'Odpisuj na adres';
$html_use_signature = 'U�ywaj podpisu';
$html_signature = 'Podpis';
$html_reply_leadin = 'Nag��wek odpowiedzi';
$html_prefs_updated = 'Zapisano nowe ustawienia';
$html_manage_folders_link = 'Zarz�dzaj Folderami IMAP';
$html_manage_filters_link = 'Regu�y wiadomo�ci';
$html_use_graphical_smilies = 'U�ywaj emotikon';

// folders.php
$html_folders_create_failed = 'Nie mo�na uworzy� folderu!';
$html_folders_sub_failed = 'Nie mo�na do��czy� folderu!';
$html_folders_unsub_failed = 'Nie mo�na od��czy� folderu!';
$html_folders_rename_failed = 'Nie mo�na zmieni� nazwy folderu!';
$html_folders_updated = 'Zaktualizowano foldery';
$html_folder_subscribe = 'Do��cz';
$html_folder_rename = 'Zmie� nazw�';
$html_folder_create = 'Stw�rz nowy folder o nazwie';
$html_folder_remove = 'Od��cz folder';
$html_folder_delete = 'Skasuj';

// filters.php
$html_filter_remove = 'Skasuj';
$html_filter_body = 'Tre�� Wiadomo�ci';
$html_filter_subject = 'Temat Wiadomo�ci';
$html_filter_to = 'Pole \'Do\'';
$html_filter_cc = 'Pole \'DW\'';
$html_filter_from = 'Pole \'Od\'';
$html_filter_change_tip = '�eby zmieni� filtr poprostu go nadpisz.';
$html_reapply_filters = 'Ponownie zastosuj wszystkie filtry';
$html_filter_contains = 'zawiera';
$html_filter_name = 'Nazwa Filtru';
$html_filter_action = 'Akcja';
$html_filter_moveto = 'Przenie� do';

// Other pages
$html_select_one = '--Wybierz Jeden--';
$html_and = 'i';
$html_new_msg_in = 'Nowe wiadomo�ci w';
$html_or = 'lub';
$html_move = 'Przenie�';
$html_copy = 'Skopiuj';
$html_messages_to = 'zaznaczone wiadomo�ci do';
$html_gotopage = 'Przejd� do strony';
$html_gotofolder = 'Przejd� do Folderu';
$html_other_folders = 'Lista Folder�w';
$html_page = 'Strona';
$html_of = 'z';
$html_to = 'do';
$html_view_header = 'Zobacz nag��wek';
$html_remove_header = 'Schowaj nag��wek';
$html_inbox = 'Skrzynka odbiorcza';
$html_new_msg = 'Nowa wiadomo��';
$html_reply = 'Odpowiedz';
$html_reply_short = 'ODP';
$html_reply_all = 'Odpowiedz wszystkim';
$html_forward = 'Prze�lij dalej';
$html_forward_short = 'PD';
$html_forward_info = 'The forwarded message will be send as an attachment to this one.'; //to translate
$html_delete = 'Skasuj';
$html_new = 'Nowe';
$html_mark = 'Zaznacz';
$html_att = 'Za��cznik';
$html_atts = 'Za��czniki';
$html_att_unknown = '[nieznany]';
$html_attach = 'Do��cz';
$html_attach_forget = 'Zanim wy�lesz wiadomo�� musisz do�aczy� za��cznik(i)!';
$html_attach_delete = 'Skasuj zaznaczone';
$html_sort_by = 'Sortuj wed�ug';
$html_from = 'Nadawca';
$html_subject = 'Temat';
$html_date = 'Data';
$html_sent = 'Wy�lij';
$html_wrote = 'napisa�(a)';
$html_size = 'Rozmiar';
$html_totalsize = 'Rozmiar';
$html_kb = 'Kb';
$html_bytes = 'bajt�w';
$html_filename = 'Nazwa pliku';
$html_to = 'Do';
$html_cc = 'DW';
$html_bcc = 'UDW';
$html_nosubject = 'Bez tematu';
$html_send = 'Wy�lij';
$html_cancel = 'Anuluj';
$html_no_mail = 'Brak wiadomo�ci.';
$html_logout = 'Wyloguj si�';
$html_msg = 'Wiadomo��';
$html_msgs = 'Wiadomo�ci';
$html_configuration = 'Serwer nie zosta� prawid�owo skonfigurowany!';
$html_priority = 'Wa�no��';
$html_low = 'Niska';
$html_normal = 'Normalna';
$html_high = 'Wysoka';
$html_receipt = 'Za��daj potwierdzenia otrzymania wiadomo�ci';
$html_select = 'Zaznacz';
$html_select_all = 'Odwr�� zaznaczenie';
$html_loading_image = '�adowanie obrazka';
$html_send_confirmed = 'Twoja wiadomo�� zosta�a wys�ana';
$html_no_sendaction = 'Nie okre�lona akcja. Spr�buj w��czy� Javascript.';
$html_error_occurred = 'Wyst�pi� b��d';
$html_prefs_file_error = 'Nie mo�na otworzy� pliku z ustawieniami do zapisu.';
$html_wrap = 'Zawijaj linie w poczcie wychodz�cej do d�ugo�ci (znak�w):';
$html_usenet_separator = 'U�yj separatora ("-- \n") Przed sygnatur�';
$html_mark_as = 'Zaznacz jako';
$html_read = 'Przeczytane';
$html_unread = 'Nie przeczytane';

// Contacts manager
$html_add = 'Dodaj';
$html_contacts = 'Kontakty';
$html_modify = 'Zmie�';
$html_back = 'Cofnij';
$html_contact_add = 'Dodaj nowy kontakt';
$html_contact_mod = 'Zmie� kontakt';
$html_contact_first = 'Imi�';
$html_contact_last = 'Nazwisko';
$html_contact_nick = 'Nick';
$html_contact_mail = 'Adres e-mail';
$html_contact_list = 'Lista kontakt�w u�ytkownika ';
$html_contact_del = 'z listy kontakt�w';

$html_contact_err1 = 'Maksymalna liczba kontakt�w to ';
$html_contact_err2 = 'Nie mo�esz doda� nowego kontaktu';
$html_contact_err3 = 'Nie posiadasz uprawnie� do listy kontakt�w.';
$html_del_msg = 'Usun�� zaznaczone wiadomo�ci?';
$html_down_mail = 'Pobierz';

$original_msg = '--- Wiadomo�� oryginalna ---';
$to_empty = 'Pole \'Do\' nie mo�e by� puste!';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'Nie mo�na utworzy� po��czenia SMTP';
$html_smtp_error_unexpected = 'Nieoczekiwana odpowied� SMTP';

// IMAP messages (class_local.php)
$lang_could_not_connect = 'Nie mo�na po�aczy� si� z serwerem';

$html_file_upload_attack = 'Mo�liwy atak poprzez upload plik�w';
$html_invalid_email_address = 'Niew�a�ciwy adres e-mail';
$html_invalid_msg_per_page = 'Niepoprawna ilo�� wiadomo�ci na stron�';
$html_invalid_wrap_msg =  'Niepoprawna szeroko� zawijania linii';
$html_seperate_msg_win = 'Wiadomo�ci w osobnym oknie';

// Exceptions
$html_err_file_contacts = 'Brak dost�pu do zapisu listy kontakt�w.';
?>
