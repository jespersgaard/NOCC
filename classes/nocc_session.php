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
}
?>
