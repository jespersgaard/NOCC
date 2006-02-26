<?php
  if (!isset($conf->loaded))
    die('Hacking attempt');
?>

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
    <input type="submit" class="button" value="<?php echo htmlentities($html_filter_remove, ENT_COMPAT, 'UTF-8') ?>" />
  </td>
</tr>
</table>
</div>
</form>
<?php } ?>
<?php 
if ($html_filter_select) {
echo htmlentities($html_filter_change_tip, ENT_COMPAT, 'UTF-8');
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
      <option value="-" selected="selected"><?php echo htmlentities($html_select_one, ENT_COMPAT, 'UTF-8') ?></option>
      <option value="BODY"><?php echo htmlentities($html_filter_body, ENT_COMPAT, 'UTF-8') ?></option>
      <option value="SUBJECT"><?php echo htmlentities($html_filter_subject, ENT_COMPAT, 'UTF-8') ?></option>
      <option value="TO"><?php echo htmlentities($html_filter_to, ENT_COMPAT, 'UTF-8') ?></option>
      <option value="FROM"><?php echo htmlentities($html_filter_from, ENT_COMPAT, 'UTF-8') ?></option>
      <option value="CC"><?php echo htmlentities($html_filter_cc, ENT_COMPAT, 'UTF-8') ?></option>
    </select>
  </td>
  <td class="prefsData">
    <?php echo htmlentities($html_filter_contains, ENT_COMPAT, 'UTF-8') ?>
    <input class="button" type="text" name="contains1" size="20" maxlength="80"/>
  </td>
</tr>
<tr>
  <td class="prefsLabel">
    <?php echo htmlentities($html_and, ENT_COMPAT, 'UTF-8') ?>&nbsp;
    <select class="button" name="thing2">
      <option value="-" selected="selected"><?php echo htmlentities($html_select_one, ENT_COMPAT, 'UTF-8') ?></option>
      <option value="BODY"><?php echo htmlentities($html_filter_body, ENT_COMPAT, 'UTF-8') ?></option>
      <option value="SUBJECT"><?php echo htmlentities($html_filter_subject, ENT_COMPAT, 'UTF-8') ?></option>
      <option value="TO"><?php echo htmlentities($html_filter_to, ENT_COMPAT, 'UTF-8') ?></option>
      <option value="FROM"><?php echo htmlentities($html_filter_from, ENT_COMPAT, 'UTF-8') ?></option>
      <option value="CC"><?php echo htmlentities($html_filter_cc, ENT_COMPAT, 'UTF-8') ?></option>
    </select>
  </td>
  <td class="prefsData">
    <?php echo htmlentities($html_filter_contains, ENT_COMPAT, 'UTF-8') ?>
    <input class="button" type="text" name="contains2" size="20" maxlength="80"/>
  </td>
</tr>
<tr>
  <td class="prefsLabel">
    <?php echo htmlentities($html_and, ENT_COMPAT, 'UTF-8') ?>&nbsp;
    <select class="button" name="thing3">
      <option value="-" selected="selected"><?php echo htmlentities($html_select_one, ENT_COMPAT, 'UTF-8') ?></option>
      <option value="BODY"><?php echo htmlentities($html_filter_body, ENT_COMPAT, 'UTF-8') ?></option>
      <option value="SUBJECT"><?php echo htmlentities($html_filter_subject, ENT_COMPAT, 'UTF-8') ?></option>
      <option value="TO"><?php echo htmlentities($html_filter_to, ENT_COMPAT, 'UTF-8') ?></option>
      <option value="FROM"><?php echo htmlentities($html_filter_from, ENT_COMPAT, 'UTF-8') ?></option>
      <option value="CC"><?php echo htmlentities($html_filter_cc, ENT_COMPAT, 'UTF-8') ?></option>
    </select>
  </td>
  <td class="prefsData">
    <?php echo htmlentities($html_filter_contains, ENT_COMPAT, 'UTF-8') ?>
    <input class="button" type="text" name="contains3" size="20" maxlength="80"/>
  </td>
</tr>
<tr>
  <td class="prefsLabel">
    <?php echo htmlentities($html_filter_name, ENT_COMPAT, 'UTF-8') ?>:
  </td>
  <td class="prefsData">
    <input class="button" type="text" name="filtername" size="40" maxlength="80"/>
  </td>
</tr>
<tr>
  <td class="prefsLabel">
    <?php echo htmlentities($html_filter_action, ENT_COMPAT, 'UTF-8') ?>:
  </td>
  <td class="prefsData">
    <input type="radio" name="filter_action" value="MOVE" checked="checked" /><?php echo htmlentities($html_filter_moveto, ENT_COMPAT, 'UTF-8') ?>
    <?php echo $filter_move_to ?>
    &nbsp;&nbsp;&nbsp;
    <input type="radio" name="filter_action" value="DELETE"/><?php echo htmlentities($html_filter_remove, ENT_COMPAT, 'UTF-8') ?>
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
	    <td><?php echo htmlentities($html_error_occurred, ENT_COMPAT, 'UTF-8') ?></td>
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
	if(isset($_REQUEST['do']))
	  echo '<br />' . htmlentities($html_prefs_updated, ENT_COMPAT, 'UTF-8');
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
<a href="action.php?action=managefolders"><?php echo htmlentities($html_manage_folders_link, ENT_COMPAT, 'UTF-8') ?></a>
</div>
<!-- end of $Id: filter_prefs.php,v 1.6 2005/08/01 08:11:15 goddess_skuld Exp $ -->
