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
 * Configuration file for the Danish language
 * Translation by Christian Knudsen <chr@epun.dk>
 */

$charset = 'ISO-8859-1';

// Configuration for the days and months

// What language to use (Here, english US --> en_US)
// see '/usr/share/locale/' for more information
$lang_locale = 'da_DK';

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

$err_user_empty = 'Feltet Brugernavn skal udfyldes';
$err_passwd_empty = 'Feltet Kodeord skal udfyldes';


// html message

$alt_delete = 'Slet de markerede meddelelser';
$alt_delete_one = 'Slet meddelelsen';
$alt_new_msg = 'Nye meddelelser';
$alt_reply = 'Svar meddelelse';
$alt_reply_all = 'Svar alle';
$alt_forward = 'Videresend';
$alt_next = 'N�ste';
$alt_prev = 'Forrige';
$html_on = 'on';
$html_theme = 'Theme';

// index.php

$html_lang = 'Sprog';
$html_welcome = 'Velkommen til';
$html_login = 'Brugernavn';
$html_passwd = 'Kodeord';
$html_submit = 'Log ind';
$html_help = 'Hj�lp';
$html_server = 'Server';
$html_wrong = 'Brugernavn eller kodeord er forkert';
$html_retry = 'Pr�v igen';
$html_on = 'til';
$html_theme = 'Tema';

// prefs.php

$html_preferences = 'Preferences';
$html_full_name = 'Full name';
$html_email_address = 'E-mail Address';
$html_ccself = 'Cc self';
$html_hide_addresses = 'Hide addresses';
$html_outlook_quoting = 'Outlook-style quoting';
$html_reply_to = 'Reply to';
$html_use_signature = 'Use signature';
$html_signature = 'Signature';
$html_prefs_updated = 'Preferences updated';

// Other pages

$html_view_header = 'Se overskrift';
$html_remove_header = 'Skjul overskrift';
$html_inbox = 'Indbakke';
$html_new_msg = 'Skriv';
$html_reply = 'Svar';
$html_reply_short = 'Sv';
$html_reply_all = 'Svar alle';
$html_forward = 'Videresend';
$html_forward_short = 'Vs';
$html_delete = 'Slet';
$html_new = 'Ny';
$html_mark = 'Slet';
$html_att = 'Vedlagt fil';
$html_atts = 'Vedlagte filer';
$html_att_unknown = '[ukendt]';
$html_attach = 'Vedl�g';
$html_attach_forget = 'Du er n�dt til at vedl�gge filen, f�r du sender meddelelsen !';
$html_attach_delete = 'Fjern markerede vedl�g';
$html_sort_by = 'Sort by';
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
$html_cancel = 'Annull�r';
$html_no_mail = 'Ingen meddelelser';
$html_logout = 'Log ud';
$html_msg = 'Meddelelse';
$html_msgs = 'Meddelelser';
$html_configuration = 'This server is not well set up !';
$html_priority = 'Priority';
$html_low = 'Low';
$html_normal = 'Normal';
$html_high = 'High';
$html_select = 'Select';
$html_select_all = 'Select All';
$html_loading_image = 'Loading image';
$html_send_confirmed = 'Your mail was accepted for delivery';
$html_no_sendaction = 'No action specified. Try enabling JavaScript.';
$html_error_occurred = 'An error occurred';
$html_prefs_file_error = 'Unable to open preferences file for writing.';
$html_sig_file_error = 'Unable to open signature file for writing.';

$original_msg = '-- Oprindelig Meddelelse --';
$to_empty = 'Feltet \'Til\' m� ikke v�re tomt !' ;

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = "Unable to open connection";
$html_smtp_error_unexpected = "Unexpected response:";
?>