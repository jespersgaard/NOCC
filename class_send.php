<?

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

  /*
  *     void mime_mail()
  *     class constructor
  */         
	function mime_mail()
	{
		$this->parts = array();
		$this->to =  "";
		$this->cc = "";
		$this->bcc = "";
		$this->from =  "";
		$this->subject =  "";
		$this->body =  "";
		$this->headers =  "";
	}

  /*
  *     void add_attachment(string message, [string name], [string ctype], [string encoding])
  *     Add an attachment to the mail object
  */ 
	function add_attachment($message, $name, $ctype, $encoding)
	{
	$this->parts[] = array	(
                           "ctype" => $ctype,
                           "message" => $message,
                           "encoding" => $encoding,
                           "name" => $name
							);
	}

/*
 *      void build_message(array part=
 *      Build message parts of an multipart mail
 */ 
	function build_message($part)
	{
		$message = $part["message"];
		$encoding = $part["encoding"];
		switch($encoding)
		{
			case "base64":
				$message = chunk_split(base64_encode($message));
				break;
			case "quoted-printable":
				$message = imap_8bit($message);
				break;
			case "8bit":
				$message = imap_utf8($message);
				break;
			default:
				break;
		}
		return  "Content-Type: ".$part[ "ctype"].
                        ($part[ "name"]? "; name = \"".$part[ "name"]. "\"" :  "")."\nContent-Transfer-Encoding: $encoding\n\n$message\n";
	}

/*
 *      void build_multipart()
 *      Build a multipart mail
 */ 
	function build_multipart() 
	{
		$boundary =  "NextPart".md5(uniqid(time()));
		$multipart =  "Content-Type: multipart/mixed;\n\tboundary = $boundary\n\nThis is a MIME encoded message.\n\n--$boundary";
		
		for($i = sizeof($this->parts)-1; $i >= 0; $i--) 
			$multipart .=  "\n".$this->build_message($this->parts[$i]). "--$boundary";
		return $multipart.=  "--\n";
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
		return ($part);
	}

/*
 *      void send()
 *      Send the mail (last class-function to be called)
 */ 
	function send() 
	{
		$mime =  "";
		if ($smtp_server != "" && !empty($this->from)) 
			$mime .= "Reply-To: ".$this->from."\nErrors-To: ".$this->from."\n";
		elseif (!empty($this->from))
				$mime .= "From: ".$this->from. "\nReply-To: ".$this->from."\nErrors-To: ".$this->from."\n";
		if (!empty($this->cc))
			$mime .= "Cc: ".$this->cc."\n";
		if (!empty($this->bcc))
			$mime .= "Bcc: ".$this->bcc."\n";
		if (!empty($this->headers))
			$mime .= $this->headers. "\n";
		if (sizeof($this->parts) >= 1)
		{
			$this->add_attachment($this->body,  "",  "text/plain", "quoted-printable");
			$mime .= "MIME-Version: 1.0\n".$this->build_multipart();
		}
		else
		{
			$this->add_attachment($this->body,  "",  "text/plain", "8bit");
			$mime .= $this->build_body();
		}
		if ($this->smtp_server == "" || $this->smtp_port == "")
			mail($this->to, $this->subject,  "", $mime);
		else
		{
			require("class_smtp.php");
			if (($smtp = new smtp()) != 0)
			{
				$smtp->smtp_server = $this->smtp_server;
				$smtp->port = $this->smtp_port;
				$smtp->from = $this->from;
				$smtp->to = $this->to;
				$smtp->subject = $this->subject;
				$smtp->data = $mime;
				$smtp->send();
			}
			else
				return 0;
		}
	}
};  // end of class  
?>
