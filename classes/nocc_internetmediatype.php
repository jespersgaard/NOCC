<?php
/**
 * Class for wrapping the internet media type (MIME type) from a imap_fetchstructure() object
 *
 * Copyright 2010 Tim Gerundt <tim@gerundt.de>
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
 * Wrapping the internet media type (MIME type) from a imap_fetchstructure() object
 * 
 * @package    NOCC
 */
class NOCC_InternetMediaType {
    /**
     * Type
     * @var integer
     * @access private
     */
    private $_type;

    /**
     * Subtype
     * @var string
     * @access private
     */
    private $_subtype;

    /**
     * Initialize the wrapper
     * @param integer $type Type
     * @param string $subtype Subtype
     */
    public function __construct($type, $subtype) {
        $this->_type = -1;
        $this->_subtype = '';
        if (is_int($type) && is_string($subtype)) { //if valid types...
            $this->_type = $type;
            $this->_subtype = strtolower($subtype);
        }
    }

    /**
     * Is text?
     * @return bool Is text?
     */
    public function isText() {
        if ($this->_type == 0) { //if text...
            return true;
        }
        return false;
    }

    /**
     * Is multipart?
     * @return bool Is multipart?
     */
    public function isMultipart() {
        if ($this->_type == 1) { //if multipart...
            return true;
        }
        return false;
    }

    /**
     * Is message?
     * @return bool Is message?
     */
    public function isMessage() {
        if ($this->_type == 2) { //if message...
            return true;
        }
        return false;
    }

    /**
     * Is application?
     * @return bool Is application?
     */
    public function isApplication() {
        if ($this->_type == 3) { //if application...
            return true;
        }
        return false;
    }

    /**
     * Is audio?
     * @return bool Is audio?
     */
    public function isAudio() {
        if ($this->_type == 4) { //if audio...
            return true;
        }
        return false;
    }

    /**
     * Is image?
     * @return bool Is image?
     */
    public function isImage() {
        if ($this->_type == 5) { //if image...
            return true;
        }
        return false;
    }

    /**
     * Is video?
     * @return bool Is video?
     */
    public function isVideo() {
        if ($this->_type == 6) { //if video...
            return true;
        }
        return false;
    }

    /**
     * Is other?
     * @return bool Is other?
     */
    public function isOther() {
        if ($this->_type == 7) { //if other...
            return true;
        }
        return false;
    }

    /**
     * ...
     * @return string Internet media type text
     */
    public function __toString() {
        switch($this->_type) {
            case 0: return 'text/' . $this->_subtype;
            case 1: return 'multipart/' . $this->_subtype;
            case 2: return 'message/' . $this->_subtype;
            case 3: return 'application/' . $this->_subtype;
            case 4: return 'audio/' . $this->_subtype;
            case 5: return 'image/' . $this->_subtype;
            case 6: return 'video/' . $this->_subtype;
            case 7: return 'other/' . $this->_subtype;
        }
        return '';
    }
}
?>
