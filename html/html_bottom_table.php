<!-- start of $Id: html_bottom_table.php,v 1.22 2001/10/25 15:22:34 rossigee Exp $ -->
<tr bgcolor="<?php echo $glob_theme->tr_color ?>">
	<td align="center" valign="middle">
		<? if ($delete_button_icon) { ?>
			<input type="image" src="themes/<?php echo $theme ?>/img/delete.gif" alt="<?php echo $alt_delete ?>" />
		<? } else { ?>
			<input type="submit" value="<?php echo $html_delete ?>" />
		<? } ?>
	</td>
	<td colspan="6"><!--<a href="javascript:void(null)" class="button" onclick="SelectAll();"><?php echo $html_select_all ?></a>--></td>
</tr>
</table>
<input type="hidden" name="nothing" value="looks_good" />
</form>
</td></tr>
</table>

<script type="text/javascript">
<!--
function SelectAll() {
  for (var i = 0; i < document.delete_form.elements.length; i++) {
    if( document.delete_form.elements[i].name.substr( 0, 4 ) == 'msg-') {
      document.delete_form.elements[i].checked =
        !(document.delete_form.elements[i].checked);
    }
  }
}
//-->
</script>

<?php require_once ('./html/menu_inbox.php'); ?>
<!-- end of $Id: html_bottom_table.php,v 1.22 2001/10/25 15:22:34 rossigee Exp $ -->
