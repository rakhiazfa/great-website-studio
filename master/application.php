<?php

/**
 * 
 * Great Website Studio
 * 
 * @author Rakhi Azfa Rifansya
 * 
 */


require_once dirname(__DIR__) . '/vendor/autoload.php';


/**
 * Load configurations.
 * 
 */

$dotenv = Dotenv\Dotenv::createUnsafeImmutable(dirname(__DIR__));

$dotenv->safeLoad();

/**
 * Load helper fuctions.
 * 
 */

require_once dirname(__DIR__) . '/src/_helpers.php';

/**
 * Create application instance.
 * 
 */

$application = new GreatWebsiteStudio\Master\Application(dirname(__DIR__));
