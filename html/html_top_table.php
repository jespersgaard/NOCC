<!-- start of $Id$ -->
<?php
  if (!isset($conf->loaded))
    die('Hacking attempt');

$arrow = ($_SESSION['nocc_sortdir'] == 0) ? 'up' : 'down';
$new_sortdir = ($_SESSION['nocc_sortdir'] == 0) ? 1 : 0;
$skip = (isset($_REQUEST['skip'])) ? $_REQUEST['skip'] : '0';

$pages = $pop->get_page_count($conf);

$page_line = '';

if($pages > 1) {
    $page_line = get_page_nav($pages, $skip);
}

$fldr_line = "";
$reapply_filters = '';
if ($pop->is_imap()) {
    if ($pop->get_folder_count() > 1) {
        $fldr_line = "<form method=\"post\" action=\"".$_SERVER['PHP_SELF']."\"><div><label for=\"folder\">$html_other_folders:</label>  \n";
        $fldr_line .= $pop->html_folder_select('folder', $_SESSION['nocc_folder']);
        $fldr_line .= "<input type=\"submit\" class=\"button\" name=\"submit\" value=\"$html_gotofolder\" />";
        $fldr_line .= "</div></form>";
    }
    if($pop->folder == 'INBOX') {
        $reapply_filters = '<form method="post" action="'.$_SERVER['PHP_SELF'].'"><div>'.
            '<label for="reapply_filters"><input type="checkbox" name="reapply_filters" id="reapply_filters" value="1" /> '.
            $html_reapply_filters.'</label> <input class="button" type="submit" value="'.$html_submit.'" /></div></form>';
    }
}

?>
                <div class="messageSummary">
                  <table>
                    <tr>
                      <td class="left">
                        <?php if ($pop->is_imap()) { ?>
                        <span class="currentInbox"><?php buildfolderlink($_SESSION['nocc_folder']); ?></span>
                        <?php } else { ?>
                        <span class="currentInbox"><?php echo $html_inbox; ?></span>
                        <?php } ?>
                        <a class="rss" href="<?php echo $rss_url ?>" title="RSS"><span class="rssText">(RSS)</span></a>
                        &nbsp;
                        <?php
                          if (NOCC_Session::getQuotaEnable() == true) {
                              if ($_SESSION['quota_type'] == 'STORAGE') {
                                  echo '<span class="currentQuota">' . format_quota($_SESSION['quota'][$_SESSION['quota_type']]['usage']) . '</span><span class="maxQuota"> / ' . format_quota($_SESSION['quota'][$_SESSION['quota_type']]['limit']) . '</span>';
                              } else {
                                  echo '<span class="currentQuota">' . $_SESSION['quota'][$_SESSION['quota_type']]['usage'] . $html_msgs . '</span><span class="maxQuota"> / ' . $_SESSION['quota'][$_SESSION['quota_type']]['limit'] . $html_msgs . '</span>';
                              }
                          }
                        ?>
                      </td>
                      <td class="titlew right">
                        <?php echo $num_msg ?> <?php if ($num_msg == 1) {echo $html_msg;} else {echo $html_msgs;}?>
                      </td>
                    </tr>
                  </table>
                </div>
                <?php if (($pop->is_imap()) || ($pages > 1)) { ?>
                <div class="topNavigation">
                  <table>
                    <tr>
                      <td class="inbox left">
                        <?php echo $fldr_line ?>
                      </td>
                      <td class="inbox center">
                        <?php echo $reapply_filters ?>
                      </td>
                      <td class="inbox right">
                        <?php echo $page_line ?>
                      </td>
                    </tr>
                  </table>
                </div>
                <?php } ?>
                <div class="messageList">
                  <!-- Message list bloc -->
                  <form method="post" action="delete.php" id="delete_form">
                    <?php include('menu_inbox_opts.php'); ?>
                      <table id="inboxTable">
                        <tr>
                          <th class="column0"></th>
                          <?php
                            foreach ($conf->column_order as $column) { //For all columns...
                                switch ($column) {
                                    case '1': $column_title = $html_from; break;
                                    case '2': $column_title = $html_to; break;
                                    case '3': $column_title = $html_subject; break;
                                    case '4': $column_title = $html_date; break;
                                    case '5': $column_title = $html_size; break;
                                    case '6': $column_title = ''; break;
                                    case '7': $column_title = ''; break;
                                    //TODO: Make "Priority" column sortable!
                                    case '8': $column_title = ''; break;
                                    case '9': $column_title = ''; break;
                                }
                                echo '<th class="column'.$column; if ($_SESSION['nocc_sort'] == $column) echo ' sorted'; echo '">';
                                if ($column_title != '') { //If we have a column title...
                                    echo '<a href="'.$_SERVER['PHP_SELF'].'?sort='.$column.'&amp;sortdir='.$new_sortdir.'">'.$column_title.'</a>';
                                    if ($_SESSION['nocc_sort'] == $column) {
                                        echo '&nbsp;';
                                        echo '<a href="'.$_SERVER['PHP_SELF'].'?sort='.$column.'&amp;sortdir='.$new_sortdir.'">';
                                        echo '  <img src="themes/'.$_SESSION['nocc_theme'].'/img/'.$arrow.'.png" class="sort" alt="'.$html_sort.'" title="'.$html_sort_by.' '.$column_title.'" />';
                                        echo '</a>';
                                    }
                                }
                                else { //If we NOT have a column title...
                                    if ($column == '8') { //If "Priority Text" column...
                                        echo $html_priority;
                                    }
                                    elseif ($column == '9') { //If "Priority Number" column...
                                        echo '<span title="' . $html_priority . '">!</span>';
                                    }
                                }
                                echo '</th>';
                            }
                          ?>
                        </tr>
<!-- end of $Id$ -->