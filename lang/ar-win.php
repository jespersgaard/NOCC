<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/ar-win.php,v 1.45 2001/11/18 17:53:32 wolruf Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the arabic language (Windows-1256)
 * Translation by Fisal Assubaieye <fisal77@hotmail.com>
 */

$charset = 'Windows-1256';

// Configuration for the days and months

// What language to use (Here, english US --> en_US)
// see '/usr/share/locale/' for more information
$lang_locale = 'ar_AR';

// Text Alignment
// Can be right-to-left (rtl) which is needed for proper Arabic, Hebrew
// Or left-to-right (ltr) which is default for most languages
$lang_dir = 'rtl';

// What format string should we pass to strftime() for messages sent on
// days other than today?
$default_date_format = '%Y-%m-%d'; 

// If the local is not implemented on the host, how we display the date
$no_locale_date_format = '%Y-%m-%d';

// What format string should we pass to strftime() for messages sent
// today?
$default_time_format = '%I:%M %p';


// Here is the configuration for the HTML

$err_user_empty = 'ÎÇäÉ ÇáÏÎæá ÝÇÑÛå';
$err_passwd_empty = 'ÎÇäÉ ßáãÉ ÇáÓÑ ÝÇÑÛå';


// html message

$alt_delete = 'ÍÐÝ ÇáÑÓÇÆá ÇáãÍÏÏå';
$alt_delete_one = 'ÍÐÝ ÇáÑÓÇáå';
$alt_new_msg = 'ÑÓÇÆá ÌÏíÏå';
$alt_reply = 'ÑÏ Åáì ÇáãõÑÓöá';
$alt_reply_all = 'ÑÏ Úáì Çáßá';
$alt_forward = 'ÅÚÇÏÉ ÊæÌíå';
$alt_next = 'ÇáÑÓÇáå ÇáÊÇáíå';
$alt_prev = 'ÇáÑÓÇáå ÇáÓÇÈÞå';
$html_on = 'ããßä';
$html_theme = 'ÇáäãØ';

// index.php

$html_lang = 'ÇááÛå';
$html_welcome = 'ãÑÍÈÇð Èßã Ýí';
$html_login = 'ÏÎæá';
$html_passwd = 'ßáãÉ ÇáÓÑ';
$html_submit = 'ÅÑÓÇá';
$html_help = 'ãÓÇÚÏå';
$html_server = 'ÇáãáÞã ÇáÎÇÏã';
$html_wrong = 'ÇáÏÎæá Ãæ ßáãÉ ÇáÓÑ ÎÇØÆÜ(Üå)';
$html_retry = 'ÅÚÇÏå';

// prefs.php

$html_preferences = 'ÇáÊÝÖíáÇÊ';
$html_full_name = 'ÇáÅÓã ßÇãáÇð';
$html_email_address = 'ÇáÈÑíÏ ÇáÅáßÊÑæäí';
$html_ccself = 'äÓÎå ÐÇÊíå';
$html_hide_addresses = 'ÅÎÝÇÁ ÇáÚäÇæíä';
$html_outlook_quoting = 'ÅÞÊÈÇÓ äãØ Outlook';
$html_reply_to = 'ÑÏ Åáì';
$html_use_signature = 'ÅÓÊÎÏÇã ÇáÊæÞíÚ';
$html_signature = 'ÇáÊæÞíÚ';
$html_prefs_updated = 'áÞÏ Êã ÊÌÏíÏ ÇáÊÝÖíáÇÊ';

// Other pages

