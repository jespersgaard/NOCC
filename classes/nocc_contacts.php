<?php
/**
 * Class for wrapping the contacts
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
 * Wrapping the contacts
 *
 * @package    NOCC
 */
class NOCC_Contacts {
    /**
     * ...
     * @param string $path
     * @return array
     * @static
     * @todo Rewrite!
     */
    function loadList($path) {
       $fp = @fopen($path, 'r');
       if (!$fp)
           return array();

       $contacts = array ();

       while(!feof($fp)) {
           $buffer = trim(fgets($fp, 4096));
           if ($buffer != '')
               array_push($contacts, $buffer);
       }

       fclose($fp);
       return $contacts;
    }

    /**
     * ...
     * @param string $path
     * @param array $contacts
     * @param object $conf
     * @param object $ev
     * @return bool
     * @static
     * @todo Rewrite!
     */
    function saveList($path, $contacts, $conf, &$ev) {
        include ('lang/' . $_SESSION['nocc_lang'] . '.php');
        if (file_exists($path) && !is_writable($path)) {
            $ev = new NoccException($html_err_file_contacts);
            return false;
        }
        if (!is_writeable($conf->prefs_dir)) {
            $ev = new NoccException($html_err_file_contacts);
            return false;
        }
        $fp = fopen($path, 'w');

        for ($i = 0; $i < count($contacts); ++$i) {
            if (trim($contacts[$i]) != '')
                fwrite($fp, $contacts[$i] . "\n");
        }

        fclose($fp);
        return true;
    }
}
?>
