<?
session_register ("user");
session_register ("passwd");
require ("conf.php");

$pop = imap_open("{".$servr."}INBOX", $user, $passwd);	
$file = imap_fetchbody($pop, $mail, $part);
imap_close($pop);
if ($transfer == "BASE64")
	$file = base64_decode($file);
header("Content-Type: unknown");
header("Content-Disposition: attachment; filename=".$filename);
echo $file;
?>