<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/cs.php,v 1.43 2006/12/18 18:47:31 goddess_skuld Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the Czech language
 * Translation by Vaclav Habr <habr@fonet.cz>
 * Translation by Lukas Mizoch <www.mizoch.info>
 */

$charset = 'UTF-8';

// Configuration for the days and months

// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = 'cs_CZ.UTF-8';

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

$err_user_empty = 'Není vyplněno přihlašovací jméno ';
$err_passwd_empty = 'Není vyplněno heslo';


// html message

$alt_delete = 'Vymazat vybrané zprávy';
$alt_delete_one = 'Vymazat zprávu';
$alt_new_msg = 'Nové zprávy';
$alt_reply = 'Odpovědět autorovi';
$alt_reply_all = 'Odpovědět všem';
$alt_forward = 'Předat dál';
$alt_next = 'Další';
$alt_prev = 'Předchozí';
$title_next_page = 'Další strana';
$title_prev_page = 'Předchozí strana';
$title_next_msg = 'Další zpráva';
$title_prev_msg = 'Předchozí zpráva';
$html_on = 'na';
$html_theme = 'Téma';

// index.php

$html_lang = 'Jazyk';
$html_welcome = 'Vítejte v';
$html_login = 'Jméno';
$html_passwd = 'Heslo';
$html_submit = 'Potvrdit';
$html_help = 'Pomoc';
$html_server = 'Server';
$html_wrong = 'Prihlašovací jméno a heslo nesouhlasí';
$html_retry = 'Zkusit znovu';
$html_remember = 'Pamatovat nastavení';

// prefs.php

$html_msgperpage = 'Zpráv na stránku';
$html_preferences = 'Nastavení';
$html_full_name = 'Celé jméno';
$html_email_address = 'E-mailová adresa';
$html_ccself = 'Automaticky kopii sobě';
$html_hide_addresses = 'Skryj adresy';
$html_outlook_quoting = 'Formátování ve stylu Outlook';
$html_reply_to = 'Odpovědět';
$html_use_signature = 'Použij podpis';
$html_signature = 'Podpis';
$html_reply_leadin = 'Hlavička odpovědi';
$html_prefs_updated = 'Nastavení aktualizováno ';
$html_manage_folders_link = 'Spravovat IMAP složky';
$html_manage_filters_link = 'Spravovat poštovní filtry';
$html_use_graphical_smilies = 'Používat grafické smajlíky';
$html_sent_folder = 'Kopírovat odeslané dopisy do vyhrazení složky';
$html_colored_quotes = 'Barevné uvozovky';
$html_display_struct = 'Zobrazit strukturovaný text';
$html_send_html_mail = 'Posílat zprávy v HTML';

// folders.php
$html_folders_create_failed = 'Složka nemohla být vytvořena!';
$html_folders_sub_failed = 'Nelze se přihlásit do složky!';
$html_folders_unsub_failed = 'Nelze se odhlásit ze složky!';
$html_folders_rename_failed = 'Složku nelze přejmenovat!';
$html_folders_updated = 'Složky aktualizovány';
$html_folder_subscribe = 'Přihlásit do';
$html_folder_rename = 'Přejmenovat';
$html_folder_create = 'Vytvořit novou složku';
$html_folder_remove = 'Odhlásit z';
$html_folder_delete = 'Smazat';
$html_folder_to = 'do';

// filters.php
$html_filter_remove = 'Smazat';
$html_filter_body = 'Tělo zprávy';
$html_filter_subject = 'Věc zprávy';
$html_filter_to = 'Pole Komu';
$html_filter_cc = 'Pole Kopie';
$html_filter_from = 'Pole Od';
$html_filter_change_tip = 'Pro změnu filtru ho jednoduše přepište.';
$html_reapply_filters = 'Znovu použij všechny filtry';
$html_filter_contains = 'obsahuje';
$html_filter_name = 'Jméno filtru';
$html_filter_action = 'Akce filtru';
$html_filter_moveto = 'Přesuň do';

