<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/tr.php,v 1.1 2001/06/04 22:09:30 wolruf Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the english language
 * Missing translation author
 */

$charset = 'ISO-8859-9';

// Configuration for the days and months

// What language to use (Here, english US --> en_US)
// see '/usr/share/locale/' for more information
$lang_locale = 'tr_TR';

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

$err_user_empty = 'The login field is empty';
$err_passwd_empty = 'Parola k�sm�n� bo� ge�emezsiniz';


// html message

$alt_delete = 'Se�ili mesajlar� sil';
$alt_delete_one = 'Se�ili mesaj� sil';
$alt_new_msg = 'Yeni mesaj';
$alt_reply = 'Yazana cevapla';
$alt_reply_all = 'T�m�ne cevapla';
$alt_forward = '�let';
$alt_next = 'Sonraki mesaj';
$alt_prev = '�nceki Mesaj';
$html_on = 'on';
$html_theme = 'Bi�im';

// index.php

$html_lang = 'Dil';
$html_welcome = 'Welcome to';
$html_login = 'Kullan�c� Ad�';
$html_passwd = 'Parola';
$html_submit = 'Giri�';
$html_help = 'Yard�m';
$html_server = 'Sunucu';
$html_wrong = 'Kullan�c� ad� ya da parola hatal�';
$html_retry = 'Tekrar Deneyin';

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

$html_view_header = 'Ba�l�klar� G�ster';
$html_remove_header = 'Ba�l�klar� Gizle';
$html_inbox = 'Gelen Kutusu';
$html_new_msg = 'Yeni Mesaj';
$html_reply = 'Cevapla';
$html_reply_short = 'Ynt';
$html_reply_all = 'T�m�ne cevapla';
$html_forward = '�let';
$html_forward_short = '�lt';
$html_delete = 'Sil';
$html_new = 'Yeni';
$html_mark = 'Sil';
$html_att = 'Ek';
$html_atts = 'Ekler';
$html_att_unknown = '[bilinmiyor]';
$html_attach = 'Ek';
$html_attach_forget = 'Mesaj� g�ndermeden �nce dosyay� eklemelisiniz !';
$html_attach_delete = '��aretleneni Sil';
$html_sort_by = 'Sort by';
$html_from = 'G�nderen';
$html_subject = 'Konu';
$html_date = 'Tarih';
$html_sent = 'G�nder';
$html_size = 'Boyut';
$html_totalsize = 'Toplam Boyut';
$html_kb = 'Kb';
$html_bytes = 'byte';
$html_filename = 'Dosya Ad�';
$html_to = 'Al�c�';
$html_cc = 'Cc';
$html_bcc = 'Bcc';
$html_nosubject = 'Konusuz';
$html_send = 'G�nder';
$html_cancel = '�ptal';
$html_no_mail = 'Mesaj Yok.';
$html_logout = '��k��';
$html_msg = 'Mesaj';
$html_msgs = 'Mesajlar';
$html_configuration = 'Bu sunucusu hen�z konfigure edilmemi� !';
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

$original_msg = '-- Orijinal Mesaj --';
$to_empty = ' \'Al�c�\' alan� bo� ge�ilemez !';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = "Unable to open connection";
$html_smtp_error_unexpected = "Unexpected response:";
?>