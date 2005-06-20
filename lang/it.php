<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/it.php,v 1.42 2005/05/01 20:45:56 goddess_skuld Exp $
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
$html_login = 'Utente';
$html_passwd = 'Password';
$html_submit = 'Ok';
$html_help = 'Aiuto';
$html_server = 'Server';
$html_wrong = 'Login o password non corretti';
$html_retry = 'Riprova';
$html_remember = "Remember settings"; //to translate

// prefs.php

$html_msgperpage = 'Messaggi per pagina';
$html_preferences = 'Preferenze';
$html_full_name = 'Nome';
$html_email_address = 'Indirizzo E-mail';
$html_ccself = 'auto Cc proprio indizzo';
$html_hide_addresses = 'Nascondi indirizzo';
$html_outlook_quoting = 'Quote Outlook-style';
$html_reply_to = 'Rispondi a';
$html_use_signature = 'Usa la firma';
$html_signature = 'Firma';
$html_reply_leadin = 'Prefisso per risposte';
$html_prefs_updated = 'Preferenze aggiornate';
$html_manage_folders_link = 'Configura Cartelle IMAP';
$html_manage_filters_link = 'Configura Filtri Email';
$html_use_graphical_smilies = 'Usa smilies grafici';
$html_sent_folder = 'Copy sent mails into a dedicated folder'; //to translate

// folders.php
$html_folders_create_failed = 'La cartella non può essere creata!';
$html_folders_sub_failed = 'Impossibile connettersi alla cartella!';
$html_folders_unsub_failed = 'Impossibile disconnettersi dalla cartella!';
$html_folders_rename_failed = 'La cartella non può essere rinominata!';
$html_folders_updated = 'Cartelle aggiornate';
$html_folder_subscribe = 'Connettiti a'; 
$html_folder_rename = 'Rinomina';
$html_folder_create = 'Crea una nuova cartella con nome';
$html_folder_remove = 'Disconnettiti da';
$html_folder_delete = 'Elimina';

// filters.php
$html_filter_remove = 'Cancella';
$html_filter_body = 'Corpo del messaggio';
$html_filter_subject = 'Soggetto';
$html_filter_to = 'Campo To';
$html_filter_cc = 'Campo Cc';
$html_filter_from = 'Campo From';
$html_filter_change_tip = 'Sovrascrivere direttamente un filtro per cambiarlo.';
$html_reapply_filters = 'Riapplica tutti i filtri';
$html_filter_contains = 'contiene';  
$html_filter_name = 'Nome filtro';
$html_filter_action = 'Azione filtro';
$html_filter_moveto = 'Sposta in';

