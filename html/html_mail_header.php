<?
if ($verbose == 1 && $use_verbose == true)
	echo "<TR><TD class='menu'><a href=\"$PHP_SELF?action=aff_mail&mail=$mail&verbose=0\" class='menu'>".$html_remove_header."</A></TD>";
elseif ($use_verbose == true)
	echo "<TR><TD class='menu'><a href=\"$PHP_SELF?action=aff_mail&mail=$mail&verbose=1\" class='menu'>".$html_view_header."</A></TD>";
else
	echo "<TR><TD>&nbsp;</TD>";

// here comes the navigation 

/*if (($mail == 1) && ($num_messages > 1))
{
	echo "<TD>&nbsp;</TD><TD>&nbsp;</TD><TD>&nbsp;</TD><TD ALIGN=RIGHT colspan=2><a href=\"$PHP_SELF?action=aff_mail&mail=2&verbose=0\"><img src=\"img/next.gif\" border=\"0\"></A></TD></TR>";
}
elseif (($mail == $num_messages) && ($mail > 1))
{
	$mailp = $mail - 1;
	echo "<TD>&nbsp;</TD><TD>&nbsp;</TD><TD>&nbsp;</TD><TD ALIGN=RIGHT colspan=2><a href=\"$PHP_SELF?action=aff_mail&mail=$mailp&verbose=0\"><img src=\"img/previous.gif\" border=\"0\"></A></TD></TR>";
}
elseif (($mail < $num_messages) && ($mail >= 1))
{
	$mailp = $mail - 1;
	$mailn = $mail + 1;
	echo "<TD>&nbsp;</TD><TD>&nbsp;</TD><TD>&nbsp;</TD><TD ALIGN=RIGHT colspan=2><a href=\"$PHP_SELF?action=aff_mail&mail=$mailp&verbose=0\"><img src=\"img/previous.gif\" border=\"0\"></A>&nbsp;<a href=\"$PHP_SELF?action=aff_mail&mail=$mailn&verbose=0\"><img src=\"img/next.gif\" border=\"0\"></A></TD></TR>";
}*/
?>			
<td>&nbsp</td></tr>
<tr><td align="right" class="mail"><? echo $html_from ?></td><td bgcolor="<? echo $html_mail_tr_color ?>" class="mail"><B><? echo $content["from"] ?></B></td></tr>

<tr><td align="right" class="mail"><? echo $html_to ?></td><td bgcolor="<? echo $html_mail_tr_color ?>" class="mail"><? echo $content["to"] ?></td></tr>

<? 
if ($content["cc"] != "")
{ ?>
<tr><td align="right" class="mail"><? echo $html_cc ?></td><td bgcolor="<? echo $html_mail_tr_color ?>" class="mail"><? echo $content["cc"] ?></td></tr>
<?
}

if ($content["subject"] == "")
	$content["subject"] = $html_nosubject;
?>

<tr><td align="right" class="mail"><? echo $html_subject ?></td><td bgcolor="<? echo $html_mail_tr_color ?>" class="mail"><B><? echo $content["subject"] ?></B></td></tr>

<tr><td align="right" class="mail"><? echo $html_date?></td><td bgcolor="<? echo $html_mail_tr_color ?>" class="mail"><? echo $content["date"] ?></td></tr>

<? echo $content["att"] ?>

<tr><td colspan="2" bgcolor="#ffffff" class="mail"><pre><? echo $content["header"] ?></pre><br><? echo $content["body"] ?>