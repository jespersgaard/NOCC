<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/es.php,v 1.17 2001/11/18 18:17:34 wolruf Exp $ 
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
$html_on = 'en';
$html_theme = 'Apariencia';

// prefs.php

$html_preferences = 'Preferences';
$html_full_name = 'Full name';
$html_email_address = 'E-mail Address';
$html_ccself = 'Cc self';
$html_hide_addresses = 'Hide addresses';
$html_outlook_quoting = 'Outlook-style quoting';
$html_reply_to = 'Reply to';
$html_use_signature = 'Use signature';
$html_signature = 'Signature';
$html_prefs_updated = 'Preferences updated';

// Other pages

$html_view_header = 'Ver cabezal';
$html_remove_header = 'Ocultar cabezal';
$html_inbox = 'Inbox';
$html_new_msg = 'Escribir';
$html_reply = 'Responder';
$html_reply_short = 'Re';
$html_reply_all = 'Responder a todos';
$html_forward = 'Remitir';
$html_forward_short = 'Fw';
$html_delete = 'Borrar';
$html_new = 'Nuevo';
$html_mark = 'Borrar';
$html_att = 'Archivo asociado';
$html_atts = 'Archivos asociados';
$html_att_unknown = '[desconocido]';
$html_attach = 'Asociar';
$html_attach_forget = 'Debe asociar su archivo anes de enviar su mensaje !';
$html_attach_delete = 'Borrar elegidos';
$html_sort_by = 'Sort by';
$html_from = 'De';
$html_subject = 'Tema';
$html_date = 'Fecha';
$html_sent = 'Enviar';
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
$html_configuration = 'This server is not well set up !';
$html_priority = 'Priority';
$html_low = 'Low';
$html_normal = 'Normal';
$html_high = 'High';
$html_select = 'Select';
$html_select_all = 'Select All';
$html_loading_image = 'Loading image';
$html_send_confirmed = 'Your mail was accepted for delivery';
$html_no_sendaction = 'No action specified. Try enabling JavaScript.';
$html_error_occurred = 'An error occurred';
$html_prefs_file_error = 'Unable to open preferences file for writing.';
$html_sig_file_error = 'Unable to open signature file for writing.';

$original_msg = '-- Mensaje Original --';
$to_empty = 'El campo \'A\' no debe estar vacio !';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = "Unable to open connection";
$html_smtp_error_unexpected = "Unexpected response:";
?>