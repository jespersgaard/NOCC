<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/common.php,v 1.2 2002/04/19 14:39:30 rossigee Exp $
 *
 * Copyright 2002 Ross Golder <ross@golder.org>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Stuff that is always checked or run or initialised for every hit.
 */

// Initialise session array
session_start();

require_once './check_lang.php';
require_once './functions.php';

// Useful for debugging sessions
//echo "<pre>Session:";
//var_dump($_SESSION);
//echo "</pre>";

// Set defaults
if (!isset($_SESSION['folder']))
	$_SESSION['folder'] = $conf->default_folder;
if (!isset($_SESSION['sort']))
	$_SESSION['sort'] = $conf->default_sort;
if (!isset($_SESSION['sortdir']))
	$_SESSION['sortdir'] = $conf->default_sortdir;

// Override session variables from request, if supplied
if(isset($_REQUEST['user']))
	$_SESSION['user'] = safestrip($_REQUEST['user']);
if(isset($_REQUEST['passwd']))
	$_SESSION['passwd'] = safestrip($_REQUEST['passwd']);
if(isset($_REQUEST['theme']))
	$_SESSION['theme'] = safestrip($_REQUEST['theme']);
if(isset($_REQUEST['lang']))
	$_SESSION['lang'] = safestrip($_REQUEST['lang']);
if(isset($_REQUEST['sort']))
	$_SESSION['sort'] = safestrip($_REQUEST['sort']);
if(isset($_REQUEST['sortdir']))
	$_SESSION['sortdir'] = safestrip($_REQUEST['sortdir']);

// Unpack session variables into global namespace. This shouldn't be long-term, as I'm
// trying to clear up use of the global namespace.
$theme = $_SESSION['theme'];
$lang = $_SESSION['lang'];

// Default login to just the username
$_SESSION['login'] = $_SESSION['user'];

// Given domainnum, set up 'domain', 'servr', 'smtp_server' and 'smtp_port'
if (isset($_REQUEST['domainnum']))
{
	$_SESSION['domain'] = $conf->domains[$domainnum]->domain;
	$_SESSION['servr'] = $conf->domains[$domainnum]->in;
	$_SESSION['smtp_server'] = $conf->domains[$domainnum]->smtp;
	$_SESSION['smtp_port'] = $conf->domains[$domainnum]->smtp_port;

	// Do we provide the domain with the login?
	if(isset($conf->domains[$domainnum]->login_with_domain))
		$_SESSION['login'] .= "@" . $domain;
}
if(isset($_SESSION['domain']))
	$domain = $_SESSION['domain'];
if(isset($_SESSION['servr']))
	$servr = $_SESSION['servr'];
if(isset($_SESSION['smtp_server']))
	$smtp_server = $_SESSION['smtp_server'];
if(isset($_SESSION['smtp_port']))
	$smtp_port = $_SESSION['smtp_port'];

// Have we specified a server/type/port to connect to?
if (isset($_REQUEST['server'])) {
	$server = safestrip($_REQUEST['server']);
	$servtype = strtolower($_REQUEST['servtype']);
	$port = safestrip($_REQUEST['port']);
	if ($servtype != 'imap')
		$servr = $server.'/'.$servtype.':'.$port;
	else
		$servr = $server.':'.$port;

	// Use as default domain for user's address
	$_SESSION['domain'] = $server;
}


if (empty($smtp_server))
	$smtp_server = $conf->default_smtp_server;
if (empty($smtp_port))
	$smtp_port = $conf->default_smtp_port;

// If we are forced to use a particular theme...
if (!$conf->use_theme || empty($theme))
	$theme = $conf->default_theme;

require_once ('./conf_lang.php');
require_once ('./themes/'.$theme.'/colors.php');

?>
