<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/xx-hacker.php,v 1.23 2006/10/18 19:22:14 goddess_skuld Exp $ 
 *
 * Copyright 2004 Nicolas Chalanset <nicocha at free.fr>
 * Copyright 2004 Olivier Cahagne <wolruf at free.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * ** Easter Egg **
 * add "{?,&}lang=xx-hacker" in URI after logging in
 * Configuration file for the xx-hacker language
 * 
 */

$charset = 'UTF-8';

// Configuration for the days and months

// What language to use (xx-hacker, as used by Google)
// see '/usr/share/locale/' for more information
$lang_locale = 'xx-hacker';

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

$err_user_empty = 'Th3 l0g!n f!3ld !s 3mpty';
$err_passwd_empty = 'Th3 p4ssw0rd f!3ld !s 3mpty';


// html message

$alt_delete = 'D313t3 s313ct3d m3ss4g3s';
$alt_delete_one = 'De13t3 th3 m3ss4g3';
$alt_new_msg = 'New m3ss4g3s';
$alt_reply = 'R3ply t0 th3 4uth0r';
$alt_reply_all = 'R3ply 4ll';
$alt_forward = 'F0rw4rd';
$alt_next = 'N3xt';
$alt_prev = 'Pr3v!0us';
$title_next_page = 'N3xt p4g3';
$title_prev_page = 'Pr3v!0us p4g3';
$title_next_msg = 'N3xt me55ag3';
$title_prev_msg = 'Pr3v!0us m3ss4g3';
$html_on = '0n';
$html_theme = 'Th3m3';

// index.php

$html_lang = 'L4ngu4g3';
$html_welcome = 'W3lc0m3 t0';
$html_login = 'L0g!n';
$html_passwd = 'P4ssw0rd';
$html_submit = 'Subm!t';
$html_help = 'H3lp';
$html_server = 'S3rv3r';
$html_wrong = 'Th3 l0g!n 0r th3 p4ssw0rd 4r3 !nc0rr3ct';
$html_retry = 'R3try';
$html_remember = "R3m3mb3r s3tt!ngs";

// prefs.php

$html_msgperpage = 'M3ss4g3s p3r p4g3';
$html_preferences = 'Pr3f3r3nc3s';
$html_full_name = 'Full n4m3';
$html_email_address = '3-m4!l 4ddr3ss';
$html_ccself = 'Cc s3lf';
$html_hide_addresses = 'H!d3 4ddr3ss3s';
$html_outlook_quoting = '0ut100k-styl3 qu0t!ng';
$html_reply_to = 'R3ply t0';
$html_use_signature = 'Us3 s!gn4tur3';
$html_signature = 'S!gn4tur3';
$html_reply_leadin = 'R3ply L34d!n';
$html_prefs_updated = 'Pr3f3r3nc3s upd4t3d';
$html_manage_folders_link = 'M4n4g3 !M4P F0ld3rs';
$html_manage_filters_link = 'M4n4g3 3m4!l F!lt3rs';
$html_use_graphical_smilies = 'Us3 gr4ph!c4l sm!l!3s';
$html_sent_folder = 'C0py s3nt m4!ls !nt0 4 d3d!c4t3d f0ld3r';
$html_colored_quotes = 'C0l0r3d qu0t3s';
$html_display_struct = 'D!spl4y structur3d t3xt';
$html_send_html_mail = 'S3nd m4!l !n HTML f0rm4t';

// folders.php
$html_folders_create_failed = 'F0ld3r c0u1d n0t b3 cr34t3d!';
$html_folders_sub_failed = 'C0uld n0t subscr!b3 t0 f0ld3r!';
$html_folders_unsub_failed = 'C0uld n0t unsubscr!b3d fr0m f0ld3r!';
$html_folders_rename_failed = 'F0ld3r c0uld n0t b3 r3n4m3d!';
$html_folders_updated = 'F0ld3rs updat3d';
$html_folder_subscribe = 'Subscr!b3 t0';
$html_folder_rename = 'R3n4m3';
$html_folder_create = 'Cr3at3 n3w f0ld3r c4ll3d';
$html_folder_remove = 'Unsubscr!b3 fr0m';
$html_folder_delete = 'D3l3t3';
$html_folder_to = 't0';

// filters.php
$html_filter_remove = 'D3l3t3';
$html_filter_body = 'M3ssag3 B0dy';
$html_filter_subject = 'M3ss4g3 Subj3ct';
$html_filter_to = 'T0 F!3ld';
$html_filter_cc = 'Cc F!3ld';
$html_filter_from = 'Fr0m F!3ld';
$html_filter_change_tip = 'T0 ch4ng3 a f!lter simply 0v3rwr!t3 it.';
$html_reapply_filters = 'R34pply 4ll f!lt3rs';
$html_filter_contains = 'c0nt4!ns';
$html_filter_name = 'Filt3r N4me';
$html_filter_action = 'F!lt3r 4cti0n';
$html_filter_moveto = 'M0v3 t0';

