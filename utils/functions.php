<?php
/**
 * Miscellaneous functions
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 * Copyright 2002 Mike Rylander <mrylander@mail.com>
 *
 * This file is part of NOCC. NOCC is free software under the terms of the
 * GNU General Public License. You should have received a copy of the license
 * along with NOCC.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package    NOCC
 * @subpackage Utilities
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @version    SVN: $Id$
 */

require_once './classes/class_local.php';
require_once './classes/nocc_mailreader.php';
require_once './classes/nocc_theme.php';
require_once './classes/nocc_quotausage.php';
require_once './classes/nocc_mailaddress.php';

/**
 * ...
 * @param object $pop
 * @param int $skip
 * @param object $ev
 * @return array
 * @todo Rename!
 */
function inbox(&$pop, $skip = 0, &$ev) {
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

    for ($i = $start_msg; $i < $end_msg; $i++) {
        $to = '';
        $msgnum = $sorted[$i];
        $pop_msgno_msgnum = $pop->msgno($msgnum);
        $mail_reader = new NOCC_MailReader($pop_msgno_msgnum, $pop, $ev);
        if(NoccException::isException($ev)) return;

        // Get to
        $to = $mail_reader->getToAddress();
        $to = str_replace(',', ', ', $to);

        $newmail = $mail_reader->isUnread();
        // Check Status Line with UCB POP Server to
        // see if this is a new message. This is a
        // non-RFC standard line header.
        // Set this in conf.php
        if ($_SESSION['ucb_pop_server']) {
            //TODO: Get UCB Status from NOCC_Header?
            $header_msg = $mail_reader->getHeader();
            if(NoccException::isException($ev)) return;
            $header_lines = explode("\r\n", $header_msg);
            while (list($k, $v) = each($header_lines)) {
                list ($header_field, $header_value) = explode(':', $v);
                if ($header_field == 'Status') 
                    if ($header_value == '')
                        $newmail = true;
                    else
                        $newmail = false;
            }
        }
        
        $timestamp = $mail_reader->getTimestamp();
        $date = format_date($timestamp, $lang);
        $time = format_time($timestamp, $lang);
        $msg_list[$i] =  Array(
                'index' => $i,
                'new' => $newmail,
                'number' => $pop->msgno($msgnum),
                'attach' => $mail_reader->hasAttachments(),
                'to' => $to,
                'from' => $mail_reader->getFromAddress(),
                'subject' => $mail_reader->getSubject(), 
                'date' => $date,
                'time' => $time,
                'complete_date' => $date . ' ' . $time,
                'size' => $mail_reader->getSize(),
                'priority' => $mail_reader->getPriority(),
                'priority_text' => $mail_reader->getPriorityText(),
                'flagged' => $mail_reader->isFlagged(),
                'spam' => $mail_reader->isSpam(),
                'sort' => $sort,
                'sortdir' => $sortdir);
    }
    return ($msg_list);
}

/**
 * ...
 * @global object $conf
 * @global string $lang_locale
 * @global string $no_locale_date_format
 * @global string $html_att_label
 * @global string $html_atts_label
 * @global string $lang_invalid_msg_num
 * @param object $pop
 * @param array $attach_tab
 * @param int $mail
 * @param bool $verbose
 * @param object $ev
 * @return array
 * @todo Rename!
 */
