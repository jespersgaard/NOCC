<!-- start of $Id: menu_inbox_status.php,v 1.10 2006/02/26 12:05:28 goddess_skuld Exp $ -->
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
                                 <?php echo convertLang2Html($html_new_msg_in) ?>
                               </td>
                               <td class="left">
                                 <?php echo $list_of_folders ?>
                               </td>
                             </tr>
                           </table>
                         </td>
                       </tr>
<?php } ?>
<!-- end of $Id: menu_inbox_status.php,v 1.10 2006/02/26 12:05:28 goddess_skuld Exp $ -->
