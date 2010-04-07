<?php
/**
 * Class for handling user preferences
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
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
require_once 'nocc_mailaddress.php';

/**
 * Handling user preferences
 *
 * @package    NOCC
 * @todo Rename to NOCC_UserPrefs!
 * @todo Hide all preferenes behind getter/setter!
 * @todo Rewrite to avoid global variables!
 */
class NOCCUserPrefs {
    var $key;
    var $full_name;
    var $email_address;
    var $msg_per_page;
    var $cc_self;
    /**
     * Hide addresses?
     * @var boolean
     * @access private
     */
    var $_hideAddresses;
    /**
     * Outlook quoting?
     * @var boolean
     * @access private
     */
    var $_outlookQuoting;
    /**
     * Colored quotes?
     * @var boolean
     * @access private
     */
    var $_coloredQuotes;
    /**
     * Display structured text
     * @var boolean
     * @access private
     */
    var $_displayStructuredText;
    var $seperate_msg_win;
    var $reply_leadin;
    var $signature;
    var $wrap_msg;
    var $sig_sep;
    var $html_mail_send;
    var $graphical_smilies;
    var $sent_folder;
    var $sent_folder_name;
    var $trash_folder;
    var $trash_folder_name;
    var $lang;
    var $theme;

    // Set when preferences have not been commit
    var $dirty_flag;

    /**
     * Initialize the default user profile
     *
     * @param string $key Key
     */
    function NOCCUserPrefs($key) {
        $this->key = $key;
        $this->_hideAddresses = false;
        $this->_outlookQuoting = false;
        $this->_coloredQuotes = true;
        $this->_displayStructuredText = false;
        $this->dirty_flag = 1;
    }

    /**
     * Get address hiding from user preferences
     * 
     * @return boolean Hide addresses?
     */
    function getHideAddresses() {
        return $this->_hideAddresses;
    }

    /**
     * Set address hiding from user preferences
     *
     * @param mixed $value Hide addresses?
     */
    function setHideAddresses($value) {
        $this->_hideAddresses = $this->_convertToFalse($value);
    }

    /**
     * Get outlook quoting from user preferences
     *
     * @return boolean Outlook quoting?
     */
    function getOutlookQuoting() {
        return $this->_outlookQuoting;
    }

    /**
     * Set outlook quoting from user preferences
     *
     * @param mixed $value Outlook quoting?
     */
    function setOutlookQuoting($value) {
        $this->_outlookQuoting = $this->_convertToFalse($value);
    }

    /**
     * Get colored quotes from user preferences
     *
     * @return boolean Colored quotes?
     */
    function getColoredQuotes() {
        return $this->_coloredQuotes;
    }

    /**
     * Set colored quotes from user preferences
     *
     * @param mixed $value Colored quotes?
     */
    function setColoredQuotes($value) {
        $this->_coloredQuotes = $this->_convertToTrue($value);
    }

    /**
     * Get structured text displaying from user preferences
     *
     * @return boolean Display structured text?
     */
    function getDisplayStructuredText() {
        return $this->_displayStructuredText;
    }

    /**
     * Set structured text displaying from user preferences
     *
     * @param mixed $value Display structured text?
     */
    function setDisplayStructuredText($value) {
        $this->_displayStructuredText = $this->_convertToFalse($value);
    }

    /**
     * Return the current preferences for the given key. Key is
     * 'login@domain'. If it cannot be found for any reason, it
     * returns a default profile. If it can be found, but not
     * read, it returns an exception.
     *
     * @global object $conf
     * @param string $key Key
     * @param object $ev Exception
     * @return NOCCUserPrefs User profile
     * @static
     */
    function read($key, &$ev) {
        global $conf;

        $prefs = new NOCCUserPrefs($key);

        if (empty($conf->prefs_dir)) {
            //$ev = new NoccException("User preferences are disabled");
            $prefs->dirty_flag = 0;
            return $prefs;
        }

        /* Open the preferences file */
        $filename = $conf->prefs_dir . '/' . $key . '.pref';

        return NOCCUserPrefs::readFromFile($prefs, $filename, $ev);
    }