function aff_mail(&$pop, &$attach_tab, &$mail, $verbose, &$ev) {
    global $conf;
    global $lang_locale;
    global $no_locale_date_format;
    global $html_att_label, $html_atts_label;
    global $lang_invalid_msg_num;

    $sort = $_SESSION['nocc_sort'];
    $sortdir = $_SESSION['nocc_sortdir'];
    $lang = $_SESSION['nocc_lang'];

    // Clear variables
    $body = $to = $cc = '';

    // Message Found boolean
    $msg_found = 0;

    // Get message numbers in sorted order
    // Do not use message UID, in order to get correct messages number with IMAP connexion
    $sorted = $pop->sort($sort, $sortdir, $ev, false);
    if(NoccException::isException($ev)) return;

    // Finding the next and previous message number
    $prev_msg = $next_msg = 0;
    for ($i = 0; $i < sizeof($sorted); $i++) {
        if ($mail == $sorted[$i]) {
            $prev_msg = ($i - 1 >= 0) ? $sorted[$i - 1] : 0;
            $next_msg = ($i + 1 < sizeof($sorted)) ? $sorted[$i + 1] : 0;
            $msg_found = 1;
            break;
        }
    }

    if (!$msg_found) {
        $ev = new NoccException($lang_invalid_msg_num);
        return;
    }

    // Get number of messages (why?)
    $num_messages = $pop->num_msg();

    $mail_reader = new NOCC_MailReader($mail, $pop, $ev);
    if(NoccException::isException($ev)) return;

    // Get the MIME message structure
    $struct_msg = $mail_reader->getStructure();

    // If there are attachments, populate the attachment array, otherwise
    // just get the main body as a single-element array
    if ($struct_msg->type == 3 || (isset($struct_msg->parts) && (sizeof($struct_msg->parts) > 0)))
        GetPart($attach_tab, $struct_msg, null, $conf->display_rfc822);
    else {
        GetSinglePart($attach_tab, $mail_reader);
    }

    // If we are showing all headers, gather them into a header array
    $header = '';
    if (($verbose == true) && ($conf->use_verbose == true)) {
        $header = $mail_reader->getHeader();
    }

    // Get the first part
    $tmp = array_pop($attach_tab);
    if ($struct_msg->type == 3) {
        $body = '';
    }
    else {
        $body = $pop->fetchbody($mail, $tmp['number'], $ev);
    }
    if(NoccException::isException($ev)) return;

    $body_charset = '';
    if (preg_match('{text/(html|plain)}i', $tmp['mime'])) {
        $body = nocc_imap::decode($body, $tmp['transfer']);
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

        $body_converted = os_iconv($body_charset, 'UTF-8', $body);
        $body = ($body_converted===false) ? $body : $body_converted;
        $tmp['charset'] = ($body_converted===false) ? $body_charset : 'UTF-8';
    }
    else
        array_push($attach_tab, $tmp);
    $link_att = '';
    if ($mail_reader->hasAttachments()) {
        switch (sizeof($attach_tab)) {
            case 0:
                break;
            case 1:
                $link_att = '<tr><th class="mailHeaderLabel right">' . $html_att_label . '</th><td class="mailHeaderData">' . link_att($mail, $attach_tab) . '</td></tr>';
                break;
            default:
                $link_att = '<tr><th class="mailHeaderLabel right">' . $html_atts_label . '</th><td class="mailHeaderData">' . link_att($mail, $attach_tab) . '</td></tr>';
                break;
        }
    }

    // Get to
    $to = $mail_reader->getToAddress();
    $to = str_replace(',', ', ', $to);
    
    // Get cc
    $cc = $mail_reader->getCcAddress();
    $cc = str_replace(',', ', ', $cc);

    $timestamp = $mail_reader->getTimestamp();
    $date = format_date($timestamp, $lang);
    $time = format_time($timestamp, $lang);
    $content = Array(
        'message_id' => $mail_reader->getMessageId(),
        'from' => $mail_reader->getFromAddress(),
        'to' => $to,
        'cc' => $cc,
        'reply_to' => $mail_reader->getReplyToAddress(),
        'subject' => $mail_reader->getSubject(),
        'timestamp' => $timestamp,
        'date' => $date,
        'time' => $time,
        'complete_date' => $date . ' ' . $time,
        'priority' => $mail_reader->getPriority(),
        'priority_text' => $mail_reader->getPriorityText(),
        'spam' => $mail_reader->isSpam(),
        'att' => $link_att,
        'body' => $pop->graphicalsmilies($body),
        'body_mime' => convertLang2Html($tmp['mime']),
        'body_transfer' => convertLang2Html($tmp['transfer']),
        'header' => $header,
        'verbose' => $verbose,
        'prev' => $prev_msg,
        'next' => $next_msg,
        'msgnum' => $mail,
        'charset' => $body_charset
    );
    return ($content);
}

/**
 * ...
 * Based on a function from matt@bonneau.net
 * @global string $html_unknown
 * @param array $attach_tab
 * @param object $this_part
 * @param string $part_no
 * @param bool $display_rfc822
 */
