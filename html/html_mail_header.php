<?
if ($verbose == 1 && $use_verbose == true)
	echo "<tr><td class=\"menu\"><a href=\"$PHP_SELF?action=aff_mail&amp;mail=$mail&amp;verbose=0&amp;lang=".$lang."&amp;sort=".$sort."&amp;sortdir=".$sortdir."\" class=\"menu\">".$html_remove_header."</a></td>";
elseif ($use_verbose == true)
	echo "<tr><td class=\"menu\"><a href=\"$PHP_SELF?action=aff_mail&amp;mail=$mail&amp;verbose=1&amp;lang=".$lang."&amp;sort=".$sort."&amp;sortdir=".$sortdir."\" class=\"menu\">".$html_view_header."</a></td>";
else
	echo "<tr><td>&nbsp;</td>";

if (($content["prev"] != '') && ($content["prev"] != 0))
	$prev = "<a href=\"$PHP_SELF?action=aff_mail&amp;mail=".$content["prev"]."&amp;verbose=".$verbose."&amp;lang=".$lang."&amp;sort=".$sort."&amp;sortdir=".$sortdir."\"><img src=\"img/left_arrow.gif\" alt=\"$alt_prev\" width=\"12\" height=\"12\" border=\"0\"></a>";
if (($content["next"] != '') && ($content["next"] != 0))
	$next =  "<a href=\"$PHP_SELF?action=aff_mail&amp;mail=".$content["next"]."&amp;verbose=".$verbose."&amp;lang=".$lang."&amp;sort=".$sort."&amp;sortdir=".$sortdir."\"><img src=\"img/right_arrow.gif\" alt=\"$alt_next\" width=\"12\" height=\"12\" border=\"0\"></a>";
?>	
<td	align="right"><? echo $prev."&nbsp;".$next; ?></td></tr>
<tr><td align="right" class="mail"><? echo $html_from ?></td><td bgcolor="<? echo $glob_theme->mail_properties ?>" class="mail"><b><? echo $content["from"] ?></b></td></tr>

<tr><td align="right" class="mail"><? echo $html_to ?></td><td bgcolor="<? echo $glob_theme->mail_properties ?>" class="mail"><? echo $content["to"] ?></td></tr>

<? 
if ($content["cc"] != "")
{ ?>
<tr><td align="right" class="mail"><? echo $html_cc ?></td><td bgcolor="<? echo $glob_theme->mail_properties ?>" class="mail"><? echo $content["cc"] ?></td></tr>
<?
}

if ($content["subject"] == "")
	$content["subject"] = $html_nosubject;
?>

<tr><td align="right" class="mail"><? echo $html_subject ?></td><td bgcolor="<? echo $glob_theme->mail_properties ?>" class="mail"><b><? echo $content["subject"] ?></b></td></tr>

<tr><td align="right" class="mail"><? echo $html_date?></td><td bgcolor="<? echo $glob_theme->mail_properties ?>" class="mail"><? echo $content["date"] ?></td></tr>

<? echo $content["att"] ?>

<tr><td colspan="2" bgcolor="<? echo $glob_theme->mail_color ?>" class="mail"><pre><? echo $content["header"] ?></pre><br /><? echo $content["body"] ?>