<?php 
/*
 * $Header: /cvsroot/nocc/nocc/webmail/delete.php,v 1.38 2002/04/19 14:39:30 rossigee Exp $
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
$user = $_SESSION['user'];
$passwd = $_SESSION['passwd'];

$pop = new nocc_imap($servr, $folder, $login, $passwd, $ev);
if($ev) {
    echo "<p class=\"error\">".$ev->getMessage()."</p>";
    return;
}

$num_messages = $pop->num_msg();

if (isset($only_one) && ($only_one == 1)) {
    if ($move_mode) {
        if ($target_folder != $folder) {
            $pop->mail_move($mail, $target_folder);
        }
    }
    if ($copy_mode) {
        if ($target_folder != $folder) {
            $pop->mail_copy($mail, $target_folder);
        }
    }
    if ($delete_mode || $delete_mode_x) {
        $pop->delete($mail);
    }
} else {
    for ($i = 1; $i <= $num_messages; $i++) {

        $do_this_one = $HTTP_POST_VARS['msg-' . $i];
        if ($do_this_one == 'Y') {
            if ($move_mode) {
                if ($target_folder != $folder) {
                    $pop->mail_move($i, $target_folder);
                }
            }
            if ($copy_mode) {
                if ($target_folder != $folder) {
                    $pop->mail_copy($i, $target_folder);
                }
            }
            if ($delete_mode || $delete_mode_x) {
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

// For debuging
//reset($HTTP_POST_VARS);
//while (list($key, $value) = each($HTTP_POST_VARS)) {
    //echo "$key == $value\n";
//}
//echo "</pre>\n";

?>
