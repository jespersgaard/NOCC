<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/de.php,v 1.42 2004/10/08 09:54:47 jdeluise Exp $ 
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

$charset = 'ISO-8859-1';

// Configuration for the days and months

// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = 'de_DE';

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

$alt_delete = 'Markierte Nachrichten l&ouml;schen';
$alt_delete_one = 'Nachricht l&ouml;schen';
$alt_new_msg = 'Neue Nachrichten';
$alt_reply = 'Antwort an Absender';
$alt_reply_all = 'Antwort an alle';
$alt_forward = 'Weiterleitung';
$alt_next = 'N&auml;chste';
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

// prefs.php

$html_msgperpage = 'Nachrichten pro Seite';
$html_preferences = 'Einstellungen';
$html_full_name = 'Vollst&auml;ndiger Name';
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
$html_sent_folder = 'Copy sent mails into a dedicated folder'; //to translate

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
$html_folder_delete = 'L&ouml;sche';

// filters.php
$html_filter_remove = 'L&ouml;schen';
$html_filter_body = 'Body';
$html_filter_subject = 'Betreff';
$html_filter_to = 'Empf&auml;ngerfeld (To)';
$html_filter_cc = 'Cc-Feld';
$html_filter_from = 'Absenderfeld (From)';
$html_filter_change_tip = 'Um einen Filter zu &auml;ndern, k&ouml;nnen Sie diesen einfach &uuml;berschreiben.';
$html_reapply_filters = 'Alle Filter erneut anwenden';
$html_filter_contains = 'enth&auml;lt';
$html_filter_name = 'Filter Name';
$html_filter_action = 'Filter Aktion';
$html_filter_moveto = 'Verschiebe nach';

// Other pages
$html_select_one = '--Ausw&auml;hlen--';
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
$html_forward_info = 'The forwarded message will be send as an attachment to this one.'; //to translate
$html_delete = 'L&ouml;schen';
$html_new = 'Neu';
$html_mark = 'L&ouml;schen';
$html_att = 'Anhang';
$html_atts = 'Anh&auml;nge';
$html_att_unknown = '[unbekannt]';
$html_attach = 'Anh&auml;ngen';
$html_attach_forget = 'Sie m&uuml;ssen die Datei vor dem Senden der Nachricht anh&auml;ngen !';
$html_attach_delete = 'Ausgew&auml;hlte entfernen';
$html_attach_none = 'You must select a file to attach!';  //to translate
$html_sort_by = 'Sortieren nach';
$html_from = 'Von';
$html_subject = 'Betreff';
$html_date = 'Datum';
$html_sent = 'Gesendet';
$html_wrote = 'schrieb';
$html_size = 'Gr&ouml;sse';
$html_totalsize = 'Gesamtgr&ouml;sse';
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
$html_priority = 'Priorit&auml;t';
$html_low = 'Niedrig';
$html_normal = 'Normal';
$html_high = 'Hoch';
$html_receipt = 'Lesebest&auml;tigung anfordern';
$html_select = 'Auswahl';
$html_select_all = 'Invertiere Auswahl';
$html_loading_image = 'Lade Bild';
$html_send_confirmed = 'Ihre Mail wurde verschickt.';
$html_no_sendaction = 'Keine Aktion angegeben. Versuchen Sie es mit eingeschaltetem JavaScript.';
$html_error_occurred = 'Ein Fehler ist aufgetreten';
$html_prefs_file_error = 'Kann Ihre Einstellungen-Datei nicht zum Schreiben &ouml;ffnen.';
$html_wrap = 'Umbrechen der ausgehenden Nachrichten nach x Zeichen:';
$html_usenet_separator = 'Usenet-Signaturtrenner ("-- \n") benutzen';
$html_mark_as = 'Markiere als';
$html_read = 'gelesen';
$html_unread = 'ungelesen';

// Contacts manager
$html_add = 'Hinzuf&uuml;gen';
$html_contacts = 'Kontakte';
$html_modify = '&Auml;ndere';
$html_back = 'Zur&uuml;ck';
$html_contact_add = 'F&uuml;ge neuen Kontakt hinzu';
$html_contact_mod = '&Auml;ndere einen Kontakt';
$html_contact_first = 'Vorname';
$html_contact_last = 'Nachname';
$html_contact_nick = 'Spitzname';
$html_contact_mail = 'E-Mail-Adresse';
$html_contact_list = 'Kontaktliste von ';
$html_contact_del = 'von der Kontaktliste';

$html_contact_err1 = 'Die Maximalanzahl der Kontakte ist ';
$html_contact_err2 = 'Sie k&ouml;nnen keinen neuen Kontakt hinzuf&uuml;gen';
$html_contact_err3 = 'Sie haben keine Rechte, um auf die Kontaktliste zuzugreifen';
$html_del_msg = 'Sollen die markierten Nachrichten gel&ouml;scht werden?';
$html_down_mail = 'Download';

$original_msg = '-- Original Nachricht--';
$to_empty = 'Das \'An\' Feld darf nicht leer sein !';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'Konnte Verbindung nicht &ouml;ffnen';
$html_smtp_error_unexpected = 'Unerwartete Antwort:';

// IMAP messages (class_local.php)
$lang_could_not_connect = 'Verbindung zum Server fehlgeschlagen';
$lang_invalid_msg_num = 'Bad Message Number';  //to translate

$html_file_upload_attack = 'Die hochgeladene Datei konnte nicht gefunden werden.';
$html_invalid_email_address = 'Ung&uuml;ltige E-mail Addresse';
$html_invalid_msg_per_page = 'Ung&uuml;tige Anzahl von Nachrichten pro Seite.';
$html_invalid_wrap_msg = 'Ung&uuml;tiger Nachrichtenumbruch';
$html_seperate_msg_win = 'Nachricht in neuem Fenster &ouml;ffnen';

// Exceptions
$html_err_file_contacts = 'Kann die Kontaktdatei nicht zum Schreiben &ouml;ffnen.';
?>
