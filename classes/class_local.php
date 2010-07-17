<?php
/**
 * Class for IMAP/POP3 functions
 *
 * Moved all imap_* PHP calls into one, which should make it easier to write
 * our own IMAP/POP3 classes in the future.
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 * Copyright 2002 Mike Rylander <mrylander@mail.com>
 *
 * This file is part of NOCC. NOCC is free software under the terms of the
 * GNU General Public License. You should have received a copy of the license
 * along with NOCC.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package    NOCC
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @version    SVN: $Id$
 */

require_once 'nocc_mailstructure.php';
require_once 'nocc_headerinfo.php';
require_once 'nocc_header.php';
require_once 'exception.php';
require_once './utils/detect_cyr_charset.php';
require_once './utils/crypt.php';

class result
{
  public $text = '';
  public $charset = '';
}

class nocc_imap
{
    //TODO: Rewrite to private!
    public $server;
    private $login;
    private $passwd;
    private $conn;
    //TODO: Rewrite to private!
    public $folder;
    private $namespace;

    /**
     * ...
     * @global object $conf
     * @global string $lang_could_not_connect
     * @return nocc_imap Me!
     */
    public function __construct() {
        global $conf;
        global $lang_could_not_connect;

        if (!isset($_SESSION['nocc_servr']) || !isset($_SESSION['nocc_folder']) || !isset($_SESSION['nocc_login']) || !isset($_SESSION['nocc_passwd'])) {
            throw new Exception($lang_could_not_connect);
        }

        $this->server = $_SESSION['nocc_servr'];
        $this->folder = $_SESSION['nocc_folder'];
        $this->login = $_SESSION['nocc_login'];
        /* decrypt password */
        $this->passwd = decpass($_SESSION['nocc_passwd'], $conf->master_key);
        $this->namespace = $_SESSION['imap_namespace'];

        // $ev is set if there is a problem with the connection
        $conn = @imap_open('{'.$this->server.'}'.$this->folder, $this->login, $this->passwd, 0);
        if (!$conn) {
            throw new Exception($lang_could_not_connect.": ".imap_last_error());
        }
        $this->conn = $conn;

        $_SESSION['is_imap'] = $this->is_imap();

        return $this;
    }

    public function reopen($box, $flags = '', &$ev) {
        if (!imap_reopen($this->conn, $box, $flags)) {
            $ev = new NoccException(imap_last_error());
        }
    }

    public function search($crit, $flags = '', &$ev) {
        $messages = imap_search($this->conn, $crit, $flags);
        if(is_array($messages))
            return $messages;
        
        $error = imap_last_error();
        if(empty($error))
            return array();
        
        $ev = new NoccException("imap_search: ".imap_last_error());
        return;
    }

    /**
     * Fetch mail structure
     * @param integer $msgnum Message number
     * @return NOCC_MailStructure Mail structure
     */
    public function fetchstructure($msgnum) {
        $structure = @imap_fetchstructure($this->conn, $msgnum);
        if (!is_object($structure)) {
            throw new Exception('imap_fetchstructure() did not return an object.');
        }
        return new NOCC_MailStructure($structure);
    }

    /**
     * Fetch header
     * @param integer $msgnum Message number
     * @return NOCC_Header Header
     * @todo Throw exceptions?
     */
    public function fetchheader($msgnum) {
        $header = imap_fetchheader($this->conn, $msgnum);
        return new NOCC_Header($header);
    }

    /**
     * Fetch body
     * @param integer $msgnum Message number
     * @param string $partnum Part number
     * @return string Body
     * @todo Throw exceptions?
     */
    public function fetchbody($msgnum, $partnum) {
        return @imap_fetchbody($this->conn, $msgnum, $partnum);
    }

    /**
     * Fetch the entire message
     * @param integer $msgnum Message number
     * @return string Message
     * @todo Throw exceptions?
     */
    public function fetchmessage($msgnum) {
        return @imap_fetchbody($this->conn, $msgnum, '');
    }

