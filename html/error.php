<!-- start of $Id: error.php,v 1.5 2006/08/28 18:22:15 goddess_skuld Exp $ -->
<?php
  if (!isset($conf->loaded))
    die('Hacking attempt');
?>
<div class="error">
  <table class="errorTable">
    <tr class="errorTitle">
      <td><?php echo htmlentities($html_error_occurred, ENT_COMPAT, 'UTF-8') ?></td>
    </tr>
    <tr class="errorText">
      <td>
        <p><?php echo htmlentities($ev->getMessage(), ENT_COMPAT, 'UTF-8'); ?></p>
        <p>
        <a href="<?php echo $conf->webmail_url; ?>logout.php"><?php echo htmlentities($html_back, ENT_COMPAT, 'UTF-8') ?></a>
        </p>
      </td>
    </tr>
  </table>
</div>
<!-- end of $Id: error.php,v 1.5 2006/08/28 18:22:15 goddess_skuld Exp $ -->
