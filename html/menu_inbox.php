<?
$color_inbox = $color = $html_menu_color;
if ($action == "") 
{
	$color_inbox = $html_menu_color_on; 
	$line = "<a href=\"".$PHP_SELF."?action=write&lang=".$lang."&sort=".$sort."&sortdir=".$sortdir."\" class=\"menu\">".$html_new_msg."</a>";
}
else
	$color =  $html_menu_color_on;
if ($action == "write")
	$line = "<font color=\"".$link_color."\">".$html_new_msg."</font>";
if ($action == "reply")
	$line = "<font color=\"".$link_color."\">".$html_reply."</font>";
if ($action == "reply_all")
	$line = "<font color=\"".$link_color."\">".$html_reply_all."</font>";
if ($action == "forward")
	$line = "<font color=\"".$link_color."\">".$html_forward."</font>";
?>
<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td bgcolor="<? echo $html_inside_color ?>">
			<table border="0" cellpadding="2" cellspacing="1" bgcolor="<? echo $html_inside_color ?>" width="100%">
				<tr>
					<td class="menu" align="center" width="120" bgcolor="<? echo $color_inbox ?>">
						<a href="<? echo $PHP_SELF ?>?lang=<?echo $lang ?>&sort=<? echo $sort ?>&sortdir=<? echo $sortdir ?>" class="menu"><? echo $html_inbox ?></a>
					</td>
					<td class="menu" align="center" width="120" bgcolor="<? echo $color ?>">
						<? echo $line ?>
					</td>
					<td width="*" bgcolor="<? echo $html_menu_color ?>">
						<img src="img/spacer.png" height="1" width="1" alt="">
					</td>
					<? if ($enable_logout) { ?>
					<td class="menu" align="center" width="80" bgcolor="<? echo $html_menu_color ?>">
						<a href="logout.php" class="menu"><? echo $html_logout ?></a>
					</td>
					<? } ?>
					<!--<td class="menu" align="center" width="80" bgcolor="<? echo $html_menu_color ?>">
						<a href="javascript:void(null)" onMouseUp="OpenHelpWindow('help.php?action=<? echo $action ?>&lang=<? echo $lang ?>&sort=<? echo $sort ?>&sortdir=<? echo $sortdir ?>','image','scrollbars=yes,resizable=yes,width=400,height=300')" class="menu"><? echo $html_help ?></a>
					</td> -->
				</tr>
			</table>
		</td>
	</tr>
</table>
