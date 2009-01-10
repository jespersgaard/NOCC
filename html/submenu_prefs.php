<!-- start of $Id$ -->
<?php
  if (!isset($conf->loaded))
    die('Hacking attempt');

  if ($pop->is_imap() && $conf->prefs_dir) {
    $action = '';
    if(isset($_REQUEST['action']))
      $action = safestrip($_REQUEST['action']);
    $selected = 0;
    switch ($action) {
      case '':
      case 'setprefs':
        $selected = 1;
        break;
      case 'managefilters':
        $selected = 2;
        break;
    }
?>
<div class="submenu">
  <ul>
    <?php if ($selected == 1) echo '<li class="selected">'; else echo '<li>'; ?>
      <a href="action.php?action=setprefs"><?php echo convertLang2Html($html_preferences) ?></a>
    </li>
    <?php if ($selected == 2) echo '<li class="selected">'; else echo '<li>'; ?>
      <a href="action.php?action=managefilters"><?php echo convertLang2Html($html_manage_filters_link) ?></a>
    </li>
  </ul>
</div>
<?php
  }
?>
<!-- end of $Id$ -->
