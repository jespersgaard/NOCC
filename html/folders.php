<!-- start of $Id$ -->
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
    list($junk,$name) = split($pop->server .'}', $val->name);
    if (strlen($name) <= 32) {
      array_push($big_list, $name);
    }
  }
}

$select_list = array();
if (count($big_list) > 1) {
  for ($i = 0; $i < count($big_list); $i++) {
    array_push($select_list, "\t<option value=\"".$big_list[$i]."\">".mb_convert_encoding($big_list[$i], 'UTF-8', 'UTF7-IMAP')."</option>\n");
  }
}

?>
<div class="prefs">
<h3><?php echo convertLang2Html($html_folders) ?></h3>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div>
      <input type="hidden" name="action" value="managefolders" />
      <input type="hidden" name="submit_folders" value="1" />
      <table>
        <tr>
          <td class="prefsLabel"></td>
          <td class="prefsData">
            <input type="radio" id="do_create_folder" name="do" value="create_folder"/>
            <label for="do_create_folder"><?php echo convertLang2Html($html_folder_create) ?></label> <input class="button" type="text" name="createnewbox" size="15" maxlength="32"/>
          </td>
        </tr>
        <tr>
          <td class="prefsLabel"></td>
          <td class="prefsData">
            <input type="radio" id="do_rename_folder" name="do" value="rename_folder"/>
            <label for="do_rename_folder"><?php echo convertLang2Html($html_folder_rename) ?></label> <?php echo $renameoldbox ?>
            <label for="renamenewbox"><?php echo convertLang2Html($html_folder_to) ?></label> <input class="button" type="text" id="renamenewbox" name="renamenewbox" size="15" maxlength="32"/>
          </td>
        </tr>
        <tr>
          <td class="prefsLabel"></td>
          <td class="prefsData">
            <input type="radio" id="do_subscribe_folder" name="do" value="subscribe_folder"/>
            <label for="do_subscribe_folder"><?php echo convertLang2Html($html_folder_subscribe) ?></label> <select class="button" name="subscribenewbox"> <?php echo join('', $select_list) ?> </select>
          </td>
        </tr>
        <tr>
          <td class="prefsLabel"></td>
          <td class="prefsData">
            <input type="radio" id="do_remove_folder" name="do" value="remove_folder"/>
            <label for="do_remove_folder"><?php echo convertLang2Html($html_folder_remove) ?></label> <?php echo $removeoldbox ?>
          </td>
        </tr>
        <tr>
          <td class="prefsLabel"></td>
          <td class="prefsData">
            <input type="radio" id="do_delete_folder" name="do" value="delete_folder"/>
            <label for="do_delete_folder"><?php echo convertLang2Html($html_folder_delete) ?></label> <select class="button" name="deletebox"> <?php echo join('', $select_list) ?> </select>
          </td>
        </tr>
      </table>
          <?php
            if(NoccException::isException($ev)) {
          ?>
            <div class="error">
              <table class="errorTable">
                <tr class="errorTitle">
                  <td><?php echo convertLang2Html($html_error_occurred) ?></td>
                </tr>
                <tr class="errorText">
                  <td>
                    <p><?php echo convertLang2Html($ev->getMessage()); ?></p>
                  </td>
                </tr>
              </table>
            </div>
          <?php
            } else {
              if(isset($_REQUEST['submit_folders']))
                echo '<p>'.convertLang2Html($html_folders_updated).'</p>';
            }
          ?>
      <p class="sendButtons">
        <input type="submit" class="button" value="<?php echo convertLang2Html($html_submit) ?>" />
        &nbsp;&nbsp;
        <input type="reset" class="button" value="<?php echo convertLang2Html($html_cancel) ?>" />
      </p>
    </div>
  </form>
</div>
<!-- end of $Id$ -->
