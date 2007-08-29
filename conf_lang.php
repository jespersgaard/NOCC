<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/conf_lang.php,v 1.29 2007/07/28 06:54:10 goddess_skuld Exp $
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
$lang_array[$i]->label = 'العربية';

// Bulgarian
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'bg';
$lang_array[$i]->label = 'Български';

// Catalan
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'ca';
$lang_array[$i]->label = 'Català';

// Czech
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'cs';
$lang_array[$i]->label = 'Česky';

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

// English
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'en';
$lang_array[$i]->label = 'English';

// Greek
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'el';
$lang_array[$i]->label = 'Ελληνικά';

// Spanish
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'es';
$lang_array[$i]->label = 'Español';

// Persian
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'farsi';
$lang_array[$i]->label = 'فارسی';

// French
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'fr';
$lang_array[$i]->label = 'Français';


// Hebrew
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'he';
$lang_array[$i]->label = 'עברית';

// Croatian
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'hr';
$lang_array[$i]->label = 'Hrvatski';

// Icelandic
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'is';
$lang_array[$i]->label = 'Íslenska';

// Italian
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'it';
$lang_array[$i]->label = 'Italiano';

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

// Dutch
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'nl';
$lang_array[$i]->label = 'Nederlands';

// Norwegian bokmål
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'no';
$lang_array[$i]->label = 'Norsk bokmål';

// Norwegian nynorsk
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
$lang_array[$i]->label = 'Português Brasileiro';

// Romanian
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'ro';
$lang_array[$i]->label = 'Română';

// Russian
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'ru';
$lang_array[$i]->label = 'Русский';

// Slovak
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'sk';
$lang_array[$i]->label = 'Slovenčina';

// Slovene
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'sl';
$lang_array[$i]->label = 'Slovenščina';

// Serbian
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'sr';
$lang_array[$i]->label = 'Srpski';

// Finnish
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'fi';
$lang_array[$i]->label = 'Suomi';

// Swedish
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'sv';
$lang_array[$i]->label = 'Svenska';

// Thai
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'th';
$lang_array[$i]->label = 'ไทย';

// Turkish
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'tr';
$lang_array[$i]->label = 'Türkçe';

// Japanese
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'ja';
$lang_array[$i]->label = '日本語';

// Korean
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'kr';
$lang_array[$i]->label = '한국어';


// Chinese (Simplified)
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'zh-gb';
$lang_array[$i]->label = '中文';

// Chinese (Traditionnal)
$i++;
$lang_array[$i] = new lang();
$lang_array[$i]->filename = 'zh-tw';
$lang_array[$i]->label = '古文 / 文言文';
?>
