<?
/*
 * $Header: /cvsroot/nocc/nocc/webmail/check_lang.php,v 1.10 2001/02/19 11:53:26 wolruf Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Sets the language (default is browser language if it exists else
 * it's $default_lang)
 */

if (!ISSET($lang))
{
	$ar_lang = explode(",", $HTTP_ACCEPT_LANGUAGE);
	while ($accept_lang = array_shift($ar_lang))
	{
		$tmp = explode(";", $accept_lang);
		if (file_exists("lang/".$tmp[0].".php"))
		{
			$lang = $tmp[0];
			break;
		}
	}
	if ($lang == "")
		$lang = $default_lang;
}
$lang = trim($lang);
require ("lang/".$lang.".php");
?>
