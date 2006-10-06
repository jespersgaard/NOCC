<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/functions.php,v 1.218 2006/10/06 08:05:32 goddess_skuld Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 * Copyright 2002 Mike Rylander <mrylander@mail.com>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 */

require_once 'class_local.php';

/* ----------------------------------------------------- */

function inbox(&$pop, $skip = 0, &$ev)
{
    global $conf;
    global $charset;

    $user_prefs = $_SESSION['nocc_user_prefs'];

    $msg_list = array();

    $lang = $_SESSION['nocc_lang'];
    $sort = $_SESSION['nocc_sort'];
    $sortdir = $_SESSION['nocc_sortdir'];

    $num_msg = $pop->num_msg();
    $per_page = get_per_page();

    $start_msg = $skip * $per_page;
    $end_msg = $start_msg + $per_page;

    $sorted = $pop->sort($sort, $sortdir, $ev, true);
    if(NoccException::isException($ev)) return;

    $end_msg = ($num_msg > $end_msg) ? $end_msg : $num_msg;
    if ($start_msg > $num_msg) {
        return $msg_list;
    }

    for ($i = $start_msg; $i < $end_msg; $i++)
    {
        $subject = $from = $to = '';
        $msgnum = $sorted[$i];
        $pop_msgno_msgnum = $pop->msgno($msgnum);
        $ref_contenu_message = $pop->headerinfo($pop_msgno_msgnum, $ev);
        if(NoccException::isException($ev)) return;
        $struct_msg = $pop->fetchstructure($pop_msgno_msgnum, $ev);
        if(NoccException::isException($ev)) return;

        // Get message charset
	$msg_charset = '';
	if ($struct_msg->ifparameters) {
	  while ($obj = array_pop($struct_msg->parameters))
	    if (strtolower($obj->attribute) == 'charset') {
	      $msg_charset = $obj->value;
	      break;
	    }
	}
	if ($msg_charset == '') {
	  $msg_charset = 'ISO-8859-1';
	}

	// Get subject
        $subject_header = str_replace('x-unknown', $msg_charset, $ref_contenu_message->subject);
        $subject_array = nocc_imap::mime_header_decode($subject_header);
        
	for ($j = 0; $j < count($subject_array); $j++)
            $subject .= $subject_array[$j]->text;

	// Get from
	$from_header = str_replace('x-unknown', $msg_charset, $ref_contenu_message->fromaddress);
        $from_array = nocc_imap::mime_header_decode($from_header);
        for ($j = 0; $j < count($from_array); $j++)
            $from .= $from_array[$j]->text;

	// Get to
	$to_header = str_replace('x-unknown', $msg_charset, $ref_contenu_message->toaddress);
        $to_array = nocc_imap::mime_header_decode($to_header);
        for ($j = 0; $j < count($to_array); $j++) {
            $to = $to . $to_array[$j]->text . ", ";
        }
        $to = substr($to, 0, strlen($to)-2);
        $msg_size = 0;
        if ($pop->is_imap())
            $msg_size = get_mail_size($struct_msg);
        else
            if(isset($struct_msg->bytes))
                $msg_size = ($struct_msg->bytes > 1000) ? ceil($struct_msg->bytes / 1000) : 1;
        if (isset($struct_msg->type) && ( $struct_msg->type == 1 || $struct_msg->type == 3))
        {
            if ($struct_msg->subtype == 'ALTERNATIVE' || $struct_msg->subtype == 'RELATED')
                $attach = '&nbsp;';
            else
                $attach = '<img src="themes/' . $_SESSION['nocc_theme'] . '/img/attach.png" alt="" />';
        }
        else
            $attach = '&nbsp;';
        // Check Status Line with UCB POP Server to
        // see if this is a new message. This is a
        // non-RFC standard line header.
        // Set this in conf.php
        if ($conf->have_ucb_pop_server)
        {
            $header_msg = $pop->fetchheader($pop->msgno($msgnum), $ev);
            if(NoccException::isException($ev)) return;
            $header_lines = explode("\r\n", $header_msg);
            while (list($k, $v) = each($header_lines))
            {
                list ($header_field, $header_value) = explode(':', $v);
                if ($header_field == 'Status') 
                    $new_mail_from_header = $header_value;
            }
        }
        else
        {
            if (($ref_contenu_message->Unseen == 'U') || ($ref_contenu_message->Recent == 'N'))
                $new_mail_from_header = '';
            else
                $new_mail_from_header = '&nbsp;';
        }
        if ($new_mail_from_header == '')
            $newmail = '<img src="themes/' . $_SESSION['nocc_theme'] . '/img/new.png" alt=""/>';
        else
            $newmail = '&nbsp;';
        $timestamp = chop($ref_contenu_message->udate);
        $date = format_date($timestamp, $lang);
        $time = format_time($timestamp, $lang);
        $msg_list[$i] =  Array(
                'new' => $newmail, 
                'number' => $pop->msgno($msgnum),
                'attach' => $attach,
                'to' => $to,
                'from' => $from,
                'subject' => $subject, 
                'date' => $date,
                'time' => $time,
                'complete_date' => $date, 
                'size' => $msg_size,
                'sort' => $sort,
                'sortdir' => $sortdir);
    }
    return ($msg_list);
}

