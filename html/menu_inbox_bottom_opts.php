<!-- start of $Id: menu_inbox_bottom_opts.php,v 1.1 2006/08/02 19:33:36 goddess_skuld Exp $ -->
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
                                  $html_bottom_target_select = $pop->html_folder_select('bottom_target_folder', '');
                              ?>
                                <input type="submit" class="button" name="bottom_move_mode" value="<?php echo htmlentities($html_move, ENT_COMPAT, 'UTF-8'); ?>" /> <?php echo htmlentities($html_or, ENT_COMPAT, 'UTF-8'); ?>
                                <input type="submit" class="button" name="bottom_copy_mode" value="<?php echo htmlentities($html_copy, ENT_COMPAT, 'UTF-8'); ?>" />
                                <label for="bottom_target_folder"><?php echo htmlentities($html_messages_to, ENT_COMPAT, 'UTF-8'); ?></label>
                                <?php echo $html_bottom_target_select; ?>
                              <?php
                                }
                              ?>
                              </td>
                              <td class="menuOpts right">
                                <?php
                                  if ($pop->is_imap()) {
                                ?>
                                <input type="submit" name="bottom_mark_read_mode" class="button" value="<?php echo htmlentities($html_mark_as, ENT_COMPAT, 'UTF-8'); ?>" />
                                <select class="button" name="bottom_mark_mode">
                                  <option value="read"><?php echo htmlentities($html_read, ENT_COMPAT, 'UTF-8'); ?></option>
                                  <option value="unread"><?php echo htmlentities($html_unread, ENT_COMPAT, 'UTF-8'); ?></option>
                                </select>
                                <?php
                                  }
                                ?>
                                <input type="submit" name="bottom_delete_mode" class="button" value="<?php echo $html_delete; ?>" onclick="if (confirm('<?php echo $html_del_msg; ?>')) return true; else return false;"/>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </form>
<!-- end of $Id: menu_inbox_bottom_opts.php,v 1.1 2006/08/02 19:33:36 goddess_skuld Exp $ -->
