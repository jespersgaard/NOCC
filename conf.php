<?
/*
	$Author$
	$Revision$
	$Date$

	NOCC: Copyright 2000 Nicolas Chalanset <nicocha@free.fr> , Olivier Cahagne <cahagn_o@epita.fr>
  
  You should have received a copy of the GNU Public
  License along with this package; if not, write to the
  Free Software Foundation, Inc., 59 Temple Place - Suite 330,
  Boston, MA 02111-1307, USA.
*/

// ################### This is the main configuration for NOCC ################### //

// IMAP or POP3 server name + protocol + port
// [server_name]/[PROTOCOL]:[port number] ex : mail.sourceforge.net/IMAP:143 or
// mail.sourceforge.net/POP3:110
// PROTOCOL can be POP3 or IMAP
$servr = "";

// domain name e.g "sourceforge.net". This field is used when sending message
$domain = "";

// smtp server name or ip (if empty mail are sent by sendmail)
$smtp_server = "mail.c-monweb.com";

// port number to connect to smtp (usually 25)
$smtp_port = "25";

// if browser has no preferred language, we use the default language
$default_lang = "fr";

// let user see the header of a message
$use_verbose = true;

// the user can logout or not (if nocc is used within your website put 'false' here else leave 'true'
$enable_logout = true;

// By default the messages are sorted by date ()
$default_sort = "1";

// By default the most recent is in top ("1" --> sorting top to bottom, "0" --> bottom to top)
$default_sortdir = "1";



// ################### color configuration ################### //

// Color on the pages background - default is "white"
$bgcolor = "#000000";

// Color of the login box border - default is "black"
$login_border = "#000000";

// Inside color of the login box
$login_box_bgcolor = "#cccccc";

// Color of the navigation button (inbox, write, answer, etc.) - default is "sky blue"
$html_menu_color = "#99ccff";

// The same as above when the user is in that part - default is "orange"
$html_menu_color_on = "#FFC061";

// Mail properties color (to, from, subject, attachments, etc.) - default is "sky blue"
$html_mail_properties = "#99ccff";

// Color of all the inside border - default is "grey"
$html_inside_color = "#f0f0f0";

// Color of the Inbox line and the garbage line and of the outside page - default is "dark blue"
$html_tr_color = "#002266";

// color for the highlight of the sorting in the mailbox - default is "yellow"
$html_sort_color = "#ffffcc";

// Color of the links
$link_color = "#0033cc";

// Color of the text
$text_color = "#000000";

// Color of the Inbox Text display (Delete, new, attachment ...) - default is "white"
$inbox_text_color = "#ffffff";

// Color of the Inbox display - default is "white"
$inbox_color = "#ffffff";

// Color of the Message display - default is "white"
$mail_color = "#ffffff";

// Color of the visited links
$vlink_color ="#0033cc";

$alink_color = "#0033cc";

$html_tb_msg_color = "#red";




/*
###################     End of Configuration     ####################
*********************************************************************
################### Do not modify below this line ###################
*/
$version = "v1.0";
$name = "NOCC";

session_register("user", "passwd", "server", "servtype", "port");
if ($servr == "" && $server != "" && $servtype != "" && $port != "")
{
		$servr = $server."/".strtoupper($servtype).":".$port;
		$domain = $server;
}
if (empty($sort))
	$sort = $default_sort;
if (empty($sortdir))
	$sortdir = $default_sortdir;
?>