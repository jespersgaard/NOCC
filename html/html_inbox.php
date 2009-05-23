<!-- start of $Id$ -->
<?php
  if (!isset($conf->loaded))
    die('Hacking attempt');

  $even_odd_class = ($tmp['index'] % 2) ? 'even' : 'odd';
  
  $new_class = '';
  if ($_SESSION['ucb_pop_server'] || $pop->is_imap()) {
    if ($tmp['new'] != '' && $tmp['new'] != null && $tmp['new'] != "&nbsp;") {
      $new_class = ' new';
    }
  }
  
  $target_blank = '';
  if (isset($user_prefs->seperate_msg_win) && $user_prefs->seperate_msg_win) {
    $target_blank = ' target="_blank"';
  }
  
  echo '<tr class="'.$even_odd_class.$new_class.'">';
  echo '<td class="column0">';
  echo '  <input type="checkbox" name="msg-'.$tmp['number'].'" value="Y" />';
  echo '</td>';
  foreach ($conf->column_order as $column) { //For all columns...
    echo '<td class="column'.$column; if ($_SESSION['nocc_sort'] == $column) echo ' sorted'; echo '">';
    switch ($column) {
      case '1': //From...
        echo '<a href="'.$_SERVER['PHP_SELF'].'?action=write&amp;mail_to='.convertMailData2Html($tmp['from']).'" title="'.convertMailData2Html($tmp['from']).'">'.convertMailData2Html(display_address($tmp['from']), 55).'</a>&nbsp;';
        break;
      case '2': //To...
        echo convertMailData2Html(display_address($tmp['to']), 55);
        break;
      case '3': //Subject...
        echo '<a href="'.$_SERVER['PHP_SELF'].'?action=aff_mail&amp;mail='.$tmp['number'].'&amp;verbose=0&amp;" title="'; echo $tmp['subject']? convertMailData2Html($tmp['subject']) : $html_nosubject; echo '"'.$target_blank.'>'; echo $tmp['subject']? convertMailData2Html($tmp['subject'], 55) : $html_nosubject; echo '</a>';
        break;
      case '4': //Date...
        echo $tmp['date'] . '&nbsp;' . $tmp['time'];
        break;
      case '5': //Size...
        echo $tmp['size'] . $html_kb;
        break;
      case '6': //Read/Unread...
        echo $tmp['new'];
        break;
      case '7': //Attachment...
        echo $tmp['attach'];
        break;
      case '8': //Priority Text...
        echo $tmp['priority_text'];
        break;
      case '9': //Priority Number...
        echo '<span title="' . $html_priority_label . ' ' . $tmp['priority_text'] . '">' . $tmp['priority'] . '</span>';
        break;
    }
    echo '</td>';
  }
  echo '</tr>';
?>
<!-- end of $Id$ -->
