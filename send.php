<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/send.php,v 1.136 2006/02/10 17:28:44 goddess_skuld Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 */

require_once './conf.php';
require_once './common.php';

class attached_file {
  var $file_name = "";
  var $tmp_file = "";
  var $file_size = "";
  var $file_mime = "";
}

if (!isset($_SESSION['nocc_loggedin']))
{
    require_once './proxy.php';
    header('Location: ' . $conf->base_url . 'logout.php');
    return;
}

// DEPRACATED: Not required PHP >= 4.1
if (!function_exists('is_uploaded_file'))
    include_once ('./is_uploaded_file.php');

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    clear_attachments();
    require_once './proxy.php';
    header('Location: ' . $conf->base_url . 'action.php');
    return;
}
require_once './class_send.php';
require_once './class_smtp.php';

if( isset($conf->allow_address_change) && $conf->allow_address_change ) $mail_from = safestrip($_REQUEST['mail_from']);
else $mail_from = get_default_from_address();
$mail_to = safestrip($_REQUEST['mail_to']);
$mail_cc = safestrip($_REQUEST['mail_cc']);
$mail_bcc = safestrip($_REQUEST['mail_bcc']);
$mail_subject = safestrip($_REQUEST['mail_subject']);
$mail_body = safestrip($_REQUEST['mail_body']);
if(ini_get("file_uploads")) {
        if (isset($_FILES['mail_att'])) {
            $mail_att = $_FILES['mail_att'];
	}
}
$mail_receipt = isset($_REQUEST['receipt']);
$mail_priority = safestrip($_REQUEST['priority']);

