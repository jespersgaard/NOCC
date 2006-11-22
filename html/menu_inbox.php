<!-- start of $Id: menu_inbox.php,v 1.57 2006/10/15 21:36:37 goddess_skuld Exp $ -->
<?php
  if (!isset($conf->loaded))
    die('Hacking attempt');

$action = "";
if(isset($_REQUEST['action']))
    $action = safestrip($_REQUEST['action']);
if ($action == '' || $action == 'login' || $action == 'cookie') 
{
  $class = "menu";
  $classInbox = "menuSelected";
  $line = '<a href="'.$_SERVER['PHP_SELF'].'?action=write">'.$html_new_msg.'</a>';
} else {
  $class = "menuSelected";
  $classInbox = "menu";
}
if ($action == 'write')
  $line = $html_new_msg;
elseif ($action == 'reply')
{
  $line = $html_reply;
}
elseif ($action == 'reply_all')
{
  $line = $html_reply_all;
}
elseif ($action == 'forward')
{
  $line = $html_forward;
}
?>
            <div class="menuInbox"> 
              <table>
                <tr>
                  <td class="<?php echo $classInbox; ?>">
                    <a href="<?php echo $_SERVER['PHP_SELF'] ?>"><?php if ($_SESSION['nocc_folder'] != 'INBOX') { echo $_SESSION['nocc_folder']; } else { echo convertLang2Html($html_inbox); } ?></a>
                  </td>
                  <td class="<?php echo $class; ?>">
                    <?php echo $line ?>
                  </td>
                  <td class="menuBlank">
                    <?php if (isset($_GET["successfulsend"]) && $_GET["successfulsend"]) { echo convertLang2Html($html_send_confirmed); } ?>
                  </td>
                  <?php if ($conf->prefs_dir && isset($conf->contact_number_max) && $conf->contact_number_max != 0 ) { ?>
                  <td class="menu">
                    <a href="javascript:void(0);" onclick="window.open('contacts_manager.php?<?php echo session_name() . '=' .   session_id() ?>','','scrollbars=yes,resizable=yes,width=600,height=400')"><?php echo convertLang2Html($html_contacts) ?></a>
                  </td>
                  <?php } ?>
                  <?php if($conf->prefs_dir) { ?>
                  <td class="menuSmall">
                    <a href="action.php?action=setprefs"><?php echo convertLang2Html($html_preferences) ?></a>
                  </td>
                  <?php } ?>
                  <?php if ($conf->enable_logout) { ?>
                  <td class="menuSmall">
                    <a href="logout.php"><?php echo convertLang2Html($html_logout) ?></a>
                  </td>
                  <?php } ?>
                </tr>
              </table>
            </div>
<!-- end of $Id: menu_inbox.php,v 1.57 2006/10/15 21:36:37 goddess_skuld Exp $ -->
