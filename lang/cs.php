<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/cs.php,v 1.27 2005/06/20 16:30:09 goddess_skuld Exp $ 
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

$charset = 'UTF-8';

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

$err_user_empty = 'Není vyplněno přihlašovací jméno ';
$err_passwd_empty = 'Není vyplněno heslo';


// html message

$alt_delete = 'Vymazat vybrané zprávy';
$alt_delete_one = 'Vymazat zprávu';
$alt_new_msg = 'Nové zprávy';
$alt_reply = 'Odpovědět autorovi';
$alt_reply_all = 'Odpovědět všem';
$alt_forward = 'Předat dál';
$alt_next = 'Další zpráva';
$alt_prev = 'Předchozí zpráva';
$html_on = 'na';
$html_theme = 'Téma';

// index.php

$html_lang = 'Jazyk';
$html_welcome = 'Vítejte v';
$html_login = 'Jméno';
$html_passwd = 'Heslo';
$html_submit = 'Potvrdit';
$html_help = 'Pomoc';
$html_server = 'Server';
$html_wrong = 'Prihlašovací jméno a heslo nesouhlasí';
$html_retry = 'Zkusit znovu';
$html_remember = "Remember settings"; //to translate

// prefs.php

$html_msgperpage = 'Messages per page';
$html_preferences = 'Nastavení';
$html_full_name = 'Celé jméno';
$html_email_address = 'E-mailová adresa';
$html_ccself = 'Automaticky kopii sobě';
$html_hide_addresses = 'Skryj adresy';
$html_outlook_quoting = 'Formátování ve stylu Outlook';
$html_reply_to = 'Odpovědět';
$html_use_signature = 'Použij podpis';
$html_signature = 'Podpis';
$html_reply_leadin = 'Hlavička odpovědi';
$html_prefs_updated = 'Nastavení aktualizováno ';
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
$html_view_header = 'Zobrazit hlavičku';
$html_remove_header = 'Skrýt hlavičku';
$html_inbox = 'Doručená pošta';
$html_new_msg = 'Nová zpráva';
$html_reply = 'Odpovědět';
$html_reply_short = 'Re';
$html_reply_all = 'Odpovědět všem';
$html_forward = 'Předat dál';
$html_forward_short = 'Fw';
$html_forward_info = 'The forwarded message will be send as an attachment to this one.'; //to translate
$html_delete = 'Vymazat';
$html_new = 'Nová';
$html_mark = 'Vymazat';
$html_att = 'Příloha';
$html_atts = 'Přílohy';
$html_att_unknown = '[neznámá]';
$html_attach = 'Přiložit';
$html_attach_forget = 'Soubor musí být přiložen před odesláním zprávy';
$html_attach_delete = 'Vymazat vybrané';
$html_attach_none = 'You must select a file to attach!';  //to translate
$html_sort_by = 'Seřadit dle';
$html_from = 'Od';
$html_subject = 'Předmět';
$html_date = 'Datum';
$html_sent = 'Odeslat';
$html_wrote = 'odesláno';
$html_size = 'Velikost';
$html_totalsize = 'Celková velikost';
$html_kb = 'Kb';
$html_bytes = 'bajtů';
$html_filename = 'Název souboru';
$html_to = 'Komu';
$html_cc = 'Kopie';
$html_bcc = 'Skrytá';
$html_nosubject = 'Bez názvu';
$html_send = 'Odeslat';
$html_cancel = 'Zrušit';
$html_no_mail = 'Žádná zpráva';
$html_logout = 'Odhlášení';
$html_msg = 'Zpráva';
$html_msgs = 'Zpráv';
$html_configuration = 'Chybná konfigurace serveru!!!';
$html_priority = 'Důležitost';
$html_low = 'Malá';
$html_normal = 'Střední';
$html_high = 'Vysoká';
$html_receipt = 'Potvrzení o doručení';
$html_select = 'Vybrat';
$html_select_all = 'Invert Selection';  //to translate
$html_loading_image = 'Nahrávám obrázek';
$html_send_confirmed = 'Váš dopis byl přijat k doručení';
$html_no_sendaction = 'Nedefinovaná akce. Zkuste povolit JavaScript.';
$html_error_occurred = 'Došlo k chybě';
$html_prefs_file_error = 'Chyba při ukládání souboru s nastavením.';
$html_wrap = 'Wrap outgoing messages to :';  //to translate
$html_wrap_none = 'None'; //to translate
$html_usenet_separator = 'Usenet separator ("-- \n") Before signature';  //to translate
$html_mark_as = 'Mark as'; //to translate
$html_read = 'read'; //to translate
$html_unread = 'unread'; //to translate
$html_mail_sent = 'Message successfully sent'; // to translate

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

$original_msg = '-- Původní zpráva --';
$to_empty = 'Musíte vyplnit kolonku Komu:';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'Chyba při vytváření SMTP spojení';
$html_smtp_error_unexpected = 'Neočekávaná odezva SMTP:';

// IMAP messages (class_local.php)
$lang_could_not_connect = 'Chyba při připojování k serveru';
$lang_invalid_msg_num = 'Bad Message Number';  //to translate

$html_file_upload_attack = 'Possible file upload attack';  //to translate
$html_invalid_email_address = 'Invalid e-mail address';  //to translate
$html_invalid_msg_per_page = 'Invalid number of messages per page';  //to translate
$html_invalid_wrap_msg = 'Invalid message wrap width';  //to translate
$html_seperate_msg_win = 'Messages in separate window';  //to translate

// Exceptions
$html_err_file_contacts = 'Unable to open contacts file for writing.'; //to translate
?>
