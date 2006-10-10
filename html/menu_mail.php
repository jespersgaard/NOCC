<!-- start of $Id: menu_mail.php,v 1.36 2006/02/26 11:07:52 goddess_skuld Exp $ -->
<?php
  if (!isset($conf->loaded))
    die('Hacking attempt');
?>
<div class="menuMail">
  <table>
    <tr>
      <td class="menu">
        <a href="<?php echo $_SERVER['PHP_SELF'] ?>"><?php if ($_SESSION['nocc_folder'] != 'INBOX') { echo $_SESSION['nocc_folder']; } else { echo htmlentities($html_inbox, ENT_COMPAT, 'UTF-8'); } ?></a>
      </td>
      <td class="menu">
        <a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=write"><?php echo htmlentities($html_new_msg, ENT_COMPAT, 'UTF-8') ?></a>
      </td>
      <td class="menu">
        <a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=reply&amp;mail=<?php echo $content['msgnum'] ?>"><?php echo htmlentities($html_reply, ENT_COMPAT, 'UTF-8') ?></a>
      </td>
      <td class="menu">
        <a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=reply_all&amp;mail=<?php echo $content['msgnum'] ?>"><?php echo htmlentities($html_reply_all, ENT_COMPAT, 'UTF-8') ?></a>
      </td>
      <td class="menu">
        <a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=forward&amp;mail=<?php echo $content['msgnum'] ?>"><?php echo htmlentities($html_forward, ENT_COMPAT, 'UTF-8') ?></a>
      </td>
      <td class="menu">
        <a href="javascript:void(0);" onclick="window.open('down_mail.php?mail=<?php echo $content['msgnum'] ?>&amp;<?php echo session_name() . "=" . session_id(); ?>');"><?php echo htmlentities($html_down_mail, ENT_COMPAT, 'UTF-8') ?></a>
      </td>
      <td class="menu">
        <a href="delete.php?delete_mode=1&amp;mail=<?php echo $content['msgnum'] ?>&amp;only_one=1" onclick="if (confirm('<?php echo $html_del_msg ?>')) return true; else return false;"><?php echo htmlentities($html_delete, ENT_COMPAT, 'UTF-8') ?></a>
      </td>
      <?php if ($conf->enable_logout) { ?>
      <td class="menu">
        <a href="logout.php"><?php echo htmlentities($html_logout, ENT_COMPAT, 'UTF-8') ?></a>
      </td>
      <?php } ?>
    </tr>
  </table>
</div>
<!-- end of $Id: menu_mail.php,v 1.36 2006/02/26 11:07:52 goddess_skuld Exp $ -->
