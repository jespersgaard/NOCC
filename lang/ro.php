<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/ro.php,v 1.45 2001/11/18 17:53:32 wolruf Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the romanian language 
 * Translation by Nicu Buculei <nicubunu@yahoo.com>
 * 
 */

$charset = 'ISO-8859-2';

// Configuration for the days and months

// What language to use (Here, english US --> en_US)
// see '/usr/share/locale/' for more information
$lang_locale = 'ro_RO';

// Text Alignment
// Can be right-to-left (rtl) which is needed for proper Arabic, Hebrew
// Or left-to-right (ltr) which is default for most languages
$lang_dir = 'ltr';

// What format string should we pass to strftime() for messages sent on
// days other than today?
$default_date_format = '%Y-%m-%d'; 

// If the local is not implemented on the host, how we display the date
$no_locale_date_format = '%Y-%m-%d';

// What format string should we pass to strftime() for messages sent
// today?
$default_time_format = '%I:%M %p';


// Here is the configuration for the HTML

$err_user_empty = 'Nu ati introdus numele';
$err_passwd_empty = 'Nu ati introdus parola';


// html message

$alt_delete = 'Stergere mesaje selectate';
$alt_delete_one = 'Stergere mesaj';
$alt_new_msg = 'Mesaj nou';
$alt_reply = 'Raspuns';
$alt_reply_all = 'Raspuns tuturor';
$alt_forward = 'Redirectionare';
$alt_next = 'Mesaj urmator';
$alt_prev = 'Mesaj anterior';
$html_on = 'activ';
$html_theme = 'Tema';

// index.php

$html_lang = 'Limba';
$html_welcome = 'Bun venit la';
$html_login = 'Nume';
$html_passwd = 'Parola';
$html_submit = 'Trimit';
$html_help = 'Ajutor';
$html_server = 'Server';
$html_wrong = 'Numele sau parola sunt incorecte';
$html_retry = 'Alta incercare';

// prefs.php

$html_preferences = 'Preferinte';
$html_full_name = 'Nume complet';
$html_email_address = 'Adresa e-mail';
$html_ccself = 'Cc auto';
$html_hide_addresses = 'Ascunde adrese';
$html_outlook_quoting = 'Cotare in stil Outlook';
$html_reply_to = 'Raspuns';
$html_use_signature = 'Folosire semnatura';
$html_signature = 'Semnatura';
$html_prefs_updated = 'Actualizare preferinte';

// Other pages

$html_view_header = 'Vizualizare header';
$html_remove_header = 'Ascundere header';
$html_inbox = 'Inbox';
$html_new_msg = 'Mesaj Nou';
$html_reply = 'Raspuns';
$html_reply_short = 'Re';
$html_reply_all = 'Raspuns tuturor';
$html_forward = 'Redirectionare';
$html_forward_short = 'Fw';
$html_delete = 'Stergere';
$html_new = 'Nou';
$html_mark = 'Stergere';
$html_att = 'Fisier atasat';
$html_atts = 'Fisiere atasate';
$html_att_unknown = '[necunoscut]';
$html_attach = 'Atasare';
$html_attach_forget = 'Trebuie atasat fisierul inainte de a trimite mesajul !';
$html_attach_delete = 'Stergere selectie';
$html_sort_by = 'Sortare dupa';
$html_from = 'De la';
$html_subject = 'Subiect';
$html_date = 'Data';
$html_sent = 'Trimite';
$html_wrote = 'a scris';
$html_size = 'Marime';
$html_totalsize = 'Marime Totala';
$html_kb = 'Kb';
$html_bytes = 'bytes';
$html_filename = 'Nume fisier';
$html_to = 'Catre';
$html_cc = 'Cc';
$html_bcc = 'Bcc';
$html_nosubject = 'Fara subiect';
$html_send = 'Trimitere';
$html_cancel = 'Renuntare';
$html_no_mail = 'Nici un mesaj.';
$html_logout = 'Iesire';
$html_msg = 'Mesaj';
$html_msgs = 'Mesaje';
$html_configuration = 'Serverul nu e corect configurat !';
$html_priority = 'Prioritate';
$html_low = 'Mica';
$html_normal = 'Normala';
$html_high = 'Mare';
$html_select = 'Selectare';
$html_select_all = 'Selectare tot';
$html_loading_image = 'Incarcare imagine';
$html_send_confirmed = 'Mesajul a fost acceptat pentru trnsmitere';
$html_no_sendaction = 'Nu a fost specificata nici o actiune. Incercati sa activati JavaScript.';
$html_error_occurred = 'Eroare';
$html_prefs_file_error = 'Nu se poate accesa fisierul de preferinte pentru scriere.';
$html_sig_file_error = 'Nu se poate accesa fisierul cu semnatura pentru sciere.';

$original_msg = '-- Mesaj original --';
$to_empty = 'Campul \'To\' nu poate fi gol !';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = "Nu se poate deschide conexiunea";
$html_smtp_error_unexpected = "Raspuns neasteptate:";
?>