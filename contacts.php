<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/contacts.php,v 1.11 2005/07/02 14:25:39 goddess_skuld Exp $
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

if(isset($charset))
  header ("Content-type: text/html; Charset=$charset");
else
  header ("Content-type: text/html");

$pop = new nocc_imap($ev);
if (NoccException::isException($ev)) {
  require ('./html/header.php'); 
  require ('./html/error.php');
  require ('./html/footer.php');
  exit;
}   
$pop->close();

$_SESSION['nocc_loggedin'] = 1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $lang; ?>">
<head>
<title>NOCC - Webmail - <?php echo $html_contact_list . " " . $_SESSION["nocc_user"]; ?></title>
<link href="themes/<?php echo $_SESSION['nocc_theme']; ?>/style.css" rel="stylesheet" type="text/css" />

<meta content="text/html; charset=<?php echo $charset ?>" http-equiv="Content-Type" />
<script type="text/javascript">


function action (bt, email)
{
  var field = window.opener.document.sendform.<?php echo $_GET["field"]; ?>.value;

  if (bt.value == '<?php echo unhtmlentities($html_add) ?>')
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
  if (bt.value == '<?php echo unhtmlentities($html_add) ?>')
    bt.value = '<?php echo unhtmlentities($html_delete) ?>';
  else
    bt.value = '<?php echo unhtmlentities($html_add) ?>';
}
</script>
</head>

<body dir="<?php echo $lang_dir; ?>">
  <?php
    if (!isset($conf->contact_number_max) || $conf->contact_number_max == 0) {
  ?>
  <div class="error">
    <table class="errorTable">
      <tr class="errorTitle">
        <td><?php echo $html_error_occurred ?></td>
      </tr>
      <tr class="errorText">
        <td>
          <p><?php echo $html_contact_err3; ?></p>
        </td>
      </tr>
    </table>
  </div>
  <?php
      exit;
    }
  ?>
  <div class="contactsList">
    <p class="contactsTitle">
      <?php echo $html_contact_list . " " . $_SESSION["nocc_user"]; ?>
    </p>

    <table>
      <tr class="contactsListHeader">
        <td><?php echo $html_contact_first ?></td>
        <td><?php echo $html_contact_last ?></td>
        <td><?php echo $html_contact_nick ?></td>
        <td><?php echo $html_contact_mail ?></td>
        <td>&nbsp;</td>
      </tr>
      <?php
        $path = $conf->prefs_dir . "/" .$_SESSION['nocc_user'].'@'.$_SESSION['nocc_domain'].".contacts";
        $contacts = load_list ($path);

        for ($i = 0; $i < count ($contacts); ++$i)
        {
          $tab = explode ("\t",$contacts[$i]);
      ?>
      <tr class="<?php echo ($i % 2) ? "contactsListEven" : "contactsListOdd" ?>">
        <td><?php echo ($tab[0]) ? $tab[0] : "&nbsp;"; ?></td>
        <td><?php echo ($tab[1]) ? $tab[1] : "&nbsp;"; ?></td>
        <td><?php echo ($tab[2]) ? $tab[2] : "&nbsp;"; ?></td>
        <td><?php echo $tab[3]; ?></td>
        <td><input type="button" name="Submit" value="<?php echo unhtmlentities($html_add) ?>" class="button" onclick="action (this, '<?php echo trim($tab[3]); ?>');toggle (this);"/></td>
      </tr>
      <?php
        }
      ?>
    </table>
  </div>
</body>
</html>
