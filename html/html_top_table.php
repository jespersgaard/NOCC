<?
$arrow = ($sortdir == 0) ? "up" : "down";
$new_sortdir = ($sortdir == 0) ? 1 : 0;
$is_Imap = (ereg("IMAP", $servr)) ? 1 : 0;
?>
<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%">
<tr><td bgcolor="<? echo $glob_theme->inside_color ?>">
<form method="post" action="delete.php" name="delete_form">
<input type="hidden" name="lang" value="<? echo $lang ?>" />

<table width="100%" cellpadding="2" cellspacing="1" border="0" bgcolor="<? echo $glob_theme->inside_color ?>">
	<tr bgcolor="<? echo $glob_theme->tr_color ?>">
		<td <? if ($is_Imap) echo "colspan=\"4\""; else echo "colspan=\"3\""; ?>align="left" class="titlew">
			<b><? echo $folder ?></b>
		</td>
		<td align="right" nowrap="nowrap" class="titlew">
			<? echo $current_date ?>
		</td>
		<td colspan="3" align="right" class="titlew" nowrap="nowrap">
			<? echo $num_msg ?> <? if ($num_msg > 1) {echo $html_msgs;} else {echo $html_msg;}?>
		</td>
	</tr>
	<tr bgcolor="<? echo $glob_theme->inbox_text_color ?>">
		<td align="center" class="inbox">
			<? echo $html_mark ?>
		</td>
		<? if (($is_Imap) || ($have_ucb_pop_server)) { ?>
		<td align="center" class="inbox">
			<? echo $html_new ?>
		</td>
		<? } ?>
		<td align="center" class="inbox">
			&nbsp; <? //echo $html_att ?>
		</td>
		<td nowrap="nowrap" align="center" class="inbox" <? if ($sort == 2) echo "bgcolor=\"".$glob_theme->sort_color."\"" ?>>
			<a href="<? echo $PHP_SELF ?>?sort=2&amp;sortdir=<? echo $new_sortdir ?>&amp;lang=<? echo $lang ?>">
			<img src="img/<? echo $arrow ?>.png" border="0" width="12" height="12" alt="" /></a>
			&nbsp;
			<a href="<? echo $PHP_SELF ?>?sort=2&amp;sortdir=<? echo $new_sortdir ?>&amp;lang=<? echo $lang ?>">
			<? echo $html_from ?></a>
		</td>
		<td nowrap="nowrap" align="center" class="inbox" <? if ($sort == 3) echo "bgcolor=\"".$glob_theme->sort_color."\"" ?>>
			<a href="<? echo $PHP_SELF ?>?sort=3&amp;sortdir=<? echo $new_sortdir ?>&amp;lang=<? echo $lang ?>">
			<img src="img/<? echo $arrow ?>.png" border="0" width="12" height="12" alt="" /></a>
			&nbsp;
			<a href="<? echo $PHP_SELF ?>?sort=3&amp;sortdir=<? echo $new_sortdir ?>&amp;lang=<? echo $lang ?>">
			<? echo $html_subject ?></a>
		</td>
		<td nowrap="nowrap" align="center" class="inbox" <? if ($sort == 1) echo "bgcolor=\"".$glob_theme->sort_color."\"" ?>>
			<a href="<? echo $PHP_SELF ?>?sort=1&amp;sortdir=<? echo $new_sortdir ?>&amp;lang=<? echo $lang ?>">
			<img src="img/<? echo $arrow ?>.png" border="0" width="12" height="12" alt="" /></a>
			&nbsp;
			<a href="<? echo $PHP_SELF ?>?sort=1&amp;sortdir=<? echo $new_sortdir ?>&amp;lang=<? echo $lang ?>">
			<? echo $html_date ?></a>
		</td>
		<td nowrap="nowrap" align="right" class="inbox" <? if ($sort == 6) echo "bgcolor=\"".$glob_theme->sort_color."\"" ?>>
			<a href="<? echo $PHP_SELF ?>?sort=6&amp;sortdir=<? echo $new_sortdir ?>&amp;lang=<? echo $lang ?>">
			<img src="img/<? echo $arrow ?>.png" border="0" width="12" height="12" alt="" /></a>
			&nbsp;
			<a href="<? echo $PHP_SELF ?>?sort=6&amp;sortdir=<? echo $new_sortdir ?>&amp;lang=<? echo $lang ?>">
			<? echo $html_size ?></a>
		</td>
	</tr>