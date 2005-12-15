<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/rss.php,v 1.5 2005/11/04 15:57:45 goddess_skuld Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 * Copyright 2004 Arnaud Boudou <skuld@goddess-gate.com>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * File for RSS stream
 */

  require_once('crypt.php');
  require_once('user_prefs.php');

  session_name("NOCCSESSID");
  session_start();

  if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    exit;
  }

  genkey(30, 'NoccKey');
  $from_rss = true;

  $_SESSION['nocc_user'] = $_SERVER['PHP_AUTH_USER'];
  $_SESSION['nocc_passwd'] = $_SERVER['PHP_AUTH_PW'];
  
  $_SESSION['nocc_lang'] = $_REQUEST['nocc_lang'];
  $_SESSION['nocc_smtp_server'] = $_REQUEST['nocc_smtp_server'];
  $_SESSION['nocc_smtp_port'] = $_REQUEST['nocc_smtp_port'];
  $_SESSION['nocc_theme'] = $_REQUEST['nocc_theme'];
  $_SESSION['nocc_domain'] = $_REQUEST['nocc_domain'];
  $_SESSION['imap_namespace'] = $_REQUEST['imap_namespace'];
  $_SESSION['nocc_servr'] = $_REQUEST['nocc_servr'];
  $_SESSION['nocc_folder'] = $_REQUEST['nocc_folder'];
  $_SESSION['smtp_auth'] = $_REQUEST['smtp_auth'];

  if(!isset($_SESSION['nocc_user_prefs'])) {
      $_SESSION['nocc_user_prefs'] = NOCCUserPrefs::read($user_key, $ev);
      if(NoccException::isException($ev)) {
              echo "<p>User prefs error ($user_key): ".$ev->getMessage()."</p>";
              exit(1);
      }
      echo ('bouh');
  }

  require_once './conf.php';
  require_once './common.php';
  require_once './class_local.php';
  
  
  $pop = new nocc_imap($ev);
  if (NoccException::isException($ev)) {
    require ('./html/error.php');
    exit;
  }

  $tab_mail = array();
  if ($pop->num_msg() > 0) {
    $tab_mail = inbox($pop, 0, $ev);
    $tab_mail_bak = $tab_mail;
  }

  if (NoccException::isException($ev)) {
    require ('./html/error.php');
    exit;
  }

  header('Content-Type: text/xml; charset='.$charset);
  echo "<?xml version=\"1.0\" encoding=\"$charset\" ?>\n";
?>
  <rdf:RDF
    xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
    xmlns:admin="http://webns.net/mvcb/"
    xmlns:content="http://purl.org/rss/1.0/modules/content/"
    xmlns="http://purl.org/rss/1.0/"
>

<channel rdf:about="<?php echo $conf->webmail_url ?>">
<title>NOCC Webmail - <?php echo $_SESSION['nocc_folder'] ?></title>
<description>Your mailbox</description>
<link><?php echo $conf->webmail_url ?></link>

<admin:generatorAgent rdf:resource="http://nocc.sourceforge.net/" />

<items>
<rdf:Seq>
<?php
while ($tmp = array_shift($tab_mail)) {
?>
<rdf:li rdf:resource="<?php echo $conf->webmail_url . 'action.php?action=aff_mail&amp;mail='.$tmp['number'].'&amp;verbose=0&amp;rss=true' ?>" />
<?php
}
$tab_mail = $tab_mail_bak;
?>
</rdf:Seq>
</items>
</channel>

<?php
while ($tmp = array_shift($tab_mail)) {
?>
<item rdf:about="<?php echo $conf->webmail_url . 'action.php?action=aff_mail&amp;mail='.$tmp['number'].'&amp;verbose=0&amp;rss=true&amp;nocc_folder='.$_SESSION['nocc_folder'] ?>">
<title><?php echo htmlspecialchars(htmlentities($tmp['subject'])) ?></title>
<link><?php echo $conf->webmail_url . 'action.php?action=aff_mail&amp;mail=' . $tmp['number'] . '&amp;verbose=0&amp;rss=true' ?></link>
<description>
<?php echo htmlspecialchars(str_replace("themes/", $conf->webmail_url . "themes/", $tmp['attach'])) ?> <?php echo $html_size . ": " . $tmp['size'] . " " . $html_kb ?> <br /><br />
<?php
  $attach_tab = array();
  $content = aff_mail($pop, $attach_tab, $tmp['number'], 0, $ev);
  if (NoccException::isException($ev)) {
    require ('./html/error.php');
    exit;
  }
  echo htmlspecialchars(substr($content['body'], 0, 200) . '...');  
?>
  </description>
</item>
<?php
  }
?>

</rdf:RDF>