// Other pages
$html_select_one = '--Seleziona Uno--';
$html_and = 'e';  
$html_new_msg_in = 'Nuovo messaggio in';
$html_or = 'o';
$html_move = 'Sposta';
$html_copy = 'Copia';
$html_messages_to = 'Messaggi selezionati in';
$html_gotopage = 'Vai alla Pagina';
$html_gotofolder = 'Vai alla Cartella';
$html_other_folders = 'Lista Cartelle';
$html_page = 'Pagina';
$html_of = 'di';
$html_to = 'a';  
$html_view_header = 'Mostra intestazione';
$html_remove_header = 'Nascondi intestazione';
$html_inbox = 'Posta in Arrivo';
$html_new_msg = 'Scrivi';
$html_reply = 'Rispondi';
$html_reply_short = 'Re';
$html_reply_all = 'Rispondi a tutti';
$html_forward = 'Inoltra';
$html_forward_short = 'Fw';
$html_forward_info = 'The forwarded message will be send as an attachment to this one.'; //to translate
$html_delete = 'Elimina';
$html_new = 'Nuovo';
$html_mark = 'Elimina';
$html_att = 'Allegato';
$html_atts = 'Allegati';
$html_att_unknown = '[sconosciuto]';
$html_attach = 'Allega';
$html_attach_forget = 'Devi allegare il file prima di inviare il messaggio !';
$html_attach_delete = 'Elimina i files selezionati';
$html_attach_none = 'You must select a file to attach!';  //to translate
$html_sort_by = 'Ordina per';
$html_from = 'da';
$html_subject = 'Oggetto';
$html_date = 'Data';
$html_sent = 'Invia';
$html_wrote = 'scritto';
$html_size = 'Dimensione';
$html_totalsize = 'Dimensione Totale';
$html_kb = 'Kb';
$html_bytes = 'bytes'; 
$html_filename = 'File';
$html_to = 'A';
$html_cc = 'Cc';
$html_bcc = 'Bcc';
$html_nosubject = 'Senza Oggetto';
$html_send = 'Invia';
$html_cancel = 'Annulla';
$html_no_mail = 'Non vi sono nuovi messaggi.';
$html_logout = 'Esci';
$html_msg = 'Messaggio';
$html_msgs = 'Messaggi';
$html_configuration = 'Questo server non è configurato correttamente!';
$html_priority = 'Priorita';
$html_low = 'Bassa';
$html_normal = 'Normale';
$html_high = 'Alta';
$html_receipt = 'Richiedi conferma di recapito';
$html_select = 'Seleziona';
$html_select_all = 'Inverti Selezione';
$html_loading_image = 'Apertura immagine';
$html_send_confirmed = 'La tua e-mail e stata accettata per la consegna';
$html_no_sendaction = 'Nessuna azione specificata. Provare ad abilitare JavaScript.';
$html_error_occurred = 'Si e verificato un errore';
$html_prefs_file_error = 'Impossibile aprire il file di preferences per la modifica.';
$html_wrap = 'Nuovo testo a capo alla colonna:';
$html_wrap_none = 'None'; //to translate
$html_usenet_separator = 'Separatore ("-- \n") prima della firma';
$html_mark_as = 'Contrassegna come';
$html_read = 'letto';
$html_unread = 'non letto';
$html_mail_sent = 'Message successfully sent'; // to translate

// Contacts manager
$html_add = 'Nuovo';
$html_contacts = 'Contatti';
$html_modify = 'Modifica';
$html_back = 'Indietro';
$html_contact_add = 'Aggiungi nuovo contatto';
$html_contact_mod = 'Modifica un contatto';
$html_contact_first = 'Nome';
$html_contact_last = 'Cognome';
$html_contact_nick = 'Nick';
$html_contact_mail = 'Mail';
$html_contact_list = 'Lista dei Contatti di ';
$html_contact_del = 'dalla lista dei contatti';

$html_contact_err1 = 'Il numero massimo dei contatti è ';
$html_contact_err2 = 'Non puoi aggiungere altri contatti';
$html_contact_err3 = 'Non hai i privilegi necessari per accedere alla lista contatti';
$html_del_msg = 'Eliminare i messaggi selezionati ?';
$html_down_mail = 'Download';

$original_msg = '-- Messaggio Originale --';
$to_empty = 'Il campo \'A\' non può essere vuoto !';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'Impossibile stabilire una connessione';
$html_smtp_error_unexpected = 'Risposta inattesa dal server SMTP:';

// IMAP messages (class_local.php)
$lang_could_not_connect = 'Non è possibile connettersi al server';
$lang_invalid_msg_num = 'Bad Message Number';  //to translate

$html_file_upload_attack = 'Possibile file upload attack'; //to translate
$html_invalid_email_address = 'Indirizzo e-mail non valido';
$html_invalid_msg_per_page = 'Numero di messaggi per pagina non valido';
$html_invalid_wrap_msg = 'Ampiezza testo a capo non valida';
$html_seperate_msg_win = 'Messaggi in finestre separate';

// Exceptions
$html_err_file_contacts = 'Impossibile aprire in scrittura il file dei contatti.'; 
?>
