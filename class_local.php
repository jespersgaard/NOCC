<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/class_local.php,v 1.5 2002/03/23 10:19:31 rossigee Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
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

	// constructor		
	function nocc_imap($server, &$login, &$password, &$ev)
	{
		global $lang_could_not_connect;

		$this->server = $server;
		$this->login = $login;
		$this->password = $password;

		// $ev is set if there is a problem with the connection
		$this->conn = @imap_open($server, $login, $password);
		if(!$this->conn) {
			$errors = imap_errors();
			$problem = "";
			foreach($errors as $error)
				$problem .= $error."\n";
			$ev = new Exception($lang_could_not_connect.": ".$problem);
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
		return imap_sort($this->conn, $sort, $sortdir, SE_UID);
	}

	function headerinfo(&$msgnum) {
		return imap_headerinfo($this->conn, $msgnum);
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
