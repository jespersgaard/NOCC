<!-- start of $Id: html_bottom_table.php,v 1.41 2007/06/20 21:53:20 gerundt Exp $ -->
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
<!-- end of $Id: html_bottom_table.php,v 1.41 2007/06/20 21:53:20 gerundt Exp $ -->
