<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/common.php,v 1.14 2002/05/14 10:52:44 rossigee Exp $
 *
 * Copyright 2002 Ross Golder <ross@golder.org>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Stuff that is always checked or run or initialised for every hit.
 */

$conf->nocc_name = 'NOCC';
$conf->nocc_version = '0.9.6-dev';
$conf->nocc_url = 'http://nocc.sourceforge.net/';

// Initialise session array
session_start();

require_once './functions.php';

// Useful for debugging sessions
//echo "<pre>Session:";
//var_dump($_SESSION);
//echo "</pre>";

// Set defaults
if (!isset($_SESSION['folder'])) {
    if (!isset($folder)) {
        $_SESSION['folder'] = $conf->default_folder;
    } else {
        $_SESSION['folder'] = $folder;
    }
}
if (!isset($_SESSION['sort']))
    $_SESSION['sort'] = $conf->default_sort;
if (!isset($_SESSION['sortdir']))
    $_SESSION['sortdir'] = $conf->default_sortdir;

// Override session variables from request, if supplied
if(isset($_REQUEST['user']))
    $_SESSION['user'] = safestrip($_REQUEST['user']);
if(isset($_REQUEST['passwd']))
    $_SESSION['passwd'] = safestrip($_REQUEST['passwd']);
if(isset($_REQUEST['lang']))
    $_SESSION['lang'] = safestrip($_REQUEST['lang']);
if(isset($_REQUEST['sort']))
    $_SESSION['sort'] = safestrip($_REQUEST['sort']);
if(isset($_REQUEST['sortdir']))
    $_SESSION['sortdir'] = safestrip($_REQUEST['sortdir']);

// Need to wait on the language before checking it
$lang = $conf->default_lang;
if(isset($_SESSION['lang']))
    $lang = $_SESSION['lang'];
else {
    if(isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
        $ar_lang = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
        while ($accept_lang = array_shift($ar_lang))
        {
            $tmp = explode(';', $accept_lang);
            $tmp[0] = strtolower($tmp[0]);
            if (file_exists('./lang/' . $tmp[0] . '.php'))
            {
                $lang = $tmp[0];
                break;
            }
        }
    }
    $_SESSION['lang'] = $lang;
}

// Import language translation variables
require ('./lang/'. $lang.'.php');

// Start with default smtp server/port, override later
$_SESSION['smtp_server'] = $conf->default_smtp_server;
$_SESSION['smtp_port'] = $conf->default_smtp_port;

// Default login to just the username
if(isset($_SESSION['user']))
    $_SESSION['login'] = $_SESSION['user'];

// Were we provided with a domainnum to use
if (isset($_REQUEST['domainnum']))
{
    $domainnum = $_REQUEST['domainnum'];
    $_SESSION['domain'] = $conf->domains[$domainnum]->domain;
    $_SESSION['servr'] = $conf->domains[$domainnum]->in;
    $_SESSION['smtp_server'] = $conf->domains[$domainnum]->smtp;
    $_SESSION['smtp_port'] = $conf->domains[$domainnum]->smtp_port;

    // Do we provide the domain with the login?
    if(isset($conf->domains[$domainnum]->login_with_domain))
        $_SESSION['login'] .= "@" . $domain;
}

// Or did the user provide the details themselves
if (isset($_REQUEST['server'])) {
    $server = safestrip($_REQUEST['server']);
    $servtype = strtolower($_REQUEST['servtype']);
    $port = safestrip($_REQUEST['port']);
    $servr = $server.'/'.$servtype.':'.$port;

    // Use as default domain for user's address
    $_SESSION['domain'] = $server;
    $_SESSION['servr'] = $servr;
}

// If we have requested a particular theme
if(isset($_REQUEST['theme']))
    $_SESSION['theme'] = safestrip($_REQUEST['theme']);

// If we haven't chosen, or are forced to use a particular theme...
if(!$conf->use_theme || !isset($_SESSION['theme']))
    $_SESSION['theme'] = $conf->default_theme;

require_once ('./conf_lang.php');
require_once ('./themes/'.$_SESSION['theme'].'/colors.php');

?>
