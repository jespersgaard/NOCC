<!-- start of $Id: menu_inbox_status.php,v 1.9 2006/02/26 09:32:53 goddess_skuld Exp $ -->
<?php
  if (!isset($conf->loaded))
    die('Hacking attempt');
?>
<?php if($list_of_folders != "") { ?>
                      <tr>
                        <td colspan="5">
                          <table class="inboxStatus">
                            <tr>
                               <td class="right">
                                 <?php echo htmlentities($html_new_msg_in, ENT_COMPAT, 'UTF-8') ?>
                               </td>
                               <td class="left">
                                 <?php echo $list_of_folders ?>
                               </td>
                             </tr>
                           </table>
                         </td>
                       </tr>
<?php } ?>
<!-- end of $Id: menu_inbox_status.php,v 1.9 2006/02/26 09:32:53 goddess_skuld Exp $ -->