/* ----------------------------------------------------- */
function aff_mail(&$pop, &$attach_tab, &$mail, $verbose, &$ev)
{
    global $conf;
    global $lang_locale;
    global $no_locale_date_format;
    global $html_att, $html_atts;
    global $lang_invalid_msg_num;

    $sort = $_SESSION['nocc_sort'];
    $sortdir = $_SESSION['nocc_sortdir'];
    $lang = $_SESSION['nocc_lang'];

    // Clear variables
    $body = $subject = $from = $to = $cc = $reply_to = '';

    // Message Found boolean
    $msg_found = 0;

    // Get message numbers in sorted order
    // Do not use message UID, in order to get correct messages number with IMAP connexion
    $sorted = $pop->sort($sort, $sortdir, $ev, false);
    if(NoccException::isException($ev)) return;

    // Finding the next and previous message number
    $prev_msg = $next_msg = 0;
    for ($i = 0; $i < sizeof($sorted); $i++)
    {
        if ($mail == $sorted[$i])
        {
            $prev_msg = ($i - 1 >= 0) ? $sorted[$i - 1] : 0;
            $next_msg = ($i + 1 < sizeof($sorted)) ? $sorted[$i + 1] : 0;
	    $msg_found = 1;
            break;
        }
    }

    if(!$msg_found)
      {
	$ev = new NoccException($lang_invalid_msg_num);
	return;
      }

    // Get number of messages (why?)
    $num_messages = $pop->num_msg();

    // Get message header information (parsed)
    $ref_contenu_message = $pop->headerinfo($mail, $ev); 
    if(NoccException::isException($ev)) return;

    // Get the MIME message structure
    $struct_msg = $pop->fetchstructure($mail, $ev);
    if(NoccException::isException($ev)) return; 

    // If there are attachments, populate the attachment array, otherwise
    // just get the main body as a single-element array
    if ($struct_msg->type == 3 || (isset($struct_msg->parts) && (sizeof($struct_msg->parts) > 0)))
        GetPart($attach_tab, $struct_msg, NULL, $conf->display_rfc822);
    else {
        $pop_fetchheader_mail_ev = $pop->fetchheader($mail, $ev);
        $pop_body_mail_ev = $pop->body($mail, $ev);
        GetSinglePart($attach_tab, $struct_msg, $pop_fetchheader_mail_ev, $pop_body_mail_ev);
        if(NoccException::isException($ev)) return;
    }

    // If we are showing all headers, gather them into a header array
    $header = "";
    if (($verbose == 1) && ($conf->use_verbose == true)) {
        $header = $pop->fetchheader($mail, $ev);
        if(NoccException::isException($ev)) return;
    }

    // Get the first part
    $tmp = array_pop($attach_tab);
    if ($struct_msg->type == 3) {
        $body = '';
    } else {
        $body = $pop->fetchbody($mail, $tmp['number'], $ev);
    }
    if(NoccException::isException($ev)) return;

    if (eregi('text/html', $tmp['mime']) || eregi('text/plain', $tmp['mime']))
    {
        if ($tmp['transfer'] == 'QUOTED-PRINTABLE')
            $body = nocc_imap::qprint($body);
        if ($tmp['transfer'] == 'BASE64')
            $body = base64_decode($body);
        $body = remove_stuff($body, $tmp['mime']);
        $body_charset =  ($tmp['charset'] == "default") ? detect_charset($body) : $tmp['charset'];
        // Convert US-ASCII to ISO-8859-1 for systems which have difficulties with.
        if (strtolower($body_charset) == "us-ascii") {
           $body_charset = "ISO-8859-1";
        }
        // Use default charset if no charset is provided by the displayed mail.
        // If no default charset is defined, use ISO-8859-1.
        if ($body_charset == "" || $body_charset == null) {
          if (isset($conf->default_charset) && $conf->default_charset != "") {
            $body_charset = $conf->default_charset;
          } else {
            $body_charset = "ISO-8859-1";
          }
        }

        // If user has selected another charset, we'll use it
        if (isset($_REQUEST['user_charset']) && $_REQUEST['user_charset'] != '') {
          $body_charset = $_REQUEST['user_charset'];
        }

        $body_converted = @iconv( $body_charset, $GLOBALS['charset'], $body);
        $body = ($body_converted===FALSE) ? $body : $body_converted;
        $tmp['charset'] = ($body_converted===FALSE) ? $body_charset : $GLOBALS['charset'];
    }
    else
        array_push($attach_tab, $tmp);
    $link_att = '';
    if ($struct_msg->subtype != 'ALTERNATIVE' && $struct_msg->subtype != 'RELATED')
    {
        switch (sizeof($attach_tab))
        {
            case 0:
                break;
            case 1:
                $link_att = '<tr><th class="mailHeaderLabel right">' . $html_att . ':</th><td class="mailHeaderData">' . link_att($mail, $attach_tab, $conf->display_part_no) . '</td></tr>';
                break;
            default:
                $link_att = '<tr><th class="mailHeaderLabel right">' . $html_atts . ':</th><td class="mailHeaderData">' . link_att($mail, $attach_tab, $conf->display_part_no) . '</td></tr>';
                break;
        }
    }

    //Get message charset
    $struct_msg = $pop->fetchstructure($mail, $ev);
    if(NoccException::isException($ev)) return;
    $msg_charset = '';
    if ($struct_msg->ifparameters) {
      while ($obj = array_pop($struct_msg->parameters)) {
        if (strtolower($obj->attribute) == 'charset') {
          $msg_charset = $obj->value;
          break;
        }
      }
    }
    if ($msg_charset == '') {
      $msg_charset = 'ISO-8859-1';
    }

    // Get subject
    $subject_header = str_replace('x-unknown', $msg_charset, $ref_contenu_message->subject);
    $subject_array = nocc_imap::mime_header_decode($subject_header);
    for ($j = 0; $j < count($subject_array); $j++)
        $subject .= $subject_array[$j]->text;

    // Get from
    $from_header = str_replace('x-unknown', $msg_charset, $ref_contenu_message->fromaddress);
    $from_array = nocc_imap::mime_header_decode($from_header);
    for ($j = 0; $j < count($from_array); $j++)
        $from .= $from_array[$j]->text;

    // Get to
    $to_header = str_replace('x-unknown', $msg_charset, $ref_contenu_message->toaddress);
    $to_array = nocc_imap::mime_header_decode($to_header);
    for ($j = 0; $j < count($to_array); $j++)
        $to .= $to_array[$j]->text;
    $to = str_replace(',', ', ', $to);
    
    // Get cc
    $cc_header = isset($ref_contenu_message->ccaddress) ? $ref_contenu_message->ccaddress : '';
    $cc_header = str_replace('x-unknown', $msg_charset, $cc_header);
    $cc_array = isset($ref_contenu_message->ccaddress) ? nocc_imap::mime_header_decode($cc_header) : 0;
    if ($cc_array != 0) {
        for ($j = 0; $j < count($cc_array); $j++)
            $cc .= $cc_array[$j]->text;
    }
    $cc = str_replace(',', ', ', $cc);

    // Get reply to
    $reply_to_header = isset($ref_contenu_message->reply_toaddress) ? $ref_contenu_message->reply_toaddress : '';
    $reply_to_header = str_replace('x-unknown', $msg_charset, $reply_to_header);
    $reply_to_array = isset($ref_contenu_message->reply_toaddress) ? nocc_imap::mime_header_decode($reply_to_header) : 0;
    if ($reply_to_array != 0) {
        for ($j = 0; $j < count($reply_to_array); $j++)
            $reply_to .= $reply_to_array[$j]->text;
    }
    $timestamp = chop($ref_contenu_message->udate);
    $date = format_date($timestamp, $lang);
    $time = format_time($timestamp, $lang);
    $content = Array(
        'from' => $from,
        'to' => $to,
        'cc' => $cc,
        'reply_to' => $reply_to,
        'subject' => $subject,
        'date' => $date,
        'time' => $time,
        'complete_date' => $date,
        'att' => $link_att,
        'body' => $pop->graphicalsmilies($body),
        'body_mime' => htmlentities($tmp['mime']),
        'body_transfer' => htmlentities($tmp['transfer']),
        'header' => $header,
        'verbose' => $verbose,
        'prev' => $prev_msg,
        'next' => $next_msg,
        'msgnum' => $mail,
        'charset' => $body_charset
    );
    return ($content);
}

