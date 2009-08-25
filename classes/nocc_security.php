<?php
/**
 * Class with security functions
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
 * Security functions
 *
 * @package    NOCC
 */
class NOCC_Security {
    /**
     * Disable HTML images
     *
     * @param string $body HTML body
     * @return string HTML body without images
     * @static
     */
    function disableHtmlImages($body) {
        $body = eregi_replace('src[[:space:]]*=[[:space:]]*["\']?[[:space:]]*[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/][[:space:]]*["\']?', 'src="none"', $body); //src = "xyz" OR src = 'xyz' OR src = xyz
        $body = eregi_replace('background[[:space:]]*=[[:space:]]*["\']?[[:space:]]*[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/][[:space:]]*["\']?', 'background="none"', $body); //background = "xyz" OR background = 'xyz' OR background = xyz
        $body = eregi_replace('url[[:space:]]*\([[:space:]]*\'?[[:space:]]*[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/][[:space:]]*\'?[[:space:]]*\)', 'url(none)', $body); //url ( xzy ) OR url ( 'xyz' )
        return $body;
    }
    
    /**
     * Has disabled HTML images?
     *
     * @param string $body HTML body
     * @return bool Has disabled HTML images?
     * @static
     */
    function hasDisabledHtmlImages($body) {
        return eregi('src="none"', $body) || eregi('background="none"', $body) || eregi('url\(none\)', $body);
    }
}
?>
