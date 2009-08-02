<?php
/**
 * Class for wrapping a imap_get_quotaroot() array
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
 * Wrapping a imap_get_quotaroot() array
 *
 * @package    NOCC
 */
class NOCC_QuotaUsage {
    /**
     * imap_get_quotaroot() array
     * @access private
     */
    var $_quotausage;
    
    /**
     * Initialize the wrapper
     *
     * @param array $quotausage imap_get_quotaroot() array
     */
    function NOCC_QuotaUsage($quotausage) {
        $this->_quotausage = $quotausage;
    }
    
    /**
     * Get the current size of the mailbox in KB
     *
     * @return int Current mailbox size in KB
     */
    function getStorageUsage() {
        if (isset($this->_quotausage['STORAGE']['usage'])) {
            return $this->_quotausage['STORAGE']['usage'];
        }
        return 0;
    }
    
    /**
     * Get the maximum size of the mailbox in KB
     *
     * @return int Maximum mailbox size in KB
     */
    function getStorageLimit() {
        if (isset($this->_quotausage['STORAGE']['limit'])) {
            return $this->_quotausage['STORAGE']['limit'];
        }
        return 0;
    }
    
    /**
     * Get the current number of messages in the mailbox
     *
     * @return int Current number of mailbox messages
     */
    function getMessageUsage() {
        if (isset($this->_quotausage['MESSAGE']['usage'])) {
            return $this->_quotausage['MESSAGE']['usage'];
        }
        return 0;
    }
    
    /**
     * Get the maximum number of messages in the mailbox
     *
     * @return int Maximum number of mailbox messages
     */
    function getMessageLimit() {
        if (isset($this->_quotausage['MESSAGE']['limit'])) {
            return $this->_quotausage['MESSAGE']['limit'];
        }
        return 0;
    }
    
    /**
     * Is the quota usage supported?
     *
     * @return bool Is supported?
     */
    function isSupported() {
        return is_array($this->_quotausage);
    }
}
?>