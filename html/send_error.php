<!-- start of $Id: send_error.php,v 1.6 2006/02/26 09:32:53 goddess_skuld Exp $ -->
<?php
  if (!isset($conf->loaded))
    die('Hacking attempt');
?>
<p class="inbox"><?php echo htmlentities($html_error_occurred, ENT_COMPAT, 'UTF-8') . ' : ' . htmlentities($ev->getMessage(), ENT_COMPAT, 'UTF-8'); ?></p>
<!-- end of $Id: send_error.php,v 1.6 2006/02/26 09:32:53 goddess_skuld Exp $ -->
