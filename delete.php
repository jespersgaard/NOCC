<?php 
/*
 * $Header: /cvsroot/nocc/nocc/webmail/delete.php,v 1.33 2002/04/17 21:22:56 mrylander Exp $
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

session_register ('user', 'passwd');
require_once './conf.php';
require_once './functions.php';
require_once './class_local.php';

$ev = "";
$pop = new nocc_imap($servr, $folder, $login, safestrip($passwd), &$ev);
if($ev) {
    echo "<p class=\"error\">".$ev->getMessage()."</p>";
    return;
}

$num_messages = $pop->num_msg();
$move_list = array();
$copy_list = array();

if (isset($only_one) && ($only_one == 1)) {
    if ($move_mode) {
        if ($move_folder != $folder) {
            $pop->mail_move($mail, $move_folder);
        }
    }
    if ($copy_mode) {
        if ($copy_folder != $folder) {
            $pop->mail_copy($mail, $copy_folder);
        }
    }
    if ($delete_mode || $delete_mode_x) {
        $pop->delete($mail);
    }
} else {
    for ($i = 1; $i <= $num_messages; $i++) {

        $do_this_one = $HTTP_POST_VARS['msg-' . $i];
        if ($do_this_one == 'Y') {
            //echo "doing message # $i\n";
            if ($move_mode) {
                //echo "  move mode set\n";
                if ($move_folder != $folder) {
                    //echo "    moving from $folder to $move_folder\n";
                    if ($pop->mail_move($i, $move_folder)) {
                        //echo "      move succeeded\n";
                    } else {
                        //echo "      move FAILED\n";
                    }
                }
            }
            if ($copy_mode) {
                if ($copy_folder != $folder) {
                    //echo "    copying from $folder to $copy_folder\n";
                    if ($pop->mail_copy($i, $copy_folder)) {
                        //echo "      copy succeeded\n";
                    } else {
                        //echo "      copy FAILED\n";
                    }
                }
            }
            if ($delete_mode || $delete_mode_x) {
                if ($pop->delete($i)) {
                    //echo "      delete succeeded\n";
                } else {
                    //echo "      delete FAILED\n";
                }
            }
        }
    }
}

$pop->close();

// Redirect user to index
// TODO: redirect user to next message
require_once './proxy.php';
header('Location: ' . $conf->base_url . "action.php?sort=$sort&sortdir=$sortdir&lang=$lang&folder=$folder&$php_session=" . $$php_session);

// For debuging
//reset($HTTP_POST_VARS);
//while (list($key, $value) = each($HTTP_POST_VARS)) {
    //echo "$key == $value\n";
//}
//echo "</pre>\n";

?>
