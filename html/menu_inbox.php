<!-- start of $Id: menu_inbox.php,v 1.55 2006/02/26 09:32:53 goddess_skuld Exp $ -->
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
                    <a href="<?php echo $_SERVER['PHP_SELF'] ?>"><?php if ($_SESSION['nocc_folder'] != 'INBOX') { echo $_SESSION['nocc_folder']; } else { echo htmlentities($html_inbox, ENT_COMPAT, 'UTF-8'); } ?></a>
                  </td>
                  <td class="<?php echo $class; ?>">
                    <?php echo $line ?>
                  </td>
                  <td class="menuBlank">
                    <?php if (isset($_GET["successfulsend"]) && $_GET["successfulsend"]) { echo htmlentities($html_mail_sent, ENT_COMPAT, 'UTF-8'); } ?>
                  </td>
                  <?php if ($conf->prefs_dir && isset($conf->contact_number_max) && $conf->contact_number_max != 0 ) { ?>
                  <td class="menu">
                    <a href="javascript:void(0);" onclick="window.open('contacts_manager.php?<?php echo session_name() . '=' .   session_id() ?>','','scrollbars=yes,resizable=yes,width=600,height=400')"><?php echo htmlentities($html_contacts, ENT_COMPAT, 'UTF-8') ?></a>
                  </td>
                  <?php } ?>
                  <?php if($conf->prefs_dir) { ?>
                  <td class="menuSmall">
                    <a href="action.php?action=setprefs"><?php echo htmlentities($html_preferences, ENT_COMPAT, 'UTF-8') ?></a>
                  </td>
                  <?php } ?>
                  <?php if ($conf->enable_logout) { ?>
                  <td class="menuSmall">
                    <a href="logout.php"><?php echo htmlentities($html_logout, ENT_COMPAT, 'UTF-8') ?></a>
                  </td>
                  <?php } ?>
                </tr>
              </table>
            </div>
<!-- end of $Id: menu_inbox.php,v 1.55 2006/02/26 09:32:53 goddess_skuld Exp $ -->