/* ----------------------------------------------------- */

// based on a function from matt@bonneau.net
function GetPart(&$attach_tab, &$this_part, $part_no, &$display_rfc822)
{
    $att_name = '[unknown]';
    if ($this_part->ifdescription == true)
        $att_name = $this_part->description;
    for ($i = 0; $i < count($this_part->parameters); $i++)
    {
        // PHP 5.x doesn't allow to convert a stdClass object to an array
	// We sometimes have this issue with Mailer daemon reports
	if (!(get_class($this_part->parameters) == "stdClass") &&
	    !(get_class($this_part->parameters) == "stdclass")) { 
            $param = $this_part->parameters[$i];
            if ((($param->attribute == 'NAME') || ($param->attribute == 'name')) && ($param->value != ''))
            {
                $att_name = $param->value;
                break;
            }
	}
    }
    if (isset($this_part->type))
    {
        switch ($this_part->type)
        {
            case 0:
                $mime_type = 'text';
                break;
            case 1:
                $mime_type = 'multipart';
                for ($i = 0; $i < count($this_part->parts); $i++)
                {
                    if ($part_no != '')
                        $part_no = $part_no . '.';
                    for ($i = 0; $i < count($this_part->parts); $i++)
                    {
                        // if it's an alternative, we skip the text part to only keep the HTML part
                        if ($this_part->subtype == 'ALTERNATIVE')// && $read == true)
                            GetPart($attach_tab, $this_part->parts[++$i], $part_no . ($i + 1), $display_rfc822);
                        else 
                            GetPart($attach_tab, $this_part->parts[$i], $part_no . ($i + 1), $display_rfc822);
                    }
                }
                break;
            case 2:
                $mime_type = 'message';
                // well it's a message we have to parse it to find attachments or text message
                if(isset($this_part->parts[0]->parts)) {
                    $num_parts = count($this_part->parts[0]->parts);
                    for ($i = 0; $i < $num_parts; $i++)
                        GetPart($attach_tab, $this_part->parts[0]->parts[$i], $part_no . '.' . ($i + 1), $display_rfc822);
                }
                break;
            // Maybe we can do something with the mime types later ??
            case 3:
                $mime_type = 'application';
                break;
            case 4:
                $mime_type = 'audio';
                break;
            case 5:
                $mime_type = 'image';
                break;
            case 6:
                $mime_type = 'video';
                break;
            case 7:
                $mime_type = 'other';
                break;
            default:
                $mime_type = 'unknown';
        }
    }
    else
        $mime_type = 'text';
    $full_mime_type = $mime_type . '/' . $this_part->subtype;
    if (isset($this_part->encoding))
    {
        switch ($this_part->encoding)
        {
            case 0:
                $encoding = '7BIT';
                break;
            case 1:
                $encoding = '8BIT';
                break;
            case 2:
                $encoding = 'BINARY';
                break;
            case 3:
                $encoding = 'BASE64';
                break;
            case 4:
                $encoding = 'QUOTED-PRINTABLE';
                break;
            case 5:
                $encoding = 'OTHER';
                break;
            default:
                $encoding = 'none';
                break;
        }
    }
    else
        $encoding = '7BIT';
    if (($full_mime_type == 'message/RFC822' && $display_rfc822 == true) || ($mime_type != 'multipart' && $full_mime_type != 'message/RFC822'))
    {
        $charset = '';
        if ($this_part->ifparameters)
            while ($obj = array_pop($this_part->parameters))
                if (strtolower($obj->attribute) == 'charset')
                {
                    $charset = $obj->value;
                    break;
                }
        $tmp = Array(
            'number' => ($part_no != '' ? $part_no : 1),
            'id' => $this_part->ifid ? $this_part->id : 0,
            'name' => $att_name,
            'mime' => $full_mime_type,
            'transfer' => $encoding,
            'disposition' => $this_part->ifdisposition ? $this_part->disposition : '',
            'charset' => $charset,
            'size' => ($this_part->bytes > 1000) ? ceil($this_part->bytes / 1000) : 1
        );

        array_unshift($attach_tab, $tmp);
    }
}

