<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/en.php,v 1.29 2001/06/19 09:16:32 nicocha Exp $ 
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

// What language to use (Here, english US --> en_US)
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

$html_lang = 'Spr�k';
$html_welcome = 'Velkommen til';
$html_login = 'Brukernavn';
$html_passwd = 'Passord';
$html_submit = 'Logg inn';
$html_help = 'Hjelp';
$html_server = 'Server';
$html_wrong = 'Brukernavn eller passord er feil';
$html_retry = 'Pr�v igjen';

// Other pages

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
$html_attach_forget = 'Du m� legge til filen f�r du kan sende meldingen !';
$html_attach_delete = 'Fjern markerte vedlegg';
$html_from = 'Fra';
$html_subject = 'Emne';
$html_date = 'Dato';
$html_sent = 'Sendt';
$html_size = 'St�rrelse';
$html_totalsize = 'Total St�rrelse';
$html_kb = 'Kb';
$html_bytes = 'bytes';
$html_filename = 'Filnavn';
$html_to = 'Til';
$html_cc = 'Cc';
$html_bcc = 'Bcc';
$html_nosubject = 'Intet emne';
$html_send = 'Send';
$html_cancel = 'Annul�r';
$html_no_mail = 'Ingen meldinger';
$html_logout = 'Logg av';
$html_msg = 'Melding';
$html_msgs = 'Meldinger';
$html_configuration = 'Denne serveren er ikke satt opp riktig !';
$html_priority = 'Prioritet';
$html_low = 'Lav';
$html_normal = 'Normal';
$html_high = 'H�y';

$original_msg = '-- Opprinnelig melding --';
$to_empty = 'Feltet \'Til\' kan ikke v�re tomt !';
?>