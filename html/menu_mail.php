<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td bgcolor="<? echo $html_inside_color ?>">
			<table border="0" cellpadding="2" cellspacing="1" bgcolor="<? echo $html_inside_color ?>" width="100%">
				<tr>
					<td class="menu" align="center" bgcolor="<? echo $html_menu_color ?>">
						<a href="<? echo $PHP_SELF ?>?lang=<? echo $lang ?>&amp;sort=<? echo $sort ?>&amp;sortdir=<? echo $sortdir ?>" class="menu"><? echo $html_inbox ?></a>
					</td>
					<td class="menu" align="center" bgcolor="<? echo $html_menu_color ?>">
						<a href="<? echo $PHP_SELF ?>?action=write&amp;lang=<? echo $lang ?>&amp;sort=<? echo $sort ?>&amp;sortdir=<? echo $sortdir ?>" class="menu"><? echo $html_new_msg ?></a>
					</td>
					<td class="menu" align="center" bgcolor="<? echo $html_menu_color ?>">
						<a href="<? echo $PHP_SELF ?>?action=reply&amp;mail=<? echo $mail ?>&amp;lang=<? echo $lang ?>&amp;sort=<? echo $sort ?>&amp;sortdir=<? echo $sortdir ?>" class="menu"><? echo $html_reply ?></a>
					</td>
					<td class="menu" align="center" bgcolor="<? echo $html_menu_color ?>">
						<a href="<? echo $PHP_SELF ?>?action=reply_all&amp;mail=<? echo $mail ?>&amp;lang=<? echo $lang ?>&amp;sort=<? echo $sort ?>&amp;sortdir=<? echo $sortdir ?>" class="menu"><? echo $html_reply_all ?></a>
					</td>
					<td class="menu" align="center" bgcolor="<? echo $html_menu_color ?>">
						<a href="<? echo $PHP_SELF ?>?action=forward&amp;mail=<? echo $mail ?>&amp;lang=<? echo $lang ?>&amp;sort=<? echo $sort ?>&amp;sortdir=<? echo $sortdir ?>" class="menu"><? echo $html_forward ?></a>
					</td>
					<td class="menu" align="center" bgcolor="<? echo $html_menu_color ?>">
						<a href="delete.php?mail=<? echo $mail ?>&amp;only_one=1&amp;lang=<? echo $lang ?>&amp;sort=<? echo $sort ?>&amp;sortdir=<? echo $sortdir ?>" class="menu"><? echo $html_delete ?></a>
					</td>
					<? if ($enable_logout) { ?>
					<td class="menu" align="center" width="80" bgcolor="<? echo $html_menu_color ?>">
						<a href="logout.php?lang=<? echo $lang ?>" class="menu"><? echo $html_logout ?></a>
					</td>
					<? } ?>
					<!--<td class="menu" align="center" bgcolor="<? echo $html_menu_color ?>">
						<a href="javascript:void(null)" onMouseUp="OpenHelpWindow('help.php?action=<? echo $action ?>&amp;lang=<? echo $lang ?>&amp;sort=<? echo $sort ?>&amp;sortdir=<? echo $sortdir ?>','image','scrollbars=yes,resizable=yes,width=400,height=300')" class="menu"><? echo $html_help ?></a>
					</td>-->
				</tr>
			</table>
		</td>
	</tr>
</table>