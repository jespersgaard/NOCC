<?php

$prefs_full_name = getPref('full_name');
$prefs_email_address = getPref('email_address');
if(empty($prefs_email_address))
    $prefs_email_address = $_SESSION['nocc_user'].'@'.$_SESSION['nocc_domain'];
$prefs_msg_per_page = getPref('msg_per_page');
$prefs_cc_self = getPref('cc_self');
$prefs_hide_addresses = getPref('hide_addresses');
$prefs_outlook_quoting = getPref('outlook_quoting');
$prefs_reply_leadin = getPref('leadin');
$prefs_signature = getPref('signature');

?>
<!-- start of $Id: prefs.php,v 1.21 2002/05/30 12:46:31 rossigee Exp $ -->
<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td bgcolor="<?php echo $glob_theme->inside_color ?>">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="hidden" name="action" value="setprefs" />
            <input type="hidden" name="submit_prefs" value="set" />
            <table border="0" cellpadding="2" cellspacing="1" bgcolor="<?php echo $glob_theme->inside_color ?>" width="100%">
                <tr>
                    <td align="right" class="prefs" valign="top"><?php echo $html_full_name ?> : </td>
                    <td align="left" class="prefs">
                        <input type="text" name="full_name" value="<?php echo $prefs_full_name ?>" size="40"/>
                    </td>
                </tr>
                <tr>
                    <td align="right" class="prefs" valign="top"><?php echo $html_email_address ?> : </td>
                    <td align="left" class="prefs">
                        <?php if ($allow_address_change) { ?>
                            <input type="text" name="email_address" value="<?php echo $prefs_email_address ?>" size="40"/>
                        <?php } else { ?>
                            <input type="hidden" name="email_address" value="<?php echo $prefs_email_address ?>"/><?php echo $prefs_email_address ?>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td align="right" class="prefs" valign="top"><?php echo $html_msgperpage ?></td>
                    <td align="left" class="prefs" valign="top">
                        <input type="text" name="msg_per_page" value="<?php echo $prefs_msg_per_page ?>" size="3" maxlength="3"/>
                    </td>
                </tr>
                <tr>
                    <td align="right" class="prefs" valign="top">&nbsp; </td>
                    <td align="left" class="prefs">
                        <input type="checkbox" name="cc_self" id="cc_self" value="on" <?php if($prefs_cc_self != '') echo "checked"; ?> /><label for="cc_self"><?php echo $html_ccself ?></label>
                    </td>
                </tr>
                <tr>
                    <td align="right" class="prefs" valign="top">&nbsp;</td>
                    <td align="left" class="prefs">
                        <input type="checkbox" name="hide_addresses" id="hide_addresses" value="on" <?php if($prefs_hide_addresses != '') echo "checked"; ?> /><label for="hide_addresses"><?php echo $html_hide_addresses ?></label>
                    </td>
                </tr>
                <tr>
                    <td align="right" class="prefs" valign="top">&nbsp;</td>
                    <td align="left" class="prefs">
                        <input type="checkbox" name="outlook_quoting" id="outlook_quoting" value="on" <?php if($prefs_outlook_quoting != '') echo "checked"; ?> /><label for="outlook_quoting"><?php echo $html_outlook_quoting ?></label>
                    </td>
                </tr>
                <?php if($conf->enable_reply_leadin) { ?>
                <tr>
                    <td align="right" class="prefs" valign="top"><?php echo $html_reply_leadin ?> : </td>
                    <td align="left" class="prefs">
                        <input type="text" name="reply_leadin" value="<?php echo $prefs_reply_leadin ?>" size="40"/>
                </tr>
                <?php } ?>
                <tr>
                    <td align="right" class="prefs" valign="top"><?php echo $html_signature ?> : </td>
                    <td align="left" class="prefs">
                        <textarea name="signature" rows="5" cols="40"><?php echo $prefs_signature ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" colspan="2">
                        <?php
                            if(Exception::isException($ev))
                                echo '<p class="prefs">'.$html_error_occurred.' : '.$ev->getMessage().'</p>';
                            else
                                if(isset($_REQUEST['submit_prefs']))
                                    echo '<p class="prefs">'.$html_prefs_updated.'</p>';
                        ?>
                        <table bgcolor="<?php echo $glob_theme->inside_color ?>" width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td align="right" valign="top" width="50%">
                                    <input type="submit" class="button" value="<?php echo $html_submit ?>" />&nbsp;
                                </td>
                                <td align="left" valign="top" width="50%">
                                    &nbsp;<input type="reset" class="button" value="<?php echo $html_cancel ?>" />
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            </form>
        </td>
    </tr>
</table>
<!-- end of $Id: prefs.php,v 1.21 2002/05/30 12:46:31 rossigee Exp $ -->
