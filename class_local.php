<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/class_local.php,v 1.25 2003/03/03 07:34:53 rossigee Exp $
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

class nocc_imap
{
    var $server;
    var $login;
    var $passwd;
    var $conn;
    var $folder;

    // constructor        
    function nocc_imap(&$ev)
    {
        global $lang_could_not_connect;

        $this->server = $_SESSION['nocc_servr'];
        $this->folder = $_SESSION['nocc_folder'];
        $this->login = $_SESSION['nocc_login'];
        $this->passwd = $_SESSION['nocc_passwd'];

        // $ev is set if there is a problem with the connection
        $conn = imap_open('{'.$this->server.'}'.$this->folder, $this->login, $this->passwd, 0);
        if(!$conn) {
            $ev = new Exception($lang_could_not_connect.": ".imap_last_error());
            return;
        }
        $this->conn = $conn;

        return $this;
    }

    function reopen($box, $flags = '', &$ev) {
        if(!imap_reopen($this->conn, $box, $flags)) {
            $ev = new Exception(imap_last_error());
        }
    }

    function search($crit, $flags = '', &$ev) {
        $messages = imap_search($this->conn, $crit, $flags);
        if(is_array($messages))
            return $messages;
        
        $error = imap_last_error();
        if(empty($error))
            return array();
        
        $ev = new Exception("imap_search: ".imap_last_error());
        return;
    }

    function fetchstructure(&$msgnum, &$ev) {
        $structure = imap_fetchstructure($this->conn, $msgnum);
        if(!is_object($structure)) {
            $ev = new Exception("imap_fetchstructure did not return an object: ".imap_last_error());
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

    function sort(&$sort, &$sortdir, &$ev) {
        return imap_sort($this->conn, $sort, $sortdir, SE_UID|SE_NOPREFETCH);
    }

    function headerinfo(&$msgnum, &$ev) {
        $headers = imap_headerinfo($this->conn, $msgnum, $ev);
        if(Exception::isException($ev)) return;
        if(!is_object($headers)) {
            $ev = new Exception("Could not get header info: ".imap_last_error());
            return;
        }
        return $headers;
    }

    // From what I can find, this will not work on Cyrus imap servers.
    // [I will test this, I use Cyrus IMAP - Ross]
    function deletemailbox(&$old_box, &$ev) {
        if(!imap_deletemailbox($this->conn, '{'.$this->server.'}'.$old_box)) {
            $ev = new Exception(imap_last_error());
        }
    }

    function renamemailbox(&$old_box, &$new_box, &$ev) {
        if(!imap_renamemailbox($this->conn, '{'.$this->server.'}'.$old_box, '{'.$this->server.'}'.$new_box)) {
            $ev = new Exception(imap_last_error());
        }
    }

    function createmailbox(&$new_box, &$ev) {
        if(!imap_createmailbox($this->conn, '{'.$this->server.'}'.$new_box)) {
            $ev = new Exception(imap_last_error());
        }
    }

    function mail_copy(&$mail, &$new_box, &$ev) {
        return imap_mail_copy($this->conn, $mail, $new_box, 0);
    }

    function subscribe(&$new_box, &$ev) {
        return imap_subscribe($this->conn, '{'.$this->server.'}'.$new_box);
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
            $ev = new Exception("imap_getmailboxes did not return an array: ".imap_last_error());
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
        
        $ev = new Exception("imap_getsubscribed: ".imap_last_error());
        return;
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
        $result[0]->text=''; $result[0]->charset='US-ASCII';
        for ($j = 0; $j < count($source); $j++ ) {
            $element_charset =  ($source[$j]->charset == "default") ? detect_charset($source[$j]->text) : $source[$j]->charset;
            $element_converted = ( function_exists('iconv') ) ? @iconv( $element_charset, $output_charset, $source[$j]->text) : FALSE;
            $result[$j]->text = ($element_converted===FALSE) ? $source[$j]->text : $element_converted;
            $result[$j]->charset = ($element_converted===FALSE) ? $element_charset : $output_charset;
        }
        return $result;
    }

    /*
     * These are general utility functions that extend the imap interface.
     */
    function html_folder_select($value, $selected = '') {
        $folders = $this->get_nice_subscribed($ev);
        if(Exception::isException($ev)) {
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
        if(Exception::isException($ev)) return;
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

    /*
     * Test function
     */
    function test() {
        imap_mailboxmsginfo($this->conn, $ev);
        if(Exception::isException($ev)) {
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
}

?>
