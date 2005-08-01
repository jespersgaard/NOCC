<div class="prefs">
  <?php if ($html_filter_select) { ?>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div>
      <input type="hidden" name="action" value="managefilters" />
      <input type="hidden" name="do" value="delete" />
      <table>
        <tr>
          <td class="center">
            <?php echo $html_filter_select ?>
          </td>
        </tr>
        <tr>
          <td class="center" colspan="4">
            <input type="submit" class="button" value="<?php echo $html_filter_remove ?>" />
          </td>
        </tr>
      </table>
    </div>
  </form>
  <?php } ?>
  <?php 
    if ($html_filter_select) {
      echo "$html_filter_change_tip";
    }
  ?>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div>
      <input type="hidden" name="action" value="managefilters" />
      <input type="hidden" name="do" value="create" />
      <table>
        <tr>
          <td class="prefsLabel">
            <select class="button" name="thing1">
              <option value="-" selected="selected"><?php echo $html_select_one ?></option>
              <option value="BODY"><?php echo $html_filter_body ?></option>
              <option value="SUBJECT"><?php echo $html_filter_subject ?></option>
              <option value="TO"><?php echo $html_filter_to ?></option>
              <option value="FROM"><?php echo $html_filter_from ?></option>
              <option value="CC"><?php echo $html_filter_cc ?></option>
            </select>
          </td>
          <td class="prefsData">
            <?php echo $html_filter_contains ?>
            <input class="button" type="text" name="contains1" size="20" maxlength="80"/>
          </td>
        </tr>
        <tr>
          <td class="prefsLabel">
            <?php echo $html_and ?>&nbsp;
            <select class="button" name="thing2">
              <option value="-" selected="selected"><?php echo $html_select_one ?></option>
              <option value="BODY"><?php echo $html_filter_body ?></option>
              <option value="SUBJECT"><?php echo $html_filter_subject ?></option>
              <option value="TO"><?php echo $html_filter_to ?></option>
              <option value="FROM"><?php echo $html_filter_from ?></option>
              <option value="CC"><?php echo $html_filter_cc ?></option>
            </select>
          </td>
          <td class="prefsData">
            <?php echo $html_filter_contains ?>
            <input class="button" type="text" name="contains2" size="20" maxlength="80"/>
          </td>
        </tr>
        <tr>
          <td class="prefsLabel">
            <?php echo $html_and ?>&nbsp;
            <select class="button" name="thing3">
              <option value="-" selected="selected"><?php echo $html_select_one ?></option>
              <option value="BODY"><?php echo $html_filter_body ?></option>
              <option value="SUBJECT"><?php echo $html_filter_subject ?></option>
              <option value="TO"><?php echo $html_filter_to ?></option>
              <option value="FROM"><?php echo $html_filter_from ?></option>
              <option value="CC"><?php echo $html_filter_cc ?></option>
            </select>
          </td>
          <td class="prefsData">
            <?php echo $html_filter_contains ?>
            <input class="button" type="text" name="contains3" size="20" maxlength="80"/>
          </td>
        </tr>
        <tr>
          <td class="prefsLabel">
            <?php echo $html_filter_name ?>:
          </td>
          <td class="prefsData">
            <input class="button" type="text" name="filtername" size="40" maxlength="80"/>
          </td>
        </tr>
        <tr>
          <td class="prefsLabel">
            <?php echo $html_filter_action ?>:
          </td>
          <td class="prefsData">
            <input type="radio" name="filter_action" value="MOVE" checked="checked" /><?php echo $html_filter_moveto ?>
            <?php echo $filter_move_to ?>
            &nbsp;&nbsp;&nbsp;
            <input type="radio" name="filter_action" value="DELETE"/><?php echo $html_filter_remove ?>
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
                if(isset($_REQUEST['do']))
                  echo '<br />' . $html_prefs_updated;
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
  <a href="action.php?action=managefolders"><?php echo $html_manage_folders_link ?></a>
</div>
<!-- end of $Id: filter_prefs.php,v 1.35 2005/07/07 10:22:46 goddess_skuld Exp $ -->
