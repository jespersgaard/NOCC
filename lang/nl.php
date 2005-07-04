<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/nl.php,v 1.43 2005/07/02 14:04:16 goddess_skuld Exp $
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

$charset = 'UTF-8';

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
$html_on = 'aan';
$html_theme = 'Schema';

// index.php

$html_lang = 'Taal';
$html_welcome = 'Welkom op';
$html_login = 'Login';
$html_passwd = 'Wachtwoord';
$html_submit = 'Verzenden';
$html_help = 'Help';
$html_server = 'Server';
$html_wrong = 'De login-naam of het wachtwoord is onjuist';
$html_retry = 'Probeer opnieuw';
$html_remember = "Remember settings"; //to translate

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
$html_reply_leadin = 'Antwoord op inleiding';
$html_prefs_updated = 'Instellingen opgeslagen';
$html_manage_folders_link = 'Beheer IMAP mappen';
$html_manage_filters_link = 'Beheer Email Filters';
$html_use_graphical_smilies = 'Gebruik grafische smilies';
$html_sent_folder = 'Copy sent mails into a dedicated folder'; //to translate

// folders.php
$html_folders_create_failed = 'Map kon niet worden gemaakt!';
$html_folders_sub_failed = 'Kan niet inschrijven naar map!';
$html_folders_unsub_failed = 'Kan niet uitschrijven van map!';
$html_folders_rename_failed = 'Map kan niet worden hernoemd!';
$html_folders_updated = 'Mappen geupdate';
$html_folder_subscribe = 'Inschrijven voor';
$html_folder_rename = 'Hernoem';
$html_folder_create = 'Creeer nieuwe map genaamd';
$html_folder_remove = 'Uitschrijven van';
$html_folder_delete = 'Verwijder';

// filters.php
$html_filter_remove = 'Verwijder';
$html_filter_body = 'Berichten Body';
$html_filter_subject = 'Berichten onderwerp';
$html_filter_to = 'Naar veld';
$html_filter_cc = 'Cc veld';
$html_filter_from = 'Van veld';
$html_filter_change_tip = 'Om een filter te veranderen simpel overschrijf.';
$html_reapply_filters = 'Reapply alle filters';
$html_filter_contains = 'Bevat';
$html_filter_name = 'Filter Naam';
$html_filter_action = 'Filter Actie';
$html_filter_moveto = 'Verplaats naar';

// Other pages
$html_select_one = '--Selecteer een--';
$html_and = 'En';
$html_new_msg_in = 'Nieuwe bericht in';
$html_or = 'of';
$html_move = 'Verplaats';
$html_copy = 'Copieer';
$html_messages_to = 'selecteer berichten naar';
$html_gotopage = 'Ga naar pagina';
$html_gotofolder = 'Ga naar map';
$html_other_folders = 'Mappen lijst';
$html_page = 'Pagina';
$html_of = 'of';
$html_to = 'naar';
$html_view_header = 'Headers inzien';
$html_remove_header = 'Headers verbergen';
$html_inbox = 'Postvak In';
$html_new_msg = 'Schrijven';
$html_reply = 'Antwoorden';
$html_reply_short = 'Betr.:';
$html_reply_all = 'Antwoord allen';
$html_forward = 'Doorsturen';
$html_forward_short = 'Fw';
$html_forward_info = 'The forwarded message will be send as an attachment to this one.'; //to translate
$html_delete = 'Verwijder';
$html_new = 'Nieuw';
$html_mark = 'Verwijder';
$html_att = 'Bijlage';
$html_atts = 'Bijlagen';
$html_att_unknown = '[onbekend]';
$html_attach = 'Voeg toe';
$html_attach_forget = 'Er moet een bestand als bijlage opgegeven worden voor verzending !';
$html_attach_delete = 'Verwijder selectie';
$html_attach_none = 'You must select a file to attach!';  //to translate
$html_sort_by = 'Sorteer op';
$html_from = 'Van';
$html_subject = 'Onderwerp';
$html_date = 'Datum';
$html_sent = 'Verzenden';
$html_wrote = 'Schreef';
$html_size = 'Grootte';
$html_totalsize = 'Totale grootte';
$html_kb = 'Kb';
$html_bytes = 'bytes';
$html_filename = 'Bestandsnaam';
$html_to = 'Aan';
$html_cc = 'Cc';
$html_bcc = 'Bcc';
$html_nosubject = 'Geen onderwerp';
$html_send = 'Verzenden';
$html_cancel = 'Annuleren';
$html_no_mail = 'Geen nieuwe berichten';
$html_logout = 'Uitloggen';
$html_msg = 'Bericht';
$html_msgs = 'Berichten';
$html_configuration = 'Deze server is niet correct ingesteld';
$html_priority = 'Prioriteit';
$html_low = 'Laag';
$html_normal = 'Normaal';
$html_high = 'Hoog';
$html_receipt = 'Ontvangstbevestiging';
$html_select = 'Selecteer';
$html_select_all = 'Selectie omdraaien';
$html_loading_image = 'Plaatje laden';
$html_send_confirmed = 'Het bericht is verzonden';
$html_no_sendaction = 'Geen actie gespecificeerd. Evt. JavaScript aanzetten.';
$html_error_occurred = 'Er is een fout opgetreden';
$html_prefs_file_error = 'Het instellingenbestand kan niet worden geopend.';
$html_wrap = 'Wrap uitgaande berichten naar :';
$html_wrap_none = 'None'; //to translate
$html_usenet_separator = 'Gebruik separator ("-- \n") voor de handtekening';
$html_mark_as = 'Markeer als';
$html_read = 'Lees';
$html_unread = 'niet gelezen';
$html_mail_sent = 'Message successfully sent'; // to translate
$html_encoding = 'Character encoding'; // to translate

// Contacts manager
$html_add = 'Voeg toe';
$html_contacts = 'Contacten';
$html_modify = 'Verander';
$html_back = 'Terug';
$html_contact_add = 'Voeg nieuw contact toe';
$html_contact_mod = 'Verander een contact';
$html_contact_first = 'Voornaam';
$html_contact_last = 'Achternaam';
$html_contact_nick = 'Nick';
$html_contact_mail = 'email';
$html_contact_list = 'Contact lijst van ';
$html_contact_del = 'van de contact lijst';

$html_contact_err1 = 'Maximale nummer van contact is ';
$html_contact_err2 = 'Je kan niet een nieuw contact toevoegen';
$html_contact_err3 = 'Je hebt geen toegang  tot de contact lijst';
$html_del_msg = 'Verwijder geselecteerde berichten ?';
$html_down_mail = 'Download';

$original_msg = '--Oorspronkelijk Bericht--';
$to_empty = 'Het \'Aan\'-veld kan niet leeg zijn !';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'Verbinding kan niet worden geopend';
$html_smtp_error_unexpected = 'Onverwacht antwoord:';

// IMAP messages (class_local.php)
$lang_could_not_connect = 'Verbinding met de server kan niet worden geinitialiseerd';
$lang_invalid_msg_num = 'Bad Message Number';  //to translate

$html_file_upload_attack = 'Mogelijk bestandsupload aanval';
$html_invalid_email_address = 'Ongeldig e-mail adres';
$html_invalid_msg_per_page = 'Ongeldig nummer van de berichten per pagina';  
$html_invalid_wrap_msg = 'Ongeldig bericht wrap breedte';
$html_seperate_msg_win = 'Berichten in apart venster';

// Exceptions
$html_err_file_contacts = 'Niet mogelijk om de contactlijst te openen om naar te schrijven.';
?>
