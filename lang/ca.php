<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/ca.php,v 1.11 2006/10/13 19:56:58 goddess_skuld Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the catalan language
 * Translated by David Gimeno i Ayuso, info@sima-pc.com, 2005/08/03
 */

$charset = 'UTF-8';

// Configuration for the days and months

// What language to use (Here, catalan --> ca)
// see '/usr/share/locale/' for more information
$lang_locale = 'ca_ES.UTF-8';

// Text Alignment
// Can be right-to-left (rtl) which is needed for proper Arabic, Hebrew
// Or left-to-right (ltr) which is default for most languages
$lang_dir = 'ltr';

// What format string should we pass to strftime() for messages sent on
// days other than today?
$default_date_format = '%j/%n/%Y'; 

// If the local is not implemented on the host, how we display the date
$no_locale_date_format = '%d/%m/%Y';

// What format string should we pass to strftime() for messages sent
// today?
$default_time_format = '%H.%i';


// Here is the configuration for the HTML

$err_user_empty = 'El camp usuari és buit';
$err_passwd_empty = 'El camp contrasenya és buit';


// html message

$alt_delete = 'Esborrar missatges seleccionats';
$alt_delete_one = 'Esborrar el missatge';
$alt_new_msg = 'Missatges nous';
$alt_reply = 'Contestar al remitent';
$alt_reply_all = 'Contestar tothom';
$alt_forward = 'Reenviar';
$alt_next = 'Next'; //to translate
$alt_prev = 'Previous'; //to translate
$title_next_page = 'Next page'; //to translate
$title_prev_page = 'Previous page'; //to translate
$title_next_msg = 'Missatge següent';
$title_prev_msg = 'Missatge anterior';
$html_on = 'a';
$html_theme = 'Assumpte';

// index.php

$html_lang = 'Idioma';
$html_welcome = 'Benvingut a';
$html_login = 'Usuari';
$html_passwd = 'Contrasenya';
$html_submit = 'Enviar';
$html_help = 'Ajuda';
$html_server = 'Servidor';
$html_wrong = 'L\'usuari o la contrasenya són incorrectes';
$html_retry = 'Reintentar';
$html_remember = 'Recordar valors';

// prefs.php

$html_msgperpage = 'Missatges per pàgina';
$html_preferences = 'Preferències';
$html_full_name = 'Nom complet';
$html_email_address = 'Adreça de correu';
$html_ccself = 'Enviar còpia a vós mateix';
$html_hide_addresses = 'Amagar adreces';
$html_outlook_quoting = 'Citar a l\'estil Outlook';
$html_reply_to = 'Contestar a';
$html_use_signature = 'Usar signatura';
$html_signature = 'Signatura';
$html_reply_leadin = 'Prefix de resposta';
$html_prefs_updated = 'Preferències actualitzades';
$html_manage_folders_link = 'Gestionar carpetes IMAP';
$html_manage_filters_link = 'Gestionar filtres correu';
$html_use_graphical_smilies = 'Usar emoticones gràfiques';
$html_sent_folder = 'Copiar missatges enviats a una carpeta dedicada';
$html_colored_quotes = 'Colored quotes'; //to translate
$html_display_struct = 'Display structured text'; //to translate

// folders.php
$html_folders_create_failed = 'No s\'ha pogut crear la carpeta!';
$html_folders_sub_failed = 'No us heu pogut subscriure a la carpeta!';
$html_folders_unsub_failed = 'No us heu pogut desafectar de la carpeta!';
$html_folders_rename_failed = 'No s\'ha pogut redenominar la carpeta!';
$html_folders_updated = 'Carpetes actualitzades';
$html_folder_subscribe = 'Subscriure a';
$html_folder_rename = 'Redenominar';
$html_folder_create = 'Crear carpeta nova anomenada';
$html_folder_remove = 'Desafectar de';
$html_folder_delete = 'Esborrar';
$html_folder_to = 'a';

// filters.php
$html_filter_remove = 'Esborrar';
$html_filter_body = 'Cos missatge';
$html_filter_subject = 'Assumpte missatge';
$html_filter_to = 'A';
$html_filter_cc = 'Còpia';
$html_filter_from = 'De';
$html_filter_change_tip = 'Per canviar un filtre, simplement sobreescriviu-lo.';
$html_reapply_filters = 'Reaplicar tots els filtres';
$html_filter_contains = 'conté';
$html_filter_name = 'Nom del filtre';
$html_filter_action = 'Acció del filtre';
$html_filter_moveto = 'Moure a';

