<!-- start of $Id: menu_inbox.php,v 1.37 2002/04/24 23:32:25 rossigee Exp $ -->
<?php
global $PHP_SELF;
$color_inbox = $color = $glob_theme->menu_color;
$action = "";
if(isset($_REQUEST['action']))
    $action = safestrip($_REQUEST['action']);
if ($action == '') 
{
    $color_inbox = $glob_theme->menu_color_on; 
    $line = '<a href="'.$PHP_SELF.'?action=write" class="menu">'.$html_new_msg.'</a>';
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
                        <a href="<?php echo $PHP_SELF ?>" class="menu"><?php echo $_SESSION['folder'] ?></a>
                    </td>
                    <td class="menu" align="center" width="120" bgcolor="<?php echo $color ?>">
                        <?php echo $line ?>
                    </td>
                    <td width="*" bgcolor="<?php echo $glob_theme->menu_color ?>">
                        <img src="themes/<?php echo $theme ?>/img/spacer.gif" height="1" width="1" alt="" />
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
                    <!-- <td class="menu" align="center" width="80" bgcolor="<?php echo $glob_theme->menu_color ?>">
                        <a href="javascript:void(null)" onMouseUp="OpenHelpWindow('help.php?action=<?php echo $action ?>','image','scrollbars=yes,resizable=yes,width=400,height=300')" class="menu"><?php echo $html_help ?></a>
                    </td> -->
                </tr>
            </table>
        </td>
    </tr>
</table>
<!-- end of $Id: menu_inbox.php,v 1.37 2002/04/24 23:32:25 rossigee Exp $ -->
