<!-- start of $Id: html_inbox.php,v 1.45 2004/08/04 19:23:55 wolruf Exp $ -->
<tr bgcolor="<?php echo $glob_theme->inbox_color ?>">
    <td align="center">
        <input type="checkbox" name="msg-<?php echo $tmp['number'] ?>" value="Y" />
    </td>
    <?php if ($conf->have_ucb_pop_server || $pop->is_imap()) { ?>
    <td align="center">
        <?php echo $tmp['new'] ?>
    </td>
    <?php } ?>
    <td align="center">
        <?php echo $tmp['attach'] ?>
    </td>
    <td class="inbox" align="left">
        <a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=write&amp;mail_to=<?php echo htmlspecialchars($tmp['from']) ?>" title="<?php echo htmlspecialchars($tmp['from']); ?>"><?php echo htmlspecialchars(display_address ($tmp['from'])); ?></a>
    </td>
    <td class="inbox" align="left">
        <a href="<?php echo $_SERVER['PHP_SELF'] ?>?action=aff_mail&amp;mail=<?php echo $tmp['number'] ?>&amp;verbose=0&amp;" title="<?php echo $tmp['subject']? htmlspecialchars($tmp['subject']) : $html_nosubject; ?>" <?php if(isset($user_prefs->seperate_msg_win) && $user_prefs->seperate_msg_win) echo "target=\"message\""; ?> ><?php echo $tmp['subject']? substr(htmlspecialchars($tmp['subject']), 0, 55) : $html_nosubject; ?></a>
    </td>
    <td class="inbox" align="left">
        <?php echo $tmp['date'] ?>
        <?php echo $tmp['time'] ?>
    </td>
    <td align="right" class="inbox">
        <?php echo $tmp['size'] ?> <?php echo $html_kb ?>
    </td>
</tr>
<!-- end of $Id: html_inbox.php,v 1.45 2004/08/04 19:23:55 wolruf Exp $ -->
