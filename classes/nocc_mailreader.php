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
require_once 'nocc_headerinfo.php';
require_once 'nocc_header.php';

/**
 * Reading details from a mail
 *
 * @package    NOCC
 */
class NOCC_MailReader {
    /**
     * Structure
     * @var array
     * @access private
     */
    var $_structure;
    /**
     * Type
     * @var integer
     * @access private
     */
    var $_type;
    /**
     * Encoding
     * @var integer
     * @access private
     */
    var $_encoding;
    /**
     * Subtype
     * @var string
     * @access private
     */
    var $_subtype;
    /**
     * Description
     * @var string
     * @access private
     */
    var $_description;
    /**
     * ID
     * @var integer
     * @access private
     */
    var $_id;
    /**
     * Disposition
     * @var string
     * @access private
     */
    var $_disposition;
    /**
     * Charset
     * @var string
     * @access private
     */
    var $_charset;
    /**
     * Total bytes
     * @var integer
     * @access private
     */
    var $_totalbytes;

    /**
     * Message ID
     * @var string
     * @access private
     */
    var $_messageid;
    /**
     * Subject
     * @var string
     * @access private
     */
    var $_subject;
    /**
     * "From" address
     * @var string
     * @access private
     */
    var $_fromaddress;
    /**
     * "To" address
     * @var string
     * @access private
     */
    var $_toaddress;
    /**
     * "Cc" address
     * @var string
     * @access private
     */
    var $_ccaddress;
    /**
     * "Reply-To" address
     * @var string
     * @access private
     */
    var $_replytoaddress;
    /**
     * Timestamp
     * @var integer
     * @access private
     */
    var $_timestamp;
    /**
     * Is unread?
     * @var bool
     * @access private
     */
    var $_isunread;
    /**
     * Is flagged?
     * @var bool
     * @access private
     */
    var $_isflagged;

    /**
     * Header
     * @var NOCC_Header
     * @access private
     */
    var $_header;
    
    /**
     * Initialize the mail reader
     */
    function NOCC_MailReader($msgno, &$pop, &$ev) {
        //--------------------------------------------------------------------------------
        // Get values from structure...
        //--------------------------------------------------------------------------------
        $structure = $pop->fetchstructure($msgno, $ev);
        $mailstructure = new NOCC_MailStructure($structure);
        $this->_structure = $structure;
        
        $this->_type = $mailstructure->getType();
        $this->_encoding = $mailstructure->getEncoding();
        $this->_subtype = $mailstructure->getSubtype();
        $this->_description = $mailstructure->getDescription();
        $this->_id = $mailstructure->getId();
        $this->_disposition = $mailstructure->getDisposition();
        $this->_charset = $mailstructure->getCharset('ISO-8859-1');
        $this->_totalbytes = $mailstructure->getTotalBytes();
        //--------------------------------------------------------------------------------
        
        //--------------------------------------------------------------------------------
        // Get values from header info...
        //--------------------------------------------------------------------------------
        $headerinfo = $pop->headerinfo($msgno, $ev);
        $mailheaderinfo = new NOCC_HeaderInfo($headerinfo, $this->_charset);
        
        $this->_messageid = $mailheaderinfo->getMessageId();
        $this->_subject = $mailheaderinfo->getSubject();
        $this->_fromaddress = $mailheaderinfo->getFromAddress();
        $this->_toaddress = $mailheaderinfo->getToAddress();
        $this->_ccaddress = $mailheaderinfo->getCcAddress();
        $this->_replytoaddress = $mailheaderinfo->getReplyToAddress();
        $this->_timestamp = $mailheaderinfo->getTimestamp();
        
        $this->_isunread = false;
        $this->_isflagged = false;
        if ($pop->is_imap()) {
            $this->_isunread = $mailheaderinfo->isUnread();
            $this->_isflagged = $mailheaderinfo->isFlagged();
        }
        //--------------------------------------------------------------------------------

        //--------------------------------------------------------------------------------
        // Get header...
        //--------------------------------------------------------------------------------
        $header = $pop->fetchheader($msgno, $ev);
        $this->_header = new NOCC_Header($header);
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
     * @todo Really needed outside?
     *
     * @return integer Primary body type
     */
    function getType() {
        return $this->_type;
    }
    
    /**
     * Get the primary body type text from the mail
     * @todo Really needed outside?
     *
     * @return string Primary body type text
     */
    function getTypeText() {
        return NOCC_MailStructure::convertTypeToText($this->_type, 'text');
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
        return NOCC_MailStructure::convertEncodingToText($this->_encoding, 'none');
    }
    
    /**
     * Get the MIME subtype from the mail
     * @todo Really needed outside?
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
     * @return integer Identification
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
     * @return integer Date in Unix time
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
     * Is the mail unread on a UCB POP Server?
     * 
     * Check "Status" line with UCB POP Server to see if this is a new message.
     * This is a non-RFC standard line header.
     *
     * @return boolean Is unread on a UCB POP Server?
     */
    function isUnreadUcb() {
        if ($this->_header->getStatus() == '') {
            return true;
        }
        return false;
    }

    /**
     * Is the mail flagged?
     *
     * @return boolean Is flagged?
     */
    function isFlagged() {
        return ($this->_isflagged);
    }
    
    /**
     * Get the RFC2822 format header from the mail
     *
     * @return string RFC2822 format header
     */
    function getHeader() {
        return $this->_header->getHeader();
    }
    
    /**
     * Get the priority from the mail
     *
     * @return integer Priority
     */
    function getPriority() {
        return $this->_header->getPriority();
    }
    
    /**
     * Get the (translated) priority text from the mail
     *
     * @return string Priority text
     */
    function getPriorityText() {
        return $this->_header->getPriorityText();
    }
    
    /**
     * Is the mail a HTML mail?
     * @todo Drop property, if we have a getContentType() or getFullMimeType() property
     *
     * @return bool Is HTML mail?
     */
    function isHtmlMail() {
        return preg_match('|text/html|i', $this->_header->getHeader());
    }
    
    /**
     * Is the mail a SPAM mail?
     *
     * @return bool Is SPAM mail?
     */
    function isSpam() {
        return $this->_header->hasSpamFlag();
    }
}
?>
