<?php
/**
 * Class for wrapping a $conf->domains entry
 *
 * Copyright 2011 Tim Gerundt <tim@gerundt.de>
 *
 * This file is part of NOCC. NOCC is free software under the terms of the
 * GNU General Public License. You should have received a copy of the license
 * along with NOCC.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package    NOCC
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @version    SVN: $Id$
 */

/**
 * Wrapping a $conf->domains entry
 *
 * @package    NOCC
 */
class NOCC_Domain {
    
    /**
     * $conf->domains entry
     * @var stdClass
     */
    private $entry;
    
    /**
     * Initialize the wrapper
     * @param stdClass $entry $conf->domains entry
     */
    public function __construct($entry) {
        if ($entry instanceof stdClass) {
            $this->entry = $entry;
        }
        else {
            $this->entry = new stdClass();
        }
    }

    /**
     * ...
     * @return bool Has allowed logins?
     */
    public function hasAllowedLogins() {
        if (isset($this->entry->login_allowed) && !empty($this->entry->login_allowed)) {
            return true;
        }
        return false;
    }
    
    /**
     * ...
     * @return bool Has allowed logins array?
     */
    public function hasAllowedLoginsArray() {
        if ($this->hasAllowedLogins() && is_array($this->entry->login_allowed)) {
            return true;
        }
        return false;
    }
    
    /**
     * ...
     * @return bool Has allowed logins file?
     */
    public function hasAllowedLoginsFile() {
        if ($this->hasAllowedLogins() && is_string($this->entry->login_allowed)) {
            return file_exists(substr($this->entry->login_allowed, 1));
        }
        return false;
    }
    
    /**
     * ...
     * @return bool Has login aliases?
     */
    public function hasLoginAliases() {
        if (isset($this->entry->login_aliases) && !empty($this->entry->login_aliases)) {
            return true;
        }
        return false;
    }

    /**
     * ...
     * @return bool Has login aliases array?
     */
    public function hasLoginAliasesArray() {
        if ($this->hasLoginAliases() && is_array($this->entry->login_aliases)) {
            return true;
        }
        return false;
    }
    
    /**
     * ...
     * @param string $login Alias login
     * @return string Real login
     */
    public function replaceLoginFromAliasesArray($login) {
        if ($this->hasLoginAliasesArray()) {
            $aliasLogins = array_keys($this->entry->login_aliases);
            $realLogins = array_values($this->entry->login_aliases);
            
            return str_replace($aliasLogins, $realLogins, $login);
        }
        return $login;
    }

    /**
     * ...
     * @return bool Has login aliases file?
     */
    public function hasLoginAliasesFile() {
        if ($this->hasLoginAliases() && is_string($this->entry->login_aliases)) {
            return file_exists(substr($this->entry->login_aliases, 1));
        }
        return false;
    }
    
    /**
     * ...
     * @param string $login Alias login
     * @return string Real login
     */
    public function replaceLoginFromAliasesFile($login) {
        if ($this->hasLoginAliasesFile()) {
            include substr($this->entry->login_aliases, 1);

            if (isset($login_alias) && is_array($login_alias)) {
                $aliasLogins = array_keys($login_alias);
                $realLogins = array_values($login_alias);

                return str_replace($aliasLogins, $realLogins, $login);
            }
        }
        return $login;
    }

    /**
     * ...
     * @return bool Login with domain?
     */
    public function useLoginWithDomain() {
        if (isset($this->entry->login_with_domain) && $this->entry->login_with_domain == true) {
            return true;
        }
        return false;
    }
    
    /**
     * ...
     * @return bool Has login with domain character?
     */
    public function hasLoginWithDomainCharacter() {
        if (isset($this->entry->login_with_domain_character) && !empty($this->entry->login_with_domain_character)) {
            return true;
        }
        return false;
    }
    
    /**
     * ...
     * @return string Login with domain character
     */
    public function getLoginWithDomainCharacter() {
        if ($this->hasLoginWithDomainCharacter() && is_string($this->entry->login_with_domain_character)) {
            return $this->entry->login_with_domain_character;
        }
        return '@';
    }
    
    /**
     * ...
     * @return bool Has login prefix?
     */
    public function hasLoginPrefix() {
        if (isset($this->entry->login_prefix) && !empty($this->entry->login_prefix)) {
            return true;
        }
        return false;
    }
    
    /**
     * ...
     * @return string Login prefix
     */
    public function getLoginPrefix() {
        if ($this->hasLogonPrefix() && is_string($this->entry->login_prefix)) {
            return $this->entry->login_prefix;
        }
        return '';
    }
    
    /**
     * ...
     * @return bool Has login suffix?
     */
    public function hasLogonSuffix() {
        if (isset($this->entry->login_suffix) && !empty($this->entry->login_suffix)) {
            return true;
        }
        return false;
    }
    
    /**
     * ...
     * @return string Login suffix
     */
    public function getLoginSuffix() {
        if ($this->hasLogonSuffix() && is_string($this->entry->login_suffix)) {
            return $this->entry->login_suffix;
        }
        return '';
    }
    
    /*
    domain = 'sourceforge.net';
    in = 'mail.sourceforge.net:110/pop3';
    smtp = '';
    smtp_port = 25;
    login_with_domain = false;
    login_with_domain_character = '@';
    login_prefix = '';
    login_suffix = '';
    login_aliases = array();
    login_allowed = array();
    smtp_auth_method = '';
    imap_namespace = 'INBOX.';
    have_ucb_pop_server = false;
    quota_enable = false;
    quota_type = 'STORAGE';
    */
}
?>
