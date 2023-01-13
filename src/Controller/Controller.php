<?php

namespace GreatWebsiteStudio\Controller;

use GreatWebsiteStudio\Database\Database;
use GreatWebsiteStudio\Master\Application;
use GreatWebsiteStudio\Request\Request;
use GreatWebsiteStudio\Response\Response;
use GreatWebsiteStudio\Session\Session;

/**
 * 
 * Great Website Studio
 * 
 * @author Rakhi Azfa Rifansya
 * 
 */

class Controller
{
    /**
     * @var Request
     */
    protected Request $request;

    /**
     * @var Response
     */
    protected Response $response;

    /**
     * @var Database
     */
    protected Database $database;

    /**
     * @var Session
     */
    protected Session $session;

    /**
     * Create a new Controller instance.
     * 
     */
    public function __construct()
    {
        $this->request = Application::request();

        $this->response = Application::response();

        $this->database = Application::database();

        $this->session = Application::session();
    }
}
