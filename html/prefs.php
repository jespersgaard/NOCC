<!-- start of $Id: prefs.php,v 1.42 2006/09/05 14:26:52 goddess_skuld Exp $ -->
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
           <td class="prefsLabel"><label for="full_name"><?php echo htmlentities($html_full_name, ENT_COMPAT, 'UTF-8') ?>:</label></td>
           <td class="prefsData">
             <input class="button"type="text" name="full_name" value="<?php echo (isset($user_prefs->full_name)) ? $user_prefs->full_name : "" ?>" size="40"/>
           </td>
         </tr>
         <?php if ($conf->allow_address_change) { ?>
         <tr>
           <td class="prefsLabel"><label for="email_address"><?php echo htmlentities($html_email_address, ENT_COMPAT, 'UTF-8') ?>:</label></td>
           <td class="prefsData">
             <input class="button" type="text" name="email_address" value="<?php echo (isset($user_prefs->email_address)) ? $user_prefs->email_address : get_default_from_address() ?>" size="40"/>
           </td>
         </tr>
         <?php } ?>
         <tr>
           <td class="prefsLabel"><label for="msg_per_page"><?php echo htmlentities($html_msgperpage, ENT_COMPAT, 'UTF-8') ?>:</label></td>
           <td class="prefsData">
             <input class="button" type="text" name="msg_per_page" value="<?php echo (isset($user_prefs->msg_per_page)) ? $user_prefs->msg_per_page : $conf->msg_per_page ?>" size="3" maxlength="3"/>
           </td>
         </tr>
         <tr>
           <td class="prefsLabel">&nbsp;</td>
           <td class="prefsData">
             <input type="checkbox" name="cc_self" id="cc_self" value="on" <?php if(isset($user_prefs->cc_self) && $user_prefs->cc_self) echo 'checked="checked"'; ?> /><label for="cc_self"><?php echo htmlentities($html_ccself, ENT_COMPAT, 'UTF-8') ?></label>
           </td>
         </tr>
         <tr>
           <td class="prefsLabel">&nbsp;</td>
           <td class="prefsData">
             <input type="checkbox" name="hide_addresses" id="hide_addresses" value="on" <?php if(isset($user_prefs->hide_addresses) && $user_prefs->hide_addresses) echo 'checked="checked"'; ?> /><label for="hide_addresses"><?php echo htmlentities($html_hide_addresses, ENT_COMPAT, 'UTF-8') ?></label>
           </td>
         </tr>
         <tr>
           <td class="prefsLabel">&nbsp;</td>
           <td class="prefsData">
             <input type="checkbox" name="outlook_quoting" id="outlook_quoting" value="on" <?php if(isset($user_prefs->outlook_quoting) && $user_prefs->outlook_quoting) echo 'checked="checked"'; ?> /><label for="outlook_quoting"><?php echo htmlentities($html_outlook_quoting, ENT_COMPAT, 'UTF-8') ?></label>
           </td>
         </tr>
         <tr>
           <td class="prefsLabel">&nbsp;</td>
           <td class="prefsData">
             <label><?php echo htmlentities($html_wrap, ENT_COMPAT, 'UTF-8') ?></label>
             <input type="radio" name="wrap_msg" value="80" <?php if($user_prefs->wrap_msg == 80) echo 'checked="checked"'; ?> />80
             &nbsp;&nbsp;
             <input type="radio" name="wrap_msg" value="72" <?php if($user_prefs->wrap_msg == 72) echo 'checked="checked"'; ?> />72
             &nbsp;&nbsp;
             <label><input name="wrap_msg" type="radio" value="0" <?php if(!isset($user_prefs->wrap_msg) || $user_prefs->wrap_msg == '' || $user_prefs->wrap_msg == '0') echo 'checked="checked"'; ?> /><?php echo htmlentities($html_wrap_none, ENT_COMPAT, 'UTF-8') ?></label>
           </td>
         </tr>
         <tr>
           <td class="prefsLabel">&nbsp;</td>
           <td class="prefsData">
             <input type="checkbox" name="seperate_msg_win" id="seperate_msg_win" value="on" <?php if(isset($user_prefs->seperate_msg_win) && $user_prefs->seperate_msg_win) echo 'checked="checked"'; ?> /><label for="seperate_msg_win"><?php echo htmlentities($html_seperate_msg_win, ENT_COMPAT, 'UTF-8') ?></label>
           </td>
         </tr>
         <?php if($conf->enable_reply_leadin) { ?>
         <tr>
           <td class="prefsLabel"><label for="reply_leadin"><?php echo htmlentities($html_reply_leadin, ENT_COMPAT, 'UTF-8') ?>:</label></td>
           <td class="prefsData">
             <input class="button" type="text" name="reply_leadin" value="<?php echo (isset($user_prefs->reply_leadin)) ? $user_prefs->reply_leadin : "" ?>" size="40"/>
           </td>
         </tr>
         <?php } ?>
         <tr>
           <td class="prefsLabel"><?php echo htmlentities($html_signature, ENT_COMPAT, 'UTF-8') ?> : </td>
           <td class="prefsData">
             <textarea class="button" name="signature" rows="5" cols="40"><?php echo (isset($user_prefs->signature)) ? $user_prefs->signature : "" ?></textarea>
           </td>
         </tr>
         <tr>
           <td class="prefsLabel">&nbsp;</td>
           <td class="prefsData">
             <input type="checkbox" name="sig_sep" id="sig_sep" value="on" <?php if(isset($user_prefs->sig_sep) && $user_prefs->sig_sep) echo 'checked="checked"'; ?> /><label for="sig_sep"><?php echo htmlentities($html_usenet_separator, ENT_COMPAT, 'UTF-8') ?></label>
           </td>
         </tr>
         <tr>
           <td class="prefsLabel">&nbsp;</td>
           <td class="prefsData">
             <input type="checkbox" name="graphical_smilies" id="graphical_smilies" value="on" <?php if (isset($user_prefs->graphical_smilies) && $user_prefs->graphical_smilies) echo 'checked="checked"'; ?> /><label for="graphical_smilies"><?php echo htmlentities($html_use_graphical_smilies, ENT_COMPAT, 'UTF-8') ?></label>
           </td>
         </tr>
         <?php if($pop->is_imap()) { ?>
         <tr>
           <td class="prefsLabel">&nbsp;</td>
           <td class="prefsData">
             <input type="checkbox" name="sent_folder" id="sent_folder" value="on" <?php if (isset($user_prefs->sent_folder) && $user_prefs->sent_folder) echo 'checked="checked"'; ?> /><label for="sent_folder"><?php echo htmlentities($html_sent_folder, ENT_COMPAT, 'UTF-8') ?></label> : 
             <select class="button" name="sent_folder_name"><?php echo join('', $select_list) ?></select>
           </td>
         </tr>
         <?php } ?>
         <tr>
           <td class="prefsLabel"><label for="lang"><?php echo $html_lang ?>:</label></td>
           <td class="prefsData">
             <select class="button" name="lang">
               <?php
                 for ($i = 0; $i < sizeof($lang_array); $i++)
                 if (file_exists('lang/'.$lang_array[$i]->filename.'.php'))
                 {
                   echo '<option value="'.$lang_array[$i]->filename.'"';
                   if ($_SESSION['nocc_lang'] == $lang_array[$i]->filename)
                     echo ' selected="selected"';
                   echo '>'.$lang_array[$i]->label.'</option>';
                 }
               ?>
             </select>
           </td>
         </tr>
         <?php if ($conf->use_theme == true) { ?>
         <tr>
           <td class="prefsLabel"><label for="theme"><?php echo $html_theme ?>:</label></td>
           <td class="prefsData">
             <select class="button" name="theme">
             <?php
               $handle = opendir('./themes');
               while (($file = readdir($handle)) != false)
               {
                 if (($file != '.') && ($file != '..'))
                 {
                   echo '<option value="'.$file.'"';
                   if ($file == $_SESSION['nocc_theme'])
                     echo ' selected="selected"';
                   echo '>'.$file.'</option>';
                 }
               }
               closedir($handle);
             ?>
             </select>
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
                   <td><?php echo htmlentities($html_error_occurred, ENT_COMPAT, 'UTF-8') ?></td>
                 </tr>
                 <tr class="errorText">
                   <td>
                     <p><?php echo htmlentities($ev->getMessage(), ENT_COMPAT, 'UTF-8'); ?></p>
                   </td>
                 </tr>
               </table>
             </div>
           <?php
             } else {
               if(isset($_REQUEST['submit_prefs']))
                 echo '<br />' . htmlentities($html_prefs_updated, ENT_COMPAT, 'UTF-8');
             }
           ?>
             <br /><br />
             <input type="submit" class="button" value="<?php echo htmlentities($html_submit, ENT_COMPAT, 'UTF-8') ?>" />
              &nbsp;&nbsp;
              <input type="reset" class="button" value="<?php echo htmlentities($html_cancel, ENT_COMPAT, 'UTF-8') ?>" />
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
   <a href="action.php?action=managefolders"><?php echo htmlentities($html_manage_folders_link, ENT_COMPAT, 'UTF-8') ?></a>
   &nbsp;|&nbsp;
   <a href="action.php?action=managefilters"><?php echo htmlentities($html_manage_filters_link, ENT_COMPAT, 'UTF-8') ?></a>
 </div>
   <?php
     }
   ?>
<!-- end of $Id: prefs.php,v 1.42 2006/09/05 14:26:52 goddess_skuld Exp $ -->
