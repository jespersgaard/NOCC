<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/check.php,v 1.3 2001/11/03 21:49:15 rossigee Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 */

if (floor(phpversion()) != 4)
{
	echo '<font color="red"><b>You don\'t seem to be running PHP 4, you need at least PHP 4 to run NOCC.</b></font><br /><br /><div align="center"><img src="themes/standard/img/button.png" width="88" height="31" alt="Powered by NOCC" /></div>';
	exit;
}
if (!extension_loaded('imap'))
{
	echo '<font color="red"><b>The IMAP module does not seem to be installed on this PHP setup, please see NOCC\'s documentation.</b></font><br /><br /><div align="center"><img src="themes/standard/img/button.png" width="88" height="31" alt="Powered by NOCC" /></div>';
	exit;
}
if (empty($tmpdir))
{
	echo '<font color="red"><b>"$tmpdir" is not set in "conf.php". NOCC cannot run.</b></font><br /><br /><div align="center"><img src="themes/standard/img/button.png" width="88" height="31" alt="Powered by NOCC" /></div>';
	exit;
}
?>
