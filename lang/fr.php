<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/lang/fr.php,v 1.101 2008/03/06 17:04:07 goddess_skuld Exp $ 
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

$charset = 'UTF-8';

// Configuration for the days and months

// What language to use (Here, french FRANCE --> fr_FR)
// see '/usr/share/locale/' for more information
$lang_locale = 'fr_FR.UTF-8';

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
$alt_delete = 'Effacer les messages selectionnés';
$alt_delete_one = 'Effacer le message';
$alt_new_msg = 'Nouveaux messages';
$alt_reply = 'Répondre à l\'auteur';
$alt_reply_all = 'Répondre à tous';
$alt_forward = 'Transférer';
$alt_next = 'Suivant';
$alt_prev = 'Précédent';
$title_next_page = 'Page suivante';
$title_prev_page = 'Page précédente';
$title_next_msg = 'Message suivant';
$title_prev_msg = 'Message précédent';
$html_on = 'sur';
$html_theme = 'Thème';

// index.php
$html_lang = 'Langue';
$html_welcome = 'Bienvenue à';
$html_login = 'Identifiant';
$html_passwd = 'Mot de passe';
$html_submit = 'Valider';
$html_help = 'Aide';
$html_server = 'Serveur';
$html_wrong = 'L\'identifiant ou le mot de passe ne sont pas valides';
$html_retry = 'Réessayer';
$html_remember = "Conserver les paramètres";

// prefs.php
$html_msgperpage = 'Messages par page';
$html_preferences = 'Préférences';
$html_full_name = 'Nom complet';
$html_email_address = 'Adresse e-mail';
$html_ccself = 'Recevoir une copie';
$html_hide_addresses = 'Cacher les adresses e-mail';
$html_outlook_quoting = 'Citation à la Outlook';
$html_reply_to = 'Répondre à';
$html_use_signature = 'Utiliser la signature';
$html_signature = 'Signature';
$html_reply_leadin = 'Entête de réponse';
$html_prefs_updated = 'Préférences mises à jour';
$html_manage_folders_link = 'Gestion des dossiers IMAP';
$html_manage_filters_link = 'Gestion des filtres email';
$html_use_graphical_smilies = 'Utiliser les émoticons graphiques';
$html_sent_folder = 'Copier les éléments envoyés dans un dossier dédié';
$html_trash_folder = 'Déplacer les éléments effacés dans un dossier dédié';
$html_colored_quotes = 'Citations colorées';
$html_display_struct = 'Afficher le texte structuré';
$html_send_html_mail = 'Envoyer les emails au format HTML';

// folders.php
$html_folders = 'Dossiers';
$html_folders_create_failed = 'Le dossier n\'a pas pu être créé!';
$html_folders_sub_failed = 'Il n\' pas été possible de s\'inscrire au dossier!';
$html_folders_unsub_failed = 'Il n\' pas été possible de de désinscrire du dossier!';
$html_folders_rename_failed = 'Le dossier n\'a pas pu être renommé!';
$html_folders_updated = 'Dossiers mis à jour';
$html_folder_subscribe = 'S\'inscrire à';
$html_folder_rename = 'Renommer';
$html_folder_create = 'Créer un nouveau dossier';
$html_folder_remove = 'Se désincrire de';
$html_folder_delete = 'Supprimer';
$html_folder_to = 'vers';

// filters.php
$html_filter_remove = 'Supprimer';
$html_filter_body = 'Corps du message';
$html_filter_subject = 'Objet';
$html_filter_to = 'A';
$html_filter_cc = 'Cc';
$html_filter_from = 'De';
$html_filter_change_tip = 'Pour changer un filtre, reécrivez dessus.';
$html_reapply_filters = 'Réappliquer tous les filtres';
$html_filter_contains = 'contient';
$html_filter_name = 'Nom du filtre';
$html_filter_action = 'Action';
$html_filter_moveto = 'déplacer vers';

