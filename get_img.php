<?
session_register ("user");
session_register ("passwd");
require ("conf.php");

$pop = imap_open("{".$servr."}INBOX", $user, $passwd);	
$img = imap_fetchbody($pop, $mail, $num);
imap_close($pop);
if ($transfer == "BASE64")
	$img = base64_decode($img);

header("Content-type: image/".$mime);
//header( "Content-Disposition: inline; filename=" . $filename );
echo $img;
?>