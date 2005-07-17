<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/class_local.php,v 1.39 2005/07/07 10:22:45 goddess_skuld Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 * Copyright 2002 Mike Rylander <mrylander@mail.com>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Moved all imap_* PHP calls into one, which should make it easier to write
 * our own IMAP/POP3 classes in the future.
 */

require_once 'exception.php';
require_once 'detect_cyr_charset.php';

class result
{
  var $text = "";
  var $charset = "";
}

class nocc_imap
{
    var $server;
    var $login;
    var $passwd;
    var $conn;
    var $folder;
    var $namespace;

    // constructor        
    function nocc_imap(&$ev)
    {
        global $lang_could_not_connect;
        if(!isset($_SESSION['nocc_servr']) || !isset($_SESSION['nocc_folder']) || !isset($_SESSION['nocc_login']) || !isset($_SESSION['nocc_passwd'])) {
	    $ev = new NoccException($lang_could_not_connect);
            return;
        }

        $this->server = $_SESSION['nocc_servr'];
        $this->folder = $_SESSION['nocc_folder'];
        $this->login = $_SESSION['nocc_login'];
        $this->passwd = $_SESSION['nocc_passwd'];
        $this->namespace = $_SESSION['imap_namespace'];

        // $ev is set if there is a problem with the connection
        $conn = @imap_open('{'.$this->server.'}'.$this->folder, $this->login, $this->passwd, 0);
        if(!$conn) {
            $ev = new NoccException($lang_could_not_connect.": ".imap_last_error());
            return;
        }
        $this->conn = $conn;

        return $this;
    }

    function reopen($box, $flags = '', &$ev) {
        if(!imap_reopen($this->conn, $box, $flags)) {
            $ev = new NoccException(imap_last_error());
        }
    }

    function search($crit, $flags = '', &$ev) {
        $messages = imap_search($this->conn, $crit, $flags);
        if(is_array($messages))
            return $messages;
        
        $error = imap_last_error();
        if(empty($error))
            return array();
        
        $ev = new NoccException("imap_search: ".imap_last_error());
        return;
    }

    function fetchstructure(&$msgnum, &$ev) {
        $structure = imap_fetchstructure($this->conn, $msgnum);
        if(!is_object($structure)) {
            $ev = new NoccException("imap_fetchstructure did not return an object: ".imap_last_error());
            return;
        }
        return $structure;
    }

    function fetchheader(&$msgnum, &$ev) {
        return imap_fetchheader($this->conn, $msgnum);
    }

    function fetchbody(&$msgnum, &$partnum, &$ev) {
        return imap_fetchbody($this->conn, $msgnum, $partnum);
    }

    function body(&$msgnum, &$ev) {
        return imap_body($this->conn, $msgnum);
    }

    function num_msg() {
        return imap_num_msg($this->conn);
    }

    function msgno(&$msgnum) {
        return imap_msgno($this->conn, $msgnum);
    }

    function sort(&$sort, &$sortdir, &$ev, $useuid) {
        if ($useuid) {
            return imap_sort($this->conn, $sort, $sortdir, SE_UID|SE_NOPREFETCH);
        } else {
            return imap_sort($this->conn, $sort, $sortdir, SE_NOPREFETCH);
        }
    }

    function headerinfo(&$msgnum, &$ev) {
        $headers = imap_headerinfo($this->conn, $msgnum, $ev);
        if(NoccException::isException($ev)) return;
        if(!is_object($headers)) {
            $ev = new NoccException("Could not get header info: ".imap_last_error());
            return;
        }
        return $headers;
    }

    // From what I can find, this will not work on Cyrus imap servers .
    // [I will test this, I use Cyrus IMAP - Ross]
    function deletemailbox(&$old_box, &$ev) {
        if(!imap_deletemailbox($this->conn, '{'.$this->server.'}'.$old_box)) {
            $ev = new NoccException(imap_last_error());
        }
    }

    function renamemailbox(&$old_box, &$new_box, &$ev) {
        if(!imap_renamemailbox($this->conn, '{'.$this->server.'}'.$old_box, '{'.$this->server.'}'.$this->namespace.$new_box)) {
            $ev = new NoccException(imap_last_error());
        }
    }

