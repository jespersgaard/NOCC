<tr bgcolor="<?php echo $glob_theme->tr_color ?>">
	<td align="center" valign="middle">
		<input type="image" src="themes/<?php echo $theme ?>/img/delete.gif" alt="<?php echo $alt_delete ?>" />
	</td>
	<td colspan="6"><a href="#" onClick="SelectAll();"><?php echo $html_select_all ?></a></td>
</tr>
</table>
<input type="hidden" name="nothing" value="looks_good" />
</form>
</td></tr>
</table>

<script language="JavaScript">
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

<?php require ('html/menu_inbox.php'); ?>
