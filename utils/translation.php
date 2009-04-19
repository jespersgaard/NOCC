<?php
/**
 * Sends HTTP headers to forbid transparent proxies, HTTP/1.x proxies to
 * to cache answers from the server running NOCC.
 *
 * This is quite aggressive, we could have set Cache-control to private
 * to forbid only proxy to cache answers but this would allow browser
 * to be able to cache answers; given that some people use NOCC from
 * a public computer, Cache-control is set to no-cache to prevent any
 * caching. This might lower NOCC speed but it's hard to be both secure
 * and cache-friendly when dealing with dynamic content.
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * This file is part of NOCC. NOCC is free software under the terms of the
 * GNU General Public License. You should have received a copy of the license
 * along with NOCC.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package    NOCC
 * @subpackage Utilities
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @version    SVN: $Id: translation.php 1689 2009-04-19 11:29:00Z radical-tobi $
 */

  function i18n_merge($func_str_translation = NULL, $func_str_insert = NULL, $func_convert = 1) {
  
    if ((!is_null($func_str_translation)) && (!is_null($func_str_insert))) {

      if (is_array($func_str_insert)) {
        $func_output = vsprintf($func_str_translation, $func_str_insert);
      } else {
        $func_output = sprintf($func_str_translation, $func_str_insert);
      }
      
      if ($func_convert == 1) {
        $func_output = convertLang2Html($func_output);
      }
      
      return $func_output;
    }

    return FALSE;
  }