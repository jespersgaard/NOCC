<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/check_lang.php,v 1.20 2002/03/24 17:00:36 wolruf Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Sets the language (default is browser language if it exists else
 * it's $conf->default_lang)
 */

if (!isset($_SESSION['lang']))
{
    $ar_lang = explode(',', $HTTP_ACCEPT_LANGUAGE);
    while ($accept_lang = array_shift($ar_lang))
    {
        $tmp = explode(';', $accept_lang);
        $tmp[0] = strtolower($tmp[0]);
        if (file_exists('./lang/' . $tmp[0] . '.php'))
        {
            $_SESSION['lang'] = $tmp[0];
            break;
        }
    }
    if (empty($_SESSION['lang']))
        $_SESSION['lang'] = $conf->default_lang;
}
require ('./lang/' . $_SESSION['lang'] . '.php');
?>