    /**
     * Helper function for NOCCUserPrefs::read()
     *
     * @param NOCCUserPrefs $prefs Default user preferences
     * @param string $filename File path
     * @param object $ev Exception
     * @return NOCCUserPrefs User profile
     * @static
     */
    function readFromFile($prefs, $filename, $ev) {
        /* Open the preferences file */
        if (!file_exists($filename)) {
            error_log("$filename does not exist");
            return $prefs;
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
            $equalsAt = strpos($line, '=');
            if ($equalsAt <= 0) continue;

            $key = substr($line, 0, $equalsAt);
            $value = substr($line, $equalsAt + 1);

            if($key == 'full_name')
                $prefs->full_name = $value;
            if($key == 'email_address')
                $prefs->email_address = $value;
            if($key == 'msg_per_page')
                $prefs->msg_per_page = $value * 1;
            if($key == 'cc_self')
                $prefs->cc_self = ($value == 1 || $value == 'on');
            if($key == 'hide_addresses')
                $prefs->setHideAddresses($value);
            if($key == 'outlook_quoting')
                $prefs->setOutlookQuoting($value);
            if($key == 'colored_quotes')
                $prefs->setColoredQuotes($value);
            if($key == 'display_struct')
                $prefs->setDisplayStructuredText($value);
            if($key == 'seperate_msg_win')
                $prefs->seperate_msg_win = ($value == 1 || $value == 'on');
            if($key == 'signature')
                $prefs->signature = base64_decode($value);
            if($key == 'reply_leadin')
                $prefs->reply_leadin = base64_decode($value);
            if($key == 'wrap_msg')
                $prefs->wrap_msg = $value;
            if($key == 'sig_sep')
                $prefs->sig_sep = ($value == 1 || $value == 'on');
            if($key == 'html_mail_send')
                $prefs->html_mail_send = ($value == 1 || $value == 'on');
            if($key == 'graphical_smilies')
                $prefs->graphical_smilies = ($value == 1 || $value == 'on');
            if($key == 'sent_folder')
                $prefs->sent_folder = ($value == 1 || $value == 'on');
            if($key == 'sent_folder_name')
                $prefs->sent_folder_name = $value;
            if($key == 'trash_folder')
                $prefs->trash_folder = ($value == 1 || $value == 'on');
            if($key == 'trash_folder_name')
                $prefs->trash_folder_name = $value;
            if($key == 'lang')
                $prefs->lang = $value;
            if($key == 'theme')
                $prefs->theme = $value;
        }
        fclose($file);

        $prefs->dirty_flag = 0;
        return $prefs;
    }

