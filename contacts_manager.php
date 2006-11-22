<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/contacts_manager.php,v 1.22 2006/10/17 09:32:46 goddess_skuld Exp $
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

// Load the contact list
$path = $conf->prefs_dir . "/" . $_SESSION['nocc_user'].'@'.$_SESSION['nocc_domain'].".contacts";
$contacts = load_list ($path);

$query_str = session_name("NOCCSESSID") . "=" . session_id();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $lang; ?>">
<head>
  <link href="themes/<?php echo $_SESSION['nocc_theme']; ?>/style.css" rel="stylesheet" type="text/css" />
  <title>NOCC - Webmail - <?php echo $html_contact_list . " " . $_SESSION["nocc_user"]; ?></title>
  <meta content="text/html; charset=<?php echo $charset ?>" http-equiv="Content-Type" />
  <script type="text/javascript">
  <!--
    function prompt_delete (email, id)
    {
      if (confirm("<?php echo unhtmlentities($html_delete) ?> `" + email + "' <?php echo unhtmlentities($html_contact_del) ?> ?")) {
        var url = '<?php echo $_SERVER['PHP_SELF'] . "?" . $query_str ?>&action=delete&id=' + id;
        document.location.href = url;
      }
    }
  //-->
  </script>
</head>

<body dir="<?php echo $lang_dir; ?>">
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
    
    $action = isset($_GET['action']) ? $_GET['action'] : '';
    switch($action){
      case "add_prompt":
        if (isset($_GET['id']))
        {
          $tab = array_pad(explode ("\t",$contacts[$_GET['id']]), -4, "");
        }
  ?>
  <div class="contactAdd">
    <form id="form2" method="post" action="<?php echo $_SERVER['PHP_SELF'] . "?" . $query_str ?>&amp;action=add">
      <table>
        <tr>
          <td colspan="2" class="contactsTitle">
            <?php echo convertLang2Html($html_contact_list . " " . $_SESSION["nocc_user"]); ?>
          </td>
        </tr>
        <tr>
        <?php
          if (!isset($_GET['modif']))
          {
            $_GET['modif'] = false;
          }
        ?>
          <td colspan="2" class="contactsSubTitle">
            <?php echo ($_GET['modif']) ? $html_contact_mod : $html_contact_add ?>
          </td>
        </tr>
        <?php if (count ($contacts) < $conf->contact_number_max || $_GET['modif']) { ?>
        <tr>
          <td class="contactsAddLabel"><label for="first"><?php echo convertLang2Html($html_contact_first) ?>:</label></td>
          <td class="contactsAddData"><input class="button" name="first" type="text" id="first" value="<?php if (isset($tab[0])) { echo $tab[0]; } ?>"/></td>
        </tr>
        <tr>
          <td class="contactsAddLabel"><label for="last"><?php echo convertLang2Html($html_contact_last) ?>:</label></td>
          <td class="contactsAddData"><input class="button" name="last" type="text" id="last" value="<?php if (isset($tab[1])) { echo $tab[1]; } ?>"/></td>
        </tr>
        <tr>
          <td class="contactsAddLabel"><label for="nick"><?php echo convertLang2Html($html_contact_nick) ?>:</label></td>
          <td class="contactsAddData"><input class="button" name="nick" type="text" id="nick" value="<?php if (isset($tab[2])) { echo $tab[2]; } ?>"/></td>
        </tr>
        <tr>
          <td class="contactsAddLabel"><label for="email"><?php echo convertLang2Html($html_contact_mail) ?>:</label></td>
          <td class="contactsAddData"><input class="button" name="email" type="text" id="email" value="<?php if (isset($tab[3])) { echo $tab[3]; } ?>"/></td>
        </tr>
        <tr>
          <td colspan="2" class="center">
            <input type="button" name="Submit2" value="<?php echo convertLang2Html($html_cancel) ?>" class="button" onclick="self.history.go (-1);"/>
            <input type="hidden" name="modif" value="<?php echo $_GET['modif'] ?>"/>
            <input type="hidden" name="id" value="<?php if (!isset($_GET['id'])) {echo '0';} else {echo $_GET['id'];} ?>"/>
            <input type="submit" name="Submit4" value="<?php echo ($_GET['modif']) ? convertLang2Html($html_modify) : convertLang2Html($html_add) ?>" class="button"/></td>
        </tr>
        <?php } else  { ?>
        <tr>
          <td>
            <div class="error">
              <table class="errorTable">
                <tr class="errorTitle">
                  <td><?php echo convertLang2Html($html_error_occurred) ?></td>
                </tr>
                <tr class="errorText">
                  <td>
                    <p><?php echo convertLang2Html($html_contact_err1) ."\"" . convertLang2Html($conf->contact_number_max) . "\"" ?></p>
                    <p><?php echo convertLang2Html($html_contact_err2) ?>.</p>
                    <p><a href="<?php echo $_SERVER['PHP_SELF']; ?>"><?php echo $html_back; ?></a></p>
                  </td>
                </tr>
              </table>
            </div>
          </td>
        </tr>
        <?php } ?>
      </table>
    </form>
  </div>
  <?php
	;
        break;

      case "add":
        if (!empty($_POST['email']))
        {
          // The following foreach block performs some sanity checking and
          // cleanup.
          foreach( array('first','last','nick','email') as $contact_element )
          {
            //We should strip slashes here
            if( get_magic_quotes_gpc() )
              $_POST[$contact_element] = stripslashes( $_POST[$contact_element] );
            // Strip tabs that COULD be inserted into fields(causing corrupted
            // DB)
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
          echo "<script type=\"text/javascript\">alert (\"Error : Email Field is empty.\");</script>";
          echo "<script type=\"text/javascript\">self.history.go (-1)</script>";
        }
  ?>
  <script type="text/javascript">self.location.href="<?php echo $_SERVER['PHP_SELF'] . "?" . $query_str ?>";</script>
  <?php
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
  <div class="contactsList">
    <table>
      <tr class="contactsListHeader">
        <th><?php echo convertLang2Html($html_contact_first) ?></th>
        <th><?php echo convertLang2Html($html_contact_last) ?></th>
        <th><?php echo convertLang2Html($html_contact_nick) ?></th>
        <th><?php echo convertLang2Html($html_contact_mail) ?></th>
        <th colspan="2">&nbsp;</th>
      </tr>
      <?php
        for ($i = 0; $i < count ($contacts); ++$i)
        {
          $tab = array_pad(explode ("\t",$contacts[$i]), -4, "");
      ?>
      <tr class="<?php echo ($i % 2) ? "contactsListEven" : "contactsListOdd" ?>">
        <td><?php echo ($tab[0]) ? $tab[0] : "&nbsp;"; ?></td>
        <td><?php echo ($tab[1]) ? $tab[1] : "&nbsp;"; ?></td>
        <td><?php echo ($tab[2]) ? $tab[2] : "&nbsp;"; ?></td>
        <td><?php echo $tab[3]; ?></td>
        <td>
          <input type="button" name="Submit5" value="<?php echo $html_modify ?>" class="button" onclick="self.location.href='<?php echo $_SERVER['PHP_SELF'] . "?" . $query_str ?>&amp;action=add_prompt&amp;id=<?php echo $i ?>&amp;modif=1'"/>
        </td>
        <td>
          <input type="button" name="Submit" value="<?php echo $html_delete ?>" class="button" onclick="prompt_delete ('<?php echo $tab[3] ?>', <?php echo $i ?>)"/>
        </td>
      </tr>
      <?php
        }
      ?>
    </table>
  </div>
  <div class="contactsAddLink">
    <br/>
    <a href="<?php echo $_SERVER['PHP_SELF'];; ?>?action=add_prompt&amp;<?php echo $query_str ?>"><?php echo convertLang2Html($html_contact_add) ?></a>
  </div>
  <?php
    } // switch
  ?>
</body>
</html>
