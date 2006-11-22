<!-- start of $Id: menu_mail.php,v 1.38 2006/10/16 19:11:53 goddess_skuld Exp $ -->
<?php
  if (!isset($conf->loaded))
    die('Hacking attempt');
?>
<div class="menuMail">
  <table>
    <tr>
      <td class="menu">
        <a href="<?php echo $_SERVER['PHP_SELF'] ?>"><?php if ($_SESSION['nocc_folder'] != 'INBOX') { echo $_SESSION['nocc_folder']; } else { echo convertLang2Html($html_inbox); } ?></a>
      </td>
      <td class="menu">
        <a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=write"><?php echo convertLang2Html($html_new_msg) ?></a>
      </td>
      <td class="menu">
        <a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=reply&amp;mail=<?php echo $content['msgnum'] ?>"><?php echo convertLang2Html($html_reply) ?></a>
      </td>
      <td class="menu">
        <a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=reply_all&amp;mail=<?php echo $content['msgnum'] ?>"><?php echo convertLang2Html($html_reply_all) ?></a>
      </td>
      <td class="menu">
        <a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=forward&amp;mail=<?php echo $content['msgnum'] ?>"><?php echo convertLang2Html($html_forward) ?></a>
      </td>
      <td class="menu">
        <a href="down_mail.php?mail=<?php echo $content['msgnum'] ?>"><?php echo convertLang2Html($html_down_mail) ?></a>
      </td>
      <td class="menu">
        <a href="delete.php?delete_mode=1&amp;mail=<?php echo $content['msgnum'] ?>&amp;only_one=1" onclick="if (confirm('<?php echo $html_del_msg ?>')) return true; else return false;"><?php echo convertLang2Html($html_delete) ?></a>
      </td>
      <?php if ($conf->enable_logout) { ?>
      <td class="menu">
        <a href="logout.php"><?php echo convertLang2Html($html_logout) ?></a>
      </td>
      <?php } ?>
    </tr>
  </table>
</div>
<!-- end of $Id: menu_mail.php,v 1.38 2006/10/16 19:11:53 goddess_skuld Exp $ -->