/* ----------------------------------------------------- */

// BUG: returns text/plain when Content-Type: application/x-zip (e.g.)

function GetSinglePart(&$attach_tab, &$this_part, &$header, &$body)
{
    if (eregi('text/html', $header))
        $full_mime_type = 'text/html';
    else
        $full_mime_type = 'text/plain';
    if (isset($this_part->encoding))
    {
        switch ($this_part->encoding)
        {
            case 0:
                $encoding = '7BIT';
                break;
            case 1:
                $encoding = '8BIT';
                break;
            case 2:
                $encoding = 'BINARY';
                break;
            case 3:
                $encoding = 'BASE64';
                break;
            case 4:
                $encoding = 'QUOTED-PRINTABLE';
                break;
            case 5:
                $encoding = 'OTHER';
                break;
            default:
                $encoding = 'none';
                break;
        }
    }
    else
        $encoding = '7BIT';
    $charset = '';
    if ($this_part->ifparameters)
        while ($obj = array_pop($this_part->parameters))
            if (strtolower($obj->attribute) == 'charset')
            {
                $charset = $obj->value;
                break;
            }
            $tmp = Array(
                'number' => 1,
                'id' => $this_part->ifid ? $this_part->id : 0,
                'name' => '',
                'mime' => $full_mime_type,
                'transfer' => $encoding,
                'disposition' => $this_part->ifdisposition ? $this_part->disposition : '',
                'charset' => $charset
            );
	    if(isset($this_part->bytes))
		    $tmp['size'] = ($this_part->bytes > 1000) ? ceil($this_part->bytes / 1000) : 1;

            array_unshift($attach_tab, $tmp);
}

/* ----------------------------------------------------- */

