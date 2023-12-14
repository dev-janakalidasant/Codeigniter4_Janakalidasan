<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// $routes->get('/', 'FormController::index');
$routes->get('/', 'LoginController::index');
$routes->get('/profilecreate', 'ProfileController::profile');
$routes->post('/submit', 'RegistrationController::submitForm');

$routes->post('/submitprofile', 'ProfileController::submitProfile');
$routes->post('/submitupdates', 'ProfileController::submitupdate');

$routes->get('/profilelist', 'ProfileController::profilelist');
$routes->get('/profiledeatails', 'ProfileController::profilelist');
//login
// $routes->get('/profilecreate', 'LoginController::useridget');
//
$routes->get('/loginpage', 'LoginController::index');
$routes->post('/login/loginsuccess', 'LoginController::loginsuccess');
$routes->get('/successmsgs', 'LoginController::successmsg');
$routes->get('/register', 'RegistrationController::register');

//old
$routes->get('/dashborad', 'FormController::index');
$routes->post('/update/(:num)', 'FormController::update/$1');
$routes->get('/delete/(:num)', 'FormController::delete/$1');
$routes->get('/details', 'UserDetailsController::details');
