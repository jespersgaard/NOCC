<?php
/*
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the icelandic language
 * Translation by: Firmanet ehf.
 */

$charset = 'UTF-8';

// Configuration for the days and months

// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = 'is_IS.UTF-8';

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

$err_user_empty = 'Notendanafn vantar';
$err_passwd_empty = 'Lykilorð vantar';


// html message

$alt_delete = 'Eyða völdum bréfum';
$alt_delete_one = 'Eyða bréfi';
$alt_new_msg = 'Ný bréf';
$alt_reply = 'Svara sendanda';
$alt_reply_all = 'Svara öllum';
$alt_forward = 'Áframsenda';
$alt_next = 'Next'; //to translate
$alt_prev = 'Previous'; //to translate
$title_next_page = 'Next page'; //to translate
$title_prev_page = 'Previous page'; //to translate
$title_next_msg = 'Næsta bréf';
$title_prev_msg = 'Fyrra bréf';
$html_on = 'á';
$html_theme = 'Þema';

// index.php

$html_lang = 'Tungumál';
$html_welcome = 'Velkomin/n í';
$html_login = 'Notendanafn';
$html_passwd = 'Lykilorð';
$html_submit = 'Skrá inn';
$html_help = 'Hjálp';
$html_server = 'Póstþjónn';
$html_wrong = 'Annað hvort notendanafnið eða lykilorðið er ekki rétt slegið inn';
$html_retry = 'Reyna aftur';
$html_remember = "Remember settings"; //to translate

// prefs.php

$html_msgperpage = 'Messages per page'; //to translate
$html_preferences = 'Valmöguleikar';
$html_full_name = 'Fullt nafn';
$html_email_address = 'Netfang';
$html_ccself = 'Afrit á mig';
$html_hide_addresses = 'Fela netföng';
$html_outlook_quoting = 'Outlook-stíl quoting';
$html_reply_to = 'Svara til';
$html_use_signature = 'Nota undirskrift';
$html_signature = 'Undirskrift';
$html_reply_leadin = 'Reply Leadin';  //to translate
$html_prefs_updated = 'Valmöguleikar uppfærðir';
$html_manage_folders_link = 'Manage IMAP Folders';  //to translate
$html_manage_filters_link = 'Manage Email Filters';  //to translate
$html_use_graphical_smilies = 'Use graphical smilies'; //to translate
$html_sent_folder = 'Copy sent mails into a dedicated folder'; //to translate
$html_colored_quotes = 'Colored quotes'; //to translate
$html_display_struct = 'Display structured text'; //to translate
$html_send_html_mail = 'Send mail in HTML format'; //to translate

// folders.php
$html_folders_create_failed = 'Folder could not be created!';  //to translate
$html_folders_sub_failed = 'Could not subscribed to folder!';  //to translate
$html_folders_unsub_failed = 'Could not unsubscribed from folder!';  //to translate
$html_folders_rename_failed = 'Folder could not be renamed!';  //to translate
$html_folders_updated = 'Folders updated';  //to translate
$html_folder_subscribe = 'Subscribe to';  //to translate
$html_folder_rename = 'Rename';  //to translate
$html_folder_create = 'Create new folder called';  //to translate
$html_folder_remove = 'Unsubscribe from';  //to translate
$html_folder_delete = 'Delete';  //to translate
$html_folder_to = 'to'; //to translate

// filters.php
$html_filter_remove = 'Delete';  //to translate
$html_filter_body = 'Message Body';  //to translate
$html_filter_subject = 'Message Subject';  //to translate
$html_filter_to = 'To Field';  //to translate
$html_filter_cc = 'Cc Field';  //to translate
$html_filter_from = 'From Field';  //to translate
$html_filter_change_tip = 'To change a filter simply overwrite it.';  //to translate
$html_reapply_filters = 'Reapply all filters';  //to translate
$html_filter_contains = 'contains';  //to translate
$html_filter_name = 'Filter Name';  //to translate
$html_filter_action = 'Filter Action';  //to translate
$html_filter_moveto = 'Move to';  //to translate

