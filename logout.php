<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/logout.php,v 1.28 2002/04/24 19:32:30 rossigee Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 */

require_once './conf.php';
require_once './common.php';

$old_theme = $_SESSION['theme'];
clear_attachments();
session_destroy();
require_once './proxy.php';
Header('Location: ' . $conf->base_url . 'index.php?theme=' . $old_theme);
?>
