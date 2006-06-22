<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/de.php,v 1.50 2005/11/14 11:50:17 goddess_skuld Exp $ 
 *
 * Copyright 2000 Nicolas Chalanset <nicocha AT free DOT fr>
 * Copyright 2000 Olivier Cahagne <wolruf AT free DOT fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the german language
 * Translation by
 * 	David Ferch <dferch AT tk-online DOT net>
 *	Benjamin Bräuer <ben1 AT gmx DOT de>
 *	Alexander Schremmer <alex AT alexanderweb DOT de>
 */

$charset = 'UTF-8';

// Configuration for the days and months

// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = 'de_DE.UTF-8';

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
$default_time_format = '%I:%M %p';


// Here is the configuration for the HTML

$err_user_empty = 'Kein Nutzername eingegeben';
$err_passwd_empty = 'Kein Passwort eingegeben';


// html message

$alt_delete = 'Markierte Nachrichten löschen';
$alt_delete_one = 'Nachricht löschen';
$alt_new_msg = 'Neue Nachrichten';
$alt_reply = 'Antwort an Absender';
$alt_reply_all = 'Antwort an alle';
$alt_forward = 'Weiterleitung';
$alt_next = 'Nächste';
$alt_prev = 'Vorige';
$html_on = 'an';
$html_theme = 'Theme';

// index.php

$html_lang = 'Sprache';
$html_welcome = 'Willkommen bei';
$html_login = 'Login';
$html_passwd = 'Passwort';
$html_submit = 'Ok';
$html_help = 'Hilfe';
$html_server = 'Server';
$html_wrong = 'Der Nutzername oder das Passwort sind falsch';
$html_retry = 'Nochmal';
$html_remember = "Einstellungen speichern";

// prefs.php

$html_msgperpage = 'Nachrichten pro Seite';
$html_preferences = 'Einstellungen';
$html_full_name = 'Vollständiger Name';
$html_email_address = 'E-Mail Adresse';
$html_ccself = 'Kopie der gesendeten Nachrichten an die eigene Adresse schicken';
$html_hide_addresses = 'Adressen verstecken';
$html_outlook_quoting = 'Quoting im Outlook-Stil';
$html_reply_to = 'Antwort an';
$html_use_signature = 'Signatur benutzen';
$html_signature = 'Signatur';
$html_reply_leadin = 'Reply Leadin';
$html_prefs_updated = 'Einstellungen gespeichert';
$html_manage_folders_link = 'IMAP Ordner verwalten';
$html_manage_filters_link = 'E-Mail Filter verwalten';
$html_use_graphical_smilies = 'Benutze graphische Emoticons';
$html_sent_folder = 'Kopiere gesendete Email in das angegebene Verzeichnis';

// folders.php
$html_folders_create_failed = 'Der Ordner konnte nicht angelegt werden!';
$html_folders_sub_failed = 'Der Ordner konnte nicht abonniert werden!';
$html_folders_unsub_failed = 'Der Ordner konnte nicht abbestellt werden!';
$html_folders_rename_failed = 'Der Ordner konnte nicht umbenannt werden!';
$html_folders_updated = 'Die Ordner wurden aktualisiert';
$html_folder_subscribe = 'Abonniere';
$html_folder_rename = 'Umbenennen:';
$html_folder_create = 'Erstelle neuen Ordner';
$html_folder_remove = 'Abbestellen:';
$html_folder_delete = 'Lösche';

// filters.php
$html_filter_remove = 'Löschen';
$html_filter_body = 'Body';
$html_filter_subject = 'Betreff';
$html_filter_to = 'Empfängerfeld (To)';
$html_filter_cc = 'Cc-Feld';
$html_filter_from = 'Absenderfeld (From)';
$html_filter_change_tip = 'Um einen Filter zu ändern, können Sie diesen einfach überschreiben.';
$html_reapply_filters = 'Alle Filter erneut anwenden';
$html_filter_contains = 'enthält';
$html_filter_name = 'Filter Name';
$html_filter_action = 'Filter Aktion';
$html_filter_moveto = 'Verschiebe nach';

