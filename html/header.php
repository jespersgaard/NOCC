<?php
  if (!isset($conf->loaded))
    die('Hacking attempt');

if (file_exists('proxy.php'))
    require_once 'proxy.php';
else
    die('proxy.php is missing');

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
        <script type="text/javascript">
            function OpenHelpWindow(theURL,winName,features)
            {
                window.open(theURL,winName,features);
            }
<?php
  // if message is opened in another window, we reload the opener window
  // (message list), in order to refresh the mail list after a successful 
  // deletion. It does not works with Safari
  if($_SESSION['message_deleted'] == "true"){
    echo ("\n          if (window.opener != null)");
    echo ("\n            window.opener.location.href = window.opener.location;\n");
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
  
?>
        </script>
        <link rel="alternate" type="application/rss+xml" title="RSS - NOCC" href="<?php echo $rss_url ?>" />
    </head>
    <body dir="<?php echo convertLang2Html($lang_dir); ?>">
        <div class="global">
          <div class="header">
            <img src="themes/<?php echo $_SESSION['nocc_theme']; ?>/img/logo.png" class="headerLogo" alt="Logo" />
            &nbsp;&nbsp;<span class="login bold"><?php echo htmlspecialchars($header_display_address); ?></span>
          </div>
<?php
}
?>
<!-- end of $Id: header.php,v 1.62 2006/11/22 14:27:17 goddess_skuld Exp $ -->