function remove_stuff(&$body, &$mime)
{
    $PHP_SELF = $_SERVER['PHP_SELF'];

    $lang = $_SESSION['nocc_lang'];

    if (eregi('html', $mime))
    {
        $to_removed_array = array (
            "'<html>'si",
            "'</html>'si",
            "'<body[^>]*>'si",
            "'</body>'si",
            "'<head[^>]*>.*?</head>'si",
            "'<style[^>]*>.*?</style>'si",
            "'<script[^>]*>.*?</script>'si",
            "'<object[^>]*>.*?</object>'si",
            "'<embed[^>]*>.*?</embed>'si",
            "'<applet[^>]*>.*?</applet>'si",
            "'<mocha[^>]*>.*?</mocha>'si",
            "'<meta[^>]*>'si"
        );
        $body = preg_replace($to_removed_array, '', $body);
        $body = preg_replace("|href=\"(.*)script:|i", 'href="nocc_removed_script:', $body);
        $body = preg_replace("|<([^>]*)java|i", '<nocc_removed_java_tag', $body);
        $body = preg_replace("|<([^>]*)&{.*}([^>]*)>|i", "<&{;}\\3>", $body);
        $body = eregi_replace("href=\"mailto:([a-zA-Z0-9+-=%&:_.~?@]+[#a-zA-Z0-9+]*)\"","HREF=\"$PHP_SELF?action=write&amp;mail_to=\\1\"", $body);
        $body = eregi_replace("href=mailto:([a-zA-Z0-9+-=%&:_.~?@]+[#a-zA-Z0-9+]*)","HREF=\"$PHP_SELF?action=write&amp;mail_to=\\1\"", $body);
        $body = eregi_replace("href=\"([a-zA-Z0-9+-=%&:_.~?]+[#a-zA-Z0-9+]*)\"","href=\"javascript:void(0);\" onclick=\"window.open('\\1');\"", $body);
        $body = eregi_replace("href=([a-zA-Z0-9+-=%&:_.~?]+[#a-zA-Z0-9+]*)","href=\"javascript:void(0);\" onclick=\"window.open('\\1');\"", $body);
    }
    elseif (eregi('plain', $mime))
    {
        $user_prefs = $_SESSION['nocc_user_prefs'];
        $body = htmlspecialchars($body);
        $body = eregi_replace("(http|https|ftp)://([a-zA-Z0-9+-=%&:_.~?]+[#a-zA-Z0-9+]*)","<a href=\"javascript:void(0);\" onclick=\"window.open('\\1://\\2');\">\\1://\\2</a>", $body);
        // Bug #511302: Comment out following line if you have the 'Invalid Range End' problem
        // New rewritten preg_replace should fix the problem, bug #522389
        // $body = eregi_replace("([#a-zA-Z0-9+-._]*)@([#a-zA-Z0-9+-_.]*)\.([a-zA-Z]+)","<a href=\"$PHP_SELF?action=write&amp;mail_to=\\1@\\2.\\3\">\\1@\\2.\\3</a>", $body);
        $body = preg_replace("/([0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,})/", "<a href=\"$PHP_SELF?action=write&amp;mail_to=\\1\">\\1</a>", $body); 
        if ( !isset($user_prefs->colored_quotes) || (isset($user_prefs->colored_quotes) && $user_prefs->colored_quotes)) {
          $body = preg_replace('/^(&gt; *&gt; *&gt; *&gt; *&gt;)(.*?)(\r?\n)/m', '<span class="quoteLevel5">\\1\\2</span>\\3', $body);
          $body = preg_replace('/^(&gt; *&gt; *&gt; *&gt;)(.*?)(\r?\n)/m', '<span class="quoteLevel4">\\1\\2</span>\\3', $body);
          $body = preg_replace('/^(&gt; *&gt; *&gt;)(.*?)(\r?\n)/m', '<span class="quoteLevel3">\\1\\2</span>\\3', $body);
          $body = preg_replace('/^(&gt; *&gt;)(.*?)(\r?\n)/m', '<span class="quoteLevel2">\\1\\2</span>\\3', $body);
          $body = preg_replace('/^(&gt;)(.*?)(\r?\n)/m', '<span class="quoteLevel1">\\1\\2</span>\\3', $body);
        }
        $body = nl2br($body);
        if (function_exists('wordwrap'))
            $body = wordwrap($body, 80, "\n");
    }    
    return ($body);
}

/* ----------------------------------------------------- */

function link_att(&$mail, $attach_tab, &$display_part_no)
{
    global $html_kb;
    sort($attach_tab);
    $link = '';
    while ($tmp = array_shift($attach_tab))
        if (!empty($tmp['name']))
        {
            $mime = str_replace('/', '-', $tmp['mime']);
            if ($display_part_no == true)
                $link .= $tmp['number'] . '&nbsp;&nbsp;';
            unset($att_name);
            $att_name_array = nocc_imap::mime_header_decode($tmp['name']);
            for ($i=0; $i<count($att_name_array); $i++) {
              $att_name .= $att_name_array[$i]->text;
            }
            $att_name_dl = $att_name;
            $att_name = htmlentities($att_name, ENT_COMPAT, 'UTF-8');
            $link .= '<a href="download.php?mail=' . $mail . '&amp;part=' . $tmp['number'] . '&amp;transfer=' . $tmp['transfer'] . '&amp;filename=' . base64_encode($att_name_dl) . '&amp;mime=' . $mime . '">' . $att_name . '</a>&nbsp;&nbsp;' . $tmp['mime'] . '&nbsp;&nbsp;' . $tmp['size'] . ' ' . $html_kb . '<br/>';
        }
    return ($link);
}

/* ----------------------------------------------------- */
// Return date formatted as a string, according to locale

function format_date(&$date, &$lang)
{
    global $default_date_format;
    global $lang_locale;
    global $no_locale_date_format;

    // handle bad inputs
    if (empty($date))
        return '';

    // if locale can't be set, use default for no locale
    if (!setlocale (LC_TIME, $lang_locale))
        $default_date_format = $no_locale_date_format;

    // format dates
    return strftime($default_date_format, $date); 
}

