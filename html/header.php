<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
	<HEAD><TITLE>NOCC - Webmail</TITLE>
		<META http-equiv="pragma" content="no-cache">
		<META content="text/html; charset=<? echo $charset ?>" http-equiv="Content-Type">
		<LINK href="style.css" rel="stylesheet">
		<SCRIPT LANGUAGE="javascript">
			function OpenHelpWindow(theURL,winName,features)
			{
				window.open(theURL,winName,features);
			}
		</SCRIPT>
	</HEAD>
	<BODY alink="<? echo $alink_color?>" bgcolor="<? echo $bgcolor ?>" link="<? echo $link_color ?>" text="<? echo $text_color ?>" vlink="<? echo $vlink_color ?>">
		<table border="0" width="100%">
			<tr>
				<td align="left" valign="absmiddle" colspan="2">
					<img src="img/logo.gif" alt="Logo">
					<?
					if ($domain != "")
					{ ?>
						&nbsp;&nbsp;<font class="login"><b><i><? echo $user."@".$domain ?></i></b></font>
					<? } ?>
				</td>
			</tr>
			<tr>
				<td align="center" valign="top">
