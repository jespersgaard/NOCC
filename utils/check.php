<?php
/**
 * Check environment
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
 * @version    SVN: $Id$
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
  $ev = new NoccException("\"\$conf->tmpdir\" is not set in \"config/conf.php\". NOCC cannot run.");
}

if (!empty($conf->prefs_dir) && !is_dir($conf->prefs_dir))
{
  $ev = new NoccException("\"\$conf->prefs_dir\" is set in \"config/conf.php\" but doesn't exists. You must create \"\$conf->prefs_dir\" ($conf->prefs_dir) in order for NOCC to run.");
}

if (!isset($conf->master_key) || $conf->master_key == '')
{
  $ev = new NoccException("\"\$conf->master_key\" must be set in \"config/conf.php\" in order for NOCC to run.");
}

if (!isset($conf->column_order) || $conf->column_order == '')
{
  $ev = new NoccException("\"\$conf->column_order\" must be set in \"config/conf.php\" in order for NOCC to run.");
}

// Display error message
if (isset($ev) && NoccException::isException($ev)) {
  require ('./html/header.php');
  require ('./html/error.php');
  require ('./html/footer.php');
  exit;
}
?>
