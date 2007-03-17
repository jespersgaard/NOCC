<!-- start of $Id: html_inbox.php,v 1.53 2007/02/25 14:05:26 goddess_skuld Exp $ -->
<?php
  if (!isset($conf->loaded))
    die('Hacking attempt');

  if ($conf->have_ucb_pop_server || $pop->is_imap()) {
    if ($tmp['new'] != '' && $tmp['new'] != null && $tmp['new'] != "&nbsp;") {
      $inbox_class = "inbox new";
    } else {
      $inbox_class = "inbox";
    }
  } else {
    $inbox_class = "inbox";
  }
  
  echo '<tr>';
  echo '<td class="'.$inbox_class.'">';
  echo '  <input type="checkbox" name="msg-'.$tmp['number'].'" value="Y" />';
  echo '</td>';
  foreach ($conf->column_order as $column) { //For all columns...
    echo '<td class="'.$inbox_class.'">';
    switch ($column) {
      case '1': //From...
        echo '<a href="'.$_SERVER['PHP_SELF'].'?action=write&amp;mail_to='.convertMailData2Html($tmp['from']).'" title="'.convertMailData2Html($tmp['from']).'">'.convertMailData2Html(display_address($tmp['from'])).'</a>&nbsp;';
        break;
      case '2': //To...
        echo convertMailData2Html(display_address($tmp['to']), 55);
        break;
      case '3': //Subject...
        if(isset($user_prefs->seperate_msg_win) && $user_prefs->seperate_msg_win) {
          echo '<a href="javascript:void(0);" onclick="window.open(\''.$_SERVER['PHP_SELF'].'?action=aff_mail&amp;mail='.$tmp['number'].'&amp;verbose=0&amp;\');" title="'; echo $tmp['subject']? convertMailData2Html($tmp['subject']) : $html_nosubject; echo '">'; echo $tmp['subject']? convertMailData2Html($tmp['subject'], 55) : $html_nosubject; echo '</a>';
        } else {
          echo '<a href="'.$_SERVER['PHP_SELF'].'?action=aff_mail&amp;mail='.$tmp['number'].'&amp;verbose=0&amp;" title="'; echo $tmp['subject']? convertMailData2Html($tmp['subject']) : $html_nosubject; echo '">'; echo $tmp['subject']? convertMailData2Html($tmp['subject'], 55) : $html_nosubject; echo '</a>';
        }
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
    }
    echo '</td>';
  }
  echo '</tr>';
?>
<!-- end of $Id: html_inbox.php,v 1.53 2007/02/25 14:05:26 goddess_skuld Exp $ -->
