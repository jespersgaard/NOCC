<?php
/**
 * Configuration file for the Norwegian Bokmal language
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * This file is part of NOCC. NOCC is free software under the terms of the
 * GNU General Public License. You should have received a copy of the license
 * along with NOCC.  If not, see <http://www.gnu.org/licenses/>.
 *
 * Translators:
 * - Rune Dalmo <runed@balder.narviknett.no>
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
$lang_locale = 'no_NO.UTF-8';

// Text Alignment
// Can be right-to-left (rtl) which is needed for proper Arabic, Hebrew
// Or left-to-right (ltr) which is default for most languages
$lang_dir = 'ltr';

// What format string should we pass to strftime() for messages sent on
// days other than today?
$default_date_format = '%d.%m.%y'; 

// If the local is not implemented on the host, how we display the date
$no_locale_date_format = '%d.%m.%y';

// What format string should we pass to strftime() for messages sent
// today?
$default_time_format = '%I:%M %p';


// Here is the configuration for the HTML

$err_user_empty = 'Brukernavn er ikke spesifisert';
$err_passwd_empty = 'Passord er ikke spesifisert';


// html message
$alt_delete = 'Slett alle markerte meldinger';
$alt_delete_one = 'Slett markert melding';
$alt_new_msg = 'Nye meldinger';
$alt_reply = 'Svar til avsenderen';
$alt_reply_all = 'Svar til alle';
$alt_forward = 'Videresend';
$alt_next = 'Next'; //to translate
$alt_prev = 'Previous'; //to translate
$title_next_page = 'Next page'; //to translate
$title_prev_page = 'Previous page'; //to translate
$title_next_msg = 'Neste melding';
$title_prev_msg = 'Forrige melding';
$html_on = 'til';
$html_theme = 'Tema';

// index.php
$html_lang = 'Språk';
$html_welcome = 'Velkommen til';
$html_login = 'Brukernavn';
$html_passwd = 'Passord';
$html_submit = 'Logg inn';
$html_help = 'Hjelp';
$html_server = 'Server'; //to translate
$html_wrong = 'Brukernavn eller passord er feil';
$html_retry = 'Prøv igjen';
$html_remember = "Remember settings"; //to translate

// prefs.php
$html_msgperpage = 'Beskjeder pr. side';
$html_preferences = 'Innstillinger';
$html_full_name = 'Fullt navn';
$html_email_address = 'E-post - adresse';
$html_ccself = 'Cc selv';
$html_hide_addresses = 'Skjul adresser';
$html_outlook_quoting = 'Outlook-liknende sitering';
$html_reply_to = 'Svar til';
$html_use_signature = 'Bruk signatur';
$html_signature = 'Signatur';
$html_reply_leadin = 'Reply Leadin';  //to translate
$html_prefs_updated = 'Innstillinger oppdatert';
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
$html_folders_unsub_failed = 'Could not unsubscribed from foder!';  //to translate
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
$html_view_header = 'Vis overskrift';
$html_remove_header = 'Skjul overskrift';
$html_inbox = 'Innboks';
$html_new_msg = 'Skriv';
$html_reply = 'Svar';
$html_reply_short = 'Sv';
$html_reply_all = 'Svar til alle';
$html_forward = 'Videresend';
$html_forward_short = 'Vs';
$html_forward_info = 'The forwarded message will be send as an attachment to this one.'; //to translate
$html_delete = 'Slett';
$html_new = 'Ny';
$html_mark = 'Slett';
$html_att = 'Vedlagt fil';
$html_atts = 'Vedlagte filer';
$html_att_unknown = '[ukjent]';
$html_attach = 'Legg til';
$html_attach_forget = 'Du må legge til filen før du kan sende meldingen !';
$html_attach_delete = 'Fjern markerte vedlegg';
$html_attach_none = 'You must select a file to attach!';  //to translate
$html_sort_by = 'Sort by';  //to translate
$html_sort = 'Sort'; //to translate
$html_from = 'Fra';
$html_subject = 'Emne';
$html_date = 'Dato';
$html_sent = 'Sendt';
$html_wrote = 'wrote';  //to translate
$html_size = 'Størrelse';
$html_totalsize = 'Total Størrelse';
$html_kb = 'kB';  //to translate
$html_mb = 'MB'; //to translate
$html_gb = 'GB'; //to translate
$html_bytes = 'bytes';  //to translate
$html_filename = 'Filnavn';
$html_to = 'Til';
$html_cc = 'Cc';  //to translate
$html_bcc = 'Bcc';  //to translate
$html_nosubject = 'Intet emne';
$html_send = 'Send';  //to translate
$html_cancel = 'Annuller';
$html_no_mail = 'Ingen meldinger';
$html_logout = 'Logg av';
$html_msg = 'Melding';
$html_msgs = 'Meldinger';
$html_configuration = 'Denne serveren er ikke satt opp riktig !';
$html_priority = 'Prioritet';
$html_low = 'Lav';
$html_normal = 'Normal';  //to translate
$html_high = 'Høy';
$html_receipt = 'Krev en leveringsbekreftelse';
$html_select = 'Velg';
$html_select_all = 'Invert Selection';  //to translate
$html_loading_image = 'Laster bilde';
$html_send_confirmed = 'Din e-post ble akseptert for levering';
$html_no_sendaction = 'Ingen handling spesifisert. Prøv å aktivere JavaScript.';
$html_error_occurred = 'En feil oppstod';
$html_prefs_file_error = 'Ikke mulig å åpne innstillingsfilen for skriving (lagring).';
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

$original_msg = '-- Opprinnelig melding --';
$to_empty = 'Feltet \'Til\' kan ikke være tomt !';

// Images warning
$html_images_warning = 'For your security, remote pictures are not displayed.'; // to translate
$html_images_display = 'Display pictures'; // to translate

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'Ikke mulig å oppnå forbindelse';
$html_smtp_error_unexpected = 'Uventet svar:';

// IMAP messages (class_local.php)
$lang_could_not_connect = 'Kunne ikke oppnå tilkobling mot server';
$lang_invalid_msg_num = 'Bad Message Number';  //to translate

$html_file_upload_attack = 'Muligens filopplastingsangrep';
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