<!-- start of $Id: send.php,v 1.74 2005/08/01 08:11:17 goddess_skuld Exp $ -->
<?php
// Default e-mail address on send form
$mail_from = get_default_from_address();

?>
<div class="send">
<!-- If 'file_uploads=Off', we must set formtype to "normal" otherwise it won't work -->
<form name="sendform" enctype="<?php echo (ini_get("file_uploads")) ? "multipart/form-data" : "normal" ?>" method="post" onsubmit="return(validate(this));" action="send.php">
<?php if(isset($forward_msgnum)) { ?>
<input type="hidden" name="forward_msgnum" value="<?php echo $forward_msgnum ?>" />
  <?php } ?>
    <table>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="sendButtons">
          <input type="submit" class="button" onclick="btnClicked=this" name="sendaction" value="<?php echo $html_send ?>" />
          &nbsp;&nbsp;
          <input type="reset" class="button" value="<?php echo $html_cancel ?>" />
        </td>
      </tr>
    </table>
    <table>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td class="sendLabel"><?php echo $html_from ?> : </td>
        <td class="sendData">
          <?php if( isset($conf->allow_address_change) && $conf->allow_address_change ) { ?>
          <input class="button" type="text" name="mail_from" size="60" value="<?php echo htmlspecialchars($mail_from) ?>" />
         <?php } else { echo htmlspecialchars($mail_from); }?>
       </td>
     </tr>
     <tr>
     <?php if ($conf->prefs_dir && isset($conf->contact_number_max) && $conf->contact_number_max != 0 ) { ?>
       <td class="sendLabel">
         <a href="javascript:void(0);" onclick="window.open('contacts.php?field=mail_to&<?php echo session_name().'='.session_id() ?>','','scrollbars=yes,resizable=yes,width=500,height=250')"><?php echo $html_to ?></a> :
       </td>
     <?php } else { ?>
       <td class="sendLabel"><?php echo $html_to ?> : </td>
     <?php } ?>
       <td class="sendData">
         <input class="button" type="text" name="mail_to" size="60" value="<?php echo (isset($mail_to) ? stripslashes(htmlspecialchars($mail_to)) : ''); ?>" />
       </td>
     </tr>
     <tr>
     <?php if ($conf->prefs_dir && isset($conf->contact_number_max) && $conf->contact_number_max != 0 ) { ?>
       <td class="sendLabel">
         <a href="javascript:void(0);" onclick="window.open('contacts.php?field=mail_cc&<?php echo session_name().'='.session_id() ?>','','scrollbars=yes,resizable=yes,width=500,height=250')"><?php echo $html_cc ?></a> :

       </td>
     <?php } else { ?>
       <td class="sendLabel"><?php echo $html_cc ?> : </td>
     <?php } ?>
       <td class="sendData">
         <input class="button" type="text" name="mail_cc" size="60" value="<?php echo (isset($mail_cc) ? htmlspecialchars($mail_cc) : '') ?>" />
       </td>
     </tr>
     <tr>
     <?php if ($conf->prefs_dir && isset($conf->contact_number_max) && $conf->contact_number_max != 0 ) { ?>
       <td class="sendLabel">
         <a href="javascript:void(0);" onclick="window.open('contacts.php?field=mail_bcc&<?php echo session_name().'='.session_id() ?>','','scrollbars=yes,resizable=yes,width=500,height=250')"><?php echo $html_bcc ?></a> :
       </td>
     <?php } else { ?>
       <td class="sendLabel"><?php echo $html_bcc ?> : </td>
     <?php } ?>
       <td class="sendData">
         <input class="button" type="text" name="mail_bcc" size="60" value="<?php echo (isset($mail_bcc) ? htmlspecialchars($mail_bcc) : '') ?>" />
       </td>
     </tr>
     <tr>
       <td class="sendLabel"><?php echo $html_subject ?> : </td>
       <td class="sendData">
         <input class="button" type="text" name="mail_subject" size="60" maxlength="200" value="<?php echo (isset($mail_subject) ? htmlspecialchars($mail_subject) : '') ?>" />
       </td>
     </tr>
     <!-- If 'file_uploads=Off', we mustn't present the ability to do attachments -->
     <?php if(ini_get("file_uploads")) { ?>
     <tr>
       <td class="sendLabel"><?php echo $html_att ?> : </td>
       <td class="sendData">
         <input class="button" type="file" name="mail_att" size="40" value="" />
         <input type="submit" class="button" onclick="btnClicked=this" name="sendaction" value="<?php echo $html_attach ?>" />
       </td>
     </tr>
     <?php } ?>
     <tr>
       <td class="sendLabel"><?php echo $html_receipt ?> : </td>
       <td class="sendData">
         <input name="receipt" type="checkbox" <?php if(isset($mail_receipt) && $mail_receipt) echo "checked"; ?>/>
       </td>
     </tr>
     <tr>
       <td class="sendLabel"><?php echo $html_priority ?> : </td>
       <td class="sendData">
         <select class="button" name="priority">
           <option value="2 (High)"><?php echo $html_high ?></option>
           <option value="3 (Normal)" selected="selected"><?php echo $html_normal ?></option>
           <option value="4 (Low)"><?php echo $html_low ?></option>
         </select>
       </td>
     </tr>
     <tr>
       <td>&nbsp;</td>
       <td class="sendData">
       <?php
         if (isset($_SESSION['nocc_attach_array']) && count($_SESSION['nocc_attach_array']) > 0)
         {
           $attach_array = $_SESSION['nocc_attach_array'];
           echo '<table>';
           echo '<tr>';
           echo '<td class="sendData">&nbsp;</td>';
           echo '<td class="sendData bold">' . $html_filename . '</td>';
           echo '<td class="sendData bold">' . $html_size . '(' . $html_bytes . ')</td>';
           echo '</tr>';
           $totalsize = 0;
           for ($i = 0; $i < count($attach_array); $i++)
           {    
             $totalsize += $attach_array[$i]->file_size;
             $att_name = nocc_imap::mime_header_decode($attach_array[$i]->file_name);
             echo '<tr>';
             echo '<td class="sendData">';
             echo '<input type="checkbox" name="file-' . $i . '" />';
             echo '</td>';
             echo '<td class="sendData">' . htmlentities($att_name[0]->text) . '</td>';
             echo '<td class="sendData">' . $attach_array[$i]->file_size . '</td>';
             echo '</tr>';
           }
           echo '<tr>';
           echo '<td colspan="2">';
           echo '<input type="submit" class="button" onclick="btnClicked=this" name="sendaction" value="' . $html_attach_delete . '" />';
           echo '</td>';
           echo '<td class="sendData bold">' . $html_totalsize . ' : ' . $totalsize . ' ' . $html_bytes . '</td>';
           echo '</tr>';
           echo '</table>';
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
       <td colspan="2" class="center">
         <textarea name="mail_body" cols="82" rows="20"><?php echo (isset($mail_body) ? htmlspecialchars($mail_body) : '') ?></textarea>
       </td>
     </tr>
   </table>
    <table>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="sendButtons">
          <input type="submit" class="button" onclick="btnClicked=this" name="sendaction" value="<?php echo $html_send ?>" />
          &nbsp;&nbsp;
          <input type="reset" class="button" value="<?php echo $html_cancel ?>" />
        </td>
      </tr>
    </table>                                                                    
  </form>
</div>

<script type="text/javascript">
<!--
var btnClicked;

function validate(f) 
{
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
}

//-->
</script>
<!-- end of $Id: send.php,v 1.74 2005/08/01 08:11:17 goddess_skuld Exp $ -->
