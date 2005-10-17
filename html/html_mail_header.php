<!-- start of $Id: html_mail_header.php,v 1.38 2005/08/03 07:10:41 goddess_skuld Exp $ -->
<?php

global $conf;


// If not displaying verbose headers, display normal headers
if (!($conf->use_verbose && $verbose == '0')) {
  if($content['att'] != '') {
    echo $content['att'];
  }
  echo '<tr><td colspan="2" class="mail"><pre>'.htmlspecialchars($content['header']).'</pre></td></tr>';
}

echo '<tr><td colspan="2" class="mail">'.$content['body'].'</td></tr>';

?>

<!-- end of $Id: html_mail_header.php,v 1.38 2005/08/03 07:10:41 goddess_skuld Exp $ -->
