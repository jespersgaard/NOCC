<!-- start of $Id: send_confirmed.php,v 1.6 2006/02/26 09:32:53 goddess_skuld Exp $ -->
<?php
  if (!isset($conf->loaded))
    die('Hacking attempt');
?>
<p class="inbox">
 <?php echo htmlentities($html_send_confirmed, ENT_COMPAT, 'UTF-8'); ?>
</p>

<p class="inbox">
 <a href="<?php echo $_SERVER['PHP_SELF'] ?>"><?php echo htmlentities($html_return_to_inbox, ENT_COMPAT, 'UTF-8'); ?></a>
</p>
<!-- end of $Id: send_confirmed.php,v 1.6 2006/02/26 09:32:53 goddess_skuld Exp $ -->
