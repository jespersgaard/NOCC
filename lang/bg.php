<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/en.php,v 1.21 2001/02/06 20:47:46 nicocha Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the Bulgarian language
 * Translation by Evgeni Gechev <etg@setcom.bg>
 */

$charset = "windows-1251";

// Configuration for the days and months

// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = "bg_BG";

// Text Alignment
// Can be right-to-left (rtl) which is needed for proper Arabic, Hebrew
// Or left-to-right (ltr) which is default for most languages
$lang_dir = 'ltr';

// What format string should we pass to strftime() for messages sent on
// days other than today?
$default_date_format = "%d-%m-%Y"; 

// If the local is not implemented on the host, how we display the date
$no_locale_date_format = "%d-%m-%Y"; 

// What format string should we pass to strftime() for messages sent
// today?
$default_time_format = "%H:%M";


// Here is the configuration for the HTML

$err_user_empty = "Ле е агаеделм уке";
$err_passwd_empty = "Ле е агаеделч нчомйч";


// html message

$alt_delete = "Уцпоух кчоиуочлупе нуъкч";
$alt_delete_one = "Уцпоух нуъкмпм";
$alt_new_msg = "Лмам нуъкм";
$alt_reply = "Мпжмамоу лч чапмоч";
$alt_reply_all = "Мпжмамоу лч аъубиу";
$alt_forward = "Ноеночпу";
$alt_next = "Ъйедачшм";
$alt_prev = "Ноедуэлм";
$html_on = 'on';
$html_theme = 'Дуцчхл';


// index.php

$html_lang = "Ецуи";
$html_welcome = "Дмюое дмэйу!<br>";
$html_login = "Уке";
$html_passwd = "Нчомйч";
$html_submit = "Асмд";
$html_help = "Нмкмш";
$html_server = "Ъгоаго";
$html_wrong = "Укепм уйу нчомйчпч ъч жоеэлу";
$html_retry = "Мнупчх мплмам";

// Other pages

$html_view_header = "Нмичту ъйят. улрмокчфуз";
$html_remove_header = "Ъиоух ъйят. улрмокчфуз";
$html_inbox = "Нмйябелу нуъкч";
$html_new_msg = "Уцночпу нуъкм";
$html_reply = "Мпжмамоу";
$html_reply_short = "Мпж.";
$html_reply_all = "Мпжмамоу лч аъубиу";
$html_forward = "Ноеночпу";
$html_forward_short = "Ноено.";
$html_delete = "Уцпоух";
$html_new = "Лмам";
$html_mark = "Уцпоух";
$html_att = "Ноуичбел рчхй";
$html_atts = "Ноуичбелу рчхймае";
$html_att_unknown = "[???]";
$html_attach = "Ноуичбу";
$html_attach_forget = "Ноуичбу рчхйч ноеду дч уцночпуэ ъгмюшелуепм!";
$html_attach_delete = "Уцпоух ноуичбелуз рчхй";
$html_from = "Мп";
$html_subject = "Пекч";
$html_date = "Дчпч";
$html_sent = "Уцночпелм лч";
$html_size = "Жмйекулч";
$html_totalsize = "Мюшм";
$html_kb = "ИЮ";
$html_bytes = "ючхпч";
$html_filename = "уке лч рчхй";
$html_to = "Цч";
$html_cc = "Имнуе";
$html_bcc = "Леаудукм имнуе";
$html_nosubject = "Юец пекч";
$html_send = "Уцночпу";
$html_cancel = "Мпичц";
$html_no_mail = "Лзкч нуъкч.";
$html_logout = "Уцсмд";
$html_msg = "Нуъкм";
$html_msgs = "Нуъкч";
$html_configuration = 'This server is not well set up !';

$original_msg = "-- Моужулчйлм нуъкм --";
$to_empty = "Нмйепм \'Цч\' ле кмте дч е ночцлм!";
?>