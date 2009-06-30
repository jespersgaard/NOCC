<?php
/**
 * Class for reading a mail
 *
 * Copyright 2009 Tim Gerundt <tim@gerundt.de>
 *
 * This file is part of NOCC. NOCC is free software under the terms of the
 * GNU General Public License. You should have received a copy of the license
 * along with NOCC.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package    NOCC
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @version    SVN: $Id$
 */

require_once 'nocc_mailstructure.php';

/**
 * Reading details from a mail
 *
 * @package    NOCC
 */
class NOCC_MailReader {
    var $_structure;
    var $_type;
    var $_encoding;
    var $_subtype;
    var $_description;
    var $_id;
    var $_disposition;
    var $_parts;
    var $_charset;
    var $_totalbytes;
    
    var $_messageid;
    var $_subject;
    var $_fromaddress;
    var $_toaddress;
    var $_ccaddress;
    var $_replytoaddress;
    var $_timestamp;
    var $_isunread;
    
    var $_header;
    var $_priority;
    
    /**
     * Initialize the mail reader
     */
    function NOCC_MailReader($msgno, &$pop, &$ev) {
        //--------------------------------------------------------------------------------
        // Get values from structure...
        //--------------------------------------------------------------------------------
        $structure = $pop->fetchstructure($msgno, $ev);
        $this->_structure = $structure;
        
        $this->_type = $structure->type;
        $this->_encoding = $structure->encoding;
        $this->_subtype = '';
        if ($structure->ifsubtype) {
          $this->_subtype = $structure->subtype;
        }
        $this->_description = '';
        if ($structure->ifdescription) {
          $this->_description = $structure->description;
        }
        $this->_id = 0;
        if ($structure->ifid) {
          $this->_id = $structure->id;
        }
        $this->_disposition = '';
        if ($structure->ifdisposition) {
          $this->_disposition = $structure->disposition;
        }
        $this->_parts = NULL;
        if (isset($structure->parts)) {
          $this->_parts = $structure->parts;
        }
        //--------------------------------------------------------------------------------
        
        //--------------------------------------------------------------------------------
        // Get the charset from the mail...
        //--------------------------------------------------------------------------------
        $this->_charset = 'ISO-8859-1';
        if ($structure->ifparameters) {
            foreach ($structure->parameters as $parameter) { //for all parameters...
                if (strtolower($parameter->attribute) == 'charset') {
                    $this->_charset = $parameter->value;
                    break;
                }
            }
        }
        //--------------------------------------------------------------------------------
        
        //--------------------------------------------------------------------------------
        // Get the total bytes from the mail...
        //--------------------------------------------------------------------------------
        $this->_totalbytes = 0;
        if (isset($structure->bytes)) {
            $this->_totalbytes = $structure->bytes;
        }
        if ($this->_totalbytes == 0) { //if a mail has ANY attachements, $structure->bytes is ALWAYS empty...
            if (isset($structure->parts)) {
                for ($i = 0; $i < count($structure->parts); $i++) { //for all parts...
                    if (isset($structure->parts[$i]->bytes)) {
                        $this->_totalbytes += $structure->parts[$i]->bytes;
                    }
                }
            }
        }
        //--------------------------------------------------------------------------------
        
        //--------------------------------------------------------------------------------
        // Get values from header info...
        //--------------------------------------------------------------------------------
        $headerinfo = $pop->headerinfo($msgno, $ev);
        
        $this->_messageid = '';
        if (isset($headerinfo->message_id)) {
            $this->_messageid = $headerinfo->message_id;
        }
        $this->_subject = '';
        if (isset($headerinfo->subject)) {
            $this->_subject = $this->_decodeMimeHeader($headerinfo->subject, $this->_charset);
        }
        $this->_fromaddress = '';
        if (isset($headerinfo->fromaddress)) {
            $this->_fromaddress = $this->_decodeMimeHeader($headerinfo->fromaddress, $this->_charset);
        }
        $this->_toaddress = '';
        if (isset($headerinfo->toaddress)) {
            $this->_toaddress = $this->_decodeMimeHeader($headerinfo->toaddress, $this->_charset);
        }
        $this->_ccaddress = '';
        if (isset($headerinfo->ccaddress)) {
            $this->_ccaddress = $this->_decodeMimeHeader($headerinfo->ccaddress, $this->_charset);
        }
        $this->_replytoaddress = '';
        if (isset($headerinfo->reply_toaddress)) {
            $this->_replytoaddress = $this->_decodeMimeHeader($headerinfo->reply_toaddress, $this->_charset);
        }
        $this->_timestamp = rtrim($headerinfo->udate);
        
        $this->_isunread = false;
        if ($pop->is_imap()) {
            if (($headerinfo->Unseen == 'U') || ($headerinfo->Recent == 'N'))
                $this->_isunread = true;
        }
        //--------------------------------------------------------------------------------

        //--------------------------------------------------------------------------------
        // Get values from header...
        //--------------------------------------------------------------------------------
        $this->_header = $pop->fetchheader($msgno, $ev);
        
        $this->_priority = 3;
        $header_lines = explode("\r\n", $this->_header);
        foreach ($header_lines as $header_line) { //for all header lines...
            $header_field = explode(':', $header_line);
            switch (strtolower($header_field[0])) {
                case 'x-priority':
                case 'importance':
                case 'priority':
                    $this->_priority = $this->_parsePriority($header_field[1]);
                    break;
            }
        }
        //--------------------------------------------------------------------------------
    }
    
    /**
     * Get the structure from the mail
     * @todo Drop property, if we included the functions GetPart() and GetSinglePart() to this class
     *
     * @return array Structure array
     */
    function getStructure() {
        return $this->_structure;
    }
    
