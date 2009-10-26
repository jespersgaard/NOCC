<?php
/**
 * Configuration file for the English language
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * This file is part of NOCC. NOCC is free software under the terms of the
 * GNU General Public License. You should have received a copy of the license
 * along with NOCC.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package    NOCC
 * @subpackage Translations
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @version    SVN: $Id$
 */

/** English (English)
 *
 * See the qqq 'language' for message documentation incl. usage of parameters
 * To improve a translation please visit http://translatewiki.net
 *
 * @ingroup Language
 * @file
 */

// Configuration for the days and months

// What language to use (Here, english US --> en_US)
// see '/usr/share/locale/' for more information
$lang_locale = 'en_US.UTF-8';

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
$err_user_empty = 'The login field is empty';
$err_passwd_empty = 'The password field is empty';

// html message
$alt_delete = 'Delete selected messages';
$alt_delete_one = 'Delete the message';
$alt_new_msg = 'New messages';
$alt_reply = 'Reply to the author';
$alt_reply_all = 'Reply all';
$alt_forward = 'Forward';
$alt_next = 'Next';
$alt_prev = 'Previous';
$title_next_page = 'Next page';
$title_prev_page = 'Previous page';
$title_next_msg = 'Next message';
$title_prev_msg = 'Previous message';
$html_theme_label = 'Theme:';

// index.php
$html_welcome = 'Welcome to %1$s';
$html_login = 'Login';
$html_user_label = 'User:';
$html_passwd_label = 'Password:';
$html_submit = 'Submit';
$html_help = 'Help';
$html_server_label = 'Server:';
$html_wrong = 'The login or the password are incorrect';
$html_retry = 'Retry';
$html_remember = 'Remember settings';

// prefs.php
$html_lang_label = 'Language:';
$html_msgperpage_label = 'Messages per page:';
$html_preferences = 'Preferences';
$html_full_name_label = 'Full name:';
$html_email_address_label = 'E-mail Address:';
$html_ccself = 'Cc self';
$html_hide_addresses = 'Hide addresses';
$html_outlook_quoting = 'Outlook-style quoting';
$html_reply_to = 'Reply to';
$html_use_signature = 'Use signature';
$html_signature = 'Signature';
$html_signature_label = 'Signature:';
$html_reply_leadin_label = 'Reply Leadin:';
$html_prefs_updated = 'Preferences updated';
$html_manage_folders_link = 'Manage IMAP Folders';
$html_manage_filters_link = 'Manage E-mail Filters';
$html_use_graphical_smilies = 'Use graphical smilies';
$html_sent_folder_label = 'Copy sent e-mails into a dedicated folder:';
$html_trash_folder_label = 'Move deleted e-mails into a dedicated folder:';
$html_colored_quotes = 'Colored quotes';
$html_display_struct = 'Display structured text';
$html_send_html_mail = 'Send e-mail in HTML format';

// folders.php
$html_folders = 'Folders';
$html_folders_create_failed = 'Folder could not be created!';
$html_folders_sub_failed = 'Could not subscribe to folder!';
$html_folders_unsub_failed = 'Could not unsubscribe from folder!';
$html_folders_rename_failed = 'Folder could not be renamed!';
$html_folders_updated = 'Folders updated';
$html_folder_subscribe = 'Subscribe to';
$html_folder_rename = 'Rename';
$html_folder_create = 'Create new folder called';
$html_folder_remove = 'Unsubscribe from';
$html_folder_delete = 'Delete';
$html_folder_to = 'to';

// filters.php
$html_filter_remove = 'Delete';
$html_filter_body = 'Message Body';
$html_filter_subject = 'Message Subject';
$html_filter_to = 'To Field';
$html_filter_cc = 'Cc Field';
$html_filter_from = 'From Field';
$html_filter_change_tip = 'To change a filter simply overwrite it.';
$html_reapply_filters = 'Reapply all filters';
$html_filter_contains = 'contains';
$html_filter_name = 'Filter Name';
$html_filter_action = 'Filter Action';
$html_filter_moveto = 'Move to';

