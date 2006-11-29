<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/check.php,v 1.18 2006/10/18 15:33:59 goddess_skuld Exp $ 
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 */

unset ($ev);
// PHP version
if (floor(phpversion()) < 4)
{
  $ev = new NoccException("You don't seem to be running PHP 4, you need at least PHP 4 to run NOCC.");
  require ('./html/header.php');
  require ('./html/error.php');
  require ('./html/footer.php');
  exit;
}

// Mandatory modules
if (!extension_loaded('imap'))
{
  $ev = new NoccException("The IMAP module does not seem to be installed on this PHP setup, please see NOCC's documentation.");
}

if (!extension_loaded('iconv'))
{
  $ev = new NoccException("The Iconv module does not seem to be installed on this PHP setup, please see NOCC's documentation.");
}

// PHP setup
if (ini_get('register_globals') == true)
{
  $ev = new NoccException("Please set \"register_globals\" to \"Off\" within your \"php.ini\" file in order for NOCC to run. If you don't have access to \"php.ini\", please consult the FAQ in order to fix this problem.");
}

// NOCC setup
if (empty($conf->tmpdir))
{
  $ev = new NoccException("\"\$conf->tmpdir\" is not set in \"conf.php\". NOCC cannot run.");
}

if (!empty($conf->prefs_dir) && !is_dir($conf->prefs_dir))
{
  $ev = new NoccException("\"\$conf->prefs_dir\" is set in \"conf.php\" but doesn't exists. You must create \"\$conf->prefs_dir\" ($conf->prefs_dir) in order for NOCC to run.");
}

if (!isset($conf->master_key) || $conf->master_key == '')
{
  $ev = new NoccException("\"\$conf->master_key\" must be set in \"conf.php\" in
order for NOCC to run.");
}

// Display error message
if (NoccException::isException($ev)) {
  require ('./html/header.php');
  require ('./html/error.php');
  require ('./html/footer.php');
  exit;
}
?>
