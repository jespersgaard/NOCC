<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/send.php,v 1.108 2002/05/15 16:34:04 rossigee Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 */

require_once './conf.php';
require_once './common.php';
require_once './prefs.php';

if (!isset($_SESSION['loggedin']))
{
    require_once './proxy.php';
    header('Location: ' . $conf->base_url . 'logout.php');
    return;
}

// DEPRACATED: Not required PHP >= 4.1
if (!function_exists('is_uploaded_file'))
    include_once ('./is_uploaded_file.php');

if ($HTTP_SERVER_VARS['REQUEST_METHOD'] != 'POST') {
    clear_attachments();
    require_once './proxy.php';
    header('Location: ' . $conf->base_url . 'action.php');
    return;
}

require_once './class_send.php';
require_once './class_smtp.php';

$mail_from = safestrip($_REQUEST['mail_from']);
$mail_to = safestrip($_REQUEST['mail_to']);
$mail_cc = safestrip($_REQUEST['mail_cc']);
$mail_bcc = safestrip($_REQUEST['mail_bcc']);
$mail_subject = safestrip($_REQUEST['mail_subject']);
$mail_body = safestrip($_REQUEST['mail_body']);
$mail_att = $_FILES['mail_att'];

switch($_REQUEST['sendaction'])
{
    case 'add':
        // Counting the attachments number in the array
        if (!isset($_SESSION['attach_array']))
            $_SESSION['attach_array'] = array();
        $attach_array = $_SESSION['attach_array'];

        $num_attach = count($attach_array);
        $tmp_name = $conf->tmpdir.'/'.basename($mail_att['tmp_name'] . '.att');

        // Adding the new file to the array
        if (move_uploaded_file($mail_att['tmp_name'], $tmp_name))
        {
            $attach_array[$num_attach]->file_name = basename($mail_att['name']);
            $attach_array[$num_attach]->tmp_file = $tmp_name;
            $attach_array[$num_attach]->file_size = $mail_att['size'];
            $attach_array[$num_attach]->file_mime = $mail_att['type'];
            if (empty($mail_att['type'])) {
                $attach_array[$num_attach]->file_mime = trim(`file -b $tmp_name`);
            }
        }
        else {
            $ev = new Exception($html_file_upload_attack);
            require ('./html/header.php');
            require ('./html/error.php');
            require ('./html/footer.php');
            break;
        }

        // Registering the attachments array into the session
        $_SESSION['attach_array'] = $attach_array;

        // Displaying the sending form with the new attachments array
        header("Content-type: text/html; Charset=$charset");
        require ('./html/header.php');
        require ('./html/menu_inbox.php');
        require ('./html/send.php');
        require ('./html/menu_inbox.php');
        require ('./html/footer.php');
        break;
    case 'send':
        $mail = new mime_mail();
        $mail->crlf = get_crlf($smtp_server);
        $mail->smtp_server = $_SESSION['smtp_server'];
        $mail->smtp_port = $_SESSION['smtp_port'];
        $mail->charset = $charset;
        $mail->from = cut_address(trim($mail_from), $charset);
        $mail->from = $mail->from[0];
        $mail->priority = $_REQUEST['priority'];
        $mail->receipt = isset($_REQUEST['receipt']);
        $mail->headers = "";
        // $ip = (getenv('HTTP_X_FORWARDED_FOR') ? getenv('HTTP_X_FORWARDED_FOR') : getenv('REMOTE_ADDR'));
        // $mail->headers .= 'X-Originating-Ip: [' . $ip . ']' . $mail->crlf;
        $mail->headers .= 'User-Agent: ' . $conf->nocc_name . ' <' . $conf->nocc_url . '>';
        $mail->to = cut_address(trim($mail_to), $charset);
        $mail->cc = cut_address(trim($mail_cc), $charset);
        $cc_self = getPref('cc_self');
        if($cc_self != '') {
            array_unshift($mail->cc, $mail->from);
        }
        $mail->bcc = cut_address(trim($mail_bcc), $charset);
        if ($mail_subject != '')
            $mail->subject = trim($mail_subject);

        // Append advertisement tag, if set
        if ($mail_body != '')
            $mail->body = $mail_body;

        if (isset($ad))
            if ($mail_body != '')
                $mail->body = $mail_body . $mail->crlf . $mail->crlf . $conf->ad;
            else
                $mail->body = $conf->ad;

        // Getting the attachments
        if (isset($_SESSION['attach_array']))
        {
            $attach_array = $_SESSION['attach_array'];
            for ($i = 0; $i < count($attach_array); $i++)
            {
                // If the temporary file exists, attach it
                if (file_exists($attach_array[$i]->tmp_file))
                {
                    $fp = fopen($attach_array[$i]->tmp_file, 'rb');
                    $file = fread($fp, $attach_array[$i]->file_size);
                    fclose($fp);
                    // add it to the message, by default it is encoded in base64
                    $mail->add_attachment($file, nocc_imap::qprint($attach_array[$i]->file_name), $attach_array[$i]->file_mime, 'base64', '');
                    // then we delete the temporary file
                    unlink($attach_array[$i]->tmp_file);
                }
            }
            // Finished with attachments array now.
            unset($_SESSION['attach_array']);
        }

        // Add original message as attachment?
        if(isset($_REQUEST['forward_msgnum']) && $_REQUEST['forward_msgnum'] != "") {
            $forward_msgnum = $_REQUEST['forward_msgnum'];
            $ev = "";
            $servr = $_SESSION['servr'];
            $folder = $_SESSION['folder'];
            $login = $_SESSION['login'];
            $passwd = $_SESSION['passwd'];
            $pop = new nocc_imap($servr, $folder, $login, $passwd, 0, $ev);
            if (Exception::isException($ev)) {
                require ('./html/header.php');
                require ('./html/error.php');
                require ('./html/footer.php');
                break;
            }

            // Rebuild original message from headers and body
            $origmsg = "";
            $headers = $pop->fetchheader($forward_msgnum);
            $body = $pop->body($forward_msgnum);
            $origmsg .= $headers;
            $origmsg .= "\r\n";
            $origmsg .= $body;

            // Attach it
            $mail->add_attachment($origmsg, '',  'message/rfc822', '', '');
        }

        $ev = $mail->send();
        header("Content-type: text/html; Charset=$charset");
        if (Exception::isException($ev))
        {
            // Error while sending the message, display an error message
            require ('./html/header.php');
            require ('./html/menu_inbox.php');
            require ('./html/send_error.php');
            require ('./html/menu_inbox.php');
            require ('./html/footer.php');
        }
        else
        {
            // Redirect user to inbox
            require_once './proxy.php';
            header("Location: ".$conf->base_url."action.php");
        }
        break;
    case 'delete':
        // Rebuilding the attachments array with only the files the user wants to keep
        $tmp_array = array();
        $attach_array = $_SESSION['attach_array'];
        for ($i = $j = 0; $i < count($attach_array); $i++)
        {
            if (!isset($_REQUEST['file-'.$i]))
            {
                $tmp_array[$j]->file_name = $attach_array[$i]->file_name;
                $tmp_array[$j]->tmp_file = $attach_array[$i]->tmp_file;
                $tmp_array[$j]->file_size = $attach_array[$i]->file_size;
                $tmp_array[$j]->file_mime = $attach_array[$i]->file_mime;
                $j++;
            }
            else
                @unlink($attach_array[$i]->tmp_file);
        }

        // Registering the new attachments array into the session
        $_SESSION['attach_array'] = $tmp_array;

        // Displaying the sending form with the new attachment array
        header("Content-type: text/html; Charset=$charset");
        require ('./html/header.php');
        require ('./html/menu_inbox.php');
        require ('./html/send.php');
        require ('./html/menu_inbox.php');
        require ('./html/footer.php');
        break;
    default:
        // Nothing was set in the sendaction (e.g. no javascript enabled)
        header("Content-type: text/html; Charset=$charset");
        $ev = new Exception("$html_no_sendaction");
        require ('./html/header.php');
        require ('./html/menu_inbox.php');
        require ('./html/send_error.php');
        require ('./html/menu_inbox.php');
        require ('./html/footer.php');
        break;
}
?>
