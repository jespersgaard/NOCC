<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/class_local.php,v 1.15 2002/04/17 21:22:21 mrylander Exp $
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

class nocc_imap
{
    var $server;
    var $login;
    var $password;
    var $conn;
    var $folder;

    // constructor        
    function nocc_imap($server, $folder, &$login, &$password, &$ev)
    {
        global $lang_could_not_connect;

        $this->server = $server;
        $this->login = $login;
        $this->password = $password;

        // $ev is set if there is a problem with the connection
        $this->conn = imap_open('{'. $server .'}'.$folder, $login, $password);
        if(!$this->conn) {
            $errors = imap_errors();
            if(count($errors) > 0) {
                $ev = new Exception($lang_could_not_connect.": ".$errors[0]);
            }
            else {
                $ev = new Exception($lang_could_not_connect);
            }
            return;
        }

        return $this;
    }

    function fetchstructure(&$msgnum) {
        return imap_fetchstructure($this->conn, $msgnum);
    }

    function fetchheader(&$msgnum) {
        return imap_fetchheader($this->conn, $msgnum);
    }

    function fetchbody(&$msgnum, &$partnum) {
        return imap_fetchbody($this->conn, $msgnum, $partnum);
    }

    function body(&$msgnum) {
        return imap_body($this->conn, $msgnum);
    }

    function num_msg() {
        return imap_num_msg($this->conn);
    }

    function msgno(&$msgnum) {
        return imap_msgno($this->conn, $msgnum);
    }

    function sort(&$sort, &$sortdir) {
        return imap_sort($this->conn, $sort, $sortdir, SE_UID|SE_NOPREFETCH);
    }

    function headerinfo(&$msgnum) {
        return imap_headerinfo($this->conn, $msgnum);
    }

    // From what I can find, this will not work on Cyrus imap servers.
    function deletemailbox(&$old_box) {
        return imap_deletemailbox($this->conn, '{'.$this->server.'}'.$old_box);
    }

    function renamemailbox(&$old_box, &$new_box) {
        return imap_renamemailbox($this->conn, '{'.$this->server.'}'.$old_box, '{'.$this->server.'}'.$new_box);
    }

    function createmailbox(&$new_box) {
        return imap_createmailbox($this->conn, '{'.$this->server.'}'.$new_box);
    }

    function mail_copy(&$mail, &$new_box) {
        return imap_mail_copy($this->conn, $mail, $new_box, 0);
    }

    function subscribe(&$new_box) {
        return imap_subscribe($this->conn, '{'.$this->server.'}'.$new_box);
    }

    function unsubscribe(&$old_box) {
        return imap_unsubscribe($this->conn, '{'.$this->server.'}'.$old_box);
    }

    function mail_move(&$mail, &$new_box) {
        return imap_mail_move($this->conn, $mail, $new_box, 0);
    }

    function delete(&$mail) {
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

    function getmailboxes() {
        if ($this->is_imap()) {
            return imap_getmailboxes($this->conn, '{'.$this->server.'}', '*');
        } else {
            $temp = array();
            return $temp;
        }
    }

    function getsubscribed() {
        if ($this->is_imap()) {
            return imap_getsubscribed($this->conn, '{'.$this->server.'}', '*');
        } else {
            $temp = array();
            return $temp;
        }
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
        return imap_mime_header_decode($header);
    }

    /*
     * These are general utility functions that extend the imap interface.
     */
    function html_folder_select($value, $selected = '') {
        $list = $this->get_nice_subscribed();

        if(is_array($list) && count($list) > 0) {
            reset($list);

            $html_select = "<SELECT name=\"$value\">\n";

            $select = '';
            while (list($junk, $name) = each($list)) {
                if ($name == $selected) {
                    $select = "selected";
                } else {
                    $select = "";
                }
                $html_select .= "\t<OPTION $select value=\"$name\">$name</OPTION>\n";
            }
            $html_select .= "</select>\n";
            return $html_select;
        }
    }


    function get_page_count(&$conf) {
        if (($num_messages = $this->num_msg()) == 0) {
            return 0;
        } else {
            $per_page = (getPref('msg_per_page')) ? getPref('msg_per_page') : (($conf->msg_per_page) ? $conf->msg_per_page : '25');
            $pages = ceil($num_messages / $per_page);
            return $pages;
        }
    }

    function get_nice_subscribed() {
        $ret = array();
        $s = $this->server;

        $list = $this->getsubscribed();
        if (is_array($list)) {
            reset($list);
            while (list($key,$val) = each($list)) {
                list($junk,$name) = split("$s}", $this->utf7_decode($val->name));
                if (!(in_array($name, $ret))) {
                    array_push($ret, $name);
                }
            }
        } else {
            return ($ret);
        }

        return ($ret);
    }

    /*
     * Test function
     */
    function test() {
        $check = imap_mailboxmsginfo($this->conn);
 
        if($check) {
            print "<p>Date: "    . $check->Date    ."</p>\n" ;
            print "<p>Driver: "  . $check->Driver  ."</p>\n" ;
            print "<p>Mailbox: " . $check->Mailbox ."</p>\n" ;
            print "<p>Messages: ". $check->Nmsgs   ."</p>\n" ;
            print "<p>Recent: "  . $check->Recent  ."</p>\n" ;
            print "<p>Unread: "  . $check->Unread  ."</p>\n" ;
            print "<p>Deleted: " . $check->Deleted ."</p>\n" ;
            print "<p>Size: "    . $check->Size    ."</p>\n" ;
        } else {
            print "<p class=\"error\">imap_check() failed: ".imap_last_error(). "</p>\n";
        }
    }
}

?>
