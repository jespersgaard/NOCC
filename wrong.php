<?
/*
 * $Header: /cvsroot/nocc/nocc/webmail/wrong.php,v 1.8 2001/02/16 15:33:10 nicocha Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 */

require ("conf.php");
require ("check_lang.php");
session_start();
session_destroy();
?>
<span class="f">
<? echo $html_wrong ?>
<br /><br />
<a href="index.php?lang=<? echo $lang ?>"><? echo $html_retry ?></a>
</span>
<br /><br /><br /><br /><br />