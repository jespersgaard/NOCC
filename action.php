<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/action.php,v 1.138 2002/12/01 13:05:54 rossigee Exp $
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

// Act on 'action'
$action = '';
if(isset($_REQUEST['action']))
    $action = safestrip($_REQUEST['action']);
switch($action)
{
    case 'aff_mail':
        $pop = new nocc_imap($ev);
        if (Exception::isException($ev)) {
            require ('./html/header.php');
            require ('./html/error.php');
            require ('./html/footer.php');
            break;
        }

        $attach_tab = array();
        $content = aff_mail($pop, $attach_tab, $_REQUEST['mail'], $_REQUEST['verbose'], $ev);
        if (Exception::isException($ev)) {
            require ('./html/header.php');
            require ('./html/error.php');
            require ('./html/footer.php');
            break;
        }

        // Here we display the message
        require ('./html/header.php');
        require ('./html/menu_mail.php');
        require ('./html/html_mail_top.php');
        require ('./html/html_mail_header.php'); 
        while ($tmp = array_shift($attach_tab))
        {
            // $attach_tab is the array of attachments
            // If it's a text/plain, display it
            if ((!eregi('ATTACHMENT', $tmp['disposition'])) && $conf->display_text_attach && (eregi('text/plain', $tmp['mime'])))
                echo '<hr />'.view_part($pop, $mail, $tmp['number'], $tmp['transfer'], $tmp['charset'], $charset);
            if ($conf->display_img_attach && (eregi('image', $tmp['mime']) && ($tmp['number'] != '')))
            {
                // if it's an image, display it
                $img_type = array_pop(explode('/', $tmp['mime']));
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
        require ('./html/html_mail_bottom.php');
        require ('./html/menu_mail.php');
        require ('./html/footer.php');

        $pop->close();
        break;

    case 'logout':
        require_once './proxy.php';
        header("Location: ".$conf->base_url."logout.php");
        break;

    case 'write':
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
        if (Exception::isException($ev)) {
            require ('./html/header.php');
            require ('./html/error.php');
            require ('./html/footer.php');
            break;
        }

        $content = aff_mail($pop, $attach_tab, $_REQUEST['mail'], $_REQUEST['verbose'], $ev);
        if (Exception::isException($ev)) {
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
        if($user_prefs->outlook_quoting)
            $mail_body = $original_msg . "\n" . $html_from . ': ' . $content['from'] . "\n" . $html_to . ': ' . $content['to'] . "\n" . $html_sent.': ' . $content['complete_date'] . "\n" . $html_subject . ': '. $content['subject'] . "\n\n" . strip_tags($content['body'], '');
        else {
            if ($user_prefs->reply_leadin != '')
            {
                $parsed_leadin = NOCCUserPrefs::parseLeadin($user_prefs->reply_leadin, $content);
                $mail_body = mailquote(strip_tags($content['body'], ''), $parsed_leadin, '');
            }
            else
                $mail_body = mailquote(strip_tags($content['body'], ''), $content['from'], $html_wrote);
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
        if (Exception::isException($ev)) {
            require ('./html/header.php');
            require ('./html/error.php');
            require ('./html/footer.php');
            break;
        }

        $content = aff_mail($pop, $attach_tab, $_REQUEST['mail'], $_REQUEST['verbose'], $ev);
        if (Exception::isException($ev)) {
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
        if($user_prefs->outlook_quoting)
            $mail_body = $original_msg . "\n" . $html_from . ': ' . $content['from'] . "\n" . $html_to . ': ' . $content['to'] . "\n" . $html_sent.': ' . $content['complete_date'] . "\n" . $html_subject . ': '. $content['subject'] . "\n\n" . strip_tags2($content['body'], '');
        else
            $mail_body = mailquote(strip_tags2($content['body'], ''), $content['from'], $html_wrote);

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
        if (Exception::isException($ev)) {
            require ('./html/header.php');
            require ('./html/error.php');
            require ('./html/footer.php');
            break;
        }

        $content = aff_mail($pop, $attach_tab, $_REQUEST['mail'], $_REQUEST['verbose'], $ev);
        if (Exception::isException($ev)) {
            require ('./html/header.php');
            require ('./html/error.php');
            require ('./html/footer.php');
            break;
        }

        $mail_subject = $html_forward_short.': '.$content['subject'];
    
        // Add signature
        add_signature($mail_body);

        // Let send.php know to attach the original message
        $forward_msgnum = $_REQUEST['mail'];

        require ('./html/header.php');
        require ('./html/menu_inbox.php');
        require ('./html/send.php');
        require ('./html/menu_inbox.php');
        require ('./html/footer.php');

        $pop->close();
        break;

    case 'managefolders':
        $pop = new nocc_imap($ev);
        if (Exception::isException($ev)) {
            require ('./html/header.php');
            require ('./html/error.php');
            require ('./html/footer.php');
            break;
        }

        switch (trim($_REQUEST['do'])) {
            case 'create_folder':
                if ($_REQUEST['createnewbox']) {
                    $pop->createmailbox($createnewbox, $ev);
                    if(Exception::isException($ev)) break;
                    $pop->subscribe($createnewbox, $ev);
                    if(Exception::isException($ev)) break;
                }
                break;

            case 'subscribe_folder':
                if ($_REQUEST['subscribenewbox']) {
                    $pop->subscribe($_REQUEST['subscribenewbox'], $ev);
                    if(Exception::isException($ev)) break;
                }
                break;

            case 'remove_folder':
                if ($_REQUEST['removeoldbox']) {
                    // Don't want to remove, just unsubscribe.
                    //$pop->deletemailbox($removeoldbox, $ev);
                    //if(Exception::isException($ev)) break;
                    $pop->unsubscribe($_REQUEST['removeoldbox'], $ev);
                    if(Exception::isException($ev)) break;
                }
                break;

            case 'rename_folder':
                if ($_REQUEST['renamenewbox'] && $_REQUEST['renameoldbox']) {
                    $pop->renamemailbox($_REQUEST['renameoldbox'], $_REQUEST['renamenewbox'], $ev);
                    if(Exception::isException($ev)) break;
                    $pop->unsubscribe($_REQUEST['renameoldbox'], $ev);
                    if(Exception::isException($ev)) break;
                    $pop->subscribe($_REQUEST['renamenewbox'], $ev);
                    if(Exception::isException($ev)) break;
                }
                break;
        }

        require ('./html/header.php');
        require ('./html/menu_prefs.php');
        //require ('./html/prefs.php');
        if ($pop->is_imap())
            require ('./html/folders.php');
        require ('./html/menu_prefs.php');
        require ('./html/footer.php');

        $pop->close();

        break;

    case 'managefilters':
        $pop = new nocc_imap($ev);
		$user_key = $_SESSION['nocc_user'].'@'.$_SESSION['nocc_domain'];
        $filterset = NOCCUserFilters::read($user_key, $ev);

        if (Exception::isException($ev)) {
            require ('./html/header.php');
            require ('./html/error.php');
            require ('./html/footer.php');
            break;
        }

        switch (trim($_REQUEST['do'])) {
            case 'delete':
                if ($_REQUEST['filter']) {
                    unset($filterset->filterset[$_REQUEST['filter']]);
                    $filterset->dirty_flag = 1;
                    $filterset->commit();
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
                $filterset->commit();
                break;
        }

        $html_filter_select = $filterset->html_filter_select();
        $filter_move_to = $pop->html_folder_select('filter_move_box','');

        require ('./html/header.php');
        require ('./html/menu_prefs.php');
        //require ('./html/prefs.php');
        require ('./html/filter_prefs.php');
        require ('./html/footer.php');

        $pop->close();

        break;

    case 'setprefs':
        $pop = new nocc_imap($ev);
        if (Exception::isException($ev)) {
            require ('./html/header.php');
            require ('./html/error.php');
            require ('./html/footer.php');
            break;
        }

        if(isset($_REQUEST['submit_prefs'])) {
            if (isset($_REQUEST['full_name']))
                $user_prefs->full_name = stripslashes($_REQUEST['full_name']);
            if (isset($_REQUEST['msg_per_page']))
                $user_prefs->msg_per_page = $_REQUEST['msg_per_page'];
            if (isset($_REQUEST['email_address']))
                $user_prefs->email_address = $_REQUEST['email_address'];
            $user_prefs->cc_self = isset($_REQUEST['cc_self']);
            $user_prefs->hide_addresses = isset($_REQUEST['hide_addresses']);
            $user_prefs->outlook_quoting = isset($_REQUEST['outlook_quoting']);
            $user_prefs->seperate_msg_win = isset($_REQUEST['seperate_msg_win']);
            if (isset($_REQUEST['reply_leadin']))
                $user_prefs->reply_leadin = stripslashes($_REQUEST['reply_leadin']);
            if (isset($_REQUEST['signature']))
                $user_prefs->signature = stripslashes($_REQUEST['signature']);

            // Commit preferences
            $user_prefs->commit($ev);
            $_SESSION['nocc_user_prefs'] = $user_prefs;
        }

        require ('./html/header.php');
        require ('./html/menu_prefs.php');
        require ('./html/prefs.php');
        //if ($pop->is_imap())
        //    require ('./html/folders.php');
        require ('./html/menu_prefs.php');
        require ('./html/footer.php');

        $pop->close();

        break;

    default:
        $pop = new nocc_imap($ev);
        if (Exception::isException($ev)) {
            require ('./html/header.php');
            require ('./html/error.php');
            require ('./html/footer.php');
            break;
        }

        // We may need to apply some filters to the INBOX...  this is still a work in progress.
        if ($pop->is_imap()) {
            if ($pop->folder == 'INBOX') {
                $user_key = $_SESSION['nocc_user'].'@'.$_SESSION['nocc_domain'];
                $filters = NOCCUserFilters::read($user_key, $ev);

                $small_search = 'unseen ';
                if ($_REQUEST['reapply_filters'] == 1) {
                    $small_search = '';
                }

                
                foreach($filters->filterset as $name => $filter) {
                    $filter_messages = $pop->search($small_search . $filter['SEARCH']);
                    if (is_array($filter_messages)) {
                        $filter_to_folder = array();
                        foreach($filter_messages as $filt_msg_no) {
                            if ($filter['ACTION'] == 'DELETE') {
                                $pop->delete($filt_msg_no);
                            } elseif (preg_match("/^MOVE:(.+)$/", $filter['ACTION'], $filter_to_folder)) {
                                $pop->mail_move($filt_msg_no, $filter_to_folder[1]);
                            }
                        }
                    }
                }
                $pop->expunge();
            }
        }


        // If we get this far, consider ourselves logged in
        $_SESSION['nocc_loggedin'] = 1;

        // Fetch message list
        $tab_mail = array();
        $skip = 0;
        if(isset($_REQUEST['skip']))
                $skip = $_REQUEST['skip'];
        if ($pop->num_msg() > 0)
            $tab_mail = inbox($pop, $skip, $ev);

        if (Exception::isException($ev)) {
            require ('./html/header.php');
            require ('./html/error.php');
            require ('./html/footer.php');
            break;
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
        $num_msg = $pop->num_msg();
        require ('./html/header.php');
        require ('./html/menu_inbox.php');
        require ('./html/html_top_table.php');
        require ('./html/menu_inbox_opts.php');

        // Include this once for each line of the message index
        while ($tmp = array_shift($tab_mail)) {
            require ('./html/html_inbox.php');
        }

        $new_folders = array();
        $list_of_folders = "";

        // If we show it twice, the bottom folder select is sent, and might be wrong.
        if (($conf->status_line == 1) && $pop->is_imap()) {
            // gather list of folders for menu_inbox_status
            $subscribed = $pop->getsubscribed($ev);
            if (Exception::isException($ev)) {
                require ('./html/header.php');
                require ('./html/error.php');
                require ('./html/footer.php');
                break;
            }

            foreach($subscribed as $folder) {
                $folder_name = substr(strstr($folder->name, '}'), 1);
                $tmp_pop = imap_open($folder->name, $pop->login, $pop->passwd, 'OP_READONLY');
		
                $unseen_messages = imap_search($tmp_pop,'UNSEEN');

                imap_close($tmp_pop);
                
                if (!($unseen_messages == false) && count($unseen_messages) > 0) {
                    if (!in_array($folder_name, $new_folders)) {
                        $unseen_count = count($unseen_messages);
                        $list_of_folders .= ' <a href="'.$_SERVER['PHP_SELF'].'?folder='.$folder_name.'">'.$folder_name." ($unseen_count)".'</a>';
                        array_push($new_folders, $folder_name);
                    }
                }
            }
            require ('./html/menu_inbox_status.php');
        }

        require ('./html/html_bottom_table.php');
        require ('./html/menu_inbox.php');
        require ('./html/footer.php');

        $pop->close();

        break;
}

function add_signature(&$body) {
    $user_prefs = $_SESSION['nocc_user_prefs'];
    if($user_prefs->signature)
        $body .= "\r\n" . $user_prefs->signature;
}

?>
