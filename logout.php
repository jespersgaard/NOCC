<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/logout.php,v 1.8 2001/02/23 09:31:57 nicocha Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 */

session_start();
$old_theme = $theme;
$old_lang = $lang;
session_destroy();
Header("Location: index.php?lang=$old_lang&theme=$old_theme");
?>