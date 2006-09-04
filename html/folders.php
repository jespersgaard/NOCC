<!-- start of $Id: folders.php,v 1.16 2006/02/26 11:07:52 goddess_skuld Exp $ -->
<?php
  if (!isset($conf->loaded))
    die('Hacking attempt');

$renameoldbox = $pop->html_folder_select('renameoldbox', '');
$removeoldbox = $pop->html_folder_select('removeoldbox', '');

$all_mailboxes = $pop->getmailboxes($ev);

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
    array_push($select_list, "\t<option value=\"".$big_list[$i]."\">".$big_list[$i]."</option>\n");
  }
}

?>
<div class="prefs">
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div>
      <input type="hidden" name="action" value="managefolders" />
      <input type="hidden" name="submit_folders" value="1" />
      <table>
        <tr>
          <td class="prefsLabel"></td>
          <td class="prefsData">
            <input type="radio" name="do" value="create_folder"/>
            <?php echo htmlentities($html_folder_create, ENT_COMPAT, 'UTF-8') ?> <input class="button" type="text" name="createnewbox" size="15" maxlength="32"/>
          </td>
        </tr>
        <tr>
          <td class="prefsLabel"></td>
          <td class="prefsData">
            <input type="radio" name="do" value="rename_folder"/>
            <?php echo htmlentities($html_folder_rename, ENT_COMPAT, 'UTF-8') ?> <?php echo $renameoldbox ?>
            <?php echo htmlentities($html_folder_to, ENT_COMPAT, 'UTF-8') ?> <input class="button" type="text" name="renamenewbox" size="15" maxlength="32"/>
          </td>
        </tr>
        <tr>
          <td class="prefsLabel"></td>
          <td class="prefsData">
            <input type="radio" name="do" value="subscribe_folder"/>
            <?php echo htmlentities($html_folder_subscribe, ENT_COMPAT, 'UTF-8') ?> <select class="button" name="subscribenewbox"> <?php echo join('', $select_list) ?> </select>
          </td>
        </tr>
        <tr>
          <td class="prefsLabel"></td>
          <td class="prefsData">
            <input type="radio" name="do" value="remove_folder"/>
            <?php echo htmlentities($html_folder_remove, ENT_COMPAT, 'UTF-8') ?> <?php echo $removeoldbox ?>
          </td>
        </tr>
        <tr>
          <td class="prefsLabel"></td>
          <td class="prefsData">
            <input type="radio" name="do" value="delete_folder"/>
            <?php echo htmlentities($html_folder_delete, ENT_COMPAT, 'UTF-8') ?> <select class="button" name="deletebox"> <?php echo join('', $select_list) ?> </select>
          </td>
        </tr>
        <tr>
          <td class="center" colspan="2">
          <?php
            if(NoccException::isException($ev)) {
          ?>
            <div class="error">
              <table class="errorTable">
                <tr class="errorTitle">
                  <td><?php echo htmlentities($html_error_occurred) ?></td>
                </tr>
                <tr class="errorText">
                  <td>
                    <p><?php echo htmlentities($ev->getMessage(), ENT_COMPAT, 'UTF-8'); ?></p>
                  </td>
                </tr>
              </table>
            </div>
          <?php
            } else {
              if(isset($_REQUEST['submit_folders']))
                echo '<br />'.htmlentities($html_folders_updated, ENT_COMPAT, 'UTF-8');
            }
          ?>
          <br /><br />
            <input type="submit" class="button" value="<?php echo htmlentities($html_submit, ENT_COMPAT, 'UTF-8') ?>" />
            &nbsp;&nbsp;
            <input type="reset" class="button" value="<?php echo htmlentities($html_cancel, ENT_COMPAT, 'UTF-8') ?>" />
          </td>
        </tr>
      </table>
    </div>
  </form>
</div>

<div class="IMAPPrefs">
  <a href="action.php?action=setprefs"><?php echo htmlentities($html_preferences, ENT_COMPAT, 'UTF-8') ?></a>
  &nbsp;|&nbsp;
  <a href="action.php?action=managefilters"><?php echo htmlentities($html_manage_filters_link, ENT_COMPAT, 'UTF-8') ?></a>
</div>
<!-- end of $Id: folders.php,v 1.16 2006/02/26 11:07:52 goddess_skuld Exp $ -->
