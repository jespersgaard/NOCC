<?
/*
 * $Header: /cvsroot/nocc/nocc/webmail/no_mail.php,v 1.7 2001/02/20 17:37:19 nicocha Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 */

require ("conf.php");
require ("check_lang.php");
?>

<tr bgcolor="<? echo $glob_theme->inbox_color ?>">
	<td align="center" colspan="7" class="inbox">
		<? echo $html_no_mail ?>
	</td>
</tr>