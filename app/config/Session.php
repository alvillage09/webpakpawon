<?php

namespace app\config;

class Session {

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function setValue($key, $value)
    {
         $_SESSION[$key] = $value;
    }

    public function unsetValue($key)
    {
        unset($_SESSION[$key]);
    }

    public function getValue($key)
    {
         return $_SESSION[$key];
    }
}