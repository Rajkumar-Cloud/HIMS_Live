<?php

namespace PHPMaker2021\HIMS;

/**
 * User Profile Class
 */
class UserProfile
{
    public $Profile = [];
    public $Provider = "";
    public $Auth = "";

    // Constructor
    public function __construct()
    {
        $this->load();
    }

    // Has value
    public function has($name)
    {
        return array_key_exists($name, $this->Profile);
    }

    // Get value
    public function getValue($name)
    {
        if ($this->has($name)) {
            return $this->Profile[$name];
        }
        return null;
    }

    // Get all values
    public function getValues()
    {
        return $this->Profile;
    }

    // Get value (alias)
    public function get($name)
    {
        return $this->getValue($name);
    }

    // Set value
    public function setValue($name, $value)
    {
        $this->Profile[$name] = $value;
    }

    // Set value (alias)
    public function set($name, $value)
    {
        $this->setValue($name, $value);
    }

    // Set property // PHP
    public function __set($name, $value)
    {
        $this->setValue($name, $value);
    }

    // Get property // PHP
    public function __get($name)
    {
        return $this->getValue($name);
    }

    // Delete property
    public function delete($name)
    {
        if (array_key_exists($name, $this->Profile)) {
            unset($this->Profile[$name]);
        }
    }

    // Assign properties
    public function assign($input)
    {
        if (is_object($input)) {
            $this->assign(get_object_vars($input));
        } elseif (is_array($input)) {
            foreach ($input as $key => $value) { // Remove integer keys
                if (is_int($key)) {
                    unset($input[$key]);
                }
            }
            $input = array_filter($input, function ($val) {
                if (is_bool($val) || is_float($val) || is_int($val) || $val === null || is_string($val) && strlen($val) <= Config("DATA_STRING_MAX_LENGTH")) {
                    return true;
                }
                return false;
            });
            $this->Profile = array_merge($this->Profile, $input);
        }
    }

    // Check if System Admin
    protected function isSystemAdmin($usr)
    {
        global $Language;
        $adminUserName = Config("ENCRYPTION_ENABLED") ? PhpDecrypt(Config("ADMIN_USER_NAME"), Config("ENCRYPTION_KEY")) : Config("ADMIN_USER_NAME");
        return $usr == "" || $usr == $adminUserName || $usr == $Language->phrase("UserAdministrator");
    }

    // Get language id
    public function getLanguageId($usr)
    {
        $p = $this->Profile; // Backup current profile
        if ($this->loadProfileFromDatabase($usr)) {
            try {
                $langid = @$this->Profile[Config("USER_PROFILE_LANGUAGE_ID")];
                $this->Profile = $p; // Restore current profile
                return $langid;
            } catch (\Throwable $e) {
                if (Config("DEBUG")) {
                    throw $e;
                }
                $this->Profile = $p; // Restore current profile
                return "";
            }
        }
        return "";
    }

    // Set language id
    public function setLanguageId($usr, $langid)
    {
        $p = $this->Profile; // Backup current profile
        if ($this->loadProfileFromDatabase($usr)) {
            try {
                $this->Profile[Config("USER_PROFILE_LANGUAGE_ID")] = $langid;
                $this->saveProfileToDatabase($usr);
                $this->Profile = $p; // Restore current profile
                return true;
            } catch (\Throwable $e) {
                if (Config("DEBUG")) {
                    throw $e;
                }
                $this->Profile = $p; // Restore current profile
                return false;
            }
        }
        return false;
    }

    // Get search filters
    public function getSearchFilters($usr, $pageid)
    {
        $p = $this->Profile; // Backup current profile
        if ($this->loadProfileFromDatabase($usr)) {
            try {
                $allfilters = @unserialize($this->Profile[Config("USER_PROFILE_SEARCH_FILTERS")]);
                $this->Profile = $p; // Restore current profile
                return @$allfilters[$pageid];
            } catch (\Throwable $e) {
                if (Config("DEBUG")) {
                    throw $e;
                }
                $this->Profile = $p; // Restore current profile
                return "";
            }
        }
        return "";
    }

    // Set search filters
    public function setSearchFilters($usr, $pageid, $filters)
    {
        $p = $this->Profile; // Backup current profile
        if ($this->loadProfileFromDatabase($usr)) {
            try {
                $allfilters = @unserialize($this->Profile[Config("USER_PROFILE_SEARCH_FILTERS")]);
                if (!is_array($allfilters)) {
                    $allfilters = [];
                }
                $allfilters[$pageid] = $filters;
                $this->Profile[Config("USER_PROFILE_SEARCH_FILTERS")] = serialize($allfilters);
                $this->saveProfileToDatabase($usr);
                $this->Profile = $p; // Restore current profile
                return true;
            } catch (\Throwable $e) {
                if (Config("DEBUG")) {
                    throw $e;
                }
                $this->Profile = $p; // Restore current profile
                return false;
            }
        }
        return false;
    }

    // Load profile from database
    public function loadProfileFromDatabase($usr)
    {
        global $UserTable;
        if ($this->isSystemAdmin($usr)) { // Ignore system admin
            return false;
        }
        $filter = GetUserFilter(Config("LOGIN_USERNAME_FIELD_NAME"), $usr);
        // Get SQL from getSql() method in <UserTable> class
        $sql = $UserTable->getSql($filter);
        if ($row = Conn($UserTable->Dbid)->fetchAssoc($sql)) {
            $this->loadProfile(HtmlDecode($row[Config("USER_PROFILE_FIELD_NAME")]));
            return true;
        }
        return false;
    }

    // Save profile to database
    public function saveProfileToDatabase($usr)
    {
        global $UserTable;
        if ($this->isSystemAdmin($usr)) { // Ignore system admin
            return false;
        }
        $filter = GetUserFilter(Config("LOGIN_USERNAME_FIELD_NAME"), $usr);
        $rs = [Config("USER_PROFILE_FIELD_NAME") => $this->profileToString()];
        $UserTable->update($rs, $filter);
    }

    // Load profile from session
    public function load()
    {
        if (isset($_SESSION[SESSION_USER_PROFILE])) {
            $this->loadProfile($_SESSION[SESSION_USER_PROFILE]);
        }
    }

    // Save profile to session
    public function save()
    {
        $_SESSION[SESSION_USER_PROFILE] = $this->profileToString();
    }

    // Load profile from string
    protected function loadProfile($profile)
    {
        $ar = unserialize(strval($profile));
        if (is_array($ar)) {
            $this->Profile = array_merge($this->Profile, $ar);
        }
    }

    // Write (var_dump) profile
    public function writeProfile()
    {
        var_dump($this->Profile);
    }

    // Clear profile
    protected function clearProfile()
    {
        $this->Profile = [];
    }

    // Clear profile (alias)
    public function clear()
    {
        $this->clearProfile();
    }

    // Profile to string
    protected function profileToString()
    {
        return serialize($this->Profile);
    }
}
