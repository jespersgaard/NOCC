<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/contacts_manager.php,v 1.13 2004/10/04 18:23:29 goddess_skuld Exp $
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

$pop = new nocc_imap($ev);
if (NoccException::isException($ev)) {
    require ('./html/header.php');         
    require ('./html/error.php');
    require ('./html/footer.php');
    exit;
}               
$pop->close();

// Load the contact list
$path = $conf->prefs_dir . "/" . $_SESSION['nocc_user'].'@'.$_SESSION['nocc_domain'].".contacts";
$contacts = load_list ($path);

$query_str = session_name("NOCCSESSID") . "=" . session_id();
?>
<html>
<head>
<link href="themes/<?php echo $_SESSION['nocc_theme']; ?>/style.css" rel="stylesheet" type="text/css" />
<title>NOCC - Webmail - <?php echo $html_contact_list . " " . $_SESSION["nocc_user"]; ?></title>
<meta content="text/html; charset=<?php echo $charset ?>" http-equiv="Content-Type" />
<script language="JavaScript">
function prompt_delete (email, id)
{
	if (confirm("<?php echo unhtmlentities($html_delete) ?> `" + email + "' <?php echo unhtmlentities($html_contact_del) ?> ?")) {
	 		var url = "<?php echo $_SERVER['PHP_SELF'] . "?" . $query_str ?>&action=delete&id=" + id;
			document.location.href = url;
		}
}
</script>
</head>

    <body dir="<?php echo $lang_dir; ?>" alink="<?php echo $glob_theme->alink_color; ?>" bgcolor="<?php echo $glob_theme->bgcolor; ?>" link="<?php echo $glob_theme->link_color ?>" text="<?php echo $glob_theme->text_color ?>" vlink="<?php echo $glob_theme->vlink_color; ?>">
    <p align="center"><font color="#FF0000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>
        <?php
            if (!isset($conf->contact_number_max) || $conf->contact_number_max == 0) {
                echo $html_contact_err3;
                exit;
            }
        ?>
    </p>
    
    <?php
