<!-- start of $Id: error.php,v 1.1 2002/03/27 09:52:33 rossigee Exp $ -->
<div class="error">
  <table class="errorTable">
    <tr class="errorTitle">
      <td><?php echo $html_error_occurred ?></td>
    </tr>
    <tr class="errorText">
      <td>
        <p><?php echo $ev->getMessage(); ?></p>
      </td>
    </tr>
  </table>
</div>
<!-- end of $Id: error.php,v 1.1 2002/03/27 09:52:33 rossigee Exp $ -->