    public function num_msg() {
        return imap_num_msg($this->conn);
    }

    public function msgno($msgnum) {
        return imap_msgno($this->conn, $msgnum);
    }

    /**
     * ...
     * @param string $sort Sort criteria
     * @param integer $sortdir Sort direction
     * @param boolean $useuid Use ID?
     * @return array Sorted message list
     */
    public function sort($sort, $sortdir, $useuid) {
        switch($sort) {
            case '1': $imapsort = SORTFROM; break;
            case '2': $imapsort = SORTTO; break;
            case '3': $imapsort = SORTSUBJECT; break;
            case '4': $imapsort = SORTARRIVAL; break;
            case '5': $imapsort = SORTSIZE; break;
        }
        if ($useuid) {
            $sorted = imap_sort($this->conn, $imapsort, $sortdir, SE_UID|SE_NOPREFETCH);
        } else {
            $sorted = imap_sort($this->conn, $imapsort, $sortdir, SE_NOPREFETCH);
        }
        if (!is_array($sorted)) {
            throw new Exception('imap_sort() did not return an array.');
        }
        return $sorted;
    }

    /**
     * Get header info
     * @param integer $msgnum Message number
     * @param string $defaultcharset Default charset
     * @return NOCC_HeaderInfo Header info
     */
    public function headerinfo($msgnum, $defaultcharset = 'ISO-8859-1') {
        $headerinfo = @imap_headerinfo($this->conn, $msgnum);
        if (!is_object($headerinfo)) {
            throw new Exception('imap_headerinfo() did not return an object.');
        }
        return new NOCC_HeaderInfo($headerinfo, $defaultcharset);
    }

    // From what I can find, this will not work on Cyrus imap servers .
    // [I will test this, I use Cyrus IMAP - Ross]
    public function deletemailbox($old_box, &$ev) {
        if (!imap_deletemailbox($this->conn, '{'.$this->server.'}'.$old_box)) {
            $ev = new NoccException(imap_last_error());
        }
    }

    public function renamemailbox($old_box, $new_box, &$ev) {
        if (!imap_renamemailbox($this->conn, '{'.$this->server.'}'.$old_box, '{'.$this->server.'}'.$this->namespace.mb_convert_encoding($new_box, 'UTF7-IMAP', 'UTF-8'))) {
            $ev = new NoccException(imap_last_error());
        }
    }

    public function createmailbox($new_box, &$ev) {
        if (!imap_createmailbox($this->conn, '{'.$this->server.'}'.$this->namespace.mb_convert_encoding($new_box, 'UTF7-IMAP', 'UTF-8'))) {
            $ev = new NoccException(imap_last_error());
        }
    }

    public function mail_copy($mail, $new_box, &$ev) {
        return imap_mail_copy($this->conn, $mail, $new_box, 0);
    }

    public function subscribe($new_box, &$ev, $isnewbox) {
        if ($isnewbox) {
            return imap_subscribe($this->conn, '{'.$this->server.'}'.$this->namespace.$new_box);
        } else {
            return imap_subscribe($this->conn, '{'.$this->server.'}'.$new_box);
        }
    }

    public function unsubscribe($old_box, &$ev) {
        return imap_unsubscribe($this->conn, '{'.$this->server.'}'.$old_box);
    }

    public function mail_move($mail, $new_box, &$ev) {
        return imap_mail_move($this->conn, $mail, $new_box, 0);
    }

    public function expunge(&$ev) {
        return imap_expunge($this->conn);
    }

    public function delete($mail, &$ev) {
        return imap_delete($this->conn, $mail, 0);
    }

    public function close() {
        return imap_close($this->conn, CL_EXPUNGE);
    }

    public function is_imap() {
        $check = imap_mailboxmsginfo($this->conn);
        return ($check->{'Driver'} == 'imap');
    }

    public static function utf7_decode($text) {
        return imap_utf7_decode($text);
    }

