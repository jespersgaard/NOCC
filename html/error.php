<!-- start of $Id$ -->
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
        <a href="logout.php"><?php echo convertLang2Html($html_back) ?></a>
        </p>
      </td>
    </tr>
  </table>
</div>
<!-- end of $Id$ -->
