<!-- start of $Id: html_bottom_table.php,v 1.24 2001/11/03 21:04:16 rossigee Exp $ -->
</table>
</td></tr>
</table>
<input type="hidden" name="nothing" value="looks_good" />
</form>

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
<!-- end of $Id: html_bottom_table.php,v 1.24 2001/11/03 21:04:16 rossigee Exp $ -->
