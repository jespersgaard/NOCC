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
<BODY background="img/home.gif" bgcolor="#ffffff" link="<? echo $link_color ?>" text="<? echo $text_color ?>" vlink="<? echo $vlink_color ?>" alink="<? echo $alink_color ?>">
	<FORM action="action.php" method="post" name="nocc_webmail_login" target="_top">
	<TABLE border="0" cellpadding="0" cellspacing="0" width="400" align="center">
		<TR valign="top">
			<TD align="center">
				<IMG alt="NOCC Desktop" border="0" src="img/logo.gif">
			</TD>
		</TR>
		<TR>
			<TD align="center">
				<TABLE border="0" cellpadding="0" cellspacing="5" align="center">
					<TR>
						<TD>
							<span class="f"><? echo $html_login ?>
						</TD>
						<TD>
							<INPUT type="text" name="user"></span>
							<?
							if ($servr != "" && $provider != "")
							{ ?>
								@<select name="provider"><option value=""><? echo $provider ?></option></select>
							<?
							}
							?>
						</TD>
					</TR>
					<TR> 
						<TD><span class="f"><? echo $html_passwd ?></TD>
						<TD><INPUT type="password" name="passwd"></span></TD>
					</TR>
					<?
					if ($servr == "")
					{ ?>
					<TR>
						<td>
							<span class="f"><? echo $html_server ?></span>
						</td>
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
					<?
					}
					?>
					<TR>
						<TD COLSPAN="2" align="center">
							<INPUT name="enter" type="submit" value="<? echo $html_submit ?>">
						</TD>
					</TR>
				</TABLE>
				&nbsp;<span class="s">Powered by</span><br>
				<a href="http://nocc.sourceforge.net"><img src="img/button.gif" border="0"></a>
			</TD>
		</TR>
	</TABLE>
</FORM>
<script type="text/javascript">
<!--
	document.nocc_webmail_login.user.focus();
	document.nocc_webmail_login.passwd.value='';
// -->
</script>
</BODY></HTML>
