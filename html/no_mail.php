<!-- start of $Id: no_mail.php,v 1.9 2006/11/22 14:27:18 goddess_skuld Exp $ -->
<?php
  if (!isset($conf->loaded))
    die('Hacking attempt');
?>
<tr>
  <td colspan="<?php echo count($conf->column_order) + 1; ?>" class="inbox center">
    <?php echo convertLang2Html($html_no_mail) ?>
  </td>
</tr>
<!-- end of $Id: no_mail.php,v 1.9 2006/11/22 14:27:18 goddess_skuld Exp $ -->
