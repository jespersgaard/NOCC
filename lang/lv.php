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

$err_user_empty = 'Lietot�jv�rda lauks ir tuk�s';
$err_passwd_empty = 'Paroles lauks ir tuk�s';


// html message

$alt_delete = 'Izdz�st izv�l�t�s v�stules';
$alt_delete_one = 'Izdz�st v�stuli';
$alt_new_msg = 'Jaunas v�stules';
$alt_reply = 'Atbild�t v�stules autoram';
$alt_reply_all = 'Atbild�t visiem';
$alt_forward = 'P�rs�t�t';
$alt_next = 'N�ko�� v�stule';
$alt_prev = 'Iepriek��j� v�stule';
$html_on = 'iesl�gt';
$html_theme = 'Izskats';

// index.php

$html_lang = 'Valoda';
$html_welcome = 'Laipni l�gti';
$html_login = 'Lietot�jv�rds';
$html_passwd = 'Parole';
$html_submit = 'Ievad�t';
$html_help = 'Pal�dz�ba';
$html_server = 'Serveris';
$html_wrong = 'Lietot�jv�rds un parole nav pareizi';
$html_retry = 'M��in�t v�lreiz';

// prefs.php

$html_msgperpage = 'Messages per page'; // to translate
$html_preferences = 'Uzst�d�jumi';
$html_full_name = 'Pilns v�rds';
$html_email_address = 'E-pasta adrese';
$html_ccself = 'Cc pa�am';
$html_hide_addresses = 'Sl�pt adreses';
$html_outlook_quoting = 'Outlook-stila cit��ana';
$html_reply_to = 'Atbild�t (kam)';
$html_use_signature = 'Izmantot parakstu';
$html_signature = 'Paraksts';
$html_reply_leadin = 'Reply Leadin'; // to translate
$html_prefs_updated = 'Uzst�d�jumi saglab�ti';
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
$html_view_header = 'Apskat�t galveni';
$html_remove_header = 'Pasl�pt galveni';
$html_inbox = 'Inbox';
$html_new_msg = 'Rakst�t';
$html_reply = 'Atbild�t';
$html_reply_short = 'Re';
$html_reply_all = 'Atbild�t visiem';
$html_forward = 'P�rs�t�t';
$html_forward_short = 'Fw';
$html_delete = 'Dz�st';
$html_new = 'Jauns';
$html_mark = 'Dz�st';
$html_att = 'Pielikums';
$html_atts = 'Pielikumi';
$html_att_unknown = '[nezin�ms]';
$html_attach = 'Piespraust';
$html_attach_forget = 'Jums ir j�piesprau� fails pirms s�t��anas !';
$html_attach_delete = 'Nov�kt izv�l�to';
$html_sort_by = 'K�rtot p�c';
$html_from = 'No';
$html_subject = 'T�ma';
$html_date = 'Datums';
$html_sent = 'S�t�t';
$html_wrote = 'rakst�ja';
$html_size = 'Izm�rs';
$html_totalsize = 'Kop�jais izm�rs';
$html_kb = 'Kb';
$html_bytes = 'bytes';
$html_filename = 'Faila nosaukums';
$html_to = 'Kam';
$html_cc = 'Cc';
$html_bcc = 'Bcc';
$html_nosubject = 'bez t�mas';
$html_send = 'S�t�t';
$html_cancel = 'Atcelt';
$html_no_mail = 'V�stu�u nav.';
$html_logout = 'Beigt darbu';
$html_msg = 'V�stule';
$html_msgs = 'V�stules';
$html_configuration = 'Serveris nav pareizi nokonfigur�ts !';
$html_priority = 'Priorit�te';
$html_low = 'Zema';
$html_normal = 'Norm�la';
$html_high = 'Augsta';
$html_receipt = 'Request a return receipt'; // to translate
$html_select = 'Izv�l�ties';
$html_select_all = 'Izv�l�ties visas';
$html_loading_image = 'Bilde tiek iel�d�ta';
$html_send_confirmed = 'V�stule tika pie�emta nos�t��anai';
$html_no_sendaction = 'R�c�ba nav nor�d�ta. Pam��iniet iesl�gt Java-script.';
$html_error_occurred = 'K��da';
$html_prefs_file_error = 'Nevar atv�rt uzst�d�jumu failu ierakst��anai.';
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
$to_empty = ' \'Kam\' laukumu nedr�kst atst�t tuk�u !';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = "Nevar atv�rt savienojumu";
$html_smtp_error_unexpected = "Negaid�ta atbilde:";

// IMAP messages (class_local.php)
$lang_could_not_connect = 'Could not connect to server'; // to translate

$html_file_upload_attack = 'Possible file upload attack'; // to translate
$html_invalid_email_address = 'Invalid e-mail address'; // to translate
$html_seperate_msg_win = 'Messages in separate window'; // to translate
?>
