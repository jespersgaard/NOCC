<!-- start of $Id: html_mail.php,v 1.1 2006/10/02 07:51:44 goddess_skuld Exp $ -->
<div class="mailNav">
   <table>
<?php
  if (!isset($conf->loaded))
    die('Hacking attempt');

$has_images = eregi('src="none"', $content['body']);
$display_images = (isset($_REQUEST['display_images']) && $_REQUEST['display_images'] == 1) ? '1' : '0';

// Show/hide header link
$verbose = (isset($_REQUEST['verbose']) && $_REQUEST['verbose'] == 1) ? '1' : '0';
if ($conf->use_verbose)
  if($verbose == '1')
    echo '<tr><td class="mailSwitchHeaders"><a href="' . $_SERVER['PHP_SELF'] . '?action=aff_mail&amp;mail=' . $content['msgnum'] . '&amp;verbose=0&amp;display_images='.$display_images.'">' . $html_remove_header . '</a></td>';
  else
    echo '<tr><td class="mailSwitchHeaders"><a href="' . $_SERVER['PHP_SELF'] . '?action=aff_mail&amp;mail=' . $content['msgnum'] . '&amp;verbose=1&amp;display_images='.$display_images.'">' . $html_view_header . '</a></td>';
else
    echo '<tr><td>&nbsp;</td>';

// Next/prev message links
echo '<td class="right">';
if (($content['prev'] != '') && ($content['prev'] != 0))
  echo '<a href="' . $_SERVER['PHP_SELF'] . '?action=aff_mail&amp;mail=' . $content['prev'] . '&amp;verbose=' . $verbose . '"><img src="themes/' . $_SESSION['nocc_theme'] . '/img/left_arrow.png" alt="' . $alt_prev . '" title="' . $title_prev_msg . '" class="navigation" /></a>';
echo "&nbsp;";
if (($content['next'] != '') && ($content['next'] != 0))
  echo '<a href="' . $_SERVER['PHP_SELF'] . '?action=aff_mail&amp;mail=' . $content['next'] . '&amp;verbose=' . $verbose . '"><img src="themes/' . $_SESSION['nocc_theme'] . '/img/right_arrow.png" alt="' . $alt_next . '" title="' . $title_next_msg . '" class="navigation" /></a>';
echo "</td></tr>";

// If not displaying verbose headers, display normal headers
if ($conf->use_verbose && $verbose == '0') {
  echo '<tr><th class="mailHeaderLabel">'.$html_from.':</th><td class="mailHeaderData">'.htmlspecialchars($content['from']).'</td></tr>';
  echo '<tr><th class="mailHeaderLabel">'.$html_to.':</th><td class="mailHeaderData">'.htmlspecialchars($content['to']).'</td></tr>';
  if ($content['cc'] != '') {
    echo '<tr><th class="mailHeaderLabel">'.$html_cc.':</th><td class="mailHeaderData">'.htmlspecialchars($content['cc']).'</td></tr>';
  }

if ($content['subject'] == '')
    $content['subject'] = $html_nosubject;
  echo '<tr><th class="mailHeaderLabel">'.$html_subject.':</th><td class="mailHeaderData">'.htmlspecialchars($content['subject']).'</td></tr>';
  echo '<tr><th class="mailHeaderLabel">'.$html_date.':</th><td class="mailHeaderData">'.$content['date'].'</td></tr>';
  if($content['att'] != '') {
    echo $content['att'];
  }
  echo '<tr><th class="mailHeaderLabel">' . $html_encoding . ':</th><td class="mailHeaderData">';
  echo '<form id="encoding" action="action.php" method="post"><div>';
  echo '<input type="hidden" name="action" value="' . $_REQUEST['action'] . '"/>';
  echo '<input type="hidden" name="mail" value="' . $_REQUEST['mail'] . '"/>';
  echo '<input type="hidden" name="verbose" value="' . $_REQUEST['verbose'] . '"/>';
  echo '<select class="button" name="user_charset">';
  for ($i = 0; $i < sizeof($charset_array); $i++) {
    echo '<option value="'.$charset_array[$i]->charset.'"';
    if (isset($_REQUEST['user_charset']) && $_REQUEST['user_charset'] == $charset_array[$i]->charset
        || ((!isset($_REQUEST['user_charset']) || $_REQUEST['user_charset'] == '') && strtolower($content['charset']) == strtolower($charset_array[$i]->charset)))
      echo ' selected="selected"';
    echo '>'.$charset_array[$i]->label.'</option>';
  }
  echo '</select>&nbsp;&nbsp<input name="submit" class="button" type="submit" value="' . $html_submit . '" />';
  echo '</div></form>';
  echo '</td></tr>';
}

if ($has_images && $display_images != 1) {
  echo('<tr>');
  echo('<td colspan="2">');
  echo('<div class="nopic">');
  echo($html_images_warning);
  echo('<br/>');
  echo('<a href="'.$_SERVER['PHP_SELF'].'?action=aff_mail&mail='.$content['msgnum'].'&verbose='.$verbose.'&display_images=1">'.$html_images_display.'</a>');
  echo('</div>');
  echo('</td>');
  echo('</tr>');
}
?>
   </table>
</div>
<div class="mailData">
<?php

global $conf;

  if (!isset($conf->loaded))
    die('Hacking attempt');

// If not displaying verbose headers, display normal headers
if (!($conf->use_verbose && $verbose == '0')) {
  if($content['att'] != '') {
    echo '<table>';
    echo $content['att'];
    echo '</table>';
  }
  echo '<div class="mail"><pre>'.htmlspecialchars($content['header']).'</pre></div>';
}

echo '<div class="mail">'.$content['body'].'</div>';

?>
</div>
<!-- end of $Id: html_mail.php,v 1.1 2006/10/02 07:51:44 goddess_skuld Exp $ -->