<?
/*
 * $Header: /cvsroot/nocc/nocc/webmail/index.php,v 1.42 2001/02/15 10:27:01 nicocha Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 */

if (floor(phpversion()) != 4)
{
	echo ("<font color=\"red\"><b>You don't seem to be running PHP 4, you need at least PHP 4 to run NOCC.</b></font><br /><br /><div align=\"center\"><img src=\"img/button.png\" width=\"88\" height=\"31\" alt=\"Powered by NOCC\" /></div>");
	exit;
}
if (!(extension_loaded('imap')))
{
	echo ("<font color=\"red\"><b>The IMAP module does not seem to be installed on this PHP setup, please see NOCC's documentation.</b></font><br /><br /><div align=\"center\"><img src=\"img/button.png\" width=\"88\" height=\"31\" alt=\"Powered by NOCC\" /></div>");
	exit;
}
require ("conf.php");
require ("check_lang.php");
session_destroy();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<? echo $lang ?>" lang="<? echo $lang ?>">
<head>
<title>NOCC - Webmail</title>
<meta http-equiv="Content-Type" content="text/html; charset=<? echo $charset ?>" />
<link href="style.css" rel="stylesheet" />
<script type="text/javascript">
<!--
function updatePort () 
{
	if (document.nocc_webmail_login.servtype.options[document.nocc_webmail_login.servtype.selectedIndex].value == 'imap') 
	{
		document.nocc_webmail_login.port.value = 143;
	}
	else if (document.nocc_webmail_login.servtype.options[document.nocc_webmail_login.servtype.selectedIndex].value == 'pop3')
	{
		document.nocc_webmail_login.port.value = 110;
	}
}

function selectLang() 
{
	if (document.nocc_webmail_login.user.value == "" && document.nocc_webmail_login.passwd.value == "")
	{
		var lang_page = "<?echo $PHP_SELF?>?lang=" + document.nocc_webmail_login.lang[document.nocc_webmail_login.lang.selectedIndex].value;
		self.location = lang_page;
	}
}
// -->
</script>
</head>
<body bgcolor="<? echo $bgcolor ?>" link="<? echo $link_color ?>" text="<? echo $text_color ?>" vlink="<? 
echo $vlink_color ?>" alink="<? echo $alink_color ?>">
<form action="action.php" method="post" name="nocc_webmail_login" target="_top">
<table border="0" width="100%">
	<tr>
		<td align="center" valign="middle">
			<table bgcolor="<? echo $login_border ?>" border="0" cellpadding="1" cellspacing="0" width="428" align="center">
				<tr> 
					<td valign="bottom"> 
						<table bgcolor="<? echo $login_box_bgcolor ?>" border="0" cellpadding="0" cellspacing="0" width="428">
							<tr> 
								<td colspan="3" height="18"><font size="-3">&nbsp;</font></td>
							</tr>
							<tr> 
								<td colspan="3" height="18"><font size="-3">&nbsp;</font></td>
							</tr>
							<tr valign="top"> 
				               <td align="center" colspan="3" class="f"><b><? echo $html_welcome." ".$nocc_name." v".$nocc_version; ?></b></td>
							</tr>
							<tr> 
								<td colspan="3" height="12"><font size="-3">&nbsp;</font></td>
							</tr>
							<tr>
								<td width="150" align="right" class="f"><? echo $html_login ?></td>
								<td><font size="-3">&nbsp;</font></td>
								<td class="f"> 
									<input type="text" name="user" size="15" />
									<?
									if ($servr != "" && $domain != "")
									{ ?>
										@<select name="domain"><option value=""><? echo $domain ?></option></select>
									<?
									}
									?>
								</td>
							</tr>
							<tr> 
								<td colspan="3" height="12"><font size="-3">&nbsp;</font></td>
							</tr>
							<tr> 
								<td align="right" class="f"><? echo $html_passwd ?></td>
								<td><font size="-3">&nbsp;</font></td>
								<td class="f"> 
									<input type="password" name="passwd" size="15" />
								</td>
							</tr>
							<tr> 
								<td colspan="3" height="12"><font size="-3">&nbsp;</font></td>
							</tr>
							<?
							if ($servr == "")
							{ ?>
							<tr>
								<td align="right" class="f">
									<? echo $html_server ?>
								</td>
								<td><font size="-3">&nbsp;</font></td>
								<td class="f">
									<input type="text" name="server" value="mail.example.com" size="15" /><br />
									<input type="text" size="4" name="port" value="143" />
									<select name="servtype" onchange="updatePort()">
										<option value="imap">IMAP</option>
										<option value="pop3">POP3</option>
									</select>
								</td>
							</tr>
							<tr> 
								<td colspan="3" height="12"><font size="-3">&nbsp;</font></td>
							</tr>
							<?
							}
							?>
							<tr>
								<td align="right" class="f">
									<? echo $html_lang ?>
								</td>
								<td><font size="-3">&nbsp;</font></td>
								<td class="f">
									<?
										echo ("<select name=\"lang\" onchange=\"selectLang()\">");
										for ($i = 0; $i < sizeof($lang_array); $i++)
											if (file_exists("lang/".$lang_array[$i]->filename.".php"))
											{
												echo ("<option value=\"".$lang_array[$i]->filename."\"");
												if ($lang == $lang_array[$i]->filename)
													echo (" selected=\"selected\"");
												echo (">".$lang_array[$i]->label."</option>");
											}
										echo ("</select>");
									?>
								</td>
							</tr>
							<tr>
								<td colspan="3">&nbsp;</td>
							</tr>
							<tr>
								<td colspan="3" align="center" class="f">
									<input name="enter" class="button" type="submit" value="<? echo $html_submit ?>" />
								</td>
							</tr>
							<tr> 
								<td colspan="3" height="12"><font size="-3">&nbsp;</font></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<script type="text/javascript">
				document.nocc_webmail_login.user.focus();
				document.nocc_webmail_login.passwd.value='';
			</script>
	</td>
</tr>
<tr>
	<td align="center" colspan="2"><a href="http://nocc.sourceforge.net/" target="_blank"><img src="img/button.png" border="0" height="31" width="88" alt="Powered by NOCC" /></a></td>
</tr>
</table>
</form>
</body>
</html>