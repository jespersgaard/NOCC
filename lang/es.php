<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/es.php,v 1.40 2004/10/08 09:54:47 jdeluise Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the spanish language
 * Translation by Gustavo Muslera <gmuslera@internet.com.uy>
 */

$charset = 'ISO-8859-1';

// Configuration for the days and months

// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = 'es_ES';

// Text Alignment
// Can be right-to-left (rtl) which is needed for proper Arabic, Hebrew
// Or left-to-right (ltr) which is default for most languages
$lang_dir = 'ltr';

// What format string should we pass to strftime() for messages sent on
// days other than today?
$default_date_format = '%Y-%m-%d'; 

// If the local is not implemented on the host, how we display the date
$no_locale_date_format = '%Y-%m-%d';

// What format string should we pass to strftime() for messages sent
// today?
$default_time_format = '%I:%M %p';


// Here is the configuration for the HTML

$err_user_empty = 'El campo de usuario esta vac&iacute;o';
$err_passwd_empty = 'El campo de clave esta vac&iacute;o';


// html message

$alt_delete = 'Borrar mensajes seleccionados';
$alt_delete_one = 'Borrar mensaje';
$alt_new_msg = 'Nuevo mensajes';
$alt_reply = 'Responder al autor';
$alt_reply_all = 'Responder a todos';
$alt_forward = 'Remitir';
$alt_next = 'Siguiente';
$alt_prev = 'Anterior';
$html_on = 'en';
$html_theme = 'Aparencia';

// index.php

$html_lang = 'Lenguaje';
$html_welcome = 'Bienvenido a';
$html_login = 'Usuario';
$html_passwd = 'Clave';
$html_submit = 'Ok';
$html_help = 'Ayuda';
$html_server = 'Servidor';
$html_wrong = 'El usuario o la clave son incorrectos';
$html_retry = 'Reintentar';

// prefs.php

$html_msgperpage = 'Messages per page';
$html_preferences = 'Preferencias';
$html_full_name = 'Nombre completo';
$html_email_address = 'Direcci&oacute;n de E-mail';
$html_ccself = 'Copia a uno mismo';
$html_hide_addresses = 'Ocultar direcci&oacute;n';
$html_outlook_quoting = 'Quotes tipo Outlook';
$html_reply_to = 'Responder a';
$html_use_signature = 'Usar firma';
$html_signature = 'Firma';
$html_reply_leadin = 'Reply Leadin';
$html_prefs_updated = 'Preferencias actualizadas';
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
$html_view_header = 'Ver cabezal';
$html_remove_header = 'Ocultar cabezal';
$html_inbox = 'Inbox';
$html_new_msg = 'Escribir';
$html_reply = 'Responder';
$html_reply_short = 'Re';
$html_reply_all = 'Responder a todos';
$html_forward = 'Remitir';
$html_forward_short = 'Fw';
$html_forward_info = 'The forwarded message will be send as an attachment to this one.'; //to translate
$html_delete = 'Borrar';
$html_new = 'Nuevo';
$html_mark = 'Borrar';
$html_att = 'Archivo asociado';
$html_atts = 'Archivos asociados';
$html_att_unknown = '[desconocido]';
$html_attach = 'Asociar';
$html_attach_forget = 'Debe asociar su archivo anes de enviar su mensaje !';
$html_attach_delete = 'Borrar elegidos';
$html_attach_none = 'You must select a file to attach!';  //to translate
$html_sort_by = 'Ordenar por';
$html_from = 'De';
$html_subject = 'Tema';
$html_date = 'Fecha';
$html_sent = 'Enviar';
$html_wrote = 'wrote';
$html_size = 'Tama&ntilde;o';
$html_totalsize = 'Tama&ntilde;o total';
$html_kb = 'Kb';
$html_bytes = 'bytes';
$html_filename = 'Archivo';
$html_to = 'A';
$html_cc = 'Cc';
$html_bcc = 'Bcc';
$html_nosubject = 'Sin tema';
$html_send = 'Enviar';
$html_cancel = 'Cancelar';
$html_no_mail = 'Sin nuevos mensajes.';
$html_logout = 'Salir';
$html_msg = 'Mensaje';
$html_msgs = 'Mensajes';
$html_configuration = 'Este servidor no est&aacute; bien definido !';
$html_priority = 'Prioridad';
$html_low = 'Baja';
$html_normal = 'Normal';  //to translate
$html_high = 'Alta';
$html_receipt = 'Request a return receipt';
$html_select = 'Elegir';
$html_select_all = 'Invert Selection';  //to translate
$html_loading_image = 'Cargando imagen';
$html_send_confirmed = 'Su correo ha sido aceptado para envio';
$html_no_sendaction = 'No ha especificado acci&oacute;n. Intente habilitando JavaScript.';
$html_error_occurred = 'Ha ocurrido un error';
$html_prefs_file_error = 'Imposible abrir el archivo de preferencias para cambiarlo.';
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
$html_contact_del = 'from the contact list';

$html_contact_err1 = 'Maximal number of contact is ';  //to translate
$html_contact_err2 = 'You can\'t add a new contact';  //to translate
$html_contact_err3 = 'You don\'t have access rights to contact list'; //to translate
$html_del_msg = 'Delete selected messages ?';  //to translate
$html_down_mail = 'Download';  //to translate

$original_msg = '-- Mensaje Original --';
$to_empty = 'El campo \'A\' no debe estar vacio !';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'Imposible abrir conexi&oacute;n';
$html_smtp_error_unexpected = 'Respuesta inesperada:';

// IMAP messages (class_local.php)
$lang_could_not_connect = 'No se pudo conectar al servidor';
$lang_invalid_msg_num = 'Bad Message Number';  //to translate

$html_file_upload_attack = 'Possible file upload attack';  //to translate
$html_invalid_email_address = 'Invalid e-mail address';  //to translate
$html_invalid_msg_per_page = 'Invalid number of messages per page';  //to translate
$html_invalid_wrap_msg = 'Invalid message wrap width';  //to translate
$html_seperate_msg_win = 'Messages in separate window';  //to translate

// Exceptions
$html_err_file_contacts = 'Unable to open contacts file for writing.'; //to translate
?>