// Other pages
$html_select_one = '--Sélectionner--';
$html_and = 'Et';
$html_new_msg_in = 'Nouveaux messages dans';
$html_or = 'ou';
$html_move = 'Déplacer';
$html_copy = 'Copier';
$html_messages_to = 'le message sélectionné vers';
$html_gotopage = 'Aller à la page';
$html_gotofolder = 'Aller au dossier';
$html_other_folders = 'Liste des dossiers';
$html_page = 'Page';
$html_of = 'sur';
$html_view_header = 'Voir l\'entête';
$html_remove_header = 'Masquer l\'entête';
$html_inbox = 'Boîte de réception';
$html_new_msg = 'Ecrire';
$html_reply = 'Répondre';
$html_reply_short = 'Re';
$html_reply_all = 'Répondre à tous';
$html_forward = 'Transférer';
$html_forward_short = 'Tr';
$html_forward_info = 'Le message transféré sera envoyé en pièce jointe avec ce message.';
$html_delete = 'Supprimer';
$html_new = 'Nouveau';
$html_mark = 'Effacer';
$html_att = 'Pièce jointe';
$html_atts = 'Pièces jointes';
$html_att_unknown = '[inconnu]';
$html_attach = 'Attacher';
$html_attach_forget = 'Vous devez attacher votre fichier avant d\'envoyer votre message !'; 
$html_attach_delete = 'Supprimer les fichiers sélectionnés';
$html_attach_none = 'Vous devez sélectionner un fichier à attacher!';
$html_sort_by = 'Trier par';
$html_sort = 'Trier';
$html_from = 'De';
$html_subject = 'Sujet';
$html_date = 'Date';
$html_sent = 'Envoyé le';
$html_wrote = 'a écrit';
$html_size = 'Taille';
$html_totalsize = 'Taille Totale';
$html_kb = 'ko';
$html_mb = 'Mo';
$html_gb = 'Go';
$html_bytes = 'octets';
$html_filename = 'Fichier';
$html_to = 'A';
$html_cc = 'Copie';
$html_bcc = 'Copie cachée';
$html_nosubject = 'Aucun sujet';
$html_send = 'Envoyer';
$html_cancel = 'Annuler';
$html_no_mail = 'Aucun message.';
$html_logout = 'Déconnexion';
$html_msg = 'Message';
$html_msgs = 'Messages';
$html_configuration = 'Le serveur n\'est pas correctement configuré';
$html_priority = 'Priorité';
$html_low = 'Basse';
$html_normal = 'Normale';
$html_high = 'Haute';
$html_receipt = 'Accusé de réception';
$html_select = 'Sélectionner';
$html_select_all = 'Inverser la sélection';
$html_loading_image = 'Chargement de l\'image';
$html_send_confirmed = 'Votre message a bien été envoyé';
$html_no_sendaction = 'Aucune action spécifiée. Essayer d\'activer JavaScript';
$html_error_occurred = 'Une erreur est survenue';
$html_prefs_file_error = 'Impossible d\'ouvrir le fichier de préférences';
$html_wrap = 'Tronquer les messages sortant à:';
$html_wrap_none = 'aucun';
$html_usenet_separator = 'Séparateur Usenet ("-- \n") avant la signature';
$html_mark_as = 'Marquer comme';
$html_read = 'lu';
$html_unread = 'non lu';
$html_encoding = 'Encodage du texte';

// Contacts manager
$html_add = 'Ajouter';
$html_contacts = 'Contacts';
$html_modify = 'Modifier';
$html_back = 'Retour';
$html_contact_add = 'Ajouter un nouveau contact';
$html_contact_mod = 'Modifier un contact';
$html_contact_first = 'Prénom';
$html_contact_last = 'Nom';
$html_contact_nick = 'Pseudo';
$html_contact_mail = 'Email';
$html_contact_list = 'Liste de contacts de ';
$html_contact_del = 'de la liste de contacts';

$html_contact_err1 = 'Le nombre maximal de contact est ';
$html_contact_err2 = 'Vous ne pouvez pas ajouter un nouveau contact';
$html_contact_err3 = 'Vous n\'avez pas le droit d\'accéder à la liste des contacts';
$html_del_msg = 'Supprimer le(s) message(s) sélectionné(s) ?';
$html_down_mail = 'Télécharger';

$original_msg = '-- Message Original --';
$to_empty = 'Le champ \'A\' ne doit pas être vide !';

// Images warning
$html_images_warning = 'Pour votre sécurité, les images distantes sont désactivées.';
$html_images_display = 'Afficher les images';

// SMTP problems (class_smtp.php)
$html_smtp_error_no_conn = 'Impossible d\'ouvrir la connexion';
$html_smtp_error_unexpected = 'Réponse inattendue:';

// IMAP messages (class_local.php)
$lang_could_not_connect = 'Impossible de se connecter au serveur';
$lang_invalid_msg_num = 'Mauvais numéro de message';

$html_file_upload_attack = 'Possibilité d\'attaque depuis le fichier uploadé';
$html_invalid_email_address = 'Adresse e-mail invalide';
$html_invalid_msg_per_page = 'Nombre de messages par page invalide';
$html_invalid_wrap_msg = 'Valeur de tronquature invalide';
$html_seperate_msg_win = 'Messages dans des fenêtres séparées';

// Exceptions
$html_err_file_contacts = 'Impossible d\'ouvrir le fichier des contacts';
$html_session_file_error = 'Impossible d\'ouvrir le fichier des sessions';
$html_login_not_allowed = 'Cet identifiant n\'est pas autorisé à se connecter.';
?>
