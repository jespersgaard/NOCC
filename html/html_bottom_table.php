<!-- start of $Id: html_bottom_table.php,v 1.30 2004/07/06 18:43:08 goddess_skuld Exp $ -->
    <tr bgcolor="<?php echo $glob_theme->inside_color ?>">
        <td colspan="2" align="left" class="inbox">&nbsp;</td>
        <td colspan="2" align="center" class="inbox">&nbsp;</td>
        <?php if ($conf->have_ucb_pop_server || $pop->is_imap()) { ?>
            <td colspan="2" align="right" class="inbox">
        <?php } else { ?>
            <td align="right" class="inbox">
        <?php } ?>
	    <?php echo $page_line ?>
        </td>
        <td align="right" class="inbox">
            <?php echo $prev ?>
            <?php echo $next ?>
        </td>
    </tr>
</table>
</td></tr>
</form>
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
<!-- end of $Id: html_bottom_table.php,v 1.30 2004/07/06 18:43:08 goddess_skuld Exp $ -->
