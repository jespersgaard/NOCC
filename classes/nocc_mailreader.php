<?php
/**
 * Class for reading a mail
 *
 * Copyright 2009-2010 Tim Gerundt <tim@gerundt.de>
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
require_once 'nocc_mailpart.php';
require_once 'nocc_mailparts.php';
require_once 'nocc_headerinfo.php';
require_once 'nocc_header.php';

/**
 * Reading details from a mail
 *
 * @package    NOCC
 */
class NOCC_MailReader {
    /**
     * Mail parts
     * @var NOCC_MailParts
     * @access private
     */
    private $_mailparts;

    /**
     * Type
     * @var integer
     * @access private
     */
    private $_type;
    /**
     * Encoding
     * @var integer
     * @access private
     */
    private $_encoding;
    /**
     * Subtype
     * @var string
     * @access private
     */
    private $_subtype;
    /**
     * Description
     * @var string
     * @access private
     */
    private $_description;
    /**
     * ID
     * @var integer
     * @access private
     */
    private $_id;
    /**
     * Disposition
     * @var string
     * @access private
     */
    private $_disposition;
    /**
     * Charset
     * @var string
     * @access private
     */
    private $_charset;
    /**
     * Total bytes
     * @var integer
     * @access private
     */
    private $_totalbytes;

    /**
     * Message ID
     * @var string
     * @access private
     */
    private $_messageid;
    /**
     * Subject
     * @var string
     * @access private
     */
    private $_subject;
    /**
     * "From" address
     * @var string
     * @access private
     */
    private $_fromaddress;
    /**
     * "To" address
     * @var string
     * @access private
     */
    private $_toaddress;
    /**
     * "Cc" address
     * @var string
     * @access private
     */
    private $_ccaddress;
    /**
     * "Reply-To" address
     * @var string
     * @access private
     */
    private $_replytoaddress;
    /**
     * Timestamp
     * @var integer
     * @access private
     */
    private $_timestamp;
    /**
     * Is unread?
     * @var bool
     * @access private
     */
    private $_isunread;
    /**
     * Is flagged?
     * @var bool
     * @access private
     */
    private $_isflagged;

    /**
     * Header
     * @var NOCC_Header
     * @access private
     */
    private $_header;

