<!-- start of $Id: no_mail.php,v 1.3 2002/03/24 17:08:02 wolruf Exp $ -->
<tr bgcolor="<?php echo $glob_theme->inbox_color ?>">
    <?php if ($conf->have_ucb_pop_server || $pop->is_imap()) { ?>
        <td align="center" colspan="7" class="inbox">
    <?php } else { ?>
        <td align="center" colspan="6" class="inbox">
    <?php } ?>
        <?php echo $html_no_mail ?>
    </td>
</tr>
<!-- end of $Id: no_mail.php,v 1.3 2002/03/24 17:08:02 wolruf Exp $ -->