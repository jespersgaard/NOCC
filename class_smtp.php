<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/class_smtp.php,v 1.25 2001/12/03 10:54:42 nicocha Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Class based on a work from Unk <rgroesb_garbage@triple-it_garbage.nl>  
 */

require_once ('exception.php');

class smtp
{
	var $smtp_server;
	var $port;
	var $from;
	var $to;
	var $cc;
	var $bcc;
	var $subject;
	var $data;
	var $sessionlog = '';
		
	// This function is the constructor don't forget this one
	function smtp()
	{
		$this->smtp_server = '';
		$this->port = '';
		$this->from = '';
		$this->to = Array();
		$this->cc = Array();
		$this->bcc = Array();
		$this->subject = '';
		$this->data = '';
	}

	function smtp_open() 
	{
		$smtp = fsockopen($this->smtp_server, $this->port, $errno, $errstr); 
		if (!$smtp)
			return new Exception($html_smtp_no_con . ' : ' . $errstr); 
		$line = fgets($smtp, 1024);

		if (substr($line, 0, 1) != '2')
			return new Exception($html_smtp_error_unexpected . ' : ' . $line); 
		
		return $smtp;
	} 
	
	function smtp_helo($smtp) 
	{
		/* 'localhost' always works [Unk] */ 
		fputs($smtp, "helo localhost\r\n"); 
		$this->sessionlog .= "Sent: helo localhost";
		$line = fgets($smtp, 1024); 
		$this->sessionlog .= "Rcvd: $line";

		if (substr($line, 0, 1) != '2')
			return new Exception($html_smtp_error_unexpected . ' : ' . $line); 
		
		return (true);
	} 
  
	function smtp_ehlo($smtp) 
	{
		/* Well, let's use "helo" for now.. Until we need the 
		  extra func's   [Unk] 
		*/ 
		fputs($smtp, "ehlo localhost\r\n"); 
		$this->sessionlog .= "Sent: ehlo localhost";
		$line = fgets($smtp, 1024);
		$this->sessionlog .= "Rcvd: $line";

		if (substr($line, 0, 1) <> '2')
			return new Exception($html_smtp_error_unexpected . ' : ' . $line); 

		return (true);
	} 


	function smtp_mail_from($smtp) 
	{
		fputs($smtp, "MAIL FROM:$this->from\r\n"); 
		$this->sessionlog .= "Sent: MAIL FROM:$this->from";
		$line = fgets($smtp, 1024);
		$this->sessionlog .= "Rcvd: $line";

		if (substr($line, 0, 1) <> '2')
			return new Exception($html_smtp_error_unexpected . ' : ' . $line); 
		
		return (true);
	} 
  
	function smtp_rcpt_to($smtp) 
	{
		// Modified by nicocha to use to, cc and bcc field
		while ($tmp = array_shift($this->to))
		{
			if($tmp == '' || $tmp == '<>')
				continue;
			fputs($smtp, "RCPT TO:$tmp\r\n");
			$this->sessionlog .= "Sent: RCPT TO:$tmp";
			$line = fgets($smtp, 1024);
			$this->sessionlog .= "Rcvd: $line";
 
			if (substr($line, 0, 1) <> '2')
				return new Exception($html_smtp_error_unexpected . ' : ' . $line); 
		}
		while ($tmp = array_shift($this->cc))
		{
			if($tmp == '' || $tmp == '<>')
				continue;
			fputs($smtp, "RCPT TO:$tmp\r\n");
			$this->sessionlog .= "Sent: RCPT TO:$tmp";
			$line = fgets($smtp, 1024);
			$this->sessionlog .= "Rcvd: $line";

			if (substr($line, 0, 1) <> '2')
				return new Exception($html_smtp_error_unexpected . ' : ' . $line); 
		}
		while ($tmp = array_shift($this->bcc))
		{
			if($tmp == '' || $tmp == '<>')
				continue;
			fputs($smtp, "RCPT TO:$tmp\r\n"); 
			$this->sessionlog .= "Sent: RCPT TO:$tmp";
			$line = fgets($smtp, 1024);
			$this->sessionlog .= "Rcvd: $line";

			if (substr($line, 0, 1) <> '2')
				return new Exception($html_smtp_error_unexpected . ' : ' . $line); 
		}
		return (true);
	} 

	function smtp_data($smtp) 
	{
		fputs($smtp, "DATA\r\n"); 
		$this->sessionlog .= "Sent: DATA";
		$line = fgets($smtp, 1024);
		$this->sessionlog .= "Rcvd: $line";

		if (substr($line, 0, 1) != '3')
			return new Exception($html_smtp_error_unexpected . ' : ' . $line); 
		
		fputs($smtp, "$this->data"); 
		fputs($smtp, "\r\n.\r\n"); 
		$line = fgets($smtp, 1024); 
		$this->sessionlog .= "Rcvd: $line";
		if (substr($line, 0, 1) !=  '2')
			return new Exception($html_smtp_error_unexpected . ' : ' . $line); 

		return (true);
	}
  
	function smtp_quit($smtp) 
	{
		fputs($smtp,  "QUIT\r\n"); 
		$this->sessionlog .= "Sent: QUIT";
		$line = fgets($smtp, 1024);
		$this->sessionlog .= "Rcvd: $line";

		if (substr($line, 0, 1) !=  '2')
			return new Exception($html_smtp_error_unexpected . ' : ' . $line); 

		return (true);
	}

	function send()
	{
		$smtp = $this->smtp_open();
		if(Exception::isException($smtp))
			return $smtp;
		$ev = $this->smtp_helo($smtp);
		if(Exception::isException($ev))
			return $ev;
		$ev = $this->smtp_mail_from($smtp);
		if(Exception::isException($ev))
			return $ev;
		$ev = $this->smtp_rcpt_to($smtp);
		if(Exception::isException($ev))
			return $ev;
		$ev = $this->smtp_data($smtp);
		if(Exception::isException($ev))
			return $ev;
		$ev = $this->smtp_quit($smtp);
		if(Exception::isException($ev))
			return $ev;
		return (true);
	}
}
?>