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

        $session[self::FLASH_KEY] = [];

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

            return  $_SESSION[self::FLASH_KEY][$key] ?? null;
        }

        $_SESSION[self::FLASH_KEY][$key] = $value;
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

        unset($session[self::FLASH_KEY]);

        $_SESSION = $session;
    }
}
