<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/pt.php,v 1.22 2002/02/09 20:25:04 rossigee Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the Portuguese language
 * Translation by sena <sena@smux.net> and JS <jorge.silva@ciberlink.pt>
 */

$charset = 'ISO-8859-1';

// Configuration for the days and months

// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = 'pt_PT';

// Text Alignment
// Can be right-to-left (rtl) which is needed for proper Arabic, Hebrew
// Or left-to-right (ltr) which is default for most languages
$lang_dir = 'ltr';

// What format string should we pass to strftime() for messages sent on
// days other than today?
$default_date_format = '%d/%m/%Y'; 

// If the local is not implemented on the host, how we display the date
$no_locale_date_format = '%d/%m/%Y';

// What format string should we pass to strftime() for messages sent
// today?
//$default_time_format = '%I:%M %p';
$default_time_format = '%H:%M %p';

// Here is the configuration for the HTML

$err_user_empty = 'O login n&atilde;o foi preenchido';
$err_passwd_empty = 'A password n&atilde;o foi preenchida';


// html message

$alt_delete = 'Apagar as mensagens seleccionadas';
$alt_delete_one = 'Apagar a mensagem';
$alt_new_msg = 'Mensagens novas';
$alt_reply = 'Responder ao autor';
$alt_reply_all = 'Responder a todos';
$alt_forward = 'Reencaminhar';
$alt_next = 'Pr&oacute;xima';
$alt_prev = 'Anterior';


// index.php

$html_lang = 'L&iacute;ngua';
$html_welcome = 'Benvindo ao';
$html_login = 'Login';
$html_passwd = 'Password';
$html_submit = 'Entrar';
$html_help = 'Ajuda';
$html_server = 'Servidor';
$html_wrong = 'Login ou password incorrecto';
$html_retry = 'Tentar de novo';
$html_on = 'em';
$html_theme = 'Tema';

// prefs.php

$html_preferences = 'Prefer&ecirc;ncias';
$html_full_name = 'Nome completo';
$html_email_address = 'Endere&ccedil;o E-mail';
$html_ccself = 'Cc pr&oacute;prio';
$html_hide_addresses = 'Esconder Endere&ccedil;os';
$html_outlook_quoting = 'Outlook-style quoting';
$html_reply_to = 'Responder para';
$html_use_signature = 'Utilizar assinatura';
$html_signature = 'Assinatura';
$html_prefs_updated = 'Prefer&ecirc;ncias actualizadas';

// Other pages

$html_view_header = 'Ver cabe&ccedil;alhos';
$html_remove_header = 'Esconder cabe&ccedil;alhos';
$html_inbox = 'Correio';
$html_new_msg = 'Escrever';
$html_reply = 'Responder';
$html_reply_short = 'Re';
$html_reply_all = 'Responder a todos';
$html_forward = 'Reencaminhar';
$html_forward_short = 'Fw';
$html_delete = 'Apagar';
$html_new = 'Nova';
$html_mark = 'Apagar';
$html_att = 'Anexo';
$html_atts = 'Anexos';
$html_att_unknown = '[desconhecido]';
$html_attach = 'Anexar';
$html_attach_forget = 'Tem de premir \`Anexar\` antes de enviar a mensagem !';
$html_attach_delete = 'Retirar Ficheiros Seleccionados';
$html_sort_by = 'Ordenar por';
$html_from = 'De';
$html_subject = 'Assunto';
$html_date = 'Data';
$html_sent = 'Enviar';
$html_wrote = 'escreveu';
$html_size = 'Tamanho';
$html_totalsize = 'Tamanho Total';
$html_kb = 'Kb';
$html_bytes = 'bytes';
$html_filename = 'Ficheiro';
$html_to = 'Para';
$html_cc = 'Cc';
$html_bcc = 'Bcc';
$html_nosubject = 'Sem assunto';
$html_send = 'Enviar';
$html_cancel = 'Cancelar';
$html_no_mail = 'N&atilde;o h&aacute; mensagens novas.';
$html_logout = 'Sair';
$html_msg = 'Mensagem';
$html_msgs = 'Mensagens';
$html_configuration = 'Este servidor n&atilde;o est&aacute; correctamente configurado !';
$html_priority = 'Prioridade';
$html_low = 'Baixa';
$html_normal = 'Normal';
$html_high = 'Alta';
$html_select_all = 'Seleccionar tudo';
$html_loading_image = 'Carregando imagem';
$html_send_confirmed = 'Sua mensagem foi aceite para envio';
$html_no_sendaction = 'Ac&ccedil;&atilde;o n&atilde;o indicada. Tente activar o JavaScript.';
$html_error_occurred = 'Ocorreu um erro';
$html_prefs_file_error = 'N&atilde;o foi poss&iacute;vel abrir o ficheiro de preferen&ccedil;as para escrita.';
$html_sig_file_error = 'N&atilde;o foi poss&iacute;vel abrir o ficheiro de assinatura para escrita.';

$original_msg = '-- Mensagem Original --';
$to_empty = 'O campo \'Para\' tem de ser preenchido !';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = "N&atilde;o foi poss&iacute;vel ligar ao servidor";
$html_smtp_error_unexpected = "Resposta inesperada:";
$lang_could_not_connect = 'Could not connect to server';  //to translate
$html_file_upload_attack = 'Possible file upload attack';  //to translate
?>
