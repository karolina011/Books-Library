<?php


class Session
{
    public static function get($key)
    {
        if (!isset($_SESSION[$key])) {
            return null;
        }
        return $_SESSION[$key];
    }

    public static function set($key, $value, $force = false)
    {
        if (!$force && isset($_SESSION[$key])) {
            throw new Exception("Key {$key} already exist in session");
        }
        $_SESSION[$key] = $value;
    }

    public static function isUserLogged()
    {
        return !empty(self::get('user'));
    }

    public static function clear($key)
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }

    }

    public static function clearSession()
    {
        session_unset();
    }
}
