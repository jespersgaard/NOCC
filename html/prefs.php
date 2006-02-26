<!-- start of $Id: prefs.php,v 1.36 2005/08/01 08:11:17 goddess_skuld Exp $ -->
<?php
  if (!isset($conf->loaded))
    die('Hacking attempt');

$all_mailboxes = $pop->getmailboxes($ev);

$big_list = array();
if (is_array($all_mailboxes)) {
  reset($all_mailboxes);
  while (list($junk, $val) = each($all_mailboxes)) {
    list($junk,$name) = split($pop->server .'}', $pop->utf7_decode($val->name));
    if (strlen($name) <= 32) {
      array_push($big_list, $name);
    }
  }
}

$select_list = array();
if (count($big_list) > 1) {
  for ($i = 0; $i < count($big_list); $i++) {
    if (isset($user_prefs->sent_folder_name) && $_SESSION['imap_namespace'] . $user_prefs->sent_folder_name == $big_list[$i]) {
      array_push($select_list, "\t<option value=\"".$big_list[$i]."\" selected=\"selected\">".$big_list[$i]."</option>\n");
    } else {
      array_push($select_list, "\t<option value=\"".$big_list[$i]."\">".$big_list[$i]."</option>\n");
    }
  }
}
?>
<div class="prefs">
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div>
      <input type="hidden" name="action" value="setprefs" />
      <input type="hidden" name="submit_prefs" value="set" />
      <table>
         <tr>
           <td class="prefsLabel"><?php echo $html_full_name ?> : </td>
           <td class="prefsData">
             <input class="button"type="text" name="full_name" value="<?php echo (isset($user_prefs->full_name)) ? $user_prefs->full_name : "" ?>" size="40"/>
           </td>
         </tr>
         <?php if ($conf->allow_address_change) { ?>
         <tr>
           <td class="prefsLabel"><?php echo $html_email_address ?> : </td>
           <td class="prefsData">
             <input class="button" type="text" name="email_address" value="<?php echo (isset($user_prefs->email_address)) ? $user_prefs->email_address : get_default_from_address() ?>" size="40"/>
           </td>
         </tr>
         <?php } ?>
         <tr>
           <td class="prefsLabel"><?php echo $html_msgperpage ?> : </td>
           <td class="prefsData">
             <input class="button" type="text" name="msg_per_page" value="<?php echo (isset($user_prefs->msg_per_page)) ? $user_prefs->msg_per_page : $conf->msg_per_page ?>" size="3" maxlength="3"/>
           </td>
         </tr>
         <tr>
           <td class="prefsLabel">&nbsp;</td>
           <td class="prefsData">
             <input type="checkbox" name="cc_self" id="cc_self" value="on" <?php if(isset($user_prefs->cc_self) && $user_prefs->cc_self) echo "checked"; ?> /><label for="cc_self"><?php echo $html_ccself ?></label>
           </td>
         </tr>
         <tr>
           <td class="prefsLabel">&nbsp;</td>
           <td class="prefsData">
             <input type="checkbox" name="hide_addresses" id="hide_addresses" value="on" <?php if(isset($user_prefs->hide_addresses) && $user_prefs->hide_addresses) echo "checked"; ?> /><label for="hide_addresses"><?php echo $html_hide_addresses ?></label>
           </td>
         </tr>
         <tr>
           <td class="prefsLabel">&nbsp;</td>
           <td class="prefsData">
             <input type="checkbox" name="outlook_quoting" id="outlook_quoting" value="on" <?php if(isset($user_prefs->outlook_quoting) && $user_prefs->outlook_quoting) echo "checked"; ?> /><label for="outlook_quoting"><?php echo $html_outlook_quoting ?></label>
           </td>
         </tr>
         <tr>
           <td class="prefsLabel">&nbsp;</td>
           <td class="prefsData">
             <label><?php echo $html_wrap ?></label>
             <input type="radio" name="wrap_msg" value="80" <?php if($user_prefs->wrap_msg == 80) echo "checked"; ?> />80
             &nbsp;&nbsp;
             <input type="radio" name="wrap_msg" value="72" <?php if($user_prefs->wrap_msg == 72) echo "checked"; ?> />72
             &nbsp;&nbsp;
             <label><input name="wrap_msg" type="radio" value="0" <?php if($user_prefs->wrap_msg == '') echo "checked"; ?> /><?php echo $html_wrap_none?></label>
           </td>
         </tr>
         <tr>
           <td class="prefsLabel">&nbsp;</td>
           <td class="prefsData">
             <input type="checkbox" name="seperate_msg_win" id="seperate_msg_win" value="on" <?php if(isset($user_prefs->seperate_msg_win) && $user_prefs->seperate_msg_win) echo "checked"; ?> /><label for="seperate_msg_win"><?php echo $html_seperate_msg_win ?></label>
           </td>
         </tr>
         <?php if($conf->enable_reply_leadin) { ?>
         <tr>
           <td class="prefsLabel"><?php echo $html_reply_leadin ?> : </td>
           <td class="prefsData">
             <input class="button" type="text" name="reply_leadin" value="<?php echo (isset($user_prefs->reply_leadin)) ? $user_prefs->reply_leadin : "" ?>" size="40"/>
           </td>
         </tr>
         <?php } ?>
         <tr>
           <td class="prefsLabel"><?php echo $html_signature ?> : </td>
           <td class="prefsData">
             <textarea class="button" name="signature" rows="5" cols="40"><?php echo (isset($user_prefs->signature)) ? $user_prefs->signature : "" ?></textarea>
           </td>
         </tr>
         <tr>
           <td class="prefsLabel">&nbsp;</td>
           <td class="prefsData">
             <input type="checkbox" name="sig_sep" id="sig_sep" value="on" <?php if(isset($user_prefs->sig_sep) && $user_prefs->sig_sep) echo "checked"; ?> /><label for="sig_sep"><?php echo $html_usenet_separator ?></label>
           </td>
         </tr>
         <tr>
           <td class="prefsLabel">&nbsp;</td>
           <td class="prefsData">
             <input type="checkbox" name="graphical_smilies" id="graphical_smilies" value="on" <?php if (isset($user_prefs->graphical_smilies) && $user_prefs->graphical_smilies) echo "checked"; ?> /><label for="graphical_smilies"><?php echo $html_use_graphical_smilies ?></label>
           </td>
         </tr>
         <?php if($pop->is_imap()) { ?>
         <tr>
           <td class="prefsLabel">&nbsp;</td>
           <td class="prefsData">
             <input type="checkbox" name="sent_folder" id="sent_folder" value="on" <?php if (isset($user_prefs->sent_folder) && $user_prefs->sent_folder) echo "checked"; ?> /><label for="sent_folder"><?php echo $html_sent_folder ?></label> : 
             <select class="button" name="sent_folder_name"><?php echo join('', $select_list) ?></select>
           </td>
         </tr>
         <?php } ?>
         <tr>
           <td colspan="2" class="center">
           <?php
             if(NoccException::isException($ev)) {
           ?>
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
           <?php
             } else {
               if(isset($_REQUEST['submit_prefs']))
                 echo '<br />' . $html_prefs_updated;
             }
           ?>
             <br /><br />
             <input type="submit" class="button" value="<?php echo $html_submit ?>" />
              &nbsp;&nbsp;
              <input type="reset" class="button" value="<?php echo $html_cancel ?>" />
           </td>
         </tr>
       </table>
     </div>
   </form>
   <?php
     if($pop->is_imap()) {
   ?>
 </div>
 <div class="IMAPPrefs">
   <a href="action.php?action=managefolders"><?php echo $html_manage_folders_link ?></a>
   &nbsp;|&nbsp;
   <a href="action.php?action=managefilters"><?php echo $html_manage_filters_link ?></a>
 </div>
   <?php
     }
   ?>
<!-- end of $Id: prefs.php,v 1.36 2005/08/01 08:11:17 goddess_skuld Exp $ -->
