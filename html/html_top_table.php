<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%">
<tr><td bgcolor="#cacaca">

<table width="100%" cellpadding="2" cellspacing="1" border="0" bgcolor="<? echo $html_tb_color ?>" bordercolor="#000000">
	<tr bgcolor="<? echo $html_tr_color ?>">
		<td colspan="4" class="titlew">
			<B><? echo $html_inbox ?></B></FONT>
		</TD>
		<TD ALIGN="center" nowrap class="titlew">
			<? echo $current_date ?>
		</TD>
		<TD colspan="2" ALIGN="RIGHT" class="titlew">
			<? echo $num_msg ?> Message<? if ($num_msg > 1) {echo "s";} ?>
		</TD>
	</tr>
	<tr bgcolor=#ffffff>
		<TD align=center class="inbox">
			<? echo $html_mark ?>
		</TD>
		<TD align=center class="inbox">
			<!--<A HREF="<? echo $PHP_SELF ?>?action=login&sort=&lang=<? echo $lang ?>">-->
			<? echo $html_new ?></A>
		</TD>
		<TD align=center class="inbox">
			<? echo $html_att ?>
		</TD>
		<td align=center class="inbox" <? if ($sort == 2) echo "bgcolor='$html_sort_color'" ?>>
			<A HREF="<? echo $PHP_SELF ?>?action=login&sort=2&sortdir=0&lang=<? echo $lang ?>">
			<? echo $html_from ?></A>
		</td>
		<td align=center class="inbox" <? if ($sort == 3) echo "bgcolor='$html_sort_color'" ?>>
			<A HREF="<? echo $PHP_SELF ?>?action=login&sort=3&sortdir=0&lang=<? echo $lang ?>">
			<? echo $html_subject ?></A>
		</td>
		<td align=center class="inbox" <? if ($sort == 0) echo "bgcolor='$html_sort_color'" ?>>
			<A HREF="<? echo $PHP_SELF ?>?action=login&sort=0&sortdir=0&lang=<? echo $lang ?>">
			<? echo $html_date ?></A>
		</td>
		<td align=right class="inbox" <? if ($sort == 6) echo "bgcolor='$html_sort_color'" ?>>
			<A HREF="<? echo $PHP_SELF ?>?action=login&sort=6&sortdir=0&lang=<? echo $lang ?>">
			<? echo $html_size ?></A>
		</td>
	</tr>
	<FORM METHOD="POST" ACTION="delete.php" NAME="delete_form">