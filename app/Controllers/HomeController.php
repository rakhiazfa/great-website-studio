<?php

namespace Application\Controllers;

use Application\Models\Message;
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
        $messages = (new Message)->all();

        return $response->view('home', ['title' => 'Home', 'messages' => $messages]);
    }

    /**
     * @param Request $request
     * @param Response $response
     * 
     * @return Response
     */
    public function sendMessage(Request $request, Response $response)
    {
        (new Message())->create([
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'message' => $_POST['message'],
        ]);

        return $response->redirect();
    }
}
