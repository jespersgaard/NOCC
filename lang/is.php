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

$html_preferences = 'Valm�guleikar';
$html_full_name = 'Fullt nafn';
$html_email_address = 'Netfang';
$html_ccself = 'Afrit � mig';
$html_hide_addresses = 'Fela netf�ng';
$html_outlook_quoting = 'Outlook-st�l quoting';
$html_reply_to = 'Svara til';
$html_use_signature = 'Nota undirskrift';
$html_signature = 'Undirskrift';
$html_prefs_updated = 'Valm�guleikar uppf�r�ir';

// Other pages

$html_view_header = 'Sj� haus';
$html_remove_header = 'Fela haus';
$html_inbox = 'Innp�stur';
$html_new_msg = 'Semja Br�f';
$html_reply = 'Svara';
$html_reply_short = 'Re';
$html_reply_all = 'Svara �llum';
$html_forward = 'Framsenda';
$html_forward_short = 'Fw';
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
$html_kb = 'Kb';
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
$html_select = 'Velja';
$html_select_all = 'Velja allt';
$html_loading_image = 'Hle� mynd';
$html_send_confirmed = 'P�sturinn var sam�ykktur fyrir sendingu';
$html_no_sendaction = 'Engar a�ger�ir m�gulegar. Reyni� a� virkja JavaScript.';
$html_error_occurred = 'Villa ger�ist';
$html_prefs_file_error = '�m�gulegt a� opna valm�guleika skr� til �tskriftar.';
$html_sig_file_error = '�m�gulegt a� opna undirskriftar skr� til �tskriftar.';
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

$original_msg = '-- Upphaflega br�f --'; 
$to_empty = '\'Til\' reiturinn m� ekki vera au�ur!';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = "�m�gulegt a� opna tengingu";
$html_smtp_error_unexpected = "�fyrirsj�anleg vi�br�g�:";
$html_file_upload_attack = 'Possible file upload attack';  //to translate
$html_invalid_email_address = 'Invalid e-mail address';  //to translate
$html_seperate_msg_win = 'Messages in seperate window';  //to translate
?>
