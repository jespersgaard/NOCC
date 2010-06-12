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
     * @var object
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
        if (isset($this->_structure->type)) {
            return $this->_structure->type;
        }
        return 0;
    }
    
    /**
     * Get the primary body type text from the structure
     *
     * @return string Primary body type text
     */
    function getTypeText() {
        return $this->convertTypeToText($this->getType());
    }
    
    /**
     * Get the body transfer encoding from the structure
     *
     * @return integer Body transfer encoding
     */
    function getEncoding() {
        if (isset($this->_structure->encoding)) {
            return $this->_structure->encoding;
        }
        return 0;
    }
    
    /**
     * Get the body transfer encoding text from the structure
     *
     * @return string Body transfer encoding text
     */
    function getEncodingText() {
        return $this->convertEncodingToText($this->getEncoding());
    }
    
    /**
     * Get the MIME subtype from the structure
     *
     * @param string $defaultsubtype Default MIME subtype
     * @return string MIME subtype
     */
    function getSubtype($defaultsubtype = '') {
        if ($this->_structure->ifsubtype) {
          return $this->_structure->subtype;
        }
        return $defaultsubtype;
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
     * Get the Content-disposition MIME header parameters from the structure
     *
     * @return array Content-disposition MIME header parameters
     */
    function getDparameters() {
        if ($this->_structure->ifdparameters) {
          return $this->_structure->dparameters;
        }
        return array();
    }
    
    /**
     * Get a value from the Content-disposition MIME header parameters
     *
     * @param string $attribute Attribute
     * @param string $defaultvalue Default value
     * @return string Value
     */
    function getValueFromDparameters($attribute, $defaultvalue = '') {
        $attribute = strtolower($attribute);
        if ($this->_structure->ifdparameters) {
            foreach ($this->_structure->dparameters as $parameter) { //for all parameters...
                if (strtolower($parameter->attribute) == $attribute) {
                    return $parameter->value;
                }
            }
        }
        return $defaultvalue;
    }
    
    /**
     * Get the parameters from the structure
     *
     * @return array Parameters
     */
    function getParameters() {
        if ($this->_structure->ifparameters) {
          return $this->_structure->parameters;
        }
        return array();
    }
    
    /**
     * Get a value from the parameters
     *
     * @param string $attribute Attribute
     * @param string $defaultvalue Default value
     * @return string Value
     */
    function getValueFromParameters($attribute, $defaultvalue = '') {
        $attribute = strtolower($attribute);
        if ($this->_structure->ifparameters) {
            foreach ($this->_structure->parameters as $parameter) { //for all parameters...
                if (strtolower($parameter->attribute) == $attribute) {
                    return $parameter->value;
                }
            }
        }
        return $defaultvalue;
    }

    /**
     * Has the structure parts?
     *
     * @return bool Has parts?
     */
    function hasParts() {
        if (isset($this->_structure->parts)) {
            if (count($this->_structure->parts) > 0) {
                return true;
            }
        }
        return false;
    }

    /**
     * Get the parts from the structure
     *
     * @return array Parts
     */
    function getParts() {
        if ($this->hasParts()) {
          return $this->_structure->parts;
        }
        return array();
    }

    /**
     * Get the (file) name from the structure
     *
     * @param string $defaultname Default (file) name
     * @return string (File) name
     */
    function getName($defaultname = '') {
        $name = $this->getValueFromParameters('name');
        if (!empty($name)) { //if "name" parameter exists...
            return $name;
        }
        else { //if "name" parameter NOT exists...
            $filename = $this->getValueFromDparameters('filename');
            if (!empty($filename)) { //if "filename" parameter exists...
                return $filename;
            }
        }
        return $defaultname;
    }

    /**
     * Get the charset from the structure
     *
     * @param string $defaultcharset Default charset
     * @return string Charset
     */
    function getCharset($defaultcharset = '') {
        return $this->getValueFromParameters('Charset', $defaultcharset);
    }
    
    /**
     * Get the internet media type (MIME type) from the structure
     *
     * @return string Internet media type
     */
    function getInternetMediaType() {
        return $this->getTypeText() . '/' . $this->getSubtype();
    }

    /**
     * Is text?
     * @return bool Is text?
     */
    function isText() {
        if ($this->getType() == 0) { //if text...
            return true;
        }
        return false;
    }

    /**
     * Is multipart?
     * @return bool Is multipart?
     */
    function isMultipart() {
        if ($this->getType() == 1) { //if multipart...
            return true;
        }
        return false;
    }

    /**
     * Is alternative multipart?
     * @return bool Is alternative multipart?
     */
    function isAlternativeMultipart() {
        if ($this->isMultipart()) { //if multipart...
            if (strtoupper($this->getSubtype()) == 'ALTERNATIVE') { //if alternative multipart...
                return true;
            }
        }
        return false;
    }

    /**
     * Is related multipart?
     * @return bool Is related multipart?
     */
    function isRelatedMultipart() {
        if ($this->isMultipart()) { //if multipart...
            if (strtoupper($this->getSubtype()) == 'RELATED') { //if related multipart...
                return true;
            }
        }
        return false;
    }

    /**
     * Is message?
     * @return bool Is message?
     */
    function isMessage() {
        if ($this->getType() == 2) { //if message...
            return true;
        }
        return false;
    }

    /**
     * Is RFC822 message?
     * @return bool Is RFC822 message?
     */
    function isRfc822Message() {
        if ($this->isMessage()) { //if message...
            if (strtoupper($this->getSubtype()) == 'RFC822') { //if RFC822 message...
                return true;
            }
        }
        return false;
    }

    /**
     * Is application?
     * @return bool Is application?
     */
    function isApplication() {
        if ($this->getType() == 3) { //if application...
            return true;
        }
        return false;
    }

    /**
     * Is audio?
     * @return bool Is audio?
     */
    function isAudio() {
        if ($this->getType() == 4) { //if audio...
            return true;
        }
        return false;
    }

    /**
     * Is image?
     * @return bool Is image?
     */
    function isImage() {
        if ($this->getType() == 5) { //if image...
            return true;
        }
        return false;
    }

    /**
     * Is video?
     * @return bool Is video?
     */
    function isVideo() {
        if ($this->getType() == 6) { //if video...
            return true;
        }
        return false;
    }

    /**
     * Is other?
     * @return bool Is other?
     */
    function isOther() {
        if ($this->getType() == 7) { //if other...
            return true;
        }
        return false;
    }

    /**
     * Is attachment?
     * @return bool Is attachment?
     */
    function isAttachment() {
        if (strtolower($this->getDisposition()) == 'attachment') { //if attachment...
            return true;
        }
        return false;
    }

    /**
     * Is inline?
     * @return bool Is inline?
     */
    function isInline() {
        if (strtolower($this->getDisposition()) == 'inline') { //if inline...
            return true;
        }
        return false;
    }

    /**
     * Convert the primary body type to text
     *
     * @param integer $type Primary body type
     * @param string $defaulttypetext Default primary body type text
     * @return string Primary body type text
     * @static
     */
    function convertTypeToText($type, $defaulttypetext = 'unknown') {
        switch($type) {
            case 0: return 'text'; break;
            case 1: return 'multipart'; break;
            case 2: return 'message'; break;
            case 3: return 'application'; break;
            case 4: return 'audio'; break;
            case 5: return 'image'; break;
            case 6: return 'video'; break;
            case 7: return 'other'; break;
            default: return $defaulttypetext;
        }
    }
    
    /**
     * Convert the body transfer encoding to text
     *
     * @param integer $encoding Body transfer encoding
     * @param string $defaultencodingtext Default encoding text
     * @return string Body transfer encoding text
     * @static
     */
    function convertEncodingToText($encoding, $defaultencodingtext = '') {
        switch($encoding) {
            case 0: return '7BIT'; break;
            case 1: return '8BIT'; break;
            case 2: return 'BINARY'; break;
            case 3: return 'BASE64'; break;
            case 4: return 'QUOTED-PRINTABLE'; break;
            case 5: return 'OTHER'; break;
            default: return $defaultencodingtext;
        }
    }
}
?>
