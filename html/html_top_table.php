<!-- start of $Id: html_top_table.php,v 1.71 2004/06/19 12:06:48 goddess_skuld Exp $ -->
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
        $prev .= "<img src=\"themes/".$_SESSION['nocc_theme']."/img/left_arrow.gif\" border=\"0\" /></a>\n";
    }
    if($nskip < $pages) {
        $next = "<a href=\"".$_SERVER['PHP_SELF']."?skip=$nskip\">";
        $next .= "<img src=\"themes/".$_SESSION['nocc_theme']."/img/right_arrow.gif\" border=\"0\" /></a>\n";
    }

    $page_line = "<form method=\"post\" action=\"".$_SERVER['PHP_SELF']."\">";
    $page_line .= "$html_page <select name=\"skip\">\n";
    $selected = '';
    for ($i = 0; $i < $pages; $i++) { 
        $current_skip = $i + 1;
        if ($i == $skip) {
            $selected = "selected";
        } else {
            $selected = "";
        }
        $page_line .= "\t<option $selected value=\"$i\">$current_skip</option>\n";
    }
    $page_line .= "</select> $html_of $pages ";
    $page_line .= "<input type=\"submit\" class=\"button\" name=\"submit\" value=\"$html_gotopage\" />";
    $page_line .= "</form>";
}

$fldr_line = "";
$reapply_filters = '';
if ($pop->is_imap()) {
    $fldr_line = "<form method=\"POST\" action=\"".$_SERVER['PHP_SELF']."\">$html_other_folders:  \n";
    $fldr_line .= $pop->html_folder_select('folder', $_SESSION['nocc_folder']);
    $fldr_line .= "<input type=\"submit\" class=\"button\" name=\"submit\" value=\"$html_gotofolder\" />";
    $fldr_line .= "</form>";
    if($pop->folder == 'INBOX') {
        $reapply_filters = '<form method="POST" action="'.$_SERVER['PHP_SELF'].
            "\">$html_reapply_filters<input type=\"checkbox\" name=\"reapply_filters\" value=\"1\">".
            '<input class="button" type="submit" value="'.$html_submit.'"></form>';
    }
}

?>
<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%">
<tr><td bgcolor="<?php echo $glob_theme->inside_color ?>">

<table width="100%" cellpadding="2" cellspacing="1" border="0" bgcolor="<?php echo $glob_theme->inside_color ?>">
    <tr bgcolor="<?php echo $glob_theme->tr_color ?>">
        <td <?php if ($conf->have_ucb_pop_server || $pop->is_imap()) echo 'colspan="5"'; else echo 'colspan="4"'; ?> align="left" class="titlew">
            <b><?php echo $_SESSION['nocc_folder'] ?></b>
        </td>
        <td align="right" class="titlew" colspan="2">
            <?php echo $num_msg ?> <?php if ($num_msg == 1) {echo $html_msg;} else {echo $html_msgs;}?>
        </td>
    </tr>
    <tr bgcolor="<?php echo $glob_theme->inside_color ?>">
        <td colspan="2" align="left" class="inbox">
            <?php echo $fldr_line ?>
        </td>
        <td colspan="2" align="center" class="inbox">
            <?php echo $reapply_filters ?>
        </td>
        <?php if ($conf->have_ucb_pop_server || $pop->is_imap()) { ?>
            <td colspan="2" align="right" class="inbox">
        <?php } else { ?>
            <td align="right" class="inbox">
        <?php } ?>
            <?php echo $page_line ?>
        </td>
        <td align="right" class="inbox">
            <?php echo $prev ?>
            <?php echo $next ?>
        </td>
    </tr>
    <tr bgcolor="<?php echo $glob_theme->inbox_text_color ?>">
        <td align="center" class="inbox">
            <?php echo $html_select ?>
        </td>
        <?php if ($conf->have_ucb_pop_server || $pop->is_imap()) { ?>
        <td align="center" class="inbox">
            <?php echo $html_new ?>
        </td>
        <?php } ?>
        <td align="center" class="inbox">&nbsp;</td>
        <td align="center" class="inbox" <?php if ($_SESSION['nocc_sort'] == 2) echo 'bgcolor="'.$glob_theme->sort_color.'"' ?>>
            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?sort=2&amp;sortdir=<?php echo $new_sortdir ?>">
            <img src="themes/<?php echo $_SESSION['nocc_theme'] ?>/img/<?php echo $arrow ?>.gif" border="0" width="12" height="12" alt="<?php echo $html_sort_by." ".$html_from; ?>" /></a>
            &nbsp;
            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?sort=2&amp;sortdir=<?php echo $new_sortdir ?>">
            <?php echo $html_from ?></a>
        </td>
        <td align="center" class="inbox" <?php if ($_SESSION['nocc_sort'] == 3) echo 'bgcolor="'.$glob_theme->sort_color.'"' ?>>
            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?sort=3&amp;sortdir=<?php echo $new_sortdir ?>">
            <img src="themes/<?php echo $_SESSION['nocc_theme'] ?>/img/<?php echo $arrow ?>.gif" border="0" width="12" height="12" alt="<?php echo $html_sort_by." ".$html_subject; ?>" /></a>
            &nbsp;
            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?sort=3&amp;sortdir=<?php echo $new_sortdir ?>">
            <?php echo $html_subject ?></a>
        </td>
        <td align="center" class="inbox" <?php if ($_SESSION['nocc_sort'] == 1) echo 'bgcolor="'.$glob_theme->sort_color.'"' ?>>
            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?sort=1&amp;sortdir=<?php echo $new_sortdir ?>">
            <img src="themes/<?php echo $_SESSION['nocc_theme'] ?>/img/<?php echo $arrow ?>.gif" border="0" width="12" height="12" alt="<?php echo $html_sort_by." ".$html_date; ?>" /></a>
            &nbsp;
            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?sort=1&amp;sortdir=<?php echo $new_sortdir ?>">
            <?php echo $html_date ?></a>
        </td>
        <td align="right" class="inbox" <?php if ($_SESSION['nocc_sort'] == 6) echo 'bgcolor="'.$glob_theme->sort_color.'"' ?>>
            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?sort=6&amp;sortdir=<?php echo $new_sortdir ?>">
            <img src="themes/<?php echo $_SESSION['nocc_theme'] ?>/img/<?php echo $arrow ?>.gif" border="0" width="12" height="12" alt="<?php echo $html_sort_by." ".$html_size; ?>" /></a>
            &nbsp;
            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?sort=6&amp;sortdir=<?php echo $new_sortdir ?>">
            <?php echo $html_size ?></a>
            <form method="post" action="delete.php" name="delete_form">
        </td>
    </tr>
<!-- start of $Id: html_top_table.php,v 1.71 2004/06/19 12:06:48 goddess_skuld Exp $ -->
