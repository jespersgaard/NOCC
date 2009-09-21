<?php
/**
 * Class for building and sending a mail
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * This file is part of NOCC. NOCC is free software under the terms of the
 * GNU General Public License. You should have received a copy of the license
 * along with NOCC.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package    NOCC
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @version    SVN: $Id$
 */

require_once './classes/exception.php';

/**
 * Building and sending a mail
 *
 * @package    NOCC
 * @todo Rename to NOCC_MimeMail?
 */
class mime_mail {
    var $parts;
    var $to;
    var $cc;
    var $bcc;
    var $from;
    var $headers;
    var $subject;
    var $body;
    var $smtp_server;
    var $smtp_port;
    var $charset;
    var $crlf;
    var $priority;
    var $receipt;

    /**
     * Initialize the mail object
     */
    function mime_mail() {
        $this->parts = Array();
        $this->to =  Array();
        $this->cc = Array();
        $this->bcc = Array();
        $this->from =  null;
        $this->headers = null;
        $this->subject =  null;
        $this->body =  null;
        $this->smtp_server =  'localhost';
        $this->smtp_port = 25;
        $this->charset = 'iso-8859-1';
        $this->crlf = null;
        $this->priority = '3 (Normal)';
        $this->receipt = false;
        $this->return = null;
    }

    /**
     * Add an attachment to the mail object
     * 
     * @param string $message
     * @param string $name
     * @param string $ctype
     * @param string $encoding
     * @param string $charset 
     */
    function add_attachment($message, $name, $ctype, $encoding, $charset) {
        $this->parts[] = array (
            'ctype' => $ctype,
            'message' => $message,
            'encoding' => $encoding,
            'charset' => $charset,
            'name' => $name
        );
    }

    /**
     * Build message parts of a multipart mail
     *
     * @param array $part
     * @return string
     */ 
    function build_message($part) {
        $message = $part['message'];
        $encoding = $part['encoding'];
        $charset = $part['charset'];
        switch($encoding)
        {
            case 'base64':
                $message = chunk_split(base64_encode($message));
                break;
            case 'quoted-printable':
                $message = nocc_imap::i8bit($message);
                break;
            default:
                break;
        }
        $val = 'Content-Type: ' . $part['ctype'] . ';';
        $val .= ($part['charset'] ? $this->crlf . "\tcharset=\"" . $part['charset'] . '"' : '');
        $val .= ($part['name'] ? $this->crlf . "\tname=\"" . $part['name'] . '"' : '');
        $val .= $this->crlf . 'Content-Transfer-Encoding: ' . $encoding;
        $val .= ($part['name'] ? $this->crlf . 'Content-Disposition: attachment;' . $this->crlf . "\tfilename=\"" . $part['name'] . '"' : '');
        $val .= $this->crlf . $this->crlf . $message . $this->crlf;
        return($val);
    }

    /**
     * Build a multipart mail
     *
     * @return string
     */ 
    function build_multipart() {
        $boundary = 'NextPart'.md5(uniqid(time()));
        $multipart = 'Content-Type: multipart/mixed;' . $this->crlf . "\tboundary=\"$boundary\"" . $this->crlf . $this->crlf . 'This is a MIME encoded message.' . $this->crlf . $this->crlf . '--' . $boundary;
        
        for($i = sizeof($this->parts) - 1; $i >= 0; $i--) 
            $multipart .= $this->crlf . $this->build_message($this->parts[$i]) . '--'.$boundary;
        return ($multipart .= '--' . $this->crlf);
    }

    /**
     * Build a non multipart mail
     *
     * @return ???
     */
    function build_body() {
        if (sizeof($this->parts) == 1)
            $part = $this->build_message($this->parts[0]);
        else
            $part = '';
        return ($part . $this->crlf);
    }

