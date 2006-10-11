<!-- start of $Id: send.php,v 1.83 2006/10/10 12:52:52 goddess_skuld Exp $ -->
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
  if(isset($broken_forwarding) && !($broken_forwarding)) {
      if(isset($forward_msgnum)) { 
?>
<div><input type="hidden" name="forward_msgnum" value="<?php echo $forward_msgnum ?>" /></div>
  <?php 
      }
  } 
  ?>
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
        <td class="sendLabel"><label for="mail_from"><?php echo $html_from ?>:</label></td>
        <td class="sendData">
          <?php if( isset($conf->allow_address_change) && $conf->allow_address_change ) { ?>
          <input class="button" type="text" name="mail_from" id="mail_from" size="60" value="<?php echo htmlspecialchars($mail_from) ?>" />
         <?php } else { echo htmlspecialchars($mail_from); }?>
       </td>
     </tr>
     <tr>
     <?php if ($conf->prefs_dir && isset($conf->contact_number_max) && $conf->contact_number_max != 0 ) { ?>
       <td class="sendLabel">
         <label for="mail_to"><a href="javascript:void(0);" onclick="window.open('contacts.php?field=mail_to&amp;<?php echo session_name().'='.session_id() ?>','','scrollbars=yes,resizable=yes,width=500,height=250')"><?php echo $html_to ?></a>:</label>
       </td>
     <?php } else { ?>
       <td class="sendLabel"><label for="mail_to"><?php echo $html_to ?>:</label></td>
     <?php } ?>
       <td class="sendData">
         <input class="button" type="text" name="mail_to" id="mail_to" size="60" value="<?php echo (isset($mail_to) ? stripslashes(htmlspecialchars($mail_to)) : ''); ?>" />
       </td>
     </tr>
     <tr>
     <?php if ($conf->prefs_dir && isset($conf->contact_number_max) && $conf->contact_number_max != 0 ) { ?>
       <td class="sendLabel">
         <label for="mail_cc"><a href="javascript:void(0);" onclick="window.open('contacts.php?field=mail_cc&amp;<?php echo session_name().'='.session_id() ?>','','scrollbars=yes,resizable=yes,width=500,height=250')"><?php echo $html_cc ?></a>:</label>
       </td>
     <?php } else { ?>
       <td class="sendLabel"><label for="mail_cc"><?php echo $html_cc ?>:</label></td>
     <?php } ?>
       <td class="sendData">
         <input class="button" type="text" name="mail_cc" id="mail_cc" size="60" value="<?php echo (isset($mail_cc) ? htmlspecialchars($mail_cc) : '') ?>" />
       </td>
     </tr>
     <tr>
     <?php if ($conf->prefs_dir && isset($conf->contact_number_max) && $conf->contact_number_max != 0 ) { ?>
       <td class="sendLabel">
         <label for="mail_bcc"><a href="javascript:void(0);" onclick="window.open('contacts.php?field=mail_bcc&amp;<?php echo session_name().'='.session_id() ?>','','scrollbars=yes,resizable=yes,width=500,height=250')"><?php echo $html_bcc ?></a>:</label>
       </td>
     <?php } else { ?>
       <td class="sendLabel"><label for="mail_bcc"><?php echo $html_bcc ?>:</label></td>
     <?php } ?>
       <td class="sendData">
         <input class="button" type="text" name="mail_bcc" id="mail_bcc" size="60" value="<?php echo (isset($mail_bcc) ? htmlspecialchars($mail_bcc) : '') ?>" />
       </td>
     </tr>
     <tr>
       <td class="sendLabel"><label for="mail_subject"><?php echo $html_subject ?>:</label></td>
       <td class="sendData">
         <input class="button" type="text" name="mail_subject" id="mail_subject" size="60" maxlength="200" value="<?php echo (isset($mail_subject) ? htmlspecialchars($mail_subject) : '') ?>" />
       </td>
     </tr>
     <!-- If 'file_uploads=Off', we mustn't present the ability to do attachments -->
     <?php if(ini_get("file_uploads")) { ?>
     <tr>
       <td class="sendLabel"><label for="mail_att"><?php echo $html_att ?>:</label></td>
       <td class="sendData">
         <input class="button" type="file" name="mail_att" id="mail_att" size="40" value="" />
         <input type="submit" class="button" onclick="btnClicked=this" name="sendaction" value="<?php echo $html_attach ?>" />
       </td>
     </tr>
     <?php } ?>
     <tr>
       <td class="sendLabel"><label for="receipt"><?php echo $html_receipt ?>:</label></td>
       <td class="sendData">
         <input name="receipt" id="receipt" type="checkbox" <?php if(isset($mail_receipt) && $mail_receipt) echo "checked"; ?>/>
       </td>
     </tr>
     <tr>
       <td class="sendLabel"><label for="priority"><?php echo $html_priority ?>:</label></td>
       <td class="sendData">
         <select class="button" name="priority" id="priority">
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
             echo '<input type="checkbox" name="file-' . $i . '" id="file-' . $i . '" />';
             echo '</td>';
             echo '<td class="sendData"><label for="file-' . $i . '">' . htmlentities($att_name[0]->text, ENT_COMPAT, 'UTF-8') . '</label></td>';
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
           if (isset($broken_forwarding) && !($broken_forwarding)) {
             if (isset($_GET["action"]) && $_GET["action"] == 'forward') {
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
<!-- end of $Id: send.php,v 1.83 2006/10/10 12:52:52 goddess_skuld Exp $ -->
