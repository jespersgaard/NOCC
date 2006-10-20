<!-- start of $Id: menu_inbox_opts.php,v 1.21 2006/10/17 09:32:46 goddess_skuld Exp $ -->
<?php
  if (!isset($conf->loaded))
    die('Hacking attempt');
?>
                    <table>
                      <tr>
                        <td colspan="4">
                          <table>
                            <tr>
                              <td class="menuOpts left">
                                <input type="button" class="button" value="<?php echo htmlentities($html_select_all, ENT_COMPAT, 'UTF-8'); ?>" onselect="SelectAll()" onclick="SelectAll()" />
                              </td>
                              <td class="menuOpts center">
                              <?php
                                if ($pop->is_imap()) {
                                  $html_target_select = $pop->html_folder_select('target_folder', '');
                              ?>
                                <input type="submit" class="button" name="move_mode" value="<?php echo htmlentities($html_move, ENT_COMPAT, 'UTF-8'); ?>" /> <?php echo htmlentities($html_or, ENT_COMPAT, 'UTF-8'); ?>
                                <input type="submit" class="button" name="copy_mode" value="<?php echo htmlentities($html_copy, ENT_COMPAT, 'UTF-8'); ?>" />
                                <label for="target_folder"><?php echo htmlentities($html_messages_to, ENT_COMPAT, 'UTF-8'); ?></label>
                                <?php echo $html_target_select; ?>
                              <?php
                                }
                              ?>
                              </td>
                              <td class="menuOpts right">
                                <?php
                                  if ($pop->is_imap()) {
                                ?>
                                <input type="submit" name="mark_read_mode" class="button" value="<?php echo htmlentities($html_mark_as, ENT_COMPAT, 'UTF-8'); ?>" />
                                <select class="button" name="mark_mode">
                                  <option value="read"><?php echo htmlentities($html_read, ENT_COMPAT, 'UTF-8'); ?></option>
                                  <option value="unread"><?php echo htmlentities($html_unread, ENT_COMPAT, 'UTF-8'); ?></option>
                                </select>
                                <?php
                                  }
                                ?>
                                <input type="submit" name="forward_mode" class="button" value="<?php echo $html_forward; ?>" />
                                <input type="submit" name="delete_mode" class="button" value="<?php echo $html_delete; ?>" onclick="if (confirm('<?php echo $html_del_msg; ?>')) return true; else return false;"/>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
<!-- end of $Id: menu_inbox_opts.php,v 1.21 2006/10/17 09:32:46 goddess_skuld Exp $ -->
