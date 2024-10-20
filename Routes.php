<?php

namespace Config;

use App\Controllers\Page;
use App\Controllers\AuthController;
use App\Controllers\EventController;
use App\Controllers\CalendarController;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */
$routes->get('/', 'Page::homepage');
$routes->get('/homepage', 'Page::homepage');
$routes->get('/signin', 'Page::signin');
$routes->get('/login', 'Page::login');
$routes->post('/create-account', 'AuthController::createAccount');
$routes->post('/login', 'AuthController::login');  
$routes->get('/logout', 'AuthController::logout');

// Calendar CRUD routes
$routes->get('/calendars', 'CalendarController::index');
$routes->get('/calendars/add', 'CalendarController::create');
$routes->post('/calendars/save', 'CalendarController::save');
$routes->get('/calendars/edit/(:num)', 'CalendarController::edit/$1');
$routes->post('/calendars/update/(:num)', 'CalendarController::update/$1');
$routes->get('/calendars/delete/(:num)', 'CalendarController::delete/$1');

// Event CRUD routes
$routes->get('/events', 'EventController::index');
$routes->get('/events/add', 'EventController::create');
$routes->post('/events/save', 'EventController::save');
$routes->get('/events/edit/(:num)', 'EventController::edit/$1');
$routes->post('/events/update/(:num)', 'EventController::update/$1');
$routes->get('/events/delete/(:num)', 'EventController::delete/$1');
