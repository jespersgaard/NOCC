<?php

require_once 'proxy.php';
if(isset($charset))
    header ("Content-type: text/html; Charset=$charset");
else
    header ("Content-type: text/html");

// Don't call getPref unless session has been initialised enough for
// prefs.php to find it's prefs file.
$header_display_address = get_default_from_address();

$custom_header = './themes/' . $_SESSION['nocc_theme'] . '/header.php';
if(file_exists($custom_header)) {
    include($custom_header);
}
else {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $lang ?>" lang="<?php echo $lang ?>">
    <head><title>NOCC - Webmail</title>
        <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $charset; ?>" />
        <link href="themes/<?php echo $_SESSION['nocc_theme']?>/style.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript">
            function OpenHelpWindow(theURL,winName,features)
            {
                window.open(theURL,winName,features);
            }
        </script>
    </head>
    <body dir="<?php echo $lang_dir ?>" alink="<?php echo $glob_theme->alink_color?>" bgcolor="<?php echo $glob_theme->bgcolor ?>" link="<?php echo $glob_theme->link_color ?>" text="<?php echo $glob_theme->text_color ?>" vlink="<?php echo $glob_theme->vlink_color ?>">
        <table border="0" width="100%">
            <tr>
                <td align="left" valign="middle" colspan="2">
                    <img src="themes/<?php echo $_SESSION['nocc_theme'] ?>/img/logo.gif" width="153" height="47" alt="Logo" />
                    &nbsp;&nbsp;<font class="login"><b><?php echo $header_display_address ?></b></font>
                </td>
            </tr>
            <tr>
                <td align="center" valign="top">
<?php
}
?>
