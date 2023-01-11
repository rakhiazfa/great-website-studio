<?php

namespace GreatWebsiteStudio\Response;

use Latte\Engine as LatteEngine;

/**
 * 
 * Great Website Studio
 * 
 * @author Rakhi Azfa Rifansya
 * 
 */

class View extends LatteEngine
{
    /**
     * @var string
     */
    private string $viewDirectory;

    /**
     * Create a new View instance.
     * 
     */
    public function __construct()
    {

        parent::__construct();

        /**
         * Set temp directory.
         * 
         */

        $this->setTempDirectory(GWS_ROOT_DIRECTORY . '/cache');

        /**
         * Disable auto refresh if in production mode.
         * 
         */

        if (env('APP_ENV') == 'production') {

            $this->setAutoRefresh(false);
        }
    }

    /**
     * Set view directory.
     * 
     * @param string $viewDirectory
     * 
     * @return void
     */
    public function setViewDirectory(string $viewDirectory)
    {

        $this->viewDirectory = $viewDirectory;
    }

    /**
     *  Renders template to output.
     * 
     * @param string $name
     * @param object|array $params
     * @param string|null|null $block
     * 
     * @return void
     */
    public function render(string $name, object|array $params = [], string|null $block = null): void
    {

        if ($this->viewDirectory) {

            $name = $this->viewDirectory . '/' . $name;
        }

        if (!file_exists($name)) {

            die("<b style=\"color: red\">Target view $name does not exist.</b>");
        }

        parent::render($name, $params, $block);
    }
}
