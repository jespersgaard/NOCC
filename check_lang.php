<?
if (!ISSET($lang))
{
	if (file_exists("lang/".$HTTP_ACCEPT_LANGUAGE.".php"))
		$lang = $HTTP_ACCEPT_LANGUAGE;
	else
		$lang = $default_lang;
}
require ("lang/".$lang.".php");
?>