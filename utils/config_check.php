<?php

// This function allows you to customise the default e-mail address
function get_default_from_address() {
    if(!isset($_SESSION['nocc_user_prefs']))
        return '';

    $user_prefs = $_SESSION['nocc_user_prefs'];
    $from_address = '';

    // Determine e-mail address
    if ($user_prefs->getEmailAddress() != '')
        $from_address = $user_prefs->getEmailAddress();
    else {
        if (isset($_SESSION['nocc_login_with_domain']) && $_SESSION['nocc_login_with_domain'] == 1) {
            $from_address = $_SESSION['nocc_login'];
        } else if (preg_match("|([A-Za-z0-9]+)@([A-Za-z0-9]+)|", $_SESSION['nocc_login'])) {
            $from_address = $_SESSION['nocc_login'];
        } else {
            $from_address = $_SESSION['nocc_user'] . '@' . $_SESSION['nocc_domain'];
        }
        if ($from_address == '@') {
            return '';
        }
    }
    
    // Append name if known
    if ($user_prefs->getFullName() != '')
        $from_address = '"' . $user_prefs->getFullName() . '" <' . $from_address . '>';

    return $from_address;
}

// Detect base url
if (!isset($conf->base_url) || $conf->base_url == '') {
  $path_info = pathinfo($_SERVER['SCRIPT_NAME']);
  if (substr($path_info['dirname'], -1, 1) == '/')
    $dir_name = $path_info['dirname'];
  else
    $dir_name = $path_info['dirname'].'/';
  //Prevent a buggy behavior from PHP under Windows
  if ($path_info['dirname'] == '\\') $dir_name = '/';

  $conf->base_url = 'http';
  if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on')
    $conf->base_url .=  's';
  $conf->base_url .= '://'.$_SERVER['HTTP_HOST'].$dir_name;
}
