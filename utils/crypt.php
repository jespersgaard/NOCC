<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/utils/crypt.php,v 1.2 2008/02/10 21:02:09 goddess_skuld Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 * Copyright 2005 Arnaud Boudou <skuld@goddess-gate.com>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 */

function encr($string, $key)
{
  for($i=0; $i<strlen($string); $i++)
    {
      for($j=0; $j<strlen($key); $j++)
    {
      $string[$i] = $string[$i]^$key[$j];
    }
    }
  return $string;
}

function decr($string, $key) {

  for($i=0; $i<strlen($string); $i++)
    {
      for($j=0; $j<strlen($key); $j++)
    {
      $string[$i] = $key[$j]^$string[$i];
    }
    }
  return $string;
}

/*
 The genkey function is just an example.
 It would have to be modified in order to generate a proper key that fits the
 requirements of the encr/decr functions that will be used.
 It should also be extended, to somehow test if cookies are supported by the
 browser.
 If not, NOCC should override the settings (, maybe inform the user) and don't
 do any encryption.
 I think genkey must be run before any other HTML or headers. This seems to be a requirement for the cookie to be sent properly.
*/
function genkey($keylength, $cookiename)
{
// Generates a random key of a specified length, and sends
//it as a cookie.
// Returns the key, though I don't see a need in doing that.

  $rkey = substr(ereg_replace("[^A-Za-z0-9]",
                  "",
                  crypt(time())) .
         ereg_replace("[^A-Za-z0-9]",
                  "",
                  crypt(time())) .
         ereg_replace("[^A-Za-z0-9]",
                  "",
                  crypt(time())),
         0, $keylength);

  setcookie ($cookiename, $rkey , time() + 3600);

  return $rkey;
}

function encpass($passwd, $rkey)
{
  // Encrypts $passwd with $key and returns encrypted password

  //$encpasswd = encr(base64_encode($passwd),$rkey);
  $encpasswd = encr(bin2hex($passwd),$rkey);
  //$encpasswd = encr($passwd,$rkey);
  return $encpasswd;
}


function decpass($cipher, $rkey)
{
  // Decrypts $cipher returns decrypted password.

  //$decpasswd = base64_decode(decr($cipher, $rkey));
  $dechexpasswd = decr($cipher, $rkey);
  $decpasswd = '';
  
  for ($i=0; $i<strlen($dechexpasswd)/2; $i++) {
    $decpasswd.=chr(base_convert(substr($dechexpasswd,$i*2,2),16,10));
  }
  //$decpasswd = decr($cipher, $rkey);
  return $decpasswd;
}


// I think also delkey must be run before any other HTML or
//headers.

function delkey($cookie)
{
  // Deletes the cookie
  setcookie ($cookie, "", time() - 3600);
}

?>
