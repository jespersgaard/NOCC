<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/logout.php,v 1.26 2002/04/15 11:57:27 mrylander Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 */

require_once './conf.php';
require_once './common.php';

$old_theme = $theme;
if (isset($attach_array) && is_array($attach_array))
    while ($tmp = array_shift($attach_array))
        @unlink($conf->tmpdir . '/' . $tmp->tmp_file);
session_destroy();
require_once './proxy.php';
Header('Location: ' . $conf->base_url . 'index.php?theme=' . $old_theme);
?>
