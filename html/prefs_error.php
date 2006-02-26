<!-- start of $Id: prefs_error.php,v 1.3 2005/08/01 11:05:49 goddess_skuld Exp $ -->
<?php
  if (!isset($conf->loaded))
    die('Hacking attempt');
?>
<div class="error">
  <table class="errorTable">
    <tr class="errorTitle">
      <td><?php echo $html_error_occurred ?></td>
    </tr>
    <tr class="errorText">
      <td>
        <p><?php echo $ev->getMessage(); ?></p>
        <p>
        <?php if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != null ) { ?>
          <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>"><?php echo $html_back ?></a>
        <?php } else { ?>
          <a href="<?php echo $conf->webmail_url; ?>"><?php echo $html_back ?></a>
        <?php } ?>
        </p>
      </td>
    </tr>
  </table>
</div>
<!-- end of $Id: prefs_error.php,v 1.3 2005/08/01 11:05:49 goddess_skuld Exp $ -->
