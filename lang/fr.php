<?
/*	
	$Author: wolruf $
	$Revision: 1.19 $
	$Date: 2000/10/26 12:23:29 $

	NOCC: Copyright 2000 Nicolas Chalanset <nicocha@free.fr> , Olivier Cahagne <cahagn_o@epita.fr>
  
  You should have received a copy of the GNU Public
  License along with this package; if not, write to the
  Free Software Foundation, Inc., 59 Temple Place - Suite 330,
  Boston, MA 02111-1307, USA.
*/


/*
 Configuration file for the french language (the first made, we're french !!)
*/

// Configuration for the days and months
$days = Array(
	Mon => "Lundi",
	Tue => "Mardi",
	Wed => "Mercredi",
	Thu => "Jeudi",
	Fri => "Vendredi",
	Sat => "Samedi",
	Sun => "Dimanche");

$months = Array(
	Jan => "Janvier",
	Feb => "F&eacute;vrier",
	Mar => "Mars",
	Apr => "Avril",
	May => "Mai",
	Jun => "Juin",
	Jul => "Juillet",
	Aug => "Ao&ucirc;t",
	Sep => "Septembre",
	Oct => "Octobre",
	Nov => "Novembre",
	Dec => "D&eacute;cembre");

// Here is the configuration for the HTML

$err_user_empty = "Vous n'avez pas saisi de login";
$err_passwd_empty = "Vous n'avez pas saisi de mot de passe";


// html message

$alt_delete = "Effacer les messages selectionn&eacute;s";
$alt_delete_one = "Effacer le message";
$alt_new_msg = "Nouveaux messages";
$alt_reply = "R&eacute;pondre &agrave; l'auteur";
$alt_reply_all = "R&eacute;pondre à tous";
$alt_forward = "Transf&eacute;rer";
$alt_next = "Suivant";
$alt_prev = "Pr&eacute;c&eacute;dent";


// index.php

$html_welcome = "Bienvenue &agrave;";
$html_login = "Login";
$html_passwd = "Mot de passe";
$html_submit = "Valider";
$html_help = "Aide";
$html_server = "Serveur";
$html_wrong = "Le login ou le mot de passe ne sont pas valides";
$html_retry = "R&eacute;essayer";

// Other pages

$html_view_header = "Voir l'ent&ecirc;te";
$html_remove_header = "Masquer l'ent&ecirc;te";
$html_inbox = "Bo&icirc;te de r&eacute;ception";
$html_new_msg = "Ecrire";
$html_reply = "R&eacute;pondre";
$html_reply_short = "Re";
$html_reply_all = "R&eacute;pondre à tous";
$html_forward = "Transf&eacute;rer";
$html_forward_short = "Tr";
$html_delete = "Supprimer";
$html_new = "Nouveau";
$html_mark = "Effacer";
$html_att = "Pi&egrave;ce jointe";
$html_atts = "Pi&egrave;ces jointes";
$html_att_unknown = "[inconnu]";
$html_from = "De";
$html_subject = "Sujet";
$html_date = "Date";
$html_sent = "Envoy&eacute; le";
$html_size = "Taille";
$html_kb = "Ko";
$html_to = "&Agrave;";
$html_cc = "Copie";
$html_bcc = "Copie cach&eacute;e";
$html_nosubject = "Aucun sujet";
$html_send = "Envoyer";
$hmtl_cancel = "Annuler";
$html_no_mail = "Vous n'avez pas de nouveaux messages.";
$html_logout = "D&eacute;connexion";
$html_msg = "Message";
$html_msgs = "Messages";

$original_msg = "-- Message Original --";
$to_empty = "Le champ 'A' ne doit pas &ecirc;tre vide !";

$html_outside = "Vous voyez cette page en dehors de <b>".$name."</b>. Pour y retourner, fermez cette fen&ecirc;tre.";

// This message is added to every message, the user cannot delete it
$ad = "\n\n________________________________________________________________________\nNOCC, vos e-mails n'importe où : http://nocc.sourceforge.net";
?>