function GetPart(&$attach_tab, $this_part, $part_no, $display_rfc822) {
    global $html_unknown;

    $mailstructure = new NOCC_MailStructure($this_part);

    if ($mailstructure->isMultipart()) { //if multipart...
        for ($i = 0; $i < count($this_part->parts); $i++) {
            if ($part_no != '') {
                if (substr($part_no, -1) != '.')
                    $part_no = $part_no . '.';
            }
            //TODO: Gibt Probleme bei der "RE: Re[2]: Tuer zu Ihrem Wunsch"
            //TODO: Überprüfen, ob es den ALTERNATIVE Part überhaupt gibt!
            // if it's an alternative, we skip the text part to only keep the HTML part
            if ($mailstructure->isAlternativeMultipart())// && $read == true)
                GetPart($attach_tab, $this_part->parts[++$i], $part_no . ($i + 1), $display_rfc822);
            else
                GetPart($attach_tab, $this_part->parts[$i], $part_no . ($i + 1), $display_rfc822);
        }
    }
    else if($mailstructure->isMessage()) { //if message...
        if (isset($this_part->parts[0]->parts)) {
            $num_parts = count($this_part->parts[0]->parts);
            for ($i = 0; $i < $num_parts; $i++)
                GetPart($attach_tab, $this_part->parts[0]->parts[$i], $part_no . '.' . ($i + 1), $display_rfc822);
        }
    }

    if (($mailstructure->isRfc822Message() && $display_rfc822 == true) || (!$mailstructure->isMultipart() && !$mailstructure->isRfc822Message())) {
        $tmp = Array(
            'number' => ($part_no != '' ? $part_no : 1),
            'id' => $mailstructure->getId(),
            'name' => $mailstructure->getName($html_unknown),
            'mime' => $mailstructure->getInternetMediaType(),
            'transfer' => $mailstructure->getEncodingText(),
            'disposition' => $mailstructure->getDisposition(),
            'charset' => $mailstructure->getCharset(),
            'size' => ($this_part->bytes > 1000) ? ceil($this_part->bytes / 1000) : 1
        );

        array_unshift($attach_tab, $tmp);
    }
}

/**
 * ...
 * @param array $attach_tab
 * @param NOCC_MailReader $mailreader
 * @todo Returns text/plain when Content-Type: application/x-zip (e.g.)
 */
function GetSinglePart(&$attach_tab, $mailreader) {
    if ($mailreader->isHtmlMail())
        $full_mime_type = 'text/html';
    else
        $full_mime_type = 'text/plain';
    $tmp = Array(
        'number' => 1,
        'id' => $mailreader->getId(),
        'name' => '',
        'mime' => $full_mime_type,
        'transfer' => $mailreader->getEncodingText(),
        'disposition' => $mailreader->getDisposition(),
        'charset' => $mailreader->getCharset(),
        'size' => $mailreader->getSize()
    );

    array_unshift($attach_tab, $tmp);
}

/**
 * ...
 * @param string $body
 * @param string $mime
 * @return string
 */
function remove_stuff(&$body, &$mime) {
    $PHP_SELF = $_SERVER['PHP_SELF'];

    $lang = $_SESSION['nocc_lang'];

    if (preg_match('|html|i', $mime)) {
        $body = NOCC_Security::cleanHtmlBody($body);
        $body = preg_replace("|href=\"(.*)script:|i", 'href="nocc_removed_script:', $body);
        $body = preg_replace("|<([^>]*)java|i", '<nocc_removed_java_tag', $body);
        $body = preg_replace("|<([^>]*)&{.*}([^>]*)>|i", "<&{;}\\3>", $body);
        $body = preg_replace("|href=\"mailto:([a-zA-Z0-9\+\-=%&:_.~\?@]+[#a-zA-Z0-9\+]*)\"|i", "HREF=\"$PHP_SELF?action=write&amp;mail_to=$1\"", $body);
        $body = preg_replace("|href=mailto:([a-zA-Z0-9\+\-=%&:_.~\?@]+[#a-zA-Z0-9\+]*)|i", "HREF=\"$PHP_SELF?action=write&amp;mail_to=$1\"", $body);
        $body = preg_replace("|href=\"([a-zA-Z0-9\+\/\;\-=%&:_.~\?]+[#a-zA-Z0-9\+]*)\"|i", "href=\"$1\" target=\"_blank\"", $body);
        $body = preg_replace("|href=([a-zA-Z0-9\+\/\;\-=%&:_.~\?]+[#a-zA-Z0-9\+]*)|i", "href=\"$1\" target=\"_blank\"", $body);
    }
    elseif (preg_match('|plain|i', $mime)) {
        $user_prefs = $_SESSION['nocc_user_prefs'];
        $body = htmlspecialchars($body);
        $body = preg_replace("{(http|https|ftp)://([a-zA-Z0-9\+\/\;\-=%&:_.~\?]+[#a-zA-Z0-9\+]*)}i", "<a href=\"$1://$2\" target=\"_blank\">$1://$2</a>", $body);
        // Bug #511302: Comment out following line if you have the 'Invalid Range End' problem
        // New rewritten preg_replace should fix the problem, bug #522389
        // $body = eregi_replace("([#a-zA-Z0-9+-._]*)@([#a-zA-Z0-9+-_.]*)\.([a-zA-Z]+)","<a href=\"$PHP_SELF?action=write&amp;mail_to=\\1@\\2.\\3\">\\1@\\2.\\3</a>", $body);
        $body = preg_replace("/([0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,})/", "<a href=\"$PHP_SELF?action=write&amp;mail_to=\\1\">\\1</a>", $body); 
        if ($user_prefs->getColoredQuotes()) {
            //TODO: Move to own function!
            $body = preg_replace('/^(&gt; *&gt; *&gt; *&gt; *&gt;)(.*?)(\r?\n)/m', '<span class="quoteLevel5">\\1\\2</span>\\3', $body);
            $body = preg_replace('/^(&gt; *&gt; *&gt; *&gt;)(.*?)(\r?\n)/m', '<span class="quoteLevel4">\\1\\2</span>\\3', $body);
            $body = preg_replace('/^(&gt; *&gt; *&gt;)(.*?)(\r?\n)/m', '<span class="quoteLevel3">\\1\\2</span>\\3', $body);
            $body = preg_replace('/^(&gt; *&gt;)(.*?)(\r?\n)/m', '<span class="quoteLevel2">\\1\\2</span>\\3', $body);
            $body = preg_replace('/^(&gt;)(.*?)(\r?\n)/m', '<span class="quoteLevel1">\\1\\2</span>\\3', $body);
        }
        if ($user_prefs->getDisplayStructuredText()) {
            //TODO: Move to own function!
            $body = preg_replace('/(\s)\+\/-/', '\\1&plusmn;', $body); // +/-
            $body = preg_replace('/(\w|\))\^([0-9]+)/', '\\1<sup>\\2</sup>', $body); // 10^6, a^2, (a+b)^2
            $body = preg_replace('/(\s)(\*)([^\s\*]+[^\*\r\n]+)(\*)/', '\\1<strong>\\2\\3\\4</strong>', $body); // *strong*
            $body = preg_replace('/(\s)(\/)([^\s\/]+[^\/\r\n<>]+)(\/)/', '\\1<em>\\2\\3\\4</em>', $body); // /emphasis/
            $body = preg_replace('/(\s)(_)([^\s_]+[^_\r\n]+)(_)/', '\\1<span style="text-decoration:underline">\\2\\3\\4</span>', $body); // _underline_
            $body = preg_replace('/(\s)(\|)([^\s\|]+[^\|\r\n]+)(\|)/', '\\1<code>\\2\\3\\4</code>', $body); // |code|
        }

        // Disable incoming message wordwrapping. Plain text message formatting should be done by the writter.
        // The client don't have to change the way the message is display (think to ASCII schemes).
        // $body = wordwrap($body, 80);
        
        $body = nl2br($body);
    }    
    return ($body);
}

