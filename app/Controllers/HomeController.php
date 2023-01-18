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
        echo '<pre>';
        var_dump($_SESSION);
        echo '</pre>';

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

        $this->session->flash('success', 'Message has ben sended.');

        return $response->redirect();
    }
}
