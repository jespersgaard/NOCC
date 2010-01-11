<?php
/**
 * Logout
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * This file is part of NOCC. NOCC is free software under the terms of the
 * GNU General Public License. You should have received a copy of the license
 * along with NOCC.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package    NOCC
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @version    SVN: $Id$
 */

session_name("NOCCSESSID");
session_start();

if (file_exists('./config/conf.php')) {
    require_once './config/conf.php';
    
    // code extraction from conf.php, legacy code support
    if ((file_exists('./utils/config_check.php')) && (!function_exists('get_default_from_address'))) {
        require_once './utils/config_check.php';
    }
}
else {
    print("The main configuration file (./config/conf.php) couldn't be found! <p />Please rename the file './config/conf.php.dist' to './config/conf.php'. ");
    die();
}

require_once './utils/functions.php';

clear_attachments();
session_name("NOCCSESSID");
session_destroy();
//destroy authentification cookie
setcookie("NoccIdent");
require_once './utils/proxy.php';
Header('Location: ' . $conf->base_url . 'index.php');
?>
