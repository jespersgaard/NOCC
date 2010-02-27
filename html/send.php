<!-- start of $Id$ -->
<?php
    if (!isset($conf->loaded))
        die('Hacking attempt');

    // Default e-mail address on send form
    $mail_from = get_default_from_address();
?>
<div class="send">
<!-- If 'file_uploads=Off', we must set formtype to "normal" otherwise it won't work -->
<form id="sendform" enctype="<?php echo (ini_get("file_uploads")) ? "multipart/form-data" : "normal" ?>" method="post" onsubmit="return(validate(this));" action="send.php">

<?php 
    if (isset($broken_forwarding) && !($broken_forwarding)) {
        if (isset($forward_msgnum)) {
?>
<div><input type="hidden" name="forward_msgnum" value="<?php echo $forward_msgnum ?>" /></div>
<?php 
        }
    } 

    // include old messageid
    // to keep 'treeview' of mailinglist threads etc.
    if (!empty($mail_messageid)) {
        print('<div><input type="hidden" name="mail_messageid" value="' . $mail_messageid . '" /></div>');
    }
?>

    <p class="sendButtons">
      <input type="submit" class="button" onclick="btnClicked=this" name="sendaction" value="<?php echo $html_send ?>" />
      &nbsp;&nbsp;
      <input type="reset" class="button" value="<?php echo $html_cancel ?>" />
    </p>
    <table>
      <tr>
        <td class="sendLabel"><label for="mail_from"><?php echo $html_from_label ?></label></td>
        <td class="sendData">
          <?php if (isset($conf->allow_address_change) && $conf->allow_address_change ) { ?>
          <input class="button" type="text" name="mail_from" id="mail_from" size="60" value="<?php echo htmlspecialchars($mail_from) ?>" />
         <?php } else { echo htmlspecialchars($mail_from); }?>
       </td>
     </tr>
     <tr>
       <td class="sendLabel"><label for="mail_to"><?php echo $html_to_label ?></label></td>
       <td class="sendData">
         <input class="button" type="text" name="mail_to" id="mail_to" size="60" value="<?php echo (isset($mail_to) ? stripslashes(htmlspecialchars($mail_to)) : ''); ?>" />
         <?php if ($conf->prefs_dir && isset($conf->contact_number_max) && $conf->contact_number_max != 0 ) { ?>
           <a href="javascript:void(0);" onclick="window.open('contacts.php?field=mail_to&amp;<?php echo session_name().'='.session_id() ?>','','scrollbars=yes,resizable=yes,width=500,height=250')"><?php echo $html_select_contacts ?></a>
         <?php } ?>
       </td>
     </tr>
     <tr>
       <td class="sendLabel"><label for="mail_cc"><?php echo $html_cc_label ?></label></td>
       <td class="sendData">
         <input class="button" type="text" name="mail_cc" id="mail_cc" size="60" value="<?php echo (isset($mail_cc) ? htmlspecialchars($mail_cc) : '') ?>" />
         <?php if ($conf->prefs_dir && isset($conf->contact_number_max) && $conf->contact_number_max != 0 ) { ?>
            <a href="javascript:void(0);" onclick="window.open('contacts.php?field=mail_cc&amp;<?php echo session_name().'='.session_id() ?>','','scrollbars=yes,resizable=yes,width=500,height=250')"><?php echo $html_select_contacts ?></a>
         <?php } ?>
       </td>
     </tr>
     <tr>
       <td class="sendLabel"><label for="mail_bcc"><?php echo $html_bcc_label ?></label></td>
       <td class="sendData">
         <input class="button" type="text" name="mail_bcc" id="mail_bcc" size="60" value="<?php echo (isset($mail_bcc) ? htmlspecialchars($mail_bcc) : '') ?>" />
         <?php if ($conf->prefs_dir && isset($conf->contact_number_max) && $conf->contact_number_max != 0 ) { ?>
           <a href="javascript:void(0);" onclick="window.open('contacts.php?field=mail_bcc&amp;<?php echo session_name().'='.session_id() ?>','','scrollbars=yes,resizable=yes,width=500,height=250')"><?php echo $html_select_contacts ?></a>
         <?php } ?>
       </td>
     </tr>
     <tr>
       <td class="sendLabel"><label for="mail_subject"><?php echo $html_subject_label ?></label></td>
       <td class="sendData">
         <input class="button" type="text" name="mail_subject" id="mail_subject" size="60" maxlength="200" value="<?php echo (isset($mail_subject) ? htmlspecialchars($mail_subject) : '') ?>" />
       </td>
     </tr>
     <!-- If 'file_uploads=Off', we mustn't present the ability to do attachments -->
     <?php if (ini_get("file_uploads")) { ?>
     <tr>
       <td class="sendLabel"><label for="mail_att"><?php echo $html_att_label ?></label></td>
       <td class="sendData">
         <input class="button" type="file" name="mail_att" id="mail_att" size="40" value="" />
         <input type="submit" class="button" onclick="btnClicked=this" name="sendaction" value="<?php echo $html_attach ?>" />
       </td>
     </tr>
     <?php } ?>
     <tr>
       <td class="sendLabel"><label for="priority"><?php echo $html_priority_label ?></label></td>
       <td class="sendData">
         <select class="button" name="priority" id="priority">
           <option value="1 (Highest)"><?php echo $html_highest ?></option>
           <option value="2 (High)"><?php echo $html_high ?></option>
           <option value="3 (Normal)" selected="selected"><?php echo $html_normal ?></option>
           <option value="4 (Low)"><?php echo $html_low ?></option>
           <option value="5 (Lowest)"><?php echo $html_lowest ?></option>
         </select>
         <input name="receipt" id="receipt" type="checkbox" <?php if(isset($mail_receipt) && $mail_receipt) echo "checked"; ?>/>
         <label for="receipt"><?php echo $html_receipt ?></label>
       </td>
     </tr>
     <tr>
       <td>&nbsp;</td>
       <td class="sendData">
       <?php
            if (isset($_SESSION['nocc_attach_array']) && count($_SESSION['nocc_attach_array']) > 0) {
                $attach_array = $_SESSION['nocc_attach_array'];
                echo '<table id="attachTable">';
                echo '<tr>';
                echo '<th></th>';
                echo '<th>' . $html_filename . '</th>';
                echo '<th>' . $html_size . '</th>';
                echo '</tr>';
                $totalsize = 0;
                for ($i = 0; $i < count($attach_array); $i++) {
                    $totalsize += $attach_array[$i]->file_size;
                    $att_name = nocc_imap::utf8($attach_array[$i]->file_name);
                    echo '<tr>';
                    echo '<td>';
                    echo '<input type="checkbox" name="file-' . $i . '" id="file-' . $i . '" />';
                    echo '</td>';
                    echo '<td><label for="file-' . $i . '">' . htmlentities($att_name, ENT_COMPAT, 'UTF-8') . '</label></td>';
                    echo '<td>' . $attach_array[$i]->file_size . ' ' . $html_bytes . '</td>';
                    echo '</tr>';
                }
                echo '<tr>';
                echo '<th colspan="2">';
                echo '<input type="submit" class="button" onclick="btnClicked=this" name="sendaction" value="' . $html_attach_delete . '" />';
                echo '</th>';
                // FIXME: this should be in one message with $totalsize as a parameter
                echo '<th>' . $html_totalsize_label . ' ' . $totalsize . ' ' . $html_bytes . '</th>';
                echo '</tr>';
                echo '</table>';
            } else {
                if (isset($broken_forwarding) && !($broken_forwarding)) {
                    if (isset($_GET['action']) && $_GET['action'] == 'forward') {
                        echo '<span class="inbox">' . $html_forward_info . '</span>';
                    } else {
                        echo '&nbsp;';
                    }
                } else {
                    echo '&nbsp;';
                }
            }
       ?>
       </td>
     </tr>
     <tr>
       <td>&nbsp;</td>
       <td class="sendData">
         <?php if (!isset($_SESSION['html_mail_send']) || !$_SESSION['html_mail_send'] || !file_exists('fckeditor/fckeditor.php')) { ?>
         <textarea name="mail_body" cols="82" rows="20"><?php echo (isset($mail_body) ? htmlspecialchars($mail_body) : '') ?></textarea>
         <?php
           } else {
                include 'fckeditor/fckeditor.php';
                $oFCKeditor = new FCKeditor('mail_body') ;
                $oFCKeditor->ToolbarSet = 'NOCC';
                $oFCKeditor->BasePath = 'fckeditor/';
                $oFCKeditor->Config['CustomConfigurationsPath'] = $conf->base_url . 'config/fckconfig.js';
                $oFCKeditor->Value = isset($mail_body) ? $mail_body : '';
                $oFCKeditor->Create();
           }
         ?>
       </td>
     </tr>
   </table>
    <p class="sendButtons">
      <input type="submit" class="button" onclick="btnClicked=this" name="sendaction" value="<?php echo $html_send ?>" />
      &nbsp;&nbsp;
      <input type="reset" class="button" value="<?php echo $html_cancel ?>" />
    </p>
  </form>
