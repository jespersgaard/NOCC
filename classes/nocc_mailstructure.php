<?php
/**
 * Class for wrapping a imap_fetchstructure() object
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
 * Wrapping a imap_fetchstructure() object
 *
 * @package    NOCC
 */
class NOCC_MailStructure {
    /**
     * imap_fetchstructure() object
     * @access private
     */
    var $_structure;
    
    /**
     * Initialize the wrapper
     *
     * @param object $structure imap_fetchstructure() object
     * @todo Throw exception, if no vaild structure? 
     */
    function NOCC_MailStructure($structure) {
        $this->_structure = $structure;
    }
    
    /**
     * Get the complete imap_fetchstructure() object
     *
     * @return object
     */
    function getStructure() {
        return $this->_structure;
    }
    
    /**
     * Get the primary body type from the structure
     *
     * @return integer Primary body type
     */
    function getType() {
        return $this->_structure->type;
    }
    
    /**
     * Get the body transfer encoding from the structure
     *
     * @return integer Body transfer encoding
     */
    function getEncoding() {
        return $this->_structure->encoding;
    }
    
    /**
     * Get the MIME subtype from the structure
     *
     * @return string MIME subtype
     */
    function getSubtype() {
        if ($this->_structure->ifsubtype) {
          return $this->_structure->subtype;
        }
        return '';
    }
    
    /**
     * Get the content description from the structure
     *
     * @return string Content description
     */
    function getDescription() {
        if ($this->_structure->ifdescription) {
          return $this->_structure->description;
        }
        return '';
    }
    
    /**
     * Get the identification from the structure
     *
     * @todo Return really a integer value?
     * @return integer Identification
     */
    function getId() {
        if ($this->_structure->ifid) {
          return $this->_structure->id;
        }
        return 0;
    }
    
    /**
     * Get the number of lines from the structure
     *
     * @return integer Number of lines
     */
    function getLines() {
        if (isset($this->_structure->lines)) {
            return $this->_structure->lines;
        }
        return 0;
    }
    
    /**
     * Get the number of bytes from the structure
     *
     * @return integer Number of bytes
     */
    function getBytes() {
        if (isset($this->_structure->bytes)) {
            return $this->_structure->bytes;
        }
        return 0;
    }
    
    /**
     * Get the total number of bytes from the structure
     *
     * @return integer Total number of bytes
     */
    function getTotalBytes() {
        $totalbytes = $this->getBytes();
        if ($totalbytes == 0) { //if a mail has ANY attachements, $structure->bytes is ALWAYS empty...
            if (isset($this->_structure->parts)) {
                for ($i = 0; $i < count($this->_structure->parts); $i++) { //for all parts...
                    if (isset($this->_structure->parts[$i]->bytes)) {
                        $totalbytes += $this->_structure->parts[$i]->bytes;
                    }
                }
            }
        }
        return $totalbytes;
    }
    
    /**
     * Get the disposition from the structure
     *
     * @return string Disposition
     */
    function getDisposition() {
        if ($this->_structure->ifdisposition) {
          return $this->_structure->disposition;
        }
        return '';
    }
    
    /**
     * Get the parts from the structure
     *
     * @return array Parts
     */
    function getParts() {
        if (isset($this->_structure->parts)) {
          $this->_parts = $this->_structure->parts;
        }
        return array();
    }
    
    /**
     * Get the charset from the structure
     *
     * @param string $defaultcharset Default charset
     * @return string Charset
     */
    function getCharset($defaultcharset = '') {
        if ($this->_structure->ifparameters) {
            foreach ($this->_structure->parameters as $parameter) { //for all parameters...
                if (strtolower($parameter->attribute) == 'charset') {
                    return $parameter->value;
                }
            }
        }
        return $defaultcharset;
    }
}
?>
