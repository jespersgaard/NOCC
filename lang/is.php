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

$charset = 'ISO-8859-1';

// Configuration for the days and months

// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = 'is_IS';

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
$err_passwd_empty = 'Lykilor� vantar';


// html message

$alt_delete = 'Ey�a v�ldum br�fum';
$alt_delete_one = 'Ey�a br�fi';
$alt_new_msg = 'N� br�f';
$alt_reply = 'Svara sendanda';
$alt_reply_all = 'Svara �llum';
$alt_forward = '�framsenda';
$alt_next = 'N�sta br�f';
$alt_prev = 'Fyrra br�f';
$html_on = '�';
$html_theme = '�ema';

// index.php

$html_lang = 'Tungum�l';
$html_welcome = 'Velkomin/n �';
$html_login = 'Notendanafn';
$html_passwd = 'Lykilor�';
$html_submit = 'Skr� inn';
$html_help = 'Hj�lp';
$html_server = 'P�st�j�nn';
$html_wrong = 'Anna� hvort notendanafni� e�a lykilor�i� er ekki r�tt slegi� inn';
$html_retry = 'Reyna aftur';

// prefs.php

$html_msgperpage = 'Messages per page';
$html_preferences = 'Valm�guleikar';
$html_full_name = 'Fullt nafn';
$html_email_address = 'Netfang';
$html_ccself = 'Afrit � mig';
$html_hide_addresses = 'Fela netf�ng';
$html_outlook_quoting = 'Outlook-st�l quoting';
$html_reply_to = 'Svara til';
$html_use_signature = 'Nota undirskrift';
$html_signature = 'Undirskrift';
$html_reply_leadin = 'Reply Leadin';  //to translate
$html_prefs_updated = 'Valm�guleikar uppf�r�ir';
$html_manage_folders_link = 'Manage IMAP Folders';  //to translate
$html_manage_filters_link = 'Manage Email Filters';  //to translate
$html_use_graphical_smilies = 'Use graphical smilies'; //to translate

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
$html_to = 'to';  //to translate
$html_view_header = 'Sj� haus';
$html_remove_header = 'Fela haus';
$html_inbox = 'Innp�stur';
$html_new_msg = 'Semja Br�f';
$html_reply = 'Svara';
$html_reply_short = 'Re';  //to translate
$html_reply_all = 'Svara �llum';
$html_forward = 'Framsenda';
$html_forward_short = 'Fw';  //to translate
$html_delete = 'Ey�a';
$html_new = 'N�tt';
$html_mark = 'Ey�a';
$html_att = 'Vi�hengi';
$html_atts = 'Vi�hengi';
$html_att_unknown = '[��ekkt]';
$html_attach = 'Hengja vi�';
$html_attach_forget = '�� ver�ur a� hengja skr�na vi� ��ur en �� sendir skilabo�in!';
$html_attach_delete = 'Ey�a v�ldum skr�m';
$html_sort_by = 'Ra�a eftir';
$html_from = 'Fr�';
$html_subject = 'Titill';
$html_date = 'Dags.';
$html_sent = 'Senda';
$html_wrote = 'skrifa�i';
$html_size = 'St�r�';
$html_totalsize = 'Heildarst�r�';
$html_kb = 'Kb';  //to translate
$html_bytes = 'b�ti';
$html_filename = 'Skr�arnafn';
$html_to = 'Til';
$html_cc = 'Afrit';
$html_bcc = 'Blint afrit';
$html_nosubject = 'Enginn titill';
$html_send = 'Senda';
$html_cancel = 'H�tta vi�';
$html_no_mail = 'Ekkert br�f';
$html_logout = 'Skr� �t';
$html_msg = 'Br�f';
$html_msgs = 'Br�f';
$html_configuration = '�essi �j�nn er ekki vel uppsettur!';
$html_priority = 'Forgangur';
$html_low = 'L�r';
$html_normal = 'Venjulegur';
$html_high = 'H�r';
$html_receipt = 'Request a return receipt';
$html_select = 'Velja';
$html_select_all = 'Velja allt';
$html_loading_image = 'Hle� mynd';
$html_send_confirmed = 'P�sturinn var sam�ykktur fyrir sendingu';
$html_no_sendaction = 'Engar a�ger�ir m�gulegar. Reyni� a� virkja JavaScript.';
$html_error_occurred = 'Villa ger�ist';
$html_prefs_file_error = '�m�gulegt a� opna valm�guleika skr� til �tskriftar.';
$html_wrap = 'Wrap outgoing messages to :';  //to translate
$html_usenet_separator = 'Usenet separator ("-- \n") Before signature';  //to translate
$html_mark_as = 'Mark as'; //to translate
$html_read = 'read'; //to translate
$html_unread = 'unread'; //to translate

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
$html_del_msg = 'Delete selected messages ?';  //to translate
$html_down_mail = 'Download';  //to translate

$original_msg = '-- Upphaflega br�f --'; 
$to_empty = '\'Til\' reiturinn m� ekki vera au�ur!';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = '�m�gulegt a� opna tengingu';
$html_smtp_error_unexpected = '�fyrirsj�anleg vi�br�g�:';

// IMAP messages (class_local.php)
$lang_could_not_connect = 'Could not connect to server';

$html_file_upload_attack = 'Possible file upload attack';  //to translate
$html_invalid_email_address = 'Invalid e-mail address';  //to translate
$html_seperate_msg_win = 'Messages in seperate window';  //to translate
?>
