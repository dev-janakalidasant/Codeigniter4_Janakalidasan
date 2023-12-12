<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'FormController::index');
$routes->post('/submit-form', 'FormController::submitForm');
$routes->post('/update/(:num)', 'FormController::update/$1');
$routes->get('/delete/(:num)', 'FormController::delete/$1');
$routes->get('/details', 'UserDetailsController::details');
// $routes->post('/upload', 'UserDetailsController::submitForm');