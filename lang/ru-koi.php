<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/rukoi.php,v 1.21 2001/03/01 22:38 Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the Russian (KOI8-R) language
 * Translation by Anton Jakimov <t0xa@ls2.lv>
 */

$charset = "KOI8-R";

// Configuration for the days and months

// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = "ru_RU";

// What format string should we pass to strftime() for messages sent on
// days other than today?
$default_date_format = "%d.%m.%y";

// If the local is not implemented on the host, how we display the date
$no_locale_date_format = "%d.%m.%Y";

// What format string should we pass to strftime() for messages sent
// today?
$default_time_format = "%H:%M";


// Here is the configuration for the HTML

$err_user_empty = "Äðõæèò ðúôâïêàåï.Þý ÿâòðíïêíê ïå þõå òðíó";
$err_passwd_empty = "Äðõæèò ðúôâïêàåï.Þý ÿâòðíïêíê ïå þõå òðíó";


// html message

$alt_delete = "Èäâíêæû þý÷ôâïïýå õðð÷üåïêó";
$alt_delete_one = "Èäâíêæû õðð÷üåïêå";
$alt_new_msg = "Ïðþýå õðð÷üåïêó";
$alt_reply = "Ðæþåæêæû âþæðôè";
$alt_reply_all = "Ðæþåæêæû þõåî";
$alt_forward = "Òåôåõíâæû";
$alt_next = "Õíåä.";
$alt_prev = "Òôåä.";


// index.php

$html_lang = "Óÿýì";
$html_welcome = "Äð÷ôð òðãâíðþâæû ";
$html_login = "Êîó òðíûÿðþâæåíó";
$html_passwd = "Òâôðíû";
$html_submit = "Þéðä";
$html_help = "Òðîðüû";
$html_server = "Õåôþåô";
$html_wrong = "Íðúêï êíê òâôðíû ïåþåôåï";
$html_retry = "Åüå ôâÿ";
$html_on = "on";
$html_theme = "Theme";

// Other pages

$html_view_header = "Òðõîðæôåæû ÿâúðíðþðì";
$html_remove_header = "Õòôóæâæû ÿâúðíðþðì";
$html_inbox = "Þéðäóüêå";
$html_new_msg = "Ïâòêõâæû";
$html_reply = "Ðæþåæêæû";
$html_reply_short = "Re";
$html_reply_all = "Ðæþåæêæû þõåî";
$html_forward = "Òåôåõíâæû";
$html_forward_short = "Fw";
$html_delete = "Èäâíêæû";
$html_new = "Ïðþðå";
$html_mark = "Èäâíêæû";
$html_att = "Òôêíðãåïêå";
$html_atts = "Òôêíðãåïêó";
$html_att_unknown = "[ïåêÿþåõæïðå]";
$html_attach = "Òôêíðãåïêå";
$html_attach_forget = "Þý äðíãïý äð÷âþêæû òôêíðãåïêå òåôåä æåî ìâì ðæõýíâæû òêõûîð !";
$html_attach_delete = "Èäâíêæû ðæîåàåïïýå";
$html_from = "Ðæ";
$html_subject = "Æåîâ";
$html_date = "Äâæâ";
$html_sent = "Ðæòôâþêæû";
$html_size = "Ôâÿîåô";
$html_totalsize = "Ð÷üêë ôâÿîåô";
$html_kb = "Kb";
$html_bytes = "bytes";
$html_filename = "Filename";
$html_to = "Ìðîè";
$html_cc = "Cc";
$html_bcc = "Bcc";
$html_nosubject = "No subject";
$html_send = "Ðæòôâþêæû";
$html_cancel = "Ðæîåïâ";
$html_no_mail = "Ïåæ õðð÷üåïêë.";
$html_logout = "Þýéðä";
$html_msg = "Õðð÷üåïêå";
$html_msgs = "Õðð÷üåïêó";

$original_msg = "-- Original Message --";
$to_empty = "Òðíå \"Ìðîè\" ïå äðíãïð ÷ýæû òèõæýî !";
?>