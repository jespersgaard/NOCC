<?
$arrow = ($sortdir == 0) ? "up" : "down";
$new_sortdir = ($sortdir == 0) ? 1 : 0;
$is_Imap = (ereg("IMAP", $servr)) ? 1 : 0;
?>
<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%">
<tr><td bgcolor="<? echo $html_inside_color ?>">

<table width="100%" cellpadding="2" cellspacing="1" border="0" bgcolor="<? echo $html_inside_color ?>">
	<tr bgcolor="<? echo $html_tr_color ?>">
		<td <? if ($is_Imap) echo "colspan=\"4\""; else echo "colspan=\"3\""; ?>align="left" class="titlew">
			<B><? echo $html_inbox ?></B></FONT>
		</TD>
		<TD align="right" nowrap class="titlew">
			<? echo $current_date ?>
		</TD>
		<TD colspan="3" align="right" class="titlew" nowrap="nowrap">
			<? echo $num_msg ?> <? if ($num_msg > 1) {echo $html_msgs;} else {echo $html_msg;}?>
		</TD>
	</tr>
	<tr bgcolor="<? echo $inbox_text_color ?>">
		<TD align="center" class="inbox">
			<? echo $html_mark ?>
		</TD>
		<? if ($is_Imap) { ?>
		<TD align="center" class="inbox">
			<? echo $html_new ?>
		</TD>
		<? } ?>
		<TD align="center" class="inbox">
			&nbsp <? //echo $html_att ?>
		</TD>
		<td nowrap align="center" class="inbox" <? if ($sort == 2) echo "bgcolor='$html_sort_color'" ?>>
			<A HREF="<? echo $PHP_SELF ?>?sort=2&sortdir=<? echo $new_sortdir ?>&lang=<? echo $lang ?>">
			<img src="img/<? echo $arrow ?>.png" border="0" width="12" height="12" alt=""></A>
			&nbsp;
			<A HREF="<? echo $PHP_SELF ?>?sort=2&sortdir=<? echo $new_sortdir ?>&lang=<? echo $lang ?>">
			<? echo $html_from ?></A>
		</td>
		<td nowrap align=center class="inbox" <? if ($sort == 3) echo "bgcolor='$html_sort_color'" ?>>
			<A HREF="<? echo $PHP_SELF ?>?sort=3&sortdir=<? echo $new_sortdir ?>&lang=<? echo $lang ?>">
			<img src="img/<? echo $arrow ?>.png" border="0" width="12" height="12" alt=""></A>
			&nbsp;
			<A HREF="<? echo $PHP_SELF ?>?sort=3&sortdir=<? echo $new_sortdir ?>&lang=<? echo $lang ?>">
			<? echo $html_subject ?></A>
		</td>
		<td nowrap align="center" class="inbox" <? if ($sort == 1) echo "bgcolor='$html_sort_color'" ?>>
			<A HREF="<? echo $PHP_SELF ?>?sort=1&sortdir=<? echo $new_sortdir ?>&lang=<? echo $lang ?>">
			<img src="img/<? echo $arrow ?>.png" border="0" width="12" height="12" alt=""></A>
			&nbsp;
			<A HREF="<? echo $PHP_SELF ?>?sort=1&sortdir=<? echo $new_sortdir ?>&lang=<? echo $lang ?>">
			<? echo $html_date ?></A>
		</td>
		<td nowrap align="right" class="inbox" <? if ($sort == 6) echo "bgcolor='$html_sort_color'" ?>>
			<A HREF="<? echo $PHP_SELF ?>?sort=6&sortdir=<? echo $new_sortdir ?>&lang=<? echo $lang ?>">
			<img src="img/<? echo $arrow ?>.png" border="0" width="12" height="12" alt=""></A>
			&nbsp;
			<A HREF="<? echo $PHP_SELF ?>?sort=6&sortdir=<? echo $new_sortdir ?>&lang=<? echo $lang ?>">
			<? echo $html_size ?></A>
		</td>
	</tr>
	<FORM METHOD="POST" ACTION="delete.php" NAME="delete_form">
	<input type="hidden" name="lang" value="<? echo $lang ?>">
