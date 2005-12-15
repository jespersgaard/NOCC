<!-- start of $Id: html_top_table.php,v 1.78 2005/08/03 17:48:09 goddess_skuld Exp $ -->
<?php

require_once 'class_local.php';
require_once 'conf.php';

$per_page = get_per_page();

$arrow = ($_SESSION['nocc_sortdir'] == 0) ? 'up' : 'down';
$new_sortdir = ($_SESSION['nocc_sortdir'] == 0) ? 1 : 0;
$skip = (isset($_REQUEST['skip'])) ? $_REQUEST['skip'] : '0';

$pages = $pop->get_page_count($conf);

$page_line = '';
$this_page = '';
$prev = '';
$next = '';

if($pages > 1) {
    $nskip = $skip + 1;
    $pskip = $skip - 1;
    $this_page = $skip + 1;
    if($pskip > -1 ) {
        $prev = "<a href=\"".$_SERVER['PHP_SELF']."?skip=$pskip\">";
        $prev .= "<img class=\"navigation\" src=\"themes/".$_SESSION['nocc_theme']."/img/left_arrow.png\" alt=\"".$alt_prev."\"/></a>\n";
    }
    if($nskip < $pages) {
        $next = "<a href=\"".$_SERVER['PHP_SELF']."?skip=$nskip\">";
        $next .= "<img class=\"navigation\" src=\"themes/".$_SESSION['nocc_theme']."/img/right_arrow.png\" alt=\"".$alt_next."\"/></a>\n";
    }

    $page_line = "<form method=\"post\" action=\"".$_SERVER['PHP_SELF']."\"><div>";
    $page_line .= "$html_page <select class=\"button\" name=\"skip\">\n";
    $selected = '';
    for ($i = 0; $i < $pages; $i++) { 
        $current_skip = $i + 1;
        if ($i == $skip) {
            $selected = "selected=\"selected\"";
        } else {
            $selected = "";
        }
        $page_line .= "\t<option $selected value=\"$i\">$current_skip</option>\n";
    }
    $page_line .= "</select> $html_of $pages ";
    $page_line .= "<input type=\"submit\" class=\"button\" name=\"submit\" value=\"$html_gotopage\" />";
    $page_line .= "</div></form>";
}

$fldr_line = "";
$reapply_filters = '';
if ($pop->is_imap()) {
    $fldr_line = "<form method=\"post\" action=\"".$_SERVER['PHP_SELF']."\"><div>$html_other_folders:  \n";
    $fldr_line .= $pop->html_folder_select('folder', $_SESSION['nocc_folder']);
    $fldr_line .= "<input type=\"submit\" class=\"button\" name=\"submit\" value=\"$html_gotofolder\" />";
    $fldr_line .= "</div></form>";
    if($pop->folder == 'INBOX') {
        $reapply_filters = '<form method="post" action="'.$_SERVER['PHP_SELF'].
            "\"><div>$html_reapply_filters<input type=\"checkbox\" name=\"reapply_filters\" value=\"1\" />".
            '<input class="button" type="submit" value="'.$html_submit.'" /></div></form>';
    }
}

