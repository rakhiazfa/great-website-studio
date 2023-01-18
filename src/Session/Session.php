<?php

namespace GreatWebsiteStudio\Session;

/**
 * 
 * Great Website Studio
 * 
 * @author Rakhi Azfa Rifansya
 * 
 */

class Session
{
    /**
     * @var string
     */
    private const FLASH_KEY = 'flash_message';

    /**
     * Create a new Session instance.
     * 
     */
    public function __construct()
    {
        session_start();

        /**
         * Initialize flash message.
         * 
         */

        $session = $_SESSION;

        if (count($session[self::FLASH_KEY]) <= 0) {

            $session[self::FLASH_KEY] = [];
        }

        $_SESSION = $session;
    }

    /**
     * Get session.
     * 
     * @param string $key
     * 
     * @return mixed
     */
    public function get(string $key)
    {

        return $_SESSION[$key] ?? null;
    }

    /**
     * Set session.
     * 
     * @param string $key
     * @param mixed $value
     * 
     * @return void
     */
    public function set(string $key, mixed $value)
    {

        $_SESSION[$key] = $value;
    }

    /**
     * Remove session.
     * 
     * @param string $key
     * 
     * @return void
     */
    public function remove(string $key)
    {

        unset($_SESSION[$key]);
    }

    /**
     * Set flash message.
     * 
     * @param string $key
     * @param mixed $value
     * 
     * @return mixed
     */
    public function flash(string $key, mixed $value = null)
    {
        if (!$value) {

            $_SESSION[self::FLASH_KEY][$key]['called'] = true;

            return  $_SESSION[self::FLASH_KEY][$key]['value'] ?? null;
        }

        $_SESSION[self::FLASH_KEY][$key]['value'] = $value;
        $_SESSION[self::FLASH_KEY][$key]['called'] = false;
    }

    /**
     * Check flash message.
     * 
     * @param string $key
     * @param mixed $value
     * 
     * @return mixed
     */
    public function hasFlash(string $key)
    {

        return $_SESSION[self::FLASH_KEY][$key]['value'] ?? false;
    }

    /**
     * @return void
     */
    public function __destruct()
    {
        /**
         * Destruct flash message.
         * 
         */

        $session = $_SESSION;

        foreach ($session[self::FLASH_KEY] as $key => $value) {
            if ($value['called']) {
                unset($session[self::FLASH_KEY][$key]);
            }
        }

        $_SESSION = $session;
    }
}
