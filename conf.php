<?
// This is the main configuration for NOCC Desktop - Webmail

$servr = ""; // [server_name]/[protocol]:[port] ex : mail.sourceforge.net/IMAP:143 or 												mail.sourceforge.net/POP3:110
$provider = ""; // domain name e.g "sourceforge.net". This field is used when sending message
$default_lang = "fr"; // if browser has no preferred language, we use the default language
$use_verbose = true; // let user see the header of a message
$is_standalone = true; // do not change used to development


// color configuration

$html_menu_color = "#99ccff";
$html_menu_color_on = "#FFC061";
$bgcolor = "#cccccc";
$html_mail_tr_color = "#99ccff";
$html_tb_color = "#f0f0f0";
$html_tr_color = "#002266";
$html_sort_color = "#ffffcc"; // color for the highlight of the sorting in the mailbox

$link_color = "#0033cc";
$text_color = "#000000";
$vlink_color ="#0033cc";
$alink_color = "#0033cc";

$html_tb_msg_color = "#ffffff";

// Do not modify below this line 

session_register("server");
session_register("servtype");
session_register("port");
if ($servr == "" && $server != "" && $servtype != "" && $port != "")
		$servr = $server."/".strtoupper($servtype).":".$port;
?>