// Other pages
$html_select_one = '--S3l3ct 0n3--';
$html_and = 'And';
$html_new_msg_in = 'N3w m3ss4g3s !n';
$html_or = '0r';
$html_move = 'M0v3';
$html_copy = 'C0py';
$html_messages_to = 'se1ect3d m3ss4g3s t0';
$html_gotopage = 'G0 t0 P4g3';
$html_gotofolder = 'G0 t0 F0lder';
$html_other_folders = 'F0ld3r List';
$html_page = 'Pag3';
$html_of = '0f';
$html_view_header = 'V!3w h34der';
$html_remove_header = 'H!d3 h34d3r';
$html_inbox = '!nb0x';
$html_new_msg = 'Writ3';
$html_reply = 'R3ply';
$html_reply_short = 'R3';
$html_reply_all = 'R3ply 4ll';
$html_forward = 'F0rw4rd';
$html_forward_short = 'Fw';
$html_forward_info = 'Th3 f0rw4rd3d m3ss4g3 w!ll b3 s3nt 4s 4n 4tt4chm3nt t0 th!s 0n3.';
$html_delete = 'D3l3t3';
$html_new = 'N3w';
$html_mark = 'D3l3t3';
$html_att = '4tt4chm3nt';
$html_atts = '4tt4chm3nts';
$html_att_unknown = '[unkn0wn]';
$html_attach = '4tt4ch';
$html_attach_forget = 'You must 4tt4ch y0ur f!l3 b3f0r3 s3nd!ng y0ur m3ss4g3 !';
$html_attach_delete = 'R3m0v3 S3l3ct3d';
$html_attach_none = 'Y0u must s3l3ct 4 f!l3 t0 4tt4ch!';
$html_sort_by = 'S0rt by';
$html_sort = 'S0rt';
$html_from = 'Fr0m';
$html_subject = 'Subj3ct';
$html_date = 'D4t3';
$html_sent = 'S3nd';
$html_wrote = 'wr0t3';
$html_size = 'S!z3';
$html_totalsize = 'T0t4l S!z3';
$html_kb = 'kB';
$html_bytes = 'byt3s';
$html_filename = 'F!l3n4m3';
$html_to = 'T0';
$html_cc = 'Cc';
$html_bcc = 'Bcc';
$html_nosubject = 'N0 subj3ct';
$html_send = 'S3nd';
$html_cancel = 'C4nc3l';
$html_no_mail = 'N0 mess4g3.';
$html_logout = 'L0g0ut';
$html_msg = 'M3ssag3';
$html_msgs = 'M3ss4g3s';
$html_configuration = 'Th!s s3rv3r !s n0t w3ll s3t up !';
$html_priority = 'Pr!0r!ty';
$html_low = 'L0w';
$html_normal = 'N0rm4l';
$html_high = 'H!gh';
$html_receipt = 'R3qu3st a r3turn r3c3!pt';
$html_select = 'S3l3ct';
$html_select_all = 'Inv3rt S3l3ct!on';
$html_loading_image = '104ding !m4g3';
$html_send_confirmed = 'Y0ur m4!l w4s 4cc3pt3d f0r d3l!v3ry';
$html_no_sendaction = 'N0 4cti0n sp3c!fi3d. Try 3n4bl!ng J4v4Scr!pt.';
$html_error_occurred = '4n 3rr0r 0ccurr3d';
$html_prefs_file_error = 'Un4bl3 t0 0p3n pr3f3r3nc3s f!l3 f0r wr!ting.';
$html_wrap = 'Wrap 0utg0!ng messag3s t0 :';
$html_wrap_none = 'N0n3';
$html_usenet_separator = 'Us3n3t s3p4rat0r ("-- \n") b3f0r3 s!gn4tur3';
$html_mark_as = 'M4rk as';
$html_read = 'r3ad';
$html_unread = 'unr3ad';
$html_encoding = 'Ch4r4ct3r 3nc0d!ng';

// Contacts manager
$html_add = '4dd';
$html_contacts = 'C0nt4cts';
$html_modify = 'M0d!fy';
$html_back = 'B4ck';
$html_contact_add = 'Add n3w c0nt4ct';
$html_contact_mod = 'M0d!fy a c0nt4ct';
$html_contact_first = 'F!rst nam3';
$html_contact_last = 'L4st nam3';
$html_contact_nick = 'N!ck';
$html_contact_mail = 'Ma!l';
$html_contact_list = 'C0ntact l!st 0f ';
$html_contact_del = 'fr0m th3 c0ntact l!st';

$html_contact_err1 = 'Max!mum numb3r 0f c0nt4ct !s ';
$html_contact_err2 = 'Y0u can\'t add a n3w c0ntact';
$html_contact_err3 = 'Y0u d0n\'t hav3 4cc3ss r!ghts t0 c0nt4ct l!st';
$html_del_msg = 'D3l3t3 s3l3ct3d m3ss4g3s ?';
$html_down_mail = 'D0wnl04d';

$original_msg = '-- 0rig!nal M3ss4g3 --';
$to_empty = 'Th3 \'T0\' f!3ld must n0t b3 3mpty !';

// Images warning
$html_images_warning = 'F0r y0ur s3cur!ty, r3m0t3s p!ctur3s 4r3 n0t d!spl4y3d.';
$html_images_display = 'D!spl4y p!ctur3s';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'Un4bl3 t0 0p3n SMTP c0nn3ct!0n';
$html_smtp_error_unexpected = 'Un3xp3ct3d SMTP r3sp0ns3:';

// IMAP messages (class_local.php)
$lang_could_not_connect = 'C0uld n0t c0nn3ct t0 s3rv3r';
$lang_invalid_msg_num = 'B4d m3ss4g3 numb3r';

$html_file_upload_attack = 'P0ss!bl3 f!l3 upl04d 4tt4ck';
$html_invalid_email_address = 'Inv4l!d 3-m4!l 4ddr3ss';
$html_seperate_msg_win = 'M3ss4g3s !n s3p4r4t3 w!nd0w';

// Exceptions
$html_err_file_contacts = 'Un4bl3 t0 0p3n c0nt4cts f!l3 f0r wr!t!ng.';
$html_session_file_error = 'Un4bl3 t0 0p3n s3ss!on f!l3 f0r wr!t!ng.';
$html_login_not_allowed = 'Th!s l0g!n !s n0t 4ll0w3d f0r c0nn3x!0n.';
?>
