<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/logout.php,v 1.35 2006/08/28 18:22:15 goddess_skuld Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 */

session_name("NOCCSESSID");
session_start();
require_once './conf.php';

clear_attachments();
session_name("NOCCSESSID");
session_destroy();
//destroy authentification cookie
setcookie ("NoccIdent");
require_once './proxy.php';
Header('Location: ' . $conf->base_url . 'index.php');
?>
