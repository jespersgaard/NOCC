<!-- start of $Id: menu_inbox.php,v 1.34 2002/04/18 22:28:26 rossigee Exp $ -->
<?php
$color_inbox = $color = $glob_theme->menu_color;
if ($action == '') 
{
    $color_inbox = $glob_theme->menu_color_on; 
    $line = '<a href="'.$PHP_SELF.'?action=write" class="menu">'.$html_new_msg.'</a>';
}
else
    $color =  $glob_theme->menu_color_on;
if ($action == 'write')
    $line = '<font color="'.$glob_theme->link_color.'">'.$html_new_msg.'</font>';
if ($action == 'reply')
    $line = '<font color="'.$glob_theme->link_color.'">'.$html_reply.'</font>';
if ($action == 'reply_all')
    $line = '<font color="'.$glob_theme->link_color.'">'.$html_reply_all.'</font>';
if ($action == 'forward')
    $line = '<font color="'.$glob_theme->link_color.'">'.$html_forward.'</font>';
?>
<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td bgcolor="<?php echo $glob_theme->inside_color ?>">
            <table border="0" cellpadding="2" cellspacing="1" bgcolor="<?php echo $glob_theme->inside_color ?>" width="100%">
                <tr>
                    <td class="menu" align="center" width="120" bgcolor="<?php echo $color_inbox ?>">
                        <a href="<?php echo $PHP_SELF ?>" class="menu"><?php echo $folder ?></a>
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
                    <!--<td class="menu" align="center" width="80" bgcolor="<?php echo $glob_theme->menu_color ?>">
                        <a href="javascript:void(null)" onMouseUp="OpenHelpWindow('help.php?action=<?php echo $action ?>','image','scrollbars=yes,resizable=yes,width=400,height=300')" class="menu"><?php echo $html_help ?></a>
                    </td> -->
                </tr>
            </table>
        </td>
    </tr>
</table>
<!-- end of $Id: menu_inbox.php,v 1.34 2002/04/18 22:28:26 rossigee Exp $ -->
