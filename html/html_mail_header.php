<!-- start of $Id: html_mail_header.php,v 1.39 2005/10/17 16:19:25 goddess_skuld Exp $ -->
<?php

global $conf;

  if (!isset($conf->loaded))
    die('Hacking attempt');

// If not displaying verbose headers, display normal headers
if (!($conf->use_verbose && $verbose == '0')) {
  if($content['att'] != '') {
    echo $content['att'];
  }
  echo '<tr><td colspan="2" class="mail"><pre>'.htmlspecialchars($content['header']).'</pre></td></tr>';
}

echo '<tr><td colspan="2" class="mail">'.$content['body'].'</td></tr>';

?>

<!-- end of $Id: html_mail_header.php,v 1.39 2005/10/17 16:19:25 goddess_skuld Exp $ -->
