<!-- start of $Id: error.php,v 1.3 2005/08/01 11:05:49 goddess_skuld Exp $ -->
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
        <?php if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != null ) { ?>
          <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>"><?php echo htmlentities($html_back, ENT_COMPAT, 'UTF-8') ?></a>
        <?php } else { ?>
          <a href="<?php echo $conf->webmail_url; ?>"><?php echo htmlentities($html_back, ENT_COMPAT, 'UTF-8') ?></a>
        <?php } ?>
        </p>
      </td>
    </tr>
  </table>
</div>
<!-- end of $Id: error.php,v 1.3 2005/08/01 11:05:49 goddess_skuld Exp $ -->
