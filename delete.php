<?php 
/*
 * $Header: /cvsroot/nocc/nocc/webmail/delete.php,v 1.41 2002/04/24 15:17:51 rossigee Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 * Copyright 2002 Mike Rylander <mrylander@mail.com>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * this file just delete the selected message(s)
 */

require_once('./conf.php');
require_once('./common.php');
require_once('./class_local.php');

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

$num_messages = $pop->num_msg();

$mail = $_REQUEST['mail'];
if (isset($_REQUEST['only_one'])) {
    if (isset($_REQUEST['move_mode'])) {
        if ($target_folder != $folder) {
            $pop->mail_move($mail, $target_folder);
        }
    }
    if (isset($_REQUEST['copy_mode'])) {
        if ($target_folder != $folder) {
            $pop->mail_copy($mail, $target_folder);
        }
    }
    if (isset($_REQUEST['delete_mode'])) {
        $pop->delete($mail);
    }
} else {
    for ($i = 1; $i <= $num_messages; $i++) {

        if (isset($_REQUEST['msg-'.$i])) {
            if (isset($_REQUEST['move_mode'])) {
                if ($target_folder != $folder) {
                    $pop->mail_move($i, $target_folder);
                }
            }
            if (isset($_REQUEST['copy_mode'])) {
                if ($target_folder != $folder) {
                    $pop->mail_copy($i, $target_folder);
                }
            }
            if (isset($_REQUEST['delete_mode'])) {
                $pop->delete($i);
            }
        }
    }
}

$pop->close();

// Redirect user to index
// TODO: redirect user to next message
require_once('./proxy.php');
header('Location: ' . $conf->base_url . "action.php?folder=$folder");

?>
