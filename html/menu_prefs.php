<!-- start of $Id: menu_prefs.php,v 1.23 2005/01/08 21:29:31 goddess_skuld Exp $ -->
<div class="menuPrefs">
  <table> 
    <tr>
      <td class="menu">
        <a href="<?php echo $_SERVER['PHP_SELF'] ?>" class="menu"><?php if ($_SESSION['nocc_folder'] != INBOX) { echo $_SESSION['nocc_folder']; } else { echo $html_inbox; } ?></a>
      </td>
      <td class="menu">
        <a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=write" class="menu"><?php echo $html_new_msg ?></a>
      </td>
      <td class="menuBlank">
      </td>
      <?php if ($conf->prefs_dir && isset($conf->contact_number_max) && $conf->contact_number_max != 0 ) { ?>
      <td class="menuSmall">
        <a href="javascript:void(0);" class="menu" onclick="window.open('contacts_manager.php?<?php echo session_name() . '=' .   session_id() ?>','','scrollbars=yes,resizable=yes,width=600,height=400')"><?php echo $html_contacts ?></a>
      </td>
      <?php } ?>
      <td class="menuSmallSelected">
        <?php echo $html_preferences ?>
      </td>
      <?php if ($conf->enable_logout) { ?>
      <td class="menuSmall">
        <a href="logout.php"><?php echo $html_logout ?></a>
      </td>
      <?php } ?>
    </tr>
  </table>
</div>
<!-- end of $Id: menu_prefs.php,v 1.23 2005/01/08 21:29:31 goddess_skuld Exp $ -->
