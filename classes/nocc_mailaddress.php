<?php
/**
 * Class for wrapping a mail address
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
    private $_name;

    /**
     * Address
     * @var string
     * @access private
     */
    private $_address;

    /**
     * Initialize the mail address wrapper
     * @param string $mailAddress Mail address (with or without Name)
     * @param string $mailName Mail name (optional)
     */
    function __construct($mailAddress, $mailName = '') {
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
        if (is_string($mailName) && !empty($mailName)) { //if name is set...
            $this->_name = $mailName;
        }
    }

    /**
     * Get the name
     * @return string Name
     */
    public function getName() {
        return $this->_name;
    }

    /**
     * Has a name?
     * @return bool Has name?
     */
    public function hasName() {
        return !empty($this->_name);
    }

    /**
     * Set the name
     * @param string $name Name
     */
    public function setName($name) {
        if (isset($name) && is_string($name)) {
            $this->_name = $name;
        }
    }

    /**
     * Get the address
     * @return string Address
     */
    public function getAddress() {
        return $this->_address;
    }

    /**
     * Has a address?
     * @return string Has address?
     */
    public function hasAddress() {
        return !empty($this->_address);
    }

    /**
     * Set the address
     * @param string $address Address
     */
    public function setAddress($address) {
        if (isset($address) && is_string($address)) {
            $this->_address = $address;
        }
    }

    /**
     * ...
     */
    public function __toString() {
        if (!$this->hasAddress()) {
            return '';
        }
        
        if ($this->hasName()) {
            $name = $this->getName();
            if (strpos($name, ' ') !== false) {
                return '"' . $name . '" <' . $this->getAddress() . '>';
            }
            else {
                return $name . ' <' . $this->getAddress() . '>';
            }
        }
        
        return $this->getAddress();
    }

    /**
     * Is valid mail address?
     * @param string $address Mail address
     * @return bool Valid?
     * @static
     */
    public static function isValidAddress($address) {
        //TODO: Check better!
        $regexp = "|^[A-Za-z0-9\._\-\+]+@([A-Za-z0-9][A-Za-z0-9\-]{1,62})(\.[A-Za-z0-9][A-Za-z0-9\-]{1,62})+$|";  // added + as valid in name part of emailaddress
        if (preg_match($regexp, $address)) { //if valid mail address...
            return true;
        }
        return false;
    }

    /**
     * Simplify the mail address by replacing double quotes and ident comma
     * @param string $mailAddress Mail address
     * @return string Simplify mail address
     * @static
     */
    public static function simplify($mailAddress) {
        $mailAddress = str_replace(',', ', ', $mailAddress);
        $mailAddress = str_replace('  ', ' ', $mailAddress);

        return str_replace('"', '', $mailAddress);
    }

    /**
     * Chops the address part "<foo@bar.org>" from a full mail address "Foo Bar <foo@bar.org>"
     * @param string $mailAddress Mail address
     * @return string Name (or address)
     * @static
     */
    public static function chopAddress($mailAddress) {
        // If no '<', return full address.
        $bracketpos = strpos($mailAddress, '<');
        if ($bracketpos === false)
            return $mailAddress;

        // Return up to the first '<', or end of string if not found
        $formatted_address = '';
        while (!($bracketpos === false)) {
            $formatted_address = substr($mailAddress, 0, $bracketpos - 1);
            $formatted_address .= substr($mailAddress, strpos($mailAddress, '>') + 1);
            $mailAddress = $formatted_address;
            $bracketpos = strpos($mailAddress, '<');
        }
        return $mailAddress;
    }
}
?>
