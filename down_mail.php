<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/down_mail.php,v 1.3 2005/11/04 15:57:45 goddess_skuld Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://wwW.fsf.org/copyleft/gpl.html.
 */

if (eregi('MSIE', $_SERVER['HTTP_USER_AGENT']) || eregi('Internet Explorer', $_SERVER['HTTP_USER_AGENT']))
	session_cache_limiter('public');
session_name("NOCCSESSID");
session_start();
require_once ('./conf.php');
require_once ('./functions.php');
require_once ('./crypt.php');
$passwd = safestrip($_SESSION['nocc_passwd']);
$passwd = decpass($passwd, $_COOKIE['NoccKey']);
$passwd = safestrip($passwd);

header('Content-Type: text/plain');


$pop = imap_open('{'.$_SESSION['nocc_servr'].'}'.$_SESSION['nocc_folder'], $_SESSION['nocc_user'], $passwd);
$ref_contenu_message = imap_headerinfo($pop, $_GET['mail']);
$header = imap_fetchheader($pop, $_GET['mail']);
if (isset($ref_contenu_message->subject)) {
    $subject_array = imap_mime_header_decode($ref_contenu_message->subject);
    for ($subject = "", $j = 0; $j < count($subject_array); $j++)
	    $subject .= $subject_array[$j]->text;
}
else {
    $subject="";
}

$url = ($subject) ? ereg_replace (" ", "_", $subject) . ".eml" : "no_subject.eml";

$file = $header;
$file .= "\r\n\r\n";
$file .= imap_qprint(imap_fetchbody($pop, $_GET['mail'], 1));
$file .= "\r\n\r\n";

imap_close($pop);


// IE 5.5 is weird, the line is not correct but it works
if (eregi('MSIE', $_SERVER['HTTP_USER_AGENT']) && eregi('5.5', $_SERVER['HTTP_USER_AGENT']))
	header('Content-Disposition: filename=' . $url);
else
	header('Content-Disposition: attachment; filename=' . $url);


header('Content-Length: ' . strlen($file));

echo $file;
?>
