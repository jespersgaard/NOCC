<!-- start of $Id: html_top_table.php,v 1.56 2002/04/18 22:28:26 rossigee Exp $ -->
<?php

require_once 'class_local.php';
require_once 'conf.php';

$per_page = (getPref('msg_per_page')) ? getPref('msg_per_page') : (($conf->msg_per_page) ? $conf->msg_per_page : '25');

$arrow = ($sortdir == 0) ? 'up' : 'down';
$new_sortdir = ($sortdir == 0) ? 1 : 0;
$skip = ($skip) ? $skip : '0';

$pages = $pop->get_page_count($conf);

$page_line = '';
$this_page = '';

if($pages > 1) {
    $prev = '';
    $next = '';
    $nskip = $skip + 1;
    $pskip = $skip - 1;
    $this_page = $skip + 1;
    if($pskip > -1 ) {
        $prev = "<a href=\"$PHP_SELF?skip=$pskip\">";
        $prev .= "<img src=\"themes/".$theme."/img/left_arrow.gif\" border=\"0\" /></a>\n";
    }
    if($nskip < $pages) {
        $next = "<a href=\"$PHP_SELF?skip=$nskip\">";
        $next .= "<img src=\"themes/".$theme."/img/right_arrow.gif\" border=\"0\" /></a>\n";
    }

    $page_line = "<form method=\"POST\" action=\"$PHP_SELF\">";
    $page_line = "<input type=\"hidden\" name=\"folder\" value=\"$folder\" />";
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
    $page_line .= "</select> $html_of $pages";
    $page_line .= "<input type=\"submit\" class=\"button\" name=\"submit\" value=\"$html_gotopage\" />";
    $page_line .= "</form>";
}

if ($pop->is_imap()) {
    $fldr_line = "<form method=\"POST\" action=\"$PHP_SELF\">$html_other_folders:  \n";
    $fldr_line .= $pop->html_folder_select('folder', $folder);
    $fldr_line .= "<input type=\"submit\" class=\"button\" name=\"submit\" value=\"$html_gotofolder\" />";
    $fldr_line .= "</form>";
}

?>
<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%">
<tr><td bgcolor="<?php echo $glob_theme->inside_color ?>">

<table width="100%" cellpadding="2" cellspacing="1" border="0" bgcolor="<?php echo $glob_theme->inside_color ?>">
    <tr bgcolor="<?php echo $glob_theme->tr_color ?>">
        <td <?php if (($is_imap) || ($conf->have_ucb_pop_server)) echo 'colspan="5"'; else echo 'colspan="4"'; ?>align="left" class="titlew">
            <b><?php echo $folder ?></b>
        </td>
        <td align="right" class="titlew" colspan="2">
            <?php echo $num_msg ?> <?php if ($num_msg == 1) {echo $html_msg;} else {echo $html_msgs;}?>
        </td>
    </tr>
    <tr bgcolor="<?php echo $glob_theme->inside_color ?>">
        <td <?php if (($is_imap) || ($conf->have_ucb_pop_server)) echo 'colspan="3"'; else echo 'colspan="2"'; ?>align="left" class="inbox">
            <?php echo $fldr_line ?>
    </td>
    <td colspan="2" align="right" class="inbox">
            <?php echo $page_line ?>
    </td>
    <td colspan="2" align="right" class="inbox">
            <?php echo $prev ?>
            <?php echo $next ?>
    </td>
    </tr>
    <tr bgcolor="<?php echo $glob_theme->inbox_text_color ?>">
        <td align="center" class="inbox">
            <?php echo $html_select ?>
        </td>
        <?php if (($is_imap) || ($conf->have_ucb_pop_server)) { ?>
        <td align="center" class="inbox">
            <?php echo $html_new ?>
        </td>
        <?php } ?>
        <td align="center" class="inbox">&nbsp;</td>
        <td align="center" class="inbox" <?php if ($sort == 2) echo 'bgcolor="'.$glob_theme->sort_color.'"' ?>>
            <a href="<?php echo $PHP_SELF ?>?sort=2&amp;sortdir=<?php echo $new_sortdir ?>">
            <img src="themes/<?php echo $theme ?>/img/<?php echo $arrow ?>.gif" border="0" width="12" height="12" alt="<?php echo $html_sort_by." ".$html_from; ?>" /></a>
            &nbsp;
            <a href="<?php echo $PHP_SELF ?>?sort=2&amp;sortdir=<?php echo $new_sortdir ?>">
            <?php echo $html_from ?></a>
        </td>
        <td align="center" class="inbox" <?php if ($sort == 3) echo 'bgcolor="'.$glob_theme->sort_color.'"' ?>>
            <a href="<?php echo $PHP_SELF ?>?sort=3&amp;sortdir=<?php echo $new_sortdir ?>">
            <img src="themes/<?php echo $theme ?>/img/<?php echo $arrow ?>.gif" border="0" width="12" height="12" alt="<?php echo $html_sort_by." ".$html_subject; ?>" /></a>
            &nbsp;
            <a href="<?php echo $PHP_SELF ?>?sort=3&amp;sortdir=<?php echo $new_sortdir ?>">
            <?php echo $html_subject ?></a>
        </td>
        <td align="center" class="inbox" <?php if ($sort == 1) echo 'bgcolor="'.$glob_theme->sort_color.'"' ?>>
            <a href="<?php echo $PHP_SELF ?>?sort=1&amp;sortdir=<?php echo $new_sortdir ?>">
            <img src="themes/<?php echo $theme ?>/img/<?php echo $arrow ?>.gif" border="0" width="12" height="12" alt="<?php echo $html_sort_by." ".$html_date; ?>" /></a>
            &nbsp;
            <a href="<?php echo $PHP_SELF ?>?sort=1&amp;sortdir=<?php echo $new_sortdir ?>">
            <?php echo $html_date ?></a>
        </td>
        <td align="right" class="inbox" <?php if ($sort == 6) echo 'bgcolor="'.$glob_theme->sort_color.'"' ?>>
            <a href="<?php echo $PHP_SELF ?>?sort=6&amp;sortdir=<?php echo $new_sortdir ?>">
            <img src="themes/<?php echo $theme ?>/img/<?php echo $arrow ?>.gif" border="0" width="12" height="12" alt="<?php echo $html_sort_by." ".$html_size; ?>" /></a>
            &nbsp;
            <a href="<?php echo $PHP_SELF ?>?sort=6&amp;sortdir=<?php echo $new_sortdir ?>">
            <?php echo $html_size ?></a>
            <form method="post" action="delete.php" name="delete_form">
        </td>
    </tr>
<!-- start of $Id: html_top_table.php,v 1.56 2002/04/18 22:28:26 rossigee Exp $ -->
