<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/user_prefs.php,v 1.2 2002/06/30 21:43:45 rossigee Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 */

require_once 'exception.php';

class NOCCUserPrefs {
	var $key;
	var $full_name;
	var $email_address;
	var $msg_per_page;
	var $cc_self;
	var $hide_addresses;
	var $outlook_quoting;
	var $seperate_msg_win;
	var $reply_leadin;
	var $signature;

	// Set when preferences have not been commit
	var $dirty_flag;

	/*
	 * Default user profile
	 */
	function NOCCUserPrefs($key) {
		$this->key = $key;
		$this->dirty_flag = 1;
	}

	/*
	 * Return the current preferences for the given key. Key is
	 * 'login@domain'. If it cannot be found for any reason, it
	 * returns a default profile. If it can be found, but not
	 * read, it returns an exception.
	 */
	function read($key, &$ev) {
		global $conf;

		$prefs = new NOCCUserPrefs($key);

		/* Open the preferences file */
		$filename = $conf->prefs_dir . '/' . $key . '.pref';
		if (!file_exists($filename)) {
			error_log("$filename does not exist");
			return $prefs;
		}
		$file = fopen($filename, 'r');
		if(!$file) {
			$ev = new Exception("Could not open $filename for reading user preferences");
			return;
		}

		/* Read in all the preferences */
		$highlight_num = 0;
		while(!feof($file))
		{
			$line = trim(fgets($file, 1024));
			$equalsAt = strpos($line, '=');
			if($equalsAt <= 0) continue;

			$key = substr($line, 0, $equalsAt);
			$value = substr($line, $equalsAt + 1);

			if($key == 'full_name')
				$prefs->full_name = $value;
			if($key == 'email_address')
				$prefs->email_address = $value;
			if($key == 'msg_per_page')
				$prefs->msg_per_page = $value * 1;
			if($key == 'cc_self')
				$prefs->cc_self = ($value == 1 || $value == 'on');
			if($key == 'hide_addresses')
				$prefs->hide_addresses = ($value == 1 || $value == 'on');
			if($key == 'outlook_quoting')
				$prefs->outlook_quoting = ($value == 1 || $value == 'on');
			if($key == 'seperate_msg_win')
				$prefs->seperate_msg_win = ($value == 1 || $value == 'on');
			if($key == 'signature')
				$prefs->signature = base64_decode($value);
			if($key == 'reply_leadin')
				$prefs->reply_leadin = base64_decode($value);
		}
		fclose($file);
 
		$prefs->dirty_flag = 0;
		return $prefs;
	}

	/*
	 * If need be, write settings to file.
	 */
	function commit(&$ev) {
		global $conf;
		global $html_prefs_file_error;

		// Check it passes validation
		$this->validate($ev);
		if(Exception::isException($ev)) return;
		
		// Do we need to write?
		if(!$this->dirty_flag) return;

		// Write prefs to file
		$filename = $conf->prefs_dir . '/' . $this->key . '.pref';
		if(file_exists($filename) && !is_writable($filename))
			return (new Exception($html_prefs_file_error));
		$file = fopen($filename, 'w');
		if(!$file)
			return (new Exception($html_prefs_file_error));

		fwrite($file, "full_name=".$this->full_name."\n");
		fwrite($file, "email_address=".$this->email_address."\n");
		fwrite($file, "msg_per_page=".$this->msg_per_page."\n");
		fwrite($file, "cc_self=".$this->cc_self."\n");
		fwrite($file, "hide_addresses=".$this->hide_addresses."\n");
		fwrite($file, "outlook_quoting=".$this->outlook_quoting."\n");
		fwrite($file, "seperate_msg_win=".$this->seperate_msg_win."\n");
		fwrite($file, "reply_leadin=".base64_encode($this->reply_leadin)."\n");
		fwrite($file, "signature=".base64_encode($this->signature)."\n");
		fclose($file);

		$this->dirty_flag = 0;
	}

	/*
	 * Validate preferences.
	 */
	function validate(&$ev) {
		global $conf;
		global $html_invalid_email_address;

		if($conf->allow_address_change) {
			if(!valid_email($this->email_address)) {
				$ev = new Exception($html_invalid_email_address);
			}
		}
		else {
			$this->email_address = '';
		}

		// Give go-ahead to commit
		$this->dirty_flag = 1;
	}

	/*
	 * Format Reply Leadin
	 */
	function parseLeadin ($string, $content)
	{
		$col_time = strtotime($content['complete_date']);
		$converted_date = date("D, j M Y", $col_time);
		$string = str_replace('_DATE_', $converted_date, $string);
		$string = str_replace("_FROM_", $content['from'], $string);
		$string = str_replace("_TO_", $content['to'], $string);
		$string = str_replace("_SUBJECT_", $content['subject'], $string);
		return ($string."\n");
	}
}

?>