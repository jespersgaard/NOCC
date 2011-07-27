<?php
/**
 * This file send a message
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 * Copyright 2008-2011 Tim Gerundt <tim@gerundt.de>
 *
 * This file is part of NOCC. NOCC is free software under the terms of the
 * GNU General Public License. You should have received a copy of the license
 * along with NOCC.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package    NOCC
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @version    SVN: $Id$
 */

require_once './common.php';

if (!isset($_SESSION['nocc_loggedin'])) {
    require_once './utils/proxy.php';
    header('Location: ' . $conf->base_url . 'logout.php');
    return;
}

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    clear_attachments();
    require_once './utils/proxy.php';
    header('Location: ' . $conf->base_url . 'action.php');
    return;
}
require_once './classes/class_send.php';
require_once './classes/class_smtp.php';

if( isset($conf->allow_address_change) && $conf->allow_address_change )
    $mail_from = NOCC_Request::getStringValue('mail_from');
else 
    $mail_from = get_default_from_address();

$mail_to = NOCC_Request::getStringValue('mail_to');
$mail_cc = NOCC_Request::getStringValue('mail_cc');
$mail_bcc = NOCC_Request::getStringValue('mail_bcc');
$mail_subject = NOCC_Request::getStringValue('mail_subject');
$mail_body = NOCC_Request::getStringValue('mail_body');

if (NOCC_Session::getSendHtmlMail()) {
    $mail_body = '<html><head></head><body>'.$mail_body.'</body></html>';
}

if (ini_get("file_uploads")) {
    if (isset($_FILES['mail_att'])) {
        $mail_att = $_FILES['mail_att'];
    }
}

$mail_receipt = isset($_REQUEST['receipt']);
$mail_priority = NOCC_Request::getStringValue('priority');

