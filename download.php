<?
/*
 * $Header: /cvsroot/nocc/nocc/webmail/download.php,v 1.12 2001/01/30 01:17:14 nicocha Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * File for downloading the attachments
 */

session_register ("user", "passwd");
require ("conf.php");

$pop = imap_open("{".$servr."}INBOX", $user, stripslashes($passwd));
$file = imap_fetchbody($pop, $mail, $part);
imap_close($pop);
if ($transfer == "BASE64")
	$file = imap_base64($file);
// We use "Content-Type: unknown" to be sure the file is downloaded and not displayed
header("Content-Type: application/x-unknown-$mime");
header("Content-Disposition: filename=\"".urldecode($filename)."\"");
header("Content-Length: ".strlen($file));
echo $file;
?>