    /**
     * Send the mail (last class-function to be called)
     *
     * @param $conf
     * @return mixed
     */ 
    function send(&$conf) {
        $mime = '';
        if (($this->smtp_server != '' && $this->smtp_port != '')) {
            if ($this->to[0] != '')
                $mime .= 'To: ' . join(', ', $this->to) . $this->crlf;
            if (!empty($this->subject)) {
                $mime .= 'Subject: ' . $this->subject . $this->crlf;
            }
        }
        if (!empty($this->from))
            $mime .= 'From: ' . $this->from . $this->crlf;
        if (count($this->cc) > 0 && $this->cc[0] != '')
            $mime .= 'Cc: ' . join(', ', $this->cc) . $this->crlf;
        if (count($this->bcc) > 0 && $this->bcc[0] != '')
            $mime .= 'Bcc: ' . join(', ', $this->bcc) . $this->crlf;
        if (ereg("[4-9]\.[0-9]\.[4-9].*", phpversion()) || ereg("[5-9]\.[0-9]\.[0-9].*", phpversion()))
            $mime .= 'Date: ' . date("r") . $this->crlf;
        else
            $mime .= 'Date: ' . date("D, j M Y H:i:s T") . $this->crlf;
        if (!empty($this->from))
            $mime .= 'Reply-To: ' . $this->from . $this->crlf . 'Errors-To: '.$this->from . $this->crlf;
        if ($this->receipt != false)
            $mime .= 'Disposition-Notification-To: ' . $this->from . $this->crlf;
        $mime .= 'X-Priority: ' . $this->priority . $this->crlf;
        if (!empty($this->headers))
            $mime .= $this->headers . $this->crlf;

        // Strip lonely "\r\n.\r\n" in order to avoid STMP errors
        $mime = str_replace("\r\n.\r\n", "\r\n..\r\n", $mime);

        $mail_format = '';
        if (isset($_SESSION['html_mail_send']) && $_SESSION['html_mail_send']) {
            $mail_format = 'text/html';
        }
        else {
            $mail_format = 'text/plain';
        }

        if (sizeof($this->parts) >= 1) {
            $this->add_attachment($this->body,  '',  $mail_format, 'quoted-printable', $this->charset);
            $mime .= 'MIME-Version: 1.0' . $this->crlf . $this->build_multipart();
        }
        else {
            $this->add_attachment($this->body,  '',  $mail_format, '8bit', $this->charset);
            $mime .= 'MIME-Version: 1.0' . $this->crlf . $this->build_body();
        }

        // We enforce $conf->crlf option as mixed "\r\n" (coming from NOCC
        // textarea while writing mail)  and "\n" line break may confuse some
        // MTA or mail() PHP function.
        $mime = str_replace("\r\n", $conf->crlf, $mime);

        // Whether or not to use SMTP or sendmail
        // depends on the config file (conf.php)
        if ($this->smtp_server == '' || $this->smtp_port == '') {
            $rcpt_to = join(', ', $this->to);
            if (ereg("[4-9]\.[0-9]\.[0-9].*", phpversion()))
                $ev = @mail($rcpt_to, $this->subject, '', $mime, '-f' . $this->strip_comment($this->from));
            else
                $ev = @mail($rcpt_to, $this->subject, '', $mime);
                
            $user_prefs = $_SESSION['nocc_user_prefs'];
            if (isset($user_prefs->sent_folder) && $user_prefs->sent_folder && isset($user_prefs->sent_folder_name) && $user_prefs->sent_folder_name !=null && $user_prefs->sent_folder_name != ""){
                // Copy email to Sent folder
                $pop = new nocc_imap($ev);
                if (NoccException::isException($ev)) {
                    return($ev);
                }
                if ($pop->is_imap()) {
                    $mime = "To: $rcpt_to" . $conf->crlf . "Subject: " . $this->subject . $conf->crlf . $mime;
                    $copy_return = $pop->copytosentfolder($mime, $ev, $user_prefs->sent_folder_name);
                    if (NoccException::isException($ev)) {
                        return($ev);
                    }
                }
            }
            if ($ev != true)
                return (new NoccException('unable to send message, SMTP server unreachable'));
        }
        else {
            $smtp = new smtp();
            if (!empty($smtp))
            {
                $smtp->smtp_server = $this->smtp_server;
                $smtp->port = $this->smtp_port;
                $smtp->from = $this->strip_comment($this->from);
                $smtp->to = $this->strip_comment_array($this->to);
                $smtp->cc = $this->strip_comment_array($this->cc);
                $smtp->bcc = $this->strip_comment_array($this->bcc);
                $smtp->subject = $this->subject;
                $smtp->data = $mime;
                $smtp_return = $smtp->send();
                if (NoccException::isException($smtp_return)) {
                    return($smtp_return);
                }
                $copy_return = 1;
                $user_prefs = $_SESSION['nocc_user_prefs'];
                if (isset($user_prefs->sent_folder) && $user_prefs->sent_folder && isset($user_prefs->sent_folder_name) && $user_prefs->sent_folder_name !=null && $user_prefs->sent_folder_name != ""){
                    // Copy email to Sent folder
                    $pop = new nocc_imap($ev);
                    if (NoccException::isException($ev)) {
                        return($ev);
                    }
                    if ($pop->is_imap()) {
                        $copy_return = $pop->copytosentfolder($smtp->data, $ev, $user_prefs->sent_folder_name);
                        if (NoccException::isException($ev)) {
                            return($ev);
                        }
                    }
                }
                return ($smtp_return && $copy_return);
            }
            else
                return (0);
        }
    }

    /**
     * ...
     *
     * @param array $array
     * @return array
     */
    function strip_comment_array($array) {
        for($i = 0; $i < count($array); $i++) {
            $array[$i] = $this->strip_comment($array[$i]);
        }
        return $array;
    }

    /**
     * ...
     *
     * @param string $address
     * @return string
     */
    function strip_comment($address) {
        $pos = strrpos($address, '<');
        if ($pos === false) {
            return '<'.$address.'>';
        }
        else {
            return substr($address, $pos);
        }
    }
}
?>
