<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/send.php,v 1.40 2001/04/17 20:53:51 nicocha Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 */

require ("conf.php");
require ("check_lang.php");
$php_session = ini_get("session.name");
$upload_tmp_dir = ini_get("upload_tmp_dir");
$tmpdir = (!empty($upload_tmp_dir) ? $upload_tmp_dir : $tmpdir);

if (empty($tmpdir))
	header("Location: problem.php?lang=$lang&$php_session=".$$php_session);

function go_back_index($attach_array, $tmpdir, $php_session, $sort, $sortdir, $lang)
{
	if (is_array($attach_array))
		while ($tmp = array_shift($attach_array))
			unlink($tmpdir."/".$tmp->tmp_file);
	session_unregister("num_attach");
	session_unregister("attach_array");
	header("Location: action.php?sort=$sort&sortdir=$sortdir&lang=$lang&$php_session=".$$php_session);
}

if ($HTTP_SERVER_VARS["REQUEST_METHOD"] != "POST")
	go_back_index($attach_array, $tmpdir, $php_session, $sort, $sortdir, $lang);
else
{
	require ("class_send.php");
	require ("class_smtp.php");
	require ("functions.php");

	switch ($sendaction)
	{
		case "add":
			// Counting the attachments number in the array
			if (!is_array($attach_tab))
				$num_attach = 1;
			else
				$num_attach++;
			$tmp_name = basename($mail_att.".att");
			// Adding the new file to the array
			copy($mail_att, $tmpdir."/".$tmp_name);
			$attach_array[$num_attach]->file_name = $mail_att_name;
			$attach_array[$num_attach]->tmp_file = $tmp_name;
			$attach_array[$num_attach]->file_size = $mail_att_size;
			$attach_array[$num_attach]->file_mime = $mail_att_type;
			// Registering the attachment array into the session
			session_register("num_attach", "attach_array");
			// Displaying the sending form with the new attachments array
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
				// If the temporary file exists, attach it
				if (file_exists($tmpdir."/".$attach_array[$i]->tmp_file))
				{
					$fp = fopen($tmpdir."/".$attach_array[$i]->tmp_file, "rb");
					$file = fread($fp, $attach_array[$i]->file_size);
					fclose($fp);
					// add it to the message, by default it is encoded in base64
					$mail->add_attachment($file, imap_qprint($attach_array[$i]->file_name), $attach_array[$i]->file_mime, "base64", "");
					// then we delete the temporary file
					unlink($tmpdir."/".$attach_array[$i]->tmp_file);
				}
			}
			// We need to unregister the attachments array and num_attach
			session_unregister("num_attach");
			session_unregister("attach_array");
			if ($mail->send() != 0)
				$error = true; // an error occured while sending the message
			header ("Location: action.php?sort=$sort&sortdir=$sortdir&lang=$lang&$php_session=".$$php_session);
			break;
		case "delete":
			// Rebuilding the attachments array with only the files the user wants to keep
			$tmp_array = array();
			for ($i = $j = 1; $i <= $num_attach; $i++)
			{
				$thefile = "file".$i;
				if (empty($$thefile))
				{
					$tmp_array[$j]->file_name = $attach_array[$i]->file_name;
					$tmp_array[$j]->tmp_file = $attach_array[$i]->tmp_file;
					$tmp_array[$j]->file_size = $attach_array[$i]->file_size;
					$tmp_array[$j]->file_mime = $attach_array[$i]->file_mime;
					$j++;
				}
				else
					@unlink($tmpdir."/".$attach_array[$i]->tmp_file);
			}
			$num_attach = ($j > 1 ? $j - 1 : 0);
			// Removing the attachments array from the current session
			session_unregister("num_attach");
			session_unregister("attach_array");
			$attach_array = $tmp_array;
			// Registering the attachment array into the session
			session_register("num_attach", "attach_array");
			// Displaying the sending form with the new attachment array
			header("Content-type: text/html; Charset=$charset");
			require ("html/header.php");
			require ("html/menu_inbox.php");
			require ("html/send.php");
			require ("html/menu_inbox.php");
			break;
		default:
			go_back_index($attach_array, $php_session, $sort, $sortdir, $lang);
			break;
	}
	require ("html/footer.php");
}
?>