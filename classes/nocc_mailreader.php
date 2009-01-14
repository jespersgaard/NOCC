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
    var $_type, $_subtype;
    var $_parts;
    var $_charset;
    var $_totalbytes;
    
    /**
     * Initialize the mail reader
     */
    function NOCC_MailReader($msgno, &$pop, &$ev) {
        $structure = $pop->fetchstructure($msgno, $ev);
        
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
}
?>