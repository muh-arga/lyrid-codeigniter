<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::login');

$routes->get('/login', 'Auth::login');

$routes->post('/authenticate', 'Auth::authenticate');

$routes->group('users', ['filter' => ['auth', 'admin']], function($routes) {
    $routes->get('/', 'User::index');
    $routes->get('create', 'User::create');
    $routes->post('create', 'User::store');
    $routes->get('detail/(:num)', 'User::detail/$1');
    $routes->get('edit/(:num)', 'User::edit/$1');
    $routes->post('edit/(:num)', 'User::update/$1');
    $routes->get('delete/(:num)', 'User::delete/$1');
});

$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('/employees', 'Employee::index');
    $routes->get('/employees/create', 'Employee::create');
    $routes->post('/employees/create', 'Employee::store');
    $routes->get('/employees/detail/(:num)', 'Employee::detail/$1');
    $routes->get('/employees/edit/(:num)', 'Employee::edit/$1');
    $routes->post('/employees/edit/(:num)', 'Employee::update/$1');
    $routes->get('/employees/delete/(:num)', 'Employee::delete/$1');

    $routes->get('/logout', 'Auth::logout');
});