<?php 
/*
 * $Header: /cvsroot/nocc/nocc/webmail/delete.php,v 1.26 2002/02/03 16:14:32 wolruf Exp $
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
require_once ('./functions.php');
require_once ('./class_local.php');

$ev = "";
$pop = new nocc_imap('{' . $servr . '}INBOX', $login, safestrip($passwd), &$ev);
if($ev) {
	echo "<p class=\"error\">".$ev->getMessage()."</p>";
	return;
}

$num_messages = $pop->num_msg();

if (isset($only_one) && ($only_one == 1))
	$pop->delete($mail);
else
{
	for ($i = 1; $i <= $num_messages; $i++)
	{
		$delete_this_one = $HTTP_POST_VARS['msg-' . $i];
		if ($delete_this_one == 'Y')
			$pop->delete($i);
	}
}

$pop->close();

// Redirect user to index
// TODO: redirect user to next message
require_once ('./proxy.php');
header('Location: ' . $conf->base_url . "action.php?sort=$sort&sortdir=$sortdir&lang=$lang&$php_session=" . $$php_session);
?>
