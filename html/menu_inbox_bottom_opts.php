<!-- start of $Id: menu_inbox_bottom_opts.php,v 1.4 2006/11/22 14:27:17 goddess_skuld Exp $ -->
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
                                <input type="button" class="button" value="<?php echo convertLang2Html($html_select_all); ?>" onselect="SelectAll()" onclick="SelectAll()" />
                              </td>
                              <td class="menuOpts center">
                              <?php
                                if ($pop->is_imap() && $pop->get_folder_count() > 1) {
                                  $html_bottom_target_select = $pop->html_folder_select('bottom_target_folder', '');
                              ?>
                                <input type="submit" class="button" name="bottom_move_mode" value="<?php echo convertLang2Html($html_move); ?>" /> <?php echo convertLang2Html($html_or); ?>
                                <input type="submit" class="button" name="bottom_copy_mode" value="<?php echo convertLang2Html($html_copy); ?>" />
                                <label for="bottom_target_folder"><?php echo convertLang2Html($html_messages_to); ?></label>
                                <?php echo $html_bottom_target_select; ?>
                              <?php
                                }
                              ?>
                              </td>
                              <td class="menuOpts right">
                                <?php
                                  if ($pop->is_imap()) {
                                ?>
                                <input type="submit" name="bottom_mark_read_mode" class="button" value="<?php echo convertLang2Html($html_mark_as); ?>" />
                                <select class="button" name="bottom_mark_mode">
                                  <option value="read"><?php echo convertLang2Html($html_read); ?></option>
                                  <option value="unread"><?php echo convertLang2Html($html_unread); ?></option>
                                </select>
                                <?php
                                  }
                                ?>
                                <input type="submit" name="bottom_forward_mode" class="button" value="<?php echo $html_forward; ?>" />
                                <input type="submit" name="bottom_delete_mode" class="button" value="<?php echo $html_delete; ?>" onclick="if (confirm('<?php echo $html_del_msg; ?>')) return true; else return false;"/>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </form>
<!-- end of $Id: menu_inbox_bottom_opts.php,v 1.4 2006/11/22 14:27:17 goddess_skuld Exp $ -->
