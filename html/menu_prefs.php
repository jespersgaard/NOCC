<!-- start of $Id: menu_prefs.php,v 1.29 2007/12/12 22:04:54 gerundt Exp $ -->
<?php
  if (!isset($conf->loaded))
    die('Hacking attempt');
?>
<div class="menuPrefs">
  <table> 
    <tr>
      <td class="menu">
        <a href="<?php echo $_SERVER['PHP_SELF'] ?>"><?php echo convertLang2Html($html_inbox); ?></a>
      </td>
      <td class="menu">
        <a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=write"><?php echo convertLang2Html($html_new_msg) ?></a>
      </td>
      <td class="menuBlank">
      </td>
      <?php if ($conf->prefs_dir && isset($conf->contact_number_max) && $conf->contact_number_max != 0 ) { ?>
      <td class="menu">
        <a href="javascript:void(0);" onclick="window.open('contacts_manager.php?<?php echo session_name() . '=' .   session_id() ?>','','scrollbars=yes,resizable=yes,width=600,height=400')"><?php echo convertLang2Html($html_contacts) ?></a>
      </td>
      <?php } ?>
    </tr>
  </table>
</div>
<!-- end of $Id: menu_prefs.php,v 1.29 2007/12/12 22:04:54 gerundt Exp $ -->
