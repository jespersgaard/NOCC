<HTML>
	<HEAD><TITLE>NOCC Desktop - Webmail</TITLE>
		<META http-equiv="pragma" content="no-cache">
		<META content="text/html; charset=windows-1252" http-equiv=Content-Type>
		<LINK href="style.css" rel="stylesheet">
	</HEAD>
	<BODY alink="<? echo $alink_color?>" background="img/home.gif" bgcolor="#ffffff" link="<? echo $link_color ?>" text="<? echo $text_color ?>" vlink="<? echo $vlink_color ?>">
		<table border="0" width="100%">
			<tr>
				<td align="left" valign="absmiddle" colspan="2">
					<img src="img/logo.gif">
					<?
					if ($provider != "")
					{ ?>
						&nbsp;&nbsp;<font class="login"><b><i><? echo $user."@".$provider ?></i></b></font>
					<? } ?>
				</td>
			</tr>
			<tr>
				<td align="center" valign="top">