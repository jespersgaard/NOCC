<tr bgcolor="<? echo $inbox_color ?>">
	<td align="center">
		<INPUT TYPE="checkbox" NAME="<? echo $tmp["number"] ?>" VALUE="<? echo $tmp["number"] ?>"> 
	</td>
	<? if ($is_Imap) { ?>
	<td align="center">
		<? echo $tmp["new"] ?>
	</td>
	<? } ?>
	<td align="center">
		<? echo $tmp["attach"] ?>
	</td>
	<td nowrap class="inbox">
		<a href="<? echo $PHP_SELF ?>?action=aff_mail&mail=<? echo $tmp["number"] ?>&prev=<? echo $tmp["prev"] ?>&next=<? echo $tmp["next"] ?>&sort=<? echo $sort ?>&sortdir=<? echo $sortdir?>&lang=<? echo $lang ?>"><? echo $tmp["from"] ?></a>
	</td>
	<td class="inbox">
		<? echo $tmp["subject"]? $tmp["subject"] : $html_nosubject; ?>
	</td>
	<td class="inbox">
		<? echo $tmp["date"] ?>
	</td>
	<td align="right" nowrap class="inbox">
		<? echo $tmp["size"] ?> <? echo $html_kb ?>
	</td>
</tr>