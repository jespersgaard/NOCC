<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<? echo $lang ?>" lang="<? echo $lang ?>">
	<head><title>NOCC - Webmail</title>
		<meta http-equiv="Content-Type" content="text/html; charset=<? echo $charset ?>" />
		<link href="themes/<? echo $theme ?>/style.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript">
			function OpenHelpWindow(theURL,winName,features)
			{
				window.open(theURL,winName,features);
			}
		</script>
	</head>
	<body alink="<? echo $glob_theme->alink_color?>" bgcolor="<? echo $glob_theme->bgcolor ?>" link="<? echo $glob_theme->link_color ?>" text="<? 
echo $glob_theme->text_color ?>" vlink="<? echo $glob_theme->vlink_color ?>">
		<table border="0" width="100%">
			<tr>
				<td align="left" valign="middle" colspan="2">
					<img src="img/logo.png" width="153" height="47" alt="Logo" />
					<?
					if ($domain != "" && $user != "")
					{ ?>
						&nbsp;&nbsp;<font class="login"><b><? echo $user."@".$domain ?></b></font>
					<? } ?>
				</td>
			</tr>
			<tr>
				<td align="center" valign="top">
