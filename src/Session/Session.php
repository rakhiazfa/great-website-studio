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
     * Get session value.
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
     * Set session value.
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
