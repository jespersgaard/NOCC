<!-- start of $Id: html_inbox.php,v 1.32 2002/04/15 02:11:55 mrylander Exp $ -->
<tr bgcolor="<?php echo $glob_theme->inbox_color ?>">
    <td align="center">
        <input type="checkbox" name="msg-<?php echo $tmp['number'] ?>" value="Y" />
    </td>
    <?php if (($is_imap) || ($conf->have_ucb_pop_server)) { ?>
    <td align="center">
        <?php echo $tmp['new'] ?>
    </td>
    <?php } ?>
    <td align="center">
        <?php echo $tmp['attach'] ?>
    </td>
    <td class="inbox" align="left">
        <a href="<?php echo $PHP_SELF ?>?action=aff_mail&amp;mail=<?php echo $tmp['number'] ?>&amp;sort=<?php echo $sort ?>&amp;sortdir=<?php echo $sortdir?>&amp;verbose=0&amp;lang=<?php echo $lang ?>&amp;folder=<?php echo $folder ?>" title="<?php echo htmlspecialchars($tmp['from']); ?>"><?php echo htmlspecialchars(display_address ($tmp['from'])); ?></a>
    </td>
    <td class="inbox" align="left">
        <a href="<?php echo $PHP_SELF ?>?action=aff_mail&amp;mail=<?php echo $tmp['number'] ?>&amp;sort=<?php echo $sort ?>&amp;sortdir=<?php echo $sortdir?>&amp;verbose=0&amp;lang=<?php echo $lang ?>&amp;folder=<?php echo $folder ?>" title="<?php echo $tmp['subject']? htmlspecialchars($tmp['subject']) : $html_nosubject; ?>"><?php echo $tmp['subject']? substr(htmlspecialchars($tmp['subject']), 0, 55) : $html_nosubject; ?></a>
    </td>
    <td class="inbox" align="left">
        <?php echo $tmp['date'] ?>
    </td>
    <td align="right" class="inbox">
        <?php echo $tmp['size'] ?> <?php echo $html_kb ?>
    </td>
</tr>
<!-- end of $Id: html_inbox.php,v 1.32 2002/04/15 02:11:55 mrylander Exp $ -->
