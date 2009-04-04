<?php
/**
 * Configuration file for the Chinese (Simplified) language
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * This file is part of NOCC. NOCC is free software under the terms of the
 * GNU General Public License. You should have received a copy of the license
 * along with NOCC.  If not, see <http://www.gnu.org/licenses/>.
 *
 * Translators:
 * - Liu Hong <loyaliu@21cn.com>
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
$lang_locale = 'zh_CN.UTF-8';

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

$err_user_empty = '用户名为空';
$err_passwd_empty = '密码为空';


// html message
$alt_delete = '删除选择的邮件';
$alt_delete_one = '删除邮件';
$alt_new_msg = '新建邮件';
$alt_reply = '回复作者';
$alt_reply_all = '回复所有';
$alt_forward = '转发';
$alt_next = 'Next'; //to translate
$alt_prev = 'Previous'; //to translate
$title_next_page = 'Next page'; //to translate
$title_prev_page = 'Previous page'; //to translate
$title_next_msg = '下一个邮件';
$title_prev_msg = '上一个邮件';
$html_on = '打开';
$html_theme = '主题';

// index.php
$html_lang = '语言';
$html_welcome = '欢迎';
$html_login = '登录';
$html_passwd = '密码';
$html_submit = '用户名';
$html_help = '帮助';
$html_server = '服务器';
$html_wrong = '用户名或则密码不正确';
$html_retry = '重试';
$html_remember = "Remember settings"; //to translate

// prefs.php
$html_msgperpage = 'Messages per page';  //to translate
$html_preferences = 'Preferences';  //to translate
$html_full_name = 'Full name';  //to translate
$html_email_address = 'E-mail Address';  //to translate
$html_ccself = 'Cc self';  //to translate
$html_hide_addresses = 'Hide addresses';  //to translate
$html_outlook_quoting = 'Outlook-style quoting';  //to translate
$html_reply_to = 'Reply to';  //to translate
$html_use_signature = 'Use signature';  //to translate
$html_signature = 'Signature';  //to translate
$html_reply_leadin = 'Reply Leadin';  //to translate
$html_prefs_updated = 'Preferences updated';  //to translate
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
$html_folder_to = 'to'; //to translate

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
$html_view_header = '浏览邮件头';
$html_remove_header = '隐藏邮件头';
$html_inbox = '收件箱';
$html_new_msg = '写邮件';
$html_reply = '回复';
$html_reply_short = 'Re：';
$html_reply_all = '回复所有';
$html_forward = '转发';
$html_forward_short = 'Fwd';  //to translate
$html_forward_info = 'The forwarded message will be send as an attachment to this one.'; //to translate
$html_delete = '删除';
$html_new = '新';
$html_mark = '置标';
$html_att = '附件';
$html_atts = '附件';
$html_att_unknown = '[unknown]'; //to translate
$html_attach = '附件';
$html_attach_forget = '在发送邮件之前，你必须选一个文件!';
$html_attach_delete = '删除选择';
$html_attach_none = 'You must select a file to attach!';  //to translate
$html_sort_by = 'Sort by';  //to translate
$html_sort = 'Sort'; //to translate
$html_from = '发件人';
$html_subject = '主题';
$html_date = '日期';
$html_sent = '发送';
$html_wrote = 'wrote';  //to translate
$html_size = '大小';
$html_totalsize = '总大小';
$html_kb = 'kB';  //to translate
$html_mb = 'MB';  //to translate
$html_gb = 'GB';  //to translate
$html_bytes = '字节';
$html_filename = '文件名';
$html_to = 'To';  //to translate
$html_cc = 'Cc';  //to translate
$html_bcc = 'Bcc'; //to translate
$html_nosubject = '没有主题';
$html_send = '发送';
$html_cancel = '取消';
$html_no_mail = '没有邮件.';
$html_logout = '退出';
$html_msg = '邮件';
$html_msgs = '邮件';
$html_configuration = 'This server is not well set up !';  //to translate
$html_priority = 'Priority';  //to translate
$html_lowest = 'Lowest';  //to translate
$html_low = 'Low';  //to translate
$html_normal = 'Normal';  //to translate
$html_high = 'High';  //to translate
$html_highest = 'Highest';  //to translate
$html_receipt = 'Request a return receipt';  //to translate
$html_select = 'Select';  //to translate
$html_select_all = 'Invert Selection';  //to translate
$html_loading_image = 'Loading image';  //to translate
$html_send_confirmed = 'Your mail was accepted for delivery';  //to translate
$html_no_sendaction = 'No action specified. Try enabling JavaScript.';  //to translate
$html_error_occurred = 'An error occurred';  //to translate
$html_prefs_file_error = 'Unable to open preferences file for writing.';  //to translate
$html_wrap = 'Wrap outgoing messages to :'; // to translate
$html_wrap_none = 'None'; //to translate
$html_usenet_separator = 'Usenet separator ("-- \n") Before signature'; // to translate
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
$html_del_msg = 'Delete selected messages ?'; // to translate
$html_down_mail = 'Download'; // to translate

$original_msg = '-- Original Message --';  //to translate
$to_empty = ' \'To\' 域不能为空 !';

// Images warning
$html_images_warning = 'For your security, remote pictures are not displayed.'; // to translate
$html_images_display = 'Display pictures'; // to translate

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'Unable to open SMTP connection';  //to translate
$html_smtp_error_unexpected = 'Unexpected SMTP response:';  //to translate

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
$html_search = 'Search';  //to translate
?>
