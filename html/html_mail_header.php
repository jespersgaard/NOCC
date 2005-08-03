<!-- start of $Id: html_mail_header.php,v 1.37 2005/08/01 08:11:16 goddess_skuld Exp $ -->
<?php

global $conf;

// Show/hide header link
$verbose = (isset($_REQUEST['verbose']) && $_REQUEST['verbose'] == 1) ? '1' : '0';
if ($conf->use_verbose)
  if($verbose == '1')
    echo '<tr><td class="mailSwitchHeaders"><a href="' . $_SERVER['PHP_SELF'] . '?action=aff_mail&amp;mail=' . $content['msgnum'] . '&amp;verbose=0">' . $html_remove_header . '</a></td>';
  else
    echo '<tr><td class="mailSwitchHeaders"><a href="' . $_SERVER['PHP_SELF'] . '?action=aff_mail&amp;mail=' . $content['msgnum'] . '&amp;verbose=1">' . $html_view_header . '</a></td>';
else
    echo '<tr><td>&nbsp;</td>';

// Next/prev message links
echo '<td class="right">';
if (($content['prev'] != '') && ($content['prev'] != 0))
  echo '<a href="' . $_SERVER['PHP_SELF'] . '?action=aff_mail&amp;mail=' . $content['prev'] . '&amp;verbose=' . $verbose . '"><img src="themes/' . $_SESSION['nocc_theme'] . '/img/left_arrow.png" alt="' . $alt_prev . '" title="' . $alt_prev . '" class="navigation" /></a>';
echo "&nbsp;";
if (($content['next'] != '') && ($content['next'] != 0))
  echo '<a href="' . $_SERVER['PHP_SELF'] . '?action=aff_mail&amp;mail=' . $content['next'] . '&amp;verbose=' . $verbose . '"><img src="themes/' . $_SESSION['nocc_theme'] . '/img/right_arrow.png" alt="' . $alt_next . '" title="' . $alt_next . '" class="navigation" /></a>';
echo "</td></tr>";

// If not displaying verbose headers, display normal headers
if ($conf->use_verbose && $verbose == '0') {
  echo '<tr><td class="mailHeaderLabel">'.$html_from.' :</td><td class="mailHeaderData">'.htmlspecialchars($content['from']).'</td></tr>';
  echo '<tr><td class="mailHeaderLabel">'.$html_to.' :</td><td class="mailHeaderData">'.htmlspecialchars($content['to']).'</td></tr>';
  if ($content['cc'] != '') {
    echo '<tr><td class="mailHeaderLabel">'.$html_cc.' :</td><td class="mailHeaderData">'.htmlspecialchars($content['cc']).'</td></tr>';
  }
  if ($content['subject'] == '')
    $content['subject'] = $html_nosubject;
  echo '<tr><td class="mailHeaderLabel">'.$html_subject.' :</td><td class="mailHeaderData">'.htmlspecialchars($content['subject']).'</td></tr>';
  echo '<tr><td class="mailHeaderLabel">'.$html_date.' :</td><td class="mailHeaderData">'.$content['date'].'</td></tr>';
  if($content['att'] != '') {
    echo $content['att'];
  }
  echo '<tr><td class="mailHeaderLabel">' . $html_encoding . ' :</td><td class="mailHeaderData">';
  echo '<form id="encoding" action="action.php" method="post"><div>';
  echo '<input type="hidden" name="action" value="' . $_REQUEST['action'] . '"/>';
  echo '<input type="hidden" name="mail" value="' . $_REQUEST['mail'] . '"/>';
  echo '<input type="hidden" name="verbose" value="' . $_REQUEST['verbose'] . '"/>';
  echo '<select class="button" name="user_charset">';
  for ($i = 0; $i < sizeof($charset_array); $i++) {
    echo '<option value="'.$charset_array[$i]->charset.'"';
    if ($_REQUEST['user_charset'] == $charset_array[$i]->charset
        || ((!isset($_REQUEST['user_charset']) || $_REQUEST['user_charset'] == '') && strtolower($content['charset']) == strtolower($charset_array[$i]->charset)))
      echo ' selected="selected"';
    echo '>'.$charset_array[$i]->label.'</option>';
  }
  echo '</select>&nbsp;&nbsp<input name="submit" class="button" type="submit" value="' . $html_submit . '" />';
  echo '</div></form>';
  echo '</td></tr>';
}
else {
  if($content['att'] != '') {
    echo $content['att'];
  }
  echo '<tr><td colspan="2" class="mail"><pre>'.htmlspecialchars($content['header']).'</pre></td></tr>';
}

echo '<tr><td colspan="2" class="mail">'.$content['body'].'</td></tr>';

?>

<!-- end of $Id: html_mail_header.php,v 1.37 2005/08/01 08:11:16 goddess_skuld Exp $ -->
