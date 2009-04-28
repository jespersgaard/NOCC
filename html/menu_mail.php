<!-- start of $Id$ -->
<?php
  if (!isset($conf->loaded))
    die('Hacking attempt');
?>
<div class="mainmenu">
  <ul>
    <li>
      <a href="<?php echo $_SERVER['PHP_SELF'] ?>"><?php echo convertLang2Html($html_inbox); ?></a>
    </li>
    <li class="selected">
      <span><?php echo convertLang2Html($html_msg) ?></span>
    </li>
    <?php if ($_SESSION['is_imap']) { ?>
    <li>
      <a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=managefolders" title="<?php echo convertLang2Html($html_manage_folders_link); ?>"><?php echo convertLang2Html($html_folders); ?></a>
    </li>
    <?php } ?>
    <?php if ($conf->prefs_dir && isset($conf->contact_number_max) && $conf->contact_number_max != 0 ) { ?>
    <li>
      <a href="javascript:void(0);" onclick="window.open('contacts_manager.php?<?php echo session_name() . '=' .   session_id() ?>','','scrollbars=yes,resizable=yes,width=600,height=400')"><?php echo i18n_message($html_contacts, ''); ?></a>
    </li>
    <?php } ?>
  </ul>
</div>
<!-- end of $Id$ -->