// Other pages
$html_select_one = '--Auswählen--';
$html_and = 'Und';
$html_new_msg_in = 'Neue Nachrichten in';
$html_or = 'oder';
$html_move = 'Verschiebe';
$html_copy = 'Kopiere';
$html_messages_to = 'die markierten Nachrichten nach';
$html_gotopage = 'Gehe zu Seite';
$html_gotofolder = 'Gehe zu Ordner';
$html_other_folders = 'Ordner Liste';
$html_page = 'Seite';
$html_of = 'von';
$html_to = 'to';  // damn, this is used in two completly different places/meanings
$html_view_header = 'Header anzeigen';
$html_remove_header = 'Header verbergen';
$html_inbox = 'Inbox';
$html_new_msg = 'Schreiben';
$html_reply = 'Antworten';
$html_reply_short = 'Re';
$html_reply_all = 'Antwort an alle';
$html_forward = 'Weiterleitung';
$html_forward_short = 'Fwd';
$html_forward_info = 'Die weiterzuleitende Nachricht wird als Anhang mit dieser Email verschickt.';
$html_delete = 'Löschen';
$html_new = 'Neu';
$html_mark = 'Löschen';
$html_att = 'Anhang';
$html_atts = 'Anhänge';
$html_att_unknown = '[unbekannt]';
$html_attach = 'Anhängen';
$html_attach_forget = 'Sie müssen die Datei vor dem Senden der Nachricht anhängen !';
$html_attach_delete = 'Ausgewählte entfernen';
$html_attach_none = 'Als Anhang müssen Sie eine Datei auswählen!';
$html_sort_by = 'Sortieren nach';
$html_from = 'Von';
$html_subject = 'Betreff';
$html_date = 'Datum';
$html_sent = 'Gesendet';
$html_wrote = 'schrieb';
$html_size = 'Grösse';
$html_totalsize = 'Gesamtgrösse';
$html_kb = 'KB';
$html_bytes = 'Byte';
$html_filename = 'Datei';
$html_to = 'An';
$html_cc = 'Kopie';
$html_bcc = 'Blindkopie';
$html_nosubject = 'Kein Betreff';
$html_send = 'Senden';
$html_cancel = 'Abbrechen';
$html_no_mail = 'Keine neue Nachrichten.';
$html_logout = 'Abmelden';
$html_msg = 'Nachricht';
$html_msgs = 'Nachrichten';
$html_configuration = 'This server is not well set up !';
$html_priority = 'Priorität';
$html_low = 'Niedrig';
$html_normal = 'Normal';
$html_high = 'Hoch';
$html_receipt = 'Lesebestätigung anfordern';
$html_select = 'Auswahl';
$html_select_all = 'Invertiere Auswahl';
$html_loading_image = 'Lade Bild';
$html_send_confirmed = 'Ihre Mail wurde verschickt.';
$html_no_sendaction = 'Keine Aktion angegeben. Versuchen Sie es mit eingeschaltetem JavaScript.';
$html_error_occurred = 'Ein Fehler ist aufgetreten';
$html_prefs_file_error = 'Kann Ihre Einstellungen-Datei nicht zum Schreiben öffnen.';
$html_wrap = 'Umbrechen der ausgehenden Nachrichten nach x Zeichen:';
$html_wrap_none = 'Keine';
$html_usenet_separator = 'Usenet-Signaturtrenner ("-- \n") benutzen';
$html_mark_as = 'Markiere als';
$html_read = 'gelesen';
$html_unread = 'ungelesen';
$html_mail_sent = 'Die Mail wurde erfolgreich abgesendet!';
$html_encoding = 'Zeichensatz-Kodierung';

// Contacts manager
$html_add = 'Hinzufügen';
$html_contacts = 'Kontakte';
$html_modify = 'Ändere';
$html_back = 'Zurück';
$html_contact_add = 'Füge neuen Kontakt hinzu';
$html_contact_mod = 'Ändere einen Kontakt';
$html_contact_first = 'Vorname';
$html_contact_last = 'Nachname';
$html_contact_nick = 'Spitzname';
$html_contact_mail = 'E-Mail-Adresse';
$html_contact_list = 'Kontaktliste von ';
$html_contact_del = 'von der Kontaktliste';

$html_contact_err1 = 'Die Maximalanzahl der Kontakte ist ';
$html_contact_err2 = 'Sie können keinen neuen Kontakt hinzufügen';
$html_contact_err3 = 'Sie haben keine Rechte, um auf die Kontaktliste zuzugreifen';
$html_del_msg = 'Sollen die markierten Nachrichten gelöscht werden?';
$html_down_mail = 'Download';

$original_msg = '-- Original Nachricht--';
$to_empty = 'Das \'An\' Feld darf nicht leer sein !';

// Images warning
$html_images_warning = 'For your security, distant images are not displayed.'; // to translate
$html_images_display = 'Display images'; // to translate

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'Konnte Verbindung nicht öffnen';
$html_smtp_error_unexpected = 'Unerwartete Antwort:';

// IMAP messages (class_local.php)
$lang_could_not_connect = 'Verbindung zum Server fehlgeschlagen';
$lang_invalid_msg_num = 'Fehlerhafte Nachrichten-Nummer';

$html_file_upload_attack = 'Die hochgeladene Datei konnte nicht gefunden werden.';
$html_invalid_email_address = 'Ungültige E-mail Addresse';
$html_invalid_msg_per_page = 'Ungütige Anzahl von Nachrichten pro Seite.';
$html_invalid_wrap_msg = 'Ungütiger Nachrichtenumbruch';
$html_seperate_msg_win = 'Nachricht in neuem Fenster öffnen';

// Exceptions
$html_err_file_contacts = 'Kann die Kontaktdatei nicht zum Schreiben öffnen.';
?>
