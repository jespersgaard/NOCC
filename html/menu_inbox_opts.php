<!-- start of $Id: menu_inbox_opts.php,v 1.7 2002/03/24 17:08:02 wolruf Exp $ -->
<tr>
 <td colspan="7">
<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%">
    <tr bgcolor="<?php echo $glob_theme->tr_color ?>">
        <td align="left">
            <input type="button" class="button" value="<?php echo $html_select_all; ?>" onselect="SelectAll()" onclick="SelectAll()" />
        </td>
        <td align="left" class="titlew">
            <?php
            if ($pop->is_imap()) {
                $html_move_select = $pop->html_folder_select('move_folder');
                echo '<input type="submit" class="button" name="move_mode" value="'.$html_move.'">'." $html_messages_to $html_move_select";
            }
            ?>
        </td>
        <td align="center" class="titlew">
            <?php
            if ($pop->is_imap()) {
                $html_copy_select = $pop->html_folder_select('copy_folder');
                echo '<input type="submit" class="button" name="copy_mode" value="'.$html_copy.'">'." $html_messages_to $html_copy_select";
            }
            ?>
        </td>
        <td align="right">
            <?php
            if ($conf->delete_button_icon)
                echo '<input type="image" name="delete_mode" value="1" src="themes/' . $theme . '/img/delete.gif" alt="' . $alt_delete . '" />';
            else
                echo '<input type="submit" name="delete_mode" class="button" value="' . $html_delete . '" />';
            ?>
        </td>
    </tr>
</table>
 </td>
</tr>
<!-- end of $Id: menu_inbox_opts.php,v 1.7 2002/03/24 17:08:02 wolruf Exp $ -->
