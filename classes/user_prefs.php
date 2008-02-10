<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/classes/user_prefs.php,v 1.1 2008/02/10 20:52:25 goddess_skuld Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 */

require_once './classes/exception.php';

class NOCCUserPrefs {
    var $key;
    var $full_name;
    var $email_address;
    var $msg_per_page;
    var $cc_self;
    var $hide_addresses;
    var $outlook_quoting;
    var $colored_quotes;
    var $display_struct;
    var $seperate_msg_win;
    var $reply_leadin;
    var $signature;
        var $wrap_msg;
        var $sig_sep;
        var $html_mail_send;
    var $graphical_smilies;
        var $sent_folder;
        var $sent_folder_name;
        var $trash_folder;
        var $trash_folder_name;
        var $lang;
        var $theme;

    // Set when preferences have not been commit
    var $dirty_flag;

    /*
     * Default user profile
     */
    function NOCCUserPrefs($key) {
        $this->key = $key;
        $this->dirty_flag = 1;
    }

    /*
     * Return the current preferences for the given key. Key is
     * 'login@domain'. If it cannot be found for any reason, it
     * returns a default profile. If it can be found, but not
     * read, it returns an exception.
     */
    function read($key, &$ev) {
        global $conf;

        $prefs = new NOCCUserPrefs($key);

        if (empty($conf->prefs_dir)) {
            //$ev = new NoccException("User preferences are disabled");
            $prefs->dirty_flag = 0;
            return $prefs;
        }

        /* Open the preferences file */
        $filename = $conf->prefs_dir . '/' . $key . '.pref';
        if (!file_exists($filename)) {
            error_log("$filename does not exist");
            return $prefs;
        }
        $file = fopen($filename, 'r');
        if(!$file) {
            $ev = new NoccException("Could not open $filename for reading user preferences");
            return;
        }

        /* Read in all the preferences */
        $highlight_num = 0;
        while(!feof($file))
        {
            $line = trim(fgets($file, 1024));
            $equalsAt = strpos($line, '=');
            if($equalsAt <= 0) continue;

            $key = substr($line, 0, $equalsAt);
            $value = substr($line, $equalsAt + 1);

            if($key == 'full_name')
                $prefs->full_name = $value;
            if($key == 'email_address')
                $prefs->email_address = $value;
            if($key == 'msg_per_page')
                $prefs->msg_per_page = $value * 1;
            if($key == 'cc_self')
                $prefs->cc_self = ($value == 1 || $value == 'on');
            if($key == 'hide_addresses')
                $prefs->hide_addresses = ($value == 1 || $value == 'on');
            if($key == 'outlook_quoting')
                $prefs->outlook_quoting = ($value == 1 || $value == 'on');
            if($key == 'colored_quotes')
                $prefs->colored_quotes = ($value == 1 || $value == 'on');
            if($key == 'display_struct')
                $prefs->display_struct = ($value == 1 || $value == 'on');
            if($key == 'seperate_msg_win')
                $prefs->seperate_msg_win = ($value == 1 || $value == 'on');
            if($key == 'signature')
                $prefs->signature = base64_decode($value);
            if($key == 'reply_leadin')
                $prefs->reply_leadin = base64_decode($value);
                        if($key == 'wrap_msg')
                                $prefs->wrap_msg = $value;
            if($key == 'sig_sep')
                $prefs->sig_sep = ($value == 1 || $value == 'on');
            if($key == 'html_mail_send')
                $prefs->html_mail_send = ($value == 1 || $valeur == 'on');
            if($key == 'graphical_smilies')
                $prefs->graphical_smilies = ($value == 1 || $value == 'on');
                        if($key == 'sent_folder')
                                $prefs->sent_folder = ($value == 1 || $value == 'on');
                        if($key == 'sent_folder_name')
                                $prefs->sent_folder_name = $value;
                        if($key == 'trash_folder')
                                $prefs->trash_folder = ($value == 1 || $value == 'on');
                        if($key == 'trash_folder_name')
                                $prefs->trash_folder_name = $value;

                        if($key == 'lang')
                                $prefs->lang = $value;

                        if($key == 'theme')
                                $prefs->theme = $value;

        }
        fclose($file);

        $prefs->dirty_flag = 0;
        return $prefs;
    }