/**
 * ...
 * @global string $html_kb
 * @param int $mail
 * @param array $attach_tab
 * @return string
 */
function link_att($mail, $attach_tab) {
    global $html_kb;
    sort($attach_tab);
    $html = '<ul class="attachments">';
    while ($tmp = array_shift($attach_tab)) {
        if (!empty($tmp['name'])) {
            $mime = str_replace('/', '-', $tmp['mime']);
            $att_name = nocc_imap::utf8($tmp['name']);
            $att_name_dl = $att_name;
            $att_name = htmlentities($att_name, ENT_COMPAT, 'UTF-8');
            if (empty($att_name)) { //if we got a problem with the $att_name encoding...
                $att_name = htmlentities($att_name_dl, ENT_COMPAT);
            }
            $html .= '<li><a href="download.php?mail=' . $mail . '&amp;part=' . $tmp['number'] . '&amp;transfer=' . $tmp['transfer'] . '&amp;filename=' . base64_encode($att_name_dl) . '&amp;mime=' . $mime . '">' . $att_name . '</a> <em>' . $tmp['size'] . ' ' . $html_kb . '</em></li>';
        }
    }
    $html .= '</ul>';
    return ($html);
}

/**
 * Return date formatted as a string, according to locale
 * @global string $default_date_format
 * @global string $lang_locale
 * @global string $no_locale_date_format
 * @param int $date
 * @param string $lang
 * @return string
 * @todo Why is $lang not used?
 */
function format_date(&$date, &$lang) {
    global $default_date_format;
    global $lang_locale;
    global $no_locale_date_format;

    // handle bad inputs
    if (empty($date))
        return '';

    // if locale can't be set, use default for no locale
    if (!setlocale(LC_TIME, $lang_locale))
        $default_date_format = $no_locale_date_format;

    // format dates
    return strftime($default_date_format, $date); 
}

/**
 * ...
 * @global string $default_time_format
 * @global string $lang_locale
 * @param int $time
 * @param string $lang
 * @return string
 * @todo Why is $lang not used?
 */
function format_time(&$time, &$lang) {
    global $default_time_format;
    global $lang_locale;

    // handle bad inputs
    if (empty($time))
        return '';

    // if locale can't be set, use default for no locale
    setlocale(LC_TIME, $lang_locale);

    // format dates
    return strftime($default_time_format, $time); 
}

