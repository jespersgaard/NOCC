<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/it.php,v 1.18 2001/11/28 19:02:17 nicocha Exp $
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

// What language to use (Here, italian IT--> it_IT)
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


// index.php

$html_lang = 'Lingua';
$html_welcome = 'Benvenuto in ';
$html_login = 'Login';
$html_passwd = 'Password';
$html_submit = 'Ok';
$html_help = 'Aiuto';
$html_server = 'Server';
$html_wrong = 'Login o password non corretti';
$html_retry = 'Riprova';
$html_on = 'sicuro';
$html_theme = 'Tema';

// prefs.php

$html_preferences = 'Preferenze';
$html_full_name = 'Nome';
$html_email_address = 'Indirizzo E-mail';
$html_ccself = 'Cc self';
$html_hide_addresses = 'Nascondi indirizzo';
$html_outlook_quoting = 'Outlook-style quoting';
$html_reply_to = 'Rispondi a';
$html_use_signature = 'Usa la firma';
$html_signature = 'Firma';
$html_prefs_updated = 'Preferenze aggiornate';

// Other pages

$html_view_header = 'Mostra intestazione';
$html_remove_header = 'Nascondi intestazione';
$html_inbox = 'Inbox';
$html_new_msg = 'Scrivi';
$html_reply = 'Rispondi';
$html_reply_short = 'Re';
$html_reply_all = 'Rispondi a tutti';
$html_forward = 'Inoltra';
$html_forward_short = 'Fw';
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
$html_configuration = 'Questo server non e configurato correttamente !';
$html_priority = 'Priorita';
$html_low = 'Bassa';
$html_normal = 'Normale';
$html_high = 'Alta';
$html_select = 'Seleziona';
$html_select_all = 'Seleziona tutto';
$html_loading_image = 'Apertura immagine';
$html_send_confirmed = 'La tua e-mail e stata accettata per la consegna';
$html_no_sendaction = 'Nessuna azione specificata. Provare ad abilitare JavaScript.';
$html_error_occurred = 'Si e verificato un errore';
$html_prefs_file_error = 'Impossibile aprire il file di preferences per la modifica.';
$html_sig_file_error = 'Impossibile aprire il file di firma per la modifica.';

$original_msg = '-- Messaggio Originale --';
$to_empty = 'Il campo \'A\' non può essere vuoto !';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = "Impossibile stabilire una connessione";
$html_smtp_error_unexpected = "Unexpected response:";
$lang_could_not_connect = 'Could not connect to server';  //to translate
?>
