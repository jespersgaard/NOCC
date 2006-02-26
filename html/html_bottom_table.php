<!-- start of $Id: html_bottom_table.php,v 1.34 2006/02/26 09:32:53 goddess_skuld Exp $ -->
<?php
  if (!isset($conf->loaded))
    die('Hacking attempt');
?>
                      </table>
                    </div>
                  </form>
                  <!-- end of Message list bloc -->
                </div>
                <div class="bottomNavigation">
                  <table>
                    <tr>
                      <td class="inbox">&nbsp;</td>
                      <td class="inbox right">
	                <?php echo htmlentities($page_line, ENT_COMPAT, 'UTF-8') ?>
                      </td>
                      <td class="inbox right">
                        <?php echo htmlentities($prev, ENT_COMPAT, 'UTF-8') ?>
                        <?php echo htmlentities($next, ENT_COMPAT, 'UTF-8') ?>
                      </td>
                    </tr>
                  </table>
                </div>
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
<!-- end of $Id: html_bottom_table.php,v 1.34 2006/02/26 09:32:53 goddess_skuld Exp $ -->
