<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/logout.php,v 1.36 2006/09/25 19:23:07 goddess_skuld Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 */

session_name("NOCCSESSID");
session_start();
require_once './config/conf.php';

clear_attachments();
session_name("NOCCSESSID");
session_destroy();
//destroy authentification cookie
setcookie ("NoccIdent");
require_once './utils/proxy.php';
Header('Location: ' . $conf->base_url . 'index.php');
?>
