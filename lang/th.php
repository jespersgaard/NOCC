<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/th.php,v 1.45 2001/11/18 17:53:32 wolruf Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the Thai language
 * 
 */

$charset = 'windows-874';

// Configuration for the days and months

// What language to use (Here, thai TH --> th_TH)
// see '/usr/share/locale/' for more information
$lang_locale = 'th_TH';

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
$default_time_format = '%I:%M %p';


// Here is the configuration for the HTML

$err_user_empty = 'ชื่อผู้ใช้ไม่ได้กรอก';
$err_passwd_empty = 'รหัสผ่านไม่ได้กรอก';


// html message

$alt_delete = 'ลบจดหมายที่เลือก';
$alt_delete_one = 'ลบ';
$alt_new_msg = 'จดหมายใหม่';
$alt_reply = 'ตอบกลับ';
$alt_reply_all = 'ตอบกลับทุกคน';
$alt_forward = 'ส่งต่อ';
$alt_next = 'จดหมายต่อไป';
$alt_prev = 'จดหมายก่อน';
$html_on = 'เปิด';
$html_theme = 'รูปแบบ';

// index.php

$html_lang = 'ภาษา';
$html_welcome = 'ยินดีต้อนรับสู่';
$html_login = 'ชื่อผู้ใช้';
$html_passwd = 'รหัสผ่าน';
$html_submit = 'ยืนยัน';
$html_help = 'ช่วยเหลือ';
$html_server = 'ระบบ';
$html_wrong = 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง';
$html_retry = 'ลองใหม่';

// prefs.php

$html_preferences = 'ตั้งค่า';
$html_full_name = 'ชื่อเต็ม';
$html_email_address = 'อีเมล์';
$html_ccself = 'สำเนา';
$html_hide_addresses = 'ซ่อนที่อยู่';
$html_outlook_quoting = 'รูปแบบ Outlook';
$html_reply_to = 'ตอบกลับถึง';
$html_use_signature = 'ใช้ลายเซ็นต์';
$html_signature = 'ลายเซ็นต์';
$html_prefs_updated = 'การตั้งค่าได้ปรับปรุงแล้ว';

// Other pages

$html_view_header = 'แสดงรายละเอียด';
$html_remove_header = 'ซ่อนรายละเอียด';
$html_inbox = 'กล่องจดหมาย';
$html_new_msg = 'เขียนจดหมาย';
$html_reply = 'ตอบกลับ';
$html_reply_short = 'Re';
$html_reply_all = 'ตอบกลับทุกคน';
$html_forward = 'ส่งต่อ';
$html_forward_short = 'Fw';
$html_delete = 'ลบ';
$html_new = 'ใหม่';
$html_mark = 'ลบ';
$html_att = 'แนบไฟล์';
$html_atts = 'แนบหลายไฟล์';
$html_att_unknown = '[ไม่รู้จัก]';
$html_attach = 'แนบ';
$html_attach_forget = 'คุณต้องแนบไฟล์ก่อนที่จะส่งจดหมาย !';
$html_attach_delete = 'ลบไฟล์แนบที่เลือก';
$html_sort_by = 'จัดเรียงโดย';
$html_from = 'จาก';
$html_subject = 'หัวเรื่อง';
$html_date = 'วัน';
$html_sent = 'ส่ง';
$html_wrote = 'เขียนเมื่อ';
$html_size = 'ขนาด';
$html_totalsize = 'ขนาดทั้งหมด';
$html_kb = 'Kb';
$html_bytes = 'bytes';
$html_filename = 'ชื่อไฟล์';
$html_to = 'ถึง';
$html_cc = 'สำเนา';
$html_bcc = 'สำเนาซ่อน';
$html_nosubject = 'ไม่มีหัวเรื่อง';
$html_send = 'ส่ง';
$html_cancel = 'ยกเลิก';
$html_no_mail = 'ไม่มีข้อความ';
$html_logout = 'ออก';
$html_msg = 'ข้อความ';
$html_msgs = 'หลายข้อความ';
$html_configuration = 'ระบบนี้ยังตั้งค่าไม่สมบูรณ์';
$html_priority = 'ความสำคัญ';
$html_low = 'ต่ำ';
$html_normal = 'ปกติ';
$html_high = 'สูง';
$html_select = 'เลือก';
$html_select_all = 'เลือกทั้งหมด';
$html_loading_image = 'กำลังโหลดภาพ';
$html_send_confirmed = 'จดหมายท่านได้ถูกส่งไปแล้ว';
$html_no_sendaction = 'ไม่มีการกระทำใดๆ ให้ลองเปิดการใช้ JavaScript';
$html_error_occurred = 'เกิดข้อผิดพลาดขึ้น';
$html_prefs_file_error = 'ไม่สามารถตั้งค่าได้';
$html_sig_file_error = 'ไม่สามารถใช้ลายเซ็นต์ได้';

$original_msg = '-- ข้อความต้นฉบับ --';
$to_empty = 'The \'ถึง\' ห้ามเว้นว่างไว้ !';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = "ไม่สามารถติดต่อได้";
$html_smtp_error_unexpected = "ไม่มีการตอบสนอง:";
?>