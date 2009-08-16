<?php
/**
 * Class for wrapping a imap_headerinfo() object
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
 * Wrapping a imap_headerinfo() object
 *
 * @package    NOCC
 */
class NOCC_HeaderInfo {
    /**
     * imap_headerinfo() object
     * @access private
     */
    var $_headerinfo;
    
    /**
     * Default charset
     * @access private
     */
    var $_defaultcharset;
    
    /**
     * Initialize the wrapper
     *
     * @param object $headerinfo imap_headerinfo() object
     * @param string $defaultcharset Default charset
     * @todo Throw exception, if no vaild header info? 
     */
    function NOCC_HeaderInfo($headerinfo, $defaultcharset = 'ISO-8859-1') {
        $this->_headerinfo = $headerinfo;
        $this->_defaultcharset = $defaultcharset;
    }
    
    /**
     * Get the default charset
     *
     * @return string Default charset
     */
    function getDefaultCharset() {
        return $this->_defaultcharset;
    }
    
    /**
     * Set the default charset
     *
     * @param string $defaultcharset Default charset
     */
    function setDefaultCharset($defaultcharset) {
        $this->_defaultcharset = $defaultcharset;
    }
    
    /**
     * Decode MIME header
     *
     * @param string $mimeheader Encoded MIME header
     * @param string $defaultcharset Default charset
     * @return string Decoded MIME header
     * @access private
     */
    function _decodeMimeHeader($mimeheader, $defaultcharset) {
        $decodedheader = '';
        if (isset($mimeheader)) {
            $mimeheader = str_replace('x-unknown', $defaultcharset, $mimeheader);
            
            $decoded = nocc_imap::mime_header_decode($mimeheader);
            for ($i = 0; $i < count($decoded); $i++) { //for all elements...
                $decodedheader .= $decoded[$i]->text;
            }
        }
        return $decodedheader;
    }
}
?>