    function createmailbox(&$new_box, &$ev) {
        if(!imap_createmailbox($this->conn, '{'.$this->server.'}'.$this->namespace.$new_box)) {
            $ev = new NoccException(imap_last_error());
        }
    }

    function mail_copy(&$mail, &$new_box, &$ev) {
        return imap_mail_copy($this->conn, $mail, $new_box, 0);
    }

    function subscribe(&$new_box, &$ev, $isnewbox) {
        if ($isnewbox) {
            return imap_subscribe($this->conn, '{'.$this->server.'}'.$this->namespace.$new_box);
        } else {
            return imap_subscribe($this->conn, '{'.$this->server.'}'.$new_box);
        }
    }

    function unsubscribe(&$old_box, &$ev) {
        return imap_unsubscribe($this->conn, '{'.$this->server.'}'.$old_box);
    }

    function mail_move(&$mail, &$new_box, &$ev) {
        return imap_mail_move($this->conn, $mail, $new_box, 0);
    }

    function expunge(&$ev) {
        return imap_expunge($this->conn);
    }

    function delete(&$mail, &$ev) {
        return imap_delete($this->conn, $mail, 0);
    }

    function close() {
        return imap_close($this->conn, CL_EXPUNGE);
    }

    function is_imap() {
        $check = imap_mailboxmsginfo($this->conn);
        return ($check->{'Driver'} == 'imap');
    }

    function utf7_decode(&$thing) {
        return imap_utf7_decode($thing);
    }

    function utf7_encode(&$thing) {
        return imap_utf7_encode($thing);
    }

    function getmailboxes(&$ev) {
        $mailboxes = imap_getmailboxes($this->conn, '{'.$this->server.'}', '*');
        if(!is_array($mailboxes)) {
            $ev = new NoccException("imap_getmailboxes did not return an array: ".imap_last_error());
            return;
        }
        return $mailboxes;
    }

    function getsubscribed(&$ev) {
        $subscribed = imap_getsubscribed($this->conn, '{'.$this->server.'}', '*');
        if(is_array($subscribed))
            return $subscribed;
        
        $error = imap_last_error();
        if(empty($error))
            return array();
        
        $ev = new NoccException("imap_getsubscribed: ".imap_last_error());
        return;
    }
    
    function mail_mark_read(&$mail, &$ev) {
        return imap_setflag_full($this->conn,  imap_uid($this->conn, $mail), "\\Seen", ST_UID);
    }
    function mail_mark_unread(&$mail, &$ev) {
        return imap_clearflag_full($this->conn, imap_uid($this->conn, $mail), "\\Seen",ST_UID);
    }

    function exists(&$mailbox, &$ev) {
        $exists = false;
        $list = imap_list($this->conn, '{'.$this->server.'}', '*');
        if(is_array($list)) {
           reset($list);
           while (list($key, $val) = each($list)) {
               if (imap_utf7_decode($val) == $this->namespace.$mailbox) {
                   $exists = true;
               }
           }
        }
        return $exists;
    }

