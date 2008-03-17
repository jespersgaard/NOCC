<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/pt-br.php,v 1.46 2008/03/06 17:04:05 goddess_skuld Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the portuguese Brazilian language
 * Translation by Giovani Zamboni <zambaxtz@terra.com.br>
 * Translation revised by Renato Frederick <frederick@dahype.org>
 */

$charset = 'UTF-8';

// Configuration for the days and months

// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = 'pt_BR.UTF-8';

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
$default_time_format = '%H:%M';


// Here is the configuration for the HTML

$err_user_empty = 'O campo <strong>Usuário</strong> esta vazio';
$err_passwd_empty = 'O campo <strong>Senha</strong> esta vazio';


// html message
$alt_delete = 'Excluir as mensagens selecionadas';
$alt_delete_one = 'Excluir a mensagem';
$alt_new_msg = 'Nova mensagens';
$alt_reply = 'Responder ao autor';
$alt_reply_all = 'Responder à todos';
$alt_forward = 'Encaminhar';
$alt_next = 'Próximo';
$alt_prev = 'Anterior';
$title_next_page = 'Próxima. Página';
$title_prev_page = 'Página Anterior';
$title_next_msg = 'Próxima mensagem';
$title_prev_msg = 'Mensagem anterior';
$html_on = 'Ligado';
$html_theme = 'Tema';

// index.php
$html_lang = 'Linguagem';
$html_welcome = 'Bem vindo ao ';
$html_login = 'Usuário';
$html_passwd = 'Senha';
$html_submit = 'Enviar';
$html_help = 'Ajuda';
$html_server = 'Servidor';
$html_wrong = 'O usuário ou a senha estão incorretos';
$html_retry = 'Repetir';
$html_remember = 'Lembrar Configurações';

// prefs.php
$html_msgperpage = 'Mensagens por página';  
$html_preferences = 'Preferências';  
$html_full_name = 'Nome Completo';  
$html_email_address = 'Endereço de Email';  
$html_ccself = 'Cc para você mesmo';  
$html_hide_addresses = 'Ocultar Endereços';  
$html_outlook_quoting = 'Quotas no estilo Outlook';  
$html_reply_to = 'Responder para';  
$html_use_signature = 'Usar Assinatura';  
$html_signature = 'Assinatura';  
$html_reply_leadin = 'Reply Leadin';  //to translate
$html_prefs_updated = 'Preferências Atualizada';  
$html_manage_folders_link = 'Gerenciar Pastas IMAP';  
$html_manage_filters_link = 'Gerenciar Filtros de Email';  
$html_use_graphical_smilies = 'Usar Smiles'; 
$html_sent_folder = 'Copiar emails enviados para'; 
$html_colored_quotes = 'Quotas Coloridas'; 
$html_display_struct = 'Mostrar texto estruturado'; 
$html_send_html_mail = 'Enviar email em formato HTML';
$html_send_html_mail = 'Send mail in HTML format'; //to translate

// folders.php
$html_folders = 'Folders';  //to translate
$html_folders_create_failed = 'Pasta não pôde ser criada';  
$html_folders_sub_failed = 'Não foi possível asssinar a pasta!';  
$html_folders_unsub_failed = 'Não foi possível cancelar assinatura deste pasta!';  
$html_folders_rename_failed = 'Pasta não pode ser renomeada!';  
$html_folders_updated = 'Pastas atualizadas!';  
$html_folder_subscribe = 'Assinar pasta';  
$html_folder_rename = 'Renomear';  
$html_folder_create = 'Criar nova pasta chamda';  
$html_folder_remove = 'Cancelar assinatura de';  
$html_folder_delete = 'Deletar';  
$html_folder_to = 'para'; 

// filters.php
$html_filter_remove = 'Deletar';  
$html_filter_body = 'Corpo da Mensagem';  
$html_filter_subject = 'Assunto da Mensagem';  
$html_filter_to = 'Campo para';  
$html_filter_cc = 'Campo Cc';  
$html_filter_from = 'Campo De';  
$html_filter_change_tip = 'Para modificar um filtro simplesmente sobrescreva-o.';  
$html_reapply_filters = 'Reaplicar todos os filtros';  
$html_filter_contains = 'contém';  
$html_filter_name = 'Nome do filtro';  
$html_filter_action = 'Ação do Filtro';  
$html_filter_moveto = 'Mover para';  

