<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/fr.php,v 1.55 2001/12/13 10:35:56 nicocha Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Configuration file for the french language (the first made, we're french !)
 *
 */

$charset = 'ISO-8859-1';

// Configuration for the days and months

// What language to use (Here, french FRANCE --> fr_FR)
// see '/usr/share/locale/' for more information
$lang_locale = 'fr_FR';

// Text Alignment
// Can be right-to-left (rtl) which is needed for proper Arabic, Hebrew
// Or left-to-right (ltr) which is default for most languages
$lang_dir = 'ltr';

// What format string should we pass to strftime() for messages sent on
// days other than today?
$default_date_format = '%A %d %B %Y'; 

// If the local is not implemented on the host, how we display the date
$no_locale_date_format = '%d-%m-%Y';

// What format string should we pass to strftime() for messages sent
// today?
$default_time_format = '%H:%M';


// Here is the configuration for the HTML

$err_user_empty = 'Vous n\'avez pas saisi de login';
$err_passwd_empty = 'Vous n\'avez pas saisi de mot de passe';


// html message

$alt_delete = 'Effacer les messages selectionn&eacute;s';
$alt_delete_one = 'Effacer le message';
$alt_new_msg = 'Nouveaux messages';
$alt_reply = 'R&eacute;pondre &agrave; l\'auteur';
$alt_reply_all = 'R&eacute;pondre &agrave; tous';
$alt_forward = 'Transf&eacute;rer';
$alt_next = 'Message suivant';
$alt_prev = 'Message pr&eacute;c&eacute;dent';
$html_on = 'sur';
$html_theme = 'Th&egrave;me';

// index.php

$html_lang = 'Langue';
$html_welcome = 'Bienvenue &agrave;';
$html_login = 'Login';
$html_passwd = 'Mot de passe';
$html_submit = 'Valider';
$html_help = 'Aide';
$html_server = 'Serveur';
$html_wrong = 'Le login ou le mot de passe ne sont pas valides';
$html_retry = 'R&eacute;essayer';

// prefs.php

$html_preferences = 'Pr&eacute;f&eacute;rences';
$html_full_name = 'Nom complet';
$html_email_address = 'Adresse e-mail';
$html_ccself = 'Recevoir une copie';
$html_hide_addresses = 'Cacher mon adresse e-mail';
$html_outlook_quoting = 'Outlook-style quoting';
$html_reply_to = 'R&eacute;pondre &agrave;';
$html_use_signature = 'Utiliser la signature';
$html_signature = 'Signature';
$html_prefs_updated = 'Pr&eacute;f&eacute;rences mises &agrave; jour';

// Other pages

$html_view_header = 'Voir l\'ent&ecirc;te';
$html_remove_header = 'Masquer l\'ent&ecirc;te';
$html_inbox = 'Bo&icirc;te de r&eacute;ception';
$html_new_msg = 'Ecrire';
$html_reply = 'R&eacute;pondre';
$html_reply_short = 'Re';
$html_reply_all = 'R&eacute;pondre &agrave; tous';
$html_forward = 'Transf&eacute;rer';
$html_forward_short = 'Tr';
$html_delete = 'Supprimer';
$html_new = 'Nouveau';
$html_mark = 'Effacer';
$html_att = 'Pi&egrave;ce jointe';
$html_atts = 'Pi&egrave;ces jointes';
$html_att_unknown = '[inconnu]';
$html_attach = 'Attacher';
$html_attach_forget = 'Vous devez attacher votre fichier avant d\'envoyer votre message !'; 
$html_attach_delete = 'Supprimer les fichiers s&eacute;lectionn&eacute;s';
$html_sort_by = 'Trier par';
$html_from = 'De';
$html_subject = 'Sujet';
$html_date = 'Date';
$html_sent = 'Envoy� le';
$html_wrote = 'a �crit';
$html_size = 'Taille';
$html_totalsize = 'Taille Totale';
$html_kb = 'Ko';
$html_bytes = 'octets';
$html_filename = 'Fichier';
$html_to = 'A';
$html_cc = 'Copie';
$html_bcc = 'Copie cach&eacute;e';
$html_nosubject = 'Aucun sujet';
$html_send = 'Envoyer';
$html_cancel = 'Annuler';
$html_no_mail = 'Aucun message.';
$html_logout = 'D&eacute;connexion';
$html_msg = 'Message';
$html_msgs = 'Messages';
$html_configuration = 'Le serveur n\'est pas correctement configur&eacute;';
$html_priority = 'Priorit&eacute;';
$html_low = 'Basse';
$html_normal = 'Normale';
$html_high = 'Haute';
$html_select = 'S&eacute;lectionner';
$html_select_all = 'Tout s&eacute;lectionner';
$html_loading_image = 'Chargement de l\'image';
$html_send_confirmed = 'Votre message a bien &eacute;t&eacute; envoy&eacute;';
$html_no_sendaction = 'Aucune action sp&eacute;cifi&eacute;e. Essayer d\'activer JavaScript';
$html_error_occurred = 'Une erreur est survenue';
$html_prefs_file_error = 'Impossible d\'ouvrir le fichier de pr&eacute;f&eacute;rences';
$html_sig_file_error = 'Impossible d\'ouvrir le fichier de signature';

$original_msg = '-- Message Original --';
$to_empty = 'Le champ \'A\' ne doit pas �tre vide !';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = "Impossible d'ouvrir la connexion";
$html_smtp_error_unexpected = "R&eacute;ponse inattentue:";
?>