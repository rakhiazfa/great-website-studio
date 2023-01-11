<?php

namespace GreatWebsiteStudio\Routing;

/**
 * 
 * Great Website Studio
 * 
 * @author Rakhi Azfa Rifansya
 * 
 */

class Route
{
    /**
     * @var Router
     */
    private static Router $router;

    /**
     * Set router.
     * 
     * @param Router $router
     */
    public static function setRouter(Router $router)
    {
        self::$router = $router;
    }

    /**
     * Register a new GET route.
     * 
     * @param string $path
     * @param callable $callback
     * 
     * @return void
     */
    public static function get(string $path, callable|array $callback)
    {

        self::$router->register("GET", $path, $callback);
    }

    /**
     * Register a new POST route.
     * 
     * @param string $path
     * @param callable $callback
     * 
     * @return void
     */
    public static function post(string $path, callable|array $callback)
    {

        self::$router->register("POST", $path, $callback);
    }

    /**
     * Register a new PUT route.
     * 
     * @param string $path
     * @param callable $callback
     * 
     * @return void
     */
    public static function put(string $path, callable|array $callback)
    {

        self::$router->register("PUT", $path, $callback);
    }

    /**
     * Register a new DELETE route.
     * 
     * @param string $path
     * @param callable $callback
     * 
     * @return void
     */
    public static function delete(string $path, callable|array $callback)
    {

        self::$router->register("DELETE", $path, $callback);
    }
}