    /**
     * If need be, write settings to file.
     *
     * @global object $conf
     * @global string $html_prefs_file_error
     * @param object $ev Exception
     */
    function commit(&$ev) {
        global $conf;
        global $html_prefs_file_error;

        // Check it passes validation
        $this->validate($ev);
        if(NoccException::isException($ev)) return;
        
        // Do we need to write?
        if(!$this->dirty_flag) return;

        // Write prefs to file
        //TODO: Check key value! Not empty?
        $filename = $conf->prefs_dir . '/' . $this->key . '.pref';
        if (file_exists($filename) && !is_writable($filename)) {
            $ev = new NoccException($html_prefs_file_error);
            return; 
        }
        if (!is_writable($conf->prefs_dir)) {
            $ev = new NoccException($html_prefs_file_error);
            return;
        }
        $file = fopen($filename, 'w');
        if (!$file){
            $ev = new NoccException($html_prefs_file_error);
            return;
        }

        fwrite($file, "full_name=".$this->full_name."\n");
        fwrite($file, "email_address=".$this->email_address."\n");
        fwrite($file, "msg_per_page=".$this->msg_per_page."\n");
        fwrite($file, "cc_self=".$this->cc_self."\n");
        fwrite($file, "hide_addresses=".$this->_hideAddresses."\n");
        fwrite($file, "outlook_quoting=".$this->_outlookQuoting."\n");
        fwrite($file, "colored_quotes=".$this->_coloredQuotes."\n");
        fwrite($file, "display_struct=".$this->_displayStructuredText."\n");
        fwrite($file, "seperate_msg_win=".$this->seperate_msg_win."\n");
        fwrite($file, "reply_leadin=".base64_encode($this->reply_leadin)."\n");
        fwrite($file, "signature=".base64_encode($this->signature)."\n");
        fwrite($file, "wrap_msg=".$this->wrap_msg."\n");
        fwrite($file, "sig_sep=".$this->sig_sep."\n");
        fwrite($file, "html_mail_send=".$this->html_mail_send."\n");
        fwrite($file, "graphical_smilies=".$this->graphical_smilies."\n");
        fwrite($file, "sent_folder=".$this->sent_folder."\n");
        fwrite($file, "sent_folder_name=".str_replace($_SESSION['imap_namespace'], "", $this->sent_folder_name)."\n");
        fwrite($file, "trash_folder=".$this->trash_folder."\n");
        fwrite($file, "trash_folder_name=".str_replace($_SESSION['imap_namespace'], "", $this->trash_folder_name)."\n");
        fwrite($file, "lang=".$this->lang."\n");
        fwrite($file, "theme=".$this->theme."\n");
        fclose($file);

        $this->dirty_flag = 0;
    }

    /**
     * Validate preferences
     *
     * @global object $conf
     * @global string $html_invalid_email_address
     * @global string $html_invalid_msg_per_page
     * @global string $html_invalid_wrap_msg
     * @param object $ev Exception
     */
    function validate(&$ev) {
        global $conf;
        global $html_invalid_email_address;
        global $html_invalid_msg_per_page;
        global $html_invalid_wrap_msg;

        if ($conf->allow_address_change) {
            if (!NOCC_MailAddress::isValidAddress($this->email_address)) {
                $ev = new NoccException($html_invalid_email_address);
                return;
            }
        }
        else {
            $this->email_address = '';
        }

        if (isset($this->msg_per_page) && !is_numeric($this->msg_per_page) ) {
            $ev = new NoccException($html_invalid_msg_per_page);
            return;
        }

        if (isset($this->wrap_msg) && !preg_match("/^(0|72|80)$/", $this->wrap_msg)) {
            $ev = new NoccException($html_invalid_wrap_msg);
            return;
        }

        // Give go-ahead to commit
        $this->dirty_flag = 1;
    }

    /**
     * Convert value to bool (False by default)
     * @param mixed $value Value
     * @return bool Bool value
     * @access private
     */
    function _convertToFalse($value) {
        if ($value === true || $value === 1 || $value === '1' || $value === 'on') {
            return true;
        }
        return false;
    }

    /**
     * Convert value to bool (True by default)
     * @param mixed $value Value
     * @return bool Bool value
     * @access private
     */
    function _convertToTrue($value) {
        if ($value === false || $value === 0 || $value === '0' || $value === 'off') {
            return false;
        }
        return true;
    }

    /**
     * Format Reply Leadin
     *
     * @param string $string Reply Leadin
     * @param array $content Content
     * @return string Parsed Reply Leadin
     * @static
     */
    function parseLeadin($string, $content) {
        $string = str_replace('_DATE_', $content['date'], $string);
        $string = str_replace('_TIME_', $content['time'], $string);
        $string = str_replace('_FROM_', $content['from'], $string);
        $string = str_replace('_TO_', $content['to'], $string);
        $string = str_replace('_SUBJECT_', $content['subject'], $string);
        return ($string."\n");
    }
}
?>
