<?
require ("conf.php");
require ("check_lang.php");
 /*
if (session_is_registered("user") && session_is_registered("passwd"))
	Header("Location: action.php");
else
{
	if (ISSET($user) && ISSET($passwd))
	{
		if ($user == "")
			$err = $err_user_empty;
		else
			session_register("user");
		if ($passwd == "")
			$err = $err_passwd_empty;
		else
			session_register("passwd");
	}
}
if (session_is_registered("user") && session_is_registered("passwd"))
	Header("Location: action.php?action=default");
	//require ("redirection.php");*/
?>
<HTML><HEAD><TITLE>NOCC Webmail</TITLE>
<META content="text/html; charset=windows-1252" http-equiv=Content-Type>
<LINK href="style.css" rel="stylesheet">
</HEAD>
<BODY background="img/home.gif" bgcolor="#ffffff" link="<? echo $link_color ?>" text="<? echo $text_color ?>" vlink="<? echo $vlink_color ?>" alink="<? echo $alink_color ?>">

<FORM action="action.php" method="post" name="ohmymail_login" target="_top">
<TABLE border="0" cellpadding="0" cellspacing="0" width="590">
	<TR valign="top">
		<TD nowrap width="312">
			<TABLE border="0" cellpadding="0" cellspacing="0" width="312">
				<TR>
					<TD align="left"><IMG alt="OhMyMail !" border="0" height="55" src="img/ohmymail.gif" width="213"></TD>
				</TR>
				<TR>
					<TD>
					<a href="<? echo $PHP_SELF."?&lang=fr" ?>"><IMG border=0 height=12 src="img/fr.gif" width=12></a>
					&nbsp;&nbsp;&nbsp;
					<a href="<? echo $PHP_SELF."?&lang=uk" ?>"><IMG border=0 height=12 src="img/uk.gif" width=12></a>
					&nbsp;&nbsp;&nbsp;
					<a href="<? echo $PHP_SELF."?&lang=sp" ?>"><IMG border=0 height=12 src="img/sp.gif" width=12></a>
					</TD>
				</TR>
			</TABLE>
			<BR>
			<P><FONT class=f color=#FFC061 size=4><B><? echo $html_what ?></B></FONT><BR>
			<FONT class=sw><? echo $html_explanation ?></FONT> 
			<P><FONT class=f color=#FFC061 size=2><B>&nbsp;</B></FONT> 
			<BR>
			&nbsp;&nbsp;
			<A href="help.php?lang=<? echo $lang ?>" target=_top><FONT class=sw><? echo $html_help ?></FONT></A><BR>
      </TD>
    <TD width="10"><IMG border="0" height="1" src="img/spacer.gif" width="10"></TD>
    <TD width="268">
        <TABLE border="0" cellpadding="0" cellspacing="0">
          <TR> 
            <TD colspan="3"> 
              <TABLE border="1" bordercolor="#336699" cellpadding="2" cellspacing="0" width="100%">
                <TR> 
                  <TD><FONT class="f" size="4"><? echo $html_ad ?></FONT></TD>
                </TR>
              </TABLE>
            </TD>
          </TR>
          <TR> 
            <TD colspan="3" height="30" valign="bottom"><FONT class="f" size="2"><? echo $html_login ?></FONT></TD>
          </TR>
          <TR> 
            <TD> 
              <INPUT maxLength="64" name="user" size="16">
            </TD>
            <TD align="middle" valign="center" width="22"><FONT class="f"><B>@</B></FONT></TD>
            <TD> 
              <SELECT name="domain">
                <option value="<? echo $provider ?>"><? echo $provider ?></option>
              </SELECT>
            </TD>
          </TR>
          <TR> 
            <TD colspan="3" nowrap><FONT class="f" size="2"><? echo $html_passwd ?></FONT></TD>
          </TR>
          <TR> 
            <TD> 
              <INPUT maxLength="16" name="passwd" size="16" type="password">
            </TD>
            <TD>&nbsp;</TD>
            <TD> 
              <INPUT name="enter" type="submit" value="<? echo $html_submit ?>">
            </TD>
          </TR> 
        </TABLE>
          <CENTER>
            <BR>
            &nbsp;<FONT class="s">© 2000 <a href="mailto:chalan_n@epita.fr">Nicolas Chalanset</a>. All rights reserved.</FONT> 
          </CENTER>
      </TD></TR></TABLE>
</FORM>
<SCRIPT language="JavaScript">
<!--
	document.ohmymail_login.user.focus();
	document.ohmymail_login.passwd.value='';
// -->
</SCRIPT>
</BODY></HTML>