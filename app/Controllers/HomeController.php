<?php

namespace Application\Controllers;

use GreatWebsiteStudio\Controller\Controller;
use GreatWebsiteStudio\Request\Request;
use GreatWebsiteStudio\Response\Response;

class HomeController extends Controller
{
    /**
     * @param Request $request
     * @param Response $response
     * 
     * @return Response
     */
    public function index(Request $request, Response $response)
    {

        return $response->view('home', ['title' => 'Home']);
    }
}