function format_time(&$time, &$lang)
{
    global $default_time_format;
    global $lang_locale;

    // handle bad inputs
    if (empty($time))
        return '';

    // if locale can't be set, use default for no locale
    setlocale (LC_TIME, $lang_locale);

    // format dates
    return strftime($default_time_format, $time); 
}


/* ----------------------------------------------------- */

// We have to figure out the entire mail size
function get_mail_size(&$this_part)
{
    $size = (isset($this_part->bytes) ? $this_part->bytes : 0);
    if (isset($this_part->parts))
        for ($i = 0; $i < count($this_part->parts); $i++)
            $size += (isset($this_part->parts[$i]->bytes) ? $this_part->parts[$i]->bytes : 0);
    $size = ($size > 1000) ? ceil($size / 1000) : 1;
    return ($size);
}

/* ----------------------------------------------------- */

// this function build an array with all the recipients of the message for later reply or reply all 
function get_reply_all(&$from, &$to, &$cc)
{
    $login = $_SESSION['nocc_login'];
    $domain = $_SESSION['nocc_domain'];
    if (!eregi($login.'@'.$domain, $from))
        $rcpt = $from.'; ';
    $tab = explode(',', $to);
    while ($tmp = array_shift($tab))
        if (!eregi($login.'@'.$domain, $tmp))
            $rcpt .= $tmp.'; ';
    $tab = explode(',', $cc);
    while ($tmp = array_shift($tab))
        if (!eregi($login.'@'.$domain, $tmp))
            $rcpt .= $tmp.'; ';
    $rcpt = isset($rcpt) ? substr($rcpt, 0, strlen($rcpt) - 2) : $from;
    return ($rcpt);
}

/* ----------------------------------------------------- */

// We need that to build a correct list of all the recipient when we send a message
function cut_address(&$addr, &$charset)
{
    global $charset;
    // Strip slashes from input
    $addr = safestrip($addr);

    // Break address line into individual addresses, taking
    // quoted addresses into account
    $addresses = array();
    $token = '';
    $quote_esc = false;
    for ($i = 0; $i < strlen($addr); $i++) {
        $c = substr($addr, $i, 1);

        // Are we entering/leaving escaped mode
        if($c == '"') {
            $quote_esc = !$quote_esc;
        }

        // Is this an address seperator (comma/semicolon)
        if($c == ',' || $c == ';') {
            if(!$quote_esc) {
                $token = trim($token);
                if($token != '') {
                    $addresses[] = $token;
                }
                $token = '';
                continue;
            }
        }

        $token .= $c;
    }
    if(!$quote_esc) {
        $token = trim($token);
        if($token != '') {
            $addresses[] = $token;
        }
    }

    /* old way
    // Replace commas with semicolons as address seperator
    $addr = str_replace(',', ';', $addr);

    // Break address line into individual addresses
    $addresses = explode(';', $addr);
    */

    // Loop through addresses
    for ($i = 0; $i < sizeof($addresses); $i++)
    {
        // Wrap address in brackets, if not already
        $pos = strrpos($addresses[$i], '<');
        if (!is_int($pos))
            $addresses[$i] = '<'.$addresses[$i].'>';

        else
        {
            $name = '';
            if ($pos != 0)
                $name = '=?'.$charset.'?B?'.base64_encode(substr($addresses[$i], 0, $pos - 1)).'?= ';
            $addr = substr($addresses[$i], $pos);
            $addresses[$i] = '"'.$name.'" '.$addr.'';
        }
    }
    return ($addresses);
}

/* ----------------------------------------------------- */

function view_part(&$pop, &$mail, $part_no, &$transfer, &$msg_charset, &$charset)
{
    if(NoccException::isException($ev)) {
        return "<p class=\"error\">".$ev->getMessage."</p>";
    }
    $text = $pop->fetchbody($mail, $part_no, $ev);
    if(NoccException::isException($ev)) {
        return "<p class=\"error\">".$ev->getMessage."</p>";
    }
    if ($transfer == 'BASE64')
        $str = nl2br(nocc_imap::base64($text));
    elseif($transfer == 'QUOTED-PRINTABLE')
        $str = nl2br(quoted_printable_decode($text));
    else
        $str = nl2br($text);
    //if (eregi('koi', $transfer) || eregi('windows-1251', $transfer))
    //    $str = @convert_cyr_string($str, $msg_charset, $charset);
    return ($str);
}

/* ----------------------------------------------------- */

function encode_mime(&$string, &$charset)
{ 
    /*$text = '=?' . $charset . '?Q?'; 
    for($i = 0; $i < strlen($string); $i++ )
    { 
        $val = ord($string[$i]); 
        $val = dechex($val); 
        $text .= '=' . $val; 
    } 
    $text .= '?='; 
    return ($text);
    */
    $string = rawurlencode($string);
    $string = str_replace('%', '=', $string);
    $string = '=?' . $charset . '?Q?' . $string . '?=';
    return ($string);
} 

/* ----------------------------------------------------- */

