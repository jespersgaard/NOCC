<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<? echo $lang ?>" lang="<? echo $lang ?>">
	<head><title>NOCC - Webmail</title>
		<meta http-equiv="Content-Type" content="text/html; charset=<? echo $charset ?>" />
		<link href="style.css" rel="stylesheet" />
		<script type="text/javascript">
			function OpenHelpWindow(theURL,winName,features)
			{
				window.open(theURL,winName,features);
			}
		</script>
	</head>
	<body alink="<? echo $alink_color?>" bgcolor="<? echo $bgcolor ?>" link="<? echo $link_color ?>" text="<? 
echo $text_color ?>" vlink="<? echo $vlink_color ?>">
		<table border="0" width="100%">
			<tr>
				<td align="left" valign="middle" colspan="2">
					<img src="img/logo.png" alt="Logo" />
					<?
					if ($domain != "" && $user != "")
					{ ?>
						&nbsp;&nbsp;<font class="login"><b><? echo $user."@".$domain ?></b></font>
					<? } ?>
				</td>
			</tr>
			<tr>
				<td align="center" valign="top">
