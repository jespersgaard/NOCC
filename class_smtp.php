<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/class_smtp.php,v 1.31 2004/09/14 10:52:26 goddess_skuld Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Class based on a work from Unk <rgroesb_garbage@triple-it_garbage.nl>  
 */

require_once 'exception.php';

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
            return new NoccException($html_smtp_no_con . ' : ' . $errstr); 
        $line = fgets($smtp, 1024);

        if (substr($line, 0, 1) != '2')
            return new NoccException($html_smtp_error_unexpected . ' : ' . $line); 
        
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
            return new NoccException($html_smtp_error_unexpected . ' : ' . $line); 
        
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

        if (substr($line, 0, 1) != '2')
            return new NoccException($html_smtp_error_unexpected . ' : ' . $line); 

        return (true);
    } 
    
    function smtp_auth($smtp)
    {
      require_once 'crypt.php';
      switch ($_SESSION['smtp_auth']) {
          case 'LOGIN':
              fputs($smtp, "auth login\r\n"); 
              $this->sessionlog .= "Sent: auth login";
              $line = fgets($smtp, 1024);
              $this->sessionlog .= "Rcvd: $line";
              if (substr($line, 0, 1) != '3')
                  return new NoccException($html_smtp_error_unexpected . ' : ' . $line);
                  
              fputs($smtp, base64_encode($_SESSION['nocc_login']) . "\r\n"); 
              $this->sessionlog .= "Sent: encoded login";
              $line = fgets($smtp, 1024);
              $this->sessionlog .= "Rcvd: $line";
              if (substr($line, 0, 1) != '3')
                  return new NoccException($html_smtp_error_unexpected . ' : ' . $line);
                  
              fputs($smtp, base64_encode(decpass($_SESSION['nocc_passwd'], $_COOKIE['NoccKey'])) . "\r\n"); 
              $this->sessionlog .= "Sent: encoded password";
              $line = fgets($smtp, 1024);
              $this->sessionlog .= "Rcvd: $line";
              if (substr($line, 0, 1) != '2')
                  return new NoccException($html_smtp_error_unexpected . ' : ' . $line);
              return (true);
              break;
          case 'PLAIN':
              fputs($smtp, "auth plain " . base64_encode($_SESSION['nocc_login'] . chr(0) . $_SESSION['nocc_login'] . chr(0) . decpass($_SESSION['nocc_passwd'], $_COOKIE['NoccKey'])) . "\r\n");
              $this->sessionlog .= "Sent: encoded auth";
              $line = fgets($smtp, 1024);
              $this->sessionlog .= "Rcvd: $line";
              if (substr($line, 0, 1) != '2')
	          return new NoccException($html_smtp_error_unexpected . ' : ' . $line);
              return (true);
              break;
          case '':
              return (true);
      }
      return (true);
    }

    function smtp_mail_from($smtp) 
    {
        fputs($smtp, "MAIL FROM:$this->from\r\n"); 
        $this->sessionlog .= "Sent: MAIL FROM:$this->from";
        $line = fgets($smtp, 1024);
        $this->sessionlog .= "Rcvd: $line";

        if (substr($line, 0, 1) <> '2')
            return new NoccException($html_smtp_error_unexpected . ' : ' . $line);

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
                return new NoccException($html_smtp_error_unexpected . ' : ' . $line);
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
                return new NoccException($html_smtp_error_unexpected . ' : ' . $line);
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
                return new NoccException($html_smtp_error_unexpected . ' : ' . $line);
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
            return new NoccException($html_smtp_error_unexpected . ' : ' . $line); 
        
        fputs($smtp, "$this->data"); 
        fputs($smtp, "\r\n.\r\n"); 
        $line = fgets($smtp, 1024); 
        $this->sessionlog .= "Rcvd: $line";
        if (substr($line, 0, 1) !=  '2')
            return new NoccException($html_smtp_error_unexpected . ' : ' . $line); 

        return (true);
    }
  
    function smtp_quit($smtp) 
    {
        fputs($smtp,  "QUIT\r\n"); 
        $this->sessionlog .= "Sent: QUIT";
        $line = fgets($smtp, 1024);
        $this->sessionlog .= "Rcvd: $line";

        if (substr($line, 0, 1) !=  '2')
            return new NoccException($html_smtp_error_unexpected . ' : ' . $line); 

        return (true);
    }

    function send()
    {
        $smtp = $this->smtp_open();
        if(NoccException::isException($smtp))
            return $smtp;
        $ev = $this->smtp_helo($smtp);
        if(NoccException::isException($ev))
            return $ev;
        $ev = $this->smtp_auth($smtp);
        if(NoccException::isException($ev))
            return $ev;
        $ev = $this->smtp_mail_from($smtp);
        if(NoccException::isException($ev))
            return $ev;
        $ev = $this->smtp_rcpt_to($smtp);
        if(NoccException::isException($ev))
            return $ev;
        $ev = $this->smtp_data($smtp);
        if(NoccException::isException($ev))
            return $ev;
        $ev = $this->smtp_quit($smtp);
        if(NoccException::isException($ev))
            return $ev;
        return (true);
    }
}
?>
