<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/lv.php,v 1.3 2004/06/14 11:30:06 goddess_skuld Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the english language
 * 
 */

$charset = 'ISO-8859-13';

// Configuration for the days and months

// What language to use (Here, english US --> en_US)
// see '/usr/share/locale/' for more information
$lang_locale = 'en_US';

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

$err_user_empty = 'Lietotâjvârda lauks ir tukðs';
$err_passwd_empty = 'Paroles lauks ir tukðs';


// html message

$alt_delete = 'Izdzçst izvçlçtâs vçstules';
$alt_delete_one = 'Izdzçst vçstuli';
$alt_new_msg = 'Jaunas vçstules';
$alt_reply = 'Atbildçt vçstules autoram';
$alt_reply_all = 'Atbildçt visiem';
$alt_forward = 'Pârsûtît';
$alt_next = 'Nâkoðâ vçstule';
$alt_prev = 'Iepriekðçjâ vçstule';
$html_on = 'ieslçgt';
$html_theme = 'Izskats';

// index.php

$html_lang = 'Valoda';
$html_welcome = 'Laipni lûgti';
$html_login = 'Lietotâjvârds';
$html_passwd = 'Parole';
$html_submit = 'Ievadît';
$html_help = 'Palîdzîba';
$html_server = 'Serveris';
$html_wrong = 'Lietotâjvârds un parole nav pareizi';
$html_retry = 'Mçìinât vçlreiz';

// prefs.php

$html_msgperpage = 'Messages per page'; // to translate
$html_preferences = 'Uzstâdîjumi';
$html_full_name = 'Pilns vârds';
$html_email_address = 'E-pasta adrese';
$html_ccself = 'Cc paðam';
$html_hide_addresses = 'Slçpt adreses';
$html_outlook_quoting = 'Outlook-stila citçðana';
$html_reply_to = 'Atbildçt (kam)';
$html_use_signature = 'Izmantot parakstu';
$html_signature = 'Paraksts';
$html_reply_leadin = 'Reply Leadin'; // to translate
$html_prefs_updated = 'Uzstâdîjumi saglabâti';
$html_manage_folders_link = 'Manage IMAP Folders'; // to translate
$html_manage_filters_link = 'Manage Email Filters'; // to translate
$html_use_graphical_smilies = 'Use graphical smilies'; //to translate

// folders.php
$html_folders_create_failed = 'Folder could not be created!'; // to translate
$html_folders_sub_failed = 'Could not subscribed to folder!'; // to translate
$html_folders_unsub_failed = 'Could not unsubscribed from folder!'; // to translate
$html_folders_rename_failed = 'Folder could not be renamed!'; // to translate
$html_folders_updated = 'Folders updated'; // to translate
$html_folder_subscribe = 'Subscribe to'; // to translate
$html_folder_rename = 'Rename'; // to translate
$html_folder_create = 'Create new folder called'; // to translate
$html_folder_remove = 'Unsubscribe from'; // to translate
$html_folder_delete = 'Delete';  //to translate

// filters.php
$html_filter_remove = 'Delete'; // to translate
$html_filter_body = 'Message Body'; // to translate
$html_filter_subject = 'Message Subject'; // to translate
$html_filter_to = 'To Field'; // to translate
$html_filter_cc = 'Cc Field'; // to translate
$html_filter_from = 'From Field'; // to translate
$html_filter_change_tip = 'To change a filter simply overwrite it.'; // to translate
$html_reapply_filters = 'Reapply all filters'; // to translate
$html_filter_contains = 'contains'; // to translate
$html_filter_name = 'Filter Name'; // to translate
$html_filter_action = 'Filter Action'; // to translate
$html_filter_moveto = 'Move to'; // to translate

