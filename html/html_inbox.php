<tr bgcolor="<? echo $inbox_color ?>">
	<td align="center">
		<input type="checkbox" name="<? echo $tmp["number"] ?>" value="<? echo $tmp["number"] ?>" />
	</td>
	<? if (($is_Imap) || ($have_ucb_pop_server)) { ?>
	<td align="center">
		<? echo $tmp["new"] ?>
	</td>
	<? } ?>
	<td align="center">
		<? echo $tmp["attach"] ?>
	</td>
	<td nowrap="nowrap" class="inbox">
		<a href="<? echo $PHP_SELF ?>?action=aff_mail&amp;mail=<? echo $tmp["number"] ?>&amp;sort=<? echo $sort ?>&amp;sortdir=<? echo $sortdir?>&amp;lang=<? echo $lang ?>"><? echo $tmp["from"] ?></a>
	</td>
	<td class="inbox">
		<? echo $tmp["subject"]? $tmp["subject"] : $html_nosubject; ?>
	</td>
	<td class="inbox">
		<? echo $tmp["date"] ?>
	</td>
	<td align="right" nowrap="nowrap" class="inbox">
		<? echo $tmp["size"] ?> <? echo $html_kb ?>
	</td>
</tr>
