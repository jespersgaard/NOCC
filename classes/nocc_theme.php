<?php
/**
 * Class for wrapping a theme
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
 * Wrapping details from a theme
 *
 * @package    NOCC
 */
class NOCC_Theme {
    var $_name;
    var $_path;
    var $_realpath;
    
    var $_stylesheet;
    var $_printstylesheet;
    
    var $_customheader;
    var $_customfooter;
    
    /**
     * Initialize the theme wrapper
     */
    function NOCC_Theme($name) {
        //TODO: convertLang2Html($name) necessary?
        $this->_name = str_replace('..', '', $name);
        $this->_path = 'themes/' . $this->_name;
        $this->_realpath = realpath($this->_path);
        
        $this->_stylesheet = $this->_path . '/style.css';
        $this->_printstylesheet = $this->_path . '/print.css';
        
        $this->_customheader = $this->_realpath . '/header.php';
        $this->_customfooter = $this->_realpath . '/footer.php';
    }
    
    /**
     * Get the name from the theme
     *
     * @return string Name
     */
    function getName() {
        return $this->_name;
    }
    
    /**
     * Get the path from the theme
     *
     * @return string Path
     */
    function getPath() {
        return $this->_path;
    }
    
    /**
     * Get the real path from the theme
     *
     * @return string Real path
     */
    function getRealPath() {
        return $this->_realpath;
    }
    
    /**
     * Get the stylesheet from the theme
     *
     * @return string Stylesheet
     */
    function getStylesheet() {
        return $this->_stylesheet;
    }
    
    /**
     * Get the print stylesheet from the theme
     *
     * @return string Print stylesheet
     */
    function getPrintStylesheet() {
        return $this->_printstylesheet;
    }
    
    /**
     * Get the custom header from the theme
     *
     * @return string Custom header
     */
    function getCustomHeader() {
        return $this->_customheader;
    }
    
    /**
     * Get the custom footer from the theme
     *
     * @return string Custom footer
     */
    function getCustomFooter() {
        return $this->_customfooter;
    }
}
?>
