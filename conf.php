<?
// This is the main configuration for NOCC

$servr = ""; // [server_name]/[PROTOCOL]:[port number] ex : mail.sourceforge.net/IMAP:143 or
			 // mail.sourceforge.net/POP3:110
			 // PROTOCOL can be POP3 or IMAP
$provider = ""; // domain name e.g "sourceforge.net". This field is used when sending message
$smtp_server = ""; // smtp server name or ip
$smtp_port = "25"; // port number to connect to smtp (usually 25)
$default_lang = "fr"; // if browser has no preferred language, we use the default language
$use_verbose = true; // let user see the header of a message
$enable_logout = true; // the user can logout or not (if nocc is used within your website put 'false' here 
else leave 'true'
$default_sort = "1"; // By default the messages are sorted by date ()
$default_sortdir = "1"; // By default the most recent is in top ("1" --> sorting top to bottom, "0" --> 
bottom to top)

// color configuration

$bgcolor = "#ffffff"; // Color on the pages background - default is "white"
$login_border = "#000000"; // Color of the login box border - default is "black"
$login_box_bgcolor = "#cccccc"; // Inside color of the login box
$html_menu_color = "#99ccff"; // Color of the navigation button (inbox, write, answer, etc.) - default is 
"sky blue"
$html_menu_color_on = "#FFC061"; // The same as above when the user is in that part - default is "orange"
$html_mail_properties = "#99ccff"; // Mail properties color (to, from, subject, attachments, etc.) - 
default is "sky blue"
$html_inside_color = "#f0f0f0"; // Color of the inside of the root table - default is "grey"
$html_tr_color = "#002266"; // Color of the Inbox line and the garbage line and of the outside page - 
default is "dark blue"
$html_sort_color = "#ffffcc"; // color for the highlight of the sorting in the mailbox - default is 
"yellow"

$link_color = "#0033cc"; // Color of the links
$text_color = "#000000"; // Color of the text
$vlink_color ="#0033cc"; // Color of the visited links
$alink_color = "#0033cc";

$html_tb_msg_color = "#ffffff";



// End of Configuration
// ******************************************************************************************
// Do not modify below this line 

$version = "v1.0";
$name = "NOCC";

session_register("user", "passwd", "server", "servtype", "port");
if ($servr == "" && $server != "" && $servtype != "" && $port != "")
{
		$servr = $server."/".strtoupper($servtype).":".$port;
		$provider = $server;
}
if (empty($sort))
	$sort = $default_sort;
if (empty($sortdir))
	$sortdir = $default_sortdir;
?>