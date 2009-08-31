<?php
/**
 * Stuff that is always checked or run or initialised for every hit
 *
 * Copyright 2002 Ross Golder <ross@golder.org>
 *
 * This file is part of NOCC. NOCC is free software under the terms of the
 * GNU General Public License. You should have received a copy of the license
 * along with NOCC.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package    NOCC
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @version    SVN: $Id$
 */

// Define variables
if (!isset($from_rss)) { $from_rss=false; }

if (file_exists('./config/conf.php')) {
    require_once './config/conf.php';
    
    // code extraction from conf.php, legacy code support
    if ((file_exists('./utils/config_check.php')) && (!function_exists('get_default_from_address'))) {
    require_once('./utils/config_check.php');
    }
}
else {
    print("The main configuration file (./config/conf.php) couldn't be found! <p />Please rename the file './config/conf.php.dist' to './config/conf.php'. ");
    die();
}

require_once './classes/nocc_session.php';
require_once './classes/nocc_security.php';
require_once './classes/user_prefs.php';
require_once('./classes/user_filters.php');
require_once './utils/functions.php';
require_once('./utils/html_entity_decode.php');
require_once('./utils/crypt.php');
require_once('./utils/translation.php');

$conf->nocc_name = 'NOCC';
$conf->nocc_version = '1.9-dev';
$conf->nocc_url = 'http://nocc.sourceforge.net/';

$pwd_to_encrypt = false;
if (isset ($_REQUEST["action"]) && $_REQUEST["action"] == 'login') {
    session_name("NOCCSESSID");
    session_start();
    session_unset();
    session_destroy();
    $pwd_to_encrypt = true;
}

session_name("NOCCSESSID");
if ($from_rss == false) {
    session_start();
}

// Initialise session array
if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'cookie'){
    $session = loadSession($ev, $_COOKIE['NoccIdent']);
    if (NoccException::isException($ev)) {
        require ('./html/header.php');
        require ('./html/error.php');
        require ('./html/footer.php');
        break;
    }
    list($_SESSION['nocc_user'], $_SESSION['nocc_passwd'],
             $_SESSION['nocc_login'], $_SESSION['nocc_lang'],
             $_SESSION['nocc_smtp_server'], $_SESSION['nocc_smtp_port'],
             $_SESSION['nocc_theme'], $_SESSION['nocc_domain'],
             $_SESSION['imap_namespace'], $_SESSION['nocc_servr'],
             $_SESSION['nocc_folder'], $_SESSION['smtp_auth'],
             $_SESSION['ucb_pop_server'], $_SESSION['quota_enable'],
             $_SESSION['quota_type']) = explode(" ", base64_decode($session));
    $_SESSION['nocc_folder'] = isset($_REQUEST['nocc_folder']) ? $_REQUEST['nocc_folder'] : 'INBOX';
    $pwd_to_encrypt = false;
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
if (isset($_REQUEST['user']) && !isset($_SESSION['nocc_loggedin'])) {
    unset($_SESSION['nocc_login']);
    $_SESSION['nocc_user'] = safestrip($_REQUEST['user']);
}
if (isset($_REQUEST['passwd'])) {
    $_SESSION['nocc_passwd'] = safestrip($_REQUEST['passwd']);
    $pwd_to_encrypt = true;
}

if ($pwd_to_encrypt == true) {
    /* encrypt session password */
    /* store into session encrypted password */
    $_SESSION['nocc_passwd'] = encpass($_SESSION['nocc_passwd'], $conf->master_key);
}

if (isset($_REQUEST['lang']))
    $_SESSION['nocc_lang'] = safestrip($_REQUEST['lang']);
if (isset($_REQUEST['sort']))
    $_SESSION['nocc_sort'] = safestrip($_REQUEST['sort']);
if (isset($_REQUEST['sortdir']))
    $_SESSION['nocc_sortdir'] = safestrip($_REQUEST['sortdir']);

// Need to wait on the language before checking it
$lang = $conf->default_lang;
if (isset($_SESSION['nocc_lang']))
    $lang = $_SESSION['nocc_lang'];
else {
    if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) && (!isset($conf->force_default_lang) || !$conf->force_default_lang)) {
        $ar_lang = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
        while ($accept_lang = array_shift($ar_lang)) {
            $tmp = explode(';', $accept_lang);
            $tmp[0] = strtolower($tmp[0]);
            if (file_exists('./lang/' . $tmp[0] . '.php')) {
                $lang = $tmp[0];
                break;
            }
        }
    } else {
      $lang = $conf->default_lang;
    }
    $_SESSION['nocc_lang'] = $lang;
}

