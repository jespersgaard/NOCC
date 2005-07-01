<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/common.php,v 1.46 2005/05/11 10:44:42 goddess_skuld Exp $
 *
 * Copyright 2002 Ross Golder <ross@golder.org>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Stuff that is always checked or run or initialised for every hit.
 */

require_once("user_filters.php");

$conf->nocc_name = 'NOCC';
$conf->nocc_version = '0.9.8-dev';
$conf->nocc_url = 'http://nocc.sourceforge.net/';

if ($_REQUEST["action"] == 'login') {
  session_name("NOCCSESSID");
  session_start();
  session_unset();
  session_destroy();
}

session_name("NOCCSESSID");
session_start();
// Initialise session array
if ($_REQUEST['action'] == 'cookie' || $_REQUEST['rss'] == 'true'){
  list($_SESSION['nocc_user'], $_SESSION['nocc_passwd'], $_SESSION['nocc_lang'], $_SESSION['nocc_smtp_server'], $_SESSION['nocc_smtp_port'], $_SESSION['nocc_theme'], $_SESSION['nocc_domain'], $_SESSION['imap_namespace'], $_SESSION['nocc_servr'], $_SESSION['nocc_folder'], $_SESSION['smtp_auth']) = explode(" ", base64_decode($_COOKIE['NoccIdent']));
  
}

// Useful for debugging sessions
//echo "<pre>Session:";
//var_dump($_SESSION);
//echo "</pre>";

// Set defaults
if (isset($_REQUEST['folder'])) {
    $_SESSION['nocc_folder'] = $_REQUEST['folder'];
}
if (!isset($_SESSION['nocc_folder'])) {
        $_SESSION['nocc_folder'] = $conf->default_folder;
}

// Have we changed sort order?
if (!isset($_SESSION['nocc_sort']))
    $_SESSION['nocc_sort'] = $conf->default_sort;
if (!isset($_SESSION['nocc_sortdir']))
    $_SESSION['nocc_sortdir'] = $conf->default_sortdir;

// Override session variables from request, if supplied
if(isset($_REQUEST['user']) && !isset($_SESSION['nocc_loggedin'])) {
    unset($_SESSION['nocc_login']);
    $_SESSION['nocc_user'] = safestrip($_REQUEST['user']);
}
if(isset($_REQUEST['passwd']))
    $_SESSION['nocc_passwd'] = safestrip($_REQUEST['passwd']);
if(isset($_REQUEST['lang']))
    $_SESSION['nocc_lang'] = safestrip($_REQUEST['lang']);
if(isset($_REQUEST['sort']))
    $_SESSION['nocc_sort'] = safestrip($_REQUEST['sort']);
if(isset($_REQUEST['sortdir']))
    $_SESSION['nocc_sortdir'] = safestrip($_REQUEST['sortdir']);

// Need to wait on the language before checking it
$lang = $conf->default_lang;
if(isset($_SESSION['nocc_lang']))
    $lang = $_SESSION['nocc_lang'];
else {
    if(isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) && (!isset($conf->force_default_lang) || !$conf->force_default_lang)) {
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
    } else {
      $lang = $conf->default_lang;
    }
    $_SESSION['nocc_lang'] = $lang;
}

// Import language translation variables
require ('./lang/'. $lang.'.php');

// Start with default smtp server/port, override later
if (empty($_SESSION['nocc_smtp_server']))
    $_SESSION['nocc_smtp_server'] = $conf->default_smtp_server;
if (empty($_SESSION['nocc_smtp_port']))
    $_SESSION['nocc_smtp_port'] = $conf->default_smtp_port;

// Default login to just the username
if(isset($_SESSION['nocc_user']) && !isset($_SESSION['nocc_login']))
    $_SESSION['nocc_login'] = $_SESSION['nocc_user'];

// Check allowed chars for login
if ($_SESSION['nocc_login'] != '' && isset($conf->allowed_char) && $conf->allowed_char != '' && !ereg($conf->allowed_char, $_SESSION['nocc_login'])) {
    $ev = new NoccException($html_wrong);
    if(isset($_REQUEST['theme'])) {
        $_SESSION['nocc_theme'] = safestrip($_REQUEST['theme']);
        require ('./themes/' . $_SESSION['nocc_theme'] . '/colors.php');
    }
    require ('./html/header.php');
    require ('./html/error.php');
    require ('./html/footer.php');
    exit;
}

