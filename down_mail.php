<?php
/**
 * File for downloading the mail as attachment
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * This file is part of NOCC. NOCC is free software under the terms of the
 * GNU General Public License. You should have received a copy of the license
 * along with NOCC.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package    NOCC
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @version    SVN: $Id$
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

$headerinfo = $pop->headerinfo($mail, $ev);
$mailheaderinfo = new NOCC_HeaderInfo($headerinfo);
$subject = $mailheaderinfo->getSubject();

$part = '';
$file = $pop->fetchbody($mail, $part, $ev);
$pop->close();

$filename = ($subject) ? preg_replace('{[\[\]\\/:\*\?"<>\|;]}', '_', str_replace('&nbsp;', ' ', $subject)) . ".eml" : "no_subject.eml";
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

header('Content-Length: ' . strlen($file));
echo ($file);
?>
