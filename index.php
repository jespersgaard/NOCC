<?
require ("conf.php");
require ("check_lang.php");
session_unset();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE>NOCC Desktop - Webmail</TITLE>
<META http-equiv="pragma" content="no-cache">
<META content="text/html; charset=iso-8859-1" http-equiv="Content-Type">
<LINK href="style.css" rel="stylesheet">
<script type="text/javascript">
function updatePort () {
  if (document.nocc_webmail_login.servtype.options[document.nocc_webmail_login.servtype.selectedIndex].value == 'imap') {
    document.nocc_webmail_login.port.value = 143;
  } else if (document.nocc_webmail_login.servtype.options[document.nocc_webmail_login.servtype.selectedIndex].value == 'pop3') {
    document.nocc_webmail_login.port.value = 110;
  }
}
</script>
</HEAD>
<BODY bgcolor="<? echo $bgcolor ?>" link="<? echo $link_color ?>" text="<? echo $text_color ?>" vlink="<? echo $vlink_color ?>" alink="<? echo $alink_color ?>">
<FORM action="action.php" method="post" name="nocc_webmail_login" target="_top">
<table border="0" width="100%" height="100%">
	<tr>
		<td align="center" valign="middle">
			<table bgcolor="<? echo $login_border ?>" border="0" cellpadding="1" cellspacing="0" width="428" align="center">
				<tr> 
					<td valign="bottom"> 
						<table bgcolor="<? echo $login_box_bgcolor ?>" border="0" cellpadding="0" cellspacing="0" width="428">
							<TR valign="top">
								<TD align="center" colspan="3">
									<IMG alt="NOCC" border="0" src="img/logo.gif">
								</TD>
							</TR>
							<tr> 
								<td colspan="3" height="18"><font size="-3">&nbsp;</font></td>
							</tr>
							<tr valign="top"> 
				               <td align="center" colspan="3"><span class="f"><b><? echo $html_welcome." ".$name." ".$version; ?></b></span></td>
							</tr>
							<tr> 
								<td colspan="3" height="12"><font size="-3">&nbsp;</font></td>
							</tr>
							<tr>
								<td align="right"><span class="f"><? echo $html_login ?></td>
								<td><font size="-3">&nbsp;</font></td>
								<td> 
									<INPUT type="text" name="user"></span>
									<?
									if ($servr != "" && $provider != "")
									{ ?>
										@<select name="provider"><option value=""><? echo $provider ?></option></select>
									<?
									}
									?>
								</td>
							</tr>
							<tr> 
								<td colspan="3" height="12"><font size="-3">&nbsp;</font></td>
							</tr>
							<tr> 
								<td align=right><span class="f"><? echo $html_passwd ?></td>
								<td><font size="-3">&nbsp;</font></td>
								<td> 
									<INPUT type="password" name="passwd">
								</td>
							</tr>
							<tr> 
								<td colspan="3" height="12"><font size="-3">&nbsp;</font></td>
							</tr>
							<tr>
							<?
							if ($servr == "")
							{ ?>
							<TR>
								<td align="right">
									<span class="f"><? echo $html_server ?></span>
								</td>
								<td><font size="-3">&nbsp;</font></td>
								<td>
									<span class="f">
									<input type="text" name="server" value="mail.example.com"><br>
									<input type="text" size="4" name="port" value="143">
									<select name="servtype" onChange="updatePort();">
										<option value="imap">IMAP</option>
										<option value="pop3">POP3</option>
									</select>
									</span>
								</td>
							</TR>
							<tr> 
								<td colspan="3" height="12"><font size="-3">&nbsp;</font></td>
							</tr>
							<?
							}
							?>
							<TR>
								<TD COLSPAN="3" align="center">
									<INPUT name="enter" type="submit" value="<? echo $html_submit ?>">
								</TD>
							</TR>
							<tr> 
								<td colspan="3" height="12"><font size="-3">&nbsp;</font></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			</form>
			<script type="text/javascript">
			<!--
				document.nocc_webmail_login.user.focus();
				document.nocc_webmail_login.passwd.value='';
			// -->
			</script>
<? require ("html/footer.php"); ?>