// Were we provided with a fillindomain to use?
if ( isset($_REQUEST['fillindomain']) && isset( $conf->typed_domain_login ) )
{
    for($count=0; $count < count($conf->domains); $count++) {
        if($_REQUEST['fillindomain'] == $conf->domains[$count]->domain)
            $_REQUEST['domainnum']=$count;
    }
}

// Were we provided with a domainnum to use
if (isset($_REQUEST['domainnum']))
{
    $domainnum = $_REQUEST['domainnum'];
    if (!isset($conf->domains[$domainnum])) {
       $ev = new NoccException($lang_could_not_connect);
       if(isset($_REQUEST['theme'])) {
         $_SESSION['nocc_theme'] = safestrip($_REQUEST['theme']);
         require ('./themes/' . $_SESSION['nocc_theme'] . '/colors.php');
       }
       require ('./html/header.php');
       require ('./html/error.php');
       require ('./html/footer.php');
       exit;
    }
    $_SESSION['nocc_domain'] = $conf->domains[$domainnum]->domain;
    $_SESSION['nocc_servr'] = $conf->domains[$domainnum]->in;
    $_SESSION['nocc_smtp_server'] = $conf->domains[$domainnum]->smtp;
    $_SESSION['nocc_smtp_port'] = $conf->domains[$domainnum]->smtp_port;
    $_SESSION['imap_namespace'] = $conf->domains[$domainnum]->imap_namespace;

    // Do we provide the domain with the login?
    if(isset($conf->domains[$domainnum]->login_with_domain)){
        $_SESSION['nocc_login'] .= "@" . $_SESSION['nocc_domain'];
        $_SESSION['nocc_login_with_domain'] = 1;
    }

    //append suffix to login
    if(isset($conf->domains[$domainnum]->login_suffix))
        $_SESSION['nocc_login'] .= $conf->domains[$domainnum]->login_suffix;

    //smtp auth
    $_SESSION['smtp_auth'] = $conf->domains[$domainnum]->smtp_auth_method;
}

// Or did the user provide the details themselves
if (isset($_REQUEST['server'])) {
    $server = safestrip($_REQUEST['server']);
    $servtype = strtolower($_REQUEST['servtype']);
    $port = safestrip($_REQUEST['port']);
    $servr = $server.'/'.$servtype.':'.$port;

    // Use as default domain for user's address
    $_SESSION['nocc_domain'] = $server;
    $_SESSION['nocc_servr'] = $servr;
}

// If we have requested a particular theme
if(isset($_REQUEST['theme']))
    $_SESSION['nocc_theme'] = safestrip($_REQUEST['theme']);

// If we haven't chosen, or are forced to use a particular theme...
if(!$conf->use_theme || !isset($_SESSION['nocc_theme']))
    $_SESSION['nocc_theme'] = $conf->default_theme;

// Cache the user's preferences/filters
if(isset($_SESSION['nocc_user']) && isset($_SESSION['nocc_domain'])) {
    $ev = NULL;
    $user_key = $_SESSION['nocc_user'].'@'.$_SESSION['nocc_domain'];

    // Preferences
    if(!isset($_SESSION['nocc_user_prefs'])) {
        $_SESSION['nocc_user_prefs'] = NOCCUserPrefs::read($user_key, $ev);
        if(NoccException::isException($ev)) {
                echo "<p>User prefs error ($user_key): ".$ev->getMessage()."</p>";
                exit(1);
        }
    }
    $user_prefs = $_SESSION['nocc_user_prefs'];

    // Filters
    if (!empty($conf->prefs)) {
        if(!isset($_SESSION['nocc_user_filters'])) {
            $_SESSION['nocc_user_filters'] = NOCCUserFilters::read($user_key, $ev);
            if(NoccException::isException($ev)) {
                    echo "<p>User filters error ($user_key): ".$ev->getMessage()."</p>";
                    exit(1);
            }
        }
        $user_filters = $_SESSION['nocc_user_filters'];
    }
}

require_once ('./conf_lang.php');
require_once ('./themes/'.$_SESSION['nocc_theme'].'/colors.php');

// allow PHP script to consume more memory than default setting for
// big attachments
if (isset($conf->memory_limit) && $conf->memory_limit != '') {
  ini_set ( "memory_limit", $conf->memory_limit);
}
?>
