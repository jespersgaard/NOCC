<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/functions.php,v 1.157 2002/04/24 23:00:54 rossigee Exp $ 
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

function inbox(&$pop, $skip = 0)
{
    global $conf;

    $lang = $_SESSION['lang'];
    $theme = $_SESSION['theme'];
    $sort = $_SESSION['sort'];
    $sortdir = $_SESSION['sortdir'];

    $num_msg = $pop->num_msg();
    $per_page = (getPref('msg_per_page')) ? getPref('msg_per_page') : (($conf->msg_per_page) ? $conf->msg_per_page : '25');

    $start_msg = $skip * $per_page;
    $end_msg = $start_msg + $per_page;

    $sorted = $pop->sort($sort, $sortdir);

    $end_msg = ($num_msg > $end_msg) ? $end_msg : $num_msg;
    if ($start_msg > $num_msg) {
        $msgs = Array();
        return ($msgs);
    }

    for ($i = $start_msg; $i < $end_msg; $i++)
    {
        $subject = $from = '';
        $msgnum = $sorted[$i];
        $ref_contenu_message = $pop->headerinfo($pop->msgno($msgnum));
        $struct_msg = $pop->fetchstructure($pop->msgno($msgnum));
        $subject_array = nocc_imap::mime_header_decode($ref_contenu_message->subject);
        for ($j = 0; $j < count($subject_array); $j++)
            $subject .= $subject_array[$j]->text;
        $from_array = nocc_imap::mime_header_decode($ref_contenu_message->fromaddress);
        for ($j = 0; $j < count($from_array); $j++)
            $from .= $from_array[$j]->text;
        if ($pop->is_imap())
            $msg_size = get_mail_size($struct_msg);
        else
            $msg_size = ($struct_msg->bytes > 1000) ? ceil($struct_msg->bytes / 1000) : 1;
        if (isset($struct_msg->type) && $struct_msg->type == 1)
        {
            if ($struct_msg->subtype == 'ALTERNATIVE' || $struct_msg->subtype == 'RELATED')
                $attach = '&nbsp;';
            else
                $attach = '<img src="themes/' . $theme . '/img/attach.gif" alt="" />';
        }
        else
            $attach = '&nbsp;';
        // Check Status Line with UCB POP Server to
        // see if this is a new message. This is a
        // non-RFC standard line header.
        // Set this in conf.php
        if ($conf->have_ucb_pop_server)
        {
            $header_msg = $pop->fetchheader($pop->msgno($msgnum));
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
            $newmail = '<img src="themes/' . $theme . '/img/new.gif" alt="" height="17" width="17" />';
        else
            $newmail = '&nbsp;';
        $timestamp = chop($ref_contenu_message->udate);
        $date = format_date($timestamp, $lang);
        $time = format_time($timestamp, $lang);
        $msg_list[$i] =  Array(
                'new' => $newmail, 
                'number' => $pop->msgno($msgnum),
                'attach' => $attach, 
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
function aff_mail(&$attach_tab, &$mail, $verbose, &$ev)
{
    global $conf;
    global $lang_locale;
    global $no_locale_date_format;
    global $html_att, $html_atts;

    $mailhost = $_SESSION['servr'];
    $folder = $_SESSION['folder'];
    $login = $_SESSION['login'];
    $passwd = $_SESSION['passwd'];
    $sort = $_SESSION['sort'];
    $sortdir = $_SESSION['sortdir'];
    $lang = $_SESSION['lang'];

    // Clear variables
    $glob_body = $subject = $from = $to = $cc = $reply_to = '';

    // Connect to server
    $pop = new nocc_imap($mailhost, $folder, $login, $passwd, 0, $ev);
    if($ev) 
        return (-1);

    // Finding the next and previous message number
    $sorted = $pop->sort($sort, $sortdir);
    $prev_msg = $next_msg = 0;
    for ($i = 0; $i < sizeof($sorted); $i++)
    {
        if ($mail == $sorted[$i])
        {
            $prev_msg = ($i - 1 >= 0) ? $sorted[$i - 1] : 0;
            $next_msg = ($i + 1 < sizeof($sorted)) ? $sorted[$i + 1] : 0;
            break;
        }
    }
    // END finding the next and previous message number
    $num_messages = $pop->num_msg();
    $ref_contenu_message = $pop->headerinfo($mail);
    $struct_msg = $pop->fetchstructure($mail);
    if (isset($struct_msg->parts) && (sizeof($struct_msg->parts) > 0))
        GetPart($attach_tab, $struct_msg, NULL, $conf->display_rfc822);
    else
        GetSinglePart($attach_tab, $struct_msg, $pop->fetchheader($mail), $pop->body($mail));
    if (($verbose == 1) && ($conf->use_verbose == true))
        $header = $pop->fetchheader($mail);
    else
        $header = '';
    $tmp = array_pop($attach_tab);
    if (eregi('text/html', $tmp['mime']) || eregi('text/plain', $tmp['mime']))
    {    
        if ($tmp['transfer'] == 'QUOTED-PRINTABLE')
            $glob_body = nocc_imap::qprint($pop->fetchbody($mail, $tmp['number']));
        elseif ($tmp['transfer'] == 'BASE64')
            $glob_body = base64_decode($pop->fetchbody($mail, $tmp['number']));
        else
            $glob_body = $pop->fetchbody($mail, $tmp['number']);
        $glob_body = remove_stuff($glob_body, $tmp['mime']);
    }
    else
        array_push($attach_tab, $tmp);
    $pop->close();
    if ($struct_msg->subtype != 'ALTERNATIVE' && $struct_msg->subtype != 'RELATED')
    {
        switch (sizeof($attach_tab))
        {
            case 0:
                $link_att = '';
                break;
            case 1:
                $link_att = '<tr><td align="right" valign="top" class="mail">' . $html_att . '</td><td bgcolor="' . $glob_theme->mail_properties . '" class="mail">' . link_att($mail, $attach_tab, $conf->display_part_no) . '</td></tr>';
                break;
            default:
                $link_att = '<tr><td align="right" valign="top" class="mail">' . $html_atts . '</td><td bgcolor="' . $glob_theme->mail_properties . '" class="mail">' . link_att($mail, $attach_tab, $conf->display_part_no) . '</td></tr>';
                break;
        }
    }
    $subject_array = nocc_imap::mime_header_decode($ref_contenu_message->subject);
    for ($j = 0; $j < count($subject_array); $j++)
        $subject .= $subject_array[$j]->text;
    $from_array = nocc_imap::mime_header_decode($ref_contenu_message->fromaddress);
    for ($j = 0; $j < count($from_array); $j++)
        $from .= $from_array[$j]->text;
    $to_array = nocc_imap::mime_header_decode($ref_contenu_message->toaddress);
    for ($j = 0; $j < count($to_array); $j++)
        $to .= $to_array[$j]->text;
    $to = str_replace(',', ', ', $to);
    $cc_array = isset($ref_contenu_message->ccaddress) ? nocc_imap::mime_header_decode($ref_contenu_message->ccaddress) : 0;
    for ($j = 0; $j < count($cc_array); $j++)
        $cc .= $cc_array[$j]->text;
    $cc = str_replace(',', ', ', $cc);
    $reply_to_array = isset($ref_contenu_message->reply_toaddress) ? nocc_imap::mime_header_decode($ref_contenu_message->reply_toaddress) : 0;
    for ($j = 0; $j < count($reply_to_array); $j++)
        $reply_to .= $reply_to_array[$j]->text;
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
        'body' => $glob_body,
        'body_mime' => $tmp['mime'],
        'body_transfer' => $tmp['transfer'],
        'header' => htmlspecialchars($header),
        'verbose' => $verbose,
        'prev' => $prev_msg,
        'next' => $next_msg
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
        $param = $this_part->parameters[$i];
        if ((($param->attribute == 'NAME') || ($param->attribute == 'name')) && ($param->value != ''))
        {
            $att_name = $param->value;
               break;
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
                if ($obj->attribute == 'CHARSET')
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
            if ($obj->attribute == 'CHARSET')
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
                'charset' => $charset,
                'size' => ($this_part->bytes > 1000) ? ceil($this_part->bytes / 1000) : 1
            );
            array_unshift($attach_tab, $tmp);
}

/* ----------------------------------------------------- */

function remove_stuff(&$body, &$mime)
{
    global $PHP_SELF;

    $lang = $_SESSION['lang'];

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
            "'<mocha[^>]*>.*?</mocha>'si"
        );
        $body = preg_replace($to_removed_array, '', $body);
        $body = preg_replace("|href=\"(.*)script:|i", 'href="nocc_removed_script:', $body);
        $body = preg_replace("|<([^>]*)java|i", '<nocc_removed_java_tag', $body);
        $body = preg_replace("|<([^>]*)&{.*}([^>]*)>|i", "<&{;}\\3>", $body);
        //$body = preg_replace("|<([^>]*)mocha:([^>]*)>|i", "<nocc_removed_mocha:\\2>",$body);
        $body = eregi_replace("href=\"mailto:([a-zA-Z0-9+-=%&:_.~?@]+[#a-zA-Z0-9+]*)\"","<A HREF=\"$PHP_SELF?action=write&amp;mail_to=\\1\"", $body);
        $body = eregi_replace("href=mailto:([a-zA-Z0-9+-=%&:_.~?@]+[#a-zA-Z0-9+]*)","<A HREF=\"$PHP_SELF?action=write&amp;mail_to=\\1\"", $body);
        //$body = eregi_replace("target=\"([a-zA-Z0-9+-=%&:_.~?]+[#a-zA-Z0-9+]*)\"", "", $body);
        //$body = eregi_replace("target=([a-zA-Z0-9+-=%&:_.~?]+[#a-zA-Z0-9+]*)", "", $body);
        $body = eregi_replace("href=\"([a-zA-Z0-9+-=%&:_.~?]+[#a-zA-Z0-9+]*)\"","<a href=\"\\1\" target=\"_blank\"", $body);
        $body = eregi_replace("href=([a-zA-Z0-9+-=%&:_.~?]+[#a-zA-Z0-9+]*)","<a href=\"\\1\" target=\"_blank\"", $body);
    }
    elseif (eregi('plain', $mime))
    {
        $body = eregi_replace("(http|https|ftp)://([a-zA-Z0-9+-=%&:_.~?]+[#a-zA-Z0-9+]*)","<a href=\"\\1://\\2\" target=\"_blank\">\\1://\\2</a>", $body);
        // Bug #511302: Comment out following line if you have the 'Invalid Range End' problem
        // New rewritten preg_replace should fix the problem, bug #522389
        // $body = eregi_replace("([#a-zA-Z0-9+-._]*)@([#a-zA-Z0-9+-_.]*)\.([a-zA-Z]+)","<a href=\"$PHP_SELF?action=write&amp;mail_to=\\1@\\2.\\3\">\\1@\\2.\\3</a>", $body);
        $body = preg_replace("/([0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,})/", "<a href=\"$PHP_SELF?action=write&amp;mail_to=\\1\">\\1</a>", $body); 
        $body = nl2br($body);
        if (function_exists('wordwrap'))
            $body = wordwrap($body, 80, "\n");
    }    
    return ($body);
}

/* ----------------------------------------------------- */

function link_att(&$mail, &$attach_tab, &$display_part_no)
{
    sort($attach_tab);
    $link = '<table border="0">';
    while ($tmp = array_shift($attach_tab))
        //if ($tmp['id'] == '')
        if (!empty($tmp['name']))
        {
            $mime = str_replace('/', '-', $tmp['mime']);
            $link .= '<tr>';
            if ($display_part_no == true)
                $link .= '<td class="inbox">' . $tmp['number'] . '</td>';
            $att_name = nocc_imap::mime_header_decode($tmp['name']);
            $link .= '<td class="inbox"><a href="download.php?mail=' . $mail . '&amp;part=' . $tmp['number'] . '&amp;transfer=' . $tmp['transfer'] . '&amp;filename=' . urlencode($att_name[0]->text) . '&amp;mime=' . $mime . '">' . htmlentities($att_name[0]->text) . '</a></td><td class="inbox">' . $tmp['mime'] . '</td><td class="inbox">' . $tmp['size'] . ' kb</td></tr>';
        }
    $link .= '</table>';
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
    $login = $_SESSION['login'];
    $domain = $_SESSION['domain'];
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

        /* FIXME: encode_mime mangles addresses badly */
        /*else
        {
            $name = '';
            if ($pos != 0)
                $name = encode_mime(substr($addresses[$i], 0, $pos - 1), $charset).' ';
            $addr = substr($addresses[$i], $pos);
            $addresses[$i] = '"'.$name.' '.$addr.'"';
        } */
    }
    return ($addresses);
}

/* ----------------------------------------------------- */

function view_part(&$mailhost, &$login, &$passwd, &$folder, &$mail, $part_no, &$transfer, &$msg_charset, &$charset)
{
    $pop = new nocc_imap($mailhost, $folder, $login, $passwd, 0, $ev);
    if($ev) 
        return (-1);
    $text = $pop->fetchbody($mail, $part_no);
    if ($transfer == 'BASE64')
        $str = nl2br(nocc_imap::base64($text));
    elseif($transfer == 'QUOTED-PRINTABLE')
        $str = nl2br(quoted_printable_decode($text));
    else
        $str = nl2br($text);
    //if (eregi('koi', $transfer) || eregi('windows-1251', $transfer))
    //    $str = @convert_cyr_string($str, $msg_charset, $charset);
    $pop->close();
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
    if (isset($_SESSION['attach_array']) && is_array($_SESSION['attach_array']))
        while ($tmp = array_shift($_SESSION['attach_array']))
            @unlink($conf->tmpdir.'/'.$tmp->tmp_file);
    unset($_SESSION['attach_array']);
}

/* ----------------------------------------------------- */

// This function returns the CRLF depending on the OS and
// the way to send messages
function get_crlf(&$smtp)
{
    global $OS;

    $crlf = stristr($OS, 'Windows') ? "\r\n" : "\n";
    $crlf = $smtp ? "\r\n" : $crlf;
    return ($crlf);
}

/* ----------------------------------------------------- */

// This function chops the <mail@domain.com> bit from a 
// full 'Blah Blah <mail@domain.com>' address, or not
// depending on the 'hide_addresses' preference.
function display_address(&$address)
{
    // Check for null
    if($address == '')
        return $html_att_unknown;

    // Get preference
    $hide_addresses = getPref('hide_addresses');

    // If not set, return full address.
    if($hide_addresses != 'on')
        return $address;

    // If no '<', return full address.
    $bracketpos = strpos($address, "<");
    if($bracketpos === false)
        return $address;

    // Return up to the first '<', or end of string if not found
    return substr($address, 0, $bracketpos - 1);
}

/* ----------------------------------------------------- */

function mailquote(&$body, &$from, &$html_wrote)
{
    $from = ucwords(trim(ereg_replace("&lt;.*&gt;", "", str_replace("\"", "", $from))));
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

function strip_tags2(&$string, $allow)
{
    $string = eregi_replace('<<', '<nocc_less_than_tag><', $string);
    $string = eregi_replace('>>', '><nocc_greater_than_tag>;', $string);
    $string = strip_tags($string, $allow . '<nocc_less_than_tag><nocc_greater_than_tag>');
    $string = eregi_replace('<nocc_less_than_tag>', '<', $string);
    return eregi_replace('<nocc_greater_than_tag>', '>', $string);
}

?>
