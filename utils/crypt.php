<?php
/**
 * Crypt functions
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 * Copyright 2005 Arnaud Boudou <goddess_skuld@users.sourceforge.net>
 * Copyright 2008-2011 Tim Gerundt <tim@gerundt.de>
 *
 * This file is part of NOCC. NOCC is free software under the terms of the
 * GNU General Public License. You should have received a copy of the license
 * along with NOCC.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package    NOCC
 * @subpackage Utilities
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @version    SVN: $Id$
 */

function encr($string, $key) {
    for ($i=0; $i<strlen($string); $i++) {
        for ($j=0; $j<strlen($key); $j++) {
            $string[$i] = $string[$i]^$key[$j];
        }
    }
    return $string;
}

function decr($string, $key) {
    for ($i=0; $i<strlen($string); $i++) {
        for ($j=0; $j<strlen($key); $j++) {
            $string[$i] = $key[$j]^$string[$i];
        }
    }
    return $string;
}

/**
 * Returns encrypted password
 * @param string $passwd Password
 * @param string $rkey Master key
 * @return string Encrypted password
 */
function encpass($passwd, $rkey) {
  $encpasswd = encr(bin2hex($passwd), $rkey);
  
  return $encpasswd;
}

/**
 * Returns decrypted password
 * @param string $cipher Cipher
 * @param string $rkey Master key
 * @return string Decrypted password
 */
function decpass($cipher, $rkey) {
  $dechexpasswd = decr($cipher, $rkey);
  
  $decpasswd = '';
  for ($i=0; $i<strlen($dechexpasswd)/2; $i++) {
    $decpasswd .= chr(base_convert(substr($dechexpasswd, $i * 2, 2), 16, 10));
  }
  
  return $decpasswd;
}
?>