</div>

<script type="text/javascript">
<!--
var btnClicked;

function validate(f) 
{
    if (checkSendDelay() == false) {
        return (false);
    }
    if (btnClicked.value == "<?php echo unhtmlentities($html_attach) ?>") {
        if(f.elements['mail_att'].value == "") {
            alert('<?php echo unhtmlentities($html_attach_none) ?>');
            return (false);
        }
        else {
            return(true);
        }
    }
    if (btnClicked.value == "<?php echo unhtmlentities($html_attach_delete) ?>") {
        return (true);
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
        alert("<?php echo unhtmlentities($html_attach_forget) ?>")
        return (false);
    }
    return (true);
}

function checkSendDelay() {
    var thisdate = new Date();
    var send_delay = <?php echo($conf->send_delay) ?>;
    <?php
        if (isset ($_SESSION['last_send'])) {
    ?>
        var last_send = <?php echo($_SESSION['last_send']) ?>;
    <?php
        } else {
    ?>
        var last_send = 0;
    <?php
        }
    ?>
    
    if (last_send + send_delay < ( thisdate.getTime() / 1000 )) {
        return (true);
    } else {
        alert('<?php echo(i18n_message($lang_err_send_delay, $conf->send_delay)) ?>');
        return (false);
    }
    
    return false;
}

//-->
</script>
<!-- end of $Id$ -->
