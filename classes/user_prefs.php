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
    // TODO: Hide behind get/setKey()?
    var $key;
    // TODO: Hide behind get/setFullName()!
    var $full_name;
    // TODO: Hide behind get/setEmailAddress()!
    var $email_address;
    // TODO: Hide behind get/setMessagesPerPage()!
    var $msg_per_page;
    /**
     * Cc self?
     * @var boolean
     * @access private
     */
    private $_ccSelf;
    /**
     * Hide addresses?
     * @var boolean
     * @access private
     */
    private $_hideAddresses;
    /**
     * Outlook quoting?
     * @var boolean
     * @access private
     */
    private $_outlookQuoting;
    /**
     * Colored quotes?
     * @var boolean
     * @access private
     */
    private $_coloredQuotes;
    /**
     * Display structured text?
     * @var boolean
     * @access private
     */
    private $_displayStructuredText;
    // TODO: Hide behind get/setOpenMessagesInSeperateWindow()!
    var $seperate_msg_win;
    // TODO: Hide behind get/setReplyLeadin()!
    var $reply_leadin;
    // TODO: Hide behind get/setSignature()!
    var $signature;
    // TODO: Hide behind get/setWrapMessages()!
    var $wrap_msg;
    // TODO: Hide behind get/setUseSignatureSeparator()!
    var $sig_sep;
    /**
     * Send HTML mail?
     * @var boolean
     * @access private
     */
    private $_sendHtmlMail;
    /**
     * Use graphical smilies?
     * @var boolean
     * @access private
     */
    private $_useGraphicalSmilies;
    /**
     * Use sent folder?
     * @var boolean
     * @access private
     */
    private $_useSentFolder;
    /**
     * Sent folder name?
     * @var string
     * @access private
     */
    private $_sentFolderName;
    /**
     * Use trash folder?
     * @var boolean
     * @access private
     */
    var $_useTrashFolder;
    /**
     * Trash folder name?
     * @var string
     * @access private
     */
    private $_trashFolderName;
    // TODO: Hide behind get/setLang()!
    var $lang;
    // TODO: Hide behind get/setTheme()!
    var $theme;

    // Set when preferences have not been commit
    // TODO: Hide behind get/setIsDirty()!
    var $dirty_flag;

    /**
     * Initialize the default user profile
     * @param string $key Key
     */
    function __construct($key) {
        $this->key = $key;
        $this->_ccSelf = false;
        $this->_hideAddresses = false;
        $this->_outlookQuoting = false;
        $this->_coloredQuotes = true;
        $this->_displayStructuredText = false;
        $this->_sendHtmlMail = false;
        $this->_useGraphicalSmilies = false;
        $this->_useSentFolder = false;
        $this->_sendFolderName = '';
        $this->_useTrashFolder = false;
        $this->_trashFolderName = '';
        $this->dirty_flag = 1;
    }

    /**
     * Get Cc self sending from user preferences
     * @return boolean Cc self?
     */
    public function getCcSelf() {
        return $this->_ccSelf;
    }

    /**
     * Set Cc self sending from user preferences
     * @param mixed $value Cc self?
     */
    public function setCcSelf($value) {
        $this->_ccSelf = $this->_convertToFalse($value);
    }

    /**
     * Get address hiding from user preferences
     * @return boolean Hide addresses?
     */
    public function getHideAddresses() {
        return $this->_hideAddresses;
    }

    /**
     * Set address hiding from user preferences
     * @param mixed $value Hide addresses?
     */
    public function setHideAddresses($value) {
        $this->_hideAddresses = $this->_convertToFalse($value);
    }

    /**
     * Get outlook quoting from user preferences
     * @return boolean Outlook quoting?
     */
    public function getOutlookQuoting() {
        return $this->_outlookQuoting;
    }

    /**
     * Set outlook quoting from user preferences
     * @param mixed $value Outlook quoting?
     */
    public function setOutlookQuoting($value) {
        $this->_outlookQuoting = $this->_convertToFalse($value);
    }

    /**
     * Get colored quotes from user preferences
     * @return boolean Colored quotes?
     */
    public function getColoredQuotes() {
        return $this->_coloredQuotes;
    }

    /**
     * Set colored quotes from user preferences
     * @param mixed $value Colored quotes?
     */
    public function setColoredQuotes($value) {
        $this->_coloredQuotes = $this->_convertToTrue($value);
    }

    /**
     * Get structured text displaying from user preferences
     * @return boolean Display structured text?
     */
    public function getDisplayStructuredText() {
        return $this->_displayStructuredText;
    }

    /**
     * Set structured text displaying from user preferences
     * @param mixed $value Display structured text?
     */
    public function setDisplayStructuredText($value) {
        $this->_displayStructuredText = $this->_convertToFalse($value);
    }

    /**
     * Get HTML mail sending from user preferences
     * @return boolean Display structured text?
     */
    public function getSendHtmlMail() {
        return $this->_sendHtmlMail;
    }

    /**
     * Set HTML mail sending from user preferences
     * @param mixed $value Display structured text?
     */
    public function setSendHtmlMail($value) {
        $this->_sendHtmlMail = $this->_convertToFalse($value);
    }

    /**
     * Get graphical smilies using from user preferences
     * @return boolean Use graphical smilies?
     */
    public function getUseGraphicalSmilies() {
        return $this->_useGraphicalSmilies;
    }

    /**
     * Set graphical smilies using from user preferences
     * @param mixed $value Use graphical smilies?
     */
    public function setUseGraphicalSmilies($value) {
        $this->_useGraphicalSmilies = $this->_convertToFalse($value);
    }

    /**
     * Get sent folder using from user preferences
     * @return boolean Use sent folder?
     */
    public function getUseSentFolder() {
        return $this->_useSentFolder;
    }

    /**
     * Set sent folder using from user preferences
     * @param mixed $value Use sent folder?
     */
    public function setUseSentFolder($value) {
        $this->_useSentFolder = $this->_convertToFalse($value);
    }

    /**
     * Get sent folder name from user preferences
     * @return string Sent folder name
     */
    public function getSentFolderName() {
        return $this->_sentFolderName;
    }

    /**
     * Set sent folder name from user preferences
     * @param string $value Sent folder name
     */
    public function setSentFolderName($value) {
        $this->_sentFolderName = $this->_convertToString($value);
    }

    /**
     * Get trash folder using from user preferences
     * @return boolean Use trash folder?
     */
    public function getUseTrashFolder() {
        return $this->_useTrashFolder;
    }

    /**
     * Set trash folder using from user preferences
     * @param mixed $value Use trash folder?
     */
    public function setUseTrashFolder($value) {
        $this->_useTrashFolder = $this->_convertToFalse($value);
    }

    /**
     * Get trash folder name from user preferences
     * @return string Trash folder name
     */
    public function getTrashFolderName() {
        return $this->_trashFolderName;
    }

    /**
     * Set trash folder name from user preferences
     * @param string $value Trash folder name
     */
    public function setTrashFolderName($value) {
        $this->_trashFolderName = $this->_convertToString($value);
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
     * @todo Rewrite to throw exception!
     */
    public static function read($key, &$ev) {
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
     * @param NOCCUserPrefs $prefs Default user preferences
     * @param string $filename File path
     * @param object $ev Exception
     * @return NOCCUserPrefs User profile
     * @static
     * @todo Rewrite to throw exception!
     */
    public static function readFromFile($prefs, $filename, $ev) {
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
        while (!feof($file)) {
            $line = trim(fgets($file, 1024));
            $equalsAt = strpos($line, '=');
            if ($equalsAt <= 0) continue;

            $key = substr($line, 0, $equalsAt);
            $value = substr($line, $equalsAt + 1);

            switch ($key) {
                case 'full_name':
                    $prefs->full_name = $value;
                    break;
                case 'email_address':
                    $prefs->email_address = $value;
                    break;
                case 'msg_per_page':
                    $prefs->msg_per_page = $value * 1;
                    break;
                case 'cc_self':
                    $prefs->setCcSelf($value);
                    break;
                case 'hide_addresses':
                    $prefs->setHideAddresses($value);
                    break;
                case 'outlook_quoting':
                    $prefs->setOutlookQuoting($value);
                    break;
                case 'colored_quotes':
                    $prefs->setColoredQuotes($value);
                    break;
                case 'display_struct':
                    $prefs->setDisplayStructuredText($value);
                    break;
                case 'seperate_msg_win':
                    $prefs->seperate_msg_win = ($value == 1 || $value == 'on');
                    break;
                case 'signature':
                    $prefs->signature = base64_decode($value);
                    break;
                case 'reply_leadin':
                    $prefs->reply_leadin = base64_decode($value);
                    break;
                case 'wrap_msg':
                    $prefs->wrap_msg = $value;
                    break;
                case 'sig_sep':
                    $prefs->sig_sep = ($value == 1 || $value == 'on');
                    break;
                case 'html_mail_send':
                    $prefs->setSendHtmlMail($value);
                    break;
                case 'graphical_smilies':
                    $prefs->setUseGraphicalSmilies($value);
                    break;
                case 'sent_folder':
                    $prefs->setUseSentFolder($value);
                    break;
                case 'sent_folder_name':
                    $prefs->setSentFolderName($value);
                    break;
                case 'trash_folder':
                    $prefs->setUseTrashFolder($value);
                    break;
                case 'trash_folder_name':
                    $prefs->setTrashFolderName($value);
                    break;
                case 'lang':
                    $prefs->lang = $value;
                    break;
                case 'theme':
                    $prefs->theme = $value;
                    break;
            }
        }
        fclose($file);

        $prefs->dirty_flag = 0;
        return $prefs;
    }

    /**
     * If need be, write settings to file.
     * @global object $conf
     * @global string $html_prefs_file_error
     * @param object $ev Exception
     * @todo Rewrite to throw exception!
     */
    public function commit(&$ev) {
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
        fwrite($file, "cc_self=".$this->_ccSelf."\n");
        fwrite($file, "hide_addresses=".$this->_hideAddresses."\n");
        fwrite($file, "outlook_quoting=".$this->_outlookQuoting."\n");
        fwrite($file, "colored_quotes=".$this->_coloredQuotes."\n");
        fwrite($file, "display_struct=".$this->_displayStructuredText."\n");
        fwrite($file, "seperate_msg_win=".$this->seperate_msg_win."\n");
        fwrite($file, "reply_leadin=".base64_encode($this->reply_leadin)."\n");
        fwrite($file, "signature=".base64_encode($this->signature)."\n");
        fwrite($file, "wrap_msg=".$this->wrap_msg."\n");
        fwrite($file, "sig_sep=".$this->sig_sep."\n");
        fwrite($file, "html_mail_send=".$this->_sendHtmlMail."\n");
        fwrite($file, "graphical_smilies=".$this->_useGraphicalSmilies."\n");
        fwrite($file, "sent_folder=".$this->_useSentFolder."\n");
        fwrite($file, "sent_folder_name=".str_replace($_SESSION['imap_namespace'], "", $this->_sentFolderName)."\n");
        fwrite($file, "trash_folder=".$this->_useTrashFolder."\n");
        fwrite($file, "trash_folder_name=".str_replace($_SESSION['imap_namespace'], "", $this->_trashFolderName)."\n");
        fwrite($file, "lang=".$this->lang."\n");
        fwrite($file, "theme=".$this->theme."\n");
        fclose($file);

        $this->dirty_flag = 0;
    }

    /**
     * Validate preferences
     * @global object $conf
     * @global string $html_invalid_email_address
     * @global string $html_invalid_msg_per_page
     * @global string $html_invalid_wrap_msg
     * @param object $ev Exception
     */
    public function validate(&$ev) {
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
    private function _convertToFalse($value) {
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
    private function _convertToTrue($value) {
        if ($value === false || $value === 0 || $value === '0' || $value === 'off') {
            return false;
        }
        return true;
    }

    /**
     * Convert value to string
     * @param mixed $value Value
     * @return string String value
     * @access private
     */
    private function _convertToString($value) {
        if (is_string($value)) {
            return $value;
        }
        return '';
    }

    /**
     * Format Reply Leadin
     *
     * @param string $string Reply Leadin
     * @param array $content Content
     * @return string Parsed Reply Leadin
     * @static
     */
    public static function parseLeadin($string, $content) {
        $string = str_replace('_DATE_', $content['date'], $string);
        $string = str_replace('_TIME_', $content['time'], $string);
        $string = str_replace('_FROM_', $content['from'], $string);
        $string = str_replace('_TO_', $content['to'], $string);
        $string = str_replace('_SUBJECT_', $content['subject'], $string);
        return ($string."\n");
    }
}
?>
