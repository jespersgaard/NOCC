<!-- start of $Id: html_inbox.php,v 1.50 2006/10/05 15:37:25 goddess_skuld Exp $ -->
<?php
  if (!isset($conf->loaded))
    die('Hacking attempt');

  if ($conf->have_ucb_pop_server || $pop->is_imap()) {
    if ($tmp['new'] != '' && $tmp['new'] != null && $tmp['new'] != "&nbsp;") {
      $inbox_class = "inbox new";
    } else {
      $inbox_class = "inbox";
    }
  } else {
    $inbox_class = "inbox";
  }
?>
                      <tr>
                        <td class="<?php echo $inbox_class ?>">
                          <input type="checkbox" name="msg-<?php echo $tmp['number'] ?>" value="Y" />
                          <?php echo $tmp['new']; ?>
                          <a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=write&amp;mail_to=<?php echo convertMailData2Html($tmp['from']) ?>" title="<?php echo convertMailData2Html($tmp['from']); ?>"><?php echo convertMailData2Html(display_address ($tmp['from'])); ?></a>
                          <?php echo $tmp['attach']; ?>
                        </td>
                        <td class="<?php echo $inbox_class ?>">
                          <?php echo convertMailData2Html(display_address($tmp['to']), 55); ?>
                        </td>
                        <td class="<?php echo $inbox_class ?>">
                        <?php if(isset($user_prefs->seperate_msg_win) && $user_prefs->seperate_msg_win) { ?>
                          <a href="javascript:void(0);" onclick="window.open('<?php echo $_SERVER['PHP_SELF'] ?>?action=aff_mail&amp;mail=<?php echo $tmp['number'] ?>&amp;verbose=0&amp;');" title="<?php echo $tmp['subject']? convertMailData2Html($tmp['subject']) : $html_nosubject; ?>"><?php echo $tmp['subject']? convertMailData2Html($tmp['subject'], 55) : $html_nosubject; ?></a>
                        <?php } else { ?>
                          <a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=aff_mail&amp;mail=<?php echo $tmp['number'] ?>&amp;verbose=0&amp;" title="<?php echo $tmp['subject']? convertMailData2Html($tmp['subject']) : $html_nosubject; ?>"><?php echo $tmp['subject']? convertMailData2Html($tmp['subject'], 55) : $html_nosubject; ?></a>
                        <?php } ?>
                        </td>
                        <td class="<?php echo $inbox_class ?>">
                          <?php echo $tmp['date'] ?>
                          <?php echo $tmp['time'] ?>
                        </td>
                        <td class="<?php echo $inbox_class ?>">
                          <?php echo $tmp['size'] ?> <?php echo $html_kb ?>
                        </td>
                      </tr>
<!-- end of $Id: html_inbox.php,v 1.50 2006/10/05 15:37:25 goddess_skuld Exp $ -->
