<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/nl.php,v 1.61 2008/02/09 12:35:59 goddess_skuld Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for Dutch, the language of The Netherlands
 * Translation by Sander Schroevers and Pieterjan Goppel
 *  <lp_leeki@euronet.nl>
 *  Some adding by Mathijs Kolenberg <mack@solcon.nl>
 *  Some adding/modification by Silvan Jongerius <sjongerius@duxy.nl>
 *  Some adding/modification by openfan <leprincevelours@yahoo.com>
 */

$charset = 'UTF-8';

// Configuration for the days and months

// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = 'nl_NL.UTF-8';

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
$default_time_format = '%H:%M';

// Here is the configuration for the HTML

$err_user_empty = 'Het inlogveld is nog leeg';
$err_passwd_empty = 'Het wachtwoordveld is nog leeg';

// html message
$alt_delete = 'Verwijder geselecteerde berichten';
$alt_delete_one = 'Verwijder dit bericht';
$alt_new_msg = 'Nieuwe berichten';
$alt_reply = 'Antwoord de verzender';
$alt_reply_all = 'Antwoord allemaal';
$alt_forward = 'Doorzenden';
$alt_next = 'Volgende';
$alt_prev = 'Vorige';
$title_next_page = 'Volgende pagina';
$title_prev_page = 'Vorige pagina';
$title_next_msg = 'Volgend bericht';
$title_prev_msg = 'Vorig bericht';
$html_on = 'aan';
$html_theme = 'Weergave';

// index.php
$html_lang = 'Taal';
$html_welcome = 'Welkom bij';
$html_login = 'Loginnaam';
$html_passwd = 'Wachtwoord';
$html_submit = 'Verzenden';
$html_help = 'Help';
$html_server = 'Server';
$html_wrong = 'Loginnaam of Wachtwoord is onjuist';
$html_retry = 'Probeer opnieuw';
$html_remember = "Onthoud instellingen";

// prefs.php
$html_msgperpage = 'Berichten per pagina';
$html_preferences = 'Instellingen';
$html_full_name = 'Volledige Naam';
$html_email_address = 'E-mailadres';
$html_ccself = 'Cc naar eigen e-mailadres';
$html_hide_addresses = 'E-mailadressen verbergen';
$html_outlook_quoting = 'Oorspronkelijk bericht in Outlook-stijl aanhalen';
$html_reply_to = 'Antwoord naar';
$html_use_signature = 'Gebruik handtekening';
$html_signature = 'Handtekening';
$html_reply_leadin = 'Antwoord op inleiding';
$html_prefs_updated = 'Instellingen opgeslagen';
$html_manage_folders_link = 'Beheer IMAP Mappen';
$html_manage_filters_link = 'Beheer E-mail Filters';
$html_use_graphical_smilies = 'Gebruik grafische smiley\'s';
$html_sent_folder = 'Kopieer verzonden berichten naar map'; 
$html_trash_folder = 'Move deleted mails into a dedicated folder'; // to translate
$html_colored_quotes = 'Gekleurd aanhalen';
$html_display_struct = 'Toon gestructureerde tekst';
$html_send_html_mail = 'Zend berichten in HTML formaat';

// folders.php
$html_folders = 'Folders';  //to translate
$html_folders_create_failed = 'Map kon niet worden gemaakt!';
$html_folders_sub_failed = 'Abonneren op map is mislukt!';
$html_folders_unsub_failed = 'Niet meer abonneren op map is mislukt!';
$html_folders_rename_failed = 'Map kan niet worden hernoemd!';
$html_folders_updated = 'Mappen bijgewerkt';
$html_folder_subscribe = 'Abonneren op map:';
$html_folder_rename = 'Hernoem map:';
$html_folder_create = 'Maak nieuwe map genaamd:';
$html_folder_remove = 'Niet meer abonneren op map:';
$html_folder_delete = 'Verwijder map:';
$html_folder_to = 'naar:';

// filters.php
$html_filter_remove = 'Verwijder';
$html_filter_body = 'Berichtinhoud';
$html_filter_subject = 'Onderwerp veld';
$html_filter_to = 'Naar veld';
$html_filter_cc = 'Cc veld';
$html_filter_from = 'Van veld';
$html_filter_change_tip = 'Verander een filter door deze eenvoudigweg te overschrijven.';
$html_reapply_filters = 'Opnieuw filters toepassen:';
$html_filter_contains = 'bevat:';
$html_filter_name = 'Naam filter';
$html_filter_action = 'Actie filter';
$html_filter_moveto = 'Verplaats naar map:';

