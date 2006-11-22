<!-- start of $Id: send_error.php,v 1.7 2006/02/26 11:07:52 goddess_skuld Exp $ -->
<?php
  if (!isset($conf->loaded))
    die('Hacking attempt');
?>
<p class="inbox"><?php echo convertLang2Html($html_error_occurred) . ' : ' . convertLang2Html($ev->getMessage()); ?></p>
<!-- end of $Id: send_error.php,v 1.7 2006/02/26 11:07:52 goddess_skuld Exp $ -->
