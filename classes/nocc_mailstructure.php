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
    var $_structure;
    
    /**
     * Initialize the wrapper
     *
     * @todo Throw exception, if no vaild structure? 
     */
    function NOCC_MailStructure($structure) {
        $this->_structure = $structure;
    }
    
    /**
     * Get the structure
     *
     * @return array Structure array
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
     * @return int Identification
     */
    function getId() {
        if ($this->_structure->ifid) {
          return $this->_structure->id;
        }
        return 0;
    }
    
    /**
     * Get the disposition from the structure
     *
     * @return string Disposition
     */
    function getDisposition() {
        if ($structure->ifdisposition) {
          return $structure->disposition;
        }
        return '';
    }
    
    /**
     * Get the size from the structure in kilobyte
     *
     * @return integer Size in kilobyte
     */
    function getSize() {
        //TODO: Wrote
        return 1;
    }
    
    /**
     * Get the parts from the structure
     *
     * @return integer Size in kilobyte
     */
    function getParts() {
        if (isset($structure->parts)) {
          $this->_parts = $structure->parts;
        }
        return NULL;
    }
    
    /**
     * Get the charset from the structure
     *
     * @return string Charset
     */
    function getCharset() {
        //TODO: Wrote
        return '';
    }    
}
?>
