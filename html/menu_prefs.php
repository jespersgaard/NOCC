<!-- start of $Id: menu_prefs.php,v 1.22 2004/10/04 18:23:30 goddess_skuld Exp $ -->
<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td bgcolor="<?php echo $glob_theme->inside_color ?>">
            <table border="0" cellpadding="2" cellspacing="1" bgcolor="<?php echo $glob_theme->inside_color ?>" width="100%">
                <tr>
                    <td class="menu" align="center" width="120" bgcolor="<?php echo $glob_theme->menu_color ?>">
                        <a href="<?php echo $_SERVER['PHP_SELF'] ?>" class="menu"><?php if ($_SESSION['nocc_folder'] != INBOX) { echo $_SESSION['nocc_folder']; } else { echo $html_inbox; } ?></a>
                    </td>
                    <td class="menu" align="center" width="120" bgcolor="<?php echo $glob_theme->menu_color ?>">
                        <a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=write" class="menu"><?php echo $html_new_msg ?></a>
                    </td>
                    <td width="*" bgcolor="<?php echo $glob_theme->menu_color ?>">
                        <img src="themes/<?php echo $_SESSION['nocc_theme'] ?>/img/spacer.gif" height="1" width="1" alt="" />
                    </td>
                    <?php if ($conf->prefs_dir && isset($conf->contact_number_max) && $conf->contact_number_max != 0 ) { ?>
                      <td class="menu" align="center" width="80" bgcolor="<?php echo $glob_theme->menu_color ?>">
                        <a href="javascript:void(0);" class="menu" onClick="window.open('contacts_manager.php?<?php echo session_name() . '=' .   session_id() ?>','','scrollbars=yes,resizable=yes,width=600,height=400')"><?php echo $html_contacts ?></a>
                      </td>
                    <?php } ?>
                    <td class="menu" align="center" width="80" bgcolor="<?php echo $glob_theme->menu_color_on ?>">
                        <font color="<?php echo $glob_theme->link_color ?>"><?php echo $html_preferences ?></font>
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
<!-- end of $Id: menu_prefs.php,v 1.22 2004/10/04 18:23:30 goddess_skuld Exp $ -->
