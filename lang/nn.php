<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/da.php,v 1.4 2001/05/27 15:02:33 wolruf Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the Norwegian language
 * Translation by Ove Ruben R Olsen <ruben@noia.no>
 */

$charset = 'ISO-8859-1';

// Configuration for the days and months

// What language to use (Here, english US --> en_US)
// see '/usr/share/locale/' for more information
$lang_locale = 'no_NO';

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

$err_user_empty = 'Felt for Brukarnamn m� fyllast ut';
$err_passwd_empty = 'Felt for Tilgangskode m� fyllast ut';


// html message

$alt_delete = 'Fjern avmerka meldingar';
$alt_delete_one = 'Fjern meldinga';
$alt_new_msg = 'Nye meldingar';
$alt_reply = 'Svar p� melding';
$alt_reply_all = 'Svar til alle';
$alt_forward = 'Videresend';
$alt_next = 'Neste';
$alt_prev = 'Forrige';


// index.php

$html_lang = 'M�lf�re';
$html_welcome = 'Velkommen til';
$html_login = 'Brukarnamn';
$html_passwd = 'Kjenneord';
$html_submit = 'Log p�';
$html_help = 'Hjelp';
$html_server = 'Server';
$html_wrong = 'Feil brukernamn eller kjenneord';
$html_retry = 'Pr�v p� ny';
$html_on = 'til';
$html_theme = 'Bunad';

// Other pages

$html_view_header = 'Vis meldinghovud';
$html_remove_header = 'Skjul meldinghovud';
$html_inbox = 'Inbox';
$html_new_msg = 'Lag ny melding';
$html_reply = 'Svar';
$html_reply_short = 'Re';
$html_reply_all = 'Svar til alle';
$html_forward = 'Videresend';
$html_forward_short = 'Fw';
$html_delete = 'Ta bort';
$html_new = 'Ny';
$html_mark = 'Ta bort';
$html_att = 'Vedlegg';
$html_atts = 'Vedlagte filar';
$html_att_unknown = '[ukjent vedlegg]';
$html_attach = 'Vedlegg';
$html_attach_forget = 'Det er naudsynt � vedlegga fila, f�r du sendar meldinga!';
$html_attach_delete = 'Fjern markerete vedlegg';

$html_from = 'Fr�';
$html_subject = 'Emne';
$html_date = 'Dato';
$html_sent = 'Sendt';
$html_size = 'St�rrelse';
$html_totalsize = 'Total st�rrelse';
$html_kb = 'Kb';
$html_bytes = 'bytes';
$html_filename = 'Filnamn';
$html_to = 'Mottakar';
$html_cc = 'Cc';
$html_bcc = 'Bcc';
$html_nosubject = 'Ikkje noko emne';
$html_send = 'Send';
$html_cancel = 'Blank ut';
$html_no_mail = 'Ingen meldingar';
$html_logout = 'Avslutt';
$html_msg = 'Melding';
$html_msgs = 'Meldingar';
$html_configuration = 'Serveren er ikkje korrekt satt opp!';

$original_msg = '-- Opphaveleg melding --';
$to_empty = 'Feltet \'Mottakar\' m� v�ra fyllt ut!' ;
?>
