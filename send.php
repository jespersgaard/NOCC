<?
/*
 * $Header$
 *
 * Copyright 2000 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2000 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 */

require ("conf.php");
require ("class_send.php");
require ("class_smtp.php");
require ("functions.php");
require ("check_lang.php");

$ip = getenv("REMOTE_ADDR");

$mail = new mime_mail();
$mail->smtp_server = $smtp_server;
$mail->smtp_port = $smtp_port;
$mail->from = $from;
$mail->headers = "X-Originating-Ip: [".$ip."]\nX-Mailer: ".$nocc_name." v".$nocc_version;
$mail->to = cut_address($to);
$mail->cc = cut_address($cc);
$mail->bcc = cut_address($bcc);
if ($subject != "")
	$mail->subject = stripcslashes($subject);
if ($send_body != "")
	$mail->body = stripcslashes($send_body)."\n\n".$ad;
else
	$mail->body = $ad;

if (file_exists($mail_att))
{
	$file = fread(fopen($mail_att, "r"), filesize($mail_att));
	$mail->add_attachment($file, get_filename($att_name), $mail_att_type, "base64");
}
if ($mail->send() !=0)
	$error = true; // an error occured while sending the message
Header ("Location: action.php?sort=$sort&sortdir=$sortdir&lang=$lang");

function get_filename($filename)
{
	$tab = explode("\\", $filename);
	return (array_pop($tab));
}
?>