// Other pages
$html_select_one = '--Seleccioneu-ne un--';
$html_and = 'i';
$html_new_msg_in = 'Missatges nous a';
$html_or = 'o';
$html_move = 'Moure';
$html_copy = 'Copiar';
$html_messages_to = 'missatges seleccionats a';
$html_gotopage = 'Anar a pàgina';
$html_gotofolder = 'Anar a carpeta';
$html_other_folders = 'Llita de carpetes';
$html_page = 'Pàgina';
$html_of = 'de';
$html_view_header = 'Veure capçalera';
$html_remove_header = 'Amagar capçalera';
$html_inbox = 'Entrada';
$html_new_msg = 'Escriure';
$html_reply = 'Contestar';
$html_reply_short = 'Re'; //to translate
$html_reply_all = 'Contestar tothom';
$html_forward = 'Reenviar';
$html_forward_short = 'Fw'; //to translate
$html_forward_info = 'El missatge reenviat s\'enviarà com a adjunt.';
$html_delete = 'Esborrar';
$html_new = 'Nou';
$html_mark = 'Esborrar';
$html_att = 'Adjunt';
$html_atts = 'Adjunts';
$html_att_unknown = '[desconegut]';
$html_attach = 'Adjuntar';
$html_attach_forget = 'Heu d\'adjuntar el fitxer abans d\'enviar el vostre missatge!';
$html_attach_delete = 'Suprimir els seleccionats';
$html_attach_none = 'Heu de seleccionar un fitxer per adjuntar!';
$html_sort_by = 'Ordenar per';
$html_sort = 'Ordenar';
$html_from = 'De';
$html_subject = 'Assumpte';
$html_date = 'Data';
$html_sent = 'Enviar';
$html_wrote = 'escrit';
$html_size = 'Tamany';
$html_totalsize = 'Tamany total';
$html_kb = 'kB'; //to translate
$html_bytes = 'bytes'; //to translate
$html_filename = 'Fitxer';
$html_to = 'A';
$html_cc = 'Còpia';
$html_bcc = 'Còpia oculta';
$html_nosubject = 'Sense assumpte';
$html_send = 'Enviar';
$html_cancel = 'Cancel·lar';
$html_no_mail = 'Cap missatge.';
$html_logout = 'Sortir';
$html_msg = 'Missatge';
$html_msgs = 'Missatges';
$html_configuration = 'Aquest servidor no està ben configurat!';
$html_priority = 'Prioritat';
$html_low = 'Baixa';
$html_normal = 'Normal';
$html_high = 'Alta';
$html_receipt = 'Sol·licitar justificant de recepció';
$html_select = 'Seleccionar';
$html_select_all = 'Invertir selecció';
$html_loading_image = 'S\'està carregant la imatge';
$html_send_confirmed = 'El vostre correu s\'ha acceptat per entregar-lo';
$html_no_sendaction = 'No s\'ha especificat cap acció. Proveu d\'activar el Javascript.';
$html_error_occurred = 'Hi ha hagut un error';
$html_prefs_file_error = 'No s\'ha pogut obrir el fitxer de preferències per escriure-hi.';
$html_wrap = 'Ajustar els missatges de sortida a:';
$html_wrap_none = 'Enlloc';
$html_usenet_separator = 'Separador Usenet ("-- \n") abans de la signatura';
$html_mark_as = 'Marcar com';
$html_read = 'llegit';
$html_unread = 'per llegir';
$html_encoding = 'Character encoding'; // to translate

// Contacts manager
$html_add = 'Afegir';
$html_contacts = 'Contactes';
$html_modify = 'Modificar';
$html_back = 'Enrere';
$html_contact_add = 'Afegir contacte nou';
$html_contact_mod = 'Modificar un contacte';
$html_contact_first = 'Nom';
$html_contact_last = 'Cognoms';
$html_contact_nick = 'Renom';
$html_contact_mail = 'Correu';
$html_contact_list = 'Llista de contactes de ';
$html_contact_del = 'de la llista de contactes';

$html_contact_err1 = 'El mombre màxim de contactes és ';
$html_contact_err2 = 'Nom podeu afegir cap més contacte';
$html_contact_err3 = 'No teniu drets d\'accés a la llista de contactes';
$html_del_msg = 'Esborrar missatges seleccionats?';
$html_down_mail = 'Descarregar';

$original_msg = '-- Missatge original --';
$to_empty = 'El camp \'A\' no pot ser buit!';

// Images warning
$html_images_warning = 'For your security, remote pictures are not displayed.'; // to translate
$html_images_display = 'Display pictures'; // to translate

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'No s\'ha pogut obrir la connexió SMTP';
$html_smtp_error_unexpected = 'Resposta SMTP inesperada:';

// IMAP messages (class_local.php)
$lang_could_not_connect = 'No s\'ha pogut connectar al servidor';
$lang_invalid_msg_num = 'Número de missatge erroni';

$html_file_upload_attack = 'Possible atac de càrrega de fitxer';
$html_invalid_email_address = 'Adreça de correu incorrecta';
$html_invalid_msg_per_page = 'Nombre de missatges per pàgina incorrecte';
$html_invalid_wrap_msg = 'Ample d\'ajust de missatge incorrecte';
$html_seperate_msg_win = 'Missatge a finestres separades';

// Exceptions
$html_err_file_contacts = 'No s\'ha pogut obrir el fitxer de contactes per escriure-hi.';
$html_session_file_error = 'Unable to open session file for writing.';  //to translate
?>
