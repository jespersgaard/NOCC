<?
/*
	$Author: nicocha $
	$Revision: 1.6 $
	$Date: 2000/10/30 00:31:44 $

	NOCC: Copyright 2000 Nicolas Chalanset <nicocha@free.fr> , Olivier Cahagne <cahagn_o@epita.fr>
  
  You should have received a copy of the GNU Public
  License along with this package; if not, write to the
  Free Software Foundation, Inc., 59 Temple Place - Suite 330,
  Boston, MA 02111-1307, USA.
*/


/*
 This file set the language (default is browser language if it exists else it's $default_lang
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
require ("lang/".$lang.".php");
?>