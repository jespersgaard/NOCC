<?php
/**
 * Class for wrapping a mail part
 *
 * Copyright 2010 Tim Gerundt <tim@gerundt.de>
 *
 * This file is part of NOCC. NOCC is free software under the terms of the
 * GNU General Public License. You should have received a copy of the license
 * along with NOCC.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package    NOCC
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @version    SVN: $Id$
 */

require_once 'nocc_mailstructure.php';

/**
 * Wrapping a mail part
 *
 * @package    NOCC
 */
class NOCC_MailPart {
    /**
     * Part structure
     * @var NOCC_MailStructure
     * @access private
     */
    private $partStructure;

    /**
     * Part number
     * @var string
     * @access private
     */
    private $partNumber;
    
    /**
     * Initialize the wrapper
     * @param NOCC_MailStructure $partStructure Part structure
     * @param string $partNumber Part number
     * @todo Throw exception, if no vaild mail structure?
     */
    public function __construct($partStructure, $partNumber) {
        $this->partStructure = $partStructure;
        $this->partNumber = $partNumber;
    }

    /**
     * Get the part structure
     * @return NOCC_MailStructure Part structure
     */
    public function getPartStructure() {
        return $this->partStructure;
    }

    /**
     * Get the part number
     * @return string Part number
     */
    public function getPartNumber() {
        return $this->partNumber;
    }
}
?>
