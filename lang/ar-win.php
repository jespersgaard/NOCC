<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/ar-win.php,v 1.26 2005/06/20 16:30:09 goddess_skuld Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the arabic language (Windows-1256)
 * Translation by Fisal Assubaieye <fisal77@hotmail.com>
 */

$charset = 'UTF-8';

// Configuration for the days and months

// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = 'ar_AR';

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

$err_user_empty = 'خانة الدخول فارغه';
$err_passwd_empty = 'خانة كلمة السر فارغه';


// html message

$alt_delete = 'حذف الرسائل المحدده';
$alt_delete_one = 'حذف الرساله';
$alt_new_msg = 'رسائل جديده';
$alt_reply = 'رد إلى المُرسِل';
$alt_reply_all = 'رد على الكل';
$alt_forward = 'إعادة توجيه';
$alt_next = 'الرساله التاليه';
$alt_prev = 'الرساله السابقه';
$html_on = 'ممكن';
$html_theme = 'النمط';

// index.php

$html_lang = 'اللغه';
$html_welcome = 'مرحباً بكم في';
$html_login = 'دخول';
$html_passwd = 'كلمة السر';
$html_submit = 'إرسال';
$html_help = 'مساعده';
$html_server = 'الملقم الخادم';
$html_wrong = 'الدخول أو كلمة السر خاطئـ(ـه)';
$html_retry = 'إعاده';
$html_remember = "Remember settings"; //to translate

// prefs.php

$html_msgperpage = 'Messages per page';  //to translate
$html_preferences = 'التفضيلات';
$html_full_name = 'الإسم كاملاً';
$html_email_address = 'البريد الإلكتروني';
$html_ccself = 'نسخه ذاتيه';
$html_hide_addresses = 'إخفاء العناوين';
$html_outlook_quoting = 'إقتباس نمط Outlook';
$html_reply_to = 'رد إلى';
$html_use_signature = 'إستخدام التوقيع';
$html_signature = 'التوقيع';
$html_reply_leadin = 'Reply Leadin';  //to translate
$html_prefs_updated = 'لقد تم تجديد التفضيلات';
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
$html_view_header = 'مشاهدة الترويسه';
$html_remove_header = 'إخفاء الترويسه';
$html_inbox = 'صندوق الوارد';
$html_new_msg = 'كتابه';
$html_reply = 'رد';
$html_reply_short = 'رد:';
$html_reply_all = 'رد على الكل';
$html_forward = 'إعادة توجيه';
$html_forward_short = 'إعادة توجيه:';
$html_forward_info = 'The forwarded message will be send as an attachment to this one.'; //to translate
$html_delete = 'حذف';
$html_new = 'جديد';
$html_mark = 'حذف';
$html_att = 'مرفق';
$html_atts = 'مرفقات';
$html_att_unknown = '[غير معروف]';
$html_attach = 'إرفاق';
$html_attach_forget = 'يجب عليك إدراج ملفك المرفق مع رسالتك قبل إرسالها !';
$html_attach_delete = 'حذف المحدد';
$html_attach_none = 'You must select a file to attach!';  //to translate
$html_sort_by = 'ترتيب بـ';
$html_from = 'من';
$html_subject = 'الموضوع';
$html_date = 'التاريخ';
$html_sent = 'إرسال';
$html_wrote = 'كُتِبَ من';
$html_size = 'الحجم';
$html_totalsize = 'الحجم الكلي';
$html_kb = 'كيلوبايت';
$html_bytes = 'بايت';
$html_filename = 'إسم الملف';
$html_to = 'إلى';
$html_cc = 'نسخه إلى';
$html_bcc = 'نسخه مخفيه إلى';
$html_nosubject = 'بدون عنوان';
$html_send = 'إرسال';
$html_cancel = 'إلغاء';
$html_no_mail = 'لايوجد رساله.';
$html_logout = 'خروج';
$html_msg = 'رساله';
$html_msgs = 'رسالات';
$html_configuration = 'هذا الملقم الخادم غير متوافق جيداً !';
$html_priority = 'الأولويه';
$html_low = 'منخفض';
$html_normal = 'عادي';
$html_high = 'عالي';
$html_receipt = 'Request a return receipt';  //to translate
$html_select = 'إختيار';
$html_select_all = 'Invert Selection';  //to translate
$html_loading_image = 'تحميل الصوره';
$html_send_confirmed = 'لقد تم تسليم بريدك';
$html_no_sendaction = 'لايوجد أحداث تفعيلات محدده. حاول تمكين دعم جافا سكريبت JavaScript.';
$html_error_occurred = 'حصل خطأ ما';
$html_prefs_file_error = 'لايستطيع فتح ملف التفضيلات للكتابه عليه.';
$html_wrap = 'Wrap outgoing messages to :';  //to translate
$html_wrap_none = 'None'; //to translate
$html_usenet_separator = 'Usenet separator ("-- \n") Before signature';  //to translate
$html_mark_as = 'Mark as'; //to translate
$html_read = 'read'; //to translate
$html_unread = 'unread'; //to translate
$html_mail_sent = 'Message successfully sent'; // to translate

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

$original_msg = '-- الرساله الأصليه --';
$to_empty = 'الخانه \'إلى\' يجب أن تكون غير فارغه !';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'لايستطيع فتح إتصال';
$html_smtp_error_unexpected = 'رد غير متوقع:';

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
?>
