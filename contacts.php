<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/contacts.php,v 1.18 2008/09/11 22:08:26 gerundt Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 * Copyright 2003 Olivier Jourdat <jourda_v@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 */

require_once ('./common.php');
require_once ('./utils/proxy.php');
require_once ('./utils/functions.php');

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


function toggleemail (bt, email)
{
  var field = window.opener.document.getElementById("sendform").<?php echo $_GET["field"]; ?>.value;

  if (bt.value == '<?php echo unhtmlentities($html_add) ?>')
  {
    if (field == '')
      window.opener.document.getElementById("sendform").<?php echo $_GET["field"]; ?>.value = email;
    else
      window.opener.document.getElementById("sendform").<?php echo $_GET["field"]; ?>.value = field + "," + email;
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
    window.opener.document.getElementById("sendform").<?php echo $_GET["field"]; ?>.value = f;
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

<body id="popup" dir="<?php echo $lang_dir; ?>">
  <?php
    if (!isset($conf->contact_number_max) || $conf->contact_number_max == 0) {
  ?>
  <div class="error">
    <table class="errorTable">
      <tr class="errorTitle">
        <td><?php echo convertLang2Html($html_error_occurred); ?></td>
      </tr>
      <tr class="errorText">
        <td>
          <p><?php echo convertLang2Html($html_contact_err3); ?></p>
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
      <?php echo convertLang2Html($html_contact_list . " " . $_SESSION["nocc_user"]); ?>
    </p>

    <table>
      <tr class="contactsListHeader">
        <th><?php echo convertLang2Html($html_contact_first) ?></th>
        <th><?php echo convertLang2Html($html_contact_last) ?></th>
        <th><?php echo convertLang2Html($html_contact_nick) ?></th>
        <th><?php echo convertLang2Html($html_contact_mail) ?></th>
        <th>&nbsp;</td>
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
        <td><input type="button" name="Submit" id="<?php echo 'btn'.$i ?>" value="<?php echo unhtmlentities($html_add) ?>" class="button" onclick="toggleemail (document.getElementById('<?php echo 'btn'.$i ?>'), '<?php echo trim($tab[3]); ?>');toggle (document.getElementById('<?php echo 'btn'.$i ?>'));"/></td>
      </tr>
      <?php
        }
      ?>
    </table>
  </div>
</body>
</html>
