<?
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/es.php,v 1.7 2001/02/06 19:12:33 wolruf Exp $ 
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

$charset = "ISO-8859-1";

// Configuration for the days and months

// What language to use (Here, english US --> en_US)
// see '/usr/share/locale/' for more information
$lang_locale = "es_ES";

// What format string should we pass to strftime() for messages sent on
// days other than today?
$default_date_format = "%Y-%m-%d"; 

// If the local is not implemented on the host, how we display the date
$no_locale_date_format = "%Y-%m-%d";

// What format string should we pass to strftime() for messages sent
// today?
$default_time_format = "%I:%M %p";


// Here is the configuration for the HTML

$err_user_empty = "El campo de usuario esta vac&iacute;o";
$err_passwd_empty = "El campo de clave esta vac&iacute;o";


// html message

$alt_delete = "Borrar mensajes seleccionados";
$alt_delete_one = "Borrar mensaje";
$alt_new_msg = "Nuevo mensajes";
$alt_reply = "Responder al autor";
$alt_reply_all = "Responder a todos";
$alt_forward = "Remitir";
$alt_next = "Siguiente";
$alt_prev = "Anterior";


// index.php

$html_lang = "Language";
$html_welcome = "Bienvenido a";
$html_login = "Usuario";
$html_passwd = "Clave";
$html_submit = "Ok";
$html_help = "Ayuda";
$html_server = "Servidor";
$html_wrong = "El usuario o la clave son incorrectos";
$html_retry = "Reintentar";

// Other pages

$html_view_header = "Ver cabezal";
$html_remove_header = "Ocultar cabezal";
$html_inbox = "Inbox";
$html_new_msg = "Escribir";
$html_reply = "Responder";
$html_reply_short = "Re";
$html_reply_all = "Responder a todos";
$html_forward = "Remitir";
$html_forward_short = "Fw";
$html_delete = "Borrar";
$html_new = "Nuevo";
$html_mark = "Borrar";
$html_att = "Archivo asociado";
$html_atts = "Archivos asociados";
$html_att_unknown = "[desconocido]";
$html_attach = "Attach";
$html_attach_forget = "You must attach your file before sending your message !";
$html_attach_delete = "Remove Selected";
$html_from = "De";
$html_subject = "Tema";
$html_date = "Fecha";
$html_sent = "Enviar";
$html_size = "Tama&ntilde;o";
$html_totalsize = "Total Size";
$html_kb = "Kb";
$html_bytes = "bytes";
$html_filename = "Filename";
$html_to = "A";
$html_cc = "Cc";
$html_bcc = "Bcc";
$html_nosubject = "Sin tema";
$html_send = "Enviar";
$html_cancel = "Cancelar";
$html_no_mail = "Sin nuevos mensajes.";
$html_logout = "Salir";
$html_msg = "Mensaje";
$html_msgs = "Mensajes";

$original_msg = "-- Mensaje Original --";
$to_empty = "El campo 'A' no debe estar vac&iacute;o !";
?>