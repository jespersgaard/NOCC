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
}
?>
