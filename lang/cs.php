<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/cs.php,v 1.15 2004/06/20 09:39:32 goddess_skuld Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the Czech language
 * Translation by Vaclav Habr <habr@fonet.cz>
 */

$charset = 'ISO-8859-2';

// Configuration for the days and months

// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = 'cs_CZ';

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

$err_user_empty = 'Nen� vypln�no p�ihla�ovac� jm�no ';
$err_passwd_empty = 'Nen� vypln�no heslo';


// html message

$alt_delete = 'Vymazat vybran� zpr�vy';
$alt_delete_one = 'Vymazat zpr�vu';
$alt_new_msg = 'Nov� zpr�vy';
$alt_reply = 'Odpov�d�t autorovi';
$alt_reply_all = 'Odpov�d�t v�em';
$alt_forward = 'P�edat d�l';
$alt_next = 'Dal�� zpr�va';
$alt_prev = 'P�edchoz� zpr�va';
$html_on = 'na';
$html_theme = 'T�ma';

// index.php

$html_lang = 'Jazyk';
$html_welcome = 'V�tejte v';
$html_login = 'Jm�no';
$html_passwd = 'Heslo';
$html_submit = 'Potvrdit';
$html_help = 'Pomoc';
$html_server = 'Server';
$html_wrong = 'Prihla�ovac� jm�no a heslo nesouhlas�';
$html_retry = 'Zkusit znovu';

// prefs.php

$html_msgperpage = 'Messages per page';
$html_preferences = 'Nastaven�';
$html_full_name = 'Cel� jm�no';
$html_email_address = 'E-mailov� adresa';
$html_ccself = 'Automaticky kopii sob�';
$html_hide_addresses = 'Skryj adresy';
$html_outlook_quoting = 'Form�tov�n� ve stylu Outlook';
$html_reply_to = 'Odpov�d�t';
$html_use_signature = 'Pou�ij podpis';
$html_signature = 'Podpis';
$html_reply_leadin = 'Hlavi�ka odpov�di';
$html_prefs_updated = 'Nastaven� aktualizov�no ';
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
$html_view_header = 'Zobrazit hlavi�ku';
$html_remove_header = 'Skr�t hlavi�ku';
$html_inbox = 'Doru�en� po�ta';
$html_new_msg = 'Nov� zpr�va';
$html_reply = 'Odpov�d�t';
$html_reply_short = 'Re';
$html_reply_all = 'Odpov�d�t v�em';
$html_forward = 'P�edat d�l';
$html_forward_short = 'Fw';
$html_delete = 'Vymazat';
$html_new = 'Nov�';
$html_mark = 'Vymazat';
$html_att = 'P��loha';
$html_atts = 'P��lohy';
$html_att_unknown = '[nezn�m�]';
$html_attach = 'P�ilo�it';
$html_attach_forget = 'Soubor mus� b�t p�ilo�en p�ed odesl�n�m zpr�vy';
$html_attach_delete = 'Vymazat vybran�';
$html_sort_by = 'Se�adit dle';
$html_from = 'Od';
$html_subject = 'P�edm�t';
$html_date = 'Datum';
$html_sent = 'Odeslat';
$html_wrote = 'odesl�no';
$html_size = 'Velikost';
$html_totalsize = 'Celkov� velikost';
$html_kb = 'Kb';
$html_bytes = 'bajt�';
$html_filename = 'N�zev souboru';
$html_to = 'Komu';
$html_cc = 'Kopie';
$html_bcc = 'Skryt�';
$html_nosubject = 'Bez n�zvu';
$html_send = 'Odeslat';
$html_cancel = 'Zru�it';
$html_no_mail = '��dn� zpr�va';
$html_logout = 'Odhl�en�';
$html_msg = 'Zpr�va';
$html_msgs = 'Zpr�v';
$html_configuration = 'Chybn� konfigurace serveru!!!';
$html_priority = 'D�le�itost';
$html_low = 'Mal�';
$html_normal = 'St�edn�';
$html_high = 'Vysok�';
$html_receipt = 'Potvrzen� o doru�en�';
$html_select = 'Vybrat';
$html_select_all = 'Vybrat v�e';
$html_loading_image = 'Nahr�v�m obr�zek';
$html_send_confirmed = 'V� dopis byl p�ijat k doru�en�';
$html_no_sendaction = 'Nedefinovan� akce. Zkuste povolit JavaScript.';
$html_error_occurred = 'Do�lo k chyb�';
$html_prefs_file_error = 'Chyba p�i ukl�d�n� souboru s nastaven�m.';
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

$original_msg = '-- P�vodn� zpr�va --';
$to_empty = 'Mus�te vyplnit kolonku Komu:';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'Chyba p�i vytv��en� SMTP spojen�';
$html_smtp_error_unexpected = 'Neo�ek�van� odezva SMTP:';

// IMAP messages (class_local.php)
$lang_could_not_connect = 'Chyba p�i p�ipojov�n� k serveru';

$html_file_upload_attack = 'Possible file upload attack';  //to translate
$html_invalid_email_address = 'Invalid e-mail address';  //to translate
$html_seperate_msg_win = 'Messages in separate window';  //to translate

// Exceptions
$html_err_file_contacts = 'Unable to open contacts file for writing.'; //to translate
?>
