<!-- start of $Id: menu_inbox_opts.php,v 1.15 2004/06/20 09:39:32 goddess_skuld Exp $ -->
                    <table>
                      <tr>
                        <td colspan="4">
                          <table>
                            <tr>
                              <td>
                                <input type="button" class="button" value="<?php echo $html_select_all; ?>" onselect="SelectAll()" onclick="SelectAll()" />
                              </td>
                              <td class="menuOpts">
                              <?php
                                if ($pop->is_imap()) {
                                  $html_target_select = $pop->html_folder_select('target_folder', '');
                              ?>
                                <input type="submit" class="button" name="move_mode" value="<?php echo $html_move; ?>" /> <?php echo $html_or; ?>
                                <input type="submit" class="button" name="copy_mode" value="<?php echo $html_copy; ?>" />
                                <?php echo $html_messages_to; ?>
                                <?php echo $html_target_select; ?>
                              <?php
                                }
                              ?>
                              </td>
                              <td>
                                <?php
                                  if ($pop->is_imap()) {
                                ?>
                                <input type="submit" name="mark_read_mode" class="button" value="<?php echo $html_mark_as; ?>" />
                                <select class="button" name="mark_mode">
                                  <option value="read"><?php echo $html_read; ?></option>
                                  <option value="unread"><?php echo $html_unread; ?></option>
                                </select>
                                <?php
                                  }
                                ?>
                                <input type="submit" name="delete_mode" class="button" value="<?php echo $html_delete; ?>" onclick="if (confirm(\'<?php echo $html_del_msg; ?>\')) return true; else return false;"/>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
<!-- end of $Id: menu_inbox_opts.php,v 1.15 2004/06/20 09:39:32 goddess_skuld Exp $ -->
