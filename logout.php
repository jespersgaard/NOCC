<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/logout.php,v 1.21 2001/12/13 10:39:09 nicocha Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 */

require_once ('./conf.php');

session_start();
$old_theme = $theme;
if (isset($attach_array) && is_array($attach_array))
	while ($tmp = array_shift($attach_array))
		@unlink($conf->tmpdir . '/' . $tmp->tmp_file);
session_destroy();
require_once ('./proxy.php');
Header('Location: ' . $conf->base_url . 'index.php?lang=' . $lang . '&theme=' . $old_theme);
?>