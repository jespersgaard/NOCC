<!-- start of $Id: folders.php,v 1.1 2002/04/16 00:10:30 mrylander Exp $ -->
<?php

$renameoldbox = $pop->html_folder_select('renameoldbox');
$removeoldbox = $pop->html_folder_select('removeoldbox');

$all_mailboxes = $pop->getmailboxes();

$big_list = array();
if (is_array($all_mailboxes)) {
    reset($all_mailboxes);
    while (list($junk, $val) = each($all_mailboxes)) {
        list($junk,$name) = split($pop->server .'}', $pop->utf7_decode($val->name));
        if (strlen($name) <= 32) {
            array_push($big_list, $name);
        }
    }
}

$select_list = array();
if (count($big_list) > 1) {
    for ($i = 0; $i < count($big_list); $i++) {
        array_push($select_list, "\t<OPTION value=\"".$big_list[$i]."\">".$big_list[$i]."</OPTION>\n");
    }
}

?>
<hr>
<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td bgcolor="<?php echo $glob_theme->inside_color ?>">
            <form method="post" action="<?php echo $PHP_SELF; ?>">
            <input type="hidden" name="action" value="managefolders" />
            <input type="hidden" name="submit_folders" value="1" />
            <input type="hidden" name="lang" value="<?php echo $lang; ?>" />
            <input type="hidden" name="folder" value="<?php echo $folder; ?>" />
            <table border="0" cellpadding="2" cellspacing="1" bgcolor="<?php echo $glob_theme->inside_color ?>" width="100%">
                <tr>
                    <td width="10%"></td>
                    <td align="left" class="prefs" ><input type="radio" name="do" value="create_folder">
                        <?php echo $html_folder_create ?> <input type="text" name="createnewbox" size="15" maxlength="32"></td>
                    <td align="left" class="prefs" valign="top"><?php echo $html_folder_create_hint ?></td>
                </tr>
                <tr>
                    <td width="10%"></td>
                    <td align="left" class="prefs" ><input type="radio" name="do" value="rename_folder">
                        <?php echo $html_folder_rename ?> <?php echo $renameoldbox ?>
                        <?php echo $html_to ?> <input type="text" name="renamenewbox" size="15" maxlength="32"></td>
                </tr>
                <tr>
                    <td width="10%"></td>
                    <td align="left" class="prefs" ><input type="radio" name="do" value="subscribe_folder">
                        <?php echo $html_folder_subscribe ?> <SELECT name="subscribenewbox"> <?php echo join('', $select_list) ?> </SELECT></td>
                </tr>
                <tr>
                    <td width="10%"></td>
                    <td align="left" class="prefs" ><input type="radio" name="do" value="remove_folder">
                        <?php echo $html_folder_remove ?> <?php echo $removeoldbox ?></td>
                </tr>
                <tr>
                    <td align="center" colspan="3">
                        <?php
                            if(isset($submit_folders))
                                echo '<p class="prefs">'.$html_folders_updated.'</p>';
                        ?>
                        <table bgcolor="<?php echo $glob_theme->inside_color ?>" width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td align="right" valign="top" width="50%">
                                    <input type="submit" class="button" value="<?php echo $html_submit ?>" />&nbsp;
                                </td>
                                <td align="left" valign="top" width="50%">
                                    &nbsp;<input type="reset" class="button" value="<?php echo $html_cancel ?>" />
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            </form>
        </td>
    </tr>
</table>
<!-- end of $Id: folders.php,v 1.1 2002/04/16 00:10:30 mrylander Exp $ -->
