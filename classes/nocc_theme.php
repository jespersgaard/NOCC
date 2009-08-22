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
    /**
     * Name
     * @access private
     */
    var $_name;
    
    /**
     * Path
     * @access private
     */
    var $_path;
    
    /**
     * Real path
     * @access private
     */
    var $_realpath;
    
    /**
     * Exists?
     * @access private
     */
    var $_exists;
    
    /**
     * Initialize the theme wrapper
     *
     * @param string $name Theme name
     */
    function NOCC_Theme($name) {
        //TODO: convertLang2Html($name) necessary?
        //TODO: safestrip?
        $this->_name = str_replace('..', '', $name);
        $this->_path = 'themes/' . $this->_name;
        $this->_realpath = realpath($this->_path);
        $this->_exists = file_exists($this->_realpath);
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
     * Exists the theme?
     *
     * @return bool Exists?
     */
    function exists() {
        return $this->_exists;
    }
    
    /**
     * Get the stylesheet from the theme
     *
     * @return string Stylesheet
     */
    function getStylesheet() {
        return $this->_path . '/style.css';
    }
    
    /**
     * Get the print stylesheet from the theme
     *
     * @return string Print stylesheet
     */
    function getPrintStylesheet() {
        return $this->_path . '/print.css';
    }
    
    /**
     * Get the favicon from the theme
     *
     * @return string Favicon
     */
    function getFavicon() {
        if (file_exists($this->_realpath . '/favicon.ico')) //if theme favicon exists...
            return $this->_path . '/favicon.ico';
        else //if NO theme favicon exists...
            return 'favicon.ico';
    }
    
    /**
     * Get the custom header from the theme
     *
     * @return string Custom header
     */
    function getCustomHeader() {
        return $this->_realpath . '/header.php';
    }
    
    /**
     * Get the custom footer from the theme
     *
     * @return string Custom footer
     */
    function getCustomFooter() {
        return $this->_realpath . '/footer.php';
    }
    
    /**
     * Replace text smilies with graphical smilies
     *
     * @param string $body String with text smilies
     * @return string String with graphical smilies (HTML)
     */
    function replaceTextSmilies($body) {
        $smiliespath = $this->_path . '/img/smilies';
        
        $body = ereg_replace('\;-?\)', '<img src="' . $smiliespath . '/wink.png" alt="wink"/>', $body); // ;-) ;)
        $body = ereg_replace('\;-?D', '<img src="' . $smiliespath . '/grin.png" alt="grin"/>', $body); // ;-D ;D
        $body = ereg_replace(':\'\(?', '<img src="' . $smiliespath . '/cry.png" alt="cry"/>', $body); // :'( :'
        $body = ereg_replace(':-?[xX]', '<img src="' . $smiliespath . '/confused.png" alt="confused"/>', $body); // :-x :X
        $body = ereg_replace(':-?\[\)', '<img src="' . $smiliespath . '/embarassed.png" alt="embarassed"/>', $body); // :-[) :[)
        $body = ereg_replace(':-?\*', '<img src="' . $smiliespath . '/love.png" alt="love"/>', $body); // :-* :*
        $body = ereg_replace(':-?[pP]', '<img src="' . $smiliespath . '/tongue.png" alt="tongue"/>', $body); // :-p :P
        $body = ereg_replace(':-?\)', '<img src="' . $smiliespath . '/happy.png" alt="happy"/>', $body); // :-) :)
        $body = ereg_replace(':-?\(', '<img src="' . $smiliespath . '/unhappy.png" alt="unhappy"/>', $body); // :-( :(
        $body = ereg_replace(':-[oO]', '<img src="' . $smiliespath . '/surprised.png" alt="surprised"/>', $body); // :-o :-O
        $body = ereg_replace('8-?\)', '<img src="' . $smiliespath . '/cool.png" alt="cool"/>', $body); // 8-) 8)
        
        return $body;
    }
}
?>
