<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/get_img.php,v 1.26 2003/12/21 15:40:20 goddess_skuld Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 */

require_once './conf.php';
require_once './common.php';

$ev = "";
$pop = new nocc_imap($ev);
if (NoccException::isException($ev)) {
    require ('./html/header.php');
    require ('./html/error.php');
    require ('./html/footer.php');
    return;
}

$mail = $_REQUEST['mail'];
$num = $_REQUEST['num'];
$transfer = $_REQUEST['transfer'];
$mime = $_REQUEST['mime'];

$img = $pop->fetchbody($mail, $num, $ev);
if (NoccException::isException($ev)) {
    require ('./html/header.php');
    require ('./html/error.php');
    require ('./html/footer.php');
    return;
}

if ($transfer == 'BASE64')
    $img = nocc_imap::base64($img);
elseif ($transfer == 'QUOTED-PRINTABLE')
    $img = nocc_imap::qprint($img);
$pop->close();

header('Content-type: image/'.$mime);
echo $img;
?>
