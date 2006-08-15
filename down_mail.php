<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/down_mail.php,v 1.5 2005/12/15 20:10:47 goddess_skuld Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://wwW.fsf.org/copyleft/gpl.html.
 */

session_name("NOCCSESSID");
session_start();
require_once ('./conf.php');
require_once ('./functions.php');
require_once ('./crypt.php');
$passwd = safestrip($_SESSION['nocc_passwd']);
$passwd = decpass($passwd, $conf->master_key);
$passwd = safestrip($passwd);

//header('Content-Type: text/plain');


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

$isIE = $isIE6 = 0;

// Set correct http headers.
// Thanks to Squirrelmail folks :-)
if (strstr($HTTP_USER_AGENT, 'compatible; MSIE ') !== false &&
  strstr($HTTP_USER_AGENT, 'Opera') === false) {
    $isIE = 1;
}

if (strstr($HTTP_USER_AGENT, 'compatible; MSIE 6') !== false &&
  strstr($HTTP_USER_AGENT, 'Opera') === false) {
    $isIE6 = 1;
}

if ($isIE) {
    $url=rawurlencode($url);
    header ("Pragma: public");
    header ("Cache-Control: no-store, max-age=0, no-cache, must-revalidate"); // HTTP/1.1
    header ("Cache-Control: post-check=0, pre-check=0", false);
    header ("Cache-Control: private");

    //set the inline header for IE, we'll add the attachment header later if we need it
    header ("Content-Disposition: inline; filename=$url");
}

header ("Content-Disposition: attachment; filename=\"$url\"");

if ($isIE && !$isIE6) {
    header ("Content-Type: text/plain; name=\"$filename\"");
} else {
    header ("Content-Type: text/plain; name=\"$filename\"");
}

header('Content-Length: ' . strlen($file));

echo $file;
?>
