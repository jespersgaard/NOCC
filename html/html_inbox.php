<!-- start of $Id: html_inbox.php,v 1.27 2002/02/09 20:46:24 rossigee Exp $ -->
<tr bgcolor="<?php echo $glob_theme->inbox_color ?>">
	<td align="center">
		<input type="checkbox" name="msg-<?php echo $tmp['number'] ?>" value="Y" />
	</td>
	<?php if (($is_imap) || ($conf->have_ucb_pop_server)) { ?>
	<td align="center">
		<?php echo $tmp['new'] ?>
	</td>
	<?php } ?>
	<td align="center">
		<?php echo $tmp['attach'] ?>
	</td>
	<td class="inbox" align="left">
		<a href="<?php echo $PHP_SELF ?>?action=aff_mail&mail=<?php echo $tmp['number'] ?>&sort=<?php echo $sort ?>&sortdir=<?php echo $sortdir?>&verbose=0&lang=<?php echo $lang ?>" title="<?php echo htmlspecialchars($tmp['from']); ?>"><?php echo htmlspecialchars(display_address ($tmp['from'])); ?></a>
	</td>
	<td class="inbox" align="left">
		<a href="<?php echo $PHP_SELF ?>?action=aff_mail&mail=<?php echo $tmp['number'] ?>&sort=<?php echo $sort ?>&sortdir=<?php echo $sortdir?>&verbose=0&lang=<?php echo $lang ?>"><?php echo $tmp['subject']? htmlspecialchars($tmp['subject']) : $html_nosubject; ?></a>
	</td>
	<td class="inbox" align="left">
		<?php echo $tmp['date'] ?>
	</td>
	<td align="right" class="inbox">
		<?php echo $tmp['size'] ?> <?php echo $html_kb ?>
	</td>
</tr>
<!-- end of $Id: html_inbox.php,v 1.27 2002/02/09 20:46:24 rossigee Exp $ -->
