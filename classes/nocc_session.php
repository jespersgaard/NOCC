<?php
/**
 * Class for wrapping the $_SESSION array
 *
 * Copyright 2009-2011 Tim Gerundt <tim@gerundt.de>
 *
 * This file is part of NOCC. NOCC is free software under the terms of the
 * GNU General Public License. You should have received a copy of the license
 * along with NOCC.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package    NOCC
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @version    SVN: $Id$
 */

require_once 'user_prefs.php';

/**
 * Wrapping the $_SESSION array
 *
 * @package    NOCC
 */
class NOCC_Session {
    /**
     * Start the session
     * @static
     */
    public static function start() {
        session_name('NOCCSESSID');
        session_start();
    }
    
    /**
     * Get the URL query from the session
     * @return string URL query
     * @static
     */
    public static function getUrlQuery() {
        return session_name() . '=' . session_id();
    }
    
    /**
     * Get the user key from the session
     * @return string User key
     * @static
     */
    public static function getUserKey() {
        return $_SESSION['nocc_user'] . '@' . $_SESSION['nocc_domain'];
    }
    
    /**
     * Get the SMTP server from the session
     * @return string SMTP server
     * @static
     */
    public static function getSmtpServer() {
        if (isset($_SESSION['nocc_smtp_server'])) {
            return $_SESSION['nocc_smtp_server'];
        }
        return '';
    }
    
    /**
     * Set the SMTP server from the session
     * @param string $value SMTP server
     * @static
     */
    public static function setSmtpServer($value) {
        $_SESSION['nocc_smtp_server'] = $value;
    }
    
    /**
     * Get quota enabling from the session
     * @return bool Quota enabled?
     * @static
     */
    public static function getQuotaEnable() {
        if (isset($_SESSION['quota_enable']) && $_SESSION['quota_enable']) {
            return true;
        }
        return false;
    }
    
    /**
     * Set quota enabling from the session
     * @param bool $value Quota enabled?
     * @static
     */
    public static function setQuotaEnable($value) {
        $_SESSION['quota_enable'] = $value;
    }
    
    /**
     * Get quota type (STORAGE or MESSAGE) from the session
     * @return string Quota type
     * @static
     * @todo Check for STORAGE or MESSAGE?
     */
    public static function getQuotaType() {
        if (isset($_SESSION['quota_type'])) {
            return $_SESSION['quota_type'];
        }
        return 'STORAGE';
    }
    
    /**
     * Set quota type (STORAGE or MESSAGE) from the session
     * @param string $value Quota type
     * @static
     * @todo Check for STORAGE or MESSAGE?
     */
    public static function setQuotaType($value) {
        $_SESSION['quota_type'] = $value;
    }

    /**
     * Exists user preferences in the session?
     * @return boolean Exists user preferences?
     * @static
     */
    public static function existsUserPrefs() {
        if (isset($_SESSION['nocc_user_prefs'])) {
            if ($_SESSION['nocc_user_prefs'] instanceof NOCCUserPrefs) {
                return true;
            }
        }
        return false;
    }

    /**
     * Get user preferences from the session
     * @return NOCCUserPrefs User preferences
     * @static
     */
    public static function getUserPrefs() {
        if (NOCC_Session::existsUserPrefs()) {
            return $_SESSION['nocc_user_prefs'];
        }
        return new NOCCUserPrefs('');
    }

    /**
     * Set user preferences from the session
     * @param NOCCUserPrefs $value User preferences
     * @static
     * @todo Check for NOCCUserPrefs?
     */
    public static function setUserPrefs($value) {
        $_SESSION['nocc_user_prefs'] = $value;
    }

    /**
     * Get HTML mail sending from the session
     * @return bool User preferences
     * @static
     */
    public static function getSendHtmlMail() {
        if (isset($_SESSION['html_mail_send']) && $_SESSION['html_mail_send']) {
            return true;
        }
        return false;
    }

    /**
     * Set HTML mail sending from the session
     * @param bool $value User preferences
     * @static
     */
    public static function setSendHtmlMail($value) {
        $_SESSION['html_mail_send'] = $value;
    }
}
?>
