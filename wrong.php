<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/wrong.php,v 1.15 2001/10/19 10:34:25 nicocha Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 */

require_once ('./conf.php');
require_once ('./check_lang.php');
session_start();
session_destroy();
?>
<table border="0" width="100%">
	<tr>
		<td align="center" valign="middle">
			<table bgcolor="<?php echo $glob_theme->login_border ?>" border="0" cellpadding="1" cellspacing="0" width="428" align="center">
				<tr> 
					<td valign="bottom"> 
						<table bgcolor="<?php echo $glob_theme->login_box_bgcolor ?>" border="0" cellpadding="0" cellspacing="0" width="428">
							<tr>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td align="center" class="f"><?php echo $html_wrong ?><br /><br /><a href="index.php?lang=<?php echo $lang ?>&theme=<?php echo $theme ?>"><?php echo $html_retry ?></a></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>