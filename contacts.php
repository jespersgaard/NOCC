<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/contacts.php,v 1.5 2004/01/10 08:07:48 goddess_skuld Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 * Copyright 2003 Olivier Jourdat <jourda_v@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 */

require_once ('proxy.php');
require_once ('./conf.php');
require_once ('./functions.php');
require_once ('./common.php');
$_SESSION['nocc_loggedin'] = 1;
?>
<html>
<head>
<title>NOCC - Webmail - <?php echo $html_contact_list . " " . $_SESSION["nocc_user"]; ?></title>
<link href="themes/<?php echo $_SESSION['nocc_theme']; ?>/style.css" rel="stylesheet" type="text/css" />

<meta content="text/html; charset=<?php echo $charset ?>" http-equiv="Content-Type" />
<script language="JavaScript">


function action (bt, email)
{
var field = window.opener.document.sendform.<?php echo $_GET["field"]; ?>.value;

if (bt.value == '<?php echo $html_add ?>')
	{
		if (field == '')
			window.opener.document.sendform.<?php echo $_GET["field"]; ?>.value = email;
		else
			window.opener.document.sendform.<?php echo $_GET["field"]; ?>.value = field + "," + email;
	}
	else
	{
		var f = '';
		tbl = field.split(",");
		for (i = 0; i < tbl.length; ++i)
		{
			if (f != '' && tbl[i] != email)
				f += ',';
			if (tbl[i] != email)
				f += tbl[i];
		}
		window.opener.document.sendform.<?php echo $_GET["field"]; ?>.value = f;
	}
}

function toggle (bt)
{
	if (bt.value == '<?php echo $html_add ?>')
		bt.value = '<?php echo $html_delete ?>';
	else
		bt.value = '<?php echo $html_add ?>';
}

</script>
</head>
    <body dir="<?php echo $lang_dir; ?>" alink="<?php echo $glob_theme->alink_color; ?>" bgcolor="<?php echo $glob_theme->bgcolor; ?>" link="<?php echo $glob_theme->link_color ?>" text="<?php echo $glob_theme->text_color ?>" vlink="<?php echo $glob_theme->vlink_color; ?>">
    <p align="center"><font color="#0033CC" size="2" face="Verdana, Arial, Helvetica, sans-serif"><b><?php echo $html_contact_list . " " . $_SESSION["nocc_user"]; ?></b></font> </p>

<table width="300" border="0" align="center" cellpadding="4" cellspacing="0">
  <tr align="center" bgcolor="<?php echo $glob_theme->menu_color ?>" class="menu">
    <td nowrap><b><?php echo $html_contact_first ?></b></td>
    <td nowrap><b><?php echo $html_contact_last ?></b></td>
    <td nowrap><b><?php echo $html_contact_nick ?></b></td>
    <td nowrap><b><?php echo $html_contact_mail ?></b></td>
    <td nowrap>&nbsp;</td>
  </tr>
<?
 	$path = $conf->prefs_dir . "/" .$_SESSION['nocc_user'].'@'.$_SESSION['nocc_domain'].".contacts";
	$contacts = load_list ($path);

	for ($i = 0; $i < count ($contacts); ++$i)
	{
		$tab = explode ("\t",$contacts[$i]);
?>
  <tr class="inbox" bgcolor="<?php echo ($i % 2) ? $glob_theme->tr_color : $glob_theme->inside_color ?>">
    <td><span style="color:<?php echo ($i % 2) ? "#ffffff" : "#000000" ?>"><?php echo ($tab[0]) ? $tab[0] : "&nbsp;"; ?></span></td>
    <td><span style="color:<?php echo ($i % 2) ? "#ffffff" : "#000000" ?>"><?php echo ($tab[1]) ? $tab[1] : "&nbsp;"; ?></span></td>
    <td><span style="color:<?php echo ($i % 2) ? "#ffffff" : "#000000" ?>"><?php echo ($tab[2]) ? $tab[2] : "&nbsp;"; ?></span></td>
    <td><span style="color:<?php echo ($i % 2) ? "#ffffff" : "#000000" ?>"><?php echo $tab[3]; ?></span></td>
    <td align="right"><input type="button" name="Submit" value="<?php echo $html_add ?>" class="button" onClick="action (this, '<?php echo trim($tab[3]); ?>');toggle (this);"></td>
  </tr>
<?
	}
?>
</table>
</body>
</html>
