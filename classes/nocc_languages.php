<?php
/**
 * Class for wrapping the languages
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
 * Wrapping the languages
 *
 * @package    NOCC
 */
class NOCC_Languages {
    /**
     * Languages
     * @access private
     */
    var $_languages;
    
    /**
     * Initialize the languages wrapper
     *
     * @param string $path Languages path (relative)
     */
    function NOCC_Languages($path) {
        $this->_languages = array();
        if (is_dir($path)) { //if is directory...
            if (substr($path, -1) != '/') { //if NOT ends with '/'...
              $path .= '/';
            }
            
            //TODO: Move some code to a NOCC_Directory class?
            if ($handle = opendir($path)) { //if can open the directory...
                while (false !== ($name = readdir($handle))) { //for each item...
                    if ($name != '.' && $name != '..' && is_file($path . $name)) { //if file...
                        //--------------------------------------------------------------------------------
                        //TODO: Move code to a NOCC_File class?
                        //--------------------------------------------------------------------------------
                        $pos = strrpos($name, '.');
                        if ($pos === false) { //if NOT found a extension...
                            $basename = $name;
                            $extension = '';
                        }
                        else { //if found a extension...
                            $basename = substr($name, 0, $pos);
                            $extension = substr($name, $pos + 1);
                        }
                        //--------------------------------------------------------------------------------
                        if (strtolower($extension) == 'php') {
                            $this->_languages[$basename] = $path . $name;
                        }
                    }
                }
                closedir($handle);
            }
        }
    }
    
    /**
     * Get the count from the languages
     *
     * @return int Count
     */
    function count() {
      return count($this->_languages);
    }
}
?>
