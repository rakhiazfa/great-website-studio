<?php

namespace GreatWebsiteStudio\Master;

use GreatWebsiteStudio\Database\Database;
use GreatWebsiteStudio\Request\Request;
use GreatWebsiteStudio\Response\Response;
use GreatWebsiteStudio\Routing\Router;
use GreatWebsiteStudio\Routing\Route;

/**
 * 
 * Great Website Studio
 * 
 * @author Rakhi Azfa Rifansya
 * 
 */

class Application
{
    /**
     * @var Request
     */
    public Request $request;

    /**
     * @var Response
     */
    public Response $response;

    /**
     * @var Router
     */
    public Router $router;

    /**
     * @var Database
     */
    public Database $database;

    /**
     * Create a new Application instance.
     * 
     * @param string $ROOT_DIRECTORY
     */
    public function __construct(string $ROOT_DIRECTORY)
    {
        /**
         * Load helper fuctions.
         * 
         */

        require_once __DIR__ . '/../_helpers.php';

        /**
         * Create root directory constant.
         * 
         */

        define('GWS_ROOT_DIRECTORY', $ROOT_DIRECTORY);


        /**
         * Register application services.
         * 
         */

        $this->request = new Request();

        $this->response = new Response();

        $this->router = new Router($this->request, $this->response);

        $this->database = new Database();

        /**
         * Set router.
         * 
         */

        Route::setRouter($this->router);
    }

    /**
     * Start the application.
     * 
     * @return void
     */
    public function start()
    {
        /**
         * Resolve route.
         * 
         */

        $this->router->resolve();
    }
}