    /**
     * Initialize the mail reader
     * @param integer $msgno Message number
     * @param nocc_imap $pop IMAP/POP3 class
     * @param bool $fullDetails Read full details?
     */
    public function __construct($msgno, &$pop, $fullDetails = true) {
        //--------------------------------------------------------------------------------
        // Get values from structure...
        //--------------------------------------------------------------------------------
        $mailstructure = $pop->fetchstructure($msgno);
        
        $this->_mailparts = null;
        if ($fullDetails == true) { //if read full details...
            $this->_mailparts = new NOCC_MailParts($mailstructure);
        }
        
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
     * Get the body part
     * @return NOCC_MailPart Body part
     */
    public function getBodyPart() {
        if (!empty($this->_mailparts)) { //if mail parts exists...
            return $this->_mailparts->getBodyPart();
        }
        return null;
    }

    /**
     * Get the attachment parts
     * @return array Attachment parts
     */
    public function getAttachmentParts() {
        if (!empty($this->_mailparts)) { //if mail parts exists...
            return $this->_mailparts->getAttachmentParts();
        }
        return array();
    }

    /**
     * Get the primary body type from the mail
     * @todo Really needed outside?
     * @return integer Primary body type
     */
    public function getType() {
        return $this->_type;
    }
    
    /**
     * Get the primary body type text from the mail
     * @todo Really needed outside?
     * @return string Primary body type text
     */
    public function getTypeText() {
        return NOCC_MailStructure::convertTypeToText($this->_type, 'text');
    }
    
    /**
     * Get the body transfer encoding from the mail
     * @return integer Body transfer encoding
     */
    public function getEncoding() {
        return $this->_encoding;
    }
    
    /**
     * Get the body transfer encoding text from the mail
     * @return string Body transfer encoding text
     */
    public function getEncodingText() {
        return NOCC_MailStructure::convertEncodingToText($this->_encoding, 'none');
    }
    
    /**
     * Get the MIME subtype from the mail
     * @todo Really needed outside?
     * @return string MIME subtype
     */
    public function getSubtype() {
        return $this->_subtype;
    }
    
    /**
     * Get the content description from the mail
     * @return string Content description
     */
    public function getDescription() {
        return $this->_description;
    }
    
    /**
     * Get the identification from the mail
     * @return integer Identification
     */
    public function getId() {
        return $this->_id;
    }
    
    /**
     * Get the disposition from the mail
     * @return string Disposition
     */
    public function getDisposition() {
        return $this->_disposition;
    }
    
    /**
     * Get the charset from the mail
     * @return string Charset
     */
    public function getCharset() {
        return $this->_charset;
    }
    
    /**
     * Get the size from the mail in kilobyte
     * @return integer Size in kilobyte
     */
    public function getSize() {
        return ($this->_totalbytes > 1024) ? ceil($this->_totalbytes / 1024) : 1;
    }
    
    /**
     * Has the mail attachments?
     * @return boolean Has attachments?
     */
    public function hasAttachments() {
        if ($this->_type == 1 || $this->_type == 3) { //if "multipart" or "application" message...
            if ($this->_subtype != 'ALTERNATIVE' && $this->_subtype != 'RELATED') {
                return true;
            }
        }
        return false;
    }
    
    /**
     * Get the message id from the mail
     * @return string Message id
     */
    public function getMessageId() {
        return $this->_messageid;
    }
    
    /**
     * Get the subject from the mail
     * @return string Subject
     */
    public function getSubject() {
        return $this->_subject;
    }
    
    /**
     * Get the "From" address from the mail
     * @return string "From" address
     */
    public function getFromAddress() {
        return $this->_fromaddress;
    }
    
    /**
     * Get the "To" address from the mail
     * @return string "To" address
     */
    public function getToAddress() {
        return $this->_toaddress;
    }
    
    /**
     * Get the "Cc" address from the mail
     * @return string "Cc" address
     */
    public function getCcAddress() {
        return $this->_ccaddress;
    }
    
    /**
     * Get the "Reply-To" address from the mail
     * @return string "Reply-To" address
     */
    public function getReplyToAddress() {
        return $this->_replytoaddress;
    }
    
    /**
     * Get the date (in Unix time) from the mail
     * @return integer Date in Unix time
     */
    public function getTimestamp() {
        return $this->_timestamp;
    }
    
    /**
     * Is the mail unread?
     * @return boolean Is unread?
     */
    public function isUnread() {
        return $this->_isunread;
    }
    
    /**
     * Is the mail unread on a UCB POP Server?
     * 
     * Check "Status" line with UCB POP Server to see if this is a new message.
     * This is a non-RFC standard line header.
     *
     * @return boolean Is unread on a UCB POP Server?
     */
    public function isUnreadUcb() {
        if ($this->_header->getStatus() == '') {
            return true;
        }
        return false;
    }

    /**
     * Is the mail flagged?
     * @return boolean Is flagged?
     */
    public function isFlagged() {
        return $this->_isflagged;
    }
    
    /**
     * Get the RFC2822 format header from the mail
     * @return string RFC2822 format header
     */
    public function getHeader() {
        return $this->_header->getHeader();
    }
    
    /**
     * Get the priority from the mail
     * @return integer Priority
     */
    public function getPriority() {
        return $this->_header->getPriority();
    }
    
    /**
     * Get the (translated) priority text from the mail
     * @return string Priority text
     */
    public function getPriorityText() {
        return $this->_header->getPriorityText();
    }
    
    /**
     * Is the mail a HTML mail?
     * @todo Drop property, if we have a getContentType() or getFullMimeType() property
     * @return bool Is HTML mail?
     */
    public function isHtmlMail() {
        return preg_match('|text/html|i', $this->_header->getHeader());
    }
    
    /**
     * Is the mail a SPAM mail?
     * @return bool Is SPAM mail?
     */
    public function isSpam() {
        return $this->_header->hasSpamFlag();
    }
}
?>
