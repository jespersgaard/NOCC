<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/nl.php,v 1.27 2004/06/19 12:00:58 goddess_skuld Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the Netherlander language
 * Translation by Sander Schroevers and Pieterjan Goppel
 *  <lp_leeki@euronet.nl>
 *  Some adding by Mathijs Kolenberg <mack@solcon.nl>
 *  Some adding/modification by Silvan Jongerius <sjongerius@duxy.nl>
 */

$charset = 'ISO-8859-1';

// Configuration for the days and months

// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = 'nl_NL';

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

$err_user_empty = 'Het inlog-veld is nog leeg';
$err_passwd_empty = 'Het password-veld is nog leeg';


// html message

$alt_delete = 'Verwijder de geselecteerde berichten';
$alt_delete_one = 'Verwijder dit bericht';
$alt_new_msg = 'Nieuwe berichten';
$alt_reply = 'Antwoord de verzender';
$alt_reply_all = 'Antwoord allemaal';
$alt_forward = 'Doorzenden';
$alt_next = 'Volgende';
$alt_prev = 'Vorige';
$html_on = 'on';  //to translate
$html_theme = 'Schema';

// index.php

$html_lang = 'Taal';
$html_welcome = 'Welkom op';
$html_login = 'Login';
$html_passwd = 'Wachtwoord';
$html_submit = 'Verzenden';
$html_help = 'Help';  //to translate
$html_server = 'Server';  //to translate
$html_wrong = 'De login-naam of het wachtwoord is onjuist';
$html_retry = 'Probeer opnieuw';

// prefs.php

$html_msgperpage = 'Berichten per pagina';
$html_preferences = 'Instellingen';
$html_full_name = 'Volledige Naam';
$html_email_address = 'E-mail Adres';
$html_ccself = 'Copie naar zelf';
$html_hide_addresses = 'Adressen verbergen';
$html_outlook_quoting = 'Outlook-quoting';
$html_reply_to = 'Antwoord naar';
$html_use_signature = 'Gebruik handtekening';
$html_signature = 'Handtekening';
$html_reply_leadin = 'Reply Leadin';  //to translate
$html_prefs_updated = 'Instellingen opgeslagen';
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
$html_view_header = 'Headers inzien';
$html_remove_header = 'Headers verbergen';
$html_inbox = 'Postvak In';
$html_new_msg = 'Schrijven';
$html_reply = 'Antwoorden';
$html_reply_short = 'Betr.:';
$html_reply_all = 'Antwoord allen';
$html_forward = 'Doorsturen';
$html_forward_short = 'Fw';  //to translate
$html_delete = 'Verwijder';
$html_new = 'Nieuw';
$html_mark = 'Verwijder';
$html_att = 'Bijlage';
$html_atts = 'Bijlagen';
$html_att_unknown = '[onbekend]';
$html_attach = 'Voeg toe';
$html_attach_forget = 'Er moet een bestand als bijlage opgegeven worden voor verzending !';
$html_attach_delete = 'Verwijder selectie';
$html_sort_by = 'Sort by';  //to translate
$html_from = 'Van';
$html_subject = 'Onderwerp';
$html_date = 'Datum';
$html_sent = 'Verzenden';
$html_wrote = 'wrote';  //to translate
$html_size = 'Grootte';
$html_totalsize = 'Totale grootte';
$html_kb = 'Kb';  //to translate
$html_bytes = 'bytes';  //to translate
$html_filename = 'Bestandsnaam';
$html_to = 'Aan';
$html_cc = 'Cc';  //to translate
$html_bcc = 'Bcc';  //to translate
$html_nosubject = 'Geen onderwerp';
$html_send = 'Verzenden';
$html_cancel = 'Annuleren';
$html_no_mail = 'Geen nieuwe berichten';
$html_logout = 'Uitloggen';
$html_msg = 'Bericht';
$html_msgs = 'Berichten';
$html_configuration = 'Deze server is niet correct ingesteld';
$html_priority = 'Prioriteit';
$html_low = 'Low';  //to translate
$html_normal = 'Normal';  //to translate
$html_high = 'Hoog';
$html_receipt = 'Ontvangstbevestiging';
$html_select = 'Selecteer';
$html_select_all = 'Selecteer Alles';
$html_loading_image = 'Plaatje laden';
$html_send_confirmed = 'Het bericht is verzonden';
$html_no_sendaction = 'Geen actie gespecificeerd. Evt. JavaScript aanzetten.';
$html_error_occurred = 'Er is een fout opgetreden';
$html_prefs_file_error = 'Het instellingenbestand kan niet worden geopend.';
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
$html_del_msg = 'Delete selected messages ?';  //to translate
$html_down_mail = 'Download';  //to translate

$original_msg = '--Oorspronkelijk Bericht--';
$to_empty = 'Het \'Aan\'-veld kan niet leeg zijn !';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'Verbinding kan niet worden geopend';
$html_smtp_error_unexpected = 'Onverwacht antwoord:';

// IMAP messages (class_local.php)
$lang_could_not_connect = 'Verbinding met de server kan niet worden geinitialiseerd';

$html_file_upload_attack = 'Mogelijk bestandsupload aanval';
$html_invalid_email_address = 'Ongeldig e-mail adres';
$html_seperate_msg_win = 'Berichten in apart venster';
?>
