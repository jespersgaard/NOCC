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
        $body = preg_replace('|src[\s]*=[\s]*["\']?[\s]*[A-Za-z]+://[^<>\s]+[A-Za-z0-9/][\s]*["\']?|i', 'src="none"', $body); //src = "xyz" OR src = 'xyz' OR src = xyz
        $body = preg_replace('|background[\s]*=[\s]*["\']?[\s]*[A-Za-z]+://[^<>\s]+[A-Za-z0-9/][\s]*["\']?|i', 'background="none"', $body); //background = "xyz" OR background = 'xyz' OR background = xyz
        $body = preg_replace('|url[\s]*\([\s]*\'?[\s]*[A-Za-z]+://[^<>\s]+[A-Za-z0-9/][\s]*\'?[\s]*\)|i', 'url(none)', $body); //url ( xzy ) OR url ( 'xyz' )
        return $body;
    }
    
    /**
     * Has disabled HTML images?
     *
     * @param string $body HTML body
     * @return bool Has disabled HTML images?
     * @static
     * TODO: stripos() is PHP5 only!
     */
    function hasDisabledHtmlImages($body) {
        return stripos($body, 'src="none"') || stripos($body, 'background="none"') || stripos($body, 'url(none)');
    }

    /**
     * Get the image type from a internet media type (MIME type)
     * 
     * @param string $internetMediaType Internet media type (MIME type)
     * @return string Image subtype
     * TODO: Better name?
     * TODO: Move to other place?
     */
    function getImageType($internetMediaType) {
        $types = explode('/', $internetMediaType);
        if (strtolower($types[0]) == 'image') { //if image MIME type...
            return $types[1];
        }
        return '';
    }

    /**
     * Is supported image type?
     *
     * @param string $imageType Image type
     * @return bool Supported image type?
     * TODO: Better name?
     * TODO: Move to other place?
     */
    function isSupportedImageType($imageType) {
        if (preg_match('/^PJPE?G$|^JPE?G$|^GIF$|^PNG$/i', $imageType)) { //if PJP(E)G, JP(E)G, GIF, PNG...
            return true;
        }
        return false;
    }
}
?>
