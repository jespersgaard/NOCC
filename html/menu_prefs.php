<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td bgcolor="<?php echo $glob_theme->inside_color ?>">
			<table border="0" cellpadding="2" cellspacing="1" bgcolor="<?php echo $glob_theme->inside_color ?>" width="100%">
				<tr>
					<td class="menu" align="center" width="120" bgcolor="<?php echo $glob_theme->menu_color ?>">
						<a href="<?php echo $PHP_SELF ?>?lang=<?php echo $lang ?>&amp;sort=<?php echo $sort ?>&amp;sortdir=<?php echo $sortdir ?>" class="menu"><?php echo $html_inbox ?></a>
					</td>
					<td class="menu" align="center" width="120" bgcolor="<?php echo $glob_theme->menu_color_on ?>">
						<?php echo $html_preferences ?>
					</td>
					<td width="*" bgcolor="<?php echo $glob_theme->menu_color ?>">
						<img src="themes/<?php echo $theme ?>/img/spacer.gif" height="1" width="1" alt="" />
					</td>
					<td class="menu" align="center" width="80" bgcolor="<?php echo $glob_theme->menu_color ?>">
						<a href="<?php echo $PHP_SELF ?>?lang=<?php echo $lang ?>&amp;action=setprefs" class="menu"><?php echo $html_preferences ?></a>
					</td>
					<?php if ($enable_logout) { ?>
					<td class="menu" align="center" width="80" bgcolor="<?php echo $glob_theme->menu_color ?>">
						<a href="logout.php?lang=<?php echo $lang ?>" class="menu"><?php echo $html_logout ?></a>
					</td>
					<?php } ?>
					<!--<td class="menu" align="center" width="80" bgcolor="<?php echo $glob_theme->menu_color ?>">
						<a href="javascript:void(null)" onMouseUp="OpenHelpWindow('help.php?action=<?php echo $action ?>&amp;lang=<?php echo $lang ?>&amp;sort=<?php echo $sort ?>&amp;sortdir=<?php echo $sortdir ?>','image','scrollbars=yes,resizable=yes,width=400,height=300')" class="menu"><?php echo $html_help ?></a>
					</td> -->
				</tr>
			</table>
		</td>
	</tr>
</table>