// Other pages
$html_select_one = '--Select One--';
$html_and = 'And';
$html_new_msg_in = 'New messages in';
$html_or = 'or';
$html_move = 'Move';
$html_copy = 'Copy';
$html_messages_to = 'selected messages to';
$html_gotopage = 'Go to Page';
$html_gotofolder = 'Go to Folder';
$html_other_folders = 'Folder List';
$html_page = 'Page';
$html_of = 'of';
$html_view_header = 'View header';
$html_remove_header = 'Hide header';
$html_inbox = 'Inbox';
$html_new_msg = 'Write';
$html_reply = 'Reply';
$html_reply_short = 'Re:';
$html_reply_all = 'Reply all';
$html_forward = 'Forward';
$html_forward_short = 'Fwd:';
$html_forward_info = 'The forwarded message will be sent as an attachment to this one.';
$html_delete = 'Delete';
$html_new = 'New';
$html_mark = 'Delete';
$html_att_label = 'Attachment:';
$html_atts_label_label = 'Attachments:';
$html_unknown = '[unknown]';
$html_attach = 'Attach';
$html_attach_forget = 'You must attach your file before sending your message!';
$html_attach_delete = 'Remove Selected';
$html_attach_none = 'You must select a file to attach!';
$html_sort_by = 'Sort by';
$html_sort = 'Sort';
$html_from = 'From';
$html_from_label = 'From:';
$html_subject = 'Subject';
$html_subject_label = 'Subject:';
$html_date = 'Date';
$html_date_label = 'Date:';
$html_sent = 'Sent:';
$html_wrote = 'wrote';
$html_size = 'Size';
$html_totalsize = 'Total Size';
$html_kb = 'kB';
$html_mb = 'MB';
$html_gb = 'GB';
$html_bytes = 'bytes';
$html_filename = 'Filename';
$html_to = 'To';
$html_to_label = 'To:';
$html_cc = 'Cc';
$html_cc_label = 'Cc:';
$html_bcc_label = 'Bcc:';
$html_nosubject = 'No subject';
$html_send = 'Send';
$html_cancel = 'Cancel';
$html_no_mail = 'No message.';
$html_logout = 'Logout';
$html_msg = 'Message';
$html_msgs = 'Messages';
$html_configuration = 'This server is not well set up!';
$html_priority = 'Priority';
$html_priority_label = 'Priority:';
$html_lowest = 'Lowest';
$html_low = 'Low';
$html_normal = 'Normal';
$html_high = 'High';
$html_highest = 'Highest';
$html_receipt = 'Request a return receipt';
$html_select = 'Select';
$html_select_all = 'Invert Selection';
$html_select_contacts = 'Select contacts';
$html_loading_image = 'Loading image';
$html_send_confirmed = 'Your e-mail was accepted for delivery';
$html_no_sendaction = 'No action specified. Try enabling JavaScript.';
$html_error_occurred = 'An error occurred';
$html_prefs_file_error = 'Unable to open preferences file for writing.';
$html_wrap = 'Number of characters to wrap outgoing messages to:';
$html_wrap_none = 'No wrapping';
$html_usenet_separator = 'Usenet separator ("-- \n") before signature';
$html_mark_as = 'Mark as';
$html_read = 'read';
$html_unread = 'unread';
$html_encoding_label = 'Character encoding:';

// Contacts manager
$html_add = 'Add';
$html_contacts = '%1$s Contacts';
$html_modify = 'Modify';
$html_back = 'Back';
$html_contact_add = 'Add new contact';
$html_contact_mod = 'Modify a contact';
$html_contact_first = 'First name';
$html_contact_last = 'Last name';
$html_contact_nick = 'Nick';
$html_contact_mail = 'E-mail';
$html_contact_list = 'Contact list of %1$s';
$html_contact_del = 'from the contact list';
$html_contact_count = '%1$d Contacts';

$html_contact_err1 = 'Maximum number of contacts is "%1$d"';
$html_contact_err2 = 'You cannot add a new contact';
$html_contact_err3 = 'You do not have access rights to contact list';
$html_contact_none = 'No contacts could be found.';
$html_del_msg = 'Delete selected messages?';
$html_down_mail = 'Download';

$original_msg = '-- Original Message --';
$to_empty = 'The \'To\' field must not be empty!';

// Images warning
$html_images_warning = 'For your security, remote pictures are not displayed.';
$html_images_display = 'Display pictures';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'Unable to open SMTP connection';
$html_smtp_error_unexpected = 'Unexpected SMTP response:';

// IMAP messages (class_local.php)
$lang_could_not_connect = 'Could not connect to server';
$lang_invalid_msg_num = 'Bad message number';

$html_file_upload_attack = 'Possible file upload attack';
$html_invalid_email_address = 'Invalid e-mail address';
$html_invalid_msg_per_page = 'Invalid number of messages per page';
$html_invalid_wrap_msg = 'Invalid message wrap width';
$html_seperate_msg_win = 'Messages in separate window';

// Exceptions
$html_err_file_contacts = 'Unable to open contacts file for writing.';
$html_session_file_error = 'Unable to open session file for writing.';
$html_login_not_allowed = 'This login is not allowed for connection.';

// Send delay
$lang_err_send_delay = 'You must wait between two e-mails (%1$d seconds)';
$html_search = 'Search';
