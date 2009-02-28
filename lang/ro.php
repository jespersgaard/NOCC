<?php
/**
 * Configuration file for the Romanian language
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * This file is part of NOCC. NOCC is free software under the terms of the
 * GNU General Public License. You should have received a copy of the license
 * along with NOCC.  If not, see <http://www.gnu.org/licenses/>.
 *
 * Translators:
 * - Nicu Buculei <nicubunu@yahoo.com>
 *
 * @package    NOCC
 * @subpackage Translations
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @version    SVN: $Id$
 */

$charset = 'UTF-8';

// Configuration for the days and months

// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = 'ro_RO.UTF-8';

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

$err_user_empty = 'Nu ati introdus numele';
$err_passwd_empty = 'Nu ati introdus parola';


// html message
$alt_delete = 'Stergere mesaje selectate';
$alt_delete_one = 'Stergere mesaj';
$alt_new_msg = 'Mesaj nou';
$alt_reply = 'Raspuns';
$alt_reply_all = 'Raspuns tuturor';
$alt_forward = 'Redirectionare';
$alt_next = 'Next'; //to translate
$alt_prev = 'Previous'; //to translate
$title_next_page = 'Next page'; //to translate
$title_prev_page = 'Previous page'; //to translate
$title_next_msg = 'Mesaj urmator';
$title_prev_msg = 'Mesaj anterior';
$html_on = 'activ';
$html_theme = 'Tema';

// index.php
$html_lang = 'Limba';
$html_welcome = 'Bun venit la';
$html_login = 'Nume';
$html_passwd = 'Parola';
$html_submit = 'Trimit';
$html_help = 'Ajutor';
$html_server = 'Server'; //to translate
$html_wrong = 'Numele sau parola sunt incorecte';
$html_retry = 'Alta incercare';
$html_remember = "Remember settings"; //to translate

// prefs.php
$html_msgperpage = 'Messages per page';
$html_preferences = 'Preferinte';
$html_full_name = 'Nume complet';
$html_email_address = 'Adresa e-mail';
$html_ccself = 'Cc auto';
$html_hide_addresses = 'Ascunde adrese';
$html_outlook_quoting = 'Cotare in stil Outlook';
$html_reply_to = 'Raspuns';
$html_use_signature = 'Folosire semnatura';
$html_signature = 'Semnatura';
$html_reply_leadin = 'Reply Leadin';  //to translate
$html_prefs_updated = 'Actualizare preferinte';
$html_manage_folders_link = 'Manage IMAP Folders';  //to translate
$html_manage_filters_link = 'Manage Email Filters';  //to translate
$html_use_graphical_smilies = 'Use graphical smilies'; //to translate
$html_sent_folder = 'Copy sent mails into a dedicated folder'; //to translate
$html_trash_folder = 'Move deleted mails into a dedicated folder'; // to translate
$html_colored_quotes = 'Colored quotes'; //to translate
$html_display_struct = 'Display structured text'; //to translate
$html_send_html_mail = 'Send mail in HTML format'; //to translate

// folders.php
$html_folders = 'Folders';  //to translate
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
$html_folder_to = 'to'; // to translate

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
$html_view_header = 'Vizualizare header';
$html_remove_header = 'Ascundere header';
$html_inbox = 'Inbox'; // to translate
$html_new_msg = 'Mesaj Nou';
$html_reply = 'Raspuns';
$html_reply_short = 'Re';  //to translate
$html_reply_all = 'Raspuns tuturor';
$html_forward = 'Redirectionare';
$html_forward_short = Fwd;  //to translate
$html_forward_info = 'The forwarded message will be send as an attachment to this one.'; //to translate
$html_delete = 'Stergere';
$html_new = 'Nou';
$html_mark = 'Stergere';
$html_att = 'Fisier atasat';
$html_atts = 'Fisiere atasate';
$html_att_unknown = '[necunoscut]';
$html_attach = 'Atasare';
$html_attach_forget = 'Trebuie atasat fisierul inainte de a trimite mesajul !';
$html_attach_delete = 'Stergere selectie';
$html_attach_none = 'You must select a file to attach!';  //to translate
$html_sort_by = 'Sortare dupa';
$html_sort = 'Sortare';
$html_from = 'De la';
$html_subject = 'Subiect';
$html_date = 'Data';
$html_sent = 'Trimite';
$html_wrote = 'a scris';
$html_size = 'Marime';
$html_totalsize = 'Marime Totala';
$html_kb = 'kB';  //to translate
$html_mb = 'MB'; //to translate
$html_gb = 'GB'; //to translate
$html_bytes = 'bytes';  //to translate
$html_filename = 'Nume fisier';
$html_to = 'Catre';
$html_cc = 'Cc';  //to translate
$html_bcc = 'Bcc';  //to translate
$html_nosubject = 'Fara subiect';
$html_send = 'Trimitere';
$html_cancel = 'Renuntare';
$html_no_mail = 'Nici un mesaj.';
$html_logout = 'Iesire';
$html_msg = 'Mesaj';
$html_msgs = 'Mesaje';
$html_configuration = 'Serverul nu e corect configurat !';
$html_priority = 'Prioritate';
$html_lowest = 'Lowest';  //to translate
$html_low = 'Mica';
$html_normal = 'Normala';
$html_high = 'Mare';
$html_highest = 'Highest';  //to translate
$html_receipt = 'Request a return receipt'; //to translate
$html_select = 'Selectare';
$html_select_all = 'Invert Selection';  //to translate
$html_loading_image = 'Incarcare imagine';
$html_send_confirmed = 'Mesajul a fost acceptat pentru trnsmitere';
$html_no_sendaction = 'Nu a fost specificata nici o actiune. Incercati sa activati JavaScript.';
$html_error_occurred = 'Eroare';
$html_prefs_file_error = 'Nu se poate accesa fisierul de preferinte pentru scriere.';
$html_wrap = 'Wrap outgoing messages to :';  //to translate
$html_wrap_none = 'None'; //to translate
$html_usenet_separator = 'Usenet separator ("-- \n") Before signature';  //to translate
$html_mark_as = 'Mark as'; //to translate
$html_read = 'read'; //to translate
$html_unread = 'unread'; //to translate
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

$original_msg = '-- Mesaj original --';
$to_empty = 'Campul \'To\' nu poate fi gol !';

// Images warning
$html_images_warning = 'For your security, remote pictures are not displayed.'; // to translate
$html_images_display = 'Display pictures'; // to translate

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'Nu se poate deschide conexiunea';
$html_smtp_error_unexpected = 'Raspuns neasteptate:';

// IMAP messages (class_local.php)
$lang_could_not_connect = 'Could not connect to server';  //to translate
$lang_invalid_msg_num = 'Bad Message Number';  //to translate

$html_file_upload_attack = 'Possible file upload attack';  //to translate
$html_invalid_email_address = 'Invalid e-mail address';  //to translate
$html_invalid_msg_per_page = 'Invalid number of messages per page';  //to translate
$html_invalid_wrap_msg = 'Invalid message wrap width';  //to translate
$html_seperate_msg_win = 'Messages in separate window';  //to translate

// Exceptions
$html_err_file_contacts = 'Unable to open contacts file for writing.'; //to translate
$html_session_file_error = 'Unable to open session file for writing.';  //to translate
$html_login_not_allowed = 'This login is not allowed for connexion.'; //to translate

// Send delay
$lang_err_send_delay = 'You must wait between two mails'; // to translate
$lang_seconds = 'seconds'; // to translate
?>
