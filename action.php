<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/action.php,v 1.100 2002/03/25 13:52:53 rossigee Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * This file is the main file of NOCC each function starts from here
 */

require_once './conf.php';
require_once './check_lang.php';
require_once './functions.php';
require_once './prefs.php';
session_start();

if (!session_is_registered('loggedin'))
    $action = '';

$user = safestrip($user);
$passwd = safestrip($passwd);

if (setlocale (LC_TIME, $lang_locale) != $lang_locale)
    $default_date_format = $no_locale_date_format;
$current_date = strftime($default_date_format, time());

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
    $mail_from = $user. '@' . $domain;
if($prefs_full_name != '')
    $mail_from = $prefs_full_name . ' <' . $mail_from . '>';

if(!isset($action))
    $action = '';

switch (trim($action))
{
    case 'aff_mail':
        $content = aff_mail($conf, $servr, $login, $passwd, $folder, $mail, $verbose, $lang, $sort, $sortdir, $ev);
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
                echo '<hr />'.view_part($servr, $login, $passwd, $folder, $mail, $tmp['number'], $tmp['transfer'], $tmp['charset'], $charset);
            if ($conf->display_img_attach && (eregi('image', $tmp['mime']) && ($tmp['number'] != '')))
            {
                // if it's an image, display it
                $img_type = array_pop(explode('/', $tmp['mime']));
                if (eregi('JPEG', $img_type) || eregi('JPG', $img_type) || eregi('GIF', $img_type) || eregi ('PNG', $img_type))
                {
                    echo '<hr />';
                    echo '<center>';
                    echo '<p>' . $html_loading_image . ' ' . $tmp['name'] . '...</p>';
                    echo '<img src="get_img.php?' . $php_session . '=' . $$php_session . '&amp;mail=' . $mail.'&amp;folder=' . $folder . '&amp;num=' . $tmp['number'] . '&amp;mime=' . $img_type . '&amp;transfer=' . $tmp['transfer'] . '" />';
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
        header("Location: ".$conf->base_url."logout.php?lang=$lang&amp;$php_session=".$$php_session);
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
        $content = aff_mail($conf, $servr, $login, $passwd, $folder, $mail, 0, $lang, $sort, $sortdir, $ev);
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
        //list($num_attach, $attach_array) = save_attachment($servr, $login, $passwd, $folder, $mail, $tmpdir);
        // Registering the attachments array into the session
        //session_register('num_attach', 'attach_array');
        require ('./html/header.php');
        require ('./html/menu_inbox.php');
        require ('./html/send.php');
        require ('./html/menu_inbox.php');
        require ('./html/footer.php');
        break;

    case 'reply_all':
        $content = aff_mail($conf, $servr, $login, $passwd, $folder, $mail, 0, $lang, $sort, $sortdir, $ev);
        if (Exception::isException($ev)) {
            require ('./html/header.php');
            require ('./html/error.php');
            require ('./html/footer.php');
            break;
        }

        $mail_to = get_reply_all($login, $domain, $content['from'], $content['to'], $content['cc']);
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
        //list($num_attach, $attach_array) = save_attachment($servr, $login, $passwd, $folder, $mail, $tmpdir);
        // Registering the attachments array into the session
        //session_register('num_attach', 'attach_array');
        require ('./html/header.php');
        require ('./html/menu_inbox.php');
        require ('./html/send.php');
        require ('./html/menu_inbox.php');
        require ('./html/footer.php');
        break;

    case 'forward':
        $content = aff_mail($conf, $servr, $login, $passwd, $folder, $mail, 0, $lang, $sort, $sortdir, $ev);
        if (Exception::isException($ev)) {
            require ('./html/header.php');
            require ('./html/error.php');
            require ('./html/footer.php');
            break;
        }

        $mail_subject = $html_forward_short.': '.$content['subject'];
        $mail_body = $original_msg."\n".$html_from.': '.$content['from']."\n".$html_to.': '.$content['to']."\n".$html_sent.': '.$content['complete_date']."\n".$html_subject.': '.$content['subject']."\n\n".strip_tags2($content['body'],'');
        // Add signature
        $mail_body .= "\r\n".$prefs_signature;

        // We add the attachments of the original message
        list($num_attach, $attach_array) = save_attachment($servr, $login, $passwd, $folder, $mail, $tmpdir);
        // Registering the attachments array into the session
        session_register('num_attach', 'attach_array');
        require ('./html/header.php');
        require ('./html/menu_inbox.php');
        require ('./html/send.php');
        require ('./html/menu_inbox.php');
        require ('./html/footer.php');
        break;

    case 'setprefs':
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
        $email_address = getPref('email_address');
        $cc_self = getPref('cc_self');
        $hide_addresses = getPref('hide_addresses');
        $outlook_quoting = getPref('outlook_quoting');
        $reply_leadin = getPref('leadin');
        $signature = getPref('signature');
        require ('./html/header.php');
        require ('./html/menu_prefs.php');
        require ('./html/prefs.php');
        require ('./html/menu_prefs.php');
        require ('./html/footer.php');
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
        $pop = new nocc_imap('{'.$servr.'}'.$folder, $login, $passwd, $ev);
        if (Exception::isException($ev)) {
            require ('./html/header.php');
            require ('./html/error.php');
            require ('./html/footer.php');
            break;
        }

        $is_imap = $pop->is_imap();
        $tab_mail = 0;
        if ($pop->num_msg() > 0)
            $tab_mail = inbox($conf, $pop, $sort, $sortdir, $lang, $theme);

        $pop->close();

        switch ($tab_mail)
        {
            case -1:
                // -1 either the login and/or the password are wrong or the server is down
                require ('./html/header.php');
                require ('./wrong.php');
                require ('./html/footer.php');
                break;
            case 0:
                $loggedin = 1;
                session_register('loggedin');
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
                go_back_index($attach_array, $tmpdir, $php_session, $sort, $sortdir, $lang, false);
                $loggedin = 1;
                session_register('loggedin');
                // there are messages, we display
                $num_msg = count($tab_mail);
                require ('./html/header.php');
                require ('./html/menu_inbox.php');
                require ('./html/html_top_table.php');
                require ('./html/menu_inbox_opts.php');
                while ($tmp = array_shift($tab_mail))
                    require ('./html/html_inbox.php');
                require ('./html/menu_inbox_opts.php');
                require ('./html/html_bottom_table.php');
                require ('./html/menu_inbox.php');
                require ('./html/footer.php');
                break;
        }
        break;
}

?>