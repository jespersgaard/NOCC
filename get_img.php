<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/get_img.php,v 1.21 2002/04/18 10:37:12 rossigee Exp $
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
$pop = new nocc_imap($servr, $folder, $login, safestrip($passwd), $ev);
if($ev) {
    echo "<p class=\"error\">".$ev->getMessage()."</p>";
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