if (!isset($_GET['action']))
{
    $_GET['action'] = "";
}
$action = $_GET['action'];
switch($action){
	case "add_prompt":
      if (isset($_GET['id']))
      {
	    $tab = array_pad(explode ("\t",$contacts[$_GET['id']]), -4, "");
      }
	?>
<form name="form2" method="post" action="<?php echo $_SERVER['PHP_SELF'] . "?" . $query_str ?>&amp;action=add">
  <table border="0" align="center" cellpadding="3" bgcolor="<?php echo $glob_theme->inside_color ?>">
    <tr align="center">
      <td colspan="2" class="menu" bgcolor="<?php echo $glob_theme->menu_color ?>"><font><b><?php echo $html_contact_list . " " . $_SESSION["nocc_user"]; ?></b></font></td>
    </tr>
    <tr valign="middle">
    <?php
        if (!isset($_GET['modif']))
        {
            $_GET['modif'] = false;
        }
    ?>
      <td height="30" colspan="2" align="center"  class="inbox"><b><font color="<?php echo $glob_theme->alink_color ?>"><?php echo ($_GET['modif']) ? $html_contact_mod : $html_contact_add ?>
        </font></b></td>
    </tr>
    <?php if (count ($contacts) < $conf->contact_number_max || $_GET['modif']) { ?>
    <tr>
      <td align="right"  class="inbox"><?php echo $html_contact_first ?> :</td>
      <td><input name="first" type="text" id="first" value="<?php if (isset($tab[0])) { echo $tab[0]; } ?>"></td>
    </tr>
    <tr>
      <td align="right"  class="inbox"><?php echo $html_contact_last ?> :</td>
      <td><input name="last" type="text" id="last" value="<?php if (isset($tab[1])) { echo $tab[1]; } ?>"></td>
    </tr>
    <tr>
      <td align="right"  class="inbox"><?php echo $html_contact_nick ?> :</td>
      <td><input name="nick" type="text" id="nick" value="<?php if (isset($tab[2])) { echo $tab[2]; } ?>"></td>
    </tr>
    <tr>
      <td align="right"  class="inbox"><?php echo $html_contact_mail ?> :</td>
      <td><input name="email" type="text" id="email" value="<?php if (isset($tab[3])) { echo $tab[3]; } ?>"></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="button" name="Submit2" value="<?php echo $html_cancel ?>" class="button" onClick="self.history.go (-1);">
        <input type="hidden" name="modif" value="<?php echo $_GET['modif'] ?>">
        <input type="hidden" name="id" value="<?php if (!isset($_GET['id'])) {echo '0';} else {echo $_GET['id'];} ?>">
        <input type="submit" name="Submit4" value="<?php echo ($_GET['modif']) ?  $html_modify : $html_add ?>" class="button"></td>
    </tr>
    <?php } else  { ?>
    <tr align="center">
      <td colspan="2"  class="inbox"><p><font color="#FF0000"><?php echo $html_contact_err1 ."\"" . $conf->contact_number_max . "\"" ?><br>
          <?php echo $html_contact_err2 ?>.</font></p>
        <p><a href="<?php echo $_SERVER['PHP_SELF']; ?>"><?php echo $html_back; ?></a></p>
        </td>
    </tr>
    <?php } ?>
  </table>
</form>
<?
		break;
	case "add":
	if (!empty($_POST['email']))
	{
            //The following foreach block performs some sanity checking and cleanup
	    foreach( array('first','last','nick','email') as $contact_element )
	    {
	        //We should strip slashes here
	        if( get_magic_quotes_gpc() )
		    $_POST[$contact_element] = stripslashes( $_POST[$contact_element] );
		//Strip tabs that COULD be inserted into fields(causing corrupted DB)
		$_POST[$contact_element] = str_replace( '\t','',$_POST[$contact_element] );
		//Maybe more sanity checking needs to be done???
	    }
		if (count ($contacts) < $conf->contact_number_max && empty ($_POST['modif']))
		{
	    	$line = $_POST['first'] . "\t" . $_POST['last'] . "\t" . $_POST['nick'] . "\t" . $_POST['email'];
			array_push ($contacts, $line);
			save_list ($path, $contacts, $conf, $ev);
			if (NoccException::isException($ev)) {
			   require ('./html/error.php');
			   require ('./html/footer.php');
			   break;
			}

		}
		if (!empty ($_POST['modif']))
		{
	    	$line = $_POST['first'] . "\t" . $_POST['last'] . "\t" . $_POST['nick'] . "\t" . $_POST['email'];
			$contacts[$_POST['id']] = $line;
			save_list ($path, $contacts, $conf, $ev);
			if (NoccException::isException($ev)) {
			   require ('./html/error.php');
			   require ('./html/footer.php');
			   break;
			}

		}
		$contacts = load_list ($path);
	}
	else {
			echo "<script language=\"JavaScript\">alert (\"Error : Email Field is empty.\");</script>";
			echo "<script language=\"JavaScript\">self.history.go (-1)</script>";
		}
	?>
	<script language="JavaScript">self.location.href="<?php echo $_SERVER['PHP_SELF'] . "?" . $query_str ?>";</script>
<?
		;
		break;
	case "delete":
	$new_contacts = array ();
	for ($i = 0; $i < count ($contacts); ++$i)
		if ($_GET['id'] != $i)
			$new_contacts[] = $contacts[$i];

	save_list ($path, $new_contacts, $conf, $ev);
	if (NoccException::isException($ev)) {
	   require ('./html/error.php');
	   require ('./html/footer.php');
	   break;
	}

	$contacts = load_list ($path);
		;

	default:
	// Default show the contacts
	?>
<table width="300" border="0" align="center" cellpadding="4" cellspacing="0">
  <tr align="center" bgcolor="<?php echo $glob_theme->menu_color ?>" class="menu">
    <td nowrap><b><?php echo $html_contact_first ?></b></td>
    <td nowrap><b><?php echo $html_contact_last ?></b></td>
    <td nowrap><b><?php echo $html_contact_nick ?></b></td>
    <td nowrap><b><?php echo $html_contact_mail ?></b></td>
    <td colspan="2" nowrap>&nbsp;</td>
  </tr>
  <?
	for ($i = 0; $i < count ($contacts); ++$i)
	{
		$tab = array_pad(explode ("\t",$contacts[$i]), -4, "");
?>
  <tr class="inbox" bgcolor="<?php echo ($i % 2) ? $glob_theme->tr_color : $glob_theme->inside_color ?>">
    <td><span style="color:<?php echo ($i % 2) ? "#ffffff" : "#000000" ?>"><?php echo ($tab[0]) ? $tab[0] : "&nbsp;"; ?></span></td>
    <td><span style="color:<?php echo ($i % 2) ? "#ffffff" : "#000000" ?>"><?php echo ($tab[1]) ? $tab[1] : "&nbsp;"; ?></span></td>
    <td><span style="color:<?php echo ($i % 2) ? "#ffffff" : "#000000" ?>"><?php echo ($tab[2]) ? $tab[2] : "&nbsp;"; ?></span></td>
    <td><span style="color:<?php echo ($i % 2) ? "#ffffff" : "#000000" ?>"><?php echo $tab[3]; ?></span></td>
    <td><input type="button" name="Submit5" value="<?php echo $html_modify ?>" class="button" onClick="self.location.href='<?php echo $_SERVER['PHP_SELF'] . "?" . $query_str ?>&amp;action=add_prompt&amp;id=<?php echo $i ?>&amp;modif=1'">
    </td>
    <td><input type="button" name="Submit" value="<?php echo $html_delete ?>" class="button" onClick="prompt_delete ('<?php echo $tab[3] ?>', <?php echo $i ?>)">
    </td>
  </tr>
  <?
	}
?>
</table>

<p align="center"><a href="<?php echo $_SERVER['PHP_SELF'];; ?>?action=add_prompt&amp;<?php echo $query_str ?>"><font face="Verdana, Arial, Helvetica, sans-serif"><b><?php echo $html_contact_add ?></b></font></a></p>
    <?	;
} // switch
?>
</body>
</html>
