<?php

/**
 * Application routes.
 * 
 */

use Application\Controllers\HomeController;
use GreatWebsiteStudio\Routing\Route;

/**
 * Register your route below.
 * 
 */

Route::get('/', [HomeController::class, 'index']);