/**
 * This function build an array with all the recipients of the message for later reply or reply all
 * @param string $from
 * @param string $to
 * @param string $cc
 * @return string
 */
function get_reply_all(&$from, &$to, &$cc) {
    $login = $_SESSION['nocc_login'];
    $domain = $_SESSION['nocc_domain'];
    if (!preg_match("|".$login.'@'.$domain."|i", $from))
        $rcpt = $from.'; ';
    $tab = explode(',', $to);
    while ($tmp = array_shift($tab))
        if (!preg_match("|".$login.'@'.$domain."|i", $tmp))
            $rcpt .= $tmp.'; ';
    $tab = explode(',', $cc);
    while ($tmp = array_shift($tab))
        if (!preg_match("|".$login.'@'.$domain."|i", $tmp))
            $rcpt .= $tmp.'; ';
    $rcpt = isset($rcpt) ? substr($rcpt, 0, strlen($rcpt) - 2) : $from;
    return ($rcpt);
}

/**
 * We need that to build a correct list of all the recipient when we send a message
 * @param string $addr
 * @param string $charset
 * @return array
 * TODO: Move to NOCC_MailAddress as static function and rename?
 */
function cut_address($addr, $charset) {
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
        if ($c == '"') {
            $quote_esc = !$quote_esc;
        }

        // Is this an address seperator (comma/semicolon)
        if ($c == ',' || $c == ';') {
            if (!$quote_esc) {
                $token = trim($token);
                if ($token != '') {
                    $addresses[] = $token;
                }
                $token = '';
                continue;
            }
        }

        $token .= $c;
    }
    if (!$quote_esc) {
        $token = trim($token);
        if ($token != '') {
            $addresses[] = $token;
        }
    }

    // Loop through addresses
    for ($i = 0; $i < sizeof($addresses); $i++) {
        // Wrap address in brackets, if not already
        $pos = strrpos($addresses[$i], '<');
        if (!is_int($pos))
            $addresses[$i] = '<'.$addresses[$i].'>';
        else {
            $name = '';
            if ($pos != 0)
                $name = '=?'.$charset.'?B?'.base64_encode(substr($addresses[$i], 0, $pos - 1)).'?=';
            $addr = substr($addresses[$i], $pos);
            $addresses[$i] = '"'.$name.'" '.$addr.'';
        }
    }
    return ($addresses);
}

/**
 * ...
 * @param object $pop
 * @param int $mail
 * @param string $part_no
 * @param string $transfer
 * @param string $msg_charset
 * @return string
 */
function view_part(&$pop, &$mail, $part_no, $transfer, $msg_charset) {
    if (isset($ev) && NoccException::isException($ev)) {
        return '<p class="error">' . $ev->getMessage . '</p>';
    }
    $text = $pop->fetchbody($mail, $part_no, $ev);
    if (NoccException::isException($ev)) {
        return '<p class="error">' . $ev->getMessage . '</p>';
    }
    return nl2br(htmlspecialchars(nocc_imap::decode($text, $transfer)));
}

/**
 * ...
 * @param string $string
 * @param string $charset
 * @return string
 * @todo Unused?
 */
function encode_mime(&$string, &$charset) { 
    $string = rawurlencode($string);
    $string = str_replace('%', '=', $string);
    $string = '=?' . $charset . '?Q?' . $string . '?=';
    return ($string);
} 

/**
 * This function removes temporary attachment files and
 * removes any attachment information from the session
 * @global object $conf
 */
function clear_attachments() {
    global $conf;
    if (isset($_SESSION['nocc_attach_array']) && is_array($_SESSION['nocc_attach_array']))
        while ($tmp = array_shift($_SESSION['nocc_attach_array']))
            @unlink($conf->tmpdir.'/'.$tmp->tmp_file);
    unset($_SESSION['nocc_attach_array']);
}

/**
 * This function chops the <mail@domain.com> bit from a 
 * full 'Blah Blah <mail@domain.com>' address, or not
 * depending on the 'hide_addresses' preference.
 * @global object $html_unknown
 * @param string $address
 * @return string
 * TODO: Move to NOCC_MailAddress as static function and rename?
 */
function display_address(&$address) {
    global $html_unknown;

    // Check for null
    if ($address == '')
        return $html_unknown;

    // Get preference
    $user_prefs = NOCC_Session::getUserPrefs();

    // If not set, return full address.
    if (!$user_prefs->getHideAddresses())
        return $address;

    return NOCC_MailAddress::chopAddress($address);
}

/**
 * ...
 * @param string $body
 * @param string $from
 * @param string $html_wrote
 * @return string
 */