// If we have requested a particular theme
if(isset($_REQUEST['theme']))
    $_SESSION['nocc_theme'] = safestrip($_REQUEST['theme']);

// If we haven't chosen, or are forced to use a particular theme...
if(!$conf->use_theme || !isset($_SESSION['nocc_theme']))
    $_SESSION['nocc_theme'] = $conf->default_theme;

// Import language translation variables
$lang = str_replace('..','',$lang);
$lang = str_replace('/','',$lang);

// load english (nocc default), to be overwritten by translation,
// fixes missing translation issue
require './lang/en.php';

if ($lang != 'en') {
  require './lang/'. $lang . '.php';
}

// Start with default smtp server/port, override later
if (empty($_SESSION['nocc_smtp_server']))
    $_SESSION['nocc_smtp_server'] = $conf->default_smtp_server;
if (empty($_SESSION['nocc_smtp_port']))
    $_SESSION['nocc_smtp_port'] = $conf->default_smtp_port;

// Default login to just the username
if (isset($_SESSION['nocc_user']) && !isset($_SESSION['nocc_login']))
    $_SESSION['nocc_login'] = $_SESSION['nocc_user'];

// Check allowed chars for login
if (isset($_SESSION['nocc_login']) && $_SESSION['nocc_login'] != ''
        && isset($conf->allowed_char) && $conf->allowed_char != ''
        && !ereg($conf->allowed_char, $_SESSION['nocc_login'])) {
    $ev = new NoccException($html_wrong);
    require ('./html/header.php');
    require ('./html/error.php');
    require ('./html/footer.php');
    exit;
}

// Were we provided with a fillindomain to use?
if ( isset($_REQUEST['fillindomain']) && isset( $conf->typed_domain_login ) ) {
    for($count=0; $count < count($conf->domains); $count++) {
        if($_REQUEST['fillindomain'] == $conf->domains[$count]->domain)
            $_REQUEST['domainnum']=$count;
    }
}

