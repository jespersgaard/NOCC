<?php
/**
 * Configuration file for the Persian language
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

$charset = 'UTF-8';

// Configuration for the days and months

// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = 'fa.UTF-8';

// Text Alignment
// Can be right-to-left (rtl) which is needed for proper Arabic, Hebrew
// Or left-to-right (ltr) which is default for most languages
$lang_dir = 'rtl';

// What format string should we pass to strftime() for messages sent on
// days other than today?
$default_date_format = '%Y-%m-%d'; 

// If the local is not implemented on the host, how we display the date
$no_locale_date_format = '%Y-%m-%d';

// What format string should we pass to strftime() for messages sent
// today?
$default_time_format = '%I:%M %p';


// Here is the configuration for the HTML

$err_user_empty = 'شناسه کاربر خالى است';
$err_passwd_empty = 'رمز خالى است';


// html message
$alt_delete = 'پاک کردن پيغامهاى انتخاب شده';
$alt_delete_one = 'پاک کردن پيغام';
$alt_new_msg = 'پيغامهاى جديد';
$alt_reply = 'جواب به نويسنده';
$alt_reply_all = 'جواب به همه';
$alt_forward = 'فرستادن پيغام';
$alt_next = 'Next'; //to translate
$alt_prev = 'Previous'; //to translate
$title_next_page = 'Next page'; //to translate
$title_prev_page = 'Previous page'; //to translate
$title_next_page = 'پيغام بعدى';
$title_prev_page = 'پيغام قبلى';
$html_on = 'on';  //to translate
$html_theme = 'Theme';  //to translate

// index.php
$html_lang = 'زبان';
$html_welcome = 'خوش آمديد به';
$html_login = 'شناسه کاربر';
$html_passwd = 'رمز';
$html_submit = 'ورود';
$html_help = 'کمک';
$html_server = 'سرور';
$html_wrong = 'شناسه کاربر يا رمز اشتباه است';
$html_retry = 'سعى دوباره';
$html_remember = "Remember settings"; //to translate

// prefs.php
$html_msgperpage = 'تعداد پيغامها در صفحه';
$html_preferences = 'تنظيمات';
$html_full_name = 'اسم کامل';
$html_email_address = 'آدرس نامه الکترونيکى';
$html_ccself = 'نسخه Cc براى خود';
$html_hide_addresses = 'آدرسها به صورت پنهانى';
$html_outlook_quoting = 'نقل قول شبيه Outlook';
$html_reply_to = 'پاسخ به';
$html_use_signature = 'استفاده از امضا';
$html_signature = 'امضا';
$html_reply_leadin = 'Reply Leadin';  //to translate
$html_prefs_updated = 'تنطيمات بروز شد';
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
$html_folders_create_failed = 'شاخه نمىتواند ايجاد شود';
$html_folders_sub_failed = 'Could not subscribed to folder!';  //to translate
$html_folders_unsub_failed = 'Could not unsubscribed from folder!';  //to translate
$html_folders_rename_failed = 'شاخه نمىتواند تغيير نام يابد';
$html_folders_updated = 'شاخه ها بروز شدند';
$html_folder_subscribe = 'Subscribe to';  //to translate
$html_folder_rename = 'تغيير نام';
$html_folder_create = 'ساختن شاخه جديد صدا شد';
$html_folder_remove = 'Unsubscribe from';  //to translate
$html_folder_delete = 'Delete';  //to translate
$html_folder_to = 'ﺐﻫ';

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
$html_new_msg_in = 'پيغامهاى جديد در';
$html_or = 'يا';
$html_move = 'تغيير مکان';
$html_copy = 'کپى';
$html_messages_to = 'پيغامهاى انتخاب شده به';
$html_gotopage = 'برو به صفحه';
$html_gotofolder = 'برو به شاخه';
$html_other_folders = 'ليست شاخه ها';
$html_page = 'صفحه';
$html_of = '';
$html_view_header = 'سرآيند را نشان بده';
$html_remove_header = 'سرآيند را پنهان کن';
$html_inbox = 'Inbox';  //to translate
$html_new_msg = 'نوشتن نامه';
$html_reply = 'پاسخ دادن';
$html_reply_short = 'Re';  //to translate
$html_reply_all = 'پاسخ دادن به همه';
$html_forward = 'فرستادن';
$html_forward_short = 'Fwd';  //to translate
$html_forward_info = 'The forwarded message will be send as an attachment to this one.'; //to translate
$html_delete = 'پاک کردن';
$html_new = 'جديد';
$html_mark = 'پاک کردن';
$html_att = 'ضميمه';
$html_atts = 'ضميمه ها';
$html_att_unknown = '[ناشناخته]';
$html_attach = 'ضميمه کن';
$html_attach_forget = 'شما بايد فايل خود را قبل از فرستادن ضميمه کنيد';
$html_attach_delete = 'ضميمه هاى انتخاب شده را پاک کن';
$html_attach_none = 'You must select a file to attach!';  //to translate
$html_sort_by = 'ترتيب بندى با';
$html_sort = 'Sort'; //to translate
$html_from = 'از';
$html_subject = 'عنوان';
$html_date = 'تاريخ';
$html_sent = 'فرستاده شد';
$html_wrote = 'wrote';  //to translate
$html_size = 'سايز';
$html_totalsize = 'سايز کل';
$html_kb = 'کيلو بايت';
$html_mb = 'MB'; //to translate
$html_gb = 'GB'; //to translate
$html_bytes = 'بايت';
$html_filename = 'نام فايل';
$html_to = 'به';
$html_cc = 'کپى';
$html_bcc = 'کپى محرمانه';
$html_nosubject = 'بدون عنوان';
$html_send = 'بفرست';
$html_cancel = 'کنسل';
$html_no_mail = 'پيغامى وجود ندارد';
$html_logout = 'خروج';
$html_msg = 'پيغام';
$html_msgs = 'پيغامها';
$html_configuration = 'اين سرور درست تنظيم نشده است';
$html_priority = 'ارجحيت';
$html_lowest = 'Lowest';  //to translate
$html_low = 'کم';
$html_normal = 'معمولى';
$html_high = 'زياد';
$html_highest = 'Highest';  //to translate
$html_receipt = 'Request a return receipt';  //to translate
$html_select = 'انتخاب';
$html_select_all = 'Invert Selection';  //to translate
$html_loading_image = 'خواندن تصوير';
$html_send_confirmed = 'نامه شما براى فرستادن پذيرفته شد';
$html_no_sendaction = 'هيچ عملى انجام نشد. JavaScript را فعال نمائيد';
$html_error_occurred = 'يک خطا اتفاق افتاد';
$html_prefs_file_error = 'نمىتوانم فايل تنظيمات فردى را براى نوشتن باز کنم';
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

$original_msg = '-- Original Message --';  //to translate
$to_empty = 'The \'To\' field must not be empty !';  //to translate

// Images warning
$html_images_warning = 'For your security, remote pictures are not displayed.'; // to translate
$html_images_display = 'Display pictures'; // to translate

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'نمىتوانم اتصال SMTP را باز کنم';
$html_smtp_error_unexpected = 'جواب غير قابل انتظار SMTP:';

// IMAP messages (class_local.php)
$lang_could_not_connect = 'نمىتوانم به سرور متصل شوم';
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
