<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/conf_lang.php,v 1.21 2003/12/21 15:40:20 goddess_skuld Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 */
 
// ################### Language Array  ################### //
// If you add language files in 'lang/' folder, please list them here

class lang {
  var $filename="";
  var $label="";
}

$i = 0;

// Arabic (UTF-8)
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'ar';
$lang_array[$i]->label = 'Arabic';

// Arabic (Windows-1256)
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'ar-win';
$lang_array[$i]->label = 'Arabic (Windows-1256)';

// Bulgarian
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'bg';
$lang_array[$i]->label = 'Bulgarian';

// Chinese
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'zh-tw';
$lang_array[$i]->label = 'Chinese (Taiwan)';

// Chinese Simplified
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'zh-gb';
$lang_array[$i]->label = 'Chinese Simplified';

// Czech
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'cs';
$lang_array[$i]->label = 'Cesky';

// Svenska
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'da';
$lang_array[$i]->label = 'Dansk';

// German
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'de';
$lang_array[$i]->label = 'Deutsch';

// Dutch
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'nl';
$lang_array[$i]->label = 'Dutch';

// English
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'en';
$lang_array[$i]->label = 'English';

// Spanish
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'es';
$lang_array[$i]->label = 'Espa&ntilde;ol';

// Finnish
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'fi';
$lang_array[$i]->label = 'Suomi';

// French
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'fr';
$lang_array[$i]->label = 'Fran&ccedil;ais';

// Greek
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'el';
$lang_array[$i]->label = 'Greek';

// Hebrew
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'he';
$lang_array[$i]->label = 'Hebrew';

// Italiano
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'it';
$lang_array[$i]->label = 'Italiano';

// Korean
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'kr';
$lang_array[$i]->label = 'Korean';

// Magyar
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'hu';
$lang_array[$i]->label = 'Magyar';

// Norwegian Bokmal
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'no';
$lang_array[$i]->label = 'Norsk bokmål';

// Norwegian Nynorsk
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'nn';
$lang_array[$i]->label = 'Norsk nynorsk';

// Polish
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'pl';
$lang_array[$i]->label = 'Polski';

// Portuguese
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'pt';
$lang_array[$i]->label = 'Portugu&ecirc;s';

// Portuguese Brazil
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'pt-br';
$lang_array[$i]->label = 'Portugu&ecirc;s Brasil';

// Romanian
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'ro';
$lang_array[$i]->label = 'Romanian';

// Russian
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'ru';
$lang_array[$i]->label = 'Russian (Win)';

// Russian
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'ru-koi';
$lang_array[$i]->label = 'Russian (Unix)';

// Russian
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'ru-iso';
$lang_array[$i]->label = 'Russian (ISO)';

// Swedish
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'sv';
$lang_array[$i]->label = 'Svenska';

// Slovenian
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'sl';
$lang_array[$i]->label = 'Slovensko';

// Slovenski
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'sk';
$lang_array[$i]->label = 'Slovensky';

// Srpski Jezik
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'sr';
$lang_array[$i]->label = 'Srpski Jezik';

// Latvian
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'lv';
$lang_array[$i]->label = 'Latviesu';

// Turkish
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'tr';
$lang_array[$i]->label = 'Turkish';

?>
