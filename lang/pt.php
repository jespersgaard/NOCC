<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/pt.php,v 1.36 2004/06/22 10:36:01 goddess_skuld Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the Portuguese language
 * Translation by sena <sena@smux.net> and JS <jorge.silva@ciberlink.pt>
 * Few updates by Paulo Matos <paulo.matos@fct.unl.pt>
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

$err_user_empty = 'O identificador n&atilde;o foi preenchido';
$err_passwd_empty = 'A senha n&atilde;o foi preenchida';


// html message

$alt_delete = 'Apagar as mensagens seleccionadas';
$alt_delete_one = 'Apagar a mensagem';
$alt_new_msg = 'Mensagens novas';
$alt_reply = 'Responder ao autor';
$alt_reply_all = 'Responder a todos';
$alt_forward = 'Reencaminhar';
$alt_next = 'Pr&oacute;xima';
$alt_prev = 'Anterior';
$html_on = 'em';
$html_theme = 'Tema';

// index.php

$html_lang = 'L&iacute;ngua';
$html_welcome = 'Benvindo ao';
$html_login = 'Identificador';
$html_passwd = 'Senha';
$html_submit = 'Entrar';
$html_help = 'Ajuda';
$html_server = 'Servidor';
$html_wrong = 'Identificador ou senha incorrectos';
$html_retry = 'Tentar novamente';

// prefs.php

$html_msgperpage = 'Mensagens por p&aacute;gina';
$html_preferences = 'Prefer&ecirc;ncias';
$html_full_name = 'Nome completo';
$html_email_address = 'Endere&ccedil;o E-mail';
$html_ccself = 'Cc pr&oacute;prio';
$html_hide_addresses = 'Esconder Endere&ccedil;os';
$html_outlook_quoting = 'Outlook-style quoting';
$html_reply_to = 'Responder para';
$html_use_signature = 'Utilizar assinatura';
$html_signature = 'Assinatura';
$html_reply_leadin = 'Responder com prefixo'; 
$html_prefs_updated = 'Prefer&ecirc;ncias actualizadas';
$html_manage_folders_link = 'Gerir Pastas IMAP'; 
$html_manage_filters_link = 'Gerir Filtros de Email';
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
$html_filter_remove = 'Apagar';
$html_filter_body = 'Conte&uacute;do da Mensagem';
$html_filter_subject = 'Assunto da Mensaagem';
$html_filter_to = 'Campo \'Para\'';
$html_filter_cc = 'Campo \'Cc\'';
$html_filter_from = 'Campo \'De\'';
$html_filter_change_tip = 'Para alterar um filtro grav&aacute;-lo novamente.';
$html_reapply_filters = 'Reapply all filters';  //to translate
$html_filter_contains = 'contains';  //to translate
$html_filter_name = 'Filter Name';  //to translate
$html_filter_action = 'Filter Action';  //to translate
$html_filter_moveto = 'Move to';  //to translate

// Other pages
$html_select_one = '--Escolha--';
$html_and = 'E';
$html_new_msg_in = 'Novas mensagens em';
$html_or = 'ou';
$html_move = 'Mover';
$html_copy = 'Copiar';
$html_messages_to = 'mensagens seleccionadas para';
$html_gotopage = 'Ir para P&aacute;gina';
$html_gotofolder = 'Ir para a Pasta';
$html_other_folders = 'Lista de Pastas';
$html_page = 'P&aacute;gina';
$html_of = 'of';  //to translate
$html_to = 'para';
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
$html_normal = 'Normal';  //to translate
$html_high = 'Alta';
$html_receipt = 'Requer confirma&ccedil;&atilde;o';
$html_select = 'Seleccionar';
$html_select_all = 'Seleccionar tudo';
$html_loading_image = 'Carregando imagem';
$html_send_confirmed = 'A mensagem foi aceite para envio';
$html_no_sendaction = 'Ac&ccedil;&atilde;o n&atilde;o indicada. Tente activar o JavaScript.';
$html_error_occurred = 'Ocorreu um erro';
$html_prefs_file_error = 'N&atilde;o foi poss&iacute;vel abrir o ficheiro de preferen&ccedil;as para escrita.';
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
$html_contact_del = 'from the contact list';  //to translate

$html_contact_err1 = 'Maximal number of contact is ';  //to translate
$html_contact_err2 = 'You can\'t add a new contact';  //to translate
$html_contact_err3 = 'You don\'t have access rights to contact list'; //to translate
$html_del_msg = 'Delete selected messages ?';  //to translate
$html_down_mail = 'Download';  //to translate

$original_msg = '-- Mensagem Original --';
$to_empty = 'O campo \'Para\' tem de ser preenchido !';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'N&atilde;o foi poss&iacute;vel estabelecer ligação ao servidor de SMTP';
$html_smtp_error_unexpected = 'Resposta inesperada do servidor de SMTP:';

// IMAP messages (class_local.php)
$lang_could_not_connect = 'N&atilde;o foi poss&iacute;vel estabelecer ligação ao servidor';

$html_file_upload_attack = 'Poss&iacute;vel ataque de \'upload\' de ficheiros';
$html_invalid_email_address = 'Endereço de e-mail inv&aacute;lido';
$html_seperate_msg_win = 'Mensagens em janela separada';

// Exceptions
$html_err_file_contacts = 'Unable to open contacts file for writing.'; //to translate
?>
