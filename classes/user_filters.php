<?php
/**
 * Class for handling user filters
 *
 * Copyright 2002 Mike Rylander <mrylander@mail.com>
 *
 * This file is part of NOCC. NOCC is free software under the terms of the
 * GNU General Public License. You should have received a copy of the license
 * along with NOCC.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package    NOCC
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @version    SVN: $Id$
 */

require_once 'exception.php';

class NOCCUserFilters {
        var $key;
        var $filterset;
    
        // Set when preferences have not been commit
        var $dirty_flag;

        /*
         * Default user profile
         */
        function NOCCUserFilters($key) {
                $this->key = $key;
                $this->filterset = array();
                $this->dirty_flag = 1;
                if (empty($conf->prefs_dir)) {
                        $ev = new NoccException("User preferences are turned off but tried to create object.");
                        return;
                }

        }

        /*
         * Return the current preferences for the given key. Key is
         * 'login@domain'. If it cannot be found for any reason, it
         * returns a default profile. If it can be found, but not
         * read, it returns an exception.
         */
        function read($key, &$ev) {
                global $conf;

                $filters = new NOCCUserFilters($key);

                /* Open the preferences file */
                $filename = $conf->prefs_dir . '/' . $key . '.filter';
                if (!file_exists($filename)) {
                        $filters->dirty_flag = 1;
                        $filters->commit($ev);
                        if(NoccException::isException($ev))
                                return;
                }
                $file = fopen($filename, 'r');
                if (!$file) {
                        $ev = new NoccException("Could not open $filename for reading user preferences");
                        return;
                }

                /* Read in all the preferences */
                $highlight_num = 0;
                while (!feof($file)) {
                        $line = trim(fgets($file, 1024));
                        $pipeAt = strpos($line, '|');
                        if($pipeAt <= 0) continue;

                        $name = substr($line, 0, $pipeAt);
                        $type = substr($line, $pipeAt + 1, 6);
                        $value = substr($line, $pipeAt + 8);

                        if (strlen($name) > 0) {
                                $filters->filterset[$name][$type] = $value;
                        }
                }
                fclose($file);
 
                $filters->dirty_flag = 0;
                return $filters;
        }

        /*
         * If need be, write settings to file.
         */
        function commit(&$ev) {
                global $conf;
                global $html_prefs_file_error;

                // Do we need to write?
                if(!$this->dirty_flag) return;

                // Write prefs to file
                $filename = $conf->prefs_dir . '/' . $this->key . '.filter';
                if (file_exists($filename) && !is_writable($filename)) {
                        $ev = new NoccException($html_prefs_file_error);
                        return;
                }
                if (!is_writeable($conf->prefs_dir)) {
                    $ev = new NoccException($html_prefs_file_error);
                    return;
                }
                $file = fopen($filename, 'w');
                if (!$file) {
                        $ev = new NoccException($html_prefs_file_error);
                        return;
                }

                fwrite($file, "super happy filter file\n");
                foreach ($this->filterset as $name => $filter) {
                        foreach ($filter as $type => $thing) {
                                if ($type && $thing) {
                                        fwrite($file, $name.'|'.$type.'='.$thing."\n");
                                }
                        }
                }

                fclose($file);

                $this->dirty_flag = 0;
        }

        /*
         * Create the filter select box for the prefs page
         */
        function html_filter_select() {
        
                $output = '';
                $pre = '<select class="button" name="filter" size="5">'."\n";
                $post = '</select>'."\n";
        
                foreach ($this->filterset as $name => $filter) {
                        $search = $filter['SEARCH'];
                        $action = $filter['ACTION'];
                        $output .= "\t<option value=\"$name\">$name : &lt;$search -> $action&gt; </option>\n";
                }

                if ($output) {
                        return $pre.$output.$post;
                } else {
                        return '';
                }
        }

}

?>