switch ($_REQUEST['sendaction']) {
    case unhtmlentities($html_attach):
        // Counting the attachments number in the array
        if (!isset($_SESSION['nocc_attach_array']))
            $_SESSION['nocc_attach_array'] = array();
        $attach_array = $_SESSION['nocc_attach_array'];

        //TODO: Check if "$conf->tmpdir" exists?
        $tmpFile = $conf->tmpdir.'/'.basename($mail_att['tmp_name'] . time() . '.att');

        // Adding the new file to the array
        if (@move_uploaded_file($mail_att['tmp_name'], $tmpFile)) {
            $attachedFile = new NOCC_AttachedFile($tmpFile, basename($mail_att['name']), $mail_att['size'], $mail_att['type']);
            
            $attach_array[] = $attachedFile;
        }
        else {
            $ev = new NoccException($html_file_upload_attack);
            require './html/header.php';
            require './html/error.php';
            require './html/footer.php';
            break;
        }

        // Registering the attachments array into the session
        $_SESSION['nocc_attach_array'] = $attach_array;

        // Displaying the sending form with the new attachments array
        //header("Content-type: text/html; Charset=UTF-8");
        require './html/header.php';
        require './html/menu_inbox.php';
        require './html/send.php';
        require './html/menu_inbox.php';
        require './html/footer.php';
        break;

    case unhtmlentities($html_send):
        $mail = new mime_mail();
        $mail->crlf = $conf->crlf;
        $mail->smtp_server = $_SESSION['nocc_smtp_server'];
        $mail->smtp_port = $_SESSION['nocc_smtp_port'];
        //TODO: No nice to use $mail->from as temp variable!
        $mail->from = cut_address(trim($mail_from), 'UTF-8');
        $mail->from = $mail->from[0];
        $mail->priority = $_REQUEST['priority'];
        $mail->receipt = isset($_REQUEST['receipt']);
        $mail->headers = '';
        if (!empty($_REQUEST['mail_messageid'])) {
            $mail->headers .= 'References: ' . urldecode($_REQUEST['mail_messageid']) . $mail->crlf;
            $mail->headers .= 'In-Reply-To: ' . urldecode($_REQUEST['mail_messageid']) . $mail->crlf;
        }
        $mail->headers .= 'User-Agent: ' . $conf->nocc_name . ' <' . $conf->nocc_url . '>';
        $mail->to = cut_address(trim($mail_to), 'UTF-8');
        $mail->cc = cut_address(trim($mail_cc), 'UTF-8');
        $mail->bcc = cut_address(trim($mail_bcc), 'UTF-8');
        $user_prefs = NOCC_Session::getUserPrefs();
        if ($user_prefs->getBccSelf()) {
            array_unshift($mail->bcc, $mail->from);
        }
        if ($mail_subject != '') {
            $mail_subject = trim($mail_subject);
            $mail->subject = '=?UTF-8?B?' . base64_encode($mail_subject) . '?=';
        }

        // Append advertisement tag, if set
        // Wrap outgoing message if needed
        $wrap_msg = $user_prefs->getWrapMessages();
        if ($mail_body != '') {
            if ($wrap_msg)
                $mail->body = wrap_outgoing_msg($mail_body, $wrap_msg, $mail->crlf);
            else
                $mail->body = $mail_body;
        }

        if (isset($conf->ad))
            if ($mail_body != '')
                $mail->body = $mail->body . $mail->crlf . $mail->crlf . $conf->ad;
            else
                $mail->body = $conf->ad;

        // Handle dots for SMTP protocol
        $mail->body = escape_dots($mail->body);

        // Getting the attachments
        if (isset($_SESSION['nocc_attach_array'])) {
            $attach_array = $_SESSION['nocc_attach_array'];
            for ($i = 0; $i < count($attach_array); $i++) {
                $attachedFile = $attach_array[$i];
                // If the temporary file exists, attach it
                if ($attachedFile->exists()) {
                    $content = $attachedFile->getContent();
                    // add it to the message, by default it is encoded in base64
                    $mail->add_attachment($content, nocc_imap::qprint($attachedFile->getName()), $attachedFile->getMimeType(), 'base64', '');
                    // then we delete the temporary file
                    $attachedFile->delete();
                }
            }
            // Finished with attachments array now.
            unset($_SESSION['nocc_attach_array']);
        }

        // Add original message as attachment?
        if (isset($_REQUEST['forward_msgnum']) && $_REQUEST['forward_msgnum'] != "") {
            try {
                $pop = new nocc_imap();
            }
            catch (Exception $ex) {
                //TODO: Show error without NoccException!
                $ev = new NoccException($ex->getMessage());
                require './html/header.php';
                require './html/error.php';
                require './html/footer.php';
                break;
            }

            $mail_list = explode('$', $_REQUEST['forward_msgnum']);
            for ($msg_num = 0; $msg_num < count($mail_list); $msg_num++) {
                $forward_msgnum = $mail_list[$msg_num];

                $origmsg = $pop->fetchmessage($forward_msgnum);

                // Attach it
                //TODO: Move filename to a own variable!
                if (count($mail_list) == 1) {
                    $mail->add_attachment($origmsg, 'orig_msg.eml', 'message/rfc822', '', '');
                } else {
                    $mail->add_attachment($origmsg, 'orig_msg_'.$msg_num.'.eml', 'message/rfc822', '', '');
                }
            }
        }

        if (!isset ($_SESSION['last_send'])) {
            $ev = $mail->send($conf);
            $_SESSION['last_send'] = time();
        } else if ($_SESSION['last_send'] + $conf->send_delay < time()) {
            $ev = $mail->send($conf);
            $_SESSION['last_send'] = time();
        } else {
            $ev = new NoccException(i18n_message($lang_err_send_delay, $conf->send_delay));
        }
        header("Content-type: text/html; Charset=UTF-8");
        if (NoccException::isException($ev)) {
            // Error while sending the message, display an error message
            require './html/header.php';
            require './html/menu_inbox.php';
            require './html/send_error.php';
            require './html/menu_inbox.php';
            require './html/footer.php';
        } else {
            // Redirect user to inbox
            require_once './utils/proxy.php';
            header("Location: ".$conf->base_url."action.php?successfulsend=true");
        }
        break;

    case unhtmlentities($html_attach_delete):
        // Rebuilding the attachments array with only the files the user wants to keep
        $tmp_array = array();
        $attach_array = $_SESSION['nocc_attach_array'];
        for ($i = 0; $i < count($attach_array); $i++) {
            $attachedFile = $attach_array[$i];
            if (!isset($_REQUEST['file-'.$i])) {
                $tmp_array[] = $attachedFile;
            }
            else {
                $attachedFile->delete();
            }
        }

        // Registering the new attachments array into the session
        $_SESSION['nocc_attach_array'] = $tmp_array;

        // Displaying the sending form with the new attachment array 
        header("Content-type: text/html; Charset=UTF-8");
        require './html/header.php';
        require './html/menu_inbox.php';
        require './html/send.php';
        require './html/menu_inbox.php';
        require './html/footer.php';
        break;

    default:
        // Nothing was set in the sendaction (e.g. no javascript enabled)
        header("Content-type: text/html; Charset=UTF-8");
        $ev = new NoccException($html_no_sendaction);
        require './html/header.php';
        require './html/menu_inbox.php';
        require './html/send_error.php';
        require './html/menu_inbox.php';
        require './html/footer.php';
        break;
}
?>
