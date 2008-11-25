<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/down_mail.php,v 1.13 2008/10/13 19:54:25 gerundt Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * File for downloading the attachments
 */

if(!isset($HTTP_USER_AGENT))
    $HTTP_USER_AGENT = $_SERVER['HTTP_USER_AGENT'];

require_once './common.php';
require_once './classes/class_local.php';

$mail = $_REQUEST['mail'];

$ev = '';
$pop = new nocc_imap($ev);
if (NoccException::isException($ev)) {
    require ('./html/header.php');
    require ('./html/error.php');
    require ('./html/footer.php');
    return;
}

$msg_headerinfo = $pop->headerinfo($mail, $ev);
$header = $pop->fetchheader($mail, $ev);
if (isset($msg_headerinfo->subject)) {
    $subject_array = $pop->mime_header_decode($msg_headerinfo->subject);
    for ($subject = "", $j = 0; $j < count($subject_array); $j++)
            $subject .= $subject_array[$j]->text;
}
else {
    $subject="";
}

$part = 1;
$file = $header;
$file .= "\r\n\r\n";
$file .= $pop->qprint($pop->fetchbody($mail, $part, $ev));
$file .= "\r\n\r\n";

$filename = ($subject) ? ereg_replace('[\\/:\*\?"<>\|;]', '_', str_replace('&nbsp;', ' ', $subject)) . ".eml" : "no_subject.eml";
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
    $filename=rawurlencode($filename);
    header ("Pragma: public");
    header ("Cache-Control: no-store, max-age=0, no-cache, must-revalidate"); // HTTP/1.1
    header ("Cache-Control: post-check=0, pre-check=0", false);
    header ("Cache-Control: private");

    //set the inline header for IE, we'll add the attachment header later if we need it
    header ("Content-Disposition: inline; filename=$filename");
}

header ("Content-Type: application/octet-stream; name=\"$filename\"");
header ("Content-Disposition: attachment; filename=\"$filename\"");

if ($isIE && !$isIE6) {
    header ("Content-Type: application/download; name=\"$filename\"");
} else {
    header ("Content-Type: application/octet-stream; name=\"$filename\"");
}

if (NoccException::isException($ev)) {
    require ('./html/header.php');
    require ('./html/error.php');
    require ('./html/footer.php');
    return;
}

$pop->close();

header('Content-Length: ' . strlen($file));
echo ($file);
?>
