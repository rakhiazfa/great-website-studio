<?php

namespace GreatWebsiteStudio\Master;

use GreatWebsiteStudio\Controller\Controller;
use GreatWebsiteStudio\Database\Database;
use GreatWebsiteStudio\Request\Request;
use GreatWebsiteStudio\Response\Response;
use GreatWebsiteStudio\Routing\Router;
use GreatWebsiteStudio\Routing\Route;
use GreatWebsiteStudio\Session\Session;

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
    private Request $request;

    /**
     * @var Response
     */
    private Response $response;

    /**
     * @var Router
     */
    private Router $router;

    /**
     * @var Database
     */
    private Database $database;

    /**
     * @var Session
     */
    private Session $session;

    /**
     * @var Application
     */
    private static Application $application;

    /**
     * Create a new Application instance.
     * 
     * @param string $ROOT_DIRECTORY
     */
    public function __construct(string $ROOT_DIRECTORY)
    {
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

        $this->session = new Session();

        /**
         * Set router.
         * 
         */

        Route::setRouter($this->router);

        self::$application = $this;
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

    /**
     * Get request service.
     * 
     * @return Request
     */
    public static function request()
    {

        return self::$application->request;
    }

    /**
     * Get response service.
     * 
     * @return Response
     */
    public static function response()
    {

        return self::$application->response;
    }

    /**
     * Get database service.
     * 
     * @return Database
     */
    public static function database()
    {

        return self::$application->database;
    }

    /**
     * Get session service.
     * 
     * @return Session
     */
    public static function session()
    {

        return self::$application->session;
    }
}
