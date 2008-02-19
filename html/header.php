<?php
  if (!isset($conf->loaded))
    die('Hacking attempt');

if (file_exists('./utils/proxy.php'))
    require_once './utils/proxy.php';
else
    die('./utils/proxy.php is missing');

if(isset($charset))
    header ("Content-type: text/html; Charset=$charset");
else
    header ("Content-type: text/html");

// Don't call getPref unless session has been initialised enough for
// prefs.php to find it's prefs file.
$header_display_address = get_default_from_address();

$custom_header = './themes/' . str_replace('..','',convertLang2Html($_SESSION['nocc_theme'])) . '/header.php';
if(file_exists($custom_header)) {
    include($custom_header);
}
else {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $lang; ?>">
    <head>
        <title>NOCC - Webmail</title>
        <meta http-equiv="Content-Type" content="text/html; charset=<?php echo convertLang2Html($charset); ?>" />
        <link href="themes/<?php echo str_replace('..','',convertLang2Html($_SESSION['nocc_theme'])); ?>/style.css" rel="stylesheet" type="text/css" />
        <link href="themes/<?php echo str_replace('..','',convertLang2Html($_SESSION['nocc_theme'])); ?>/print.css" rel="stylesheet" media="print" type="text/css" />
        <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
        <script src="js/nocc.js" type="text/javascript"></script>
<?php
  // if message is opened in another window, we reload the opener window
  // (message list), in order to refresh the mail list after a successful 
  // deletion. It does not works with Safari
  if($_SESSION['message_deleted'] == "true"){
    echo ("        <script type=\"text/javascript\">\n");
    echo ("          if (window.opener != null)\n");
    echo ("            window.opener.location.href = window.opener.location;\n");
    echo ("        </script>\n");
    $_SESSION['message_deleted'] = "false";
  }
  $rss_url = "rss.php";
  $rss_url .= '?nocc_lang=' . base64_encode($_SESSION['nocc_lang']);
  $rss_url .= '&amp;nocc_smtp_server=' . base64_encode($_SESSION['nocc_smtp_server']);
  $rss_url .= '&amp;nocc_smtp_port=' . base64_encode($_SESSION['nocc_smtp_port']);
  $rss_url .= '&amp;nocc_theme=' . base64_encode($_SESSION['nocc_theme']);
  $rss_url .= '&amp;nocc_domain=' . base64_encode($_SESSION['nocc_domain']);
  $rss_url .= '&amp;imap_namespace=' . base64_encode($_SESSION['imap_namespace']);
  $rss_url .= '&amp;nocc_servr=' . base64_encode($_SESSION['nocc_servr']);
  $rss_url .= '&amp;nocc_folder=' . base64_encode($_SESSION['nocc_folder']);
  $rss_url .= '&amp;smtp_auth=' . base64_encode($_SESSION['smtp_auth']);
  $rss_url .= '&amp;nocc_user=' . base64_encode($_SESSION['nocc_user']);
  $rss_url .= '&amp;nocc_passwd=' . base64_encode($_SESSION['nocc_passwd']);
  $rss_url .= '&amp;nocc_login=' . base64_encode($_SESSION['nocc_login']);
  $rss_url .= '&amp;ucb_pop_server=' . base64_encode($_SESSION['ucb_pop_server']);
  $rss_url .= '&amp;quota_enable=' . base64_encode($_SESSION['quota_enable']);
  $rss_url .= '&amp;quota_type=' . base64_encode($_SESSION['quota_type']);
?>
        <link rel="alternate" type="application/rss+xml" title="RSS - NOCC" href="<?php echo $rss_url ?>" />
    </head>
    <body dir="<?php echo convertLang2Html($lang_dir); ?>">
        <div id="header">
            <h1>NOCC</h1>
<?php
  if ($header_display_address != '') {
    echo "<h2>" . htmlspecialchars($header_display_address) . "</h2>\n";
    if ($conf->prefs_dir || $conf->enable_logout) {
      echo "<ul>\n";
      if ($conf->prefs_dir)
        echo "  <li><a href=\"action.php?action=setprefs\">" . convertLang2Html($html_preferences) . "</a></li>\n";
      if ($conf->enable_logout)
        echo "  <li><a href=\"logout.php\">" . convertLang2Html($html_logout) . "</a></li>\n";
      echo "</ul>\n";
    }
  }
?>
        </div>
        <div id="main">
<?php
}
?>
<!-- end of $Id: header.php,v 1.71 2008/02/10 20:52:14 goddess_skuld Exp $ -->
