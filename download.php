<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/download.php,v 1.35 2002/05/30 14:07:20 rossigee Exp $
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
if (eregi('MSIE', $HTTP_USER_AGENT) || eregi('Internet Explorer', $HTTP_USER_AGENT))
    session_cache_limiter('public');

require_once './conf.php';
require_once './common.php';
require_once './class_local.php';

$mime = $_REQUEST['mime'];
$filename = $_REQUEST['filename'];
$mail = $_REQUEST['mail'];
$transfer = $_REQUEST['transfer'];
$part = $_REQUEST['part'];

header('Content-Type: application/x-unknown-' . $mime);
// IE 5.5 is weird, the line is not correct but it works
if (eregi('MSIE', $HTTP_USER_AGENT) && eregi('5.5', $HTTP_USER_AGENT))
    header('Content-Disposition: filename=' . urldecode($filename));
else
    header('Content-Disposition: attachment; filename=' . urldecode($filename));

$ev = "";
$pop = new nocc_imap($ev);
if (Exception::isException($ev)) {
    require ('./html/header.php');
    require ('./html/error.php');
    require ('./html/footer.php');
    return;
}

$file = $pop->fetchbody($mail, $part, $ev);
if (Exception::isException($ev)) {
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
