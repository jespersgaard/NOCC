<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/el.php,v 1.7 2002/04/24 23:32:25 rossigee Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the Greek language
 * Translation by Spyros Ioakim <sioakim@ace-hellas.gr>
 */

$charset = 'ISO-8859-7';

// Configuration for the days and months

// What language to use
// see '/usr/share/locale/' for more information
$lang_locale = 'el_GR';

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

$err_user_empty = 'Το πεδίο όνομα λογαριασμού είναι άδειο';
$err_passwd_empty = 'Το πεδίο κωδικός είναι άδειο';


// html message

$alt_delete = 'Διαγραφή επιλεγμένων μηνυμάτων';
$alt_delete_one = 'Διαγραφή μηνύματος';
$alt_new_msg = 'Νέα μηνύματα';
$alt_reply = 'Απάντηση στον αποστολέα';
$alt_reply_all = 'Απάντηση σε όλους';
$alt_forward = 'Προώθηση';
$alt_next = 'Επόμενο μήνυμα';
$alt_prev = 'Προηγούμενο μήνυμα';
$html_on = 'on';
$html_theme = 'Θέμα';

// index.php

$html_lang = 'Γλώσσα';
$html_welcome = 'Καλώς ήρθατε στο';
$html_login = 'Ονομα λογαριασμού';
$html_passwd = 'Κωδικός';
$html_submit = 'Login';
$html_help = 'Βοήθεια';
$html_server = 'Διακομιστής';
$html_wrong = 'Το όνομα λογαριασμού ή ο κωδικός είναι λάθος';
$html_retry = 'Επανάληψη';

// prefs.php

$html_preferences = 'Προτιμήσεις';
$html_full_name = 'Ονοματεπώνυμο';
$html_email_address = 'E-mail διεύθυνση';
$html_ccself = 'Αντίγραφο στον ευατό μου';
$html_hide_addresses = 'Απόκρυψη διευθύνσεων';
$html_outlook_quoting = 'Στυλ Outlook παραθέσεις';
$html_reply_to = 'Απάντηση σε';
$html_use_signature = 'Χρησιμοποίηση υπογραφής';
$html_signature = 'Υπογραφή';
$html_prefs_updated = 'Οι Προτιμήσεις σας ανανεώθηκαν';

// Other pages

$html_view_header = 'Προβολή λεπτομερειών';
$html_remove_header = 'Απόκρυψη λεπτομερειών';
$html_inbox = 'Inbox';
$html_new_msg = 'Σύνθεση';
$html_reply = 'Απάντηση';
$html_reply_short = 'Re';
$html_reply_all = 'Απάντηση σε όλους';
$html_forward = 'Προώθηση';
$html_forward_short = 'Fw';
$html_delete = 'Διαγραφή';
$html_new = 'Νέο';
$html_mark = 'Διαγραφή';
$html_att = 'Συνημμένο';
$html_atts = 'Συνημμένα';
$html_att_unknown = '[άγνωστο]';
$html_attach = 'Επισύναψη';
$html_attach_forget = 'Πρέπει να συννάψετε το αρχείο πρίν στείλετε το μήνυμα !';
$html_attach_delete = 'Διαγραφή μαρκαρισμένων συνημμένων';
$html_sort_by = 'Sort by';
$html_from = 'Από';
$html_subject = 'Θέμα';
$html_date = 'Ημ/νία';
$html_sent = 'Αποστολή';
$html_wrote = 'wrote';
$html_size = 'Μέγεθος';
$html_totalsize = 'Συνολικό μέγεθος';
$html_kb = 'Kb';
$html_bytes = 'bytes';
$html_filename = 'Ονομα αρχείου';
$html_to = 'Πρός';
$html_cc = 'Αντίγραφο προς';
$html_bcc = 'Κρυφό Αντίγραφο προς';
$html_nosubject = 'Χωρίς Θέμα';
$html_send = 'Αποστολή';
$html_cancel = 'Ακυρο';
$html_no_mail = 'Δεν υπάρχουν μηνύματα.';
$html_logout = 'Εξοδος';
$html_msg = 'Μήνυμα';
$html_msgs = 'Μηνύματα';
$html_configuration = 'Αυτός ο διακομιστής δεν έχει οριστεί σωστά !';
$html_priority = 'Προταιραιότητα';
$html_low = 'Χαμηλή';
$html_normal = 'Κανονική';
$html_high = 'Υψηλή';
$html_select = 'Διαλέξτε';
$html_select_all = 'Επιλογή Ολων';
$html_loading_image = 'Φορτώνω την εικόνα';
$html_send_confirmed = 'Το μήνυμα σας θα αποσταλεί.';
$html_no_sendaction = 'Δεν επιλέχθηκε εντολή. Δοκιμάστε να ενεργοποιήσετε τηνJavaScript.';
$html_error_occurred = 'Ενα σφάλμα συνέβη';
$html_prefs_file_error = 'Δεν μπορώ να γράψω στο αρχείο προτιμήσεων.';
$html_sig_file_error = 'Δεν μπορώ να γράψω στο αρχείο υπογραφής.';

$original_msg = '-- Πρωτότυπο Μήνυμα --';
$to_empty = 'Το πεδίο \'Πρός\' δεν πρέπει να είναι άδειο !';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = "Δεν μπορώ να ανοίξω σύνδεση";
$html_smtp_error_unexpected = "Αγνωστη απάντηση:";
$lang_could_not_connect = 'Could not connect to server';  //to translate
$html_file_upload_attack = 'Possible file upload attack';  //to translate
$html_invalid_email_address = 'Invalid e-mail address';  //to translate
?>
