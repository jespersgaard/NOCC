<?
/*
 * $Header: /cvsroot/nocc/nocc/webmail/wrong.php,v 1.5 2000/11/24 22:01:52 wolruf Exp $
 *
 * Copyright 2000 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2000 Olivier Cahagne <cahagn_o@epita.fr>
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
<br><br>
<a href="index.php?lang=<? echo $lang ?>"><? echo $html_retry ?></a>
</span>
<br><br><br><br><br>
