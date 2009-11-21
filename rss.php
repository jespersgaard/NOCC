<?php
/**
 * File for RSS stream
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 * Copyright 2004 Arnaud Boudou <goddess_skuld@users.sourceforge.net>
 *
 * This file is part of NOCC. NOCC is free software under the terms of the
 * GNU General Public License. You should have received a copy of the license
 * along with NOCC.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package    NOCC
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @version    SVN: $Id$
 */

  require_once('./utils/crypt.php');
  require_once('./classes/user_prefs.php');

  session_name("NOCCSESSID");
  session_start();

  $from_rss = true;

  $_SESSION['nocc_user'] = base64_decode($_REQUEST['nocc_user']);
  $_SESSION['nocc_passwd'] = base64_decode($_REQUEST['nocc_passwd']);
  $_SESSION['nocc_login'] = base64_decode($_REQUEST['nocc_login']);
  $_SESSION['nocc_lang'] = base64_decode($_REQUEST['nocc_lang']);
  $_SESSION['nocc_smtp_server'] = base64_decode($_REQUEST['nocc_smtp_server']);
  $_SESSION['nocc_smtp_port'] = base64_decode($_REQUEST['nocc_smtp_port']);
  $_SESSION['nocc_theme'] = base64_decode($_REQUEST['nocc_theme']);
  $_SESSION['nocc_domain'] = base64_decode($_REQUEST['nocc_domain']);
  $_SESSION['imap_namespace'] = base64_decode($_REQUEST['imap_namespace']);
  $_SESSION['nocc_servr'] = base64_decode($_REQUEST['nocc_servr']);
  $_SESSION['nocc_folder'] = base64_decode($_REQUEST['nocc_folder']);
  $_SESSION['smtp_auth'] = base64_decode($_REQUEST['smtp_auth']);
  $_SESSION['ucb_pop_server'] = base64_decode($_REQUEST['ucb_pop_server']);
  $_SESSION['quota_enable'] = base64_decode($_REQUEST['quota_enable']);
  $_SESSION['quota_type'] = base64_decode($_REQUEST['quota_type']);

  if(!isset($_SESSION['nocc_user_prefs'])) {
      $user_key = $_SESSION['nocc_user'].'@'.$_SESSION['nocc_domain'];
      $_SESSION['nocc_user_prefs'] = NOCCUserPrefs::read($user_key, $ev);
      if(NoccException::isException($ev)) {
              echo "<p>User prefs error ($user_key): ".$ev->getMessage()."</p>";
              exit(1);
      }
  }

  require_once './common.php';
  require_once './classes/class_local.php';
  
  $pop = new nocc_imap($ev);
  if (NoccException::isException($ev)) {
    require ('./html/error.php');
    exit;
  }

  $tab_mail = array();
  if ($pop->num_msg() > 0) {
    $tab_mail = inbox($pop, 0, $ev);
  }
  $tab_mail_bak = $tab_mail;

  if (NoccException::isException($ev)) {
    require ('./html/error.php');
    exit;
  }

  $ts = time();
  $tz = date('O', $ts);
  $tz = substr($tz,0,-2).':'.substr($tz,-2);
  $ts = date('Y-m-d\\TH:i:s',$ts).$tz;

  header('Content-Type: application/rss+xml; charset=UTF-8');
  echo "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\n";
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
  $mail_summery = '';
  if ($tmp['attach'] == true) { //if has attachments...
    $mail_summery .= '<img src="' . $conf->base_url . 'themes/' . $_SESSION['nocc_theme'] . '/img/attach.png" alt="" />';
  }
  $mail_summery .= $html_size . ': ' . $tmp['size'] . ' ' . $html_kb . '<br /><br />';

  $attach_tab = array();
  $content = @aff_mail($pop, $attach_tab, $tmp['number'], 0, $ev);
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
        <?php
          if (NoccException::isException($ev)) {
            require ('./html/error.php');
            exit;
          }
          echo $mail_summery;
          echo substr(strip_tags($content['body'], '<br />'), 0, 200) . '&hellip;';
        ?>
      ]]>
    </description>
    <content:encoded>
      <![CDATA[
        <?php
          if (NoccException::isException($ev)) {
            require ('./html/error.php');
            exit;
          }
          echo $mail_summery;
          echo $content['body'];
        ?>
      ]]>
    </content:encoded>
  </item>
<?php
  }
?>

</rdf:RDF>
