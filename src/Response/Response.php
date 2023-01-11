<?php

namespace GreatWebsiteStudio\Response;

/**
 * 
 * Great Website Studio
 * 
 * @author Rakhi Azfa Rifansya
 * 
 */

class Response
{
    /**
     * @var View
     */
    private View $latte;

    /**
     * Create a new Response instance.
     * 
     */
    public function __construct()
    {
        $this->latte = new View();

        /**
         * Set latte view directory.
         * 
         */

        $this->latte->setViewDirectory(GWS_ROOT_DIRECTORY . '/app/views');
    }

    /**
     * Set http code.
     * 
     * @param int $code
     * 
     * @return void
     */
    public function code(int $code = 200)
    {

        http_response_code($code);
    }

    /**
     * Displaying the view.
     * 
     * @param string $view
     * @param array $data
     * 
     * @return mixed
     */
    public function view(string $view, array $data = [])
    {

        $this->latte->render($view . '.latte', $data);
    }
}