// This function removes temporary attachment files and
// removes any attachment information from the session
function clear_attachments()
{
    global $conf;
    if (isset($_SESSION['nocc_attach_array']) && is_array($_SESSION['nocc_attach_array']))
        while ($tmp = array_shift($_SESSION['nocc_attach_array']))
            @unlink($conf->tmpdir.'/'.$tmp->tmp_file);
    unset($_SESSION['nocc_attach_array']);
}

/* ----------------------------------------------------- */

// This function chops the <mail@domain.com> bit from a 
// full 'Blah Blah <mail@domain.com>' address, or not
// depending on the 'hide_addresses' preference.
function display_address(&$address)
{
    global $html_att_unknown;
    // Check for null
    if($address == '')
        return $html_att_unknown;

    // Get preference
    $user_prefs = $_SESSION['nocc_user_prefs'];

    // If not set, return full address.
    if(!isset($user_prefs->hide_addresses))
        return $address;

    if($user_prefs->hide_addresses!=1 && $user_prefs->hide_addresses!="on")
         return $address; 

    // If no '<', return full address.
    $bracketpos = strpos($address, "<");
    if($bracketpos === false)
        return $address;

    // Return up to the first '<', or end of string if not found
    //return substr($address, 0, $bracketpos - 1);
    $formatted_address = '';
    while (!($bracketpos === false)) {
      $formatted_address = substr($address, 0, $bracketpos - 1);
      $formatted_address .= substr($address, strpos($address, ">")+1);
      $address = $formatted_address;
      $bracketpos = strpos($address, "<");
    }
    return $address;
}

/* ----------------------------------------------------- */

function mailquote(&$body, &$from, $html_wrote)
{
    $user_prefs = $_SESSION['nocc_user_prefs'];

  $crlf = "\r\n";
  $from = ucwords(trim(ereg_replace("&lt;.*&gt;", "", str_replace("\"", "", $from))));

  if (isset($user_prefs->wrap_msg)) {
    $wrap_msg = $user_prefs->wrap_msg;
  } else {
    $wrap_msg = 0;
  }
  // If we must wrap the message
  if ($wrap_msg)
    {
      $msg = '';
      //Break message in table with "\r\n" as separator
      $tbl = explode ("\r\n", $body);
      // For each line
      for ($i = 0, $buffer = ''; $i < count ($tbl); ++$i)
	{
	  unset($buffer);
	  // Number of "> "
	  $q = substr_count($tbl[$i], "> ");

	  $tbl[$i] = rtrim ($tbl[$i]);
	  // Erase the "> "
	  $tbl[$i] = str_replace ("> ", "", $tbl[$i]);
	  // Erase the break line
	  $tbl[$i] = str_replace ("\n", " ", $tbl[$i]);
	  // length of "> > ...."
	  $length = ($q + 1) * strlen ("> ");
	  // Add the quote if ligne is not to long
	  if (strlen ($tbl[$i]) + $length <= $wrap_msg)
	    $msg .= str_pad($tbl[$i], strlen ($tbl[$i]) + $length, "> ", STR_PAD_LEFT) . $crlf;
	  // If line is to long, create new line
	  else
	    {
	      $words = explode (" ", $tbl[$i]);
	      for ($j = 0; $j < count ($words); ++$j)
		{
		  if (strlen ($buffer) + strlen ($words[$j]) + $length <= $wrap_msg)
		    $buffer .= $words[$j] . " ";
		  else
		    {
		      $msg .=  str_pad(rtrim ($buffer), strlen (rtrim ($buffer)) + $length, "> ", STR_PAD_LEFT) . $crlf;
		      $buffer = $words[$j] . " ";
		    }
		}
	      //if ($q != substr_count($tbl[$i + 1], "> "))
		$msg .= str_pad(rtrim ($buffer), strlen (rtrim ($buffer)) + $length, "> ", STR_PAD_LEFT) . $crlf;
	    }
	}
      $body = $msg;
    }
  else
    $body = "> " . ereg_replace("\n", "\n> ", trim($body));
  return($from . ' ' . $html_wrote . " :\n\n" . $body);

}
/* ----------------------------------------------------- */

// If running with magic_quotes_gpc (get/post/cookie) set
// in php.ini, we will need to strip slashes from every
// field we receive from a get/post operation.
function safestrip(&$string)
{
    if(get_magic_quotes_gpc())
        $string = stripslashes($string);
    return $string;
}


// Wrap outgoing messages to
function wrap_outgoing_msg ($txt, $length, $newline)
{
  $msg = '';
  // cut message in segment
  $tbl = explode ("\r\n", $txt);
  // Clean the end of the line
  for ($i = 0, $buffer = ''; $i < count ($tbl); ++$i)
    {
      $tbl[$i] = rtrim ($tbl[$i]);
      if (strlen ($tbl[$i]) <= $length)
	$msg .= $tbl[$i] . $newline;
      else
	{
          unset( $buffer);
	  $words = explode (" ", $tbl[$i]);
	  for ($j = 0; $j < count ($words); ++$j)
	    {
	      if ((strlen ($buffer) + strlen ($words[$j])) <= $length)
		$buffer .= $words[$j] . " ";
	      else
		{
		  $msg .= rtrim ($buffer) . $newline;
		  $buffer = $words[$j] . " ";
		}
	    }
	  $msg .= rtrim ($buffer) . $newline;
	}
    }
  return $msg;
}

