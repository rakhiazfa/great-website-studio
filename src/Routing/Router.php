<?php

namespace GreatWebsiteStudio\Routing;

use GreatWebsiteStudio\Request\Request;
use GreatWebsiteStudio\Response\Response;

/**
 * 
 * Great Website Studio
 * 
 * @author Rakhi Azfa Rifansya
 * 
 */

class Router
{
    /**
     * @var Request
     */
    private Request $request;

    /**
     * @var Response
     */
    private Response $response;

    /**
     * @var array
     */
    private array $routes = [];

    /**
     * Create a new Router instance.
     * 
     * @param Request $request
     * @param Response $response
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;

        $this->response = $response;
    }

    /**
     * Resolve route.
     * 
     * @return mixed
     */
    public function resolve()
    {
        $callback = $this->routes[$this->request->method()][$this->request->url()] ?? null;

        if (!$callback) {

            $this->response->code(404);

            return $this->response->view('errors/404');
        }

        if (is_array($callback)) {

            echo call_user_func_array([new $callback[0], $callback[1]], [$this->request, $this->response]);

            return 0;
        }

        echo call_user_func($callback, $this->request, $this->response);

        return 0;
    }

    /**
     * Register a new route.
     * 
     * @param string $method
     * @param string $path
     * @param callable $callback
     * 
     * @return void
     */
    public function register(string $method, string $path, callable|array $callback)
    {

        $this->routes[strtoupper($method)][$path] = $callback;
    }
}
