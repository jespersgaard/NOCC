<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/get_img.php,v 1.22 2002/04/18 21:38:41 rossigee Exp $
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
$servr = $_SESSION['servr'];
$folder = $_SESSION['folder'];
$login = $_SESSION['login'];
$passwd = $_SESSION['passwd'];
$pop = new nocc_imap($servr, $folder, $login, $passwd, 0, $ev);
if (Exception::isException($ev)) {
    require ('./html/header.php');
    require ('./html/error.php');
    require ('./html/footer.php');
    return;
}

$img = $pop->fetchbody($mail, $num);
if ($transfer == 'BASE64')
    $img = base64_decode($img);
elseif ($transfer == 'QUOTED-PRINTABLE')
    $img = nocc_imap::qprint($img);
$pop->close();

header('Content-type: image/'.$mime);
echo $img;
?>
