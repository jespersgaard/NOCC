<?
/*
 * $Header$ 
 *
 * Copyright 2000 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2000 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 */

require ("conf.php");
require ("check_lang.php");
session_unset();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<TITLE>NOCC - Webmail</TITLE>
<META http-equiv="pragma" content="no-cache">
<META content="text/html; charset=<? echo $charset ?>" http-equiv="Content-Type">
<LINK href="style.css" rel="stylesheet">
<script type="text/javascript">
function updatePort () {
  if 
(document.nocc_webmail_login.servtype.options[document.nocc_webmail_login.servtype.selectedIndex].value 
== 'imap') {
    document.nocc_webmail_login.port.value = 143;
  } else if 
(document.nocc_webmail_login.servtype.options[document.nocc_webmail_login.servtype.selectedIndex].value 
== 'pop3') {
    document.nocc_webmail_login.port.value = 110;
  }
}
</script>
</HEAD>
<BODY bgcolor="<? echo $bgcolor ?>" link="<? echo $link_color ?>" text="<? echo $text_color ?>" vlink="<? 
echo $vlink_color ?>" alink="<? echo $alink_color ?>">
<FORM action="action.php" method="post" name="nocc_webmail_login" target="_top">
<input type="hidden" name="lang" value="<? echo $lang ?>">
<table border="0" width="100%" height="100%">
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
								<td colspan="3" align="center">
								<a href="<? echo $PHP_SELF ?>?lang=fr"><img src="img/fr.png" border="0" height="12" width="12" ALT="<? echo $alt_fr ?>"></a>
								&nbsp;
								<a href="<? echo $PHP_SELF ?>?lang=en"><img src="img/uk.png" border="0" height="12" width="12" ALT="<? echo $alt_en ?>"></a>
								&nbsp;
								<a href="<? echo $PHP_SELF ?>?lang=de"><img src="img/de.png" border="0" height="12" width="12" ALT="<? echo $alt_de ?>"></a>
								</td>
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
									<INPUT type="text" name="user" size="15">
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
								<td align=right class="f"><? echo $html_passwd ?></td>
								<td><font size="-3">&nbsp;</font></td>
								<td class="f"> 
									<INPUT type="password" name="passwd" size="15">
								</td>
							</tr>
							<tr> 
								<td colspan="3" height="12"><font size="-3">&nbsp;</font></td>
							</tr>
							<?
							if ($servr == "")
							{ ?>
							<TR>
								<td align="right" class="f">
									<? echo $html_server ?>
								</td>
								<td><font size="-3">&nbsp;</font></td>
								<td class="f">
									<input type="text" name="server" value="mail.example.com" size="15"><br>
									<input type="text" size="4" name="port" value="143">
									<select name="servtype" onChange="updatePort();">
										<option value="imap">IMAP</option>
										<option value="pop3">POP3</option>
									</select>
								</td>
							</TR>
							<tr> 
								<td colspan="3" height="12"><font size="-3">&nbsp;</font></td>
							</tr>
							<?
							}
							?>
							<TR>
								<TD COLSPAN="3" align="center" class="f">
									<INPUT name="enter" type="submit" value="<? echo $html_submit ?>">
								</TD>
							</TR>
							<tr> 
								<td colspan="3" height="12"><font size="-3">&nbsp;</font></td>
							</tr>
							<?
							if (!(extension_loaded('imap')))
							{ ?>
							<tr>
								<td colspan="3" height="12"><font color="red"><b>The IMAP module does not seem to be installed on this PHP setup, please see Nocc's documentation.</b></font></td>
							</tr>
							<? } ?>
						</table>
					</td>
				</tr>
			</table>
			<script type="text/javascript">
			<!--
				document.nocc_webmail_login.user.focus();
				document.nocc_webmail_login.passwd.value='';
			// -->
			</script>
	</td>
</tr>
<tr>
	<td align="center" colspan="2"><a href="http://nocc.sourceforge.net/" target="_blank"><img src="img/button.png" border="0" height="31" width="88" alt="Powered by NOCC"></a></td>
</tr>
</table>
</form>
</body>
</html>
