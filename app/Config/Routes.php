<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// $routes->get('/', 'FormController::index');
$routes->get('/', 'LoginController::index');
$routes->post('/submit', 'RegistrationController::submitForm');

//login

$routes->get('/loginpage', 'LoginController::index');
$routes->post('/login/loginsuccess', 'LoginController::loginsuccess');
$routes->get('/successmsg', 'LoginController::successmsg');
$routes->get('/register', 'RegistrationController::register');

//old
$routes->post('/submit-form', 'FormController::submitForm');
$routes->post('/update/(:num)', 'FormController::update/$1');
$routes->get('/delete/(:num)', 'FormController::delete/$1');
$routes->get('/details', 'UserDetailsController::details');
