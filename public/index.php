<?php

/**
 * 
 * Great Website Studio
 * 
 * @author Rakhi Azfa Rifansya
 * 
 */


require_once dirname(__DIR__) . '/master/application.php';


/**
 * Load application routes.
 * 
 */

require_once dirname(__DIR__) . '/app/routes/app.php';

/**
 * Check debug mode.
 * 
 */

if (!filter_var(env('APP_DEBUG'), FILTER_VALIDATE_BOOL)) {

    error_reporting(1);
}

/**
 * Start the application.
 * 
 */

$application->start();
