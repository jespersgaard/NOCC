<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/fr.php,v 1.68 2004/06/14 16:28:54 goddess_skuld Exp $ 
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

$html_msgperpage = 'Messages par page';
$html_preferences = 'Pr&eacute;f&eacute;rences';
$html_full_name = 'Nom complet';
$html_email_address = 'Adresse e-mail';
$html_ccself = 'Recevoir une copie';
$html_hide_addresses = 'Cacher mon adresse e-mail';
$html_outlook_quoting = 'Citation &agrave; la Outlook';
$html_reply_to = 'R&eacute;pondre &agrave;';
$html_use_signature = 'Utiliser la signature';
$html_signature = 'Signature';
$html_reply_leadin = 'Reply Leadin';  //to translate
$html_prefs_updated = 'Pr&eacute;f&eacute;rences mises &agrave; jour';
$html_manage_folders_link = 'Gestion des dossiers IMAP';
$html_manage_filters_link = 'Gestion des filtres email';
$html_use_graphical_smilies = 'Utiliser les emoticons graphiques';

// folders.php
$html_folders_create_failed = 'Le dossier n\'a pas pu &ecirc;tre cr&eacute;&eacute;!';
$html_folders_sub_failed = 'Il n\' pas &eacute;t&eacute; possible de s\'inscrire au dossier!';
$html_folders_unsub_failed = 'Il n\' pas &eacute;t&eacute; possible de de d&eacute;inscrire du dossier!';
$html_folders_rename_failed = 'Le dossier n\'a pas pu &ecirc;tre renomm&eacute;!';
$html_folders_updated = 'Dossiers mis &agrave; jour';
$html_folder_subscribe = 'S\'inscrire &agrave;';
$html_folder_rename = 'Renommer';
$html_folder_create = 'Cr&eacute;er un nouveau dossier';
$html_folder_remove = 'Se d&eacute;sincrire de';
$html_folder_delete = 'Supprimer';

// filters.php
$html_filter_remove = 'Supprimer';
$html_filter_body = 'Corps du message';
$html_filter_subject = 'Objet';
$html_filter_to = 'A';
$html_filter_cc = 'Cc';
$html_filter_from = 'De';
$html_filter_change_tip = 'Pour changer un filtre, re&eacute;crivez dessus.';
$html_reapply_filters = 'R&eacute;appliquer tous les filtres';
$html_filter_contains = 'contient';
$html_filter_name = 'Nom du filtre';
$html_filter_action = 'Action';
$html_filter_moveto = 'd&eacute;placer vers';

// Other pages
$html_select_one = '--S&eacute;lectionner--';
$html_and = 'Et';
$html_new_msg_in = 'Nouveaux messages dans';
$html_or = 'ou';
$html_move = 'D&eacute;placer';
$html_copy = 'Copier';
$html_messages_to = 'le message s&eacute;lectionn&eacute; vers';
$html_gotopage = 'Aller &agrave; la page';
$html_gotofolder = 'Aller au dossier';
$html_other_folders = 'Liste des dossiers';
$html_page = 'Page';
$html_of = 'sur';
$html_to = 'vers';
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
$html_sent = 'Envoyé le';
$html_wrote = 'a écrit';
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
$html_receipt = 'Accus&eacute; de r&eacute;ception';
$html_select = 'S&eacute;lectionner';
$html_select_all = 'Tout s&eacute;lectionner';
$html_loading_image = 'Chargement de l\'image';
$html_send_confirmed = 'Votre message a bien &eacute;t&eacute; envoy&eacute;';
$html_no_sendaction = 'Aucune action sp&eacute;cifi&eacute;e. Essayer d\'activer JavaScript';
$html_error_occurred = 'Une erreur est survenue';
$html_prefs_file_error = 'Impossible d\'ouvrir le fichier de pr&eacute;f&eacute;rences';
$html_wrap = 'Tronquer les messages sortant  &agrave;:';
$html_usenet_separator = 'S&eacute;parateur Usenet ("-- \n") avant la signature';
// Contacts manager
$html_add = 'Ajouter';
$html_contacts = 'Contacts';
$html_modify = 'Modifier';
$html_back = 'Retour';
$html_contact_add = 'Ajouter un nouveau contact';
$html_contact_mod = 'Modifier un contact';
$html_contact_first = 'Pr&eacute;nom';
$html_contact_last = 'Nom';
$html_contact_nick = 'Pseudo';
$html_contact_mail = 'Email';
$html_contact_list = 'Liste de contacts de ';
$html_contact_del = 'de la liste de contacts';

$html_contact_err1 = 'Le nombre maximal de contact est ';
$html_contact_err2 = 'Vous ne pouvez pas ajouter un nouveau contact';
$html_del_msg = 'Supprimer le(s) message(s) s&eacute;lectionn&eacute;(s) ?';
$html_down_mail = 'T&eacute;l&eacute;charger';

$original_msg = '-- Message Original --';
$to_empty = 'Le champ \'A\' ne doit pas être vide !';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'Impossible d\'ouvrir la connexion';
$html_smtp_error_unexpected = 'R&eacute;ponse inattendue:';

// IMAP messages (class_local.php)
$lang_could_not_connect = 'Impossible de se connecter au serveur';

$html_file_upload_attack = 'Possibilit&eacute; d\'attaque depuis le fichier upload&eacute;';
$html_invalid_email_address = 'Adresse e-mail invalide';
$html_seperate_msg_win = 'Messages dans des fen&ecirc;tres s&eacute;par&eacute;es';
?>
