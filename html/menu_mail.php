<!-- start of $Id: menu_mail.php,v 1.30 2002/06/27 22:17:52 rossigee Exp $ -->
<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td bgcolor="<?php echo $glob_theme->inside_color ?>">
            <table border="0" cellpadding="2" cellspacing="1" bgcolor="<?php echo $glob_theme->inside_color ?>" width="100%">
                <tr>
                    <td class="menu" align="center" bgcolor="<?php echo $glob_theme->menu_color ?>">
                        <a href="<?php echo $_SERVER['PHP_SELF'] ?>" class="menu"><?php echo $_SESSION['nocc_folder'] ?></a>
                    </td>
                    <td class="menu" align="center" bgcolor="<?php echo $glob_theme->menu_color ?>">
                        <a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=write" class="menu"><?php echo $html_new_msg ?></a>
                    </td>
                    <td class="menu" align="center" bgcolor="<?php echo $glob_theme->menu_color ?>">
                        <a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=reply&amp;mail=<?php echo $content['msgnum'] ?>" class="menu"><?php echo $html_reply ?></a>
                    </td>
                    <td class="menu" align="center" bgcolor="<?php echo $glob_theme->menu_color ?>">
                        <a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=reply_all&amp;mail=<?php echo $content['msgnum'] ?>" class="menu"><?php echo $html_reply_all ?></a>
                    </td>
                    <td class="menu" align="center" bgcolor="<?php echo $glob_theme->menu_color ?>">
                        <a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=forward&amp;mail=<?php echo $content['msgnum'] ?>" class="menu"><?php echo $html_forward ?></a>
                    </td>
                    <td class="menu" align="center" bgcolor="<?php echo $glob_theme->menu_color ?>">
                        <a href="down_mail.php?mail=<?php echo $content['msgnum'] ?>&<?php echo session_name() . "=" . session_id(); ?>" class="menu" target="_blank"><?php echo $html_down_mail ?></a>
                    </td>
                    <td class="menu" align="center" bgcolor="<?php echo $glob_theme->menu_color ?>">
                        <a href="delete.php?delete_mode=1&mail=<?php echo $content['msgnum'] ?>&amp;only_one=1" class="menu" onClick="if (confirm('<?php echo $html_del_msg ?>')) return true; else return false;"><?php echo $html_delete ?></a>
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
<!-- end of $Id: menu_mail.php,v 1.30 2002/06/27 22:17:52 rossigee Exp $ -->
