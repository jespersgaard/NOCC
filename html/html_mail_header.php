<?
if ($verbose == 1 && $use_verbose == true)
	echo "<TR><TD class='menu'><a href=\"$PHP_SELF?action=aff_mail&mail=$mail&verbose=0&sort=".$sort."&sortdir=".$sortdir."\" class='menu'>".$html_remove_header."</A></TD>";
elseif ($use_verbose == true)
	echo "<TR><TD class='menu'><a href=\"$PHP_SELF?action=aff_mail&mail=$mail&verbose=1&sort=".$sort."&sortdir=".$sortdir."\" class='menu'>".$html_view_header."</A></TD>";
else
	echo "<TR><TD>&nbsp;</TD>";
?>	


<td>&nbsp</td></tr>
<tr><td align="right" class="mail"><? echo $html_from ?></td><td bgcolor="<? echo $html_mail_properties 
?>" class="mail"><B><? echo $content["from"] ?></B></td></tr>

<tr><td align="right" class="mail"><? echo $html_to ?></td><td bgcolor="<? echo $html_mail_properties ?>" 
class="mail"><? echo $content["to"] ?></td></tr>

<? 
if ($content["cc"] != "")
{ ?>
<tr><td align="right" class="mail"><? echo $html_cc ?></td><td bgcolor="<? echo $html_mail_properties ?>" 
class="mail"><? echo $content["cc"] ?></td></tr>
<?
}

if ($content["subject"] == "")
	$content["subject"] = $html_nosubject;
?>

<tr><td align="right" class="mail"><? echo $html_subject ?></td><td bgcolor="<? echo $html_mail_properties 
?>" class="mail"><B><? echo $content["subject"] ?></B></td></tr>

<tr><td align="right" class="mail"><? echo $html_date?></td><td bgcolor="<? echo $html_mail_properties ?>" 
class="mail"><? echo $content["date"] ?></td></tr>

<? echo $content["att"] ?>

<tr><td colspan="2" bgcolor="#ffffff" class="mail"><pre><? echo $content["header"] ?></pre><br><? echo 
$content["body"] ?>