<?
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/ar.php,v 1.4 2001/02/04 18:30:01 wolruf Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the arabic language
 * Translation by Mohamed Hadrouj <mohamed.hadrouj@wanadoo.co.ma>
 */

$charset = "UTF-8";

// Configuration for the days and months


// What language to use (Here, french FRANCE --> fr_FR)
// see '/usr/share/locale/' for more information
$lang_locale = "ar_AR";

// What format string should we pass to strftime() for messages sent on
// days other than today?
$default_date_format = "%A %d %B %Y";

// If the local is not implemented on the host, how we display the date
$no_locale_date_format = "%d-%m-%Y";

// What format string should we pass to strftime() for messages sent
// today?
$default_time_format = "%H:%M";


// Here is the configuration for the HTML

$err_user_empty = "ءاسم المستخدم غير صحيح  ";
$err_passwd_empty = " كلمة السر غير صحيحة. أعد المحاولة";


// html message

$alt_delete = "محو الرسا ئل المختارة ";
$alt_delete_one = "محو الرسالة" ;
$alt_new_msg = "رسالة جديدة";
$alt_reply = "ءاجاابة المرسل ";
$alt_reply_all = "ءاجاابة للجميع";
$alt_forward = "تحويل ";
$alt_next = "التالية";
$alt_prev = "السابقة";


// index.php

$html_lang = "Langue";
$html_welcome = " مرحبا بكم في ";
$html_login = "المستخدم";
$html_passwd = "كلمة السر";
$html_submit = "ءارسال";
$html_help = "مساعدة";
$html_server = "Serveur";
$html_wrong = "ءأسم المستخدم أو كلمة السر غير صحيحة ";
$html_retry = "أعد المحاولة";

// Other pages

$html_view_header = "Voir l'ent&ecirc;te";
$html_remove_header = "Masquer l'ent&ecirc;te";
$html_new_msg = "رسالة جديدة";
$html_reply = "ءاجابة";
$html_reply_short = "Re";
$html_reply_all = "ءاجابة للكل";
$html_forward = "تحويل الرسالة ءالى";
$html_forward_short = "Tr";
$html_delete = "محو";
$html_new = "جديد";
$html_mark = "محو";
$html_att = "ملف مرفق";
$html_atts = "ملفات مرفقة";
$html_att_unknown = "[غير معروف]";
$html_attach = "Attacher";
$html_attach_forget = "Vous devez attacher votre fichier avant d'envoyer votre message !"; 
$html_attach_delete = "Supprimer les fichiers selectionn�s";
$html_from = "من";
$html_subject = "الموضوع";
$html_date = "التاريخ";
$html_sent = "مرسل";
$html_size = "الحجم";
$html_totalsize = "Taille Totale";
$html_kb = "Ko";
$html_bytes = "octets";
$html_filename = "Fichier";
$html_to = "ءالى";
$html_cc = "نسخة";
$html_bcc = "نسخة مختبأة";
$html_nosubject = "بدون موضوع";
$html_send = "أرسل";
$html_cancel = "ءالغاء";
$html_no_mail = "ليست هناك أية رسالة";
$html_logout = "ءانهاء الاءرتباط";
$html_msg = "رسالة";
$html_msgs = "رسائل";

$original_msg = "--  الرسالة الأصلية  --";
$to_empty = "يجب ءاعطاء عنوان المرسل ءاليه !";
?>