switch($_REQUEST['sendaction'])
{
    case unhtmlentities($html_attach):
        // Counting the attachments number in the array
        if (!isset($_SESSION['nocc_attach_array']))
            $_SESSION['nocc_attach_array'] = array();
        $attach_array = $_SESSION['nocc_attach_array'];

        $num_attach = count($attach_array);
        $tmp_name = $conf->tmpdir.'/'.basename($mail_att['tmp_name'] . time() . '.att');

        // Adding the new file to the array
        if (move_uploaded_file($mail_att['tmp_name'], $tmp_name))
        {
            $attach_array[] = new attached_file;
            $attach_array[$num_attach]->file_name = basename($mail_att['name']);
            $attach_array[$num_attach]->tmp_file = $tmp_name;
            $attach_array[$num_attach]->file_size = $mail_att['size'];
            $attach_array[$num_attach]->file_mime = $mail_att['type'];
            if (empty($mail_att['type'])) {
                $attach_array[$num_attach]->file_mime = trim(`file -b $tmp_name`);
            }
        }
        else {
            $ev = new NoccException($html_file_upload_attack);
            require ('./html/header.php');
            require ('./html/error.php');
            require ('./html/footer.php');
            break;
        }

        // Registering the attachments array into the session
        $_SESSION['nocc_attach_array'] = $attach_array;

        // Displaying the sending form with the new attachments array
        //header("Content-type: text/html; Charset=$charset");
        require ('./html/header.php');
        require ('./html/menu_inbox.php');
        require ('./html/send.php');
        require ('./html/menu_inbox.php');
        require ('./html/footer.php');
        break;
    case unhtmlentities($html_send):
        $mail = new mime_mail();
        $mail->crlf = $conf->crlf;
        $mail->smtp_server = $_SESSION['nocc_smtp_server'];
        $mail->smtp_port = $_SESSION['nocc_smtp_port'];
        $mail->charset = $charset;
        $trim_mail_from = trim($mail_from);
        $mail->from = cut_address($trim_mail_from, $charset);
        $mail->from = $mail->from[0];
        $mail->priority = $_REQUEST['priority'];
        $mail->receipt = isset($_REQUEST['receipt']);
        $mail->headers = "";
        // $ip = (getenv('HTTP_X_FORWARDED_FOR') ? getenv('HTTP_X_FORWARDED_FOR') : getenv('REMOTE_ADDR'));
        // $mail->headers .= 'X-Originating-Ip: [' . $ip . ']' . $mail->crlf;
        $mail->headers .= 'User-Agent: ' . $conf->nocc_name . ' <' . $conf->nocc_url . '>';
        $trim_mail_to = trim($mail_to);
        $trim_mail_cc = trim($mail_cc);
        $mail->to = cut_address($trim_mail_to, $charset);
        $mail->cc = cut_address($trim_mail_cc, $charset);
	$user_prefs = $_SESSION['nocc_user_prefs'];
        if(isset($user_prefs->cc_self) && $user_prefs->cc_self) {
            array_unshift($mail->cc, $mail->from);
        }
        $trim_mail_bcc = trim($mail_bcc);
        $mail->bcc = cut_address($trim_mail_bcc, $charset);
        if ($mail_subject != '') {
            $mail_subject = trim($mail_subject);
            $mail->subject = '=?'.$charset.'?B?' . base64_encode($mail_subject) . '?=';
        }

        // Append advertisement tag, if set
	// Wrap outgoing message if needed
	if (isset($user_prefs->wrap_msg))
	    $wrap_msg = $user_prefs->wrap_msg;
        if ($mail_body != '')
		{
			if (isset ($wrap_msg) && $wrap_msg)
				$mail->body = wrap_outgoing_msg ($mail_body, $wrap_msg, $mail->crlf);
			else
			 	$mail->body = $mail_body;
		}

        if (isset($conf->ad))
            if ($mail_body != '')
                $mail->body = $mail->body . $mail->crlf . $mail->crlf . $conf->ad;
            else
                $mail->body = $conf->ad;

	// Strip "\r\n.\r\n" to avoid cutting mail
	$mail->body = str_replace($conf->crlf . "." . $conf->crlf, $conf->crlf . ".." . $conf->crlf, $mail->body);

        // Getting the attachments
        if (isset($_SESSION['nocc_attach_array']))
        {
            $attach_array = $_SESSION['nocc_attach_array'];
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
            unset($_SESSION['nocc_attach_array']);
        }

        // Add original message as attachment?
        if(isset($_REQUEST['forward_msgnum']) && $_REQUEST['forward_msgnum'] != "") {
            $forward_msgnum = $_REQUEST['forward_msgnum'];
            $ev = "";
            $pop = new nocc_imap($ev);
            if (NoccException::isException($ev)) {
                require ('./html/header.php');
                require ('./html/error.php');
                require ('./html/footer.php');
                break;
            }

            // Rebuild original message from headers and body
            $origmsg = "";
            $headers = $pop->fetchheader($forward_msgnum, $ev);
            if (NoccException::isException($ev)) {
                require ('./html/header.php');
                require ('./html/error.php');
                require ('./html/footer.php');
                break;
            }
            $body = $pop->body($forward_msgnum, $ev);
            if (NoccException::isException($ev)) {
                require ('./html/header.php');
                require ('./html/error.php');
                require ('./html/footer.php');
                break;
            }
            $origmsg .= $headers;
            $origmsg .= $conf->crlf;
            $origmsg .= $body;

            // Attach it
            $mail->add_attachment($origmsg, 'orig_msg.eml',  'message/rfc822', '', '');
        }

            if (!isset ($_SESSION['last_send']))
            {
                $ev = $mail->send($conf);
                $_SESSION['last_send'] = time ();
            }
            else if ($_SESSION['last_send'] + $conf->send_delay < time ())
            {
                $ev = $mail->send($conf);
                $_SESSION['last_send'] = time ();
            }
        header("Content-type: text/html; Charset=$charset");
        if (NoccException::isException($ev))
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
            header("Location: ".$conf->base_url."action.php?successfulsend=true");
        }
        break;
    case unhtmlentities($html_attach_delete):
        // Rebuilding the attachments array with only the files the user wants to keep
        $tmp_array = array();
        $attach_array = $_SESSION['nocc_attach_array'];
        for ($i = $j = 0; $i < count($attach_array); $i++)
        {
            if (!isset($_REQUEST['file-'.$i]))
            {
                $tmp_array[] = new attached_file;
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
        $_SESSION['nocc_attach_array'] = $tmp_array;

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
        $ev = new NoccException("$html_no_sendaction");
        require ('./html/header.php');
        require ('./html/menu_inbox.php');
        require ('./html/send_error.php');
        require ('./html/menu_inbox.php');
        require ('./html/footer.php');
        break;
}
?>