function mailquote(&$body, &$from, $html_wrote) {
    $user_prefs = $_SESSION['nocc_user_prefs'];

    $crlf = "\r\n";
    $from = ucwords(trim(preg_replace("|&lt;.*&gt;|", "", str_replace("\"", "", $from))));

    if (isset($user_prefs->wrap_msg)) {
        $wrap_msg = $user_prefs->wrap_msg;
    } else {
        $wrap_msg = 0;
    }
    // If we must wrap the message
    if ($wrap_msg) {
        $msg = '';
        //Break message in table with "\r\n" as separator
        $tbl = explode("\r\n", $body);
        // For each line
        for ($i = 0, $buffer = ''; $i < count($tbl); ++$i) {
            unset($buffer);
            // Number of "> "
            $q = substr_count($tbl[$i], "> ");

            $tbl[$i] = rtrim($tbl[$i]);
            // Erase the "> "
            $tbl[$i] = str_replace("> ", "", $tbl[$i]);
            // Erase the break line
            $tbl[$i] = str_replace("\n", " ", $tbl[$i]);
            // length of "> > ...."
            $length = ($q + 1) * strlen("> ");
            // Add the quote if ligne is not to long
            if (strlen($tbl[$i]) + $length <= $wrap_msg)
                $msg .= str_pad($tbl[$i], strlen($tbl[$i]) + $length, "> ", STR_PAD_LEFT) . $crlf;
            // If line is to long, create new line
            else {
                $words = explode(" ", $tbl[$i]);
                $buffer = '';
                for ($j = 0; $j < count($words); ++$j) {
                    if (strlen($buffer) + strlen($words[$j]) + $length <= $wrap_msg)
                        $buffer .= $words[$j] . " ";
                    else {
                        $msg .=  str_pad(rtrim($buffer), strlen(rtrim($buffer)) + $length, "> ", STR_PAD_LEFT) . $crlf;
                        $buffer = $words[$j] . " ";
                    }
                }
                //if ($q != substr_count($tbl[$i + 1], "> "))
                $msg .= str_pad(rtrim($buffer), strlen(rtrim($buffer)) + $length, "> ", STR_PAD_LEFT) . $crlf;
            }
        }
        $body = $msg;
    } else {
        $body = "> " . preg_replace("|\n|", "\n> ", trim($body));
    }
    
    return($from . ' ' . $html_wrote . " :\n\n" . $body);

}

/**
 * If running with magic_quotes_gpc (get/post/cookie) set
 * in php.ini, we will need to strip slashes from every
 * field we receive from a get/post operation.
 * @param string $string
 * @return string
 */
function safestrip(&$string) {
    if(get_magic_quotes_gpc())
        $string = stripslashes($string);
    return $string;
}

/**
 * Wrap outgoing messages to
 * @param string $txt
 * @param int $length
 * @param string $newline
 * @todo Move to class_send.php?
 * @return string
 */
function wrap_outgoing_msg($txt, $length, $newline) {
    $msg = '';
    // cut message in segment
    $tbl = explode("\r\n", $txt);
    // Clean the end of the line
    for ($i = 0, $buffer = ''; $i < count($tbl); ++$i) {
        $tbl[$i] = rtrim($tbl[$i]);
        if (strlen($tbl[$i]) <= $length)
            $msg .= $tbl[$i] . $newline;
        else {
            unset($buffer);
            $words = explode(" ", $tbl[$i]);
            for ($j = 0; $j < count($words); ++$j) {
                if ((strlen($buffer) + strlen($words[$j])) <= $length)
                    $buffer .= $words[$j] . " ";
                else {
                    $msg .= rtrim($buffer) . $newline;
                    $buffer = $words[$j] . " ";
                }
            }
            $msg .= rtrim($buffer) . $newline;
        }
    }
    return $msg;
}

/**
 * ...
 * @param string $txt
 * @return string
 * @todo Move to class_send.php?
 */
function escape_dots($txt) {
    $crlf = "\r\n";
    $msg = '';

    // cut message in segment
    $tbl = explode($crlf, $txt);

    for ($i = 0; $i < count($tbl); ++$i) {
        if (strlen($tbl[$i]) != 0 && $tbl[$i][0] == '.')
            $tbl[$i] = "." . $tbl[$i];

        $msg .= $tbl[$i] . $crlf;
    }

    return $msg;
}

/**
 * ...
 * @param string $string
 * @param string $allow
 * @return string
 */
function strip_tags2(&$string, $allow) {
    $string = preg_replace('|<<|', '<nocc_less_than_tag><', $string);
    $string = preg_replace('|>>|', '><nocc_greater_than_tag>;', $string);
    $string = strip_tags($string, $allow . '<nocc_less_than_tag><nocc_greater_than_tag>');
    $string = preg_replace('|<nocc_less_than_tag>|', '<', $string);
    return preg_replace('|<nocc_greater_than_tag>|', '>', $string);
}