// Other pages
$html_select_one = '--Select One--';  //to translate
$html_and = 'And';  //to translate
$html_new_msg_in = 'New messages in';  //to translate
$html_or = 'or';  //to translate
$html_move = 'Move';  //to translate
$html_copy = 'Copy';  //to translate
$html_messages_to = 'selected messages to';  //to translate
$html_gotopage = 'Go to Page';  //to translate
$html_gotofolder = 'Go to Folder';  //to translate
$html_other_folders = 'Folder List';  //to translate
$html_page = 'Page';  //to translate
$html_of = 'of';  //to translate
$html_view_header = 'Sjá haus';
$html_remove_header = 'Fela haus';
$html_inbox = 'Innpóstur';
$html_new_msg = 'Semja Bréf';
$html_reply = 'Svara';
$html_reply_short = 'Re';  //to translate
$html_reply_all = 'Svara öllum';
$html_forward = 'Framsenda';
$html_forward_short = 'Fw';  //to translate
$html_forward_info = 'The forwarded message will be send as an attachment to this one.'; //to translate
$html_delete = 'Eyða';
$html_new = 'Nýtt';
$html_mark = 'Eyða';
$html_att = 'Viðhengi';
$html_atts = 'Viðhengi';
$html_att_unknown = '[óþekkt]';
$html_attach = 'Hengja við';
$html_attach_forget = 'Þú verður að hengja skrána við áður en þú sendir skilaboðin!';
$html_attach_delete = 'Eyða völdum skrám';
$html_attach_none = 'You must select a file to attach!';  //to translate
$html_sort_by = 'Raða eftir';
$html_sort = 'Sort'; //to translate
$html_from = 'Frá';
$html_subject = 'Titill';
$html_date = 'Dags.';
$html_sent = 'Senda';
$html_wrote = 'skrifaði';
$html_size = 'Stærð';
$html_totalsize = 'Heildarstærð';
$html_kb = 'kB';  //to translate
$html_bytes = 'bæti';
$html_filename = 'Skráarnafn';
$html_to = 'Til';
$html_cc = 'Afrit';
$html_bcc = 'Blint afrit';
$html_nosubject = 'Enginn titill';
$html_send = 'Senda';
$html_cancel = 'Hætta við';
$html_no_mail = 'Ekkert bréf';
$html_logout = 'Skrá út';
$html_msg = 'Bréf';
$html_msgs = 'Bréf';
$html_configuration = 'Þessi þjónn er ekki vel uppsettur!';
$html_priority = 'Forgangur';
$html_low = 'Lár';
$html_normal = 'Venjulegur';
$html_high = 'Hár';
$html_receipt = 'Request a return receipt';
$html_select = 'Velja';
$html_select_all = 'Invert Selection';  //to translate
$html_loading_image = 'Hleð mynd';
$html_send_confirmed = 'Pósturinn var samþykktur fyrir sendingu';
$html_no_sendaction = 'Engar aðgerðir mögulegar. Reynið að virkja JavaScript.';
$html_error_occurred = 'Villa gerðist';
$html_prefs_file_error = 'Ómögulegt að opna valmöguleika skrá til útskriftar.';
$html_wrap = 'Wrap outgoing messages to :';  //to translate
$html_wrap_none = 'None'; //to translate
$html_usenet_separator = 'Usenet separator ("-- \n") Before signature';  //to translate
$html_mark_as = 'Mark as'; //to translate
$html_read = 'read'; //to translate
$html_unread = 'unread'; //to translate
$html_encoding = 'Character encoding'; // to translate

// Contacts manager
$html_add = 'Add';  //to translate
$html_contacts = 'Contacts';  //to translate
$html_modify = 'Modify';  //to translate
$html_back = 'Back';  //to translate
$html_contact_add = 'Add new contact';  //to translate
$html_contact_mod = 'Modify a contact';  //to translate
$html_contact_first = 'First name';  //to translate
$html_contact_last = 'Last Name';  //to translate
$html_contact_nick = 'Nick';  //to translate
$html_contact_mail = 'Mail';  //to translate
$html_contact_list = 'Contact list of ';  //to translate
$html_contact_del = 'from the contact list';  //to translate

$html_contact_err1 = 'Maximal number of contact is ';  //to translate
$html_contact_err2 = 'You can\'t add a new contact';  //to translate
$html_contact_err3 = 'You don\'t have access rights to contact list'; //to translate
$html_del_msg = 'Delete selected messages ?';  //to translate
$html_down_mail = 'Download';  //to translate

$original_msg = '-- Upphaflega bréf --'; 
$to_empty = '\'Til\' reiturinn má ekki vera auður!';

// Images warning
$html_images_warning = 'For your security, remote pictures are not displayed.'; // to translate
$html_images_display = 'Display pictures'; // to translate

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'Ómögulegt að opna tengingu';
$html_smtp_error_unexpected = 'Ófyrirsjáanleg viðbrögð:';

// IMAP messages (class_local.php)
$lang_could_not_connect = 'Could not connect to server';
$lang_invalid_msg_num = 'Bad Message Number';  //to translate

$html_file_upload_attack = 'Possible file upload attack';  //to translate
$html_invalid_email_address = 'Invalid e-mail address';  //to translate
$html_invalid_msg_per_page = 'Invalid number of messages per page';  //to translate
$html_invalid_wrap_msg = 'Invalid message wrap width';  //to translate
$html_seperate_msg_win = 'Messages in seperate window';  //to translate

// Exceptions
$html_err_file_contacts = 'Unable to open contacts file for writing.'; //to translate
$html_session_file_error = 'Unable to open session file for writing.';  //to translate
$html_login_not_allowed = 'This login is not allowed for connexion.'; //to translate
?>