    public static function utf7_encode($data) {
        return imap_utf7_encode($data);
    }

    public static function utf8($mime_encoded_text) {
        //Since PHP 5.2.5 returns imap_utf8() only capital letters!
        //See bug #44098 for details: http://bugs.php.net/44098
        if (version_compare(PHP_VERSION, '5.2.5', '>=')) { //if PHP 5.2.5 or newer...
            return nocc_imap::decode_mime_string($mime_encoded_text);
        }
        else { //if PHP 5.2.4 or older...
            return nocc_imap::imap_utf8($mime_encoded_text);
        }
    }

    /**
     * Decode MIME string
     * @param string $string MIME encoded string
     * @param string $charset Charset
     * @return string Decoded string
     * @static
     */
    public static function decode_mime_string($string, $charset = 'UTF-8') {
        $decodedString = '';
        $elements = imap_mime_header_decode($string);
        foreach ($elements as $element) { //for all elements...
            if ($element->charset == 'default') { //if 'default' charset...
                $element->charset = 'iso-8859-1';
            }
            $decodedString .= iconv($element->charset, $charset, $element->text);
        }
        return $decodedString;
    }

    /**
     * ...
     * @return array Mailboxes
     */
    public function getmailboxes() {
        $mailboxes = @imap_getmailboxes($this->conn, '{' . $this->server . '}', '*');
        if (!is_array($mailboxes)) {
            throw new Exception('imap_getmailboxes() did not return an array.');
        } else {
            sort($mailboxes);
        }
        return $mailboxes;
    }

    public function getsubscribed(&$ev) {
        $subscribed = imap_getsubscribed($this->conn, '{'.$this->server.'}', '*');
        if (is_array($subscribed)) {
            sort($subscribed);
            return $subscribed;
        }
        
        $error = imap_last_error();
        if(empty($error))
            return array();
        
        $ev = new NoccException("imap_getsubscribed: ".imap_last_error());
        return;
    }

    public function mail_mark_read($mail, &$ev) {
        return imap_setflag_full($this->conn, imap_uid($this->conn, $mail), "\\Seen", ST_UID);
    }

    public function mail_mark_unread($mail, &$ev) {
        return imap_clearflag_full($this->conn, imap_uid($this->conn, $mail), "\\Seen", ST_UID);
    }

    public function exists($mailbox, &$ev) {
        $exists = false;
        $list = imap_list($this->conn, '{'.$this->server.'}', '*');
        if (is_array($list)) {
           reset($list);
           while (list($key, $val) = each($list)) {
               if (imap_utf7_decode($val) == $this->namespace.$mailbox) {
                   $exists = true;
               }
           }
        }
        return $exists;
    }

    public function copytosentfolder($maildata, &$ev, $sent_folder_name) {
        if (!(imap_append($this->conn, '{'.$this->server.'}'.$this->namespace.$sent_folder_name, $maildata, "\\Seen"))) {
            $ev = new NoccException("could not copy mail into $sent_folder_name folder: ".imap_last_error());
            return false;
        }
        return true;
    }

    /*
     * These functions are static, but if we could re-implement them without
     * requiring PHP IMAP support, more people can use NOCC.
     */
    public static function base64($file) {
        return imap_base64($file);
    }

    public static function i8bit($file) {
        return imap_8bit($file);
    }

    public static function qprint($file) {
        return imap_qprint($file);
    }

    /**
     * Decode  BASE64 or QUOTED-PRINTABLE data
     * @param string $data Encoded data
     * @param string $transfer BASE64 or QUOTED-PRINTABLE?
     * @return string Decoded data
     * TODO: Better name?
     */
    public static function decode($data, $transfer) {
        if ($transfer == 'BASE64') { //if BASE64...
            return nocc_imap::base64($data);
        }
        elseif ($transfer == 'QUOTED-PRINTABLE') { //if QUOTED-PRINTABLE...
            return nocc_imap::qprint($data);
        }
        else { //if NOT BASE64/QUOTED-PRINTABLE...
            return $data;
        }
    }

