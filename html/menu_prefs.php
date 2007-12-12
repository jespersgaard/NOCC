<!-- start of $Id: menu_prefs.php,v 1.28 2006/11/22 14:27:18 goddess_skuld Exp $ -->
<?php
  if (!isset($conf->loaded))
    die('Hacking attempt');
?>
<div class="menuPrefs">
  <table> 
    <tr>
      <td class="menu">
        <a href="<?php echo $_SERVER['PHP_SELF'] ?>" class="menu"><?php if ($_SESSION['nocc_folder'] != 'INBOX') { echo $_SESSION['nocc_folder']; } else { echo convertLang2Html($html_inbox); } ?></a>
      </td>
      <td class="menu">
        <a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=write" class="menu"><?php echo convertLang2Html($html_new_msg) ?></a>
      </td>
      <td class="menuBlank">
      </td>
      <?php if ($conf->prefs_dir && isset($conf->contact_number_max) && $conf->contact_number_max != 0 ) { ?>
      <td class="menu">
        <a href="javascript:void(0);" class="menu" onclick="window.open('contacts_manager.php?<?php echo session_name() . '=' .   session_id() ?>','','scrollbars=yes,resizable=yes,width=600,height=400')"><?php echo convertLang2Html($html_contacts) ?></a>
      </td>
      <?php } ?>
    </tr>
  </table>
</div>
<!-- end of $Id: menu_prefs.php,v 1.28 2006/11/22 14:27:18 goddess_skuld Exp $ -->
