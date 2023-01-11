<?php

/**
 * 
 * Great Website Studio
 * 
 * @author Rakhi Azfa Rifansya
 * 
 */

if (!function_exists('env')) {

    /**
     * Get env configuration.
     * 
     * @param string $key
     * @param mixed $default
     * 
     * @return mixed
     */
    function env(string $key, mixed $default = null)
    {

        return $_ENV[$key] ?? $default;
    }
}
