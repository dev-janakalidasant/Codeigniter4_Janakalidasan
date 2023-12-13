<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// $routes->get('/', 'FormController::index');
$routes->get('/', 'RegistrationCOntroller::index');
$routes->post('/submit', 'RegistrationController::submitForm');
$routes->get('/loginpage', 'LoginController::loginForm');
$routes->post('/login/loginsuccess', 'LoginController::loginsuccess');
$routes->get('/successmsg', 'LoginController::successmsg');
//old
$routes->post('/submit-form', 'FormController::submitForm');
$routes->post('/update/(:num)', 'FormController::update/$1');
$routes->get('/delete/(:num)', 'FormController::delete/$1');
$routes->get('/details', 'UserDetailsController::details');