    function copytosentfolder(&$maildata, &$ev, &$sent_folder_name) {
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
    function base64(&$file) {
        return imap_base64($file);
    }

    function i8bit(&$file) {
        return imap_8bit($file);
    }

    function qprint(&$file) {
        return imap_qprint($file);
    }

    function mime_header_decode(&$header) {
        $output_charset = $GLOBALS['charset'];
        $source = imap_mime_header_decode($header);
        $result[] = new result;
        $result[0]->text=''; $result[0]->charset='US-ASCII';
        for ($j = 0; $j < count($source); $j++ ) {
            $element_charset =  ($source[$j]->charset == "default") ? detect_charset($source[$j]->text) : $source[$j]->charset;
            if ($element_charset == 'x-unknown')
              $element_charset = $GLOBALS['charset'];
            $element_converted = @iconv( $element_charset, $output_charset, $source[$j]->text);
            $result[$j]->text = $element_converted;
            $result[$j]->charset = $output_charset;
        }
        return $result;
    }

    /*
     * These are general utility functions that extend the imap interface.
     */
    function html_folder_select($value, $selected = '') {
        $folders = $this->get_nice_subscribed($ev);
        if(NoccException::isException($ev)) {
                return "<p class=\"error\">Error retrieving folder pulldown: ".$ev->getMessage()."</p>";
        }
        if(!is_array($folders) || count($folders) < 1) {
                return "<p class=\"error\">Not currently subscribed to any mailboxes</p>";
        }
        reset($folders);

        $html_select = "<select name=\"$value\">\n";
        foreach($folders as $folder) {
            $html_select .= "\t<option ".($folder == $selected ? "selected" : "")." value=\"$folder\">$folder</option>\n";
        }
        $html_select .= "</select>\n";
        return $html_select;
    }


    function get_page_count(&$conf) {
        if (($num_messages = $this->num_msg()) == 0) {
            return 0;
        } else {
            $per_page = get_per_page();
            $pages = ceil($num_messages / $per_page);
            return $pages;
        }
    }

    function get_nice_subscribed(&$ev) {
        $folders = $this->getsubscribed($ev);
        if(NoccException::isException($ev)) return;
        reset($folders);
        $subscribed = array();
        foreach($folders as $folder) {
            $folder_name = substr(strstr($folder->name, '}'), 1);
            if (!(in_array($folder_name, $subscribed))) {
                array_push($subscribed, $folder_name);
            }
        }
        return $subscribed;
    }

    function get_quota_usage(&$mailbox) {
      return imap_get_quotaroot($this->conn, $mailbox);
    }
      

    /*
     * Test function
     */
    function test() {
        imap_mailboxmsginfo($this->conn, $ev);
        if(NoccException::isException($ev)) {
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

    /*
     * Convert text smilies to graphical smilies
     */
    function graphicalsmilies($body) {
      $user_prefs = $_SESSION['nocc_user_prefs'];
      if (isset($user_prefs->graphical_smilies) && $user_prefs->graphical_smilies) {
        $body = ereg_replace("\;-?\)","<img src=\"themes/" . $_SESSION['nocc_theme'] . "/img/wink.gif\" alt=\"wink\">", $body);
	$body = ereg_replace("\;-?D","<img src=\"themes/" . $_SESSION['nocc_theme'] . "/img/grin.gif\" alt=\"grin\">", $body);
	$body = ereg_replace(":\'\(?","<img src=\"themes/" . $_SESSION['nocc_theme'] . "/img/cry.gif\" alt=\"cry\">", $body);
	$body = ereg_replace(":-?[xX]","<img src=\"themes/" . $_SESSION['nocc_theme'] . "/img/confused.gif\" alt=\"confused\">", $body);
	$body = ereg_replace(":-?\[\)","<img src=\"themes/" . $_SESSION['nocc_theme'] . "/img/embarassed.gif\" alt=\"embarassed\">", $body);
	$body = ereg_replace(":-?\*","<img src=\"themes/" . $_SESSION['nocc_theme'] . "/img/love.gif\" alt=\"love\">", $body);
	$body = ereg_replace(":-?[pP]","<img src=\"themes/" . $_SESSION['nocc_theme'] . "/img/tongue.gif\" alt=\"tongue\">", $body);
	$body = ereg_replace(":-?\)","<img src=\"themes/" . $_SESSION['nocc_theme'] . "/img/happy.gif\" alt=\"happy\">", $body);
	$body = ereg_replace(":-?\(","<img src=\"themes/" . $_SESSION['nocc_theme'] . "/img/unhappy.gif\" alt=\"unhappy\">", $body);
	$body = ereg_replace(":-[oO]","<img src=\"themes/" . $_SESSION['nocc_theme'] . "/img/surprised.gif\" alt=\"surprised\">", $body);
	$body = ereg_replace("8-?\)","<img src=\"themes/" . $_SESSION['nocc_theme'] . "/img/cool.gif\" alt=\"cool\">", $body);
      }
      return ($body);
    }
}

?>
