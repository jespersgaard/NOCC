<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/conf_lang.php,v 1.27 2005/12/01 21:19:55 goddess_skuld Exp $
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

// Arabic
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'ar';
$lang_array[$i]->label = 'Arabic';

// Bulgarian
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'bg';
$lang_array[$i]->label = 'Bulgarian';

// Catalan
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'ca';
$lang_array[$i]->label = 'Català';

// Chinese (Traditionnal)
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'zh-tw';
$lang_array[$i]->label = 'Chinese (Traditionnal)';

// Chinese (Simplified)
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'zh-gb';
$lang_array[$i]->label = 'Chinese (Simplified)';

// Czech
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'cs';
$lang_array[$i]->label = 'Cesky';

// Welsh
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'cy';
$lang_array[$i]->label = 'Cymraeg';

// Danish
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
$lang_array[$i]->label = 'Español';

// Persian
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'farsi';
$lang_array[$i]->label = 'Farsi';

// French
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'fr';
$lang_array[$i]->label = 'Français';

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

// Croatian
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'hr';
$lang_array[$i]->label = 'Hrvatski';

// Icelandic
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'is';
$lang_array[$i]->label = 'Icelandic';

// Italian
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'it';
$lang_array[$i]->label = 'Italiano';

// Japanese
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'ja';
$lang_array[$i]->label = 'Japanese';

// Korean
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'kr';
$lang_array[$i]->label = 'Korean';

// Latvian
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'lv';
$lang_array[$i]->label = 'Latviesu';

// Hungarian
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
$lang_array[$i]->label = 'Português';

// Brazilian Portuguese
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'pt-br';
$lang_array[$i]->label = 'Português Brasil';

// Romanian
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'ro';
$lang_array[$i]->label = 'Romanian';

// Russian
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'ru';
$lang_array[$i]->label = 'Russian';

// Swedish
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'sv';
$lang_array[$i]->label = 'Svenska';

// Slovene
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'sl';
$lang_array[$i]->label = 'Slovensko';

// Slovak
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'sk';
$lang_array[$i]->label = 'Slovensky';

// Serbian
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'sr';
$lang_array[$i]->label = 'Srpski Jezik';

// Finnish
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'fi';
$lang_array[$i]->label = 'Suomi';

// Thai
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'th';
$lang_array[$i]->label = 'Thai';

// Turkish
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'tr';
$lang_array[$i]->label = 'Turkish';
?>
