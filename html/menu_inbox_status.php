<?php if($list_of_folders != "") { ?>
<tr>
 <td colspan="7">
<table border="0" align="center" cellpadding="5" cellspacing="0" width="100%">
    <tr bgcolor="<?php echo $glob_theme->inbox_text_color ?>">
        <td align="right" class="inbox">
            <?php echo $html_new_msg_in ?>
        </td>
        <td align="left" class="inbox">
            <?php echo $list_of_folders ?>
        </td>
    </tr>
</table>
 </td>
</tr>
<?php } ?>
