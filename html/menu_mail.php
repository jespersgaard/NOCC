<!-- start of $Id: menu_mail.php,v 1.15 2001/12/13 10:39:09 nicocha Exp $ -->
<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td bgcolor="<?php echo $glob_theme->inside_color ?>">
			<table border="0" cellpadding="2" cellspacing="1" bgcolor="<?php echo $glob_theme->inside_color ?>" width="100%">
				<tr>
					<td class="menu" align="center" bgcolor="<?php echo $glob_theme->menu_color ?>">
						<a href="<?php echo $PHP_SELF ?>?lang=<?php echo $lang ?>&sort=<?php echo $sort ?>&sortdir=<?php echo $sortdir ?>" class="menu"><?php echo $html_inbox ?></a>
					</td>
					<td class="menu" align="center" bgcolor="<?php echo $glob_theme->menu_color ?>">
						<a href="<?php echo $PHP_SELF ?>?action=write&lang=<?php echo $lang ?>&sort=<?php echo $sort ?>&sortdir=<?php echo $sortdir ?>" class="menu"><?php echo $html_new_msg ?></a>
					</td>
					<td class="menu" align="center" bgcolor="<?php echo $glob_theme->menu_color ?>">
						<a href="<?php echo $PHP_SELF ?>?action=reply&mail=<?php echo $mail ?>&lang=<?php echo $lang ?>&sort=<?php echo $sort ?>&sortdir=<?php echo $sortdir ?>" class="menu"><?php echo $html_reply ?></a>
					</td>
					<td class="menu" align="center" bgcolor="<?php echo $glob_theme->menu_color ?>">
						<a href="<?php echo $PHP_SELF ?>?action=reply_all&mail=<?php echo $mail ?>&lang=<?php echo $lang ?>&sort=<?php echo $sort ?>&sortdir=<?php echo $sortdir ?>" class="menu"><?php echo $html_reply_all ?></a>
					</td>
					<td class="menu" align="center" bgcolor="<?php echo $glob_theme->menu_color ?>">
						<a href="<?php echo $PHP_SELF ?>?action=forward&mail=<?php echo $mail ?>&lang=<?php echo $lang ?>&sort=<?php echo $sort ?>&sortdir=<?php echo $sortdir ?>" class="menu"><?php echo $html_forward ?></a>
					</td>
					<td class="menu" align="center" bgcolor="<?php echo $glob_theme->menu_color ?>">
						<a href="delete.php?mail=<?php echo $mail ?>&only_one=1&lang=<?php echo $lang ?>&sort=<?php echo $sort ?>&sortdir=<?php echo $sortdir ?>" class="menu"><?php echo $html_delete ?></a>
					</td>
					<?php if ($conf->enable_logout) { ?>
					<td class="menu" align="center" width="80" bgcolor="<?php echo $glob_theme->menu_color ?>">
						<a href="logout.php?lang=<?php echo $lang ?>" class="menu"><?php echo $html_logout ?></a>
					</td>
					<?php } ?>
					<!--<td class="menu" align="center" bgcolor="<?php echo $glob_theme->menu_color ?>">
						<a href="javascript:void(null)" onMouseUp="OpenHelpWindow('help.php?action=<?php echo $action ?>&lang=<?php echo $lang ?>&sort=<?php echo $sort ?>&sortdir=<?php echo $sortdir ?>','image','scrollbars=yes,resizable=yes,width=400,height=300')" class="menu"><?php echo $html_help ?></a>
					</td>-->
				</tr>
			</table>
		</td>
	</tr>
</table>
<!-- end of $Id: menu_mail.php,v 1.15 2001/12/13 10:39:09 nicocha Exp $ -->
