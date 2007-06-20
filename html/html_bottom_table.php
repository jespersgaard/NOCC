<!-- start of $Id: html_bottom_table.php,v 1.40 2006/10/03 07:38:57 goddess_skuld Exp $ -->
<?php
  if (!isset($conf->loaded))
    die('Hacking attempt');
?>
                      </table>
                    <?php include('menu_inbox_status.php'); ?>
                    <?php include('menu_inbox_bottom_opts.php'); ?>
                  <!-- end of Message list bloc -->
                </div>
                <?php if (($pop->is_imap()) || ($pages > 1)) { ?>
                <div class="bottomNavigation">
                  <table>
                    <tr>
                      <td class="inbox">&nbsp;</td>
                      <td class="inbox right">
	                <?php echo $page_line ?>
                      </td>
                      <td class="inbox right">
                        <?php echo $prev ?>
                        <?php echo $next ?>
                      </td>
                    </tr>
                  </table>
                </div>
                <?php } ?>
<script type="text/javascript">
<!--
function SelectAll() {
  var form = document.getElementById('delete_form');
  for (var i = 0; i < form.elements.length; i++) {
    if( form.elements[i].name.substr( 0, 4 ) == 'msg-') {
      form.elements[i].checked =
        !(form.elements[i].checked);
    }
  }
}
//-->
</script>
<!-- end of $Id: html_bottom_table.php,v 1.40 2006/10/03 07:38:57 goddess_skuld Exp $ -->
