<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td bgcolor="#f0f0f0">
			<table border="0" cellpadding="2" cellspacing="1" bgcolor="<? echo $html_tb_color ?>" bordercolor="#000000" width="100%">
				<tr>
					<td class="menu" align="center" bgcolor="<? echo $html_menu_color ?>">
						<a href="<? echo $PHP_SELF ?>?lang=<? echo $lang ?>&sort=<? echo $sort ?>&sortdir=<? echo $sortdir ?>" class="menu"><? echo $html_inbox ?></a>
					</td>
					<td class="menu" align="center" bgcolor="<? echo $html_menu_color ?>">
						<a href="<? echo $PHP_SELF ?>?action=write&lang=<? echo $lang ?>&sort=<? echo $sort ?>&sortdir=<? echo $sortdir ?>" class="menu"><? echo $html_new_msg ?></a>
					</td>
					<td class="menu" align="center" bgcolor="<? echo $html_menu_color ?>">
						<a href="<? echo $PHP_SELF ?>?action=reply&mail=<? echo $mail ?>&lang=<? echo $lang ?>&sort=<? echo $sort ?>&sortdir=<? echo $sortdir ?>" class="menu"><? echo $html_reply ?></a>
					</td>
					<td class="menu" align="center" bgcolor="<? echo $html_menu_color ?>">
						<a href="<? echo $PHP_SELF ?>?action=reply_all&mail=<? echo $mail ?>&lang=<? echo $lang ?>&sort=<? echo $sort ?>&sortdir=<? echo $sortdir ?>" class="menu"><? echo $html_reply_all ?></a>
					</td>
					<td class="menu" align="center" bgcolor="<? echo $html_menu_color ?>">
						<a href="<? echo $PHP_SELF ?>?action=forward&mail=<? echo $mail ?>&lang=<? echo $lang ?>&sort=<? echo $sort ?>&sortdir=<? echo $sortdir ?>" class="menu"><? echo $html_forward ?></a>
					</td>
					<td class="menu" align="center" bgcolor="<? echo $html_menu_color ?>">
						<a href="delete.php?mail=<? echo $mail ?>&only_one=1&lang=<? echo $lang ?>&sort=<? echo $sort ?>&sortdir=<? echo $sortdir ?>" class="menu"><? echo $html_delete ?></a>
					</td>
					<td class="menu" align="center" width="80" bgcolor="<? echo $html_menu_color ?>">
						<a href="logout.php" class="menu"><? echo $html_logout ?></a>
					</td>
					<td class="menu" align="center" bgcolor="<? echo $html_menu_color ?>">
						<a href="help.php?lang=<? echo $lang ?>&sort=<? echo $sort ?>&sortdir=<? echo $sortdir ?>" class="menu"><? echo $html_help ?></a>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>