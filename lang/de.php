<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/de.php,v 1.34 2004/06/22 10:36:00 goddess_skuld Exp $ 
 *
 * Copyright 2000 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2000 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the german language
 * Translation by David Ferch <dferch@tk-online.net>
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
$html_full_name = 'Voller Name';
$html_email_address = 'E-mail Addresse';
$html_ccself = 'Cc self';
$html_hide_addresses = 'Adressen verstecken';
$html_outlook_quoting = 'Quoting im Outlook-Stil';
$html_reply_to = 'Antwort an';
$html_use_signature = 'Signatur benutzen';
$html_signature = 'Signatur';
$html_reply_leadin = 'Reply Leadin';
$html_prefs_updated = 'Einstellungen gespeichert';
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
$html_view_header = 'Header anzeigen';
$html_remove_header = 'Header verbergen';
$html_inbox = 'Inbox';
$html_new_msg = 'Schreiben';
$html_reply = 'Antworten';
$html_reply_short = 'Re';
$html_reply_all = 'Antwort an alle';
$html_forward = 'Weiterleitung';
$html_forward_short = 'Fwd';
$html_delete = 'L&ouml;schen';
$html_new = 'Neu';
$html_mark = 'L&ouml;schen';
$html_att = 'Anhang';
$html_atts = 'Anh&auml;nge';
$html_att_unknown = '[unbekannt]';
$html_attach = 'Anh&auml;ngen';
$html_attach_forget = 'Sie m&uuml;ssen die Datei vor dem Senden der Nachricht anh&auml;ngen !';
$html_attach_delete = 'Ausgew&auml;hlte entfernen';
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
$html_select_all = 'Alle';
$html_loading_image = 'Lade Bild';
$html_send_confirmed = 'Ihre Mail wurde verschickt.';
$html_no_sendaction = 'Keine Aktion angegeben. Versuchen Sie es mit eingeschaltetem JavaScript.';
$html_error_occurred = 'Ein Fehler ist aufgetreten';
$html_prefs_file_error = 'Kann Ihre Einstellungen-Datei nicht zum Schreiben &ouml;ffnen.';
$html_wrap = 'Wrap outgoing messages to :';  //to translate
$html_usenet_separator = 'Usenet separator ("-- \n") Before signature';  //to translate
$html_mark_as = 'Mark as'; //to translate
$html_read = 'read'; //to translate
$html_unread = 'unread'; //to translate

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
$html_contact_err3 = 'You don\'t have access rights to contact list'; //to translate
$html_del_msg = 'Delete selected messages ?';  //to translate
$html_down_mail = 'Download';  //to translate

$original_msg = '-- Original Nachricht--';
$to_empty = 'Das \'An\' Feld darf nicht leer sein !';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'Konnte Verbindung nicht &ouml;ffnen';
$html_smtp_error_unexpected = 'Unerwartete Antwort:';

// IMAP messages (class_local.php)
$lang_could_not_connect = 'Verbindung zum Server fehlgeschlagen'; //translated by Benjamin Bräuer - ben1@gmx.de

$html_file_upload_attack = 'Possible file upload attack';  //to translate - May be 'M&ouml;gliche Attacke durch hochgelandene Datei'; but it sounds terrible. leave it in english
$html_invalid_email_address = 'Ung&uuml;ltige E-mail Addresse'; //translated by Benjamin Bräuer - ben1@gmx.de
$html_seperate_msg_win = 'Nachricht in extra Fenster &ouml;ffnen'; //translated by Benjamin Bräuer - ben1@gmx.de

// Exceptions
$html_err_file_contacts = 'Unable to open contacts file for writing.'; //to translate
?>