?>
                <div class="messageSummary">
                  <table>
                    <tr>
                      <td class="left">
                        <?php if ($_SESSION['nocc_folder'] != 'INBOX') { ?>
                        <span class="currentInbox"><?php echo $_SESSION['nocc_folder']; ?></span> 
                        <?php } else { ?>
                        <span class="currentInbox"><?php echo $html_inbox; ?></span>
                        <?php } ?>
                        <a class="rss" href="<?php echo $rss_url ?>"><span class="rssText">(RSS)</span></a>
                        &nbsp;
                        <?php
                          if (isset($conf->quota_enable) && $conf->quota_enable == true) { 
                            if ($conf->quota_type == 'STORAGE') {
                              echo '<span class="currentQuota">' . $_SESSION['quota'][$conf->quota_type]['usage'] . $html_kb . '</span><span class="maxQuota"> / ' . $_SESSION['quota'][$conf->quota_type]['limit'] . $html_kb . '</span>';
                            } else {
                              echo '<span class="currentQuota">' . $_SESSION['quota'][$conf->quota_type]['usage'] . $html_msgs . '</span><span class="maxQuota"> / ' . $_SESSION['quota'][$conf->quota_type]['limit'] . $html_msgs . '</span>';
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
                <div class="topNavigation">
                  <table>
                    <tr>
                      <td class="inbox left">
                        <?php echo $fldr_line ?>
                      </td>
                      <td class="inbox center">
                        <?php echo $reapply_filters ?>
                      </td>
                      <?php if ($conf->have_ucb_pop_server || $pop->is_imap()) { ?>
                      <td class="inbox right">
                      <?php } else { ?>
                      <td class="inbox right">
                      <?php } ?>
                        <?php echo $page_line ?>
                      </td>
                      <td class="inbox right">
                        <?php echo $prev ?>
                        <?php echo $next ?>
                      </td>
                    </tr>
                  </table>
                </div>
                <div class="messageList">
                  <!-- Message list bloc -->
                  <form method="post" action="delete.php" id="delete_form">
                    <div>
                    <?php include('menu_inbox_opts.php'); ?>
                      <table>
                        <tr>
                          <td class="inboxHeader<?php if ($_SESSION['nocc_sort'] == 2) echo 'Sorted' ?>">
                            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?sort=2&amp;sortdir=<?php echo $new_sortdir ?>">
                              <img src="themes/<?php echo $_SESSION['nocc_theme'] ?>/img/<?php echo $arrow ?>.png" class="sort" alt="<?php echo $html_sort_by." ".$html_from; ?>" /></a>
                            &nbsp;
                            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?sort=2&amp;sortdir=<?php echo $new_sortdir ?>"><?php echo $html_from ?></a>
                          </td>
                          <td class="inboxHeader<?php if ($_SESSION['nocc_sort'] == 4) echo 'Sorted' ?>">
                            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?sort=4&amp;sortdir=<?php echo $new_sortdir ?>">
                              <img src="themes/<?php echo $_SESSION['nocc_theme'] ?>/img/<?php echo $arrow ?>.png" class="sort" alt="<?php echo $html_sort_by." ".$html_to; ?>" /></a>
                            &nbsp;
                            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?sort=4&amp;sortdir=<?php echo $new_sortdir ?>"><?php echo $html_to ?></a>
                          </td>
                          <td class="inboxHeader<?php if ($_SESSION['nocc_sort'] == 3) echo 'Sorted' ?>">
                            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?sort=3&amp;sortdir=<?php echo $new_sortdir ?>">
                              <img src="themes/<?php echo $_SESSION['nocc_theme'] ?>/img/<?php echo $arrow ?>.png" class="sort" alt="<?php echo $html_sort_by." ".$html_subject; ?>" /></a>
                            &nbsp;
                            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?sort=3&amp;sortdir=<?php echo $new_sortdir ?>"><?php echo $html_subject ?></a>
                          </td>
                          <td class="inboxHeader<?php if ($_SESSION['nocc_sort'] == 1) echo 'Sorted' ?>">
                            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?sort=1&amp;sortdir=<?php echo $new_sortdir ?>">
                              <img src="themes/<?php echo $_SESSION['nocc_theme'] ?>/img/<?php echo $arrow ?>.png" class="sort" alt="<?php echo $html_sort_by." ".$html_date; ?>" /></a>
                            &nbsp;
                            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?sort=1&amp;sortdir=<?php echo $new_sortdir ?>"><?php echo $html_date ?></a>
                          </td>
                          <td class="inboxHeader<?php if ($_SESSION['nocc_sort'] == 6) echo 'Sorted' ?>">
                            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?sort=6&amp;sortdir=<?php echo $new_sortdir ?>">
                              <img src="themes/<?php echo $_SESSION['nocc_theme'] ?>/img/<?php echo $arrow ?>.png" class="sort" alt="<?php echo $html_sort_by." ".$html_size; ?>" /></a>
                            &nbsp;
                            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?sort=6&amp;sortdir=<?php echo $new_sortdir ?>"><?php echo $html_size ?></a>
                          </td>
                        </tr>
<!-- end of $Id: html_top_table.php,v 1.78 2005/08/03 17:48:09 goddess_skuld Exp $ -->
