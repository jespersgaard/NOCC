<!-- start of $Id: menu_inbox_opts.php,v 1.9 2002/04/19 18:29:30 mrylander Exp $ -->
<tr>
 <td colspan="7">
<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%">
    <tr bgcolor="<?php echo $glob_theme->tr_color ?>">
        <td align="left">
            <input type="button" class="button" value="<?php echo $html_select_all; ?>" onselect="SelectAll()" onclick="SelectAll()" />
        </td>
        <td align="middle" class="titlew">
            <?php
            if ($pop->is_imap()) {
                $html_target_select = $pop->html_folder_select('target_folder');
                echo '<input type="submit" class="button" name="move_mode" value="'.$html_move.'">'." $html_or ";
                echo '<input type="submit" class="button" name="copy_mode" value="'.$html_copy.'">'." $html_messages_to $html_target_select";
            }
            ?>
        </td>
        <td align="right">
            <?php
            if ($conf->delete_button_icon)
                echo '<input type="image" name="delete_mode" value="1" src="themes/' . $_SESSION['theme'] . '/img/delete.gif" alt="' . $alt_delete . '" />';
            else
                echo '<input type="submit" name="delete_mode" class="button" value="' . $html_delete . '" />';
            ?>
        </td>
    </tr>
</table>
 </td>
</tr>
<!-- end of $Id: menu_inbox_opts.php,v 1.9 2002/04/19 18:29:30 mrylander Exp $ -->
