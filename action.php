<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/action.php,v 1.110 2002/04/19 14:39:28 rossigee Exp $
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

if(!isset($_SESSION['loggedin']))
    $action = '';

// Get preferences
$prefs_full_name = getPref('full_name');
$prefs_email_address = getPref('email_address');
$prefs_reply_leadin = getPref('leadin');
$prefs_signature = getPref('signature');

// [Remove in NOCC-1.0] Check for signature file, and convert to
// signature preference if found.
if(!$prefs_signature) {
    $prefs_signature = getSig();
    if($prefs_signature) {
        setPref('signature', $prefs_signature);
        deleteSig();
    }
}

// Default e-mail address on send form
if($prefs_email_address != '')
    $mail_from = $prefs_email_address;
else
    $mail_from = $_SESSION['user']. '@' . $_SESSION['domain'];
if($prefs_full_name != '')
    $mail_from = $prefs_full_name . ' <' . $mail_from . '>';

if(!isset($action))
    $action = '';

switch (trim($action))
{
    case 'aff_mail':
        $content = aff_mail($mail, $verbose, $ev);
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
                    echo '<img src="get_img.php?mail=' . $mail.'&amp;num=' . $tmp['number'] . '&amp;mime=' . $img_type . '&amp;transfer=' . $tmp['transfer'] . '" />';
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
        $mail_body = "\r\n".$prefs_signature;

        $num_attach = 0;
        require ('./html/header.php');
        require ('./html/menu_inbox.php');
        require ('./html/send.php');
        require ('./html/menu_inbox.php');
        require ('./html/footer.php');
        break;

    case 'reply':    
        $content = aff_mail($mail, 0, $ev);
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
        else
            if ($prefs_reply_leadin)
            {
                $parsed_leadin = parseLeadin($prefs_reply_leadin, $content);
                $mail_body = mailquote(strip_tags($content['body'], ''), $parsed_leadin, '');
            }
            else
                $mail_body = mailquote(strip_tags($content['body'], ''), $content['from'], $html_wrote);

        // Add signature
        $mail_body .= "\r\n\r\n" . $prefs_signature;

        // We add the attachments of the original message
        //list($num_attach, $attach_array) = save_attachment($mail, $tmpdir);
        require ('./html/header.php');
        require ('./html/menu_inbox.php');
        require ('./html/send.php');
        require ('./html/menu_inbox.php');
        require ('./html/footer.php');
        break;

    case 'reply_all':
        $content = aff_mail($mail, 0, $ev);
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
        $mail_body .= "\r\n".$prefs_signature;

        // We add the attachments of the original message
        //list($num_attach, $attach_array) = save_attachment($mail, $tmpdir);
        require ('./html/header.php');
        require ('./html/menu_inbox.php');
        require ('./html/send.php');
        require ('./html/menu_inbox.php');
        require ('./html/footer.php');
        break;

    case 'forward':
        $content = aff_mail($mail, 0, $ev);
        if (Exception::isException($ev)) {
            require ('./html/header.php');
            require ('./html/error.php');
            require ('./html/footer.php');
            break;
        }

        $mail_subject = $html_forward_short.': '.$content['subject'];
    
        // Add signature
        $mail_body .= "\r\n".$prefs_signature;

    // Let send.php know to attach the original message
    $forward_msgnum = $mail;

        // We add the attachments of the original message
        list($num_attach, $attach_array) = save_attachment($mail, $tmpdir);
        // Registering the attachments array into the session
        //session_register('num_attach', 'attach_array');
        $_SESSION['num_attach'] = $_REQUEST['num_attach'];
        $_SESSION['attach_array'] = $_REQUEST['attach_array'];
        require ('./html/header.php');
        require ('./html/menu_inbox.php');
        require ('./html/send.php');
        require ('./html/menu_inbox.php');
        require ('./html/footer.php');
        break;

    case 'managefolders':
        $servr = $_SESSION['servr'];
        $folder = $_SESSION['folder'];
        $user = $_SESSION['user'];
        $passwd = $_SESSION['passwd'];
        $pop = new nocc_imap($servr, $folder, $user, $passwd, $ev);
        if ($ev) {
            $do = '';
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

        $full_name = getPref('full_name');
        $msg_per_page = getPref('msg_per_page');
        $email_address = getPref('email_address');
        $cc_self = getPref('cc_self');
        $hide_addresses = getPref('hide_addresses');
        $outlook_quoting = getPref('outlook_quoting');
        $reply_leadin = getPref('leadin');
        $signature = getPref('signature');
        require ('./html/header.php');
        require ('./html/menu_prefs.php');
        require ('./html/prefs.php');
        require ('./html/folders.php');
        require ('./html/menu_prefs.php');
        require ('./html/footer.php');

        $pop->close();

        break;

    case 'setprefs':
        $servr = $_SESSION['servr'];
        $folder = $_SESSION['folder'];
        $user = $_SESSION['user'];
        $passwd = $_SESSION['passwd'];
        $pop = new nocc_imap($servr, $folder, $user, $passwd, $lastev);
        if ($ev) {
            // I'll decide what to do with this later.
            break;
        }

        if(isset($submit_prefs))
        {
            $lastev = '';

            // Full name
            if (!$lastev && isset($full_name))
            {
                $ev = setPref('full_name', stripslashes($full_name));
                if(Exception::isException($ev))
                    $lastev = $ev;
            }

            // Messages per page
            if (!$lastev && isset($msg_per_page)) {
                $ev = setPref('msg_per_page', $msg_per_page);
                if(Exception::isException($ev))
                    $lastev = $ev;
            }

            // Email address
            if (!$lastev && isset($email_address)) {
                $ev = setPref('email_address', $email_address);
                if(Exception::isException($ev))
                    $lastev = $ev;
            }

            // CC Self
            if (!$lastev)
                if(isset($cc_self) && $cc_self == 'on') {
                    $ev = setPref('cc_self', $cc_self);
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
                if(isset($hide_addresses) && $hide_addresses == 'on') {
                    $ev = setPref('hide_addresses', $hide_addresses);
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
                if(isset($outlook_quoting) && $outlook_quoting == 'on') {
                    $ev = setPref('outlook_quoting', $outlook_quoting);
                    if(Exception::isException($ev))
                        $lastev = $ev;
                }
                else {
                    $ev = setPref('outlook_quoting', '');
                    if(Exception::isException($ev))
                        $lastev = $ev;
                }

            if (!$lastev && isset($reply_leadin)) {
                $ev = setPref('leadin', $reply_leadin);
                if(Exception::isException($ev))
                    $lastev = $ev;
            }

            if (!$lastev && isset($signature)) {
                $ev = setPref('signature', stripslashes($signature));
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
            if (Exception::isException($lastev)) {
                $ev = $lastev;
                require ('./html/header.php');
                require ('./html/error.php');
                require ('./html/footer.php');
                break;
            }

        }
        $full_name = getPref('full_name');
        $msg_per_page = getPref('msg_per_page');
        $email_address = getPref('email_address');
        $cc_self = getPref('cc_self');
        $hide_addresses = getPref('hide_addresses');
        $outlook_quoting = getPref('outlook_quoting');
        $reply_leadin = getPref('leadin');
        $signature = getPref('signature');
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
        // Default we display the mailbox
        if(!isset($servr) || !isset($passwd))
        {
            require ('./html/header.php');
            require ('./wrong.php');
            require ('./html/footer.php');
            break;
        }
        
        $ev = "";
        $servr = $_SESSION['servr'];
        $folder = $_SESSION['folder'];
        $user = $_SESSION['user'];
        $passwd = $_SESSION['passwd'];
        $pop = new nocc_imap($servr, $folder, $login, $passwd, $ev);
        if (Exception::isException($ev)) {
            require ('./html/header.php');
            require ('./html/error.php');
            require ('./html/footer.php');
            break;
        }

        $is_imap = $pop->is_imap();
        $tab_mail = 0;
        if ($pop->num_msg() > 0)
            $tab_mail = inbox($pop, $skip);

        switch ($tab_mail)
        {
            case -1:
                // -1 either the login and/or the password are wrong or the server is down
                require ('./html/header.php');
                require ('./wrong.php');
                require ('./html/footer.php');
                break;
            case 0:
                $_SESSION['loggedin'] = 1;
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
                if (!isset($attach_array))
                    $attach_array = null;
                go_back_index($attach_array, $tmpdir, false);
                $loggedin = 1;
                session_register('loggedin');
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
                if ($pop->is_imap() && ($conf->status_line == 1)) {
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

?>
