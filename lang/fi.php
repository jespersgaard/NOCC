<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/fi.php,v 1.16 2004/06/15 10:37:09 goddess_skuld Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the finnish language
 * Translation by Jarmo J‰rvenp‰‰ <Jarmo.Jarvenpaa@softers.net>
 */

$charset = 'ISO-8859-1';

// Configuration for the days and months

// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = 'fi_FI';

// Text Alignment
// Can be right-to-left (rtl) which is needed for proper Arabic, Hebrew
// Or left-to-right (ltr) which is default for most languages
$lang_dir = 'ltr';

// What format string should we pass to strftime() for messages sent on
// days other than today?
$default_date_format = '%d-%m-%Y';

// If the local is not implemented on the host, how we display the date
$no_locale_date_format = '%Y-%m-%d';

// What format string should we pass to strftime() for messages sent
// today?
$default_time_format = '%I:%M %p';


// Here is the configuration for the HTML

$err_user_empty = 'K&auml;ytt&auml;j&auml;tunnus-kentt&auml; on tyhj&auml;';
$err_passwd_empty = 'Salasana-kentt&auml; on tyhj&auml;';


// html message

$alt_delete = 'Poista valitut viestit';
$alt_delete_one = 'Poista viesti';
$alt_new_msg = 'Uudet viestit';
$alt_reply = 'Vastaa kirjoittajalle';
$alt_reply_all = 'Vastaa kaikille';
$alt_forward = 'Edelleenl&auml;het&auml;';
$alt_next = 'Seuraava viesti';
$alt_prev = 'Edellinen viesti';
$html_on = 'on';  //to translate
$html_theme = 'Teema';

// index.php

$html_lang = 'Kieli';
$html_welcome = 'Tervetuloa';
$html_login = 'K&auml;ytt&auml;j&auml;tunnus';
$html_passwd = 'Salasana';
$html_submit = 'Sis&auml;&auml;n';
$html_help = 'Apua';
$html_server = 'Palvelin';
$html_wrong = 'K&auml;ytt&auml;j&auml;tunnus tai salasana on virheellinen';
$html_retry = 'Uudestaan';

// prefs.php

$html_msgperpage = 'Messages per page';
$html_preferences = 'Asetukset';
$html_full_name = 'Koko nimi';
$html_email_address = 'S&auml;hk&ouml;postiosoitteet';
$html_ccself = 'Kopio itsellesi';
$html_hide_addresses = 'Piilota osoitteet';
$html_outlook_quoting = 'Outlook-tyyppinen lainaus';
$html_reply_to = 'Vastaa';
$html_use_signature = 'K&auml;yt&auml; allekirjoitusta';
$html_signature = 'Allekirjoitus';
$html_reply_leadin = 'Reply Leadin';  //to translate
$html_prefs_updated = 'Asetukset P&auml;ivitetty';
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
$html_view_header = 'N&auml;yt&auml; otsikot';
$html_remove_header = 'Piilota otsikot';
$html_inbox = 'Postilaatikko';
$html_new_msg = 'Uusi viesti';
$html_reply = 'Vastaa';
$html_reply_short = 'Re';  //to translate
$html_reply_all = 'Vastaa kaikille';
$html_forward = 'Edelleenl&auml;het&auml;';
$html_forward_short = 'Fw';  //to translate
$html_delete = 'Poista';
$html_new = 'Uusi';
$html_mark = 'Poista';
$html_att = 'Liite';
$html_atts = 'Liitteet';
$html_att_unknown = '[tuntematon]';
$html_attach = 'Liit&auml;';
$html_attach_forget = 'Sinun t&auml;ytyy liitt&auml;&auml; tiedosto(t) ennen l&auml;hetyst&auml;';
$html_attach_delete = 'Poista valitut';
$html_sort_by = 'J&auml;rjestele';
$html_from = 'Kenelt&auml;';
$html_subject = 'Aihe';
$html_date = 'P&auml;iv&auml;';
$html_sent = 'L&auml;het&auml;';
$html_wrote = 'kirjoitti';
$html_size = 'Koko';
$html_totalsize = 'Kokonais m&auml;&auml;r&auml;';
$html_kb = 'Kb';
$html_bytes = 'tavua';
$html_filename = 'Tiedostonimi';
$html_to = 'Kenelle';
$html_cc = 'Kopio';
$html_bcc = 'Bcc';  //to translate
$html_nosubject = 'Ei viestin aihetta';
$html_send = 'L&auml;het&auml;';
$html_cancel = 'Peruuta';
$html_no_mail = 'Ei viesti&auml;.';
$html_logout = 'Poistu j&auml;rjestelm&auml;st&auml;';
$html_msg = 'Viesti';
$html_msgs = 'Viesti‰';
$html_configuration = 'T&auml;t&auml; palvelinta ei ole asennettu oikein';
$html_priority = 'Kiireellisyys';
$html_low = 'Matala';
$html_normal = 'Tavallinen';
$html_high = 'Korkea';
$html_receipt = 'Request a return receipt';
$html_select = 'Valitse';
$html_select_all = 'Valitse kaikki';
$html_loading_image = 'Lataan kuvaa';
$html_send_confirmed = 'S&auml;hk&ouml;postisi on onnistuneesti l&auml;hetetty';
$html_no_sendaction = 'Toimintoa ei m&auml;&auml;ritelty. Kokeile sallia JavaScriptin suoritus selaimessasi.';
$html_error_occurred = 'Tapahtui virhe';
$html_prefs_file_error = 'En voi avata asetustiedostoa p&auml;ivityst&auml; varten.';
$html_wrap = 'Wrap outgoing messages to :';  //to translate
$html_usenet_separator = 'Usenet separator ("-- \n") Before signature';  //to translate
$html_mark_read = 'Mark as read'; //to translate
$html_mark_unread = 'Mark as unread'; //to translate

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

$original_msg = '-- Alkuper&auml;inen viesti --';
$to_empty = '\'Kenelle\' kentt&auml; ei saa olla tyhj&auml;';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'Yhteytt&auml; ei saada avattua.';
$html_smtp_error_unexpected = 'Odottamaton vastine:';

// IMAP messages (class_local.php)
$lang_could_not_connect = 'Ei saa yhteytt&auml; palvelimeen.';

$html_file_upload_attack = 'Mahdollinen upload-hy&ouml;kk&auml;ys palvelimelle';
$html_invalid_email_address = 'Invalid e-mail address';  //to translate
$html_seperate_msg_win = 'Messages in separate window';  //to translate
?>