$html_view_header = 'ãÔÇåÏÉ ÇáÊÑæíÓå';
$html_remove_header = 'ÅÎÝÇÁ ÇáÊÑæíÓå';
$html_inbox = 'ÕäÏæÞ ÇáæÇÑÏ';
$html_new_msg = 'ßÊÇÈå';
$html_reply = 'ÑÏ';
$html_reply_short = 'ÑÏ:';
$html_reply_all = 'ÑÏ Úáì Çáßá';
$html_forward = 'ÅÚÇÏÉ ÊæÌíå';
$html_forward_short = 'ÅÚÇÏÉ ÊæÌíå:';
$html_delete = 'ÍÐÝ';
$html_new = 'ÌÏíÏ';
$html_mark = 'ÍÐÝ';
$html_att = 'ãÑÝÞ';
$html_atts = 'ãÑÝÞÇÊ';
$html_att_unknown = '[ÛíÑ ãÚÑæÝ]';
$html_attach = 'ÅÑÝÇÞ';
$html_attach_forget = 'íÌÈ Úáíß ÅÏÑÇÌ ãáÝß ÇáãÑÝÞ ãÚ ÑÓÇáÊß ÞÈá ÅÑÓÇáåÇ !';
$html_attach_delete = 'ÍÐÝ ÇáãÍÏÏ';
$html_sort_by = 'ÊÑÊíÈ ÈÜ';
$html_from = 'ãä';
$html_subject = 'ÇáãæÖæÚ';
$html_date = 'ÇáÊÇÑíÎ';
$html_sent = 'ÅÑÓÇá';
$html_wrote = 'ßõÊöÈó ãä';
$html_size = 'ÇáÍÌã';
$html_totalsize = 'ÇáÍÌã Çáßáí';
$html_kb = 'ßíáæÈÇíÊ';
$html_bytes = 'ÈÇíÊ';
$html_filename = 'ÅÓã ÇáãáÝ';
$html_to = 'Åáì';
$html_cc = 'äÓÎå Åáì';
$html_bcc = 'äÓÎå ãÎÝíå Åáì';
$html_nosubject = 'ÈÏæä ÚäæÇä';
$html_send = 'ÅÑÓÇá';
$html_cancel = 'ÅáÛÇÁ';
$html_no_mail = 'áÇíæÌÏ ÑÓÇáå.';
$html_logout = 'ÎÑæÌ';
$html_msg = 'ÑÓÇáå';
$html_msgs = 'ÑÓÇáÇÊ';
$html_configuration = 'åÐÇ ÇáãáÞã ÇáÎÇÏã ÛíÑ ãÊæÇÝÞ ÌíÏÇð !';
$html_priority = 'ÇáÃæáæíå';
$html_low = 'ãäÎÝÖ';
$html_normal = 'ÚÇÏí';
$html_high = 'ÚÇáí';
$html_select = 'ÅÎÊíÇÑ';
$html_select_all = 'ÅÎÊíÇÑ Çáßá';
$html_loading_image = 'ÊÍãíá ÇáÕæÑå';
$html_send_confirmed = 'áÞÏ Êã ÊÓáíã ÈÑíÏß';
$html_no_sendaction = 'áÇíæÌÏ ÃÍÏÇË ÊÝÚíáÇÊ ãÍÏÏå. ÍÇæá Êãßíä ÏÚã ÌÇÝÇ ÓßÑíÈÊ JavaScript.';
$html_error_occurred = 'ÍÕá ÎØÃ ãÇ';
$html_prefs_file_error = 'áÇíÓÊØíÚ ÝÊÍ ãáÝ ÇáÊÝÖíáÇÊ ááßÊÇÈå Úáíå.';
$html_sig_file_error = 'áÇíÓÊØíÚ ÝÊÍ ãáÝ ÇáÊæÞíÚ ááßÊÇÈå Úáíå.';

$original_msg = '-- ÇáÑÓÇáå ÇáÃÕáíå --';
$to_empty = 'ÇáÎÇäå \'Åáì\' íÌÈ Ãä Êßæä ÛíÑ ÝÇÑÛå !';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = "áÇíÓÊØíÚ ÝÊÍ ÅÊÕÇá";
$html_smtp_error_unexpected = "ÑÏ ÛíÑ ãÊæÞÚ:";
?>