// Other pages
$html_select_one = '-- Selecteer --';
$html_and = 'En';
$html_new_msg_in = 'Nieuw bericht in';
$html_or = 'of';
$html_move = 'Verplaats';
$html_copy = 'Kopieer';
$html_messages_to = 'berichten naar';
$html_gotopage = 'Ga naar pagina';
$html_gotofolder = 'Ga naar map';
$html_other_folders = 'Mappenlijst';
$html_page = 'Pagina';
$html_of = 'of';
$html_view_header = 'Berichtkoppen tonen';
$html_remove_header = 'Berichtkoppen verbergen';
$html_inbox = 'Postvak In';
$html_new_msg = 'Nieuw Bericht';
$html_reply = 'Antwoorden';
$html_reply_short = 'Betreft:';
$html_reply_all = 'Antwoord Allen';
$html_forward = 'Doorsturen';
$html_forward_short = 'Doorgestuurd:';
$html_forward_info = 'Het doorgezonden bericht zal als bijlage van dit bericht verstuurd worden.'; 
$html_delete = 'Verwijder';
$html_new = 'Nieuw';
$html_mark = 'Verwijder';
$html_att = 'Bijlage';
$html_atts = 'Bijlagen';
$html_att_unknown = '[onbekend]';
$html_attach = 'Voeg toe';
$html_attach_forget = 'Bijlage moet nog toegevoegd worden voor verzending!';
$html_attach_delete = 'Verwijder selectie';
$html_attach_none = 'Selecteer eerst een bestand als bijlage!';
$html_sort_by = 'Sorteer op';
$html_sort = 'Sorteer';
$html_from = 'Van';
$html_subject = 'Onderwerp';
$html_date = 'Datum';
$html_sent = 'Verzonden';
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
$html_no_mail = 'Geen berichten';
$html_logout = 'Uitloggen';
$html_msg = 'Bericht';
$html_msgs = 'Berichten';
$html_configuration = 'Deze server is niet goed geconfigureerd';
$html_priority = 'Prioriteit';
$html_low = 'Laag';
$html_normal = 'Normaal';
$html_high = 'Hoog';
$html_receipt = 'Ontvangstbevestiging';
$html_select = 'Selecteer';
$html_select_all = 'Selectie omdraaien';
$html_loading_image = 'Afbeelding laden';
$html_send_confirmed = 'Het bericht is verzonden';
$html_no_sendaction = 'Geen actie gespecificeerd, zet eventueel JavaScript aan.';
$html_error_occurred = 'Er is een fout opgetreden';
$html_prefs_file_error = 'Het instellingenbestand kan niet worden geopend.';
$html_wrap = 'Terugloopbreedte voor uitgaande berichten:';
$html_wrap_none = 'Geen terugloop'; 
$html_usenet_separator = 'Gebruik scheidingslijn ("-- \n") voor handtekening';
$html_mark_as = 'Markeer als';
$html_read = 'Gelezen';
$html_unread = 'Ongelezen';
$html_encoding = 'Karakterset';

// Contacts manager
$html_add = 'Toevoegen';
$html_contacts = 'Contactpersonen';
$html_modify = 'Wijzig';
$html_back = 'Terug';
$html_contact_add = 'Nieuw contactpersoon toevoegen';
$html_contact_mod = 'Wijzig contactpersoon';
$html_contact_first = 'Voornaam';
$html_contact_last = 'Achternaam';
$html_contact_nick = 'Bijnaam';
$html_contact_mail = 'E-mailadres';
$html_contact_list = 'Contactlijst van ';
$html_contact_del = 'van de contactlijst';

$html_contact_err1 = 'Het maximaal aantal contactpersonen is ';
$html_contact_err2 = 'Er kan geen nieuw contactpersoon toegevoegd worden';
$html_contact_err3 = 'Geen toegang tot de contactlijst';
$html_del_msg = 'Verwijder geselecteerde berichten?';
$html_down_mail = 'Download';

$original_msg = '-- Oorspronkelijk Bericht --';
$to_empty = 'Het \'Aan\' veld kan niet leeg zijn!';

// Images warning
$html_images_warning = 'Voor uw veiligheid worden afbeeldingen niet weergegeven.';
$html_images_display = 'Toon afbeeldingen'; 

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'Verbinding kan niet worden gemaakt';
$html_smtp_error_unexpected = 'Onverwacht antwoord:';

// IMAP messages (class_local.php)
$lang_could_not_connect = 'Verbinding kan niet worden gemaakt';
$lang_invalid_msg_num = 'Ongeldig berichtnummer';  

$html_file_upload_attack = 'Mogelijk illegale poging om bestand te uploaden';
$html_invalid_email_address = 'Ongeldig e-mailadres';
$html_invalid_msg_per_page = 'Ongeldig aantal berichten per pagina';  
$html_invalid_wrap_msg = 'Ongeldige terugloopbreedte van het bericht';
$html_seperate_msg_win = 'Berichten in nieuw venster weergeven';

// Exceptions
$html_err_file_contacts = 'Er kan niet naar de contactlijst geschreven worden.';
$html_session_file_error = 'Er kan niet naar het sessiebestand geschreven worden.';
$html_login_not_allowed = 'Deze gebruiker mag geen connectie maken.';
?>
