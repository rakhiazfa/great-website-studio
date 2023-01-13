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

        return getenv($key) ?? $default;
    }

    /**
     * Get asset url.
     * 
     * @param string $asset
     * 
     * @return string
     */
    function asset(string $asset)
    {
        if ($asset[0] === '/') {

            $asset = substr($asset, 1, strlen($asset));
        }

        return env('APP_URL') . '/' . $asset;
    }

    /**
     * Return field to override request method.
     * 
     * @param string $method
     * 
     * @return void
     */
    function method(string $method)
    {

        echo "<input type='hidden' name='_method' value='$method'>";
    }
}
