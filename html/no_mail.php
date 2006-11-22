<!-- start of $Id: no_mail.php,v 1.8 2006/02/26 11:07:52 goddess_skuld Exp $ -->
<?php
  if (!isset($conf->loaded))
    die('Hacking attempt');
?>
<tr>
  <td colspan="5" class="inbox center">
    <?php echo convertLang2Html($html_no_mail) ?>
  </td>
</tr>
<!-- end of $Id: no_mail.php,v 1.8 2006/02/26 11:07:52 goddess_skuld Exp $ -->
