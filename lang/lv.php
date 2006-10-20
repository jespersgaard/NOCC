<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/lv.php,v 1.32 2006/10/18 19:22:13 goddess_skuld Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the latvian language
 * 
 */

$charset = 'UTF-8';

// Configuration for the days and months

// What language to use (Here, english US --> en_US)
// see '/usr/share/locale/' for more information
$lang_locale = 'en_US.UTF-8';

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

$err_user_empty = 'Lietotājvārda lauks ir tukšs';
$err_passwd_empty = 'Paroles lauks ir tukšs';


// html message

$alt_delete = 'Izdzēst izvēlētās vēstules';
$alt_delete_one = 'Izdzēst vēstuli';
$alt_new_msg = 'Jaunas vēstules';
$alt_reply = 'Atbildēt vēstules autoram';
$alt_reply_all = 'Atbildēt visiem';
$alt_forward = 'Pārsūtīt';
$alt_next = 'Next'; //to translate
$alt_prev = 'Previous'; //to translate
$title_next_page = 'Next page'; //to translate
$title_prev_page = 'Previous page'; //to translate
$title_next_msg = 'Nākošā vēstule';
$title_prev_msg = 'Iepriekšējā vēstule';
$html_on = 'ieslēgt';
$html_theme = 'Izskats';

// index.php

$html_lang = 'Valoda';
$html_welcome = 'Laipni lūgti';
$html_login = 'Lietotājvārds';
$html_passwd = 'Parole';
$html_submit = 'Ievadīt';
$html_help = 'Palīdzība';
$html_server = 'Serveris';
$html_wrong = 'Lietotājvārds un parole nav pareizi';
$html_retry = 'Mēģināt vēlreiz';
$html_remember = "Remember settings"; //to translate

// prefs.php

$html_msgperpage = 'Messages per page'; // to translate
$html_preferences = 'Uzstādījumi';
$html_full_name = 'Pilns vārds';
$html_email_address = 'E-pasta adrese';
$html_ccself = 'Cc pašam';
$html_hide_addresses = 'Slēpt adreses';
$html_outlook_quoting = 'Outlook-stila citēšana';
$html_reply_to = 'Atbildēt (kam)';
$html_use_signature = 'Izmantot parakstu';
$html_signature = 'Paraksts';
$html_reply_leadin = 'Reply Leadin'; // to translate
$html_prefs_updated = 'Uzstādījumi saglabāti';
$html_manage_folders_link = 'Manage IMAP Folders'; // to translate
$html_manage_filters_link = 'Manage Email Filters'; // to translate
$html_use_graphical_smilies = 'Use graphical smilies'; //to translate
$html_sent_folder = 'Copy sent mails into a dedicated folder'; //to translate
$html_colored_quotes = 'Colored quotes'; //to translate
$html_display_struct = 'Display structured text'; //to translate
$html_send_html_mail = 'Send mail in HTML format'; //to translate

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
$html_folder_to = 'to'; //to translate

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
$html_view_header = 'Apskatīt galveni';
$html_remove_header = 'Paslēpt galveni';
$html_inbox = 'Inbox'; //to translate
$html_new_msg = 'Rakstīt';
$html_reply = 'Atbildēt';
$html_reply_short = 'Re'; //to translate
$html_reply_all = 'Atbildēt visiem';
$html_forward = 'Pārsūtīt';
$html_forward_short = 'Fw'; //to translate
$html_forward_info = 'The forwarded message will be send as an attachment to this one.'; //to translate
$html_delete = 'Dzēst';
$html_new = 'Jauns';
$html_mark = 'Dzēst';
$html_att = 'Pielikums';
$html_atts = 'Pielikumi';
$html_att_unknown = '[nezināms]';
$html_attach = 'Piespraust';
$html_attach_forget = 'Jums ir jāpiesprauž fails pirms sūtīšanas !';
$html_attach_delete = 'Novākt izvēlēto';
$html_attach_none = 'You must select a file to attach!';  //to translate
$html_sort_by = 'Kārtot pēc';
$html_sort = 'Kārtot';
$html_from = 'No';
$html_subject = 'Tēma';
$html_date = 'Datums';
$html_sent = 'Sūtīt';
$html_wrote = 'rakstīja';
$html_size = 'Izmērs';
$html_totalsize = 'Kopējais izmērs';
$html_kb = 'kB'; //to translate
$html_bytes = 'bytes'; //to translate
$html_filename = 'Faila nosaukums';
$html_to = 'Kam';
$html_cc = 'Cc'; //to translate
$html_bcc = 'Bcc'; //to translate
$html_nosubject = 'bez tēmas';
$html_send = 'Sūtīt';
$html_cancel = 'Atcelt';
$html_no_mail = 'Vēstuļu nav.';
$html_logout = 'Beigt darbu';
$html_msg = 'Vēstule';
$html_msgs = 'Vēstules';
$html_configuration = 'Serveris nav pareizi nokonfigurēts !';
$html_priority = 'Prioritāte';
$html_low = 'Zema';
$html_normal = 'Normāla';
$html_high = 'Augsta';
$html_receipt = 'Request a return receipt'; // to translate
$html_select = 'Izvēlēties';
$html_select_all = 'Invert Selection';  //to translate
$html_loading_image = 'Bilde tiek ielādēta';
$html_send_confirmed = 'Vēstule tika pieņemta nosūtīšanai';
$html_no_sendaction = 'Rīcība nav norādīta. Pamēģiniet ieslēgt Java-script.';
$html_error_occurred = 'Kļūda';
$html_prefs_file_error = 'Nevar atvērt uzstādījumu failu ierakstīšanai.';
$html_wrap = 'Wrap outgoing messages to :'; // to translate
$html_wrap_none = 'None'; //to translate
$html_usenet_separator = 'Usenet separator ("-- \n") Before signature'; // to translate
$html_mark_as = 'Mark as'; //to translate
$html_read = 'read'; //to translate
$html_unread = 'unread'; //to translate
$html_encoding = 'Character encoding'; // to translate

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
$html_contact_err3 = 'You don\'t have access rights to contact list'; //to translate
$html_del_msg = 'Delete selected messages ?'; // to translate
$html_down_mail = 'Download'; // to translate

$original_msg = '-- Original Message --';
$to_empty = ' \'Kam\' laukumu nedrīkst atstāt tukšu !';

// Images warning
$html_images_warning = 'For your security, remote pictures are not displayed.'; // to translate
$html_images_display = 'Display pictures'; // to translate

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = "Nevar atvērt savienojumu";
$html_smtp_error_unexpected = "Negaidīta atbilde:";

// IMAP messages (class_local.php)
$lang_could_not_connect = 'Could not connect to server'; // to translate
$lang_invalid_msg_num = 'Bad Message Number';  //to translate

$html_file_upload_attack = 'Possible file upload attack'; // to translate
$html_invalid_email_address = 'Invalid e-mail address'; // to translate
$html_invalid_msg_per_page = 'Invalid number of messages per page';  //to translate
$html_invalid_wrap_msg = 'Invalid message wrap width';  //to translate
$html_seperate_msg_win = 'Messages in separate window'; // to translate

// Exceptions
$html_err_file_contacts = 'Unable to open contacts file for writing.'; //to translate
$html_session_file_error = 'Unable to open session file for writing.';  //to translate
$html_login_not_allowed = 'This login is not allowed for connexion.'; //to translate
?>