// Were we provided with a domainnum to use
if (isset($_REQUEST['domainnum']) && !(isset($_REQUEST['server']))) {
    $domainnum = $_REQUEST['domainnum'];
    if (!isset($conf->domains[$domainnum])) {
        $ev = new NoccException($lang_could_not_connect);
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
    $_SESSION['ucb_pop_server'] = $conf->domains[$domainnum]->have_ucb_pop_server;
    $_SESSION['quota_enable'] = $conf->domains[$domainnum]->quota_enable;
    $_SESSION['quota_type'] = $conf->domains[$domainnum]->quota_type;

    // Check allowed logins
    if (isset($conf->domains[$domainnum]->login_allowed)
            && !empty($conf->domains[$domainnum]->login_allowed)) {
        if (is_array($conf->domains[$domainnum]->login_allowed)) {
            if (!array_key_exists($_SESSION['nocc_login'], $conf->domains[$domainnum]->login_allowed)) {
                $ev = new NoccException($html_login_not_allowed);
                require ('./html/header.php');
                require ('./html/error.php');
                require ('./html/footer.php');
                exit;
            }
        } else {
            if (file_exists(substr($conf->domains[$domainnum]->login_allowed, 1))) {
                include substr($conf->domains[$domainnum]->login_allowed, 1);
                if (!array_key_exists($_SESSION['nocc_login'], $login_allowed)) {
                    $ev = new NoccException($html_login_not_allowed);
                    require ('./html/header.php');
                    require ('./html/error.php');
                    require ('./html/footer.php');
                    exit;
                }
            }
        }
    }

    //Do we have login aliases?
    if(isset($conf->domains[$domainnum]->login_aliases)
            && !empty($conf->domains[$domainnum]->login_aliases)){
        if (is_array($conf->domains[$domainnum]->login_aliases)) {
            $_SESSION['nocc_login'] = str_replace(
                    array_keys($conf->domains[$domainnum]->login_aliases),
                    array_values($conf->domains[$domainnum]->login_aliases),
                    $_SESSION['nocc_login']);
        } else {
            if (file_exists(substr($conf->domains[$domainnum]->login_aliases, 1))) {
                include substr($conf->domains[$domainnum]->login_aliases, 1);
                $_SESSION['nocc_login'] = str_replace(
                        array_keys($login_alias),
                        array_values($login_alias),
                        $_SESSION['nocc_login']);
            }
        }
    }

    // Do we provide the domain with the login?
    if (isset($conf->domains[$domainnum]->login_with_domain)
            && ($conf->domains[$domainnum]->login_with_domain == 1)){
        if (isset($conf->domains[$domainnum]->login_with_domain_character)
                && $conf->domains[$domainnum]->login_with_domain_character != '') {
            $_SESSION['nocc_login'] .= $conf->domains[$domainnum]->login_with_domain_character . $_SESSION['nocc_domain'];
        } else if (ereg("([A-Za-z0-9]+)@([A-Za-z0-9]+)",$_SESSION['nocc_login'], $regs)) {
            $_SESSION['nocc_login'] = $_SESSION['nocc_login'];
            $_SESSION['nocc_domain'] = $regs[2];
        } else {
            $_SESSION['nocc_login'] .= "@" . $_SESSION['nocc_domain'];
        }
        $_SESSION['nocc_login_with_domain'] = 1; 
    }

    //append prefix to login
    if(isset($conf->domains[$domainnum]->login_prefix))
        $_SESSION['nocc_login'] = $conf->domains[$domainnum]->login_prefix . $_SESSION['nocc_login'];

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

// Cache the user's preferences/filters
if(isset($_SESSION['nocc_user']) && isset($_SESSION['nocc_domain'])) {
    $ev = NULL;
    $user_key = $_SESSION['nocc_user'].'@'.$_SESSION['nocc_domain'];

    // Preferences
    if (!isset($_SESSION['nocc_user_prefs'])) {
        $_SESSION['nocc_user_prefs'] = NOCCUserPrefs::read($user_key, $ev);
        if(NoccException::isException($ev)) {
            echo "<p>User prefs error ($user_key): ".$ev->getMessage()."</p>";
            exit(1);
        }
    }
    $user_prefs = $_SESSION['nocc_user_prefs'];

    // Set lang from user prefs
    if (isset($user_prefs->lang) && $user_prefs->lang != '') {
        $_SESSION['nocc_lang'] = $user_prefs->lang;
        $lang = $_SESSION['nocc_lang'];
        $lang = str_replace('..','',$lang);
        $lang = str_replace('/','',$lang);
        require ('./lang/'. $lang.'.php');
    }

    // Set theme from user prefs
    if ($conf->use_theme == true && isset($user_prefs->theme)) {
        // evaluate if the theme in user preferences still exists
        if (!is_dir('./themes/'.$user_prefs->theme)) {
            $_SESSION['nocc_theme'] = $conf->default_theme;
        }
        else {
            $_SESSION['nocc_theme'] = $user_prefs->theme;
       }
    }

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

require_once ('./config/conf_lang.php');
require_once ('./config/conf_charset.php');

// allow PHP script to consume more memory than default setting for
// big attachments
if (isset($conf->memory_limit) && $conf->memory_limit != '') {
    @ini_set ( "memory_limit", $conf->memory_limit);
}

?>
