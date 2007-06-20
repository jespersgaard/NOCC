<!-- start of $Id: menu_inbox_status.php,v 1.13 2007/03/17 07:32:14 goddess_skuld Exp $ -->
<?php
  if (!isset($conf->loaded))
    die('Hacking attempt');
?>
<?php if($list_of_folders != '') { ?>
                      <div id="inboxStatus">
                        <?php echo convertLang2Html($html_new_msg_in) . $list_of_folders ?>
                      </div>
<?php } ?>
<!-- end of $Id: menu_inbox_status.php,v 1.13 2007/03/17 07:32:14 goddess_skuld Exp $ -->
