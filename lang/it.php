<?
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/it.php,v 1.1 2000/12/02 03:22:45 nicocha Exp $
 *
 * Copyright 2000 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2000 Olivier Cahagne <cahagn_o@epita.fr>
 * italian translation Guido Venturini <guido@technojuice.com>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the italian language
 */

$charset = "ISO-8859-1";

// Configuration for the days and months

// What language to use (Here, italian IT--> it_IT)
// see '/usr/share/locale/' for more information
$lang_locale = "it_IT";

// What format string should we pass to strftime() for messages sent on
// days other than today?
$default_date_format = "%A %d %B %Y";

// If the local is not implemented on the host, how we display the date
$no_locale_date_format = "%d-%m-%Y";

// What format string should we pass to strftime() for messages sent
// today?
$default_time_format = "%I:%M %p";


// Here is the configuration for the HTML

$err_user_empty = "Campo di login vuoto";
$err_passwd_empty = "Campo password vuoto";


// html message

$alt_delete = "Elimina il messaggio selezionato";
$alt_delete_one = "Elimina il messaggio";
$alt_new_msg = "Nuovo messaggio";
$alt_reply = "Rispondi al Mittente";
$alt_reply_all = "Rispondi a tutti";
$alt_forward = "Inoltra";
$alt_next = "Prossimo";
$alt_prev = "Precedente";


// index.php

$html_welcome = "Benvenuto a";
$html_login = "Login";
$html_passwd = "Password";
$html_submit = "Ok";
$html_help = "Aiuto";
$html_server = "Server";
$html_wrong = "Login o password non corretti";
$html_retry = "Riprova";

// Other pages

$html_view_header = "Mostra intestazione";
$html_remove_header = "Nascondi intestazione";
$html_inbox = "Inbox";
$html_new_msg = "Scrivi";
$html_reply = "Rispondi";
$html_reply_short = "Re";
$html_reply_all = "Rispondi a tutti";
$html_forward = "Inoltra";
$html_forward_short = "Fw";
$html_delete = "elimina";
$html_new = "Nuovo";
$html_mark = "elimina";
$html_att = "Allegato";
$html_atts = "Allegati";
$html_att_unknown = "[sconosciuto]";
$html_from = "da";
$html_subject = "Oggetto";
$html_date = "Data";
$html_sent = "Invia";
$html_size = "Dimensione";
$html_kb = "Kb";
$html_to = "A";
$html_cc = "Cc";
$html_bcc = "Bcc";
$html_nosubject = "Senza Oggetto";
$html_send = "Invia";
$hmtl_cancel = "Annulla";
$html_no_mail = "Non vi sono nuovi messaggi.";
$html_logout = "Esci";
$html_msg = "Messaggio";
$html_msgs = "Messagggi";

$original_msg = "-- Messaggio Originale --";
$to_empty = "Il campo 'A' non può essere vuoto !";
?>
