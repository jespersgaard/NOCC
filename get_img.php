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

session_register ("user");
session_register ("passwd");
require ("conf.php");

$pop = imap_open("{".$servr."}INBOX", $user, $passwd);
$img = imap_fetchbody($pop, $mail, $num);
imap_close($pop);
if ($transfer == "BASE64")
	$img = base64_decode($img);
elseif ($transfer == "QUOTED-PRINTABLE")
	$img = imap_qprint($img);

header("Content-type: image/".$mime);
echo $img;
?>