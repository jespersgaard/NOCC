<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/action.php,v 1.188 2006/10/20 13:40:14 goddess_skuld Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 * Copyright 2002 Mike Rylander <mrylander@mail.com>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * This file is the main file of NOCC each function starts from here
 */

require_once './conf.php';
require_once './common.php';

// Remove any attachments from disk and from our session
clear_attachments();

// Reset exception vector
$ev = NULL;

$remember = '';
if(isset($_REQUEST['remember']))
    $remember = safestrip($_REQUEST['remember']);

// Refresh quota usage
if (!isset($_REQUEST['sort'])) {
  if (isset($_SESSION['quota_enable']) && $_SESSION['quota_enable'] == true) {
    $pop = new nocc_imap($ev);
    if (NoccException::isException($ev)) {
     require ('./html/header.php');
     require ('./html/error.php');
     require ('./html/footer.php');
     exit;
    }
    $quota = $pop->get_quota_usage($_SESSION['nocc_folder']);
    $_SESSION['quota'] = $quota;
  }
}

// Act on 'action'
$action = '';
if(isset($_REQUEST['action']))
    $action = safestrip($_REQUEST['action']);
switch($action)
{
    case 'aff_mail':
        $pop = new nocc_imap($ev);
        if (NoccException::isException($ev)) {
            require ('./html/header.php');
            require ('./html/error.php');
            require ('./html/footer.php');
            break;
        }

        $attach_tab = array();
        $content = aff_mail($pop, $attach_tab, $_REQUEST['mail'], $_REQUEST['verbose'], $ev);
	// Display or hide distant HTML images
	if (!isset($_REQUEST['display_images']) || $_REQUEST['display_images'] != 1) {
	  $content['body'] = eregi_replace('src="[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]"', 'src="none"', $content['body']);
	  $content['body'] = eregi_replace('src=[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]', 'src="none"', $content['body']);
        }
        // Display embedded HTML images
        $tmp_attach_tab = $attach_tab;
	$i = 0;
        while ($tmp = array_pop($tmp_attach_tab)) {
          if ($conf->display_img_attach && (eregi('image', $tmp['mime']) && ($tmp['number'] != '')))
          {
            $exploded = explode('/', $tmp['mime']);
            $img_type = array_pop($exploded);
            if (eregi('JPEG', $img_type) || eregi('JPG', $img_type) || eregi('GIF', $img_type) || eregi ('PNG', $img_type))
            {
              $new_img_src = 'src="get_img.php?mail=' . $_REQUEST['mail'].'&amp;num=' . $tmp['number'] . '&amp;mime=' . $img_type . '&amp;transfer=' . $tmp['transfer'] . '"';
              $img_id = str_replace('<', '', $tmp['id']);
              $img_id = str_replace('>', '', $img_id);
              $content['body'] = str_replace('src="cid:'.$img_id.'"', $new_img_src, $content['body']);
              $content['body'] = str_replace('src=cid:'.$img_id, $new_img_src, $content['body']);
            }
          }
        }
        if (NoccException::isException($ev)) {
            require ('./html/header.php');
            require ('./html/error.php');
            require ('./html/footer.php');
            break;
        }

        // Here we display the message
        require ('./html/header.php');
        require ('./html/menu_mail.php');
        require ('./html/html_mail.php');
        while ($tmp = array_pop($attach_tab))
        {
            // $attach_tab is the array of attachments
            // If it's a text/plain, display it
            if ((!eregi('ATTACHMENT', $tmp['disposition'])) && $conf->display_text_attach && (eregi('text/plain', $tmp['mime'])))
                echo '<hr />'.view_part($pop, $_REQUEST['mail'], $tmp['number'], $tmp['transfer'], $tmp['charset'], $charset);
            if ($conf->display_img_attach && (eregi('image', $tmp['mime']) && ($tmp['number'] != '')))
            {
                // if it's an image, display it
                $exploded = explode('/', $tmp['mime']);
                $img_type = array_pop($exploded);
                if (eregi('JPEG', $img_type) || eregi('JPG', $img_type) || eregi('GIF', $img_type) || eregi ('PNG', $img_type))
                {
                    echo '<hr />';
                    echo '<center>';
                    echo '<p>' . $html_loading_image . ' ' . $tmp['name'] . '...</p>';
                    echo '<img src="get_img.php?mail=' . $_REQUEST['mail'].'&amp;num=' . $tmp['number'] . '&amp;mime=' . $img_type . '&amp;transfer=' . $tmp['transfer'] . '" />';
                    echo '</center>';
                }
            }
        } 
        require ('./html/menu_mail.php');
        require ('./html/footer.php');

        $pop->close();
        break;

    case 'logout':
        require_once './proxy.php';
        header("Location: ".$conf->base_url."logout.php");
        break;

    case 'write':
        $_SESSION['html_mail_send'] = $user_prefs->html_mail_send;

    	if (isset($_REQUEST['mail_to']) && $_REQUEST['mail_to'] != "") {
	  $mail_to = $_REQUEST['mail_to'];
	}
        $pop = new nocc_imap($ev);
        if (NoccException::isException($ev)) {
	    require ('./html/header.php');
	    require ('./html/error.php');
	    require ('./html/footer.php');
	    exit;
	}
	$pop->close();
        // Add signature
        add_signature($mail_body);

        require ('./html/header.php');
        require ('./html/menu_inbox.php');
        require ('./html/send.php');
        require ('./html/menu_inbox.php');
        require ('./html/footer.php');
        break;

    case 'reply':
        $attach_tab = array();
        if(!isset($_REQUEST['verbose']))
            $_REQUEST['verbose'] = 0;

        $pop = new nocc_imap($ev);
        if (NoccException::isException($ev)) {
            require ('./html/header.php');
            require ('./html/error.php');
            require ('./html/footer.php');
            break;
        }

        $content = aff_mail($pop, $attach_tab, $_REQUEST['mail'], $_REQUEST['verbose'], $ev);
        if (NoccException::isException($ev)) {
            require ('./html/header.php');
            require ('./html/error.php');
            require ('./html/footer.php');
            break;
        }

        $mail_to = !empty($content['reply_to']) ? $content['reply_to'] : $content['from'];
        // Test for Re: in subject, should not be added twice ! 
        if (!strcasecmp(substr($content['subject'], 0, 2), $html_reply_short))
            $mail_subject = $content['subject'];
        else
            $mail_subject = $html_reply_short.': '.$content['subject'];

        // Set body
        if(isset($user_prefs->outlook_quoting) && $user_prefs->outlook_quoting)
            $mail_body = $original_msg . "\n" . $html_from . ': ' . $content['from'] . "\n" . $html_to . ': ' . $content['to'] . "\n" . $html_sent.': ' . $content['complete_date'] . "\n" . $html_subject . ': '. $content['subject'] . "\n\n" . enh_html_entity_decode(strip_tags($content['body'], ''));
        else {
            if (isset($conf->enable_reply_leadin) && $conf->enable_reply_leadin == true && isset($user_prefs->reply_leadin) && ($user_prefs->reply_leadin != ''))
            {
                $parsed_leadin = NOCCUserPrefs::parseLeadin($user_prefs->reply_leadin, $content);
                $mail_body = mailquote(enh_html_entity_decode(strip_tags($content['body'], '')), $parsed_leadin, '');
            }
            else
            {
                $stripped_content = enh_html_entity_decode(strip_tags($content['body'], ''));
                $mail_body = mailquote($stripped_content, $content['from'], $html_wrote);
            }
        }

        // Add signature
        add_signature($mail_body);

        // We add the attachments of the original message
        require ('./html/header.php');
        require ('./html/menu_inbox.php');
        require ('./html/send.php');
        require ('./html/menu_inbox.php');
        require ('./html/footer.php');

        $pop->close();
        break;

    case 'reply_all':
        $attach_tab = array();
        if(!isset($_REQUEST['verbose']))
            $_REQUEST['verbose'] = 0;

        $pop = new nocc_imap($ev);
        if (NoccException::isException($ev)) {
            require ('./html/header.php');
            require ('./html/error.php');
            require ('./html/footer.php');
            break;
        }

        $content = aff_mail($pop, $attach_tab, $_REQUEST['mail'], $_REQUEST['verbose'], $ev);
        if (NoccException::isException($ev)) {
            require ('./html/header.php');
            require ('./html/error.php');
            require ('./html/footer.php');
            break;
        }

        $mail_to = get_reply_all($content['from'], $content['to'], $content['cc']);
        if (!strcasecmp(substr($content['subject'], 0, 2), $html_reply_short))
            $mail_subject = $content['subject'];
        else
            $mail_subject = $html_reply_short.': '.$content['subject'];

        // Set body
        if(isset($user_prefs->outlook_quoting) && $user_prefs->outlook_quoting)
            $mail_body = $original_msg . "\n" . $html_from . ': ' . $content['from'] . "\n" . $html_to . ': ' . $content['to'] . "\n" . $html_sent.': ' . $content['complete_date'] . "\n" . $html_subject . ': '. $content['subject'] . "\n\n" . enh_html_entity_decode(strip_tags($content['body'], ''));
        else {
            if (isset($conf->enable_reply_leadin) && $conf->enable_reply_leadin == true && isset($user_prefs->reply_leadin) && ($user_prefs->reply_leadin != ''))
            {
                $parsed_leadin = NOCCUserPrefs::parseLeadin($user_prefs->reply_leadin, $content);
                $mail_body = mailquote(enh_html_entity_decode(strip_tags($content['body'], '')), $parsed_leadin, '');
            }
            else
            {
                $stripped_content = enh_html_entity_decode(strip_tags($content['body'], ''));
                $mail_body = mailquote($stripped_content, $content['from'], $html_wrote);
            }
        }

        // Add signature
        add_signature($mail_body);

        // We add the attachments of the original message
        require ('./html/header.php');
        require ('./html/menu_inbox.php');
        require ('./html/send.php');
        require ('./html/menu_inbox.php');
        require ('./html/footer.php');

        $pop->close();
        break;

    case 'forward':
        $attach_tab = array();
        if(!isset($_REQUEST['verbose']))
            $_REQUEST['verbose'] = 0;
        $pop = new nocc_imap($ev);
        if (NoccException::isException($ev)) {
            require ('./html/header.php');
            require ('./html/error.php');
            require ('./html/footer.php');
            break;
        }

        $mail_list = explode('$', $_REQUEST['mail']);
        $mail_body = '';
        for ($mail_num = 0; $mail_num < count($mail_list); $mail_num++) {
          //$content = aff_mail($pop, $attach_tab, $_REQUEST['mail'], $_REQUEST['verbose'], $ev);
          $content = aff_mail($pop, $attach_tab, $mail_list[$mail_num], $_REQUEST['verbose'], $ev);
          if (NoccException::isException($ev)) {
            require ('./html/header.php');
            require ('./html/error.php');
            require ('./html/footer.php');
            break;
          }

          if (count($mail_list) == 1) {
            $mail_subject = $html_forward_short.': '.$content['subject'];
          } else {
            $mail_subject = '';
          }

          if (isset($conf->broken_forwarding) && $conf->broken_forwarding) {
            // Set body
            if(isset($user_prefs->outlook_quoting) && $user_prefs->outlook_quoting)
                $mail_body .= $original_msg . $conf->crlf . $html_from . ': ' . $content['from'] . $conf->crlf . $html_to . ': ' . $content['to'] . $conf->crlf . $html_sent.': ' . $content['complete_date'] . $conf->crlf . $html_subject . ': '. $content['subject'] . $conf->crlf . $conf->crlf . strip_tags2($content['body'], '') . $conf->crlf . $conf->crlf;
            else {
              $stripped_content = strip_tags2($content['body'], '');
              $mail_body .= mailquote($stripped_content, $content['from'], $html_wrote) . $conf->crlf . $conf->crlf;
            }
            $broken_forwarding = true;
          } else {
            $broken_forwarding = false;
          }
        }
        // Let send.php know to attach the original message
        $forward_msgnum = $_REQUEST['mail'];

        // Add signature
        add_signature($mail_body);

        require ('./html/header.php');
        require ('./html/menu_inbox.php');
        require ('./html/send.php');
        require ('./html/menu_inbox.php');
        require ('./html/footer.php');

        $pop->close();
        break;

    case 'managefolders':
        $pop = new nocc_imap($ev);
        if (NoccException::isException($ev)) {
            require ('./html/header.php');
            require ('./html/error.php');
            require ('./html/footer.php');
            break;
        }

	$do = "";
	if(isset($_REQUEST['do']))
		$do = trim(safestrip($_REQUEST['do']));
        switch ($do) {
            case 'create_folder':
                if ($_REQUEST['createnewbox']) {
                    $pop->createmailbox($_REQUEST['createnewbox'], $ev);
                    if(NoccException::isException($ev)) break;
                    $pop->subscribe($_REQUEST['createnewbox'], $ev, true);
                    if(NoccException::isException($ev)) break;
                }
                break;

            case 'subscribe_folder':
                if ($_REQUEST['subscribenewbox']) {
                    $pop->subscribe($_REQUEST['subscribenewbox'], $ev, false);
                    if(NoccException::isException($ev)) break;
                }
                break;

            case 'remove_folder':
                if ($_REQUEST['removeoldbox']) {
                    // Don't want to remove, just unsubscribe.
                    //$pop->deletemailbox($removeoldbox, $ev);
                    //if(NoccException::isException($ev)) break ;
                    $pop->unsubscribe($_REQUEST['removeoldbox'], $ev);
                    if(NoccException::isException($ev)) break;
                }
                break;

            case 'rename_folder':
                if ($_REQUEST['renamenewbox'] && $_REQUEST['renameoldbox']) {
                    $pop->renamemailbox($_REQUEST['renameoldbox'], $_REQUEST['renamenewbox'], $ev);
                    if(NoccException::isException($ev)) break;
                    $pop->unsubscribe($_REQUEST['renameoldbox'], $ev);
                    if(NoccException::isException($ev)) break;
                    $pop->subscribe($_REQUEST['renamenewbox'], $ev, true);
                    if(NoccException::isException($ev)) break;
                }
                break;
            
            case 'delete_folder':
                if ($_REQUEST['deletebox']) {
                    $pop->unsubscribe($_REQUEST['deletebox'], $ev);
                    if(NoccException::isException($ev)) break;
                    $pop->deletemailbox($_REQUEST['deletebox'], $ev);
                    if(NoccException::isException($ev)) break;
                }
                break;

        }

        require ('./html/header.php');
        require ('./html/menu_prefs.php');
        if ($pop->is_imap())
            require ('./html/folders.php');
        require ('./html/menu_prefs.php');
        require ('./html/footer.php');

        $pop->close();

        break;

    case 'managefilters':
        $pop = new nocc_imap($ev);
        if (NoccException::isException($ev)) {
	    require ('./html/header.php');
	    require ('./html/error.php');
	    require ('./html/footer.php');
            exit;
        }
	$user_key = $_SESSION['nocc_user'].'@'.$_SESSION['nocc_domain'];
        $filterset = NOCCUserFilters::read($user_key, $ev);

        if (NoccException::isException($ev)) {
            require ('./html/header.php');
            require ('./html/error.php');
            require ('./html/footer.php');
            break;
        }

        if (isset($_REQUEST['do'])) {
            switch (trim($_REQUEST['do'])) {
                case 'delete':
                    if ($_REQUEST['filter']) {
                        unset($filterset->filterset[$_REQUEST['filter']]);
                        $filterset->dirty_flag = 1;
                        $filterset->commit($ev);
                        if (NoccException::isException($ev)) {
                            require ('./html/header.php');
                            require ('./html/error.php');
                            require ('./html/footer.php');
                            break;
                        }
                    }
                    break;
    
                case 'create':
                    if (!$_REQUEST['filtername']) {
                        break;
                    }

                    if ($_REQUEST['thing1'] == '-') {
                        break;
                    } else {
                        $filterset->filterset[$_REQUEST['filtername']]['SEARCH'] = 
                            $_REQUEST['thing1'] . ' "'. $_REQUEST['contains1'] . '"';
                    }
            
                    if ($_REQUEST['thing2'] != '-') {
                        $filterset->filterset[$_REQUEST['filtername']]['SEARCH'] .= 
                            ' ' . $_REQUEST['thing2'] . ' "'. $_REQUEST['contains2'] . '"';
                    }

                    if ($_REQUEST['thing3'] != '-') {
                        $filterset->filterset[$_REQUEST['filtername']]['SEARCH'] .= 
                            ' ' . $_REQUEST['thing3'] . ' "'. $_REQUEST['contains3'] . '"';
                    }
                
                    if ($_REQUEST['filter_action'] == 'DELETE') {
                        $filterset->filterset[$_REQUEST['filtername']]['ACTION'] = 'DELETE';
                    } elseif ($_REQUEST['filter_action'] == 'MOVE') {
                        $filterset->filterset[$_REQUEST['filtername']]['ACTION'] = 'MOVE:'. $_REQUEST['filter_move_box'];
                    } else {
                        break;
                    }
                
                    $filterset->dirty_flag = 1;
                    $filterset->commit($ev);
                    if (NoccException::isException($ev)) {
                        require ('./html/header.php');
                        require ('./html/error.php');
                        require ('./html/footer.php');
                        break;
                    }
                    break;
            }
        }
        $html_filter_select = $filterset->html_filter_select();
        $filter_move_to = $pop->html_folder_select('filter_move_box','');

        require ('./html/header.php');
        require ('./html/menu_prefs.php');
        require ('./html/filter_prefs.php');
        require ('./html/menu_prefs.php');
        require ('./html/footer.php');

        $pop->close();

        break;

    case 'setprefs':
        $pop = new nocc_imap($ev);
        if (NoccException::isException($ev)) {
            require ('./html/header.php');
            require ('./html/error.php');
            require ('./html/footer.php');
            break;
        }

        if(isset($_REQUEST['submit_prefs'])) {
            if (isset($_REQUEST['full_name']))
                $user_prefs->full_name = safestrip($_REQUEST['full_name']);
            if (isset($_REQUEST['msg_per_page']))
                $user_prefs->msg_per_page = $_REQUEST['msg_per_page'];
            if (isset($_REQUEST['email_address']))
                $user_prefs->email_address = safestrip($_REQUEST['email_address']);
            $user_prefs->cc_self = isset($_REQUEST['cc_self']);
            $user_prefs->hide_addresses = isset($_REQUEST['hide_addresses']);
            $user_prefs->outlook_quoting = isset($_REQUEST['outlook_quoting']);
            $user_prefs->colored_quotes = isset($_REQUEST['colored_quotes']);
            $user_prefs->display_struct = isset($_REQUEST['display_struct']);
            $user_prefs->seperate_msg_win = isset($_REQUEST['seperate_msg_win']);
            if (isset($_REQUEST['reply_leadin']))
                $user_prefs->reply_leadin = safestrip($_REQUEST['reply_leadin']);
            if (isset($_REQUEST['signature']))
                if (isset($_REQUEST['html_mail_send']) && $_REQUEST['html_mail_send']) {
                  $user_prefs->signature = $_REQUEST['signature'];
                } else {
                  $user_prefs->signature = safestrip($_REQUEST['signature']);
                }
	    if (isset($_REQUEST['wrap_msg']))
                $user_prefs->wrap_msg = $_REQUEST['wrap_msg'];
            $user_prefs->sig_sep = isset($_REQUEST['sig_sep']);
            $user_prefs->html_mail_send = isset($_REQUEST['html_mail_send']);
	    $user_prefs->graphical_smilies = isset($_REQUEST['graphical_smilies']);
            $user_prefs->sent_folder = isset($_REQUEST['sent_folder']);
            if (isset($_REQUEST['sent_folder_name'])) {
                $replace = str_replace($_SESSION['imap_namespace'], "", $_REQUEST['sent_folder_name']);
                $user_prefs->sent_folder_name = safestrip($replace);
            }
            if (isset($_REQUEST['lang']))
              $user_prefs->lang = $_REQUEST['lang'];
            if (isset($_REQUEST['theme']))
              $user_prefs->theme = $_REQUEST['theme'];

            // Commit preferences
            $user_prefs->commit($ev);
	    if (NoccException::isException($ev)) {
	       require ('./html/header.php'); 
	       require ('./html/error.php');
	       require ('./html/footer.php');
	    break;      
								            }               

            $_SESSION['nocc_user_prefs'] = $user_prefs;
        }

        require ('./html/header.php');
        require ('./html/menu_prefs.php');
        require ('./html/prefs.php');
        require ('./html/menu_prefs.php');
        require ('./html/footer.php');

        $pop->close();

        break;

    default:
        $pop = new nocc_imap($ev);

        if (NoccException::isException($ev)) {
	  if ($action == 'login' || $action == 'cookie') {
	    session_name("NOCCSESSID");
	    $_SESSION["nocc_login"] = "";
	    $_SESSION["nocc_user_prefs"] = "";
	    session_destroy();
	    setcookie ("NoccIdent");
	  }
          require ('./html/header.php');
          require ('./html/error.php');
          require ('./html/footer.php');
          break;
        }
        if ($action == 'login') {
          // Subscribe to INBOX, usefull if it's not already done.
          if($pop->is_imap()) {
            $pop->subscribe($pop->folder, $ev, false);
          }
          // If needed, store a cookie with all needed parameters
          if ($remember == "true") {
            saveSession($ev);
            if (NoccException::isException($ev)) {
              require ('./html/header.php');
              require ('./html/error.php');
              require ('./html/footer.php');
              break;
            }              
            //store cookie for thirty days
            setcookie ('NoccIdent', $_SESSION['nocc_user'].'@'.$_SESSION['nocc_domain'], time()+60*60*24*30);
          }
        }

        // We may need to apply some filters to the INBOX...  this is still a work in progress.
        if (!isset($_REQUEST['sort'])) {
          if ($pop->is_imap()) {
            if ($pop->folder == 'INBOX') {
              $user_key = $_SESSION['nocc_user'].'@'.$_SESSION['nocc_domain'];
              if (!empty($conf->prefs_dir)) {
                $filters = NOCCUserFilters::read($user_key, $ev);
                if(NoccException::isException($ev)) {
                  error_log("Error reading filters for user '$user_key': ".$ev->getMessage());
                  $filters = NULL;
                  $ev = NULL;
                }

                $small_search = 'unseen ';
                if (isset($_REQUEST['reapply_filters']) && $_REQUEST['reapply_filters'] == 1) {
                  $small_search = '';
                }
                if ($filters!=null) {
                  foreach($filters->filterset as $name => $filter) {
                    $filter_messages = $pop->search($small_search . $filter['SEARCH'],'',$ev);
                    if (is_array($filter_messages)) {
                      $filter_to_folder = array();
                      foreach($filter_messages as $filt_msg_no) {
                        if ($filter['ACTION'] == 'DELETE') {
                          $pop->delete($filt_msg_no, $ev);
                        } elseif (preg_match("/^MOVE:(.+)$/", $filter['ACTION'], $filter_to_folder)) {
                          $pop->mail_move($filt_msg_no, $filter_to_folder[1], $ev);
                        }
                      }
                    }
                  }
		}
              }
              $pop->expunge($ev);
              if(NoccException::isException($ev)) {
                error_log("Error expunging mail for user '$user_key': ".$ev->getMessage());
                $ev = NULL;
              }
            }
          }
        }


        // If we get this far, consider ourselves logged in
        $_SESSION['nocc_loggedin'] = 1;

        // Fetch message list
        $tab_mail = array();
        $skip = 0;
        if (isset($_REQUEST['skip']))
          $skip = $_REQUEST['skip'];
        if ($pop->num_msg() > 0)
          $tab_mail = inbox($pop, $skip, $ev);

        if (NoccException::isException($ev)) {
          require ('./html/header.php');
          require ('./html/error.php');
          require ('./html/footer.php');
          break;
        } else {
          $_SESSION['tab_mail'] = $tab_mail;
        }

        if(count($tab_mail) < 1) {
          // the mailbox is empty
          $num_msg = 0;
          require ('./html/header.php');
          require ('./html/menu_inbox.php');
          require ('./html/html_top_table.php');
          include ('./html/no_mail.php');
          require ('./html/html_bottom_table.php');
          require ('./html/menu_inbox.php');
          require ('./html/footer.php');
          break;
        }

        // there are messages, we display
        if (isset($_REQUEST['sort'])) {
          $num_msg = $_SESSION['num_msg'];
        } else {
          $num_msg = $pop->num_msg();
          $_SESSION['num_msg'] = $num_msg;
        }
        require ('./html/header.php');
        require ('./html/menu_inbox.php');
        require ('./html/html_top_table.php');

        // Include this once for each line of the message index
        while ($tmp = array_shift($tab_mail)) {
          require ('./html/html_inbox.php');
        }

        $new_folders = array();
        $list_of_folders = "";

        // If we show it twice, the bottom folder select is sent, and might be wrong.
        if (($conf->status_line == 1) && $pop->is_imap()) {
          if (isset($_REQUEST['sort'])) {
            $subscribed = $_SESSION['subscribed'];
          } else {
            // gather list of folders for menu_inbox_status
            $subscribed = $pop->getsubscribed($ev);
            if (NoccException::isException($ev)) {
              require ('./html/header.php');
              require ('./html/error.php');
              require ('./html/footer.php');
              break;
            } else {
              $_SESSION['subscribed'] = $subscribed;
            }
          }

          foreach($subscribed as $folder) {
            if (isset($_REQUEST['sort'])) {
              $list_of_folders =  $_SESSION['list_of_folders'];
            } else {
              $folder_name = substr(strstr($folder->name, '}'), 1);
              $tmp_pop = imap_open($folder->name, $pop->login, $pop->passwd, 'OP_READONLY');

              $unseen_messages = imap_search($tmp_pop,'UNSEEN');

              imap_close($tmp_pop);
                
              if (!($unseen_messages == false) && count($unseen_messages) > 0) {
                if (!in_array($folder_name, $new_folders)) {
                  $unseen_count = count($unseen_messages);
                  $list_of_folders .= ' <a href="'.$_SERVER['PHP_SELF'].'?folder='.$folder_name.'">'.$folder_name." ($unseen_count)".'</a>';
                  $_SESSION['list_of_folders'] = $list_of_folders;
                  array_push($new_folders, $folder_name);
                }
              }
            }
          }
          require ('./html/menu_inbox_status.php');
        }

        require ('./html/html_bottom_table.php');
        require ('./html/menu_inbox.php');
        require ('./html/footer.php');

        // As sort action only works on cached list of mails and folders
        // we don't have to close a never opened connection.
        //if (!isset($_REQUEST['sort'])) {
          $pop->close();
        //}

        break;
}

function add_signature(&$body) {
    $user_prefs = $_SESSION['nocc_user_prefs'];
    if(isset($user_prefs->signature))
    {
		// Add signature with separation if needed
		if(isset($user_prefs->sig_sep) && $user_prefs->sig_sep)
			$body .= "\r\n\r\n"."-- \r\n".$user_prefs->signature;
		else
			$body .= "\r\n\r\n".$user_prefs->signature;
    }

}

?>
