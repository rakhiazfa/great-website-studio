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
    protected array $allowedMethods = ["GET", "POST", "PUT", "PATCH", "DELETE"];

    /**
     * Create a new Request instance.
     * 
     */
    public function __construct()
    {
        $_method = $_REQUEST["_method"] ?? null;

        if ($_method) {

            if (!in_array(strtoupper($_method), $this->allowedMethods)) {

                die("The $_method method is not registered.");
            }

            $_SERVER['REQUEST_METHOD'] = strtoupper($_method);
        }
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