function strip_tags2(&$string, $allow)
{
    $string = eregi_replace('<<', '<nocc_less_than_tag><', $string);
    $string = eregi_replace('>>', '><nocc_greater_than_tag>;', $string);
    $string = strip_tags($string, $allow . '<nocc_less_than_tag><nocc_greater_than_tag>');
    $string = eregi_replace('<nocc_less_than_tag>', '<', $string);
    return eregi_replace('<nocc_greater_than_tag>', '>', $string);
}

/* ----------------------------------------------------- */

// Check e-mail address and return TRUE if it looks valid.
function valid_email($email)
{
    /* Regex of valid characters */
    $regexp = "^[A-Za-z0-9\._-]+@([A-Za-z0-9][A-Za-z0-9-]{1,62})(\.[A-Za-z0-9][A-Za-z0-9-]{1,62})+$";
    if(!ereg($regexp, $email))
        return FALSE;
    return TRUE;
}

function get_per_page() {
    global $conf;
    $user_prefs = $_SESSION['nocc_user_prefs'];
    $msg_per_page = 0;
    if (isset($conf->msg_per_page))
            $msg_per_page = $conf->msg_per_page;
    if (isset($user_prefs->msg_per_page))
            $msg_per_page = $user_prefs->msg_per_page;
    // Failsafe
    if($msg_per_page < 1)
            $msg_per_page = 25;
    return $msg_per_page;
}

// ============================ Contact List ==================================

function load_list ($path)
{
   $fp = @fopen($path, "r");
   if (!$fp)
     return array();
   // Create the contact list
   $contacts = array ();
   // Load the contact list
   while(!feof ($fp))
     {
       $buffer = trim(fgets($fp, 4096));
       if ($buffer != "")
	 array_push ($contacts, $buffer);
     }

   fclose($fp);
   // return the list
   return $contacts;
}


function save_list ($path, $contacts, $conf, &$ev)
{
  include ('lang/' . $_SESSION['nocc_lang'] . '.php');
  if(file_exists($path) && !is_writable($path)){
     $ev = new NoccException($html_err_file_contacts);
     return;
  }
  if (!is_writeable($conf->prefs_dir)) {
      $ev = new NoccException($html_err_file_contacts);
      return;
  }
  $fp = fopen($path, "w");

  for ($i = 0; $i < count ($contacts); ++$i)
  {
      if (trim($contacts[$i]) != "")
          fwrite ($fp, $contacts[$i]."\n");
  }

  fclose($fp);
}

// Convert html entities to normal characters
function unhtmlentities ($string)
{
   $trans_tbl = get_html_translation_table (HTML_ENTITIES);
   $trans_tbl = array_flip ($trans_tbl);
   return strtr ($string, $trans_tbl);
}

// Save session informations.
function saveSession(&$ev)
{
  global $conf;
  if (!empty($conf->prefs_dir)) {
    // generate string with session information
    unset ($cookie_string);
    $cookie_string = $_SESSION['nocc_user'];
    $cookie_string .= " " . $_SESSION['nocc_passwd'];
    $cookie_string .= " " . $_SESSION['nocc_lang'];
    $cookie_string .= " " . $_SESSION['nocc_smtp_server'];
    $cookie_string .= " " . $_SESSION['nocc_smtp_port'];
    $cookie_string .= " " . $_SESSION['nocc_theme'];
    $cookie_string .= " " . $_SESSION['nocc_domain'];
    $cookie_string .= " " . $_SESSION['imap_namespace'];
    $cookie_string .= " " . $_SESSION['nocc_servr'];
    $cookie_string .= " " . $_SESSION['nocc_folder'];
    $cookie_string .= " " . $_SESSION['smtp_auth'];

    // encode cookie string to base64
    $cookie_string = base64_encode($cookie_string);

    // save string to file
    $filename = $conf->prefs_dir . '/' . $_SESSION['nocc_user'].'@'.$_SESSION['nocc_domain'] . '.session';
    if (file_exists($filename) && !is_writable($filename)) {
      $ev = new NoccException($html_session_file_error);
      return;
    }
    if (!is_writable($conf->prefs_dir)) {
      $ev = new NoccException($html_session_file_error);
      return;
    }
    $file = fopen($filename, 'w');
    if (!$file) {
      $ev = new NoccException($html_session_file_error);
      return;
    }
    fwrite ($file, $cookie_string . "\n");
    fclose ($file);
  }
}

// Restore session informations.
function loadSession(&$ev, &$key)
{
  global $conf;

  if (empty($conf->prefs_dir)) {
    return '';
  }

  $filename = $conf->prefs_dir . '/' . $key . '.session';
  if (!file_exists($filename)) {
    return '';
  }

  $file = fopen($filename, 'r');
  if (!$file) {
    $ev = new NoccException("Could not open $filename for reading user session");
    return '';
  }

  $line = trim(fgets($file, 1024));
  return $line;
}
?>
