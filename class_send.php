<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/class_send.php,v 1.30 2001/05/30 13:10:43 nicocha Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 */

class mime_mail 
{
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

  /*
  *     void mime_mail()
  *     class constructor
  */         
	function mime_mail()
	{
		$this->parts = Array();
		$this->to =  Array();
		$this->cc = Array();
		$this->bcc = Array();
		$this->from =  '';
		$this->subject =  '';
		$this->body =  '';
		$this->headers =  '';
	}

  /*
  *     void add_attachment(string message, [string name], [string ctype], [string encoding], [string charset])
  *     Add an attachment to the mail object
  */ 
	function add_attachment($message, $name, $ctype, $encoding, $charset)
	{
	$this->parts[] = array	(
					'ctype' => $ctype,
                    'message' => $message,
                    'encoding' => $encoding,
					'charset' => $charset,
                    'name' => $name
					);
	}

/*
 *      void build_message(array part)
 *      Build message parts of a multipart mail
 */ 
	function build_message($part)
	{
		$message = $part['message'];
		$encoding = $part['encoding'];
		$charset = $part['charset'];
		switch($encoding)
		{
			case 'base64':
				$message = chunk_split(base64_encode($message));
				break;
			case 'quoted-printable':
				$message = imap_8bit($message);
				break;
			default:
				break;
		}
		$val = "Content-Type: ".$part['ctype'].";";
		$val .= ($part['charset'] ? " charset=".$part['charset'] : "");
		$val .= ($part['name'] ? "\r\n\tname=\"".$part['name']."\"" : "");
		$val .= "\r\nContent-Transfer-Encoding: ".$encoding;
		$val .= ($part['name'] ? "\r\nContent-Disposition: attachment;\r\n\tfilename=\"".$part['name']."\"" : "");
		$val .= "\r\n\r\n".$message."\r\n";
		return($val);
	}

/*
 *      void build_multipart()
 *      Build a multipart mail
 */ 
	function build_multipart() 
	{
		$boundary = "NextPart".md5(uniqid(time()));
		$multipart = "Content-Type: multipart/mixed;\r\n\tboundary = $boundary\r\n\r\nThis is a MIME encoded message.\r\n\r\n--".$boundary;
		
		for($i = sizeof($this->parts) - 1; $i >= 0; $i--) 
			$multipart .= "\r\n".$this->build_message($this->parts[$i])."--".$boundary;
		return ($multipart .= "--\r\n");
	}

/*
 *		void build_body()
 *		build a non multipart mail
*/

	function build_body()
	{
		if (sizeof($this->parts) == 1)
			$part = $this->build_message($this->parts[0]);
		else
			$part = "";
		return ($part."\r\n");
	}

/*
 *      void send()
 *      Send the mail (last class-function to be called)
 */ 
	function send() 
	{
		$mime = "";
		if (!empty($this->from))
			$mime .= "From: ".$this->from."\r\n";
		if (($this->smtp_server != '' && $this->smtp_port != '') && ($this->to[0] != ''))
			$mime .= "To: ".join(", ", $this->to)."\r\n"; 
		if ($this->cc[0] != '')
			$mime .= "Cc: ".join(', ', $this->cc)."\r\n";
		if ($this->bcc[0] != '')
			$mime .= "Bcc: ".join(', ', $this->bcc)."\r\n";
		if (!empty($this->from))
			$mime .= "Reply-To: ".$this->from."\r\nErrors-To: ".$this->from."\r\n";
		if (!empty($this->subject))
			$mime .= "Subject: ".$this->subject."\r\n";
		if (!empty($this->headers))
			$mime .= $this->headers."\r\n";
		if (sizeof($this->parts) >= 1)
		{
			$this->add_attachment($this->body,  '',  'text/plain', 'quoted-printable', $this->charset);
			$mime .= "MIME-Version: 1.0\r\n".$this->build_multipart();
		}
		else
		{
			$this->add_attachment($this->body,  '',  'text/plain', '8bit', $this->charset);
			$mime .= $this->build_body();
		}
		// Whether or not to use SMTP or sendmail
		// depends on the config file (conf.php)
		if ($this->smtp_server == '' || $this->smtp_port == '')
			return (mail(join(', ', $this->to), $this->subject,  '', $mime));
		else
		{
			if (($smtp = new smtp()) != 0)
			{
				$smtp->smtp_server = $this->smtp_server;
				$smtp->port = $this->smtp_port;
				$smtp->from = $this->from;
				$smtp->to = $this->to;
				$smtp->cc = $this->cc;
				$smtp->bcc = $this->bcc;
				$smtp->subject = $this->subject;
				$smtp->data = $mime;
				return ($smtp->send());
			}
			else
				return (0);
		}
	}
}  // end of class  
?>