// Other pages
$html_select_one = '--Zvolte jeden--';
$html_and = 'a zároveň';
$html_new_msg_in = 'Nové zprávy v';
$html_or = 'nebo';
$html_move = 'přesuň';
$html_copy = 'kopíruj';
$html_messages_to = 'vybrané zprávy do';
$html_gotopage = 'Jít na stránku';
$html_gotofolder = 'Jít na složku';
$html_other_folders = 'Seznam složek';
$html_page = 'Stránka';
$html_of = 'z';
$html_view_header = 'Zobrazit hlavičku';
$html_remove_header = 'Skrýt hlavičku';
$html_inbox = 'Doručená pošta';
$html_new_msg = 'Nová zpráva';
$html_reply = 'Odpovědět';
$html_reply_short = 'Re';
$html_reply_all = 'Odpovědět všem';
$html_forward = 'Předat dál';
$html_forward_short = 'Fw';
$html_forward_info = 'Předaná zpráva bude odeslána jako příloha této zprávy.';
$html_delete = 'Vymazat';
$html_new = 'Nová';
$html_mark = 'Vymazat';
$html_att = 'Příloha';
$html_atts = 'Přílohy';
$html_att_unknown = '[neznámá]';
$html_attach = 'Přiložit';
$html_attach_forget = 'Soubor musí být přiložen před odesláním zprávy';
$html_attach_delete = 'Vymazat vybrané';
$html_attach_none = 'Musíte vybrat soubor k přiložení!';
$html_sort_by = 'Seřadit dle';
$html_sort = 'Seřadit';
$html_from = 'Od';
$html_subject = 'Předmět';
$html_date = 'Datum';
$html_sent = 'Odeslat';
$html_wrote = 'odesláno';
$html_size = 'Velikost';
$html_totalsize = 'Celková velikost';
$html_kb = 'KiB';
$html_bytes = 'bajtů';
$html_filename = 'Název souboru';
$html_to = 'Komu';
$html_cc = 'Kopie';
$html_bcc = 'Skrytá';
$html_nosubject = 'Bez názvu';
$html_send = 'Odeslat';
$html_cancel = 'Zrušit';
$html_no_mail = 'Žádná zpráva';
$html_logout = 'Odhlášení';
$html_msg = 'Zpráva';
$html_msgs = 'Zpráv';
$html_configuration = 'Chybná konfigurace serveru!!!';
$html_priority = 'Důležitost';
$html_low = 'Malá';
$html_normal = 'Střední';
$html_high = 'Vysoká';
$html_receipt = 'Potvrzení o doručení';
$html_select = 'Vybrat';
$html_select_all = 'Invertovat výběr';
$html_loading_image = 'Nahrávám obrázek';
$html_send_confirmed = 'Váš dopis byl přijat k doručení';
$html_no_sendaction = 'Nedefinovaná akce. Zkuste povolit JavaScript.';
$html_error_occurred = 'Došlo k chybě';
$html_prefs_file_error = 'Chyba při ukládání souboru s nastavením.';
$html_wrap = 'Zalomit odchozí zprávy na:';
$html_wrap_none = 'žádný';
$html_usenet_separator = 'Oddělovač před podpisem ("-- \n")';
$html_mark_as = 'Označit jako';
$html_read = 'přečtené';
$html_unread = 'nečtené';
$html_encoding = 'Znaková sada';

// Contacts manager
$html_add = 'Přidat';
$html_contacts = 'Kontakty';
$html_modify = 'Změnit';
$html_back = 'Zpět';
$html_contact_add = 'Přidat nový kontakt';
$html_contact_mod = 'Změnit kontakt';
$html_contact_first = 'Křestní jméno';
$html_contact_last = 'Příjmení';
$html_contact_nick = 'Přezdívka';
$html_contact_mail = 'E-mail';
$html_contact_list = 'Seznam kontaktů ';
$html_contact_del = 'ze seznamu kontaktů';
$html_contact_err1 = 'Maximální počet kontaktů je ';
$html_contact_err2 = 'Nemůžete přidat nový kontakt.';
$html_contact_err3 = 'Nemáte přístup k seznamu kontaktů';
$html_del_msg = 'Smazat označené zprávy?';
$html_down_mail = 'Stáhnout';
$original_msg = '-- Původní zpráva --';
$to_empty = 'Musíte vyplnit kolonku Komu:';

// Images warning
$html_images_warning = 'Pro vaše bezpečí nejsou vzdálené obrázky zobrazeny.';
$html_images_display = 'Zobrazit obrázky';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'Chyba při vytváření SMTP spojení';
$html_smtp_error_unexpected = 'Neočekávaná odezva SMTP:';

// IMAP messages (class_local.php)
$lang_could_not_connect = 'Chyba při připojování k serveru';
$lang_invalid_msg_num = 'Špatné číslo zprávy';

$html_file_upload_attack = 'Možný útok při nahrávání souboru';
$html_invalid_email_address = 'Špatná e-mailová adresa';
$html_invalid_msg_per_page = 'Špatný počet zpráv na stránku';
$html_invalid_wrap_msg = 'Špatná hranice zalamování textu';
$html_seperate_msg_win = 'Zprávy v oddělených oknech';

// Exceptions
$html_err_file_contacts = 'Nelze otevřít soubor kontaktů pro zápis.';
$html_session_file_error = 'Nelze otevřít soubor seance pro zápis.';
$html_login_not_allowed = 'Tento uživatel nemá dovoleno přihlašování.';
?>
