<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/fi.php,v 1.1 2001/09/02 21:59:37 wolruf Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the finnish language
 */

$charset = 'ISO-8859-1';

// Configuration for the days and months

// What language to use (Here, english US --> en_US)
// see '/usr/share/locale/' for more information
$lang_locale = 'fi_FI';

// Text Alignment
// Can be right-to-left (rtl) which is needed for proper Arabic, Hebrew
// Or left-to-right (ltr) which is default for most languages
$lang_dir = 'ltr';

// What format string should we pass to strftime() for messages sent on
// days other than today?
$default_date_format = '%d-%m-%Y';

// If the local is not implemented on the host, how we display the date
$no_locale_date_format = '%Y-%m-%d';

// What format string should we pass to strftime() for messages sent
// today?
$default_time_format = '%I:%M %p';


// Here is the configuration for the HTML

$err_user_empty = 'K&auml;ytt&auml;j&auml;tunnus-kentt&auml; on tyhj&auml;';
$err_passwd_empty = 'Salasana-kentt&auml; on tyhj&auml;';


// html message

$alt_delete = 'Poista valitut viestit';
$alt_delete_one = 'Poista viesti';
$alt_new_msg = 'Uudet viestit';
$alt_reply = 'Vastaa kirjoittajalle';
$alt_reply_all = 'Vastaa kaikille';
$alt_forward = 'Edelleenl&auml;het&auml;';
$alt_next = 'Seuraava viesti';
$alt_prev = 'Edellinen viesti';
$html_on = 'on';
$html_theme = 'Teema';

// index.php

$html_lang = 'Kieli';
$html_welcome = 'Tervetuloa';
$html_login = 'K&auml;ytt&auml;j&auml;tunnus';
$html_passwd = 'Salasana';
$html_submit = 'Sis&auml;&auml;n';
$html_help = 'Apua';
$html_server = 'Palvelin';
$html_wrong = 'K&auml;ytt&auml;j&auml;tunnus tai salasana on virheellinen';
$html_retry = 'Uudestaan';

// Other pages

$html_view_header = 'N&auml;yt&auml; otsikot';
$html_remove_header = 'Piilota otsikot';
$html_inbox = 'Postilaatikko';
$html_new_msg = 'Uusi viesti';
$html_reply = 'Vastaa';
$html_reply_short = 'Re';
$html_reply_all = 'Vastaa kaikille';
$html_forward = 'Edelleenl&auml;het&auml;';
$html_forward_short = 'Fw';
$html_delete = 'Poista';
$html_new = 'Uusi';
$html_mark = 'Poista';
$html_att = 'Liite';
$html_atts = 'Liitteet';
$html_att_unknown = '[tuntematon]';
$html_attach = 'Liit&auml;';
$html_attach_forget = 'Sinun t&auml;ytyy liitt&auml;&auml; tiedosto(t) ennen l&auml;hetyst&auml;';
$html_attach_delete = 'Poista valitut';
$html_from = 'Kenelt&auml;';
$html_subject = 'Aihe';
$html_date = 'P&auml;iv&auml;';
$html_sent = 'L&auml;het&auml;';
$html_size = 'Koko';
$html_totalsize = 'Kokonais m&auml;&auml;r&auml;';
$html_kb = 'Kb';
$html_bytes = 'tavua';
$html_filename = 'Tiedostonimi';
$html_to = 'Kenelle';
$html_cc = 'Kopio';
$html_bcc = 'Bcc';
$html_nosubject = 'Ei viestin aihetta';
$html_send = 'L&auml;het&auml;';
$html_cancel = 'Peruuta';
$html_no_mail = 'Ei viesti&auml;.';
$html_logout = 'Poistu j&auml;rjestelm&auml;st&auml;';
$html_msg = 'Viesti';
$html_msgs = 'Viestit';
$html_configuration = 'T&auml;t&auml; palvelinta ei ole asennettu oikein';

$original_msg = '-- Alkuper&auml;inen viesti --';
$to_empty = '\'Kenelle\' kentt&auml; ei saa olla tyhj&auml;';
?>