/**
 * ...
 * @global object $conf
 * @return int
 */
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

/**
 * Convert html entities to normal characters
 * @param string $string
 * @return string
 */
function unhtmlentities($string) {
    $trans_tbl = get_html_translation_table(HTML_ENTITIES);
    $trans_tbl = array_flip($trans_tbl);
    return strtr($string, $trans_tbl);
}

/**
 * Convert mail data (from, to, ...) to HTML
 * @param string $maildata
 * @param int $cutafter
 * @return string
 */
function convertMailData2Html($maildata, $cutafter = 0) {
    if (($cutafter > 0) && (strlen($maildata) > $cutafter)) {
        return htmlspecialchars(substr($maildata, 0, $cutafter)) . '&hellip;';
    } else {
        return htmlspecialchars($maildata);
    }
}

/**
 * Save session informations
 * @global object $conf
 * @param object $ev
 * @return bool
 * @todo Move to NOCC_Session class?
 */
function saveSession(&$ev) {
    global $conf;
    if (!empty($conf->prefs_dir)) {
         // generate string with session information
        unset ($cookie_string);
        $cookie_string = $_SESSION['nocc_user'];
        $cookie_string .= " " . $_SESSION['nocc_passwd'];
        $cookie_string .= " " . $_SESSION['nocc_login'];
        $cookie_string .= " " . $_SESSION['nocc_lang'];
        $cookie_string .= " " . $_SESSION['nocc_smtp_server'];
        $cookie_string .= " " . $_SESSION['nocc_smtp_port'];
        $cookie_string .= " " . $_SESSION['nocc_theme'];
        $cookie_string .= " " . $_SESSION['nocc_domain'];
        $cookie_string .= " " . $_SESSION['imap_namespace'];
        $cookie_string .= " " . $_SESSION['nocc_servr'];
        $cookie_string .= " " . $_SESSION['nocc_folder'];
        $cookie_string .= " " . $_SESSION['smtp_auth'];
        $cookie_string .= " " . $_SESSION['ucb_pop_server'];
        $cookie_string .= " " . $_SESSION['quota_enable'];
        $cookie_string .= " " . $_SESSION['quota_type'];

        // encode cookie string to base64
        $cookie_string = base64_encode($cookie_string);

        // save string to file
        $filename = $conf->prefs_dir . '/' . $_SESSION['nocc_user'].'@'.$_SESSION['nocc_domain'] . '.session';
        if (file_exists($filename) && !is_writable($filename)) {
            $ev = new NoccException($html_session_file_error);
            return false;
        }
        if (!is_writable($conf->prefs_dir)) {
            $ev = new NoccException($html_session_file_error);
            return false;
        }
        $file = fopen($filename, 'w');
        if (!$file) {
            $ev = new NoccException($html_session_file_error);
            return false;
        }
        fwrite($file, $cookie_string . "\n");
        fclose($file);
        return true;
    }
    return false;
}

/**
 * Restore session informations
 * @global object $conf
 * @param object $ev
 * @param string $key
 * @return string
 * @todo Move to NOCC_Session class?
 */