// Other pages
$html_select_one = '--Selecione Uma--';  
$html_and = 'E';  
$html_new_msg_in = 'Novas mensagens em';  
$html_or = 'Ou';  
$html_move = 'Mover'; 
$html_copy = 'Copiar';  
$html_messages_to = 'mensagens selecionadas para';  
$html_gotopage = 'Ir para página';  
$html_gotofolder = 'Ir para Pasta';  
$html_other_folders = 'Lista de Pastas';  
$html_page = 'Página';  
$html_of = 'de';  
$html_view_header = 'Ver cabeçalho';
$html_remove_header = 'Esconder cabeçalho';
$html_inbox = 'Caixa de Entrada';
$html_new_msg = 'Nova Mensagem';
$html_reply = 'Responder';
$html_reply_short = 'Res';
$html_reply_all = 'Responder à todos';
$html_forward = 'Encaminhar';
$html_forward_short = 'Enc';
$html_forward_info = 'A mensagem encaminhada será enviada como anexo desta mensagem.';
$html_delete = 'Excluir';
$html_new = 'Novo';
$html_mark = 'Excluir';
$html_att = 'Anexo';
$html_atts = 'Anexos';
$html_att_unknown = '[Desconhecido]';
$html_attach = 'Anexar arquivo';
$html_attach_forget = 'Você precisa anexar seus arquivos antes de enviar esta mensagem !';
$html_attach_delete = 'Remover anexos selecionados';
$html_attach_none = 'Você precisa selecionar um arquivo para anexar!';  
$html_sort_by = 'Ordenar por';  
$html_sort = 'Ordenar'; 
$html_from = 'De';
$html_subject = 'Assunto';
$html_date = 'Data';
$html_sent = 'Enviar';
$html_wrote = 'escreveu';
$html_size = 'Tamanho';
$html_totalsize = 'Tamanho Total';
$html_kb = 'kb';
$html_bytes = 'bytes';
$html_filename = 'Nome do Arquivo';
$html_to = 'Para';
$html_cc = 'Cc';
$html_bcc = 'Cco';
$html_nosubject = 'Sem assunto';
$html_send = 'Enviar';
$html_cancel = 'Cancelar';
$html_no_mail = 'Sem mensagens.';
$html_logout = 'Sair';
$html_msg = 'Mensagem';
$html_msgs = 'Mensagens';
$html_configuration = 'Este servidor ainda não esta bem configurado !';
$html_priority = 'Prioridade';  
$html_low = 'Baixa';  
$html_normal = 'Normal';  
$html_high = 'Alta';  
$html_receipt = 'Pedir confirmação de Leitura';  
$html_select = 'Selecionar';  
$html_select_all = 'Inverter Seleção';  
$html_loading_image = 'Carregando imagem';  
$html_send_confirmed = 'Sua mensagem foi aceita para entrega';  
$html_no_sendaction = 'Sem ação especificada. Tente habilitar JavaScript.';  
$html_error_occurred = 'Ocorreu um erro';  
$html_prefs_file_error = 'Impossível abrir arquivo de preferências para gravação.';  
$html_wrap = 'Quebrar mensagens de saída em :';  
$html_wrap_none = 'Nenhuma'; 
$html_usenet_separator = 'Separador Usenet ("-- \n") Antes da assinatura';  
$html_mark_as = 'Marcar como'; 
$html_read = 'lido'; 
$html_unread = 'não lido'; 
$html_encoding = 'Codificação de Caracteres'; 

// Contacts manager
$html_add = 'Adicionar';  
$html_contacts = 'Contatos';  
$html_modify = 'Modificar';  
$html_back = 'Voltar';  
$html_contact_add = 'Adicionar novo contato';  
$html_contact_mod = 'Modificar um contato';  
$html_contact_first = 'Primeiro Nome';  
$html_contact_last = 'Último Nome';  
$html_contact_nick = 'Apelido';  
$html_contact_mail = 'E-Mail';  
$html_contact_list = 'Listas de contatos de ';  
$html_contact_del = 'da lista de contatos';  

$html_contact_err1 = 'Máximo número de contatos é ';  
$html_contact_err2 = 'Você não pode adicionar um novo contato';  
$html_contact_err3 = 'Você não tem acesso à lista de contatos'; 
$html_del_msg = 'Deletar mensagens selecionadas ?';  
$html_down_mail = 'Download';  //to translate

$original_msg = '-- Mensagem Original --';
$to_empty = 'Campo \'Para\' não pode estar vazio !';

// Images warning
$html_images_warning = 'Para sua segurança, imagens remotas não são mostradas.'; 
$html_images_display = 'Mostrar imagens'; 

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'Impossível abrir conexão SMTP';  
$html_smtp_error_unexpected = 'Resposta SMTP inesperada:';  

// IMAP messages (class_local.php)
$lang_could_not_connect = 'Não foi possível conectar ao servidor';  
$lang_invalid_msg_num = 'Número inválido de mensagem';  

$html_file_upload_attack = 'Possível ataque de upload do arquivo';
$html_invalid_email_address = 'Endereço de e-mail inválido';  
$html_invalid_msg_per_page = 'Número de mensagens por página inválida';  
$html_invalid_wrap_msg = 'Larguda de quebra de mensagem inválida';  
$html_seperate_msg_win = 'Mensagens em uma janela separada';

// Exceptions
$html_err_file_contacts = 'Impossível abrir arquivo de contatos para gravação.'; 
$html_session_file_error = 'Impossível abrir arquivo de dessão para gravação.';  
$html_login_not_allowed = 'Este login não é permitido para conexão.'; 
?>