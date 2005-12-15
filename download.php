<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/download.php,v 1.37 2003/12/21 15:40:20 goddess_skuld Exp $
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

require_once './conf.php';
require_once './common.php';
require_once './class_local.php';

$mime = $_REQUEST['mime'];
$filename = $_REQUEST['filename'];
$mail = $_REQUEST['mail'];
$transfer = $_REQUEST['transfer'];
$part = $_REQUEST['part'];
$filename = base64_decode($filename);
$filename = ereg_replace('[\\/:\*\?"<>\|;]', '_', str_replace('&#32;', ' ', $filename));
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

$ev = "";
$pop = new nocc_imap($ev);
if (NoccException::isException($ev)) {
    require ('./html/header.php');
    require ('./html/error.php');
    require ('./html/footer.php');
    return;
}

$file = $pop->fetchbody($mail, $part, $ev);
if (NoccException::isException($ev)) {
    require ('./html/header.php');
    require ('./html/error.php');
    require ('./html/footer.php');
    return;
}

if ($transfer == 'BASE64')
    $file = nocc_imap::base64($file);
elseif($transfer == 'QUOTED-PRINTABLE')
    $file = nocc_imap::qprint($file);

$pop->close();

header('Content-Length: ' . strlen($file));
echo ($file);
?>
