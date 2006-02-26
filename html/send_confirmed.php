<!-- start of $Id: send_confirmed.php,v 1.5 2002/05/15 13:54:52 rossigee Exp $ -->
<?php
  if (!isset($conf->loaded))
    die('Hacking attempt');
?>
<p class="inbox">
 <?php echo $html_send_confirmed; ?>
</p>

<p class="inbox">
 <a href="<?php echo $_SERVER['PHP_SELF'] ?>"><?php echo $html_return_to_inbox; ?></a>
</p>
<!-- end of $Id: send_confirmed.php,v 1.5 2002/05/15 13:54:52 rossigee Exp $ -->
