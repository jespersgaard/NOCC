<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/sk.php,v 1.39 2006/09/04 07:58:43 goddess_skuld Exp $
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

$charset = 'UTF-8';

// Configuration for the days and months

// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = 'sk_SK.UTF-8';

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

$alt_delete = 'Vymazať označené správy';
$alt_delete_one = 'Vymazať správu';
$alt_new_msg = 'Nová správy';
$alt_reply = 'Odpovedať autorovi';
$alt_reply_all = 'Odpovedať všetkým';
$alt_forward = 'Preposlať';
$alt_next = 'Ďalšia správa';
$alt_prev = 'Predošlá správa';
$html_on = 'on';  //to translate
$html_theme = 'Téma';

// index.php

$html_lang = 'Jazyk';
$html_welcome = 'Vitajte v ';
$html_login = 'Prihlasovacie meno';
$html_passwd = 'Heslo';
$html_submit = 'Prihlásiť';
$html_help = 'Pomoc';
$html_server = 'Server';  //to translate
$html_wrong = 'Bolo zadané zlé prihlasovacie meno alebo heslo';
$html_retry = 'Zopakovať';
$html_remember = "Remember settings"; //to translate

// prefs.php

$html_msgperpage = 'Messages per page';  //to translate
$html_preferences = 'Nastavenia';
$html_full_name = 'Celé meno';
$html_email_address = 'E-mailová Adresa';
$html_ccself = 'Automaticky si poslať kópiu';
$html_hide_addresses = 'Skryť adresy';
$html_outlook_quoting = 'Formátovanie v štýle Outlook';
$html_reply_to = 'Odpovedať';
$html_use_signature = 'Použiť podpis';
$html_signature = 'Podpis';
$html_reply_leadin = 'Reply Leadin';
$html_prefs_updated = 'Nastavenia uložené';
$html_manage_folders_link = 'Manage IMAP Folders';  //to translate
$html_manage_filters_link = 'Manage Email Filters';  //to translate
$html_use_graphical_smilies = 'Use graphical smilies'; //to translate
$html_sent_folder = 'Copy sent mails into a dedicated folder'; //to translate

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
$html_view_header = 'Zobraziť hlavičku';
$html_remove_header = 'Skryť hlavičku';
$html_inbox = 'Prijaté správy';
$html_new_msg = 'Poslať správu';
$html_reply = 'Odpovedať';
$html_reply_short = 'Re';
$html_reply_all = 'Odpovedať všetkým';
$html_forward = 'Preposlať';
$html_forward_short = 'Fw';
$html_forward_info = 'The forwarded message will be send as an attachment to this one.'; //to translate
$html_delete = 'Vymazať';
$html_new = 'Nový';
$html_mark = 'Vymazať';
$html_att = 'Attachment';
$html_atts = 'Attachmenty';
$html_att_unknown = '[neznámy]';
$html_attach = 'Pripojiť attachment';
$html_attach_forget = 'Pred odoslaním správy musíte pripojiť váš attachment !';
$html_attach_delete = 'Odstráň označené';
$html_attach_none = 'You must select a file to attach!';  //to translate
$html_sort_by = 'Zorad podľa';
$html_sort = 'Sort'; //to translate
$html_from = 'Odosielateľ';
$html_subject = 'Nadpis';
$html_date = 'Dátum';
$html_sent = 'Poslané';
$html_wrote = 'napísal';
$html_size = 'Velkosť';
$html_totalsize = 'Celková velkosť';
$html_kb = 'Kb';
$html_bytes = 'bytov';
$html_filename = 'Súbor';
$html_to = 'Adresát';
$html_cc = 'Kópia';
$html_bcc = 'Tajná kópia';
$html_nosubject = 'Žiaden nadpis';
$html_send = 'Poslať';
$html_cancel = 'Zrušiť';
$html_no_mail = 'Žiadne správy.';
$html_logout = 'Odhlásenie';
$html_msg = 'Správa';
$html_msgs = 'Správy';
$html_configuration = 'Tento server nie je správne nakonfigurovaný !';
$html_priority = 'Priorita';
$html_low = 'Nízka';
$html_normal = 'Normálna';
$html_high = 'Vysoká';
$html_receipt = 'Request a return receipt';
$html_select = 'Označ';
$html_select_all = 'Invert Selection';  //to translate
$html_loading_image = 'Nahrávam obrázok';
$html_send_confirmed = 'Správa bola akceptovaná na odoslanie.';
$html_no_sendaction = 'Nemožno vykonať. Skúste zapnút podporu Javaskript vo vašom prehliadači.';
$html_error_occurred = 'Nastala chyba';
$html_prefs_file_error = 'Nemožno otvoriť súbor nastavení pre zápis.';
$html_wrap = 'Wrap outgoing messages to :';  //to translate
$html_wrap_none = 'None'; //to translate
$html_usenet_separator = 'Usenet separator ("-- \n") Before signature';  //to translate
$html_mark_as = 'Mark as'; //to translate
$html_read = 'read'; //to translate
$html_unread = 'unread'; //to translate
$html_mail_sent = 'Message successfully sent'; // to translate
$html_encoding = 'Character encoding'; // to translate

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
$html_contact_del = 'from the contact list';  //to translate

$html_contact_err1 = 'Maximal number of contact is ';  //to translate
$html_contact_err2 = 'You can\'t add a new contact';  //to translate
$html_contact_err3 = 'You don\'t have access rights to contact list'; //to translate
$html_del_msg = 'Delete selected messages ?';  //to translate
$html_down_mail = 'Download';  //to translate

$original_msg = '-- Original Message --';  //to translate
$to_empty = 'Políčko \'Adresát\' nesmie byť prázdne !';

// Images warning
$html_images_warning = 'For your security, remote pictures are not displayed.'; // to translate
$html_images_display = 'Display pictures'; // to translate

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'Nemožno urobiť spojenie';
$html_smtp_error_unexpected = 'Neočakávaná odpoved:';

// IMAP messages (class_local.php)
$lang_could_not_connect = 'Could not connect to server';  //to translate
$lang_invalid_msg_num = 'Bad Message Number';  //to translate

$html_file_upload_attack = 'Possible file upload attack';  //to translate
$html_invalid_email_address = 'Invalid e-mail address';  //to translate
$html_invalid_msg_per_page = 'Invalid number of messages per page';  //to translate
$html_invalid_wrap_msg = 'Invalid message wrap width';  //to translate
$html_seperate_msg_win = 'Messages in separate window';  //to translate

// Exceptions
$html_err_file_contacts = 'Unable to open contacts file for writing.'; //to translate
$html_session_file_error = 'Unable to open session file for writing.';  //to translate
?>
