<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/no.php,v 1.14 2004/06/15 10:37:09 goddess_skuld Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the norwegian language
 * Translation by Rune Dalmo <runed@balder.narviknett.no>
 */

$charset = 'ISO-8859-1';

// Configuration for the days and months

// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = 'no';

// Text Alignment
// Can be right-to-left (rtl) which is needed for proper Arabic, Hebrew
// Or left-to-right (ltr) which is default for most languages
$lang_dir = 'ltr';

// What format string should we pass to strftime() for messages sent on
// days other than today?
$default_date_format = '%d.%m.%y'; 

// If the local is not implemented on the host, how we display the date
$no_locale_date_format = '%d.%m.%y';

// What format string should we pass to strftime() for messages sent
// today?
$default_time_format = '%I:%M %p';


// Here is the configuration for the HTML

$err_user_empty = 'Brukernavn er ikke spesifisert';
$err_passwd_empty = 'Passord er ikke spesifisert';


// html message

$alt_delete = 'Slett alle markerte meldinger';
$alt_delete_one = 'Slett markert melding';
$alt_new_msg = 'Nye meldinger';
$alt_reply = 'Svar til avsenderen';
$alt_reply_all = 'Svar til alle';
$alt_forward = 'Videresend';
$alt_next = 'Neste melding';
$alt_prev = 'Forrige melding';
$html_on = 'til';
$html_theme = 'Tema';

// index.php

$html_lang = 'Språk';
$html_welcome = 'Velkommen til';
$html_login = 'Brukernavn';
$html_passwd = 'Passord';
$html_submit = 'Logg inn';
$html_help = 'Hjelp';
$html_server = 'Server';
$html_wrong = 'Brukernavn eller passord er feil';
$html_retry = 'Prøv igjen';

// prefs.php

$html_msgperpage = 'Beskjeder pr. side';
$html_preferences = 'Innstillinger';
$html_full_name = 'Fullt navn';
$html_email_address = 'E-post - adresse';
$html_ccself = 'Cc selv';
$html_hide_addresses = 'Skjul adresser';
$html_outlook_quoting = 'Outlook-liknende sitering';
$html_reply_to = 'Svar til';
$html_use_signature = 'Bruk signatur';
$html_signature = 'Signatur';
$html_reply_leadin = 'Reply Leadin';  //to translate
$html_prefs_updated = 'Innstillinger oppdatert';
$html_manage_folders_link = 'Manage IMAP Folders';  //to translate
$html_manage_filters_link = 'Manage Email Filters';  //to translate
$html_use_graphical_smilies = 'Use graphical smilies'; //to translate

// folders.php
$html_folders_create_failed = 'Folder could not be created!';  //to translate
$html_folders_sub_failed = 'Could not subscribed to folder!';  //to translate
$html_folders_unsub_failed = 'Could not unsubscribed from foder!';  //to translate
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
$html_view_header = 'Vis overskrift';
$html_remove_header = 'Skjul overskrift';
$html_inbox = 'Innboks';
$html_new_msg = 'Skriv';
$html_reply = 'Svar';
$html_reply_short = 'Sv';
$html_reply_all = 'Svar til alle';
$html_forward = 'Videresend';
$html_forward_short = 'Vs';
$html_delete = 'Slett';
$html_new = 'Ny';
$html_mark = 'Slett';
$html_att = 'Vedlagt fil';
$html_atts = 'Vedlagte filer';
$html_att_unknown = '[ukjent]';
$html_attach = 'Legg til';
$html_attach_forget = 'Du må legge til filen før du kan sende meldingen !';
$html_attach_delete = 'Fjern markerte vedlegg';
$html_sort_by = 'Sort by';  //to translate
$html_from = 'Fra';
$html_subject = 'Emne';
$html_date = 'Dato';
$html_sent = 'Sendt';
$html_wrote = 'wrote';  //to translate
$html_size = 'Størrelse';
$html_totalsize = 'Total Størrelse';
$html_kb = 'Kb';  //to translate
$html_bytes = 'bytes';  //to translate
$html_filename = 'Filnavn';
$html_to = 'Til';
$html_cc = 'Cc';  //to translate
$html_bcc = 'Bcc';  //to translate
$html_nosubject = 'Intet emne';
$html_send = 'Send';  //to translate
$html_cancel = 'Annuller';
$html_no_mail = 'Ingen meldinger';
$html_logout = 'Logg av';
$html_msg = 'Melding';
$html_msgs = 'Meldinger';
$html_configuration = 'Denne serveren er ikke satt opp riktig !';
$html_priority = 'Prioritet';
$html_low = 'Lav';
$html_normal = 'Normal';  //to translate
$html_high = 'Høy';
$html_receipt = 'Krev en leveringsbekreftelse';
$html_select = 'Velg';
$html_select_all = 'Velg alle';
$html_loading_image = 'Laster bilde';
$html_send_confirmed = 'Din e-post ble akseptert for levering';
$html_no_sendaction = 'Ingen handling spesifisert. Prøv å aktivere JavaScript.';
$html_error_occurred = 'En feil oppstod';
$html_prefs_file_error = 'Ikke mulig å åpne innstillingsfilen for skriving (lagring).';
$html_wrap = 'Wrap outgoing messages to :';  //to translate
$html_usenet_separator = 'Usenet separator ("-- \n") Before signature';  //to translate
$html_mark_read = 'Mark as read'; //to translate
$html_mark_unread = 'Mark as unread'; //to translate

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

$original_msg = '-- Opprinnelig melding --';
$to_empty = 'Feltet \'Til\' kan ikke være tomt !';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'Ikke mulig å oppnå forbindelse';
$html_smtp_error_unexpected = 'Uventet svar:';

// IMAP messages (class_local.php)
$lang_could_not_connect = 'Kunne ikke oppnå tilkobling mot server';

$html_file_upload_attack = 'Muligens filopplastingsangrep';
$html_invalid_email_address = 'Invalid e-mail address';  //to translate
$html_seperate_msg_win = 'Messages in separate window';  //to translate
?>
