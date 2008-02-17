<!-- start of $Id: menu_prefs.php,v 1.30 2007/12/20 23:14:02 gerundt Exp $ -->
<?php
  if (!isset($conf->loaded))
    die('Hacking attempt');
?>
<div class="mainmenu">
  <ul>
    <li>
      <a href="<?php echo $_SERVER['PHP_SELF'] ?>"><?php echo convertLang2Html($html_inbox); ?></a>
    </li>
    <li>
      <a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=write"><?php echo convertLang2Html($html_new_msg) ?></a>
    </li>
    <?php if ($conf->prefs_dir && isset($conf->contact_number_max) && $conf->contact_number_max != 0 ) { ?>
    <li>
      <a href="javascript:void(0);" onclick="window.open('contacts_manager.php?<?php echo session_name() . '=' .   session_id() ?>','','scrollbars=yes,resizable=yes,width=600,height=400')"><?php echo convertLang2Html($html_contacts) ?></a>
    </li>
    <?php } ?>
  </ul>
</div>
<!-- end of $Id: menu_prefs.php,v 1.30 2007/12/20 23:14:02 gerundt Exp $ -->
