<?php

// This function allows you to customise the default e-mail address
function get_default_from_address() {
    if(!isset($_SESSION['nocc_user_prefs']))
    return '';

    $user_prefs = $_SESSION['nocc_user_prefs'];
    $from_address = "";

    // Determine e-mail address
    if(!empty($user_prefs->email_address))
        $from_address = $user_prefs->email_address;
    else {
        if (isset($_SESSION['nocc_login_with_domain']) and $_SESSION['nocc_login_with_domain'] == 1) {
        $from_address = $_SESSION['nocc_login'];
        } else if (ereg("([A-Za-z0-9]+)@([A-Za-z0-9]+)", $_SESSION['nocc_login'], $regs)) {
            $from_address = $_SESSION['nocc_login'];
        } else {
        $from_address = $_SESSION['nocc_user'].'@'.$_SESSION['nocc_domain'];
        }
    if($from_address == '@') {
            return '';
        }
    }
    
    // Append name if known
    if(!empty($user_prefs->full_name))
        $from_address = $user_prefs->full_name . ' <' . $from_address . '>';

    return $from_address;
}

// Dynamically load imap module is needed
if (!extension_loaded('imap'))
{
    if (!dl('imap.so'))
    {
        print('error loading imap library');
        exit;
    }
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
