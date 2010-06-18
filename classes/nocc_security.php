<?php
/**
 * Class with security functions
 *
 * Copyright 2009-2010 Tim Gerundt <tim@gerundt.de>
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
     * @param string $body HTML body
     * @return string HTML body without images
     * @static
     */
    public static function disableHtmlImages($body) {
        $body = preg_replace('|src[\s]*=[\s]*["\']?[\s]*[A-Za-z]+://[^<>\s]+[A-Za-z0-9/][\s]*["\']?|i', 'src="none"', $body); //src = "xyz" OR src = 'xyz' OR src = xyz
        $body = preg_replace('|background[\s]*=[\s]*["\']?[\s]*[A-Za-z]+://[^<>\s]+[A-Za-z0-9/][\s]*["\']?|i', 'background="none"', $body); //background = "xyz" OR background = 'xyz' OR background = xyz
        $body = preg_replace('|url[\s]*\([\s]*\'?[\s]*[A-Za-z]+://[^<>\s]+[A-Za-z0-9/][\s]*\'?[\s]*\)|i', 'url(none)', $body); //url ( xzy ) OR url ( 'xyz' )
        return $body;
    }
    
    /**
     * Has disabled HTML images?
     * @param string $body HTML body
     * @return bool Has disabled HTML images?
     * @static
     */
    public static function hasDisabledHtmlImages($body) {
        if (preg_match('/src="none"|background="none"|url\(none\)/i', $body)) { //if src="none", background="none", url(none)...
            return true;
        }
        return false;
    }

    /**
     * Clean HTML body (strip <HTML>, <HEAD> and other tags)
     * @param string $body HTML body
     * @return string Cleaned HTML body
     * @static
     */
    public static function cleanHtmlBody($body) {
        $dirtyTags = array (
            "'<html[^>]*>'si",
            "'</html>'si",
            "'<body[^>]*>'si",
            "'</body>'si",
            //TODO: Make problems with <head\n>!?
            "'<head[^>]*>.*?</head>'si",
            "'<style[^>]*>.*?</style>'si",
            "'<script[^>]*>.*?</script>'si",
            "'<object[^>]*>.*?</object>'si",
            "'<embed[^>]*>.*?</embed>'si",
            "'<applet[^>]*>.*?</applet>'si",
            "'<mocha[^>]*>.*?</mocha>'si",
            "'<meta[^>]*>'si"
        );
        $cleanBody = preg_replace($dirtyTags, '', $body);
        return trim($cleanBody);
    }

    /**
     * Get the image type from a internet media type (MIME type)
     * @param string $internetMediaType Internet media type (MIME type)
     * @return string Image subtype
     * TODO: Better name?
     * TODO: Move to other place?
     */
    public static function getImageType($internetMediaType) {
        $types = explode('/', $internetMediaType);
        if (strtolower($types[0]) == 'image') { //if image MIME type...
            return $types[1];
        }
        return '';
    }

    /**
     * Is supported image type?
     * @param string $imageType Image type
     * @return bool Supported image type?
     * TODO: Better name?
     * TODO: Move to other place?
     */
    public static function isSupportedImageType($imageType) {
        if (preg_match('/^PJPE?G$|^JPE?G$|^GIF$|^PNG$/i', $imageType)) { //if PJP(E)G, JP(E)G, GIF, PNG...
            return true;
        }
        return false;
    }
}
?>
