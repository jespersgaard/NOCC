<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/rss.php,v 1.14 2006/11/29 19:42:46 goddess_skuld Exp $
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

  $from_rss = true;

  $_SESSION['nocc_user'] = base64_decode($_REQUEST['nocc_user']);
  $_SESSION['nocc_passwd'] = base64_decode($_REQUEST['nocc_passwd']);
  $_SESSION['nocc_lang'] = base64_decode($_REQUEST['nocc_lang']);
  $_SESSION['nocc_smtp_server'] = base64_decode($_REQUEST['nocc_smtp_server']);
  $_SESSION['nocc_smtp_port'] = base64_decode($_REQUEST['nocc_smtp_port']);
  $_SESSION['nocc_theme'] = base64_decode($_REQUEST['nocc_theme']);
  $_SESSION['nocc_domain'] = base64_decode($_REQUEST['nocc_domain']);
  $_SESSION['imap_namespace'] = base64_decode($_REQUEST['imap_namespace']);
  $_SESSION['nocc_servr'] = base64_decode($_REQUEST['nocc_servr']);
  $_SESSION['nocc_folder'] = base64_decode($_REQUEST['nocc_folder']);
  $_SESSION['smtp_auth'] = base64_decode($_REQUEST['smtp_auth']);

  if(!isset($_SESSION['nocc_user_prefs'])) {
      $_SESSION['nocc_user_prefs'] = NOCCUserPrefs::read($user_key, $ev);
      if(NoccException::isException($ev)) {
              echo "<p>User prefs error ($user_key): ".$ev->getMessage()."</p>";
              exit(1);
      }
  }

  require_once './conf.php';
//  echo $_REQUEST['nocc_passwd'].'<br/>';
//  echo $_SESSION['nocc_passwd'].'<br/>';
//  echo decpass($_SESSION['nocc_passwd'], $conf->master_key).'<br/>';
//  exit;
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

  $ts = time();
  $tz = date('O', $ts);
  $tz = substr($tz,0,-2).':'.substr($tz,-2);
  $ts = date('Y-m-d\\TH:i:s',$ts).$tz;

  header('Content-Type: application/rss+xml; charset='.$charset);
  echo "<?xml version=\"1.0\" encoding=\"$charset\" ?>\n";
?>
  <rdf:RDF
    xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
    xmlns:dc="http://purl.org/dc/elements/1.1/"
    xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
    xmlns:admin="http://webns.net/mvcb/"
    xmlns:content="http://purl.org/rss/1.0/modules/content/"
    xmlns="http://purl.org/rss/1.0/">

  <channel rdf:about="<?php echo $conf->base_url ?>">
    <title>NOCC Webmail - <?php echo $_SESSION['nocc_folder'] ?></title>
    <description>Your mailbox</description>
    <link><?php echo $conf->base_url ?></link>
    <dc:language><?php echo $_SESSION['nocc_lang'] ?></dc:language>
    <dc:creator></dc:creator>
    <dc:rights></dc:rights>
    <dc:date><?php echo $ts ?></dc:date>
    <admin:generatorAgent rdf:resource="http://nocc.sourceforge.net/" />

    <sy:updatePeriod>hourly</sy:updatePeriod>
    <sy:updateFrequency>1</sy:updateFrequency>
    <sy:updateBase><?php echo $ts ?></sy:updateBase>

    <items>
      <rdf:Seq>
<?php
while ($tmp = array_shift($tab_mail)) {
?>
        <rdf:li rdf:resource="<?php echo $conf->base_url . 'action.php?action=aff_mail&amp;mail='.$tmp['number'].'&amp;verbose=0&amp;rss=true' ?>" />
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
  <item rdf:about="<?php echo $conf->base_url . 'action.php?action=aff_mail&amp;mail='.$tmp['number'].'&amp;verbose=0&amp;rss=true&amp;nocc_folder='.$_SESSION['nocc_folder'] ?>">
    <title><?php echo htmlspecialchars($tmp['subject']) ?></title>
    <link><?php echo $conf->base_url . 'action.php?action=aff_mail&amp;mail=' . $tmp['number'] . '&amp;verbose=0&amp;rss=true' ?></link>
    <!--dc:date></dc:date-->
    <dc:language><?php echo $_SESSION['nocc_lang'] ?></dc:language>
    <dc:creator><?php echo htmlspecialchars($tmp['from']) ?></dc:creator>
    <dc:subject>Email</dc:subject>
    <description>
      <![CDATA[
        <?php echo str_replace("themes/", $conf->base_url . "themes/", $tmp['attach']) ?> <?php echo $html_size . ": " . $tmp['size'] . " " . $html_kb ?> <br /><br />
        <?php
          $attach_tab = array();
          $content = aff_mail($pop, $attach_tab, $tmp['number'], 0, $ev);
          if (NoccException::isException($ev)) {
            require ('./html/error.php');
            exit;
          }
          echo substr(strip_tags($content['body'], '<br>'), 0, 200) . '&hellip;';  
        ?>
      ]]>
    </description>
    <content:encoded>
      <![CDATA[
        <?php echo str_replace("themes/", $conf->base_url . "themes/", $tmp['attach']) ?> <?php echo $html_size . ": " . $tmp['size'] . " " . $html_kb ?> <br /><br />
        <?php
          $attach_tab = array();
          $content = aff_mail($pop, $attach_tab, $tmp['number'], 0, $ev);
          if (NoccException::isException($ev)) {
            require ('./html/error.php');
            exit;
          }
          echo $content['body'];
        ?>
      ]]>
    </content:encoded>
  </item>
<?php
  }
?>

</rdf:RDF>
