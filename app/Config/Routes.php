<?php

use App\Controllers\Employee;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Company::index');
$routes->get('/company/index', 'Company::index');
$routes->get('/company/create', 'Company::create');
$routes->post('/company/save', 'Company::save');
$routes->get('/company/(:segment)/edit', 'Company::edit/$1');
$routes->post('/company/(:segment)/delete', 'Company::delete/$1');
$routes->get('/company/(:segment)/employees', 'Employee::listEmployees/$1');
$routes->get('/company/(:segment)/create', 'Employee::create/$1');
$routes->post('/employee/(:segment)/save', 'Employee::save/$1');
$routes->post('/employee/(:segment)/delete/(:segment)', 'Employee::delete/$1/$2');
$routes->get('/employee/(:segment)/edit', 'Employee::edit/$1');
$routes->post('/employee/(:segment)/update/(:segment)', 'Employee::update/$1/$2');
$routes->get('/company/(:segment)/view', 'Employee::view/$1');
$routes->get('/navbar', 'Home::navbar');
