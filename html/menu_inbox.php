<!-- start of $Id: menu_inbox.php,v 1.50 2005/01/06 19:28:28 goddess_skuld Exp $ -->
<?php
$color_inbox = $color = $glob_theme->menu_color;
$action = "";
if(isset($_REQUEST['action']))
    $action = safestrip($_REQUEST['action']);
if ($action == '' || $action == 'login') 
{
    $color_inbox = $glob_theme->menu_color_on; 
    $line = '<a href="'.$_SERVER['PHP_SELF'].'?action=write" class="menu">'.$html_new_msg.'</a>';
}
else
    $color =  $glob_theme->menu_color_on;
if ($action == 'write')
    $line = '<font color="'.$glob_theme->link_color.'">'.$html_new_msg.'</font>';
elseif ($action == 'reply')
{
    $line = '<font color="'.$glob_theme->link_color.'">'.$html_reply.'</font>';
}
elseif ($action == 'reply_all')
{
    $line = '<font color="'.$glob_theme->link_color.'">'.$html_reply_all.'</font>';
}
elseif ($action == 'forward')
{
    $line = '<font color="'.$glob_theme->link_color.'">'.$html_forward.'</font>';
}
?>
<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td bgcolor="<?php echo $glob_theme->inside_color ?>">
            <table border="0" cellpadding="2" cellspacing="1" bgcolor="<?php echo $glob_theme->inside_color ?>" width="100%">
                <tr>
                    <td class="menu" align="center" width="120" bgcolor="<?php echo $color_inbox ?>">
<a href="<?php echo $_SERVER['PHP_SELF'] ?>" class="menu"><?php if ($_SESSION['nocc_folder'] != INBOX) { echo $_SESSION['nocc_folder']; } else { echo $html_inbox; } ?></a>
                    </td>
                    <td class="menu" align="center" width="120" bgcolor="<?php echo $color ?>">
                        <?php echo $line ?>
                    </td>
                    <td class="menu" align="center" width="*" bgcolor="<?php echo $glob_theme->menu_color ?>">
			<?php if ($_GET["successfulsend"]) { echo ($html_mail_sent); } ?>
                        <img src="themes/<?php echo $_SESSION['nocc_theme'] ?>/img/spacer.gif" height="1" width="1" alt="" />
                    </td>
                    <?php if ($conf->prefs_dir && isset($conf->contact_number_max) && $conf->contact_number_max != 0 ) { ?>
                      <td class="menu" align="center" width="80" bgcolor="<?php echo $glob_theme->menu_color ?>">
                        <a href="javascript:void(0);" class="menu" onClick="window.open('contacts_manager.php?<?php echo session_name() . '=' .   session_id() ?>','','scrollbars=yes,resizable=yes,width=600,height=400')"><?php echo $html_contacts ?></a>
                      </td>
                    <?php } ?>
                    <?php if($conf->prefs_dir) { ?>
                    <td class="menu" align="center" width="80" bgcolor="<?php echo $glob_theme->menu_color ?>">
                        <a href="action.php?action=setprefs" class="menu"><?php echo $html_preferences ?></a>
                    </td>
                    <?php } ?>
                    <?php if ($conf->enable_logout) { ?>
                    <td class="menu" align="center" width="80" bgcolor="<?php echo $glob_theme->menu_color ?>">
                        <a href="logout.php" class="menu"><?php echo $html_logout ?></a>
                    </td>
                    <?php } ?>
                </tr>
            </table>
        </td>
    </tr>
</table>
<!-- end of $Id: menu_inbox.php,v 1.50 2005/01/06 19:28:28 goddess_skuld Exp $ -->