    /*
     * If need be, write settings to file.
     */
    function commit(&$ev) {
        global $conf;
        global $html_prefs_file_error;

        // Check it passes validation
        $this->validate($ev);
        if(NoccException::isException($ev)) return;
        
        // Do we need to write?
        if(!$this->dirty_flag) return;

        // Write prefs to file
        $filename = $conf->prefs_dir . '/' . $this->key . '.pref';
        if(file_exists($filename) && !is_writable($filename)){
                $ev = new NoccException($html_prefs_file_error);
            return; 
        }
        if(!is_writable($conf->prefs_dir)) {
                $ev = new NoccException($html_prefs_file_error);
            return;
        }
        $file = fopen($filename, 'w');
        if(!$file){
            $ev = new NoccException($html_prefs_file_error);
            return;
        }

        fwrite($file, "full_name=".$this->full_name."\n");
        fwrite($file, "email_address=".$this->email_address."\n");
        fwrite($file, "msg_per_page=".$this->msg_per_page."\n");
        fwrite($file, "cc_self=".$this->cc_self."\n");
        fwrite($file, "hide_addresses=".$this->hide_addresses."\n");
        fwrite($file, "outlook_quoting=".$this->outlook_quoting."\n");
        fwrite($file, "colored_quotes=".$this->colored_quotes."\n");
        fwrite($file, "display_struct=".$this->display_struct."\n");
        fwrite($file, "seperate_msg_win=".$this->seperate_msg_win."\n");
        fwrite($file, "reply_leadin=".base64_encode($this->reply_leadin)."\n");
        fwrite($file, "signature=".base64_encode($this->signature)."\n");
        fwrite($file, "wrap_msg=".$this->wrap_msg."\n");
        fwrite($file, "sig_sep=".$this->sig_sep."\n");
                fwrite($file, "html_mail_send=".$this->html_mail_send."\n");
        fwrite($file, "graphical_smilies=".$this->graphical_smilies."\n");
                fwrite($file, "sent_folder=".$this->sent_folder."\n");
                fwrite($file, "sent_folder_name=".str_replace($_SESSION['imap_namespace'], "", $this->sent_folder_name)."\n");
                fwrite($file, "trash_folder=".$this->trash_folder."\n");
                fwrite($file, "trash_folder_name=".str_replace($_SESSION['imap_namespace'], "", $this->trash_folder_name)."\n");
                fwrite($file, "lang=".$this->lang."\n");
                fwrite($file, "theme=".$this->theme."\n");
        fclose($file);

        $this->dirty_flag = 0;
    }

    /*
     * Validate preferences.
     */
    function validate(&$ev) {
        global $conf;
        global $html_invalid_email_address;
        global $html_invalid_msg_per_page;
        global $html_invalid_wrap_msg;

        if($conf->allow_address_change) {
            if(!valid_email($this->email_address)) {
                $ev = new NoccException($html_invalid_email_address);
                return;
            }
        }
        else {
            $this->email_address = '';
        }

        if( isset($this->msg_per_page) && !is_numeric($this->msg_per_page) ) {
            $ev = new NoccException($html_invalid_msg_per_page);
            return;
        }

        if( isset($this->wrap_msg) && !ereg("^(0|72|80)$",$this->wrap_msg) ) {
          $ev = new NoccException($html_invalid_wrap_msg);
          return;
        }

        // Give go-ahead to commit
        $this->dirty_flag = 1;
    }

    /*
     * Format Reply Leadin
     */
    function parseLeadin ($string, $content)
    {
        $string = str_replace('_DATE_', $content['date'], $string);
        $string = str_replace('_TIME_', $content['time'], $string);
        $string = str_replace('_FROM_', $content['from'], $string);
        $string = str_replace('_TO_', $content['to'], $string);
        $string = str_replace('_SUBJECT_', $content['subject'], $string);
        return ($string."\n");
    }
}

?>
