<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/send.php,v 1.37 2001/04/11 08:39:17 nicocha Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 */

if ($HTTP_SERVER_VARS["REQUEST_METHOD"] != "POST")
	header("Location: index.php");

require ("conf.php");
require ("class_send.php");
require ("class_smtp.php");
require ("functions.php");
require ("check_lang.php");

function get_filename($filename)
{
	$tab = explode("\\", $filename);
	return (array_pop($tab));
}

$php_session = ini_get("session.name");
switch ($sendaction)
{
	case "add":
		// Getting back the attachments array
		$attach_array = array();
		$i = 1;
		for ($i = 1; $i <= $num_attach; $i++)
		{
			$file_name = "send_att".$i;
			$file_tmp = "send_att_tmp".$i;
			$file_size = "send_att_size".$i;
			$file_mime = "send_att_mime".$i;
			$attach_array[$i]->file_name = imap_qprint($$file_name);
			$attach_array[$i]->tmp_file = $$file_tmp;
			$attach_array[$i]->file_size = $$file_size;
			$attach_array[$i]->file_mime = $$file_mime;
		}
		$num_attach = $i;
		// Adding the new file to the array
		copy ($mail_att, $mail_att.".att");
		$attach_array[$i]->file_name = $mail_att_name;
		$attach_array[$i]->tmp_file = $mail_att.".att";
		$attach_array[$i]->file_size = $mail_att_size;
		$attach_array[$i]->file_mime = $mail_att_type;
		// Displaying the sending form with the new attachment array
		header("Content-type: text/html; Charset=$charset");
		require ("html/header.php");
		require ("html/menu_inbox.php");
		require ("html/send.php");
		require ("html/menu_inbox.php");
		break;
	case "send":
		$ip = (getenv("HTTP_X_FORWARDED_FOR") ? getenv("HTTP_X_FORWARDED_FOR") : getenv("REMOTE_ADDR"));
		$mail = new mime_mail();
		$mail->smtp_server = $smtp_server;
		$mail->smtp_port = $smtp_port;
		$mail->charset = $charset;
		$mail->from = cut_address($mail_from, $charset);
		$mail->from = $mail->from[0];
		$mail->headers = "X-Originating-Ip: [".$ip."]\r\nX-Mailer: ".$nocc_name." v".$nocc_version;
		$mail->to = cut_address($mail_to, $charset);
		$mail->cc = cut_address($mail_cc, $charset);
		$mail->bcc = cut_address($mail_bcc, $charset);
		$mail->charset = $charset;
		if ($mail_subject != "")
			$mail->subject = stripcslashes($mail_subject);
		if ($mail_body != "")
			$mail->body = stripcslashes($mail_body)."\r\n\r\n".$ad;
		else
			$mail->body = $ad;

		// Getting the attachments
		for ($i = 1; $i <= $num_attach; $i++)
		{
			$file_name = "send_att".$i;
			$file_tmp = "send_att_tmp".$i;
			$file_size = "send_att_size".$i;
			$file_mime = "send_att_mime".$i;
			// If the temporary file exists, attach it
			if (file_exists($$file_tmp))
			{
				$fp = fopen($$file_tmp, "rb");
				$file = fread($fp, $$file_size);
				fclose($fp);
				// add it to the message, by default it is encoded in base64
				$mail->add_attachment($file, imap_qprint($$file_name), $$file_mime, "base64", "");
				// then we delete the temporary file
				unlink($$file_tmp);
			}
		}
		if ($mail->send() != 0)
			$error = true; // an error occured while sending the message
		header ("Location: action.php?sort=$sort&sortdir=$sortdir&lang=$lang&$php_session=".$$php_session);
		break;
	case "delete":
		// Rebuilding the attachments array with only the files the user wants to keep
		$attach_array = array();
		$i = 1;
		$j = 0;
		for ($i = 1; $i <= $num_attach; $i++)
		{
			$thefile = "file".$i;
			$file_tmp = "send_att_tmp".$i;
			if (empty ($$thefile))
			{
				$j++;
				$file_name = "send_att".$i;
				$file_size = "send_att_size".$i;
				$file_mime = "send_att_mime".$i;
				$attach_array[$j]->file_name = $$file_name;
				$attach_array[$j]->tmp_file = $$file_tmp;
				$attach_array[$j]->file_size = $$file_size;
				$attach_array[$j]->file_mime = $$file_mime;
			}
			else
				@unlink ($$file_tmp);
		}
		$num_attach = $j;
		// Displaying the sending form with the new attachment array
		header("Content-type: text/html; Charset=$charset");
		require ("html/header.php");
		require ("html/menu_inbox.php");
		require ("html/send.php");
		require ("html/menu_inbox.php");
		break;
	default;
		header("Location: action.php?sort=$sort&sortdir=$sortdir&lang=$lang&$php_session=".$$php_session);
		break;
}
require ("html/footer.php");
?>
