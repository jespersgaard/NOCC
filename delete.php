<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/delete.php,v 1.48 2004/06/19 12:00:55 goddess_skuld Exp $
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
$pop = new nocc_imap($ev);
if (NoccException::isException($ev)) {
    require ('./html/header.php');
    require ('./html/error.php');
    require ('./html/footer.php');
    return;
}

$num_messages = $pop->num_msg();
$url = "action.php";

// Work out folder and target_folder
$folder = $_SESSION['nocc_folder'];
$target_folder = "";
if (isset($_REQUEST['target_folder']))
    $target_folder = $_REQUEST['target_folder'];

if (isset($_REQUEST['only_one'])) {
    $mail = $_REQUEST['mail'];
    if (isset($_REQUEST['move_mode'])) {
        if ($target_folder != $folder) {
            $pop->mail_move($mail, $target_folder, $ev);
        }
    }
    if (isset($_REQUEST['copy_mode'])) {
        if ($target_folder != $folder) {
            $pop->mail_copy($mail, $target_folder, $ev);
        }
    }
    if (isset($_REQUEST['delete_mode'])) {
        $pop->delete($mail, $ev);
        if ($mail - 1) {
            $url = "action.php?action=aff_mail&mail=".--$mail."&verbose=0";
        }
        else {
            $url = "action.php";
        }
    }
} else {
    for ($i = 1; $i <= $num_messages; $i++) {

        if (isset($_REQUEST['msg-'.$i])) {
            if (isset($_REQUEST['move_mode'])) {
                if ($target_folder != $folder) {
                    $pop->mail_move($i, $target_folder, $ev);
                }
            }
            if (isset($_REQUEST['copy_mode'])) {
                if ($target_folder != $folder) {
                    $pop->mail_copy($i, $target_folder, $ev);
                }
            }
            if (isset($_REQUEST['delete_mode'])) {
                $pop->delete($i, $ev);
            }
            if (isset($_REQUEST['mark_read_mode']) && $_REQUEST['mark_mode'] == 'read') {
                if ($target_folder != $folder) {
                    $pop->mail_mark_read($i, $ev);
                }
            }
            if (isset($_REQUEST['mark_read_mode']) && $_REQUEST['mark_mode'] == 'unread') {
                if ($target_folder != $folder) {
                    $pop->mail_mark_unread($i, $ev);
                }
            }
        }
    }
}

$pop->close();

if (NoccException::isException($ev)) {
    require ('./html/header.php');
    require ('./html/error.php');
    require ('./html/footer.php');
    return;
}

// Redirect user to index
// TODO: redirect user to next message
require_once('./proxy.php');
//header('Location: ' . $conf->base_url . "action.php");
header('Location: ' . $conf->base_url . $url);

?>

