<?php
/**
 * Class for wrapping a mail address
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
 * Wrapping a mail address
 *
 * @package    NOCC
 */
class NOCC_MailAddress {
    /**
     * Name
     * @var string
     * @access private
     */
    var $_name;

    /**
     * Address
     * @var string
     * @access private
     */
    var $_address;

    /**
     * Initialize the mail address wrapper
     *
     * @param string $mailAddress Mail address
     */
    function NOCC_MailAddress($mailAddress) {
        $this->_name = '';
        $this->_address = '';

        if (isset($mailAddress) && is_string($mailAddress) && !empty($mailAddress)) { //if mail address is set...
            //TODO: http://code.iamcal.com/php/rfc822/
            $pos1 = strpos($mailAddress, '<');
            $pos2 = strrpos($mailAddress, '>');
            if ($pos1 !== false && $pos2 !== false) { //if "<" AND ">" are found...
                $name = trim(substr($mailAddress, 0, $pos1));
                $name = trim($name, '"\''); //trim " AND '
                $address = trim(substr($mailAddress, ($pos1 + 1), ($pos2 - $pos1 - 1)));

                //TODO: Check if is valid address!
                $this->_name = $name;
                $this->_address = $address;
            }
            else { //if NOT "<" AND ">" are found...
                //TODO: Check if is valid address!
                $this->_address = trim($mailAddress);
            }
        }
    }

    /**
     * Get the name
     *
     * @return array Name
     */
    function getName() {
        return $this->_name;
    }

    /**
     * Get the address
     *
     * @return string Address
     */
    function getAddress() {
        return $this->_address;
    }
}
?>
