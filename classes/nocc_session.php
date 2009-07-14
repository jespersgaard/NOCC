<?php
/**
 * Class for wrapping the $_SESSION array
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
 * Wrapping the $_SESSION array
 *
 * @package    NOCC
 */
class NOCC_Session {
    /**
     * Get the SMTP server from the session
     *
     * @return string SMTP server
     * @static
     */
    function getSmtpServer() {
        if (isset($_SESSION['nocc_smtp_server'])) {
            return $_SESSION['nocc_smtp_server'];
        }
        return '';
    }
    
    /**
     * Set the SMTP server from the session
     *
     * @param string $value SMTP server
     * @static
     */
    function setSmtpServer($value) {
        $_SESSION['nocc_smtp_server'] = $value;
    }
    
    /**
     * Get quota enabling from the session
     *
     * @return bool Quota enabled?
     * @static
     */
    function getQuotaEnable() {
        if (isset($_SESSION['quota_enable'])) {
            return $_SESSION['quota_enable'];
        }
        return false;
    }
    
    /**
     * Set quota enabling from the session
     *
     * @param bool $value Quota enabled?
     * @static
     */
    function setQuotaEnable($value) {
        $_SESSION['quota_enable'] = $value;
    }
    
    /**
     * Get quota type (STORAGE or MESSAGE) from the session
     *
     * @return string Quota type
     * @static
     * @todo Check for STORAGE or MESSAGE?
     */
    function getQuotaType() {
        if (isset($_SESSION['quota_type'])) {
            return $_SESSION['quota_type'];
        }
        return 'STORAGE';
    }
    
    /**
     * Set quota type (STORAGE or MESSAGE) from the session
     *
     * @param string $value Quota type
     * @static
     * @todo Check for STORAGE or MESSAGE?
     */
    function setQuotaType($value) {
        $_SESSION['quota_type'] = $value;
    }
}
?>
