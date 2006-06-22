<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/fi.php,v 1.33 2005/07/20 09:45:50 goddess_skuld Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the finnish language
 * Translation by Jarmo Järvenpää <Jarmo.Jarvenpaa@softers.net>
 */

$charset = 'UTF-8';

// Configuration for the days and months

// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = 'fi_FI.UTF-8';

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

$err_user_empty = 'Käyttäjätunnus-kenttä on tyhjä';
$err_passwd_empty = 'Salasana-kenttä on tyhjä';


// html message

$alt_delete = 'Poista valitut viestit';
$alt_delete_one = 'Poista viesti';
$alt_new_msg = 'Uudet viestit';
$alt_reply = 'Vastaa kirjoittajalle';
$alt_reply_all = 'Vastaa kaikille';
$alt_forward = 'Edelleenlähetä';
$alt_next = 'Seuraava viesti';
$alt_prev = 'Edellinen viesti';
$html_on = 'on';  //to translate
$html_theme = 'Teema';

// index.php

$html_lang = 'Kieli';
$html_welcome = 'Tervetuloa';
$html_login = 'Käyttäjätunnus';
$html_passwd = 'Salasana';
$html_submit = 'Sisään';
$html_help = 'Apua';
$html_server = 'Palvelin';
$html_wrong = 'Käyttäjätunnus tai salasana on virheellinen';
$html_retry = 'Uudestaan';
$html_remember = "Remember settings"; //to translate

// prefs.php

$html_msgperpage = 'Messages per page';
$html_preferences = 'Asetukset';
$html_full_name = 'Koko nimi';
$html_email_address = 'Sähkäpostiosoitteet';
$html_ccself = 'Kopio itsellesi';
$html_hide_addresses = 'Piilota osoitteet';
$html_outlook_quoting = 'Outlook-tyyppinen lainaus';
$html_reply_to = 'Vastaa';
$html_use_signature = 'Käytä allekirjoitusta';
$html_signature = 'Allekirjoitus';
$html_reply_leadin = 'Reply Leadin';  //to translate
$html_prefs_updated = 'Asetukset Päivitetty';
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
$html_view_header = 'Näytä otsikot';
$html_remove_header = 'Piilota otsikot';
$html_inbox = 'Postilaatikko';
$html_new_msg = 'Uusi viesti';
$html_reply = 'Vastaa';
$html_reply_short = 'Re';  //to translate
$html_reply_all = 'Vastaa kaikille';
$html_forward = 'Edelleenlähetä';
$html_forward_short = 'Fw';  //to translate
$html_forward_info = 'The forwarded message will be send as an attachment to this one.'; //to translate
$html_delete = 'Poista';
$html_new = 'Uusi';
$html_mark = 'Poista';
$html_att = 'Liite';
$html_atts = 'Liitteet';
$html_att_unknown = '[tuntematon]';
$html_attach = 'Liitä';
$html_attach_forget = 'Sinun täytyy liittää tiedosto(t) ennen lähetystä';
$html_attach_delete = 'Poista valitut';
$html_attach_none = 'You must select a file to attach!';  //to translate
$html_sort_by = 'Järjestele';
$html_from = 'Keneltä';
$html_subject = 'Aihe';
$html_date = 'Päivä';
$html_sent = 'Lähetä';
$html_wrote = 'kirjoitti';
$html_size = 'Koko';
$html_totalsize = 'Kokonais määrä';
$html_kb = 'Kb';
$html_bytes = 'tavua';
$html_filename = 'Tiedostonimi';
$html_to = 'Kenelle';
$html_cc = 'Kopio';
$html_bcc = 'Bcc';  //to translate
$html_nosubject = 'Ei viestin aihetta';
$html_send = 'Lähetä';
$html_cancel = 'Peruuta';
$html_no_mail = 'Ei viestiä.';
$html_logout = 'Poistu järjestelmästä';
$html_msg = 'Viesti';
$html_msgs = 'Viestiä';
$html_configuration = 'Tätä palvelinta ei ole asennettu oikein';
$html_priority = 'Kiireellisyys';
$html_low = 'Matala';
$html_normal = 'Tavallinen';
$html_high = 'Korkea';
$html_receipt = 'Request a return receipt';
$html_select = 'Valitse';
$html_select_all = 'Invert Selection';  //to translate
$html_loading_image = 'Lataan kuvaa';
$html_send_confirmed = 'Sähköpostisi on onnistuneesti lähetetty';
$html_no_sendaction = 'Toimintoa ei määritelty. Kokeile sallia JavaScriptin suoritus selaimessasi.';
$html_error_occurred = 'Tapahtui virhe';
$html_prefs_file_error = 'En voi avata asetustiedostoa päivitystä varten.';
$html_wrap = 'Wrap outgoing messages to :';  //to translate
$html_wrap_none = 'None'; //to translate
$html_usenet_separator = 'Usenet separator ("-- \n") Before signature';  //to translate
$html_mark_as = 'Mark as'; //to translate
$html_read = 'read'; //to translate
$html_unread = 'unread'; //to translate
$html_mail_sent = 'Message successfully sent'; // to translate
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

$original_msg = '-- Alkuperäinen viesti --';
$to_empty = '\'Kenelle\' kenttä ei saa olla tyhjä';

// Images warning
$html_images_warning = 'For your security, distant images are not displayed.'; // to translate
$html_images_display = 'Display images'; // to translate

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'Yhteyttä ei saada avattua.';
$html_smtp_error_unexpected = 'Odottamaton vastine:';

// IMAP messages (class_local.php)
$lang_could_not_connect = 'Ei saa yhteyttä palvelimeen.';
$lang_invalid_msg_num = 'Bad Message Number';  //to translate

$html_file_upload_attack = 'Mahdollinen upload-hyökkäys palvelimelle';
$html_invalid_email_address = 'Invalid e-mail address';  //to translate
$html_invalid_msg_per_page = 'Invalid number of messages per page';  //to translate
$html_invalid_wrap_msg = 'Invalid message wrap width';  //to translate
$html_seperate_msg_win = 'Messages in separate window';  //to translate

// Exceptions
$html_err_file_contacts = 'Unable to open contacts file for writing.'; //to translate
?>
