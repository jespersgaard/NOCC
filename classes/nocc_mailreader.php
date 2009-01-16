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

/**
 * Reading details from a mail
 *
 * @package    NOCC
 */
class NOCC_MailReader {
    var $_structure;
    var $_type, $_subtype;
    var $_parts;
    var $_charset;
    var $_totalbytes;
    
    var $_subject;
    var $_fromaddress;
    var $_toaddress;
    var $_ccaddress;
    var $_replytoaddress;
    var $_timestamp;
    
    /**
     * Initialize the mail reader
     */
    function NOCC_MailReader($msgno, &$pop, &$ev) {
        $structure = $pop->fetchstructure($msgno, $ev);
        $this->_structure = $structure;
        
        $this->_type = $structure->type;
        $this->_subtype = '';
        if ($structure->ifsubtype) {
          $this->_subtype = $structure->subtype;
        }
        $this->_parts = $structure->parts;
        
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
        
        $headerinfo = $pop->headerinfo($msgno, $ev);
        
        $this->_subject = '';
        if (isset($this->_subject)) {
            $this->_subject = $this->_decodeMimeHeader($headerinfo->subject, $this->_charset);
        }
        $this->_fromaddress = '';
        if (isset($this->_fromaddress)) {
            $this->_fromaddress = $this->_decodeMimeHeader($headerinfo->fromaddress, $this->_charset);
        }
        $this->_toaddress = '';
        if (isset($this->_toaddress)) {
            $this->_toaddress = $this->_decodeMimeHeader($headerinfo->toaddress, $this->_charset);
        }
        $this->_ccaddress = '';
        if (isset($this->_ccaddress)) {
            $this->_ccaddress = $this->_decodeMimeHeader($headerinfo->ccaddress, $this->_charset);
        }
        $this->_replytoaddress = '';
        if (isset($this->_replytoaddress)) {
            $this->_replytoaddress = $this->_decodeMimeHeader($headerinfo->reply_toaddress, $this->_charset);
        }
        $this->_timestamp = rtrim($headerinfo->udate);
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
     * Get the MIME subtype from the mail
     *
     * @return string MIME subtype
     */
    function getSubtype() {
        return $this->_subtype;
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
}
?>