function loadSession(&$ev, &$key) {
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

/**
 * Convert a language string to HTML
 * @param string $langstring
 * @return string
 */
function convertLang2Html($langstring) {
    return htmlentities($langstring, ENT_COMPAT, 'UTF-8');
}

/**
 * Wrapper for iconv if GNU iconv is not used
 * @param string $input_charset
 * @param string $output_charset
 * @param string $text
 * @return string
 */
function os_iconv($input_charset, $output_charset, &$text) {
    if (strlen($text) == 0) {
        return $text;
    }

    if (PHP_OS == 'AIX') {
        // AIX has its own small selection of names.
        $input_charset = strtolower($input_charset);
        if ($input_charset == 'x-unknown' || $input_charset == 'us-ascii') {
            $input_charset = 'ISO8859-1';
        } else if (preg_match('|^iso[\-_]?8859[\-_]?([1-9][0-9]?)|', $input_charset, $groups)) {
            $input_charset = 'ISO8859-' . $groups[0];
        } else if (preg_match('|^(windows|cp|ibm)[\-_]?([0-9]+)$|', $input_charset, $groups)) {
            $input_charset = 'IBM-' . str_pad($groups[1], 3, '0', STR_PAD_LEFT);
        }
    } else {
        // Assume default GNU iconv.
        if ($input_charset == 'x-unknown') {
            $input_charset = 'ISO-8859-1';
        }
    }

    return @iconv($input_charset, $output_charset, $text);
}

/**
 * Build a folder breadcrumb navigation...
 * @param string $folder 
 */
function buildfolderlink($folder) {
    $folderpath = '';
    // split the string at the periods
    $elements = explode('.', $folder);
    for ($i = 0; $i < count($elements); $i++) {
        if ($i > 0) {
            $folderpath = $folderpath . '.';
            echo ".";
        }
        $folderpath = $folderpath . $elements[$i];
        echo "<a href=\"". $_SERVER['PHP_SELF'] . "?folder=" . $folderpath . "\">" . mb_convert_encoding($elements[$i], 'UTF-8', 'UTF7-IMAP') . "</a>";
    }
    echo "\n";
}

/**
 * ...
 * @global string $html_page
 * @global string $html_of
 * @global string $alt_prev
 * @global string $title_prev_page
 * @global string $alt_next
 * @global string $title_next_page
 * @param int $pages
 * @param int $skip
 * @return string
 */
function get_page_nav($pages, $skip) {
  global $html_page, $html_of, $alt_prev, $title_prev_page, $alt_next, $title_next_page;
  
  $html = '';
  if ($pages > 1) { // if there several pages...
    $form_select = '<select class="button" name="skip" onchange="submit();">';
    $selected = '';
    for ($i = 0; $i < $pages; $i++) { 
        $xpage = $i + 1;
        if ($i == $skip) {
            $selected = 'selected="selected"';
        } else {
            $selected = '';
        }
        $form_select .= '<option '.$selected.' value="'.$i.'">'.$xpage.'</option>';
    }
    $form_select .= '</select>';

    $page = $skip + 1;
    $pskip = $skip - 1;
    $nskip = $skip + 1;
    
    $start_page = $page - 2;
    $end_page = $page + 2;
    if ($page < 4) { // if first three pages...
      $start_page = 1;
      $end_page = 6;
    }
    elseif ($page > ($pages - 3)) { // if last three pages...
      $start_page = $pages - 5;
      $end_page = $pages;
    }
    if ($start_page < 1) {
      $end_page = $end_page - $start_page;
      $start_page = 1;
    }
    if ($end_page > $pages) {
      $end_page = $pages;
    }
    
    $html = '<form method="post" action="'.$_SERVER['PHP_SELF'].'">';
    $html .= '<div class="pagenav"><ul>';
    $html .= '<li class="pagexofy"><span>' . $html_page . ' ' . $form_select . ' ' . $html_of . ' ' . $pages . '</span></li>';
    if ($pskip > -1 ) // if NOT first page...
      $html .= '<li class="prev"><a href="' . $_SERVER['PHP_SELF'] . '?skip=' . $pskip . '" title="' . $title_prev_page . '" rel="prev">&laquo; ' . $alt_prev . '</a></li>';
    else // if first page...
      $html .= '<li class="prev"><span> &laquo; ' . $alt_prev . '</span></li>';
    if ($start_page > 1) {
      $html .= '<li class="page"><a href="' . $_SERVER['PHP_SELF'] . '?skip=0" title="' . $html_page . ' 1" rel="first">1</a></li>';
      if ($start_page > 2) {
        $html .= '<li class="extend"><span>&hellip;</span></li>';
      }
    }
    for ($xpage = $start_page; $xpage <= $end_page; $xpage++) { // for all visible pages...
      $xskip = $xpage - 1;
      if ($xpage == $page) // if current page...
        $html .= '<li class="current"><span>' . $xpage . '</span></li>';
      else // if NOT current page...
        $html .= '<li class="page"><a href="' . $_SERVER['PHP_SELF'] . '?skip=' . $xskip . '" title="' . $html_page . ' ' . $xpage . '">' . $xpage . '</a></li>';
    }
    if ($end_page < $pages) {
      if ($end_page < $pages - 1) {
        $html .= '<li class="extend"><span>&hellip;</span></li>';
      }
      $html .= '<li class="page"><a href="' . $_SERVER['PHP_SELF'] . '?skip=' . ($pages - 1) . '" title="' . $html_page . ' ' . $pages . '" rel="last">' . $pages . '</a></li>';
    }
    if ($nskip < $pages) // if NOT last page...
      $html .= '<li class="next"><a href="' . $_SERVER['PHP_SELF'] . '?skip=' . $nskip . '" title="' . $title_next_page . '" rel="next">' . $alt_next . ' &raquo;</a></li>';
    else // if last page...
      $html .= '<li class="next"><span>' . $alt_next . ' &raquo;</span></li>';
    $html .= '</ul></div>';
    $html .= '</form>';
  }
  return $html;
}
?>
