<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/delete.php,v 1.54 2006/10/20 13:40:14 goddess_skuld Exp $
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
$user_prefs = $_SESSION['nocc_user_prefs'];

// Work out folder and target_folder
$folder = $_SESSION['nocc_folder'];
$target_folder = "";
if (isset($_REQUEST['target_folder']) && $_REQUEST['target_folder'] != $folder)
    $target_folder = $_REQUEST['target_folder'];

if (isset($_REQUEST['bottom_target_folder']) && $_REQUEST['bottom_target_folder'] != $folder)
    $target_folder = $_REQUEST['bottom_target_folder'];

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
        // If messages are opened in a new windows, we will reload the opener window
        // i.e. the one with messages list
        $_SESSION['message_deleted'] = "true";
	if ($pop->is_imap()
               && $user_prefs->trash_folder
               && $_SESSION['nocc_folder'] != $user_prefs->trash_folder_name ) {
            $pop->mail_move($mail, $user_prefs->trash_folder_name, $ev);
        } else {
            $pop->delete($mail, $ev);
        }
        if ($mail - 1) {
            $url = "action.php?action=aff_mail&mail=".--$mail."&verbose=0";
        }
        else {
            $url = "action.php";
        }
    }
} else {
    $msg_to_forward = '';
    for ($i = 1; $i <= $num_messages; $i++) {

        if (isset($_REQUEST['msg-'.$i])) {
            if (isset($_REQUEST['move_mode'])) {
                if ($target_folder != $folder) {
                    $pop->mail_move($i, $target_folder, $ev);
                }
            }
            if (isset($_REQUEST['bottom_move_mode'])) {
                if ($bottom_target_folder != $folder) {
                    $pop->mail_move($i, $target_folder, $ev);
                }
            }
            if (isset($_REQUEST['copy_mode'])) {
                if ($target_folder != $folder) {
                    $pop->mail_copy($i, $target_folder, $ev);
                }
            }
            if (isset($_REQUEST['bottom_copy_mode'])) {
                if ($bottom_target_folder != $folder) {
                    $pop->mail_copy($i, $target_folder, $ev);
                }
            }
            if (isset($_REQUEST['forward_mode']) || isset($_REQUEST['bottom_forward_mode'])) {
                $msg_to_forward .= '$'.$i;
            }
            if (isset($_REQUEST['delete_mode']) || isset($_REQUEST['bottom_delete_mode'])) {
                // If messages are opened in a new windows, we will reload the opener window
                // i.e. the one with messages list
                $_SESSION['message_deleted'] = "true";
                if ($pop->is_imap()
                        && $user_prefs->trash_folder
                        && $_SESSION['nocc_folder'] != $user_prefs->trash_folder_name ) {
                    $pop->mail_move($i, $user_prefs->trash_folder_name, $ev);
                } else {
                    $pop->delete($i, $ev);
                }
            }
            if (isset($_REQUEST['mark_read_mode']) && $_REQUEST['mark_mode'] == 'read') {
                $pop->mail_mark_read($i, $ev);
            }
            if (isset($_REQUEST['bottom_mark_read_mode']) && $_REQUEST['bottom_mark_mode'] == 'read') {
                $pop->mail_mark_read($i, $ev);
            }
            if (isset($_REQUEST['mark_read_mode']) && $_REQUEST['mark_mode'] == 'unread') {
                $pop->mail_mark_unread($i, $ev);
            }
            if (isset($_REQUEST['bottom_mark_read_mode']) && $_REQUEST['bottom_mark_mode'] == 'unread') {
                $pop->mail_mark_unread($i, $ev);
            }
        }
    }
    if ($msg_to_forward != '') {
      $msg_to_forward = substr($msg_to_forward, 1);
      $url = 'action.php?action=forward&mail='.$msg_to_forward;
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

