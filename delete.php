<?php 
/*
 * $Header: /cvsroot/nocc/nocc/webmail/delete.php,v 1.18 2001/10/19 10:34:25 nicocha Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * this file just delete the selected message(s)
 */

session_register ('user', 'passwd');
require_once ('./conf.php');

$pop = imap_open('{'.$servr.'}INBOX', $user, stripslashes($passwd));
$num_messages = imap_num_msg($pop);

if (isset($only_one) && ($only_one == 1))
	imap_delete($pop, $mail, 0);
else
{
	for ($i = 1; $i <= $num_messages; $i++)
	{
		$delete_this_one = $HTTP_POST_VARS["msg-".$i];
		if ($delete_this_one == "Y")
			imap_delete($pop, $i, 0);
	}
}
imap_close($pop, CL_EXPUNGE);

Header ("Location: action.php?sort=$sort&sortdir=$sortdir&lang=$lang");
?>