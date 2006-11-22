<!-- start of $Id: error.php,v 1.6 2006/09/01 16:46:22 goddess_skuld Exp $ -->
<?php
  if (!isset($conf->loaded))
    die('Hacking attempt');
?>
<div class="error">
  <table class="errorTable">
    <tr class="errorTitle">
      <td><?php echo convertLang2Html($html_error_occurred) ?></td>
    </tr>
    <tr class="errorText">
      <td>
        <p><?php echo convertLang2Html($ev->getMessage()); ?></p>
        <p>
        <a href="<?php echo $conf->webmail_url; ?>logout.php"><?php echo convertLang2Html($html_back) ?></a>
        </p>
      </td>
    </tr>
  </table>
</div>
<!-- end of $Id: error.php,v 1.6 2006/09/01 16:46:22 goddess_skuld Exp $ -->
