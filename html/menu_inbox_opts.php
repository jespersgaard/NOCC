<!-- start of $Id: html_bottom_table.php,v 1.23 2001/10/28 21:48:42 rossigee Exp $ -->
<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%">
	<tr bgcolor="<?php echo $glob_theme->tr_color ?>">
		<td align="left">
			<input type=button value="<?php echo $html_select_all; ?>" onClick="SelectAll()" />
		</td>
		<td align="right">
			<? if ($delete_button_icon) { ?>
				<input type="image" src="themes/<?php echo $theme ?>/img/delete.gif" alt="<?php echo $alt_delete ?>" />
			<? } else { ?>
				<input type="submit" value="<?php echo $html_delete ?>" />
			<? } ?>
		</td>
	</tr>
</table>
<!-- end of $Id: html_bottom_table.php,v 1.23 2001/10/28 21:48:42 rossigee Exp $ -->
