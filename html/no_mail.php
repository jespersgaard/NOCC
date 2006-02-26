<!-- start of $Id: no_mail.php,v 1.7 2006/02/26 09:32:53 goddess_skuld Exp $ -->
<?php
  if (!isset($conf->loaded))
    die('Hacking attempt');
?>
<tr>
  <td colspan="5" class="inbox center">
    <?php echo htmlentities($html_no_mail, ENT_COMPAT, 'UTF-8') ?>
  </td>
</tr>
<!-- end of $Id: no_mail.php,v 1.7 2006/02/26 09:32:53 goddess_skuld Exp $ -->
