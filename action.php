<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/action.php,v 1.130 2002/05/30 12:48:44 rossigee Exp $
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
require_once './prefs.php';

// Remove any attachments from disk and from our session
clear_attachments();

// Get connection settings from session in case we need to
// create a connection
$servr = $_SESSION['nocc_servr'];
$folder = $_SESSION['nocc_folder'];
$login = $_SESSION['nocc_login'];
$passwd = $_SESSION['nocc_passwd'];

// Act on 'action'
$action = '';
if(isset($_REQUEST['action']))
    $action = safestrip($_REQUEST['action']);
switch($action)
{
    case 'aff_mail':
        $attach_tab = array();
        $content = aff_mail($attach_tab, $_REQUEST['mail'], $_REQUEST['verbose'], $ev);
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
            if ((!eregi('ATTACHMENT', $tmp['disposition'])) && $display_text_attach && (eregi('text/plain', $tmp['mime'])))
                echo '<hr />'.view_part($mail, $tmp['number'], $tmp['transfer'], $tmp['charset'], $charset);
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
        $content = aff_mail($attach_tab, $_REQUEST['mail'], $_REQUEST['verbose'], $ev);
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
        $outlook_quoting = getPref('outlook_quoting');
        if($outlook_quoting)
            $mail_body = $original_msg . "\n" . $html_from . ': ' . $content['from'] . "\n" . $html_to . ': ' . $content['to'] . "\n" . $html_sent.': ' . $content['complete_date'] . "\n" . $html_subject . ': '. $content['subject'] . "\n\n" . strip_tags($content['body'], '');
        else {
            $prefs_reply_leadin = getPref('leadin');
            if ($prefs_reply_leadin != '')
            {
                $parsed_leadin = parseLeadin($prefs_reply_leadin, $content);
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
        break;

    case 'reply_all':
        $attach_tab = array();
	if(!isset($_REQUEST['verbose']))
            $_REQUEST['verbose'] = 0;
        $content = aff_mail($attach_tab, $_REQUEST['mail'], $_REQUEST['verbose'], $ev);
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
        $outlook_quoting = getPref('outlook_quoting');
        if($outlook_quoting)
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
        break;

    case 'forward':
        $attach_tab = array();
	if(!isset($_REQUEST['verbose']))
            $_REQUEST['verbose'] = 0;
        $content = aff_mail($attach_tab, $_REQUEST['mail'], $_REQUEST['verbose'], $ev);
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
        break;

    case 'managefolders':
        $pop = new nocc_imap($servr, $folder, $login, $passwd, 0, $ev);
        if (Exception::isException($ev)) {
            require ('./html/header.php');
            require ('./html/error.php');
            require ('./html/footer.php');
            break;
        }

        switch (trim($do)) {
            case 'create_folder':
                if ($createnewbox) {
                    if (!($pop->createmailbox($createnewbox))) {
                        $html_folders_updated = $html_folders_create_failed;
                        break;
                    }
                    if (!($pop->subscribe($createnewbox))) {
                        $html_folders_updated = $html_folders_sub_failed;
                        break;
                    }
                }
                break;

            case 'subscribe_folder':
                if ($subscribenewbox) {
                    if (!($pop->subscribe($subscribenewbox))) {
                        $html_folders_updated = $html_folders_sub_failed;
                        break;
                    }
                }
                break;

            case 'remove_folder':
                if ($removeoldbox) {
                    // Don't want to remove, just unsubscribe.
                    //if (!($pop->deletemailbox($removeoldbox))) {
                    //    $html_folders_updated = $html_folders_unsub_failed;
                    //    break;
                    //}
                    if (!($pop->unsubscribe($removeoldbox))) {
                        $html_folders_updated = $html_folders_unsub_failed;
                        break;
                    }
                }
                break;

            case 'rename_folder':
                if ($renamenewbox && $renameoldbox) {
                    if (!($pop->renamemailbox($renameoldbox, $renamenewbox))) {
                        $html_folders_updated = $html_folders_rename_failed;
                        break;
                    }
                    if (!($pop->unsubscribe($renameoldbox))) {
                        $html_folders_updated = $html_folders_unsub_failed;
                        break;
                    }
                    if (!($pop->subscribe($renamenewbox))) {
                        $html_folders_updated = $html_folders_sub_failed;
                        break;
                    }
                }
                break;
        }

        // Handle an errors that occurred
        if (Exception::isException($lastev)) {
            $ev = $lastev;
            require ('./html/header.php');
            require ('./html/error.php');
            require ('./html/footer.php');
            break;
        }

        require ('./html/header.php');
        require ('./html/menu_prefs.php');
        require ('./html/prefs.php');
        require ('./html/folders.php');
        require ('./html/menu_prefs.php');
        require ('./html/footer.php');

        $pop->close();

        break;

    case 'setprefs':
        $pop = new nocc_imap($servr, $folder, $login, $passwd, 0, $ev);
        if (Exception::isException($ev)) {
            require ('./html/header.php');
            require ('./html/error.php');
            require ('./html/footer.php');
            break;
        }

        if(isset($_REQUEST['submit_prefs']))
        {
            $lastev = '';

            // Full name
            if (!$lastev && isset($_REQUEST['full_name'])) {
                $ev = setPref('full_name', stripslashes($_REQUEST['full_name']));
                if(Exception::isException($ev))
                    $lastev = $ev;
            }

            // Messages per page
            if (!$lastev && isset($_REQUEST['msg_per_page'])) {
                $ev = setPref('msg_per_page', $_REQUEST['msg_per_page']);
                if(Exception::isException($ev))
                    $lastev = $ev;
            }

            // Email address
            if (!$lastev && isset($_REQUEST['email_address'])) {
                if(valid_email($_REQUEST['email_address'])) {
                    $ev = setPref('email_address', $_REQUEST['email_address']);
                    if(Exception::isException($ev))
                        $lastev = $ev;
                }
                else
                    $lastev = new Exception("Invalid e-mail address (".$_REQUEST['email_address'].")");
            }

            // CC Self
            if (!$lastev)
                if(isset($_REQUEST['cc_self'])) {
                    $ev = setPref('cc_self', 'Y');
                    if(Exception::isException($ev))
                        $lastev = $ev;
                }
                else {
                    $ev = setPref('cc_self', '');
                    if(Exception::isException($ev))
                        $lastev = $ev;
                }

            // Hide Addresses
            if (!$lastev)
                if(isset($_REQUEST['hide_addresses'])) {
                    $ev = setPref('hide_addresses', 'Y');
                    if(Exception::isException($ev))
                        $lastev = $ev;
                }
                else {
                    $ev = setPref('hide_addresses', '');
                    if(Exception::isException($ev))
                        $lastev = $ev;
                }

            // Outlook-style quoting
            if (!$lastev)
                if(isset($_REQUEST['outlook_quoting'])) {
                    $ev = setPref('outlook_quoting', 'Y');
                    if(Exception::isException($ev))
                        $lastev = $ev;
                }
                else {
                    $ev = setPref('outlook_quoting', '');
                    if(Exception::isException($ev))
                        $lastev = $ev;
                }

            // Reply lead-in
            if (!$lastev)
                if(isset($_REQUEST['reply_leadin'])) {
                    $ev = setPref('leadin', $reply_leadin);
                    if(Exception::isException($ev))
                        $lastev = $ev;
                }

            // Signature
            if (!$lastev)
                if(isset($_REQUEST['signature'])) {
                    $ev = setPref('signature', stripslashes($_REQUEST['signature']));
                    if(Exception::isException($ev))
                        $lastev = $ev;
                }

/*
            if (!$lastev && $signature != "") {
                $ev = setSig($signature);
                if(Exception::isException($ev))
                    $lastev = $ev;
            }
*/

            // Handle an errors that occurred
            if (Exception::isException($lastev))
                $ev = $lastev;
        }

        require ('./html/header.php');
        require ('./html/menu_prefs.php');
        require ('./html/prefs.php');
        if ($pop->is_imap()) {
            require ('./html/folders.php');
        }
        require ('./html/menu_prefs.php');
        require ('./html/footer.php');

        $pop->close();

        break;

    default:
        $pop = new nocc_imap($servr, $folder, $login, $passwd, 0, $ev);
        if (Exception::isException($ev)) {
            require ('./html/header.php');
            require ('./html/error.php');
            require ('./html/footer.php');
            break;
        }

        // If we get this far, consider ourselves logged in
        $_SESSION['nocc_loggedin'] = 1;

        // Should we present folder options?
        $is_imap = $pop->is_imap();

        // Fetch message list
        $tab_mail = 0;
        $skip = 0;
        if(isset($_REQUEST['skip']))
                $skip = $_REQUEST['skip'];
        if ($pop->num_msg() > 0)
            $tab_mail = inbox($pop, $skip);

        switch ($tab_mail)
        {
            case 0:
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
            default:
                // there are messages, we display
                $num_msg = $pop->num_msg();
                require ('./html/header.php');
                require ('./html/menu_inbox.php');
                require ('./html/html_top_table.php');
                require ('./html/menu_inbox_opts.php');
                while ($tmp = array_shift($tab_mail)) {
                    require ('./html/html_inbox.php');
                }
                // If we show it twice, the bottom folder select is sent, and might be wrong.
                //require ('./html/menu_inbox_opts.php');
                if ($is_imap && ($conf->status_line == 1)) {
                    require ('./html/menu_inbox_status.php');
                }
                require ('./html/html_bottom_table.php');
                require ('./html/menu_inbox.php');
                require ('./html/footer.php');
                break;
        }

        $pop->close();

        break;
}

function add_signature(&$body) {
    $prefs_signature = getPref('signature');
    if(!empty($prefs_signature))
        $body .= "\r\n" . $prefs_signature;
}

?>
