<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/logout.php,v 1.11 2001/04/17 11:51:44 nicocha Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 */

session_start();
$old_theme = $theme;
if (is_array($attach_array))
	while ($tmp = array_shift($attach_array))
		unlink($tmp->tmp_file);
session_destroy();
Header("Location: index.php?lang=$lang&theme=$old_theme");
?>