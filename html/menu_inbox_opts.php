<!-- start of $Id: menu_inbox_opts.php,v 1.4 2001/11/07 23:03:54 rossigee Exp $ -->
<tr>
 <td colspan="7">
<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%">
	<tr bgcolor="<?php echo $glob_theme->tr_color ?>">
		<td align="left">
			<input type="button" class="button" value="<?php echo $html_select_all; ?>" onselect="SelectAll()" onclick="SelectAll()" />
		</td>
		<td align="right">
			<?php
			if ($delete_button_icon)
				echo '<input type="image" src="themes/' . $theme . '/img/delete.gif" alt="' . $alt_delete . '" />';
			else
				echo '<input type="submit" class="button" value="' . $html_delete . '" />';
			?>
		</td>
	</tr>
</table>
 </td>
</tr>
<!-- end of $Id: menu_inbox_opts.php,v 1.4 2001/11/07 23:03:54 rossigee Exp $ -->