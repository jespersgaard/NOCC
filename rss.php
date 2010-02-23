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

  require_once './utils/crypt.php';
  require_once './classes/user_prefs.php';

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

  if (!isset($_SESSION['nocc_user_prefs'])) {
      $user_key = $_SESSION['nocc_user'].'@'.$_SESSION['nocc_domain'];
      $_SESSION['nocc_user_prefs'] = NOCCUserPrefs::read($user_key, $ev);
      if (NoccException::isException($ev)) {
              echo "<p>User prefs error ($user_key): ".$ev->getMessage()."</p>";
              exit(1);
      }
  }

  require_once './common.php';
  require_once './classes/class_local.php';
  require_once './classes/nocc_rssfeed.php';

  $pop = new nocc_imap($ev);
  if (NoccException::isException($ev)) {
    require './html/error.php';
    exit;
  }

  $tab_mail = array();
  if ($pop->num_msg() > 0) {
    $tab_mail = inbox($pop, 0, $ev);
  }
  $tab_mail_bak = $tab_mail;

  if (NoccException::isException($ev)) {
    require './html/error.php';
    exit;
  }
  
  $rssfeed = new NOCC_RssFeed();
  $rssfeed->setTitle('NOCC Webmail - ' . $_SESSION['nocc_folder']);
  $rssfeed->setDescription('Your mailbox');
  $rssfeed->setLink($conf->base_url);
  while ($tmp = array_shift($tab_mail)) { //for all mails...
    $attach_tab = array();
    $content = @aff_mail($pop, $attach_tab, $tmp['number'], 0, $ev);

    $mail_summery = '';
    if ($tmp['attach'] == true) { //if has attachments...
      $mail_summery .= '<img src="' . $conf->base_url . 'themes/' . $_SESSION['nocc_theme'] . '/img/attach.png" alt="" />';
    }
    $mail_summery .= $html_size . ': ' . $tmp['size'] . ' ' . $html_kb . '<br /><br />';

    $rssDescription = $mail_summery . substr(strip_tags($content['body'], '<br />'), 0, 200) . '&hellip;';

    $rssContent = $mail_summery . $content['body'];

    $rssfeeditem = new NOCC_RssFeed_Item();
    $rssfeeditem->setTitle(htmlspecialchars($tmp['subject']));
    $rssfeeditem->setDescription($rssDescription);
    $rssfeeditem->setTimestamp($content['timestamp']);
    $rssfeeditem->setContent($rssContent);
    $rssfeeditem->setLink($conf->base_url . 'action.php?action=aff_mail&amp;mail=' . $tmp['number'] . '&amp;verbose=0&amp;rss=true');
    $rssfeeditem->setCreator(htmlspecialchars($tmp['from']));
    $rssfeed->addItem($rssfeeditem);
  }
  $rssfeed->sendToBrowser();
?>