    public static function mime_header_decode($header) {
        $source = imap_mime_header_decode($header);
        $result[] = new result;
        $result[0]->text='';
        $result[0]->charset='ISO-8859-1';
        for ($j = 0; $j < count($source); $j++ ) {
            $element_charset =  ($source[$j]->charset == 'default') ? detect_charset($source[$j]->text) : $source[$j]->charset;

            $element_converted = os_iconv($element_charset, 'UTF-8', $source[$j]->text);
            $result[$j]->text = $element_converted;
            $result[$j]->charset = 'UTF-8';
        }
        return $result;
    }

    /*
     * These are general utility functions that extend the imap interface.
     */
    public function html_folder_select($value, $selected = '') {
        $folders = $this->get_nice_subscribed($ev);
        if (NoccException::isException($ev)) {
            return "<p class=\"error\">Error retrieving folder pulldown: ".$ev->getMessage()."</p>";
        }
        if (!is_array($folders) || count($folders) < 1) {
            return "<p class=\"error\">Not currently subscribed to any mailboxes</p>";
        }
        reset($folders);

        $html_select = "<select class=\"button\" id=\"$value\" name=\"$value\">\n";
        foreach ($folders as $folder) {
            $html_select .= "\t<option ".($folder == $selected ? "selected=\"selected\"" : "")." value=\"$folder\">".mb_convert_encoding($folder, 'UTF-8', 'UTF7-IMAP')."</option>\n";
        }
        $html_select .= "</select>\n";
        return $html_select;
    }

    public function get_folder_count() {
        return count($this->getsubscribed($ev));
    }

    public function get_page_count() {
        $num_messages = $this->num_msg();
        if ($num_messages == 0) {
            return 0;
        }
        else {
            $per_page = get_per_page();
            $pages = ceil($num_messages / $per_page);
            return $pages;
        }
    }

    public function get_nice_subscribed(&$ev) {
        $folders = $this->getsubscribed($ev);
        if(NoccException::isException($ev)) return;
        reset($folders);
        $subscribed = array();
        foreach ($folders as $folder) {
            $folder_name = substr(strstr($folder->name, '}'), 1);
            if (!(in_array($folder_name, $subscribed))) {
                array_push($subscribed, $folder_name);
            }
        }
        return $subscribed;
    }

    public function get_quota_usage($mailbox) {
        return @imap_get_quotaroot($this->conn, $mailbox);
    }
      
    public function status($foldername) {
        return imap_status($this->conn, $foldername, SA_ALL);
    }

    /**
     * Test function
     */
    public function test() {
        imap_mailboxmsginfo($this->conn, $ev);
        if (NoccException::isException($ev)) {
            print "<p class=\"error\">imap_mailboxmsginfo() failed: ".$ev->getMessage(). "</p>\n";
            return;
        }
        print "<p>Date: "    . $check->Date    ."</p>\n" ;
        print "<p>Driver: "  . $check->Driver  ."</p>\n" ;
        print "<p>Mailbox: " . $check->Mailbox ."</p>\n" ;
        print "<p>Messages: ". $check->Nmsgs   ."</p>\n" ;
        print "<p>Recent: "  . $check->Recent  ."</p>\n" ;
        print "<p>Unread: "  . $check->Unread  ."</p>\n" ;
        print "<p>Deleted: " . $check->Deleted ."</p>\n" ;
        print "<p>Size: "    . $check->Size    ."</p>\n" ;
    }

    /**
     * Convert text smilies to graphical smilies
     * TODO: Static?
     */
    public function graphicalsmilies($body) {
        $user_prefs = $_SESSION['nocc_user_prefs'];
        if (isset($user_prefs->graphical_smilies) && $user_prefs->graphical_smilies) {
            $theme = new NOCC_Theme($_SESSION['nocc_theme']);
            $body = $theme->replaceTextSmilies($body);
        }
        return ($body);
    }
}

?>