// Other pages
$html_select_one = '--Select One--'; // to translate
$html_and = 'And'; // to translate
$html_new_msg_in = 'New messages in'; // to translate
$html_or = 'or'; // to translate
$html_move = 'Move'; // to translate
$html_copy = 'Copy'; // to translate
$html_messages_to = 'selected messages to'; // to translate
$html_gotopage = 'Go to Page'; // to translate
$html_gotofolder = 'Go to Folder'; // to translate
$html_other_folders = 'Folder List'; // to translate
$html_page = 'Page'; // to translate
$html_of = 'of'; // to translate
$html_to = 'to'; // to translate
$html_view_header = 'Apskatît galveni';
$html_remove_header = 'Paslçpt galveni';
$html_inbox = 'Inbox';
$html_new_msg = 'Rakstît';
$html_reply = 'Atbildçt';
$html_reply_short = 'Re';
$html_reply_all = 'Atbildçt visiem';
$html_forward = 'Pârsûtît';
$html_forward_short = 'Fw';
$html_delete = 'Dzçst';
$html_new = 'Jauns';
$html_mark = 'Dzçst';
$html_att = 'Pielikums';
$html_atts = 'Pielikumi';
$html_att_unknown = '[nezinâms]';
$html_attach = 'Piespraust';
$html_attach_forget = 'Jums ir jâpiesprauþ fails pirms sûtîðanas !';
$html_attach_delete = 'Novâkt izvçlçto';
$html_sort_by = 'Kârtot pçc';
$html_from = 'No';
$html_subject = 'Tçma';
$html_date = 'Datums';
$html_sent = 'Sûtît';
$html_wrote = 'rakstîja';
$html_size = 'Izmçrs';
$html_totalsize = 'Kopçjais izmçrs';
$html_kb = 'Kb';
$html_bytes = 'bytes';
$html_filename = 'Faila nosaukums';
$html_to = 'Kam';
$html_cc = 'Cc';
$html_bcc = 'Bcc';
$html_nosubject = 'bez tçmas';
$html_send = 'Sûtît';
$html_cancel = 'Atcelt';
$html_no_mail = 'Vçstuïu nav.';
$html_logout = 'Beigt darbu';
$html_msg = 'Vçstule';
$html_msgs = 'Vçstules';
$html_configuration = 'Serveris nav pareizi nokonfigurçts !';
$html_priority = 'Prioritâte';
$html_low = 'Zema';
$html_normal = 'Normâla';
$html_high = 'Augsta';
$html_receipt = 'Request a return receipt'; // to translate
$html_select = 'Izvçlçties';
$html_select_all = 'Izvçlçties visas';
$html_loading_image = 'Bilde tiek ielâdçta';
$html_send_confirmed = 'Vçstule tika pieòemta nosûtîðanai';
$html_no_sendaction = 'Rîcîba nav norâdîta. Pamçìiniet ieslçgt Java-script.';
$html_error_occurred = 'Kïûda';
$html_prefs_file_error = 'Nevar atvçrt uzstâdîjumu failu ierakstîðanai.';
$html_wrap = 'Wrap outgoing messages to :'; // to translate
$html_usenet_separator = 'Usenet separator ("-- \n") Before signature'; // to translate
// Contacts manager
$html_add = 'Add'; // to translate
$html_contacts = 'Contacts'; // to translate
$html_modify = 'Modify'; // to translate
$html_back = 'Back'; // to translate
$html_contact_add = 'Add new contact'; // to translate
$html_contact_mod = 'Modify a contact'; // to translate
$html_contact_first = 'First name'; // to translate
$html_contact_last = 'Last Name'; // to translate
$html_contact_nick = 'Nick'; // to translate
$html_contact_mail = 'Mail'; // to translate
$html_contact_list = 'Contact list of '; // to translate
$html_contact_del = 'from the contact list'; // to translate

$html_contact_err1 = 'Maximal number of contact is '; // to translate
$html_contact_err2 = 'You can\'t add a new contact'; // to translate
$html_del_msg = 'Delete selected messages ?'; // to translate
$html_down_mail = 'Download'; // to translate

$original_msg = '-- Original Message --';
$to_empty = ' \'Kam\' laukumu nedrîkst atstât tukðu !';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = "Nevar atvçrt savienojumu";
$html_smtp_error_unexpected = "Negaidîta atbilde:";

// IMAP messages (class_local.php)
$lang_could_not_connect = 'Could not connect to server'; // to translate

$html_file_upload_attack = 'Possible file upload attack'; // to translate
$html_invalid_email_address = 'Invalid e-mail address'; // to translate
$html_seperate_msg_win = 'Messages in separate window'; // to translate
?>
