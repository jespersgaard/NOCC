<!-- start of $Id: send.php,v 1.69 2004/10/04 18:23:30 goddess_skuld Exp $ -->
<?php

// Default e-mail address on send form
$mail_from = get_default_from_address();

?>
<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td bgcolor="<?php echo $glob_theme->inside_color ?>">
	<!-- If 'file_uploads=Off', we must set formtype to "normal" otherwise it won't work -->
            <form name="sendform" enctype="<?php echo (ini_get("file_uploads")) ? "multipart/form-data" : "normal" ?>" method="post" onsubmit="return(validate(this));" action="send.php">
            <input type="hidden" name="sendaction" value="send" />
<?php if(isset($forward_msgnum)) { ?>
            <input type="hidden" name="forward_msgnum" value="<?php echo $forward_msgnum ?>" />
<?php } ?>
            <table bgcolor="<?php echo $glob_theme->inside_color ?>" width="100%" cellspacing="0" cellpadding="0" border="0">
                <tr><td colspan="2">&nbsp;</td></tr>
                <tr>
                    <td align="right" valign="middle" width="50%"><input type="submit" class="button" onclick="btnClicked=this" name="sendaction" value="<?php echo $html_send ?>" />&nbsp;</td>
                    <td align="left" valign="middle" width="50%">&nbsp;<input type="reset" class="button" value="<?php echo $html_cancel ?>" /></td>
                </tr>
                <tr><td colspan="2">&nbsp;</td></tr>
            </table>
            <table width="100%" cellspacing="2" cellpadding="1" border="0" bgcolor="<?php echo $glob_theme->inside_color ?>">
                <tr>
                    <td align="right" class="inbox"><?php echo $html_from ?> : </td>
                    <td align="left" class="inbox">
                        <?php if( isset($conf->allow_address_change) && $conf->allow_address_change ) { ?>
                            <input type="text" name="mail_from" size="60" value="<?php echo htmlspecialchars($mail_from) ?>" />
                        <?php } else { echo htmlspecialchars($mail_from); }?>
                    </td>
                </tr>
                <tr>
                    <?php if (isset($conf->contact_number_max) && $conf->contact_number_max != 0 ) { ?>
                        <td align="right" class="inbox"><a href="javascript:void(0);" onClick="window.open('contacts.php?field=mail_to&<?php echo session_name().'='.session_id() ?>','','scrollbars=yes,resizable=yes,width=500,height=250')"><?php echo $html_to ?></a> : </td>
                    <?php } else { ?>
                        <td align="right" class="inbox"><?php echo $html_to ?> : </td>
                    <?php } ?>
                    <td align="left"><input type="text" name="mail_to" size="60" value="<?php echo (isset($mail_to) ? stripslashes(htmlspecialchars($mail_to)) : ''); ?>" /></td>
                </tr>
                <tr>
                    <?php if (isset($conf->contact_number_max) && $conf->contact_number_max != 0 ) { ?>
                        <td align="right" class="inbox"><a href="javascript:void(0);" onClick="window.open('contacts.php?field=mail_cc&<?php echo session_name().'='.session_id() ?>','','scrollbars=yes,resizable=yes,width=500,height=250')"><?php echo $html_cc ?></a> : </td>
                    <?php } else { ?>
                        <td align="right" class="inbox"><?php echo $html_cc ?> : </td>
                    <?php } ?>
                    <td align="left"><input type="text" name="mail_cc" size="60" value="<?php echo (isset($mail_cc) ? htmlspecialchars($mail_cc) : '') ?>" /></td>
                </tr>
                <tr>
                    <?php if (isset($conf->contact_number_max) && $conf->contact_number_max != 0 ) { ?>
                        <td align="right" class="inbox"><a href="javascript:void(0);" onClick="window.open('contacts.php?field=mail_bcc&<?php echo session_name().'='.session_id() ?>','','scrollbars=yes,resizable=yes,width=500,height=250')"><?php echo $html_bcc ?></a> : </td>
                    <?php } else { ?>
                        <td align="right" class="inbox"><?php echo $html_bcc ?> : </td>
                    <?php } ?>
                    <td align="left"><input type="text" name="mail_bcc" size="60" value="<?php echo (isset($mail_bcc) ? htmlspecialchars($mail_bcc) : '') ?>" /></td>
                </tr>
                <tr>
                    <td align="right" class="inbox"><?php echo $html_subject ?> : </td>
                    <td align="left"><input type="text" name="mail_subject" size="60" maxlength="200" value="<?php echo (isset($mail_subject) ? htmlspecialchars($mail_subject) : '') ?>" /></td>
                </tr>
                <!-- If 'file_uploads=Off', we mustn't present the ability to do attachments -->
                <?php if(ini_get("file_uploads")) { ?>
                <tr>
                    <td align="right" class="inbox"><?php echo $html_att ?> : </td>
                    <td align="left">
                        <table><tr valign="middle">
                           <td>
                               <input type="file" name="mail_att" size="40" value="" />
                           </td>
                           <td>
                               <input type="submit" class="button" onclick="btnClicked=this" name="sendaction" value="<?php echo $html_attach ?>" />
                           </td>
                        </tr></table> 
                    </td>
                </tr>
                <?php } ?>
                <tr>
                    <td align="right" class="inbox"><?php echo $html_receipt ?> : </td>
                    <td align="left"><input name="receipt" type="checkbox" <?php if(isset($mail_receipt) && $mail_receipt) echo "checked"; ?>/></td>
                </tr>
                <tr>
                    <td align="right" class="inbox"><?php echo $html_priority ?> : </td>
                    <td align="left">
                        <select name="priority">
                            <option value="2 (High)"><?php echo $html_high ?></option>
                            <option value="3 (Normal)" selected="selected"><?php echo $html_normal ?></option>
                            <option value="4 (Low)"><?php echo $html_low ?></option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td align="left">
                        <?php
                        if (isset($_SESSION['nocc_attach_array']) && count($_SESSION['nocc_attach_array']) > 0)
                        {
                            $attach_array = $_SESSION['nocc_attach_array'];
                            echo '<table border="0" cellspacing="2"><tr><td class="inbox">&nbsp;</td><td class="inbox"><b>' . $html_filename . '</b></td><td class="inbox"><b>' . $html_size . '(' . $html_bytes . ')</b></td></tr>';
                            $totalsize = 0;
                            for ($i = 0; $i < count($attach_array); $i++)
                            {    
                                $totalsize += $attach_array[$i]->file_size;
                                $att_name = nocc_imap::mime_header_decode($attach_array[$i]->file_name);
                                echo '<tr><td class="inbox"><input type="checkbox" name="file-' . $i . '" /></td><td class="inbox">' . htmlentities($att_name[0]->text) . '</td><td class="inbox">' . $attach_array[$i]->file_size . '</td></tr>';
                            }
                            echo '<tr><td colspan="2"><input type="submit" class="button" onclick="btnClicked=this" name="sendaction" value="' . $html_attach_delete . '" /></td><td class="inbox"><b>' . $html_totalsize . ' : ' . $totalsize . ' ' . $html_bytes . '</b></td></tr></table>';
                        }
                        else {
                            if ($_GET["action"] == 'forward') {
                                echo '<span class="inbox">' . $html_forward_info . '</span>';
                            } else {
                                echo '&nbsp;';
                            }
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><textarea name="mail_body" cols="82" rows="20"><?php echo (isset($mail_body) ? htmlspecialchars($mail_body) : '') ?></textarea></td>
                </tr>
                <tr>
                    <td align="center" colspan="2">
                        <table bgcolor="<?php echo $glob_theme->inside_color ?>" width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td align="right" valign="middle" width="50%">
                                    <input type="submit" class="button" onclick="btnClicked=this" name="sendaction" value="<?php echo $html_send ?>" />&nbsp;
                                </td>
                                <td align="left" valign="middle" width="50%">
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

<script type="text/javascript">
<!--
var btnClicked;

function validate(f) 
{
    if (btnClicked.value == "<?php echo $html_attach ?>") {
        return(true);
    }
    if (window.RegExp) {
        var reg = new RegExp("[0-9A-Za-z]+","g");
        if (!reg.test(f.elements['mail_to'].value)) {
            alert("<?php echo $to_empty ?>");
            f.elements['mail_to'].focus();
            return (false);
        }
    }
    if (f.elements['mail_att'].value != "") {
        alert("<?php echo $html_attach_forget ?>")
        return (false);
    }
    //f.elements['sendaction'].value = "send";
}

//-->
</script>
<!-- end of $Id: send.php,v 1.69 2004/10/04 18:23:30 goddess_skuld Exp $ -->