    /**
     * Get the primary body type from the mail
     *
     * @return integer Primary body type
     */
    function getType() {
        return $this->_type;
    }
    
    /**
     * Get the body transfer encoding from the mail
     *
     * @return integer Body transfer encoding
     */
    function getEncoding() {
        return $this->_encoding;
    }
    
    /**
     * Get the body transfer encoding text from the mail
     *
     * @return string Body transfer encoding text
     */
    function getEncodingText() {
        switch($this->_encoding) {
            case 0: return '7BIT'; break;
            case 1: return '8BIT'; break;
            case 2: return 'BINARY'; break;
            case 3: return 'BASE64'; break;
            case 4: return 'QUOTED-PRINTABLE'; break;
            case 5: return 'OTHER'; break;
            default: return 'none';
        }
    }
    
    /**
     * Get the MIME subtype from the mail
     *
     * @return string MIME subtype
     */
    function getSubtype() {
        return $this->_subtype;
    }
    
    /**
     * Get the content description from the mail
     *
     * @return string Content description
     */
    function getDescription() {
        return $this->_description;
    }
    
    /**
     * Get the identification from the mail
     *
     * @return int Identification
     */
    function getId() {
        return $this->_id;
    }
    
    /**
     * Get the disposition from the mail
     *
     * @return string Disposition
     */
    function getDisposition() {
        return $this->_disposition;
    }
    
    /**
     * Get the charset from the mail
     *
     * @return string Charset
     */
    function getCharset() {
        return $this->_charset;
    }
    
    /**
     * Get the size from the mail in kilobyte
     *
     * @return integer Size in kilobyte
     */
    function getSize() {
        return ($this->_totalbytes > 1024) ? ceil($this->_totalbytes / 1024) : 1;
    }
    
    /**
     * Has the mail attachments?
     *
     * @return boolean Has attachments?
     */
    function hasAttachments() {
        if ( $this->_type == 1 || $this->_type == 3) { //if "multipart" or "application" message...
            if ($this->_subtype != 'ALTERNATIVE' && $this->_subtype != 'RELATED') {
                return true;
            }
        }
        return false;
    }
    
    /**
     * Get the message id from the mail
     *
     * @return string Message id
     */
    function getMessageId() {
        return ($this->_messageid);
    }
    
    /**
     * Get the subject from the mail
     *
     * @return string Subject
     */
    function getSubject() {
        return ($this->_subject);
    }
    
    /**
     * Get the "From" address from the mail
     *
     * @return string "From" address
     */
    function getFromAddress() {
        return ($this->_fromaddress);
    }
    
    /**
     * Get the "To" address from the mail
     *
     * @return string "To" address
     */
    function getToAddress() {
        return ($this->_toaddress);
    }
    
    /**
     * Get the "Cc" address from the mail
     *
     * @return string "Cc" address
     */
    function getCcAddress() {
        return ($this->_ccaddress);
    }
    
    /**
     * Get the "Reply-To" address from the mail
     *
     * @return string "Reply-To" address
     */
    function getReplyToAddress() {
        return ($this->_replytoaddress);
    }
    
    /**
     * Get the date (in Unix time) from the mail
     *
     * @return string Date in Unix time
     */
    function getTimestamp() {
        return ($this->_timestamp);
    }
    
    /**
     * Is the mail unread?
     *
     * @return boolean Is unread?
     */
    function isUnread() {
        return ($this->_isunread);
    }
    
    /**
     * Get the RFC2822 format header from the mail
     *
     * @return string RFC2822 format header
     */
    function getHeader() {
        return $this->_header;
    }
    
    /**
     * Get the priority from the mail
     *
     * @return integer Priority
     */
    function getPriority() {
        return $this->_priority;
    }
    
    /**
     * Get the (translated) priority text from the mail
     *
     * @return string Priority text
     */
    function getPriorityText() {
        global $html_highest, $html_high, $html_normal, $html_low, $html_lowest;
        
        switch ($this->_priority) {
            case 1: return $html_highest; break;
            case 2: return $html_high; break;
            case 3: return $html_normal; break;
            case 4: return $html_low; break;
            case 5: return $html_lowest; break;
            default: return '';
        }
    }
    
    /**
     * Decode MIME header
     *
     * @return string Decoded MIME header
     */
    function _decodeMimeHeader($mimeheader, $charset) {
        $decodedheader = '';
        if (isset($mimeheader)) {
            $mimeheader = str_replace('x-unknown', $charset, $mimeheader);
            
            $decoded = nocc_imap::mime_header_decode($mimeheader);
            for ($i = 0; $i < count($decoded); $i++) { //for all elements...
                $decodedheader .= $decoded[$i]->text;
            }
        }
        return $decodedheader;
    }
    
    /**
     * Normalise the different Priority headers into a uniform value,
     * namely that of the X-Priority header (1, 3, 5). Supports:
     * Priority, X-Priority, Importance.
     * X-MS-Mail-Priority is not parsed because it always coincides
     * with one of the other headers.
     *
     * @param string $sValue literal priority name
     * @return integer
     *
     * @copyright &copy; 2003-2007 The SquirrelMail Project Team
     * @license http://opensource.org/licenses/gpl-license.php GNU Public License
     */
    function _parsePriority($sValue) {
        // don't use function call inside array_shift.
        $aValue = preg_split('/\s/',trim($sValue));
        $value = strtolower(array_shift($aValue));

        if ( is_numeric($value) ) {
            return $value;
        }
        if ( $value == 'urgent' || $value == 'high' ) {
            return 2;
        } elseif ( $value == 'non-urgent' || $value == 'low' ) {
            return 4;
        }
        // default is normal priority
        return 3;
    }
}
?>
