<?php
/*
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the icelandic language
 * 
 * Translation by: Firmanet ehf.
 */

$charset = 'ISO-8859-1';

// Configuration for the days and months

// What language to use (Here, english US --> en_US)
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
$err_passwd_empty = 'Lykilorð vantar';


// html message

$alt_delete = 'Eyða völdum bréfum';
$alt_delete_one = 'Eyða bréfi';
$alt_new_msg = 'Ný bréf';
$alt_reply = 'Svara sendanda';
$alt_reply_all = 'Svara öllum';
$alt_forward = 'Áframsenda';
$alt_next = 'Næsta bréf';
$alt_prev = 'Fyrra bréf';
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

// prefs.php

$html_preferences = 'Valmöguleikar';
$html_full_name = 'Fullt nafn';
$html_email_address = 'Netfang';
$html_ccself = 'Afrit á mig';
$html_hide_addresses = 'Fela netföng';
$html_outlook_quoting = 'Outlook-stíl quoting';
$html_reply_to = 'Svara til';
$html_use_signature = 'Nota undirskrift';
$html_signature = 'Undirskrift';
$html_prefs_updated = 'Valmöguleikar uppfærðir';

// Other pages

$html_view_header = 'Sjá haus';
$html_remove_header = 'Fela haus';
$html_inbox = 'Innpóstur';
$html_new_msg = 'Semja Bréf';
$html_reply = 'Svara';
$html_reply_short = 'Re';
$html_reply_all = 'Svara öllum';
$html_forward = 'Framsenda';
$html_forward_short = 'Fw';
$html_delete = 'Eyða';
$html_new = 'Nýtt';
$html_mark = 'Eyða';
$html_att = 'Viðhengi';
$html_atts = 'Viðhengi';
$html_att_unknown = '[óþekkt]';
$html_attach = 'Hengja við';
$html_attach_forget = 'Þú verður að hengja skrána við áður en þú sendir skilaboðin!';
$html_attach_delete = 'Eyða völdum skrám';
$html_sort_by = 'Raða eftir';
$html_from = 'Frá';
$html_subject = 'Titill';
$html_date = 'Dags.';
$html_sent = 'Senda';
$html_wrote = 'skrifaði';
$html_size = 'Stærð';
$html_totalsize = 'Heildarstærð';
$html_kb = 'Kb';
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
$html_select = 'Velja';
$html_select_all = 'Velja allt';
$html_loading_image = 'Hleð mynd';
$html_send_confirmed = 'Pósturinn var samþykktur fyrir sendingu';
$html_no_sendaction = 'Engar aðgerðir mögulegar. Reynið að virkja JavaScript.';
$html_error_occurred = 'Villa gerðist';
$html_prefs_file_error = 'Ómögulegt að opna valmöguleika skrá til útskriftar.';
$html_sig_file_error = 'Ómögulegt að opna undirskriftar skrá til útskriftar.';
$html_wrap = 'Wrap outgoing messages to :'; // to translate
$html_usenet_separator = 'Usenet separator ("-- \n") Before signature'; // to translate
// Contacts manager
$html_add = 'Add';
$html_contacts = 'Contacts';
$html_modify = 'Modify';
$html_back = 'Back';
$html_contact_add = 'Add new contact';
$html_contact_mod = 'Modify a contact';
$html_contact_first = 'First name';
$html_contact_last = 'Last Name';
$html_contact_nick = 'Nick';
$html_contact_mail = 'Mail';
$html_contact_list = 'Contact list of ';
$html_contact_del = 'of de contact list';

$html_contact_err1 = 'Maximal number of contact is ';
$html_contact_err2 = 'You can\'t add a new contact';
$html_del_msg = 'Delete selected messages ?'; // to translate
$html_down_mail = 'Download'; // to translate

$original_msg = '-- Upphaflega bréf --'; 
$to_empty = '\'Til\' reiturinn má ekki vera auður!';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = "Ómögulegt að opna tengingu";
$html_smtp_error_unexpected = "Ófyrirsjáanleg viðbrögð:";
$html_file_upload_attack = 'Possible file upload attack';  //to translate
$html_invalid_email_address = 'Invalid e-mail address';  //to translate
$html_seperate_msg_win = 'Messages in seperate window';  //to translate
?>
