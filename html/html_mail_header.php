<?
if ($verbose == 1 && $use_verbose == true)
	echo "<tr><td class='menu'><a href=\"$PHP_SELF?action=aff_mail&amp;mail=$mail&amp;verbose=0&amp;lang=".$lang."&amp;sort=".$sort."&amp;sortdir=".$sortdir."\" class='menu'>".$html_remove_header."</a></td>";
elseif ($use_verbose == true)
	echo "<tr><td class='menu'><a href=\"$PHP_SELF?action=aff_mail&amp;mail=$mail&amp;verbose=1&amp;lang=".$lang."&amp;sort=".$sort."&amp;sortdir=".$sortdir."\" class='menu'>".$html_view_header."</a></td>";
else
	echo "<tr><td>&nbsp;</td>";
?>	


<td>&nbsp;</td></tr>
<tr><td align="right" class="mail"><? echo $html_from ?></td><td bgcolor="<? echo $html_mail_properties ?>" class="mail"><b><? echo $content["from"] ?></b></td></tr>

<tr><td align="right" class="mail"><? echo $html_to ?></td><td bgcolor="<? echo $html_mail_properties ?>" class="mail"><? echo $content["to"] ?></td></tr>

<? 
if ($content["cc"] != "")
{ ?>
<tr><td align="right" class="mail"><? echo $html_cc ?></td><td bgcolor="<? echo $html_mail_properties ?>" class="mail"><? echo $content["cc"] ?></td></tr>
<?
}

if ($content["subject"] == "")
	$content["subject"] = $html_nosubject;
?>

<tr><td align="right" class="mail"><? echo $html_subject ?></td><td bgcolor="<? echo $html_mail_properties ?>" class="mail"><b><? echo $content["subject"] ?></b></td></tr>

<tr><td align="right" class="mail"><? echo $html_date?></td><td bgcolor="<? echo $html_mail_properties ?>" class="mail"><? echo $content["date"] ?></td></tr>

<? echo $content["att"] ?>

<tr><td colspan="2" bgcolor="<? echo $mail_color ?>" class="mail"><pre><? echo $content["header"] ?></pre><br /><? echo $content["body"] ?>