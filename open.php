<?
/*
 * $Header: /cvsroot/nocc/nocc/webmail/open.php,v 1.6 2000/11/24 22:01:52 wolruf Exp $
 *
 * Copyright 2000 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2000 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 */
?>
<html>
<frameset rows="40, *" border="0" marginheight="0" marginwidth="0">
	<frame name="top" src="outside.php?lang=<? echo $lang ?>" scrolling="no">
	<frame name="site" src="<? echo $QUERY_STRING ?>" scrolling="auto">
</frameset>
<noframes>
<? echo $noframes ?>
</noframes>
</html>