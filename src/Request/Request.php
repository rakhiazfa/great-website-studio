<?php

namespace GreatWebsiteStudio\Request;

/**
 * 
 * Great Website Studio
 * 
 * @author Rakhi Azfa Rifansya
 * 
 */

class Request
{
    /**
     * Create a new Request instance.
     * 
     */
    public function __construct()
    {
        // 
    }

    /**
     * Get request url.
     * 
     * @return string
     */
    public function url()
    {
        $url = $_SERVER['REQUEST_URI'] ?? '/';

        $position = strpos($url, '?') ?? false;

        if ($position) {

            $url = substr($url, 0, $position);
        }

        return $url;
    }

    /**
     * Get request method.
     * 
     * @return string
     */
    public function method()
    {

        return $_SERVER['REQUEST_METHOD'];
    }
}
