<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/logout.php,v 1.12 2001/04/17 20:53:51 nicocha Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 */

session_start();
$old_theme = $theme;
$tmpdir = (!empty($upload_tmp_dir) ? $upload_tmp_dir : $tmpdir);
if (is_array($attach_array))
	while ($tmp = array_shift($attach_array))
		@unlink($tmpdir."/".$tmp->tmp_file);
session_destroy();
Header("Location: index.php?lang=$lang&theme=$old_theme");
?>