<!-- start of $Id: menu_inbox.php,v 1.41 2002/05/22 14:23:43 rossigee Exp $ -->
<?php
$color_inbox = $color = $glob_theme->menu_color;
$action = "";
if(isset($_REQUEST['action']))
    $action = safestrip($_REQUEST['action']);
if ($action == '') 
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
                        <a href="<?php echo $_SERVER['PHP_SELF'] ?>" class="menu"><?php echo $_SESSION['nocc_folder'] ?></a>
                    </td>
                    <td class="menu" align="center" width="120" bgcolor="<?php echo $color ?>">
                        <?php echo $line ?>
                    </td>
                    <td width="*" bgcolor="<?php echo $glob_theme->menu_color ?>">
                        <img src="themes/<?php echo $_SESSION['nocc_theme'] ?>/img/spacer.gif" height="1" width="1" alt="" />
                    </td>
                    <td class="menu" align="center" width="80" bgcolor="<?php echo $glob_theme->menu_color ?>">
                        <?php if($conf->prefs_dir) { ?>
                            <a href="action.php?action=setprefs" class="menu"><?php echo $html_preferences ?></a>
                        <?php } ?>
                    </td>
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
<!-- end of $Id: menu_inbox.php,v 1.41 2002/05/22 14:23:43 rossigee Exp $ -->
