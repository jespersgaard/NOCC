<br>
<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td bgcolor="<?php echo $glob_theme->inside_color ?>">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="hidden" name="action" value="managefilters" />
            <input type="hidden" name="do" value="delete" />
            <table border="0" cellpadding="2" cellspacing="1" bgcolor="<?php echo $glob_theme->inside_color ?>" width="100%">
                <tr align="center">
                    <td colspan="4">
                        <?php echo $html_filter_select ?>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="top" colspan="4">
                        <?php if ($html_filter_select) { ?>
                            <input type="submit" class="button" value="<?php echo $html_filter_remove ?>">

                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <hr>
                        <?php } ?>
            </form>
                    </td>
                </tr>
                <tr>
                    <td align="center" colspan="4">
                        <?php 
                            if ($html_filter_select) {
                                echo "<i>$html_filter_change_tip</i>\n";
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" name="action" value="managefilters" />
                    <input type="hidden" name="do" value="create" />
                    <td align="right" class="prefs" valign="top" colspan="2">
                        <select name="thing1">
                            <option value="-" selected><?php echo $html_select_one ?></option>
                            <option value="BODY"><?php echo $html_filter_body ?></option>
                            <option value="SUBJECT"><?php echo $html_filter_subject ?></option>
                            <option value="TO"><?php echo $html_filter_to ?></option>
                            <option value="FROM"><?php echo $html_filter_from ?></option>
                            <option value="CC"><?php echo $html_filter_cc ?></option>
                        </select>
                    </td>
                    <td align="center" class="prefs" valign="top">
                        &nbsp;contains&nbsp;
                        <td align="left" class="prefs" valign="top">
                            <input type="text" name="contains1" size="20" max="80">
                        </td>
                </tr>
                <tr>
                    <td align="right"></td>
                    <td align="right" class="prefs" valign="top">
                        <?php echo $html_and ?>&nbsp;
                        <select name="thing2">
                            <option value="-" selected><?php echo $html_select_one ?></option>
                            <option value="BODY"><?php echo $html_filter_body ?></option>
                            <option value="SUBJECT"><?php echo $html_filter_subject ?></option>
                            <option value="TO"><?php echo $html_filter_to ?></option>
                            <option value="FROM"><?php echo $html_filter_from ?></option>
                            <option value="CC"><?php echo $html_filter_cc ?></option>
                        </select>
                    </td>
                    <td align="center" class="prefs" valign="top">
                        contains
                        <td align="left" class="prefs" valign="top">
                            <input type="text" name="contains2" size="20" max="80">
                        </td>
                </tr>
                <tr>
                    <td align="right"></td>
                    <td align="right" class="prefs" valign="top">
                        <?php echo $html_and ?>&nbsp;
                        <select name="thing3">
                            <option value="-" selected><?php echo $html_select_one ?></option>
                            <option value="BODY"><?php echo $html_filter_body ?></option>
                            <option value="SUBJECT"><?php echo $html_filter_subject ?></option>
                            <option value="TO"><?php echo $html_filter_to ?></option>
                            <option value="FROM"><?php echo $html_filter_from ?></option>
                            <option value="CC"><?php echo $html_filter_cc ?></option>
                        </select>
                    </td>
                    <td align="center" class="prefs" valign="top">
                        contains
                        <td align="left" class="prefs" valign="top">
                            <input type="text" name="contains3" size="20" max="80">
                        </td>
                </tr>
                <tr>
                    <td colspan="4" class="prefs" align="center">
                        Filter Name: <input type="text" name="filtername" size="40" max="80">
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="prefs" align="center">
                        Filter Action: 
                        <input type="radio" name="filter_action" value="MOVE" checked>Move to
                        <?php echo $filter_move_to ?>
                        &nbsp;&nbsp;&nbsp;
                        <input type="radio" name="filter_action" value="DELETE">Delete
                    </td>

                <tr>
                    <td align="center" colspan="4">
                        <table bgcolor="<?php echo $glob_theme->inside_color ?>" width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td align="right" valign="top" width="50%">
                                    <input type="submit" class="button" value="<?php echo $html_submit ?>" />
                                    &nbsp;
                                </td>
                                <td align="left" valign="top" width="50%">
                                    &nbsp;
                                    <input type="reset" class="button" value="<?php echo $html_cancel ?>" />
                                    </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
                    </form>
        </td>
    </tr>
    <tr>
        <td align="center" colspan="2">
            <?php
                if(Exception::isException($ev))
                  echo '<p class="prefs">'.$html_error_occurred.' : '.$ev->getMessage().'</p>';
                elseif(isset($_REQUEST['do']))
                  echo '<p class="prefs">'.$html_prefs_updated.'</p>';
            ?>
        </td>
    </tr>
    <?php echo "<tr>\n    <td align=\"right\" bgcolor=\"$glob_theme->inside_color\">\n";
          echo "        <a href=\"action.php?action=setprefs\" class=\"prefs\">$html_preferences</a>&nbsp|&nbsp".
               "<a href=\"action.php?action=managefolders\" class=\"prefs\">$html_manage_folders_link</a>";
          echo "\n    </td>\n</tr>";
    ?>
</table>
