<?php
/**
 * Class for wrapping the themes
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
 * Wrapping the themes
 *
 * @package    NOCC
 */
class NOCC_Themes {
    /**
     * Themes
     * @access private
     */
    var $_themes;
    
    /**
     * Initialize the themes wrapper
     *
     * @param string $path Themes path (relative)
     */
    function NOCC_Themes($path) {
        $this->_themes = array();
        if (isset($path) && !empty($path)) { //if path is set...
            if (is_dir($path)) { //if is directory...
                if (substr($path, -1) != '/') { //if NOT ends with '/'...
                  $path .= '/';
                }
                
                //TODO: Move some code to a NOCC_Directory class?
                if ($handle = opendir($path)) { //if can open the directory...
                    while (false !== ($name = readdir($handle))) { //for each item...
                        if ($name != '.' && $name != '..' && is_dir($path . $name)) { //if subdirectory...
                            if (is_file($path . $name . '\style.css')) { //if style.css exists...
                                $this->_themes[$name] = $path . $name;
                            }
                        }
                    }
                    closedir($handle);
                }
            }
        }
    }
    
    /**
     * Get the count from the themes
     *
     * @return int Count
     */
    function count() {
        return count($this->_themes);
    }
}
?>
