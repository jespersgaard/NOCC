<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/prefs.php,v 1.18 2002/04/15 10:28:02 mrylander Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 */

require_once 'exception.php';

if (!isset($_SESSION['prefs_are_cached']))
{
    $prefs_are_cached = false;
    $prefs_cache = array();
    $_SESSION['prefs_cache'] = $prefs_are_cached;
    $_SESSION['prefs_are_cached'] = $prefs_are_cached;
}

function cachePrefValues($username)
{
    global $conf, $prefs_are_cached, $prefs_cache;
    
    if (!$conf->prefs_dir)
        return;
    if ($prefs_are_cached)
        return;
    
    $filename = $conf->prefs_dir . $username . '.pref';
    if (file_exists($filename))
    {
        $file = fopen($filename, 'r');
        if(!$file)
        {
            error_log("Could not open $filename for reading.");
            return;
        }
        
        /** read in all the preferences **/
        $highlight_num = 0;
        while (! feof($file))
        {
            $pref = trim(fgets($file, 1024));
            $equalsAt = strpos($pref, '=');
            if ($equalsAt > 0)
            {
                $Key = substr($pref, 0, $equalsAt);
                $Value = substr($pref, $equalsAt + 1);
                if (substr($Key, 0, 9) == 'highlight')
                {
                    $Key = 'highlight' . $highlight_num;
                    $highlight_num ++;
                }
                if ((substr($Key, 0, 6) == 'leadin') ||
                    (substr($Key, 0, 9) == 'signature'))
                $Value = base64_decode($Value);

                if ($Value != '')
                    $prefs_cache[$Key] = $Value;
            }
        }
        fclose($file);
    }

    $prefs_are_cached = true;
}
   
   
/** returns the value for $string **/
function getPref($string)
{
    global $conf, $prefs_cache;
    
    $username = $_SESSION['user'].'@'.$_SESSION['domain'];
    cachePrefValues($username);
      
    if (isset($prefs_cache[$string]))
        return ($prefs_cache[$string]);
    return ('');
}


function savePrefValues($username)
{
    global $conf, $prefs_cache, $html_prefs_file_error;

    $filename = $conf->prefs_dir . $username . '.pref';
    if(file_exists($filename) && !is_writable($filename))
        return (new Exception($html_prefs_file_error));
    $file = fopen($filename, 'w');
    if(!$file)
        return (new Exception($html_prefs_file_error));
    foreach ($prefs_cache as $Key => $Value)
    {
        if (isset($Value)) {
            if (($Key == 'leadin') || ($Key == 'signature'))
                $Value = base64_encode($Value);
            fwrite($file, $Key . '=' . $Value . "\n");
        }
    }
    fclose($file);
}


function removePref($username, $string)
{
    global $prefs_cache;
      
    cachePrefValues($username);
    if (isset($prefs_cache[$string]))
        unset($prefs_cache[$string]);
    return (savePrefValues($username));
}
   

/** sets the pref, $string, to $set_to **/
function setPref($string, $set_to)
{
    global $conf, $prefs_cache;

    $username = $_SESSION['user'].'@'.$_SESSION['domain'];
    cachePrefValues($username);
    if (isset($prefs_cache[$string]) && $prefs_cache[$string] == $set_to)
        return;
    if ($set_to === '')
    {
        removePref($username, $string);
        return;
    }
    $prefs_cache[$string] = $set_to;
    return savePrefValues($username);
}

/** [Remove in NOCC-1.0] Writes the Signature **/
function setSig($string)
{
    global $conf, $html_sig_file_error;

    $username = $_SESSION['user'].'@'.$_SESSION['domain'];
    $filename = $conf->prefs_dir . $username . '.sig';
    if(file_exists($filename) && !is_writable($filename))
        return new Exception($html_sig_file_error);
    $file = fopen($filename, 'w');
    if(!$file)
        return new Exception($html_sig_file_error);
    fwrite($file, $string);
    fclose($file);
}

/** [Remove in NOCC-1.0] Gets the signature **/
function getSig()
{
    global $conf;
    $username = $_SESSION['user'].'@'.$_SESSION['domain'];
    $filename = $conf->prefs_dir . $username . '.sig';
    $sig = '';
    if (file_exists($filename))
    {
        $file = fopen($filename, 'r');
        if(!$file)
        {
            error_log("Could not open $filename for reading.");
            return ('');
        }
        while (!feof($file))
            $sig .= fgets($file, 1024);
        fclose($file);
    }
    return ($sig);
}

/** [Remove in NOCC-1.0] Deletes the signature **/
function deleteSig()
{
    global $conf;
    $username = $_SESSION['user'].'@'.$_SESSION['domain'];
    $filename = $conf->prefs_dir . $username . '.sig';
    if (file_exists($filename))
        unlink($filename);
}

/** Format Reply Leadin **/
function parseLeadin ($string, $content)
{
        $col_time = strtotime($content['complete_date']);
        $converted_date = date("D, j M Y", $col_time);
        $string = str_replace('_DATE_', $converted_date, $string);
        $string = str_replace("_FROM_", $content['from'], $string);
        $string = str_replace("_TO_", $content['to'], $string);
        $string = str_replace("_SUBJECT_", $content['subject'], $string);
        return ($string."\n");
}
?>
