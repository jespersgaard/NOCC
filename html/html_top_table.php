<!-- start of $Id: html_top_table.php,v 1.49 2002/04/15 06:48:43 mrylander Exp $ -->
<?php

require_once 'class_local.php';
require_once 'conf.php';

$per_page = (getPref('msg_per_page')) ? getPref('msg_per_page') : (($conf->msg_per_page) ? $conf->msg_per_page : '25');

$arrow = ($sortdir == 0) ? 'up' : 'down';
$new_sortdir = ($sortdir == 0) ? 1 : 0;
$skip = ($skip) ? $skip : '0';

$pop = new nocc_imap('{' . $servr . '}' . $folder, $user, $passwd, $ev);


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
		$prev = "<a href=\"$PHP_SELF?sort=$sort&sortdir=$sortdir&lang=$lang&skip=$pskip&folder=$folder\">".
			"<img src=\"themes/".$theme."/img/left_arrow.gif\" border=\"0\" /></a>\n";
	}

	if($nskip < $pages) {
		$next = "<a href=\"$PHP_SELF?sort=$sort&sortdir=$sortdir&lang=$lang&skip=$nskip&folder=$folder\">".
			"<img src=\"themes/".$theme."/img/right_arrow.gif\" border=\"0\" /></a>\n";
	}
	$page_line = "<form method=\"POST\" action=\"$PHP_SElF?sort=1&sortdir=1&lang=$lang&folder=$folder\">";
	$page_line .= "$html_page $this_page $html_of $pages; $per_page $html_msgperpage &nbsp;  ($prev \n<SELECT name=\"skip\">\n";

	$selected = '';
	for ($i = 0; $i < $pages; $i++) { 
		$current_skip = $i + 1;
		if ($i == $skip) {
			$selected = "selected";
		} else {
			$selected = "";
		}
		$page_line .= "\t<OPTION $selected value=\"$i\">$current_skip</OPTION>\n";
	}

	$page_line .= "</select>$next)<input type=\"submit\" name=\"submit\" value=\"$html_gotopage\"></form>";
}

$list = $pop->get_nice_subscribed();

$fldr_line = '';
if(is_array($list) && count($list) > 0) {
	reset($list);

	$fldr_line = "<form method=\"POST\" action=\"$PHP_SElF?sort=1&sortdir=1&lang=$lang\">$html_other_folders:  \n<SELECT name=\"folder\">\n";

	$selected = '';
	while (list($junk, $name) = each($list)) {
		if ($name == $folder) {
			$selected = "selected";
		} else {
			$selected = "";
		}
		$fldr_line .= "\t<OPTION $selected value=\"$name\">$name</OPTION>\n";
	}
	$fldr_line .= "</select>\n<input type=\"submit\" name=\"submit\" value=\"$html_gotofolder\"></form>";
}


?>
<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%">
<tr><td bgcolor="<?php echo $glob_theme->inside_color ?>">
<form method="post" action="delete.php" name="delete_form">
<input type="hidden" name="lang" value="<?php echo $lang ?>" />
<input type="hidden" name="folder" value="<?php echo $folder ?>" />

<table width="100%" cellpadding="2" cellspacing="1" border="0" bgcolor="<?php echo $glob_theme->inside_color ?>">
    <tr bgcolor="<?php echo $glob_theme->tr_color ?>">
        <td <?php if (($is_imap) || ($conf->have_ucb_pop_server)) echo 'colspan="5"'; else echo 'colspan="4"'; ?>align="left" class="titlew">
            <b><?php echo $folder ?></b>
        </td>
        <td align="right" class="titlew" colspan="2">
            <?php echo $num_msg ?> <?php if ($num_msg == 1) {echo $html_msg;} else {echo $html_msgs;}?>
        </td>
    </tr>
    <tr bgcolor="<?php echo $glob_theme->inbox_text_color ?>">
	<td colspan="7" align="left">
		<table border=0 width="100%">
				<tr><td valign="top" align="center"><?php echo $fldr_line ?></td>
				    <td valign="top" align="center"><?php echo $page_line ?></td>
				</tr>
		</table>
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
            <a href="<?php echo $PHP_SELF ?>?sort=2&amp;sortdir=<?php echo $new_sortdir ?>&amp;lang=<?php echo $lang ?>&amp;folder=<?php echo $folder ?>">
            <img src="themes/<?php echo $theme ?>/img/<?php echo $arrow ?>.gif" border="0" width="12" height="12" alt="<?php echo $html_sort_by." ".$html_from; ?>" /></a>
            &nbsp;
            <a href="<?php echo $PHP_SELF ?>?sort=2&amp;sortdir=<?php echo $new_sortdir ?>&amp;lang=<?php echo $lang ?>&amp;folder=<?php echo $folder ?>">
            <?php echo $html_from ?></a>
        </td>
        <td align="center" class="inbox" <?php if ($sort == 3) echo 'bgcolor="'.$glob_theme->sort_color.'"' ?>>
            <a href="<?php echo $PHP_SELF ?>?sort=3&amp;sortdir=<?php echo $new_sortdir ?>&amp;lang=<?php echo $lang ?>&amp;folder=<?php echo $folder ?>">
            <img src="themes/<?php echo $theme ?>/img/<?php echo $arrow ?>.gif" border="0" width="12" height="12" alt="<?php echo $html_sort_by." ".$html_subject; ?>" /></a>
            &nbsp;
            <a href="<?php echo $PHP_SELF ?>?sort=3&amp;sortdir=<?php echo $new_sortdir ?>&amp;lang=<?php echo $lang ?>&amp;folder=<?php echo $folder ?>">
            <?php echo $html_subject ?></a>
        </td>
        <td align="center" class="inbox" <?php if ($sort == 1) echo 'bgcolor="'.$glob_theme->sort_color.'"' ?>>
            <a href="<?php echo $PHP_SELF ?>?sort=1&amp;sortdir=<?php echo $new_sortdir ?>&amp;lang=<?php echo $lang ?>&amp;folder=<?php echo $folder ?>">
            <img src="themes/<?php echo $theme ?>/img/<?php echo $arrow ?>.gif" border="0" width="12" height="12" alt="<?php echo $html_sort_by." ".$html_date; ?>" /></a>
            &nbsp;
            <a href="<?php echo $PHP_SELF ?>?sort=1&amp;sortdir=<?php echo $new_sortdir ?>&amp;lang=<?php echo $lang ?>&amp;folder=<?php echo $folder ?>">
            <?php echo $html_date ?></a>
        </td>
        <td align="right" class="inbox" <?php if ($sort == 6) echo 'bgcolor="'.$glob_theme->sort_color.'"' ?>>
            <a href="<?php echo $PHP_SELF ?>?sort=6&amp;sortdir=<?php echo $new_sortdir ?>&amp;lang=<?php echo $lang ?>&amp;folder=<?php echo $folder ?>">
            <img src="themes/<?php echo $theme ?>/img/<?php echo $arrow ?>.gif" border="0" width="12" height="12" alt="<?php echo $html_sort_by." ".$html_size; ?>" /></a>
            &nbsp;
            <a href="<?php echo $PHP_SELF ?>?sort=6&amp;sortdir=<?php echo $new_sortdir ?>&amp;lang=<?php echo $lang ?>&amp;folder=<?php echo $folder ?>">
            <?php echo $html_size ?></a>
        </td>
    </tr>
<!-- start of $Id: html_top_table.php,v 1.49 2002/04/15 06:48:43 mrylander Exp $ -->
