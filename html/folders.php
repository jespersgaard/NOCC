<!-- start of $Id: folders.php,v 1.14 2005/08/01 08:11:15 goddess_skuld Exp $ -->
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
            <?php echo $html_folder_create ?> <input class="button" type="text" name="createnewbox" size="15" maxlength="32"/>
          </td>
        </tr>
        <tr>
          <td class="prefsLabel"></td>
          <td class="prefsData">
            <input type="radio" name="do" value="rename_folder"/>
            <?php echo $html_folder_rename ?> <?php echo $renameoldbox ?>
            <?php echo $html_to ?> <input class="button" type="text" name="renamenewbox" size="15" maxlength="32"/>
          </td>
        </tr>
        <tr>
          <td class="prefsLabel"></td>
          <td class="prefsData">
            <input type="radio" name="do" value="subscribe_folder"/>
            <?php echo $html_folder_subscribe ?> <select class="button" name="subscribenewbox"> <?php echo join('', $select_list) ?> </select>
          </td>
        </tr>
        <tr>
          <td class="prefsLabel"></td>
          <td class="prefsData">
            <input type="radio" name="do" value="remove_folder"/>
            <?php echo $html_folder_remove ?> <?php echo $removeoldbox ?>
          </td>
        </tr>
        <tr>
          <td class="prefsLabel"></td>
          <td class="prefsData">
            <input type="radio" name="do" value="delete_folder"/>
            <?php echo $html_folder_delete ?> <select class="button" name="deletebox"> <?php echo join('', $select_list) ?> </select>
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
                  <td><?php echo $html_error_occurred ?></td>
                </tr>
                <tr class="errorText">
                  <td>
                    <p><?php echo $ev->getMessage(); ?></p>
                  </td>
                </tr>
              </table>
            </div>
          <?php
            } else {
              if(isset($_REQUEST['submit_folders']))
                echo '<br />'.$html_folders_updated;
            }
          ?>
          <br /><br />
            <input type="submit" class="button" value="<?php echo $html_submit ?>" />
            &nbsp;&nbsp;
            <input type="reset" class="button" value="<?php echo $html_cancel ?>" />
          </td>
        </tr>
      </table>
    </div>
  </form>
</div>

<div class="IMAPPrefs">
  <a href="action.php?action=setprefs"><?php echo $html_preferences ?></a>
  &nbsp;|&nbsp;
  <a href="action.php?action=managefilters"><?php echo $html_manage_filters_link ?></a>
</div>
<!-- end of $Id: folders.php,v 1.14 2005/08/01 08:11:15 goddess_skuld Exp $ -->
