<!-- start of $Id: html_bottom_table.php,v 1.29 2002/01/23 13:17:38 nicocha Exp $ -->
</table>
</td></tr>
<input type="hidden" name="nothing" value="looks_good" />
</form>
</table>
<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%">
    <tr bgcolor="<?php echo $glob_theme->inside_color ?>">
        <td align="right" class="inbox">
	    <?php echo $page_line ?>
        </td>
        <td align="right" class="inbox">
            <?php echo $prev ?>
            <?php echo $next ?>
        </td>
    </tr>
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
<!-- end of $Id: html_bottom_table.php,v 1.29 2002/01/23 13:17:38 nicocha Exp $ -->
