<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/sk.php,v 1.14 2003/12/21 15:40:20 goddess_skuld Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the Slovak language
 * Translation by Peter Sochna <sochna@telecom.sk>
 */

$charset = 'ISO-8859-2';

// Configuration for the days and months

// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = 'sk_SK';

// Text Alignment
// Can be right-to-left (rtl) which is needed for proper Arabic, Hebrew
// Or left-to-right (ltr) which is default for most languages
$lang_dir = 'ltr';

// What format string should we pass to strftime() for messages sent on
// days other than today?
$default_date_format = '%d.%m.%Y';

// If the local is not implemented on the host, how we display the date
$no_locale_date_format = '%d.%m.%Y';

// What format string should we pass to strftime() for messages sent
// today?
$default_time_format = '%I:%M %p';


// Here is the configuration for the HTML

$err_user_empty = 'Nezadali ste prihlasovacie meno';
$err_passwd_empty = 'Nezadali ste heslo';


// html message

$alt_delete = 'Vymaza� ozna�en� spr�vy';
$alt_delete_one = 'Vymaza�� spr�vu';
$alt_new_msg = 'Nov� spr�vy';
$alt_reply = 'Odpoveda� autorovi';
$alt_reply_all = 'Odpoveda� v�etk�m';
$alt_forward = 'Preposla�';
$alt_next = '�al�ia spr�va';
$alt_prev = 'Predo�l� spr�va';
$html_on = 'on';  //to translate
$html_theme = 'T�ma';

// index.php

$html_lang = 'Jazyk';
$html_welcome = 'Vitajte v ';
$html_login = 'Prihlasovacie meno';
$html_passwd = 'Heslo';
$html_submit = 'Prihl�si�';
$html_help = 'Pomoc';
$html_server = 'Server';  //to translate
$html_wrong = 'Bolo zadan� zl� prihlasovacie meno alebo heslo';
$html_retry = 'Zopakova�';

// prefs.php

$html_msgperpage = 'Messages per page';  //to translate
$html_preferences = 'Nastavenia';
$html_full_name = 'Cel� meno';
$html_email_address = 'E-mailov� Adresa';
$html_ccself = 'Automaticky si posla� k�piu';
$html_hide_addresses = 'Skry� adresy';
$html_outlook_quoting = 'Form�tovanie v �t�le Outlook';
$html_reply_to = 'Odpoveda�';
$html_use_signature = 'Pou�i� podpis';
$html_signature = 'Podpis';
$html_reply_leadin = 'Reply Leadin';
$html_prefs_updated = 'Nastavenia ulo�en�';
$html_manage_folders_link = 'Manage IMAP Folders';  //to translate
$html_manage_filters_link = 'Manage Email Filters';  //to translate

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
$html_view_header = 'Zobrazi� hlavi�ku';
$html_remove_header = 'Skry� hlavi�ku';
$html_inbox = 'Prijat� spr�vy';
$html_new_msg = 'Posla� spr�vu';
$html_reply = 'Odpoveda�';
$html_reply_short = 'Re';
$html_reply_all = 'Odpoveda� v�etk�m';
$html_forward = 'Preposla�';
$html_forward_short = 'Fw';
$html_delete = 'Vymaza�';
$html_new = 'Nov�';
$html_mark = 'Vymaza�';
$html_att = 'Attachment';
$html_atts = 'Attachmenty';
$html_att_unknown = '[nezn�my]';
$html_attach = 'Pripoji� attachment';
$html_attach_forget = 'Pred odoslan�m spr�vy mus�te pripoji� v� attachment !';
$html_attach_delete = 'Odstr�� ozna�en�';
$html_sort_by = 'Zorad pod�a';
$html_from = 'Odosielate�';
$html_subject = 'Nadpis';
$html_date = 'D�tum';
$html_sent = 'Poslan�';
$html_wrote = 'nap�sal';
$html_size = 'Velkos�';
$html_totalsize = 'Celkov� velkos�';
$html_kb = 'Kb';
$html_bytes = 'bytov';
$html_filename = 'S�bor';
$html_to = 'Adres�t';
$html_cc = 'K�pia';
$html_bcc = 'Tajn� k�pia';
$html_nosubject = '�iaden nadpis';
$html_send = 'Posla�';
$html_cancel = 'Zru�i�';
$html_no_mail = '�iadne spr�vy.';
$html_logout = 'Odhl�senie';
$html_msg = 'Spr�va';
$html_msgs = 'Spr�vy';
$html_configuration = 'Tento server nie je spr�vne nakonfigurovan� !';
$html_priority = 'Priorita';
$html_low = 'N�zka';
$html_normal = 'Norm�lna';
$html_high = 'Vysok�';
$html_receipt = 'Request a return receipt';
$html_select = 'Ozna�';
$html_select_all = 'Ozna� v�etko';
$html_loading_image = 'Nahr�vam obr�zok';
$html_send_confirmed = 'Spr�va bola akceptovan� na odoslanie.';
$html_no_sendaction = 'Nemo�no vykona�. Sk�ste zapn�t podporu Javaskript vo va�om prehliada�i.';
$html_error_occurred = 'Nastala chyba';
$html_prefs_file_error = 'Nemo�no otvori� s�bor nastaven� pre z�pis.';
$html_wrap = 'Wrap outgoing messages to :';  //to translate
$html_usenet_separator = 'Usenet separator ("-- \n") Before signature';  //to translate
// Contacts manager
$html_add = 'Add';
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
$html_contact_del = 'of de contact list';  //to translate

$html_contact_err1 = 'Maximal number of contact is ';  //to translate
$html_contact_err2 = 'You can\'t add a new contact';  //to translate
$html_del_msg = 'Delete selected messages ?';  //to translate
$html_down_mail = 'Download';  //to translate

$original_msg = '-- Original Message --';  //to translate
$to_empty = 'Pol��ko \'Adres�t\' nesmie by� pr�zdne !';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'Nemo�no urobi� spojenie';
$html_smtp_error_unexpected = 'Neo�ak�van� odpoved:';

// IMAP messages (class_local.php)
$lang_could_not_connect = 'Could not connect to server';  //to translate

$html_file_upload_attack = 'Possible file upload attack';  //to translate
$html_invalid_email_address = 'Invalid e-mail address';  //to translate
$html_seperate_msg_win = 'Messages in separate window';  //to translate
?>
