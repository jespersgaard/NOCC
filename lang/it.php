<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/it.php,v 1.34 2004/06/24 17:32:50 goddess_skuld Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the Italian language
 * Translation by Guido Venturini <guido@technojuice.com> and Francesco Andreozzi <ozzo@lauratiamo.it>
 */

$charset = 'ISO-8859-1';

// Configuration for the days and months

// What language to use (Here, italian IT --> it_IT)
// see '/usr/share/locale/' for more information
$lang_locale = 'it_IT';

// Text Alignment
// Can be right-to-left (rtl) which is needed for proper Arabic, Hebrew
// Or left-to-right (ltr) which is default for most languages
$lang_dir = 'ltr';

// What format string should we pass to strftime() for messages sent on
// days other than today?
$default_date_format = '%A %d %B %Y';

// If the local is not implemented on the host, how we display the date
$no_locale_date_format = '%d-%m-%Y';

// What format string should we pass to strftime() for messages sent
// today?
$default_time_format = '%H:%M';


// Here is the configuration for the HTML

$err_user_empty = 'Campo di login vuoto';
$err_passwd_empty = 'Non hai digitato la password';


// html message

$alt_delete = 'Elimina il messaggio selezionato';
$alt_delete_one = 'Elimina il messaggio';
$alt_new_msg = 'Nuovo messaggio';
$alt_reply = 'Rispondi al Mittente';
$alt_reply_all = 'Rispondi a tutti';
$alt_forward = 'Inoltra';
$alt_next = 'Prossimo';
$alt_prev = 'Precedente';
$html_on = 'sicuro';
$html_theme = 'Tema';

// index.php

$html_lang = 'Lingua';
$html_welcome = 'Benvenuto in ';
$html_login = 'Login';  //to translate
$html_passwd = 'Password';  //to translate
$html_submit = 'Ok';  //to translate
$html_help = 'Aiuto';
$html_server = 'Server';  //to translate
$html_wrong = 'Login o password non corretti';
$html_retry = 'Riprova';

// prefs.php

$html_msgperpage = 'Messages per page';  //to translate
$html_preferences = 'Preferenze';
$html_full_name = 'Nome';
$html_email_address = 'Indirizzo E-mail';
$html_ccself = 'Cc self';
$html_hide_addresses = 'Nascondi indirizzo';
$html_outlook_quoting = 'Outlook-style quoting';
$html_reply_to = 'Rispondi a';
$html_use_signature = 'Usa la firma';
$html_signature = 'Firma';
$html_reply_leadin = 'Reply Leadin';  //to translate
$html_prefs_updated = 'Preferenze aggiornate';
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
$html_view_header = 'Mostra intestazione';
$html_remove_header = 'Nascondi intestazione';
$html_inbox = 'Inbox';  //to translate
$html_new_msg = 'Scrivi';
$html_reply = 'Rispondi';
$html_reply_short = 'Re';  //to translate
$html_reply_all = 'Rispondi a tutti';
$html_forward = 'Inoltra';
$html_forward_short = 'Fw';  //to translate
$html_delete = 'Elimina';
$html_new = 'Nuovo';
$html_mark = 'Elimina';
$html_att = 'Allegato';
$html_atts = 'Allegati';
$html_att_unknown = '[sconosciuto]';
$html_attach = 'Allegato';
$html_attach_forget = 'Devi allegare il file prima di inviare il messaggio !';
$html_attach_delete = 'Elimina i files selezionati';
$html_sort_by = 'Ordina per';
$html_from = 'da';
$html_subject = 'Oggetto';
$html_date = 'Data';
$html_sent = 'Invia';
$html_wrote = 'wrote';  //to translate
$html_size = 'Dimensione';
$html_totalsize = 'Dimensione Totale';
$html_kb = 'Kb';  //to translate
$html_bytes = 'bytes';  //to translate
$html_filename = 'File';  //to translate
$html_to = 'A';
$html_cc = 'Cc';  //to translate
$html_bcc = 'Bcc';  //to translate
$html_nosubject = 'Senza Oggetto';
$html_send = 'Invia';
$html_cancel = 'Annulla';
$html_no_mail = 'Non vi sono nuovi messaggi.';
$html_logout = 'Esci';
$html_msg = 'Messaggio';
$html_msgs = 'Messaggi';
$html_configuration = 'Questo server non e configurato correttamente !';
$html_priority = 'Priorita';
$html_low = 'Bassa';
$html_normal = 'Normale';
$html_high = 'Alta';
$html_receipt = 'Request a return receipt';
$html_select = 'Seleziona';
$html_select_all = 'Invert Selection';  //to translate
$html_loading_image = 'Apertura immagine';
$html_send_confirmed = 'La tua e-mail e stata accettata per la consegna';
$html_no_sendaction = 'Nessuna azione specificata. Provare ad abilitare JavaScript.';
$html_error_occurred = 'Si e verificato un errore';
$html_prefs_file_error = 'Impossibile aprire il file di preferences per la modifica.';
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

$original_msg = '-- Messaggio Originale --';
$to_empty = 'Il campo \'A\' non può essere vuoto !';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'Impossibile stabilire una connessione';
$html_smtp_error_unexpected = 'Unexpected SMTP response:';  //to translate

// IMAP messages (class_local.php)
$lang_could_not_connect = 'Could not connect to server';  //to translate

$html_file_upload_attack = 'Possible file upload attack';  //to translate
$html_invalid_email_address = 'Invalid e-mail address';  //to translate
$html_invalid_msg_per_page = 'Invalid number of messages per page';  //to translate
$html_invalid_wrap_msg = 'Invalid message wrap width';  //to translate
$html_seperate_msg_win = 'Messages in separate window';  //to translate

// Exceptions
$html_err_file_contacts = 'Unable to open contacts file for writing.'; //to translate
?>
