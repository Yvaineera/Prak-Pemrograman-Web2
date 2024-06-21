<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'LoginController::index');

$routes->get('/login', 'LoginController::index');
$routes->post('/login', 'LoginController::login');

$routes->get('/register', 'RegisterController::index');
$routes->post('/register', 'RegisterController::store');

$routes->get('/logout', 'LoginController::logout');

$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);

$routes->group('books', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'BookController::index');
    $routes->get('create', 'BookController::create');
    $routes->post('store', 'BookController::store');
    $routes->get('edit/(:segment)', 'BookController::edit/$1');
    $routes->post('update/(:segment)', 'BookController::update/$1');
    $routes->get('delete/(:segment)', 'BookController::delete/$1');
});